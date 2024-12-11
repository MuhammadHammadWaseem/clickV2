@extends('Website.Layouts.master')

<style>
    .slick-slider button {
    top: 45% !important;
    }
</style>

<style>
    .accordion-item:first-of-type {
        border-top-left-radius: 50px !important;
        border-top-right-radius: 50px !important;

        border-bottom-right-radius: .25rem !important;
        border-bottom-left-radius: .25rem !important;
    }

    .accordion-item:last-of-type {
        border-top-left-radius: .25rem !important;
        border-top-right-radius: .25rem !important;

        border-bottom-right-radius: 50px !important;
        border-bottom-left-radius: 50px !important;
    }

    .langauge-person .nav-box ul li.drop-down-link ul li {
        border-bottom: none !important;
    }

    a.site-logo {
        width: 100% !important;
        text-align: center;

    }

    .header-buttons {
        width: 100% !important;
    }

    .site-navbar ul li a {
        padding: 7px !important;
    }



    /* .site-navbar ul li a {
        font-size: 12px !important;
    } */




    header {
        position: fixed;
        width: 100%;
        z-index: 99999;
        top: 0;
    }

    body {
        padding-top: 120px;
    }
</style>
@section('title')
    {{ __('home.title') }}
@endsection
@section('description')
    {{ __('home.description') }}
@endsection

@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/">
@endsection



