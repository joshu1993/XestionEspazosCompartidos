<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
@section('header')

@include('layouts.header')

@show
</head>
<body>
    <div id="app" name="app">
        @guest
            
        @else
                @section('menus')  

                @include('layouts.topbar')
                
                
               

            @show
            
        @endguest

        <div class="main-content">
            

                @yield('content')

           
        </div>
    </div>

    <!-- Scripts -->

    <!--
    <script src="../public/js/app.js" defer></script>
    <script src="../public/js/common.js" defer></script>
-->

    <script src="{{ asset('js/app.js?v=1.0.1') }}"></script>
    <script src="{{ asset('js/common.js?v=1.0.0') }}"></script>
    <script src = "https://code.iconify.design/2/2.0.3/iconify.min.js"> </script>
    <!--multiselect-->
<link defer rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    
    
<!-- buttons -->
<!--
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>    
-->
    <!-- biblioteca jQuery 
    <script  src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js" > </script>
-->

     <!--<script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script> -->

<!--
    <script src="http://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>
     -->   
    @yield('scripts')
   

    
</body>
</html>
