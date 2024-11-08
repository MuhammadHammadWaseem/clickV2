@extends('Panel.Layout.master')


<style>
    .webpage-active a {
        color: #C09D2A !important;
    }

    .webpage-active img {
        filter: none !important;
    }

    .webpage-active {
        background-color: #c09d2a29 !important;
    }

    .webpage-active::after {
        width: 5px !important;
        height: 100% !important;
        background-color: #C09D2A !important;
        position: absolute !important;
        left: 0 !important;
        right: 0 !important;
        content: "";
        top: 0 !important;
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

    form.custom-style {
        display: flex !important;
        flex-direction: row !important;
        justify-content: flex-start !important;
        /* align-items: center !important; */
        column-gap: 20px !important;
    }

    .custom-box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        width: -webkit-fill-available;
    }

    form.custom-style input {
        background-color: transparent !important;
        border: 2px solid transparent !important;
        border-radius: 16px;
        height: 50px;
        padding: 0px !important;
        width: 100%;
    }

    form.custom-style select {
        background-color: #EDEDED;
        border: 1px solid #999999;
        border-radius: 30px;
        padding: 10px 20px;
        margin-bottom: 20px;
    }

    .box-styling.ceremony-box.web-page-three-boxes .text img {
        width: 100%;
        object-fit: cover;
        height: 250px;
    }

    .col-lg-4.col-md-6.col-sm-6 {
        margin-top: 20px;
    }


    #exampleModalCenter03 .modal-dialog {
    max-width: 550px !important;
}


#settingForm label {
    font-size: 14px;
}

