<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="admin/css/bootstrap.css"/>
    <link rel="stylesheet" href="admin/css/bootstrap.min.css"/>
    

    <link rel="stylesheet" href="{{asset('frontend/bootstrap/bootstrap.min.css')}}"/>
    <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
   <!--Css file-->

   <link rel="stylesheet" href="{{asset('frontend/bootstrap/owl.carousel.min.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/bootstrap/owl.theme.default.min.css')}}">
  
  <!--bootstrap-->
   <!-- fontAswome -->
   <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.min.css')}}">
     <!-- fontAswome -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  <!--google regular font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body >

@include('layouts.inc.frontnavbar')

<div class="content">

   @yield('content')
</div>

<div class="footer">
<div class="whatsapp-chat ">
 <a href="https://wa.me/+8801625646250?text=I'm%20interested%20in%20your%20car%20for%20sale" target="blank">
 <img src="{{asset('frontend/logo/logos.png')}}" alt="whatsapp" width="80px" height="80px">
 </a>

</div>

</div>

    



<script src="{{asset('admin/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>


<script src="{{asset('frontend/bootstrap/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('frontend/js/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <!--bootstrap js-->

<script src="{{asset('frontend/js/checkout.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
<!--<script src="{{asset('frontend/js/jquery-3.6.0.js')}}"></script>-->
<!---font-awsome-->
<script src="{{asset('frontend/js/fontawesome.js')}}"></script>
<script src="{{asset('frontend/js/fontawesome.min.js')}}"></script>
<script src="{{asset('frontend/js/all.min.js')}}"></script>

<!---font-awsome-->
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script>
 
    var availableTags = [];
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
    $.ajax({
             method:"GET",
             url:"/productlist",                 
                success:function(response){
                 //console.log(response)
                    //swal(response.status);
                    startAutoComplete(response)
                    }
        }); 
        function startAutoComplete(availableTags)
        {
          $( "#search_product" ).autocomplete({
        source: availableTags
        });

        }
    

  </script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/647ce4f97957702c744bba31/1h23tssfh';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


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

