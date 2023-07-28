<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    @livewireStyles
</head>
<body class="bg-white dark:bg-gray-900">
    @include('layouts.partials.nav')
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24">
        {{ $slot }}
    </main>
    @include('layouts.partials.footer')
    @livewireScripts
</body>
</html>