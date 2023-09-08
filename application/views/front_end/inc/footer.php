<input type="hidden" name="base" id="base" value="<?=base_url()?>">
<footer class="footer bg-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Contact Info</h4>
                        <ul class="contact-info">
                            <li>
                                <span class="contact-info-label">Address</span>12802 Murphy Rd, Suite C, Stafford, Texas 77477, USA
                            </li>
                            <li>
                                <span class="contact-info-label">Phone</span>Toll Free <a href="tel:18004965168">1-800-496-5168</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Email</span> <a href="mailto:info@safetylensusa.com">info@safetylensusa.com</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Working Days/Hours</span>
                                Mon - Sat / 9:00AM - 6:00 PM
                            </li>
                        </ul>
                        <div class="social-icons">
                            <a href="https://www.instagram.com/safetylensusa" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                            <a href="https://www.facebook.com/safetylensusa" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                        </div><!-- End .social-icons -->
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->
                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>

                        <ul class="links">
                            <li><a href="<?=b('login');?>">Sign in</a></li>
                            <li><a href="<?=b('account');?>">My Orders</a></li>
                            <li><a href="<?=b('cart');?>">My Cart</a></li>
                            <li><a href="<?=b('checkout');?>">Checkout</a></li>
                        </ul>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Quick links</h4>

                        <ul class="links">
                            <li><a href="<?=b('about-us');?>">About Us</a></li>
                            <li><a href="<?=b('contact-us');?>">Contact Us</a></li>
                        </ul>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Policies</h4>

                        <ul class="links">
                            <li><a href="<?=b('terms-and-conditions');?>">Terms and Conditions</a></li>
                            <li><a href="<?=b('privacy-policy');?>">Privacy &amp; Security Policy</a></li>
                            <li><a href="<?=b('refund-policy');?>">Refund Policy</a></li>
                            <li><a href="<?=b('cancellation-policy');?>">Cancellation Policy</a></li>
                        </ul>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">About Safety Lens USA</h4>

                        <p style="text-align:justify">SafetyLensUSA.com is excited to expand its services directly to retail customers. Our wide selection of frames and prescription lenses are available for purchase online...</p>
                        <a href="<?=b('about-us');?>" class="read-more">Read More <i class="icon-angle-double-right"></i></a>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <!--<div class="col-lg-3 col-sm-6">
                    <div class="widget widget-newsletter">
                        <h4 class="widget-title">Subscribe newsletter</h4>
                        <p>Get all the latest information on events, sales and offers. Sign up for newsletter:</p>
                        <form action="#" class="mb-0">
                            <input type="email" class="form-control m-b-3" placeholder="Email address" required>

                            <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                        </form>
                    </div>
                </div>--><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
            <p class="footer-copyright py-3 pr-4 mb-0">&copy; safetylensusa.com <?=date('Y');?>. All Rights Reserved</p>

            <img src="<?=repo_fr()?>images/payments.png" alt="payment methods" class="footer-payments py-3">
        </div><!-- End .footer-bottom -->
    </div><!-- End .container -->
</footer><!-- End .footer -->
<!--<footer class="bg_gray">
	<div class="footer_top small_pt pb_20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="<?/*= b() */?>">
                                <img src="<?/*= content('main_logo_color'); */?>" alt="logo">
                            </a>
                        </div>
                        <ul class="contact_info">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p><?/*= not(content('contact_address'),'-') */?></p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:<?/*= not(content('contact_email'),'-') */?>"><?/*= not(content('contact_email'),'-') */?></a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <a href="tel:<?/*= not(content('contact_phone'),'-') */?>"><?/*= not(content('contact_phone'),'-') */?></a>
                            </li>
                        </ul>
                    </div>
        		</div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Useful Links</h6>
                        <ul class="widget_links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">My Account</h6>
                        <ul class="widget_links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Discount</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Orders History</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                	<div class="widget">
                    	<h6 class="widget_title">Download App</h6>
                        <ul class="app_list">
                            <li><a href="#"><img src="<?/*= repo_fr() */?>images/f1.png" alt="f1"></a></li>
                            <li><a href="#"><img src="<?/*= repo_fr() */?>images/f2.png" alt="f2"></a></li>
                        </ul>
                    </div>
                	<div class="widget">
                    	<h6 class="widget_title">Social</h6>
                        <ul class="social_icons">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-center text-md-left mb-md-0">© <?/*= date('Y'); */?> All Rights Reserved by <a href="https://threeseasinfologics.com/">Three Seas Infologics</a></p>
                </div>
                <div class="col-lg-6">
                    <ul class="footer_payment text-center text-md-right">
                        <li><a href="#"><img src="<?/*= repo_fr() */?>images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="<?/*= repo_fr() */?>images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="<?/*= repo_fr() */?>images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="<?/*= repo_fr() */?>images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="<?/*= repo_fr() */?>images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 


-->
<input type="hidden" id="csrf_token" value="<?=$this->security->get_csrf_token_name();?>">
<input type="hidden" id="csrf_hash" value="<?=$this->security->get_csrf_hash();?>">