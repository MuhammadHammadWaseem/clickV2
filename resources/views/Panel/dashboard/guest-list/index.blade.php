@extends('Panel.layout.master')
<style>
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
        width: 25%;
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
                        <h2>Table Management</h2>
                        <p>Now that you know how many guests your expecting, you can add the tables needed to seat them.You
                            can number the tables and you can give the tables names such as cities, countries, teams, or
                            crew for DJ, band, videographer...</p>
                        <p>Make sure you enter the right number of tables needed so everyone can have a seat.You can always
                            come back and add a tableThis is the page where you indicate the seats for your guests, make
                            sure not to exceed the number of guests per table indicated by the size given to you by the
                            reception hall.</p>
                        <p>After all the guests are seated you can print and give the seating chart to the reception hall so
                            they can know the number of plates per meal choice and prepare it for each table. And they can
                            call your guest by name for allergy or vegan cases.</p>
                        <p class="bold-text-color-change">Declined and non confirmed guests will not be seen on this page. to
                            have them appear they must confirm or choose a meal. and you can always do it for them.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling management-plan">
                    <div class="two-plan-details-align">
                        <div class="text">
                            <h2>Management Plan</h2>
                        </div>
                    </div>
                    <div class="management-plan-box">
                        <div class="box">
                            <img src="{{ asset('assets/images/dinner-table.png') }}" alt="">
                            <h6>Table#01</h6>
                            <p>Friends</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery events-lists-sec-01 guest-list details">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>Details</h2>
                        </div>
                        <div class="two-btn-align">
                            <button type="button" class="btn btn-primary t-btn t-btn-theme" data-toggle="modal"
                                data-target="#exampleModalCenter04">Add Table</button>
                            <a href="#" class="t-btn">Print Plan</a>
                        </div>
                    </div>

                    <div class="table-align-boxes">
                        <div class="th-boxes">
                            <div class="box">
                                <h6> Table Name</h6>
                            </div>
                            <div class="box">
                                <h6> Table #</h6>
                            </div>
                            <div class="box">
                                <h6> Guest Allowed</h6>
                            </div>
                            <div class="box">
                                <h6> Actions</h6>
                            </div>
                        </div>

                        <div id="tableAppend">
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- <button  type="button" class="btn btn-primary t-btn t-btn-theme"  data-toggle="modal" data-target="#exampleModalCenter02">Friend’s Table </button> -->
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
                        <h2>New Table</h2>
                    </div>
                    <div class="main-form-box mt-3">
                        <form id="createTableForm">
                            <input type="number" id="tableNumber" name="table_number" placeholder="Table Number" required>
                            <input type="text" id="tableName" name="table_name" placeholder="Table Name" required>
                            <input type="number" id="maxGuest" name="max_guest" placeholder="Max Guest" required>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeAddModalBtn"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" id="addTableButton">Add Table</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="editTableModal" tabindex="-1" role="dialog"
        aria-labelledby="editTableModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>Edit Table</h2>
                    </div>
                    <div class="main-form-box mt-3">
                        <form id="editTableForm">
                            <input type="hidden" id="editTableId">
                            <label for="editTableName">Table Name</label>
                            <input type="text" id="editTableName" name="table_name" required>
                            <label for="editTableNumber">Table Number</label>
                            <input type="number" id="editTableNumber" name="table_number" required>
                            <label for="editMaxGuest">Max Guest</label>
                            <input type="number" id="editMaxGuest" name="max_guest" required>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" id="saveEditTable">Save
                        Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function getTable() {
            $.ajax({
                url: "{{ route('panel.event.get.tables', ['id' => $eventId]) }}",
                type: 'GET',
                success: function(response) {
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
                                            <button class="edit-table-btn" data-id="${table.id_table}"> <img src="{{ asset('assets/images/edit-icon.png') }}"
                                                    alt=""></button>
                                            <button> <img src="{{ asset('assets/images/delet-icon.png') }}"
                                                    alt=""></button>
                                            <button> <img src="{{ asset('assets/images/Invitations.png') }}"
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
                    $('#editTableModal').modal('hide');
                    getTable(); // Call your function to refresh the table list
                    toastr.success('Table updated successfully.');
                },
                error: function() {
                    toastr.error('Failed to update the table. Please try again.');
                }
            });
        });



        $(document).ready(function() {
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
                    url: "{{ route('panel.event.store.table', ['id' => $eventId]) }}", // Change this to your route
                    type: 'POST',
                    data: tableData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success("Table created Successfully!")
                        $("#closeAddModalBtn").click();
                        $('#createTableForm')[0].reset(); // Clear the form
                        getTable();
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
