@extends('Panel.Layout.master')


<style>

.main-dashboard-sec .left-menu-dash ul li.general-active::after {
  width: 5px;
  height: 100%;
  background-color: #C09D2A;
  position: absolute;
  left: 0;
  right: 0;
  content: "";
  top: 0;
}

.main-dashboard-sec .left-menu-dash ul li.general-active a {
  color: #C09D2A;
}

.main-dashboard-sec .left-menu-dash ul li.general-active img {
  filter: none;
}

.main-dashboard-sec .left-menu-dash ul li.general-active {
  background-color: #c09d2a29;
}

.main-dashboard-sec .text {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.box-styling .person-box {
    height: -webkit-fill-available;
    justify-content: space-between;
}

.box-styling.ceremony-box {
    height: 98% !important;
}


</style>

@section('content')
    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="box-styling general-event-information">
                    <div class="text">
                        <h2>{{ __('genralInfo.General Info') }}</h2>
                        <p>{{ __('genralInfo.description') }}</p>
                        <p class="note"> <b> {{ __('genralInfo.Note') }}</b>{{ __('genralInfo.text') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="box-styling edit-event">
                    <div class="text">
                        <h2>{{ __('genralInfo.Edit Event') }}</h2>
                        <form method="POST" enctype="multipart/form-data" id="editEventForm"
                            action="{{ route('panel.event.updateEvent', $event->id_event) }}">
                            <input type="hidden" value="{{ $event->id_event }}" name="event_id">
                            @csrf

                            <input type="text" placeholder="{{ __('genralInfo.Event Name') }}" value="{{ $event->name }}" name="event">
                            <input type="datetime-local" id="eventDate" name="event_date" placeholder="{{ __('genralInfo.Event Date') }}"
                                value="{{ $event->date }}">
                    </div>
                </div>
            </div>
            @if ($event->eventType->couple_event == '1')
                <div class="col-lg-6 col-md-12">
                    <div class="box-styling person-details">
                        <div class="text">
                            <h2>{{ __('genralInfo.Groom Details') }}</h2>
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
                                <input type="text" placeholder="{{ __('genralInfo.First Name') }}" name="groomfname"
                                    value="{{ $event->groomfname }}">
                                <input type="text" placeholder="{{ __('genralInfo.Last Name') }}" name="groomlname"
                                    value="{{ $event->groomlname }}">
                                <textarea placeholder="{{ __('genralInfo.Message Here') }}" name="groomsummary">{{ $event->groomsummary }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="box-styling person-details">
                        <div class="text">
                            <h2>{{ __('genralInfo.Bride Details') }}</h2>
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
                                <input type="text" placeholder="{{ __('genralInfo.First Name') }}" name="bridefname"
                                    value="{{ $event->groomlname }}">
                                <input type="text" placeholder="{{ __('genralInfo.Last Name') }}" name="bridelname"
                                    value="{{ $event->bridelname }}">
                                <textarea placeholder="{{ __('genralInfo.Message Here') }}" name="bridesummary">{{ $event->bridesummary }}</textarea>

                            </div>


                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-12 col-md-12">
                <div class="box-styling relationship-story">
                    <div class="text">
                        <h2>@if ($event->eventType->couple_event == '1'){{ __('genralInfo.Relationship Story') }} @elseif ($event->eventType->couple_event == '0') {{ __('genralInfo.EVENT SUMMARY') }} @endif</h2>
                        <textarea placeholder="{{ __('genralInfo.Type Here') }}" name="story">{{ $event->summary }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box-styling ceremony-box">
                    <div class="text">
                        <div class="align-text-box">
                            <h2>{{ __('genralInfo.Ceremony') }}</h2>
                        </div>

                        <div class="person-box">
                            <input type="text" placeholder="{{ __('genralInfo.location') }}" id="ceraddress" name="ceraddress"
                                value="{{ $event->ceraddress }}">
                            <input type="time" placeholder="Event Time" name="certime" value="{{ $event->certime }}">
                            <input type="hidden" id="cerAddressLink">
                            <div id="mapView" style="width: 100%; height: 400px;"></div>
                            <textarea placeholder="{{ __('genralInfo.Event Description') }}" name="cerdesc">{{ $event->cerdesc }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box-styling ceremony-box">
                    <div class="text">
                        <div class="align-text-box">
                            <h2>{{ __('genralInfo.Recption') }}</h2>
                        </div>

                        <div class="person-box">
                            <input type="text" placeholder="{{ __('genralInfo.location') }}" id="recaddress" name="recaddress"
                                value="{{ $event->recaddress }}">
                            <input type="hidden" id="recAddressLink">
                            <input type="time" placeholder="Event Time" name="rectime"
                                value="{{ $event->rectime }}">
                            <div id="RecmapView" style="width: 100%; height: 400px;"></div>
                            <textarea placeholder="{{ __('genralInfo.Event Description') }}" name="recdesc">{{ $event->recdesc }}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box-styling ceremony-box">
                    <div class="text">
                        <div class="align-text-box">
                            <h2>{{ __('genralInfo.Custom Event') }}</h2>
                        </div>
                        <div class="person-box">
                            <input type="text" placeholder="{{ __('genralInfo.Event Name') }}" name="parname"
                                value="{{ $event->parname }}">
                            <input type="hidden" id="parAddressLink">
                            <input type="text" placeholder="{{ __('genralInfo.location') }}" id="paraddress" name="paraddress"
                                value="{{ $event->paraddress }}">
                            <input type="time" placeholder="Event Time" name="partime"
                                value="{{ $event->partime }}">
                            <div id="ParmapView" style="width: 100%; height: 400px;"></div>
                            <textarea placeholder="{{ __('genralInfo.Custom Event') }}" name="pardesc">{{ $event->pardesc }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button class="w-100 save t-btn" type="button" id="submitEditEvent">{{ __('genralInfo.Save') }}</button>
            </form>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter05" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt="">
                        <h2>{{ __('genralInfo.Update Success Heading') }}</h2>
                        <p>{{ __('genralInfo.Update Success Message') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeUpdatedBtn">{{ __('genralInfo.Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter06" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <img src="{{ asset('assets/Panel/images/bx-question-circle.svg.png') }}" alt="">
                        <h3>{{ __('genralInfo.Would You Like') }}</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('genralInfo.No, it Don\'t') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn"><a class="text-light" href="{{ route('panel.event.webpage',['id'=>$event->id_event]) }}">{{ __('genralInfo.Yes, it Does') }}</a></button>
                </div>
            </div>
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

        $("#closeUpdatedBtn").on('click',function(){
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter06'));
            successModal.show();
        });

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
                        var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter05'));
                        successModal.show();
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
