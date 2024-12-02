@extends('Panel.Layout.master')

<style>
    .poto-active a {
        color: #C09D2A !important;
    }

    .poto-active img {
        filter: none !important;
    }

    .poto-active {
        background-color: #c09d2a29 !important;
    }

    .poto-active::after {
        width: 5px;
        height: 100%;
        background-color: #C09D2A;
        position: absolute;
        left: 0;
        right: 0;
        content: "";
        top: 0;
    }

    .modal form label {
        width: 100%;
        height: 200px;
        border: 5px dashed #A9967D;
        border-radius: 10px;
        display: flex;
        padding: 50px 60px;
        align-items: center;
        justify-content: center;
    }

    #exampleModalCenter03 .modal-dialog.modal-dialog-centered {
        max-width: 600px;
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
                        <h2>{{ __('photos.table_management') }}</h2>
                        <p>{{ __('photos.photo_gallery_intro') }}</p>
                        <p class="bold-text-color-change"> {{ __('photos.thank_you_email_reminder') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling preview ">
                    <div class="text">
                        <h2>{{ __('photos.website_preview') }}</h2>

                    </div>
                    <div class="mainevent-gallery-slider event-slider-single">
                        @forelse ($photogallery as $photo)
                            @if (file_exists('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg'))
                                <div class="box">
                                    <a href="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                        data-fancybox="images" tabindex="0"><img
                                            src="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                            style="object-fit: contain;" width="100px" height="600px" alt=""></a>
                                </div>
                            @endif
                        @empty
                            <p>{{ __('photos.no_images') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- PHOTOS --}}
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>{{ __('photos.event_photos_gallery') }}</h2>
                            <p>{{ __('photos.review_page_layout') }}</p>
                        </div>
                        <button type="button" class="t-btn" data-toggle="modal" data-target="#exampleModalCenter04">
                            {{ __('photos.add_new') }}</button>
                    </div>
                    <div class="main-event-gallery-box" id="PhotoBox">
                        @forelse ($photogallery as $photo)
                            @if (file_exists('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg'))
                                <div class="box" id="photo-box-{{ $photo->id_photogallery }}">
                                    <a href="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                        data-fancybox="images" tabindex="0">
                                        <img src="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                            alt="Photos">
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
                            @endif
                        @empty
                            <p id="noImages">{{ __('photos.no_images') }}</p>
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

            {{-- VIDEOS --}}
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>{{ __('photos.event_videos') }}</h2>
                            <p>{{ __('photos.review_page_layout') }}</p>
                        </div>
                        <button type="button" class="t-btn" data-toggle="modal" data-target="#exampleModalCenter07">
                            {{ __('photos.add_new') }}</button>
                    </div>
                    <div class="main-event-gallery-box" id="main-video-gallery-box">
                        @forelse ($videogallery as $video)
                        @if (file_exists('event-images/' . $video->id_event . '/videos/' . $video->video))
                            <div class="box" id="video-box-{{ $video->id }}">
                                <video width="100%" height="200" controls>
                                    <source
                                        src="{{ asset('event-images/' . $video->id_event . '/videos/' . $video->video) }}"
                                        type="video/mp4">
                                    <p>{{ __('photos.video_support') }}</p>
                                </video>
                                <button type="button" class="delete-video-btn" data-id="{{ $video->id }}"
                                    data-eventId="{{ $video->id_event }}"><svg width="28" height="29"
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
                            @endif
                        @empty
                            <p>{{ __('photos.no_videos') }}</p>
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

        </div>

    </div>

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
                            <input type="file" id="gall" name="gall[]" multiple accept="image/*"
                                style="display: none;" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />

                            <!-- Button to trigger file input -->
                            <label id="uploadButton">
                                <img src="{{ asset('assets/Panel/images/uploadFile.png') }}" alt="Upload Icon">
                            </label>
                            <div id="imagePreviewContainer">{{ __('photos.no_file_selected') }}</div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                            class="submit-btn btn btn-primary t-btn">{{ __('photos.submit') }}</button>
                        <button type="button" id="closeBtn" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('photos.close') }}</button>
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
                        <h2>{{ __('photos.images_added_successfully') }}</h2>
                        <p>{{ __('photos.images_added_message') }}</p>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="successmodalCloseBtn1" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('photos.close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter022" tabindex="-1" role="dialog"
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
                    <h2>{{ __('photos.video_added_successfully') }}</h2>
                    <p>{{ __('photos.video_added_message') }}</p>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="successVideoCloseBtn1" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('photos.close') }}</button>
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
                        <h2>{{ __('photos.confirm_delete_image') }}</h2>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveImagesModal" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('photos.no') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn">{{ __('photos.yes') }}</button>
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
                        <h2>{{ __('photos.image_deleted_successfully') }}</h2>
                        <p>{{ __('photos.image_deleted_message') }}</p>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('photos.close') }}</button>
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
                        <button type="submit"
                            class="submit-btn btn btn-primary t-btn">{{ __('photos.submit') }}</button>
                        <button type="button" id="closeRecModalBtn" class="btn"
                            data-dismiss="modal">{{ __('photos.close') }}</button>
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
                        <button type="submit"
                            class="submit-btn btn btn-primary t-btn">{{ __('photos.submit') }}</button>
                        <button type="button" id="closeParModalBtn" class="btn"
                            data-dismiss="modal">{{ __('photos.close') }}</button>
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
                        <button type="submit"
                            class="submit-btn btn btn-primary t-btn">{{ __('photos.submit') }}</button>
                        <button type="button" id="closeMainIamgeModalBtn" class="btn"
                            data-dismiss="modal">{{ __('photos.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Add Video Modal --}}
    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter07" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="uploadVideosForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="vid" name="vid[]" accept="video/*"
                                style="display: none;" multiple />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />

                            <!-- Button to trigger the file input -->
                            <label id="uploadVideoButton">
                                <img src="{{ asset('assets/Panel/images/uploadFile.png') }}" alt="Upload Icon">
                            </label>
                            <div id="videoPreviewContainer" style="margin-top: 10px;">{{ __('photos.no_file_selected') }}
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="submit-btn btn btn-primary t-btn" id="uploadPhotosBtn">{{ __('photos.submit') }}</button>
                        <button type="button" id="addVideoModalCloseBtn" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('photos.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter08" tabindex="-1" role="dialog"
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
                        <h2>{{ __('photos.confirm_delete_video') }}</h2>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('photos.no') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn">{{ __('photos.yes') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter09" tabindex="-1" role="dialog"
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
                        <h2>{{ __('photos.video_deleted_successfully') }}</h2>
                        <p>{{ __('photos.video_deleted_message') }}</p>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="successmodalCloseBtn">{{ __('photos.close') }}</button>
                </div>
            </div>
        </div>
    </div>

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
                        <h2>{{ __('meal.confirm_serve_meal') }}</h2>
                        <p>{{ __('meal.lorem_ipsum') }}</p>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('email.no_dont_add_email') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter1">{{ __('email.yes_add_email') }}</button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02" id="exampleModalCenter026" tabindex="-1" role="dialog"
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
                        <h2>{{ __('genralInfo.Reminder & Acknowledgment Page') }}</h2>
                        <p>{{ __('genralInfo.Stay connected') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="noR&A">{{ __('genralInfo.Later') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter1"><a class="text-light"
                            href="{{ route('panel.event.reminder', ['id' => $currentEventId]) }}">{{ __('genralInfo.I Do') }}</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Trigger file input when the custom button is clicked
        document.getElementById('uploadButton').addEventListener('click', function() {
            document.getElementById('gall').click();
        });

        // Display file names when files are selected
        document.getElementById('gall').addEventListener('change', function(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('imagePreviewContainer');
            previewContainer.innerHTML = ''; // Clear previous names

            if (files.length === 0) {
                previewContainer.textContent = 'No File';
            } else {
                Array.from(files).forEach((file) => {
                    const label = document.createElement('p');
                    label.textContent = file.name;
                    label.style.fontSize = '12px';
                    label.style.margin = '5px 0';
                    previewContainer.appendChild(label);
                });
            }
        });


        // Trigger file input when the custom button is clicked
        document.getElementById('uploadVideoButton').addEventListener('click', function() {
            document.getElementById('vid').click();
        });

        // Display video file name when a file is selected
        document.getElementById('vid').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('videoPreviewContainer');

            if (!file) {
                previewContainer.textContent = 'No File Selected';
            } else {
                previewContainer.textContent = file.name; // Show the selected video file name
            }
        });

        $("#successmodalCloseBtn1").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter026'));
            successModal.show();
        });
        $("#successVideoCloseBtn1").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter026'));
            successModal.show();
        });
        function hidemodel() {
            $("#successmodalCloseBtn1").click();
            var successModal = new bootstrap.Modal(document.getElementById(
                'exampleModalCenter02'));
            successModal.show();
        }
        $(document).ready(function() {

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
                        $("#noImages").hide();

                        if (response.photos && response.photos.length > 0) {
                        // Append the new images to the gallery
                        response.photos.forEach(function(photoId) {
                            var newImage = `
                            <div class="box" id="photo-box-${photoId}">
                                <a href="{{ asset('event-images/' . $event->id_event . '/photogallery/') }}/${photoId}.jpg"
                                    data-fancybox="images" tabindex="0">
                                    <img src="{{ asset('event-images/' . $event->id_event . '/photogallery/') }}/${photoId}.jpg" alt="">
                                </a>
                                <button type="button" class="delete-image-btn" data-id="${photoId}"
                                data-eventId="{{ $currentEventId }}"><svg width="28" height="29"
                                    viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.03181 23.7043C6.03181 24.308 6.27163 24.887 6.69853 25.3139C7.12542 25.7408 7.70441 25.9806 8.30813 25.9806H19.6897C20.2934 25.9806 20.8724 25.7408 21.2993 25.3139C21.7262 24.887 21.966 24.308 21.966 23.7043V10.0464H24.2423V7.7701H19.6897V5.49378C19.6897 4.89007 19.4499 4.31108 19.023 3.88419C18.5961 3.45729 18.0171 3.21747 17.4134 3.21747H10.5844C9.98072 3.21747 9.40173 3.45729 8.97484 3.88419C8.54795 4.31108 8.30813 4.89007 8.30813 5.49378V7.7701H3.75549V10.0464H6.03181V23.7043ZM10.5844 5.49378H17.4134V7.7701H10.5844V5.49378ZM9.44628 10.0464H19.6897V23.7043H8.30813V10.0464H9.44628Z"
                                        fill="#F1F1F1" />
                                    <path
                                        d="M10.585 12.3228H12.8613V21.4281H10.585V12.3228ZM15.1376 12.3228H17.4139V21.4281H15.1376V12.3228Z"
                                        fill="#F1F1F1" />
                                </svg>
                            </button>
                            </div>`;

                            // $('.main-event-gallery-box').append(newImage);
                            $('#PhotoBox').append(newImage);

                        });

                        toastr.success(`${response.photos.length} photos uploaded successfully.`);
                    }

                    // Handle failed uploads
                    if (response.failed && response.failed.length > 0) {
                        response.failed.forEach(function(failure) {
                            toastr.error(`Failed to upload "${failure.file}": ${failure.error}`);
                        });
                    }

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

            // $('#uploadVideosForm').on('submit', function(e) {
            //     e.preventDefault(); // Prevent the form from submitting the traditional way

            //     $("#uploadPhotosBtn").prop('disabled',true);
            //     $("#uploadPhotosBtn").text('Uploading...');

            //     var formData = new FormData(this); // Use FormData to handle the files

            //     $.ajax({
            //         url: "{{ route('panel.event.store.videos') }}", // Laravel route for storing videos
            //         type: 'POST', // HTTP method
            //         data: formData, // The form data
            //         contentType: false, // Prevent jQuery from setting the content-type header
            //         processData: false, // Prevent jQuery from processing the form data
            //         success: function(response) {
            //             if (response.success) {

            //                 $("#uploadPhotosBtn").prop('disabled',false);
            //                 $("#uploadPhotosBtn").text('Submit');

            //                 $('#vid').val(''); // Clear the file input
            //                 toastr.success(response.success); // Show success notification
            //                 $('#addVideoModalCloseBtn').click(); // Close the modal
            //                 var successModal = new bootstrap.Modal(document.getElementById(
            //                 'exampleModalCenter022'));
            //             successModal.show();
            //                 // Append the video to your page
            //                 var newVideo = `
            //                     <div class="box" id="video-box-${response.id}">
            //                         <video width="100%" height="200" controls>
            //                             <source src="/${response.videos}" type="video/mp4">
            //                             Your browser does not support the video tag.
            //                         </video>
            //                         <button type="button" class="delete-video-btn" data-id="${response.id}"
            //                         data-eventId="{{ $event->id_event }}"><svg width="28" height="29"
            //                             viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
            //                             <path
            //                                 d="M6.03181 23.7043C6.03181 24.308 6.27163 24.887 6.69853 25.3139C7.12542 25.7408 7.70441 25.9806 8.30813 25.9806H19.6897C20.2934 25.9806 20.8724 25.7408 21.2993 25.3139C21.7262 24.887 21.966 24.308 21.966 23.7043V10.0464H24.2423V7.7701H19.6897V5.49378C19.6897 4.89007 19.4499 4.31108 19.023 3.88419C18.5961 3.45729 18.0171 3.21747 17.4134 3.21747H10.5844C9.98072 3.21747 9.40173 3.45729 8.97484 3.88419C8.54795 4.31108 8.30813 4.89007 8.30813 5.49378V7.7701H3.75549V10.0464H6.03181V23.7043ZM10.5844 5.49378H17.4134V7.7701H10.5844V5.49378ZM9.44628 10.0464H19.6897V23.7043H8.30813V10.0464H9.44628Z"
            //                                 fill="#F1F1F1" />
            //                             <path
            //                                 d="M10.585 12.3228H12.8613V21.4281H10.585V12.3228ZM15.1376 12.3228H17.4139V21.4281H15.1376V12.3228Z"
            //                                 fill="#F1F1F1" />
            //                         </svg>
            //                     </button>
            //                     </div>
            //                     `;
            //                 $('#main-video-gallery-box').append(newVideo);
            //             }
            //             $("#uploadPhotosBtn").prop('disabled',false);
            //             $("#uploadPhotosBtn").text('Submit');
            //         },
            //         error: function(xhr) {
            //             $("#uploadPhotosBtn").prop('disabled',false);
            //             $("#uploadPhotosBtn").text('Submit');
            //             toastr.error('Failed to upload the videos. Please try again.');
            //             console.error(xhr.responseText); // Log the error for debugging
            //         }
            //     });
            // });

            $('#uploadVideosForm').on('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    $("#uploadPhotosBtn").prop('disabled', true);
    $("#uploadPhotosBtn").text('Uploading...');

    var formData = new FormData(this); // Collect the form data

    $.ajax({
        url: "{{ route('panel.event.store.videos') }}", // Laravel route
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $("#uploadPhotosBtn").prop('disabled', false);
            $("#uploadPhotosBtn").text('Submit');
            $('#vid').val(''); // Clear the file input

            // Handle successful uploads
            if (response.uploaded && response.uploaded.length > 0) {
                response.uploaded.forEach(function(video) {
                    var newVideo = `
                        <div class="box" id="video-box-${video.id}">
                            <video width="100%" height="200" controls>
                                <source src="/${video.path}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <button type="button" class="delete-video-btn" data-id="${video.id}"
                                data-eventId="{{ $event->id_event }}">
                                Delete
                            </button>
                        </div>`;
                    $('#main-video-gallery-box').append(newVideo);
                });
                toastr.success(`${response.uploaded.length} videos uploaded successfully.`);
            }

            // Handle failed uploads
            if (response.failed && response.failed.length > 0) {
                response.failed.forEach(function(failure) {
                    toastr.error(`Failed to upload "${failure.file}": ${failure.error}`);
                });
            }

            $('#addVideoModalCloseBtn').click(); // Close modal
        },
        error: function(xhr) {
            $("#uploadPhotosBtn").prop('disabled', false);
            $("#uploadPhotosBtn").text('Submit');
            toastr.error('Failed to upload the videos. Please try again.');
            console.error(xhr.responseText);
        }
    });
});


            $(document).on('click', '.delete-video-btn', function() {
                var videoId = $(this).data('id');
                var eventId = $(this).data('eventid');

                // Show confirmation modal
                var myModal = new bootstrap.Modal(document.getElementById(
                    'exampleModalCenter08'));
                myModal.show();

                // When the "Yes" button is clicked in the confirmation modal
                $('#exampleModalCenter08 .submit-btn').off('click').on('click', function() {
                    var deleteUrl = "{{ route('panel.event.delete.videos', ':videoId') }}";
                    deleteUrl = deleteUrl.replace(':videoId', videoId);

                    $.ajax({
                        url: deleteUrl, // URL to delete the video
                        type: 'POST', // HTTP method
                        data: {
                            _token: "{{ csrf_token() }}",
                            idevent: eventId,
                            id: videoId
                        },
                        success: function(response) {
                            if (response.success) {
                                // Remove the video box if delete was successful
                                $('#video-box-' + videoId).remove();
                                toastr.success('Video deleted successfully!');
                                var myModal3 = new bootstrap.Modal(document
                                    .getElementById('exampleModalCenter09'));
                                myModal3.show();

                                // Close the confirmation modal
                                myModal.hide();
                            }
                        },
                        error: function(xhr) {
                            toastr.error(
                                'Failed to delete the video. Please try again.'
                            );
                        }
                    });
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
