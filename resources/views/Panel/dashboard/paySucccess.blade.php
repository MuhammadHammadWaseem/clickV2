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
                        <h2>{{ __('pay.Payment') }}</h2>
                        {{-- <h2>{{ __('pay.payment_with_paypal') }}</h2> --}}
                        <p>{{ __('pay.payment_access_area') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box-styling website-preview ">
                    <div class="payment-form-submit">
                        <h1>Payment Success</h1>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
