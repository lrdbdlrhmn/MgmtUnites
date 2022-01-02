<!DOCTYPE html>
<html>
<head>
  <title>Armées Nationale </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

  {!! Html::style('assets/css/style.css') !!}
  <!-- end plugin css -->

  <!-- plugin css -->
  @stack('plugin-styles')
<style>
    .preloader 
{
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('{{ asset('/images/logo.png')}}') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
  </style>
  @stack('style')
</head>
<body data-base-url="{{url('/')}}">
  <div class="container-scroller" id="app">

    <div class="container-fluid page-body-wrapper full-page-wrapper">
     
      @yield('content')
    </div>
  </div>

    <!-- base js -->
    {!! Html::script('assets/js/script.js') !!}
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    @stack('custom-scripts')

    <script>
      $(window).load(function() 
  {          
                   $("#preloaders").fadeOut(2000);
     });
     </script>
</body>
</html>