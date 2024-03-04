<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=".">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title ?? 'Jersipedia'}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"/>
</head>
<body>
<div class="page">
    @include('layout.header')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                @yield('main', $slot ?? '')
            </div>
        </div>
    </div>
    @include('layout.footer')
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js" data-navigate-once></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script>
    window.addEventListener('toast', event => {
        iziToast.show({
            message: event.detail.message,
            color: event.detail.success === true ? 'green' : 'red',
            close: true,
            position: 'topCenter',
            timeout: 3000,
            progressBar: false,
            animateInside: false,
        });
    });
</script>
</body>
</html>
