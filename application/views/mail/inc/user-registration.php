<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div mc:repeatable="Select" mc:variant="Intro">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
		<tr>
			<td class="p30-15" style="padding: 35px;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="h2 center pb10" style="color:#000000; font-family:'Ubuntu', Arial,sans-serif; font-size:50px; line-height:60px; text-align:center; padding-bottom:10px;">
					<div mc:edit="text_2">
						Hi, <?=$mailData['m_name'];?>
					</div></td>
				</tr>
				<tr>
					<td class="h5 blue pb30" style="font-family:'Ubuntu', Arial,sans-serif; font-size:20px; line-height:26px; text-align:center; color:#000; padding-bottom:30px;">
					<?php
					if(!empty($mailData['i_type']))
					{
					    ?>
					    <div mc:edit="text_3">
    						Welcome to <?=$mailData['a_title']?>
    					</div>
					    <?
					}
					?>
					
				</td>
				</tr>
				<!-- Button -->
				<tr>
					<td style="text-align: center;    padding-bottom: 7%;">
						<span class="link-white" style="color:#000;line-height: 18px; text-decoration:none;font-size: 13px;font-family:'Ubuntu', Arial,sans-serif;margin-bottom: 7%"><?=$mailData['content']?>
										<br>
										<table style="width: 100%;    margin-top: 7%;" border="0" cellspacing="0" cellpadding="4" colspan="0">
											<tr style="border:1px solid;text-transform: uppercase;font-weight: 700;background: #FF324D;color: #fff;padding: 30%; font-size:16px;">
												<td colspan="2">Login Details</td>
											</tr>
											<tr style="text-align: left;font-size: 14px;font-weight: 600; ">
												<td width="100%">User Name &nbsp;  : &nbsp;<span style="color: #ff324d"> <?=$mailData['m_email'];?></span></td>
											</tr>
											<tr style="    text-align: left;font-size: 16px;font-weight: 600; ">
												<td width="100%">Password &nbsp; : &nbsp;<span style="color: #ff324d"> <?=$mailData['pwd'];?></span> </td>
											</tr>
										</table>
									</span>
					</td>
				</tr>
				<tr mc:hideable>
					<td align="left">

					<table width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
						<tr>

							<td ><a href="<?=b('login')?>" target="_blank" class="link-white" style="color:#ffffff; text-decoration:none;">
							<div class="text-button black-button" style="color:#ffffff; font-family:'Fira Mono', Arial,sans-serif; font-size:14px; line-height:18px; text-align:center; padding:12px; background:#ff324d;">
								<div mc:edit="text_31">
									<span class="link-white" style="color:#ffffff; text-decoration:none;text-transform: uppercase;">LOGIN</span>
								</div>
							</div></a></td>

						</tr>
					</table></td>
				</tr>
				<tr>
					<td>
						<ul style="color: #000;font-size: 18px;font-family: 'ubuntu',Arial,sans-serif; list-style-type:none;text-align: left;margin-left: 157px;">
							<li style="padding-top:20px">Enjoy your Shopping</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>
						<ul style="color: #000;font-size: 15px;font-family: 'ubuntu',Arial,sans-serif; list-style-type:none;margin-left: 79px">
							<li style="padding-top:20px">* Please change your password once you log-in</li>
						</ul>
					</td>
				</tr>

			</table></td>
		</tr>
		
	</table>
</div>