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
                                <h3>Login</h3>
                            </div>
                            <?=form_open('',array('id'=>'lform','onsubmit'=>'return submit_log()','autocomplete'=>'off')); ?>
                            <div class="form-group">
                                <input id="username" type="text" class="form-control" name="username" tabindex="1"  placeholder="Username">
                                <div id="username_error" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password"  id="password" name="password" placeholder="Password">
                                <div id="password_error" class="invalid-feedback"></div>
                            </div>
                            <div class="login_footer form-group">
                                <!-- <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                    </div>
                                </div> -->
                                <a href="<?=b('forgot-password');?>">Forgot password?</a>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center" >
                                    <div  class="spinner-border text-danger spinner" role="status" style="display: none;">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group" id="form-btn">


                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                            </div>
                            <?php form_close();  ?>

                            <div class="form-note text-center">Don't Have an Account? <a href="<?=b('signup');?>">Sign up now</a></div>
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
<script src="<?= b().'_asset/login.js' ?>"></script>
<input type="hidden" id="baseurl" value="<?= b() ?>">
<input type="hidden" id="csrf_token" value="<?=$this->security->get_csrf_token_name();?>">
<input type="hidden" id="csrf_hash" value="<?=$this->security->get_csrf_hash();?>">


</body>

</html>