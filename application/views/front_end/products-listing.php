<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
</head>

<body>

<!-- LOADER -->
<?php $this->load->view('front_end/inc/preloader')?>


<!-- START HEADER -->
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
<div class="section">
	<div class="container">
    	<div class="row">
			<div class="col-lg-9">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                <div class="custom_select">
                                    <select class="form-control form-control-sm" id="cus_sel" onchange="ajax_search()">
                                        <option value="<?=sec('1')?>">Default latest</option>
                                        <option value="<?=sec('2')?>">Sort by popularity</option>
                                        <option value="<?=sec('3')?>">Sort by featured</option>
                                        <option value="<?=sec('4')?>">Sort by price: low to high</option>
                                        <option value="<?=sec('5')?>">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product_header_right d-none d-sm-inline">
                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list "><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                <!-- <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="">Showing</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row spin" style="display: none;">
                    <p>
                        <span class="mfp-preloader"></span>
                    </p>
                </div> 
                <div class="row shop_container grid lst">

                    <?php $this->load->view('front_end/inc/product/product-list');?>
                </div>
        		<div class="row">
                    <div class="col-12 pg">
                        <!-- <ul class="pagination mt-3 justify-content-center pagination_style1"> -->
                        <?php 
                  foreach ($links as $link) 
                  {
                      echo $link;
                  } 
                ?>
               <!--  </ul> -->
                        <!-- <ul class="pagination mt-3 justify-content-center pagination_style1">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
                        </ul> -->
                    </div>
                </div>
        	</div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                <?php $this->load->view('front_end/inc/side-bar');?>
            	
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<?php 
    $this->load->view('front_end/inc/widget/news-letter-widget');
?>

</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<?php 
    $this->load->view('front_end/inc/footer');
    $this->load->view('front_end/inc/script');
?>


</body>

</html>