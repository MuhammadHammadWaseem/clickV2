<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Wedding Invitation</title>
    <style>
        body {
            background: #fff !important;
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
            color: #333333;
        }

        .container {
            max-width: 650px;
            margin: auto;
            border-radius: 10px;
            border: 1px solid #e8e8e8;
            overflow: hidden;
        }

        .header,
        .footer {
            background-color: #5a5a5a;
            color: #ffffff;
            text-align: center;
            padding: 10px 15px;
        }

        .header img,
        .footer img {
            width: 125px;
            vertical-align: middle;
        }

        .content {
            padding: 15px;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #242424;
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 14px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .button:hover {
            background-color: #333333;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .section {
            border-top: 1px solid #ebe9e9;
            padding: 15px;
        }

        .footer-text {
            color: #777777;
            font-size: 12px;
            line-height: 2;
            text-align: center;
            padding: 10px 0 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="https://clickinvitation.com/assets/images/logo/logoNewWhite.png" alt="Click Invitation">
        </div>

        <div class="content">
            <p style="font-size: 16px;">{{ $data['event']['groomfname'] }} &amp; {{ $data['event']['bridefname'] }} sent you an invitation for</p>
            <p style="font-size: 24px;">Wedding of {{ $data['event']['groomfname'] }} &amp; {{ $data['event']['bridefname'] }}</p>
            <p style="font-size: 14px;">{{ $data['formattedDate'] }}</p>

            <p>
                <a href="{{ url('/') .'/'. 'cardInvitations/' . $data['cardId']['id_card'] . '/' . $data['guest']['code'] . '/' . $data['guest']['name'] . '/' . $data['lang'] }}" class="button" target="_blank">Open Invitation</a>
            </p>
            <p>
                <a href="{{ url('/') .'/'. 'CheckInQr/' . $data['cardId']['id_card'] . '/' . $data['guest']['code'] . '/' . $data->lang }}" class="button" target="_blank">Check In</a>
            </p>
            <p>
                <a href="{{ url('/') .'/'. 'cardInvitations/' . $data['cardId']['id_card'] . '/' . $data['guest']['code'] . '/' . $data['guest']['name'] . '/' . $data['lang'] }}" target="_blank">
                    <img src="{{ asset('card-images/' . $data['event']['id_event'] . '.png') }}" alt="Invitation Image" style="max-width: 100%; margin-bottom: 20px;">
                </a>
            </p>

            @if ($data['event']['type'] == 'CORPORATE' && $data['guestTable'] !== null)
                <p style="font-style: italic; font-size: 13px;">Table: {{ $data['guestTable']['name'] }} Seat: {{ $data['guestTable']['guest_number'] }}</p>
            @endif

            <p style="font-style: italic; font-size: 13px;">This email is personalized for you. Please do not forward.</p>
        </div>

        <div class="section">
            <p style="font-weight: bold; margin-top: 15px;">Ceremony</p>
            <p>{{ $data['event']['ceraddress'] }}, {{ $data['event']['cercity'] }}, {{ $data['event']['cercountry'] }}, {{ $data['event']['cerprovince'] }}, {{ $data['event']['cerpc'] }}
                <a href="{{ $data['event']['cerAddressLink'] }}" style="color: #2bb573; text-decoration: none;" target="_blank">(View Map)</a>
            </p>
        </div>

        <div class="section" style="background: #383838; color: white;">
            <p style="font-weight: bold; margin-top: 15px;">Reception</p>
            <p>{{ $data['event']['recaddress'] }}, {{ $data['event']['reccity'] }}, {{ $data['event']['reccountry'] }}, {{ $data['event']['recprovince'] }}, {{ $data['event']['recpc'] }}
                <a href="{{ $data['event']['recAddressLink'] }}" style="color: #2bb573; text-decoration: none;" target="_blank">(View Map)</a>
            </p>
        </div>

        <div class="footer">
            <p>Powered by <img src="https://clickinvitation.com/assets/images/logo/logoNewWhite.png" alt="Click Invitation" style="width: 115px;"></p>
        </div>
    </div>

    <div class="footer-text">
        Copyright © 2024 ClickInvitation. All rights reserved.<br>
        +1 (438) 303-9948<br>
        <a href="mailto:Info@Clickinvitation.Com" target="_blank">Info@Clickinvitation.Com</a> |
        <a href="https://clickinvitation.com/contact" target="_blank">clickinvitation.com/contact</a>
    </div>

</body>

</html>
