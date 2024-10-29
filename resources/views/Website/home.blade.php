@extends('Website.Layouts.master')
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
                {{ __(' home.Some of Most') }} <span class="bold-text">{{ __('home.Popular') }}</span>
                {{ __('home.Popular Events Subheading') }}
            </h2>

            {{ __('home.Trial Offer Paragraph') }}

        </div>


        <div class="popular-events">

            <div class="col-lg-6 col-md-12">
                <div class="inner-sec">
                    <a href="/login" class="Wedding-Events">

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

                        <a href="/login" class="Wedding-Events">
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

                        <a href="/login" class="Wedding-Events">
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

                        <a href="/login" class="Wedding-Events">
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

                        <a href="/login" class="Wedding-Events">
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

                        <a href="/login" class="Wedding-Events">
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
                {{ __('home.Some of the') }} <span class="bold-text">{{ __('home.features') }} </span>{{ __('home.that are going') }}
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
                    {{ __('home.Top Invitations Heading') }} <span class="bold-text">{{ __('home.Recommended') }} </span> {{ __('home.by our users') }}
                </h2>
                <p>
                    {{ __('home.Event Design Reminder') }}
                </p>

            </div>

        </div>

        <div class="container my-2 py-4">


            <div class="slider">
                <div class="mx-3">
                    <div class="card border-0 rounded-0">
                        <img src="assets/newimages/Component 27 (1).png" alt="paperless-post-birthday-invitations">
                    </div>
                </div>
                <div class="mx-3">
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
                </div>
            </div>

        </div>
    </div>


    <div class="container">

        <a href="/events" class="view-more-events second">
            {{ __('home.View Events ') }}<img src="assets/newimages/Group 12 (2).png" alt="">
        </a>

        <div class="content-box">
            <h2 class="heading-center third">
                {{ __('home.customer_feedback_part_1') }} <span class="bold-text">{{ __('home.customer_feedback_part_2') }} </span> {{ __('home.customer_feedback_part_3') }}
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
                Using QR Codes for <span class="bold-text"> Seamless Event Check-In</span> and Organizer Tracking

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

                    <h4 style="padding-bottom:10px;">QR codes have transformed event check-in and made tracking a breeze.
                        Here's how to use them:</h4>
                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>Arrival and QR Code:</b> When you arrive at the
                        event, have your
                        digital or printed invitation ready. The QR code is typically found on the invitation.
                    </li>

                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>Scan the QR Code:</b> Use your smartphone or a
                        QR code scanner app to
                        scan the code. This will take you to the event's check-in page.</li>

                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>Check-In Process:</b> On the check-in page,
                        follow the instructions.
                        You may need to confirm your attendance and provide contact information. </li>

                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>QR Code Check-In:</b> After successfully
                        checking in, the page may
                        display your table number or name. The QR code is designed for organizers to track guest arrivals
                        and check them in.</li>

                    <li style="padding-left: 1em; padding-bottom: 8px;"><b>Event Enjoyment:</b> With the check-in process
                        complete, you're all
                        set to enjoy the event. There's no need to search for your table or wait in line at the reception
                        door.</li>
                    <h4 style="padding-top:10px;">QR codes simplify event check-in and provide organizers with real-time
                        tracking data. They enhance
                        the guest experience and make events run more smoothly.</h4>
                    <ul>
            </div>
        </div>

        <div class="phone-img">
            <img src="assets/newimages/Group 58.webp" alt="qr-code-invitation">
        </div>


        <h2 class="heading-center fifth">
            FREQUENTLY <span class="bold-text">ASK </span>QUESTIONS
        </h2>

        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-item-header">
                    What is ClickInvitation?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        ClickInvitation is an online platform that simplifies event planning by providing digital
                        invitations for all types of events. We offer a wide range of customizable invitation templates and
                        tools to help you manage RSVPs and event details.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    How does ClickInvitation work?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        It's easy! Choose a template, personalize it with your event details, and then send it to your
                        guests electronically. They can RSVP online, and you can track responses in real-time, making event
                        planning a breeze.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    What types of events can I use ClickInvitation for?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        ClickInvitation can be used for any event, from birthday parties and weddings to corporate events
                        and fundraisers. We have templates to suit a wide variety of occasions.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    Are the digital invitations customizable?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        Yes, absolutely! You can customize the text, colors, fonts, and even add your own images or logos to
                        make the invitations uniquely yours.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    Is ClickInvitation eco-friendly?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        Yes, we're committed to reducing paper waste. By using digital invitations, you're helping the
                        environment by eliminating the need for physical paper invitations.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    How do guests RSVP to an invitation?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        Guests can easily RSVP by clicking the RSVP button on the digital invitation. They can indicate
                        whether they will attend, and you'll receive their responses instantly.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    Can I track RSVPs and manage my guest list?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        Absolutely! ClickInvitation provides a guest list management feature that allows you to keep track
                        of RSVPs, send reminders, and update event details as needed.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    Is ClickInvitation secure for sharing event details?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        Yes, we prioritize security and privacy. All event details and RSVPs are kept confidential and
                        accessible only to you and your invited guests.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    How much does ClickInvitation cost?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        We offer 5 days complete website trial no strings attached. And then 99$ to subscribe for 2
                        years per event.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    Do we have a count for the guests and dishes?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        Yes, on the tables page, an auto count is implemented so you can print and hand to your reception
                        hall or restaurant .
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    Can we steer our guests to their tables?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        Yes, we made it very easy to create tables and assign the guests to their seats.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-item-header">
                    Does it include a photo gallery?
                </div>
                <div class="accordion-item-body">
                    <div class="accordion-item-body-content">
                        Yes, we offer a photo gallery for all photos uploaded by the organizers and their guests to the
                        private webpage of the event.
                    </div>
                </div>
            </div>
        </div>

        <div class="inner-heading">
            <h2 class="heading-center sixth">
                <span class="bold-text">About</span> Clickinvitation.com
            </h2>
        </div>


        <div class="background-picture-box">

            <h2 style="">Effortless Event Planning</h2>


            <p>
                ClickInvitation streamlines every aspect of event planning, offering auto guest count,
                customizable invitations, and intuitive table and seating arrangement tools for seamless,
                stress-free celebrations. Personalize your event with our easy-to-use customization options
                or upload your own designs for unique, memorable invitations.

            </p>
            <a href="/about" class="view-more-events third">
                Discover More Info <img src="assets/newimages/Group 12 (3).png" alt="">
            </a>

        </div>



    </div>
@endsection
