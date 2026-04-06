<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\Level;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\IOFactory;

class JobController extends Controller
{
    //
    public function index(Request $request)
    {
        // $jobs = Job::with(['company','location','level','categories'])->latest()->get();
        // $query = Job::query();
        $query = Job::with(['company', 'location', 'level', 'categories'])
            ->where('status', 'published');

        // Loc theo tu khoa Search(Title)
        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        // Loc theo location
        if ($request->filled('location')) {
            $query->where('location_id', $request->location);
        }

        // Loc theo category
        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        // Loc theo level
        if ($request->filled('level')) {
            $query->where('level_id', $request->level);
        }

        // xu ly sort
        switch ($request->sort) {
            case 'title_asc': $query->orderBy('title', 'asc');
                break;
            case 'title_desc': $query->orderBy('title', 'desc');
                break;
            case 'salary_from_asc': $query->orderBy('salary_from', 'asc');
                break;
            case 'salary_from_desc': $query->orderBy('salary_from', 'desc');
                break;
            case 'salary_to_asc': $query->orderBy('salary_to', 'asc');
                break;
            case 'salary_to_desc': $query->orderBy('salary_to', 'desc');
                break;
            default: $query->latest();
                break;
        }

        $jobs = $query->paginate(12)->withQueryString();

        // Kiem tra Request
        if ($request->ajax()) {
            return view('components.job-list', compact('jobs'))->render();
        }

        return view('pages.home', compact('jobs'));
    }

    public function show($slug)
    {
        $job = Job::where('slug', $slug)
            ->where('status', 'published')
            ->with(['company', 'location', 'level', 'categories'])
            ->firstOrFail();

        $relatedJobs = Job::with(['company', 'location', 'level', 'categories'])
            ->where('status', 'published')
            ->where('id', '!=', $job->id)
            ->latest()
            ->take(4)
            ->get();

        return view('pages.job-detail', compact('job', 'relatedJobs'));
    }

    public function store(Request $request)
    {
        // validate dữ liệu đầu vào
        $request->validate(
            [
                'title' => 'required|string|min:5|max:255',
                'job_file' => 'required_without:description_manual|nullable|mimes:docx|max:5120',
                'description_manual' => 'required_without:job_file|nullable|string',

                'salary_from' => 'nullable|numeric|min:0',
                'salary_to' => 'nullable|numeric|min:0|gte:salary_from',

                'type' => 'required|in:Full-time,Part-time,Contract,Internship',
                'apply_url' => ['required', 'regex:/^(https?:\/\/)?([\w\d-]+\.)+[\w-]+(\/.*)?$/i'],

                'company_id' => 'required|exists:companies,id',
                'location_id' => 'required|exists:locations,id',
                'level_id' => 'required|exists:levels,id',

                'category_ids' => 'required|array|min:1',
                'category_ids.*' => 'exists:categories,id',

                'expired_at' => 'required|date|after:today',
            ],
            [
                'salary_to.gte' => 'Mức lương tối đa phải lớn hơn hoặc bằng mức lương tối thiểu.',
                'expired_at.after' => 'Ngày hết hạn phải là một ngày trong tương lai.',
                'category_ids.required' => 'Vui lòng chọn ít nhất một danh mục công việc.',
                'apply_url.regex' => 'Đường dẫn không đúng định dạng (Ví dụ: google.com hoặc https://google.com)',
                'job_file.required_without' => 'Vui lòng upload file hoặc nhập mô tả công việc thủ công.',
            ]
        );

        // Validate URL
        $url = $request->input('apply_url');

        if (! preg_match('~^(?:f|ht)tps?://~i', $url)) {
            $url = 'https://'.$url;
        }

        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            return back()->withErrors(['apply_url' => 'Đường dẫn không hợp lệ!'])->withInput();
        }

        try {
            $descriptionHtml = '';

            if ($request->hasFile('job_file')) {
                $file = $request->file('job_file');

                // 2. Load file Docx bằng PhpWord
                $phpWord = IOFactory::load($file->getRealPath());

                // 3. Convert nội dung sang HTML
                $htmlWriter = IOFactory::createWriter($phpWord, 'HTML');

                // Thêm dòng này để giữ cấu trúc danh sách tốt hơn
                $phpWord->getSettings()->setUpdateFields(true);

                ob_start();
                $htmlWriter->save('php://output');
                $rawHtml = ob_get_clean();

                // 4. Lấy nội dung bên trong thẻ <body> để bỏ qua các thẻ <html> thừa
                if (preg_match("/<body>(.*)<\/body>/is", $rawHtml, $matches)) {
                    $descriptionHtml = $matches[1];
                } else {
                    $descriptionHtml = $rawHtml;
                }

            } else {
                $descriptionHtml = $request->description_manual;
            }

            // Kiểm tra xem cuối cùng có nội dung mô tả không
            if (empty(trim(strip_tags($descriptionHtml)))) {
                return back()
                    ->withInput()
                    ->withErrors(['job_file' => 'Nội dung mô tả công việc không được để trống.']);
            }

            // 5. Tạo Job với đầy đủ các trường trong Fillable
            DB::transaction(function () use ($request, $url, $descriptionHtml) {
                $job = Job::create([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title).'-'.time(), // Thêm time để tránh trùng slug
                    'description' => $descriptionHtml,
                    'salary_from' => $request->salary_from,
                    'salary_to' => $request->salary_to,
                    'is_remote' => $request->boolean('is_remote'), // Checkbox trả về true/false
                    'type' => $request->type,
                    'status' => 'pending',
                    'apply_url' => $url,
                    'company_id' => $request->company_id,
                    'location_id' => $request->location_id,
                    'level_id' => $request->level_id,
                    'expired_at' => $request->expired_at,
                ]);

                // Nếu có chọn categories (nhiều danh mục), hãy sync chúng
                if ($request->has('category_ids')) {
                    $job->categories()->sync($request->category_ids);
                }
            });

            return redirect()->route('pages.home')->with('success', 'Đã đăng tin tuyển dụng thành công!');

        } catch (\Exception $e) {
            Log::error('Lỗi đăng tin: '.$e->getMessage());

            return back()->with('error', 'Có lỗi xảy ra: '.$e->getMessage())->withInput();
        }
    }
}
