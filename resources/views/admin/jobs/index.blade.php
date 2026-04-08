@extends('admin.layout')

@section('title', 'Quản lý tin tuyển dụng')

@section('content')
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Tin tuyển dụng</h1>
            <p class="mt-1 text-sm text-slate-600">Tạo, sửa, duyệt và gỡ bỏ bài đăng.</p>
        </div>
        <a href="{{ route('admin.jobs.create') }}"
           class="inline-flex w-fit items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 transition hover:from-indigo-500 hover:to-violet-500">
            <span class="text-lg leading-none">+</span>
            Tạo tin mới
        </a>
    </div>

    <div class="mb-6 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm ring-1 ring-slate-900/5 sm:p-5">
        <form method="get" action="{{ route('admin.jobs.index') }}" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-6 items-end">
    <div class="lg:col-span-2">
        <label class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-slate-500">Tiêu đề</label>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Nhập từ khóa…"
               class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm transition focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/15">
    </div>

    <div>
        <label class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-slate-500">Công ty</label>
        <select name="company_id" class="w-full cursor-pointer rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm transition focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/15">
            <option value="">Tất cả</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}" @selected(request('company_id') == $company->id)>{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-slate-500">Địa điểm</label>
        <select name="location_id" class="w-full cursor-pointer rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm transition focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/15">
            <option value="">Tất cả</option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}" @selected(request('location_id') == $location->id)>{{ $location->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-slate-500">Cấp bậc</label>
        <select name="level_id" class="w-full cursor-pointer rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm transition focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/15">
            <option value="">Tất cả</option>
            @foreach($levels as $level)
                <option value="{{ $level->id }}" @selected(request('level_id') == $level->id)>{{ $level->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-slate-500">Trạng thái</label>
        <div class="flex gap-2">
            <select name="status" class="w-full cursor-pointer rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-sm transition focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/15">
                <option value="">Tất cả</option>
                @foreach(['pending' => 'Chờ', 'published' => 'Đã đăng', 'expired' => 'Hết hạn'] as $val => $label)
                    <option value="{{ $val }}" @selected(request('status') === $val)>{{ $label }}</option>
                @endforeach
            </select>
            <button type="submit" class="rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800">
                Lọc
            </button>
        </div>
    </div>
</form>

@if(request()->hasAny(['search', 'status', 'company_id', 'location_id', 'level_id']))
    <div class="mt-4">
        <a href="{{ route('admin.jobs.index') }}" class="text-xs font-medium text-indigo-600 hover:underline">
            ✕ Xóa tất cả bộ lọc
        </a>
    </div>
@endif
    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm ring-1 ring-slate-900/5">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50/80 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                        <th class="px-5 py-4">Tiêu đề</th>
                        <th class="px-5 py-4">Công ty</th>
                        <th class="px-5 py-4">Trạng thái</th>
                        <th class="px-5 py-4">Hết hạn</th>
                        <th class="px-5 py-4 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($jobs as $job)
                        <tr class="transition hover:bg-indigo-50/30">
                            <td class="max-w-xs px-5 py-4">
                                <a href="{{ route('jobs.show', $job->slug) }}" target="_blank" rel="noopener"
                                   class="font-medium text-slate-900 transition hover:text-indigo-600">
                                    {{ $job->title }}
                                </a>
                            </td>
                            <td class="px-5 py-4 text-slate-600">{{ $job->company->name }}</td>
                            <td class="px-5 py-4">
                                @php
                                    $badges = [
                                        'pending' => 'bg-amber-100 text-amber-900 ring-amber-200/60',
                                        'published' => 'bg-emerald-100 text-emerald-900 ring-emerald-200/60',
                                        'expired' => 'bg-slate-200 text-slate-700 ring-slate-300/60',
                                    ];
                                @endphp
                                <span class="inline-flex rounded-full px-2.5 py-1 text-xs font-semibold ring-1 ring-inset {{ $badges[$job->status] ?? 'bg-slate-100 text-slate-700 ring-slate-200' }}">
                                    {{ $job->status }}
                                </span>
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-slate-600 tabular-nums">
                                {{ $job->expired_at?->format('d/m/Y') ?? '—' }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-right">
                                <div class="inline-flex flex-wrap items-center justify-end gap-2">
                                    <a href="{{ route('admin.jobs.edit', $job) }}"
                                       class="inline-flex rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-indigo-700 shadow-sm transition hover:border-indigo-200 hover:bg-indigo-50">
                                        Sửa
                                    </a>
                                    <button type="button"
                                            data-admin-delete-open
                                            data-url="{{ route('admin.jobs.destroy', $job) }}"
                                            data-title="{{ e($job->title) }}"
                                            class="inline-flex rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 transition hover:border-red-300 hover:bg-red-100">
                                        Xóa
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-16 text-center">
                                <p class="text-slate-500">Chưa có tin nào.</p>
                                <a href="{{ route('admin.jobs.create') }}" class="mt-3 inline-block text-sm font-semibold text-indigo-600 hover:text-indigo-500">Tạo tin đầu tiên</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($jobs->hasPages())
        <div class="mt-6 rounded-xl border border-slate-200/80 bg-white px-4 py-3 shadow-sm">
            {{ $jobs->links() }}
        </div>
    @endif

    {{-- Modal xác nhận xóa (thay cho window.confirm) --}}
    <div id="admin-delete-modal"
         class="fixed inset-0 z-[100] hidden items-center justify-center p-4"
         role="dialog"
         aria-modal="true"
         aria-labelledby="admin-delete-modal-heading">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" data-admin-delete-close></div>
        <div class="relative w-full max-w-md overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl shadow-slate-900/20 ring-1 ring-slate-900/5">
            <div class="border-b border-slate-100 bg-gradient-to-r from-red-600 to-rose-600 px-6 py-4">
                <h2 id="admin-delete-modal-heading" class="text-lg font-bold text-white">Xóa tin tuyển dụng?</h2>
                <p class="mt-1 text-sm text-red-100">Hành động này không thể hoàn tác.</p>
            </div>
            <div class="px-6 py-5">
                <p class="text-sm text-slate-600">
                    Bạn sắp xóa:
                </p>
                <p id="admin-delete-modal-title" class="mt-2 rounded-lg bg-slate-50 px-3 py-2 text-sm font-semibold text-slate-900 ring-1 ring-slate-200/80"></p>
            </div>
            <div class="flex flex-col-reverse gap-2 border-t border-slate-100 bg-slate-50/80 px-6 py-4 sm:flex-row sm:justify-end sm:gap-3">
                <button type="button" data-admin-delete-close
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 sm:w-auto">
                    Hủy
                </button>
                <button type="button" id="admin-delete-confirm"
                        class="w-full rounded-xl bg-gradient-to-r from-red-600 to-rose-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-red-500/25 transition hover:from-red-500 hover:to-rose-500 sm:w-auto">
                    Xóa vĩnh viễn
                </button>
            </div>
        </div>
    </div>

    <form id="admin-delete-form" method="post" class="hidden" action="">
        @csrf
        @method('DELETE')
    </form>
@endsection
