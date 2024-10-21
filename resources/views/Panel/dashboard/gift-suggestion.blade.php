@extends('Panel.layout.master')

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
                        <button class="t-btn" type="button" class="btn btn-primary t-btn" data-toggle="modal"
                            data-target="#exampleModalCenter">Add New </button>
                    </div>

                    <div class="meal-name-boxes">
                        @foreach ($gift as $item)
                            <div class="meal-box">
                                <div class="three-align-things">
                                    <!-- Display the name of the gift -->
                                    <h6>{{ $item->name }}</h6>
                                    <button>
                                        <img src="{{ asset('assets/images/edit-icon.png') }}" alt="Edit">
                                    </button>
                                    <button>
                                        <img src="{{ asset('assets/images/delet-icon.png') }}" alt="Delete">
                                    </button>
                                </div>
                                <div class="content">
                                    <!-- Display the link associated with the gift -->
                                    <a href="{{ $item->link }}">{{ $item->link }}</a>
                                    <!-- Display the description of the gift -->
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
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
                        <img src="assets/images/circle-check.png" alt="">
                        <h2>Suggestion Added Successfully</h2>
                        <p>Your gift suggestion has been successfully added.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        data-target="#exampleModalCenter">Yes, Add Gift Suggestions</button>
                    <!-- <button  type="button" class="btn btn-primary t-btn" data-toggle="modal" data-target="#exampleModalCenter"> Create a New Event </button> -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
