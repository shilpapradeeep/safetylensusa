<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
    <style type="text/css">
 
.product-single-container
{
    margin-top:25px;
}
.product-single-details .product-title {
   text-align:center !important;
    font-size: 1.7rem;
    padding:10px 0px;
    font-weight:400;
}
.product-default 
        {
            padding:10px;
               /*border: 1px #333 solid;*/
   box-shadow: 0 1px 9px 0 rgb(0 0 0 / 5%);
        }
        .product-default:hover figure {
     box-shadow: none !important;
}
       .product-default:hover {
     box-shadow: 0 5px 25px 0 rgb(0 0 0 / 8%);
}
.product-default a {
    
white-space: unset; 
    /* overflow: hidden;
    text-overflow: ellipsis; */
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
			<div class="container">
           
				<div class="product-single-container product-single-default">
					<div class="row" style="text-align:center">
						<div class="col-md-12 product-single-gallery">
                        <div class="heading mb-4">
					<h2 class="title">CHOOSE YOUR LENS TYPE</h2>
					<p>All Lenses are High Definition (HD) Polycarbonate with 2mm center thickness (ANSI) standard.</p>
				<ul class="checkout-progress-bar">
					<li class="active">
						<span>Lens</span>
					</li>
					<li>
						<span>Your Prescription</span>
					</li>
				</ul>

                </div>
							
						</div><!-- End .product-single-gallery -->

						<div class="col-md-12 product-single-details">
							
                           <div class="product-filters-container">
								<div class="product-single-filter mb-2">
									<?php if(!empty($lens))
                                    { ?>
									<div class="row">
                                    <?php foreach($lens as $l)
                                    { ?>
										<div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                <h3 class="product-title" style="text-align:center">
                                            <a href="<?=base_url('your-prescription').'?product='.$pr_id.'&lens='.sec($l->lt_id).'&size='.$pv_id.'&qty='.$qty;?>"><?=$l->lt_title;?></a>
                                        </h3>
                                    <figure>
                                        <a href="<?=base_url('your-prescription').'?product='.$pr_id.'&lens='.sec($l->lt_id).'&size='.$pv_id.'&qty='.$qty;?>">
                                            <img src="<?=base_url($l->lt_image);?>">
                                        </a>
                                       
                                       
                                       
                                    </figure>
                                    <div class="product-details">
                                       
                                       <p><?=$l->lt_desc;?></p>
                                       
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
									<?php } ?>	
									</div>
                                    <?php } ?>
								</div><!-- End .product-single-filter -->
							</div><!-- End .product-filters-container -->

						

						</div><!-- End .product-single-details -->
					</div><!-- End .row -->
				</div><!-- End .product-single-container -->

			

				
			</div><!-- End .container -->
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
</body>

</html>