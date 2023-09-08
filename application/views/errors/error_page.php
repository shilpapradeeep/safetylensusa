<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
</head>

<body>

<!-- LOADER -->
<?php //$this->load->view('front_end/inc/preloader')?>
<!-- END LOADER -->
<!-- Home Popup Section -->

<!-- End Screen Load Popup Section --> 

<!-- START HEADER -->
<header class="header_wrap">
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

<!-- END SECTION SHOP -->

<div class="section">
    <div class="error_wrap">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10 order-lg-first">
                    <div class="text-center">
                        <div class="error_txt">404</div>
                        <h5 class="mb-2 mb-sm-3"><?php
                        if(!empty($this->session->flashdata('fail')))
                        {
                            echo $this->session->flashdata('fail');
                        }
                        ?></h5> 
                        <p>The page you are looking for was moved, removed, renamed or might never existed.</p>
                       
                        <a href="<?=b()?>" class="btn btn-fill-out">Back To Home</a>
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


</body>

</html>