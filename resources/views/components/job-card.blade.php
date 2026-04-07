@props(['job'])

<div class="p-3 border rounded-lg shadow hover:bg-slate-100 transition">

    <div class="flex gap-3 items-center flex-wrap">

        <!-- Logo -->


        <!-- Content -->
        <div class="flex-1">

            <!-- Title -->
            <a href="{{ route('jobs.show', $job->slug) }}"
               class="text-base lg:text-xl font-semibold hover:underline line-clamp-2">
                {{ $job->title }}
            </a>

            <!-- Company + time -->
            <div class="flex items-center gap-2 mt-1 text-sm text-slate-500">
                <a href="{{ $job->company->website }}" target="_blank" class="font-medium hover:underline">
                    {{ $job->company->name }}
                </a>
                <span>•</span>
                <span>{{ $job->created_at->diffForHumans() }}</span>
            </div>

            <!-- Meta -->
            <div class="flex flex-wrap items-center gap-2 mt-1 text-sm text-slate-600">

                <!-- LOCATION -->
                <span class="space-x-1 flex items-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z">
                            </path>
                        </svg>
                    </span>
                   <span>{{ $job->location->name }}</span>
                </span>
                <span class="mx-2 text-slate-500 hidden lg:flex">·</span>

                <!-- LEVEL -->
                <span class="space-x-1 flex items-center">
                   <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z">
                        </path>
                    </svg>
                    </span>
                   <span>{{ $job->level->name }}</span>
                </span>
                <span class="mx-2 text-slate-500 hidden lg:flex">·</span>

                 <!-- CATEGORY -->
                <span class="space-x-1 flex items-center">
                   <span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"></path></svg></span>
                   <span class="hidden lg:inline">
                    {{ $job->categories->pluck('name')->join(', ') }}
                    </span>
                </span>
                <span class="mx-2 text-slate-500 hidden lg:flex">·</span>


                 <!-- TYPE -->
                <span class="space-x-1 flex items-center">
                   <span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3"></path></svg></span>
                  <span class="hidden lg:inline">{{ $job->type }}</span>
                </span>


                <!-- REMOTE -->
                @if($job->is_remote)
                 <span class="mx-2 text-slate-500 hidden lg:flex">·</span>

                <span class="badge  rounded-full border border-slate-300 text-slate-800 space-x-1 flex items-center">
                    <span class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 0 1 1.06 0Z"></path></svg></span>
                    <span class="px-2 py-1.5 text-xs ">
                        Remote
                    </span>
                </span>
                @endif
            </div>

        </div>

    </div>

</div>
