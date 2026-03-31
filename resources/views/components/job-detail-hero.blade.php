<div class="px-4 w-full mx-auto">
    <div class="max-w-screen-lg mx-auto py-16">

        <!-- Breadcrumb -->
        <div class="text-sm text-slate-500 dark:text-navy-300 flex items-center justify-center space-x-2 font-medium">

            <a href="/" class="hover:text-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </a>

            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </span>

            <span class="line-clamp-1 text-blue-600">
                {{ $job->title }}
            </span>

        </div>

        <!-- Title -->
        <h1 class="mt-4 text-3xl lg:text-5xl font-semibold tracking-tight dark:text-white text-center">
            {{ $job->title }}
        </h1>

        <!-- Meta -->
        <div class="mt-4 flex flex-wrap justify-center items-center gap-x-4 gap-y-2 text-slate-500 dark:text-navy-300 font-medium text-sm">

            <!-- Posted date -->
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

                <span>
                    Posted on {{ $job->created_at->format('M d, Y') }}
                </span>
            </div>

            <span class="hidden lg:inline">·</span>

            <!-- Expire date (nếu có) -->
            @if($job->expires_at)
                <div class="hidden lg:flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5" />
                    </svg>

                    <span>
                        Expire on {{ \Carbon\Carbon::parse($job->expires_at)->format('M d, Y') }}
                    </span>
                </div>
            @endif

        </div>

    </div>
</div>
