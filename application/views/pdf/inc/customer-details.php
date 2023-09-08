<tr>
<td>

<table style="width: 100%;border-top: 1px solid #C0C0C0">
<tr>
<td>
<table >
<tr>
<td class="primary-color fnt-19" style="color: #FF324D"><b><?=$mailData['m_name']?></b></td>
</tr>
<tr>
<td>Phone Number : <?= $mail_invo[0]['m_phone']?></td>
</tr>
<tr>
<td>Email : <?= $mail_invo[0]['m_email']?></td>
</tr>
</table>		
</td>
<td>
<table   align="right">
<tr>
<td style="text-transform: uppercase;">
Order Id
</td>
<td>:</td>
<td class="primary-color" style="color: #FF324D">
<b><?= $mail_invo[0]['i_unique_id']?></b>
</td>
</tr>

<tr>
<td style="text-transform: uppercase;">
Date Of issue
</td>
<td>:</td>
<td>
<b><?= date("d/m/Y", strtotime($mail_invo[0]['i_update']));?></b>
</td>
</tr>
</table>
</td>


</tr>
<tr>
<td colspan="2" cellspacing="0" cellpadding="0" style="border-top: 1px solid #C0C0C0;"></td>
</tr>
<tr>
<td>
<table >
<tr>
<td style="font-weight: bold;">Billing Address</td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>
<?=$mail_addr[1]['ma_address']?>

</td>
</tr>

<tr>
<td><?=$mail_addr[1]['ma_distrct'].', '.$mail_addr[1]['ma_state'].', '?></td>
</tr>
<tr>
<td>Pincode : 
<?=$mail_addr[1]['ma_pincode']?></td>
</tr>
</table>	
</td>
<td>
<table align="right" style="text-align: right; width: 100%">
<tr>
<td style="font-weight: bold">Delivery Address</td>
</tr>
<tr>
<td></td>
</tr>

<tr>
<td>
<?=$mail_addr[2]['ma_address']?>

</td>
</tr>
<tr>
<td><?=$mail_addr[1]['ma_distrct'].', '.$mail_addr[1]['ma_state'].', '?></td>
</tr>
<tr>
<td>Pincode : 
<?=$mail_addr[2]['ma_pincode']?></td>
</tr>
</table>	
</td>
</tr>
<tr>
<td colspan="2" cellspacing="0" cellpadding="0" style="border-top: 1px solid #C0C0C0;"></td>
</tr>
</table>
</td>

</tr>