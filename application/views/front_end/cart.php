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
.cart-page {
    background-color: #EAEDED!important;
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

   
	<main class="main cart-page">
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
					<li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
				</ol>
			</div><!-- End .container -->
		</nav>

	<div class="container-fluid" >
	<div class="row" id="mainCartDiv">
		<?php $this->load->view('front_end/inc/cart/mainDiv'); ?>
		</div>
	</div><!-- End .container -->

			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->
    <input type="hidden" id="pv_id" value="">
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

<script src="<?=repo_fr()?>js/custom.js"></script>
</body>

</html>