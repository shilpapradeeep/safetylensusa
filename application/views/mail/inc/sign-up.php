<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div mc:repeatable="Select" mc:variant="Intro">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
		<tr>
			<td class="p30-15" style="padding: 35px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="h2 center pb10" style="color:#000000; font-family:'Ubuntu', Arial,sans-serif; font-size:30px; line-height:60px; text-align:center; padding-bottom:10px;">
					<div mc:edit="text_2">
						Hi, <?=$mailData['m_name'];?>
					</div></td>
				</tr>
				<tr>
					<td class="h5 blue pb30" style="font-family:'Ubuntu', Arial,sans-serif; font-size:20px; line-height:26px; text-align:center; color:#000; padding-bottom:30px;">
					<div mc:edit="text_3">
						You have successfully registered 
					</div>
				</td>
				</tr>
				<!-- Button -->
				<tr mc:hideable>
					<td align="left">
					<table width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
						<tr>

							<td ><a href="<?=b()?>" target="_blank" class="link-white" style="color:#ffffff; text-decoration:none;">
							<div class="text-button black-button" style="color:#ffffff; font-family:'Fira Mono', Arial,sans-serif; font-size:14px; line-height:18px; text-align:center; padding:12px; background:#f50a29;">
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

	</table>
</div>