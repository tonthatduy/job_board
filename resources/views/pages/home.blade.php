<x-layouts.app>

    <x-hero />
    <x-job-filter />
    <section class="mt-4 px-4" id="job-list-container">
        <x-job-list :jobs="$jobs" />
    </section>
    <x-footer-subcribe />
    <x-footer />

</x-layouts.app>
