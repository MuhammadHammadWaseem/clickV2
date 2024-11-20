@extends('Panel.Layout.master')
<style>
    #exampleModalCenter03 .modal-footer {
        display: flex;
        align-items: center !important;
        justify-content: center !important;
        padding: 20px 5px !important;
    }

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
        column-gap: 10px;
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

    .gest-active::after {
        width: 5px;
        height: 100%;
        background-color: #C09D2A;
        position: absolute;
        left: 0;
        right: 0;
        content: "";
        top: 0;
    }

    .gest-active a {
        color: #C09D2A !important;
    }

    .gest-active img {
        filter: none !important;
    }

    .gest-active {
        background-color: #c09d2a29 !important;
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
        transition: 1.3s;
        background: #E0E0E0;
        width: 180px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 10px;
        top: 43px;
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


    .upload-form-csv .modal-body form label {
        width: 100%;
        height: 200px;
        border: 5px dashed #A9967D;
        border-radius: 10px;
        display: flex;
        padding: 50px 60px;
    }

    .upload-form-csv .modal-body form input {
        display: none !important;
    }
    p#guestMemberTotal {
    text-align: end;
    color: #A9967D;
    font-weight: 600;
}

.box-styling.quick-actions .three-btns-align {
    display: flex;
    column-gap: 20px;
    flex-wrap: wrap;
    row-gap: 10px;
}

.col-12.col-md-12.text-center.d-flex.align-items-center.justify-content-center.flex-wrap.flex-d-md-row p {
    font-weight: 600;
}


form#guestForm {
    height: 500px;
    overflow: scroll;
    overflow-x: hidden;
    padding-right:5px;
}

form#guestForm::-webkit-scrollbar{
    width: 5px;

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
            overflow-y: hidden;
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

        .box-styling.quick-actions .three-btns-align {
    flex-direction: column;
}

.box-styling.event-photos-gallery .two-things-align {
    row-gap: 10px;
}

p#guestMemberTotal {
    text-align: center;
    color: #A9967D;
    font-weight: 600;
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

        .col-12.col-md-12.text-center.d-flex.align-items-center.justify-content-center.flex-wrap.flex-d-md-row p {
    font-weight: 600;
    width: 50%;
    padding: 10px !important;
}

.col-12.col-md-12.text-center.d-flex.align-items-center.justify-content-center.flex-wrap.flex-d-md-row {
    margin: 10px 0;
}

.box-styling.event-photos-gallery .two-things-align {
    display: flex;
    justify-content: space-between;
    flex-direction: column;
}

.box-styling.event-photos-gallery.events-lists-sec-01.guest-list .two-btn-align {
        flex-wrap: wrap;
        row-gap: 10px;
        column-gap: 10px;
        display: flex;
        align-items: stretch !important;
        justify-content: flex-start;
        flex-direction: column !important;
        width: 100%;
    }

        /* .modifier {

        } */
    }

    @media only screen and (max-width: 575px) {

        .col-12.col-md-12.text-center.d-flex.align-items-center.justify-content-center.flex-wrap.flex-d-md-row p {
        font-weight: 600;
        width: 100%;
    }
    .t-btn{
        font-size: 14px !important;
    }

    p {
    font-size: 14px;
}
    }
