<!doctype html>
<html lang="en">
@include('layout.head')

<body>
    @include('sweetalert::alert')
    {{-- header --}}
    @include('layout.navbar')

    @yield('content')

    {{-- footer --}}
    @include('layout.footer')

    {{-- add internal script --}}
    @yield('scripts')

</body>

</html>
