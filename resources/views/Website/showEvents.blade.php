<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Invitation Dashboard</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="favicon.png" sizes="32x32">
    <link rel="stylesheet" href="{{ asset('assets/css/lib.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Panel/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/webStyle.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <style>
        section {
            background-color: #ffffff;
            padding-top: 0px;
            margin-top: 0px;
            padding: 0px 0px;
        }

        .container {
            max-width: 1440px;
        }

        .gif-box img {
            height: 100%;
        }

        button.slide-arrow.slick-arrow img {
            height: max-content !important;
        }

        .gif-box {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 70px 45px;
            background: #555555;
            margin-left: 60px;
            height: 80vh;
        }

        .page-design-hero-section {
            padding: 0px 0 0 50px;
        }

        .text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 100%;
            row-gap: 20px;
        }

        .text h2 {
            font-size: 50px;
            color: #4A4A4A;
        }

        .text p {
            color: #7A7A7A;
            font-size: 20px;
        }

        .customixe-img-box {
            height: 300px;
            width: 230px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            justify-content: flex-end;
            padding: 25px 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 5px 0px #00000040;
        }

        button.slide-arrow.slick-arrow {
            background: transparent;
            position: absolute;
            bottom: 50px;
            z-index: 99;
            right: -150px;
            top: auto !important;
            width: auto !important;
            height: auto !important;
        }

        button.slide-arrow.next-arrow.slick-arrow {
            right: -300px;
        }

        .slider-invitation-box-main .text {
            max-width: 70%;
            justify-content: flex-start;
            padding-top: 20px;
        }


        .slider-invitation-box-main {
            padding-top: 75px !important;
            padding-bottom: 75px !important;
        }

        .effortless-section-main .img-box img {
            height: 700px;
        }

        .effortless-section-main .img-box {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .effortless-section-main .text {
            align-items: flex-start;
            padding-left: 40px;
        }


        .all-template-box .text {
            text-align: center;
        }

        .all-template-box {
            padding: 75px 50px;
        }


        .all-customize-temp-boxes {
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            row-gap: 50px;
            column-gap: 50px;
            padding-top: 50px;
            justify-items: center;
            align-items: center;
        }

        .slider-invitation-box.slick-slide {
            display: flex;
            justify-content: flex-end;
        }


        .slick-list.draggable {
            overflow: visible;
            padding-left: 200px;
        }

        .col-lg-6.col-md-12.bg_color {
            background: white;
        }

        @media only screen and (max-width: 1600px) {
            .slick-list.draggable {
                overflow: hidden;
                padding-left: 0;
            }

            .customixe-img-box {
                height: 280px;
                width: 215px;
            }

            button.slide-arrow.slick-arrow {
                bottom: 20px;
            }

            .text h2 {
                font-size: 40px;
            }

            .text p {
                font-size: 18px;
            }

            .t-btn {
                font-size: 16px;
            }

            .effortless-section-main .img-box img {
                height: 450px;
            }


        }

        @media only screen and (max-width: 1400px) {

            .gif-box {
                height: 60vh;
            }

            button.slide-arrow.slick-arrow img {
                max-width: 80%;
            }

            button.slide-arrow.next-arrow.slick-arrow {
                right: -260px;
            }

            .text h2 {
                font-size: 35px;
            }

            .all-customize-temp-boxes {
                grid-template-columns: auto auto auto;
            }

            .customixe-img-box {
                height: 250px;
                width: 192px;
            }


        }

        @media only screen and (max-width: 1199px) {

            .slider-invitation-box-main .text {
                max-width: 95%;
            }

            button.slide-arrow.slick-arrow img {
                max-width: 70%;
            }

            button.slide-arrow.slick-arrow {
                right: -130px;
            }

            button.slide-arrow.next-arrow.slick-arrow {
                right: -230px;
            }
        }

        @media only screen and (max-width: 991px) {

            .page-design-hero-section .text {
                text-align: center;
                padding-bottom: 80px;
            }

            .page-design-hero-section .gif-box {
                margin: 0;
            }

            .page-design-hero-section {
                padding: 100px 0 0 0;
            }

            .slider-invitation-box.slick-slide {
                justify-content: center;
            }

            .slider-invitation-box-main .text {
                max-width: 100%;
                text-align: center;
                padding-bottom: 60px;
            }

            .slider-invitation-box-main .col-lg-6.col-md-12.custom_width {
                order: 2;
            }

            button.slide-arrow.slick-arrow {
                right: 130px;
                bottom: -40px;
            }

            button.slide-arrow.next-arrow.slick-arrow {
                right: 20px;
            }

            .effortless-section-main .text {
                align-items: center;
                padding-left: 0px;
                padding-bottom: 50px;
                text-align: center;
            }

            .effortless-section-main .img-box img {
                height: auto;
            }

            .all-template-box {
                padding: 75px 0px;
            }

        }

        @media only screen and (max-width: 767px) {
            .all-customize-temp-boxes {
                grid-template-columns: auto auto;
            }
        }

        @media only screen and (max-width: 575px) {

            .text h2 {
                font-size: 30px;
            }

            .text p {
                font-size: 15px;
            }

            .page-design-hero-section {
                padding: 50px 0 0 0;
            }

            .page-design-hero-section .text {
                padding-bottom: 50px;
            }

            .gif-box {
                height: fit-content;
                padding: 10px;
            }

            .slider-invitation-box-main {
                padding-top: 50px !important;
            }

            .slider-invitation-box-main .text {
                padding-bottom: 50px;
            }

            .customixe-img-box {
                height: 300px;
                width: 230px;
            }

            .all-template-box {
                padding: 50px 0px;
            }

            .all-customize-temp-boxes {
                grid-template-columns: auto auto;
                row-gap: 20px;
                column-gap: 10px;
            }

            .all-customize-temp-boxes .customixe-img-box {
                height: 170px;
                width: 130px;
                padding: 15px;
            }

            .all-customize-temp-boxes .t-btn {
                font-size: 15px;
                padding: 5px 10px;
            }
        }
    </style>

</head>

<body>
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <nav class="site-navbar">

                    <ul>
                        <li><a href="/events">{{ __('new_home.Events') }}</a></li>
                        <li><a href="/packages">{{ __('new_home.packages') }}</a></li>
                        <li><a href="/features">{{ __('new_home.Features') }}</a></li>
                        <li><a href="/about">{{ __('new_home.About') }} </a></li>
                        <li><a href="/contact">{{ __('new_home.Contact') }}</a></li>
                        <li><a href="/blog">{{ __('new_home.Blogs') }}</a></li>
                        <li><a href="/tutorial">{{ __('new_home.Tutorial') }}</a></li>
                        <li><a href="/login">{{ __('new_home.login') }}</a></li>
                        <li><a href="/register">{{ __('new_home.signup') }}</a></li>
                    </ul>
                    <a href="/" class="site-logo"><img src="/assets/images/logo.svg" alt="click-invitation"></a>

                    @guest
                        <span class="header-buttons">
                            <button class="login"> <a href="/login" style="text-decoration: none; color:black;">
                                    {{ __('new_home.Login') }}</a> </button>
                            <a class="register" href="/register"
                                style="text-decoration: none; color:black;">{{ __('new_home.Register') }}</a>

                            <div class="langauge-person">
                                <div class="language-box">
                                    <div class="language-box">
                                        <div class="nav-box">
                                            <ul>
                                                <li class="drop-down-link"><a href="#"><img
                                                            src="{{ asset('assets/Panel/images/translate-icon.png') }}"
                                                            alt=""><i class="fa fa-angle-down" aria-hidden="true">
                                                            {{ Config::get('languages')[App::getLocale()] }}</i></a>
                                                    <ul class="drop-menu">
                                                        @foreach (Config::get('languages') as $lang => $language)
                                                            @if ($lang != App::getLocale())
                                                                <li><a
                                                                        href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    @endguest
                    @auth
                        <span class="header-buttons">
                            <a class="register" href="{{ route('panel.index') }}"
                                style="text-decoration: none; color:black;">{{ __('new_home.Panel') }}</a>
                            <button class="login"> <a href="{{ route('web.logout') }}"
                                    style="text-decoration: none; color:black;">{{ __('new_home.Logout') }}</a> </button>
                        </span>
                        <div class="langauge-person">
                            <div class="language-box">
                                <div class="language-box">
                                    <div class="nav-box">
                                        <ul>
                                            <li class="drop-down-link"><a href="#"><img
                                                        src="{{ asset('assets/Panel/images/translate-icon.png') }}"
                                                        alt=""><i class="fa fa-angle-down" aria-hidden="true">
                                                        {{ Config::get('languages')[App::getLocale()] }}</i></a>
                                                <ul class="drop-menu">
                                                    @foreach (Config::get('languages') as $lang => $language)
                                                        @if ($lang != App::getLocale())
                                                            <li><a
                                                                    href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth

                    <button class="nav-toggler">
                        <span>

                        </span>
                    </button>
                </nav>
            </div>
        </div>
    </header>
    <section class="page-design">
        <div class="container-fluid p-0">
            <div class="page-design-hero-section">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="text">
                            <h2>{{ $type->title }}</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="gif-box">
                            <img src="{{ asset('assets/Panel/images/invitattion-design-gif.gif') }}" alt="WEDDING">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0 slider-invitation-box-main">
            <div class="row">
                <div class="col-lg-6 col-md-12 custom_width">
                    <div class="invitation-customize-slider">
                        @foreach ($templates as $template)
                            <div class="slider-invitation-box">
                                <div class="customixe-img-box"
                                    style="background-image:url(https://clickadmin.searchmarketingservices.online/storage/templates/{{ rawurlencode($template->image) }});">
                                    @guest
                                        <a href="/register" class="btn t-btn">Cutomize</a>
                                    @endguest
                                    @auth
                                        <a href="{{ route('panel.index') }}" class="btn t-btn">Cutomize</a>
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 bg_color">
                    <div class="text">
                        <h2>Get Professional’s Designed Cards</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid effortless-section-main">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="text">
                        <h2>Effortless Inviting And RSVP</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.</p>
                        @guest
                            <a href="/register" class="btn t-btn">Cutomize</a>
                        @endguest
                        @auth
                            <a href="{{ route('panel.index') }}" class="btn t-btn">Cutomize</a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="img-box">
                        <img src="{{ asset('assets/Panel/images/env.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="all-template-box">
                        <div class="text">
                            <h2>Explore More Templates</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s</p>
                        </div>

                        <div class="all-customize-temp-boxes">
                            @foreach ($templates as $template)
                                <div class="customixe-img-box"
                                    style="background-image:url(https://clickadmin.searchmarketingservices.online/storage/templates/{{ rawurlencode($template->image) }});">
                                    @guest
                                        <a href="/register" class="btn t-btn">Cutomize</a>
                                    @endguest
                                    @auth
                                        <a href="{{ route('panel.index') }}" class="btn t-btn">Cutomize</a>
                                    @endauth
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="footer">
            <div class="footer-logo">

                <a href="/" class="site-logo"><img src="/assets/newimages/Group 1.svg"
                        alt="click-invitation"></a>
                <p
                    style="margin: 0 auto;
                            width: 100%;
                            padding-top: 15px;
                            font-family: 'poppins';
                            font-size: 14px;
                            font-weight: 400;
                            color: #000000;
                            margin-bottom: 70px;">
                    {{ __('footer.definition') }}</p>
            </div>
            <div class="pages">

                <h4
                    style="text-align: center;
                            font-size: 16px;
                            font-family: 'poppins';
                            font-weight: 600;">
                    {{ __('footer.Quick Links') }}</h4>
                <ul style="padding-top: 10px;">
                    <li class="liststylesn"><a class="quicklinksstyle" href="/events">{{ __('footer.events') }}</a>
                    </li>
                    <li class="liststylesn"><a class="quicklinksstyle"
                            href="/features">{{ __('footer.features') }}</a></li>
                    <li class="liststylesn"><a class="quicklinksstyle" href="/about">{{ __('footer.about') }}</a>
                    </li>
                    <li class="liststylesn"><a class="quicklinksstyle"
                            href="/contact">{{ __('footer.contact') }}</a></li>
                    <li class="liststylesn"><a class="quicklinksstyle" href="/blog">{{ __('footer.blogs') }}</a>
                    </li>
                    <li class="liststylesn"><a class="quicklinksstyle"
                            href="/tutorial">{{ __('footer.tutorial') }}</a></li>
                </ul>
            </div>


            <div class="social-icons">
                <h4
                    style="
              font-size: 16px;
              font-family: 'poppins';
              font-weight: 600;">
                    {{ __('footer.contact_us') }}</h4>
                <ul style="padding-top: 10px;">
                    <li class="liststylesn">
                        <p
                            style="margin: 0 auto;
        
        
                  font-family: 'poppins';
                  font-size: 14px;
                  font-weight: 400;
                  color: #000000;
                  ">
                            {{ __('footer.contact_message') }}
                        </p>
                    </li>
                    <li class="liststylesn"><a class="quicklinksstyle" href="tel:+1(438)303-9948">+1 (438)
                            303-9948</a></li>
                    <li class="liststylesn"><a class="quicklinksstyle"
                            href="mailto:Info@clickinvitation.com">Info@clickinvitation.com</a></li>

                </ul>
                <a target="_blank" href="https://www.facebook.com/click4invitation"><img
                        src="/assets/newimages/fic.png" alt="facebook"></a>
                <a target="_blank" href="https://www.instagram.com/clickinvitationmtl/"><img
                        src="/assets/newimages/inic.png" alt="instagram"></a>
                <a target="_blank" href="https://www.youtube.com/@clickinvitation"><img
                        src="/assets/newimages/inyo.png" alt="youtube"></a>

            </div>

        </div>
        <div class="footer2">
            <div class="footer-logo">


                <p
                    style="margin: 0 auto;
        width: 100%;
        font-family: 'poppins';
        font-size: 14px;
        font-weight: 400;
        color: #000000;
        ">
                    {{ __('footer.Copyright') }} © 2023 ClickInvitation. {{ __('footer.all_rights_reserved') }}
                </p>
            </div>
            <div class="pages">
                <p
                    style="margin: 0 auto;
              width: 100%;
              font-family: 'poppins';
              font-size: 14px;
              font-weight: 400;
              color: #000000;
              ">
                    {{ __('footer.design_developed_by') }} <a class="quicklinksstyle2"
                        href="https://searchmarketingservice.com/">Search Marketing Services</a></p>
            </div>
            <div class="social-icons">

                <ul>
                    <li class="liststylesn"><a class="quicklinksstyle"
                            href="/privacy-policy">{{ __('footer.privacy_policy') }}</a></li>
                </ul>
            </div>

        </div>
    </div>

    </div>






    <script src="{{ asset('assets/js/wow-animate.js') }}"></script>
    <script src="{{ asset('assets/Panel/js/lib.js') }}"></script>
    <script src="{{ asset('assets/Panel/js/custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script src="{{ asset('assets/newjs/index.js') }}"></script>
    <script src="{{ asset('assets/newjs/script.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {
            wow = new WOW({
                animateClass: 'animated',
                offset: 100,
                callback: function(box) {
                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            });

            wow.init();

            $('#show-password').on('change', function() {
                const passwordField = $('#password');
                const type = $(this).is(':checked') ? 'text' : 'password';
                passwordField.attr('type', type);
            });
        });




        $(".invitation-customize-slider").slick({
            dots: false,
            arrows: true,
            autoplay: false,
            infinite: true,
            prevArrow: '<button class="slide-arrow prev-arrow"><img src="{{ asset('assets/Panel/images/arrow-left.png') }}" alt=""></button>',
            nextArrow: '<button class="slide-arrow next-arrow"><img src="{{ asset('assets/Panel/images/arrow-right.png') }}" alt=""></button>',
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    </script>
</body>

</html>
