<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


      <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    
    <!--====== Javascripts & Jquery ======-->
  <script src="{{ asset('js/jquery-2.1.4.min.js')}}" defer></script>
  <script src="{{ asset('js/bootstrap.min.js')}}" defer></script>
  <script src="{{ asset('js/magnific-popup.min.js')}}" defer></script>
  <script src="{{ asset('js/owl.carousel.min.js')}}" defer></script>
  <script src="{{ asset('js/circle-progress.min.js')}}" defer></script>
  <script src="{{ asset('js/main.js')}}" defer></script>


</head>
<body>

    <!-- Page Preloder -->
  <div id="preloder">
        <div class="loader">
          <img src="img/logo.png" alt="">
          <h2>Loading.....</h2>
        </div>
      </div>

    <!-- Header section -->
  <header class="header-section">
        <div class="logo">
          <img src="img/logo.png" alt=""><!-- Logo -->
        </div>
        <!-- Navigation -->
        <div class="responsive"><i class="fa fa-bars"></i></div>
        <nav>
          <ul class="menu-list">
            <li class="{{ request()->is('*/') ? 'active' : '' }}"><a href="/">Home</a></li>
            <li class="{{ request()->is('*services') ? 'active' : '' }}"><a href="/services">Services</a></li>
            <li class="{{ request()->is('*blog') ? 'active' : '' }}"><a href="/blog">Blog</a></li>
            <li class="{{ request()->is('*contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
            <li class="{{ request()->is('*elements') ? 'active' : '' }}"><a href="/elements">Elements</a></li>
            <li><a href="/admin/projects">Edit</a></li>
          </ul>
        </nav>
      </header>
      <!-- Header section end -->


    <div id="app">
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
