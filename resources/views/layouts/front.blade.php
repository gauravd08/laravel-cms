<!doctype html>
<html lang="en">
    <head>
        @include('Frontend/partials/head')
    </head>

    <body>
        @include('Frontend/partials/header')
        
        @yield('content')
        
        @include('Frontend/partials/footer')        
        
        @include('Frontend/partials/scripts')
    </body>
</html>