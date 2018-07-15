$(function(){

    //fade out all alerts after certain interval
    setInterval(function(){
        $('.alert').fadeOut();
    }, '3000');

    if($('#chefowl').length){
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
    }    

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
    if ($imagePopup.length) {
        /*Image*/
        $imagePopup.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }    

    $('#contact-us-form').on('submit', function(e){
        e.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            url: subpath+'/send-message',
            data: data,
            dataType: 'json',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                $('#contact-us-loader').show();
            },
            success: function(res){
                // return false;
                $('#contact-us-loader').hide();
                var alert = $('#contact-us-alert');
                var alertType = (res.success) ? 'alert-success' : 'alert-danger';
                alert.attr('class', '').addClass('alert ' + alertType);
                alert.children().eq(0).text(res.msg);
                $('#contact-us-form .inputs').val('');
                $('#contact-us-alert').fadeIn();
            }
        });
    });  

    $('.buyBttn').on('click', function(){
        var productId = $(this).parents().eq(1).data('product');
        var categoryId = $(this).parents().eq(3).data('category');
        // console.log(categoryId + '>>>>>>>>' + productId);
        $.ajax({
            url: subpath+'/add-to-cart',
            data: {
                'categoryId': categoryId,
                'productId': productId
            },
            dataType: 'json',
            beforeSend: function(){
                // $('#contact-us-loader').show();
            },
            success: function(res){
                $('#cartCount').text(res);
            }
        });
        
    });

    $('.datatables').DataTable({
        'columnDefs': [{
            'targets': [-1], // column or columns numbers
            'orderable': false,  // set orderable for selected columns
        }]
    });

    $('#login-form').on('submit', function(e){
        e.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            url: subpath+'/login',
            data: data,
            dataType: 'json',
            beforeSend: function(){
                $('#login-submit-button').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
                                         .prop('disabled', true);
            },
            success: function(res){
                // return false;
                if (res) {
                    window.location.assign(res.url);
                    $('#login-submit-button').html('login')
                                             .prop('disabled', false);
                }
            }
        });
    });

});

