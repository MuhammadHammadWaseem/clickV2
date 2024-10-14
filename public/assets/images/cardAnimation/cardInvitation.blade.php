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
</head>
<div class="thisBody" style="display:none">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- data1: title1, title2, title3, title4, name1, name2, cermony, other1 other2, other3 -->
    <!-- data2: background, card, titleFont, titleColor, nameFont, nameColor, cermonyFont, cermonyColor, otherFont otherColor -->
    <div class="container-fluid" id="main-bg">
        <!-- background-->

        <!-- envlope-->
        <div class="wrapper theAnimation">
            <div class="lid one"></div>
            <div class="lid two"></div>
            {{-- <img class="envelope2" src="{{ asset('assets\images\envlope.png') }}" /> --}}
            <div class="envelope">


            </div>
            @if (isset($guestName))
            <p style="font-family: 'Yellowtail', cursive;width: 300px;text-align: center;transform: translateX(-50%);margin-top: 50px;font-size: 1.2em;position: absolute;z-index: 6;left: 50%;bottom: 0;">
                <sup style="font-size: 0.5em">TO</sup> {{ $guestName }}
            </p>
            @endif

            <div class="envelope_bottom"></div>
            <div class="letter">
                <div style="
                display: flex;
                justify-content: center; flex-direction: column;">
                    <p class="allTitle" id="atitle1" style="color: {{ $card[0]->titleColor }} !important;">
                        {{ $card[0]->title1 }}</p>
                    <p class="allTitle" id="atitle2" style="color: {{ $card[0]->titleColor }} !important;">
                        {{ $card[0]->title2 }}</p>
                    <p class="allTitle" id="atitle3" style="color: {{ $card[0]->titleColor }} !important;">
                        {{ $card[0]->title3 }}</p>
                    <p class="allTitle" id="atitle4" style="color: {{ $card[0]->titleColor }} !important;">
                        {{ $card[0]->title4 }}</p>

                    <p class="main-names" id="name1">
                        @if($isCouple == 1)
                        @if (strlen($card[0]->name1) > 0 && strlen($card[0]->name2) > 0)
                        {{ $card[0]->name1 }} & {{ $card[0]->name2 }}
                        @elseif (strlen($card[0]->name1) > 0)
                        {{ $card[0]->name1 }}
                        @elseif (strlen($card[0]->name2) > 0)
                        {{ $card[0]->name2 }}
                        @endif
                        @else
                        {{ $card[0]->name1 }}
                        @endif
                    </p>
                    <p class="cermony" id="acermony" style="color: {{ $card[0]->cermonyColor }} !important;">
                        {{ $card[0]->cermony }}</p>
                    <p class="other1" id="other1" style="color: {{ $card[0]->otherColor }} !important;">
                        {{ $card[0]->other1 }}</p>
                    <p class="other2" id="other2" style="color: {{ $card[0]->otherColor }} !important;">
                        {{ $card[0]->other2 }}</p>
                    <p class="other3" id="other3" style="color: {{ $card[0]->otherColor }} !important;">
                        {{ $card[0]->other3 }}</p>

                </div>
            </div>
        </div>


    </div>

    @if ($card[0]->rsvp != '0,0,0,0,0,0')
    <!-- Button to submit RSVP -->
    <a class="btn btn-primary extra-card" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="
     z-index: 7;
     position: absolute;
     bottom: 20px;
     left: 50%;
     transform: translateX(-50%);
     width: 90%;
     /* margin: 0 5px; */
 ">
        {{ __('cardinvit.SUBMIT YOUR RSVP') }}
    </a>
    @endif
    <!-- Toggle sidebar of RSVP -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ __('cardinvit.SUBMIT YOUR RSVP') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">

            @if ($card[0]->rsvp[0] == '1')
            <a href="{{ env('APP_URL') }}attending/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn btn-outline-success modify ">{{ __('cardinvit.Attending') }}</a><br>
            @endif

            @if ($card[0]->rsvp[2] == '1')
            <a href="{{ env('APP_URL') }}gift-suggestion/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn btn-outline-primary modify ">{{ __('cardinvit.Gift Suggestions') }}</a><br>
            @endif

            @if ($card[0]->rsvp[4] == '1')
            <a href="{{ env('APP_URL') }}check-in/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn btn-outline-primary modify ">{{ __('cardinvit.At the reception Check-In') }}</a><br>
            @endif

            @if ($card[0]->rsvp[6] == '1')
            <a href="{{ env('APP_URL') }}add-photos/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn btn-outline-primary modify ">{{ __('cardinvit.Upload your Photos') }}</a><br>
            @endif

            @if ($card[0]->rsvp[8] == '1')
            <a href="{{ env('APP_URL') }}sorry-cant/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}" class="btn btn-outline-secondary modify ">{{ __('cardinvit.Sorry! I Can\'t') }}</a>
            @endif

            @if ($card[0]->rsvp[10] == '1')
            <a href="{{ env('APP_URL') }}website/{{ $card[0]->id_event }}" class="btn btn-outline-success modify ">{{ __('cardinvit.Go to the website') }}</a>
            @endif
            <br /><br /><br />
            <a href="https://www.youtube.com/watch?v=spxr19KtIuQ" target="blank" class="btn btn-outline-secondary modify ">{{ __('cardinvit.Learn How RSVP work') }}</a>
        </div>
    </div>
