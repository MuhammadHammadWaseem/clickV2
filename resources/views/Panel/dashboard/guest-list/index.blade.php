@extends('Panel.layout.master')
<style>



.box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes {
    border-bottom: 1px solid #00000038;
    margin-bottom: 10px;
    padding-bottom: 10px;
    margin-top: 20px;
}

.box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .th-boxes {
    display: flex;
    justify-content: space-between;
}

.box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details  .box {
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

.box-styling.event-photos-gallery.events-lists-sec-01.guest-list.details .table-align-boxes .td-boxes-down-align .top-box .box .three-action-align button:focus{
    border-right: 1px solid #00000033 !important;
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
                        {{-- <div class="three-things-align">
                            <ul>
                                <li>Total Guests : 5 ( 2 Seated )</li>
                                <li>Total Number Of Table : 10</li>

                            </ul>
                        </div> --}}
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

                        <div class="td-boxes-down-align">
                            <div class="top-box">
                                <div class="box">
                                    <h5> Friends</h5>
                                 </div>
                                 <div class="box">
                                    <h5> T01265</h5>
                                 </div>
                                 <div class="box">
                                    <h5> Open 10 guest</h5>
                                 </div>
                                 <div class="box">
                                   <div class="three-action-align">
                                    <button>  <img src="{{ asset('assets/images/edit-icon.png') }}" alt=""></button>
                                    <button>  <img src="{{ asset('assets/images/delet-icon.png') }}" alt=""></button>
                                    <button>  <img src="{{ asset('assets/images/Invitations.png') }}" alt=""></button>
                                   </div>
                                 </div>
                            </div>
                            <div class="bottom-box">
                                <div class="box">
                                    <h4> Sitter</h4>
                                    <p>Jhon Dalton</p>
                                 </div>
                                 <div class="box">
                                    <h4> Meal</h4>
                                    <p>Chicken</p>
                                 </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="table-box">
                        <table>
                            <tr>
                                <th>Table Name</th>
                                <th>Table #</th>
                                <th>Status</th>
                                <th>Guests</th>
                                <th>Actions</th>
                            </tr>

                            <tr>
                                <td>Friends</td>
                                <td>T01265</td>
                                <td>Open</td>
                                <td>10 Guests </td>
                                <td>
                                    <div class="edit-delet">
                                        <ul>
                                            <li><a href="#"><img src="{{ asset('assets/images/edit-pencil.png') }}"
                                                        alt=""></a></li>
                                            <li><a href="#"><img src="{{ asset('assets/images/action-delet.png') }}"
                                                        alt=""></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        </table>

                    </div> --}}

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


    <!-- <button  type="button" class="btn btn-primary t-btn t-btn-theme"  data-toggle="modal" data-target="#exampleModalCenter02">Friend’s Table </button> -->
    <div class="modal fade modal-01 modal-02 upload-form-another-event" id="exampleModalCenter04" tabindex="-1"
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
                        <h2>New Table</h2>
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> --}}
                    </div>
                    <div class="main-form-box mt-3">
                        <form id="createTable">
                            <input type="number" placeholder="Table Number">
                            <input type="text" placeholder="Table Name">
                            <input type="number" placeholder="Max Guest">

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I Don’t</button>
                    <button type="button" class="submit-btn btn btn-primary t-btn" data-toggle="modal"
                        data-target="#exampleModalCenter">Add Table</button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
                </div>
            </div>
        </div>
    </div>




    <!-- <button  type="button" class="btn btn-primary t-btn t-btn-theme" data-toggle="modal" data-target="#exampleModalCenter01">Would You Like Manage Tables Manually? </button> -->



    {{-- <div class="modal fade modal-01 add-new-meal" id="exampleModalCenter01" tabindex="-1" role="dialog"
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
                        <h2>Would You Like Manage Tables Manually?</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I Don’t</button>
                    <button type="submit" class="submit-btn">Yes, Manage Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="modal fade modal-01 modal-02 modal-03 upload-form-csv" id="exampleModalCenter03" tabindex="-1"
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
    </div> --}}


    <!-- Modal -->
    {{-- <div class="modal fade modal-01 modal-02 upload-form-another-event" id="exampleModalCenter02" tabindex="-1"
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

                        <div class="sub-main-content">
                            <ul>
                                <li>Test Event </li>
                                <li>250 Guests</li>
                                <li><a href="#"><img src="assets/images/user-plus.png" alt=""></a></li>
                            </ul>
                        </div>

                        <div class="sub-main-content">
                            <ul>
                                <li>Test Event </li>
                                <li>250 Guests</li>
                                <li><a href="#"><img src="assets/images/user-plus.png" alt=""></a></li>
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
    </div> --}}


    <!-- <button type="button" class="btn btn-primary t-btn" data-toggle="modal"  data-target="#exampleModalCenter05"> Updated Successfully </button> -->
    <!-- Modal -->
    {{-- <div class="modal fade modal-01 modal-02 modal-03" id="exampleModalCenter05" tabindex="-1" role="dialog"
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
    </div> --}}
@endsection
@section('scripts')
@endsection
