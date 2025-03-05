@extends('Panel.Layout.master')
<style>
    #exampleModalCenter03 .modal-dialog {
        max-width: 600px !important;
        margin: 1.75rem auto;
    }

    #exampleModalCenter03 .modal-footer {
        justify-content: center !important;
    }

    .payment-transfer-box .three-things-align .payment-select-option select {
        width: 200px;
        padding: 10px 10px;
        background: #ededed;
        border-radius: 20px;
        border: 2px solid #999999;
    }

    .payment-transfer-box .three-things-align {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        column-gap: 30px;
    }

    .payment-transfer-box {
        margin-top: 20px !important;
    }

    .gift-active a {
        color: #C09D2A !important;
    }

    .gift-active img {
        filter: none !important;
    }

    .gift-active {
        background-color: #c09d2a29 !important;
    }

    .gift-active::after {
        width: 5px;
        height: 100%;
        background-color: #C09D2A;
        position: absolute;
        left: 0;
        right: 0;
        content: "";
        top: 0;
    }

    @media only screen and (max-width: 1024px) {
        .box-styling.event-photos-gallery.meal-details .meal-name-boxes .meal-box {
            width: 45% !important;
        }
    }


    @media only screen and (max-width: 767px) {
        .box-styling.event-photos-gallery.meal-details .meal-name-boxes .meal-box {
            width: 100% !important;
        }

        .payment-transfer-box .three-things-align {
            display: flex;
            align-items: stretch;
            justify-content: center;
            flex-direction: column;
            column-gap: 30px;
            row-gap: 20px;
        }

        .box-styling .text p {
            text-align: center;
        }

        .payment-transfer-box .three-things-align .payment-select-option select {
            width: 100%;
            padding: 10px 10px;
            background: #ededed;
            border-radius: 20px;
            border: 2px solid #999999;
        }

        .box-styling.event-photos-gallery .two-things-align {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    }


    @media only screen and (max-width: 575px) {
        .box-styling.event-photos-gallery .two-things-align {
            display: flex;
            align-items: stretch !important;
        }

        .t-btn {
            background-color: #A9967D !important;
            color: white !important;
            font-size: 14px;
            padding: 8px 40px;
            border-radius: 15px;
            transition: .3s;
            border: navajowhite;
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
                <div class="box-styling gift-suggestions">
                    <div class="text">
                        <h2>{{ __('giftsuggestion.title') }}</h2>
                        <p>{{ __('giftsuggestion.description') }}</p>
                        <p>{{ __('giftsuggestion.message') }} <b>{{ __('giftsuggestion.message_2') }}</b> </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery meal-details gift-suggestions-details">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>{{ __('giftsuggestion.title_suggest') }}</h2>
                            {{-- <p>{{ __('giftsuggestion.description_suggest') }}</p> --}}
                        </div>
                        <button class="t-btn btn btn-primary" type="button" data-toggle="modal"
                            data-target="#exampleModalCenter">{{ __('giftsuggestion.Add New') }}</button>


                    </div>

                    <div class="meal-name-boxes">

                    </div>


                </div>

            </div>

            <div class="col-lg-12">
                <div class="payment-transfer-box box-styling">

                    <div class="text">
                        <h2>{{ __('giftsuggestion.TRANSFER DATA') }}</h2>
                    </div>

                    <div class="three-things-align">
                        {{-- <div class="payment-select-option">
                            <select id="transferType" required name="type">
                                <option value="TRANSFER TYPE"
                                    {{ $event->transfer_type == 'TRANSFER TYPE' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.TRANSFER TYPE') }}</option>
                                <option value="PAYPAL" {{ $event->transfer_type == 'PAYPAL' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.paypal') }}</option>
                                <option value="STRYPE" {{ $event->transfer_type == 'STRYPE' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.stripe') }}</option>
                                <option value="INTERAC TRANSFER"
                                    {{ $event->transfer_type == 'INTERAC TRANSFER' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.interac_transfer') }}</option>
                            </select>
                        </div> --}}
                        <div class="payment-select-option">
                            <select id="transferType" required name="type">
                                <option value="TRANSFER TYPE"
                                    {{ $event->transfer_type == 'TRANSFER TYPE' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.TRANSFER TYPE') }}</option>
                                <option value="PAYPAL" {{ $event->transfer_type == 'PAYPAL' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.paypal') }}</option>
                                <option value="STRIPE" {{ $event->transfer_type == 'STRIPE' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.stripe') }}</option>
                                <option value="INTERAC TRANSFER" {{ $event->transfer_type == 'INTERAC TRANSFER' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.interac_transfer') }}</option>
                                <option value="INTERAC E-TRANSFER" {{ $event->transfer_type == 'INTERAC E-TRANSFER' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.interac_e_transfer') }}</option>
                                <option value="ZELLE" {{ $event->transfer_type == 'ZELLE' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.zelle') }}</option>
                                <option value="VENMO" {{ $event->transfer_type == 'VENMO' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.venmo') }}</option>
                                <option value="CASH APP" {{ $event->transfer_type == 'CASH APP' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.cash_app') }}</option>
                                <option value="APPLE PAY" {{ $event->transfer_type == 'APPLE PAY' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.apple_pay') }}</option>
                                <option value="GOOGLE PAY" {{ $event->transfer_type == 'GOOGLE PAY' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.google_pay') }}</option>
                                <option value="BANK TRANSFERS" {{ $event->transfer_type == 'BANK TRANSFERS' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.bank_transfers') }}</option>
                                <option value="WESTERN UNION" {{ $event->transfer_type == 'WESTERN UNION' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.western_union') }}</option>
                                <option value="MONEYGRAM" {{ $event->transfer_type == 'MONEYGRAM' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.moneygram') }}</option>
                            </select>
                        </div>

                        <input type="text" id="transferLink" placeholder="Enter link" required
                            value="{{ $event->transfer_link }}">
                        <button class="t-btn btn btn-primary" id="saveTransferBtn"
                            type="button">{{ __('giftsuggestion.SAVE') }}</button>
                    </div>
                </div>
            </div>

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
                        <h2>{{ __('giftsuggestion.title_add') }}</h2>
                        <p>{{ __('giftsuggestion.message_add') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="successmodalCloseBtn"
                        data-dismiss="modal">{{ __('giftsuggestion.Close') }}</button>
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
                <div class="modal-body">
                    <div class="text">
                        <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt="">
                        <h2>{{ __('giftsuggestion.title_delete') }}</h2>
                        <p>{{ __('giftsuggestion.message_delete') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="successmodalCloseBtn"
                        data-dismiss="modal">{{ __('giftsuggestion.Close') }}</button>
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
                        <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt="">
                        <h2>{{ __('giftsuggestion.title_edit') }}</h2>
                        <p>{{ __('giftsuggestion.edit_success') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeMainModal"
                        data-dismiss="modal">{{ __('giftsuggestion.Close') }}</button>
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
                        <h2>{{ __('giftsuggestion.want_to_send_invitations_to_guests') }}</h2>
                        <p>{{ __('giftsuggestion.would you like to make or import your invitation card Now?') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal" id="noInvitation">{{ __('giftsuggestion.No, I Don’t') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter1"><a class="text-light"
                            href="{{ route('panel.event.invitation', ['id' => $eventId]) }}">{{ __('giftsuggestion.Yes, Create Invitation') }}</a></button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade modal-01 add-new-meal" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                        <h2>{{ __('giftsuggestion.add_new_gift_suggestions') }}</h2>
                        <p>{{ __('giftsuggestion.description_text2') }}</p>
                    </div>
                    <div class="main-form-box">
                        <form id="addGiftForm">
                            @csrf
                            <input type="text" class="form-control" placeholder="{{ __('giftsuggestion.name_gift') }}"
                                name="name" required>
                            <input type="url" class="form-control" placeholder="{{ __('giftsuggestion.add_link') }}" name="link" required>
                            <textarea class="form-control" placeholder="{{ __('giftsuggestion.description_suggest') }}" name="description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeAddModal"
                        data-dismiss="modal">{{ __('giftsuggestion.Cancel') }}</button>

                        <button type="button" data-dismiss="modal" class="d-none"
                        id="closeAddModal1">{{ __('meal.close_button') }}</button>

                    <button type="submit" class="submit-btn btn"
                        form="addGiftForm">{{ __('giftsuggestion.Add Suggestion') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Payment Mood --}}
    <div class="modal fade modal-01 add-new-meal" id="exampleModalCenter1122" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenter1122Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('giftsuggestion.TRANSFER DATA') }}</h2>
                        {{-- <p>{{ __('giftsuggestion.description_text2') }}</p> --}}
                    </div>
                    <div class="main-form-box">
                        <form id="addGiftForm">
                            @csrf
                            <select id="transferType2" required name="type">
                                <option value="TRANSFER TYPE"
                                    {{ $event->transfer_type == 'TRANSFER TYPE' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.TRANSFER TYPE') }}</option>
                                <option value="PAYPAL" {{ $event->transfer_type == 'PAYPAL' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.paypal') }}</option>
                                <option value="STRIPE" {{ $event->transfer_type == 'STRIPE' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.stripe') }}</option>
                                <option value="INTERAC TRANSFER" {{ $event->transfer_type == 'INTERAC TRANSFER' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.interac_transfer') }}</option>
                                <option value="INTERAC E-TRANSFER" {{ $event->transfer_type == 'INTERAC E-TRANSFER' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.interac_e_transfer') }}</option>
                                <option value="ZELLE" {{ $event->transfer_type == 'ZELLE' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.zelle') }}</option>
                                <option value="VENMO" {{ $event->transfer_type == 'VENMO' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.venmo') }}</option>
                                <option value="CASH APP" {{ $event->transfer_type == 'CASH APP' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.cash_app') }}</option>
                                <option value="APPLE PAY" {{ $event->transfer_type == 'APPLE PAY' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.apple_pay') }}</option>
                                <option value="GOOGLE PAY" {{ $event->transfer_type == 'GOOGLE PAY' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.google_pay') }}</option>
                                <option value="BANK TRANSFERS" {{ $event->transfer_type == 'BANK TRANSFERS' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.bank_transfers') }}</option>
                                <option value="WESTERN UNION" {{ $event->transfer_type == 'WESTERN UNION' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.western_union') }}</option>
                                <option value="MONEYGRAM" {{ $event->transfer_type == 'MONEYGRAM' ? 'selected' : '' }}>
                                    {{ __('giftsuggestion.moneygram') }}</option>
                            </select>
                            <input type="text" id="transferLink2" placeholder="Enter link" required
                            value="{{ $event->transfer_link }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closePaymentModal"
                        data-dismiss="modal">{{ __('giftsuggestion.Cancel') }}</button>

                        <button type="button" class="btn btn-secondary d-none" id="closePaymentModal2"
                        data-dismiss="modal">{{ __('giftsuggestion.Cancel') }}</button>

                        <button class="t-btn btn btn-primary" id="saveTransferBtn2"
                        type="button">{{ __('giftsuggestion.SAVE') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deleteGiftModal" tabindex="-1" role="dialog" aria-labelledby="deleteGiftModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteGiftModalLabel">{{ __('giftsuggestion.Delete Gift') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('giftsuggestion.confirm_delete_gift') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="t-btn t-btn-gray"
                        data-dismiss="modal">{{ __('giftsuggestion.Cancel') }}</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-01 edit-gift-modal" id="editGiftModal" tabindex="-1" role="dialog"
        aria-labelledby="editGiftModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('giftsuggestion.Edit Gift') }}</h2>
                        <p>{{ __('giftsuggestion.edit_desc') }}</p>
                    </div>
                    <div class="main-form-box">
                        <!-- Edit Gift Form -->
                        <form id="editGiftForm">
                            @csrf
                            <input type="text" class="form-control" placeholder="Gift Name (Max 25 Characters)"
                                id="giftName" name="name" required>
                            <input type="hidden" class="form-control" id="gift_id" name="id_gift">
                            <input type="url" class="form-control" placeholder="Add Link" id="giftLink"
                                name="link">
                            <textarea class="form-control" placeholder="Description" id="giftDescription" name="description" required></textarea>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="editModalCancelBtn"
                        data-dismiss="modal">{{ __('giftsuggestion.Cancel') }}</button>
                    <button type="submit" class="submit-btn btn btn-primary"
                        form="editGiftForm">{{ __('giftsuggestion.Update Gift') }}</button>
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
                                href="{{ route('panel.event.guests-list', ['id' => $eventId]) }}">{{ __('genralInfo.I Do') }}</a></button>
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
                        <h2>{{ __('giftsuggestion.add_message') }}</h2>
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

    $("#add_meal").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
            successModal.show();
            $("#noGift2").click();
        });
        $("#noGift").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter02'));
            successModal.show();
        });
        $("#noInvitation").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter023'));
            successModal.show();
        });
        $("#closeAddModal").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter1122'));
            // var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter02'));
            successModal.show();
        });
        $("#closePaymentModal").on("click", function() {
            var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter02'));
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
        $(document).ready(function() {
            var MealModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
            MealModal.show();
            show();
            // Handle Add New Gift Modal
            $("#addGiftForm").on("submit", function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var myModal = new bootstrap.Modal(document.getElementById('addGiftForm'));

                // Ajax request to save new gift
                $.ajax({
                    url: "{{ route('panel.event.gift.store') }}", // Route for adding a new gift
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        toastr.success("Suggestion added successfully send");
                        // Clear the form inputs
                    $('#addGiftForm')[0].reset();
                        myModal.hide();
                        $("#closeAddModal1").click();
                        // var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter09'));
                        var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter1122'));
                        successModal.show();
                        show();
                        // location.reload(); // Optionally reload to see the new gift in the list
                    },
                    error: function(xhr) {
                        toastr.error('Failed to add gift. Please try again.');
                    }
                });
            });
        });

        $("#successmodalCloseBtn").on("click", function() {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter02'));
            myModal.show();
        });

        function show() {
            var mealId = $('#event_id').val(); // Corrected line
            $.ajax({
                url: "{{ route('panel.event.gift.show', ':id') }}".replace(':id',
                mealId), // Ensure the correct URL
                type: 'GET',
                success: function(response) {
                    var container = $('.meal-name-boxes');
                    container.empty();
                    var gifts = response.gifts;
                    gifts.forEach(function(gift) {
                        var mealBox = `
                        <div class="meal-box">
                            <div class="three-align-things">
                                <h6>${gift.name}</h6>
                                <button class="edit-gift-btn" data-id="${gift.id_gift}">
                                    <img src="{{ asset('assets/images/edit-icon.png') }}" alt="Edit">
                                </button>
                                <button class="delete-gift-btn" data-id="${gift.id_gift}">
                                    <img src="{{ asset('assets/images/delet-icon.png') }}" alt="Delete">
                                </button>
                            </div>
                            <div class="content">
                                <a href="${gift.link}">${gift.link}</a>
                                <p>${gift.description}</p>
                                ${gift.picker ? `<p>picked by: ${gift.picker.name}</p>` : ''}
                            </div>
                        </div>
                    `;
                        container.append(mealBox);
                    });
                },
                error: function(xhr) {
                    toastr.error('Failed to fetch gifts. Please try again.');
                }
            });
        }

        function bindEventListeners() {
            // Handle Edit Gift Modal
            $('.edit-gift-btn').off('click').on('click', function() {
                var giftId = $(this).data('id');
                var url = "{{ route('panel.event.gift.edit', ':id') }}".replace(':id', giftId);

                var myModal = new bootstrap.Modal(document.getElementById('editGiftModal'));
                myModal.show();

                $.get(url, function(data) {
                    if (data) {
                        $('#editGiftModal #gift_id').val(data.id_gift);
                        $('#editGiftModal #giftName').val(data.name);
                        $('#editGiftModal #giftLink').val(data.link);
                        $('#editGiftModal #giftDescription').val(data.description);
                    } else {
                        toastr.error('Failed to fetch gift data.');
                    }
                }).fail(function() {
                    toastr.error('An error occurred while fetching gift data.');
                });
            });
        }

        // Handle Edit Gift Modal
        $(document).on('click', '.edit-gift-btn', function() {
            var giftId = $(this).data('id');

            // Correct the route usage
            var url = "{{ route('panel.event.gift.edit', ':id') }}".replace(':id', giftId);

            // Open the modal
            var myModal = new bootstrap.Modal(document.getElementById('editGiftModal'));
            myModal.show();

            // AJAX to fetch existing gift data and pre-fill the modal form
            $.get(url, function(data) {
                if (data) {
                    // Fill modal fields with fetched data
                    $('#editGiftModal #gift_id').val(data.id_gift);
                    $('#editGiftModal #giftName').val(data.name);
                    $('#editGiftModal #giftLink').val(data.link);
                    $('#editGiftModal #giftDescription').val(data.description);
                } else {
                    toastr.error('Failed to fetch gift data.');
                }
            }).fail(function() {
                toastr.error('An error occurred while fetching gift data.');
            });
        });

        // For Update Gift
        $('#editGiftForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var myModal = new bootstrap.Modal(document.getElementById('editGiftModal'));
            var formData = $(this).serialize(); // Serialize form data
            var giftId2 = $("#gift_id").val();

            $.ajax({
                url: "{{ route('panel.event.gift.update', ':id') }}".replace(':id', giftId2),
                type: 'POST',
                data: formData,
                success: function(response) {
                    var myModal2 = new bootstrap.Modal(document.getElementById('editGiftModal'));
                    myModal2.hide(); // Hide the modal
                    var successModal = new bootstrap.Modal(document.getElementById(
                        'exampleModalCenter05'));
                    successModal.show();
                    $("#editModalCancelBtn").click();
                    toastr.success('Gift updated successfully!');
                    // location.reload(); // Comment this out to see if it refreshes
                    show();
                },
                error: function(xhr) {
                    console.error(xhr);
                    toastr.error('Failed to update the gift. Please try again.');
                }
            });
        });

        // For Delete Gift
        $(document).on('click', '.delete-gift-btn', function() {
            var giftId = $(this).data('id');

            var myModal = new bootstrap.Modal(document.getElementById('deleteGiftModal'));
            myModal.show();
            $('#confirmDeleteBtn').off('click').on('click', function() {
                $.ajax({
                    url: "{{ route('panel.event.gift.delete', ':id') }}".replace(':id', giftId),
                    type: 'DELETE', // Change this to DELETE
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        myModal.hide(); // Hide the modal
                        show();
                        var successModal = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter04'));
                        successModal.show();
                        toastr.success('Gift deleted successfully!');
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        toastr.error('Failed to delete gift. Please try again.');
                    }
                });
            });
        });

        $(document).on('click', '#saveTransferBtn', function() {
            var transferType = $('#transferType').val();
            var transferLink = $('#transferLink').val();
            var eventId = "{{ $eventId }}"; // Use your event ID dynamically
            $.ajax({
                url: "{{ route('panel.event.savetransfer', ':id') }}".replace(':id', eventId),
                type: 'POST', // Change this to POST
                data: {
                    transfertype: transferType,
                    transferlink: transferLink,
                    eventId: eventId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success == true) {
                        toastr.success('Transfer data saved successfully!');
                        var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter09'));
                        successModal.show();
                        var AddModal = new bootstrap.Modal(document.getElementById('exampleModalCenter1122'));
                        AddModal.hide();
                        $("#closePaymentModal2").click();
                        console.log(response.data);
                    } else {
                        toastr.error('Failed to save transfer data. Please try again.');
                    }
                },
                error: function(xhr) {
                    console.error(xhr);
                    toastr.error('An error occurred. Please try again.');
                }
            });
        });
        $(document).on('click', '#saveTransferBtn2', function() {
            var transferType = $('#transferType2').val();
            var transferLink = $('#transferLink2').val();
            var eventId = "{{ $eventId }}"; // Use your event ID dynamically
            $.ajax({
                url: "{{ route('panel.event.savetransfer', ':id') }}".replace(':id', eventId),
                type: 'POST', // Change this to POST
                data: {
                    transfertype: transferType,
                    transferlink: transferLink,
                    eventId: eventId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success == true) {
                        toastr.success('Transfer data saved successfully!');
                        var successModal = new bootstrap.Modal(document.getElementById('exampleModalCenter09'));
                        successModal.show();
                        var AddModal = new bootstrap.Modal(document.getElementById('exampleModalCenter1122'));
                        AddModal.hide();
                        $("#closePaymentModal2").click();
                        $("#transferLink").val(response.data.transfer_link);
                        $("#transferType").val(response.data.transfer_type);
                        $("#transferType2").val('');
                        $("#transferLink2").val('');
                    } else {
                        toastr.error('Failed to save transfer data. Please try again.');
                    }
                },
                error: function(xhr) {
                    console.error(xhr);
                    toastr.error('An error occurred. Please try again.');
                }
            });
        });
    </script>
@endsection
