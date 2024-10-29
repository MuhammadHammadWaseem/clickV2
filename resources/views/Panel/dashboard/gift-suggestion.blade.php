@extends('Panel.Layout.master')
<style>
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

    .main-dashboard-sec .left-menu-dash ul li.gift-active a {
        color: #C09D2A;
    }

    .main-dashboard-sec .left-menu-dash ul li.gift-active img {
        filter: none;
    }

    .main-dashboard-sec .left-menu-dash ul li.gift-active {
        background-color: #c09d2a29;
    }

    .main-dashboard-sec .left-menu-dash ul li.gift-active::after {
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
        $eventId = GeneralHelper::getEventId();
    @endphp
    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling gift-suggestions">
                    <div class="text">
                        <h2>Gift Suggestions</h2>
                        <p>As we know guest can’t really know your needs unless you tell them, this page is to link a
                            webpage for a certain gift you would like to get, your guest will get a link to that page the
                            same time as the invitation, they can pick a gift you choose, and it will be eliminated from the
                            list, so others can’t pick the same.</p>
                        <p>And you get to know the picker on the return guest list. And you can include a link to your email
                            account for e-transfer, <b>so guests won't have to carry and envelope with money all day and
                                nothing can be lost.</b> </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery meal-details gift-suggestions-details">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>Gift Suggestions Details</h2>
                            <p>After you decide what your guest’s choices with the reception hall, here you can give the
                                choice</p>
                        </div>
                        <button class="t-btn btn btn-primary" type="button" data-toggle="modal"
                            data-target="#exampleModalCenter">Add New</button>


                    </div>

                    <div class="meal-name-boxes">

                        {{-- <div class="meal-box">
                            <div class="three-align-things">
                                <h6></h6>
                                <button class="edit-gift-btn" data-id="">
                                    <img src="{{ asset('assets/images/edit-icon.png') }}" alt="Edit">
                                </button>
                                <button class="delete-gift-btn" data-id="">
                                    <img src="{{ asset('assets/images/delet-icon.png') }}" alt="Delete">
                                </button>
                                <input type="hidden" value="}" name="eventId" id="eventId">
                            </div>
                            <div class="content">
                                <a href=""></a>
                                <p></p>
                            </div>
                        </div> --}}

                    </div>


                </div>

            </div>

            <div class="col-lg-12">
                <div class="payment-transfer-box box-styling">

                    <div class="text">
                        <h2>TRANSFER DATA</h2>
                    </div>

                    <div class="three-things-align">
                        <div class="payment-select-option">
                            <select id="transferType" required  name="type">
                                <option value="TRANSFER TYPE"  {{ $event->transfer_type == "TRANSFER TYPE" ? "selected" : "" }}>TRANSFER TYPE</option>
                                <option value="PAYPAL" {{ $event->transfer_type == "PAYPAL" ? "selected" : "" }}>PAYPAL</option>
                                <option value="STRYPE" {{ $event->transfer_type == "STRYPE" ? "selected" : "" }}>STRYPE</option>
                                <option value="INTERAC TRANSFER" {{ $event->transfer_type == "INTERAC TRANSFER" ? "selected" : "" }}>INTERAC TRANSFER</option>
                            </select>
                        </div>
                        <input type="text" id="transferLink" placeholder="Enter link" required value="{{ $event->transfer_link }}" >
                        <button class="t-btn btn btn-primary" id="saveTransferBtn" type="button">Save</button>
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
                        <h2>Suggestion Added Successfully</h2>
                        <p>Your gift suggestion has been successfully added.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="successmodalCloseBtn"
                        data-dismiss="modal">Close</button>
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
                        <h2>Suggestion Deleted Successfully</h2>
                        <p>Your gift suggestion has been successfully deleted.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="successmodalCloseBtn"
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
                        <img src="{{ asset('assets/Panel/images/circle-check.png') }}" alt="">
                        <h2>Suggestion Edit Successfully</h2>
                        <p>Your gift suggestion has been successfully edited.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeMainModal"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal"  data-target="#exampleModalCenter02"> Want To Send Invitations To Guests? </button> -->
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
                        <h2>Want To Send Invitations To Guests?</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I Don’t</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter1">Yes, Add Gift Suggestions</button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
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
                        <h2>Add New Gift Suggestions</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="main-form-box">
                        <form id="addGiftForm">
                            @csrf
                            <input type="text" class="form-control" placeholder="Gift Name (Max 25 Characters)"
                                name="name" required>
                            <input type="url" class="form-control" placeholder="Add Link" name="link" required>
                            <textarea class="form-control" placeholder="Description" name="description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeAddModal"
                        data-dismiss="modal">Cancel</button>
                    <button type="submit" class="submit-btn btn btn-primary" form="addGiftForm">Add Suggestion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    {{-- <div class="modal fade" id="editGiftModal" tabindex="-1" role="dialog" aria-labelledby="editGiftModalLabel"
        aria-hidden="true">
        <!-- Modal content similar to Add New, but pre-filled for editing -->
    </div> --}}

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteGiftModal" tabindex="-1" role="dialog" aria-labelledby="deleteGiftModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteGiftModalLabel">Delete Gift</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this gift?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="t-btn t-btn-gray" data-dismiss="modal">Cancel</button>
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
                        <h2>Edit Gift</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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
                        data-dismiss="modal">Cancel</button>
                    <button type="submit" class="submit-btn btn btn-primary" form="editGiftForm">Update Gift</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function hidemodel() {
            $("#closeMainModal1").click();
            var successModal = new bootstrap.Modal(document.getElementById(
                'exampleModalCenter02'));
            successModal.show();
        }
        $(document).ready(function() {
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
                        myModal.hide();
                        $("#closeAddModal").click();
                        var successModal = new bootstrap.Modal(document.getElementById(
                            'exampleModalCenter03'));
                        successModal.show();
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
                url: "{{ route('panel.event.gift.show', ':id') }}".replace(':id', mealId), // Ensure the correct URL
                type: 'GET',
                success: function(response) {
                    console.log(response);
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
            console.log("Updating gift..."); // Add debug log

            var myModal = new bootstrap.Modal(document.getElementById('editGiftModal'));
            var formData = $(this).serialize(); // Serialize form data
            var giftId2 = $("#gift_id").val(); // Get the stored giftId from the form's data
            console.log("Gift ID: " + giftId2); // Debug log for gift ID

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
            console.log(giftId);

            var myModal = new bootstrap.Modal(document.getElementById('deleteGiftModal'));
            myModal.show();
            $('#confirmDeleteBtn').off('click').on('click', function() {
                console.log("Deleting gift..."); // Add debug log
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

                console.log("transferType", transferType);
                console.log("transferLink", transferLink);
                console.log("eventId", eventId);
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
                    console.log(response.success);
                    if (response.success == true) {
                        toastr.success('Transfer data saved successfully!');
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
