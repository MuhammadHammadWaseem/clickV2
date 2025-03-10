<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QD4QH7KNBF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QD4QH7KNBF');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/fontstyle.css">
    <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">
    <link rel="stylesheet" href="{{ asset('assets/Panel/css/style.css') }}">
</head>
<div class="thisBody" style="display:none">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- data1: title1, title2, title3, title4, name1, name2, cermony, other1 other2, other3 -->
    <!-- data2: background, card, titleFont, titleColor, nameFont, nameColor, cermonyFont, cermonyColor, otherFont otherColor -->
    <div class="container-fluid" id="main-bg">
        <!-- background-->

        <!-- envlope-->
        <div class="wrapper">

        <input type="hidden" id="id_event" value="{{ $eventData[0]->json }}">


            <div class="envelope_bottom"></div>
            <div id="container" class="letter">
                <div class="flip-card" id="flipCard">
                    <canvas id="canvas" style=" scale: 0.4 !important;">Your browser doesn't support canvas</canvas>
                    <img src="{{ asset('/card-images/' . $eventData[0]->id_event . 'Back.png') }}?t={{ time() }}" class="back"
                        id="cardImage" alt="">
                </div>
            </div>
        </div>
        @if ($card[0]->two_sided == 1)
            <button id="flipButton" class="btn t-btn extra-card">Flip Card</button>
        @endif
    </div>

    @if ($card[0]->rsvp != '0,0,0,0,0,0')
        <!-- Button to submit RSVP -->
        <a class="btn t-btn extra-card" id="submit-rsvp" data-bs-toggle="offcanvas" href="#offcanvasExample"
            role="button" aria-controls="offcanvasExample"
            style="
     
     z-index: 7;
     position: absolute;
     bottom: 20px;
     left: 40%;
     transform: translateX(-50%);
     width: 70%;
     /* margin: 0 5px; */
 
 ">
            {{ __('cardinvit.SUBMIT YOUR RSVP') }}
        </a>
        <a class="btn t-btn extra-card" id="checkin"
            href="{{ env('APP_URL') }}/CheckInQr/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
            target="_blank"
            style="
           
     z-index: 7;
     position: absolute;
     bottom: 20px;
     left: 86%;
     transform: translateX(-50%);
     width: 20%;
     /* margin: 0 5px; */
 
        ">
            {{ __('cardinvit.Check in QR Code') }}
        </a>
    @endif
    <!-- Toggle sidebar of RSVP -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ __('cardinvit.SUBMIT YOUR RSVP') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">

            @if($guest->mainguest != 1)
                @if ($card[0]->rsvp[0] == '1')
                <a href="{{ env('APP_URL') }}/attending/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn t-btn modify ">{{ __('cardinvit.Attending') }}</a><br>
                @endif
                @if ($card[0]->rsvp[2] == '1')
                <a href="{{ env('APP_URL') }}/gift-suggestion/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn t-btn modify ">{{ __('cardinvit.Gift Suggestions') }}</a><br>
                @endif
                @if ($card[0]->rsvp[4] == '1')
                <a href="{{ env('APP_URL') }}/check-in/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn t-btn modify ">{{ __('cardinvit.At the reception Check-In') }}</a><br>
                @endif
                @if ($card[0]->rsvp[6] == '1')
                <a href="{{ env('APP_URL') }}/add-photos/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn t-btn modify ">{{ __('cardinvit.Upload your Photos') }}</a><br>
                @endif
                @if ($card[0]->rsvp[8] == '1')
                <a href="{{ env('APP_URL') }}/sorry-cant/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn t-btn modify ">{{ __('cardinvit.Unable to Attend') }}</a>
                @endif
                @if ($card[0]->rsvp[10] == '1')
                <a href="{{ env('APP_URL') }}/website/{{ $card[0]->id_event }}" class="btn t-btn modify ">{{ __('cardinvit.Go to the website') }}</a>
                @endif
                <br /><br /><br />
                <a href="https://www.youtube.com/watch?v=spxr19KtIuQ" target="blank" class="btn t-btn modify ">{{ __('cardinvit.Learn How RSVP work') }}</a>
            @endif


            
            @if($guest->mainguest == 1)
                @if ($guestOptions->attending == 1 || ($card[0]->rsvp[0] == '1' && $guestOptions->attending == 1))
                    <a href="{{ env('APP_URL') }}/attending/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                        class="btn t-btn modify ">{{ __('cardinvit.Attending') }}</a><br>
                @endif

                @if ($guestOptions->gift == 1 || ($card[0]->rsvp[2] == '1' && $guestOptions->gift == 1))
                    <a href="{{ env('APP_URL') }}/gift-suggestion/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                        class="btn t-btn modify ">{{ __('cardinvit.Gift Suggestions') }}</a><br>
                @endif

                @if ($guestOptions->checkin == 1 || ($card[0]->rsvp[4] == '1' && $guestOptions->checkin == 1))
                    <a href="{{ env('APP_URL') }}/check-in/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                        class="btn t-btn modify ">{{ __('cardinvit.At the reception Check-In') }}</a><br>
                @endif

                @if ($guestOptions->photos == 1 || ($card[0]->rsvp[6] == '1' && $guestOptions->photos == 1))
                    <a href="{{ env('APP_URL') }}/add-photos/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                        class="btn t-btn modify ">{{ __('cardinvit.Upload your Photos') }}</a><br>
                @endif

                @if ($card[0]->rsvp[8] == '1')
                    <a href="{{ env('APP_URL') }}/sorry-cant/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}"
                        class="btn t-btn modify ">{{ __('cardinvit.Unable to Attend') }}</a>
                @endif

                @if ($guestOptions->website == 1 || ($card[0]->rsvp[10] == '1' && $guestOptions->website == 1))
                    <a href="{{ env('APP_URL') }}/website/{{ $card[0]->id_event }}"
                        class="btn t-btn modify ">{{ __('cardinvit.Go to the website') }}</a>
                @endif
                <br /><br /><br />
                @if ($guestOptions->rsp == 1)
                    <a href="https://www.youtube.com/watch?v=spxr19KtIuQ" target="blank"
                        class="btn t-btn modify ">{{ __('cardinvit.Learn How RSVP work') }}</a>
                @endif
            @endif

        </div>
    </div>
