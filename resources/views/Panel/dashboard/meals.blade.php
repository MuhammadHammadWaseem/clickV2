@extends('Panel.layout.master')

@section('content')
    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">

            <div class="col-lg-12">
                <div class="box-styling your-event-meals">
                    <div class="text">
                        <h2>Your Event Meals</h2>
                        <p>After you decide what your guest’s choices with the reception hall, here you can give the choice to your guests to make that choice ahead of time for better organization with the hall kitchen.<br>
                            Your guests can indicate their choice of meals provided by you, they can indicate if they are allergic or vegetarian or even vegan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling event-photos-gallery meal-details">
                    <div class="two-things-align">
                        <div class="text">
                            <h2>Meal Details</h2>
                            <p>After you decide what your guest’s choices with the reception hall, here you can give the choice.</p>
                        </div>
                        <button class="t-btn"  type="button" class="btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter">Add New </button>
                    </div>
                    <div class="meal-name-boxes">
                        <div class="meal-box">
                            <div class="three-align-things">
                                <h6>Meal Name</h6>
                                <button><img src="assets/images/edit-icon.png" alt=""></button>
                                <button><img src="assets/images/delet-icon.png" alt=""></button>
                            </div>
                        </div>
                        <div class="meal-box">
                            <div class="three-align-things">
                                <h6>Meal Name</h6>
                                <button><img src="assets/images/edit-icon.png" alt=""></button>
                                <button><img src="assets/images/delet-icon.png" alt=""></button>
                            </div>
                        </div>
                        <div class="meal-box">
                            <div class="three-align-things">
                                <h6>Meal Name</h6>
                                <button><img src="assets/images/edit-icon.png" alt=""></button>
                                <button><img src="assets/images/delet-icon.png" alt=""></button>
                            </div>
                        </div>
                        <div class="meal-box">
                            <div class="three-align-things">
                                <h6>Meal Name</h6>
                                <button><img src="assets/images/edit-icon.png" alt=""></button>
                                <button><img src="assets/images/delet-icon.png" alt=""></button>
                            </div>
                        </div>
                        <div class="meal-box">
                            <div class="three-align-things">
                                <h6>Meal Name</h6>
                                <button><img src="assets/images/edit-icon.png" alt=""></button>
                                <button><img src="assets/images/delet-icon.png" alt=""></button>
                            </div>
                        </div>
                        <div class="meal-box">
                            <div class="three-align-things">
                                <h6>Meal Name</h6>
                                <button><img src="assets/images/edit-icon.png" alt=""></button>
                                <button><img src="assets/images/delet-icon.png" alt=""></button>
                            </div>
                        </div>
                        <div class="meal-box">
                            <div class="three-align-things">
                                <h6>Meal Name</h6>
                                <button><img src="assets/images/edit-icon.png" alt=""></button>
                                <button><img src="assets/images/delet-icon.png" alt=""></button>
                            </div>
                        </div>
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
                    <form >
                        <input type="text" placeholder="Meal Name ( Max 25 Characters )" required>
                        <textarea  placeholder="Description"></textarea>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  type="submit" class="submit-btn" >Save changes</button>
            </form>
            </div>
        </div>
    </div>
</div>


<!-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal"  data-target="#exampleModalCenter03"> Meal Added Successfully </button> -->
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
                <h2>Meal Added Successfully</h2>
                <p>Your meal has been successfully added.</p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
@endsection
