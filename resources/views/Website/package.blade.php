@extends('Website.Layouts.master')
<style>

    html,body{
        background-color: #F0F0F0;
    }
    .packages-single-card .box-subtitle {
color: #A9967D;
font-size: 16px;
font-family: revert-layer;
font-weight: 400;
background: rgba(169, 150, 125, 0.3);
border-radius: 15px;
padding: 10px;
width: max-content;
}

section.events-lists-sec-01 {
    margin: 0 !important;
}

.select-packages-boxes {
    padding: 0 44px !important;
}

.events-lists-sec-01 .text.text-center p {
    width: 100%;
}
.box-styling {
    height: fit-content !important;
    margin: 20px 20px !important;
}


.packages-single-card .box-unit-price {
font-size: 80px;
font-family: inherit;
font-weight: bold;
color: #A9967D;
margin: 10px 0;
}

.packages-single-card ul li {
list-style: unset;
color: #8B8B8B;
font-size: 16px;
font-weight: 500;
font-family: revert-layer;
}

.packages-single-card p {
color: #7A7A7A;
font-size: 16px;
font-weight: bold;
margin-bottom: 20px;
}

.site-navbar {
    border-bottom:none !important;
}

.footer {
    border-top: none !important;
}

.text-center {
    border-top: none !important;
}

.packages-single-card a.btn.t-btn {
width: 100%;
}


.events-lists-sec-01 {
    padding: 0px 0 50px !important;
}


.packages-single-card {
display: flex;
flex-direction: column;
row-gap: 10px;
}

.select-packages-boxes {
width: -webkit-fill-available;
padding: 0 43px;
display: flex;
flex-direction: row;
flex-wrap: wrap;
justify-content: center;
align-items: flex-start;
margin-top: 40px;
}
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
<section class="events-lists-sec-01">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    <h2>{{ __('packages.select_a_package') }}</h2>
                    <p>{{ __('packages.description') }}</p>
                </div>

            </div>
        </div>
    </div>


    <div class="container-fluid">
     <div class="row">
            <div class="select-packages-boxes">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="packages-single-card box-styling">
                        <div class="box-subtitle">{{ __('packages.basic_package') }}</div>
                        <div class="box-unit-price">$49</div>
                        <ul>
                            <li>{{ __('packages.general_info') }}</li>
                            <li>{{ __('packages.webpage') }}</li>
                            <li>{{ __('packages.meals') }}</li>
                            <li>{{ __('packages.gift_suggestions') }}</li>
                            <li>{{ __('packages.invitation') }}</li>
                        </ul>
                        <p>{{ __('packages.purpose_basic') }}</p>
                        @guest
                            <a href="{{ route('web.login') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endguest
                        @auth
                            <a href="{{ route('panel.index') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endauth
                    </div>

                </div>
                {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="packages-single-card box-styling">
                        <div class="box-subtitle">{{ __('packages.standard_package') }}</div>
                        <div class="box-unit-price">$49</div>
                        <ul>
                            <li>{{ __('packages.basic_package_contents') }}</li>
                            <li>{{ __('packages.webpage') }}</li>
                            <li>{{ __('packages.meals') }}</li>
                            <li>{{ __('packages.photos') }}</li>
                        </ul>
                        <p>{{ __('packages.purpose_standard') }}</p>
                        @guest
                            <a href="{{ route('web.login') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endguest
                        @auth
                            <a href="{{ route('panel.index') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endauth
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="packages-single-card box-styling">
                        <div class="box-subtitle">{{ __('packages.premium_package') }}</div>
                        <div class="box-unit-price">$69</div>
                        <ul>
                            <li>{{ __('packages.standard_package_contents') }}</li>
                            <li>{{ __('packages.table_seating_arrangements') }}</li>
                        </ul>
                        <p>{{ __('packages.purpose_premium') }}</p>
                        @guest
                            <a href="{{ route('web.login') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endguest
                        @auth
                            <a href="{{ route('panel.index') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endauth
                    </div>
                </div> --}}
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="packages-single-card box-styling">
                        <div class="box-subtitle">{{ __('packages.comprehensive_package') }}</div>
                        <div class="box-unit-price">$99</div>
                        <ul>
                            <li>{{ __('packages.basic_package_contents') }}</li>
                            <li>{{ __('packages.guest_list') }}</li>
                            <li>{{ __('packages.table_seating_arrangements') }}</li>
                            <li>{{ __('packages.photos') }}</li>
                            <li>{{ __('packages.acknowledgments') }}</li>
                            <li>{{ __('packages.messaging') }}</li>
                        </ul>
                        <p>{{ __('packages.purpose_comprehensive') }}</p>
                        @guest
                            <a href="{{ route('web.login') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endguest
                        @auth
                            <a href="{{ route('panel.index') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="packages-single-card box-styling">
                        <div class="box-subtitle">{{ __('packages.We_do_it_for_you') }}</div>
                        <div class="box-unit-price">$349</div>
                        <p>{{ __('packages.purpose_comprehensive') }}</p>
                        <p>
                            {{ __('packages.details_comprehensive', [
                                'description' => "In this package, we take care of everything from start to finish. This includes venue selection, full event planning and coordination, managing vendors and suppliers, budget tracking, custom invitation design, guest list management, on-day support, and post-event services like sending thank-you notes and feedback collection. Let us handle all the stress so you can enjoy your special day hassle-free!"
                            ]) }}
                        </p>
                        @guest
                            <a href="{{ route('web.login') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endguest
                        @auth
                            <a href="{{ route('panel.index') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endauth
                    </div>
                </div>
            </div>
     </div>
    </div>

</section>

@endsection
<script>
     $(document).ready(function(){
        // Check if the current page is the target page
        if (window.location.pathname === '/Events-Lists.html') {
            $('#exampleModalCenter02').modal('show');
        }
    });
</script>
