<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R.star Dashboard</title>
    @include('layouts.styles')
    @livewireStyles
    @vite(['resources/js/app.js'])
    @stack('css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('layouts.nav')
        @include('layouts.sidebar')

        
        @yield('content')


        @livewireScripts

        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->

    @include('layouts.scripts')
    @stack('scripts')


</body>

</html>
