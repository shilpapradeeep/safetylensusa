<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
</head>

<body>

<!-- LOADER -->
<?php $this->load->view('front_end/inc/preloader')?>

<header class="fixed-top header_wrap">
    <?php 
        $this->load->view('front_end/inc/top-bar');
        $this->load->view('front_end/inc/search-bar');
        $this->load->view('front_end/inc/menu-bar');
    ?>
    
    
</header>
<!-- END HEADER -->

<!-- START BREADCRUMB -->
<?php $this->load->view('front_end/inc/breadcrumb'); ?>
<!-- END BREADCRUMB -->

<!-- END MAIN CONTENT -->
<div class="main_content">
    
    <div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Forgot Password</h3>
                        </div>
                       
                            <input type="hidden" name="user_id" id="user_id">
                            
                            <div id="useremail">
                               
                                <div class="form-group">
                                    <input type="text"  class="form-control" name="uemail" id="uemail" placeholder="Enter Your Email">
                                    <div id="uemail_error" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 text-center" >
                                            <div  class="spinner-border text-danger spinner" role="status" style="display: none;">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <button type="submit" id="email_button" class="btn btn-fill-out btn-block" name="register" onclick="check_user()">Submit</button>
                                </div>
                            </div>
                              
                                <div class="otp">
                                </div>
                             
                           
                            <!-- <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                    </div>
                                </div>
                            </div> -->
                            
                       
                      <!--  <div class="different_login">
                            <span> or</span>
                        </div>
                         <ul class="btn-login list_none text-center">
                            <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                        </ul> -->
                        <div class="form-note text-center">Already have an account? <a href="<?=b('login');?>">Log in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<?php 
    $this->load->view('front_end/inc/footer');
    $this->load->view('front_end/inc/script');
?>
<script src="<?= b().'_asset/forgot-password.js' ?>"></script>
<input type="hidden" id="baseurl" value="<?= b() ?>">
<input type="hidden" id="csrf_token" value="<?=$this->security->get_csrf_token_name();?>">
<input type="hidden" id="csrf_hash" value="<?=$this->security->get_csrf_hash();?>">


</body>

</html>