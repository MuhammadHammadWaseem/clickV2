{{-- @extends('Panel.Layout.master')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Click Invitation Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="favicon.png" sizes="32x32">
        <link rel="stylesheet" href="{{ asset('assets/css/lib.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/Panel/css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">
    </head>

<body class="custom_scroll_hide">
    

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
            // $payment->ssl_approval_code = $requestData->ssl_approval_code;
            // $payment->ssl_amount = $requestData->ssl_amount;
            // $payment->ssl_exp_date = $requestData->ssl_exp_date;
            // $payment->ssl_txn_id = $requestData->ssl_txn_id;
            // $payment->ssl_result_message = $requestData->ssl_result_message;
            // $payment->ssl_txn_time = $requestData->ssl_txn_time;
            // $payment->created_at = date('Y-m-d H:i:s');
            $payment->ssl_approval_code = $requestData['ssl_approval_code'];
            $payment->ssl_amount = $requestData['ssl_amount'];
            $payment->ssl_exp_date = $requestData['ssl_exp_date'];
            $payment->ssl_txn_id = $requestData['ssl_txn_id'];
            $payment->ssl_result_message = $requestData['ssl_result_message'];
            $payment->ssl_txn_time = $requestData['ssl_txn_time'];
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

    <script>
    </script>
</body>
</html>
{{-- @endsection

@section('scripts')
@endsection --}}
