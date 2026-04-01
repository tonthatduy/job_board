@props(['jobs'])


    <div class="max-w-screen-lg mx-auto">
    <div class="grid grid-cols-1 gap-4">
        @forelse($jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <div class="text-center py-10 text-slate-500">
                Không tìm thấy công việc phù hợp.
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</div>


