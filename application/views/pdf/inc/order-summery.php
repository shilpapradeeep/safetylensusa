
<table width="100%"  cellspacing="0" cellpadding="0"  align="center" style="font-size: 14px;">
<thead>
<tr>
<th style="padding: 1%;    border: 1px solid #f15723;background: #FF324D;color:#fff;text-transform: uppercase;" class="fnt-19" >
<b>	Order Summary</b>

</th>

</tr>
</thead>
</table>
<table width="100%"  cellspacing="0" cellpadding="20"  align="center" style="font-size: 14px;line-height: 16px;">
<thead>
<tr>
<th style="border-left: 1px solid;border-bottom: 1px solid;border-top:1px solid;text-transform: uppercase;">Sl.no</th>
<th style="border-left: 1px solid;border-bottom: 1px solid;border-top:1px solid;text-transform: uppercase;">Product</th>
<th style="border-left: 1px solid;border-bottom: 1px solid;border-top:1px solid;text-transform: uppercase;">Title</th>
<th style="border-left: 1px solid;border-bottom: 1px solid;border-top:1px solid;text-transform: uppercase;">Selling Price</th>
<th style="border-left: 1px solid;border-bottom: 1px solid;border-top:1px solid;text-transform: uppercase;">MRP</th>

<th style="border-left: 1px solid;border-bottom: 1px solid;border-top:1px solid;text-transform: uppercase;">Quantity</th>
<th style="border-left: 1px solid;border-right: 1px solid;border-top:1px solid;border-bottom: 1px solid;text-transform: uppercase;">Sub Total</th>
</tr>
</thead>
<tbody  align="center">
<?php
foreach($cart_detail as $index =>$cd_key)
{

if($cd_key['pr_thumb_image']!='#')
$img=repo().'uploads/product/'.$cd_key['pr_thumb_image'];
else
$img=repi().'uploads/no-image.jpg';

?>
<tr>
<td style="border-left: 1px solid;border-bottom: 1px solid;"><?=($index+1)?></td>
<td style="border-left: 1px solid;border-bottom: 1px solid;padding: 1%"><img src="<?=$img?>" alt="<?=$cd_key['pr_title']?>" width="20%"></td>
<td style="word-wrap: break-word;border-left: 1px solid;border-bottom: 1px solid;"><?=$cd_key['pr_title']?></td>
<td style="border-left: 1px solid;border-bottom: 1px solid;">&#8377;<?=$cd_key['pr_selling_price']?></td>
<td style="border-left: 1px solid;border-bottom: 1px solid;">&#8377;<?=$cd_key['pr_mrp']?></td>
<td style="border-left: 1px solid;border-bottom: 1px solid;" align="center"><?=$cd_key['cr_quantity']?></td>
<td style="border-left: 1px solid;border-bottom: 1px solid;border-right: 1px solid;">&#8377;<?=$cd_key['cr_quantity']*$cd_key['pr_selling_price']?></td>
</tr>
<?php
}
?>
</tbody>
</table>
<p></p>
<table width="100%">
<tr>
<td width="20%" valign="top"></td>
<td width="45%"></td>
<td>
<table width="100%">
<tr>

<td align="right"><b>MRP</b></td>
<td>&#8377;<?=$mail_invo[0]['i_total_mrp']?></td>
</tr>
<tr>
<td align="right">
<b>Selling Price</b>
</td>
<td>
&#8377;<?=$mail_invo[0]['i_total_selling_price']?>
</td>
</tr>
<tr>
<td align="right"><b>Your Savings</b></td>
<td>&#8377;<?=$mail_invo[0]['i_your_savings']?></td>
</tr>						
<tr>
<td align="right"><b>Shipping and Handing</b></td>

<td><?php 
if(!empty($mail_invo[0]['i_delivery_charge'])) 
{


?>
&#8377;<?= $mail_invo[0]['i_delivery_charge'];
}
else
echo '';
?></td>
</tr>


<tr>
<td colspan="2" style="border-bottom: 1px solid"></td>
</tr>
<tr>
<td align="right"><b>Net Payable</b></td>

<td><b>&#8377;<?=$mail_invo[0]['i_net_payable']?></b></td>
</tr>
<tr>
<td colspan="2" style="border-bottom: 1px solid"></td>
</tr>
</table>
</td>
</tr>
</table>