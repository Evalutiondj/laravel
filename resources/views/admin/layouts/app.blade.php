<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/corporate-ui-dashboard.css') }}" rel="stylesheet" />
</head>
<body class="g-sidenav-show bg-gray-100">
    
    @include('admin.layouts.sidebar')
    <main class="main-content position-relative border-radius-lg">
        @include('admin.layouts.navbar')
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
