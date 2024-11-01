@php
    use App\Helpers\GeneralHelper;
    $eventId = GeneralHelper::getEventId() ?? 1;
@endphp
<header class="custom_mobile_toggle_header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header_content">
                    <div class="custom_menu_toggle">
                        <input id="dropdown-button" type="checkbox" class="dropdown-toggle" />
                        <label class="dropdown-label" for="dropdown-button"></label>
                        <div class="menu-slide-from-left" id="menu">
                            <div class="inner-menu-slide-from-left">
                                <div class="left-menu-dash">
                                    <div class="two-things-inline">
                                        <h2>Menu</h2>
                                        <div class="tablet_mode_logo ">
                                            <a href="{{ route('panel.index') }}"><img
                                                    src="{{ asset('assets/images/dashboard-logo.png') }}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                    <ul>
                                        <li class="general-active"><a
                                                href="{{ route('panel.event.generalInfos', ['id' => $eventId]) }}"><img
                                                    src="{{ asset('assets/images/General-Info.png') }}"
                                                    alt="">General Info</a></li>
                                        <li><a href="{{ route('panel.event.webpage', ['id' => $eventId]) }}"><img
                                                    src="{{ asset('assets/Panel/images/Web-Page.png') }}"
                                                    alt="">Web Page</a></li>
                                        <li><a href="#"><img src="{{ asset('assets/Panel/images/Meals.png') }}"
                                                    alt="">Meals</a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/Panel/images/Gift-Suggestions.png') }}"
                                                    alt="">Gift Suggestions</a></li>
                                        <li><a href="{{ route('panel.event.invitation', ['id' => $eventId]) }}"><img
                                                    src="{{ asset('assets/Panel/images/Invitations.png') }}"
                                                    alt="">Invitations</a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/Panel/images/Guest-List.png') }}"
                                                    alt="">Guest List</a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/Panel/images/Tables-Management.png') }}"
                                                    alt="">Tables Management</a></li>
                                        <li><a href="{{ route('panel.event.photos', ['id' => $eventId]) }}"><img
                                                    src="{{ asset('assets/Panel/images/Event-Photos.png') }}"
                                                    alt="">Event Photos</a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/Panel/images/Reminders.png') }}"
                                                    alt="">Reminders</a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('assets/Panel/images/Custom-Messages.png') }}"
                                                    alt="">Custom Messages</a></li>
                                        <li><a href="{{ route('panel.event.tutorial', ['id' => $eventId]) }}"><img
                                                    src="{{ asset('assets/Panel/images/Tutorials.png') }}"
                                                    alt="">Tutorials</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main_mobile_logo">
                        <a href="{{ route('panel.index') }}"><img
                                src="{{ asset('assets/images/dashboard-logo.png') }}" alt=""></a>
                    </div>
                    <div class="two_boxex_align">
                        <div class="langauge-person">
                            <div class="language-box">
                                <div class="nav-box">
                                    <ul>
                                        <li class="drop-down-link"><a href="#"><img
                                                    src="{{ asset('assets/Panel/images/translate-icon.png') }}"
                                                    alt=""><i class="fa fa-angle-down"
                                                    aria-hidden="true"></i></a>
                                            <ul class="drop-menu">
                                                @foreach (Config::get('languages') as $lang => $language)
                                                    @if ($lang != App::getLocale())
                                                        <li><a
                                                                href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                                {{-- <li><a href="#">Events</a></li>
                                                <li><a href="#">Guest List</a></li>
                                                <li><a href="#">Contact Info</a></li>
                                                <li><a href="{{ route('web.logout') }}">Sign Out</a></li> --}}
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="person-box">
                                <div class="nav-box">
                                    <ul>
                                        <li class="drop-down-link"><a href="#"><img
                                                    src="{{ asset('assets/Panel/images/person-icon.png') }}"
                                                    alt=""></a>
                                            <ul class="drop-menu">
                                                <li><a href="{{ url('/panel') }}">{{ __('new_home.events') }}</a></li>
                                                <li><a href="{{ route('web.logout') }}">{{ __('new_home.sign_out') }}</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
                    <a href="{{ route('panel.index') }}"><img src="{{ asset('assets/images/dashboard-logo.png') }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="langauge-person">
                    <div class="language-box">
                        <div class="nav-box">
                            <ul>
                                <li class="drop-down-link">
                                    <a href="#">
                                        <img src="{{ asset('assets/Panel/images/translate-icon.png') }}"
                                            alt="">
                                        {{ Config::get('languages')[App::getLocale()] }}<i class="fa fa-angle-down"
                                            aria-hidden="true"></i>
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
                    <div class="person-box">
                        <div class="nav-box">
                            <ul>
                                <li class="drop-down-link"><a href="#"><img
                                            src="{{ asset('assets/Panel/images/person-icon.png') }}"
                                            alt=""></a>
                                    <ul class="drop-menu">
                                        <li><a href="{{ url('/panel') }}">{{ __('new_home.events') }}</a></li>
                                        <li><a href="{{ route('web.logout') }}">{{ __('new_home.sign_out') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
