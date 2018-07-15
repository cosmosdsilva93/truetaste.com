@extends('common.master')
@section('title', $title)

@section('content')
<section id="the-menu">
    <div class="tabs-menu tabs-page">
        <div class="container">
            <ul class="nav-tabs text-center" role="tablist">
                <li class="active"><a href="#breakfast" role="tab" data-toggle="tab">Breakfast</a></li>
                <li><a href="#lunch" role="tab" data-toggle="tab">Lunch</a></li>
                <li><a href="#dinner" role="tab" data-toggle="tab">Dinner</a></li>
                <li><span style="color:#ffffff;">|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                <li>
                    <div style="color:#ffffff;">
                        <span title="View Cart"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></span>
                        &nbsp;
                        <?php 
                            $cartCount = (isset($_SESSION['cart'])) ? array_sum($_SESSION['cart']) : 0;
                         ?>
                        <span style="font-size: 20px;" id="cartCount">{{ $cartCount }}</span>
                        <span><a href="">View Cart</a></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="tv-section-padding">
        <div class="container">
            <div class="tab-menu-content tab-content">
                <!-- BREAKFAST -->
                <div class="tab-pane fade in active" id="breakfast">
                    <div class="row" data-category=1>
                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=1>
                                <div class="image-wrap">
                                    <img src="images/Image5.png" class="img-responsive" alt="menu-img">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div> 
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=2>
                                <div class="image-wrap">
                                    <img src="images/Image6.png" class="img-responsive" alt="menu-img">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=3>
                                <div class="image-wrap">
                                    <img src="images/Image7.png" class="img-responsive" alt="menu-img">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=4>
                                <div class="image-wrap">
                                    <img src="images/Image8.png" class="img-responsive" alt="menu-img">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=5>
                                <div class="image-wrap">
                                    <img src="images/Image5.png" class="img-responsive" alt="menu-img">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=6>
                                <div class="image-wrap">
                                    <img src="images/Image6.png" class="img-responsive" alt="menu-img">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=7>
                                <div class="image-wrap">
                                    <img src="images/Image7.png" class="img-responsive" alt="menu-img">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=8>
                                <div class="image-wrap">
                                    <img src="images/Image8.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=9>
                                <div class="image-wrap">
                                    <img src="images/Image5.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item" data-product=10>
                                <div class="image-wrap">
                                    <img src="images/Image6.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                                <div class="blogsubmit" style="position:absolute;top:40px;right:0;">
                                    <input class="buyBttn" value="Buy" type="submit">
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                    </div>

                </div>
                <!-- END / BREAKFAST -->

                <!-- LUNCH -->
                <div class="tab-pane fade" id="lunch">
                    <div class="row">

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image7.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image8.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image5.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image6.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image7.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image8.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image5.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                    </div>
                </div>
                <!-- END / LUNCH -->

                <!-- DINNER -->
                <div class="tab-pane fade" id="dinner">
                    <div class="row">

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image6.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image7.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image8.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image5.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image6.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image7.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image8.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</span>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                    </div>
                </div>
                <!-- END / DINNER -->

                <?php /*
                <!-- DESSERT -->
                <div class="tab-pane fade" id="dessert">
                    <div class="row">

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image5.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image6.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image7.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image8.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image5.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image6.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                    </div>
                </div>
                <!-- END / DESSERT -->
                <?php */ ?>
                <!-- DRINK -->
                <?php /*
                <div class="tab-pane fade" id="drink">
                    <div class="row">

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image7.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image8.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image5.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image6.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image7.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image8.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->

                        <!-- THE MENU ITEM -->
                        <div class="col-md-6 col-lg-6">
                            <div class="the-menu-item">
                                <div class="image-wrap">
                                    <img src="images/Image5.png" alt="">
                                </div>
                                <div class="the-menu-body">
                                    <span class="menu-title">Scrambled Eggs in Puff Pastry</a>
                                </div>
                                <div class="prices">
                                    <span class="price">$16.00</span>
                                </div>
                                <!-- <div class="highlight">Offer</div> -->
                            </div>
                        </div>
                        <!-- END / THE MENU ITEM -->
                    </div>
                </div>
                <!-- END / DRINK -->
                <?php */ ?>
            </div>
        </div>
    </div>
</section>
@endsection