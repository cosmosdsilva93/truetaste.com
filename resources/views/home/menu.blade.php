@extends('common.master')
@section('title', $title)

@section('content')
<section id="the-menu">
    <div class="tabs-menu tabs-page">
        <div class="container">
            <ul class="nav-tabs text-center" role="tablist">
                @foreach($menu as $categoryId => $items)
                    <li class="{{ ($categoryId == 1) ? 'active' : '' }}"><a href="#{{ $categories[$categoryId] }}" role="tab" data-toggle="tab">{{ ucfirst($categories[$categoryId]) }}</a></li>
                @endforeach    
                <li><span style="color:#ffffff;">|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                <li>
                    <div style="color:#ffffff;">
                        <span title="View Cart"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></span>
                        &nbsp;
                        <?php 
                            $cartCount = (isset($_SESSION['cart'])) ? array_sum($_SESSION['cart']) : 0;
                         ?>
                        <span style="font-size: 20px;" id="cartCount">{{ $cartCount }}</span>
                        <span><a href="javascript:void(0);" id="view-cart">View Cart</a></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="tv-section-padding">
        <div class="container">
            <div class="tab-menu-content tab-content">
                <!-- BREAKFAST -->
                @foreach($menu as $categoryId => $items)
                <div class="tab-pane fade {{ ($categoryId == 1) ? 'in active' : '' }}" id="{{ $categories[$categoryId] }}">
                    <div class="row" data-category={{ $categoryId }}>
                        <!-- THE MENU ITEM -->
                        @foreach($items as $itemDetails)
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product={{ $itemDetails['id'] }}>
                                <div class="image-wrap">
                                    <img src="images/Image{{ rand(5,8) }}.png" class="img-responsive" alt="menu-img">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">{{ ucwords($itemDetails['item']) }}</span>
                                </div>
                                <div class="prices">
                                    <span class="price">${{ number_format($itemDetails['price'], 2) }}</span>
                                </div> 
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- END / THE MENU ITEM -->
                    </div>
                </div>
                <!-- END / BREAKFAST -->
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="view-cart-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Your Cart</h4>
            </div>
            <div class="modal-body" id="cart-modal-body">
                <div class="alert alert-danger alert-msgs" align="center" id="checkout-alert" style="display:none;">
                    <span></span>
                </div>
                <form id="checkoutForm" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST" role="form">
                    
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="truetastestore2018@gmail.com">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <div id="cartView">
                               
                    </div>               
                    <input type="hidden" name="currency_code" value="USD">
                    
                    <!-- Specify URLs -->
                    <input type='hidden' name='cancel_return' value='{{ url('/payment-failed') }}'>
                    <input type='hidden' name='return' value='{{ url('/payment-success') }}'>

                    <div class="blogsubmit" align="center">
                        <br>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="checkoutBttn" class="btn btn-danger" disabled>Checkout</button>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <div align="center">
                    
                    <button type="button" class="btn btn-danger">Checkout</button>                        
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection