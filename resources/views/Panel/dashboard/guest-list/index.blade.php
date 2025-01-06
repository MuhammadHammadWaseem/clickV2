@extends('Panel.Layout.master')
@if ($isCorporate == 1)
    <style>
        /* corporate */
        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box h4 {
            padding: 10px 0;
            border-bottom: 1px solid #80808047;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box p {
            padding: 10px 0;
            border-bottom: 1px solid #80808047;
        }

        .remove-btn-css {
            background-color: #A9967D !important;
            color: white !important;
            font-size: 14px;
            padding: 5px 20px;
            border-radius: 15px;
            transition: .3s;
            border: navajowhite;
        }

        .remove-btn-css:hover {
            background-color: #A9964B !important;
            color: white !important;
        }

        /* corporate */
    </style>
@endif
<style>
    .management-active::after {
        width: 5px;
        height: 100%;
        background-color: #C09D2A;
        position: absolute;
        left: 0;
        right: 0;
        content: "";
        top: 0;
    }

    .management-active a {
        color: #C09D2A !important;
    }

    .management-active img {
        filter: none !important;
    }

    .management-active {
        background-color: #c09d2a29 !important;
    }


    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes {
        /* border-bottom: 1px solid #00000038; */
        margin-bottom: 10px;
        padding-bottom: 10px;
        margin-top: 20px;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .th-boxes {
        display: flex;
        justify-content: space-between;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box {
        width: 100%;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align {
        display: flex;
        flex-direction: column;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align .top-box {
        display: flex;
        margin: 20px 0;
        align-items: center;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align .bottom-box {
        display: flex;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box h6 {
        color: #2A2A2A;
        font-size: 17px;
        font-weight: 700;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box h5 {
        color: #A9967D;
        font-size: 15px;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box h4 {
        font-size: 15px;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box p {
        font-size: 14px;
    }


    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align .top-box .box .three-action-align {
        display: flex;
        gap: 10px;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align .top-box .box .three-action-align button {
        background-color: #ff000000;
        border-right: 1px solid #00000033;
        padding-right: 10px;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align .top-box .box .three-action-align button:last-child {
        border: none;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align .top-box .box .three-action-align button:focus {
        border-right: 1px solid #00000033 !important;
    }




    .main-dashboard-sec .left-menu-dash ul li.table-active a {
        color: #C09D2A;
    }

    .main-dashboard-sec .left-menu-dash ul li.table-active img {
        filter: none;
    }

    .main-dashboard-sec .left-menu-dash ul li.table-active {
        background-color: #c09d2a29;
    }

    .main-dashboard-sec .left-menu-dash ul li.table-active::after {
        width: 5px;
        height: 100%;
        background-color: #C09D2A;
        position: absolute;
        left: 0;
        right: 0;
        content: "";
        top: 0;
    }


    #BtnsBox {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        column-gap: 20px;
    }

    .radios {
        flex: 1 0 0%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .radios input[type="radio"] {
        display: none;
    }

    .radios label {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        cursor: pointer;
        padding: 10px 30px;
        font-size: 13px;
        border: 1px solid #A9967D !important;
        color: black !important;
        border-radius: 5px;
        text-align: center;
        transition: all 0.3s ease;
        border-radius: 15px;
    }

    .radios label:hover {
        background-color: #A9967D !important;
        color: #fff !important;
    }

    .radios input[type="radio"]:checked+label {
        background-color: #A9967D !important;
        color: #fff !important;
    }

    .two-btn-align {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        column-gap: 10px;
    }


    input#guestSearchInput {
        width: 100%;
        margin-bottom: 10px;
        border-radius: 50px;
        height: 50px;
        border: 1px solid #999999;
        padding-left: 20px;
        font-size: 17px;
        padding-right: 15px;
        outline: none;
        color: #4A4A4A;
        box-shadow: none;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        transition: all 0.3s ease;
    }


    @media only screen and (max-width: 1600px) {}

    @media only screen and (max-width: 1400px) {

        #BtnsBox {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            column-gap: 20px;
        }

        .two-btn-align {
            flex-direction: column;
            align-items: stretch;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list .two-btn-align {
        row-gap: 10px;
        column-gap: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row ;
        flex-wrap: nowrap;
    }
    }

    @media only screen and (max-width: 1199px) {

        .radios label {
            font-size: 12px;
            padding: 8px 20px;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box:last-child p {
            text-align: center;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box:last-child h4 {
            text-align: center;
        }

        .t-btn {
            font-size: 13px !important;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes {
    overflow: scroll;
    overflow-y: hidden;
}
.box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes::-webkit-scrollbar{
    height: 5px;
}

.box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .th-boxes, .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes div#tableAppend {
    width: 900px !important;
}

    }

    @media only screen and (max-width: 1024px) {}

    @media only screen and (max-width: 991px) {
        #BtnsBox {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            justify-content: center;
            column-gap: 20px;
        }

        #tableAppend .bottom-box::-webkit-scrollbar {
            height: 5px;
        }

        #tableAppend .bottom-box .box {
            width: 200px;
            max-width: 200px;
            flex: 0 0 200px;
        }
    }

    @media only screen and (max-width: 767px) {

        .box-styling.event-photos-gallery .two-things-align {
            display: flex;
            align-items: center !important;
            flex-direction: column;
            justify-content: center !important;
            row-gap: 50px;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list .two-btn-align {
            flex-wrap: wrap;
            row-gap: 10px;
            column-gap: 10px;
            display: flex;
            align-items: stretch;
            justify-content: center;
            width: 100%;
        }

        .t-btn {
            text-align: center;
        }

        .box-styling.event-photos-gallery .two-things-align .text p {
            text-align: center;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box h6 {
            font-size: 14px;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align .top-box .box .three-action-align button img {
            max-width: 80%;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .th-boxes, .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes div#tableAppend {
        width: 550px !important;
    }

    .box-styling.event-photos-gallery.events-lists-sec-01.guest-list .two-btn-align {
        flex-wrap: wrap;
        row-gap: 10px;
        column-gap: 10px;
        display: flex;
        align-items: stretch !important;
        flex-direction: column;
        justify-content: center;
    }


    }

    @media only screen and (max-width: 575px) {

        .box-styling.event-photos-gallery .two-things-align {
            flex-direction: column;
            row-gap: 10px !important;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align .top-box {
            display: flex;
            margin: 20px 0;
            align-items: flex-start;
            flex-direction: column;
            row-gap: 15px;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .th-boxes {
            overflow: scroll;
            overflow-y: hidden;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .th-boxes .box {
            width: 100px;
            flex: 0 0 100px;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .th-boxes::-webkit-scrollbar {
            height: 5px;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .box h6 {
            font-size: 12px;
        }

        .management-plan .management-plan-box .box h6 {
            text-align: center;
        }

        .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .th-boxes, .box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes div#tableAppend {
        width: 100% !important;
    }


    }
</style>
@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $eventId = GeneralHelper::getEventId();
    @endphp
    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling table-management">
                    <div class="text">
                        <h2>{{ __('table.table_management') }}</h2>
                        <p>{{ __('table.guest_seating_info') }}</p>
                        <p>{{ __('table.correct_table_number') }}</p>
                        <p>{{ __('table.correct_table_number') }}</p>
                        <p class="bold-text-color-change text-center">{{ __('table.declined_non_confirmed_guests') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling management-plan">
                    <div class="two-plan-details-align">
                        <div class="text">
                            <h2>{{ __('table.management_plan') }}</h2>
                        </div>
                    </div>
                    <div class="management-plan-box">
                        @if (file_exists($event->imgplan))
                            <input type="file" id="tablePhoto" name="tablePhoto" class="d-none" />
                            <label id="uploadtablePhoto">
                                <img id="tableImgPlan" src="{{ asset($event->imgplan) }}" width="600px" height="300px" alt="">
                            </label>
                            <p id="tablePhotoText" class="d-none" style="font-size: 11px !important; text-align:center !important;">
                        @else
                            <div class="box upload_boxex">
                                <input type="file" id="tablePhoto" name="tablePhoto" class="d-none" />
                                <label id="uploadtablePhoto">
                                    {{-- <img src="{{ asset('assets/images/dinner-table.png') }}" alt="Upload Icon"> --}}
                                    <img src="{{ asset('assets/Panel/images/uploadFile.png') }}" alt="Upload Icon">
                                </label>
                                <h6>{{ __('table.Here you can upload your tables plan') }}</h6>
                                <p id="tablePhotoText" style="font-size: 11px !important; text-align:center !important;">
                                    {{ __('table.No File Selected') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery events-lists-sec-01 guest-list details">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>{{ __('table.details') }}</h2>
                            @if ($isCorporate == 1)
                                <p>{{ __('table.total_tables') }} <span id="totalTables"></span> </p>
                                <p>{{ __('table.total_guests') }} <span id="totalGuests"></span> </p>
                            @endif
                        </div>
                        @if ($isCorporate == 1)
                            <div class="col radios" id="BtnsBox">
                                <div class="div">
                                    <input type="radio" name="seat-selection" id="can-select-seats"
                                        {{ $event->guestCanSelectSeats == 0 ? 'checked' : '' }}>
                                    <label for="can-select-seats"
                                        onclick="guestCanSelectSeats(0)">{{ __('table.I will select seats') }}</label>
                                </div>
                                <div class="div">
                                    <input type="radio" name="seat-selection" id="can-not-select-seats"
                                        {{ $event->guestCanSelectSeats == 1 ? 'checked' : '' }}>
                                    <label for="can-not-select-seats"
                                        onclick="guestCanSelectSeats(1)">{{ __('table.Guest will select seats') }}</label>
                                </div>
                            </div>
                        @endif
                        <div class="two-btn-align">
                            <button type="button" class="btn btn-primary t-btn t-btn-theme" data-toggle="modal"
                                data-target="#exampleModalCenter04">{{ __('table.add_table') }}</button>

                            <a href="/print-table/{{ $eventId }}" class="t-btn">{{ __('table.print_plan') }}</a>
                            @if ($isCorporate == 0)
                                <button type="button" class="btn btn-primary t-btn t-btn-theme" data-toggle="modal"
                                    data-target="#reminderModal">{{ __('table.reminder') }}</button>
                            @endif
                        </div>
                    </div>

                    <div class="table-align-boxes">
                        <div class="th-boxes">
                            <div class="box">
                                <h6> {{ __('table.table_name') }}</h6>
                            </div>
                            <div class="box">
                                <h6> {{ __('table.table_number') }}</h6>
                            </div>
                            <div class="box">
                                <h6> {{ __('table.guest_allowed') }}</h6>
                            </div>
                            <div class="box">
                                <h6> {{ __('table.actions') }}</h6>
                            </div>
                        </div>

                        <div id="tableAppend">
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="exampleModalCenter04" tabindex="-1"
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
                        <h2>{{ __('table.new_table') }}</h2>
                    </div>
                    <div class="main-form-box mt-3">
                        <form id="createTableForm">
                            <input type="number" id="tableNumber" name="table_number"
                                placeholder="{{ __('table.table_number_placeholder') }}" required>
                            <input type="text" id="tableName" name="table_name"
                                placeholder="{{ __('table.table_name_placeholder') }}" required>
                            <input type="number" id="maxGuest" name="max_guest"
                                placeholder="{{ __('table.max_guest_placeholder') }}" required>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeAddModalBtn"
                        data-dismiss="modal">{{ __('table.close') }}</button>

                        <button type="button" data-dismiss="modal" class="d-none"
                        id="closeAddModalBtn1">{{ __('meal.close_button') }}</button>

                    <button type="button" class="submit-btn btn btn-primary t-btn"
                        id="addTableButton">{{ __('table.add_table') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="editTableModal" tabindex="-1"
        role="dialog" aria-labelledby="editTableModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('table.edit_table') }}</h2>
                    </div>
                    <div class="main-form-box mt-3">
                        <form id="editTableForm">
                            <input type="hidden" id="editTableId">
                            <label for="editTableName">{{ __('table.table_name_placeholder') }}</label>
                            <input type="text" id="editTableName" name="table_name" required>
                            <label for="editTableNumber">{{ __('table.table_number_placeholder') }}</label>
                            <input type="number" id="editTableNumber" name="table_number" required>
                            <label for="editMaxGuest">{{ __('table.max_guest_placeholder') }}</label>
                            <input type="number" id="editMaxGuest" name="max_guest" required>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeEditModal"
                        data-dismiss="modal">{{ __('table.close') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn"
                        id="saveEditTable">{{ __('table.save_changes') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="deleteTableModal" tabindex="-1"
        role="dialog" aria-labelledby="deleteTableModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('table.confirm_deletion') }}</h2>
                        <p>{{ __('table.delete_table_confirmation') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeDeleteModal"
                        data-dismiss="modal">{{ __('table.cancel') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn"
                        id="confirmDeleteTable">{{ __('table.yes_delete') }}</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="exampleModalCenter02" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('table.guest_table') }}</h2>
                        <p>{{ __('table.guests_of_table') }}<span id="dynamicTableName"></span></p>
                    </div>
                    <div class="modal-table-type-content">
                        <div class="search-box">
                            <input type="text" id="guestSearchInput" placeholder="Search by Guest or Main Guest">
                        </div>

                        <div class="main-heading">
                            <ul>
                                <li>{{ __('table.name') }}</li>
                                <li>{{ __('table.meal') }}</li>
                                <li>{{ __('table.table') }}</li>
                                <li>{{ __('table.main_guest') }}</li>
                                <li>{{ __('table.actions') }}</li>
                            </ul>
                        </div>

                        <div id="sub-main-content">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeSetTableModal"
                        data-dismiss="modal">{{ __('table.no_i_dont') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" id="saveGuestTableChanges"
                        data-toggle="modal" data-target="#exampleModalCenter">{{ __('table.set_table') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="exampleModalCenter022" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('table.guest_table') }}</h2>
                        <p>{{ __('table.guests_of_table') }}<span id="dynamicTableName"></span></p>
                    </div>
                    <div class="modal-table-type-content">
                        <div class="main-heading">
                            <ul>
                                <li>{{ __('table.name') }}</li>
                                <li>{{ __('table.number_of_guests') }}</li>
                                <li>{{ __('table.table') }}</li>
                                <li>{{ __('table.actions') }}</li>
                            </ul>
                        </div>

                        <div id="sub-main-content2">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeSetTableModal2"
                        data-dismiss="modal">{{ __('table.set_table') }}</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="reminderModal" tabindex="-1" role="dialog"
        aria-labelledby="reminderModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('table.new_table') }}</h2>
                    </div>
                    <div class="modal-table-type-content">
                        <div class="main-heading">
                            <ul>
                                <li style="width:100% !important;">{{ __('table.guests') }}</li>
                            </ul>
                        </div>

                        <div class="sub-main-content" id="reminderGuests">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="closeAddModalBtn"
                            data-dismiss="modal">{{ __('table.close') }}</button>
                        <button type="button" class="submit-btn btn btn-primary t-btn"
                            id="sendReminderBtn">{{ __('table.send_reminder') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter100" tabindex="-1" role="dialog"
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
                        <h2>{{ __('table.Changes Updated Successfully') }}</h2>
                        <p>{{ __('table.Guest can select seats successfully') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="closeUpdatedBtn">{{ __('table.close') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter101" tabindex="-1" role="dialog"
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
                        <h2>{{ __('table.Changes Updated Successfully') }}</h2>
                        <p>{{ __('table.Guest can not select seats') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        id="closeUpdatedBtn">{{ __('table.close') }}</button>
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
                        <h2>{{ __('table.more_table') }}</h2>
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
@endsection
@section('scripts')
    <script>

        $(document).ready(function () {
            // Search function
            $('#guestSearchInput').on('keyup', function () {
                const searchText = $(this).val().toLowerCase();
            
                // Loop through each guest row
                $('#sub-main-content .sub-main-content').filter(function () {
                    // Get guest name and main guest name
                    const guestName = $(this).find('li').eq(0).text().toLowerCase();
                    const mainGuestName = $(this).find('li').eq(3).text().toLowerCase();
                
                    // Check if either name contains the search text
                    const isMatch =
                        guestName.includes(searchText) || mainGuestName.includes(searchText);
                
                    // Show or hide based on the match
                    $(this).toggle(isMatch);
                
                    if (isMatch && mainGuestName) {
                        // Show other rows with the same main guest
                        const mainGuestRows = $(`#sub-main-content .sub-main-content`)
                            .filter(function () {
                                return (
                                    $(this).find('li').eq(3).text().toLowerCase() ===
                                    mainGuestName
                                );
                            })
                            .show();
                    }
                });
            });
        });


        $("#add_meal").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter04'));
            successModal.show();
            $("#noGift2").click();
        });

        $("#closeAddModalBtn").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter025'));
            successModal.show();
        });

        $("#noGift").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter025'));
            successModal.show();
        });
        $("#noPhotos").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter026'));
            successModal.show();
        });
        // Trigger file input when the custom button is clicked
        document.getElementById('uploadtablePhoto').addEventListener('click', function() {
            document.getElementById('tablePhoto').click();
        });

        // Display file name and image preview when a file is selected
        document.getElementById('tablePhoto').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('tablePhotoText');
            const previewImage = document.getElementById('tablePhotoPreview');

            if (!file) {
                previewContainer.textContent = 'No File Selected';
                previewImage.style.display = 'none';
            } else {
                previewContainer.textContent = file.name;
            }
            submitTableData();
        });

        function submitTableData() {
            const file = document.getElementById('tablePhoto').files[0];
            const tableData = new FormData();

            // Append the file and any other data you want to send
            tableData.append('tablePhoto', file);
            tableData.append('idevent', "{{ $eventId }}");

            $.ajax({
                url: "{{ route('panel.event.editplan') }}",
                type: 'POST',
                data: tableData,
                processData: false, // Required for FormData
                contentType: false, // Required for FormData
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#tableImgPlan").attr('src', '/event-images/16/plan.jpg' + '?' + new Date().getTime());
                    countData();
                    toastr.success('Plan Image updated successfully.');
                },
                error: function() {
                    toastr.error('Failed to update the table. Please try again.');
                }
            });
        }

        let tableToDelete = null;
        let tableId;
        let tableIsFull = false;
        let tableGuests;
        let tableGuestLength;
        let totalTables = 0;
        let totalGuests = 0;
        let totalSeatedGuests = 0;

        countData();

        function countData() {
            totalTables = 0;
            totalGuests = 0;
            totalSeatedGuests = 0;
            $.ajax({
                url: "{{ route('panel.event.get.table.guest', ['id' => $eventId]) }}",
                type: 'GET',
                success: function(response) {
                    response.guests.forEach(guest => {
                        totalGuests++;
                        if (guest.tablename != undefined) {
                            totalSeatedGuests++;
                        }
                    });
                    $("#totalGuests").text(`${totalGuests} (${totalSeatedGuests} SEATED) `);
                },
                error: function(xhr) {
                    toastr.error('Failed to add gift. Please try again.');
                }
            });

            $.ajax({
                url: "{{ route('panel.event.get.tables', ['id' => $eventId]) }}",
                type: 'GET',
                success: function(response) {
                    let isCorporate = {{ $isCorporate }};

                    if (isCorporate == 1) {
                        response.table.forEach(table => {
                            totalTables++;
                        });
                        $("#totalTables").text(totalTables);
                    }
                },
                error: function(xhr) {
                    toastr.error('Failed to add gift. Please try again.');
                }
            });
        }


        appendReminderGuests();

        function appendReminderGuests() {
            $.ajax({
                url: "{{ route('panel.event.get.table.guest', ['id' => $eventId]) }}",
                type: 'GET',
                success: function(response) {
                    response.guests.forEach(guest => {
                        if (guest.mealName == undefined) {
                            $("#reminderGuests").append(`
                                <hr>
                                    <ul>
                                        <li style="width:100% !important;">${guest.name}</li>
                                    </ul>
                                <hr>
                                `);
                        }
                    });
                },
                error: function(xhr) {
                    toastr.error('Failed to add gift. Please try again.');
                }
            });
        }
        $(document).on('click', '#sendReminderBtn', function() {
            const uniqueIds = [];
            $.ajax({
                url: "{{ route('panel.event.get.table.guest', ['id' => $eventId]) }}",
                type: 'GET',
                success: function(response) {
                    response.guests.forEach(guest => {
                        if (guest.mealName == undefined) {
                            uniqueIds.push(guest.id_guest);
                        }
                    });
                    console.log("ss", uniqueIds);

                    $.ajax({
                        url: '{{ route('sendMealInvite') }}',
                        type: 'POST',
                        data: {
                            uniqueIds: uniqueIds,
                            _token: "{{ csrf_token() }}" // Laravel CSRF token for security
                        },
                        success: function(response) {
                            toastr.success('Meal Reminder Send Successfully!.');
                            getTable();
                            countData();
                        },
                        error: function() {
                            // toastr.error('Failed to assign guests to the table.');
                            toastr.success('Meal Reminder Send Successfully!.');
                        }
                    });

                },
                error: function(xhr) {
                    toastr.error('Failed to add gift. Please try again.');
                }
            });
        });

        $(document).on('click', '#openGuestModal', function() {
            const tableName = $(this).data('tablename');
            tableGuests = $(this).data('tableguests');
            tableGuestLength = $(this).data('tableguestlength');
            tableId = $(this).data('id');

            if (tableGuestLength > tableGuests) {
                tableIsFull = true;
                $("#saveGuestTableChanges").attr('disabled', true).text('Table is full');
            } else {
                tableIsFull = false;
                $("#saveGuestTableChanges").attr('disabled', false).text('Set Table');
            }

            $("#dynamicTableName").empty();
            $("#dynamicTableName").append(`${tableName} (${tableGuestLength}/${tableGuests} Guests)`);
            $("#sub-main-content").empty();

            $.ajax({
                url: "{{ route('panel.event.get.table.guest', ['id' => $eventId]) }}",
                type: 'GET',
                success: function(response) {
                    appendGuests(response.guests, tableId);
                },
                error: function(xhr) {
                    toastr.error('Failed to add gift. Please try again.');
                }
            });

            var deleteModal = new bootstrap.Modal(document.getElementById('exampleModalCenter02'));
            deleteModal.show();
        });

        $(document).on('click', '#openGuestModal2', function() {
            const tableId = $(this).data('tableid');
            const seatId = $(this).data('id');
            $.ajax({
                url: "{{ route('panel.event.get.table.guest', ['id' => $eventId]) }}",
                type: 'GET',
                success: function(response) {
                    console.log(response.guests);
                    $("#sub-main-content2").empty();
                    $("#closeSetTableModal2").click();
                    response.guests.forEach(guest => {
                        $("#sub-main-content2").append(`
                            <div class="sub-main-content">
                                <ul>
                                    <li>${guest.titleGuest ?? ""} ${guest.name}</li>
                                    <li>${guest.mealName ?? "-"}</li>
                                    ${(guest.id_table != 0) ?
                                        `<li class="text-success">${guest.tablename}</li>`
                                        :
                                        `<li class="text-danger">Not Seated</li>`
                                    }
                                    <li>
                                        <a href="#"><img src="{{ asset('assets/Panel/images/user-plus.png') }}" alt=""></a>
                                        <input type="checkbox" class="guest-checkbox2" data-guest-id="${guest.id_guest}" data-seatid="${seatId}" data-tableid="${tableId}"/>
                                    </li>
                                </ul>
                            </div>
                        `);
                    });
                },
                error: function(xhr) {
                    toastr.error('Failed to add gift. Please try again.');
                }
            });

            var deleteModal = new bootstrap.Modal(document.getElementById('exampleModalCenter022'));
            deleteModal.show();
        });

        function appendGuests(data) {
            data.forEach(guest => {
                console.log(guest.mainguest);
                const isChecked = guest.id_table === tableId ? 'checked' : '';
                $("#sub-main-content").append(`
                <div class="sub-main-content">
                    <label for="guest-checkbox-${guest.id_guest}" style="display: block !important;">
                    <ul>
                        <li>${guest.titleGuest ?? ""} ${guest.name}</li>
                        <li>${guest.mealName ?? "-"}</li>
                        ${(guest.id_table != 0 && guest.tablename != undefined) ?
                            `<li class="text-success">${guest.tablename}</li>`
                            :
                            `<li class="text-danger">Not Seated</li>`
                        }
                        <li>${guest.mainGuest ? guest.mainGuest.name : ""}</li>
                        <li>
                            <input id="guest-checkbox-${guest.id_guest}" type="checkbox" class="guest-checkbox" data-guest-id="${guest.id_guest}" ${isChecked}/>
                        </li>
                    </ul>
                    </label>
                </div>
            `);
            });
            // Update initial guest count based on checkboxes
            updateGuestCount();
        }

        // Event listener for checkboxes
        $(document).on('change', '.guest-checkbox', function() {
            updateGuestCount();
        });

        $(document).on('change', '.guest-checkbox2', function() {
            var seatId = $(this).data('seatid');
            var tableId = $(this).data('tableid');
            var guestId = $(this).data('guest-id');

            console.log(seatId, tableId, guestId);

            $.ajax({
                url: '{{ route('panel.event.settablesseat') }}',
                type: 'POST',
                data: {
                    seatId: seatId,
                    tableId: tableId,
                    guestId: guestId,
                    _token: "{{ csrf_token() }}" // Laravel CSRF token for security
                },
                success: function(response) {
                    toastr.success('Guests assigned to table successfully.');
                    getTable();
                    countData();
                    $("#closeSetTableModal2").click();
                },
                error: function() {
                    toastr.error('Failed to assign guests to the table.');
                }
            });
        });


        // Function to update guest count and check if table is full
        function updateGuestCount() {
            // Count the selected checkboxes
            const selectedCount = $('.guest-checkbox:checked').length;

            if (selectedCount > tableGuests) {
                $("#saveGuestTableChanges").attr('disabled', true).text('Table is full');
            } else {
                $("#saveGuestTableChanges").attr('disabled', false).text('Set Table');
            }
        }



        // Save checked guests to the table
        $(document).on('click', '#saveGuestTableChanges', function() {
            const selectedGuests = [];
            $('.guest-checkbox:checked').each(function() {
                selectedGuests.push($(this).data('guest-id'));
            });

            $.ajax({
                url: '{{ route('panel.event.set.table') }}',
                type: 'POST',
                data: {
                    table_id: tableId,
                    guests: selectedGuests,
                    _token: "{{ csrf_token() }}" // Laravel CSRF token for security
                },
                success: function(response) {
                    toastr.success('Guests assigned to table successfully.');
                    $('#closeSetTableModal').click();
                    getTable();
                    countData();
                },
                error: function() {
                    toastr.error('Failed to assign guests to the table.');
                }
            });
        });


        $(document).on('click', '.delete-table-btn', function() {
            tableToDelete = $(this).data('id'); // Get the table ID from the data-id attribute
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteTableModal'));
            deleteModal.show();
        });

        $('#confirmDeleteTable').click(function() {
            if (tableToDelete) {
                var url = `{{ route('panel.event.delete.table', ':id') }}`.replace(':id', tableToDelete);
                const tableData = {
                    idevent: {{ $eventId }}
                };
                $.ajax({
                    url: url, // Update with your route for deleting a table
                    type: 'POST',
                    data: tableData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#closeDeleteModal').click();
                        getTable(); // Refresh the table list
                        countData();
                        toastr.success('Table deleted successfully.');
                    },
                    error: function() {
                        toastr.error('Failed to delete the table. Please try again.');
                    }
                });
            }
        });

        $(document).on('click', '#removeGuest', function() {
            const tableData = {
                idevent: {{ $eventId }},
                tableId: $(this).data('tableid'),
                guestId: $(this).data('idguest'),
            };
            $.ajax({
                url: "{{ route('panel.event.removeGuest') }}",
                type: 'POST',
                data: tableData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    getTable(); // Refresh the table list
                    countData();
                    toastr.success('Table deleted successfully.');
                },
                error: function() {
                    toastr.error('Failed to delete the table. Please try again.');
                }
            });
        });


        function getTable() {
            $.ajax({
                url: "{{ route('panel.event.get.tables', ['id' => $eventId]) }}",
                type: 'GET',
                success: function(response) {
                    let isCorporate = {{ $isCorporate }};

                    if (isCorporate == 1) {

                        $("#tableAppend").empty();
                        response.table.forEach(table => {
                            $("#tableAppend").append(`
                                <div class="td-boxes-down-align">
                                    <div class="top-box">
                                        <div class="box">
                                            <h5>${table.name}</h5>
                                        </div>
                                        <div class="box">
                                            <h5>${table.number}</h5>
                                        </div>
                                        <div class="box">
                                            ${(table.guest_number - table.guests.length <= 0) ? `
                                                                                                                                                                        <h5><span class="text-danger">CLOSED</span> ${table.guests.length}/${table.guest_number}</h5>
                                                                                                                                                                    ` : `
                                                                                                                                                                        <h5><span class="text-success">OPEN</span> ${table.guests.length}/${table.guest_number}</h5>
                                                                                                                                                                    `}
                                        </div>
                                        <div class="box">
                                            <div class="three-action-align">
                                                <button class="edit-table-btn" data-id="${table.id_table}">
                                                    <img src="{{ asset('assets/images/edit-icon.png') }}" alt="">
                                                </button>
                                                <button class="delete-table-btn" data-id="${table.id_table}">
                                                    <img src="{{ asset('assets/images/delet-icon.png') }}" alt="">
                                                </button>
                                                ${(isCorporate == 1) ? '' : `
                                                                                                                                                                    <button id="openGuestModal" data-id="${table.id_table}" data-tableName="${table.name}" data-tableGuests="${table.guest_number}" data-tableGuestLength="${table.guests.length}">
                                                                                                                                                                        <img src="{{ asset('assets/images/Invitations.png') }}" alt="">
                                                                                                                                                                    </button>
                                                                                                                                                                `}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bottom-box">
                                        <div class="box">
                                            <h4>Seat Name</h4>
                                            ${table.seats.map(seat => `
                                                                                                                                        <p>${seat.seat_name}</p>
                                                                                                                                    `).join('')}
                                        </div>
                                        <div class="box">
                                            <h4>Guest Name</h4>
                                            ${table.seats.map(seat => `
                                                                                                                                        ${(seat.guest) ? `<p>${seat.guest.name}</p>
                                                ` : `
                                                <p>No Guest Assigned</p>
                                                `}
                                                                                                                                        `).join('')}
                                        </div>
                                        <div class="box">
                                            <h4>Email</h4>
                                            ${table.seats.map(seat => `
                                                                                                                ${(seat.guest && seat.guest.email) ? `<p>${seat.guest.email}</p>` : `<p>No Email Provided</p>`}
                                                                                                                     `).join('')}
                                        </div>
                                        <div class="box">
                                            <h4>Action</h4>
                                            ${table.seats.map(seat => `
                                                                                                                                        ${(!seat.guest) ? `
                                                <p><a href="#" class="remove-btn-css" id="openGuestModal2" data-tableid="${seat.id_table}" data-id="${seat.id}">Select Guest</a></p>
                                                ` : `
                                                <p><a href="#" class="remove-btn-css" id="removeGuest" data-tableid="${seat.id_table}" data-id="${seat.id}" data-idguest="${seat.id_guest}">Remove Guest</a></p>
                                                `}
                                                                                                                                        `).join('')}
                                        </div>
                                    </div>
                                </div>

                            `);
                        });
                    } else {
                        totalTables = 0;
                        $("#tableAppend").empty();
                        response.table.forEach(table => {
                            totalTables++;
                            $("#tableAppend").append(`
                                    <div class="td-boxes-down-align">
                                        <div class="top-box">
                                            <div class="box">
                                                <h5>${table.name}</h5>
                                            </div>
                                            <div class="box">
                                                <h5>${table.number}</h5>
                                            </div>
                                            <div class="box">
                                                ${(table.guest_number - table.guests.length <= 0) ? `
                                                                                                                                                                                                                                                                            <h5><span class="text-danger">CLOSED</span> ${table.guests.length}/${table.guest_number}</h5>
                                                                                                                                                                                                                                                                        ` : `
                                                                                                                                                                                                                                                                            <h5><span class="text-success">OPEN</span> ${table.guests.length}/${table.guest_number}</h5>
                                                                                                                                                                                                                                                                        `}
                                            </div>

                                            <div class="box">
                                                <div class="three-action-align">
                                                    <button class="edit-table-btn" data-id="${table.id_table}"> <img src="{{ asset('assets/images/edit-icon.png') }}"
                                                            alt=""></button>
                                                    <button class="delete-table-btn" data-id="${table.id_table}"> <img src="{{ asset('assets/images/delet-icon.png') }}"
                                                            alt=""></button>
                                                    <button class="{{ $isCorporate == 1 ? 'd-none' : '' }}" id="openGuestModal" data-id="${table.id_table}" data-tableName="${table.name}" data-tableGuests="${table.guest_number}" data-tableGuestLength="${table.guests.length}"> <img src="{{ asset('assets/images/Invitations.png') }}"
                                                            alt=""></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bottom-box">
                                            <div class="box">
                                                ${(table.guests.length > 0) ? `<h4> Sitter</h4>` : ''}
                                                ${table.guests.map(guest => `
                                                                                                                                                                                                                                                                                                <p>${guest.name}</p>
                                                                                                                                                                                                                                                                                            `).join('')}
                                            </div>
                                            <div class="box">
                                                ${(table.guests.length > 0) ? `<h4> Meal</h4>` : ''}
                                                ${table.guests.map(guest => `
                                                                                                                                                                                                                                                                                                <p>${guest.meal_name}</p>
                                                                                                                                                                                                                                                                                            `).join('')}
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                `);
                        });
                    }
                },
                error: function(xhr) {
                    toastr.error('Failed to add gift. Please try again.');
                }
            });
        }

        $(document).on('click', '.edit-table-btn', function() {
            const tableId = $(this).data('id'); // Assuming the button has a data-id attribute
            var url = `{{ route('panel.event.get.table.data', ':id') }}`.replace(':id', tableId);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Populate the form with the current table data
                    $('#editTableId').val(response.table.id_table);
                    $('#editTableName').val(response.table.name);
                    $('#editTableNumber').val(response.table.number);
                    $('#editMaxGuest').val(response.table.guest_number);
                    // Show the edit modal
                    var successModal = new bootstrap.Modal(document.getElementById('editTableModal'));
                    successModal.show();
                },
                error: function() {
                    toastr.error('Failed to load table data.');
                }
            });
        });

        $('#saveEditTable').click(function() {
            const tableId = $('#editTableId').val();
            const tableData = {
                table_name: $('#editTableName').val(),
                table_number: $('#editTableNumber').val(),
                max_guest: $('#editMaxGuest').val(),
                idevent: {{ $eventId }}
            };
            var url = `{{ route('panel.event.edit.table', ':id') }}`.replace(':id', tableId);

            $.ajax({
                url: url,
                type: 'POST',
                data: tableData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Hide the modal and reload the tables list
                    $('#closeEditModal').click();
                    getTable(); // Call your function to refresh the table list
                    toastr.success('Table updated successfully.');
                },
                error: function() {
                    toastr.error('Failed to update the table. Please try again.');
                }
            });
        });

        function guestCanSelectSeats(val) {
            console.log("guestCanSelectSeats", val);
            var value = parseInt(val);
            console.log("eventId", window.location.pathname.split("/")[2]);
            $.ajax({
                type: "POST",
                url: "{{ url('guestCanSelectSeats') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    idevent: window.location.pathname.split("/")[2],
                    guestCanSelectSeats: value,
                },
                success: function(data) {
                    console.log(data.guestCanSelectSeats);
                    if (data.guestCanSelectSeats == 1) {
                        var successModal = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter100'));
                        successModal.show();
                        // Swal.fire({
                        //     icon: "success",
                        //     title: "Success",
                        //     text: "Guest can select seats successfully",
                        //     confirmButtonText: "OK",
                        // });
                    } else if (data.guestCanSelectSeats == 0) {
                        var successModal = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter101'));
                        successModal.show();
                        // Swal.fire({
                        //     icon: "success",
                        //     title: "Success",
                        //     text: "Guest can not select seats",
                        //     confirmButtonText: "OK",
                        // });
                    }
                },
                error: function(data) {
                    console.log(data);
                    // Handle the error response here
                }
            });
        }



        $(document).ready(function() {
            var firstModal = new bootstrap.Modal(document.getElementById('exampleModalCenter04'));
            firstModal.show();

            getTable();

            $('#addTableButton').click(function() {
                // Collect form data
                const tableData = {
                    id_event: {{ $eventId }},
                    table_number: $('#tableNumber').val(),
                    table_name: $('#tableName').val(),
                    max_guest: $('#maxGuest').val()
                };

                // AJAX request to submit form data
                $.ajax({
                    url: "{{ route('panel.event.store.table', ['id' => $eventId]) }}",
                    type: 'POST',
                    data: tableData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success == true) {
                        toastr.success("Table created Successfully!")
                        $('#createTableForm')[0].reset();
                        $("#closeAddModalBtn1").click();
                        $("#closeAddModal1").click();
                        var successModal = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter09'));
                        successModal.show();
                        // $('#createTableForm')[0].reset(); // Clear the form
                        getTable();
                        countData();
                        }else {
                            // Handle validation or other error messages
                            if (typeof response.message === 'string') {
                                toastr.error(response.message); // Directly show the string error message
                            } else if (response.message) {
                                let errorMessages = '';
                                $.each(response.message, function(key, value) {
                                    errorMessages += value + '<br>';
                                });
                                toastr.error(errorMessages);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        alert('An error occurred while adding the table');
                    }
                });
            });
        });
    </script>
@endsection
