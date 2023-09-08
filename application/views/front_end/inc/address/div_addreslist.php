	<?php if(!empty($address))
								 {
								 	?>
								<div class="shipping-step-addresses">
								<?php	foreach($address as $dd)
								 	{ ?>
									<div class="shipping-address-box <?=$dd['type']==1?'shipping-address-div':'billing-address-div';?> <?=$dd['id'];?> <?=!empty($cartAddr) && in_array($dd['id'],$cartAddr)?'active':'';?>" id="<?=$dd['id'];?>"
										>
										
										<address>
											<?=$dd['name'];?> <br>
											<?=$dd['address'];?>, <?=$dd['street'];?> <br>
											<?=$dd['city'];?>, <?=$dd['state'];?> <br>
											<?=$dd['zip'];?><br>
											United States <br>
											<?=$dd['phone'];?> <br>
											<?=$dd['email'];?> <br>
										</address>

										<div class="address-box-action clearfix">
											<a href="javascript:void(0)" class="btn btn-sm btn-link" id="<?=$dd['id'];?>">
												Edit
											</a>

											<a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary float-right <?=$dd['type']==1?'ship-here':'bill-here';?>" id="<?=$dd['id'];?>">
												Choose Address
											</a>
										</div><!-- End .address-box-action -->
									</div><!-- End .shipping-address-box -->
								<?php } ?>
									
								
								</div><!-- End .shipping-step-addresses -->
							<?php } ?>