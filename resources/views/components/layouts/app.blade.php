<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/job-modal.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="font-sans">

    <x-header />

    {{ $slot }}

   <x-job-modal />

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    @if($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const modal = document.getElementById("jobModal");
                if (modal) {
                    // 1. Hiện modal
                    modal.classList.remove("hidden");
                    // 2. Khóa cuộn trang chính
                    document.body.style.overflow = "hidden";

                    // 3. Cuộn đến thông báo lỗi đầu tiên để người dùng thấy ngay
                    const firstError = document.querySelector('.text-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
        </script>
    @endif


</body>
</html>
