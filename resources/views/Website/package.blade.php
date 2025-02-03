@extends('Website.Layouts.master')
<style>
    html,
    body {
        background-color: #F0F0F0;
    }

    section {
        background-color: #F0F0F0 !important;
        margin: 0 !important;
        padding: 100px 50px !important;
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

    .text ul li p {
        margin: 0 !important;
        padding: 10px 0;
    }

    section.events-lists-sec-01 {
        margin: 0 !important;
    }

    .select-packages-boxes {
        padding: 0 44px !important;
    }

    .text h2 {
        font-size: 50px !important;
        color: #4A4A4A;
        font-weight: 600 !important;
        font-family: 'Poppins' !important;
        line-height: 1.5 !important;
    }

    .text p {
        width: 100% !important;
        color: #7A7A7A;
        font-size: 20px !important;
        margin: 10px 0 30px !important;
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
        list-style: inside;
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
        border-bottom: none !important;
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

    ul {
        padding: 0 !important;
    }

    .text ul li {
        display: flex;
        align-items: center;
        flex-direction: row;
        gap: 10px;
        margin: 0 0 10px 0;
    }

    .text-center {
        padding: 0 !important;
    }

    .text ul {
        margin-bottom: 40px !important;
    }

    .events-lists-sec-03 {
        background-color: #E8E8E8 !important;
        padding: 70px 50px !important;
    }

    .events-lists-sec-02 .package-image {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .text h3 {
        font-size: 30px;
        font-weight: 600;
        color: #4A4A4A;
    }

    .text h4 {
        color: #4A4A4A;
        font-size: 25px !important;
        font-weight: 600;
    }

    .packages-box .text p {
        font-size: 17px !important;
        margin: 0 !important;
    }

    .packages-grid .packages-box {
        background: #E3E3E3;
        border: 1px solid #DDDDDD;
        border-radius: 20px;
        padding: 30px;
        width: 30%;
    }

    .packages-grid {
        gap: 20px;
        margin-top: 20px;
        justify-items: center;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .packages-grid .packages-box .text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 10px;
    }

    .events-lists-sec-01 .text h2 {
        margin-top: 100px;
    }

    .text {
        align-content: center;
    }

    .events-lists-sec-04 {
        padding-left: 0 !important;
    }

    .events-lists-sec-04 .container-fluid {
        padding-left: 0;
    }

    .events-lists-sec-04 .container-fluid .package-image img {
        width: 90%;
    }

    .events-lists-sec-04 .container-fluid .package-image {
        justify-content: flex-start;
    }

    .events-lists-sec-03 .text h3~p {
        color: #A9967D;
        font-size: 17px;
        font-weight: 600;
        padding: 15px 0 0;
    }

    .two-packages {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: #E9E9E9;
    }

    .events-lists-sec-05 {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .events-lists-sec-05 .container-fluid {
        padding: 0;
    }

    .two-packages .packagesbox {
        width: 100%;
        padding: 110px 45px;
    }

    .two-packages .packagesbox .text-center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 30px;
    }

    .two-packages .packagesbox .text-center ul p {
        margin: 0 !important;
        !i;
        !;
        padding: 10px 0;
    }

    .two-packages .packagesbox .text-center ul {
        margin: 0 !important;
    }

    .two-packages .packagesbox:last-child {
        background: linear-gradient(180deg, #A9967D 0%, #675640 100%);
        clip-path: polygon(18% 0, 100% 0%, 100% 100%, 0 100%);
        margin-left: -10%;
    }

    .two-packages .packagesbox:last-child p,
    .two-packages .packagesbox:last-child path,
    .two-packages .packagesbox:last-child h3 {
        color: #fff;
        fill: #fff;
    }

    .events-lists-sec-05 .text {
        width: 60%;
        margin: auto;
    }

    .events-lists-last-sec .text {
        width: 85%;
        margin: auto;
    }

    @media only screen and (max-width: 1600px) {
        .packages-single-card .box-unit-price {
            font-size: 40px;
        }

        .text p {
            font-size: 16px !important;
        }

        .text h2 {
            font-size: 40px !important;
            line-height: 1.2 !important;
        }

        .text ul {
            margin-bottom: 20px !important;
        }

        .text ul li p {
            font-size: 14px !important;
        }

        .events-lists-last-sec .text {
            margin: auto;
        }
    }

    @media only screen and (max-width: 1400px) {

        .packages-grid .packages-box {
            width: 48%;
        }

        .text h4 {
            font-size: 18px !important;
        }

        .packages-box .text p {
            font-size: 12px !important;
        }

        .text ul li p {
            padding: 0 !important;
        }

        .events-lists-sec-05 .text {
            width: 100%;
        }

        .events-lists-sec-03 {
            background-size: contain !important;
        }

        .text h2 {
            font-size: 30px !important;
        }

        .select-packages-boxes .col-lg-3 {
            width: 50%;
        }

        .select-packages-boxes .col-lg-3 {
            width: 50%;
        }

        .packages-single-card {
            min-height: 500px !important;
        }

        .packages-single-card a {
            bottom: 20px;
            position: absolute;
            left: 20px;
            width: 90% !important;
        }

        .packages-single-card {
            position: relative;
        }
    }

    @media only screen and (max-width: 1024px) {}

    @media only screen and (max-width: 991px) {

        .events-lists-sec-01 .text h2 {
            margin-top: 50px;
        }

        .select-packages-boxes .col-lg-3 {
            width: 100%;
        }

        .packages-single-card a {
            width: 94% !important;
        }

        section {
            padding: 50px 50px !important;
        }

        .events-lists-sec-04 {
            padding-left: 50px !important;
        }

        .two-packages {
            flex-direction: column;
        }

        .two-packages .packagesbox {
            padding: 50px 45px;
        }

        .two-packages .packagesbox:last-child {
            margin: 0;
            clip-path: polygon(0 0, 100% 0%, 100% 100%, 0 100%);
        }

        .events-lists-sec-05 .text {
            padding: 0 20px !important;
        }

        .text {
            text-align: center;
            margin-bottom: 60px;
        }

        .text ul li {
            width: fit-content;
            margin: auto auto 10px auto;
        }

        .packages-grid .packages-box .text,
        .events-lists-sec-03 .text,
        .events-lists-sec-01 .text {
            margin: 0;
        }

        .events-lists-last-sec .text {
            width: 100%;
        }

        .events-lists-last-sec {
            background-size: cover !important;
        }

        .events-lists-sec-04 .container-fluid .package-image img {
            width: 100%;
        }

        .packages-single-card a {
            position: relative !important;
            width: 100% !important;
            left: 0 !important;
        }

        .packages-single-card {
            min-height: fit-content !important;
        }

    }

    @media only screen and (max-width: 768px) {

        .packages-grid .packages-box {
            width: 100%;
        }
    }

    @media only screen and (max-width: 575px) {

        .select-packages-boxes {
            padding: 0 10px !important;
        }

        .packages-single-card ul li {
            text-align: center;
        }

        .box-styling {
            text-align: center;
        }

        .packages-single-card .box-subtitle {
            width: 100%;
        }

        section {
            padding: 30px 10px !important;
        }

        .events-lists-sec-03 {
            padding: 40px 10px !important;
        }

        .events-lists-sec-04 {
            padding-left: 10px !important;
        }

        .text {
            margin-bottom: 20px;
        }

        .text p {
            margin: 10px 0 10px !important;
        }

        .text h2 {
            font-size: 22px !important;
        }

        .text p {
            font-size: 13px !important;
        }

        .two-packages .packagesbox {
            padding: 50px 10px;
        }

        .events-lists-sec-01 {
            padding: 0 !important;
        }
    }
</style>
@section('title')
    Packages | Event Organization Tool | Click Invitation
@endsection
@section('description')
    Click Invitation is the all-in-one tool that simplifies every aspect of planning and managing your events with our
    intuitive platform. Learn more about our packages.
@endsection

@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/packages">
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
                    @php
                        $displayedFeatures = [];
                    @endphp

                    @foreach ($packages as $package)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="packages-single-card box-styling">
                                <div class="box-subtitle">{{ $package->name }}</div>
                                <div class="box-unit-price">${{ number_format($package->price, 2) }}</div>
                                <ul>
                                    @foreach (json_decode($package->features) as $feature)
                                        @if (!in_array($feature, $displayedFeatures))
                                            <li>{{ $feature }}</li>
                                            @php
                                                $displayedFeatures[] = $feature;
                                            @endphp
                                        @endif
                                    @endforeach
                                </ul>
                                <p>{{ $package->description }}</p>
                                @guest
                                    <a href="{{ route('web.login') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                                @endguest
                                @auth
                                    <a href="{{ route('panel.index') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                                @endauth
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </section>


    <section class="events-lists-sec-02">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 align-content-center">
                    <div class="text">
                        <h2>Basic Package</h2>
                        <p>This package is perfect for simpler events, providing essential event management tools and
                            helpful gift suggestions. It covers everything from basic event details to managing your guest
                            list and meal preferences.</p>
                        <ul>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">General Info:</span> Includes event date, bride and groom names,
                                    their photos, and event venue details.</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">Webpage:</span> Simple, user-friendly event webpage to share
                                    details with guests.</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">Meals:</span> Meal options and preferences to ensure everyone is
                                    catered to.</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">Gift Suggestions:</span> Personalized gift recommendations for
                                    guests.</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">Invitation:</span> Elegant event invitations to make a lasting
                                    impression.</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">Guest List:</span> Easy tracking and management of RSVPs and guest
                                    attendance.</p>
                            </li>
                        </ul>
                        @guest
                            <a href="{{ route('web.login') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endguest
                        @auth
                            <a href="{{ route('panel.index') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="package-image">
                        <img src="assets/newimages/packages-banner.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="events-lists-sec-03">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg12">
                    <div class="text text-center">
                        <h3>This Package Includes</h3>
                    </div>
                    <div class="packages-grid">
                        <div class="packages-box">
                            <div class="text">
                                <h4>General Info</h4>
                                <p>General Info
                                    The General Info section provides crucial details about the event, including the date, the names of the bride and groom, their photos, and the event venue. This personalized information helps guests feel connected and prepared for the celebration.</p>
                            </div>
                        </div>
                        <div class="packages-box">
                            <div class="text">
                                <h4>Webpage</h4>
                                <p>Set up a simple event webpage to provide guests with all the essential details. This gives them easy access to important information like the date, time, and location.</p>
                            </div>
                        </div>
                        <div class="packages-box">
                            <div class="text">
                                <h4>Meals</h4>
                                <p>Provide guests with meal choices and preferences, making sure to cater to everyone's needs. This helps streamline your event's catering and ensures satisfaction.</p>
                            </div>
                        </div>
                        <div class="packages-box">
                            <div class="text">
                                <h4>Gift Suggestions</h4>
                                <p>Offer personalized gift suggestions for guests to make gift-giving easier. This thoughtful addition helps guests select the perfect present for the occasion.</p>
                            </div>
                        </div>
                        <div class="packages-box">
                            <div class="text">
                                <h4>Invitation</h4>
                                <p>Design and send out beautifully crafted invitations for a lasting first impression. A well-designed invite sets the tone for the event and excites your guests.
                                </p>
                            </div>
                        </div>
                        <div class="packages-box">
                            <div class="text">
                                <h4>Guest List</h4>
                                <p>Effortlessly track and manage your guest list, keeping tabs on RSVPs and attendance. This ensures you know exactly who’s coming and helps with event planning.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="events-lists-sec-02 events-lists-sec-04">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="package-image">
                        <img src="assets/newimages/comprehensive-img.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 align-content-center">
                    <div class="text">
                        <h2>Comprehensive Package</h2>
                        <p>This package offers everything you need for a seamless experience. From table seating arrangements to personalized messaging, it's designed to cater to your needs with full access to all features.</p>
                        <ul>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">Table Seating Arrangements: </span> Custom seating layouts that ensure comfort and efficiency for your guests.</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">Photos: </span> High-quality photos capturing every moment, with easy access to view and download.</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">Acknowledgements: </span> Acknowledgment messages to show appreciation to your guests, making them feel special.</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p><span class="fw-bold">Messaging: </span> Personalized messaging to communicate important information and updates effortlessly.</p>
                            </li>
                        </ul>
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
    </section>

    <section class="events-lists-sec-03">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg12">
                    <div class="text text-center">
                        <h3>This Package Includes</h3>
                        <p>Everything In Basic Package + Including</p>
                    </div>
                    <div class="packages-grid">
                        <div class="packages-box">
                            <div class="text">
                                <h4>Seating Arrangements</h4>
                                <p>Customize seating layouts to ensure both comfort and efficient use of space for your guests. This thoughtful arrangement helps maintain order and creates a welcoming atmosphere.</p>
                            </div>
                        </div>
                        <div class="packages-box">
                            <div class="text">
                                <h4>Photos</h4>
                                <p>Capture high-quality images of every moment during your event. Guests can easily access and download these photos to relive the experience and cherish the memories.</p>
                            </div>
                        </div>
                        <div class="packages-box">
                            <div class="text">
                                <h4>Acknowledgments</h4>
                                <p>Send personalized acknowledgement messages to express your gratitude. These thoughtful notes help make your guests feel valued and appreciated for being part of your event.</p>
                            </div>
                        </div>
                        <div class="packages-box">
                            <div class="text">
                                <h4>Messaging</h4>
                                <p>Communicate important details and updates with ease using personalized messaging. Whether it's event information or last-minute changes, your guests will stay informed and engaged.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="events-lists-sec-02 events-lists-sec-05">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 align-content-center">
                    <div class="text text-center">
                        <h2>Comparison Between Basic & Comprehensive</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s</p>
                    </div>
                    <div class="two-packages">
                        <div class="packagesbox">
                            <div class="text text-center">
                                <h3>Basic Package</h3>
                                <ul>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="packagesbox">
                            <div class="text text-center">
                                <h3>Comprehensive Package</h3>
                                <ul>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                    <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                                fill="#A9967D" />
                                            <path
                                                d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                                fill="#A9967D" />
                                        </svg>
                                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="events-lists-sec-02">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 align-content-center">
                    <div class="text">
                        <h2>We Do It For You Package</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book.</p>
                        <ul>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                            </li>
                            <li><svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5 2.27084C6.75625 2.27084 2.08333 6.94376 2.08333 12.6875C2.08333 18.4313 6.75625 23.1042 12.5 23.1042C18.2437 23.1042 22.9167 18.4313 22.9167 12.6875C22.9167 6.94376 18.2437 2.27084 12.5 2.27084ZM12.5 21.0208C7.90521 21.0208 4.16667 17.2823 4.16667 12.6875C4.16667 8.09272 7.90521 4.35418 12.5 4.35418C17.0948 4.35418 20.8333 8.09272 20.8333 12.6875C20.8333 17.2823 17.0948 21.0208 12.5 21.0208Z"
                                        fill="#A9967D" />
                                    <path
                                        d="M10.4156 14.3406L8.02083 11.95L6.55 13.425L10.4177 17.2844L17.4031 10.299L15.9302 8.82605L10.4156 14.3406Z"
                                        fill="#A9967D" />
                                </svg>
                                <p>Lorem Ipsum is simply dummy text of the printing</p>
                            </li>
                        </ul>
                        @guest
                            <a href="{{ route('web.login') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endguest
                        @auth
                            <a href="{{ route('panel.index') }}" class="btn t-btn">{{ __('packages.buy_now') }}</a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="package-image">
                        <img src="assets/newimages/packagesec-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="events-lists-sec-03 events-lists-last-sec"
        style="background-image: url(assets/newimages/packagelastsec-img.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg12">
                    <div class="text text-center">
                        <h2>Sit Back & Relax Because We Manage Everthing</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    $(document).ready(function() {
        // Check if the current page is the target page
        if (window.location.pathname === '/Events-Lists.html') {
            $('#exampleModalCenter02').modal('show');
        }
    });
</script>
