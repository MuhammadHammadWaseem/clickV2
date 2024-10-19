@extends('Panel.layout.master')

@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $eventId = GeneralHelper::getEventId();
    @endphp
    <div class="col-lg-10 col-md-10" id="content">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling your-event-meals">
                    <div class="text">
                        <h2>Your Event Meals</h2>
                        <p>After you decide what your guest’s choices with the reception hall, here you can give the choice
                            to your guests to make that choice ahead of time for better organization with the hall
                            kitchen.<br>
                            Your guests can indicate their choice of meals provided by you, they can indicate if they are
                            allergic or vegetarian or even vegan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery meal-details">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>Meal Details</h2>
                            <p>After you decide what your guest’s choices with the reception hall, here you can give the
                                choice.</p>
                        </div>
                        <button class="t-btn" type="button" class="btn btn-primary t-btn" data-toggle="modal"
                            data-target="#exampleModalCenter">Add New </button>
                    </div>
                    <div class="meal-name-boxes">
                        @foreach ($meals as $meal)
                            <div class="meal-box">
                                <div class="three-align-things">
                                    <h6>{{ $meal->name ?? '' }}</h6>
                                    <p>{{ $meal->description ?? '' }}</p>

                                    <!-- Edit button (use data-id to store the meal id) -->
                                    <button type="button" class="btn btn-primary editMeal" data-toggle="modal"
                                        data-target="#editMeal" data-id="{{ $meal->id_meal }}">
                                        <img src="{{ asset('assets/images/edit-icon.png') }}" alt="">
                                    </button>
                                    <button><img src="{{ asset('assets/images/delet-icon.png') }}" alt=""></button>
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
                        <h2>Add New Meal</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="main-form-box">
                        <form action="{{ route('panel.event.meals.store') }}" method="POST">
                            @csrf
                            <input type="text" placeholder="Meal Name ( Max 25 Characters )" name="namemeal" required>
                            <textarea placeholder="Description" name="descriptionmeal"></textarea>
                            <input type="hidden" name="idevent" value="{{ $eventId }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="submit-btn">Save changes</button>
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
                    <form action="{{ route('panel.event.meals.store') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="Meal Name ( Max 25 Characters )" name="namemeal" required>
                        <textarea placeholder="Description" name="descriptionmeal"></textarea>
                        <input type="hidden" name="idevent" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="submit-btn">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // When the edit button is clicked
            $(document).on('click', '.editMeal', function() {
                var mealId = $(this).data('id');
                console.log(mealId);
                
                $.ajax({
                    // url: "/meal/" + mealId +"/edit",
                    url: "{{ route('panel.event.meals.edit', '') }}/" + mealId,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        alert('Error fetching meal data');
                    }
                });
            });

            // Handle form submission for updating meal
            $('#editMealForm').on('submit', function(e) {
                e.preventDefault();

                var mealId = $('#mealId').val(); // Get the meal ID from the hidden input
                var formData = $(this).serialize();

                $.ajax({
                    url: "/meal/" + mealId + "/update", // Append the meal ID to the URL
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Close the modal
                        $('#editMealModal').modal('hide');

                        // Optionally, show success message or refresh the meal list
                        alert('Meal updated successfully');
                        location.reload(); // Refresh the page or update the DOM
                    },
                    error: function(xhr) {
                        // Handle error
                        alert('An error occurred while updating the meal');
                    }
                });
            });
        });
    </script>
@endsection
