<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    @yield('tags')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ url('assets/newimages/Fav-Icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/night" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/webStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <meta property="og:title" content="Click Invitation" />
    <meta property="og:description" content="the best Guest management tools. digital invitation" />
    <meta property="og:locale" content="en_CA" />
    <meta property="og:site_name" content="Click Invitation" />
    <meta property="og:url" content="https://clickinvitation.com" />
    <meta property="og:type" content=website />
    <meta property="og:image" content="https://clickinvitation.com/assets/newimages/Group%201.svg" />
    <meta property="article:publisher" content="https://www.facebook.com/click4invitation" />
    <meta property="og:image:width" content="1080" />
    <meta property="og:image:height" content="1080" />
    <meta property="og:title" content="ClickInvitation" />

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>

<body>

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <nav class="site-navbar">

                    <ul>
                        <li><a href="/events">{{ __('new_home.Events') }}</a></li>
                        <li><a href="/features">{{ __('new_home.Features') }}</a></li>
                        <li><a href="/about">{{ __('new_home.About') }} </a></li>
                        <li><a href="/contact">{{ __('new_home.Contact') }}</a></li>
                        <li><a href="/blog">{{ __('new_home.Blogs') }}</a></li>
                        <li><a href="/tutorial">{{ __('new_home.Tutorial') }}</a></li>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">signup</a></li>
                    </ul>
                    <a href="/" class="site-logo"><img src="/assets/images/logo.svg" alt="click-invitation"></a>
                    <div class="dropdown-menu">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                    {{ $language }}</a>
                            @endif
                        @endforeach
                    </div>
                    </li>
                    @guest
                        <span class="header-buttons">
                            <button class="login"> <a href="/login" style="text-decoration: none; color:black;">
                                    {{ __('new_home.Login') }}</a> </button>
                            <a class="register" href="/register"
                                style="text-decoration: none; color:black;">{{ __('new_home.Register') }}</a>
                        </span>
                    @endguest
                    @auth
                        <span class="header-buttons">
                            <a class="register" href="{{ route('panel.index') }}" style="text-decoration: none; color:black;">{{ __('new_home.Panel') }}</a>
                            <button class="login"> <a href="{{ route('web.logout') }}" style="text-decoration: none; color:black;">{{ __('new_home.Logout') }}</a> </button>
                        </span>
                    @endauth

                    <button class="nav-toggler">
                        <span>

                        </span>
                    </button>
                </nav>
            </div>
        </div>
    </header>



    @yield('content')


    <div class="container">
        @include('Website.Layouts.footer')
    </div>
    </div>
    </div>

    <script src="assets/newjs/index.js"></script>
    <script src="assets/newjs/script.js"></script>
    <script src="assets/js/contact.js"></script>
    <script type="text/javascript"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 10,
            infinite: false,
            autoplaySpeed: 1000,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        $('#register').click(function() {
            window.location.href = "{{ url('/register') }}";
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script>
        $('.slider').slick({
            centerMode: true,
            dots: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>

</body>

</html>
