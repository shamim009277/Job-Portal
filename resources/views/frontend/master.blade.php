<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!--<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">-->   
    <link rel="stylesheet" href="{{asset('frontend/fonts/icomoon/style.css')}}">
    <link href="{{asset('admin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/summernote.main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.cs')}}s">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">    
    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">  
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/editor/fonts/icomoon/style.css')}}">
    

   @stack('css')    
  </head>
  <body>
  
  <div class="site-wrap">
  
  @include('frontend.partial.topbar')
  
   @yield('content')
    
  @include('frontend.partial.footer')
   
</div>

  <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
  <script src="{{asset('frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/summernote.main.js')}}"></script>
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>
  <script src="{{asset('frontend/js/mediaelement-and-player.min.js')}}"></script>
  <script src="{{asset('frontend/js/main.js')}}"></script>
  
  
@stack('scripts')
  </body>
</html>