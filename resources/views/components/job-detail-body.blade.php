<div class="px-4 w-full mx-auto">
    <div class="max-w-screen-lg mx-auto">

        <div class="grid grid-cols-12 gap-6 lg:gap-12">

            {{-- LEFT: DESCRIPTION --}}
            <div class="col-span-12 lg:col-span-8">

                <h2 class="text-xl lg:text-3xl font-semibold">
                    Job Description
                </h2>

                <div class="mt-8 prose max-w-none text-sm text-slate-700 dark:text-navy-100">
                    {!! $job->description !!}
                </div>

            </div>

            {{-- RIGHT: SIDEBAR --}}
            <div class="col-span-12 lg:col-span-4">

                <div class="space-y-4 lg:sticky lg:top-12">

                    {{-- SALARY --}}
                    @if($job->salary_from || $job->salary_to)
                    <div class="border rounded-lg shadow p-4 text-center">
                        <div class="flex items-center justify-center space-x-2 font-bold">
                            <span>💰</span>
                            <span>Salary</span>
                        </div>

                        <div class="mt-2 text-lg font-semibold text-blue-600">
                            ${{ number_format($job->salary_from) }}
                            -
                            ${{ number_format($job->salary_to) }}
                        </div>
                    </div>
                    @endif


                    {{-- COMPANY --}}
                    <div class="border rounded-lg shadow p-4 text-center">

                        <img src="{{ $job->company->logo }}"
                             class="w-20 h-20 mx-auto rounded-lg object-cover"
                             alt="{{ $job->company->name }}">

                        <div class="mt-3">
                            <h3 class="text-xl font-bold">
                                {{ $job->company->name }}
                            </h3>

                            <a href="{{ $job->company->website }}"
                               target="_blank"
                               class="text-xs text-slate-500 hover:underline inline-flex items-center gap-1 mt-1">
                                Visit company website
                            </a>
                        </div>

                        <a href="{{ $job->apply_url ?? $job->company->website }}"
                           target="_blank"
                           class="mt-3 inline-block w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                            Apply
                        </a>

                    </div>


                    {{-- JOB OVERVIEW --}}
                    <div class="border rounded-lg shadow p-4">

                        <h3 class="font-bold mb-3 flex items-center gap-2">
                            <span>ℹ️</span>
                            Job Overview
                        </h3>

                        <div class="space-y-3 text-sm">

                            <div class="flex justify-between">
                                <span class="text-slate-500">Location</span>
                                <span class="font-medium">
                                    {{ $job->location->name }}
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-slate-500">Level</span>
                                <span class="font-medium">
                                    {{ $job->level->name }}
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-slate-500">Type</span>
                                <span class="font-medium">
                                    {{ $job->type ?? 'Full-time' }}
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-slate-500">Category</span>
                                <span class="font-medium">
                                    {{ $job->categories->first()->name ?? '-' }}
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-slate-500">Posted</span>
                                <span class="font-medium">
                                    {{ $job->created_at->format('M d, Y') }}
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-slate-500">Expire</span>
                                <span class="font-medium">
                                    {{ optional($job->expires_at)->format('M d, Y') ?? '-' }}
                                </span>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
