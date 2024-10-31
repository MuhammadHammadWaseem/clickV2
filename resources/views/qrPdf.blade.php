<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest List</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');

        @font-face {
            font-family: 'AbhayaLibreMedium';
            src: url('fonts/AbhayaLibreMedium.ttf') format('truetype');
        }
        @font-face {
            font-family: 'Mozart';
            src: url('fonts/Mozart.otf') format('opentype');
        }
        @font-face {
            font-family: 'MozartScriptEXTBold';
            src: url('fonts/MozartScriptEXTBold.ttf') format('truetype');
        }

        .guest-card {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .qr-code {
            max-width: 170px;
            margin-top: 12px!important;
            margin-bottom: 0px!important;
        }

        .name-text {
            font-family: 'AbhayaLibreMedium';
            font-size: 35px;
            margin-top: 0px!important;
            margin-bottom: 0px!important;
        }

        .kindly {
            /* font-family: "Great Vibes", cursive; */
            font-family: 'MozartScriptEXTBold';
            font-size: 58px;
            margin: 0!important;
            margin-bottom: 8px!important;
            padding: 0!important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            @foreach ($guests as $guest)
                <div class="col-md-6">
                    <div class="guest-card">
                        <p class="kindly">Kindly Rsvp</p>
                        <p class="name-text" style="letter-spacing: 3px; text-transform: uppercase; font-size: 33px !important;">BY {{ $guest['eventDate'] }}</p>
                        <p class="name-text" style="font-weight: 400; margin-top: 2!important; margin-bottom: 2!important;">Please scan this QR code to RSVP</p>
                        {{-- <img class="qr-code" src="{{ $guest['qr_code_path'] }}" width="170px" alt="QR Code"> --}}
                        <img class="qr-code" src="data:image/png;base64,{{ $guest['qr_code_base64'] }}" width="170px" alt="QR Code">

                        <p class="name-text" style="font-size: 26px !important; margin-top: 0!important">{{ $guest['name'] }}</p>
                    </div>
                </div>
                <div style="page-break-before: always"></div>
            @endforeach
        </div>
    </div>
</body>

</html>


