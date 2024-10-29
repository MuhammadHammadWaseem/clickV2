<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invitation Email</title>
    <style>
        body {
            background-color: #fff !important;
            margin: 0;
            padding: 0;
        }

        a.button {
            text-decoration: none;
            background-color: #242424;
            border-radius: 5px;
            color: #ffffff;
            font-size: 14px;
            padding: 12px 30px;
            margin-bottom: 10px;
            display: inline-block;
            text-transform: uppercase;
            white-space: nowrap;
        }

        a.button:hover {
            background-color: #333333;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .footer {
            font-size: 12px;
            line-height: 1.5;
            color: #777777;
            text-align: center;
            margin-top: 20px;
        }

        .content-table {
            background-color: white;
            border-radius: 10px;
            border: 1px solid #e8e8e8;
            width: 100%;
        }

        .header {
            background-color: #5a5a5a;
            text-align: center;
            padding: 10px 15px;
            border-radius: 10px 10px 0 0;
        }

        .footer-content {
            background-color: #777;
            text-align: center;
            padding: 10px 15px;
            border-radius: 0 0 10px 10px;
        }

        .footer-content p {
            color: #ffffff;
            margin: 0;
        }

        .event-details {
            font-style: italic;
            font-size: 13px;
            margin-top: 20px;
        }

        .reception-info {
            margin: 15px 5px 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td align="center" style="padding:0 10px;color:#777777">
                    <br>
                    <table class="content-table" cellpadding="0" cellspacing="0" style="max-width:650px">
                        <tbody>
                            <tr>
                                <td valign="top">
                                    <div class="header">
                                        <img src="https://clickinvitation.com/assets/images/logo/logoNewWhite.png"
                                            alt="Click Invitation" style="width: 125px;">
                                    </div>

                                    <div style="padding: 15px; font-family: Arial, sans-serif; text-align:center;">
                                        <p style="font-size:16px; color:#333333;">{{ $data['cardId']['msgTitle']  }}</p>
                                        <p style="font-size:16px; color:#333333;">{{ $data['event']['bridefname'] . ' ' .  $data['event']['bridelname']}}</p>
                                        <p style="font-size:14px; color:#777;">{{ $data['formattedDate'] ?? '' }}</p>
                                        <p>
                                            <a href="{{ env('APP_URL') . 'cardInvitations/' . ($data['cardId']['id_card'] ?? '') . '/' . $data['guest']['code'] . '/' . $data['guest']['name'] . '/' . $data['lang'] }}"
                                                class="button" target="_blank">Open Invitation</a>
                                        </p>
                                        <p>
                                            <a href="{{ env('APP_URL') . '/CheckInQr/' . ($data['cardId']['id_card'] ?? '') . '/' . $data['guest']['code'] . '/' . $data['lang'] }}"
                                                class="button" target="_blank">Check In</a>
                                        </p>
                                        <p>
                                            <a href="{{ env('APP_URL') . 'cardInvitations/' . ($data['cardId']['id_card'] ?? '') . '/' . $data['guest']['code'] . '/' . $data['guest']['name'] . '/' . $data['lang'] }}"
                                                target="_blank">
                                                <img src="{{ asset('card-images/' . $data['event']['id_event'] . '.png') }}"
                                                    style="margin-bottom:20px; max-width:100%;">
                                            </a>
                                        </p>

                                        @if ($data['event']->type == 'CORPORATE' && $guestTable !== null)
                                        <p class="event-details">Table: {{ $guestTable->name }} - Seat: {{ $guestTable->guest_number }}</p>
                                        @endif

                                        <p class="event-details">This email is personalized for you. Please do not forward.</p>

                                        <table width="100%" cellpadding="0" cellspacing="0"
                                            style="margin:0 auto; text-align:center; border-top:1px solid #ebe9e9; background:#383838; font-size:14px; color:white;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p class="reception-info">Reception</p>
                                                        <p>
                                                            {{ $data['event']['recaddress'] }}, {{ $data['event']['reccity'] }},
                                                            {{ $data['event']['reccountry'] }},
                                                            {{ $data['event']['recprovince'] }}, {{ $data['event']['recpc'] }}
                                                            <a href="{{ $data['event']['recAddressLink'] }}"
                                                                style="margin-left:5px; color:#2bb573; text-decoration:none;"
                                                                target="_blank">(View Map)</a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="footer-content">
                                        <p>Powered by <img
                                                src="https://clickinvitation.com/assets/images/logo/logoNewWhite.png"
                                                alt="Click Invitation" style="width: 115px;"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Copyright © 2024 ClickInvitation. All rights reserved.<br>
            +1 (438) 303-9948<br>
            <a href="mailto:Info@Clickinvitation.Com">Info@Clickinvitation.Com</a> |
            <a href="https://clickinvitation.com/contact" target="_blank">clickinvitation.com/contact</a>
        </p>
    </div>

</body>

</html>
