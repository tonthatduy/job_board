@extends('admin.layout')

@section('title', 'Sửa tin tuyển dụng')

@section('content')
    <div class="mb-8">
        <nav class="mb-3 text-sm">
            <a href="{{ route('admin.jobs.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">← Danh sách tin</a>
        </nav>
        <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Sửa tin</h1>
        <p class="mt-2 rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm ring-1 ring-slate-900/[0.03]">
            <span class="font-semibold text-slate-900">{{ $job->title }}</span>
        </p>
    </div>

    <form action="{{ route('admin.jobs.update', $job) }}" method="post" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-6 shadow-lg shadow-slate-200/40 ring-1 ring-slate-900/5 sm:p-8">
            @include('admin.jobs._form', ['job' => $job, 'companies' => $companies, 'locations' => $locations, 'levels' => $levels, 'categories' => $categories])
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-slate-200/80 pt-6 sm:flex-row sm:justify-end">
            <a href="{{ route('admin.jobs.index') }}"
               class="inline-flex justify-center rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
                Quay lại
            </a>
            <button type="submit"
                    class="inline-flex justify-center rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 px-8 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 transition hover:from-indigo-500 hover:to-violet-500">
                Cập nhật
            </button>
        </div>
    </form>
@endsection
