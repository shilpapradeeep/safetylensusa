<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div mc:repeatable="Select" mc:variant="Intro">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
		<tr>
			<td class="p30-15" style="padding: 35px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="h2 center pb10" style="color:#000000; font-family:'Ubuntu', Arial,sans-serif; font-size:50px; line-height:60px; text-align:center; padding-bottom:10px;">
					<div mc:edit="text_2">
						Hi, <?=$mailData['uname'];?>
					</div></td>
				</tr>
				<tr>
					<td class="h5 blue pb30" style="font-family:'Ubuntu', Arial,sans-serif; font-size:20px; line-height:26px; text-align:center; color:#000; padding-bottom:30px;">
					<div mc:edit="text_3">
						<?php
						if($mailData['email']!=$mailData['n_email'] && $mailData['mobile']!=$mailData['n_mobile'])
						{
							echo "As per your request Email ID and Phone Number updated to <span style='color: #e77644;'>".$mailData['n_email']."</span> and <span style='color: #e77644;'>".$mailData['n_mobile']."</span>";
						}
						else
						{
							if($mailData['email']!=$mailData['n_email'])
							{
								echo "As per your request Email ID is updated from <br><span style='color: #e77644;'>".$mailData['email']."</span> to <span style='color: #e77644;'>".$mailData['n_email'].'</span>';
							}
							if($mailData['mobile']!=$mailData['n_mobile'])
							{
								echo "As per your request Phone Number is updated from <br><span style='color: #e77644;'>".$mailData['mobile']."</span> to <span style='color: #e77644;'>".$mailData['n_mobile'].'</span>';
							}
						}	
						?>
					</div>
				</td>
				</tr>
				<!-- Button -->
				<tr mc:hideable>
					<td align="left">
					<table width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
						<tr>

							<td ><a href="<?=b()?>" target="_blank" class="link-white" style="color:#ffffff; text-decoration:none;">
							<div class="text-button black-button" style="color:#ffffff; font-family:'Fira Mono', Arial,sans-serif; font-size:14px; line-height:18px; text-align:center; padding:12px; background:#e05416;">
								<div mc:edit="text_31">
									<span class="link-white" style="color:#ffffff; text-decoration:none;text-transform: uppercase;">Enjoy Shopping</span>
								</div>
							</div></a></td>

						</tr>
					</table></td>
				</tr>
				<tr>
					<td></td>
				</tr>

			</table></td>
		</tr>
		<tr>
			<td class="fluid-img img-center pb70" style="font-size:0pt; line-height:0pt; text-align:center;"><img src="<?=dev_url() ?>nalbes_asset/images/mail_images/separator.jpg" width="590" height="1" mc:edit="image_3" style="max-width:590px;" border="0" alt="" /></td>
		</tr>
	</table>
</div>