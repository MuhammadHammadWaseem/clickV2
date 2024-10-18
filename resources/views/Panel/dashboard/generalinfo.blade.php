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
            <div class="col-lg-6 col-md-12">
                <div class="box-styling edit-event">
                    <div class="text">
                        <h2>Edit Event</h2>
                        <form method="POST" enctype="multipart/form-data" id="editEventForm"
                            action="{{ route('panel.event.updateEvent', $event->id_event) }}">
                            <input type="hidden" value="{{ $event->id_event }}" name="event_id">
                            @csrf

                            <input type="text" placeholder="Event Name" value="{{ $event->name }}" name="event">
                            <input type="datetime-local" id="eventDate" name="event_date" placeholder="Event Date"
                                value="{{ $event->date }}">
                    </div>
                </div>
            </div>
            @if ($event->eventType->couple_event == '1')
                <div class="col-lg-6 col-md-12">
                    <div class="box-styling person-details">
                        <div class="text">
                            <h2>Groom Details</h2>
                            <div class="person-box">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"
                                            name="groom_img" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"
                                            @if (file_exists(public_path($event->imggroom))) style="background-image: url('{{ asset($event->imggroom) }}');"
                                        @else
                                            style="background-image: url('{{ asset('assets/Panel/images/bride-img.png') }}');" @endif>
                                        </div>

                                    </div>

                                </div>
                                <input type="text" placeholder="First Name" name="groomfname"
                                    value="{{ $event->groomfname }}">
                                <input type="text" placeholder="Last Namee" name="groomlname"
                                    value="{{ $event->groomlname }}">
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
                                        <input type='file' id="imageUpload2" accept=".png, .jpg, .jpeg"
                                            name="bride_img" />
                                        <label for="imageUpload2"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview2"
                                            @if (file_exists(public_path($event->imgbride))) style="background-image: url('{{ asset($event->imgbride) }}');"
                                        @else
                                            style="background-image: url('{{ asset('assets/Panel/images/groom-img.png') }}');" @endif>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" placeholder="First Name" name="bridefname"
                                    value="{{ $event->groomlname }}">
                                <input type="text" placeholder="Last Namee" name="bridelname"
                                    value="{{ $event->bridelname }}">
                                <textarea placeholder="Message Here" name="bridesummary">{{ $event->bridesummary }}</textarea>

                            </div>


                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-12 col-md-12">
                <div class="box-styling relationship-story">
                    <div class="text">
                        <h2>@if ($event->eventType->couple_event == '1')Relationship Story @elseif ($event->eventType->couple_event == '0') EVENT SUMMARY @endif</h2>
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
                            <input type="text" placeholder="location" id="ceraddress" name="ceraddress"
                                value="{{ $event->ceraddress }}">
                            <input type="time" placeholder="Event Time" name="certime" value="{{ $event->certime }}">
                            <input type="hidden" id="cerAddressLink">
                            {{-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7112.801846878584!2d-1.5164632188270797!3d50.92824510422275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48738a3dd7ad5e33%3A0x10f95f7cedac0482!2sCalmore%2C%20Southampton%2C%20UK!5e0!3m2!1sen!2s!4v1720646307913!5m2!1sen!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            <div id="mapView" style="width: 100%; height: 400px;"></div>
                            <textarea placeholder="Event Description" name="cerdesc">{{ $event->cerdesc }}</textarea>
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
                            <input type="text" placeholder="location" id="recaddress" name="recaddress"
                                value="{{ $event->recaddress }}">
                            <input type="hidden" id="recAddressLink">
                            <input type="time" placeholder="Event Time" name="rectime"
                                value="{{ $event->rectime }}">
                            {{-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7112.801846878584!2d-1.5164632188270797!3d50.92824510422275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48738a3dd7ad5e33%3A0x10f95f7cedac0482!2sCalmore%2C%20Southampton%2C%20UK!5e0!3m2!1sen!2s!4v1720646307913!5m2!1sen!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            <div id="RecmapView" style="width: 100%; height: 400px;"></div>
                            <textarea placeholder="Event Description" name="recdesc">{{ $event->recdesc }}</textarea>
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
                            <input type="text" placeholder="Event Name" name="parname"
                                value="{{ $event->parname }}">
                            <input type="hidden" id="parAddressLink">
                            <input type="text" placeholder="location" id="paraddress" name="paraddress"
                                value="{{ $event->paraddress }}">
                            <input type="time" placeholder="Event Time" name="partime"
                                value="{{ $event->partime }}">
                            {{-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7112.801846878584!2d-1.5164632188270797!3d50.92824510422275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48738a3dd7ad5e33%3A0x10f95f7cedac0482!2sCalmore%2C%20Southampton%2C%20UK!5e0!3m2!1sen!2s!4v1720646307913!5m2!1sen!2s"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            <div id="ParmapView" style="width: 100%; height: 400px;"></div>
                            <textarea placeholder="Event Description" name="pardesc">{{ $event->pardesc }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button class="w-100 save t-btn" type="button" id="submitEditEvent">Save</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
                d[l](f, ...n))
        })
        ({
            key: "AIzaSyBW3i6Ia5wC19YV9654N4jISic1Uzvft8M",
            v: "weekly"
        });

        let map;

        async function initMap() {
            const {
                Map
            } = await google.maps.importLibrary("maps");
            const {
                Geocoder
            } = await google.maps.importLibrary("geocoding");

            const geocoder = new Geocoder();

            // Fetch addresses from Blade variables (these should be passed from your controller)
            const address = document.getElementById("ceraddress").value;
            const recaddress = document.getElementById("recaddress").value;
            const paraddress = document.getElementById("paraddress").value;

            if (address) {
                geocodeAddress(geocoder, address, "mapView", "cerAddressLink");
            }

            if (recaddress) {
                geocodeAddress(geocoder, recaddress, "RecmapView", "recAddressLink");
            }

            if (paraddress) {
                geocodeAddress(geocoder, paraddress, "ParmapView", "parAddressLink");
            }
        }

        function geocodeAddress(geocoder, address, mapViewId, addressLinkId) {
            geocoder.geocode({
                address: address
            }, (results, status) => {
                if (status === "OK" && results[0]) {
                    const location = results[0].geometry.location;
                    map = new google.maps.Map(document.getElementById(mapViewId), {
                        center: {
                            lat: location.lat(),
                            lng: location.lng()
                        },
                        zoom: 15,
                    });

                    new google.maps.Marker({
                        position: location,
                        map: map,
                        title: address,
                    });

                    const mapLink = `https://www.google.com/maps?q=${location.lat()},${location.lng()}`;
                    document.getElementById(addressLinkId).value = mapLink; // Update link
                } else {
                    console.error("Geocode was not successful for the following reason: " + status);
                }
            });
        }

        // Add event listeners for input fields
        document.getElementById("ceraddress").addEventListener("input", initMap);
        document.getElementById("recaddress").addEventListener("input", initMap);
        document.getElementById("paraddress").addEventListener("input", initMap);

        // Initialize map on page load
        window.onload = function() {
            initMap();
        };

        $(document).ready(function() {
            $('#submitEditEvent').click(function() {
                // Get the form data
                var formData = new FormData($('#editEventForm')[0])
                var eventId = formData.get('event_id'); // Get event_id from form data
                // Generate the URL using Blade syntax
                var updateUrl = `{{ route('panel.event.updateEvent', ':id') }}`.replace(':id', eventId);

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
@endsection
