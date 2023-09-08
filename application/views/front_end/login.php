<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
</head>
<body>
<div class="page-wrapper">
    <div class="top-notice bg-primary text-white">
        <div class="container text-center">
            <h5 class="d-inline-block mb-0 mr-2">Get Up to <b>40% OFF</b> New-Season Styles</h5>
            <a href="category.html" class="category">MEN</a>
            <a href="category.html" class="category ml-2 mr-3">WOMEN</a>
            <small>* Limited time only</small>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div><!-- End .container -->
    </div><!-- End .top-notice -->

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
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading">
                        <h2 class="title">Login</h2>
                        <p>If you have an account with us, please log in.</p>
                    </div><!-- End .heading -->

                    <?=form_open('',array('id'=>'lform','onsubmit'=>'return submit_log()','autocomplete'=>'off')); ?>
                    <div class="form-group">
                        <input id="username" type="text" class="form-control" name="username" tabindex="1"  placeholder="Username">
                        <div id="username_error" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password"  id="password" name="password" placeholder="Password">
                        <div id="password_error" class="invalid-feedback"></div>
                    </div>

                    <div class="form-footer">
                        <input type="submit" class="btn btn-primary" value="LOGIN">
                    </div><!-- End .form-footer -->
                    <div class="form-note ">Don't Have an Account? <a href="<?=b('register'); ?>">Sign up now</a></div>
                    
                    <?php form_close();  ?>
                </div><!-- End .col-md-6 -->


            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->

    <?php
    $this->load->view('front_end/inc/footer');
    ?>
</div><!-- End .page-wrapper -->


<?php
$this->load->view('front_end/inc/mobile-menu-bar');
?>


<!-- Add Cart Modal -->

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<?php $this->load->view('front_end/inc/script'); ?>
<script src="<?= b().'_asset/login.js' ?>"></script>
<input type="hidden" id="baseurl" value="<?= b() ?>">
<input type="hidden" id="csrf_token" value="<?=$this->security->get_csrf_token_name();?>">
<input type="hidden" id="csrf_hash" value="<?=$this->security->get_csrf_hash();?>">
</body>

</html>