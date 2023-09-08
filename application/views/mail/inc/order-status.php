<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div mc:repeatable="Select" mc:variant="Intro">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
		<tr>
			<td class="p30-15" style="padding: 35px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="h2 center pb10" style="color:#000000; font-family:'Ubuntu', Arial,sans-serif; font-size:32px; line-height:60px; text-align:center; padding-bottom:0px;">
							<div mc:edit="text_2">
								Dear <?=$user_info['m_name']?>,
							</div></td>
						</tr>
						<tr>
							<td class="h5 blue pb30" style="font-family:'Ubuntu', Arial,sans-serif; font-size:14px; line-height:25px; text-align:center; color:#000; padding-bottom:30px;">

								<div mc:edit="text_3">
									
									<span >
										Your order status is changed to <span style="color:#FF324D; font-weight: 600"><?=$order_info['mail_order_status']?></span> at <span style="color:#FF324D; font-weight: 600"><?=$order_info['mail_order_status_date']?></span>
									</span><br>
									<span>Order ID : <?= $order_info['i_unique_id']?></span><br>
									<span>
										
										We will update you on <?= $user_info['m_phone']?> and <?= $user_info['m_email']?>
									</span>
								</div>
							</td>
						</tr>
						<tr mc:hideable>
							<td align="left">

							<table width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
								<tr>

									<td ><a href="<?=$order_info['tracker']?>" target="_blank" class="link-white" style="color:#ffffff; text-decoration:none;">
									<div class="text-button black-button" style="color:#ffffff; font-family:'Fira Mono', Arial,sans-serif; font-size:14px; line-height:18px; text-align:center; padding:12px; background:#ff324d;">
										<div mc:edit="text_31">
											<span class="link-white" style="color:#ffffff; text-decoration:none;text-transform: uppercase;">Track Your Order</span>
										</div>
									</div></a></td>

								</tr>
							</table></td>
						</tr>
						 
						
								
							<!-- END Button -->
								


								</table></td>
							</tr>

						</table>
					</div>