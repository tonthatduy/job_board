/**
 * Modal xác nhận xóa (admin jobs index) — không dùng window.confirm.
 */
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("admin-delete-modal");
    const form = document.getElementById("admin-delete-form");
    if (!modal || !form) {
        return;
    }

    const titleEl = document.getElementById("admin-delete-modal-title");
    const confirmBtn = document.getElementById("admin-delete-confirm");
    const openButtons = document.querySelectorAll("[data-admin-delete-open]");

    const close = () => {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
        document.body.classList.remove("overflow-hidden");
    };

    const open = () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        document.body.classList.add("overflow-hidden");
    };

    openButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
            const url = btn.getAttribute("data-url");
            const title = btn.getAttribute("data-title") || "";
            if (!url) {
                return;
            }
            form.setAttribute("action", url);
            if (titleEl) {
                titleEl.textContent = title;
            }
            open();
        });
    });

    modal.querySelectorAll("[data-admin-delete-close]").forEach((el) => {
        el.addEventListener("click", close);
    });

    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            close();
        }
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && !modal.classList.contains("hidden")) {
            close();
        }
    });

    if (confirmBtn) {
        confirmBtn.addEventListener("click", () => form.submit());
    }
});
