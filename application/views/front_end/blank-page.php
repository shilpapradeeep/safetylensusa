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

                    <form action="#">
                        <input type="email" class="form-control" placeholder="Email Address" required>
                        <input type="password" class="form-control" placeholder="Password" required>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                            <a href="#" class="forget-pass"> Forgot your password?</a>
                        </div><!-- End .form-footer -->
                    </form>
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="heading">
                        <h2 class="title">Create An Account</h2>
                        <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    </div><!-- End .heading -->

                    <form action="#">
                        <input type="text" class="form-control" placeholder="First Name" required>
                        <input type="text" class="form-control" placeholder="Middle Name" required>
                        <input type="text" class="form-control" placeholder="Last Name" required>

                        <h2 class="title mb-2">Login information</h2>
                        <input type="email" class="form-control" placeholder="Email Address" required>
                        <input type="password" class="form-control" placeholder="Password" required>
                        <input type="password" class="form-control" placeholder="Confirm Password" required>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="newsletter-signup">
                            <label class="custom-control-label" for="newsletter-signup">Sing up our Newsletter</label>
                        </div><!-- End .custom-checkbox -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </div><!-- End .form-footer -->
                    </form>
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
</body>

</html>