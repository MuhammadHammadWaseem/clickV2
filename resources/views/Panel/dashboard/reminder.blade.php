@extends('Panel.layout.master')

@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $eventId = GeneralHelper::getEventId();
    @endphp

    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling your-web-page reminders">
                    <div class="text">
                        <h2>Reminders</h2>
                        <p class="bold-text-color-change">This is what your guest will get in the message you send.</p>
                        <p>You can share a picture and send it to all at once with the link to upload their pictures so all
                            memories of your event are shared in one private gallery on your web page.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling preview actions ">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>Actions</h2>
                        </div>
                        <button type="button" class="btn btn-primary t-btn" data-toggle="modal"
                            data-target="#exampleModalCenter03">Send Mail </button>
                    </div>
                    <div class="action-iframe">
                        <img src="assets/images/action-img-iframe.png" alt="">
                    </div>
                    <div class="three-inputs">
                        <div class="box" id="TitleEditor">
                            <label>Title</label>
                            <textarea placeholder="Title" id="title">{{ $reminder[0]->atitle }}</textarea> <!-- Use a textarea -->
                        </div>
                        <div class="box" id="SubtitleEditor">
                            <label>Subtitle</label>
                            <textarea placeholder="Subtitle" id="subtitle">{{ $reminder[0]->asubtitle }}</textarea> <!-- Use a textarea -->
                        </div>
                        <div class="box" id="TextEditor">
                            <label>Text</label>
                            <textarea placeholder="Text" id="text">{{ $reminder[0]->atext }}</textarea> <!-- Use a textarea -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal"  data-target="#exampleModalCenter03"> Images Added Successfully </button> -->
    <!-- Modal -->
    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter03" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Send To Who?</h5>
                    <button type="button" class="close close_icon" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <div class="table-box">
                            <table>
                                <tr>
                                    <th>Names</th>
                                    <th>
                                        <input type="checkbox" class="check_box_style" id="select-all-phone"> Contact #
                                    </th>
                                    <th>
                                        <input type="checkbox" class="check_box_style" id="select-all-email"> Email Address
                                    </th>
                                    <th>
                                        <input type="checkbox" class="check_box_style" id="select-all-whatsapp"> WhatsApp
                                    </th>
                                </tr>

                                @foreach ($guests as $g)
                                    <tr>
                                        <td>{{ $g->name }}</td>
                                        <td>
                                            @if ($g->phone != null)
                                                <input type="checkbox" class="check_box_style phone-checkbox"
                                                    data-guest-id="{{ $g->id_guest }}">
                                                {{ $g->phone }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($g->email != null)
                                                <input type="checkbox" class="check_box_style email-checkbox"
                                                    data-guest-id="{{ $g->id_guest }}">
                                                {{ $g->email }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($g->whatsapp != null)
                                                <input type="checkbox" class="check_box_style whatsapp-checkbox"
                                                    data-guest-id="{{ $g->id_guest }}">
                                                {{ $g->whatsapp }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-secondary t-btn" id="send-sms-btn">Send SMS</button>
                    <button type="button" class="btn btn-secondary t-btn" id="send-email-btn">Send Email</button>
                    <button type="button" class="btn btn-secondary t-btn" id="send-whatsapp-btn">Send Whatsapp</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
@section('scripts')
    <script>
        $(document).ready(function() {
            // Initialize CKEditor on the Title, Subtitle, and Text fields
            var titleEditor, subtitleEditor, textEditor;

            ClassicEditor
                .create(document.querySelector('#title'))
                .then(newEditor => {
                    titleEditor = newEditor; // Store the editor instance for title
                })
                .catch(error => {
                    console.error('CKEditor error for Title:', error);
                });

            ClassicEditor
                .create(document.querySelector('#subtitle'))
                .then(newEditor => {
                    subtitleEditor = newEditor; // Store the editor instance for subtitle
                })
                .catch(error => {
                    console.error('CKEditor error for Subtitle:', error);
                });

            ClassicEditor
                .create(document.querySelector('#text'))
                .then(newEditor => {
                    textEditor = newEditor; // Store the editor instance for text
                })
                .catch(error => {
                    console.error('CKEditor error for Text:', error);
                });

            // Debugging
            console.log('CKEditor and data fetching script loaded');

            // Select all phone checkboxes
            $('#select-all-phone').on('click', function() {
                $('.phone-checkbox').prop('checked', this.checked);
            });

            // Select all email checkboxes
            $('#select-all-email').on('click', function() {
                $('.email-checkbox').prop('checked', this.checked);
            });

            // Select all WhatsApp checkboxes
            $('#select-all-whatsapp').on('click', function() {
                $('.whatsapp-checkbox').prop('checked', this.checked);
            });

            // Optional: if all checkboxes in a column are manually selected, automatically check the header checkbox
            $('.phone-checkbox').on('change', function() {
                $('#select-all-phone').prop('checked', $('.phone-checkbox:checked').length === $(
                    '.phone-checkbox').length);
            });

            $('.email-checkbox').on('change', function() {
                $('#select-all-email').prop('checked', $('.email-checkbox:checked').length === $(
                    '.email-checkbox').length);
            });

            $('.whatsapp-checkbox').on('change', function() {
                $('#select-all-whatsapp').prop('checked', $('.whatsapp-checkbox:checked').length === $(
                    '.whatsapp-checkbox').length);
            });


            function getSelectedGuests(checkboxClass) {
                var selectedGuests = [];
                $(checkboxClass + ':checked').each(function() {
                    // Store only the guest ID, which you will attach to the checkbox data attribute
                    var guestId = $(this).data(
                        'guest-id'); // Ensure you're using a data attribute with the ID
                    if (guestId) {
                        selectedGuests.push(guestId); // Add the guest ID to the array
                    }
                });
                return selectedGuests;
            }


            // When Send SMS is clicked
            $('#send-sms-btn').on('click', function() {
                var selectedPhones = getSelectedGuests('.phone-checkbox');
                if (selectedPhones.length > 0) {
                    console.log('Selected Guest IDs for SMS:', selectedPhones);
                    // Here, you can handle the sending of SMS logic
                } else {
                    alert('No guests selected for SMS');
                }
            });

            // When Send Email is clicked
            $('#send-email-btn').on('click', function() {
                var eventId = {{ $eventId }};
                var selectedEmails = getSelectedGuests('.email-checkbox');
                console.log(selectedEmails);
                if (selectedEmails.length > 0) {
                    console.log('Selected Guest IDs for Email:', selectedEmails);
                    $.ajax({
                        url: "{{ route('panel.event.sendAckMail', ':id') }}".replace(':id',
                            eventId), // Your Laravel route
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            selectedEmails: selectedEmails, // Send the selected email guest IDs in the request
                            idevent: eventId, // Send the selected email guest IDs in the request
                        },
                        success: function(response) {
                            console.log(response);
                            toastr.success("Email successfully send");
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                // Validation error - extract and display errors
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    toastr.error(value[0]); // Show error using Toastr
                                });
                            } else {
                                // General error handling
                                toastr.error('Failed to upload photos. Please try again.');
                                console.error(xhr.responseText);
                            }
                        }
                    });
                } else {
                    alert('No guests selected for Email');
                }
            });

            $('#send-whatsapp-btn').on('click', function() {
                var eventId = {{ $eventId }}; // The event ID
                var selectedWhatsapps = getSelectedGuests(
                    '.whatsapp-checkbox'); // Get selected WhatsApp guest IDs
                console.log(selectedWhatsapps);

                if (selectedWhatsapps.length > 0) {
                    console.log('Selected Guest IDs for WhatsApp:', selectedWhatsapps);

                    $.ajax({
                        url: "{{ route('panel.event.sendAcWhatsapp', ':id') }}".replace(':id',
                            eventId), // Your WhatsApp route
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            guests: selectedWhatsapps, // Send the selected WhatsApp guest IDs in the request
                            idevent: eventId // Send the event ID
                        },
                        success: function(response) {
                            console.log(response);
                            toastr.success("WhatsApp message sent successfully");
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                // Validation error - extract and display errors
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    toastr.error(value[0]); // Show error using Toastr
                                });
                            } else {
                                // General error handling
                                toastr.error(
                                    'Failed to send WhatsApp messages. Please try again.');
                                console.error(xhr.responseText);
                            }
                        }
                    });
                } else {
                    alert('No guests selected for WhatsApp');
                }
            });

            $('#send-sms-btn').on('click', function() {
                var eventId = {{ $eventId }}; // The event ID
                var selectedPhones = getSelectedGuests(
                '.phone-checkbox'); // Get selected phone numbers for SMS
                console.log(selectedPhones);

                if (selectedPhones.length > 0) {
                    console.log('Selected Guest IDs for SMS:', selectedPhones);

                    $.ajax({
                        url: "{{ route('panel.event.sendAcSm', ':id') }}".replace(':id',
                        eventId), // Your SMS route
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            guests: selectedPhones, // Send the selected phone numbers in the request
                            idevent: eventId // Send the event ID
                        },
                        success: function(response) {
                            console.log(response);
                            toastr.success("SMS sent successfully");
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                // Validation error - extract and display errors
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    toastr.error(value[0]); // Show error using Toastr
                                });
                            } else {
                                // General error handling
                                toastr.error('Failed to send SMS. Please try again.');
                                console.error(xhr.responseText);
                            }
                        }
                    });
                } else {
                    alert('No guests selected for SMS');
                }
            });



        });
    </script>
@endsection