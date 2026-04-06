@extends('admin.layout')  {{-- hoặc layout chung nếu bạn có --}}

@section('title', 'Đăng nhập')

@section('content')
<div class="min-h-screen bg-[#020617] flex items-center justify-center p-4 relative overflow-hidden font-sans">

    <!-- Glow background -->
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-600/30 blur-[140px] rounded-full"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-fuchsia-600/30 blur-[140px] rounded-full"></div>

    <div class="w-full max-w-md relative">

        <!-- Card -->
        <div class="overflow-hidden rounded-3xl border border-white/10
                    bg-gradient-to-b from-white/5 to-white/[0.02]
                    backdrop-blur-3xl shadow-[0_20px_80px_-20px_rgba(0,0,0,0.9)]
                    ring-1 ring-white/10 transition-all duration-300 hover:shadow-indigo-500/10">

            <!-- Header -->
            <div class="pt-12 pb-8 px-8 text-center relative">

                <!-- Icon -->
                <div class="relative mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl
                            bg-gradient-to-tr from-indigo-500 to-violet-500
                            shadow-lg shadow-indigo-500/30
                            group transition-transform duration-300 hover:scale-105">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-10 w-10 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>

                <h1 class="text-3xl font-bold tracking-tight text-white">
                    Admin Portal
                </h1>

                <p class="mt-2 text-slate-400 text-sm">
                    Vui lòng nhập mật khẩu để tiếp tục
                </p>
            </div>

            <!-- Body -->
            <div class="px-8 pb-12">

                <!-- Info box -->
                <div class="mb-8 rounded-xl bg-indigo-500/10 border border-indigo-500/20 p-4 flex items-start gap-3 backdrop-blur-md">
                    <span class="text-indigo-400 mt-0.5">ℹ️</span>
                    <p class="text-xs text-indigo-200/80 leading-relaxed">
                        Cấu hình tại
                        <code class="text-indigo-400 font-mono italic">ADMIN_PASSWORD</code>
                        trong file .env
                    </p>
                </div>

                <form method="post" action="{{ route('admin.login.store') }}" class="space-y-6">
                    @csrf

                    <!-- Input -->
                    <div class="space-y-2">
                        <label for="password"
                               class="text-xs font-medium uppercase tracking-widest text-slate-400 ml-1">
                            Master Password
                        </label>

                        <div class="relative group">

                            <input
                                type="password"
                                name="password"
                                id="password"
                                required
                                autofocus
                                autocomplete="current-password"
                                class="w-full rounded-xl border border-white/10
                                       bg-white/[0.04] px-5 py-4 text-white
                                       transition-all duration-300
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                                       focus:bg-white/[0.06]
                                       placeholder:text-slate-500">

                            <!-- Icon -->
                            <button type="button"
                                    id="toggle-password"
                                    class="absolute right-4 top-1/2 -translate-y-1/2
                                           text-slate-500 hover:text-indigo-400
                                           transition-colors p-1">

                                <svg id="eye-icon"
                                     xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5
                                             c4.478 0 8.268 2.943 9.542 7
                                             -1.274 4.057-5.064 7-9.542 7
                                             -4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>

                        @error('password')
                        <div class="flex items-center gap-2 text-red-400 text-xs mt-2 ml-1">
                            <span class="h-1.5 w-1.5 rounded-full bg-red-500 animate-pulse"></span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Button -->
                    <button type="submit"
                            class="w-full group relative flex items-center justify-center gap-2
                                   rounded-xl bg-gradient-to-r from-white to-slate-100
                                   px-6 py-4 text-sm font-bold text-slate-900
                                   transition-all duration-300
                                   hover:from-indigo-50 hover:to-white
                                   active:scale-[0.97] overflow-hidden">

                        <span>TRUY CẬP HỆ THỐNG</span>

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4 transition-transform group-hover:translate-x-1"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>

                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 flex flex-col items-center gap-4">
            <div class="h-px w-12 bg-white/10"></div>
            <p class="text-[10px] uppercase tracking-[0.2em] text-slate-500">
                Endpoint: <span class="text-slate-300">/admin/login</span>
            </p>
        </div>
    </div>
</div>
@endsection
