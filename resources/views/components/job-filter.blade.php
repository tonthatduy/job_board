
<section class="mt-10 px-4">
    <form action="{{ route('pages.home') }}" method="GET" id="filterForm">
        <div class="max-w-screen-lg mx-auto grid grid-cols-12 gap-4">

            <div class="col-span-12 lg:col-span-3">
                <div class="relative">
                    <input
                        type="text"
                        name="search"
                        id="searchInput"
                        value="{{ request('search') }}"
                        placeholder="Search job title..."
                        class="w-full h-10 pl-9 pr-3 rounded-lg border border-slate-300 bg-transparent text-sm focus:border-slate-500 focus:outline-none"
                    >
                </div>
            </div>

            <div class="col-span-12 lg:col-span-9 grid grid-cols-1 lg:grid-cols-4 gap-4">
                <select name="location" class="filter-select">
                    <option value="">All locations</option>
                    @foreach($locations as $loc)
                        <option value="{{ $loc->id }}" {{ request('location') == $loc->id ? 'selected' : '' }}>
                            {{ $loc->name }}
                        </option>
                    @endforeach
                </select>

                <select name="category" class="filter-select">
                    <option value="">All categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>

                <select name="level" class="filter-select">
                    <option value="">All levels</option>
                    @foreach($levels as $lv)
                        <option value="{{ $lv->id }}" {{ request('level') == $lv->id ? 'selected' : '' }}>
                            {{ $lv->name }}
                        </option>
                    @endforeach
                </select>

                <select name="sort" class="filter-select">
                    <option value="">Default</option>
                    <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>⬆ Title</option>
                    <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>⬇ Title</option>
                    <option value="salary_from_asc" {{ request('sort') == 'salary_from_asc' ? 'selected' : '' }}>⬆ Salary From</option>
                    <option value="salary_from_desc" {{ request('sort') == 'salary_from_desc' ? 'selected' : '' }}>⬇ Salary From</option>
                    <option value="salary_to_asc" {{ request('sort') == 'salary_to_asc' ? 'selected' : '' }}>⬆  Salary To</option>
                    <option value="salary_to_desc" {{ request('sort') == 'salary_to_desc' ? 'selected' : '' }}>⬇ Salary To</option>
                </select>
            </div>
        </div>
        <div id="active-filters-container" class="max-w-screen-lg mx-auto mt-4 flex flex-wrap items-center gap-2">
        </div>
    </form>
</section>
