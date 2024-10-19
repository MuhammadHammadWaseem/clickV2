@extends('Panel.layout.master')

@section('content')
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
                        <img src="{{ asset('assets/Panel/images/website-preview-iframe.png') }}" alt="">
                    </div>
                    <div class="two-btn-align">
                        <button class="t-btn t-btn-gray">Website Information</button>
                        <button class="t-btn">Visit Website</button>
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
                            <div class="box">
                                <a href="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                    data-fancybox="images" tabindex="0">
                                    <img src="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                        alt="">
                                </a>
                                <a href="">Delete</a>
                            </div>
                        @empty
                            <p>No items found.</p>
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
                <div class="box-styling ceremony-box web-page-three-boxes">
                    <div class="text">
                        <h2>Ceremony</h2>
                        <p>This page is to review your page before you send the invitation out, so here you can
                            see the layout.</p>
                        <button class="t-btn ">Add New </button>
                        <img src="{{ asset('assets/Panel/images/event-photos-gallery.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box-styling ceremony-box web-page-three-boxes">
                    <div class="text">
                        <h2>Recption</h2>
                        <p>This page is to review your page before you send the invitation out, so here you can
                            see the layout.</p>
                        <button class="t-btn ">Add New </button>
                        <img src="{{ asset('assets/Panel/images/event-photos-gallery.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box-styling ceremony-box web-page-three-boxes">
                    <div class="text">
                        <h2>Custome</h2>
                        <p>This page is to review your page before you send the invitation out, so here you can
                            see the layout.</p>
                        <button class="t-btn ">Add New </button>
                        <img src="{{ asset('assets/Panel/images/event-photos-gallery.png') }}" alt="">
                    </div>
                </div>
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
                        <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <button type="button" id="saveImagesModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        data-target="#exampleModalCenter"><a class="text-light" href="{{ route('panel.event.meals',['id'=> $event->id_event]) }}">Yes, Add Meals</a></button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#saveImagesModal").on("click",function(){
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
                        console.log(response);
                        $("#gall").val(''); // Clear input field

                        // Append the new images to the gallery
                        response.photos.forEach(function(photoId) {
                            var newImage = `
                                <div class="box">
                                    <a href="{{ asset('event-images/' . $event->id_event . '/photogallery/') }}/${photoId}.jpg"
                                        data-fancybox="images" tabindex="0">
                                        <img src="{{ asset('event-images/' . $event->id_event . '/photogallery/') }}/${photoId}.jpg" alt="">
                                    </a>
                                    <a>Delete</a>
                                </div>`;

                            $('.main-event-gallery-box').append(newImage);

                        });

                        $("#closeBtn").click();

                        // Trigger the modal to show success message
                        // $('#exampleModalCenter03').modal('show');

                        var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter03'));
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
    </script>
@endsection
