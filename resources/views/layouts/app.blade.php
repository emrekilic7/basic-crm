<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') === 'Laravel' ? 'basic-crm' : config('app.name') }}</title>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireStyles
</head>
<body class="bg-white dark:bg-gray-900">
    @include('layouts.partials.nav')

    <main class="pt-8 pb-16">
        {{ $slot }}
    </main>

    @include('layouts.partials.footer')

    @livewireScripts

    <script>
        const sweetAlertFire = function(e) {
            Swal.fire({
                title: e.detail.title
                , icon: e.detail.icon
                , iconColor: e.detail.iconColor
                , timer: 3000
                , toast: true
                , position: 'top-right'
                , timerProgressBar: true
                , showConfirmButton: false
            , });
        }

        window.addEventListener('created', sweetAlertFire, false);
        window.addEventListener('updated', sweetAlertFire, false);
        window.addEventListener('deleted', sweetAlertFire, false);
        window.addEventListener('restored', sweetAlertFire, false);
    </script>

    @stack('scripts')
</body>
</html>