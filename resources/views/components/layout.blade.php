<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@stack('title')</title>
</head>

<body>
    <x-navbar />
    {{ $slot }}
</body>

</html>
