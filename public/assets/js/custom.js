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


document.querySelectorAll('ul li a').forEach(function(a, index) {
    a.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action of the link

        // Remove 'active-li' class from all <li> elements
        document.querySelectorAll('ul li').forEach(function(li) {
            li.classList.remove('active-li');
        });

        // Add 'active-li' class to the parent <li> of the clicked <a>
        a.parentElement.classList.add('active-li');

        // Hide all content rows
        document.querySelectorAll('.content-row').forEach(function(row) {
            row.classList.remove('active-row');
        });

        // Show the corresponding content row
        document.querySelectorAll('.content-row')[index].classList.add('active-row');
    });
});

// Show the first row by default
document.querySelectorAll('.content-row')[0].classList.add('active-row');
document.querySelectorAll('ul li')[0].classList.add('active-li');


