@extends('Website.Layouts.master')
@section('title')
    About Us | Event Organization Tool | Click Invitation
@endsection
@section('description')
    Click Invitation is the all-in-one tool that simplifies every aspect of planning and managing your events with our
    intuitive platform. Learn more about us.
@endsection

@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/about">
@endsection


@section('content')
    <section>
        <div class="heading-text section-heading">
            <div class="container">
                <div class="heading-text section-heading">
                    <h1>
                        {{ __('about.title') }} <span class="bold-text">  {{ __('about.Vision') }}</span>{{ __('about.celebrate') }}
                    </h1>
                    <p>{{ __('about.description') }} <br>{{ __('about.description2') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="inner-section">
            <div><img src="Group 98.png" alt=""></div>
            <div><img src="vectorwiki-trustpilot-logo 1.png" alt=""></div>
            <div><img src="Group 772.png" alt=""></div>
        </div>
    </section>
    <div class="container">
        <div class="heading-text text-border">
            <h2>
                {{ __('about.craftsmanship_title') }} <span class="bold-text"> {{ __('about.craftsmanship_digital_design') }} </span>{{ __('about.craftsmanship_tagline') }}
            </h2>
            <p>
                {{ __('about.craftsmanship_digital_design') }}

            </p>
        </div>
        <div class="heading-text text-border">
            <h2>
                {{ __('about.simplicity_title') }}  <span class="bold-text"> {{ __('about.Elevating') }} </span>{{ __('about.simplicity_tagline') }}
            </h2>
            <p>
                {{ __('about.simplicity_description') }}

            </p>
        </div>
        <div class="heading-text text-border">
            <h2>
                {{ __('about.promise_title') }} <span class="bold-text">{{ __('about.personalization') }}</span>{{ __('about.innovation_excellence') }}
            </h2>
            <p>
                {{ __('about.promise_description') }} <a href="https://clickinvitation.com" style=" color: #000;">{{ __('about.promise_description') }}</a>{{ __('about.promise_description2') }}

            </p>
        </div>
        <div class="heading-text text-border">
            <h2>
                {{ __('about.community_title') }} <span class="bold-text"> {{ __('about.community_title1') }}</span>  {{ __('about.community_tagline') }}
            </h2>
            <p>
                {{ __('about.community_description') }}

            </p>
        </div>
        <div class="heading-text">
            <h3>
                {{ __('about.get_started_title') }} <span class="bold-text"> {{ __('about.get_started_emphasis') }} </span> {{ __('about.get_started_today') }}
            </h3>
            <p>
                {{ __('about.start_planning_message') }} <br> {{ __('about.quick_start_message') }}
            </p>
        </div>
        <div class="form-container new-form form-153">
            <input type="email" placeholder="{{ __('about.email_placeholder') }}">
            <button class="btn-new" type="submit" id="register">{{ __('about.get_started_button') }}</button>
        </div>
        <div class="heading-text">
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
