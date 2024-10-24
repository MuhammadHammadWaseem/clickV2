@extends('Panel.layout.master')
<style>
    .accordion {
        width: 100%;
        background-color: #D9D9D9;
        border: none;
        outline: none;
        text-align: left;
        /* padding: 10px 15px; */
        font-size: 18px;
        color: #333;
        cursor: pointer;
        transition: background-color 0.2s linear;
        margin-top: 20px;
        border-radius: 15px;
    }

    .accordion-content {
        background-color: #D9D9D9;
        padding: 0 20px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-in-out;
        border-radius: 0px 0px 15px 15px;
        margin-top: -40px;
    }


    .accordian-table-content .table-box tr td,
    .accordian-table-content .table-box tr th {
        text-align: left !important;
    }

    .accordian-table-content .table-box {
        background: transparent !important;
    }

    .accordian-table-content .table-box {
        margin: 0;
    }

    .accordion-content .table-box {
        margin: 0px 0 15px 0;
    }



    .accordian-table-content .table-box tr {
        padding: 0;
        border: none !important;
    }

    .accordian-table-content .table-box table tr td {
        border: none !important;
        padding: 10px 0 !important;
        font-size: 16px;
    }

    .accordian-table-content .table-box table tr td button.btn.btn-primary.t-btn.t-btn-theme {
        font-size: 14px;
        padding: 10px 40px;
    }

    .accordion.is-open {
        border-radius: 15px 15px 0px 0px !important;
    }

    .accordion .table-box {
        padding: 0 20px !important;
    }

    .accordian-table-content .table-box tr {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        align-items: center;
    }

    .accordion-content .table-box tr {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr 1fr;
        align-items: center;
    }

    .box-styling.guest-list {
        margin-bottom: 0px;
        padding-bottom: 20px;
        height: max-content;
    }

    input[type="checkbox"].check_box_style {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border: 1px solid #CCCCCC;
        border-radius: 5px;
        background-color: #EDEDED;
        position: relative;
        cursor: pointer;
        margin-bottom: -3px;
        margin-right: 5px;
    }

    input[type="checkbox"].check_box_style:checked {
        background-color: #7B7BFF;
    }

    input[type="checkbox"].check_box_style:checked::after {
        content: '';
        position: absolute;
        display: block;
        left: 6px;
        top: 1.5px;
        width: 6px;
        height: 11px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .after-line-effect {
        position: relative;
        font-size: 11px;
        font-weight: 500;
        color: #AAAAAA;
    }

    .after-line-effect::after {
        content: "";
        position: absolute;
        height: 2px;
        width: 94%;
        top: 45%;
        right: 0;
        background: #AAAAAA;
    }

    .divider-line {
        height: 2px;
        background: #aaa;
        margin: 10px 0;
    }

    .accordion-content .table-box table tr td:nth-child(3) {
        padding-left: 50px !important;
    }

    .accordion-content .table-box table tr td:nth-child(4) {
        display: flex;
        justify-content: center;
    }

    .accordian-table-content .table-box tr th {
        border-bottom: 1px solid #aaaaaa;
        padding-bottom: 10px !important;
        margin: 20px 0;
    }

    .box-styling.guest-list {
        margin-bottom: 15px;
    }

    input[type="checkbox"].check_box_style {
        padding: 0 !important;
    }

    .accordion .table-box {
        margin: 30px 0 !important;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list {
        background-color: #e0e0e033 !important;
    }


    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list {
        height: max-content !important;
    }


    @media only screen and (max-width: 1500px) {
        .accordian-table-content .table-box table tr td {
            font-size: 12px;
        }

        .accordian-table-content .table-box table tr td button.btn.btn-primary.t-btn.t-btn-theme {
            font-size: 12px;
            padding: 4px 20px;
        }

        .accordian-table-content .table-box tr th {
            font-size: 14px;
            margin: 10px 0;
        }

    }

    @media only screen and (max-width: 1199px) {

        .accordian-table-content {
            overflow-x: scroll;
        }

        .accordian-table-content::-webkit-scrollbar {
            height: 5px;
        }

        .accordian-table-content .table-box {
            width: 960px;
        }

        .accordian-table-content .accordion {
            width: 960px;
        }

        .accordian-table-content .accordion-content {
            width: 960px;
        }

        .accordian_img_acces img {
            max-width: 50% !important;
        }

    }

    @media only screen and (max-width: 1024px) {}

    @media only screen and (max-width: 991px) {

        .after-line-effect::after {
            content: "";
            position: absolute;
            height: 2px;
            width: 90%;
            top: 45%;
            right: 40px;
            background: #AAAAAA;
        }

        .divider-line {
            height: 2px;
            background: #aaa;
            margin: 10px 0;
            width: 95.7%;
        }
    }

    @media only screen and (max-width: 767px) {

        .accordian-table-content .table-box {
            overflow: hidden !important;
            width: 650px;
        }

        .accordian-table-content .accordion {
            width: 650px;
        }

        .accordian-table-content .accordion-content {
            width: 650px;
        }

        .t-btn {
            width: 100%;
        }

        .accordian-table-content .table-box table tr td {
            font-size: 10px;
        }

        .accordion-content li {
            font-size: 10px;
        }

        .accordian-table-content .table-box tr th {
            font-size: 10px;
            margin: 10px 0;
        }

        .after-line-effect::after {
            content: "";
            position: absolute;
            height: 2px;
            width: 85%;
            top: 45%;
            right: 30px;
            background: #AAAAAA;
        }

        /* .modifier {

        } */
    }

    @media only screen and (max-width: 575px) {}
</style>
@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $eventId = GeneralHelper::getEventId();
    @endphp
    <div class="modifier"
        style="position: fixed !important;bottom: 90px !important;right: 10px !important;border: 2px solid #f90;border-radius: 10px;text-align: center;padding: 5px 10px;background: #fff;z-index:3000 !important; display:none;">
        <p class="ng-binding mb-3">0 GUEST(S) SELECTED</p>
        <div class="button-group d-flex flex-column" style="gap:0.5rem;">
            <button class="btn btn-sm btn-orange" data-bs-toggle="modal" data-bs-target="#editguestModal">EDIT</button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delguestModal">DELETE</button>
            <button class="btn btn-sm btn-primary">SEND INVITATION</button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                data-bs-target="#declineguestModal">DECLINE</button>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#undeclineguestModal"
                style="display: none;">UNDECLINE</button>
        </div>
    </div>
    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling guest-list">
                    <div class="text">
                        <h2>Guest List</h2>
                    </div>
                    <div class="guest-listings">
                        <ul>
                            <li><img src="assets/images/sent-right.png" alt="">
                                <p>Here you can enter your guest and limit the number of people you want
                                    them to bring with them, for example if you invite a guest that have a
                                    wife and 5 children, and you only want him to come with the wife you can
                                    limit to 2 the number of members so you can directly indicate that no
                                    kids allowed in this event.</p>
                            </li>
                            <li><img src="assets/images/sent-right.png" alt="">
                                <p>You can also know who confirmed and who didn’t</p>
                            </li>
                            <li><img src="assets/images/sent-right.png" alt="">
                                <p>ou can see how many members added and calculate the number of guest so
                                    far</p>
                            </li>
                            <li><img src="assets/images/sent-right.png" alt="">
                                <p>You can resend invitation to the guest who did not answer or send it to
                                    one guest you just added</p>
                            </li>
                            <li><img src="assets/images/sent-right.png" alt="">
                                <p>Once your guest is highlighted in Blue it means that he has checked inn
                                    to the reception</p>
                            </li>
                            <li><img src="assets/images/sent-right.png" alt="">
                                <p>If the guest is highlighted in red it means he or she declined</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling quick-actions">
                    <div class="text">
                        <h2>Quick Actions</h2>
                    </div>
                    <div class="three-btns-align">
                        <button type="button" class="btn btn-primary t-btn t-btn-theme" data-toggle="modal"
                            data-target="#exampleModalCenter01">Add Guest </button>
                        <button type="button" class="btn btn-primary t-btn t-btn-dark" data-toggle="modal"
                            data-target="#exampleModalCenter02">Add From Other Events </button>
                        <button type="button" class="btn btn-primary t-btn t-btn-dark" data-toggle="modal"
                            data-target="#exampleModalCenter03">Upload .CSV File </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery events-lists-sec-01 guest-list">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>Guest List</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>
                        <div class="two-btn-align">
                            <button type="button" class="btn btn-primary t-btn t-btn-theme" data-toggle="modal"
                                data-target="#exampleModalCenter04">Export </button>
                            <button type="button" class="btn btn-primary t-btn t-btn-dark" data-toggle="modal"
                                data-target="#exampleModalCenter05">Export Invitation QR
                                Code </button>
                        </div>
                    </div>

                    <div class="accordian-table-content">

                        <div class="table-box">
                            <table>
                                {{-- <tr>
                                    <th>Names</th>
                                    <th>Contact #</th>
                                    <th>Email Address</th>
                                    <th>Remaining Members</th>
                                    <th>Actions</th>
                                </tr> --}}
                            </table>
                        </div>
                        <div id="GuestList">
                            <div class="tab" id="tableData">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="col-md-12">
            <div class="table-content-pagination single-pagination">
                <ul>

                </ul>
            </div>
        </div> --}}
    </div>

    <div class="modal fade modal-01 add-new-meal" id="AddGuest" tabindex="-1" role="dialog"
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
                        <h2 class="text-center">New Guest</h2>
                    </div>
                    <!-- Form start -->
                    <form id="guestForm">
                        <!-- Title Select Box -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <select class="form-control" id="title" name="title">
                                <option selected disabled>Select Title</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss">Miss</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Prof.">Prof.</option>
                                <option value="Rev.">Rev.</option>
                                <option value="Hon.">Hon.</option>
                                <option value="Sir">Sir</option>
                                <option value="Dame">Dame</option>
                                <option value="Mr. & Mrs.">Mr. & Mrs.</option>
                                <option value="Mr. & Family">Mr. & Family</option>
                                <option value="Ms. & Family">Ms. & Family</option>
                                <option value="Dr. & Mrs.">Dr. & Mrs.</option>
                                <option value="Capt.">Capt.</option>
                                <option value="Maj.">Maj.</option>
                                <option value="Col.">Col.</option>
                                <option value="Gen.">Gen.</option>
                                <option value="Lt.">Lt.</option>
                                <option value="Sgt.">Sgt.</option>
                                <option value="Lord">Lord</option>
                                <option value="Lady">Lady</option>
                                <option value="Duke">Duke</option>
                                <option value="Duchess">Duchess</option>
                            </select>
                        </div>
                        <input type="hidden" value="{{ $eventId }}" name="idevent" id="idevent">
                        <!-- Name Input -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter name">
                        </div>

                        <!-- Email Input -->
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter e-mail">
                        </div>

                        <!-- Phone Input -->
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="COUNTRY CODE THEN NUMBER">
                        </div>

                        <!-- WhatsApp Input -->
                        <div class="form-group">
                            <label for="whatsapp">WhatsApp</label>
                            <input type="tel" class="form-control" id="whatsapp" name="whatsapp"
                                placeholder="COUNTRY CODE THEN NUMBER">
                        </div>

                        <!-- Allergies Radio Button -->
                        <div class="form-group">
                            <label>Allergies</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="allergiesYes"
                                    value="1">
                                <label class="form-check-label" for="allergiesYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="allergiesNo"
                                    value="0">
                                <label class="form-check-label" for="allergiesNo">No</label>
                            </div>
                        </div>

                        <!-- Select Meal -->
                        <div class="form-group">
                            <label for="meal">Select Meal</label>
                            <select class="form-control" id="meal" name="meal">
                                @foreach ($meals as $meal)
                                    <option value="{{ $meal->id_meal }}">{{ $meal->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Number of Members to Invite -->
                        <div class="form-group">
                            <label for="members">Number of members can invite</label>
                            <input type="number" class="form-control" id="members" name="members"
                                placeholder="Enter number">
                        </div>

                        <!-- Notes Input -->
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" id="notes" name="notes" placeholder="Enter notes"></textarea>
                        </div>

                        <!-- Confirm Radio Button -->
                        <div class="form-group">
                            <label>Confirm</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="confirm" id="confirmYes"
                                    value="1">
                                <label class="form-check-label" for="confirmYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="confirm" id="confirmNo"
                                    value="0">
                                <label class="form-check-label" for="confirmNo">No</label>
                            </div>
                        </div>
                    </form>
                    <!-- Form end -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary submit-btn" id="submitGuestForm">Yes, Manage
                        Now</button>
                </div>
            </div>
        </div>
    </div>



    {{-- For Edit  --}}
    <div class="modal fade modal-01 add-new-meal" id="EditGuest" tabindex="-1" role="dialog"
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
                        <h2 class="text-center">New Guest</h2>
                    </div>
                    <!-- Form start -->
                    <form id="EditguestForm">
                        <!-- Title Select Box -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <select class="form-control" id="edit_title" name="title">
                                <option selected disabled>Select Title</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss">Miss</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Prof.">Prof.</option>
                                <option value="Rev.">Rev.</option>
                                <option value="Hon.">Hon.</option>
                                <option value="Sir">Sir</option>
                                <option value="Dame">Dame</option>
                                <option value="Mr. & Mrs.">Mr. & Mrs.</option>
                                <option value="Mr. & Family">Mr. & Family</option>
                                <option value="Ms. & Family">Ms. & Family</option>
                                <option value="Dr. & Mrs.">Dr. & Mrs.</option>
                                <option value="Capt.">Capt.</option>
                                <option value="Maj.">Maj.</option>
                                <option value="Col.">Col.</option>
                                <option value="Gen.">Gen.</option>
                                <option value="Lt.">Lt.</option>
                                <option value="Sgt.">Sgt.</option>
                                <option value="Lord">Lord</option>
                                <option value="Lady">Lady</option>
                                <option value="Duke">Duke</option>
                                <option value="Duchess">Duchess</option>
                            </select>
                        </div>
                        <input type="hidden" value="{{ $eventId }}" name="idevent" id="idevent">
                        <!-- Name Input -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name"
                                placeholder="Enter name">
                        </div>

                        <!-- Email Input -->
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="edit_email" name="email"
                                placeholder="Enter e-mail">
                        </div>

                        <!-- Phone Input -->
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="edit_phone" name="phone"
                                placeholder="COUNTRY CODE THEN NUMBER">
                        </div>

                        <!-- WhatsApp Input -->
                        <div class="form-group">
                            <label for="whatsapp">WhatsApp</label>
                            <input type="tel" class="form-control" id="edit_whatsapp" name="whatsapp"
                                placeholder="COUNTRY CODE THEN NUMBER">
                        </div>

                        <!-- Allergies Radio Button -->
                        <div class="form-group">
                            <label>Allergies</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="edit_allergiesYes"
                                    value="1">
                                <label class="form-check-label" for="allergiesYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="edit_allergiesNo"
                                    value="0">
                                <label class="form-check-label" for="allergiesNo">No</label>
                            </div>
                        </div>

                        <!-- Select Meal -->
                        <div class="form-group">
                            <label for="meal">Select Meal</label>
                            <select class="form-control" id="edit_meal" name="meal">
                                @foreach ($meals as $meal)
                                    <option value="{{ $meal->id_meal }}">{{ $meal->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Number of Members to Invite -->
                        <div class="form-group">
                            <label for="members">Number of members can invite</label>
                            <input type="number" class="form-control" id="edit_members" name="members"
                                placeholder="Enter number">
                        </div>

                        <!-- Notes Input -->
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" id="edit_notes" name="notes" placeholder="Enter notes"></textarea>
                        </div>

                        <!-- Confirm Radio Button -->
                        <div class="form-group">
                            <label>Confirm</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="confirm" id="edit_confirmYes"
                                    value="1">
                                <label class="form-check-label" for="confirmYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="confirm" id="edit_confirmNo"
                                    value="0">
                                <label class="form-check-label" for="confirmNo">No</label>
                            </div>
                        </div>
                    </form>
                    <!-- Form end -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary submit-btn" id="submitEditGuestForm">Yes, Manage
                        Now</button>
                </div>
            </div>
        </div>
    </div>




    {{-- Modal for import guest csv --}}
    <div class="modal fade modal-01 modal-02 modal-03 upload-form-csv" id="exampleModalCenter03" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="text">
                                <h2>Upload CSV</h2>
                                <p>Upload a CSV file with the columns: name, email, phone, whatsapp, nummembers, notes.
                                    Separated by Semicolon ( ; ).</p>
                                <a href="{{ asset('assets/files/example.csv') }}" class="submit-btn" download>Download CSV
                                    Example</a>
                            </div>
                            <form id="csvUploadForm" method="POST" enctype="multipart/form-data">
                                <div class="upload-container" onclick="document.getElementById('fileInput').click();">
                                    <img src="{{ asset('assets/images/upload_svg_image.png') }}" alt="Upload Icon" />
                                    <input type="file" id="fileInput" name="csv_file" onchange="showFileName()"
                                        accept=".csv" required>
                                </div>
                                <div id="fileName" class="file-name"></div>
                            </form>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="submit-btn" id="uploadCsvBtn">Upload Guest List</button>
                            </div>
                        </div>


                        <div class="col-8">
                            <div class="main-side-media">
                                <div class="image-box">
                                    <img src="{{ asset('assets/images/examplecsv.png') }}" alt="">
                                </div>
                                <div class="main-youtube-iframe">
                                    <iframe width="100%" height="315"
                                        src="https://www.youtube.com/embed/u2usWXrfMGo?si=R76PqusEdkjgqqEi"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="exampleModalCenter02" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>Upload Guests From Another Event</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <form id="GuestImportForm">
                        <div class="modal-table-type-content" id="guestListItems">
                            {{-- <div class="sub-main-content" >
                            <!-- Dynamically inserted guest data will appear here -->
                        </div> --}}
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I Don’t</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter">Upload Guest</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal"  data-target="#exampleModalCenter05"> Updated Successfully </button> -->
    <!-- Modal -->
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
                        <img src="assets/images/circle-check.png" alt="">
                        <h2>Updated Successfully</h2>
                        <p>Your changes has been successfully added.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Include jQuery first -->
<!-- #region datatables files -->
@section('scripts')
    <script>
        $(document).ready(function() {
            showGuest();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#submitGuestForm').on('click', function(e) {
                var mealId = $('#idevent').val();
                e.preventDefault();
                // Get the form data
                var formData = $('#guestForm').serialize();

                // Perform the AJAX request
                $.ajax({
                    url: "{{ route('panel.event.guests-list.store', '') }}/" + mealId,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Guest added successfully!');
                            $('#guestForm')[0].reset();
                            var myModal = new bootstrap.Modal(document.getElementById(
                                'AddGuest'));
                            myModal.hide();
                            showGuest();
                        } else {
                            alert(response.message || 'Failed to add guest.');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle validation or server errors
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            alert(key + ": " + value);
                        });
                    }
                });
            });
        });

        function showGuest(page = 1) {
            var mealId = $('#idevent').val();

            $.ajax({
                url: "{{ route('panel.event.guests-list.show', '') }}/" + mealId + "?page=" + page,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    var guests = response.guests;

                    // Clear the existing accordions
                    $('#GuestList').empty();

                    // Loop through the guests and create accordion entries
                    guests.forEach(function(guest) {

                        var accordion = `
                <div class="accordion">
                    <div class="table-box">
                        <table>
                            <tr>
                                <td>
                                    <input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton()">

                                    ${guest.titleGuest == null ? ' ' : guest.titleGuest} ${guest.name}<br>${guest.whatsapp} <br>${guest.phone}<br>${guest.email} <br>${guest.members_number} Members Left<br>Table: ${(guest.id_table !== 0 && guest.id_table !== null) ? guest.table.name : 'N/A'}
                                </td>
                                <td>Meal: ${guest.meal ? guest.meal.name : 'N/A'}</td>
                                <td>Allergies: ${guest.allergies ? guest.allergies : 'N/A'}</td>
                                <td>${guest.notes || 'No Notes'}</td>
                                <td><button type="button" class="btn btn-primary t-btn t-btn-theme">Add Members</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="accordion-content">
                    <div class="table-box">
                        <table>
                            <p class="after-line-effect">Members</p>
                            <tr>
                                <td><strong>Member Details</strong></td>
                                <td><strong>Note</strong></td>
                                <td><strong>Other Details</strong></td>
                                <td><strong>Attending Event</strong></td>
                            </tr>`;

                        guest.members.forEach(function(member) {
                            accordion += `
                            <tr class="divider-line"></tr>
                            <tr>
                                <td><input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton()">${member.titleGuest == null ? ' ' : member.titleGuest} ${member.name}</td>
                                <td>${member.notes || 'No Notes'}</td>
                                <td>
                                    <ul>
                                        <li><strong>Meal: </strong>${member.meal ? member.meal.name : 'N/A'}</li>
                                        <li><strong>Table: </strong>${(member.id_table !== 0 && member.id_table !== null) ? member.table.name : 'N/A'}</li>
                                        <li><strong>Allergies: </strong>${member.allergies ? member.allergies : 'N/A'}</li>
                                    </ul>
                                </td>
                                ${(member.opened === 2) ? `
                                                    <td class="accordian_img_acces">
                                                        <img src="{{ asset('assets/images/tick-green-img.png') }}" alt="Tick">
                                                    </td>
                                                ` : ''}
                                ${(member.declined === 1) ? `
                                                    <td class="accordian_img_acces">
                                                        <img src="{{ asset('assets/images/cancel-red-img.png') }}" alt="Declined">
                                                    </td>
                                                ` : ''}
                            </tr>`;
                        });

                        accordion += `
                        <tr class="divider-line"></tr>
                    </table>
                    </div>
                </div>`;

                        $('#GuestList').append(accordion); // Append each accordion to the list
                    });

                    // Re-apply the accordion toggle functionality after adding new elements
                    accordionFunctionality();
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred while fetching guests:", error);
                }
            });
        }

        // Function to apply accordion toggle functionality
        function accordionFunctionality() {
            const accordionBtns = document.querySelectorAll(".accordion");

            accordionBtns.forEach((accordion) => {
                accordion.onclick = function() {
                    this.classList.toggle("is-open");
                    let content = this.nextElementSibling;

                    if (content.style.maxHeight) {
                        content.style.maxHeight = null; // If accordion is open, close it
                    } else {
                        content.style.maxHeight = content.scrollHeight +
                            "px"; // If accordion is closed, open it
                    }
                };
            });
        }
        // Fetch the corresponding page of guest data (this needs to be handled in your backend)
        function fetchGuestPage(page) {
            var mealId = $('#idevent').val();

            $.ajax({
                url: "{{ route('panel.event.guests-list.show', '') }}/" + mealId + "?page=" + page,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    var guests = response.guests;

                    // Clear the table body and append new rows
                    $('#EditGuest tbody').empty();
                    guests.forEach(function(guest) {
                        var row = `
                    <tr>
                        <td>${guest.titleGuest == null ? ' ' : guest.titleGuest + ' ' + guest.name}</td>
                        <td>${guest.phone}</td>
                        <td>${guest.email}</td>
                        <td>${guest.members_number} Members Left</td>
                        <td>
                            <div class="edit-delet">
                                <ul>
                                    <li><a href="#" class="edit-btn" data-id="${guest.id_guest }"><img src="{{ asset('assets/images/action-link.png') }}" alt="Edit"></a></li>

                                    <li><a href="#"><img src="{{ asset('assets/images/action-delet.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                `;
                        $('#EditGuest tbody').append(row);
                    });
                }
            });
        }


        $(document).on('click', '.edit-btn', function() {
            var guestId = $(this).data('id');
            $('.modal-body h2').text('Edit Guest');

            $.ajax({
                url: "{{ route('panel.event.guests.edit', ':id') }}".replace(':id', guestId),
                type: "GET",
                success: function(response) {
                    console.log(response); // Log the response to verify its content
                    // populateEditModal(response);
                    $('#edit_title').val(response.titleGuest);
                    $('#edit_name').val(response.name);
                    $('#edit_email').val(response.email);
                    $('#edit_phone').val(response.phone);
                    $('#edit_whatsapp').val(response.whatsapp);

                    // Set allergies (radio button)
                    if (response.allergies == 1) {
                        $('#edit_allergiesYes').prop('checked', true);
                    } else {
                        $('#edit_allergiesNo').prop('checked', true);
                    }

                    // Set meal
                    $('#edit_meal').val(response.id_meal);
                    $('#edit_members').val(response.members_number);
                    $('#edit_notes').val(response.notes);

                    // Set confirm (radio button)
                    if (response.opened == 1) {
                        $('#edit_confirmYes').prop('checked', true);
                    } else {
                        $('#edit_confirmNo').prop('checked', true);
                    }

                    // Set a hidden input to store the guest ID (if not already in the form)
                    if ($('#EditguestForm input[name="idguest"]').length == 0) {
                        $('#EditguestForm').append('<input type="hidden" name="idguest" value="' +
                            response
                            .id_guest + '">');
                    } else {
                        $('#EditguestForm input[name="idguest"]').val(response.id_guest);
                    }

                    // Open the modal
                    var myModal = new bootstrap.Modal(document.getElementById('EditGuest'));
                    myModal.show();
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + error);
                }
            });
        });



        $('#submitEditGuestForm').click(function(e) {
            e.preventDefault();
            var guestId = $(this).data('id');
            var formData = $('#EditguestForm').serialize(); // Serialize form data

            $.ajax({
                url: "{{ route('panel.event.guests.update', ':id') }}".replace(':id', guestId),
                type: "POST",
                data: formData,
                success: function(response) {
                    // Optionally reload guest list
                    showGuest();
                    toastr.success('Guest updated successfully');
                    var myModal = new bootstrap.Modal(document.getElementById(
                        'EditGuest'));
                    myModal.hide();

                },
                error: function(xhr) {
                    alert('Something went wrong: ' + xhr.responseText);
                }
            });
        });

        $("#importModal").on("click", function() {
            var mealId = $('#idevent').val();
            $.ajax({
                url: `/event/${mealId}/guests/show-event`,
                method: 'GET',
                dataType: "json",
                success: function(response) {
                    var guests = response.guests; // Main array of guests

                    // Clear previous content
                    $('#guestListItems').empty();

                    // Check if 'guests' is an array
                    if (Array.isArray(guests) && guests.length > 0) {
                        // Loop through each guest
                        guests.forEach(function(guest) {
                            // Append main guest information
                            var guestSection = `
                    <div class="sub-main-content">
                        <h3>Event: ${guest.name}</h3> <!-- Main guest name -->
                        <div class="nested-guests">
                            <h4>Guest List:</h4>
                    `;

                            // Check if nested guests array exists and is not empty
                            if (Array.isArray(guest.guests) && guest.guests.length > 0) {
                                guest.guests.forEach(function(nestedGuest, index) {
                                    // Append nested guest names with checkboxes
                                    guestSection += `
                            <div class="w-100 mt-1">
                                <input type="hidden" value="${JSON.stringify(nestedGuest)}" name="allguests" id="">
                                <input type="checkbox" class="guest-checkbox" data-guest='${JSON.stringify(nestedGuest)}' id="guest_${index}">
                                <label for="guest_${index}"><strong>Name:</strong> ${nestedGuest.name}</label>
                            </div>
                            `;
                                });
                            } else {
                                guestSection += '<p>No additional guests found.</p>';
                            }

                            guestSection += '</div></div>';
                            $('#guestListItems').append(guestSection);
                        });
                    } else {
                        $('#guestListItems').append('<p>No guests found for this event.</p>');
                    }
                },
                error: function(err) {
                    console.error('Error fetching guest data:', err);
                }
            });
        });

        // Handle the "Upload Guest" button click
        $(".submit-btn").on("click", function() {
            var selectedGuests = [];

            // Get all checked guests
            $(".guest-checkbox:checked").each(function() {
                var guestData = $(this).data('guest');
                guestData.selected = 1; // Mark the guest as selected
                selectedGuests.push(guestData);
            });

            var mealId = $('#idevent').val();
            if (selectedGuests.length > 0) {
                // Send selected guests to the backend
                $.ajax({
                    url: `/event/${mealId}/guests/import`,
                    method: 'POST',
                    dataType: "json",
                    data: {
                        allguests: selectedGuests,
                        idevent: mealId, // Assuming this is the target event id
                    },
                    success: function(response) {
                        showGuest();
                        $('#GuestImportForm')[0].reset();
                        var myModal = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter02'));
                        myModal.hide();
                        toastr.success("Guests imported successfully");
                    },
                    error: function(err) {
                        console.error('Error importing guests:', err);
                    }
                });
            } else {
                alert('Please select at least one guest to import.');
            }
        });


        function showFileName() {
            const fileInput = document.getElementById('fileInput');
            const fileNameDiv = document.getElementById('fileName');
            const fileName = fileInput.files[0].name;
            fileNameDiv.textContent = fileName;
        }
        document.getElementById('uploadCsvBtn').addEventListener('click', function() {
            const formData = new FormData(document.getElementById('csvUploadForm'));

            $.ajax({
                url: "{{ route('panel.event.importFromCsvGuest', ['id' => $eventId]) }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    showGuest();
                    toastr.success("Guests imported successfully!");
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                    alert("Error uploading the file.");
                }
            });
        });


        // function showButton(id) {
        //     console.log(id);
        //     var a = document.querySelector(".modifier");
        //     // a.style.display= "block";
        //     if(a.style.display == "none"){
        //         a.style.display = "block";
        //     }else{
        //         a.style.display = "none";
        //     }
        // }
        function showButton() {
    const checkboxes = document.querySelectorAll('.check_box_style');
    const selectedIDs = [];

    // Iterate through checkboxes to find selected ones
    checkboxes.forEach(checkbox => {
        console.log("Checkbox Data-ID:", checkbox.getAttribute('data-guest-id')); // Log the data-id
        if (checkbox.checked) {
            const id = checkbox.getAttribute('data-guest-id');
            if (id) {
                selectedIDs.push(id); // Only push if id is not undefined
            }
        }
    });

    const modifierDiv = document.querySelector(".modifier");

    if (selectedIDs.length > 0) {
        modifierDiv.style.display = "block"; // Show the button group
        console.log("Selected Guest IDs:", selectedIDs); // Log selected IDs
    } else {
        modifierDiv.style.display = "none"; // Hide the button group
    }

    // Optionally update the selected count display
    const countDisplay = modifierDiv.querySelector('p');
    countDisplay.textContent = `${selectedIDs.length} GUEST(S) SELECTED`;
}

    </script>
@endsection
