@extends('Panel.Layout.master')
<style>

.modal-03 .modal-body .text {
    text-align: center;
    display: flex;
    justify-content: center;
    flex-direction: column;
    row-gap: 15px;
    align-items: stretch !important;
}

.box-styling.event-photos-gallery .two-things-align .two-btn-align select.form-select {
    height: 40px;
    padding: 10px;
    border: 1px solid grey;
    border-radius: 15px;
    background: #ffffffb8;
}

#ExportQrModal .modal-body .text .form-group input#reservationDate {
    width: 100%;
    height: 40px;
    padding: 10px;
    margin-top: 10px;
    border-radius: 25px;
    border: 1px solid grey;
}

.modal-03 .modal-body .text .form-group {

    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-bottom: 0 !important;
    column-gap:10px;
    flex-direction: row-reverse;
}

#ExportQrModal .modal-body .text .form-group {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    margin-bottom: 0 !important;
    column-gap: 10px;
    flex-direction: column;
}

.modal-03 .modal-body .text .form-group label {
    margin-bottom: 0 !important;
}

    #exampleModalCenter02 .modal-dialog.modal-dialog-centered form#GuestImportForm {
        height: 50vh;
        overflow: scroll;
        overflow-x: hidden;
    }

    #exampleModalCenter02 .modal-dialog.modal-dialog-centered form#GuestImportForm::-webkit-scrollbar {
        width: 5px;
    }


    .box-styling.quick-actions {
        margin-top: 10px !important;
    }

    .main-dashboard-sec .left-menu-dash ul li.gest-active::after {
        width: 5px;
        height: 100%;
        background-color: #C09D2A;
        position: absolute;
        left: 0;
        right: 0;
        content: "";
        top: 0;
    }

    .main-dashboard-sec .left-menu-dash ul li.gest-active a {
        color: #C09D2A;
    }

    .main-dashboard-sec .left-menu-dash ul li.gest-active img {
        filter: none;
    }

    .main-dashboard-sec .left-menu-dash ul li.gest-active {
        background-color: #c09d2a29;
    }



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

    .export-hover-ul {
        position: absolute;
        display: none !important;
        transition: .3s;
        background: #E0E0E0;
        width: 180px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 10px;
        top: 50px;
        border-radius: 20px;
    }

    .export-hover:hover .export-hover-ul {
        display: block !important;
    }

    .export-hover-ul li {
        width: 100%;
        background: transparent;
    }

    .export-hover-ul li button {
        background: transparent;
        width: 100%;
        margin: 5px 0;
        text-align: left;
        padding: 4px 8px;
        border: 1px solid #A9967D;
        border-radius: 10px;
        font-size: 14.5px;
        transition: .3s;
    }

    .export-hover-ul li button:hover {
        margin: 0 !important;
        color: white;
        background: #A9967D;
        transition: .3s;
        margin: 5px 0;
    }

    .export-hover-links {
        position: relative;
    }

    .export-hover-links:hover .export-hover-ul {
        display: block;
        transition: .3s;
    }

    .box-styling.event-photos-gallery .two-things-align .two-btn-align {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        column-gap: 10px;
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
    <div class="modifier" id="modifier"
        style="position: fixed !important; bottom: 90px !important; right: 10px !important; border: 2px solid #f90; border-radius: 10px; text-align: center; padding: 5px 10px; background: #fff; z-index: 3000 !important; display:none;">
        <p class="ng-binding mb-3">0 GUEST(S) SELECTED</p>
        <div class="button-group d-flex flex-column" style="gap:0.5rem;" id="modifierButton">
            <button class="edit-btn btn btn-sm btn-orange" data-bs-toggle="modal" data-bs-target="#EditGuest"
                style="display:none;">EDIT</button>
            <button class="btn btn-sm btn-danger delete-btn-single" data-bs-toggle="modal" data-bs-target="#delguestModal"
                style="display:none;" onclick="deleteGuest()">DELETE</button>
            <button class="btn btn-sm btn-danger delete-btn-all" data-bs-toggle="modal" data-bs-target="#delAllGuestsModal"
                style="display:none;">DELETE ALL</button>
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#SelectOptionstoDisplay">SEND
                INVITATION</button>
            <button class="btn btn-sm btn-danger decline-btn" data-bs-toggle="modal" data-bs-target="#declineguestModal"
                onclick="declineGuest()" style="display:none;">DECLINE</button>
            <button class="btn btn-sm btn-danger decline-all-btn" style="display:none;" onclick="declineAllGuests()">DECLINE
                ALL</button>
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
                            data-target="#AddGuest">Add Guest </button>
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
                            <div class="export-hover-links">
                                <ul>
                                    <li class="export-hover">
                                        <button type="button" class="btn btn-primary t-btn t-btn-theme" data-toggle="modal"
                                            data-target="#exampleModalCenter04">Export</button>
                                        <ul class="export-hover-ul">
                                            <li>
                                                <button id="exportAllGuest" onclick="exportall(1)">All Guests</button>
                                            </li>
                                            <li>
                                                <button id="exportConfirmedGuest"
                                                    onclick="exportconfirmed('attending')">Confirmed
                                                    Guests</button>
                                            </li>
                                            <li>
                                                <button id="exportDeclinedGuest"
                                                    onclick="exportdeclined('declined')">Declined
                                                    Guests</button>
                                            </li>
                                            <li>
                                                <button id="exportCheckedGuest"
                                                    onclick="exportcheckedin    ('checked-in')">Checked In
                                                    Guests</button>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <button type="button" class="btn btn-primary t-btn t-btn-dark" data-toggle="modal"
                                data-target="#ExportQrModal">Export Invitation QR
                                Code </button>
                            <select onchange="showGuest(this.value)" class="form-select">
                                <option selected value="1">ALL</option>
                                <option value="checked-in">CHECKED-IN</option>
                                <option value="declined">DECLINED</option>
                                <option value="attending">CONFIRMED</option>
                                <option value="not-open">NOT OPEN</option>
                                <option value="opened">OPENED</option>
                                <option value="a-to-z">A to Z</option>
                                <option value="z-to-a">Z to A</option>
                            </select>

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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="AddGuestClose">Cancel</button>
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
                        <h2 class="text-center">Edit Guest</h2>
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
                            <label for="members" id="members_label">Number of members can invite</label>
                            <input type="number" class="form-control" id="edit_members" name="members"
                                placeholder="Enter members
                                ">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="EditGuestClose">Cancel</button>
                    <button type="button" class="btn btn-primary submit-btn" id="submitEditGuestForm">Yes, Manage
                        Now</button>
                </div>
            </div>
        </div>
    </div>

    {{-- For Add Member  --}}
    <div class="modal fade modal-01 add-new-meal" id="AddMember" tabindex="-1" role="dialog"
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
                        <h2 class="text-center">Add Memeber</h2>
                    </div>
                    <!-- Form start -->
                    <form id="AddMemberForm">
                        <!-- Name Input -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="member_name" name="name"
                                placeholder="Enter name">
                        </div>
                        <input type="hidden" value="{{ $eventId }}" name="idevent" id="idevent">
                        <input type="hidden" value="" name="parentidguest" id="parentidguest">
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
                    </form>
                    <!-- Form end -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="AddMemberClose">Cancel</button>
                    <button type="button" class="btn btn-primary submit-btn" id="submitMemberForm">Yes, Manage
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
                        data-target="#">Upload Guest</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade modal-01 modal-02 modal-03" id="ExportQrModal" tabindex="-1" role="dialog"
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
                    <form id="ExportQrForm">
                        <div class="text">
                            <img src="assets/images/circle-check.png" alt="">
                            <h2>Select Date</h2>
                            <span>Select Reserve By date to show your Guests the latest date to respond using the Qr
                                Code.</span>
                            <div class="form-group">
                                <label for="reservationDate">Select Date</label>
                                <input type="date" name="reservationDate" id="reservationDate">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeExportQrFormModal"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" onclick="ExportGuestQr()">Save
                        Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Select Option To Display when click send invitation --}}
    <div class="modal fade modal-01 modal-02 modal-03" id="SelectOptionstoDisplay" tabindex="-1" role="dialog"
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
                    <form id="DisplaySaveOptionForm">
                        <div class="text">
                            <img src="assets/images/circle-check.png" alt="">
                            <h2>Select Options to Send Invitation</h2>
                            <div class="form-group">
                                <label for="gift-suggestion">Gift Suggestions</label>
                                <input type="checkbox" name="gift-suggestion" id="gift-suggestion">
                            </div>
                            <div class="form-group">
                                <label for="at-reception-check-in">At the Reception Check-In</label>
                                <input type="checkbox" name="at-reception-check-in" id="at-reception-check-in">
                            </div>
                            <div class="form-group">
                                <label for="upload-your-photo">Upload your Photos</label>
                                <input type="checkbox" name="upload-your-photo" id="upload-your-photo">
                            </div>
                            <div class="form-group">
                                <label for="go-to-the-website">Go to the website</label>
                                <input type="checkbox" name="go-to-the-website" id="go-to-the-website">
                            </div>
                            <div class="form-group">
                                <label for="learn-how-RSVP-works">Learn How RSVP Works</label>
                                <input type="checkbox" name="learn-how-RSVP-works" id="learn-how-RSVP-works">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeDispalyModal"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" id="save-option"
                        onclick="DisplayOptionSave()" data-toggle="modal" data-target="#SendInvitation">Save
                        Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Select Option Send Invitation  Email Whatsapp SMS --}}
    <div class="modal fade modal-01 modal-02 modal-03" id="SendInvitation" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="SendInvitationForm">
                        <div class="text">
                            <img src="assets/images/circle-check.png" alt="">
                            <h2>Select Options to Display</h2>
                            <div class="form-group">
                                <label for="emailCheck">Email</label>
                                <input type="checkbox" name="emailCheck" id="emailCheck">
                            </div>
                            <div class="form-group">
                                <label for="smsCheck">SMS</label>
                                <input type="checkbox" name="smsCheck" id="smsCheck">
                            </div>
                            <div class="form-group">
                                <label for="whatsappCheck">Whatsapp</label>
                                <input type="checkbox" name="whatsappCheck" id="whatsappCheck">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="closeSendInvitationForm">Close</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" id="save-option"
                        onclick="SendInvitation()">Save Changes</button>
                    </form>
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
            showGuest("1");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // add Guest
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
                            $('#AddGuestClose').click();
                            showGuest("1");
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


            // Add Member
            $(document).on('click', '#addMember', function() {
                // Capture the parent guest ID from the button data attribute
                var parentIdGuest = $(this).data('parentidguest-id');

                // Open the modal (if you're showing the modal for adding members)
                var myModal = new bootstrap.Modal(document.getElementById('AddGuest'));
                myModal.hide(); // You should show the modal here

                // Set the parent guest ID in a hidden field in the form
                $('#parentidguest').val(parentIdGuest);
                // Log the parent ID to verify it's working
                // Member form submission
                $('#submitMemberForm').on('click', function(e) {
                    var mealId = $('#idevent').val();
                    e.preventDefault();

                    // Get the form data
                    var formData = $('#AddMemberForm').serialize();

                    // Perform the AJAX request
                    $.ajax({
                        url: "{{ route('panel.event.guests-list.store', '') }}/" + mealId,
                        type: 'POST',
                        data: formData,
                        parentIdGuest,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                toastr.success('Member added successfully!');
                                $('#AddMemberForm')[0].reset();
                                $('#AddMemberClose')
                                    .click(); // Close the modal after success
                                showGuest("1"); // Refresh the guest list
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
        });

        function showGuest(filter) {
            var mealId = $('#idevent').val();
            $.ajax({
                url: "{{ route('panel.event.guests-list.show', '') }}/" + mealId + "&filter=" + filter,
                type: "POST",
                dataType: "json",
                data: {
                    filter: filter,
                    _token: "{{ csrf_token() }}" // Ensure CSRF token is included
                },
                success: function(response) {
                    var guests = response.guests;
                    // Clear the existing accordions
                    $('#GuestList').empty();

                    if (filter == 1) {
                        $('#GuestList').empty();
                        guests.forEach(function(guest) {
                            // ALL GUESTS
                            var accordion = `
                        <div class="accordion">
                            <div class="table-box">
                                <table>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton(event)">
                                            ${guest.titleGuest == null ? ' ' : guest.titleGuest} ${guest.name}

                                            <span class="${guest.checkin == 0 ? 'd-none' : ''}">
                                                <br>${guest.whatsapp} <br>${guest.phone}<br>${guest.email} <br>${guest.members_number} Members Left<br>Table: ${(guest.id_table !== 0 && guest.id_table !== null) ? guest.table.name : 'N/A'}
                                            </span>
                                        </td>
                                        <td>Meal: ${guest.meal ? guest.meal.name : 'N/A'}</td>
                                        <td>Allergies: ${guest.allergies ? guest.allergies : 'N/A'}</td>
                                        <td>${guest.notes || 'No Notes'}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary t-btn t-btn-theme" id="addMember" data-toggle="modal"
                                            data-target="#AddMember" data-parentidguest-id="${guest.id_guest}">Add Members</button>
                                        </td>
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
                                        <td><input type="checkbox" class="check_box_style" data-guest-id="${member.id_guest}" onclick="showButton(event)">${member.titleGuest == null ? ' ' : member.titleGuest} ${member.name}</td>
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

                            // ALL GUESTS
                            $('#GuestList').append(accordion); // Append each accordion to the list
                        });
                    }
                    // Re-apply the accordion toggle functionality after adding new elements
                    accordionFunctionality();
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred while fetching guests:", error);
                }

            });
        }

        function exportall(filter) {
            if (filter == 1) {
                var currentDate = new Date();
                var formattedDate = currentDate.toISOString().slice(0, 10); // Format: YYYY-MM-DD
                var filename = `all_guest_list_${formattedDate}.csv`;

                var csvContent = "ID,TITLE,NAME,FAMILY NAME,EMAIL,PHONE,WHATSAPP,MEAL,TABLE,STATUS\n";
                var mealId = $('#idevent').val();

                $.ajax({
                    url: "{{ route('panel.event.guests-list.show', '') }}/" + mealId,
                    type: "POST",
                    dataType: "json",
                    data: {
                        filter: filter,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log("Response received:", response);
                        if (!response.guests) {
                            console.error("No 'guests' data found in response.");
                            return;
                        }

                        var guests = response.guests;
                        guests.forEach(function(guest) {
                            var status;
                            var mealName;
                            var title;
                            var table;
                            var nameParts = guest.name ? guest.name.split(" ") : [];
                            var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
                            var name = nameParts.join(" ") || "-";

                            if (guest.opened == 2) status = "Confirmed";
                            else if (guest.declined == 1) status = "Declined";
                            else if (guest.checkin == 1) status = "Checked-in";
                            else status = "-";
                            table = guest.table ? guest.table.number : "-";
                            mealName = guest.meal ? guest.meal.name : "-";
                            title = guest.titleGuest ? guest.titleGuest : "-";

                            csvContent +=
                                `${guest.id_guest},${title ?? "-"},${name ?? "-"},${familyName},${guest.email ?? "-"},${guest.phone ?? "-"},${guest.whatsapp ?? "-"},${mealName},${table},${status}\n`;

                            if (guest.members && guest.members.length > 0) {
                                csvContent += "MEMBER, , , , , \n";
                                guest.members.forEach(function(member) {
                                    var status;
                                    var mealName;
                                    var table;
                                    var nameParts = member.name ? member.name.split(" ") : [];
                                    var familyName = nameParts.length > 1 ? nameParts.pop() :
                                        "-";
                                    var name = nameParts.join(" ") || "-";

                                    if (member.opened == 2) status = "Confirmed";
                                    else if (member.declined == 1) status = "Declined";
                                    else if (member.checkin == 1) status = "Checked-in";
                                    else status = "-";
                                    table = member.table ? member.table.number : "-";
                                    mealName = member.meal ? member.meal.name : "-";
                                    csvContent +=
                                        `${member.id_guest},${"-"},${name ?? "-"},${familyName ?? "-"},${member.email ?? "-"},${member.phone ?? "-"},${member.whatsapp ?? "-"},${mealName},${table},${status}\n`;
                                });
                            }
                            csvContent += "GUEST, , , , , \n";
                        });

                        var blob = new Blob([csvContent], {
                            type: 'text/csv;charset=utf-8;'
                        });
                        var url = URL.createObjectURL(blob);
                        var link = document.createElement("a");
                        link.setAttribute("href", url);
                        link.setAttribute("download", filename);
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        URL.revokeObjectURL(url);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:");
                    }
                });
            }
        }

        function exportconfirmed(filter) {
            if (filter == "attending") {
                showGuest(filter);
                var currentDate = new Date();
                var formattedDate = currentDate.toISOString().slice(0, 10); // Format: YYYY-MM-DD
                var filename = `confirmed_guest_list_${formattedDate}.csv`;
                var csvContent = "ID,TITLE,NAME,FAMILY NAME,EMAIL,PHONE,WHATSAPP,MEAL,TABLE,STATUS\n";
                var mealId = $('#idevent').val();

                $.ajax({
                    url: "{{ route('panel.event.guests-list.show', '') }}/" + mealId,
                    type: "POST",
                    dataType: "json",
                    data: {
                        filter: filter,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        var guests = response.guests;

                        setTimeout(function() { // Wrap entire CSV generation in setTimeout
                            guests.forEach(function(guest) {
                                if ((guest.checkin == 1 && guest.declined == null && (guest
                                        .id_meal != null || guest.opened == 2)) ||
                                    ((guest.opened == 2 || guest.id_meal != null) && guest
                                        .declined == null)) {

                                    var status = "Confirmed";
                                    var mealName = guest.meal ? guest.meal.name : "-";
                                    var title = guest.titleGuest ? guest.titleGuest : "-";
                                    var table = guest.table ? guest.table.number : "-";
                                    var nameParts = guest.name ? guest.name.split(" ") : [];
                                    var familyName = nameParts.length > 1 ? nameParts.pop() :
                                        "-";
                                    var name = nameParts.join(" ") || "-";

                                    csvContent +=
                                        `${guest.id_guest},${title ?? "-"},${name ?? "-"},${familyName ?? "-"},${guest.email ? guest.email : "-"},${guest.phone ? guest.phone : "-"},${guest.whatsapp ? guest.whatsapp : "-"},${mealName},${table},${status}\n`;
                                }

                                if (guest.members && guest.members.length > 0) {
                                    csvContent += "MEMBER, , , , , \n";
                                    guest.members.forEach(function(member) {
                                        if ((member.checkin == 1 && member.declined ==
                                                null && (member.id_meal != null ||
                                                    member.opened == 2)) ||
                                            ((member.opened == 2 || member.id_meal !=
                                                null) && member.declined == null)) {

                                            var status = "Confirmed";
                                            var mealName = member.meal ? member.meal
                                                .name : "-";
                                            var table = member.table ? member.table
                                                .number : "-";
                                            var nameParts = member.name ? member.name
                                                .split(" ") : [];
                                            var familyName = nameParts.length > 1 ?
                                                nameParts.pop() : "-";
                                            var name = nameParts.join(" ") || "-";

                                            csvContent +=
                                                `${member.id_guest},${"-"},${name ?? "-"},${familyName ?? "-"},${member.email ? member.email : "-"},${member.phone ? member.phone : "-"},${member.whatsapp ? member.whatsapp : "-"},${mealName},${table},${status}\n`;
                                        }
                                    });
                                }
                                csvContent += "GUEST, , , , , \n";
                            });

                            // Create and download the CSV file
                            var blob = new Blob([csvContent], {
                                type: 'text/csv;charset=utf-8;'
                            });
                            var url = URL.createObjectURL(blob);
                            var link = document.createElement("a");
                            link.setAttribute("href", url);
                            link.setAttribute("download", filename);
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                            URL.revokeObjectURL(url);

                        }, 1000); // end of setTimeout
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", error);
                    }
                });
            }
        }

        function exportdeclined(filter) {
            if (filter === "declined") {
                showGuest(filter);
                var currentDate = new Date();
                var formattedDate = currentDate.toISOString().slice(0, 10); // Format: YYYY-MM-DD
                var filename = `declined_guest_list_${formattedDate}.csv`;
                var csvContent = "ID,TITLE,NAME,FAMILY NAME,EMAIL,PHONE,WHATSAPP,MEAL,TABLE,STATUS\n";
                var mealId = $('#idevent').val();

                $.ajax({
                    url: "{{ route('panel.event.guests-list.show', '') }}/" + mealId,
                    type: "POST",
                    dataType: "json",
                    data: {
                        filter: filter,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        var guests = response.guests;

                        setTimeout(function() {
                            guests.forEach(function(guest) {
                                var mealName = guest.meal ? guest.meal.name : "-";
                                var title = guest.titleGuest ? guest.titleGuest : "-";
                                var table = guest.table ? guest.table.number : "-";
                                var nameParts = guest.name ? guest.name.split(" ") : [];
                                var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
                                var name = nameParts.join(" ") || "-";

                                if (guest.declined === 1) {
                                    var status = "Declined";
                                    csvContent +=
                                        `${guest.id_guest},${title},${name},${familyName},${guest.email || "-"},${guest.phone || "-"},${guest.whatsapp || "-"},${mealName},${table},${status}\n`;
                                }

                                guest.members.forEach(function(member) {
                                    if (member.declined === 1) {
                                        var memberMealName = member.meal ? member.meal
                                            .name : "-";
                                        var memberTable = member.table ? member.table
                                            .number : "-";
                                        var memberNameParts = member.name ? member.name
                                            .split(" ") : [];
                                        var memberFamilyName = memberNameParts.length >
                                            1 ? memberNameParts.pop() : "-";
                                        var memberName = memberNameParts.join(" ") ||
                                            "-";
                                        var memberStatus = "-";

                                        if (member.opened === 2) memberStatus =
                                            "Confirmed";
                                        else if (member.declined === 1) memberStatus =
                                            "Declined";
                                        else if (member.checkin === 1) memberStatus =
                                            "Checked-in";

                                        csvContent +=
                                            `${member.id_guest},- ,${memberName},${memberFamilyName},${member.email || "-"},${member.phone || "-"},${member.whatsapp || "-"},${memberMealName},${memberTable},${memberStatus}\n`;
                                    }
                                });
                            });

                            var blob = new Blob([csvContent], {
                                type: 'text/csv;charset=utf-8;'
                            });
                            var url = URL.createObjectURL(blob);
                            var link = document.createElement("a");
                            link.setAttribute("href", url);
                            link.setAttribute("download", filename);
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                            URL.revokeObjectURL(url);
                        }, 1000);


                    }
                });
            }
        }

        function exportcheckedin(filter) {
            if (filter === "checked-in") {
                var currentDate = new Date();
                var formattedDate = currentDate.toISOString().slice(0, 10); // Format: YYYY-MM-DD
                var filename = `checkedin_guest_list_${formattedDate}.csv`;
                var csvContent = "ID,TITLE,NAME,FAMILY NAME,EMAIL,PHONE,WHATSAPP,MEAL,TABLE,STATUS\n";
                var mealId = $('#idevent').val();

                $.ajax({
                    url: "{{ route('panel.event.guests-list.show', '') }}/" + mealId,
                    type: "POST",
                    dataType: "json",
                    data: {
                        filter: filter,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        var guests = response.guests;

                        // Process the guests
                        guests.forEach(function(guest) {
                            var mealName = guest.meal ? guest.meal.name : "-";
                            var title = guest.titleGuest ? guest.titleGuest : "-";
                            var table = guest.table ? guest.table.number : "-";
                            var nameParts = guest.name ? guest.name.split(" ") : [];
                            var familyName = nameParts.length > 1 ? nameParts.pop() : "-";
                            var name = nameParts.join(" ") || "-";

                            if (guest.checkin == 1) {
                                var status = 'Checked-in';
                                csvContent +=
                                    `${guest.id_guest},${title ?? "-"},${name ?? "-"},${familyName ?? "-"},${guest.email ? guest.email : "-"},${guest.phone ? guest.phone : "-"},${guest.whatsapp ? guest.whatsapp : "-"},${mealName},${table},${status}\n`;
                            }

                            if (guest.members && guest.members.length > 0) {
                                guest.members.forEach(function(member) {
                                    var mealName = member.meal ? member.meal.name : "-";
                                    var table = member.table ? member.table.number : "-";
                                    var nameParts = member.name ? member.name.split(" ") : [];
                                    var familyName = nameParts.length > 1 ? nameParts.pop() :
                                        "-";
                                    var name = nameParts.join(" ") || "-";

                                    if (member.checkin === 1) {
                                        var status = 'Checked-in';
                                        csvContent +=
                                            `${member.id_guest},${"-"},${name ?? "-"},${familyName ?? "-"},${member.email},${member.phone},${member.whatsapp},${mealName},${table},${status}\n`;
                                    }
                                });
                            }
                        });

                        // Create the CSV file and trigger download
                        var blob = new Blob([csvContent], {
                            type: 'text/csv;charset=utf-8;'
                        });
                        var url = URL.createObjectURL(blob);
                        var link = document.createElement("a");
                        link.setAttribute("href", url);
                        link.setAttribute("download", filename);
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        URL.revokeObjectURL(url);

                        // Refresh the guest list if needed
                        $scope.guestlist();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching guests:", error);
                        // Handle error if needed
                    }
                });
            }
        }


        $('#submitEditGuestForm').click(function(e) {
            e.preventDefault();
            var guestId = $(this).data('id');
            var formData = $('#EditguestForm')
                .serialize(); // Serialize form data

            $.ajax({
                url: "{{ route('panel.event.guests.update', ':id') }}"
                    .replace(':id', guestId),
                type: "POST",
                data: formData,
                success: function(response) {
                    // Optionally reload guest list
                    showGuest("1");
                    toastr.success(
                        'Guest updated successfully');
                    $('#EditGuestClose').click();
                    $('#modifier').css('display', 'none');
                    $('#modifierButton').css('display', 'none');

                    // Uncheck the checkbox
                    if (clickedCheckbox) {
                        clickedCheckbox.checked =
                            false; // Uncheck the checkbox
                    }
                },
                error: function(xhr) {
                    alert('Something went wrong: ' + xhr
                        .responseText);
                }
            });
        });



        // Show Import Guest Using Modal

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
                        if (Array.isArray(guest.guests) && guest
                            .guests.length >
                            0) {
                            guest.guests.forEach(function(
                                nestedGuest, index) {
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
                            guestSection +=
                                '<p>No additional guests found.</p>';
                        }

                        guestSection += '</div></div>';
                        $('#guestListItems').append(
                            guestSection);
                    });
                } else {
                    $('#guestListItems').append(
                        '<p>No guests found for this event.</p>');
                }
            },
            error: function(err) {
                console.error('Error fetching guest data:', err);
            }
        });

        // Upload Guest from other event
        // Handle the "Upload Guest" button click
        $(".submit-btn").on("click", function() {
            var selectedGuests = [];

            // Get all checked guests
            $(".guest-checkbox:checked").each(function() {
                var guestData = $(this).data('guest');
                guestData.selected =
                    1; // Mark the guest as selected
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
                        showGuest("1");
                        $('#GuestImportForm')[0].reset();
                        $('#exampleModalCenter02').click();
                        toastr.success(
                            "Guests imported successfully");
                    },
                    error: function(err) {
                        console.error('Error importing guests:',
                            err);
                    }
                });
            } else {
                // alert('Please select at least one guest to import.');
            }
        });


        function showFileName() {
            const fileInput = document.getElementById('fileInput');
            const fileNameDiv = document.getElementById('fileName');
            const fileName = fileInput.files[0].name;
            fileNameDiv.textContent = fileName;
        }
        document.getElementById('uploadCsvBtn').addEventListener('click',
            function() {
                const formData = new FormData(document.getElementById(
                    'csvUploadForm'));

                $.ajax({
                    url: "{{ route('panel.event.importFromCsvGuest', ['id' => $eventId]) }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showGuest("1");
                        toastr.success(
                            "Guests imported successfully!");
                        idArray = [];
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        // console.log(xhr.responseText);
                        alert("Error uploading the file.");
                    }
                });
            });


        let idArray = []; // Store selected guest IDs
        var clickedCheckbox = '';


        function showButton(event) {
            var clickedCheckbox = event.target;
            let selectedID = clickedCheckbox.getAttribute('data-guest-id');
            const modifierDiv = document.querySelector(".modifier");

            // Add or remove the guest ID from the array based on the checkbox state
            if (clickedCheckbox.checked && selectedID) {
                if (!idArray.includes(selectedID)) {
                    idArray.push(selectedID); // Add selected guest ID to array
                }
            } else {
                idArray = idArray.filter(id => id !==
                    selectedID); // Remove unchecked guest ID from array
            }

            // Show or hide modifier buttons based on selections
            if (idArray.length > 0) {
                modifierDiv.style.display = "block"; // Show the buttons
            } else {
                modifierDiv.style.display = "none"; // Hide the buttons
            }

            // Show or hide buttons based on the number of selected guests
            const editButton = document.querySelector('.edit-btn');
            const deleteButtonSingle = document.querySelector('.delete-btn-single');
            const deleteButtonAll = document.querySelector('.delete-btn-all');
            const declineButton = document.querySelector('.decline-btn');
            const declineAllButton = document.querySelector('.decline-all-btn');

            if (idArray.length === 1) {
                editButton.style.display = "block";
                deleteButtonSingle.style.display = "block";
                deleteButtonAll.style.display =
                    "none"; // Hide Delete All when only one guest is selected
                declineButton.style.display =
                    "block"; // Show Decline button for one guest
                declineAllButton.style.display = "none"; // Hide Decline All
            } else if (idArray.length > 1) {
                editButton.style.display =
                    "none"; // Hide Edit button for multiple selections
                deleteButtonSingle.style.display =
                    "none"; // Hide single Delete button
                deleteButtonAll.style.display = "block"; // Show Delete All button
                declineButton.style.display = "none"; // Hide Decline button
                declineAllButton.style.display = "block"; // Show Decline All button
            }

            // Update the selected count display
            const countDisplay = modifierDiv.querySelector('p');
            countDisplay.textContent = `${idArray.length} GUEST(S) SELECTED`;
        }

        // Decline all selected guests
        function declineAllGuests() {
            if (idArray.length > 1) {
                $.ajax({
                    url: "{{ route('panel.event.declineguest', ['id' => $eventId]) }}", // Your route for declining all
                    type: "POST",
                    data: {
                        guestIds: idArray,
                        idevent: "{{ $eventId }}",
                        _token: "{{ csrf_token() }}" // Ensure CSRF token is included
                    },
                    success: function(response) {
                        showGuest("1"); // Reload the guest list
                        toastr.success(
                            'Selected guests declined successfully');
                        $('#modifier').css('display',
                            'none'); // Hide modifier section
                        idArray = []; // Reset the selected guests array
                        $('.decline-all-btn')
                            .hide(); // Hide Decline All button
                    },
                    error: function(xhr) {
                        alert('Something went wrong: ' + xhr
                            .responseText);
                    }
                });
            }
        }

        // Decline all selected guests
        function declineGuest() {
            if (idArray.length === 1) {
                $.ajax({
                    url: "{{ route('panel.event.declineguest', ['id' => $eventId]) }}", // Use the same route for multiple declines
                    type: "POST",
                    data: {
                        guestid: idArray[0], // Send a single guest ID
                        idevent: "{{ $eventId }}", // Include event ID
                        _token: "{{ csrf_token() }}" // Ensure CSRF token is included
                    },
                    success: function(response) {
                        showGuest("1"); // Reload the guest list
                        toastr.success('Guests declined successfully');
                        $('#modifier').css('display',
                            'none'); // Hide modifier section
                        idArray = []; // Reset the selected guests array
                        $('.delete-btn-all')
                            .hide(); // Hide delete all button
                    },
                    error: function(xhr) {
                        alert('Something went wrong: ' + xhr
                            .responseText);
                    }
                });
            }
        }

        $(document).on('change', '.guest-checkbox', function() {
            const guestId = $(this).val();

            // Add or remove guest ID from the array based on checkbox state
            if ($(this).is(':checked')) {
                idArray.push(guestId);
            } else {
                idArray = idArray.filter(id => id !== guestId);
            }

            // Show "delete all" button if multiple guests are selected
            if (idArray.length > 1) {
                $('.delete-btn').hide(); // Hide single delete button
                $('.delete-btn-all').show(); // Show delete all button
            } else if (idArray.length === 1) {
                $('.delete-btn').show(); // Show single delete button
                $('.delete-btn-all').hide(); // Hide delete all button
            } else {
                $('.delete-btn')
                    .hide(); // Hide both buttons if nothing is selected
                $('.delete-btn-all').hide();
            }
        });

        // Single delete button for one guest
        function deleteGuest() {
            if (idArray.length === 1) {
                $.ajax({
                    url: "{{ route('panel.event.deleteGuest', ['id' => $eventId]) }}", // Your route for deletion
                    type: "POST",
                    data: {
                        guestid: idArray[0], // Send a single guest ID
                        idevent: "{{ $eventId }}", // Include event ID
                        _token: "{{ csrf_token() }}" // Ensure CSRF token is included
                    },
                    success: function(response) {
                        showGuest("1"); // Reload the guest list
                        toastr.success('Guest deleted successfully');
                        $('#modifier').css('display',
                            'none'); // Hide modifier section
                        idArray = []; // Reset the selected guests array
                        $('.delete-btn').hide(); // Hide delete button
                    },
                    error: function(xhr) {
                        alert('Something went wrong: ' + xhr
                            .responseText);
                    }
                });
            }
        }

        // Delete all button for multiple guests
        $(document).on('click', '.delete-btn-all', function() {
            if (idArray.length > 1) {
                $.ajax({
                    url: "{{ route('panel.event.deleteGuest', ['id' => $eventId]) }}", // Your route for deletion
                    type: "POST",
                    data: {
                        guestIds: idArray, // Send array of guest IDs
                        idevent: "{{ $eventId }}", // Include event ID
                        _token: "{{ csrf_token() }}" // Ensure CSRF token is included
                    },
                    success: function(response) {
                        showGuest("1"); // Reload the guest list
                        toastr.success(
                            'Guests deleted successfully');
                        $('#modifier').css('display',
                            'none'); // Hide modifier section
                        idArray
                            = []; // Reset the selected guests array
                        $('.delete-btn-all')
                            .hide(); // Hide delete all button
                    },
                    error: function(xhr) {
                        alert('Something went wrong: ' + xhr
                            .responseText);
                    }
                });
            }
        });

        // Edit button event: Open modal with selected guest data (if one guest is selected)
        $(document).on('click', '.edit-btn', function() {
            if (idArray.length === 1) {
                const guestId = idArray[
                    0]; // Only the single selected ID is used for editing

                // Fetch and populate modal with guest data
                $.ajax({
                    url: "{{ route('panel.event.guests.edit', ':id') }}"
                        .replace(':id',
                            guestId),
                    type: "GET",
                    success: function(response) {
                        $('#edit_title').val(response
                            .titleGuest);
                        $('#edit_name').val(response.name);
                        $('#edit_email').val(response.email);
                        $('#edit_phone').val(response.phone);
                        $('#edit_whatsapp').val(response
                            .whatsapp);

                        // Set allergies (radio button)
                        if (response.allergies == 1) {
                            $('#edit_allergiesYes').prop(
                                'checked', true);
                        } else {
                            $('#edit_allergiesNo').prop(
                                'checked', true);
                        }

                        // Set meal
                        $('#edit_meal').val(response.id_meal);
                        if (response.allergies == 0) {
                            $('#edit_members').hide();
                            $('#members_label').hide();
                        } else {
                            $('#edit_members').val(response
                                .members_number);
                        }
                        $('#edit_notes').val(response.notes);

                        // Set confirm (radio button)
                        if (response.opened == 1) {
                            $('#edit_confirmYes').prop(
                                'checked', true);
                        } else {
                            $('#edit_confirmNo').prop('checked',
                                true);
                        }

                        // Store the guest ID in a hidden field (for submission)
                        $('#EditguestForm').find(
                                'input[name="idguest"]')
                            .remove();
                        $('#EditguestForm').append(
                            '<input type="hidden" name="idguest" value="' +
                            response.id_guest + '">');

                        // Open the modal
                        var myModal = new bootstrap.Modal(
                            document.getElementById(
                                'EditGuest'));
                        myModal.show();
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status +
                            error);
                    }
                });
            }
        });


        function DisplayOptionSave() {
            var
                formData = {}; // Initialize an empty object to collect checked options

            // Collect checked options only
            $('#DisplaySaveOptionForm input[type="checkbox"]:checked').each(
                function() {
                    formData[$(this).attr('name')] =
                        1; // Set the value to 1 if checked
                });

            var dataToSend = {
                idevent: "{{ $eventId }}", // Include event ID
                _token: "{{ csrf_token() }}", // Ensure CSRF token is included
                formData: formData,
                email: formData['emailCheck'] ||
                    false, // Set to false if not checked
                sms: formData['smsCheck'] ||
                    false, // Set to false if not checked
                whatsapp: formData['whatsappcheck'] || false
                // Send the checked form options
            };

            if (idArray.length === 1) {
                dataToSend.guestid = idArray[0]; // Send a single guest ID
            } else {
                dataToSend.guestIds = idArray; // Send multiple guest IDs
            }

            $.ajax({
                url: "{{ route('panel.event.saveOptions', ['id' => $eventId]) }}", // Use the route for saving options
                type: "POST",
                data: dataToSend,
                success: function(response) {
                    showGuest("1"); // Reload the guest list
                    toastr.success('Display Options Saved');
                    $('#DisplaySaveOptionForm')[0].reset();
                    $('#modifier').css('display',
                        'none'); // Hide modifier section
                    $('.delete-btn-all')
                        .hide(); // Hide delete all button
                    $("#closeDispalyModal").click();
                },
                error: function(xhr) {
                    alert('Something went wrong: ' + xhr.responseText);
                }
            });
        }

        // save invitaion
        function SendInvitation() {
            var
                formData = {}; // Initialize an empty object to collect checked options
            // Collect checked options only
            $('#SendInvitationForm input[type="checkbox"]:checked').each(
                function() {
                    formData[$(this).attr('name')] =
                        1; // Set the value to 1 if checked
                });


            // Preparing data to send to the backend
            var dataToSend = {
                idevent: "{{ $eventId }}", // Include the event ID
                _token: "{{ csrf_token() }}", // Ensure CSRF token is included
                formData: formData // Send the checked form options
            };

            // Conditionally send single or multiple guest IDs
            if (idArray.length === 1) {
                dataToSend.guestid = idArray[0]; // Send a single guest ID
            } else {
                dataToSend.guestIds = idArray; // Send multiple guest IDs
            }

            // Send data using AJAX
            $.ajax({
                url: "{{ route('panel.event.sendinvitations', ['id' => $eventId]) }}", // Replace with your route URL
                method: 'POST',
                data: dataToSend,
                success: function(response) {
                    showGuest(
                        "1"); // This function reloads the guest list or does a follow-up action
                    toastr.success('Invitations sent successfully');
                    $('#SendInvitationForm')[0]
                        .reset(); // Reset the form after success
                    $("#closeSendInvitationForm").click();
                    idArray
                        = []; // Close the modal (assuming this button closes it)
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert(
                        'An error occurred while sending invitations');
                }
            });
        }



        function ExportGuestQr() {
            // Get values directly from form inputs
            const mealId = $('#idevent').val();
            const date = $('#reservationDate').val();

            // Define the URL with query parameters
            const url = `/event/${mealId}/get-guests-qr/${date}?idevent=${mealId}&reservationDate=${date}`;

            // Send data with GET request using $.ajax
            $.ajax({
                url: url,
                method: 'GET',
                dataType: "json",
                success: function(response) {
                    toastr.success('Export QR Successful');
                    $('#ExportQrForm')[0].reset(); // Reset the form after success
                    $("#closeExportQrFormModal").click();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('An error');
                }
            });
        }

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
    </script>
@endsection
