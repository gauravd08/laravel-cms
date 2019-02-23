<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"><img src="/assets/frontend/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                         <?php echo isset($modules['Home Menus'])?$modules['Home Menus']:'' ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{$social_links['facebook_link']}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="nav-item"><a href="{{$social_links['twitter_link']}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="nav-item"><a href="{{$social_links['instagram_link']}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li class="nav-item"><a href="{{$social_links['google_link']}}" target="_blank"><i class="fa fa-google"></i></a></li>
                        <li class="nav-item"><a href="{{$social_links['pinterest_link']}}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                        <li style="display:none" class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
                    </ul>
                </div> 
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->
