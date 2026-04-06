<!DOCTYPE html>
<html lang="vi" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/admin-ui.js'])
</head>
<body class="min-h-full bg-gradient-to-br from-slate-100 via-indigo-50/40 to-slate-100 text-slate-900 antialiased">
    <header class="border-b border-white/10 bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 text-white shadow-lg shadow-slate-900/20">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-4">
            <div class="flex items-center gap-3">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/10 text-lg font-bold text-indigo-200 ring-1 ring-white/15">JB</span>
                <div>
                    <span class="block text-sm font-semibold tracking-tight text-white">Job board</span>
                    <span class="text-xs text-indigo-200/90">Bảng quản trị</span>
                </div>
            </div>
            @if(session('admin') === true)
                <nav class="flex flex-wrap items-center gap-2 text-sm">
                    <a href="{{ route('admin.jobs.index') }}"
                       class="rounded-lg px-3 py-2 text-indigo-100 transition hover:bg-white/10 hover:text-white {{ request()->routeIs('admin.jobs.index') ? 'bg-white/15 text-white ring-1 ring-white/20' : '' }}">
                        Danh sách tin
                    </a>
                    <a href="{{ route('admin.jobs.create') }}"
                       class="rounded-lg px-3 py-2 text-indigo-100 transition hover:bg-white/10 hover:text-white {{ request()->routeIs('admin.jobs.create') ? 'bg-white/15 text-white ring-1 ring-white/20' : '' }}">
                        Tạo tin
                    </a>
                    <a href="{{ route('pages.home') }}" target="_blank" rel="noopener"
                       class="rounded-lg px-3 py-2 text-indigo-200/80 transition hover:bg-white/10 hover:text-white">
                        Xem site ↗
                    </a>
                    <form action="{{ route('admin.logout') }}" method="post" class="ml-1 inline">
                        @csrf
                        <button type="submit"
                                class="rounded-lg border border-amber-400/40 bg-amber-500/10 px-3 py-2 text-amber-100 transition hover:border-amber-300/60 hover:bg-amber-500/20">
                            Đăng xuất
                        </button>
                    </form>
                </nav>
            @endif
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8 sm:py-10">
        @if(session('success'))
            <div class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200/80 bg-emerald-50 px-4 py-3 text-emerald-900 shadow-sm"
                 role="status">
                <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-500 text-xs text-white">✓</span>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
