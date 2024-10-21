@extends('Panel.layout.master')
@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $eventId = GeneralHelper::getEventId();
    @endphp

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
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="two-btn-align">
                            <button type="button" class="btn btn-primary t-btn t-btn-theme" data-toggle="modal"
                                data-target="#exampleModalCenter04">Export </button>
                            <button type="button" class="btn btn-primary t-btn t-btn-dark" data-toggle="modal"
                                data-target="#exampleModalCenter05">Export Invitation QR Code </button>
                        </div>
                    </div>

                    <div class="table-box">
                        <table id="GuestList" class="display">
                            <thead>
                                <tr>
                                    <th>Names</th>
                                    <th>Contact #</th>
                                    <th>Email Address</th>
                                    <th>Remaining Members</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>Jhon Smith</td>
                                <td>(XX) XXX XXXXXXX</td>
                                <td>jhon@email.com</td>
                                <td>07 Members Left </td>
                                <td>
                                    <div class="edit-delet">
                                        <ul>
                                            <li><a href="#"><img src="{{ asset('assets/images/action-link.png') }}"
                                                        alt=""></a></li>
                                            <li><a href="#"><img src="{{ asset('assets/images/action-delet.png') }}"
                                                        alt=""></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-content-pagination single-pagination">
                    <ul>
                        <li><a href="#" class="activ">&lt;</a></li>
                        <li><a href="#" class="activ">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                        <li><a href="#">04</a></li>
                        <li><a href="#" class="activ">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>

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

    <div class="modal fade modal-01 modal-02 modal-03 upload-form-csv" id="exampleModalCenter03" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <h2>Upload Form CSV</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <form action="">
                        <input type="file">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I Don’t</button>
                    <button type="submit" class="submit-btn">Upload Guest List</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="exampleModalCenter02" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <h2>Upload Form Another Event?</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="modal-table-type-content">
                        <div class="main-heading">
                            <ul>
                                <li>Name </li>
                                <li># Of Guests</li>
                                <li>Actions</li>
                            </ul>
                        </div>
                        <div class="sub-main-content">
                            <ul>
                                <li>Test Event </li>
                                <li>250 Guests</li>
                                <li><a href="#"><img src="assets/images/user-plus.png" alt=""></a></li>
                            </ul>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I Don’t</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter">Upload Guest</button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
                </div>
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

        function showGuest() {
            var mealId = $('#idevent').val();

            $.ajax({
                url: "{{ route('panel.event.guests-list.show', '') }}/" + mealId,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    var guests = response.guests; // Assuming the guest list is in the `guests` key

                    // Clear the existing table body
                    $('#GuestList tbody').empty();

                    // Loop through the guests and append them to the table
                    guests.forEach(function(guest) {
                        var row = `
                    <tr>
                        <td>${guest.titleGuest} ${guest.name}</td>
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
                        $('#GuestList tbody').append(row); // Append each guest to the table body
                    });

                    // If you need to handle pagination, you can create pagination logic here
                    setupPagination(response.totalPages); // Assuming the response has totalPages key
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred while fetching guests:", error);
                }
            });
        }

        // Example pagination function (you can adapt it to your needs)
        function setupPagination(totalPages) {
            var paginationHTML = '';

            // Dynamically generate pagination based on the number of pages
            for (var i = 1; i <= totalPages; i++) {
                paginationHTML += `<li><a href="#" class="${i === 1 ? 'activ' : ''}" data-page="${i}">${i}</a></li>`;
            }

            // Replace the existing pagination with the new pagination HTML
            $('.table-content-pagination ul').html(paginationHTML);

            // Add click event listeners to the pagination links
            $('.table-content-pagination ul li a').on('click', function(e) {
                e.preventDefault();
                var page = $(this).data('page');

                // Fetch the corresponding page data (you need to modify your backend to handle page numbers)
                fetchGuestPage(page);
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
                        <td>${guest.titleGuest} ${guest.name}</td>
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
                        $('#EditguestForm').append('<input type="hidden" name="idguest" value="' + response
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
    </script>
@endsection
