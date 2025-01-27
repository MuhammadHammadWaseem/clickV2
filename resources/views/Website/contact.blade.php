@extends('Website.Layouts.master')
<style>
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
    Contact Us - Your Event Partner | Click Invitation
@endsection
@section('description')
    Click Invitation is your trusted event partner, offering top-notch planning, organization, and execution services.
    Contact us today to start your Free trial.
@endsection

@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/contact">
@endsection

@section('content')
    <div class="container">
        <div class="heading-text">
            <h1>
                {{ __('support.questions_suggestions') }}
            </h1>
            <p>
                {{ __('support.collaboration_message') }}
            </p>
        </div>

        <div class="main-img">
            <img src="assets/newimages/Frame 774.webp" alt="get-in-touch">
        </div>
        <div class="heading-text">
            <h2>
                {{ __('contact.get_in_touch') }} <span class="bold-text"> ClickInvitation.com </span>
            </h2>
            <p class="textarea">
                {{ __('contact.contact_message') }}
            </p>
        </div>
        <div class="form-content">
            <form class="contact-form" id="contact_form_submit">
                <input type="text" id="name" name="fullName" placeholder="{{ __('contact.full_name_placeholder') }}" required><br>
                <input type="email" id="email" name="email" placeholder="{{ __('contact.email_placeholder') }}" required><br>
                <input type="text" id="subject" name="subject" placeholder="{{ __('contact.subject_placeholder') }}" required><br>
                <textarea id="message" name="message" rows="4" cols="50" placeholder="{{ __('contact.message_placeholder') }}" required></textarea><br>
                <button type="submit" value="Send" id="sendButton">{{ __('contact.send') }}</button>
                <div id="okmessage" class="text-success text-center"></div>
            </form>
        </div>
        <div class="heading-text">
            <h2>
                {{ __('contact.Have') }} <span class="bold-text">  {{ __('contact.any') }} </span> {{ __('contact.questions') }}
            </h2>
            <p class="textarea">
                {{ __('contact.contact_experience_team') }}

            </p>
        </div>
        <div class="contact-info">
            <div class="email-content mailto">
                <img src="assets/newimages/Frame 775.png" alt="">
                <h3>{{ __('contact.email_us_today') }}</h3>
                <a href="mailto:info@clickinvitation.com">Info@clickinvitation.com</a>
            </div>
            <div class="number-content mailto">
                <img src="assets/newimages/call.png" alt="">
                <h3>{{ __('contact.give_us_a_call') }}</h3>
                <a href="tel:+1 (438) 303-9948">+1 (438) 303-9948</a>
            </div>
        </div>
        <div class="image">
            <img src="assets/newimages/Component 39.webp" alt="contact-us">
        </div>
    </div>
    <div class="container">
        
        <script>
            $(document).on('submit', '#contact_form_submit', function (e) {
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var subject = $('#subject').val();
    
                var message = $('#message').val();
    
    
                if (name && email && message) {
                    $.ajax({
                        type: "GET",
                        url: '/sendcontact',
                        data: {
                            'name': name,
                            'email': email,
                            'subject': subject,
                            'message': message,
                        },
                        success: function (data) {
                            $('#contact_form_submit').children('.email-success').remove();
                            $('#contact_form_submit').prepend('<span class="alert alert-success email-success">' + data + '</span>');
                            $('#name').val('');
                            $('#email').val('');
                            $('#message').val('');
                            $('#subject').val('');
                            $('#phone').val('');
                            // $('#map').height('576px');
                            $('.email-success').fadeOut(3000);
                            toastr.success('Your message has been sent successfully.');
                        },
                        error: function (res) {
                            //console.log(res);
                            toastr.error('Something went wrong. Please try again later.');
                        }
                    });
                } else {
                    $('#contact_form_submit').children('.email-success').remove();
                    $('#contact_form_submit').prepend('<span class="alert alert-danger email-success">All Fields are Required.</span>');
                    // $('#map').height('576px');
                    $('.email-success').fadeOut(3000);
                }
    
            });
        </script>
    @endsection
