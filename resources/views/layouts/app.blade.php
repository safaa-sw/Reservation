<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    @include('sweetalert::alert')
    @include('layouts.navbar')

    @yield('content')

    <br />
    <br />
    <br />


    @include('layouts.footer')

    @include('layouts.javascripts')
</body>

</html>
