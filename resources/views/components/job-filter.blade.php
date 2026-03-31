<section class="mt-10 px-4">
    <div class="max-w-screen-lg mx-auto grid grid-cols-12 gap-4">

        <!-- Search -->
        <div class="col-span-12 lg:col-span-3">
            <div class="relative">
                <input
                    type="text"
                    name="search"
                    placeholder="Search..."
                    class="w-full h-10 pl-9 pr-3 rounded-lg border border-slate-300 bg-transparent text-sm focus:border-slate-500 focus:outline-none"
                >

                <div class="absolute left-0 top-0 h-full w-10 flex items-center justify-center text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path></svg>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="col-span-12 lg:col-span-9 grid grid-cols-1 lg:grid-cols-4 gap-4">

            <!-- Location -->
            <select name="location" class="filter-select">
                <option value="">All locations</option>
                <option>San Francisco</option>
                <option>London</option>
                <option>New York</option>
            </select>

            <!-- Category -->
            <select name="category" class="filter-select">
                <option value="">All categories</option>
                <option>Design</option>
                <option>Engineer</option>
                <option>Marketing</option>
            </select>

            <!-- Level -->
            <select name="level" class="filter-select">
                <option value="">All levels</option>
                <option>Junior</option>
                <option>Middle</option>
                <option>Senior</option>
            </select>

            <!-- Sort -->
            <select name="sort" class="filter-select">
                <option value="">Default</option>
                <option value="job_title">⬆ Title</option>
                <option value="-job_title">⬇ Title</option>
            </select>

        </div>
    </div>
</section>
