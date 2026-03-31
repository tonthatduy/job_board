@props(['jobs'])

<section class="mt-4 px-4">
    <div class="max-w-screen-lg mx-auto">
        <div class="grid grid-cols-1 gap-4">

            @foreach($jobs as $job)
                <x-job-card :job="$job" />
            @endforeach

        </div>
    </div>
</section>
