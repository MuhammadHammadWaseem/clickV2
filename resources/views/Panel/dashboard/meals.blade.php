@extends('Panel.Layout.master')
<style>
    .box-styling.event-photos-gallery.meal-details .meal-box .three-align-things {
        display: flex;
        column-gap: 30px;
        align-items: flex-start !important;
        margin-bottom: 20px;
        flex-direction: column;
        row-gap: 10px;
    }

    .box-styling.event-photos-gallery.meal-details .meal-box .three-align-things .tw0-boxex-align-in {
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
        align-items: center;
    }


    .main-dashboard-sec .left-menu-dash ul li.meals-active a {
      color: #C09D2A;
    }

    .main-dashboard-sec .left-menu-dash ul li.meals-active img {
      filter: none;
    }

    .main-dashboard-sec .left-menu-dash ul li.meals-active {
      background-color: #c09d2a29;
    }

    .main-dashboard-sec .left-menu-dash ul li.meals-active::after {
  width: 5px;
  height: 100%;
  background-color: #C09D2A;
  position: absolute;
  left: 0;
  right: 0;
  content: "";
  top: 0;
}


.box-styling.event-photos-gallery.meal-details .meal-box .three-align-things .tw0-boxex-align-in h6 {
    width:70%;
}



</style>
<!-- Include Toastr CSS and JS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $eventId = GeneralHelper::getEventId();
    @endphp
    <div class="col-lg-10 col-md-10" id="content">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ __('meal.error') }}</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ __('meal.success') }}</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling your-event-meals">
                    <div class="text">
                        <h2>{{ __('meal.your_event_meals_title') }}</h2>
                        <p>{{ __('meal.your_event_meals_description') }}<br>
                            {{ __('meal.your_event_meals_description2') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery meal-details">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>{{ __('meal.meal_details_title') }}</h2>
                            <p>{{ __('meal.meal_details_description') }}</p>
                        </div>
                        <button class="t-btn" type="button" class="btn btn-primary t-btn" data-toggle="modal"
                            data-target="#exampleModalCenter">{{ __('meal.Add New') }} </button>
                    </div>
                    <div class="meal-name-boxes">
                        @foreach ($meals as $meal)
                            <div class="meal-box">
                                <div class="three-align-things">
                                    <div class="tw0-boxex-align-in">
                                        <h6>{{ $meal->name ?? '' }}</h6>
                                        <!-- Edit button (use data-id to store the meal id) -->
                                        <button type="button" class="editMeal" data-toggle="modal" data-target="#editMeal"
                                            data-id="{{ $meal->id_meal }}">
                                            <img src="{{ asset('assets/images/edit-icon.png') }}" alt="">
                                        </button>
                                        <button class="deleteMeal" data-id="{{ $meal->id_meal }}" type="button">
                                            <img src="{{ asset('assets/images/delet-icon.png') }}" alt="">
                                        </button>

                                    </div>
                                    {{-- <h6>{{ $meal->name ?? '' }}</h6> --}}
                                    <p>{{ $meal->description ?? '' }}</p>
                                    <input type="hidden" id="event_id" value="{{ $meal->id_meal }}"
                                        data-id="{{ $meal->id_meal }}">
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- modals --}}
    <div class="modal fade modal-01 add-new-meal" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                        <h2>{{ __('meal.add_new_meal_title') }}</h2>
                        <p>{{ __('meal.add_new_meal_description') }}</p>
                    </div>
                    <div class="main-form-box">
                        <form action="{{ route('panel.event.meals.store') }}" method="POST">
                            @csrf
                            <input type="text" placeholder="{{ __('meal.meal_name_label') }}" name="namemeal" required>
                            <textarea placeholder="{{ __('meal.description_label') }}" name="descriptionmeal"></textarea>
                            <input type="hidden" name="idevent" value="{{ $eventId }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal">{{ __('meal.close_button') }}</button>
                    <button type="submit" class="submit-btn">{{ __('meal.save_changes_button') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal"  data-target="#exampleModalCenter03"> Meal Added Successfully </button> -->
    <!-- Modal -->
    <!-- Edit Meal Modal -->
    <div class="modal fade modal-01 add-new-meal" id="editMeal" tabindex="-1" role="dialog"
        aria-labelledby="editMealTitle" aria-hidden="true">
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
                        <h2>Edit Meal</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="main-form-box">
                        <form id="editMealForm" action="{{ route('panel.event.meals.update', '') }}" method="POST">
                            @csrf
                            <input type="hidden" id="event_id" name="id_event" value="">
                            <input type="text" placeholder="Meal Name ( Max 25 Characters )" name="namemeal" required>
                            <textarea placeholder="Description" name="descriptionmeal"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('meal.close_button') }}</button>
                    <button type="button" class="submit-btn" id="mealUpdate">{{ __('meal.save_changes_button') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete Confirmation Modal -->
    <div class="modal fade modal-01 modal-02 modal-03" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <h2>{{ __('meal.delete_confirmation_title') }}</h2>
                        <p>{{ __('meal.delete_confirmation_message') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('meal.cancel_button') }}</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">{{ __('meal.delete_button') }}</button>
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
                        <img src="assets/images/circle-check.png" alt="">
                        <h2>{{ __('meal.title') }}</h2>
                        <p>{{ __('meal.message') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('meal.close_button') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // When the edit button is clicked
            $(document).on('click', '.editMeal', function() {
                var mealId = $(this).data('id'); // Get the meal ID
                $.ajax({
                    url: "{{ route('panel.event.meals.edit', '') }}/" + mealId,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        // Set the meal name and description in the form
                        $('input[name="namemeal"]').val(response.name);
                        $('textarea[name="descriptionmeal"]').val(response.description);
                        $('input[name="id_event"]').val(response
                            .id_event); // Ensure you set the event ID if required
                        $('#event_id').val(
                            mealId); // Set the hidden meal ID for the update request
                    },
                    error: function(xhr) {
                        alert('Error fetching meal data');
                    }
                });
            });

            // Handle form submission for updating meal
            $('#mealUpdate').on('click', function(e) {
                e.preventDefault();
                var mealId = $('#event_id').val(); // Get the meal ID from the hidden input
                var formData = $("#editMealForm").serialize(); // Serialize the form data

                console.log(formData);
                $.ajax({
                    url: "{{ route('panel.event.meals.update', '') }}/" + mealId,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Close the modal
                        var myModal = new bootstrap.Modal(document.getElementById(
                            'editMeal'));
                        myModal.show();
                        toastr.success('Meal update successfully!');
                        location.reload(); // Refresh the page or update the DOM

                    },
                    error: function(xhr) {
                        // Handle error
                        alert('An error occurred while updating the meal');
                    }
                });
            });
        });



        // Handle the actual deletion when "Yes, Delete" is clicked in the modal
        var mealIdToDelete = null;

        // Open the delete confirmation modal
        $(document).on('click', '.deleteMeal', function(e) {
            e.preventDefault();
            mealIdToDelete = $(this).data('id'); // Store the meal ID for later deletion
            var myModal = new bootstrap.Modal(document.getElementById('deleteModal')); // Get the modal
            myModal.show(); // Show the delete confirmation modal
        });

        // Handle the actual deletion when "Yes, Delete" is clicked in the modal
        $('#confirmDelete').on('click', function() {
            if (mealIdToDelete) {
                var deleteUrl = "{{ route('panel.event.meals.destroy', ':id') }}"; // Use meal ID in the route
                deleteUrl = deleteUrl.replace(':id',
                mealIdToDelete); // Replace the placeholder with the actual meal ID

                $.ajax({
                    url: deleteUrl, // URL to delete the meal
                    type: 'DELETE', // HTTP method for deletion
                    data: {
                        "_token": "{{ csrf_token() }}", // CSRF token for protection
                    },
                    success: function(response) {
                        // Hide the confirmation modal after successful deletion
                        var myModal = new bootstrap.Modal(document.getElementById(
                            'deleteModal'));
                        myModal.hide(); // Hide the modal
                        toastr.success('Meal deleted successfully!');

                        setTimeout(function() {
                            location.reload(); // Reload the page after 2 seconds
                        }, 2000); // Adjust the delay as needed
                    },
                    error: function(xhr) {
                        toastr.error('Something went wrong, please try again later.');
                    }
                });
            }
        });
    </script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000",
        };
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection
