<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div mc:repeatable="Select" mc:variant="Intro">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
      <tr>
         <td class="p30-15" style="padding: 35px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td class="h2 center pb10" style="color:#000000; font-family:'Ubuntu', Arial,sans-serif; font-size:32px; line-height:60px; text-align:center; padding-bottom:0px;">
                     <div mc:edit="text_2">
                        Dear <?=$mailData['m_name']?>,
                     </div>
                  </td>
               </tr>
               <tr>
                  <td class="h5 blue pb30" style="font-family:'Ubuntu', Arial,sans-serif; font-size:14px; line-height:25px; text-align:center; color:#000; padding-bottom:30px;">
                     <div mc:edit="text_3">
                        <span>
                        Your order placed successfully
                        </span><br>
                        <span>Order ID : <?= $mail_invo[0]['o_id']?></span><br>
                        <span>
                        We will update you on <?= $mail_invo[0]['m_phone']?> and <?= $mail_invo[0]['m_email']?>
                        </span>
                     </div>
                  </td>
               </tr>
               <?php if(!empty($mail_addr)) { ?> 
               <tr>
                  <td class="h5 blue pb30" style="font-family:'Ubuntu', Arial,sans-serif; font-size:14px; line-height:25px; text-align:justify; color:#000; padding-bottom:10px;">
                     <table width="100%">
                        <thead >
                           <tr>
                              <th>Billing Address</th>
                              <th>Delivery Address</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <?=wordwrap($mail_addr[1]['ma_address'],15,"<br>\n")?><br>
                                 <?=$mail_addr[1]['ma_distrct'].', '.$mail_addr[1]['ma_state']?><br>
                                 <?=$mail_addr[1]['ma_pincode']?><br>
                              </td>
                              <td>
                                 <?=wordwrap($mail_addr[2]['ma_address'],15,"<br>\n")?><br>
                                 <?=$mail_addr[2]['ma_distrct'].', '.$mail_addr[2]['ma_state']?><br>
                                 <?=$mail_addr[2]['ma_pincode']?><br>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
               <?php } ?>
               <tr>
                  <td class="fluid-img img-center pb70" style="font-size:0pt; line-height:0pt; text-align:center;    padding-bottom: 22px;"><img src="<?=repo()?>mail/images/separator.jpg" width="590" height="1" mc:edit="image_3" style="max-width:590px;" border="0" alt="" /></td>
               </tr>
               <!-- Button -->
               <tr>
                  <td align="">
                     <table width="100%" border="1" cellspacing="0" cellpadding="0"  align="center" style="font-size: 14px;border: 1px solid #FF324D;">
                        <thead style="background-color: #FF324D;color: #fff">
                           <tr>
                              <th style="padding: 3%;border: 1px solid #fff;">
                                 Order Summary
                              </th>
                           </tr>
                        </thead>
                     </table>
                     <table width="100%" border="1" cellspacing="0" cellpadding="20"  align="center" style="font-size: 14px;border: 1px solid #393b3c;line-height: 16px;">
                        <thead style="background-color: #393b3c;color: #fff">
                           <tr>
                              <th style="border: 1px solid #fff;">Sl.no</th>
                              <th style="border: 1px solid #fff;">Item(s)</th>
                              <!-- <th style="border: 1px solid #fff;">Title</th>
                              <th style="border: 1px solid #fff;">Selling Price</th>
                              <th style="border: 1px solid #fff;">MRP</th> -->
                              <th style="border: 1px solid #fff;">Quantity</th>
                              <th style="border: 1px solid #fff;">Price</th>
                           </tr>
                        </thead>
                        <tbody  align="center">
                           <?php
                              foreach($cart_detail as $index =>$cd_key)
                              {
                              	if($cd_key['pr_thumb_image']!='#')
                              		$img=repo().'uploads/product/'.$cd_key['pr_thumb_image'];
                              	else
                              		$img=repo().'uploads/no-image.jpg';
                              	$img=thumb($img,100,200);
                              	?>
                           <tr>
                              <td style=""><?=($index+1)?></td>
                              <td style="">
							  <!-- <img src="<?=$img?>" alt="<?=$cd_key['pr_title']?>" width="100%" height="50px"> -->
							  <table width="100%" border="1" cellspacing="0" cellpadding="20"  align="center" style="font-size: 14px;border: 1px solid #ddd;line-height: 16px;">
                        
								<tbody  align="center">
								
								<tr>
									<td colspan="1" ><img src="<?=$img?>" alt="<?=$cd_key['pr_title']?>" width="100%" height="50px"></td>
									<th colspan="12" >D490 Black Crystal</th>
									
								</tr>

								<tr>
									<td colspan="1" >Color/Size:		</td>
									<td colspan="11" >Black Crystal  |  54-16-140-B30.9 (ED: 56.1)</td>
									
									<td >₹<?=!empty($cd_key['c_qty'])?$cd_key['c_qty']:0 * !empty($cd_key['pr_selling_price'])?$cd_key['pr_selling_price']:0;?></td>
								</tr>
								<tr>
									<td colspan="1" >Lens:			</td>
									<td colspan="11" >SINGLE VISION (POLY CARBONATE 2MM THICKNESS) -	</td>
									
									<td >₹<?=!empty($cd_key['c_qty'])?$cd_key['c_qty']:0 * !empty($cd_key['pr_selling_price'])?$cd_key['pr_selling_price']:0;?></td>
								</tr>
								<tr>
								
									<td colspan="12" >Scratch Coating	</td>
									<td ><b><?=$mail_invo[0]['o_grant_total']?></b></td>
								</tr>
								
								
								</tbody>
							</table>
							<br>
							<table width="100%" border="1" cellspacing="0" cellpadding="20"  align="center" style="font-size: 14px;border: 1px solid #ddd;line-height: 16px;">
							<strong>Prescription</strong>
							<thead style="background-color: #393b3c;color: #fff">
								<tr>
									<th style="border: 1px solid #fff;"></th>
									<th style="border: 1px solid #fff;">Sphere</th>
									<th style="border: 1px solid #fff;">Cylinder</th>
									<th style="border: 1px solid #fff;">Axis</th>
									<th style="border: 1px solid #fff;">Add</th>
								</tr>
							</thead>
							<tbody  align="center">
								<tr>
									<td style=""><b>Right (OD):	</b></td>
									<td style="">0.00	</td>
									<td style="word-wrap: break-word;">0.00	</td>
									<td style=""></td>
									<td style=""></td>
								</tr>
								<tr>
									<td style=""><b>Left (OS):		</b></td>
									<td style="">0.00	</td>
									<td style="word-wrap: break-word;">0.00	</td>
									<td style=""></td>
									<td style=""></td>
								</tr>
								<tr>
									<td style=""><b>PD R:			</b></td>
									<td colspan="2" style="">28	</td>
									<td style=""><b>PD L:</b></td>
									<td style="">29</td>
								</tr>
							</tbody>
							</table>
							  </td>
                              <!-- <td style="word-wrap: break-word;"><?=$cd_key['pr_title']?>
                              <td style="">₹<?=$cd_key['pr_selling_price']?></td>
                              <td style="">₹<?=$cd_key['pr_mrp']?></td> -->
                              <td style=""><?=!empty($cd_key['c_qty'])?$cd_key['c_qty']:'';?></td>
                              <td style="">₹<?=!empty($cd_key['c_qty'])?$cd_key['c_qty']:0 * !empty($cd_key['pr_selling_price'])?$cd_key['pr_selling_price']:0;?></td>
                           </tr>
                           <?php
                              }
                              ?>
                           <tr>
                              <!-- <td style="border-right: #fff;border-left: #fff;"></td>
                              <td style="border-left: #fff;border-right: #fff;"></td>
                              <td style="border-right: #fff;border-left: #fff;"></td> -->
                              <td style="border-left: #fff;border-right: #fff;"></td>
                              <td style="border-left: #fff;"></td>
                              <td  style=""><b>Delivery Charge		</b></td>
                              <td style=""><b><?=$mail_invo[0]['o_delivery_charge']?></b></td>
                           </tr>
						   <tr>
                             
                              <td style="border-left: #fff;border-right: #fff;"></td>
                              <td style="border-left: #fff;"></td>
                              <td  style=""><b>Total Price	</b></td>
                              <td style=""><b><?=$mail_invo[0]['o_grant_total']?></b></td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
               
               <!-- END Button -->
               <tr>
                  <td>
                     <p align="justify" style="    margin-top: 30px;">
                        <b><u>Note:</u></b> <br>
                        <span>*</span> If this is not initated by you please do let us know at earliest by <a href="<?=base_url('contact-us')?>">contact us</a><br>
                        <span>*</span> To secure your account login and change your password immediately by <a href="<?=base_url('login')?>">click here</a>
                     </p>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
   </table>
</div>