// header script

$(function() {

    $(".navbar-set li > a").each(function() {

        var href = $(this).attr('href');

        var heading = $(this).text();

        $('.sidenav').append('<a href="' + href + '">' + heading + '<\/a>');

    });

});







function openNav() {

    document.getElementById("mySidenav").style.left = "0px";

}



function closeNav() {

    document.getElementById("mySidenav").style.left = "-250px";

}









$(".awards-slider").slick({

    dots: false,
    arrows: false,
    fade: true,

    infinite: true,

    speed: 300,

    autoplay: true,

    slidesToShow: 1,

    slidesToScroll: 1

});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})




// blogslider start

$('.product-slider').slick({

    dots: false,

    arrows: true,
    autoplay: false,
    infinite: true,
    autoplaySpeed: 1500,
    speed: 900,
    centerPadding: 0,

    speed: 300,

    slidesToShow: 5,

    centerMode: false,

    slidesToScroll: 1,

    responsive: [{

            breakpoint: 1024,

            settings: {

                slidesToShow: 3,

                slidesToScroll: 1,

                infinite: true,

                dots: false

            }

        },

        {

            breakpoint: 600,

            settings: {

                slidesToShow: 2,

                slidesToScroll: 2

            }

        },

        {

            breakpoint: 480,

            settings: {

                slidesToShow: 1,

                slidesToScroll: 1

            }

        }

    ]

});



// blogslider end



// product slider jas start



$('.slider-vid').slick({

    slidesToShow: 1,

    slidesToScroll: 1,

    arrows: false,

    fade: true,

    asNavFor: '.slider-more-vid'

});

$('.slider-more-vid').slick({

    slidesToShow: 3,

    slidesToScroll: 1,

    asNavFor: '.slider-vid',

    dots: false,

    focusOnSelect: true

});

// product slider jas end



// simple slick slider start

$(".regular").slick({

    dots: true,

    infinite: true,

    speed: 300,

    autoplay: true,

    slidesToShow: 3,

    slidesToScroll: 3

});



// simple slick slider end



// wow animation js



$(function() {

    new WOW().init();

});





// responsive menu js



$(function() {

    $('#menu').slicknav();

});







// slick slider in tabs js start



function openCity(evt, cityName) {

    // Declare all variables

    var i, tabcontent, tablinks;



    // Get all elements with class="tabcontent" and hide them

    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {

        tabcontent[i].style.display = "none";

    }



    // Get all elements with class="tablinks" and remove the class "active"

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) {

        tablinks[i].className = tablinks[i].className.replace("active", "");

    }



    // Show the current tab, and add an "active" class to the button that opened the tab

    document.getElementById(cityName).style.display = "block";

    evt.currentTarget.className += "active";

}





// slick slider in tabs js end

var str = location.href.toLowerCase();

$(".navbar-set>li>a").each(function() {

    if (str.indexOf(this.href.toLowerCase()) > -1) {

        $(".navbar-set li.active").removeClass("active");

        $(this).parent().addClass("active");

    }

});