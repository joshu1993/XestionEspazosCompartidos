<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@section('header')

@include('layouts.header')

@show
</head>
<body>
    <div id="app" name="app">
      
        <div class="main-content login-page">
            <div id="inner-content" class="container">

                @yield('content')

            </div>
        </div>
    </div>

    <!-- Scripts -->

    <!--
    <script src="../public/js/app.js" defer></script>
    <script src="../public/js/common.js" defer></script>
    <script src="../public/js/menu.js" defer></script>
    -->

    <script src="{{ asset('js/app.js?v=1.0.1') }}" defer></script>
    
    <script src="{{ asset('js/common.js?v=1.0.1') }}" defer></script>

    <!-- <script src="{{ asset('js/menu.js') }}" defer></script> -->

    
    <!--<script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>-->

    <!-- biblioteca jQuery --> 
    <script  src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js" > </script>

<!--
    <script src="http://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
 -->    
    @yield('scripts')
   

    
</body>
</html>
