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

<!-- END SECTION SHOP -->

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="row">
                    <?php
                    if(!empty($pr_det))
                    {
                        ?>
                    
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <?php
                            $gl_img=explode(',',$pr_det[0]->pr_gallery_image);
                            
                            ?>
                            <div class="product_img_box">
                                <img id="product_img" src='<?=thumb(repo()."uploads/product/".$gl_img[0],379,421)?>' data-zoom-image='<?=repo()."uploads/product/".$gl_img[0]?>' alt="product_img1" />
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                <?php
                                    foreach($gl_img as $gl)
                                    {
                                        ?>
                                        <div class="item">
                                            <a href="#" class="product_gallery_item active" data-image='<?=thumb(repo()."uploads/product/".$gl,379,421)?>' data-zoom-image='<?=(repo()."uploads/product/".$gl)?>'>
                                                <img src='<?=thumb(repo()."uploads/product/".$gl,80,85)?>' alt="product_small_img1" />
                                            </a>
                                        </div>
                                   <?php }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title"  style="text-transform: capitalize;"><a href="#"><?=$pr_det[0]->pr_title?></a></h4>
                                <div class="product_price">
                                    <span class="price">&#x20B9;<?=!empty($pr_det[0]->pr_selling_price)?$pr_det[0]->pr_selling_price:'0'?></span>
                                    <?php if(!empty($pr_det[0]->pr_mrp)){ ?>
                                    <del>&#x20B9;<?=!empty($pr_det[0]->pr_mrp)?$pr_det[0]->pr_mrp:'0'?></del>
                                    <?php } ?>
                                    <div class="on_sale">
                                        <?php if(!empty($pr_det[0]->pr_discount)){ ?>
                                        <span><?=!empty($pr_det[0]->pr_discount)?$pr_det[0]->pr_discount:'0'?>% Off</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <!-- <span class="rating_num">(21)</span> -->
                                    </div>
                                <div class="pr_desc" style="width: 100%">
                                    <p><?=$pr_det[0]->pr_tiny_description?></p>
                                </div>
                                <!-- <div class="product_sort_info">
                                    <ul>
                                        <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                                        <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                        <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                                    </ul>
                                </div> -->
                                <!-- <div class="pr_switch_wrap">
                                    <span class="switch_lable">Color</span>
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div> -->
                                <!-- <div class="pr_switch_wrap">
                                    <span class="switch_lable">Size</span>
                                    <div class="product_size_switch">
                                        <span>xs</span>
                                        <span>s</span>
                                        <span>m</span>
                                        <span>l</span>
                                        <span>xl</span>
                                    </div>
                                </div> -->
                            </div>
                            <hr />
                            <div class="cart_extra">
                                <div class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div>
                                <div class="cart_btn">
                                    <button class="btn btn-fill-out btn-addtocart" type="button" onclick="cart(<?="'".sec1($pr_det[0]->pr_id)."'"?>)"><i class="icon-basket-loaded"></i> Add to cart</button>
                                    <a class="add_compare" onclick="get_compare_id(<?="'".sec1($pr_det[0]->pr_id)."'"?>)"><i class="icon-shuffle"></i></a> 
                                    <a class="add_wishlist" onclick="get_wishlist_id(<?="'".sec1($pr_det[0]->pr_id)."'"?>)" style="cursor:pointer"><i class="icon-heart"></i></a>
                                </div>
                            </div>
                            <hr />
                            <ul class="product-meta">
                                <li>Category: <a href="<?=b().'product-category-wise/'.slug($pr_det[0]->c_id,$pr_det[0]->c_title)?>" target="_blank"><?=$pr_det[0]->c_title?></a></li>
                                <?php if(!empty($pr_det[0]->sb_id)){ ?>
                                <li>Sub Category: <a href="<?=b().'product-list/'.slug($pr_det[0]->sb_id,$pr_det[0]->sb_title)?>" target="_blank"><?=$pr_det[0]->sb_title?></a> </li>
                                <?php } ?>
                            </ul>
                            
                            <div class="product_share">
                                <span>Share:</span>
                                <ul class="social_icons">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#terms-and-conditions" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                                </li>
                               <!--  <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (2)</a>
                                </li> -->
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    <p><?=$pr_det[0]->pr_detailed_description?></p>
                                </div>
                                <div class="tab-pane fade" id="terms-and-conditions" role="tabpanel" aria-labelledby="terms-and-conditions-tab">
                                     <p><?=$pr_det[0]->pr_terms_and_conditions?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                     <?php
                    }
                    else
                    {
                        echo "This product is not available right now";
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider"></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                
            </div>
            <div class="col-xl-3 col-lg-4 mt-4 pt-2 mt-lg-0 pt-lg-0">
                <?php $this->load->view('front_end/inc/side-bar',$data['cond']="pr_det");?>
            </div>
            <!--<div class="row">-->
                    <div class="col-12">
                       <?php $this->load->view('front_end/inc/widget/related-products-widget')?>
                    </div>
                <!--</div>-->
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