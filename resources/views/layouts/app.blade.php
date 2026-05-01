<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MFC-Connect | Balloons & Party Needs' }}</title>
    <link rel="icon" href="/assets/icons/favicon/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/icons/favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/assets/icons/favicon/android-chrome-512x512.png">
    <link rel="stylesheet" href="/assets/css/global.css">
    @if (($showShell ?? true) === true)
        <link rel="stylesheet" href="/assets/css/header-footer.css">
    @endif
    @stack('styles')
</head>
<body>
    @if (($showShell ?? true) === true)
        @include('partials.nav')
    @endif

    @yield('content')

    @if (($showShell ?? true) === true)
        @include('partials.footer')
    @endif

    @stack('scripts')
</body>
</html>