@section('content')
    <div class="container">

        <div class="heading-text">
            <h1>
                {{ __('home.Event Organization Heading') }}&
                <span class="bold-text">{{ __('home.Immortalize Heading') }}</span>
                {{ __('home.Your memory') }}
            </h1>
            <p>
                {{ __('home.Invites Control Message') }}
            </p>

        </div>

        <div class="form-container">
            <input type="email" placeholder="{{ __('home.Email Address Prompt') }}">
            <a href="/register">{{ __('home.Get Started Button Text') }}</a>
        </div>
    </div>
    <div class="container">
        <div class="couple-img">
            <img src="assets/newimages/Frame 8.webp" alt="event-guest-list-management">
        </div>
    </div>



    <div class="container">

        <div class="text-center">

            <h2>
                {{ __('home.Some_OF') }} <span class="bold-text">{{ __('home.Popular') }}</span>
                {{ __('home.Popular Events Subheading') }}
            </h2>

            {{ __('home.Trial Offer Paragraph') }}

        </div>


        <div class="popular-events">

            <div class="col-lg-6 col-md-12">
                <div class="inner-sec">
                    <a href="{{ route('web.get.events',['id' => 1]) }}" class="Wedding-Events">
                        <div class="gradient-anim">
                            <img src="assets/newimages/Vector (1).png" alt="">
                        </div>
                        <h3>{{ __('home.Wedding Events') }}</h3>
                        <div>
                            <img src="assets/newimages/Group 12.png" alt="">
                        </div>
                    </a>
                </div>


                <div class="Anniversary-Events">
                    <div class="inner-sec">

                        <a href="{{ route('web.get.events',['id' => 3]) }}" class="Wedding-Events">
                            <div class="gradient-anim">
                                <img src="assets/newimages/Group 13.png" alt="">

                            </div>

                            <h3>{{ __('home.Anniversary Events') }}</h3>

                            <div>
                                <img src="assets/newimages/Group 12.png" alt="">

                            </div>
                        </a>

                    </div>
                </div>

                <div class="Baby-Shower-Events">
                    <div class="inner-sec">

                        <a href="{{ route('web.get.events',['id' => 2]) }}" class="Wedding-Events">
                            <div class="gradient-anim">
                                <img src="assets/newimages/Group 13.png" alt="">

                            </div>

                            <h3>{{ __('home.Baby Shower Events') }}</h3>

                            <div>
                                <img src="assets/newimages/Group 12.png" alt="">

                            </div>
                        </a>



                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">

                <div class="Corporate-Events">
                    <div class="inner-sec">

                        <a href="{{ route('web.get.events',['id' => 6]) }}" class="Wedding-Events">
                            <div class="gradient-anim">
                                <img src="assets/newimages/Group 14.png" alt="">

                            </div>

                            <h3>{{ __('home.Corporate Events') }}</h3>

                            <div>
                                <img src="assets/newimages/Group 12.png" alt="">

                            </div>
                            <a>

                    </div>
                </div>
                <div class="Baptism-Events">
                    <div class="inner-sec">

                        <a href="{{ route('web.get.events',['id' => 4]) }}" class="Wedding-Events">
                            <div class="gradient-anim">
                                <img src="assets/newimages/Vector (2).png" alt="">

                            </div>

                            <h3>{{ __('home.Baptism Events') }}</h3>

                            <div>
                                <img src="assets/newimages/Group 12.png" alt="">

                            </div>
                        </a>

                    </div>
                </div>
                <div class="Birthday-Events">
                    <div class="inner-sec">

                        <a href="{{ route('web.get.events',['id' => 5]) }}" class="Wedding-Events">
                            <div class="gradient-anim">
                                <img src="assets/newimages/Vector (4).png" alt="">

                            </div>

                            <h3>{{ __('home.Birthday Events') }}</h3>

                            <div>
                                <img src="assets/newimages/Group 12.png" alt="">

                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <a href="/events" class="view-more-events">
            {{ __('home.View Events') }} <img src="assets/newimages/Group 12 (2).png" alt="">
        </a>


        <div class="head-area">
            <h2 class="heading-center">
                {{ __('home.Some of the') }} <span class="bold-text">{{ __('home.features') }}
                </span>{{ __('home.that are going') }}
            </h2>
        </div>


        <div class="container">


            <div class="main-text">

                <div class="sub-text1">

                    <div class="first-area">

                        <div class="sub-area">

                            <div> <img src="assets/newimages/Group 16.png" alt=""></div>
                            <div>
                                <h3>{{ __('home.Template Access Heading') }}</h3>
                            </div>
                        </div>
                        <p class="text1">
                            {{ __('home.Template Description') }}

                        </p>

                    </div>

                    <div class="sec-area">

                        <div class="sub-area">

                            <div> <img src="assets/newimages/icons.png" alt=""></div>
                            <div>
                                <h3>{{ __('home.Intuitive Customization Heading') }}</h3>
                            </div>
                        </div>

                        <p class="text2">
                            {{ __('home.Customization Description') }}
                        </p>
                    </div>



                </div>

                <div class="sub-text2">

                    <div class="first-area">

                        <div class="sub-area">

                            <div> <img src="assets/newimages/Group 17.png" alt=""></div>
                            <div>
                                <h3>{{ __('home.Mobile Friendly Invitations Heading') }}</h3>
                            </div>
                        </div>
                        <p class="text4">
                            {{ __('home.Mobile Friendly Invitations Description') }}

                        </p>
                    </div>

                    <div class="sec-area">

                        <div class="sub-area">

                            <div> <img src="assets/newimages/Vector (6).png" alt=""></div>
                            <div>
                                <h3>{{ __('home.Innovation Meets Simplicity Heading') }}</h3>
                            </div>
                        </div>
                        <p class="text5">
                            {{ __('home.Innovation Meets Simplicity Description') }}

                        </p>

                    </div>



                </div>
                <div class="sub-text3">
                    <div class="first-area">

                        <div class="sub-area">

                            <div> <img src="assets/newimages/Vector (5).png" alt=""></div>
                            <div>
                                <h3>{{ __('home.Easy Guest Management Heading') }}</h3>
                            </div>
                        </div>
                        <p class="text3">
                            {{ __('home.Easy Guest Management Description') }}

                        </p>

                    </div>

                    <div class="sec-area">

                        <div class="sub-area">

                            <div> <img src="assets/newimages/Vector (7).png" alt=""></div>
                            <div>
                                <h3>{{ __('home.Unleash Your Creativity Heading') }}</h3>
                            </div>
                        </div>
                        <p class="text6">
                            {{ __('home.Unleash Your Creativity Description') }}

                        </p>

                    </div>



                </div>


            </div>






            <div class="head-area">
                <h2 class="heading-center second">
                    {{ __('home.Top Invitations Heading') }} <span class="bold-text">{{ __('home.Recommended') }} </span>
                    {{ __('home.by our users') }}
                </h2>
                <p>
                    {{ __('home.Event Design Reminder') }}
                </p>

            </div>

        </div>

        <div class="container my-2 py-4">


            <div class="slider">
                @foreach ($templates as $template)
                <div class="mx-3">
                    <div class="card border-0 rounded-0">
                        @guest
                        <a href="/login">
                            <img src="https://clickadmin.searchmarketingservices.online/storage/templates/{{ rawurlencode($template->image) }}" alt="{{ $template->image }} | {{ $template->id}}">
                        </a>
                        @endguest
                        @auth
                        <a href="/panel">
                            <img src="https://clickadmin.searchmarketingservices.online/storage/templates/{{ rawurlencode($template->image) }}" alt="{{ $template->image }} | {{ $template->id}}">
                        </a>
                        @endauth
                    </div>
                </div>
                @endforeach
                {{-- <div class="mx-3">
                    <div class="card border-0 rounded-0">
                        <img src="assets/newimages/Component 27 (2).png" alt="digital-invitations">
                    </div>
                </div>
                <div class="mx-3">
                    <div class="card border-0 rounded-0">
                        <img src="assets/newimages/Component 28.png" alt="digital-wedding-invitations">
                    </div>
                </div>
                <div class="mx-3">
                    <div class="card border-0 rounded-0">
                        <img src="assets/newimages/Component 33 (2).png" alt="paperless-post-free-invitations">
                    </div>
                </div>
                <div class="mx-3">
                    <div class="card border-0 rounded-0">
                        <img src="assets/newimages/Component 27 (1).png" alt="graduation-party-invitation-cards">
                    </div>
                </div> --}}
            </div>

        </div>
    </div>


    <div class="container">

        <a href="/events" class="view-more-events second">
            {{ __('home.View Events ') }}<img src="assets/newimages/Group 12 (2).png" alt="">
        </a>

        <div class="content-box">
            <h2 class="heading-center third">
                {{ __('home.customer_feedback_part_1') }} <span
                    class="bold-text">{{ __('home.customer_feedback_part_2') }} </span>
                {{ __('home.customer_feedback_part_3') }}
            </h2>

        </div>


        <div class="owl-carousel owl-theme">

            <div class="item">
                <div class="comment">

                    <div class="testimonial-container">
                        <div class="testimonial-img"> <img src="assets/newimages/Component 6 (1).png" alt="">
                        </div>
                        <div class="testimonial-name">
                            <h5>{{ __('home.testimonial_1_name') }}</h5>
                        </div>
                        <div class="testimonial-date">
                            <p>Dec 02 2021</p>
                        </div>

                    </div>

                    <div class="testimonial-text">
                        <p>{{ __('home.testimonial_1_feedback') }}</p>
                    </div>
                </div>


            </div>
            <div class="item">
                <div class="comment">

                    <div class="testimonial-container">
                        <div class="testimonial-img"> <img src="assets/newimages/Component 6 (1).png" alt="">
                        </div>
                        <div class="testimonial-name">
                            <h5>{{ __('home.testimonial_2_name') }}</h5>
                        </div>
                        <div class="testimonial-date">
                            <p>Dec 04 2021</p>
                        </div>

                    </div>

                    <div class="testimonial-text">
                        <p> {{ __('home.testimonial_2_feedback') }}</p>

                    </div>
                </div>


            </div>
            <div class="item">
                <div class="comment">

                    <div class="testimonial-container">
                        <div class="testimonial-img"> <img src="assets/newimages/Component 6 (1).png" alt="">
                        </div>
                        <div class="testimonial-name">
                            <h5>{{ __('home.testimonial_3_name') }}</h5>
                        </div>
                        <div class="testimonial-date">
                            <p>Dec 06 2021</p>
                        </div>
                    </div>
                    <div class="testimonial-text">
                        <p>{{ __('home.testimonial_3_feedback') }}</p>
                    </div>
                </div>


            </div>
            <div class="item">
                <div class="comment">

                    <div class="testimonial-container">
                        <div class="testimonial-img"> <img src="assets/newimages/Component 6 (1).png" alt="">
                        </div>
                        <div class="testimonial-name">
                            <h5>{{ __('home.testimonial_4_name') }}</h5>
                        </div>
                        <div class="testimonial-date">
                            <p>Dec 03 2021</p>
                        </div>

                    </div>

                    <div class="testimonial-text">
                        <p>{{ __('home.testimonial_4_feedback') }}</p>
                    </div>
                </div>

            </div>
            <div class="item">
                <div class="comment">

                    <div class="testimonial-container">
                        <div class="testimonial-img"> <img src="assets/newimages/Component 6 (1).png" alt="">
                        </div>
                        <div class="testimonial-name">
                            <h5>{{ __('home.testimonial_5_name') }}</h5>
                        </div>
                        <div class="testimonial-date">
                            <p>Dec 05 2021</p>
                        </div>

                    </div>

                    <div class="testimonial-text">
                        <p>{{ __('home.testimonial_5_feedback') }}</p>
                    </div>
                </div>

            </div>
        </div>

        <!--
                                                    <div class="testomonials">
                                                      <h1>hello</h1>
                                                    </div> -->


        <div class="content-section">
            <h3 class="heading-center fourth">
                {{ __('home.qr_codes_part_1') }} <span class="bold-text"> {{ __('home.event_checkin') }}</span>
                {{ __('home.qr_codes_part_3') }}

            </h3>
            <div class="container">
                <ul
                    style="
  add list-style-type: none;
  list-style-type: auto;
  text-decoration: none;
    list-style: auto;
    font-size: 16px;
    margin-top: 60px;
    font-family: 'Poppins';
    line-height: 2;
