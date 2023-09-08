
<div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center" data-owl-options="{
						'dots': false,
						'nav': true,
						'responsive': {
							'992': {
								'items': 5
							}
						}
					}">
                    <?php
                    
                    foreach($products as $pkey=>$pval)
                    {
                        if(!empty($pval->pr_thumb_image) &&    file_exists( FCPATH.'assets/uploads/product/'.$pval->pr_thumb_image ))
                        {
                           // $img = thumb(b().'assets/uploads/product/'.$pval->pr_thumb_image,233,150);
                           $img = b().'assets/uploads/product/'.$pval->pr_thumb_image;
                        }
                        else
                        {
                            $img = thumb(repo().'assets/uploads/no-image.jpg',265,198);
                        }
                        
                        
                        ?>
                        <div class="product-default">
                            <figure>
                                <a href="<?=b('products-details/'.slug($pval->pr_id,$pval->pr_title));?>">
                                
                                    <img src="<?=$img;?>" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                </div>
                            </figure>
                            <div class="product-details">
                                <!-- <div class="category-list">
                                    <a href="" class="product-category">Category</a>
                                </div> -->
                                <h3 class="product-title">
                                    <a href="<?=b('products-details/'.slug($pval->pr_id,$pval->pr_title));?>"><?=!empty($pval->pr_title)?$pval->pr_title:''?></a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <?php if(!empty($pval->pr_mrp)) { ?><del class="old-price">$<?=!empty($pval->pr_mrp)?$pval->pr_mrp:''?></del><?php } ?>
                                    <span class="product-price">$<?=!empty($pval->pr_selling_price)?$pval->pr_selling_price:''?></span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">ADD TO CART</button>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                    <?php } ?>

                </div>