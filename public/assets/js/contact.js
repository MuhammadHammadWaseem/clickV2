(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {
        // $(document).on('submit', '#contact_form_submit', function (e) {
        //     e.preventDefault();
        //     var name = $('#name').val();
        //     var email = $('#email').val();
        //     var subject = $('#subject').val();

        //     var message = $('#message').val();


        //     if (name && email && message) {
        //         $.ajax({
        //             type: "GET",
        //             url: '/sendcontact',
        //             data: {
        //                 'name': name,
        //                 'email': email,
        //                 'subject': subject,
        //                 'message': message,
        //             },
        //             success: function (data) {
        //                 $('#contact_form_submit').children('.email-success').remove();
        //                 $('#contact_form_submit').prepend('<span class="alert alert-success email-success">' + data + '</span>');
        //                 $('#name').val('');
        //                 $('#email').val('');
        //                 $('#message').val('');
        //                 $('#subject').val('');
        //                 $('#phone').val('');
        //                 // $('#map').height('576px');
        //                 $('.email-success').fadeOut(3000);
        //                 toastr.success('Guest added successfully!');
        //             },
        //             error: function (res) {
        //                 //console.log(res);
        //             }
        //         });
        //     } else {
        //         $('#contact_form_submit').children('.email-success').remove();
        //         $('#contact_form_submit').prepend('<span class="alert alert-danger email-success">All Fields are Required.</span>');
        //         // $('#map').height('576px');
        //         $('.email-success').fadeOut(3000);
        //     }

        // });
    })

}(jQuery));