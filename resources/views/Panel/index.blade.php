<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Invitation Dashboard</title>
    <link rel="icon" href="assets/images/favicon.png" type="favicon.png" sizes="32x32">
    <link rel="stylesheet" href="{{ asset('assets/Panel/css/lib.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Panel/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- Toaster CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <style>
        .pagination-btn.active {
            background-color: #A9967D;
            color: white;
            border: 1px solid #A9967D;
            cursor: not-allowed;
            /* Optional: to show it's the current page */
        }

        .pagination-btn {
            color: #A9967D;
            cursor: pointer;
            padding: 5px 10px;
            margin: 0 2px;
            border: 1px solid #A9967D;
        }

        .pagination-btn.disabled {
            color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <section class="events-lists-sec-01">
        <div class="main-logo">
            <a href="index.html"><img src="assets/images/main-logo.png" alt=""></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text text-center">
                        <h2>Your Previous Events</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing<br> and typesetting industry.</p>
                        <!-- <a href="#" class="t-btn"> Create a New Event</a> -->
                        <button type="button" class="btn btn-primary t-btn" data-toggle="modal"
                            data-target="#exampleModalCenter"> Create a New Event </button>

                    </div>
                    <div class="table-box">
                        <table id="events-table">
                            <thead>
                                <tr>
                                    <th>Created</th>
                                    <th>Timings</th>
                                    <th>Event Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody id="tbody">
                                {{-- @forelse($events as $event)
                                    <tr>
                                        <td>{{ $event->created_at->toDateString() }}</td>

                                        <td>{{ $event->date }}</td>

                                        <td>{{ $event->name }} {{ $event->type }}</td>
                                        <td>
                                            <div class="edit-delet">
                                                <ul>
                                                    <li><a href="#"><img src="assets/images/edit.png"
                                                                alt=""></a>
                                                    </li>
                                                    <li><a href="#"><img src="assets/images/delet.png"
                                                                alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No items found.</p>
                                @endforelse --}}
                            </tbody>
                        </table>

                    </div>

                    <div class="table-content-pagination">
                        <ul id="pagination-links">
                            <!-- Pagination links will be dynamically inserted here -->
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- Modal -->
    <div class="modal fade modal-01" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                        <h2>Create a New Event</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="main-form-box">
                        <form id="eventTitle">
                            @csrf
                            <input type="text" name="title" placeholder="Title ( Max 25 Characters )" required>
                            <input type="date" name="date" placeholder="Date" required>
                            <select name="type" required>
                                <option selected disabled>Select Type</option>
                                @foreach ($eventList as $data)
                                    <option value="{{ $data->id_eventtype }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Close</button>
                    <button type="button" id="submitForm" class="submit-btn">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal"  data-target="#exampleModalCenter02"> Create a New Event </button> -->
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
                        <h2>What Do You Want To Do First?</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="modal-listing-box">
                        <ul>
                            <li><a href="#">Make Cards <img src="assets/images/modal-list-right-arow.png"
                                        alt=""> </a></li>
                            <li><a href="#">Send Invitations <img src="assets/images/modal-list-right-arow.png"
                                        alt=""> </a></li>
                            <li><a href="#">Make New Events <img src="assets/images/modal-list-right-arow.png"
                                        alt=""> </a></li>
                            <li><a href="#">Manage Guest List <img src="assets/images/modal-list-right-arow.png"
                                        alt=""> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Go to Dashboard</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter" data-dismiss="modal">Create New Event</button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal"  data-target="#exampleModalCenter03"> Event Created Successfully </button> -->
    <!-- Modal -->
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
                        <img src="assets/images/circle-check.png" alt="">
                        <h2>Event Created Successfully</h2>
                        <p>Your event has been successfully updated.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/Panel/js/wow-animate.js') }}"></script>
    <script src="{{ asset('assets/Panel/js/lib.js') }}"></script>
    <script src="{{ asset('assets/Panel/js/custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <!-- Toaster JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        // Function to load events with pagination
        function loadEvents(page = 1) {
            $.ajax({
                url: '{{ route('panel.index') }}?page=' + page, // Adjust the route
                type: 'GET',
                success: function(response) {
                    // Empty the current table rows
                    $('#tbody').empty();

                    // Loop through the events and append them to the table
                    response.events.forEach(function(event) {
                        var newRow = `
                        <tr>
                        <td>${new Date(event.created_at).toLocaleDateString()}</td>
                        <td>${event.date}</td>
                        <td>${event.name} ${event.type}</td>
                        <td>
                            <div class="edit-delet">
                                <ul>
                                    <li><a href="#"><img src="assets/images/edit.png" alt=""></a></li>
                                    <li><a href="#"><img src="assets/images/delet.png" alt=""></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>`;
                        $('#tbody').append(newRow);
                    });

                    // Update pagination links and mark the current page as active
                    $('#pagination-links').html(response.pagination);

                    // Add the 'active' class to the correct page number
                    $('#pagination-links li').removeClass('active'); // Remove 'active' class from all buttons
                    $('#pagination-links li[data-page="' + response.currentPage + '"]').addClass(
                        'active'); // Add 'active' to the current page
                },
                error: function(xhr) {
                    toastr.error('Error fetching events. Please try again.');
                }
            });
        }

        // Load events on page load (first page)
        loadEvents();

        // Event listener for pagination links
        $(document).on('click', '.pagination-btn', function(e) {
            e.preventDefault();
            if ($(this).hasClass('disabled')) return; // Do nothing if the button is disabled

            var page = $(this).data('page'); // Get the page number from the data attribute
            loadEvents(page); // Load events for the clicked page
        });


        $(document).on('ready', function() {
            $('#submitForm').on('click', function() {
                var form = $('#eventTitle'); // The form
                var formData = form.serialize(); // Serialize the form data

                $.ajax({
                    url: '{{ route('panel.event.store') }}', // Replace with your form submission URL
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            // Show success message
                            toastr.success(response.message);

                            // Close modal
                            $("#closeModal").trigger("click");

                            // Reset form
                            form[0].reset();

                            // Get the event data from the response
                            var event = response.event;

                            // Create a new row for the event and append it to tbody
                            var newRow = `
                            <tr>
                                <td>${event.created_at.split('T')[0]}</td> <!-- Format the created_at field -->
                                <td>${event.date}</td>
                                <td>${event.name} ${event.type}</td>
                                <td>
                                    <div class="edit-delet">
                                        <ul>
                                            <li><a href="#"><img src="assets/images/edit.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/images/delet.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>`;

                            // Append the new row to the tbody
                            $('#tbody').append(newRow);

                        } else {
                            toastr.error("An error occurred while creating the event.");
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;

                        // Display validation errors using Toaster
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                toastr.error(errors[key][0]); // Show first error message
                            }
                        }
                    }
                });
            });
            var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter02'));
            myModal.show();

            wow = new WOW({
                animateClass: 'animated',
                offset: 100,
                callback: function(box) {
                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            });

            wow.init();

            $('#show-password').on('change', function() {
                const passwordField = $('#password');
                const type = $(this).is(':checked') ? 'text' : 'password';
                passwordField.attr('type', type);
            });
        });
    </script>
</body>

</html>
