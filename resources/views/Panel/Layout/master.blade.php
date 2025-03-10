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

    @include('Panel.Layout.header')

    <section class="main-dashboard-sec">
        <div class="container-fluid p-0">
            <div class="row">
                @include('Panel.Layout.slidebar')
                @yield('content')
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/wow-animate.js') }}"></script>
    <script src="{{ asset('assets/Panel/js/lib.js') }}"></script>
    <script src="{{ asset('assets/Panel/js/custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script src="https://unpkg.com/fabric@5.3.0/dist/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
        integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <!-- Use only one Fabric.js version (choose the latest or the version you prefer) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
        integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    {{-- Add a section for page-specific scripts --}}
    @yield('scripts')

    <script type="text/javascript">
        $(document).on('ready', function() {
            wow = new WOW({
                animateClass: 'animated',
                offset: 100,
                callback: function(box) {
                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            });

            wow.init();

            $('#show-password').on('change', function() {
                const passwordField = $('#password');
                const type = $(this).is(':checked') ? 'text' : 'password';
                passwordField.attr('type', type);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview2').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview2').hide();
                    $('#imagePreview2').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload2").change(function() {
            readURL2(this);
        });

        var btns = document.getElementsByClassName('toggleForm');

        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener('change', function() {
                var forms = document.getElementsByClassName('ceremonyForm');
                for (var j = 0; j < forms.length; j++) {
                    if (this === btns[j]) {
                        if (this.checked) {
                            forms[j].classList.remove('hidden');
                        } else {
                            forms[j].classList.add('hidden');
                        }
                    }
                }
            });
        }

        window.onload = function() {
            init();
        };

        function init() {
            var menu = document.getElementById("menu");
            menu.classList.add("transition-after-pageload");
        }
    </script>
</body>

</html>
