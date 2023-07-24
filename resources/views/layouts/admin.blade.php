<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dream Shop</title>
     <!--bootstrap {{ config('app.name', 'T-shop') }}-->
     <link rel="stylesheet" href="{{asset('frontend/bootstrap/bootstrap.min.css')}}"/>
     <link rel="stylesheet" href="{{asset('admin/css/bootstrap.css')}}"/>
     <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}"/>
   
    <!--     Fonts and icons     -->
      <!-- fontAswome -->
   <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.min.css')}}">
     <!-- fontAswome -->
    
    <link rel="stylesheet" href="{{asset('admin/fontawsome/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
   <!--Css file-->
   
   <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
   <link rel="stylesheet" href="{{asset('admin/css/material-dashboard.css')}}">
   <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="wrapper ">
    @include('layouts.inc.sidebar')
    <div class="main-panel">
             @include('layouts.inc.navbar')
             <div class="content">
                @yield('content')
            </div>
            @include('layouts.inc.adminfooter')
    </div>
     
</div>
    
<!--   Core JS Files   -->

<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('admin/js/perfect-scrollbar.jquery.min.js')}}"></script>


<!---font-awsome-->
<script src="{{asset('frontend/js/fontawesome.js')}}"></script>
<script src="{{asset('frontend/js/fontawesome.min.js')}}"></script>
<script src="{{asset('frontend/js/all.min.js')}}"></script>

<!---font-awsome-->

  <!--bootstrap js-->
  <script src="{{asset('admin/js/bootstrap.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/bootstrap/bootstrap.bundle.min.js')}}"></script>

<!--sweet -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
<script>
swal("{{session('status')}}");
</script>
@endif

    @yield('scripts')
</body>
</html>
