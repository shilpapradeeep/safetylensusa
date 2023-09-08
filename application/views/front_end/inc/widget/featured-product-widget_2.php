<?php 
foreach($products as $pkey=>$pval)
                    {
                        if(!empty($pval->pr_thumb_image) &&    file_exists( FCPATH.'assets/uploads/product/'.$pval->pr_thumb_image ))
                        {
                            $img = thumb(b().'assets/uploads/product/'.$pval->pr_thumb_image,220,150);
                        }
                        else
                        {
                            $img = thumb(repo().'assets/uploads/no-image.jpg',265,198);
                        }
            
            
            ?>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="<?=b('products-details/'.slug($pval->pr_id,$pval->pr_title));?>">
                                    <img src="<?=$img;?>">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h2 class="product-title">
                                    <a href="<?=b('products-details/'.slug($pval->pr_id,$pval->pr_title));?>"><?=!empty($pval->pr_title)?$pval->pr_title:''?></a>
                                </h2>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$<?=!empty($pval->pr_selling_price)?$pval->pr_selling_price:''?></span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    <?php } ?>