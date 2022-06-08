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
                    
                    @include('layouts.rightmenu')
                
                @show
                
            @endguest

            <div class="main-content">
                
                @yield('content')

            </div>
        </div>

        <script src="{{ asset('js/app.js?v=1.0.1') }}"></script>
        <script src="{{ asset('js/common.js?v=1.0.0') }}"></script>
        <script src = "https://code.iconify.design/2/2.0.3/iconify.min.js"> </script>
        <!--multiselect-->
        <link defer rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    
        @yield('scripts')
        
    </body>
</html>
