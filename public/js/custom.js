$(function(){

    //fade out all alerts after certain interval
    setInterval(function(){
        $('.alert-msgs').fadeOut();
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
                alert.attr('class', '').addClass('alert ' + alertType + ' alert-msgs');
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
                $('#emptyCart').hide();
                $('#cartCount').text(res);
            }
        });
        
    });

    // if ($('.datatables').length) {
    //     $('.datatables').DataTable({
    //         'columnDefs': [{
    //             'targets': [-1], // column or columns numbers
    //             'orderable': false,  // set orderable for selected columns
    //         }]
    //     });
    // }    

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

    $('#view-cart').on('click', function(){
        $.ajax({
            url: subpath+'/get-cart',
            data: {},
            dataType: 'json',
            beforeSend: function(){
                $('#cartView').html('<div align="center"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>');
                                         // .prop('disabled', true);
            },
            success: function(res){
                // return false;
                if (res) {
                    $('#emptyCart').hide();
                    if (!res.noData) {
                        $('#checkoutBttn').prop('disabled', false);
                    }
                    $('#cartView').html(res.view);
                    $("[type='number']").keydown(function (e) {
                        e.preventDefault();
                    });
                }
            }
        }); 
        $('#view-cart-modal').modal('show');
    });

    $(document).on('input', "input[type='number']", function() {
        var quantity = $(this).val();
        var master = $(this).parents(':eq(2)');
        var productNo = master.data('product');
        var price = master.find("[name='amount_"+productNo+"']").val(); 
        master.find("[name='quantity[]']").val(quantity);
        master.find("[name='quantity_"+productNo+"']").val(quantity);
        var newPrice = parseFloat(price * quantity).toFixed(2);
        master.find("[name='newPrice_"+productNo+"']").val(newPrice);
        master.find(".price").text("$"+newPrice);
        var prices = [];
        $("[name*='newPrice_']").each(function(){
            prices.push($(this).val());
        });
        var total = 0;
        for (var i = 0; i < prices.length; i++) {
            total = parseFloat(total) + parseFloat(prices[i]);
        }
        master.parent().find("[name='total_amount']").val(total).next().text("$"+total.toFixed(2));
    });

    $('#checkoutBttn').on('click', function(e){
        e.preventDefault();
        if($('#checkoutForm').valid())
        {
            var data = $('#checkoutForm').serializeArray();
            $.ajax({
                url: subpath+'/save-order-details',
                type: 'POST',
                dataType: 'json',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function()
                {

                },
                success: function(res)
                {
                    // console.log(res);
                    if (res.success) {
                        $('#checkoutForm').submit();
                    } else {
                        $('#checkout-alert span').text(res.msg);
                        $('#checkout-alert').fadeIn();
                    }
                }
            });
        }     
    });

    // if ($("#checkoutForm").length) {
        $("#checkoutForm").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              name: "required",
              email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
              },
              address: "required"
            },
            // Specify validation error messages
            messages: {
              name: "Please enter your name.",
              email: "Please enter a valid email address.",
              address: "Please enter your address."
            }
        });
    // }
});

function changeStatus(url)
{
    swal({
        title: "Are you sure you want to delete this item ?",
        icon: "warning",
        buttons: true,
        dangermode: true,
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Yes"
    }, function(isConfirm) 
    {
        if (isConfirm) {
            window.location = url;
        }    
    });
   
}

function removeItemFromCart(elem, itemId)
{
    swal({
        title: "Are you sure you want to remove this item ?",
        icon: "warning",
        buttons: true,
        dangermode: true,
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Yes"
    }, function(isConfirm) 
    {
        if (isConfirm) {
            var master = elem.parents(":eq(1)");
            var mParent = master.parent();
            master.remove();
            var prices = [];
            $("[name*='newPrice_']").each(function(){
                prices.push($(this).val());
            });
            var total = 0;
            for (var i = 0; i < prices.length; i++) {
                total = parseFloat(total) + parseFloat(prices[i]);
            }
            mParent.find("[name='total_amount']").val(total).next().text("$"+total.toFixed(2));

            $.ajax({
                url: subpath+'/remove-from-cart',
                data: {
                    'productId': itemId
                },
                dataType: 'json',
                beforeSend: function(){
                    // $('#contact-us-loader').show();
                },
                success: function(res){
                    $('#cartCount').text(res);
                    if (!res) {
                        $('#cartView').html('');
                        $('#checkoutBttn').prop('disabled', true);
                        $('#emptyCart').show();
                    }
                }
            });
        }    
    });
}