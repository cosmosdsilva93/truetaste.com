@extends('common.master')
@section('title', $title)
@section('content')
<section id="contact" class="tv-section-padding">
    <div class="contact-form contact-form-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <address class="find-us">
                        <span class="md">Find Us Here</span>
                        <div class="location-1">
                            <i class="cform-icon fa fa-location-arrow"></i>
                            <strong>221B BAKER ST,</strong>
                            MARYLEBONE,<br> 
                            LONDON NW1 6XE,<br> 
                            UK<br>
                            (518)356-5373 
                        </div>

                        <!-- <div class="location-1">
                            <i class="cform-icon fa fa-location-arrow"></i>
                            <strong>Location 1: 500 CURRY RD</strong>
                            SCHENECTADY NY 12306 (518)356-5373 
                        </div> -->

                        <div class="phone">
                            <strong>Support Call</strong>
                            (452)356-8546
                        </div>
                    </address>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div id="respond">
                        <div class="alert alert-msgs" id="contact-us-alert" align="center" style="display:none;">
                            <span id="contact-us-alert-msg"></span>
                        </div>
                        <form id="contact-us-form">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-item form-textarea">
                                        <textarea class="inputs" name="message" placeholder="Message" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-item form-name">
                                        <input class="inputs" name="name" placeholder="Your Name" type="text" required value="{{ isset($_SESSION['userDetails']) ? $_SESSION['userDetails']['first_name'] . ' ' . $_SESSION['userDetails']['last_name'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-item form-email">
                                        <input class="inputs" name="email" placeholder="Your Email" type="email" required value="{{ isset($_SESSION['userDetails']) ? $_SESSION['userDetails']['email'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-actions">
                                        <div class="blogsubmit">
                                            <input value="Send Message" type="submit">
                                            &nbsp;&nbsp;&nbsp;
                                            <span id="contact-us-loader" style="display:none;"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Google Maps-->
<section class="tv-section-padding">
    <div id="map" class="map-canvas"></div>
</section>
<!--End Google Maps-->
@endsection