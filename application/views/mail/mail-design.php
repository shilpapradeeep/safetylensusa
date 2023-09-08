<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<?php
	$this->load->view('mail/inc/head');
	?>
</head>
<body class="body">
	<span class="mcnPreviewText"></span>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="center" valign="top" class="container">
				<!-- Container -->
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center">
							<table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
								<tr>
									<td class="td" bgcolor="#ffffff" style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
										<!-- Header -->
										<?php
										$this->load->view('mail/inc/header');
										// if($type=='contact-admin')
										// 	$this->load->view('mail/inc/div-intro');
										switch($type)
										{
											case 'sign-up':
												$this->load->view('mail/inc/sign-up');
												break;
											case 'order-success':
												$this->load->view('mail/inc/order-success');
												break;
											case 'payment-fail':
												$this->load->view('mail/inc/payment-failed');
												break;
											case 'order-cancel':
												$this->load->view('mail/inc/order-cancelled');
												break;
											case 'corporate-safety':
												$this->load->view('mail/inc/corporate-safety');
												break;
											case 'contact-admin':
												$this->load->view('mail/inc/contact-admin');
												break;
											case 'contact-user':
												$this->load->view('mail/inc/contact-user');
												break;
											case 'user':
												$this->load->view('mail/inc/user-registration');
												break;
											case 'order-status':
												$this->load->view('mail/inc/order-status');
												break;
											case 'change-my-password':
												$this->load->view('mail/inc/change-my-password');
												break;
										}
									      
								// 	    if($type!='order-success' && $type!='order-status' && $type!='contact-admin')
								// 		{
								// 			$this->load->view('mail/inc/div-intro');
								// 		}
										/*	if($type!='order-success' && $type!='order-status')
										{
											$this->load->view('mail/inc/offer');
											$this->load->view('mail/inc/product');
										}*/
										$this->load->view('mail/inc/social-media');
										?>
									</td>
								</tr>
								
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
