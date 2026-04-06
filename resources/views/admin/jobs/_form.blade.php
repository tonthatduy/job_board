@php
    /** @var \App\Models\Job|null $job */
    $isEdit = $job !== null;
    $field = 'w-full rounded-xl border border-slate-200 bg-slate-50/40 px-4 py-2.5 text-sm text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-indigo-500/15';
    $label = 'mb-1.5 block text-sm font-medium text-slate-700';
@endphp

<div class="space-y-8">
    <section class="rounded-2xl border border-slate-100 bg-slate-50/50 p-5 ring-1 ring-slate-900/[0.04] sm:p-6">
        <h2 class="mb-4 flex items-center gap-2 text-sm font-bold uppercase tracking-wide text-indigo-900/80">
            <span class="h-1 w-4 rounded-full bg-indigo-500"></span>
            Thông tin chung
        </h2>
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="title" class="{{ $label }}">Tiêu đề <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $job->title ?? '') }}" required
                       class="{{ $field }} @error('title') border-red-300 focus:border-red-500 focus:ring-red-500/15 @enderror">
                @error('title')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
            </div>

            @if($isEdit)
                <div class="md:col-span-2">
                    <label for="slug" class="{{ $label }}">Slug (URL) <span class="text-red-500">*</span></label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $job->slug) }}" required
                           class="{{ $field }} font-mono text-xs sm:text-sm @error('slug') border-red-300 focus:border-red-500 focus:ring-red-500/15 @enderror"
                           pattern="[a-zA-Z0-9]+(-[a-zA-Z0-9]+)*"
                           title="Chữ, số và dấu gạch ngang">
                    <p class="mt-1 text-xs text-slate-500">Lưu sẽ chuẩn hóa về chữ thường.</p>
                    @error('slug')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
                </div>
            @endif

            <div>
                <label for="company_id" class="{{ $label }}">Công ty <span class="text-red-500">*</span></label>
                <select name="company_id" id="company_id" required class="{{ $field }} cursor-pointer @error('company_id') border-red-300 @enderror">
                    <option value="">— Chọn công ty —</option>
                    @foreach($companies as $c)
                        <option value="{{ $c->id }}" @selected(old('company_id', $job->company_id ?? '') == $c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
                @error('company_id')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="location_id" class="{{ $label }}">Địa điểm <span class="text-red-500">*</span></label>
                <select name="location_id" id="location_id" required class="{{ $field }} cursor-pointer @error('location_id') border-red-300 @enderror">
                    <option value="">— Chọn địa điểm —</option>
                    @foreach($locations as $l)
                        <option value="{{ $l->id }}" @selected(old('location_id', $job->location_id ?? '') == $l->id)>{{ $l->name }}</option>
                    @endforeach
                </select>
                @error('location_id')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="level_id" class="{{ $label }}">Cấp độ <span class="text-red-500">*</span></label>
                <select name="level_id" id="level_id" required class="{{ $field }} cursor-pointer @error('level_id') border-red-300 @enderror">
                    <option value="">— Chọn cấp độ —</option>
                    @foreach($levels as $lv)
                        <option value="{{ $lv->id }}" @selected(old('level_id', $job->level_id ?? '') == $lv->id)>{{ $lv->name }}</option>
                    @endforeach
                </select>
                @error('level_id')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="type" class="{{ $label }}">Loại hình <span class="text-red-500">*</span></label>
                <select name="type" id="type" required class="{{ $field }} cursor-pointer @error('type') border-red-300 @enderror">
                    @foreach(['Full-time', 'Part-time', 'Contract', 'Internship'] as $t)
                        <option value="{{ $t }}" @selected(old('type', $job->type ?? 'Full-time') === $t)>{{ $t }}</option>
                    @endforeach
                </select>
                @error('type')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="status" class="{{ $label }}">Trạng thái <span class="text-red-500">*</span></label>
                <select name="status" id="status" required class="{{ $field }} cursor-pointer @error('status') border-red-300 @enderror">
                    @foreach(['pending' => 'Chờ duyệt', 'published' => 'Đã đăng', 'expired' => 'Hết hạn'] as $val => $lbl)
                        <option value="{{ $val }}" @selected(old('status', $job->status ?? 'pending') === $val)>{{ $lbl }}</option>
                    @endforeach
                </select>
                @error('status')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="expired_at" class="{{ $label }}">Ngày hết hạn <span class="text-red-500">*</span></label>
                <input type="date" name="expired_at" id="expired_at" required
                       value="{{ old('expired_at', isset($job) && $job->expired_at ? $job->expired_at->format('Y-m-d') : '') }}"
                       class="{{ $field }} @error('expired_at') border-red-300 @enderror">
                @error('expired_at')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="md:col-span-2">
                <label for="apply_url" class="{{ $label }}">URL ứng tuyển <span class="text-red-500">*</span></label>
                <input type="text" name="apply_url" id="apply_url" value="{{ old('apply_url', $job->apply_url ?? '') }}" required
                       class="{{ $field }} @error('apply_url') border-red-300 @enderror"
                       placeholder="https://company.com/careers/...">
                @error('apply_url')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center gap-3 md:col-span-2 md:pt-2">
                <input type="hidden" name="is_remote" value="0">
                <label class="inline-flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-sm ring-1 ring-slate-900/[0.03] transition hover:border-indigo-200 hover:ring-indigo-500/10 has-[:checked]:border-indigo-300 has-[:checked]:bg-indigo-50/50">
                    <input type="checkbox" name="is_remote" value="1" id="is_remote"
                           class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                           @checked(old('is_remote', $job->is_remote ?? false))>
                    <span class="text-sm font-medium text-slate-700">Làm việc remote</span>
                </label>
            </div>
        </div>
    </section>

    <section class="rounded-2xl border border-slate-100 bg-white p-5 ring-1 ring-slate-900/[0.04] sm:p-6">
        <h2 class="mb-4 flex items-center gap-2 text-sm font-bold uppercase tracking-wide text-indigo-900/80">
            <span class="h-1 w-4 rounded-full bg-violet-500"></span>
            Danh mục
        </h2>
        @php
            $selectedCats = old('category_ids', isset($job) ? $job->categories->pluck('id')->all() : []);
        @endphp
        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($categories as $cat)
                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 bg-slate-50/40 px-4 py-3 text-sm transition hover:border-indigo-200 hover:bg-indigo-50/30 has-[:checked]:border-indigo-400 has-[:checked]:bg-indigo-50 has-[:checked]:ring-1 has-[:checked]:ring-indigo-200/60">
                    <input type="checkbox" name="category_ids[]" value="{{ $cat->id }}"
                           class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                           @checked(in_array($cat->id, $selectedCats, true))>
                    <span class="font-medium text-slate-800">{{ $cat->name }}</span>
                </label>
            @endforeach
        </div>
        @error('category_ids')<p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
        @error('category_ids.*')<p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
    </section>

    <section class="rounded-2xl border border-slate-100 bg-white p-5 ring-1 ring-slate-900/[0.04] sm:p-6">
        <h2 class="mb-4 flex items-center gap-2 text-sm font-bold uppercase tracking-wide text-indigo-900/80">
            <span class="h-1 w-4 rounded-full bg-emerald-500"></span>
            Mô tả & lương
        </h2>
        <div class="space-y-5">
            <div>
                <label for="description" class="{{ $label }}">Mô tả (HTML) <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="14" required
                          class="{{ $field }} min-h-[12rem] resize-y font-mono text-xs leading-relaxed sm:text-sm @error('description') border-red-300 @enderror">{{ old('description', $job->description ?? '') }}</textarea>
                <p class="mt-2 flex items-start gap-2 rounded-lg bg-amber-50 px-3 py-2 text-xs text-amber-900 ring-1 ring-amber-200/60">
                    <span class="shrink-0 font-semibold">Lưu ý:</span>
                    <span>Chỉ dán HTML từ nguồn tin cậy;</span>
                </p>
                @error('description')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="salary_from" class="{{ $label }}">Lương từ ($)</label>
                    <input type="number" name="salary_from" id="salary_from" min="0" value="{{ old('salary_from', $job->salary_from ?? '') }}"
                           class="{{ $field }} @error('salary_from') border-red-300 @enderror">
                    @error('salary_from')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="salary_to" class="{{ $label }}">Lương đến ($)</label>
                    <input type="number" name="salary_to" id="salary_to" min="0" value="{{ old('salary_to', $job->salary_to ?? '') }}"
                           class="{{ $field }} @error('salary_to') border-red-300 @enderror">
                    @error('salary_to')<p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>
    </section>
</div>
