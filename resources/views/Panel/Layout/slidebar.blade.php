@php
    use App\Helpers\GeneralHelper;
    $eventId = GeneralHelper::getEventId();
@endphp

<div class="col-lg-2 col-md-2" id="sidebar" >
    <div class="left-menu-dash">
            <div class="two-things-inline">
                <h2>Menu</h2>
                <button id="toggleBtn" class="btn btn-primary mt-3"> <i class="fa fa-angle-right" aria-hidden="true"></i></button>
            </div>
        <ul>
            <li class="general-active" ><a href="{{ route('panel.event.generalInfos', ['id' => $eventId]) }}" ><img src="{{ asset('assets/images/General-Info.png')}}" alt="">General Info</a></li>
            <li class="webpage-active"  ><a  href="{{ route('panel.event.webpage', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Web-Page.png')}}" alt="">Web Page</a></li>
            <li class="meals-active" ><a href="{{ route('panel.event.meals', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Meals.png') }}" alt="">Meals</a></li>
            <li class="gift-active"><a href="{{ route('panel.event.gift', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Gift-Suggestions.png')}}" alt="">Gift Suggestions</a></li>
            <li class="invitatin-active"><a href="{{ route('panel.event.invitation', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Invitations.png')}}" alt="">Invitations</a></li>
            <li class="gest-active"><a href="{{ route('panel.event.guests-list', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Guest-List.png')}}" alt="">Guest List</a></li>
            <li class="table-active"><a href="{{ route('panel.event.guests.index', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Tables-Management.png')}}" alt="">Tables  Management</a></li>
            <li class="poto-active"><a href="{{ route('panel.event.photos', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Event-Photos.png')}}" alt="">Event Photos</a></li>
            <li class="reminder-active"><a href="{{ route('panel.event.reminder', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Reminders.png')}}" alt="">Reminders</a></li>
            <li class="message-active"><a href="{{ route('panel.event.message', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Custom-Messages.png')}}" alt="">Custom Messages</a></li>
            <li class="tutoriar-active"><a href="{{ route('panel.event.tutorial', ['id' => $eventId]) }}"><img src="{{ asset('assets/images/Tutorials.png')}}" alt="">Tutorials</a></li>
        </ul>
    </div>
</div>
