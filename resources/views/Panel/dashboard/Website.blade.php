<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QD4QH7KNBF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QD4QH7KNBF');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Click Invitation Website</title>

    <link rel="stylesheet" href="/assets/websitestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/Panel/css/operation.css') }}">
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">

    {{-- <script src="/assets/jspanel/jquery.min.js"></script> --}}
    <script src="{{ asset('/assets/jspanel/jquery.min.js') }}"></script>

    <style>
        .lb-next {
            display: block !important;
            opacity: 1 !important;
        }

        .lb-prev {
            display: block !important;
            opacity: 1 !important;
        }



        .language-box .nav-box ul li a {
            display: flex;
            column-gap: 3px;
            width: 70px;
            height: 40px;
            border: 1px solid #7A7A7A;
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            transition: .3s;
        }

        .language-box .nav-box ul li a img {
            width: 20px;
            height: 20px;
        }

        .language-box .nav-box ul li a i {
            color: #7A7A7A;
        }

        .language-box .nav-box ul li a:hover {
            background-color: white;
        }

        .language-box .nav-box ul li {
            position: relative;
        }

        ul.drop-menu {
            left: -50px !important;
            top: 40px !important;
        }

        ul.drop-menu {
            background-color: white;
            border-radius: 10px;
            padding: 15px 15px;
            position: absolute;
            z-index: 9999;
            top: 45px;
            width: 130px;
        }

        ul.drop-menu li a {
            border: none !important;
            padding: 0;
            display: block !important;
            color: black !important;
            font-size: 12px;
        }

        .nav-box ul li.drop-down-link ul {
            display: none;
        }

        .nav-box ul li.drop-down-link:hover ul {
            display: flex;
            justify-content: center;
            padding-top: 20px !important;
        }


        .nav-box ul {
            padding: 0 !important;
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#sp" class="extra_side_page">



    <header class="custom_mobile_toggle_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="header_content">
                        <div class="custom_menu_toggle">
                            <input id="dropdown-button" type="checkbox" class="dropdown-toggle">
                            <label class="dropdown-label" for="dropdown-button"></label>
                            <div class="menu-slide-from-left" id="menu">
                                <div class="inner-menu-slide-from-left">
                                    <div class="left-menu-dash">
                                        <div class="two-things-inline">
                                            <h2>{{ __('website.Menu') }}</h2>
                                        </div>
                                        <div class="nav-top-menu" id="sp">
                                            <ul>
                                                <li><a href="#start">{{ __('website.start') }}</a></li>

                                                <li><a href="#thecouple">
                                                        @if ($eventType)
                                                            @if ($eventType->couple_event)
                                                                {{ __('website.the_couple') }}
                                                            @else
                                                                {{ __('website.description') }}
                                                            @endif
                                                        @endif
                                                    </a></li>

                                                <li>
                                                    @if (!$photogallery->isEmpty())
                                                        <a href="#gallery">{{ __('website.gallery') }}</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($event->boolcerimony || $event->boolreception || $event->boolparty)
                                                        <a href="#eventsc">{{ __('website.event_schedule') }}</a>
                                                    @endif
                                                </li>
                                            </ul>



                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main_mobile_logo">
                            <a href="http://127.0.0.1:8000/panel"><img src="/assets/images/dashboard-logo.png"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <header class="custom_dextop_mode_header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="main-logo">
                        <a href="http://127.0.0.1:8000/panel"><img src="/assets/images/dashboard-logo.png"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="nav-top-menu" id="sp">
                        <ul>
                            <li><a href="#start">{{ __('website.start') }}</a></li>

                            <li><a href="#thecouple">
                                    @if ($eventType)
                                        @if ($eventType->couple_event)
                                            {{ __('website.the_couple') }}
                                        @else
                                            {{ __('website.description') }}
                                        @endif
                                    @endif
                                </a></li>

                            <li>
                                @if (!$photogallery->isEmpty())
                                    <a href="#gallery">{{ __('website.gallery') }}</a>
                                @endif
                            </li>
                            <li>
                                @if ($event->boolcerimony || $event->boolreception || $event->boolparty)
                                    <a href="#eventsc">{{ __('website.event_schedule') }}</a>
                                @endif
                            </li>
                            <li>
                                <div class="language-box">
                                    <div class="nav-box">
                                        <ul>
                                            <li class="drop-down-link">
                                                <a href="#">
                                                    <img src="{{ asset('assets/Panel/images/translate-icon.png') }}"
                                                        alt="">
                                                    {{ Config::get('languages')[App::getLocale()] }}<i
                                                        class="fa fa-angle-down" aria-hidden="true"></i>
                                                </a>
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
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- <section id="start" class="main"
        style="background-image: url('{{ $event->mainimage }}?id=<?php echo mt_rand(1, 100000); ?>'); background-position: center;background-size: cover">
        <div class="names" style="margin-top: -136px !important">
            @if ($eventType)
                @if ($eventType->couple_event)
                    <div class="bridename">
                        <p class="firstname">{{ $event->bridefname }}</p>
                        <p class="secondname">{{ $event->bridelname }}</p>
                    </div>
                    <div class="and">
                        <p>&</p>
                    </div>

                    <div class="groomname">
                        <p class="firstname">{{ $event->groomfname }}</p>
                        <p class="secondname">{{ $event->groomlname }}</p>
                    </div>

                    <div class="h">
                        <hr>
                        <i class="far fa-heart"></i>
                        <hr>
                    </div>
                @else
                    <div class="bridename">
                        <p class="firstname">{{ $event->name }}</p>
                    </div>
                @endif
            @endif
            <div class="date">
                <p id='eventDate'></p>
            </div>
        </div>
        <a href="#thecouple"><i class="fal fa-chevron-down"></i></a>
    </section> --}}

    <section id="start" class="main"
        style="background-image: url('{{ $event->mainimage }}?id=<?php echo mt_rand(1, 100000); ?>'); background-position: center; background-size: cover">
        <div class="names" style="margin-top: -136px !important">
            @if ($eventType)
                @if ($eventType->couple_event)
                    <div class="bridename">
                        <p class="firstname"
                            style="color: {{ $WebsiteSetting->bride_name_color ?? '#defaultColor' }}; font-family: {{ $WebsiteSetting->font_style ?? 'defaultFont' }};">
                            {{ $event->bridefname }}</p>
                        <p class="secondname"
                            style="color: {{ $WebsiteSetting->bride_name_color ?? '#defaultColor' }}; font-family: {{ $WebsiteSetting->font_style ?? 'defaultFont' }};">
                            {{ $event->bridelname }}</p>
                    </div>
                    <div class="and">
                        <p style="color: {{ $WebsiteSetting->and_symbol_color ?? '#defaultColor' }}; font-family: {{ $WebsiteSetting->font_style ?? 'defaultFont' }};">&</p>
                    </div>
                    <div class="groomname">
                        <p class="firstname"
                            style="color: {{ $WebsiteSetting->groom_name_color ?? '#defaultColor' }}; font-family: {{ $WebsiteSetting->font_style ?? 'defaultFont' }};">
                            {{ $event->groomfname }}</p>
                        <p class="secondname"
                            style="color: {{ $WebsiteSetting->groom_name_color ?? '#defaultColor' }}; font-family: {{ $WebsiteSetting->font_style ?? 'defaultFont' }};">
                            {{ $event->groomlname }}</p>
                    </div>
                    <div class="h">
                        <hr>
                        <i class="far fa-heart"></i>
                        <hr>
                    </div>
                @else
                    <div class="bridename">
                        <p class="firstname" style="color: {{ $WebsiteSetting->event_name_color ?? '#defaultColor' }}; font-family: {{ $WebsiteSetting->font_style ?? 'defaultFont' }};">{{ $event->name }}</p>
                    </div>
                @endif
            @endif
            <div class="date">
                <p id='eventDate' style="color: {{ $WebsiteSetting->event_date_color ?? '#defaultColor' }}; font-family: {{ $WebsiteSetting->font_style ?? 'defaultFont' }};"></p>
            </div>
        </div>
        <a href="#thecouple"><i class="fal fa-chevron-down"></i></a>
    </section>

    <section id="thecouple" class="container">
        <div class="box-styling">
            <div class="row tit">
                <div class="col text-center">
                    <h1>
                        @if ($eventType)
                            @if ($eventType->couple_event)
                                {{ __('website.the_couple') }}
                            @else
                                {{ $eventType->title }}
                            @endif
                        @endif
                    </h1>
                    <h4 class="mt-4 mb-4">


                        @if ($eventType)
                            @if ($eventType->couple_event)
                                {{ __('website.meet_the_bride_and_groom') }}
                            @else
                                {{ $event->name }}
                            @endif
                        @endif
                    </h4>
                    <p>{{ $event->summary }}</p>
                    <hr>
                </div>
            </div>
            @if ($eventType)
                @if ($eventType->couple_event)
                    <div class="row mt-4">
                        <div class="col">
                            <div class="mb-3">
                                <div class="row card g-0">
                                    <div class="col-md-4">
                                        <!--<img src="https://picsum.photos/200/250?grayscale" class="img-fluid rounded-start">-->
                                        @if ($event->imggroom)
                                            <img src="{{ url('/') }}{{ $event->imggroom }}"
                                                class="img-fluid rounded-start">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $event->groomfname }} {{ $event->groomlname }}
                                            </h4>
                                            <i>{{ __('website.groom') }}</i>
                                            <p class="card-text">{{ $event->groomsummary }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <div class="row card g-0">
                                    <div class="col-md-4">
                                        @if ($event->imgbride)
                                            <img src="{{ url('/') }}{{ $event->imgbride }}"
                                                class="img-fluid rounded-start">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $event->bridefname }} {{ $event->bridelname }}
                                            </h4>
                                            <i>{{ __('website.bride') }}</i>
                                            <p class="card-text">{{ $event->bridesummary }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </section>

    <div id="photogalleryModal" tabindex="-1" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('website.add_photos') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store.users.images', ['id' => $event->id_event]) }}" method="post"
                    enctype="multipart/form-data" id="galleryform">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="file" id="gall" style="display: block !important;" name="gall[]"
                            multiple accept="image/*" />
                        <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('website.close') }}</button>
                        <button type="submit" class="btn modal-t-btn">{{ __('website.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @if (!$photogallery->isEmpty() || !$videogallery->isEmpty())
        <section id="gallery" class="container gallery">
            <div class="box-styling">
                <div class="row tit">
                    <div class="col text-center">
                        <h1>{{ __('website.gallery_title') }}</h1>
                        <h4 class="mt-4 mb-4">{{ __('website.gallery_subtitle') }}</h4>
                        <button data-bs-toggle="modal" data-bs-target="#photogalleryModal"
                            class="btn t-btn">{{ __('website.add_photos') }}</button>
                        <hr>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($photogallery as $photo)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <a href="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                                       data-lightbox="gallery"
                                       data-title="Image {{ $loop->iteration }}" class="img-thumbnail">
                                        <img src="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                                            class="d-block w-100" height="600px">
                                    </div>
                                @endforeach
                                <!--<div class="carousel-item">
           <img src="https://picsum.photos/1298/649?grayscale" class="d-block w-100">
          </div>
          <div class="carousel-item">
           <img src="https://picsum.photos/1298/649?grayscale" class="d-block w-100">
          </div>-->
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            @php
                                // Ensure the collection is sorted in descending order based on a specific field.
                                $sortedPhotogallery = $photogallery->sortByDesc('id_photogallery');
                                $photoExists = false;
                            @endphp

                            @if (
                                $sortedPhotogallery->contains(function ($photo) {
                                    return file_exists(public_path('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg'));
                                }))
                                <div class="carousel-inner">
                                    @foreach ($sortedPhotogallery as $photo)
                                        @if (file_exists(public_path('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg')))
                                            @php $photoExists = true; @endphp
                                            <div
                                                class="carousel-item @if ($loop->first) active @endif">
                                                <a href="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                                                    data-lightbox="gallery" data-title="Image {{ $loop->iteration }}"
                                                    class="img-thumbnail">
                                                    <img src="/event-images/{{ $photo->id_event }}/photogallery/{{ $photo->id_photogallery }}.jpg"
                                                        class="d-block w-100" height="600px">
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{ __('website.previous') }}</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{ __('website.next') }}</span>

                            </button>
                        </div>
                    </div>
                </div>


                {{-- VIDEO --}}
                <div class="row">
                    <div class="col">
                        <h1 class="text-center mt-3 mb-3">{{ __('website.video') }}</h1>
                        <div class="video-style">
                            @php
                                $videoExists = false;
                            @endphp
                            @foreach ($videogallery as $video)
                                @if (file_exists(public_path('event-images/' . $video->id_event . '/videos/' . $video->video)))
                                    @php
                                        $videoExists = true;
                                    @endphp
                                    <video width="300" height="200" controls>
                                        <source src="/event-images/{{ $video->id_event }}/videos/{{ $video->video }}"
                                            type="video/mp4">
                                        {{ __('website.video_support') }}
                                    </video>
                                @endif
                            @endforeach
                        </div>

                        @if ($videoExists)
                            <center>
                                <button class="btn t-btn mt-3" id="viewall">
                                    <a class="text-white text-decoration-none" target="_blank"
                                        href="{{ url("/events/$event->id_event/show-gallery") }}">
                                        {{ __('website.view') }}
                                    </a>
                                </button>
                            </center>
                        @endif
                    </div>
                </div>

                {{-- VIDEO --}}
            </div>

        </section>
    @endif

    @if ($event->boolcerimony || $event->boolreception || $event->boolparty)
        <section id="eventsc" class="container event-schedule">
            <div class="box-styling">
                <div class="row tit">
                    <div class="col text-center">
                        <h1>{{ __('website.event_schedule') }}</h1>
                        <h4 class="mt-4 mb-4">{{ __('website.scheduled_event_list') }}</h4>
                        <hr>
                    </div>
                </div>

                <div class="row justify-content-md-center mt-4">
                    @if ($event->boolcerimony)
                        <div class="col-12 col-lg-4 col-md-12">
                            <div class="card me-4 ms-4 mb-4">
                                @if ($event->cerimg)
                                    <img src="{{ $event->cerimg }}" class="card-img-top">
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('website.event_ceremony') }}</h4>
                                    <p class="card-text">{{ $event->cerdesc }}</p>
                                    <p class="card-text">
                                        <input type="hidden" placeholder="{{ __('genralInfo.location') }}"
                                            id="ceraddress" name="ceraddress" value="{{ $event->ceraddress }}">
                                        <input type="hidden" id="cerAddressLink">
                                    <div id="mapView" style="width: 100%; height: 400px;"></div>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            {{ $event->ceraddress }}<br>
                                            {{ $event->cercity }}
                                            {{ $event->cerprovince }}<br>
                                            {{ $event->cerpc }}<br>
                                            {{ $event->cercountry }}
                                        </small>
                                    </p>
                                    @if ($event->certime)
                                        <p class="card-text text-center"><small class="text-muted"
                                                id='eventCer'>{{ \Carbon\Carbon::parse($event->certime)->format('g:i a') }}</small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($event->boolreception)
                        <div class="col-12 col-lg-4 col-md-12">
                            <div class="card me-4 ms-4 mb-4">
                                @if ($event->recimg)
                                    <img src="{{ $event->recimg }}" class="card-img-top">
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title">{{ __('website.event_reception') }}</h4>
                                    <p class="card-text">{{ $event->recdesc }}</p>
                                    <p class="card-text">
                                        <input type="hidden" placeholder="{{ __('genralInfo.location') }}"
                                            id="recaddress" name="recaddress" value="{{ $event->recaddress }}">
                                        <input type="hidden" id="recAddressLink">
                                    <div id="RecmapView" style="width: 100%; height: 400px;"></div>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            {{ $event->recaddress }}<br>
                                            {{ $event->reccity }}
                                            {{ $event->recprovince }}<br>
                                            {{ $event->recpc }}<br>
                                            {{ $event->reccountry }}
                                        </small>
                                    </p>
                                    @if ($event->rectime)
                                        <p class="card-text text-center"><small class="text-muted"
                                                id='recTime'>{{ \Carbon\Carbon::parse($event->rectime)->format('g:i A') }}</small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($event->boolparty)
                        <div class="col-12 col-lg-4 col-md-12">
                            <div class="card me-4 ms-4 mb-4">
                                @if ($event->parimg)
                                    <img src="{{ $event->parimg }}" class="card-img-top">
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title">{{ strtoupper($event->parname) }}</h4>
                                    <p class="card-text">{{ $event->pardesc }}</p>
                                    <p class="card-text">
                                        <input type="hidden" placeholder="{{ __('genralInfo.location') }}"
                                            id="paraddress" name="paraddress" value="{{ $event->paraddress }}">
                                        <input type="hidden" id="parAddressLink">
                                    <div id="ParmapView" style="width: 100%; height: 400px;"></div>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">{{ $event->paraddress }}<br>
                                            {{ $event->parcity }}
                                            {{ $event->parprovince }}<br>
                                            {{ $event->parpc }}<br>
                                            {{ $event->parcountry }}
                                        </small>
                                    </p>
                                    @if ($event->partime)
                                        <p class="card-text text-center"><small class="text-muted"
                                                id='parTime'>{{ \Carbon\Carbon::parse($event->partime)->format('g:i a') }}</small>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </section>
    @endif
    

    <footer class="container-fluid footer_styling">
        <div class="row">
            <div class="col text-center">
                <p>{{ __('website.copyright') }}</p>
            </div>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <script src="/assets/jspanel/bootstrap.min.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        initMap();
    });


    (g => {
        var h, a, k, p = "The Google Maps JavaScript API",
            c = "google",
            l = "importLibrary",
            q = "__ib__",
            m = document,
            b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
            r = new Set,
            e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a)
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
            d[l](f, ...n))
    })
    ({
        key: "AIzaSyBW3i6Ia5wC19YV9654N4jISic1Uzvft8M",
        v: "weekly"
    });

    let map;

    async function initMap() {
        const {
            Map
        } = await google.maps.importLibrary("maps");
        const {
            Geocoder
        } = await google.maps.importLibrary("geocoding");

        const geocoder = new Geocoder();

        // Fetch addresses from Blade variables (these should be passed from your controller)
        const address = document.getElementById("ceraddress").value;
        const recaddress = document.getElementById("recaddress").value;
        const paraddress = document.getElementById("paraddress").value;

        if (address) {
            geocodeAddress(geocoder, address, "mapView", "cerAddressLink");
        }

        if (recaddress) {
            geocodeAddress(geocoder, recaddress, "RecmapView", "recAddressLink");
        }

        if (paraddress) {
            geocodeAddress(geocoder, paraddress, "ParmapView", "parAddressLink");
        }
    }

    function geocodeAddress(geocoder, address, mapViewId, addressLinkId) {
        geocoder.geocode({
            address: address
        }, (results, status) => {
            if (status === "OK" && results[0]) {
                const location = results[0].geometry.location;
                map = new google.maps.Map(document.getElementById(mapViewId), {
                    center: {
                        lat: location.lat(),
                        lng: location.lng()
                    },
                    zoom: 15,
                });

                new google.maps.Marker({
                    position: location,
                    map: map,
                    title: address,
                });

                const mapLink = `https://www.google.com/maps?q=${location.lat()},${location.lng()}`;
                document.getElementById(addressLinkId).value = mapLink; // Update link
            } else {
                console.error("Geocode was not successful for the following reason: " + status);
            }
        });
    }

    // Add event listeners for input fields
    document.getElementById("ceraddress").addEventListener("input", initMap);
    document.getElementById("recaddress").addEventListener("input", initMap);
    document.getElementById("paraddress").addEventListener("input", initMap);

    // Initialize map on page load
    window.onload = function() {
        initMap();
    };

    const months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ]

    if (("{{ $event->date }}").length > 0) {
        let eDate = document.getElementById('eventDate');
        let newEDate = new Date("{{ $event->date }}");
        let min = newEDate.getMinutes();
        if (min == "0") {
            min = "00";
        } else if (parseInt(min) < 10) {
            min = "0" + min;
        }
        eDate.innerHTML = months[newEDate.getMonth()] + " " + newEDate.getDate() + ", " + newEDate.getFullYear() + " " +
            newEDate.getHours() + ":" + min;
    }

    // if (("{{ $event->certime }}").length > 0) {
    //     let eDate = document.getElementById('eventCer');
    //     let newEDate = new Date("{{ $event->certime }}");
    //     let hr = newEDate.getHours();
    //     let min = newEDate.getMinutes();
    //     let ft = 'AM';
    //     if (parseInt(hr) > 11) {
    //         ft = "PM";
    //         if (parseInt(hr) > 12) {
    //             hr = parseInt(hr) - 12;
    //         }
    //     }
    //     if (parseInt(hr) == 0) {
    //         hr = "12";
    //     }
    //     if (min == "0") {
    //         min = "00";
    //     } else if (parseInt(min) < 10) {
    //         min = "0" + min;
    //     }
    //     eDate.innerHTML = hr + ":" + min + " " + ft;
    // }

    // if (("{{ $event->partime }}").length > 0) {
    //     console.log("{{ $event->partime }}");
    //     console.log(new Date("{{ $event->partime }}"));
    //     let eDate = document.getElementById('parTime');
    //     let newEDate = new Date("{{ $event->partime }}");
    //     let hr = newEDate.getHours();
    //     let min = newEDate.getMinutes();
    //     let ft = 'AM';
    //     if (parseInt(hr) > 11) {
    //         ft = "PM";
    //         if (parseInt(hr) > 12) {
    //             hr = parseInt(hr) - 12;
    //         }
    //     }
    //     if (parseInt(hr) == 0) {
    //         hr = "12";
    //     }
    //     if (min == "0") {
    //         min = "00";
    //     } else if (parseInt(min) < 10) {
    //         min = "0" + min;
    //     }
    //     eDate.innerHTML = hr + ":" + min + " " + ft;
    // }

    // if (("{{ $event->rectime }}").length > 0) {
    //     console.log("{{ $event->rectime }}");
    //     console.log(new Date("{{ $event->rectime }}"));
    //     let eDate = document.getElementById('recTime');
    //     let newEDate = new Date("{{ $event->rectime }}");
    //     let hr = newEDate.getHours();
    //     let min = newEDate.getMinutes();
    //     let ft = 'AM';
    //     if (parseInt(hr) > 11) {
    //         ft = "PM";
    //         if (parseInt(hr) > 12) {
    //             hr = parseInt(hr) - 12;
    //         }
    //     }
    //     if (parseInt(hr) == 0) {
    //         hr = "12";
    //     }
    //     if (min == "0") {
    //         min = "00";
    //     } else if (parseInt(min) < 10) {
    //         min = "0" + min;
    //     }
    //     eDate.innerHTML = hr + ":" + min + " " + ft;

    //     @if (Session::has('success'))
    //         toastr.success("{{ Session::get('success') }}");
    //     @endif

    //     @if ($errors->any())
    //         toastr.error("{{ $errors->first() }}");
    //     @endif
    // }


    window.onload = function() {
        init();
    };



    function init() {
        var menu = document.getElementById("menu");
        menu.classList.add("transition-after-pageload");
    }
</script>
