@extends('Website.Layouts.master')

@section('title')
    Step-by-Step Tutorials For Your Upcoming Next Event | Click
@endsection
@section('description')
    Make your next event a success with Click's comprehensive step-by-step tutorials. From planning to execution, our
    tutorials will guide you through each stage.
@endsection

@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/tutorial">
@endsection
@section('content')
    <style>
        .main-dashboard-sec .left-menu-dash ul li.tutoriar-active a {
            color: #C09D2A;
        }

        .main-dashboard-sec .left-menu-dash ul li.tutoriar-active img {
            filter: none;
        }

        .main-dashboard-sec .left-menu-dash ul li.tutoriar-active {
            background-color: #c09d2a29;
        }

        .main-dashboard-sec .left-menu-dash ul li.tutoriar-active::after {
            width: 5px;
            height: 100%;
            background-color: #C09D2A;
            position: absolute;
            left: 0;
            right: 0;
            content: "";
            top: 0;
        }
    </style>
    <div class="container">
        <div class="heading-text text-border tuts-heading">
            <h1>
                <span class="bold-text">{{ __('tutorial.tutorials') }} </span>
            </h1>
            <p>
                {{ __('tutorial.organize_your_event') }}
            </p>
        </div>

        <div class="owl-carousel owl-theme">

            <div class="item">
                <div class="testimonial" id="image-carousel">
                    <iframe width="100%" height="240" src="https://www.youtube.com/embed/VPfxaKOQ4o4"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="testimonial" id="image-carousel">

                    <iframe width="100%" height="240" src="https://www.youtube.com/embed/u2usWXrfMGo"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>


                </div>

            </div>
            <div class="item">
                <div class="testimonial" id="image-carousel">

                    <iframe width="100%" height="240" src="https://www.youtube.com/embed/ND5GHyBDENQ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>

                </div>
                <div class="testimonial" id="image-carousel">

                    <iframe width="100%" height="240" src="https://www.youtube.com/embed/MPYPrr0jLak"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>

                </div>

            </div>
            <div class="item">
                <div class="testimonial" id="image-carousel">

                    <iframe width="100%" height="240" src="https://www.youtube.com/embed/cRPZt5Xesww"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>

                </div>
                <div class="testimonial" id="image-carousel">

                    <iframe width="100%" height="240" src="https://www.youtube.com/embed/y-d3uq0x3EE"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>

            </div>
            <div class="item">
                <div class="testimonial" id="image-carousel">

                    <iframe width="100%" height="240" src="https://www.youtube.com/embed/jJcB4ZnzP_8"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>


                </div>


            </div>


        </div>
        <div class="heading-text heading-emphasis">
            <h2>
                {{ __('tutorial.popular_features') }} <span class="bold-text"> {{ __('tutorial.popular') }}
                </span>{{ __('tutorial.features') }}
            </h2>
        </div>
        <div class="container">
            <div class="main-text events">
                <div class="sub-text1">
                    <div class="first-area">
                        <div class="sub-area">
                            <div> <img src="assets/newimages/Group 16.png" alt=""></div>
                            <div>
                                <h3>{{ __('tutorial.effortless_event_planning') }}</h3>
                            </div>
                        </div>
                        <p class="text1">
                            {{ __('tutorial.event_planning_description') }}


                        </p>
                    </div>
                </div>
                <div class="sub-text2">
                    <div class="first-area">
                        <div class="sub-area">
                            <div> <img src="assets/newimages/Group 17.png" alt=""></div>
                            <div>
                                <h3>{{ __('tutorial.customizable_invitations') }}</h3>
                            </div>
                        </div>
                        <p class="text4">
                            {{ __('tutorial.customizable_invitations_description') }}

                            <!-- <span class="dots"></span>
                      <span class="moreText4">
                        <br>
                        Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
                      </span> -->
                        </p>
                        <!-- <button class="read-more-btn4">Read More...</button> -->
                    </div>
                </div>
                <div class="sub-text3">
                    <div class="first-area">
                        <div class="sub-area">
                            <div> <img src="assets/newimages/Group 18.png" alt=""></div>
                            <div>
                                <h3>{{ __('tutorial.private_and_exclusive') }}</h3>
                            </div>
                        </div>
                        <p class="text7">
                            {{ __('tutorial.private_and_exclusive_description') }}

                            <!-- <span class="dots"></span>
                      <span class="moreText7">
                        <br>
                        Anticoagulant Specialist from USI, USA, C.H.Q.P. She has completed her Pharm.D, C.R.C.P, & Dip.
                      </span> -->
                        </p>
                        <!-- <button class="read-more-btn7">Read More...</button> -->
                    </div>
                </div>
            </div>

        </div>


        <div class="heading-text">
            <h2>
                {{ __('tutorial.get_started') }} <span class="bold-text"> {{ __('tutorial.with_us') }}
                </span>{{ __('tutorial.today') }}
            </h2>
            <p>
                {{ __('tutorial.start_planning') }} <br> {{ __('tutorial.easy_control') }}


            </p>
        </div>

        <div class="form-container new-form form-153">
            <input type="email" placeholder="Enter your email address">
            <button class="btn-new" type="submit" id="register">{{ __('tutorial.get_started_1') }}</button>
        </div>
    </div>
    <div class="container">
    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#register').click(function() {
                window.location.href = "{{ url('/register') }}";
            });
        });
    </script>
