@extends('Panel.layout.master')

@section('content')
    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="box-styling general-event-information">
                    <div class="text">
                        <h2>General Event Information</h2>
                        <p>This page is to setup your web page information. All the info you enter here will be shown on
                            your web page for your guests to see, you can add your pictures or your YouTube link for a story
                            video and more.</p>
                        <p class="note"> <b>Note:</b> Fill only what you think necessary and what you want to inform your
                            guests about.</p>
                    </div>
                </div>
            </div>
            {{-- {{ dd($event) }} --}}
            <div class="col-lg-6 col-md-12">
                <div class="box-styling edit-event">
                    <div class="text">
                        <h2>Edit Event</h2>
                        <form method="POST" enctype="multipart/form-data" id="editEventForm"
                            action="{{ route('panel.updateEvent', $event->id) }}">
                            <input type="hidden" value="{{ $event->id }}" name="event_id">
                            @csrf

                            <input type="text" placeholder="Event Name" value="{{ $event->name }}" name="event">
                            <input type="date" id="eventDate" name="event_date" placeholder="Event Date"
                                value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="box-styling person-details">
                    <div class="text">
                        <h2>Groom Details</h2>
                        <div class="person-box">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="groom_img" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url('{{ Storage::url('/groom' . $event->imggroom) }}');">
                                    </div>
                                </div>

                            </div>
                            <input type="text" placeholder="First Name" name="groomfname" value="{{ $event->groomfname }}">
                            <input type="text" placeholder="Last Namee" name="groomlname" value="{{ $event->groomlname }}">
                            <textarea placeholder="Message Here" name="groomsummary">{{ $event->groomsummary }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="box-styling person-details">
                    <div class="text">
                        <h2>Bride Details</h2>
                        <div class="person-box">

                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload2" accept=".png, .jpg, .jpeg" name="bride_img" />
                                    <img src="{{ Storage::url('/bride' . $event->imgbride) }}" alt="">
                                    <label for="imageUpload2"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview2" style="background-image: url('{{ Storage::url('/bride' . $event->imgbride) }}');">
                                    </div>
                                </div>
                            </div>
                            <input type="text" placeholder="First Name" name="bridefname" value="{{ $event->groomlname }}">
                            <input type="text" placeholder="Last Namee" name="bridelname" value="{{ $event->bridelname }}">
                            <textarea placeholder="Message Here" name="bridesummary">{{$event->bridesummary  }}</textarea>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="box-styling relationship-story">
                    <div class="text">
                        <h2>Relationship Story</h2>
                        <textarea placeholder="Type Here" name="story">{{ $event->summary }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box-styling ceremony-box">
                    <div class="text">
                        <div class="align-text-box">
                            <h2>Ceremony</h2>
                        </div>

                        <div class="person-box">
                            <input type="text" placeholder="location" name="ceremony_location" value="">
                            <input type="time" placeholder="Event Time" name="event_time" value="">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7112.801846878584!2d-1.5164632188270797!3d50.92824510422275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48738a3dd7ad5e33%3A0x10f95f7cedac0482!2sCalmore%2C%20Southampton%2C%20UK!5e0!3m2!1sen!2s!4v1720646307913!5m2!1sen!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <textarea placeholder="Event Description" name="ceremony_description">{{ $event->cerdesc }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box-styling ceremony-box">
                    <div class="text">
                        <div class="align-text-box">
                            <h2>Recption</h2>
                        </div>

                        <div class="person-box">
                            <input type="text" placeholder="location" name="reception_location" value="">
                            <input type="time" placeholder="Event Time" name="reception_time" value="">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7112.801846878584!2d-1.5164632188270797!3d50.92824510422275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48738a3dd7ad5e33%3A0x10f95f7cedac0482!2sCalmore%2C%20Southampton%2C%20UK!5e0!3m2!1sen!2s!4v1720646307913!5m2!1sen!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <textarea placeholder="Event Description" name="reception_description" value=""></textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box-styling ceremony-box">
                    <div class="text">
                        <div class="align-text-box">
                            <h2>Custom Event</h2>
                        </div>
                        <div class="person-box">
                            <input type="text" placeholder="Event Name" name="custom_event" value="">
                            <input type="text" placeholder="location" name="custom_location" value="">
                            <input type="time" placeholder="Event Time" name="location">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7112.801846878584!2d-1.5164632188270797!3d50.92824510422275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48738a3dd7ad5e33%3A0x10f95f7cedac0482!2sCalmore%2C%20Southampton%2C%20UK!5e0!3m2!1sen!2s!4v1720646307913!5m2!1sen!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <textarea placeholder="Event Description" name="custom_description" value=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button class="w-100 save t-btn" type="button" id="submitEditEvent">Save</button>
            </form>
        </div>
    </div>
@endsection()
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitEditEvent').click(function() {
            // Get the form data
            var formData = new FormData($('#editEventForm')[0])
            var eventId = formData.get('event_id'); // Get event_id from form data
            // Generate the URL using Blade syntax
            var updateUrl = `{{ route('panel.updateEvent', ':id') }}`.replace(':id', eventId);

            // AJAX request to update the event
            $.ajax({
                url: updateUrl,
                type: 'POST',
                data: formData,
                contentType: false, // Prevent jQuery from overriding the Content-Type
                processData: false, // Prevent jQuery from automatically transforming the data into a query string
                success: function(response) {
                    // Show success notification
                    toastr.success('Event updated successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    // Handle error response
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function(key, value) {
                            toastr.error(value[
                            0]);
                        });
                    } else {
                        toastr.error('Failed to update event. Please try again.');
                    }
                    console.error(xhr.responseJSON); // Log error response for debugging
                }
            });
        });
    });
</script>
