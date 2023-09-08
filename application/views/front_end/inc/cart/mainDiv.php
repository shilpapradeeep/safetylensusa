
             <?php if(!empty($cart))
             { 
                ?>
			<div class="col-lg-8">
            <div class="card cart-items" >
           
                <div class="card-body">
                    <h1 class="card-title">Shopping Cart</h1>
                    <h6 class="card-subtitle mb-2 text-muted pull-right">Price</h6>
                    <hr>
					<div class="cart-table-container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php $l = 0; foreach($cart as $index=>$c)
                             { 

                                ?>
                                <div class="row" <?=$l>0?'style="margin-top:60px"':''?> >
                                <div class="col-md-12">  </div>
                                    <div class="col-md-3" style="margin-top:0">
                                                <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="<?=base_url('assets/front_end/images/products/p1.png');?>" alt="<?=sec($c->c_product_title,'d');?>">
                                            </a>
                                        </figure>
                                                       
                                    </div>
                                    <div class="col-md-9">
                                        <table class="table cart-options">
                                            <tbody>
                                                <tr>
                                                    <td class="product-col bt-0" colspan="3">
                                                    <h2 class="product-title">
                                                        <a href="<?=base_url('products-details/'.slug($index,sec($c->c_product_title,'d')));?>">
                                                            <?=sec($c->c_product_title,'d');?>
                                                        </a>
                                                    </h2>
                                                    </td>
                                                   
                                                </tr>
                                                <tr class="product-row">
                                                    <td class="small-text">
                                                        <strong>Color/Size</strong>
                                                    </td>
                                                    <td class="small-text"><?=$c->c_product_color.'|'.$c->cart_product_size->cps_size;?>
                                                       
                                                    </td>
                                                    <td class="small-text">
                                                      $<?=sec($c->cart_product_size->cps_price,'d');?>  
                                                    </td>
                                                </tr>
                                                <?php if(!empty($c->cart_lens_material))
                                                { ?>
                                                <tr class="product-row">
                                                    <td class="small-text">
                                                        <strong>Lens</strong>
                                                    </td>
                                                    <td class="small-text"><?=sec($c->cart_lens_material->cm_lens_type_title,'d');?>
                                                       
                                                    </td>
                                                    <td class="small-text">
                                                      $<?=sec($c->cart_lens_material->cm_price,'d');?>  
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                <?php if(!empty($c->cart_tint))
                                                { ?>
                                                 <tr class="product-row">
                                                    <td class="small-text">
                                                        <strong>Tint</strong>
                                                    </td>
                                                    <td class="small-text"> $<?=sec($c->cart_tint->ct_ttype_title,'d').'-'.$c->cart_tint->ct_tint_color;?> 
                                                    </td>
                                                    <td class="small-text">
                                                      $<?=sec($c->cart_tint->ct_price,'d');?>  
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($c->cart_polarised_lens))
                                                { ?>
                                                 <tr class="product-row">
                                                    <td class="small-text">
                                                        <strong>Polarized Lens</strong>
                                                    </td>
                                                    <td class="small-text"> <?=sec($c->cart_polarised_lens->polarised_lens_title,'d')?> 
                                                    </td>
                                                    <td class="small-text">
                                                      $<?=sec($c->cart_polarised_lens->cp_price,'d');?>  
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php if(!empty($c->c_cart_transition))
                                                { ?>
                                                 <tr class="product-row">
                                                    <td class="small-text">
                                                        <strong>Transition</strong>
                                                    </td>
                                                    <td class="small-text"> <?=sec($c->c_cart_transition->ct_transition_title,'d')?> 
                                                    </td>
                                                    <td class="small-text">
                                                      $<?=sec($c->c_cart_transition->ct_price,'d');?>  
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                             <?php if(!empty($c->cart_lens_options))
                                                { ?>
                                                 <tr class="product-row">
                                                    <td class="small-text" style="vertical-align:middle" rowspan="<?=count($c->cart_lens_options)+1;?>" valign="middle">
                                                    <strong>Lens Option</strong>
                                                        
                                                    </td>
                                                </tr>
                                                <?php foreach($c->cart_lens_options as $lo)
                                                {
                                                    ?>

                                                    <tr>
                                                    <td class="small-text"> <?=sec($lo->co_options_title,'d')?> 
                                                    </td>
                                                    <td class="small-text">
                                                      $<?=sec($lo->co_price,'d');?>  
                                                    </td>
                                                </tr>

                                                    <?php
                                                }
                                                ?>
                                                
                                            <?php } ?>
                                            
                                            <tr class="product-row">
                                                    <td >
                                                        <strong>Subtotal</strong>
                                                    </td>
                                                    <td >
                                                        
                                                         <input class="vertical-quantity form-control" item = '<?= $index;?>' type="text" value="<?=sec($c->c_qty,'d');?>">
                                                    </td>
                                                    <td >
                                                      <strong>$<?=sec($c->cart_tot_price,'d')?>
                                                      </strong> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="javascript:void(0)" item="<?=$index;?>" class="cart-delete card-link"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                                
                                <hr>
                            <?php
                            $l++; } ?>
                        </div>
                    </div>
					<table class="table table-cart">
						<!-- <thead>
							<tr>
								<th class="product-col">Product</th>
								<th class="price-col">Price</th>
								
							</tr>
						</thead> -->
						<tbody>
                               
                                
								</tbody>

							
							</table>
						</div><!-- End .cart-table-container -->
                   
                    
                </div>
                </div>
				

						
					</div><!-- End .col-lg-8 -->

					<div class="col-lg-4">
						<div class="cart-summary">
							<h3>Summary</h3>
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

								<a href="<?=base_url('checkout');?>" class="btn  btn-sm btn-primary float-right" style="    margin-top: 2.2rem;">Go to Checkout</a>
								<a href="#" class="btn-sm btn btn-success ">Check Out with Multiple Addresses</a>
							</div><!-- End .checkout-methods -->
						</div><!-- End .cart-summary -->
					</div><!-- End .col-lg-4 -->

                <?php }else{ ?>
				<div class="col-lg-8">
					<div class="card cart-items" >
						<div class="card-body">
							<h1 class="card-title">Your SafetylensUSA Cart is empty.</h1>
							<h6 class="card-subtitle mb-2 text-muted">Please <a href="<?=base_url('products');?>">Continue shopping</a>.</h6>
							
						</div>
					</div>
				</div>
				
				<?php } ?>
			