<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Level;
use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(Request $request): View
    {
        $query = Job::with(['company', 'location', 'level', 'categories'])
            ->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        $jobs = $query->paginate(15)->withQueryString();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create(): View
    {
        return view('admin.jobs.create', [
            'job' => null,
            'companies' => Company::orderBy('name')->get(),
            'locations' => Location::orderBy('name')->get(),
            'levels' => Level::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedJobData($request, forUpdate: false);
        $data['slug'] = $this->uniqueSlugFromTitle($data['title']);

        $job = Job::create($data);
        $job->categories()->sync($request->input('category_ids', []));

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Đã tạo tin tuyển dụng.');
    }

    public function edit(Job $job): View
    {
        return view('admin.jobs.edit', [
            'job' => $job->load('categories'),
            'companies' => Company::orderBy('name')->get(),
            'locations' => Location::orderBy('name')->get(),
            'levels' => Level::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Job $job): RedirectResponse
    {
        $data = $this->validatedJobData($request, forUpdate: true, job: $job);
        $job->update($data);
        $job->categories()->sync($request->input('category_ids', []));

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Đã cập nhật tin tuyển dụng.');
    }

    public function destroy(Job $job): RedirectResponse
    {

        $job->delete();

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Đã xóa tin tuyển dụng.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedJobData(Request $request, bool $forUpdate, ?Job $job = null): array
    {
        $rules = [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string'],
            'salary_from' => ['nullable', 'integer', 'min:0'],
            'salary_to' => ['nullable', 'integer', 'min:0', 'gte:salary_from'],
            'is_remote' => ['sometimes', 'boolean'],
            'type' => ['required', Rule::in(['Full-time', 'Part-time', 'Contract', 'Internship'])],
            'status' => ['required', Rule::in(['pending', 'published', 'expired'])],
            'apply_url' => ['required', 'regex:/^(https?:\/\/)?([\w\d-]+\.)+[\w-]+(\/.*)?$/i'],
            'company_id' => ['required', 'exists:companies,id'],
            'location_id' => ['required', 'exists:locations,id'],
            'level_id' => ['required', 'exists:levels,id'],
            'category_ids' => ['required', 'array', 'min:1'],
            'category_ids.*' => ['exists:categories,id'],
            'expired_at' => ['required', 'date'],
        ];

        if ($forUpdate && $job) {
            $slugRule = Rule::unique('jobs', 'slug')->ignore($job->id);
            $rules['slug'] = ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/', $slugRule];
        }

        $validated = $request->validate($rules, [
            'salary_to.gte' => 'Mức lương tối đa phải lớn hơn hoặc bằng mức tối thiểu.',
            'slug.regex' => 'Slug chỉ gồm chữ thường, số và dấu gạch ngang.',
        ]);

        if (empty(trim(strip_tags($validated['description'])))) {
            throw ValidationException::withMessages([
                'description' => 'Mô tả không được để trống.',
            ]);
        }

        $url = $validated['apply_url'];
        if (! preg_match('~^(?:f|ht)tps?://~i', $url)) {
            $url = 'https://'.$url;
        }
        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            throw ValidationException::withMessages([
                'apply_url' => 'URL không hợp lệ.',
            ]);
        }

        $out = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'salary_from' => $validated['salary_from'],
            'salary_to' => $validated['salary_to'],
            'is_remote' => $request->boolean('is_remote'),
            'type' => $validated['type'],
            'status' => $validated['status'],
            'apply_url' => $url,
            'company_id' => $validated['company_id'],
            'location_id' => $validated['location_id'],
            'level_id' => $validated['level_id'],
            'expired_at' => $validated['expired_at'],
        ];

        if ($forUpdate && isset($validated['slug'])) {
            $out['slug'] = Str::lower($validated['slug']);
        }

        return $out;
    }

    private function uniqueSlugFromTitle(string $title): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 0;
        while (Job::where('slug', $slug)->exists()) {
            $slug = $base.'-'.Str::lower(Str::random(4));
            $i++;
            if ($i > 20) {
                $slug = $base.'-'.time();
                break;
            }
        }

        return $slug;
    }

    public function trash()
    {
        $deleteJobs = Job::onlyTrashed()->get();
        return view('admin.jobs.trash', compact('deleteJobs'));
    }

    public function restore($id)
    {
        $job = Job::withTrashed()->findOrFail($id);
        $job->restore();

        return redirect()
                ->route('admin.jobs.trash')
                ->with('success', 'Đã khôi phục tin tuyển dụng thành công.');
    }

    public function forceDelete($id)
    {
        $job = Job::withTrashed()->findOrFail($id);
        $job->categories()->detach();

        $job->forceDelete();

        return redirect()
                ->route('admin.jobs.trash')
                ->with('success', 'Đã xoá vĩnh viễn tin tuyển dụng.');
    }

}
