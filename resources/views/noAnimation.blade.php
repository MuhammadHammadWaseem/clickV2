<link rel="stylesheet" href="/fontstyle.css">
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
            margin-top: 20px;
            position: absolute;
            bottom: 10px;
        }
        #main-bg {
        background: url("http://clickadmin.searchmarketingservices.online/eventcards/{{ $cardData[0]->bgName }}");
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


    

    .letter {
        position: absolute;
        top: 0px;
        width: 60%;
        /* height: 140%; */
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
    .thisBody {
        display: block !important;
    }

    #canvas {
        position: absolute;
        top: -205px !important;
        left: -135px !important;
    }

</style>
<div class="thisBody" style="display:none">
    <link rel="stylesheet" href="https://searchmarketingservices.online/fonts/index.css">

    <!-- data1: title1, title2, title3, title4, name1, name2, cermony, other1 other2, other3 -->
    <!-- data2: background, card, titleFont, titleColor, nameFont, nameColor, cermonyFont, cermonyColor, otherFont otherColor -->
    <div class="container-fluid" id="main-bg">
        <!-- background-->

        <!-- envlope-->
        <div class="wrapper">
         
            <div id="container" class="letter">
                <div class="flip-card" id="flipCard">
                    <canvas id="canvas" style=" scale: 0.4 !important;">Your browser doesn't support canvas</canvas>
                    @if ($cardData[0]->two_sided == 1)
                    <img src="{{ asset('/card-images/' . $eventData[0]->id_event . 'Back.png') }}?t={{ time() }}" class="back" id="cardImage" alt="">
                    @endif
                </div>
            </div>
        </div>
        @if($cardData[0]->two_sided == 1)
        <button id="flipButton" class="btn btn-primary">Flip Card</button>
        @endif
    </div>
</div>
<input type="hidden" id="id_event" value="{{ $eventData[0]->json }}">
{{-- {{$eventData->json }} --}}
<script src="/assets/js/animationScript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js" integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const flipCard = document.getElementById('flipCard');
        const flipButton = document.getElementById('flipButton');
        if (flipButton){
            flipButton.addEventListener('click', () => {
                flipCard.classList.toggle('flipped');
            });
        }

    let canv;
    window.addEventListener("load", () => {
        $(document).ready(function() {
            $("body").css("background-color", "#e9e9e9");
            canv = new fabric.StaticCanvas('canvas', {
                backgroundColor: 'white'
                , width: 450
                , height: 680
            , });

            //console.log("fabric canvas loaded");
            handleJSONImport();


        })

    })


    function handleJSONImport() {
        var file = $('#id_event').val();
        ////console.log('Handle '+id);
        //   $.ajax({
        //     type: "GET",
        //     url: `/get-json?id=${id}`,
        //     success: function (response) {
        //       if (response) {
        //         //console.log('Data Received:', response.data);
        //         const file = response.data;
        fetch(`/Json/${file}?t=${new Date().getTime()}`)
            .then((res) => res.json())
            .then(function(data) {
                const jsonData = data;
                //console.log(jsonData);

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
            //console.log(jsonData);

            // Assuming 'canv' is your canvas element
            if (canv) {
                canv.clear();
                canv.loadFromJSON(jsonData, function() {
                    // generateCanvasImageFromJSON(jsonData);
                    canv.renderAll();
                    console.log(canv);
                });
            }

            // Assuming you want to display the JSON data in a div with id 'letter'
            const letterDiv = document.getElementById("letter");
            if (letterDiv) {
                letterDiv.textContent = JSON.stringify(jsonData, null, 2); // Display JSON data
            }
        });


</script>
