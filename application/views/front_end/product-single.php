<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
    <style type="text/css">
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
.product-single-details .price-country {
    font-size:2.6rem;
    color: #333;
    font-weight: 700;
    font-family: Poppins,sans-serif;
    vertical-align: middle;
}
.product-desc-content p
{
    font-size: 1.6rem;
    letter-spacing: -.015em;
    line-height: 1.92;
}
.product-single-container
{
    margin-top:25px;
}
.product-sub-title
{
	font-size: 2rem;
}
.product-variantion:hover
{
cursor: pointer !important;
}
.product-variantion
{
	
	border-radius:5px;
	
	width:100%;
	text-align: center;
	border:1px solid #ccc;
	margin:10px 0px;
}
.product-variantion-choosed
{

	border:2px solid #333;
}
.point-section p
{
	margin:10px 0px !important;
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
				<!-- <nav aria-label="breadcrumb" class="breadcrumb-nav">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item"><a href="#">Shoes</a></li>
					</ol>
				</nav> -->
				<div class="product-single-container product-single-default">
					<div class="row">
						<div class="col-md-5 product-single-gallery">
                        <?php
               
               if(!empty($images))
              { 

                ?>
           <div class="exzoom hidden" id="exzoom">
            <div class="exzoom_img_box">
                <ul class='exzoom_img_ul'>
                  <?php foreach($images as $img)
                  { ?>
                    <li><img src="<?=$img;?>"/></li>
                    
                  <?php } ?>
                </ul>
            </div>
  <div class="exzoom_nav"></div>
  <p class="exzoom_btn">
      <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
      <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
  </p>
</div>
<?php } ?>
							
						</div><!-- End .product-single-gallery -->

						<div class="col-md-7 product-single-details">
							<h1 class="product-title"><?=$pData->pr_title;?></h1>
							 <div class="category-wrap">
                                            <div class="category-list">
                                               <?=!empty($pData->b_title)?$pData->b_title.' |':'';?>
                                               <?=!empty($pData->pr_model)?$pData->pr_model:'';?>
                                          
                                            </div>
                                        </div>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:60%"></span><!-- End .ratings -->
								</div><!-- End .product-ratings -->

								<a href="#" class="rating-link">( 6 Reviews )</a>
							</div><!-- End .ratings-container -->

							<hr class="short-divider">

							
                            <div class="price-box">
                            <span class="price-country">US</span>
                            <?php if(!empty($pData->pr_mrp))
                                             echo '<span class="old-price">$'.$pDatap->pr_mrp.'</span>';
                                             echo '<span class="product-price">$'.$pData->pr_selling_price.'</span>';
                                             ?>
										</div>
							<div class="product-desc">
								<?php if(!empty($pvariants))
									{ ?>
								<h2 class="product-sub-title">Select Frame Size</h2>
								<div class="row">
									<?php
									
										foreach($pvariants as $pv)
										{
											?>
											<div class="col-md-3">
							<div  class="product-default product-variantion pv-<?=sec($pv->pv_id);?>" pv-id="<?=sec($pv->pv_id);?>">
								<?=$pv->pv_eye_size.'-'.$pv->pv_bridge.'-'.$pv->pv_temple.'-B'.$pv->pv_b_measurement;?>
							</div>
						</div>
											<?php
										}
									?>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h5>Available Sizes</h5>
										<hr class="divider mb-1">
									</div>

									<div class="col-md-12">

									<div class="row">
										<div class="col-md-2 col-sm-3 col-xs-4">
										<div class="img-section " align="center">
										<small>Sizes</small>
										</div>
									</div>
									<?php foreach($sizes as $s)
									{
										?>
										<div class="col-md-2 col-sm-3 col-xs-4">
											<div class="img-section" align="center">
											<img alt="safetylensusa" src="<?=base_url('assets/front_end/images/'.$s);?>">
											</div>
										</div>

									<?php } ?>
									
								</div>
							</div>
							<div class="col-md-12">
								<?php
									foreach($pvariants as $pv)
									{ ?>
										<div class="row product-variantion  product-default pv-<?=sec($pv->pv_id);?>" pv-id="<?=sec($pv->pv_id);?>">
											<div class="col-md-2 col-sm-3 col-xs-4">
												<div class="point-section">
													<p>
														<strong>
														<?=$pv->pv_eye_size.'-'.$pv->pv_bridge.'-'.$pv->pv_temple;?>
													</strong>
													</p>
												</div>
											</div>
											<div class="col-md-2 col-sm-3 col-xs-4">
												<div class="point-section">
													<p>
														<?=$pv->pv_eye_size;?>
													</p>
												</div>
											</div>
											<div class="col-md-2 col-sm-3 col-xs-4">
												<div class="point-section">
													<p>
														<?=$pv->pv_b_measurement;?>
													</p>
												</div>
											</div>
											<div class="col-md-2 col-sm-3 col-xs-4">
												<div class="point-section">
													<p>
														<?=$pv->pv_ed;?>
													</p>
												</div>
											</div>
											<div class="col-md-2 col-sm-3 col-xs-4">
												<div class="point-section">
													<p>
														<?=$pv->pv_bridge;?>
													</p>
												</div>
											</div>
											<div class="col-md-2 col-sm-3 col-xs-4">
												<div class="point-section">
													<p>
														<?=$pv->pv_temple;?>
													</p>
												</div>
											</div>
										</div>

									<?php } ?>
			</div>
								</div>
								<?php
								}
									?>
							</div>

							

							

							<div class="product-action">
							
								<?php
								
								if(!empty($menuCartData))
								{
									$inCart = false;
									foreach($menuCartData['cart'] as $index=>$c)
									{
										if(empty(strcmp($index,sec($pData->pr_id))))
										{
										
											$inCart = true;
											break;
										}
									}
								}
								else $inCart = false;
								if(!$inCart )
								{
								?>
								<div class="product-single-qty">
									<input class="horizontal-quantity form-control" type="text" name="p_qty" id="p_qty">
								</div><!-- End .product-single-qty -->
                                <a pr_id = "<?=sec($pData->pr_id);?>"  class="select-lens btn btn-dark add-cart " title="Add to Cart">Select Lens</a>
                                <?php if($pData->pr_prescription_glass){ ?>
								<a href="javascript:void(0)" class="btn btn-dark add-cart  add-cart-no-pres icon-shopping-cart" title="Add to Cart">Add to Cart with No Prescription Lens</a>
							<?php } }
							else{?>
								<a href="<?=base_url('cart');?>" class="btn btn-dark add-cart   icon-shopping-cart" title="Go to Cart">Go to Cart</a>
							
							<?php } ?>
							</div><!-- End .product-action -->

							<hr class="divider mb-1">

							<div class="product-single-share">
								<label class="sr-only">Share:</label>

								<div class="social-icons mr-2">
									<a href="#" class="social-icon social-facebook fab fa-facebook" target="_blank" title="Facebook"></a>
									<a href="#" class="social-icon social-twitter fab fa-twitter" target="_blank" title="Twitter"></a>
									<a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
									<!-- <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
									<a href="#" class="social-icon social-mail fab fa-mail" target="_blank" title="Mail"></a>
								 -->
                                </div><!-- End .social-icons -->

								<a href="#" pr_id = "<?=sec($pData->pr_id);?>" pr_title="<?=$pData->pr_title;?>" class="<?=!empty($wishlist) && in_array(sec($pData->pr_id),$wishlist)?'in-whishlist':'to-wishlist';?> add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
							</div><!-- End .product single-share -->
						</div><!-- End .product-single-details -->
					</div><!-- End .row -->
				</div><!-- End .product-single-container -->
				<div class="product-single-tabs">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Product Description</a>
						</li>
						
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
							<div class="product-desc-content">
                            <p><?=$pData->pr_title;?></p>
                            <?=$pData->pr_detailed_description;?>
							</div><!-- End .product-desc-content -->
						</div><!-- End .tab-pane -->
						</div><!-- End .tab-content -->
				</div><!-- End .product-single-tabs -->
				<div class="product-single-tabs">
					<ul class="nav nav-tabs" role="tablist">
						
						<li class="nav-item">
							<a class="nav-link active" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">More Info</a>
						</li>
						
						
					</ul>
					<div class="tab-content">
						

						<div class="tab-pane fade  show active" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
							<div class="product-desc-content">
								<table class="table table-responsive">
                                <tr>
                                    <th>Brand</th><td>:</td><td><?=$pData->b_title;?></td>
                                </tr>
                                <tr>
                                    <th>Model</th><td>:</td><td><?=$pData->pr_model;?></td>
                                </tr>
                                <tr>
                                    <th>Color</th><td>:</td><td><?=$pData->pr_product_color;?></td>
                                </tr>
                                <tr>
                                    <th>Style</th><td>:</td><td><?=$pData->s_title;?></td>
                                </tr>
                                </table>
							</div><!-- End .product-desc-content -->
						</div><!-- End .tab-pane -->
					</div><!-- End .tab-content -->
				</div><!-- End .product-single-tabs -->
				<div class="product-single-tabs">
					<ul class="nav nav-tabs" role="tablist">
						
						<li class="nav-item">
							<a class="nav-link active" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (3)</a>
						</li>
					</ul>
					<div class="tab-content">
						
<div class="tab-pane fade show active" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
							<div class="product-reviews-content">
								<div class="row">
									<div class="col-xl-7">
										<h2 class="reviews-title"><?=$total_rev?> reviews for Product Long Name</h2>

										<ol class="comment-list" id='comment-list'>
                                           
                                          <?php if(!empty($reviews)){
                                          	foreach ($reviews as  $review) { 
                                                   $dt = new DateTime($review->p_added);
                                                   $date = $dt->format('M d, Y');
                                          	  ?>

                                          	<li class="comment-container row">
												<div class="comment-avatar col-md-2">
													<img src="<?=base_url();?>assets/front_end/images/avatar/avatar0.png" width="65" height="65" alt="avatar"/>
												</div><!-- End .comment-avatar-->

												<div class="comment-box col-md-10">
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:<?=$review->p_rating?>%"></span><!-- End .ratings -->
														</div><!-- End .product-ratings -->
													</div><!-- End .ratings-container -->

													<div class="comment-info mb-1">
														<h4 class="avatar-name"><?=$review->p_user?></h4> - <span class="comment-date"><?=$date?></span>
													</div><!-- End .comment-info -->

													<div class="comment-text">
														<p><?=$review->p_review?></p>
													</div><!-- End .comment-text -->
												</div><!-- End .comment-box -->
											</li><!-- comment-container -->
      	
                                          <?php  } }  ?>


										</ol><!-- End .comment-list -->
									</div>

									<div class="col-xl-5">
										<div class="add-product-review">
											<!-- <form action="#" class="comment-form m-0"> -->
												<?= form_open('',array('id'=>'productReviewForm','class'=>'comment-form m-0'))?>
												<input type="hidden" name="product_id" id="product_id" value="<?=sec($pData->pr_id)?>">								
												<h3 class="review-title">Add a Review</h3>

												<div class="rating-form">
													<label for="rating">Your Rating</label>
													<span class="rating-stars">
														<a class="star-1" href="#">1</a>
														<a class="star-2" href="#">2</a>
														<a class="star-3" href="#">3</a>
														<a class="star-4" href="#">4</a>
														<a class="star-5" href="#">5</a>
													</span>
													<span id="rating_error" class="error"></span>

													<select name="rating" id="rating" required="" style="display: none;">
														<option value="">Rate…</option>
														<option value="5">Perfect</option>
														<option value="4">Good</option>
														<option value="3">Average</option>
														<option value="2">Not that bad</option>
														<option value="1">Very poor</option>
													</select>
												</div>

												<div class="form-group">
													<label>Your Review</label>
													<textarea name="review_detail" id="review_detail" cols="5" rows="6" class="form-control form-control-sm"></textarea>
													<span id="review_detail_error" class="error"></span>
												</div><!-- End .form-group -->


												<div class="row">
													<div class="col-md-6 col-xl-12">
														<div class="form-group">
															<label>Your Name</label>
															<input name="review_name" id="review_name" type="text" class="form-control form-control-sm" required>
															<span id="review_name_error" class="error"></span>
														</div><!-- End .form-group -->
													</div>

<!-- 													<div class="col-md-6 col-xl-12">
														<div class="form-group">
															<label>Your E-mail</label>
															<input name="review_email" id="review_email" type="text" class="form-control form-control-sm" required>
														</div> --><!-- End .form-group -->
													</div>
												</div>

												<input type="button" class="reviewButton btn btn-dark ls-n-15" value="Submit">
												<span style="display: none;" id="spin"><i class="fa fa-2x fa-spin fa-spinner"></i></span>
											</form>
										</div><!-- End .add-product-review -->
									</div>
								</div>
							</div><!-- End .product-reviews-content -->
					</div><!-- End .tab-content -->
				</div><!-- End .product-single-tabs -->

				<div class="products-section pt-0">
					<h2 class="section-title">Related Products</h2>

					<div class="products-slider owl-carousel owl-theme dots-top">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="product.html">
									<img src="assets/images/products/product-14.jpg">
								</a>
								<div class="label-group">
									<span class="product-label label-sale">-20%</span>
								</div>
								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
								</div>
								<a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .ratings-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="product.html">
									<img src="assets/images/products/product-13.jpg">
								</a>
								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
								</div>
								<a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .ratings-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="product.html">
									<img src="assets/images/products/product-12.jpg">
								</a>
								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
								</div>
								<a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .ratings-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="product.html">
									<img src="assets/images/products/product-11.jpg">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
								</div>
								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
								</div>
								<a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .ratings-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="product.html">
									<img src="assets/images/products/product-10.jpg">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
								</div>
								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
								</div>
								<a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .ratings-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="product.html">
									<img src="assets/images/products/product-9.jpg">
								</a>
								<div class="label-group">
									<span class="product-label label-sale">-30%</span>
								</div>
								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
								</div>
								<a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .ratings-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="product.html">
									<img src="assets/images/products/product-8.jpg">
								</a>
								<div class="label-group">
									<span class="product-label label-sale">-20%</span>
								</div>
								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
								</div>
								<a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .ratings-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .products-slider -->
				</div><!-- End .products-section -->
			</div><!-- End .container -->
		</main><!-- End .main -->
    <input type="hidden" id="pv_id" value="">
	<input type="hidden" id="pr_id" value="<?=sec($pData->pr_id);?>">
	<input type="hidden" id="additional_charge" name="additional_charge" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_additional_charge)? sec($price_settings[0]->t_additional_charge):'';?>">
    <input type="hidden" id="delivery_charge" name="delivery_charge" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_delivery_charge)? sec($price_settings[0]->t_delivery_charge):'';?>">
        
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
<script type="text/javascript">
$(document).on("click",".reviewButton",function() { 
   $('.error').html('');
   $('#spin').show();
   $('.reviewButton').hide();
   var base = $('#base').val();
   var formData = $('#productReviewForm').serialize();

       $.ajax({
        type:'POST',
        url:base+"review-action",
        dataType:'json',
        data:formData,
    }).done(function(data)
    {   
    	console.log(data);
		$('#spin').hide();
		$('.reviewButton').show();
        if(data.res==1)
        {   
            success(data.msg);
            document.getElementById("productReviewForm").reset();
            $('.rating-stars .active').removeClass('active');
            $('#comment-list').html(data.reviews);
        }
        else
        {

            if($.isEmptyObject(data.errors))
            {
                error(data.msg);

            }
            else
            {  
                 for(key in data.errors)
                 {
                 	$('#'+key+'_error').html(data.errors[key]);
                 }
            }
        }

    }).fail(function () {
        warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });

    return false;

 });
</script>
</body>

</html>