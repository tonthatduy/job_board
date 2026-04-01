document.addEventListener("DOMContentLoaded", function () {
    // --- 1. QUẢN LÝ MODAL ---
    const modal = document.getElementById("jobModal");
    const openBtn = document.getElementById("openModalBtn");
    const closeBtn = document.getElementById("closeModalBtn");
    const cancelBtn = document.getElementById("cancelBtn");

    if (openBtn && modal) {
        openBtn.addEventListener("click", () => {
            modal.classList.remove("hidden");
            document.body.style.overflow = "hidden";
        });

        const closeModal = () => {
            modal.classList.add("hidden");
            document.body.style.overflow = "auto";
        };

        [closeBtn, cancelBtn].forEach((btn) =>
            btn?.addEventListener("click", closeModal),
        );
        window.addEventListener("click", (e) => {
            if (e.target === modal) closeModal();
        });
    }

    // --- 2. KHỞI TẠO CKEDITOR ---
    if (
        document.querySelector("#editor") &&
        typeof ClassicEditor !== "undefined"
    ) {
        ClassicEditor.create(document.querySelector("#editor"), {
            toolbar: [
                "heading",
                "|",
                "bold",
                "italic",
                "link",
                "bulletedList",
                "numberedList",
                "blockQuote",
                "undo",
                "redo",
            ],
        })
            .then((editor) => {
                window.jobEditor = editor;
            })
            .catch((err) => console.error("CKEditor Error:", err));
    }

    // --- 3. LOGIC FILE UPLOAD VS EDITOR ---
    const fileInput = document.querySelector('input[name="job_file"]');
    const editorContainer = document.getElementById("editor-container");

    if (fileInput && editorContainer) {
        fileInput.addEventListener("change", function () {
            if (this.files.length > 0) {
                editorContainer.style.opacity = "0.3";
                editorContainer.style.pointerEvents = "none";
            } else {
                editorContainer.style.opacity = "1";
                editorContainer.style.pointerEvents = "auto";
            }
        });
    }

    // --- 4. LOGIC BỘ LỌC (FILTER AJAX) ---
    const filterForm = document.getElementById("filterForm");
    const jobListContainer = document.getElementById("job-list-container");
    const activeFiltersContainer = document.getElementById(
        "active-filters-container",
    );

    if (filterForm) {
        // Lắng nghe sự kiện thay đổi Select
        filterForm.querySelectorAll("select").forEach((select) => {
            select.addEventListener("change", fetchFilteredJobs);
        });

        // Lắng nghe sự kiện gõ ô Search
        let typingTimer;
        const searchInput = filterForm.querySelector('input[name="search"]');
        if (searchInput) {
            searchInput.addEventListener("keyup", function () {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(fetchFilteredJobs, 500);
            });
        }
    }

    // Hàm gọi AJAX lấy dữ liệu
    function fetchFilteredJobs() {
        const formData = new FormData(filterForm);
        const queryString = new URLSearchParams(formData).toString();
        const url = `${filterForm.action}?${queryString}`;

        if (jobListContainer) jobListContainer.style.opacity = "0.5";
        window.history.pushState({}, "", url);

        fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } })
            .then((response) => response.text())
            .then((html) => {
                if (jobListContainer) {
                    jobListContainer.innerHTML = html;
                    jobListContainer.style.opacity = "1";
                    renderFilterTags(); // Vẽ lại Tag sau khi lọc xong
                }
            })
            .catch((error) => console.error("Lỗi filter:", error));
    }

    // Hàm vẽ các thẻ Tag (Badge)
    function renderFilterTags() {
        if (!activeFiltersContainer || !filterForm) return;

        let html = "";
        const selects = filterForm.querySelectorAll("select");
        const searchInput = filterForm.querySelector('input[name="search"]');

        // Tag cho ô Search
        if (searchInput && searchInput.value !== "") {
            html += createTagHtml(`Search: ${searchInput.value}`, "search");
        }

        // Tag cho các ô Select
        selects.forEach((select) => {
            if (select.value !== "") {
                const text = select.options[select.selectedIndex].text;
                html += createTagHtml(text, select.name);
            }
        });

        // Nút Reset All
        if (html !== "") {
            html += `<button type="button" id="resetAllBtn" class="text-sm text-blue-600 hover:underline ml-2">Reset all</button>`;
        }

        activeFiltersContainer.innerHTML = html;
    }

    // Hàm tạo chuỗi HTML cho 1 cái Tag (để code gọn hơn)
    function createTagHtml(text, name) {
        return `
            <div class="flex items-center gap-1 bg-slate-100 px-3 py-1 rounded-md border text-sm">
                <span>${text}</span>
                <button type="button" class="remove-filter text-slate-500 hover:text-red-500" data-name="${name}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>`;
    }

    // Lắng nghe sự kiện Click vào vùng chứa Tag (Event Delegation)
    if (activeFiltersContainer) {
        activeFiltersContainer.addEventListener("click", function (e) {
            // 1. Xử lý nút X (Xóa 1 filter)
            const removeBtn = e.target.closest(".remove-filter");
            if (removeBtn) {
                const fieldName = removeBtn.getAttribute("data-name");
                const field = filterForm.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    field.value = "";
                    fetchFilteredJobs();
                }
                return;
            }

            // 2. Xử lý nút Reset All
            if (e.target.id === "resetAllBtn") {
                filterForm.reset();
                filterForm
                    .querySelectorAll("select")
                    .forEach((s) => (s.value = ""));
                filterForm.querySelector('input[name="search"]').value = "";
                fetchFilteredJobs();
            }
        });
    }

    // Gọi lần đầu để hiện tag nếu URL đã có sẵn param
    renderFilterTags();
});
