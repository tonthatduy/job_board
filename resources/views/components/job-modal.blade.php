<div id="jobModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

        <div class="flex items-center justify-between p-6 border-b">
            <h3 class="text-xl font-semibold text-gray-800">Post a New Job</h3>
            <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Job Title <span class="required">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="mt-1 block w-full border @error('title') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Apply URL <span class="required">*</span></label>
                    <input type="url" name="apply_url" value="{{ old('apply_url') }}" required class="mt-1 block w-full border @error('apply_url') border-red-500 border-gray-300 @enderror rounded-md shadow-sm p-2">
                    @error('apply_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Salary From ($)</label>
                    <input type="number" name="salary_from" value="{{ old('salary_from') }}" min=0  class="mt-1 block w-full border @error('salary_from') border-red-500 border-gray-300 @enderror rounded-md shadow-sm p-2">
                    @error('salary_from')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Salary To ($)</label>
                    <input type="number" name="salary_to" value="{{ old('salary_to') }}" min=0  class="mt-1 block w-full border @error('salary_to') border-gray-300 @enderror rounded-md shadow-sm p-2">
                    @error('salary_to')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Company <span class="required">*</span></label>
                    <select name="company_id" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">Choose Company...</option> @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Location <span class="required">*</span></label>
                    <select name="location_id" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">Choose Location...</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Level <span class="required">*</span></label>
                   <select name="level_id" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">Choose Level...</option>
                        @foreach($levels as $level)
                            <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Categories <span class="required">*</span></label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 p-3 border border-gray-200 rounded-md bg-gray-50">
                    @foreach($categories as $category)
                        <div class="flex items-center">
                            <input type="checkbox"
                                name="category_ids[]"
                                value="{{ $category->id }}"
                                {{ in_array($category->id, old('category_ids', [])) ? 'checked' : '' }}
                                id="cat_{{ $category->id }}"
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="cat_{{ $category->id }}" class="ml-2 text-sm text-gray-600 cursor-pointer">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('category_ids')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
</div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Job Type</label>
                    <select name="type" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Internship">Internship</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Expired At <span class="required">*</span></label>
                    <input type="date" name="expired_at" value="{{ old('expired_at') }}" required class="mt-1 block w-full border @error('expired_at') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm p-2">
                    @error('expired_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="checkbox" name="is_remote" id="is_remote" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label for="is_remote" class="ml-2 block text-sm text-gray-900">This is a Remote position</label>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Or write Job Description manually:
                    </label>

                    @error('job_description_error')
                        <div class="p-3 mb-3 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <div id="editor-container">
                        <textarea name="description_manual" id="editor">{{ old('description_manual') }}</textarea>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">* If you upload a file, manual text will be ignored.</p>
                </div>

                <div class="bg-blue-50 p-4 rounded-lg border-2 border-dashed border-blue-200">
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Upload Job Description (.docx) <span class="required">*</span></label>
                    <p class="text-xs text-blue-600 mb-2 italic">Format will be preserved automatically</p>
                    <input type="file" name="job_file" accept=".docx" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">

                    @error('job_file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="pt-4 border-t flex justify-end gap-3">
                <button type="button" id="cancelBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800 font-medium">Cancel</button>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-800 transition">Post Job Now</button>
            </div>
        </form>
    </div>
</div>
