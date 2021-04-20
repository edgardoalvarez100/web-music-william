<header>
    <!-- start navigation -->
    <nav
        class="navbar navbar-default bootsnav navbar-top header-dark background-transparent nav-box-width white-link padding-four-lr menu-logo-center navbar-expand-lg">
        <div class="container-fluid nav-header-container">
            <!-- start logo -->
            <div class="center-logo">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('assets/images/logo.svg') }}" style="height: 98px;">
                </a>
            </div>
            <!-- end logo -->
            <div class="col col-lg-12 accordion-menu">
                <button type="button" class="navbar-toggler collapsed menu_bars" data-toggle="collapse">
                    <span class="sr-only">toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-collapse collapse justify-content-between" id="navbar-collapse-toggle-1">
                    <ul class="nav navbar-nav alt-font text-normal width-40 md-width-100 sm-text-left" data-in="fadeIn"
                        data-out="fadeOut">
                        <!-- start menu item -->
                        <li><a href="https://music.apple.com/us/artist/" target="_blank">iTunes</a></li>
                        <li><a href="https://open.spotify.com/artist/" target="_blank">Spotify</a>
                        </li>
                        <li><a href="#" target="_blank">YouTube</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right no-margin alt-font text-normal width-40 md-width-100 justify-content-end"
                        data-in="fadeIn" data-out="fadeOut">
                        <li><a href="#" title="Menu" class="pmenu menu_bars">Menu <span class="MENU_"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navigation -->
</header>
<aside class="navigation">
    <div class="close_nav relative"></div>



    <ul class="parent">
        <li><a href="#about" class="inner-link closnav">About</a></li>
        <li><a href="#music" class="inner-link closnav">Music</a></li>



    </ul>
</aside>
