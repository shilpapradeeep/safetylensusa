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
                        <li class="breadcrumb-item active" aria-current="page">Checkout Review</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <ul class="checkout-progress-bar">
                    <li >
                        <span>Shipping</span>
                    </li>
                    <li class="active">
                        <span>Review &amp; Payments</span>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-lg-8" id="mainDiv">
                       <div class="checkout-info-box">
                        <?php if(!empty($addData))
                        {  ?>
                            <div class="row">
                                <?php if(!empty($addData[1]))
                                { ?>
                                <div class="col-md-12">
                                <h3 class="step-title">Ship To:
                                    
                                </h3>
                                <?php foreach($addData[1] as $dd)
                                { ?>
                                    <address>
                                        <?=$dd['name'];?> <br>
                                            <?=$dd['address'];?>, <?=$dd['street'];?> <br>
                                            <?=$dd['city'];?>, <?=$dd['state'];?> <br>
                                            <?=$dd['zip'];?><br>
                                            United States <br>
                                            <?=$dd['phone'];?> <br>
                                            <?=$dd['email'];?> <br>
                                    </address>
                                <?php } ?>
                                </div>
                            <?php } ?>
                             <?php if(!empty($addData[2]))
                                { ?>
                                 <div class="col-md-12" style="margin-top:15px">
                                <h3 class="step-title">Bill To:
                                    
                                </h3>

                                    <?php foreach($addData[2] as $dd)
                                { ?>
                                    <address>
                                        <?=$dd['name'];?> <br>
                                            <?=$dd['address'];?>, <?=$dd['street'];?> <br>
                                            <?=$dd['city'];?>, <?=$dd['state'];?> <br>
                                            <?=$dd['zip'];?><br>
                                            United States <br>
                                            <?=$dd['phone'];?> <br>
                                            <?=$dd['email'];?> <br>
                                    </address>
                                <?php } ?>
                                </div>
                            <?php } ?>
                            </div>
                            
                        <?php } ?>
                        </div>
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                     <?php   $this->load->view('front_end/inc/order_summary'); ?>
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->

              
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->
    <input type="hidden" id="address_id" value="">
    <input type="hidden" id="bill_address_id" value="">
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