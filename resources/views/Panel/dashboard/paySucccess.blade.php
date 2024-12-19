@extends('Panel.Layout.master')
@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $currentEventId = GeneralHelper::getEventId();


        $events = \App\Models\Event::where('id_event', $currentEventId)->first();
        $events->paid = 1;
        $events->save();
    @endphp

    <div class="col-lg-10 col-md-10" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-styling your-web-page">
                    <div class="text">
                        <h2>Congratulations!</h2>
                        <p>Your payment was successful.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
