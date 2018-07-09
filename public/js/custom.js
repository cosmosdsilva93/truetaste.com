$(function(){
    $('#chefowl').owlCarousel({
        margin: 10,
        autoWidth: false,
        nav: true,
        items: 3,
        dots: true,
//        navText: ["<img src='images/left-arrow.png'>", "<img src='images/right-arrow.png'>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            700: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });

    $(document).on('click', '#back-to-top', function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    $(window).load(function () {
    // Animate loader off screen
        $("#loader-wrapper").fadeOut("slow");
        ;
    });

    $(".hover").mouseleave(
        function () {
            $(this).removeClass("hover");
        }
    );

    var $imagePopup = $('[data-image-popup]');
    /*Image*/
    $imagePopup.magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
});