">

                    <h4 style="padding-bottom:10px;">{{ __('home.qr_codes_transformation') }}</h4>
                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>{{ __('home.arrival_qr_code_heading') }}</b>
                        {{ __('home.arrival_qr_code_description') }}
                    </li>

                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>{{ __('home.qr_code_scan_title') }}</b>
                        {{ __('home.qr_code_scan_instruction') }}</li>

                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>{{ __('home.check_in_process_title') }}</b>
                        {{ __('home.check_in_process_instruction') }} </li>

                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>{{ __('home.qr_code_check_in_title') }}</b>
                        {{ __('home.qr_code_check_in_instruction') }}</li>

                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>{{ __('home.event_enjoyment_title') }}</b>
                        {{ __('home.event_enjoyment_instruction') }}</li>
                    <h4 style="padding-top:10px;">{{ __('home.qr_code_benefits') }}</h4>
                    <ul>
            </div>
        </div>

        <div class="phone-img">
            <img src="assets/newimages/Group 58.webp" alt="qr-code-invitation">
        </div>


        <h2 class="heading-center fifth">
            {{ __('home.FREQUENTLY') }} <span class="bold-text">{{ __('home.ASK') }} </span>{{ __('home.QUESTIONS') }}
        </h2>

        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.What_is_ClickInvitation') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.defination') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.HOW_DOES_CLICKINVITATION_WORK') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.WORK_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.WHAT_TYPES_OF_EVENTS_CAN_I_USE_CLICKINVITATION_FOR') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.EVENTS_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.ARE_THE_DIGITAL_INVITATIONS_CUSTOMIZABLE') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.CUSTOMIZABLE_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.IS_CLICKINVITATION_ECO_FRIENDLY') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.ECO_FRIENDLY_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.HOW_DO_GUESTS_RSVP_TO_AN_INVITATION') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.RSVP_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.CAN_I_TRACK_RSVPS_AND_MANAGE_MY_GUEST_LIST') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.GUEST_LIST_MANAGEMENT_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.IS_CLICKINVITATION_SECURE_FOR_SHARING_EVENT_DETAILS') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.SECURITY_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.HOW_MUCH_DOES_CLICKINVITATION_COST') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.COST_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.DO_WE_HAVE_A_COUNT_FOR_THE_GUESTS_AND_DISHES') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.GUEST_COUNT_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.CAN_WE_STEER_OUR_GUESTS_TO_THEIR_TABLES') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.TABLE_ASSIGNMENT_DEFINITION') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    {{ __('home.DOES_IT_INCLUDE_A_PHOTO_GALLERY') }}
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        {{ __('home.PHOTO_GALLERY_DEFINITION') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="inner-heading">
            <h2 class="heading-center sixth">
                <span class="bold-text"> {{ __('home.About') }}</span> {{ __('home.Clickinvitation') }}
            </h2>
        </div>


        <div class="background-picture-box">

            <h2 style=""> {{ __('home.EFFORTLESS_EVENT_PLANNING_TITLE') }}</h2>


            <p>
                {{ __('home.EFFORTLESS_EVENT_PLANNING_DESCRIPTION') }}

            </p>
            <a href="/about" class="view-more-events third">
                {{ __('home.DISCOVER_MORE_INFO_TEXT') }} <img src="assets/newimages/Group 12 (3).png" style="filter: invert(1);" alt="">
            </a>

        </div>



    </div>
@endsection
