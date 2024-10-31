@extends('Website.Layouts.master')
@section('title')
    Organize Your Special Day with Event Management Tool | Click
@endsection
@section('description')
    Make your special day unforgettable with click invitation the ultimate event management tool. Simplify the process and
    create a truly memorable event with us.
@endsection
@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/events">
@endsection
@section('content')
    <div class="container">
        <div class="heading-text">
            <h1>
                {{ __('event.invite_title') }} <span class="bold-text">{{ __('event.invite_highlight') }}</span>, {{ __('event.control_guest_list') }}.
            </h1>
            <p>
                {{ __('event.revolutionize_event_planning') }}
            </p>
        </div>

        <div class="images-container">
            <div class="child-img1"><img src="assets/newimages/Component 28 (1).png" alt="wedding-invitations-with-rsvp"></div>
            <div class="child-img2"> <img src="assets/newimages/Component 33 (4).png"
                    alt="first-birthday-party-invitation-cards"></div>
            <div class="child-img3">
                <img src="assets/newimages/Component 34 (1).png" alt="rsvp-wedding-cards">
                <a href="#wedding-section"><img src="assets/newimages/Component 37.png"
                        alt="paperless-birthday-party-invitations" class="scroll-below"></a>
            </div>
        </div>
        <div class="events-body">
            <div class="text-container" id="wedding-section">
                <h2>{{ __('event.wedding_invitations_title') }}</h2>
                <p>
                    {{ __('event.wedding_invitations_description') }}
                </p>
                <div class="getown">
                    <a href="/register">{{ __('event.get_your_own_now') }}</a>
                </div>
            </div>


            <div class="wedd-slider">
                <div class="w3-content">
                    <img class="mySlides1" src="assets/newimages/Component 27 (1).png" alt="digital-invitations">
                    <img class="mySlides1" src="assets/newimages/Component 27 (2).png"
                        alt="paperless-post-birthday-invitations">
                    <button class="btn-left" onclick="plusDivs(-1, 0)">&#10094;</button>
                    <button class="btn-right" onclick="plusDivs(1, 0)">&#10095;</button>
                </div>
            </div>
        </div>

        <div class="events-body">

            <div class="text-container">
                <h2>{{ __('event.birthday_celebrations_title') }}</h2>
                <p>
                    {{ __('event.birthday_celebrations_description') }}
                </p>
                <div class="getown">
                    <a href="/register">{{ __('event.get_your_own_now') }}</a>
                </div>
            </div>

            <div class="wedd-slider">
                <div class="w3-content">
                    <img class="mySlides2" src="assets/newimages/Component 27 (2).png" alt="digital-wedding-invitations">
                    <img class="mySlides2" src="assets/newimages/Component 27 (1).png"
                        alt="paperless-post-free-invitations">
                    <button class="btn-left" onclick="plusDivs(-1, 1)">&#10094;</button>
                    <button class="btn-right" onclick="plusDivs(1, 1)">&#10095;</button>

                </div>
            </div>
        </div>

        <div class="events-body">
            <div class="text-container">
                <h2>{{ __('event.corporate_events_title') }}</h2>
                <p>
                    {{ __('event.corporate_events_description') }}
                </p>
                <div class="getown">
                    <a href="/register">{{ __('event.get_your_own_now') }}</a>
                </div>
            </div>


            <div class="wedd-slider">
                <div class="w3-content">
                    <img class="mySlides3" src="assets/newimages/Component 27 (1).png"
                        alt="graduation-party-invitation-cards">
                    <img class="mySlides3" src="assets/newimages/Component 27 (2).png" alt="wedding-invitations-with-rsvp">
                    <button class="btn-left" onclick="plusDivs(-1, 2)">&#10094;</button>
                    <button class="btn-right" onclick="plusDivs(1, 2)">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="events-body">
            <div class="text-container">
                <h2>{{ __('event.baby_showers_title') }}</h2>
                <p>
                    {{ __('event.baby_showers_description') }}
                </p>
                <div class="getown">
                    <a href="/register">{{ __('event.get_your_own_now') }}</a>
                </div>
            </div>

            <div class="wedd-slider">
                <div class="w3-content">
                    <img class="mySlides4" src="assets/newimages/Component 27 (2).png"
                        alt="first-birthday-party-invitation-cards">
                    <img class="mySlides4" src="assets/newimages/Component 27 (1).png" alt="rsvp-wedding-cards">
                    <button class="btn-left" onclick="plusDivs(-1, 3)">&#10094;</button>
                    <button class="btn-right" onclick="plusDivs(1, 3)">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="events-body">
            <div class="text-container">
                <h2>{{ __('event.graduation_parties_title') }}</h2>
                <p>
                    {{ __('event.graduation_parties_description') }}
                </p>
                <div class="getown">
                    <a href="/register">{{ __('event.get_your_own_now') }}</a>
                </div>
            </div>

            <div class="wedd-slider">
                <div class="w3-content">
                    <img class="mySlides5" src="assets/newimages/Component 27 (1).png"
                        alt="paperless-birthday-party-invitations">
                    <img class="mySlides5" src="assets/newimages/Component 27 (2).png"
                        alt="paperless-post-birthday-invitations">
                    <button class="btn-left" onclick="plusDivs(-1, 4)">&#10094;</button>
                    <button class="btn-right" onclick="plusDivs(1, 4)">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="events-body">
            <div class="text-container">
                <h2>{{ __('event.holiday_gatherings_title') }}</h2>
                <p>
                    {{ __('event.holiday_gatherings_description') }}
                </p>
                <div class="getown">
                    <a href="/register">{{ __('event.get_your_own_now') }}</a>
                </div>
            </div>

            <div class="wedd-slider">
                <div class="w3-content">
                    <img class="mySlides6" src="assets/newimages/Component 27 (2).png" alt="digital-invitations">
                    <img class="mySlides6" src="assets/newimages/Component 27 (1).png" alt="rsvp-wedding-cards">
                    <button class="btn-left" onclick="plusDivs(-1, 5)">&#10094;</button>
                    <button class="btn-right" onclick="plusDivs(1, 5)">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="events-body">
            <div class="text-container">
                <h2>{{ __('event.engagement_parties_title') }}</h2>
                <p>
                    {{ __('event.engagement_parties_description') }}
                </p>
                <div class="getown">
                    <a href="/register">{{ __('event.get_your_own_now') }}</a>
                </div>
            </div>


            <div class="wedd-slider">
                <div class="w3-content">
                    <img class="mySlides7" src="assets/newimages/Component 27 (2).png"
                        alt="paperless-post-free-invitations">
                    <img class="mySlides7" src="assets/newimages/Component 27 (1).png"
                        alt="graduation-party-invitation-cards">
                    <button class="btn-left" onclick="plusDivs(-1, 6)">&#10094;</button>
                    <button class="btn-right" onclick="plusDivs(1, 6)">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="events-body">
            <div class="text-container">
                <h2>{{ __('event.baptism_invitations_title') }}</h2>
                <p>
                    {{ __('event.baptism_invitations_description') }}
                </p>
                <div class="getown">
                    <a href="/register">{{ __('event.get_your_own_now') }}</a>
                </div>
            </div>


            <div class="wedd-slider">
                <div class="w3-content">
                    <img class="mySlides8" src="assets/newimages/Component 27 (2).png" alt="digital-wedding-invitations">
                    <img class="mySlides8" src="assets/newimages/Component 27 (1).png"
                        alt="wedding-invitations-with-rsvp">
                    <button class="btn-left" onclick="plusDivs(-1, 7)">&#10094;</button>
                    <button class="btn-right" onclick="plusDivs(1, 7)">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="events-body">
            <div class="text-container">
                <h2>{{ __('event.anniversary_celebrations_title') }}</h2>
                <p>
                    {{ __('event.anniversary_celebrations_description') }}
                </p>
                <div class="getown">
                    <a href="/register">{{ __('event.get_your_own_now') }}</a>
                </div>
            </div>


            <div class="wedd-slider">
                <div class="w3-content">
                    <img class="mySlides9" src="assets/newimages/Component 27 (2).png"
                        alt="paperless-birthday-party-invitations">
                    <img class="mySlides9" src="assets/newimages/Component 27 (1).png" alt="rsvp-wedding-cards">
                    <button class="btn-left" onclick="plusDivs(-1, 8)">&#10094;</button>
                    <button class="btn-right" onclick="plusDivs(1, 8)">&#10095;</button>
                </div>
            </div>
        </div>
        <div style="display: none" class="text-content-holder">
            <h3 class="heading-center seventh">
                <span class="bold-text">{{ __('event.subscribe') }}</span> {{ __('event.latest_offers') }}
            </h3>

        </div>
        <div style="display: none" class="image-container">
            <div class="left-img">
                <img src="assets/newimages/Component 27 (2).png" alt="digital-invitations">
                <p class="text12">
                    {{ __('event.dorem') }}
                    <span class="dots"></span>
                    <span class="moreText12">
                        <br>
                        {{ __('event.attention') }}
                    </span>
                </p>
                <button class="read-more-btn12">{{ __('event.read_more') }}</button>
            </div>
            <div class="right-img">
                <img src="assets/newimages/Component 33.png" alt="paperless-post-free-invitations">
                <p class="text13">
                    {{ __('event.dorem') }}
                    <span class="dots"></span>
                    <span class="moreText13">
                        <br>
                        {{ __('event.attention') }}
                    </span>
                </p>
                <button class="read-more-btn13">{{ __('event.read_more') }}</button>
            </div>
        </div>
    </div>
    <div class="container">
    @endsection
