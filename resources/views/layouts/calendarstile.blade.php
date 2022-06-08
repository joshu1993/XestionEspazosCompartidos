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
                
                @section('menus')  

                @include('layouts.homestile')
                
                @show
                
            @endguest

            <div class="main-content">
                
                @yield('content')   
            
            </div>
        </div>

        <script src="{{ asset('js/app.js?v=1.0.1') }}"></script>
        <script src="{{ asset('js/common.js?v=1.0.0') }}"></script>
        <script src = "https://code.iconify.design/2/2.0.3/iconify.min.js"> </script>
        
        @yield('scripts')
        
    </body>
</html>