</style>
@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $eventId = GeneralHelper::getEventId();
    @endphp
    <div class="modifier" id="modifier"
        style="position: fixed !important; bottom: 90px !important; right: 10px !important; border: 2px solid #f90; border-radius: 10px; text-align: center; padding: 5px 10px; background: #fff; z-index: 3000 !important; display:none;">
        <p class="ng-binding mb-3">{{ __('guestlistpage.0_guests_selected') }}</p>
        <div class="button-group d-flex flex-column" style="gap:0.5rem;" id="modifierButton">
            <button class="edit-btn btn btn-sm btn-orange" data-bs-toggle="modal" data-bs-target="#EditGuest"
                style="display:none;">{{ __('guestlistpage.EDIT') }}</button>
            <!-- Delete Button -->
            <button class="btn btn-sm btn-danger delete-btn-single" data-bs-toggle="modal" data-bs-target="#delguestModal"
                style="display:none;" onclick="showDeleteModal(idArray[0])">{{ __('guestlistpage.DELETE') }}</button>
            <button class="btn btn-sm btn-danger delete-btn-all" data-bs-toggle="modal" data-bs-target="#delAllGuestsModal"
                style="display:none;">{{ __('guestlistpage.DELETE ALL') }}</button>
            <button class="btn btn-sm btn-primary" data-toggle="modal"
                data-target="#SelectOptionstoDisplay">{{ __('guestlistpage.send_invitation') }}</button>
            <button class="btn btn-sm btn-danger decline-btn" data-bs-toggle="modal" data-bs-target="#declineguestModal"
                onclick="declineGuest()" style="display:none;">{{ __('guestlistpage.DECLINE') }}</button>
            <button class="btn btn-sm btn-danger decline-all-btn" style="display:none;"
                onclick="declineAllGuests()">{{ __('guestlistpage.DECLINE_ALL') }}</button>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#undeclineguestModal"
                style="display: none;">{{ __('guestlistpage.UNDECLINE') }}</button>
        </div>
    </div>


    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling guest-list">
                    <div class="text">
                        <h2>{{ __('guestlistpage.guest_list') }}</h2>

                    </div>
                    <div class="guest-listings">
                        <ul>
                            <li>
                                <img src="{{ asset('assets/Panel/images/sent-right.png') }}" alt="">
                                <p>{{ __('guestlistpage.limit_guests_description') }}</p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/Panel/images/sent-right.png') }}" alt="">
                                <p>{{ __('guestlistpage.confirmed_guests') }}</p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/Panel/images/sent-right.png') }}" alt="">
                                <p>{{ __('guestlistpage.total_members_added') }}</p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/Panel/images/sent-right.png') }}" alt="">
                                <p>{{ __('guestlistpage.resend_invitation') }}</p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/Panel/images/sent-right.png') }}" alt="">
                                <p>{{ __('guestlistpage.guest_checked_in') }}</p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/Panel/images/sent-right.png') }}" alt="">
                                <p>{{ __('guestlistpage.guest_declined') }}</p>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">

                <div class="box-styling quick-actions">
                    <div class="row">
                        <div class="col-12 text-end totals">
                            <p id="guestMemberTotal">TOTAL: (guests - members)</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 text-center d-flex align-items-center justify-content-center flex-wrap flex-d-md-row">
                        <p class="checkedincolor p-3" style="font-size:14px; color:rgb(37, 37, 37);" id="totalCheckIn">
                            <i class="fa fa-check-square" aria-hidden="true" style="color: rgb(37, 37, 37);"></i> CHECKED-IN
                        </p>
                        <p class="declinedcolor p-3" style="font-size:14px; color:rgb(37, 37, 37);" id="totalDecline">
                            <i class="fas fa-times" style="color: rgb(37, 37, 37);"></i> DECLINED
                        </p>
                        <p class="checkedincolor p-3" style="font-size:14px; color:rgb(37, 37, 37);" id="totalinvite">
                            <i class="fas fa-user" style="color: rgb(37, 37, 37);"></i> INVITED GUEST
                        </p>
                        <p class="checkedincolor p-3" style="font-size:14px; color:rgb(37, 37, 37);" id="inviteMembers">
                            <i class="fas fa-users" style="color: rgb(37, 37, 37);"></i> INVITED MEMBERS
                        </p>
                    </div>
                    <div class="text">
                        <h2>{{ __('guestlistpage.quick_actions') }}</h2>
                    </div>
                    <div class="three-btns-align">
                        <button type="button" class="btn btn-primary t-btn t-btn-theme" data-toggle="modal"
                            data-target="#AddGuest"> {{ __('guestlistpage.add_guest') }} </button>

                        <button type="button" class="btn btn-primary t-btn t-btn-dark" data-toggle="modal"
                            data-target="#exampleModalCenter02">{{ __('guestlistpage.add_from_other_events') }} </button>

                        <button type="button" class="btn btn-primary t-btn t-btn-dark" data-toggle="modal"
                            data-target="#exampleModalCenter03">{{ __('guestlistpage.upload_csv_file') }} </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery events-lists-sec-01 guest-list">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>{{ __('guestlistpage.guest_list') }}</h2>
                            {{-- <p>{{ __('guestlistpage.guest_list_description') }}</p> --}}

                        </div>
                        <div class="two-btn-align">
                            <div class="export-hover-links">
                                <ul>
                                    <li class="export-hover">
                                        <button type="button" class="btn btn-primary t-btn t-btn-theme"
                                            data-toggle="modal"
                                            data-target="#exampleModalCenter04">{{ __('guestlistpage.export') }}</button>
                                        <ul class="export-hover-ul">
                                            <li>
                                                <button id="exportAllGuest"
                                                    onclick="exportall(1)">{{ __('guestlistpage.export_all_guests') }}</button>
                                            </li>
                                            <li>
                                                <button id="exportConfirmedGuest"
                                                    onclick="exportconfirmed('attending')">{{ __('guestlistpage.export_confirmed_guests') }}</button>
                                            </li>
                                            <li>
                                                <button id="exportDeclinedGuest"
                                                    onclick="exportdeclined('declined')">{{ __('guestlistpage.export_declined_guests') }}</button>
                                            </li>
                                            <li>
                                                <button id="exportCheckedGuest"
                                                    onclick="exportcheckedin('checked-in')">{{ __('guestlistpage.export_checked_in_guests') }}</button>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <button type="button" class="btn btn-primary t-btn t-btn-dark" data-toggle="modal"
                                data-target="#ExportQrModal">{{ __('guestlistpage.export_invitation_qr_code') }} </button>
                            <select onchange="showGuest(this.value)" class="form-select">
                                <option selected value="1">{{ __('guestlistpage.all') }}</option>
                                <option value="checked-in">{{ __('guestlistpage.checked_in') }}</option>
                                <option value="declined">{{ __('guestlistpage.declined') }}</option>
                                <option value="attending">{{ __('guestlistpage.confirmed') }}</option>
                                <option value="not-open">{{ __('guestlistpage.not_open') }}</option>
                                <option value="opened">{{ __('guestlistpage.opened') }}</option>
                                <option value="a-to-z">{{ __('guestlistpage.a_to_z') }}</option>
                                <option value="z-to-a">{{ __('guestlistpage.z_to_a') }}</option>
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
                        <h2 class="text-center">{{ __('guestlistpage.new_guest') }}</h2>

                    </div>
                    <!-- Form start -->
                    <form id="guestForm">
                        <!-- Title Select Box -->
                        <div class="form-group">
                            <label for="title">{{ __('guestlistpage.title') }}</label>
                            <select class="form-control" id="title" name="title">
                                <option selected disabled>{{ __('guestlistpage.select_title') }}</option>
                                <option value="Mr.">{{ __('guestlistpage.mr') }}</option>
                                <option value="Mrs.">{{ __('guestlistpage.mrs') }}</option>
                                <option value="Miss">{{ __('guestlistpage.miss') }}</option>
                                <option value="Ms.">{{ __('guestlistpage.ms') }}</option>
                                <option value="Dr.">{{ __('guestlistpage.dr') }}</option>
                                <option value="Prof.">{{ __('guestlistpage.prof') }}</option>
                                <option value="Rev.">{{ __('guestlistpage.rev') }}</option>
                                <option value="Hon.">{{ __('guestlistpage.hon') }}</option>
                                <option value="Sir">{{ __('guestlistpage.sir') }}</option>
                                <option value="Dame">{{ __('guestlistpage.dame') }}</option>
                                <option value="Mr. & Mrs.">{{ __('guestlistpage.mr_and_mrs') }}</option>
                                <option value="Mr. & Family">{{ __('guestlistpage.mr_and_family') }}</option>
                                <option value="Ms. & Family">{{ __('guestlistpage.ms_and_family') }}</option>
                                <option value="Dr. & Mrs.">{{ __('guestlistpage.dr_and_mrs') }}</option>
                                <option value="Capt.">{{ __('guestlistpage.capt') }}</option>
                                <option value="Maj.">{{ __('guestlistpage.maj') }}</option>
                                <option value="Col.">{{ __('guestlistpage.col') }}</option>
                                <option value="Gen.">{{ __('guestlistpage.gen') }}</option>
                                <option value="Lt.">{{ __('guestlistpage.lt') }}</option>
                                <option value="Sgt.">{{ __('guestlistpage.sgt') }}</option>
                                <option value="Lord">{{ __('guestlistpage.lord') }}</option>
                                <option value="Lady">{{ __('guestlistpage.lady') }}</option>
                                <option value="Duke">{{ __('guestlistpage.duke') }}</option>
                                <option value="Duchess">{{ __('guestlistpage.duchess') }}</option>
                            </select>

                        </div>
                        <input type="hidden" value="{{ $eventId }}" name="idevent" id="idevent">
                        <!-- Name Input -->
                        <div class="form-group">
                            <label for="name">{{ __('guestlistpage.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="{{ __('guestlistpage.enter_name') }}">
                        </div>

                        <!-- Email Input -->
                        <!-- E-mail Input -->
                        <div class="form-group">
                            <label for="email">{{ __('guestlistpage.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="{{ __('guestlistpage.enter_email') }}">
                        </div>

                        <!-- Phone Input -->
                        <div class="form-group">
                            <label for="phone">{{ __('guestlistpage.phone') }}</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="{{ __('guestlistpage.phone_placeholder') }}">
                        </div>

                        <!-- WhatsApp Input -->
                        <div class="form-group">
                            <label for="whatsapp">{{ __('guestlistpage.whatsapp') }}</label>
                            <input type="tel" class="form-control" id="whatsapp" name="whatsapp"
                                placeholder="{{ __('guestlistpage.whatsapp_placeholder') }}">
                        </div>

                        <!-- Allergies Radio Button -->
                        <div class="form-group">
                            <label>{{ __('guestlistpage.allergies') }}</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="allergiesYes"
                                    value="1">
                                <label class="form-check-label"
                                    for="allergiesYes">{{ __('guestlistpage.allergies_yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="allergiesNo"
                                    value="0">
                                <label class="form-check-label"
                                    for="allergiesNo">{{ __('guestlistpage.allergies_no') }}</label>
                            </div>
                        </div>


                        <!-- Select Meal -->
                        <div class="form-group">
                            <label for="meal">{{ __('guestlistpage.select_meal') }}</label>
                            <select class="form-control" id="meal" name="meal">
                                @foreach ($meals as $meal)
                                    <option value="{{ $meal->id_meal }}">{{ $meal->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Number of Members to Invite -->
                        <div class="form-group">
                            <label for="members">{{ __('guestlistpage.number_of_members') }}</label>
                            <input type="number" class="form-control" id="members" name="members"
                                placeholder="{{ __('guestlistpage.enter_number') }}">
                        </div>

                        <!-- Notes Input -->
                        <div class="form-group">
                            <label for="notes">{{ __('guestlistpage.notes') }}</label>
                            <textarea class="form-control" id="notes" name="notes" placeholder="{{ __('guestlistpage.enter_notes') }}"></textarea>
                        </div>

                        <!-- Confirm Radio Button -->
                        <div class="form-group">
                            <label>{{ __('guestlistpage.confirm') }}</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="confirm" id="confirmYes"
                                    value="1">
                                <label class="form-check-label" for="confirmYes">{{ __('guestlistpage.yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="confirm" id="confirmNo"
                                    value="0">
                                <label class="form-check-label" for="confirmNo">{{ __('guestlistpage.no') }}</label>
                            </div>
                        </div>

                    </form>
                    <!-- Form end -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="AddGuestClose">{{ __('guestlistpage.Cancel') }}</button>

                        <button type="button" class="btn btn-secondary d-none" data-dismiss="modal"
                        id="AddGuestClose1">{{ __('genralInfo.Later') }}</button>

                    <button type="submit" class="btn btn-primary submit-btn"
                        id="submitGuestForm">{{ __('guestlistpage.Save') }}</button>
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
                        <h2 class="text-center">{{ __('guestlistpage.Edit_Guest') }}</h2>
                    </div>
                    <!-- Form start -->
                    <form id="EditguestForm">
                        <!-- Title Select Box -->
                        <div class="form-group">
                            <label for="edit_title">{{ __('guestlistpage.title') }}</label>
                            <select class="form-control" id="edit_title" name="title">
                                <option selected disabled>{{ __('guestlistpage.select_title_option') }}</option>
                                <option value="Mr.">{{ __('guestlistpage.title_mr') }}</option>
                                <option value="Mrs.">{{ __('guestlistpage.title_mrs') }}</option>
                                <option value="Miss">{{ __('guestlistpage.title_miss') }}</option>
                                <option value="Ms.">{{ __('guestlistpage.title_ms') }}</option>
                                <option value="Dr.">{{ __('guestlistpage.title_dr') }}</option>
                                <option value="Prof.">{{ __('guestlistpage.title_prof') }}</option>
                                <option value="Rev.">{{ __('guestlistpage.title_rev') }}</option>
                                <option value="Hon.">{{ __('guestlistpage.title_hon') }}</option>
                                <option value="Sir">{{ __('guestlistpage.title_sir') }}</option>
                                <option value="Dame">{{ __('guestlistpage.title_dame') }}</option>
                                <option value="Mr. & Mrs.">{{ __('guestlistpage.title_mr_mrs') }}</option>
                                <option value="Mr. & Family">{{ __('guestlistpage.title_mr_family') }}</option>
                                <option value="Ms. & Family">{{ __('guestlistpage.title_ms_family') }}</option>
                                <option value="Dr. & Mrs.">{{ __('guestlistpage.title_dr_mrs') }}</option>
                                <option value="Capt.">{{ __('guestlistpage.title_capt') }}</option>
                                <option value="Maj.">{{ __('guestlistpage.title_maj') }}</option>
                                <option value="Col.">{{ __('guestlistpage.title_col') }}</option>
                                <option value="Gen.">{{ __('guestlistpage.title_gen') }}</option>
                                <option value="Lt.">{{ __('guestlistpage.title_lt') }}</option>
                                <option value="Sgt.">{{ __('guestlistpage.title_sgt') }}</option>
                                <option value="Lord">{{ __('guestlistpage.title_lord') }}</option>
                                <option value="Lady">{{ __('guestlistpage.title_lady') }}</option>
                                <option value="Duke">{{ __('guestlistpage.title_duke') }}</option>
                                <option value="Duchess">{{ __('guestlistpage.title_duchess') }}</option>
                            </select>

                        </div>
                        <input type="hidden" value="{{ $eventId }}" name="idevent" id="idevent">
                        <!-- Name Input -->
                        <div class="form-group">
                            <label for="edit_name">{{ __('guestlistpage.name') }}</label>
                            <input type="text" class="form-control" id="edit_name" name="name"
                                placeholder="{{ __('guestlistpage.enter_name') }}">
                        </div>


                        <!-- Email Input -->
                        <div class="form-group">
                            <label for="edit_email">{{ __('guestlistpage.email') }}</label>
                            <input type="email" class="form-control" id="edit_email" name="email"
                                placeholder="{{ __('guestlistpage.enter_email') }}">
                        </div>

                        <!-- Phone Input -->
                        <div class="form-group">
                            <label for="edit_phone">{{ __('guestlistpage.phone') }}</label>
                            <input type="tel" class="form-control" id="edit_phone" name="phone"
                                placeholder="{{ __('guestlistpage.enter_phone') }}">
                        </div>

                        <!-- WhatsApp Input -->
                        <div class="form-group">
                            <label for="edit_whatsapp">{{ __('guestlistpage.whatsapp') }}</label>
                            <input type="tel" class="form-control" id="edit_whatsapp" name="whatsapp"
                                placeholder="{{ __('guestlistpage.enter_whatsapp') }}">
                        </div>


                        <!-- Allergies Radio Button -->
                        <div class="form-group">
                            <label>{{ __('guestlistpage.allergies') }}</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="edit_allergiesYes"
                                    value="1">
                                <label class="form-check-label" for="allergiesYes">{{ __('guestlistpage.yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="edit_allergiesNo"
                                    value="0">
                                <label class="form-check-label" for="allergiesNo">{{ __('guestlistpage.no') }}</label>
                            </div>
                        </div>

                        <!-- Select Meal -->
                        <div class="form-group">
                            <label for="meal">{{ __('guestlistpage.select_meal') }}</label>
                            <select class="form-control" id="edit_meal" name="meal">
                                @foreach ($meals as $meal)
                                    <option value="{{ $meal->id_meal }}">{{ $meal->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Number of Members to Invite -->
                        <div class="form-group">
                            <label for="members" id="members_label">{{ __('guestlistpage.number_of_members') }}</label>
                            <input type="number" class="form-control" id="edit_members" name="members"
                                placeholder="{{ __('guestlistpage.enter_number') }}">
                        </div>


                        <!-- Notes Input -->
                        <div class="form-group">
                            <label for="notes">{{ __('guestlistpage.notes') }}</label>
                            <textarea class="form-control" id="edit_notes" name="notes" placeholder="{{ __('guestlistpage.enter_notes') }}"></textarea>
                        </div>


                        <!-- Confirm Radio Button -->
                        <div class="form-group">
                            <label>{{ __('guestlistpage.confirm') }}</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="confirm" id="edit_confirmYes"
                                    value="1">
                                <label class="form-check-label" for="confirmYes">{{ __('guestlistpage.yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="confirm" id="edit_confirmNo"
                                    value="0">
                                <label class="form-check-label" for="confirmNo">{{ __('guestlistpage.no') }}</label>
                            </div>
                        </div>
                    </form>
                    <!-- Form end -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="EditGuestClose">{{ __('guestlistpage.Cancel') }}</button>
                    <button type="button" class="btn submit-btn"
                        id="submitEditGuestForm">{{ __('guestlistpage.update') }}</button>
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
                        <h2 class="text-center">{{ __('guestlistpage.add_member') }}</h2>
                    </div>
                    <!-- Form start -->
                    <form id="AddMemberForm">
                        <!-- Name Input -->
                        <div class="form-group">
                            <label for="name">{{ __('guestlistpage.name') }}</label>
                            <input type="text" class="form-control" id="member_name" name="name"
                                placeholder="{{ __('guestlistpage.enter_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp">Whatsapp</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                placeholder="Enter Whatsapp">
                        </div>
                        <input type="hidden" value="{{ $eventId }}" name="idevent" id="idevent">
                        <input type="hidden" value="" name="parentidguest" id="parentidguest">
                        <!-- Allergies Radio Button -->
                        <div class="form-group">
                            <label>{{ __('guestlistpage.allergies') }}</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="edit_allergiesYes"
                                    value="1">
                                <label class="form-check-label" for="allergiesYes">{{ __('guestlistpage.yes') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="allergies" id="edit_allergiesNo"
                                    value="0">
                                <label class="form-check-label" for="allergiesNo">{{ __('guestlistpage.no') }}</label>
                            </div>
                        </div>
                        <!-- Select Meal -->
                        <div class="form-group">
                            <label for="meal">{{ __('guestlistpage.select_meal') }}</label>
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
                        id="AddMemberClose">{{ __('guestlistpage.Cancel') }}</button>
                    <button type="button" class="btn btn-primary submit-btn"
                        id="submitMemberForm">{{ __('guestlistpage.Save') }}</button>
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
                                <h2>{{ __('guestlistpage.upload_csv_title') }}</h2>
                                <p>{{ __('guestlistpage.upload_csv_description') }}</p>
                                <a href="{{ asset('assets/files/example.csv') }}" class="submit-btn"
                                    download>{{ __('guestlistpage.download_csv_example') }}</a>
                            </div>
                            <form id="csvUploadForm" method="POST" enctype="multipart/form-data">
                                <div class="upload-container" onclick="document.getElementById('fileInput').click();">

                                    <input type="file" id="fileInput" name="csv_file" onchange="showFileName()"
                                        accept=".csv" required>
                                    <label for="csv_file"><img src="{{ asset('assets/images/upload_svg_image.png') }}"
                                            alt="Upload Icon" /></label>
                                </div>
                                <div id="fileName" class="file-name"></div>
                            </form>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="uploadCsvClose"
                                    data-dismiss="modal">{{ __('guestlistpage.Cancel') }}</button>
                                <button type="button" class="submit-btn"
                                    id="uploadCsvBtn">{{ __('guestlistpage.upload_guest_list') }}</button>
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
                        <h2>{{ __('guestlistpage.upload_guests_from_another_event') }}</h2>

                        <p>{{ __('guestlistpage.guest_list_description') }}</p>
                    </div>
                    <form id="GuestImportForm">
                        <div class="modal-table-type-content" id="guestListItems">
                            {{-- <div class="sub-main-content" >
                            <!-- Dynamically inserted guest data will appear here -->
                        </div> --}}
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('guestlistpage.no_dont') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#">{{ __('guestlistpage.upload_guest') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>






    <!-- Delete Confirmation Modal -->
    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="delguestModal" tabindex="-1" role="dialog"
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
                        <h5 class="modal-title text-center">{{ __('guestlistpage.delete') }}</h5>
                        <p>{{ __('guestlistpage.delete_confirmation') }}</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="delguestModalClose">{{ __('guestlistpage.no_dont') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn"
                        onclick="deleteGuest()">{{ __('guestlistpage.delete') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Delete All Confirmation Modal -->
    {{-- <div class="modal fade modal-01 modal-02 upload-form-another-event" id="delguestAllModal" tabindex="-1" role="dialog"
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
                <h5 class="modal-title text-center">Delete</h5>
                <p>Are you sure you want to delete this guest?</p>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="delguestModalClose">No, I Don’t</button>
            <button type="button" class="submit-btn btn btn-primary t-btn" >Delete</button>
        </div>
        </form>
    </div>
</div>
</div> --}}



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
                            {{-- <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt=""> --}}
                            <h2>{{ __('guestlistpage.select_date') }}</h2>
                            <span>{{ __('guestlistpage.select_date_description') }}</span>
                            <div class="form-group">
                                <label for="reservationDate">{{ __('guestlistpage.select_date_label') }}</label>
                                <input type="date" name="reservationDate" id="reservationDate">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeExportQrFormModal"
                        data-dismiss="modal">{{ __('guestlistpage.close') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn"
                        onclick="ExportGuestQr()">{{ __('guestlistpage.save_changes') }}</button>
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
                        @if ($card)
                        <div class="text">
                            <h2>{{ __('guestlistpage.select_options_display') }}</h2>
                            <div class="form-group">
                                <label for="gift-suggestion">{{ __('guestlistpage.gift_suggestions') }}</label>
                                <input type="checkbox" name="gift-suggestion" id="gift-suggestion" {{ $card->rsvp[2] == 1 ? 'checked' : '' }}>
                            </div>
                            <div class="form-group">
                                <label
                                    for="at-reception-check-in">{{ __('guestlistpage.at_reception_check_in') }}</label>
                                <input type="checkbox" name="at-reception-check-in" id="at-reception-check-in" {{ $card->rsvp[4] == 1 ? 'checked' : '' }}>
                            </div>
                            <div class="form-group">
                                <label for="upload-your-photo">{{ __('guestlistpage.upload_your_photos') }}</label>
                                <input type="checkbox" name="upload-your-photo" id="upload-your-photo" {{ $card->rsvp[6] == 1 ? 'checked' : '' }}>
                            </div>
                            <div class="form-group">
                                <label for="go-to-the-website">{{ __('guestlistpage.go_to_the_website') }}</label>
                                <input type="checkbox" name="go-to-the-website" id="go-to-the-website" {{ $card->rsvp[8] == 1 ? 'checked' : '' }}>
                            </div>
                            <div class="form-group">
                                <label for="learn-how-RSVP-works">{{ __('guestlistpage.learn_how_rsvp_works') }}</label>
                                <input type="checkbox" name="learn-how-RSVP-works" id="learn-how-RSVP-works" {{ $card->rsvp[10] == 1 ? 'checked' : '' }}>
                            </div>
                        </div>
                        @else
                        <div class="text">
                            <h2>{{ __('guestlistpage.select_options_display') }}</h2>
                            <div class="form-group">
                                <label for="gift-suggestion">{{ __('guestlistpage.gift_suggestions') }}</label>
                                <input type="checkbox" name="gift-suggestion" id="gift-suggestion">
                            </div>
                            <div class="form-group">
                                <label
                                    for="at-reception-check-in">{{ __('guestlistpage.at_reception_check_in') }}</label>
                                <input type="checkbox" name="at-reception-check-in" id="at-reception-check-in">
                            </div>
                            <div class="form-group">
                                <label for="upload-your-photo">{{ __('guestlistpage.upload_your_photos') }}</label>
                                <input type="checkbox" name="upload-your-photo" id="upload-your-photo">
                            </div>
                            <div class="form-group">
                                <label for="go-to-the-website">{{ __('guestlistpage.go_to_the_website') }}</label>
                                <input type="checkbox" name="go-to-the-website" id="go-to-the-website">
                            </div>
                            <div class="form-group">
                                <label for="learn-how-RSVP-works">{{ __('guestlistpage.learn_how_rsvp_works') }}</label>
                                <input type="checkbox" name="learn-how-RSVP-works" id="learn-how-RSVP-works">
                            </div>
                        </div>
                        @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeDispalyModal"
                        data-dismiss="modal">{{ __('guestlistpage.close') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" id="save-option"
                        onclick="DisplayOptionSave()" data-toggle="modal"
                        data-target="#SendInvitation">{{ __('guestlistpage.save_changes') }}</button>
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
                            {{-- <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt=""> --}}
                            <h2>{{ __('guestlistpage.select_options_send_invitation') }}</h2>
                            <div class="form-group">
                                <label for="emailCheck">{{ __('guestlistpage.email') }}</label>
                                <input type="checkbox" name="emailCheck" id="emailCheck">
                            </div>
                            <div class="form-group">
                                <label for="smsCheck">{{ __('guestlistpage.sms') }}</label>
                                <input type="checkbox" name="smsCheck" id="smsCheck">
                            </div>
                            <div class="form-group">
                                <label for="whatsappCheck">{{ __('guestlistpage.whatsapp') }}</label>
                                <input type="checkbox" name="whatsappCheck" id="whatsappCheck">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="closeSendInvitationForm">{{ __('guestlistpage.close') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" id="send-invitaion"
                        onclick="SendInvitation()"> {{ __('guestlistpage.send_invitation') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-01 modal-02" id="exampleModalCenter09" tabindex="-1" role="dialog"
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
                    <h2>{{ __('guestlistpage.add_more_guest') }}</h2>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    id="noGift">{{ __('genralInfo.Later') }}</button>

                <button type="button" class="btn btn-secondary d-none" data-dismiss="modal"
                    id="noGift2">{{ __('genralInfo.Later') }}</button>

                <button type="button" class="submit-btn btn btn-primary t-btn" id="add_meal">
                    {{ __('genralInfo.I Do') }}
                </button>
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
                    href="{{ route('panel.event.guests.index', ['id' => $eventId]) }}">{{ __('genralInfo.I Do') }}</a></button>
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
                    href="{{ route('panel.event.photos', ['id' => $eventId]) }}">{{ __('genralInfo.I Do') }}</a></button>
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
                            href="{{ route('panel.event.reminder', ['id' => $eventId]) }}">{{ __('genralInfo.I Do') }}</a></button>
                </div>
            </div>
        </div>
    </div>
    {{-- for abse url --}}
    <input type="hidden" value="{{ url('/') }}" id="baseUrl">
@endsection
<!-- Include jQuery first -->
<!-- #region datatables files -->
@section('scripts')
    <script>
        $("#add_meal").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('AddGuest'));
            successModal.show();
            $("#noGift2").click();
        });
        $("#AddGuestClose").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter024'));
            successModal.show();
        });
        $("#noGift").on("click", function() {
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

        $(document).ready(function() {
            var myModal = new bootstrap.Modal(document.getElementById('AddGuest'));
                myModal.show();
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
                            $('#AddGuestClose1').click();
                            showGuest("1");
                            var successModal = new bootstrap.Modal(document.getElementById(
                                    'exampleModalCenter09'));
                                successModal.show();
                        } else {
                            // If the server returns a custom error in a "message" field
                            if (response.message) {
                                toastr.error(response.message);
                            } else if (response.errors) {
                                // Handle validation errors sent as part of the response
                                $.each(response.errors, function(key, messages) {
                                    toastr.error(messages);
                                });
                            } else {
                                toastr.error('An unexpected error occurred.');
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseJSON); // Debugging
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, messages) {
                                messages.forEach(function(message) {
                                    toastr.error(message);
                                });
                            });
                        } else {
                            toastr.error('An unexpected error occurred.'); // Generic error
                        }
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
                            // If the server returns a custom error in a "message" field
                            if (response.message) {
                                toastr.error(response.message);
                            } else if (response.errors) {
                                // Handle validation errors sent as part of the response
                                $.each(response.errors, function(key, messages) {
                                    toastr.error(messages);
                                });
                            } else {
                                toastr.error('An unexpected error occurred.');
                            }
                        }
                        },
                        error: function(xhr, status, error) {
                        // Handle validation or server errors
                        var errors = xhr.responseJSON.errors;
                        console.log(errors);
                        $.each(errors, function(key, value) {
                            // alert(key + ": " + value);
                            toastr.error(key + ": " + value);
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
                    var guests = response.guests || [];
                    $('#GuestList').empty();

                    var totalGuests = guests.length;
                    var totalMembers = guests.reduce(function(sum, guest) {
                        return sum + (guest.members ? guest.members.length : 0);
                    }, 0);
                    var checkedInCount = guests.reduce(function(count, guest) {
                        return count + (guest.checkin == 1 ? 1 : 0) +
                            (guest.members ? guest.members.filter(member => member.checkin == 1).length : 0);
                    }, 0);
                    var declinedCount = guests.reduce(function(count, guest) {
                        return count + (guest.declined == 1 ? 1 : 0) +
                            (guest.members ? guest.members.filter(member => member.declined == 1).length : 0);
                    }, 0);


                                                var br = '<br>';
                            // Update totals with a line break
                    $('#guestMemberTotal').html(`TOTAL: ${totalGuests + totalMembers} ${br}(guests ${totalGuests} - members ${totalMembers})`);


                    $('#totalCheckIn').html(`<i class="fa fa-check-square" aria-hidden="true"></i> CHECKED-IN ${checkedInCount}`);
                    $('#totalDecline').html(`<i class="fa fa-times" aria-hidden="true"></i> DECLINED ${declinedCount}`);
                    $('#totalinvite').html(`<i class="fa fa-user" aria-hidden="true"></i> INVITED GUEST ${totalGuests}`);
                    $('#inviteMembers').html(`<i class="fa fa-users" aria-hidden="true"></i> INVITED MEMBERS ${totalMembers}`);


                    if (filter == 1) {
                        guests.forEach(function(guest) {
                            // ALL GUESTS
                            var accordion = `
                            <div class="accordion">
                                <div class="table-box" ${(guest.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                    <table>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton(event)">
                                                ${guest.titleGuest == null ? ' ' : guest.titleGuest} ${guest.name}
                                                <span>
                                                    <br><i class="fa fa-whatsapp"></i> ${(guest.whatsapp == null || guest.whatsapp == '') ? 'N/A' : guest.whatsapp}
                                                    <br><i class="fa fa-phone"></i> ${(guest.phone == null || guest.phone == '') ? 'N/A' : guest.phone}
                                                    <br><i class="fa fa-envelope"></i> ${(guest.email == null || guest.email == '') ? 'N/A' : guest.email}
                                                    ${(guest.members_number == guest.members.length ) ? 
                                                        `<br><span class="text-danger">{{ __('guestlistpage.all members allowed added') }}</span>` : 
                                                        `<br><span class="text-success">{{ __('guestlistpage.open') }}</span> (${guest.members.length} {{ __('guestlistpage.of') }} ${guest.members_number} {{ __('guestlistpage.allowed') }})` }
                                                    <br>Table: ${(guest.id_table !== 0 && guest.id_table !== null && guest.table != undefined) ? guest.table.name : 'N/A'}
                                                </span>
                                            </td>
                                            <td>Meal: ${guest.meal ? guest.meal.name : 'N/A'}</td>
                                            <td>Allergies: ${guest.allergies == 1 ? 'Yes' : 'No'}</td>
                                            <td>${guest.notes || 'No Notes'}</td>
                                            <td>
                                                <button type="button" ${(guest.members.length >= guest.members_number ? 'disabled' : '')} class="btn btn-primary t-btn t-btn-theme" id="addMember" data-toggle="modal"
                                                data-target="#AddMember" data-parentidguest-id="${guest.id_guest}">{{ __('guestlistpage.add_member') }}</button>
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
                                            <td><strong>{{ __('guestlistpage.member_details') }}</strong></td>
                                            <td><strong>{{ __('guestlistpage.note') }}</strong></td>
                                            <td><strong>{{ __('guestlistpage.other_details') }}</strong></td>
                                            <td><strong>{{ __('guestlistpage.attending_event') }}</strong></td>

                                        </tr>`;

                            guest.members.forEach(function(member) {
                                accordion += `
                                <tr class="divider-line"></tr>
                                <tr ${(member.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                    <td><input type="checkbox" class="check_box_style" data-guest-id="${member.id_guest}" onclick="showButton(event)">${member.titleGuest == null ? ' ' : member.titleGuest} ${member.name}</td>
                                    <td>${member.notes || 'No Notes'}</td>
                                    <td>
                                        <ul>
                                            <li><strong>{{ __('guestlistpage.meal') }}: </strong>${member.meal ? member.meal.name : 'N/A'}</li>
                                            <li><strong>{{ __('guestlistpage.table') }}: </strong>${(member.id_table !== 0 && member.id_table !== null && member.table != undefined) ? member.table.name : 'N/A'}</li>
                                            <li><strong>{{ __('guestlistpage.allergies') }}: </strong>${member.allergies ? member.allergies : 'N/A'}</li>
                                        </ul>
                                    </td>

                                    ${(member.opened == 2 && member.declined != 1) ? `
                                        <td class="accordian_img_acces">
                                            <img src="{{ asset('assets/images/tick-green-img.png') }}" alt="Tick">
                                        </td>` : ''}
                                    ${(member.declined == 1) ? `
                                        <td class="accordian_img_acces">
                                            <img src="{{ asset('assets/images/cancel-red-img.png') }}" alt="Declined">
                                        </td>` : ''}

                                        ${(member.opened != 2 && member.declined != 1) ? `
                                            <td class="accordian_img_acces">
                                        </td>` : ''}
                                        
                                        <td>
                                            <li><strong>Email: ${member.email || 'No Email'}</strong>
                                            <li><strong>Phone : ${member.phone || 'No Phone'}</strong>
                                        </td>
                                        </tr>`;

                            });

                            accordion += `
                                    <tr class="divider-line"></tr>
                                    </table>
                                </div>
                            </div>`;

                            $('#GuestList').append(accordion); // Append each accordion to the list
                        });
                    }

                    if (filter == "attending") {
                            var attendingGuestsCount = 0;
                            var attendingMembersCount = 0;

                                    guests.forEach(function(guest) {
                                        // Check if guest or any member has opened == 2 (attending)
                                        if (guest.opened == 2 || guest.members.some(member => member.opened == 2)) {

                                            if (guest.opened == 2) {
                                                attendingGuestsCount++; // Count attending guest
                                            }
                                            var br = '<br>';
                                            // Update the totals display with separate checked-in counts for guests and members
                                            $('#guestMemberTotal').html(`TOTAL: ${attendingGuestsCount + attendingMembersCount} ${br} (guests ${attendingGuestsCount} - members ${attendingMembersCount})`);

                                                // Show guest and their members if the guest is checked in
                                                var accordion = `
                                                    <div class="accordion">
                                                        <div class="table-box" ${(guest.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton(event)">
                                                                        ${guest.titleGuest == null ? ' ' : guest.titleGuest} ${guest.name}

                                                                        <span class="${guest.opened == 0 ? 'd-none' : ''}">
                                                                            <br><i class="fa fa-whatsapp"></i> ${(guest.whatsapp == null || guest.whatsapp == '') ? 'N/A' : guest.whatsapp}
                                                    <br><i class="fa fa-phone"></i> ${(guest.phone == null || guest.phone == '') ? 'N/A' : guest.phone}
                                                    <br><i class="fa fa-envelope"></i> ${(guest.email == null || guest.email == '') ? 'N/A' : guest.email}
                                                                            ${(guest.members_number == guest.members.length ) ? 
                                                        `<br><span class="text-danger">{{ __('guestlistpage.all members allowed added') }}</span>` : 
                                                        `<br><span class="text-success">{{ __('guestlistpage.open') }}</span> (${guest.members.length} {{ __('guestlistpage.of') }} ${guest.members_number} {{ __('guestlistpage.allowed') }})` }
                                                                            <br>Table: ${(guest.id_table !== 0 && guest.id_table !== null && guest.table != undefined) ? guest.table.name : 'N/A'}
                                                                        </span>
                                                                    </td>
                                                                    <td>Meal: ${guest.meal ? guest.meal.name : 'N/A'}</td>
                                                                    <td>Allergies: ${guest.allergies == 1 ? 'Yes' : 'No'}</td>
                                                                    <td>${guest.notes || 'No Notes'}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary t-btn t-btn-theme" id="addMember" data-toggle="modal"
                                                                        data-target="#AddMember" data-parentidguest-id="${guest.id_guest}">{{ __('guestlistpage.add_member') }}</button>
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
                                                                    <td><strong>{{ __('guestlistpage.member_details') }}</strong></td>
                                                                    <td><strong>{{ __('guestlistpage.note') }}</strong></td>
                                                                    <td><strong>{{ __('guestlistpage.other_details') }}</strong></td>
                                                                    <td><strong>{{ __('guestlistpage.attending_event') }}</strong></td>
                                                                </tr>`;

                                // Loop through each member of the guest and add them only if checkin == 1
                                guest.members.forEach(function(member) {
                                    if (member.opened == 2) {
                                        attendingMembersCount++; // Count attending member

                                        accordion += `
                                            <tr class="divider-line"></tr>
                                            <tr ${(member.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                                <td><input type="checkbox" class="check_box_style" data-guest-id="${member.id_guest}" onclick="showButton(event)">
                                                ${member.titleGuest == null ? ' ' : member.titleGuest} ${member.name}</td>
                                                <td>${member.notes || 'No Notes'}</td>
                                                <td>
                                                    <ul>
                                                        <li><strong>{{ __('guestlistpage.meal') }}: </strong>${member.meal ? member.meal.name : 'N/A'}</li>
                                                        <li><strong>{{ __('guestlistpage.table') }}: </strong>${(member.id_table !== 0 && member.id_table !== null && member.table != undefined) ? member.table.name : 'N/A'}</li>
                                                        <li><strong>{{ __('guestlistpage.allergies') }}: </strong>${member.allergies ? member.allergies : 'N/A'}</li>
                                                    </ul>
                                                </td>
                                                ${(member.opened == 2 && member.declined != 1) ? `
                                                    <td class="accordian_img_acces">
                                                        <img src="{{ asset('assets/images/tick-green-img.png') }}" alt="Tick">
                                                    </td>` : ''}
                                                ${(member.declined == 1) ? `
                                                    <td class="accordian_img_acces">
                                                        <img src="{{ asset('assets/images/cancel-red-img.png') }}" alt="Declined">
                                                    </td>` : ''}
                                            </tr>`;
                                    }
                                });

                                accordion += `
                                    <tr class="divider-line"></tr>
                                    </table>
                                </div>
                            </div>`;

                                $('#GuestList').append(accordion); // Append each accordion to the list
                            }
                        });
                    }


                    if (filter == "opened") {
                        var openedGuestsCount = 0;
                        var openedMembersCount = 0;

                        guests.forEach(function(guest) {
                            // Check if guest or any member has opened == 1 (opened)
                            if (guest.opened == 1 || guest.members.some(member => member.opened == 1)) {
                                if (guest.opened == 1) {
                                    openedGuestsCount++; // Count opened guest
                                }
                                var br='<br>';
                                $('#guestMemberTotal').html(`TOTAL: ${openedGuestsCount} ${br} (guests ${openedGuestsCount} - members ${openedMembersCount})`);
                                // Show guest and their members if the guest is checked in
                                var accordion = `
                                    <div class="accordion">
                                        <div class="table-box" ${(guest.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton(event)">
                                                        ${guest.titleGuest == null ? ' ' : guest.titleGuest} ${guest.name}

                                                        <span class="${guest.opened == 0 ? 'd-none' : ''}">
                                                            <br><i class="fa fa-whatsapp"></i> ${(guest.whatsapp == null || guest.whatsapp == '') ? 'N/A' : guest.whatsapp}
                                                    <br><i class="fa fa-phone"></i> ${(guest.phone == null || guest.phone == '') ? 'N/A' : guest.phone}
                                                    <br><i class="fa fa-envelope"></i> ${(guest.email == null || guest.email == '') ? 'N/A' : guest.email}
                                                            ${(guest.members_number == guest.members.length ) ? 
                                                        `<br><span class="text-danger">{{ __('guestlistpage.all members allowed added') }}</span>` : 
                                                        `<br><span class="text-success">{{ __('guestlistpage.open') }}</span> (${guest.members.length} {{ __('guestlistpage.of') }} ${guest.members_number} {{ __('guestlistpage.allowed') }})` }
                                                            <br>Table: ${(guest.id_table !== 0 && guest.id_table !== null && guest.table != undefined) ? guest.table.name : 'N/A'}
                                                        </span>
                                                    </td>
                                                    <td>Meal: ${guest.meal ? guest.meal.name : 'N/A'}</td>
                                                    <td>Allergies: ${guest.allergies == 1 ? 'Yes' : 'No'}</td>
                                                    <td>${guest.notes || 'No Notes'}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary t-btn t-btn-theme" id="addMember" data-toggle="modal"
                                                        data-target="#AddMember" data-parentidguest-id="${guest.id_guest}">{{ __('guestlistpage.add_member') }}</button>
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
                                                    <td><strong>{{ __('guestlistpage.member_details') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.note') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.other_details') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.attending_event') }}</strong></td>
                                                </tr>`;

                                // Loop through each member of the guest and add them only if checkin == 1
                                guest.members.forEach(function(member) {
                                    if (member.opened == 1) {
                                        accordion += `
                                            <tr class="divider-line"></tr>
                                            <tr ${(member.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                                <td><input type="checkbox" class="check_box_style" data-guest-id="${member.id_guest}" onclick="showButton(event)">
                                                ${member.titleGuest == null ? ' ' : member.titleGuest} ${member.name}</td>
                                                <td>${member.notes || 'No Notes'}</td>
                                                <td>
                                                    <ul>
                                                        <li><strong>{{ __('guestlistpage.meal') }}: </strong>${member.meal ? member.meal.name : 'N/A'}</li>
                                                        <li><strong>{{ __('guestlistpage.table') }}: </strong>${(member.id_table !== 0 && member.id_table !== null && member.table != undefined) ? member.table.name : 'N/A'}</li>
                                                        <li><strong>{{ __('guestlistpage.allergies') }}: </strong>${member.allergies ? member.allergies : 'N/A'}</li>
                                                    </ul>
                                                </td>
                                                ${(member.opened == 2 && member.declined != 1) ? `
                                                                                                                    <td class="accordian_img_acces">
                                                                                                                        <img src="{{ asset('assets/images/tick-green-img.png') }}" alt="Tick">
                                                                                                                    </td>` : ''}
                                                ${(member.declined == 1) ? `
                                                                                                                    <td class="accordian_img_acces">
                                                                                                                        <img src="{{ asset('assets/images/cancel-red-img.png') }}" alt="Declined">
                                                                                                                    </td>` : ''}
                                            </tr>`;
                                    }
                                });

                                accordion += `
                                        <tr class="divider-line"></tr>
                                        </table>
                                    </div>
                                </div>`;

                                $('#GuestList').append(accordion); // Append each accordion to the list
                            }
                        });
                    }

                    if (filter == "declined") {
                        var declinedGuestsCount = 0;
                        var declinedMembersCount = 0;
                        guests.forEach(function(guest) {
                            if (guest.declined == 1 || guest.members.some(member => member.declined ==
                                    1)) {
                                // Show guest and their members if the guest is checked in
                                var declinedCount = guests.reduce(function(count, guest) {
                                    return count + (guest.declined == 1 ? 1 : 0) +
                                        (guest.members ? guest.members.filter(member => member.declined == 1).length : 0);
                                }, 0);

                                // Update totals
                                if (guest.members && guest.members.some(member => member.declined == 1)) {
                                    declinedMembersCount += guest.members.filter(member => member.declined == 1).length;
                                }
                                var br = '<br>';
                                $('#guestMemberTotal').html(`TOTAL: ${declinedGuestsCount + declinedMembersCount} ${br} (guests ${declinedGuestsCount} - members ${declinedMembersCount})`);

                                var accordion = `
                                    <div class="accordion">
                                        <div class="table-box" ${(guest.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton(event)">
                                                        ${guest.titleGuest == null ? ' ' : guest.titleGuest} ${guest.name}

                                                        <span class="${guest.declined == 0 ? 'd-none' : ''}">
                                                            <br><i class="fa fa-whatsapp"></i> ${(guest.whatsapp == null || guest.whatsapp == '') ? 'N/A' : guest.whatsapp}
                                                    <br><i class="fa fa-phone"></i> ${(guest.phone == null || guest.phone == '') ? 'N/A' : guest.phone}
                                                    <br><i class="fa fa-envelope"></i> ${(guest.email == null || guest.email == '') ? 'N/A' : guest.email}
                                                            ${(guest.members_number == guest.members.length ) ? 
                                                        `<br><span class="text-danger">{{ __('guestlistpage.all members allowed added') }}</span>` : 
                                                        `<br><span class="text-success">{{ __('guestlistpage.open') }}</span> (${guest.members.length} {{ __('guestlistpage.of') }} ${guest.members_number} {{ __('guestlistpage.allowed') }})` }
                                                            <br>Table: ${(guest.id_table !== 0 && guest.id_table !== null && guest.table != undefined) ? guest.table.name : 'N/A'}
                                                        </span>
                                                    </td>
                                                    <td>Meal: ${guest.meal ? guest.meal.name : 'N/A'}</td>
                                                    <td>Allergies: ${guest.allergies == 1 ? 'Yes' : 'No'}</td>
                                                    <td>${guest.notes || 'No Notes'}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary t-btn t-btn-theme" id="addMember" data-toggle="modal"
                                                        data-target="#AddMember" data-parentidguest-id="${guest.id_guest}">{{ __('guestlistpage.add_member') }}</button>
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
                                                    <td><strong>{{ __('guestlistpage.member_details') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.note') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.other_details') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.attending_event') }}</strong></td>
                                                </tr>`;

                                // Loop through each member of the guest and add them only if declined == 1
                                guest.members.forEach(function(member) {
                                    if (member.declined == 1) {
                                        accordion += `
                                            <tr class="divider-line"></tr>
                                            <tr ${(member.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                                <td><input type="checkbox" class="check_box_style" data-guest-id="${member.id_guest}" onclick="showButton(event)">
                                                ${member.titleGuest == null ? ' ' : member.titleGuest} ${member.name}</td>
                                                <td>${member.notes || 'No Notes'}</td>
                                                <td>
                                                    <ul>
                                                        <li><strong>{{ __('guestlistpage.meal') }}: </strong>${member.meal ? member.meal.name : 'N/A'}</li>
                                                        <li><strong>{{ __('guestlistpage.table') }}: </strong>${(member.id_table !== 0 && member.id_table !== null && member.table != undefined) ? member.table.name : 'N/A'}</li>
                                                        <li><strong>{{ __('guestlistpage.allergies') }}: </strong>${member.allergies ? member.allergies : 'N/A'}</li>
                                                    </ul>
                                                </td>
                                                ${(member.opened == 2 && member.declined != 1) ? `
                                                                                                                    <td class="accordian_img_acces">
                                                                                                                        <img src="{{ asset('assets/images/tick-green-img.png') }}" alt="Tick">
                                                                                                                    </td>` : ''}
                                                ${(member.declined == 1) ? `
                                                                                                                    <td class="accordian_img_acces">
                                                                                                                        <img src="{{ asset('assets/images/cancel-red-img.png') }}" alt="Declined">
                                                                                                                    </td>` : ''}
                                            </tr>`;
                                    }
                                });
                                accordion += `
                                        <tr class="divider-line"></tr>
                                        </table>
                                    </div>
                                </div>`;

                                $('#GuestList').append(accordion); // Append each accordion to the list
                            }
                        });
                    }

                    if (filter == "checked-in") {
                    var checkedInGuestsCount = 0;
                    var checkedInMembersCount = 0;

                    guests.forEach(function(guest) {
                        // Check if the main guest is checked in
                        if (guest.checkin == 1 || guest.members.some(member => member.checkin == 1)) {
                            checkedInGuestsCount++;
                        }

                        // Check if any of the guest's members are checked in
                        if (guest.members && guest.members.some(member => member.checkin == 1)) {
                            checkedInMembersCount += guest.members.filter(member => member.checkin == 1).length;
                        }
                    });
                    var br = '<br>';
                    // Update the totals display with separate checked-in counts for guests and members
                    $('#guestMemberTotal').html(`TOTAL: ${checkedInGuestsCount + checkedInMembersCount} ${br} (guests ${checkedInGuestsCount} - members ${checkedInMembersCount})`);
                    guests.forEach(function(guest) {
                        // Only include guests who are checked-in
                        if (guest.checkin == 1 || guest.members.some(member => member.checkin == 1)) {
                            var accordion = `
                                <div class="accordion">
                                    <div class="table-box" ${(guest.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton(event)">
                                                    ${guest.titleGuest == null ? ' ' : guest.titleGuest} ${guest.name}

                                                    <span class="${guest.checkin == 0 ? 'd-none' : ''}">
                                                        <br><i class="fa fa-whatsapp"></i> ${(guest.whatsapp == null || guest.whatsapp == '') ? 'N/A' : guest.whatsapp}
                                                    <br><i class="fa fa-phone"></i> ${(guest.phone == null || guest.phone == '') ? 'N/A' : guest.phone}
                                                    <br><i class="fa fa-envelope"></i> ${(guest.email == null || guest.email == '') ? 'N/A' : guest.email}
                                                        ${(guest.members_number == guest.members.length ) ? 
                                                        `<br><span class="text-danger">{{ __('guestlistpage.all members allowed added') }}</span>` : 
                                                        `<br><span class="text-success">{{ __('guestlistpage.open') }}</span> (${guest.members.length} {{ __('guestlistpage.of') }} ${guest.members_number} {{ __('guestlistpage.allowed') }})` }
                                                        <br>Table: ${(guest.id_table !== 0 && guest.id_table !== null && guest.table != undefined) ? guest.table.name : 'N/A'}
                                                    </span>
                                                </td>
                                                <td>Meal: ${guest.meal ? guest.meal.name : 'N/A'}</td>
                                                <td>Allergies: ${guest.allergies == 1 ? 'Yes' : 'No'}</td>
                                                <td>${guest.notes || 'No Notes'}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary t-btn t-btn-theme" id="addMember" data-toggle="modal" data-target="#AddMember" data-parentidguest-id="${guest.id_guest}">
                                                        {{ __('guestlistpage.add_member') }}
                                                    </button>
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
                                                <td><strong>{{ __('guestlistpage.member_details') }}</strong></td>
                                                <td><strong>{{ __('guestlistpage.note') }}</strong></td>
                                                <td><strong>{{ __('guestlistpage.other_details') }}</strong></td>
                                                <td><strong>{{ __('guestlistpage.attending_event') }}</strong></td>
                                            </tr>`;

                            // Loop through each member of the guest and add them only if checkin == 1
                            guest.members.forEach(function(member) {
                                if (member.checkin == 1) {
                                    accordion += `
                                        <tr class="divider-line"></tr>
                                        <tr ${(member.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                            <td><input type="checkbox" class="check_box_style" data-guest-id="${member.id_guest}" onclick="showButton(event)">
                                            ${member.titleGuest == null ? ' ' : member.titleGuest} ${member.name}</td>
                                            <td>${member.notes || 'No Notes'}</td>
                                            <td>
                                                <ul>
                                                    <li><strong>{{ __('guestlistpage.meal') }}: </strong>${member.meal ? member.meal.name : 'N/A'}</li>
                                                    <li><strong>{{ __('guestlistpage.table') }}: </strong>${(member.id_table !== 0 && member.id_table !== null && member.table != undefined) ? member.table.name : 'N/A'}</li>
                                                    <li><strong>{{ __('guestlistpage.allergies') }}: </strong>${member.allergies ? member.allergies : 'N/A'}</li>
                                                </ul>
                                            </td>
                                            ${(member.opened == 2 && member.declined != 1) ? `
                                                <td class="accordian_img_acces">
                                                    <img src="{{ asset('assets/images/tick-green-img.png') }}" alt="Tick">
                                                </td>` : ''}
                                            ${(member.declined == 1) ? `
                                                <td class="accordian_img_acces">
                                                    <img src="{{ asset('assets/images/cancel-red-img.png') }}" alt="Declined">
                                                </td>` : ''}
                                        </tr>`;
                                }
                            });

                            accordion += `
                                <tr class="divider-line"></tr>
                                </table>
                                </div>
                            </div>`;

                            // Append the accordion to the GuestList
                            $('#GuestList').append(accordion);
                        }
                    });
                }



                    if (filter == "not-open") {
                        var notOpenedGuestsCount = 0;
                        var notOpenedMembersCount = 0;

                        guests.forEach(function(guest) {
                            // Check if guest or any member has opened == 0 or null (not open)
                            if ((guest.opened == 0 || guest.opened == null) || guest.members.some(member => member.opened == 0 || member.opened == null)) {
                                if (guest.opened == 0 || guest.opened == null) {
                                    notOpenedGuestsCount++; // Count not-open guest
                                }
                                var br = '<br>';
                                $('#guestMemberTotal').html(`TOTAL: ${notOpenedGuestsCount} ${br} (guests ${notOpenedGuestsCount} - members ${notOpenedMembersCount})`);
                                // Show guest and their members if the guest is checked in
                                var accordion = `
                                    <div class="accordion" ${(guest.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                        <div class="table-box">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton(event)">
                                                        ${guest.titleGuest == null ? ' ' : guest.titleGuest} ${guest.name}
                                                        <span class="${guest.opened == 0 ? 'd-none' : ''}">
                                                            <br><i class="fa fa-whatsapp"></i> ${(guest.whatsapp == null || guest.whatsapp == '') ? 'N/A' : guest.whatsapp}
                                                    <br><i class="fa fa-phone"></i> ${(guest.phone == null || guest.phone == '') ? 'N/A' : guest.phone}
                                                    <br><i class="fa fa-envelope"></i> ${(guest.email == null || guest.email == '') ? 'N/A' : guest.email}
                                                            ${(guest.members_number == guest.members.length ) ? 
                                                        `<br><span class="text-danger">{{ __('guestlistpage.all members allowed added') }}</span>` : 
                                                        `<br><span class="text-success">{{ __('guestlistpage.open') }}</span> (${guest.members.length} {{ __('guestlistpage.of') }} ${guest.members_number} {{ __('guestlistpage.allowed') }})` }
                                                            <br>Table: ${(guest.id_table !== 0 && guest.id_table !== null && guest.table != undefined) ? guest.table.name : 'N/A'}
                                                        </span>
                                                    </td>
                                                    <td>Meal: ${guest.meal ? guest.meal.name : 'N/A'}</td>
                                                    <td>Allergies: ${guest.allergies == 1 ? 'Yes' : 'No'}</td>
                                                    <td>${guest.notes || 'No Notes'}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary t-btn t-btn-theme" id="addMember" data-toggle="modal"
                                                        data-target="#AddMember" data-parentidguest-id="${guest.id_guest}">{{ __('guestlistpage.add_member') }}</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    `;

                                // Loop through each member of the guest and add them only if checkin == 1
                                if (guest.members && guest.members.length > 0) {
                                    csvContent += "MEMBER, , , , , \n";
                                    guest.members.forEach(function(member) {
                                        if ((member.opened == 0 || member.opened == null)) {
                                            accordion += `
                                                    <div class="accordion-content">
                                        <div class="table-box">
                                            <table>
                                                <p class="after-line-effect">Members</p>
                                                <tr>
                                                    <td><strong>{{ __('guestlistpage.member_details') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.note') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.other_details') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.attending_event') }}</strong></td>
                                                </tr>
                                                <tr class="divider-line"></tr>
                                                <tr ${(member.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                                    <td><input type="checkbox" class="check_box_style" data-guest-id="${member.id_guest}" onclick="showButton(event)">
                                                    ${member.titleGuest == null ? ' ' : member.titleGuest} ${member.name}</td>
                                                    <td>${member.notes || 'No Notes'}</td>
                                                    <td>
                                                        <ul>
                                                            <li><strong>{{ __('guestlistpage.meal') }}: </strong>${member.meal ? member.meal.name : 'N/A'}</li>
                                                            <li><strong>{{ __('guestlistpage.table') }}: </strong>${(member.id_table !== 0 && member.id_table !== null && member.table != undefined) ? member.table.name : 'N/A'}</li>
                                                            <li><strong>{{ __('guestlistpage.allergies') }}: </strong>${member.allergies ? member.allergies : 'N/A'}</li>
                                                        </ul>
                                                    </td>
                                                    ${(member.opened == 2 && member.declined != 1) ? `
                                                                                                <td class="accordian_img_acces">
                                                                                                    <img src="{{ asset('assets/images/tick-green-img.png') }}" alt="Tick">
                                                                                                </td>` : ''}
                                                    ${(member.declined == 1) ? `
                                                                                                <td class="accordian_img_acces">
                                                                                                    <img src="{{ asset('assets/images/cancel-red-img.png') }}" alt="Declined">
                                                                                                </td>` : ''}
                                                </tr>`;
                                        }
                                    });

                                    accordion += `
                                            <tr class="divider-line"></tr>
                                            </table>
                                        </div>
                                    </div>`;

                                }
                                // Append the accordion to the GuestList
                                $('#GuestList').append(accordion);
                            }
                        });
                    }


                    if (filter === "a-to-z" || filter === "z-to-a") {
                        if (Array.isArray(guests) && guests.length > 0) {
                            // Sort guests array based on the filter
                            if (filter === "a-to-z" || filter === "z-to-a") {
                                guests.sort((a, b) => {
                                    return filter === "a-to-z" ? a.name.localeCompare(b.name) : b.name
                                        .localeCompare(a.name);
                                });
                            }

                            // Clear the existing guest list before appending sorted results
                            $('#GuestList').empty();

                            guests.forEach(function(guest) {
                                let accordion = `
                                <div class="accordion" ${(guest.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                    <div class="table-box">
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="check_box_style" data-guest-id="${guest.id_guest}" onclick="showButton(event)">
                                                    ${guest.titleGuest == null ? ' ' : guest.titleGuest} ${guest.name}
                                                    <span>
                                                        <br><i class="fa fa-whatsapp"></i> ${(guest.whatsapp == null || guest.whatsapp == '') ? 'N/A' : guest.whatsapp}
                                                    <br><i class="fa fa-phone"></i> ${(guest.phone == null || guest.phone == '') ? 'N/A' : guest.phone}
                                                    <br><i class="fa fa-envelope"></i> ${(guest.email == null || guest.email == '') ? 'N/A' : guest.email}
                                                        ${(guest.members_number == guest.members.length ) ? 
                                                        `<br><span class="text-danger">{{ __('guestlistpage.all members allowed added') }}</span>` : 
                                                        `<br><span class="text-success">{{ __('guestlistpage.open') }}</span> (${guest.members.length} {{ __('guestlistpage.of') }} ${guest.members_number} {{ __('guestlistpage.allowed') }})` }
                                                        <br>Table: ${(guest.id_table !== 0 && guest.id_table !== null && guest.table != undefined) ? guest.table.name : 'N/A'}
                                                    </span>
                                                </td>
                                                <td>Meal: ${guest.meal ? guest.meal.name : 'N/A'}</td>
                                                <td>Allergies: ${guest.allergies == 1 ? 'Yes' : 'No'}</td>
                                                <td>${guest.notes || 'No Notes'}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary t-btn t-btn-theme" id="addMember" data-toggle="modal"
                                                    data-target="#AddMember" data-parentidguest-id="${guest.id_guest}">{{ __('guestlistpage.add_member') }}</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>`;

                                // If the guest has members, iterate over each member to create their row
                                if (Array.isArray(guest.members) && guest.members.length > 0) {
                                    accordion += `
                                    <div class="accordion-content">
                                        <div class="table-box">
                                            <table>
                                                <p class="after-line-effect">Members</p>
                                                <tr>
                                                    <td><strong>{{ __('guestlistpage.member_details') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.note') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.other_details') }}</strong></td>
                                                    <td><strong>{{ __('guestlistpage.attending_event') }}</strong></td>
                                                </tr>`;

                                    guest.members.forEach(function(member) {
                                        accordion += `
                                        <tr class="divider-line"></tr>
                                        <tr ${(member.declined == 1 ? 'style="background-color: #ffdbdb  !important;"' : '')}>
                                            <td>
                                                <input type="checkbox" class="check_box_style" data-guest-id="${member.id_guest}" onclick="showButton(event)">
                                                ${member.titleGuest == null ? ' ' : member.titleGuest} ${member.name}
                                            </td>
                                            <td>${member.notes || 'No Notes'}</td>
                                            <td>
                                                <ul>
                                                    <li><strong>{{ __('guestlistpage.meal') }}: </strong>${member.meal ? member.meal.name : 'N/A'}</li>
                                                    <li><strong>{{ __('guestlistpage.table') }}: </strong>${(member.id_table !== 0 && member.id_table !== null && member.table != undefined) ? member.table.name : 'N/A'}</li>
                                                    <li><strong>{{ __('guestlistpage.meal') }}: </strong>${member.allergies ? member.allergies : 'N/A'}</li>
                                                </ul>
                                            </td>
                                            ${(member.opened == 2 && member.declined != 1) ? `
                                                                                <td class="accordian_img_acces">
                                                                                    <img src="{{ asset('assets/images/tick-green-img.png') }}" alt="Tick">
                                                                                </td>` : ''}
                                            ${(member.declined == 1) ? `
                                                                                <td class="accordian_img_acces">
                                                                                    <img src="{{ asset('assets/images/cancel-red-img.png') }}" alt="Declined">
                                                                                </td>` : ''}
                                        </tr>`;
                                    });

                                    accordion += `
                                        <tr class="divider-line"></tr>
                                    </table>
                                    </div>
                                </div>`;
                                }

                                // Append each accordion to the list
                                $('#GuestList').append(accordion);
                            });
                        }
                    }

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
                                    var familyName = nameParts.length > 1 ? nameParts
                                        .pop() :
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
                                    var familyName = nameParts.length > 1 ? nameParts
                                        .pop() :
                                        "-";
                                    var name = nameParts.join(" ") || "-";

                                    csvContent +=
                                        `${guest.id_guest},${title ?? "-"},${name ?? "-"},${familyName ?? "-"},${guest.email ? guest.email : "-"},${guest.phone ? guest.phone : "-"},${guest.whatsapp ? guest.whatsapp : "-"},${mealName},${table},${status}\n`;
                                }

                                if (guest.members && guest.members.length > 0) {
                                    csvContent += "MEMBER, , , , , \n";
                                    guest.members.forEach(function(member) {
                                        if ((member.checkin == 1 && member
                                                .declined ==
                                                null && (member.id_meal != null ||
                                                    member.opened == 2)) ||
                                            ((member.opened == 2 || member
                                                    .id_meal !=
                                                    null) && member.declined ==
                                                null)) {

                                            var status = "Confirmed";
                                            var mealName = member.meal ? member.meal
                                                .name : "-";
                                            var table = member.table ? member.table
                                                .number : "-";
                                            var nameParts = member.name ? member
                                                .name
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
                                var familyName = nameParts.length > 1 ? nameParts.pop() :
                                    "-";
                                var name = nameParts.join(" ") || "-";

                                if (guest.declined === 1) {
                                    var status = "Declined";
                                    csvContent +=
                                        `${guest.id_guest},${title},${name},${familyName},${guest.email || "-"},${guest.phone || "-"},${guest.whatsapp || "-"},${mealName},${table},${status}\n`;
                                }

                                guest.members.forEach(function(member) {
                                    if (member.declined == 1) {
                                        var memberMealName = member.meal ? member
                                            .meal
                                            .name : "-";
                                        var memberTable = member.table ? member
                                            .table
                                            .number : "-";
                                        var memberNameParts = member.name ? member
                                            .name
                                            .split(" ") : [];
                                        var memberFamilyName = memberNameParts
                                            .length >
                                            1 ? memberNameParts.pop() : "-";
                                        var memberName = memberNameParts.join(
                                                " ") ||
                                            "-";
                                        var memberStatus = "-";

                                        if (member.opened == 2) memberStatus =
                                            "Confirmed";
                                        else if (member.declined == 1)
                                            memberStatus =
                                            "Declined";
                                        else if (member.checkin === 1)
                                            memberStatus =
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
                                    var familyName = nameParts.length > 1 ? nameParts
                                        .pop() :
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
            var formData = $('#EditguestForm').serialize();

            $.ajax({
                url: "{{ route('panel.event.guests.update', ':id') }}"
                    .replace(':id', guestId),
                type: "POST",
                data: formData,
                success: function(response) {
                    if(response.error){
                        toastr.error(response.error);
                    }else{
                        
                        // Optionally reload guest list
                        showGuest("1");
                        toastr.success('Guest updated successfully');
                    $('#EditGuestClose').click();
                    $('#modifier').css('display', 'none');
                    $('#modifierButton').css('display', 'none');

                    // Uncheck the checkbox
                    if (clickedCheckbox) {
                        clickedCheckbox.checked =
                            false; // Uncheck the checkbox
                    }
                }
                },
                error: function(xhr, status, error) {
                        // Handle validation or server errors
                        var errors = xhr.responseJSON.errors;
                        console.log(errors);
                        $.each(errors, function(key, value) {
                            // alert(key + ": " + value);
                            toastr.error(key + ": " + value);
                        });
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
                        toastr.success("Guests imported successfully!");
                        idArray = [];
                        $("#uploadCsvClose").click();
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        //                         alert("Error uploading the file.");
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
        let guestId; // Variable to hold the ID of the guest to be deleted
        function showDeleteModal(id) {
            guestId = id; // Store the guest ID
            var myModal = new bootstrap.Modal(
                document.getElementById(
                    'delguestModal'));
            myModal.show(); // Show the modal
        }

        function deleteGuest() {
            if (guestId) {
                $.ajax({
                    url: "{{ route('panel.event.deleteGuest', ['id' => $eventId]) }}", // Your route for deletion
                    type: "POST",
                    data: {
                        guestid: guestId, // Send the stored guest ID
                        idevent: "{{ $eventId }}", // Include event ID
                        _token: "{{ csrf_token() }}" // Ensure CSRF token is included
                    },
                    success: function(response) {
                        showGuest("1"); // Reload the guest list
                        toastr.success('Guest deleted successfully');
                        $('#delguestModalClose').click(); // Hide modal after successful deletion
                        guestId = null; // Reset the guest ID
                        $('.delete-btn').hide(); // Hide delete button
                    },
                    error: function(xhr) {
                        alert('Something went wrong: ' + xhr.responseText);
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
                        if (response.mainguest == 0) {
                            $('#edit_members').hide();
                            $('#members_label').hide();
                            $('#edit_members').val('');
                        } else {
                            $('#edit_members').show();
                            $('#members_label').show();
                            $('#edit_members').attr('min', response.members.length);
                            $('#edit_members').val(response.members_number);
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
            $("#send-invitaion").prop("disabled", true);
            $("#send-invitaion").text("Sending...");
            var formData = {}; // Initialize an empty object to collect checked options
            // Collect checked options only
            $('#SendInvitationForm input[type="checkbox"]:checked').each(
                function() {
                    formData[$(this).attr('name')] = 1; // Set the value to 1 if checked
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
                    $('#SendInvitationForm')[0].reset(); // Reset the form after success
                    $("#closeSendInvitationForm").click();
                    idArray = []; // Close the modal (assuming this button closes it)
                    $("#send-invitaion").prop("disabled", false);
                    $("#send-invitaion").text("Send Invitation");

                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('An error occurred while sending invitations');
                    $("#send-invitaion").prop("disabled", false);
                    $("#send-invitaion").text("Send Invitation");
                }
            });
        }



        function ExportGuestQr() {
            // Get values directly from form inputs
            const mealId = $('#idevent').val();
            const date = $('#reservationDate').val();
            const baseUrl = $('#baseUrl').val();
            // Define the URL with query parameters
            const url = `${baseUrl}/event/${mealId}/get-guests-qr/${date}?idevent=${mealId}&reservationDate=${date}`;

            // Open the URL directly in a new tab to download the PDF
            window.open(url, '_blank');
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
                    // console.error(error);
                    // alert('An error');
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
