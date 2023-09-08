<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
    <link rel="stylesheet" type="text/css" href="<?=repo_back_end()?>libs/iziToast-master/dist/css/iziToast.min.css">
</head>
<body>
<div class="page-wrapper">
<?php
      $this->load->view('front_end/inc/offer-top'); ?>

    <header class="header">

        <?php
        $this->load->view('front_end/inc/header-top');
        $this->load->view('front_end/inc/header-middle');
        $this->load->view('front_end/inc/header-bottom');
        ?>



    </header><!-- End .header -->

    <main class="main">
        <div class="page-header page-header-bg text-left" style="background: 70%/cover #D4E1EA url('assets/front_end/images/page-header-bg.jpg');">
            <div class="container">
                <h1>My Account</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=b();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <!-- <div class="container">
            <div class="row">
                <div align="center" class="col-md-12">
                    <span style="display: block;" class="main-spinner"><i class="fa fa-2x fa-spin fa-spinner"></i></span>
                </div>

                <div id="user-profile">
                </div>
                <div id="edit-profile">
                </div>
            </div>
        </div> -->
        <div class="container">
				<div class="row">
					<div class="col-lg-9 order-lg-last dashboard-content">
						<h2>My Dashboard</h2>
                        <?php  
                            $success = $this->session->flashdata('success');
                            if($success)
                            {
                        ?>
						<div class="alert alert-success alert-intro" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
						</div><!-- End .alert -->
                        <?php } ?>

						

						<div class="mb-4"></div><!-- margin -->

						
                        <div id="user-profile">
                        </div>
                        <div id="edit-profile">
                        </div>
						
					</div><!-- End .col-lg-9 -->
                    <?php $this->load->view('front_end/inc/account-sidebar'); ?>
				
				</div><!-- End .row -->
			</div>

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

<script src="<?=repo_back_end()?>libs/iziToast-master/dist/js/iziToast.min.js"></script>
<script src="<?= repo_fr().'js/profile.js' ?>"></script>
</body>

</html>