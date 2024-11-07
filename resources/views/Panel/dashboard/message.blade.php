@extends('Panel.Layout.master')

@section('content')
    <style>

.ck.ck-reset.ck-editor.ck-rounded-corners {
    border-radius: 10px !important;
    overflow: hidden;
}

#save-btn {
    width: 100%;
}
        .box-styling.preview.actions .action-iframe iframe {
            border-radius: 10px;
            width: 100%;
            height: 100vh;
            object-fit: contain;
            margin: 20px 0;
        }


.message-active a {
  color: #C09D2A !important;
}

.message-active img {
  filter: none !important;
}

.message-active {
  background-color: #c09d2a29 !important;
}

.message-active::after {
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
    @php
        use App\Helpers\GeneralHelper;
        $eventId = GeneralHelper::getEventId();
    @endphp

    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling your-web-page reminders">
                    <div class="text">
                        <h2>{{ __('message.Messages') }}</h2>
                        <p>{{ __('message.thank_you_card_text') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling preview actions ">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>{{ __('message.actions') }}</h2>
                        </div>
                        <button type="button" class="btn btn-primary t-btn" data-toggle="modal"
                            data-target="#exampleModalCenter03">{{ __('message.send_mail') }} </button>
                    </div>
                    <div class="action-iframe">
                        <iframe src="{{ url('/mail-message/') }}/fake/{{ $eventId }}" frameborder="0"></iframe>
                    </div>
                    <div class="three-inputs">
                        <div class="box">
                            <label>{{ __('message.title') }}</label>
                            <textarea placeholder="{{ __('message.title_placeholder') }}" id="title">{{ $message[0]->mtitle }}</textarea> <!-- Use a textarea -->
                        </div>
                        <div class="box">
                            <label>{{ __('message.subtitle') }}</label>
                            <textarea placeholder="{{ __('message.subtitle_placeholder') }}" id="subtitle">{{ $message[0]->msubtitle }}</textarea> <!-- Use a textarea -->
                        </div>
                        <div class="box">
                            <label>{{ __('message.text') }}</label>
                            <textarea placeholder="{{ __('message.text_placeholder') }}" id="text">{{ $message[0]->mtext }}</textarea> <!-- Use a textarea -->

                        </div>
                    </div>
                    <div class="text-right mt-3"> <!-- Aligns the button to the right -->
                        <button type="button" class="btn btn-success t-btn" id="save-btn" onclick="updateData()">{{ __('message.save') }}</button>
                    </div>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('message.send_to_who') }}</h5>
                    <button type="button" class="close close_icon" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <div class="table-box">
                            <table>
                                <tr>
                                    <th>{{ __('message.names') }}</th>
                                    <th>
                                        <input type="checkbox" class="check_box_style" id="select-all-phone"> {{ __('message.contact_number') }}
                                    </th>
                                    <th>
                                        <input type="checkbox" class="check_box_style" id="select-all-email">{{ __('message.email_address') }}
                                    </th>
                                    <th>
                                        <input type="checkbox" class="check_box_style" id="select-all-whatsapp"> {{ __('message.whatsapp') }}
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('message.close') }}</button>
                    <button type="button" class="btn btn-secondary t-btn" id="send-sms-btn">{{ __('message.send_sms') }}</button>
                    <button type="button" class="btn btn-secondary t-btn" id="send-email-btn">{{ __('message.send_email') }}</button>
                    <button type="button" class="btn btn-secondary t-btn" id="send-whatsapp-btn">{{ __('message.send_whatsapp') }}</button>
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
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <img src="assets/images/circle-check.png" alt="">
                        <h2>{{ __('message_sent') }}</h2>
                        <p>{{ __('message_sent_success') }}</p>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('message.close') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter08" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text">
                    <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt="">
                    <h2>{{ __('message.message_update_success') }}</h2>
                    <p>{{ __('message.message_update_success_message') }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="successmodalCloseBtn" data-dismiss="modal">{{ __('message.close') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
@section('scripts')
    <script>
        var titleEditor, subtitleEditor, textEditor;
        $(document).ready(function() {

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

            $('#send-email-btn').on('click', function() {
                var eventId = {{ $eventId }};
                var selectedEmails = getSelectedGuests('.email-checkbox');
                console.log(selectedEmails);
                if (selectedEmails.length > 0) {
                    console.log('Selected Guest IDs for Email:', selectedEmails);
                    $.ajax({
                        url: "{{ route('panel.event.sendSmsMail', ':id') }}".replace(':id',
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
                        url: "{{ route('panel.event.sendSmsWhatsapp', ':id') }}".replace(':id',
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
                        url: "{{ route('panel.event.sendSmSms', ':id') }}".replace(':id',
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

        function updateData() {
            // Get values from the textareas
            const title = titleEditor.getData(); // Use the CKEditor instance for title
            const subtitle = subtitleEditor.getData(); // Use the CKEditor instance for subtitle
            const text = textEditor.getData();

            console.log("ddd", title);
            // Assuming you have a variable for the event ID
            const eventId = '{{ $message[0]->id_event }}'; // Replace with actual event ID as needed

            // Prepare the data to be sent
            const formData = new FormData();
            formData.append('mtitle', title);
            formData.append('msubtitle', subtitle);
            formData.append('mtext', text);
            formData.append('midevent', {{ $eventId }});
            // Add other data as needed
            // If you want to send a photo, include it here as well
            // formData.append('photo', <your_photo_data>);

            fetch(`/event/${eventId}/editsaveMessage`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token for security
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data == 1) {
                        toastr.success("Changes saved successfully!");
                        var successModal = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter08'));
                        successModal.show();
                        const iframe = document.querySelector('iframe');
                    iframe.src = iframe.src;
                    } else {
                        toastr.error("Failed to save changes.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving changes.');
                });
        }
    </script>
@endsection
