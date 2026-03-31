<x-layouts.app>

   <x-job-detail-hero :job="$job" />
   <x-job-detail-body :job="$job" />

   <div class="max-w-screen-lg mx-auto">
    @if($relatedJobs->isNotEmpty())
    <div class="mt-10 mx-auto">
        <span class="block text-xl lg:text-3xl font-semibold">Related jobs</span>

        <div class="space-y-3 mt-5">
            @foreach($relatedJobs as $job)
                <x-job-card :job="$job" />
            @endforeach
        </div>
    </div>
    @endif
   </div>

   <x-footer />


</x-layouts.app>
