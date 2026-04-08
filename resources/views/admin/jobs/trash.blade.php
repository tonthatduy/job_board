@extends('admin.layout')

@section('title', 'Thùng rác - Tin tuyển dụng')

@section('content')
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <div class="flex items-center gap-2 text-sm font-medium text-slate-500 mb-1">
                <a href="{{ route('admin.jobs.index') }}" class="hover:text-indigo-600 transition">Tin tuyển dụng</a>
                <span>/</span>
                <span class="text-slate-900">Thùng rác</span>
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Thùng rác</h1>
            <p class="mt-1 text-sm text-slate-600">Danh sách các tin đã xóa tạm thời.</p>
        </div>
        <a href="{{ route('admin.jobs.index') }}"
           class="inline-flex w-fit items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
            ← Quay lại danh sách
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm ring-1 ring-slate-900/5">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50/80 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                        <th class="px-5 py-4">Tiêu đề</th>
                        <th class="px-5 py-4">Ngày xóa</th>
                        <th class="px-5 py-4 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    {{-- CHÚ Ý: Biến $deletedJobs phải khớp với Controller --}}
                    @forelse($deletedJobs as $job)
                        <tr class="transition hover:bg-slate-50/50">
                            <td class="max-w-xs px-5 py-4">
                                <div class="font-medium text-slate-900">{{ $job->title }}</div>
                                <div class="text-xs text-slate-500">{{ $job->company->name ?? 'N/A' }}</div>
                            </td>
                            <td class="px-5 py-4 text-slate-600 tabular-nums">
                                {{ $job->deleted_at ? $job->deleted_at->format('d/m/Y H:i') : '—' }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-right">
                                <div class="inline-flex flex-wrap items-center justify-end gap-2">
                                    {{-- Form khôi phục --}}
                                    <form action="{{ route('admin.jobs.restore', $job->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                class="inline-flex rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700 transition hover:border-emerald-300 hover:bg-emerald-100">
                                            Khôi phục
                                        </button>
                                    </form>

                                    {{-- Nút kích hoạt Modal xóa vĩnh viễn --}}
                                    <button type="button"
                                            onclick="confirmForceDelete('{{ route('admin.jobs.force-delete', $job->id) }}', '{{ e($job->title) }}')"
                                            class="inline-flex rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 transition hover:border-red-300 hover:bg-red-100">
                                        Xóa sạch
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-5 py-16 text-center text-slate-500">
                                Thùng rác trống.
                            </td>
                        </tr>
                    @endforelse {{-- Đã sửa thẻ đóng ở đây --}}
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal xác nhận --}}
    <div id="force-delete-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeForceDeleteModal()"></div>
        <div class="relative w-full max-w-md overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">
            <div class="bg-red-600 px-6 py-4 text-white">
                <h2 class="text-lg font-bold">Xác nhận xóa vĩnh viễn</h2>
            </div>
            <div class="px-6 py-5">
                <p class="text-sm text-slate-600">Bạn sắp xóa vĩnh viễn:</p>
                <p id="force-delete-title" class="mt-2 rounded-lg bg-red-50 px-3 py-2 text-sm font-semibold text-red-900 ring-1 ring-red-200"></p>
            </div>
            <div class="flex justify-end gap-3 bg-slate-50 px-6 py-4 border-t border-slate-100">
                <button type="button" onclick="closeForceDeleteModal()" class="px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl">Hủy</button>
                <form id="force-delete-form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-xl">Xóa sạch</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmForceDelete(url, title) {
            document.getElementById('force-delete-form').action = url;
            document.getElementById('force-delete-title').innerText = title;
            document.getElementById('force-delete-modal').classList.remove('hidden');
            document.getElementById('force-delete-modal').classList.add('flex');
        }

        function closeForceDeleteModal() {
            document.getElementById('force-delete-modal').classList.add('hidden');
            document.getElementById('force-delete-modal').classList.remove('flex');
        }
    </script>
@endsection
