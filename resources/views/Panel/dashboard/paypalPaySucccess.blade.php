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
        <style>
            .payement-complete-notify {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100vh;
                gap: 20px;
                text-align: center;
            }

            .payement-complete-notify h1 {
                font-size: 50px;
            }

            .payement-complete-notify p {
                font-size: 25px;
            }
        </style>
    </head>

<body class="custom_scroll_hide">
    <div class="container-fluid" id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="payement-complete-notify">
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200"
                        fill="none">
                        <path
                            d="M100.001 16.6667C54.0513 16.6667 16.668 54.05 16.668 100C16.668 145.95 54.0513 183.333 100.001 183.333C145.951 183.333 183.335 145.95 183.335 100C183.335 54.05 145.951 16.6667 100.001 16.6667ZM100.001 166.667C63.243 166.667 33.3346 136.758 33.3346 100C33.3346 63.2417 63.243 33.3333 100.001 33.3333C136.76 33.3333 166.668 63.2417 166.668 100C166.668 136.758 136.76 166.667 100.001 166.667Z"
                            fill="#A9967D" />
                        <path
                            d="M83.3254 113.225L64.1671 94.1L52.4004 105.9L83.3421 136.775L139.225 80.8917L127.442 69.1083L83.3254 113.225Z"
                            fill="#A9967D" />
                    </svg>
                    <h1>Event paid successfuly</h1>
                    <p>Your payment was successful.</p>
                    <a href="{{ route('panel.event.generalInfos', ['id' => $event->id_event]) }}" class="btn t-btn">Go
                        Back</a>
                </div>
            </div>
        </div>

    </div>

    <script></script>
</body>

</html>
