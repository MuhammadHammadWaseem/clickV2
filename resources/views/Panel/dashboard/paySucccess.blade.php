@extends('Panel.Layout.master')
@section('content')
    @php
        use App\Helpers\GeneralHelper;
        $currentEventId = GeneralHelper::getEventId();
        $user = auth()->user();
        if ($requestData != null) {
            $events = \App\Models\Event::where('id_event', $currentEventId)->first();
            $events->paid = 1;
            $events->save();

            $payment = new \App\Models\EventPayment();
            $payment->user_id = $user->id;
            $payment->user_name = $user->name . ' ' . $user->surname;
            $payment->user_email = $user->email;
            $payment->event_id = $currentEventId;
            $payment->ssl_approval_code = $requestData->ssl_approval_code;
            $payment->ssl_amount = $requestData->ssl_amount;
            $payment->ssl_exp_date = $requestData->ssl_exp_date;
            $payment->ssl_txn_id = $requestData->ssl_txn_id;
            $payment->ssl_result_message = $requestData->ssl_result_message;
            $payment->ssl_txn_time = $requestData->ssl_txn_time;
            $payment->created_at = date('Y-m-d H:i:s');
            $payment->save();
        }

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
