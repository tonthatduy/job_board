<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="font-sans">

    <x-header />

    {{ $slot }}

</body>
</html>
