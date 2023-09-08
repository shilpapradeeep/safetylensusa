<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div mc:repeatable="Select" mc:variant="Three Columns">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td class="p30-15" style="padding: 27px 30px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="section-title pb30" style="color:#000000; font-family:'Fira Mono', Arial,sans-serif; font-size:20px; line-height:24px; text-align:center; padding-bottom:30px;"><div mc:edit="text_19">Featured Products
						
						</div></td>
					</tr>
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<?php
										$pr=get_instance()->essential->email_prod();
										foreach ($pr as $lp_key) 
										{
											$link=b().'product-details/'.slug($lp_key['p_id'],$lp_key['p_title']);
											?>
											<th class="column-top" width="175" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td class="fluid-img pb20" style="font-size:0pt; line-height:0pt; text-align:left; padding-bottom:20px;"><img src="<?=dev_url().'ThreeSeasInfologics/repo/product/'.$lp_key['p_thumb']?>" width="175" height="175" mc:edit="image_6" style="max-width:175px;border:1px solid #e05416" border="0" alt="" /></td>
											</tr>
											<tr>
												<td class="h3-2 pb10" style="color:#000000; font-family:'Ubuntu', Arial,sans-serif; font-size:26px; line-height:36px; text-align:center; padding-bottom:10px;"><div mc:edit="text_20"><?= not(nohtml($lp_key['p_title'])) ?><br /></div></td>
											</tr>
											<tr>
												<td class="text2 pb10" style="color:#000000; font-family:'Ubuntu', Arial,sans-serif; font-size:12px; line-height:18px; text-align:center; text-transform:uppercase; padding-bottom:10px;"><div mc:edit="text_21">Wall-mounted Type</div></td>
											</tr>
											<tr>
												<td class="price pb20" style="color:#e67645; font-family:'Fira Mono', Arial,sans-serif; font-size:16px; line-height:28px; text-align:center; padding-bottom:20px;"><div mc:edit="text_22">₹<?= not($lp_key['p_selling_price']) ?> <span class="old-price" style="color:#737373; font-size:12px; text-decoration:line-through;">₹<?= not($lp_key['p_mrp']) ?></span></div></td>
											</tr>
											<!-- Button -->
											<tr mc:hideable>
												<td align="center">
													<table width="120" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="text-button black-button" style="color:#ffffff; font-family:'Fira Mono', Arial,sans-serif; font-size:14px; line-height:18px; text-align:center; padding:12px; background:#e05416;"><div mc:edit="text_23"><a href="<?=$link?>" target="_blank" class="link-white" style="color:#ffffff; text-decoration:none;"><span class="link-white" style="color:#ffffff; text-decoration:none;">Buy Now</span></a></div></td>
														</tr>
													</table>
												</td>
											</tr>
											<!-- END Button -->
										</table>
									</th>
									<?php
										


									?>
									<th class="column-empty2" width="32" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">&nbsp;</th>
											<?php
											
										}
									?>
									
									
									
									
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>