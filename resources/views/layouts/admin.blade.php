<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

    <head>
        @include('Admin/partials/head')
    </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
        
        <!-- BEGIN HEADER -->
        @include('Admin/partials/header')
        <!-- END HEADER -->
        
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            
            <!-- BEGIN SIDEBAR -->
            @include('Admin/partials/sidebar')
            <!-- END SIDEBAR -->
            
            <!-- BEGIN CONTENT -->
            @yield('content')
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->
        
        @include('Admin/partials/footer')

        @include('Admin/partials/scripts')
        
    </body>

</html>