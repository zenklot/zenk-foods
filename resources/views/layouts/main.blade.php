<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.templates.header')
    <title>Restoran - Bootstrap Restaurant Template</title>
</head>

<body>
    <div class="container-xxl bg-white p-0" id="app">
        <!-- Spinner Start -->
        @include('layouts.templates.loading')
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            @include('layouts.templates.navbar')

            @yield('hero')
        </div>
        <!-- Navbar & Hero End -->

        {{-- Content Start --}}
        @yield('content')
        {{-- Content End --}}


        <!-- Footer Start -->
        @include('layouts.templates.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('layouts.templates.script')
</body>

</html>
