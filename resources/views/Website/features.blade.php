@extends('Website.Layouts.master')
@section('title')
    Discover Our Comprehensive Features For Unforgettable Events
@endsection
@section('description')
    Elevate your event planning with our comprehensive features designed to create unforgettable experiences. Start planning
    your next memorable event with us.
@endsection
@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/features">
@endsection

@section('content')
    <div class="container">
        <div class="heading-text">
            <h1>
                {{ __('feature.features_heading') }}<span class="bold-text"> {{ __('feature.features_highlight') }}</span> {{ __('feature.features_tagline') }}
            </h1>

        </div>
        <div class="main-img">
            <img src="assets/newimages/Component 33 (5).png" alt="paperless-post-birthday-invitations">
        </div>
        <div class="tab text-border">
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1">{{ __('feature.event_webpage') }}</label>
            <input id="tab2" type="radio" name="tabs">
            <label for="tab2" onclick="scrollToContent2()">{{ __('feature.photo_gallery') }}</label>
            <input id="tab3" type="radio" name="tabs">
            <label for="tab3" onclick="scrollToContent3()">{{ __('feature.gifts_payment_gateway') }}</label>
            <input id="tab4" type="radio" name="tabs">
            <label for="tab4" onclick="scrollToContent4()">{{ __('feature.main_meal_choices') }}</label>
            <input id="tab5" type="radio" name="tabs">
            <label for="tab5" onclick="scrollToContent5()">{{ __('feature.pre_made_invitations') }}</label>
            <input id="tab6" type="radio" name="tabs">
            <label for="tab6" onclick="scrollToContent6()">{{ __('feature.tables_seating') }}</label>
            <input id="tab7" type="radio" name="tabs">
            <label for="tab7" onclick="scrollToContent7()">{{ __('feature.messaging_system') }}</label>
            <input id="tab8" type="radio" name="tabs">
            <label for="tab8" onclick="scrollToContent8()">{{ __('feature.qr_code_check_in') }}</label>
            <input id="tab9" type="radio" name="tabs">
            <label for="tab9" onclick="scrollToContent9()">{{ __('feature.guest_table_numbers') }}</label>
            <input id="tab10" type="radio" name="tabs">
            <label for="tab10" onclick="scrollToContent10()">{{ __('feature.adding_family_members') }}</label>


            <div id="content1" class="tab-wrap">

                <div class="tab-content">
                    <img src="assets/newimages/Group 16.png" alt="">
                    <h2>
                        {{ __('feature.event_webpage_title') }}
                    </h2>
                    <p>
                        {{ __('feature.event_webpage_description') }}<span class="bold-text font-default"> {{ __('feature.event_webpage_highlight') }}</span>
                    </p>

            </div>
            <div id="content2" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Group 17.png" alt="">
                    <h3>
                        {{ __('feature.photo_gallery_title') }}
                    </h3>
                    <p>
                        <span class="bold-text font-default">{{ __('feature.photo_gallery_highlight') }}</span>
                        {{ __('feature.photo_gallery_description') }}
                    </p>

            </div>

            <div id="content3" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Group 18.png" alt="">
                    <h3>
                        {{ __('feature.gifts_payment_gateway_title') }}
                    </h3>
                    <p>
                        {{ __('feature.gifts_payment_gateway_description') }}<span class="bold-text font-default">{{ __('feature.gifts_payment_gateway_highlight') }}</span>
                    </p>

            </div>
            <div id="content4" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/icons.png" alt="">
                    <h3>
                        {{ __('feature.main_meal_choices_title') }}
                    </h3>
                    <p>
                        {{ __('feature.main_meal_choices_description') }}<span class="bold-text font-default">{{ __('feature.main_meal_choices_highlight') }}</span>
                    </p>


            </div>
            <!-- end of div 4 -->
            <div id="content5" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Vector (6).png" alt="">
                    <h3>
                        {{ __('feature.pre_made_invitations_title') }}
                    </h3>
                    <p>
                        {{ __('feature.pre_made_invitations_description') }}<span class="bold-text font-default">{{ __('feature.pre_made_invitations_highlight') }}</span>
                    </p>


            </div>
            <!-- end of div 5 -->
            <div id="content6" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Group 19.png" alt="">
                    <h3>
                        {{ __('feature.tables_and_seating_title') }}
                    </h3>
                    <p>
                        {{ __('feature.tables_and_seating_description') }}<span class="bold-text font-default">{{ __('feature.tables_and_seating_highlight') }}</span>
                    </p>


            </div>
            <!-- end of div 6 -->
            <div id="content7" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Vector (5).png" alt="">
                    <h3>
                        {{ __('feature.messaging_system_title') }}
                    </h3>
                    <p>
                        {{ __('feature.messaging_system_description') }}<span class="bold-text font-default">{{ __('feature.messaging_system_highlight') }}</span>
                    </p>


            </div>
            <!-- end of div 7 -->
            <div id="content8" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Language_translator.png" alt="">
                    <h3>
                        {{ __('feature.qr_code_checkin_title') }}
                    </h3>
                    <p>
                        {{ __('feature.qr_code_checkin_description') }}<span class="bold-text font-default">{{ __('feature.qr_code_checkin_highlight') }}</span>
                    </p>


            </div>
            <!-- end of div 8 -->
            <div id="content9" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Vector (7).png" alt="">
                    <h3>
                        {{ __('feature.guest_table_numbers_title') }}
                    </h3>
                    <p>
                        {{ __('feature.guest_table_numbers_description') }}<span class="bold-text font-default">{{ __('feature.guest_table_numbers_highlight') }}</span>
                    </p>


            </div>
            <!-- end of div 9 -->
            <div id="content10" class="tab-wrap">
                <div class="tab-content">
                    <img src="assets/newimages/Vector (7).png" alt="">
                    <h3>
                        {{ __('feature.adding_family_members_title') }}
                    </h3>
                    <p>
                        {{ __('feature.adding_family_members_description') }}<span class="bold-text font-default">{{ __('feature.adding_family_members_highlight') }}</span>
                    </p>


            </div>
            <!-- end of div 10 -->
        </div>

        <div class="heading-text">
            <h2>
                {{ __('feature.title') }}<span class="bold-text">{{ __('feature.highlight') }}</span>?
            </h2>

        </div>

        <div class="container">
            <div class="main-text hs-space">
                <div class="sub-text1">
                    <div class="first-area">
                        <div class="sub-area">
                            <div> <img src="assets/newimages/Group 16.png" alt=""></div>
                            <div>
                                <h3>{{ __('feature.all_in_one_solution_title') }}</h3>
                            </div>
                        </div>
                        <p class="text1">
                            {{ __('feature.all_in_one_solution_description') }}
                        </p>

                    </div>
                </div>
                <div class="sub-text2">
                    <div class="first-area">
                        <div class="sub-area">
                            <div> <img src="assets/newimages/Group 17.png" alt=""></div>
                            <div>
                                <h3>{{ __('feature.ease_of_use_title') }}</h3>
                            </div>
                        </div>
                        <p class="text4">
                            {{ __('feature.ease_of_use_description') }}

                        </p>
                    </div>
                </div>
                <div class="sub-text3">
                    <div class="first-area">
                        <div class="sub-area">
                            <div> <img src="assets/newimages/Group 18.png" alt=""></div>
                            <div>
                                <h3>{{ __('feature.customization_title') }}</h3>
                            </div>
                        </div>
                        <p class="text7">
                            {{ __('feature.customization_description') }}
                        </p>
                    </div>
                </div>

            </div>

        </div>
        <div class="container text-border">
            <div class="main-text f-center hs-space">
                <div class="sub-text1 new-added">
                    <div class="first-area">
                        <div class="sub-area">
                            <div> <img src="assets/newimages/Group 16.png" alt=""></div>
                            <div>
                                <h3>{{ __('feature.efficiency_title') }}</h3>
                            </div>
                        </div>
                        <p class="text1">
                            {{ __('feature.efficiency_description') }}
                        </p>

                    </div>
                </div>
                <div class="sub-text2 new-added">
                    <div class="first-area">
                        <div class="sub-area">
                            <div> <img src="assets/newimages/Group 17.png" alt=""></div>
                            <div>
                                <h3>{{ __('feature.memories_that_last_title') }}</h3>
                            </div>
                        </div>
                        <p class="text4">
                            {{ __('feature.memories_that_last_description') }}

                        </p>
                    </div>
                </div>


            </div>

        </div>




    </div>
    <div class="container">
    @endsection
