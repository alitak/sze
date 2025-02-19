<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">

@include('layouts.header')

<!-- Page Title -->
<section class="py-10 bg-gray-200">
    <div class="container mx-auto text-center">
        <h1 class="text-3xl font-semibold">
            {{ $title }}
        </h1>
    </div>
</section>

<!-- Content (flex-grow ensures it takes available space) -->
<main class="container mx-auto py-8 px-4 flex-grow">
    @yield('content')
</main>

@include('layouts.footer')

</body>
</html>
