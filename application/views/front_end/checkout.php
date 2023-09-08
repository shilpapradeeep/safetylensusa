<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
    <style type="text/css">

@media (min-width: 992px)
{
   h2, .h2 {
    font-size: 2.5rem;
} 
}
#billingAdd, #shippingAdd
{
    max-width:100% !important;
}


    </style>


</head>
<body>
<div class="page-wrapper">
<?php
       ?>

    <header class="header">

        <?php
        $this->load->view('front_end/inc/header-top');
        $this->load->view('front_end/inc/header-middle');
        $this->load->view('front_end/inc/header-bottom');
        ?>



    </header><!-- End .header -->

   
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <ul class="checkout-progress-bar">
                    <li class="active">
                        <span>Shipping</span>
                    </li>
                    <li>
                        <span>Review &amp; Payments</span>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-lg-8" id="mainDiv">
                        <?php if(!$this->session->userdata('l_uid'))
                        { ?>
                        <ul class="checkout-steps" id="checkout-steps">
                            <li >
                                <h2 class="step-title">Login</h2>

                             <?=form_open('',array('id'=>'lform','autocomplete'=>'off',"onsubmit"=>"return submit_log()")); ?>
                                    <div class="form-group ">
                                        <label>Email Address </label>
                                        <div class="form-control-tooltip">
                                            <input type="email" class="form-control"  id="username"  name="username" >
                                            <span class="input-tooltip" data-toggle="tooltip" title="We'll send your order confirmation here." data-placement="right"><i class="icon-question-circle"></i></span>
                                        </div><!-- End .form-control-tooltip -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group ">
                                        <label>Password </label>
                                        <input type="password" class="form-control"  id="password" name="password" >
                                    </div><!-- End .form-group -->
                                    
                                    <p>You already have an account with us. Sign in or continue as guest.</p>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary">LOGIN</button>
                                        <a href="forgot-password.html" class="forget-pass"> Forgot your password?</a>
                                    </div><!-- End .form-footer -->
                              </form>

                                
                            </li>
                            <li>
                              <?=form_open('',array("id"=>"guestAddressAdd")) ;?>  
                        <div class="checkout-payment">
                            <h2 class="step-title">Shipping Information</h2>

                            <h4>Billing Address</h4>
                            
                            <div class="form-group-custom-control">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="address_checkbox" name="address_checkbox" value="1">
                                    <label class="custom-control-label" for="address_checkbox">My billing and shipping address are the same</label>
                                </div><!-- End .custom-checkbox -->

                            </div><!-- End .form-group -->


                            <div id="new-checkout-address" class="show">
                                 
                              
                                    <div class="row">
                                        <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>First Name </label>
                                        <input type="text" class="form-control"  id="bill_fname" name="bill_fname">
                                    </div><!-- End .form-group -->
                                      <span id="bill_fname_error" class="form-error"></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Last Name </label>
                                        <input type="text" class="form-control"  id="bill_lname" name="bill_lname">
                                    </div><!-- End .form-group -->
                                      <span id="bill_lname_error" class="form-error"></span>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Address  </label>
                                        <input type="email" class="form-control" id="bill_email" name="bill_email">
                                    </div><!-- End .form-group -->
                                      <span id="bill_email_error" class="form-error"></span>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Address </label>
                                        <input type="text" class="form-control"  id="bill_addr" name="bill_addr">
                                       
                                    </div><!-- End .form-group -->
                                      <span id="bill_addr_error" class="form-error"></span>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group ">
                                        <label>Street  </label>
                                        <input type="text" class="form-control"  id="bill_street" name="bill_street">
                                    </div><!-- End .form-group -->
                                      <span id="bill_street_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>City  </label>
                                        <input type="text" class="form-control" id="bill_city" name="bill_city">
                                    </div><!-- End .form-group -->
                                      <span id="bill_city_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State/Province</label>
                                        
                                            <input type="text"  class="form-control" id="bill_state" name="bill_state">
                                              
                                        
                                    </div><!-- End .form-group -->
                                      <span id="bill_state_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Zip/Postal Code </label>
                                        <input type="text" class="form-control"  id="bill_zip" name="bill_zip">
                                    </div><!-- End .form-group -->
                                      <span id="bill_zip_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <div class="select-custom">
                                            <select class="form-control" id="bill_ctry" name="bill_ctry">
                                                <?php
                                                if(!empty($countries))
                                                {
                                                    foreach($countries as $c)
                                                    {
                                                        echo ' <option '.$c->code=='US'?'selected':''.' value="'.$c->id.'">'.$c->code.'-'.$c->name.'</option>';
                                                    }
                                                } ?>
                                                
                                              
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->
                                      <span id="bill_ctry_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Phone Number </label>
                                        <div class="form-control-tooltip">
                                            <input type="tel" class="form-control" required=" " id="bill_phone" name="bill_phone">
                                            <span class="input-tooltip" data-toggle="tooltip" title="" data-placement="right" data-original-title="For delivery questions."><i class="icon-question-circle"></i></span>
                                        </div><!-- End .form-control-tooltip -->
                                    </div><!-- End .form-group -->
                                      <span id="bill_phone_error" class="form-error"></span>
                                </div>
                                  </div>
                              
                            
                            </div><!-- End #new-checkout-address -->

                        </div><!-- End .checkout-payment -->

                       
                    
                         
                                
                        <div class="checkout-payment shipping-address-div">
                           

                            <h4>Shipping Address</h4>
                            
                            

                            

                            <div id="new-checkout-address" class="show">
                                 
                                 <div class="row">
                                      <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>First Name </label>
                                        <input type="text" class="form-control"  id="ship_fname" name="ship_fname">
                                    </div><!-- End .form-group -->
                                      <span id="ship_fname_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Last Name </label>
                                        <input type="text" class="form-control"  id="ship_lname" name="ship_lname">
                                    </div><!-- End .form-group -->
                                      <span id="ship_lname_error" class="form-error"></span>
                                    </div>
                                      <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Address  </label>
                                        <input type="email" class="form-control" id="ship_email" name="ship_email">
                                    </div><!-- End .form-group -->
                                      <span id="ship_email_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Address </label>
                                        <input type="text" class="form-control"  id="ship_addr" name="ship_addr">
                                        
                                    </div><!-- End .form-group -->
                                      <span id="ship_addr_error" class="form-error"></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Street  </label>
                                       <input type="text" class="form-control"  id="ship_street" name="ship_street">
                                    </div><!-- End .form-group -->
                                    <span id="ship_street_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>City  </label>
                                        <input type="text" class="form-control" id="ship_city" name="ship_city">
                                    </div><!-- End .form-group -->
                                      <span id="ship_city_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State/Province</label>
                                        <input type="text" class="form-control" class="form-control" id="ship_state" name="ship_state">
                                      
                                    </div><!-- End .form-group -->
                                      <span id="ship_state_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zip/Postal Code </label>
                                        <input type="text" class="form-control"  id="ship_zip" name="ship_zip">
                                    </div><!-- End .form-group -->
                                      <span id="ship_zip_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <div class="select-custom">
                                            <select class="form-control" id="ship_ctry" name="ship_ctry">
                                                <?php
                                                if(!empty($countries))
                                                {
                                                    foreach($countries as $c)
                                                    {
                                                        echo ' <option '.$c->code=='US'?'selected':''.' value="'.$c->id.'">'.$c->code.'-'.$c->name.'</option>';
                                                    }
                                                } ?>
                                              
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->
                                      <span id="ship_ctry_error" class="form-error"></span>
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Phone Number </label>
                                        <div class="form-control-tooltip">
                                            <input type="tel" class="form-control" required=" " id="ship_phone" name="ship_phone">
                                            <span class="input-tooltip" data-toggle="tooltip" title="" data-placement="right" data-original-title="For delivery questions."><i class="icon-question-circle"></i></span>
                                        </div><!-- End .form-control-tooltip -->
                                    </div><!-- End .form-group -->
                                      <span id="ship_phone_error" class="form-error"></span>
                                </div>
                                  </div>
                               
                            </div><!-- End #new-checkout-address -->

                           
                        </div><!-- End .checkout-payment -->

                       </form>
                    
                            </li>
							

                        </ul>
                    <?php } ?>
                    <?php if(!empty($addessDiv))
                    echo $addessDiv;
                    ?>
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                     <?php   $this->load->view('front_end/inc/cart_summary'); ?>
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->

              
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->
        
        <input type="hidden" id="have_sess" value="<?=$have_sess;?>">
    <input type="hidden" id="address_id" value="<?=!empty($cartAddrData['shipping'] )?$cartAddrData['shipping']:null;?>">
    <input type="hidden" id="bill_address_id" value="<?=!empty($cartAddrData['billing'] )?$cartAddrData['billing']:null;?>">
    <?php
    $this->load->view('front_end/inc/address/add_modal');
    $this->load->view('front_end/inc/footer');
    ?>
</div><!-- End .page-wrapper -->


<?php
$this->load->view('front_end/inc/mobile-menu-bar');
?>


<!-- Add Cart Modal -->

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<?php $this->load->view('front_end/inc/script'); ?>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="<?=base_url().'assets/front_end/vendor/slider/src/jquery.exzoom.js';?>"></script>
<link href="<?=base_url().'assets/front_end/vendor/slider/src/jquery.exzoom.css';?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript">

      $('.container').imagesLoaded( function() {
      $("#exzoom").exzoom({
            autoPlay: false,
        });
      $("#exzoom").removeClass('hidden')
    });

</script>
<script src="<?=repo_fr()?>js/custom.js"></script>
<script src="<?=repo_fr()?>js/checkout.js"></script>
</body>

</html>