#settingForm select#font_style {
    margin: 0;
}

    @media only screen and (max-width: 991px) {
        .two-btn-inline {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            justify-content: center;
            row-gap: 10px;
        }

        .col-lg-4.col-md-6.col-sm-6 {
            margin-top: 0px;
        }

        .two-btn-inline .t-btn {
            font-size: 14px;
        }
    }

    @media only screen and (max-width: 767px) {
        form.custom-style {
            flex-direction: column !important;
            align-items: stretch !important;
        }

        form#settingForm .custom-box select {
            width: 100%;
        }

        .box-styling .text p {
            font-size: 13px;
            text-align: center;
        }


        .box-styling.event-photos-gallery .two-things-align {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            flex-direction: column;
            row-gap: 10px;
        }

        #content .box-styling {
            height: max-content !important;
        }

        .col-sm-6 {
            flex: 0 0 100% !important;
            max-width: 100% !important;
        }

        p#NoItems {
            width: 100%;
            text-align: center;
        }

        .box-styling.ceremony-box.web-page-three-boxes .text {
            display: flex;
            flex-direction: column;
            align-items: center !important;
            row-gap: 20px;
        }

        .box-styling.event-photos-gallery .two-things-align {
            display: flex;
            justify-content: space-between;
            align-items: stretch !important;
        }

        .box-styling.event-photos-gallery .main-event-gallery-box {
            margin: 20px 0 0px;
        }

        .extra_side_page .box-styling {
            padding: 0 !important;
        }

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
                        <h2>{{ __('webpage.title') }}</h2>
                        <p>{{ __('webpage.description') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling website-preview ">
                    <div class="text">
                        <h2>{{ __('webpage.webpriview') }} </h2>
                        <p>{{ __('webpage.webpriviewdesc') }}</p>
                    </div>
                    <div class="iframe-box">
                        {{-- <img src="{{ asset('assets/Panel/images/website-preview-iframe.png') }}" alt=""> --}}
                        <iframe src="{{ route('website', ['id' => $event->id_event]) }}" frameborder="0"></iframe>
                    </div>
                    <div class="two-btn-inline">
                        <button class="t-btn t-btn-gray"><a
                                href="{{ route('panel.event.generalInfos', ['id' => $event->id_event]) }}"
                                style="color:#ffffff;">{{ __('webpage.Website Information') }}</a></button>
                        <button class="t-btn t-btn-gray"
                            id="changeMainPhotoBtn">{{ __('webpage.Change Main Photo') }}</button>
                        <button class="t-btn"><a href="{{ route('website', ['id' => $event->id_event]) }}"
                                style="color:#ffffff;">{{ __('webpage.Visit Website') }}</a></button>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="box-styling">
                    <form action="{{ route('website.update', $event->id_event) }}" method="POST" id="settingForm"
                        class="custom-style">
                        @csrf
                        @if ($eventType->couple_event)
                            <div class="custom-box">
                                <label for="bride_name_color">{{ __('webpage.Bride Name Color:') }}</label>
                                <input type="color" id="bride_name_color" name="bride_name_color"
                                    value="{{ old('bride_name_color', $WebsiteSetting->bride_name_color ?? '') }}">
                            </div>

                            <div class="custom-box">
                                <label for="groom_name_color">{{ __('webpage.Groom Name Color:') }}</label>
                                <input type="color" id="groom_name_color" name="groom_name_color"
                                    value="{{ old('groom_name_color', $WebsiteSetting->groom_name_color ?? '') }}">
                            </div>

                            <div class="custom-box">
                                <label for="and_symbol_color">{{ __('webpage."And" Symbol Color:') }}</label>
                                <input type="color" id="and_symbol_color" name="and_symbol_color"
                                    value="{{ old('and_symbol_color', $WebsiteSetting->and_symbol_color ?? '') }}">
                            </div>

                            <div class="custom-box">
                                <label for="event_date_color">{{ __('webpage.Event Date Color:') }}</label>
                                <input type="color" id="event_date_color" name="event_date_color"
                                    value="{{ old('event_date_color', $WebsiteSetting->event_date_color ?? '') }}">
                            </div>

                            <div class="custom-box">
                                <label for="font_style">{{ __('webpage.Font Style:') }}</label>

                                <select id="font_style" name="font_style">
                                    <option value="Arial"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Arial' ? 'selected' : '' }}>
                                        Arial
                                    </option>
                                    <option value="Times New Roman"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Times New Roman' ? 'selected' : '' }}>
                                        Times New Roman</option>
                                    <option value="Courier New"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Courier New' ? 'selected' : '' }}>
                                        Courier New</option>
                                    <option value="Georgia"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Georgia' ? 'selected' : '' }}>
                                        Georgia</option>
                                    <option value="Verdana"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Verdana' ? 'selected' : '' }}>
                                        Verdana</option>
                                    <!-- Add more font options as needed -->
                                </select>
                            </div>
                        @else
                            <div class="custom-box">
                                <label for="event_name_color">{{ __('webpage.Event Name Color:') }}</label>
                                <input type="color" id="event_name_color" name="event_name_color"
                                    value="{{ old('event_name_color', $WebsiteSetting->event_name_color ?? '') }}">
                            </div>
                            <div class="custom-box">
                                <label for="event_date_color">{{ __('webpage.Event Date Color:') }}</label>
                                <input type="color" id="event_date_color" name="event_date_color"
                                    value="{{ old('event_date_color', $WebsiteSetting->event_date_color ?? '') }}">
                            </div>
                            <div class="custom-box">
                                <label for="font_style">{{ __('webpage.Font Style:') }}</label>

                                <select id="font_style" name="font_style">
                                    <option value="Arial"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Arial' ? 'selected' : '' }}>
                                        Arial
                                    </option>
                                    <option value="Times New Roman"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Times New Roman' ? 'selected' : '' }}>
                                        Times New Roman</option>
                                    <option value="Courier New"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Courier New' ? 'selected' : '' }}>
                                        Courier New</option>
                                    <option value="Georgia"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Georgia' ? 'selected' : '' }}>
                                        Georgia</option>
                                    <option value="Verdana"
                                        {{ old('font_style', $WebsiteSetting->font_style ?? '') == 'Verdana' ? 'selected' : '' }}>
                                        Verdana</option>
                                    <!-- Add more font options as needed -->
                                </select>
                            </div>
                        @endif
                        <button type="submit">{{ __('webpage.Save') }}</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>{{ __('webpage.Eventphoto') }}</h2>
                            <p>{{ __('webpage.Eventphotodesc') }}</p>
                        </div>
                        <button type="button" class="t-btn" data-toggle="modal"
                            data-target="#exampleModalCenter04">{{ __('webpage.Add New') }}</button>
                    </div>
                    <div class="main-event-gallery-box">
                        @forelse ($photogallery as $photo)
                            @if (file_exists('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg'))
                                <div class="box" id="photo-box-{{ $photo->id_photogallery }}">
                                    <a href="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                        data-fancybox="images" tabindex="0">
                                        <img src="{{ asset('event-images/' . $photo->id_event . '/photogallery/' . $photo->id_photogallery . '.jpg') }}"
                                            alt="">
                                    </a>
                                    <button type="button" class="delete-image-btn"
                                        data-id="{{ $photo->id_photogallery }}"
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
                            <p id="NoItems">{{ __('webpage.no_items_found') }}</p>
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
                        <h2>{{ __('webpage.Ceremony') }}</h2>
                        <p>{{ __('webpage.Cermonydesc') }}</p>
                        <button class="t-btn" id="addCerImageBtn">{{ __('webpage.Add New') }} </button>
                        @if (file_exists(public_path('event-images/' . $event->id_event . '/cerimg.jpg')))
                            <img src="{{ asset('event-images/' . $event->id_event . '/cerimg.jpg') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box-styling reception-new-box ceremony-box web-page-three-boxes">
                    <div class="text">
                        <h2>{{ __('webpage.Recption') }}</h2>
                        <p>{{ __('webpage.Recptiondesc') }}</p>
                        <button class="t-btn" id="addRecImageBtn">{{ __('webpage.Add New') }} </button>
                        @if (file_exists(public_path('event-images/' . $event->id_event . '/recimg.jpg')))
                            <img src="{{ asset('event-images/' . $event->id_event . '/recimg.jpg') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box-styling party-new-box ceremony-box web-page-three-boxes">
                    <div class="text">
                        <h2>{{ __('webpage.Custome') }}</h2>
                        <p>{{ __('webpage.Customedesc') }}</p>
                        <button class="t-btn" id="addParImageBtn">{{ __('webpage.Add New') }}</button>
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
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('webpage.Upload A Photo Of Your Ceremony.') }}</h2>
                    </div>
                </div>
                <form id="uploadCerImageForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="cerimage" name="cerimage" class="d-none" accept="image/*" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                            <label id="uploadButton">
                                <img src="{{ asset('assets/Panel/images/uploadFile.png') }}" alt="Upload Icon">
                            </label>
                            <div id="printCerName">{{ __('webpage.no_file_selected') }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                            class="submit-btn btn btn-primary t-btn">{{ __('webpage.Submit') }}</button>
                        <button type="button" id="closeCerModalBtn" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('webpage.Close') }}</button>
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
                        <button type="submit"
                            class="submit-btn btn btn-primary t-btn">{{ __('webpage.Submit') }}</button>
                        <button type="button" id="closeBtn" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('webpage.Close') }}</button>
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
                        <h2>{{ __('webpage.Image Add Success Heading') }}</h2>
                        <p>{{ __('webpage.Image Add Success Message') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveImagesModal" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('webpage.Close') }}</button>
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
                        <h2>{{ __('webpage.Delete Image') }}</h2>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveImagesModal" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('webpage.No') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn">{{ __('webpage.Yes') }}</button>
                </div>
            </div>
        </div>
    </div>


    {{-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter02">
        {{ __('webpage.Serve Meal Button Text') }} </button> --}}
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
                        <h2>{{ __('webpage.Serve Meal Modal Heading') }}</h2>
                        <p>{{ __('webpage.Serve Meal Modal Body Text') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="mealNoBtn">{{ __('webpage.Serve Meal Modal No Button') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter"><a class="text-light"
                            href="{{ route('panel.event.meals', ['id' => $event->id_event]) }}">{{ __('webpage.Serve Meal Modal Yes Button') }}</a></button>
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
                        <h2>{{ __('webpage.Image Delete Success Heading') }}</h2>
                        <p>{{ __('webpage.Image Delete Success Message') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('webpage.Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reception Modal -->
    <div class="modal fade modal-01 modal-02 modal-03" id="addRecImage" tabindex="-1" role="dialog"
        aria-labelledby="addRecImageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('webpage.Upload A Photo Of Your Reception') }}</h2>
                    </div>
                </div>
                <form id="uploadRecImageForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="recimage" name="recimage" class="d-none" accept="image/*" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                            <label id="uploadButton2">
                                <img src="{{ asset('assets/Panel/images/uploadFile.png') }}" alt="Upload Icon">
                            </label>
                            <div id="printRecName" class="text-center">No File Selected</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                            class="submit-btn btn btn-primary t-btn">{{ __('webpage.Submit') }}</button>
                        <button type="button" id="closeRecModalBtn" class="btn"
                            data-dismiss="modal">{{ __('webpage.Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Custom (Party) Modal -->
    <div class="modal fade modal-01 modal-02 modal-03" id="addParImage" tabindex="-1" role="dialog"
        aria-labelledby="addParImageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('webpage.Upload A Photo Of Your Custom Event') }}</h2>
                    </div>
                </div>
                <form id="uploadParImageForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="parimage" name="parimage" class="d-none" accept="image/*" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                            <label id="uploadButton3">
                                <img src="{{ asset('assets/Panel/images/uploadFile.png') }}" alt="Upload Icon">
                            </label>
                            <div id="printCusName" class="text-center">{{ __('webpage.no_file_selected') }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                            class="submit-btn btn btn-primary t-btn">{{ __('webpage.Submit') }}</button>
                        <button type="button" id="closeParModalBtn" class="btn"
                            data-dismiss="modal">{{ __('webpage.Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Change Main Photo --}}
    <div class="modal fade modal-01 modal-02 modal-03" id="changeMainPhoto" tabindex="-1" role="dialog"
        aria-labelledby="changeMainPhotoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('webpage.Change Main Photo') }}</h2>
                    </div>
                </div>
                <form method="POST" id="saveMainPhoto" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text">
                            @csrf
                            <input type="file" id="mainimage" name="mainimage" accept="image/*" class="d-none" />
                            <input type="hidden" name="idevent" value="{{ $event->id_event }}" />
                            <label id="uploadButton4">
                                <img src="{{ asset('assets/Panel/images/uploadFile.png') }}" alt="Upload Icon">
                            </label>
                            <div id="printMainImgName">{{ __('webpage.no_file_selected') }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                            class="submit-btn btn btn-primary t-btn">{{ __('webpage.Submit') }}</button>
                        <button type="button" id="closeMainIamgeModalBtn" class="btn"
                            data-dismiss="modal">{{ __('webpage.Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02" id="exampleModalCenter022" tabindex="-1" role="dialog"
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
                        <h2>{{ __('giftsuggestion.want_to_send_invitations_to_guests') }}</h2>
                        <p>{{ __('genralInfo.Design your invite') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="noInvitation">{{ __('genralInfo.Later') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter1"><a class="text-light"
                            href="{{ route('panel.event.invitation', ['id' => $event->id_event]) }}">{{ __('giftsuggestion.Yes, Create Invitation') }}</a></button>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade modal-01 modal-02" id="exampleModalCenter022" tabindex="-1" role="dialog"
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
                        <h2>{{ __('giftsuggestion.want_to_send_invitations_to_guests') }}</h2>
                        <p>{{ __('genralInfo.Design your invite') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="noInvitation">{{ __('genralInfo.Later') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter1"><a class="text-light"
                            href="{{ route('panel.event.invitation', ['id' => $event->id_event]) }}">{{ __('giftsuggestion.Yes, Create Invitation') }}</a></button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="modal fade modal-01 modal-02" id="exampleModalCenter010" tabindex="-1" role="dialog"
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
                        <h2>{{ __('genralInfo.Would You Like To Add A Gift Suggestions For Your Event?') }}</h2>
                        <p>{{ __('genralInfo.Gift Suggestions Desc') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="noGift">{{ __('genralInfo.Later') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter"><a class="text-light"
                            href="{{ route('panel.event.gift', ['id' => $event->id_event]) }}">{{ __('genralInfo.I Do') }}</a></button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02" id="exampleModalCenter023" tabindex="-1" role="dialog"
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
                            <h2>{{ __('genralInfo.Would You Like To Add A Guest List For Your Event?') }}</h2>
                            <p>{{ __('genralInfo.Add your guest list and send invitations') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            id="noGuestList">{{ __('genralInfo.Later') }}</button>
                        <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                            data-target="#exampleModalCenter1"><a class="text-light"
                                href="{{ route('panel.event.guests-list', ['id' => $event->id_event]) }}">{{ __('genralInfo.I Do') }}</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-01 modal-02" id="exampleModalCenter024" tabindex="-1" role="dialog"
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
                        <h2>{{ __('genralInfo.Would You Like To Manage A Table Sitting') }}</h2>
                        <p>{{ __('genralInfo.Arrange your seating here') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="noTable">{{ __('genralInfo.Later') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter1"><a class="text-light"
                            href="{{ route('panel.event.guests.index', ['id' => $event->id_event]) }}">{{ __('genralInfo.I Do') }}</a></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02" id="exampleModalCenter025" tabindex="-1" role="dialog"
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
                            <h2>{{ __('genralInfo.Would You Like To Add A Photos & Videos Of Your Event?') }}</h2>
                            <p>{{ __('genralInfo.Share the memories') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            id="noPhotos">{{ __('genralInfo.Later') }}</button>
                        <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                            data-target="#exampleModalCenter1"><a class="text-light"
                                href="{{ route('panel.event.photos', ['id' => $event->id_event]) }}">{{ __('genralInfo.I Do') }}</a></button>
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
                            href="{{ route('panel.event.reminder', ['id' => $event->id_event]) }}">{{ __('genralInfo.I Do') }}</a></button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $("#mealNoBtn").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter010'));
            successModal.show();
        });
        $("#noGift").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter022'));
            successModal.show();
        });
        $("#noInvitation").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter023'));
            successModal.show();
        });

        $("#noGuestList").on("click", function() {
                var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter024'));
                successModal.show();
            });
            $("#noTable").on("click", function() {
                var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter025'));
                successModal.show();
            });

            $("#noPhotos").on("click", function() {
                var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter026'));
                successModal.show();
            });
        var mainImage = @json($event->mainimage);
        var cerImage = @json($event->cerimg);
        var recImage = @json($event->recimg);
        var parImage = @json($event->parimg);
        console.log(mainImage, cerImage, recImage, parImage);

        if (mainImage == '' || mainImage == null) {
            var successModal = new bootstrap.Modal(document.getElementById('changeMainPhoto'));
            successModal.show();
        } else if (cerImage == '' || cerImage == null) {
            var successModal = new bootstrap.Modal(document.getElementById('addCerImage'));
            successModal.show();
        } else if (recImage == '' || recImage == null) {
            var successModal = new bootstrap.Modal(document.getElementById('addRecImage'));
            successModal.show();
        } else if (parImage == '' || parImage == null) {
            var successModal = new bootstrap.Modal(document.getElementById('addParImage'));
            successModal.show();
        }

        $('#saveMainPhoto').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting the traditional way

            // Create a FormData object to handle the file upload and other form data
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('panel.event.changeMainPhoto', ['id' => $event->id_event]) }}", // Your Laravel route for storing images
                type: 'POST', // HTTP method
                data: formData, // The form data
                contentType: false, // Do not set content-type header
                processData: false, // Do not process the data
                success: function(response) {
                    $("#mainimage").val(''); // Clear the file input field after success
                    $("#printMainImgName").text(
                        'No File Selected'); // Clear the file input field after success
                    toastr.success('Main image uploaded successfully!');
                    $('#closeMainIamgeModalBtn').click(); // Close the modal

                    var myModal2 = new bootstrap.Modal(document.getElementById('addCerImage'));
                    myModal2.show();

                    const iframe = document.querySelector('iframe');
                    iframe.src = iframe.src;

                },
                error: function(xhr) {
                    // Handle error (e.g., display error messages)
                    toastr.error('Failed to upload the Main image. Please try again.');
                    console.error(xhr.responseText);
                }
            });
        });

        document.getElementById('uploadButton4').addEventListener('click', function() {
            document.getElementById('mainimage').click();
        });

        // Display video file name when a file is selected
        document.getElementById('mainimage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('printMainImgName');

            if (!file) {
                previewContainer.textContent = 'No File Selected';
            } else {
                previewContainer.textContent = file.name; // Show the selected video file name
            }
        });

        document.getElementById('uploadButton').addEventListener('click', function() {
            document.getElementById('cerimage').click();
        });

        document.getElementById('cerimage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('printCerName');

            if (!file) {
                previewContainer.textContent = 'No File Selected';
            } else {
                previewContainer.textContent = file.name; // Show the selected video file name
            }
        });

        document.getElementById('uploadButton2').addEventListener('click', function() {
            document.getElementById('recimage').click();
        });

        document.getElementById('recimage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('printRecName');

            if (!file) {
                previewContainer.textContent = 'No File Selected';
            } else {
                previewContainer.textContent = file.name; // Show the selected video file name
            }
        });

        document.getElementById('uploadButton3').addEventListener('click', function() {
            document.getElementById('parimage').click();
        });

        document.getElementById('parimage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('printCusName');

            if (!file) {
                previewContainer.textContent = 'No File Selected';
            } else {
                previewContainer.textContent = file.name; // Show the selected video file name
            }
        });

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

                        const iframe = document.querySelector('iframe');
                        iframe.src = iframe.src;

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
                        $("#cerimage").val(''); // Clear the file input field after success
                        $("#printCerName").text(
                            'No File Selected'); // Clear the file input field after success
                        toastr.success('Ceremony image uploaded successfully!');
                        $('#closeCerModalBtn').click(); // Close the modal

                        var myModal2 = new bootstrap.Modal(document.getElementById(
                            'addRecImage'));
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
            $('#settingForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('website.update', $event->id_event) }}",
                    type: 'POST', // HTTP method
                    data: formData, // The form data
                    contentType: false, // Do not set content-type header
                    processData: false, // Do not process the data
                    success: function(response) {
                        toastr.success('Setting Updated Successfully!');
                        const iframe = document.querySelector('iframe');
                        iframe.src = iframe.src;
                    },
                    error: function(xhr) {
                        // Handle error (e.g., display error messages)
                        toastr.error('Failed to Update Setting. Please try again.');
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
                        $("#printRecName").text('No File Selected');
                        toastr.success('Reception image uploaded successfully!');
                        $('#closeRecModalBtn').click();

                        var myModal2 = new bootstrap.Modal(document.getElementById(
                            'addParImage'));
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
                        $("#printCusName").text('No File Selected');
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

                        const iframe = document.querySelector('iframe');
                        iframe.src = iframe.src;

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
