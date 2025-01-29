@php
    use App\Helpers\GeneralHelper;
    $eventId = GeneralHelper::getEventId() ?? 1;
    $packageEvent = DB::table('package_event')->where('event_id', $eventId)->where('package_id', 3)->first();
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
                                        <li class="general-active" ><a href="{{ route('panel.event.generalInfos', ['id' => $eventId]) }}" ><img src="{{ asset('assets/images/General-Info.png')}}" alt="">{{ __('sidebar.General Info') }}</a></li>
                                        <li class="webpage-active"  ><a  href="{{ route('panel.event.webpage', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Web-Page.png')}}" alt="">{{ __('sidebar.Web Page') }}</a></li>
                                        <li class="meals-active" ><a href="{{ route('panel.event.meals', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Meals.png') }}" alt="">{{ __('sidebar.Meals') }}</a></li>
                                        <li class="gift-active"><a href="{{ route('panel.event.gift', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Gift-Suggestions.png')}}" alt="">{{ __('sidebar.Gift Suggestions') }}</a></li>
                                        <li class="invitatin-active"><a href="{{ route('panel.event.invitation', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Invitations.png')}}" alt="">{{ __('sidebar.Invitations') }}</a></li>
                                        <li class="gest-active"><a href="{{ route('panel.event.guests-list', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Guest-List.png')}}" alt="">{{ __('sidebar.Guest List') }}</a></li>
                                        <li class="management-active"><a href="{{ route('panel.event.guests.index', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Tables-Management.png')}}" alt="">{{ __('sidebar.Tables  Management') }}</a></li>
                                        <li class="poto-active"><a href="{{ route('panel.event.photos', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Event-Photos.png')}}" alt="">{{ __('sidebar.Event Photos') }}</a></li>
                                        <li class="reminder-active"><a href="{{ route('panel.event.reminder', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Reminders.png')}}" alt="">{{ __('sidebar.Reminders') }}</a></li>
                                        <li class="message-active"><a href="{{ route('panel.event.message', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Custom-Messages.png')}}" alt="">{{ __('sidebar.Custom Messages') }}</a></li>
                                        <li class="pay-active"><a href="{{ route('panel.event.pay.index', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Icon 1.png')}}" alt="">{{ __('sidebar.Buy Package') }}</a></li>
                                        @if($packageEvent)
                                        <li class="csv-active"><a href="{{ route('panel.event.upload.csv', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Icon 2.png')}}" alt="">{{ __('sidebar.Upload CSV') }}</a></li>
                                        @endif
                                        <li class="tutoriar-active"><a href="{{ route('panel.event.tutorial', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Tutorials.png')}}" alt="">{{ __('sidebar.Tutorials') }}</a></li>
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
