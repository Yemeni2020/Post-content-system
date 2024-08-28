{{-- vertical-menu --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('/')}}"
  data-template="vertical-menu-template">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"/>

    <!-- Styles & Icons -->
    @include('layouts.partials.style')
    <!--/Styles & Icons -->
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
    <!-- navbar and aside -->
    @include('layouts.partials._navbar')
    <!--/ navbar and aside  -->

    <!-- Page Content -->
    <div class="container">
        @yield('content')
</div>
    <!-- /Page Content -->
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->


    <!-- footer -->
    @include('layouts.partials._footer')
    <!-- /footer -->

        </div>
    </div>
    <!-- script -->
    @include('layouts.partials.script')
    <!-- /script -->

</body>