</div>
</div>
<button class="btnPreview" id="myBtn" onclick="animationPage(), myBtn1()" hidden>Preview Animation</button>
<script src="/assets/js/animationScript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<style>
    #container {
        perspective: 1000px;
    }

    .flip-card {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }

    .flip-card .front, .flip-card .back {
            position: absolute;
    width: 100%;
    height: 275px;
    backface-visibility: hidden;
    top: -2px;
    left: 0;
        }

    .flip-card .back {
        transform: rotateY(180deg);
    }

    .flipped {
        transform: rotateY(180deg);
    }

    #flipButton {
        position: absolute;
        bottom: 70px;
        right: 50%;
    }

    .wrapper>img {
        max-width: 50px;
        height: 30px;
        margin: 0 !important;
        position: absolute;
        bottom: 5px;
        right: auto;
        left: 5px;
        z-index: 9;
        object-fit: contain;
    }

    @font-face {
        font-family: MONTEZ-REGULAR;
        src: url(font/MONTEZ-REGULAR.TTF);
    }

    @font-face {
        font-family: NIGHT-DEMO;
        src: url(font/NIGHT-DEMO.TTF);
    }

    @font-face {
        font-family: DANCINGSCRIPT-BOLD;
        src: url(font/DANCINGSCRIPT-BOLD.TTF);
    }

    @font-face {
        font-family: DANCINGSCRIPT-REGULAR;
        src: url(font/DANCINGSCRIPT-REGULAR.TTF);
    }

    @font-face {
        font-family: FREESCPT;
        src: url(font/FREESCPT.TTF);
    }

    @font-face {
        font-family: NIGHT-DEMO;
        src: url(font/NIGHT-DEMO.TTF);
    }

    @font-face {
        font-family: AGENCYB;
        src: url(font/AGENCYB.TTF);
    }

    body {
        margin: 0;
    }

    #main-bg {
        background: url("http://clickadmin.searchmarketingservices.online/eventcards/{{ $card[0]->bgName }}");
        background-size: cover;
        background-position: center center;
    }

    .container-fluid {

        background-position: center;
        background-size: cover;
        height: 100vh;
    }

    .wrapper {
        top: 100px;
    margin: 0px auto;
    height: auto;
    width: 300px;
    position: relative;
    display: flex;
    justify-content: center;
    z-index: 0;
    transform: scale(2.5);
}

    .lid {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        border-right: 150px solid transparent;
        border-bottom: 100px solid transparent;
        border-left: 150px solid transparent;
        transform-origin: top;
        -webkit-transform-origin: top;
        -ms-transform-origin: top;
        -moz-transform-origin: top;
        transition: transform 0.25s linear;
    }

    /*efe7d1*/
    /* Lid when closed */
    .lid.one {
        border-top: 100px solid {{ $card[0]->cardColorOut }};
        transform: rotateX(0deg);
        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        z-index: 3;
        transition-delay: 0.75s;
        -webkit-transition-delay: 0.75s;
        -moz-transition-delay: 0.75s;
        -o-transition-delay: 0.75s;
        animation: openLid1 10s;
        animation-fill-mode: forwards;
        width: 0px;
        animation-delay: 2.5s !important;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    /* Lid when opened */
    .lid.two {
        border-top: 100px solid #efd7d1;
        transform: rotateX(90deg);
        -webkit-transform: rotateX(90deg);
        -moz-transform: rotateX(90deg);
        z-index: 1;
        transition-delay: 0.5s;
        -webkit-transition-delay: 0.5s;
        -moz-transition-delay: 0.5s;
        -o-transition-delay: 0.5s;
        animation: openLid2 10s;
        animation-fill-mode: forwards;
        width: 0px;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .envelope {
        position: absolute;
        height: 0%;
        width: 00%;
        top: 0;
        left: 0;
        border-top: 100px solid transparent;
        border-right: 150px solid {{ $card[0]->cardColorOut }};
        border-bottom: 100px solid {{ $card[0]->cardColorOut }};
        border-left: 150px solid {{ $card[0]->cardColorOut }};
        z-index: 5;
        /* display: none; */
    }

    .envelope2 {
        border: 1px solid #efd7d1;
        z-index: 5;
        width: -webkit-fill-available;
    }

    .envelope_bottom {
        height: 0%;
        width: 0%;
        top: 50%;

        position: absolute;
        z-index: 3;
        border-radius: 20px 0 0 0;
        border-top: 100px solid #efd7d1;
        border-bottom: 100px solid transparent;
        border-right: 100px solid transparent;
        border-left: 100px solid #f0b5aa;
        rotate: 45deg;

        box-shadow: -27px -27px 26px -45px rgba(0, 0, 0, 0.5);
        -webkit-box-shadow: -27px -27px 26px -45px rgba(0, 0, 0, 0.5);
        -moz-box-shadow: -27px -27px 26px -45px rgba(0, 0, 0, 0.5);

        /* -------- */
        display: none;
    }

    #canvas {
        position: absolute;
        top: -205px !important;
        left: -135px !important;
    }

    .letter {
        position: absolute;
        top: 0;
        width: 60%;
        height: 140%;
        background-color: #a7a7a700;
        border-radius: 1px;
        z-index: 2;
        transition: 0.5s;
        animation: openLetter 10s;
        animation-fill-mode: forwards;
        transform: rotateX(90deg);
        -webkit-transform: rotateX(90deg);
        -moz-transform: rotateX(90deg);
        background-position: center !important;
        background-size: cover !important;

        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform: translate3d(0, 0, 0);
    }

    .letter p {
        text-align: center;
    }

    #atitle1 {
        padding-top: 70px;
    }

    .allTitle {
        font-family: {
                {
                $card[0]->titleFont
            }
        }

        ;
        font-size: 0.5em;
        margin: 0;
    }

    .main-names {
        margin: 10px auto;

        font-family: {
                {
                $card[0]->fontFamily
            }
        }

        ;
        font-size: 1.2em !important;

        color: {
                {
                $card[0]->fontColor
            }
        }

        ;
    }

    .cermony {
        font-family: {
                {
                $card[0]->cermonyFont
            }
        }

        ;
        font-size: 0.5em;
        margin-bottom: 1em;
    }

    .other1,
    .other2,
    .other3 {
        font-family: {
                {
                $card[0]->otherFont
            }
        }

        ;
        font-size: 0.4em !important;
        margin: 0 !important;
        color: #c1baa5;
    }

    .other1 {
        padding-top: 0px !important;
    }

    .border {
        border: 1px solid red;
        ;
    }

    .modify {
        width: 100%;
        margin: 5px 0;
    }
    .thisBody {
        display: block !important;
    }

    @media only screen and (max-width: 760px) {
        #flipButton {
            right: 40%!important;
            font-size:12px;
        }

        #checkin {
            z-index: 7!important;
            position: absolute!important;
            bottom: 20px!important;
            left: 86%!important;
            transform: translateX(-77%)!important;
            width: 44%!important;
            font-size:12px;
        }

        #submit-rsvp {
            z-index: 7!important;
            position: absolute!important;
            bottom: 20px!important;
            left: 40%!important;
            transform: translateX(-80%)!important;
            width: 45%!important;
            font-size:12px;
        }

    }
    @media only screen and (max-width: 370px) {
        #checkin {
            width: 45%!important;
            font-size:10px;
        }

        #submit-rsvp {
            width: 49%!important;
            font-size:10px;
        }

    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
    integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const flipCard = document.getElementById('flipCard');
    const flipButton = document.getElementById('flipButton');
    if (flipButton) {
        flipButton.addEventListener('click', () => {
            flipCard.classList.toggle('flipped');
        });
    }
    let canv;
    window.addEventListener("load", () => {
        $(document).ready(function() {
            $("body").css("background-color", "#e9e9e9");
            canv = new fabric.StaticCanvas('canvas', {
                backgroundColor: 'white',
                width: 450,
                height: 680,
            });

            console.log("fabric canvas loaded");
            handleJSONImport();


        })

    })


    function handleJSONImport() {
        var file = $('#id_event').val();
        //console.log('Handle ' + id);
        //   $.ajax({
        //     type: "GET",
        //     url: `/get-json?id=${id}`,
        //     success: function (response) {
        //       if (response) {
        //         console.log('Data Received:', response.data);
        //         const file = response.data;
        fetch(`/Json/${file}?t=${new Date().getTime()}`)
            .then((res) => res.json())
            .then(function(data) {
                const jsonData = data;
                console.log(jsonData);

                // Assuming 'canv' is your canvas element
                if (canv) {
                    canv.clear();
                    canv.loadFromJSON(jsonData, function() {
                        canv.renderAll();
                    });
                }

                // Assuming you want to display the JSON data in a div with id 'letter'
                const letterDiv = document.getElementById("letter");
                if (letterDiv) {
                    letterDiv.textContent = JSON.stringify(jsonData, null, 2); // Display JSON data
                }
            });
    }
    //     },
    //   });
    // }

    var file = $('#id_event').val();

    fetch(`/Json/${file}?t=${new Date().getTime()}`)
        .then((res) => res.json())
        .then(function(data) {
            const jsonData = data;
            console.log(jsonData);

            // Assuming 'canv' is your canvas element
            if (canv) {
                canv.clear();
                canv.loadFromJSON(jsonData, function() {
                    // generateCanvasImageFromJSON(jsonData);
                    canv.renderAll();
                });
            }

            // Assuming you want to display the JSON data in a div with id 'letter'
            const letterDiv = document.getElementById("letter");
            if (letterDiv) {
                letterDiv.textContent = JSON.stringify(jsonData, null, 2); // Display JSON data
            }
        });
</script>
