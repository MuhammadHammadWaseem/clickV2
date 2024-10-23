// blogslider start
$(".event-slider-single").slick({
    dots: false,
    arrows: true,
    autoplay: false,
    infinite: true,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            },
        },
    ],
});


// $(".blogslid").slick({
//     dots: true,
//     arrows: true,
//     autoplay: true,
//     infinite: true,
//     prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
//     nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
//     speed: 300,
//     slidesToShow: 3,
//     slidesToScroll: 4,
//     responsive: [
//         {
//             breakpoint: 1024,
//             settings: {
//                 slidesToShow: 3,
//             },
//         },
//         {
//             breakpoint: 600,
//             settings: {
//                 slidesToShow: 2,
//             },
//         },
//         {
//             breakpoint: 480,
//             settings: {
//                 slidesToShow: 1,
//             },
//         },
//     ],
// });


document.querySelectorAll('ul li a').forEach(function (a, index) {
    a.addEventListener('click', function (event) {
        // event.preventDefault(); // Prevent default action of the link

        // Remove 'active-li' class from all <li> elements
        document.querySelectorAll('ul li').forEach(function (li) {
            li.classList.remove('active-li');
        });

        // Add 'active-li' class to the parent <li> of the clicked <a>
        a.parentElement.classList.add('active-li');

        // Hide all content rows
        document.querySelectorAll('.content-row').forEach(function (row) {
            row.classList.remove('active-row');
        });

        // Show the corresponding content row
        // document.querySelectorAll('.content-row')[index].classList.add('active-row');
    });
});

if (document.getElementById("toggleBtn")) {
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("toggleBtn").addEventListener("click", function () {
            var sidebar = document.getElementById("sidebar");
            var content = document.getElementById("content");

            if (sidebar.classList.contains("col-lg-2")) {
                sidebar.classList.remove("col-lg-2");
                sidebar.classList.add("col-lg-1");

                content.classList.remove("col-lg-10");
                content.classList.add("col-lg-11");
            } else {
                sidebar.classList.remove("col-lg-1");
                sidebar.classList.add("col-lg-2");

                content.classList.remove("col-lg-11");
                content.classList.add("col-lg-10");
            }
        });
    });
}


    function toggleButtons() {
        var checkBox = document.getElementById("two-sided-card");
        var buttons = document.querySelector(".two-btn-align");
        
        // Toggle display based on checkbox status
        if (checkBox.checked) {
            buttons.style.display = "block";
        } else {
            buttons.style.display = "none";
        }
    }
