      <div class="dropdownmenu-wrapper">
                        <div class="dropdown-cart-header">
                            <?php if(!empty($menuCartData))
{ ?>
     
                            <span><?=!empty(count($menuCartData['cart']))?count($menuCartData['cart']):0;?> <?=count($menuCartData['cart'])>1?'Items':'Item';?></span>

                            <a href="<?=base_url('cart');?>" class="float-right">View Cart</a>
                        <?php } else{ ?>
                        <span><i class="fa fa-shopping-cart"></i> Cart is empty</span>
                        <?php } ?>
                        </div><!-- End .dropdown-cart-header -->
<?php if(!empty($menuCartData))
{ ?>
                        <div class="dropdown-cart-products">
                            <?php foreach($menuCartData['cart'] as $index=>$v)
{?>
                            <div class="product">
                                <div class="product-details">
                                    <h4 class="product-title">
                                        <a href="product.html"><?=$v['title'];?></a>
                                    </h4>

                                    <span class="cart-product-info">
													<span class="cart-product-qty"><?=empty($v['qty'])?1:$v['qty'];?></span>
													x $<?=$v['price'];?>
												</span>
                                </div><!-- End .product-details -->

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="<?=$v['thumb'];?>" alt="product" width="80" height="80">
                                    </a>
                                    <a href="javascript:void(0)" item="<?=$index;?>" class="cart-delete btn-remove icon-cancel" title="Remove Product"></a>
                                </figure>
                            </div><!-- End .product -->
                        <?php } ?>
                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Total</span>

                            <span class="cart-total-price float-right">$<?=$menuCartData['tot'];?></span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="<?=base_url('checkout');?>" class="btn btn-dark btn-block">Checkout</a>
                        </div><!-- End .dropdown-cart-total -->
                    <?php } ?>
                    </div><!-- End .dropdownmenu-wrapper -->