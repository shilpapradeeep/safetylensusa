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
						Welcome to Gree Stores
					</div>
				</td>
				</tr>
				<!-- Button -->
				<tr>
					<td style="text-align: center;    padding-bottom: 5%;">
						<span class="link-white" style="color:#000;line-height: 18px; text-decoration:none;font-size: 13px;font-family:'Ubuntu', Arial,sans-serif;margin-bottom: 5%">Dealership Registration completed successfully
										<br>
										<table style="width: 100%;    margin-top: 5%;" border="1" cellspacing="0" cellpadding="4" colspan="0">
											<tr style="border:1px solid;text-transform: uppercase;font-weight: 700;background: #133984;color: #fff">
												<td colspan="2">Login Details</td>
											</tr>
											<tr style="    text-align: left;">
												<td width="50%">User Name </td>
												<td><?=$mailData['email'];?></td>
											</tr>
											<tr style="    text-align: left;">
												<td width="50%">Password </td>
												<td><?=$mailData['password'];?></td>
											</tr>
										</table>
									</span>
					</td>
				</tr>
				<tr mc:hideable>
					<td align="left">

					<table width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
						<tr>

							<td ><a href="<?=b()?>" target="_blank" class="link-white" style="color:#ffffff; text-decoration:none;">
							<div class="text-button black-button" style="color:#ffffff; font-family:'Fira Mono', Arial,sans-serif; font-size:14px; line-height:18px; text-align:center; padding:12px; background:#e05416;">
								<div mc:edit="text_31">
									<span class="link-white" style="color:#ffffff; text-decoration:none;text-transform: uppercase;">LOGIN</span>
								</div>
							</div></a></td>

						</tr>
					</table></td>
				</tr>
				<tr>
					<td>
						<ul style="color: #000;font-size: 13px;font-family: 'ubuntu',Arial,sans-serif;">
							<li>* Please change your password once you log-in</li>
						</ul>
					</td>
				</tr>

			</table></td>
		</tr>
		<tr>
			<td class="fluid-img img-center pb70" style="font-size:0pt; line-height:0pt; text-align:center;"><img src="<?=dev_url() ?>nalbes_asset/images/mail_images/separator.jpg" width="590" height="1" mc:edit="image_3" style="max-width:590px;" border="0" alt="" /></td>
		</tr>
	</table>
</div>