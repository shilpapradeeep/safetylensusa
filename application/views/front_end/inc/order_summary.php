
    <div class="order-summary">
                            <h3>Order Summary</h3>
                            <table class="table table-mini-cart">
            <tbody>
                <?php if(!empty($cart))
                {
                    foreach($cart as $index=>$c)
                    {
                        ?>
                         <tr>
                    <td class="product-col">
                        <figure class="product-image-container">
                            <a href="product.html" class="product-image">
                                <img src="<?=base_url('assets/front_end/images/products/p1.png');?>" alt="<?=sec($c->c_product_title,'d');?>">
                            </a>
                        </figure>
                        <div>
                            <h2 class="product-title">
                                <a href="product.html"><?=sec($c->c_product_title,'d');?></a>
                            </h2>

                            <span class="product-qty">Qty: <?=sec($c->c_qty,'d');?></span>
                        </div>
                    </td>
                    <td class="price-col">$<?=sec($c->cart_tot_price,'d');?></td>
                </tr>
                        <?php
                    }
                } ?>
               

              
            </tbody>    
        </table>
                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>$<?=sec($order['o_total_price'],'d');?></td>
                                    </tr>

                                    <tr>
                                        <td>Delivery Charge</td>
                                        <td>$<?=sec($order['o_admin_delivery_charge'],'d');?></td>
                                    </tr>
                                    <tr>
                                        <td>Additional Charge</td>
                                        <td>$<?=sec($order['o_addtl_charge'],'d');?></td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>$0.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>$<?=sec($order['o_grandtotal_price'],'d');?></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">

                               <!--  <a href="<?=base_url('checkout');?>" class="btn  btn-sm btn-primary float-right" style="    margin-top: 2.2rem;">Go to Checkout</a> -->
                                <a href="javascript:void(0)" class="btn-sm btn btn-success btn-block final-payment">Check Out</a>
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .cart-summary -->