@extends('Panel.layout.master')


<style>

    .main-dashboard-sec .left-menu-dash ul li.webpage-active a {
      color: #C09D2A;
    }

    .main-dashboard-sec .left-menu-dash ul li.webpage-active img {
      filter: none;
    }

    .main-dashboard-sec .left-menu-dash ul li.webpage-active {
      background-color: #c09d2a29;
    }

    .main-dashboard-sec .left-menu-dash ul li.webpage-active::after {
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

@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $currentEventId = GeneralHelper::getEventId();
    @endphp
    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling your-web-page">
                    <div class="text">
                        <h2>Your Web Page</h2>
                        <p>This page is to review your page before you send the invitation out, so here you can
                            see the layout and make all the changes necessary and upload new pictures. Upload
                            pictures for picture gallery. Link your Facebook and Instagram account.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling website-preview ">
                    <div class="text">
                        <h2>Website Preview </h2>
                        <p>This page is to review your page before you send the invitation out, so here you can
                            see the layout.</p>
                    </div>
                    <div class="iframe-box">
                        {{-- <img src="{{ asset('assets/Panel/images/website-preview-iframe.png') }}" alt=""> --}}
                        <iframe src="{{ route('website', ['id' => $event->id_event]) }}" frameborder="0"></iframe>
                    </div>
                    <div class="two-btn-align">
                        <button class="t-btn t-btn-gray"><a
                                href="{{ route('panel.event.generalInfos', ['id' => $event->id_event]) }}"
                                style="color:#777777;">Website Information</a></button>
                        <button class="t-btn t-btn-gray" id="changeMainPhotoBtn">Change Main Photo</button>
                        <button class="t-btn"><a href="{{ route('website', ['id' => $event->id_event]) }}"
                                style="color:#ffffff;">Visit Website</a></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>Event Photos Gallery</h2>
                            <p>This page is to review your page before you send the invitation out, so here you
                                can see the layout.</p>
                        </div>
                        <button type="button" class="t-btn" data-toggle="modal" data-target="#exampleModalCenter04">Add
                            New</button>
                    </div>
                    <div class="main-event-gallery-box">
                        @forelse ($photogallery as $photo)
                            <div class="box" id="photo-box-{{ $photo->id_photogallery }}">
                                <a href="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                    data-fancybox="images" tabindex="0">
                                    <img src="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                        alt="">
                                </a>
                                <button type="button" class="delete-image-btn" data-id="{{ $photo->id_photogallery }}"
                                    data-eventId="{{ $photo->id_event }}"><svg width="28" height="29"
                                        viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.03181 23.7043C6.03181 24.308 6.27163 24.887 6.69853 25.3139C7.12542 25.7408 7.70441 25.9806 8.30813 25.9806H19.6897C20.2934 25.9806 20.8724 25.7408 21.2993 25.3139C21.7262 24.887 21.966 24.308 21.966 23.7043V10.0464H24.2423V7.7701H19.6897V5.49378C19.6897 4.89007 19.4499 4.31108 19.023 3.88419C18.5961 3.45729 18.0171 3.21747 17.4134 3.21747H10.5844C9.98072 3.21747 9.40173 3.45729 8.97484 3.88419C8.54795 4.31108 8.30813 4.89007 8.30813 5.49378V7.7701H3.75549V10.0464H6.03181V23.7043ZM10.5844 5.49378H17.4134V7.7701H10.5844V5.49378ZM9.44628 10.0464H19.6897V23.7043H8.30813V10.0464H9.44628Z"
                                            fill="#F1F1F1" />
                                        <path
                                            d="M10.585 12.3228H12.8613V21.4281H10.585V12.3228ZM15.1376 12.3228H17.4139V21.4281H15.1376V12.3228Z"
                                            fill="#F1F1F1" />
                                    </svg>
                                </button>
                            </div>
                        @empty
                            <p id="NoItems">No items found.</p>
                        @endforelse
                    </div>
                    {{-- <div class="table-content-pagination">
                        <ul>
                            <li><a href="#" class="activ">&lt;</a></li>
                            <li><a href="#" class="activ">01</a></li>
                            <li><a href="#">02</a></li>
                            <li><a href="#">03</a></li>
                            <li><a href="#">04</a></li>
                            <li><a href="#" class="activ">&gt;</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box-styling ceremony-new-box ceremony-box web-page-three-boxes">
                    <div class="text">
                        <h2>Ceremony</h2>
                        <p>This page is to review your page before you send the invitation out, so here you can
                            see the layout.</p>
                        <button class="t-btn" id="addCerImageBtn">Add New </button>
                        @if (file_exists(public_path('event-images/' . $event->id_event . '/cerimg.jpg')))
                            <img src="{{ asset('event-images/' . $event->id_event . '/cerimg.jpg') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box-styling reception-new-box ceremony-box web-page-three-boxes">
                    <div class="text">
                        <h2>Recption</h2>
                        <p>This page is to review your page before you send the invitation out, so here you can
                            see the layout.</p>
                        <button class="t-btn" id="addRecImageBtn">Add New </button>
                        @if (file_exists(public_path('event-images/' . $event->id_event . '/recimg.jpg')))
                            <img src="{{ asset('event-images/' . $event->id_event . '/recimg.jpg') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box-styling party-new-box ceremony-box web-page-three-boxes">
                    <div class="text">
                        <h2>Custome</h2>
                        <p>This page is to review your page before you send the invitation out, so here you can
                            see the layout.</p>
                        <button class="t-btn" id="addParImageBtn">Add New </button>
                        @if (file_exists(public_path('event-images/' . $event->id_event . '/parimg.jpg')))
                            <img src="{{ asset('event-images/' . $event->id_event . '/parimg.jpg') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Ceremony Modal --}}
    <div class="modal fade modal-01 modal-02 modal-03" id="addCerImage" tabindex="-1" role="dialog"
        aria-labelledby="addCerImageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="uploadCerImageForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="cerimage" name="cerimage" multiple accept="image/*" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="submit-btn btn btn-primary t-btn">Submit</button>
                        <button type="button" id="closeCerModalBtn" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter04" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="uploadPhotosForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="gall" name="gall[]" multiple accept="image/*" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="submit-btn btn btn-primary t-btn">Submit</button>
                        <button type="button" id="closeBtn" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                        <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt="">
                        <h2>Images Added Successfully</h2>
                        <p>Your images has been successfully added.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveImagesModal" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter05" tabindex="-1" role="dialog"
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
                        <img src="{{ asset('assets/Panel/images/bx-question-circle.svg.png') }}" alt="">
                        <h2>You Want to Delete this image ?</h2>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveImagesModal" class="btn btn-secondary"
                        data-dismiss="modal">No</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <button type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter02"> Want
        To Serve Your Guests a Meal? </button>
    <!-- Modal -->
    <div class="modal fade modal-01 modal-02" id="exampleModalCenter02" tabindex="-1" role="dialog"
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
                        <h2>Want To Serve Your Guests a Meal?</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I Don't</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter"><a class="text-light"
                            href="{{ route('panel.event.meals', ['id' => $event->id_event]) }}">Yes, Add
                            Meals</a></button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
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
                        <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt="">
                        <h2>Image Deleted Successfully</h2>
                        <p>The image has been successfully deleted.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reception Modal -->
    <div class="modal fade" id="addRecImage" tabindex="-1" role="dialog" aria-labelledby="addRecImageTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="uploadRecImageForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="recimage" name="recimage" accept="image/*" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="submit-btn btn btn-primary t-btn">Submit</button>
                        <button type="button" id="closeRecModalBtn" class="btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Custom (Party) Modal -->
    <div class="modal fade" id="addParImage" tabindex="-1" role="dialog" aria-labelledby="addParImageTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="uploadParImageForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="parimage" name="parimage" accept="image/*" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="submit-btn btn btn-primary t-btn">Submit</button>
                        <button type="button" id="closeParModalBtn" class="btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Change Main Photo --}}
    <div class="modal fade" id="changeMainPhoto" tabindex="-1" role="dialog" aria-labelledby="changeMainPhotoTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('panel.event.changeMainPhoto', ['id' => $event->id_event]) }}"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="mainimage" name="mainimage" accept="image/*" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="submit-btn btn btn-primary t-btn">Submit</button>
                        <button type="button" id="closeMainIamgeModalBtn" class="btn"
                            data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#saveImagesModal").on("click", function() {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter02'));
                myModal.show();
            });

            $('#uploadPhotosForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                // Create a FormData object to handle file uploads
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('panel.event.store.images', ['id' => $event->id_event]) }}", // Your Laravel route
                    type: 'POST',
                    data: formData,
                    contentType: false, // Tells jQuery not to set the content type
                    processData: false, // Prevents jQuery from converting the form data into a query string
                    success: function(response) {
                        $("#gall").val(''); // Clear input field
                        $("#NoItems").hide();

                        // Append the new images to the gallery
                        response.photos.forEach(function(photoId) {
                            var newImage = `
                                <div class="box" id="photo-box-${photoId}">
                                    <a href="{{ asset('event-images/' . $event->id_event . '/photogallery/') }}/${photoId}.jpg"
                                        data-fancybox="images" tabindex="0">
                                        <img src="{{ asset('event-images/' . $event->id_event . '/photogallery/') }}/${photoId}.jpg" alt="">
                                    </a>
                                    <button type="button" class="delete-image-btn" data-id="${photoId}" data-eventId="{{ $currentEventId }}">Delete</button>
                                </div>`;

                            $('.main-event-gallery-box').append(newImage);

                        });

                        $("#closeBtn").click();

                        // Trigger the modal to show success message
                        var myModal = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter03'));
                        myModal.show();

                    },
                    error: function(xhr) {
                        $("#gall").val(''); // Clear input field

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
            });

            $(document).on('click', '#addCerImageBtn', function() {
                var myModal = new bootstrap.Modal(document.getElementById('addCerImage'));
                myModal.show();
            });

            $(document).on('click', '#addRecImageBtn', function() {
                var myModal = new bootstrap.Modal(document.getElementById('addRecImage'));
                myModal.show();
            });

            $(document).on('click', '#addParImageBtn', function() {
                var myModal = new bootstrap.Modal(document.getElementById('addParImage'));
                myModal.show();
            });
            $(document).on('click', '#changeMainPhotoBtn', function() {
                var myModal = new bootstrap.Modal(document.getElementById('changeMainPhoto'));
                myModal.show();
            });

            // When the form is submitted
            $('#uploadCerImageForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting the traditional way

                // Create a FormData object to handle the file upload and other form data
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('panel.event.store.cerimage', ['id' => $event->id_event]) }}", // Your Laravel route for storing images
                    type: 'POST', // HTTP method
                    data: formData, // The form data
                    contentType: false, // Do not set content-type header
                    processData: false, // Do not process the data
                    success: function(response) {
                        // Handle success (e.g., display a success message or update the UI)
                        console.log(response.img);
                        $("#cerimage").val(''); // Clear the file input field after success
                        toastr.success('Ceremony image uploaded successfully!');
                        $('#closeCerModalBtn').click(); // Close the modal

                        var myModal2 = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter03'));
                        myModal2.show();

                        if ($('.ceremony-new-box img').length > 0) {
                            // Update the src of the existing image
                            $('.ceremony-new-box img').attr('src', response.img + '?' +
                                new Date()
                                .getTime()); // Adding timestamp to avoid caching issues
                        } else {
                            // If image doesn't exist, create and append it
                            $('.ceremony-new-box .text').append('<img src="' + response.img +
                                '" alt="Ceremony Image">');
                        }
                    },
                    error: function(xhr) {
                        // Handle error (e.g., display error messages)
                        toastr.error(
                            'Failed to upload the Ceremony image. Please try again.');
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#uploadRecImageForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('panel.event.store.recimage', ['id' => $event->id_event]) }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Clear input field
                        $("#recimage").val('');
                        toastr.success('Reception image uploaded successfully!');
                        $('#closeRecModalBtn').click();

                        var myModal2 = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter03'));
                        myModal2.show();

                        // Update the reception image dynamically
                        if ($('.reception-new-box img').length > 0) {
                            $('.reception-new-box img').attr('src', response.img + '?' +
                                new Date().getTime());
                        } else {
                            $('.reception-new-box .text').append('<img src="' + response.img +
                                '" alt="Reception Image">');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Failed to upload the reception image. Please try again.');
                    }
                });
            });

            // Custom (Party) Image Upload
            $('#uploadParImageForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('panel.event.store.parimage', ['id' => $event->id_event]) }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Clear input field
                        $("#parimage").val('');
                        toastr.success('Custom image uploaded successfully!');
                        $('#closeParModalBtn').click();

                        // Update the custom image dynamically
                        if ($('.party-new-box img').length > 0) {
                            $('.party-new-box img').attr('src', response.img + '?' + new Date()
                                .getTime());
                        } else {
                            $('.party-new-box .text').append('<img src="' + response.img +
                                '" alt="Custom Image">');
                        }
                        var myModal2 = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter03'));
                        myModal2.show();
                    },
                    error: function(xhr) {
                        toastr.error('Failed to upload the custom image. Please try again.');
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("toggleBtn").addEventListener("click", function() {
                var sidebar = document.getElementById("sidebar");
                var content = document.getElementById("content");

                if (sidebar.classList.contains("col-lg-2")) {
                    sidebar.classList.remove("col-lg-2");
                    sidebar.classList.add("col-lg-1");

                    content.classList.remove("col-lg-10");
                    content.classList.add("col-lg-11");
                } else {
                    sidebar.classList.remove("col-lg-1");
                    sidebar.classList.add("col-lg-2");

                    content.classList.remove("col-lg-11");
                    content.classList.add("col-lg-10");
                }
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        $(document).on('click', '.delete-image-btn', function() {
            var photoId = $(this).data('id');
            var eventId = $(this).data('eventid');

            // Show confirmation modal
            var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter05'));
            myModal.show();

            // When the "Yes" button is clicked in the confirmation modal
            $('#exampleModalCenter05 .submit-btn').off('click').on('click', function() {
                var deleteUrl = "{{ route('panel.event.delete.images', ':photoId') }}";

                deleteUrl = deleteUrl.replace(':photoId', photoId);

                $.ajax({
                    url: deleteUrl, // URL to delete the image
                    type: 'POST', // HTTP method (delete)
                    data: {
                        _token: "{{ csrf_token() }}",
                        eventId: eventId
                    },
                    success: function(response) {
                        // Remove the photo box if delete was successful
                        $('#photo-box-' + photoId).remove();
                        toastr.success('Photo deleted successfully!');

                        // Close the confirmation modal
                        myModal.hide();

                        // Show success modal
                        var myModal2 = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter06'));
                        myModal2.show();
                    },
                    error: function(xhr) {
                        toastr.error('Failed to delete the photo. Please try again.');
                    }
                });
            });
        });




        $("#imageUpload").change(function() {
            readURL(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview2').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview2').hide();
                    $('#imagePreview2').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload2").change(function() {
            readURL2(this);
        });

        var btns = document.getElementsByClassName('toggleForm');

        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener('change', function() {
                var forms = document.getElementsByClassName('ceremonyForm');
                for (var j = 0; j < forms.length; j++) {
                    if (this === btns[j]) {
                        if (this.checked) {
                            forms[j].classList.remove('hidden');
                        } else {
                            forms[j].classList.add('hidden');
                        }
                    }
                }
            });
        }

        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if ($errors->any())
            toastr.error("{{ $errors->first() }}");
        @endif
    </script>
@endsection
