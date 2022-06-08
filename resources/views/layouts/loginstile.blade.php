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

        <script src="{{ asset('js/app.js?v=1.0.1') }}" defer></script>
        
        <script src="{{ asset('js/common.js?v=1.0.1') }}" defer></script>

        <!-- biblioteca jQuery --> 
        <script  src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js" > </script>
    
        @yield('scripts')
    
    </body>
</html>