</div>
</div>
<button class="btnPreview" id="myBtn" onclick="animationPage()" hidden>Preview Animation</button>
<script src="/assets/js/animationScript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<style>
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
    }

    .container-fluid {

        background-position: center;
        background-size: cover;
        height: 100vh;
    }

    .wrapper {
        top: 185px;
        margin: 0px auto;
        height: 200px;
        width: 300px;
        background-color: #{{ $card[0]->cardColorIn }
    }

    ;
    position: relative;
    display: flex;
    justify-content: center;
    z-index: 0;

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
        border-top: 100px solid #{{ $card[0]->cardColorIn }
    }

    ;
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
        border-top: 100px solid #{{ $card[0]->cardColorIn }
    }

    ;
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
        border-right: 150px solid #{{ $card[0]->cardColorOut }
    }

    ;
    border-bottom: 100px solid #{{ $card[0]->cardColorOut }
    }

    ;
    border-left: 150px solid #{{ $card[0]->cardColorOut }
    }

    ;
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
        border-top: 100px solid #{{ $card[0]->cardColorIn }
    }

    ;
    border-bottom: 100px solid transparent;
    border-right: 100px solid transparent;
    border-left: 100px solid #{{ $card[0]->cardColorOut }
    }

    ;
    rotate: 45deg;

    box-shadow: -27px -27px 26px -45px rgba(0, 0, 0, 0.5);
    -webkit-box-shadow: -27px -27px 26px -45px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: -27px -27px 26px -45px rgba(0, 0, 0, 0.5);

    /* -------- */
    display: none;
    }

    .letter {
        position: absolute;
        top: -38px;
        width: 60%;
        height: 140%;
        background-color: rgb(167, 167, 167);
        border-radius: 1px;
        z-index: 2;
        transition: 0.5s;
        animation: openLetter 10s;
        animation-fill-mode: forwards;
        transform: rotateX(90deg);
        -webkit-transform: rotateX(90deg);
        -moz-transform: rotateX(90deg);

        <?php if($card[0]->customCard) {
            background: url(/assets/images/cardAnimation/{{ $card[0]->cardName }});
        }

        else {
            background: url(http://clickadmin.searchmarketingservices.online/eventcards/{{ $card[0]->cardName }});
        }

        ?>background-position: center;
        background-size: cover;
        display: block;
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

    .theAnimation {
        animation: slide-in-right 13s;
        animation-fill-mode: forwards;
    }

    @keyframes slide-in-right {
        10% {
            transform: translateX(0) scale(0.5);
            -webkit-transform: translateX(0) scale(0.5);
            -moz-transform: translateX(0) scale(0.5);
        }

        20% {
            transform: translateX(-1500px) scale(0.5);
            -webkit-transform: translateX(-1500px) scale(0.5);
            -moz-transform: translateX(-1500px) scale(0.5);
        }

        30% {
            transform: translateX(1500px) scale(0.7);
            -webkit-transform: translateX(1500px) scale(0.7);
            -moz-transform: translateX(1500px) scale(0.7);
        }

        40% {
            transform: translateX(0) scale(1);
            -webkit-transform: translateX(0) scale(1);
            -moz-transform: translateX(0) scale(1);
            top: 185px;
        }

        100% {
            transform: translateX(0) scale(2.5);
            -webkit-transform: translateX(0) scale(2.5);
            -moz-transform: translateX(0) scale(2.5);
            top: 40%;
        }

    }

    @keyframes openLid1 {
        50% {
            transform: rotateX(0deg);
            -webkit-transform: rotateX(0deg);
            -moz-transform: rotateX(0deg);
            transition-delay: 0s;
        }

        20% {
            display: none;
        }

        70% {
            /* transform: rotateX(90deg);
            -webkit-transform: rotateX(90deg);
            -moz-transform: rotateX(90deg);
            transition-delay: 0s;       */
            display: none;
        }

        100% {
            /* transform: rotateX(90deg);
            -webkit-transform: rotateX(90deg);
            -moz-transform: rotateX(90deg);
            transition-delay: 0s;       */
            opacity: 0;

        }

    }

    @keyframes openLid2 {
        20% {
            /* transform: rotateX(0deg);
            -webkit-transform: rotateX(0deg);
            -moz-transform: rotateX(0deg);
            transition-delay: 0.25s;
            z-index: -1; */
            display: none;
        }

        80%,
        100% {
            transform: rotateX(180deg);
            -webkit-transform: rotateX(180deg);
            -moz-transform: rotateX(180deg);

            z-index: -1;
            display: none;
        }
    }

    @keyframes openLetter {
        0% {
            transform: translateY(0px) rotate(90deg);
            -webkit-transform: translateY(0px) rotate(90deg);
            -moz-transform: translateY(0px) rotate(90deg);
            transition-delay: 0.5s;
            z-index: 2;
        }

        70% {
            transform: translateY(0px) rotate(90deg);
            -webkit-transform: translateY(0px) rotate(90deg);
            -moz-transform: translateY(0px) rotate(90deg);
            transition-delay: 0.5s;
            z-index: 2;
        }

        80% {
            transform: translateY(-200px) rotate(90deg);
            -webkit-transform: translateY(-200px) rotate(90deg);
            -moz-transform: translateY(-200px) rotate(90deg);
            transition-delay: 0.5s;
            z-index: 2;
        }

        85% {
            z-index: 10;
        }

        90% {
            transform: translateY(-28px) rotate(0deg);
            -webkit-transform: translateY(-28px) rotate(0deg);
            -moz-transform: translateY(-28px) rotate(0deg);
            transition-delay: 0.5s;
            z-index: 10;
        }

        100% {
            transform: translateY(-28px) rotate(0deg);
            ;
            -webkit-transform: translateY(-28px) rotate(0deg);
            ;
            -moz-transform: translateY(-28px) rotate(0deg);
            ;
            z-index: 10;
        }

    }

    /*
  .wrapper:hover .lid.one {
      transform: rotateX(90deg);
      transition-delay: 0s;
  }
  
  .wrapper:hover .lid.two {
      transform: rotateX(180deg);
      transition-delay: 0.25s;
  }
  
  .wrapper:hover .letter {
    transform: translateY(-50px);
    transition-delay: 0.5s;
  }
*/



    .border {
        border: 1px solid red;
        ;
    }

    .modify {
        width: 100%;
        margin: 5px 0;
    }

    .extra-card {
        animation: fade-in 10s;
        animation-fill-mode: forwards;
        opacity: 0;
    }

    @keyframes fade-in {
        90% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }

    }

    @media only screen and (max-width: 900px) {
        @keyframes slide-in-right {
            10% {
                transform: translateX(0) scale(0.5);
                -webkit-transform: translateX(0) scale(0.5);
                -moz-transform: translateX(0) scale(0.5);
            }

            20% {
                transform: translateX(-950px) scale(0.5);
                -webkit-transform: translateX(-950px) scale(0.5);
                -moz-transform: translateX(-950px) scale(0.5);
            }

            30% {
                transform: translateX(950px) scale(0.7);
                -webkit-transform: translateX(950px) scale(0.7);
                -moz-transform: translateX(950px) scale(0.7);
            }

            40% {
                transform: translateX(0) scale(1);
                -webkit-transform: translateX(0) scale(1);
                -moz-transform: translateX(0) scale(1);
                top: 185px;
            }

            100% {
                transform: translateX(0) scale(2.5);
                -webkit-transform: translateX(0) scale(2.5);
                -moz-transform: translateX(0) scale(2.5);
                top: 40%;
            }

        }

    }

    @media only screen and (max-width: 750px) {
        @keyframes slide-in-right {
            10% {
                transform: translateX(0) scale(0.5);
                -webkit-transform: translateX(0) scale(0.5);
                -moz-transform: translateX(0) scale(0.5);
            }

            20% {
                transform: translateX(-800px) scale(0.5);
                -webkit-transform: translateX(-800px) scale(0.5);
                -moz-transform: translateX(-800px) scale(0.5);
            }

            30% {
                transform: translateX(800px) scale(0.7);
                -webkit-transform: translateX(800px) scale(0.7);
                -moz-transform: translateX(800px) scale(0.7);
            }

            40% {
                transform: translateX(0) scale(1);
                -webkit-transform: translateX(0) scale(1);
                -moz-transform: translateX(0) scale(1);
                top: 185px;
            }

            100% {
                transform: translateX(0) scale(2);
                -webkit-transform: translateX(0) scale(2);
                -moz-transform: translateX(0) scale(2);
                top: 40%;
            }

        }

    }

    @media only screen and (max-width: 600px) {

        @keyframes slide-in-right {
            10% {
                transform: translateX(0) scale(0.5);
                -webkit-transform: translateX(0) scale(0.5);
                -moz-transform: translateX(0) scale(0.5);
            }

            20% {
                transform: translateX(-650px) scale(0.5);
                -webkit-transform: translateX(-650px) scale(0.5);
                -moz-transform: translateX(-650px) scale(0.5);
            }

            30% {
                transform: translateX(650px) scale(0.7);
                -webkit-transform: translateX(650px) scale(0.7);
                -moz-transform: translateX(650px) scale(0.7);
            }

            40% {
                transform: translateX(0) scale(1);
                -webkit-transform: translateX(0) scale(1);
                -moz-transform: translateX(0) scale(1);
                top: 185px;
            }

            100% {
                transform: translateX(0) scale(1.5);
                -webkit-transform: translateX(0) scale(1.5);
                -moz-transform: translateX(0) scale(1.5);
                top: 40%;
            }

        }

        @keyframes openLetter {
            00% {
                transform: translateY(0px) rotate(90deg);
                -webkit-transform: translateY(0px) rotate(90deg);
                -moz-transform: translateY(0px) rotate(90deg);
                transition-delay: 0.5s;
                z-index: 2;
            }

            70% {
                transform: translateY(0px) rotate(90deg);
                -webkit-transform: translateY(0px) rotate(90deg);
                -moz-transform: translateY(0px) rotate(90deg);
                transition-delay: 0.5s;
                z-index: 2;
            }

            80% {
                transform: translateY(-200px) rotate(90deg) scale(1);
                -webkit-transform: translateY(-200px) rotate(90deg) scale(1);
                -moz-transform: translateY(-200px) rotate(90deg) scale(1);
                transition-delay: 0.5s;
                z-index: 2;
            }

            85% {
                z-index: 10;
            }

            90% {
                transform: translateY(-70px) rotate(0deg);
                -webkit-transform: translateY(-70px) rotate(0deg);
                -moz-transform: translateY(-70px) rotate(0deg);
                transition-delay: 0.5s;
                z-index: 10;
            }

            100% {
                transform: translateY(-70px) rotate(0deg) scale(1.5);
                -webkit-transform: translateY(-70px) rotate(0deg) scale(1.5);
                -moz-transform: translateY(-70px) rotate(0deg) scale(1.5);
                z-index: 10;
            }

        }
    }


    @media only screen and (max-width: 450px) {
        @keyframes slide-in-right {
            10% {
                transform: translateX(0) scale(0.5);
                -webkit-transform: translateX(0) scale(0.5);
                -moz-transform: translateX(0) scale(0.5);
            }

            20% {
                transform: translateX(-500px) scale(0.5);
                -webkit-transform: translateX(-500px) scale(0.5);
                -moz-transform: translateX(-500px) scale(0.5);
            }

            30% {
                transform: translateX(500px) scale(0.7);
                -webkit-transform: translateX(500px) scale(0.7);
                -moz-transform: translateX(500px) scale(0.7);
            }

            40% {
                transform: translateX(0) scale(1);
                -webkit-transform: translateX(0) scale(1);
                -moz-transform: translateX(0) scale(1);
                top: 185px;
            }

            100% {
                transform: translateX(0) scale(0.8);
                -webkit-transform: translateX(0) scale(0.8);
                -moz-transform: translateX(0) scale(0.8);
                top: 40%;
            }
        }

        @keyframes openLetter {
            0% {
                transform: translateY(0px) rotate(90deg);
                -webkit-transform: translateY(0px) rotate(90deg);
                -moz-transform: translateY(0px) rotate(90deg);
                transition-delay: 0.5s;
                z-index: 2;
            }

            70% {
                transform: translateY(0px) rotate(90deg);
                -webkit-transform: translateY(0px) rotate(90deg);
                -moz-transform: translateY(0px) rotate(90deg);
                transition-delay: 0.5s;
                z-index: 2;
            }

            80% {
                transform: translateY(-200px) rotate(90deg) scale(1);
                -webkit-transform: translateY(-200px) rotate(90deg) scale(1);
                -moz-transform: translateY(-200px) rotate(90deg) scale(1);
                transition-delay: 0.5s;
                z-index: 2;
            }

            85% {
                z-index: 10;
            }

            90% {
                transform: translateY(-70px) rotate(0deg);
                -webkit-transform: translateY(-70px) rotate(0deg);
                -moz-transform: translateY(-70px) rotate(0deg);
                transition-delay: 0.5s;
                z-index: 10;
            }

            100% {
                transform: translateY(-70px) rotate(0deg) scale(2);
                -webkit-transform: translateY(-70px) rotate(0deg) scale(2);
                -moz-transform: translateY(-70px) rotate(0deg) scale(2);
                z-index: 10;
            }

        }

        .show {
            width: 300px !important;
        }


    }

    .thisBody {
        display: block !important;
    }

</style>
