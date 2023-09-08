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

    <!-- START SECTION SHOP -->
    <div class="section small_pt pb-0">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-12">
                    <?php 
                        $this->load->view('front_end/inc/widget/download_w');
                    ?>
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