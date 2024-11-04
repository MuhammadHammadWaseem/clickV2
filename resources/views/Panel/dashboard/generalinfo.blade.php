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

        #StepForm input {
            background-color: #EDEDED;
            border: 2px solid #999999;
            border-radius: 16px;
            height: 50px;
            padding: 20px 20px;
            width: 100%;
            margin-bottom: 10px;
        }

        #registrationForm .tab:nth-child(6),
        #registrationForm .tab:nth-child(7),
        #registrationForm .tab:nth-child(8) {
            overflow: scroll;
            overflow-x: hidden;
            /* height: 500px; */
        }

        #registrationForm::-webkit-scrollbar {
            width: 5px;
        }


        #StepForm #imageUpload,
        #StepForm #imageUpload2 {
            height: 75px;
        }

        #StepForm img {
            object-fit: contain;
            margin-bottom: 10px;
        }

        #StepForm .tab {
            text-align: center;
        }


        #StepForm textarea {
            background-color: #EDEDED;
            border: 2px solid #999999;
            border-radius: 16px;
            height: 50px;
            padding: 10px 20px;
            width: 100%;
            margin-bottom: 10px;
            overflow: hidden;
        }



        .modal-01 .modal-body .text p {
            text-align: center;
        }

        .modal-01 .modal-body .text h2 {
            text-align: center;
            margin-bottom: 20px;
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



        .custom-heading {
            text-align: center;
        }

        .custom-input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #AAAAAA;
        }

        .custom-input.invalid {
            background-color: #FFDDDD;
        }

        .tab {
            display: none;
        }

        .custom-button {
            background-color: #A9967D;
            color: white !important;
            font-size: 18px;
            padding: 8px 40px;
            border-radius: 15px;
            transition: .3s;
            border: navajowhite;
        }

        .custom-button:hover {
            background-color: #A9964B;
            color: white;
        }

        .custom-prev {
            background-color: #BBBBBB;
        }

        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #BBBBBB;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        .step.finish {
            background-color: #A9964B;
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

                                <input type="text" placeholder="{{ __('genralInfo.Event Name') }}"
                                    value="{{ $event->name }}" name="event">
                                <input type="datetime-local" id="eventDate" name="event_date"
                                    placeholder="{{ __('genralInfo.Event Date') }}" value="{{ $event->date }}">
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
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="groom_img" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                @if (file_exists($event->imggroom)) style="background-image: url('{{ asset($event->imggroom) }}');"
                                            @else
                                                style="background-image: url('{{ asset('assets/Panel/images/groom-img.png') }}');" @endif>
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
                                            <input type='file' id="imageUpload2" accept=".png, .jpg, .jpeg" name="bride_img" />
                                            <label for="imageUpload2"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview2"
                                                @if (file_exists($event->imgbride)) style="background-image: url('{{ asset($event->imgbride) }}');"
                                            @else
                                                style="background-image: url('{{ asset('assets/Panel/images/bride-img.png ') }}');" @endif>
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
                            <h2>
                                @if ($event->eventType->couple_event == '1')
                                    {{ __('genralInfo.Relationship Story') }}
                                @elseif ($event->eventType->couple_event == '0')
                                    {{ __('genralInfo.EVENT SUMMARY') }}
                                @endif
                            </h2>
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
                                <input type="text" placeholder="{{ __('genralInfo.location') }}" id="ceraddress"
                                    name="ceraddress" value="{{ $event->ceraddress }}">
                                <input type="time" placeholder="Event Time" name="certime"
                                    value="{{ $event->certime }}">
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
                                <input type="text" placeholder="{{ __('genralInfo.location') }}" id="recaddress"
                                    name="recaddress" value="{{ $event->recaddress }}">
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
                                <input type="text" placeholder="{{ __('genralInfo.location') }}" id="paraddress"
                                    name="paraddress" value="{{ $event->paraddress }}">
                                <input type="time" placeholder="Event Time" name="partime"
                                    value="{{ $event->partime }}">
                                <div id="ParmapView" style="width: 100%; height: 400px;"></div>
                                <textarea placeholder="{{ __('genralInfo.Custom Event') }}" name="pardesc">{{ $event->pardesc }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="w-100 save t-btn" type="button"
                    id="submitEditEvent">{{ __('genralInfo.Save') }}</button>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            id="closeUpdatedBtn">{{ __('genralInfo.Close') }}</button>
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
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('genralInfo.No, it Don\'t') }}</button>
                        <button type="button" class="submit-btn btn btn-primary t-btn"><a class="text-light"
                                href="{{ route('panel.event.webpage', ['id' => $event->id_event]) }}">{{ __('genralInfo.I Do') }}</a></button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Genereal Info -->
        <div class="modal fade modal-01 modal-02 upload-form-another-event" id="popup" tabindex="-1" role="dialog"
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
                            <h5 class="modal-title text-center">{{ __('genralInfo.steps_title') }}</h5>
                            <p>{{ __('genralInfo.steps_description') }}</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('genralInfo.no_dont_button') }}</button>
                        <button type="button" class="submit-btn btn btn-primary t-btn" id="educate"
                            data-toggle="modal" data-target="#StepForm" data-dismiss="modal">{{ __('genralInfo.educate_button') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>





        <!-- Genereal Info -->
        <div class="modal fade modal-01 modal-02 upload-form-another-event" id="StepForm" tabindex="-1" role="dialog"
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
                            <h5 class="modal-title text-center">{{ __('genralInfo.steps_title') }}</h5>
                            <p>{{ __('genralInfo.steps_description') }}</p>
                            <form id="registrationForm" enctype="multipart/form-data">
                                @csrf
                                <!-- Step 1-->
                                <div class="tab">
                                    <h2>{{ __('genralInfo.Edit Event') }}</h2>
                                    <input type="hidden" value="{{ $event->id_event }}" name="event_id">
                                    <input type="text" placeholder="{{ __('genralInfo.Event Name') }}"
                                        value="{{ $event->name }}" name="event">
                                    <input type="datetime-local" id="eventDate" name="event_date"
                                        placeholder="{{ __('genralInfo.Event Date') }}" value="{{ $event->date }}">
                                </div>
                                @if ($event->eventType->couple_event == '1')
                                <!-- Step 2 -->
                                <div class="tab">
                                    <h2>{{ __('genralInfo.Groom Details') }}</h2>
                                    @if ($event->eventType->couple_event == '1')
                                        <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg"
                                            name="groom_img" />

                                        <!-- Groom Image Display with Conditional Source -->
                                        <img src="{{ file_exists($event->imggroom) ? asset($event->imggroom) : asset('assets/Panel/images/groom-img.png') }}"
                                            alt="Groom Image" class="groom-image" height="100px" width="100px">

                                        <!-- Groom Information -->
                                        <input type="text" placeholder="{{ __('genralInfo.First Name') }}"
                                            name="groomfname" value="{{ $event->groomfname }}">
                                        <input type="text" placeholder="{{ __('genralInfo.Last Name') }}"
                                            name="groomlname" value="{{ $event->groomlname }}">
                                        <textarea placeholder="{{ __('genralInfo.Message Here') }}" name="groomsummary">{{ $event->groomsummary }}</textarea>

                                </div>
                                <!-- Step 3 -->
                                <div class="tab">
                                    <h2>{{ __('genralInfo.Bride Details') }}</h2>
                                    <!-- Bride Image Upload -->
                                    <input type="file" id="imageUpload2" accept=".png, .jpg, .jpeg"
                                        name="bride_img" />
                                    <!-- bride Image Display with Conditional Source -->
                                    <img src="{{ file_exists($event->imgbride) ? asset($event->imgbride) : asset('assets/Panel/images/bride-img.png') }}"
                                        alt="Groom Image" class="groom-image" height="100px" width="100px">
                                    <!-- Bride Information -->
                                    <input type="text" placeholder="{{ __('genralInfo.First Name') }}"
                                        name="bridefname" value="{{ $event->bridefname }}">
                                    <input type="text" placeholder="{{ __('genralInfo.Last Name') }}"
                                        name="bridelname" value="{{ $event->bridelname }}">
                                    <textarea placeholder="{{ __('genralInfo.Message Here') }}" name="bridesummary">{{ $event->bridesummary }}</textarea>
                                    @endif
                                </div>
                                @endif
                                <!-- Step 4 -->
                                <div class="tab">
                                    <h2>
                                        @if ($event->eventType->couple_event == '1')
                                            {{ __('genralInfo.Relationship Story') }}
                                        @elseif ($event->eventType->couple_event == '0')
                                            {{ __('genralInfo.EVENT SUMMARY') }}
                                        @endif
                                    </h2>
                                    <textarea placeholder="{{ __('genralInfo.Type Here') }}" name="story">{{ $event->summary }}</textarea>
                                </div>
                                <!-- Step 5 -->
                                <div class="tab">
                                    <h2>{{ __('genralInfo.Ceremony') }}</h2>
                                    <input type="text" placeholder="{{ __('genralInfo.location') }}" id="ceraddress"
                                        name="ceraddress" value="{{ $event->ceraddress }}">
                                    <input type="time" placeholder="Event Time" name="certime"
                                        value="{{ $event->certime }}">
                                    <input type="hidden" id="cerAddressLink">
                                    {{-- <div id="mapView" style="width: 100%; height: 400px;"></div> --}}
                                    <textarea placeholder="{{ __('genralInfo.Event Description') }}" name="cerdesc">{{ $event->cerdesc }}</textarea>
                                </div>
                                <!-- Step 6 -->
                                <div class="tab">
                                    <h2>{{ __('genralInfo.Recption') }}</h2>
                                    <input type="text" placeholder="{{ __('genralInfo.location') }}" id="recaddress"
                                        name="recaddress" value="{{ $event->recaddress }}">
                                    <input type="hidden" id="recAddressLink">
                                    <input type="time" placeholder="Event Time" name="rectime"
                                        value="{{ $event->rectime }}">
                                    {{-- <div id="RecmapView" style="width: 100%; height: 400px;"></div> --}}
                                    <textarea placeholder="{{ __('genralInfo.Event Description') }}" name="recdesc">{{ $event->recdesc }}</textarea>

                                </div>
                                <!-- Step 7 -->
                                <div class="tab">
                                    <h2>{{ __('genralInfo.Custom Event') }}</h2>

                                    <input type="text" placeholder="{{ __('genralInfo.Event Name') }}"
                                        name="parname" value="{{ $event->parname }}">
                                    <input type="hidden" id="parAddressLink">
                                    <input type="text" placeholder="{{ __('genralInfo.location') }}" id="paraddress"
                                        name="paraddress" value="{{ $event->paraddress }}">
                                    <input type="time" placeholder="Event Time" name="partime"
                                        value="{{ $event->partime }}">
                                    {{-- <div id="ParmapView" style="width: 100%; height: 400px;"></div> --}}
                                    <textarea placeholder="{{ __('genralInfo.Custom Event') }}" name="pardesc">{{ $event->pardesc }}</textarea>

                                </div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button type="button" class="custom-button custom-prev" id="prevButton"
                                            onclick="nextPrev(-1)">{{ __('genralInfo.previous_button') }}</button>
                                        <button type="button" class="custom-button" id="nextButton"
                                            onclick="nextPrev(1)">{{ __('genralInfo.next_button') }}</button>
                                    </div>
                                </div>
                                @if ($event->eventType->couple_event == "0")
                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                                @else
                                <div style="text-align:center;margin-top:40px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                                @endif
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary d-none" data-dismiss="modal" id="registrationFormClose">{{ __('genralInfo.no_dont_button') }}</button>
                        {{-- <button type="button" class="submit-btn btn btn-primary t-btn" id="updateStepForm" onclick="submitStep()">Update</button> --}}
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            $(document).ready(function() {
                initMap();
                var myModal = new bootstrap.Modal(document.getElementById('popup'));
                myModal.show();
            });

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

            $("#closeUpdatedBtn").on('click', function() {
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
                            var successModal = new bootstrap.Modal(document.getElementById(
                                'exampleModalCenter05'));
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


            var currentTab = 0;
            showTab(currentTab);

            function showTab(n) {
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                if (n == 0) {
                    document.getElementById("prevButton").style.display = "none";
                } else {
                    document.getElementById("prevButton").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextButton").innerHTML = "Submit";
                    document.getElementById("nextButton").onclick = function() {
                        submitStep();
                    };
                } else {
                    document.getElementById("nextButton").innerHTML = "Next";
                    document.getElementById("nextButton").onclick = function() {
                        nextPrev(1);
                    };
                }

                fixStepIndicator(n);
            }


            function nextPrev(n) {
                var x = document.getElementsByClassName("tab");
                if (n == 1 && !validateForm()) return false;
                x[currentTab].style.display = "none";
                currentTab = currentTab + n;
                if (currentTab >= x.length) {
                    document.getElementById("registrationForm").submit();
                    return false;
                }
                showTab(currentTab);
            }

            function validateForm() {
                var x, y, i, valid = true;
                x = document.getElementsByClassName("tab");
                y = x[currentTab].getElementsByClassName("custom-input"); // Use class selector here
                for (i = 0; i < y.length; i++) {
                    if (y[i].value == "") {
                        y[i].className += " invalid";
                        valid = false;
                    }
                }
                if (valid) {
                    document.getElementsByClassName("step")[currentTab].className += " finish";
                }
                return valid;
            }

            function fixStepIndicator(n) {
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                }
                x[n].className += " active";
            }

            function submitStep() {
                var formData = new FormData($('#registrationForm')[0]); // Using FormData to support file uploads

                $.ajax({
                    url: "{{ route('panel.event.updateEvent', $event->id_event) }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        toastr.success('Event updated successfully');
                        console.log(response);

                        // Access the 'event' object in the response
                        var event = response.event;

                        // Update Step 1 fields
                        if (event.name) {
                            $('input[name="event"]').val(event.name);
                        }
                        if (event.date) {
                            $('input[name="event_date"]').val(event.date);
                        }

                        // Update Step 2 fields (Groom Details)
                        if (event.imggroom) {
                            $('#imagePreview').css('background-image', 'url("' + '{{ asset('') }}' + event
                                .imggroom + '")');
                        } else {
                            $('#imagePreview').css('background-image',
                                'url("{{ asset('assets/Panel/images/bride-img.png') }}")');
                        }
                        if (event.groomfname) {
                            $('input[name="groomfname"]').val(event.groomfname);
                        }
                        if (event.groomlname) {
                            $('input[name="groomlname"]').val(event.groomlname);
                        }
                        if (event.groomsummary) {
                            $('textarea[name="groomsummary"]').val(event.groomsummary);
                        }

                        // Update Step 3 fields (Bride Details)
                        if (event.imgbride) {
                            $('#imagePreview2').css('background-image', 'url("' + '{{ asset('') }}' + event
                                .imgbride + '")');
                        } else {
                            $('#imagePreview2').css('background-image',
                                'url("{{ asset('assets/Panel/images/groom-img.png') }}")');
                        }

                        if (event.bridefname) {
                            $('input[name="bridefname"]').val(event.bridefname);
                        }
                        if (event.bridelname) {
                            $('input[name="bridelname"]').val(event.bridelname);
                        }
                        if (event.bridesummary) {
                            $('textarea[name="bridesummary"]').val(event.bridesummary);
                        }

                        // Update Step 4 fields (Relationship Story / Event Summary)
                        if (event.summary) {
                            $('textarea[name="story"]').val(event.summary);
                        }

                        // Update Step 5 fields (Ceremony Details)
                        if (event.ceraddress) {
                            $('input[name="ceraddress"]').val(event.ceraddress);
                        }
                        if (event.certime) {
                            $('input[name="certime"]').val(event.certime);
                        }
                        if (event.cerdesc) {
                            $('textarea[name="cerdesc"]').val(event.cerdesc);
                        }
                        if (event.cerimg) {
                            $('#ceremonyImage').attr('src', event.cerimg);
                        }

                        // Update Step 6 fields (Reception Details)
                        if (event.recaddress) {
                            $('input[name="recaddress"]').val(event.recaddress);
                        }
                        if (event.rectime) {
                            $('input[name="rectime"]').val(event.rectime);
                        }
                        if (event.recdesc) {
                            $('textarea[name="recdesc"]').val(event.recdesc);
                        }
                        if (event.recimg) {
                            $('#receptionImage').attr('src', event.recimg);
                        }

                        // Update Step 7 fields (Custom Event Details)
                        if (event.parname) {
                            $('input[name="parname"]').val(event.parname);
                        }
                        if (event.paraddress) {
                            $('input[name="paraddress"]').val(event.paraddress);
                        }
                        if (event.partime) {
                            $('input[name="partime"]').val(event.partime);
                        }
                        if (event.pardesc) {
                            $('textarea[name="pardesc"]').val(event.pardesc);
                        }
                        if (event.parimg) {
                            $('#customEventImage').attr('src', event.parimg);
                        }

                        // Close the modal
                        $('#registrationFormClose').click();

                    },
                    error: function(xhr) {
                        alert('Something went wrong: ' + xhr.responseText);
                    }
                });
            }
        </script>
    @endsection
