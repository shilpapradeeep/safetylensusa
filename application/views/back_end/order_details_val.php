<?php
$delivery = array('1'=>'Pending','2'=>'Packing','3'=>'Delivery Initiated','4'=>'In Transit','5'=>'Collected at next Center','6'=>'Waiting for Delivery','7'=>'Delivered','8'=>'Cancelled','9'=>'Undelivered');
$color_d = array('1'=>'warning','2'=>'warning','3'=>'warning','4'=>'warning','5'=>'secondary','6'=>'secondary','7'=>'success','8'=>'danger','9'=>'danger');
$color_p = array('1'=>'warning','2'=>'success','3'=>'danger','4'=>'danger','6'=>'success','7'=>'warning');
$pay_status = array('1'=>'unpaid','2'=>'paid','3'=>'cancelled','4'=>'failed');
$pay_mode = array('1'=>'unpaid','2'=>'cc','3'=>'dc','4'=>'online_banking','5'=>'wallet','6'=>'cod','7'=>'cheque');

?>
<div class="row">
<div class="col-xl-12">
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table class="table table-centered mb-0 table-nowrap">
<thead class="thead-light">
<tr>
<th>Order ID</th>
<th>Quantity</th>
<th>Total MRP</th>
<th>Total Selling Price</th>
<th>Total Savings</th>
<th>Total Net Pay</th>
<th>Order Date</th>
<th>Dalivery Status</th>
<th>Payment Status</th>
</tr>
</thead>
<tbody>
<tr class="info p-2">
<td>
<?=not($order_id,'-')?>
</td>
<td>
<?=not($i_no_of_pieces,'-')?>
</td>
<td>
<?=not($i_total_mrp,'-')?>
</td>
<td>
<?=not($i_total_selling_price,'-')?>
</td>


<td>
<?=not($i_your_savings,'-')?>
</td>
<td>
<?=not($i_net_payable,'-')?>
</td>
<td>
<?=not(date('d-M-Y',strtotime($i_update)),'-')?>
</td>

<td>
<span class="badge badge-pill badge-soft-<?=$color_d[$i_delivery_status]?> font-size-12"><?=not($delivery[$i_delivery_status],'-')?></span>
</td>
<td>
<span class="badge badge-pill badge-soft-<?=$color_p[$i_payment_mode]?> font-size-12"><?=not($pay_mode[$i_payment_mode])?></span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="table-responsive">
<table class="table table-centered mb-0 table-nowrap">
<tbody>
<tr class="details">
<td colspan="10">
<div class="row">

<div class="col-xl-12">


<div class="row mb-3">
<div class="col-md-6">
<h4>Order Summary</h4>
<table border="0" class="w-100">

<tr class="odd">
<td class="p-2">User Name</td>
<td class="p-2"><?=not($name,'-')?></td>
</tr>
<tr >
<td class="p-2">Paid Date</td>
<td class="p-2"><?=not(date('d-M-Y',strtotime($i_update)),'-')?></td>
</tr>
<tr class="odd">
<td class="p-2">Payment method</td>
<td class="p-2"><?=not($pay_mode[$i_payment_mode],'-')?></td>
</tr>

</table>
</div>
<div class="col-xl-6">
<?php
$i_s =json_decode($i_summary);
?>
<h4>Delivery Status</h4>
<div class="container mt-3 mb-5">
<div class="row">
<div class="col-md-12">

<ul class="timeline">
<?php
if (!empty($i_s->delivery_status)) 
{
$i_sum = $i_s->delivery_status;
foreach ($i_sum as $key => $value) {

?>
<li>
<a><?=not($delivery[$value->d_status],'-')?></a>
<a class="float-right text-right"><?=not(date('d-M-Y',strtotime($value->d_status_time)),'-')?>&nbsp;<?=not(date('H:i:s',strtotime($value->d_status_time)),'-')?></a>
<p></p>
</li>
<?php
}
}
else
{
?>
<li>
<a><?=not($delivery[$i_delivery_status],'-')?></a>
<a class="float-right text-right"><?=not(date('d-M-Y',strtotime($i_update)),'-')?><br><?=not(date('H:i:s',strtotime($i_update)),'-')?></a>
<p></p>
</li>
<?php
}

?>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="row mb-3">
<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Delivery Address</div>
</div>
<div class="card-body">
<p><?=not($d_address,'-')?></p>
<p><?=not($d_district,'-')?></p>
<p><?=not($d_state,'-')?> - <?=not($d_pin,'-')?></p>
</div>
</div>
</div>
<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Billing Address</div>
</div>
<div class="card-body">
<p><?=not($b_address,'-')?></p>
<p><?=not($b_district,'-')?></p>
<p><?=not($b_state,'-')?> - <?=not($b_pin,'-')?></p>
</div>
</div>
</div>

</div>

</div>


</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="table-responsive">
<table class="table table-centered mb-0 table-nowrap">
<thead class="thead-light">
<tr>
<th>#</th>
<th class="col-span-2">Name</th>
<th class="col-span-2">Product</th>
<th class="col-span-2">MRP</th>
<th class="col-span-2">Selling Price</th>
<th class="col-span-2">Quantity</th>
<th class="col-span-2">Total</th>
</tr>
</thead>
<tbody>
<?php
if (!empty($cart_list)) 
{
// tsi($cart_list);
foreach ($cart_list as $key => $val) 
{

?>
<tr>
<td>
<?=$key+1?>
</td>
<td class="col-span-2">
<?=not($val['pro_title'])?>
</td>
<td class="col-span-2">
<img src="<?=$val['pro_img_full']?>product/img-2.png" alt="product-img"
title="<?=$val['pro_img']?>" class="avatar-md" />
</td>
<td class="col-span-2">
<?=not($val['pro_mrp'],'-')?>
</td>
<td class="col-span-2">
<?=not($val['pro_selling_price'],'-')?>
</td>

<td class="col-span-2">
<?=not($val['pro_qty'],'-')?>
</td>

<td class="col-span-2">
<?=not($val['pro_qty'] * $val['pro_selling_price'],'-')?>
</td>

</tr>
<?php
}
}
else
{
?>
<tr>
<td colspan="7" align="center"> No Products Added in cart.</td>
</tr>
<?php
}
?>


</tbody>
</table>
</div>
<div class="row mt-4">
<div class="col-sm-4">
<!-- <a href="<?=b('all-order-list')?>" class="btn btn-secondary">
<i class="mdi mdi-arrow-left mr-1"></i> Back to Order List </a> -->
</div> <!-- end col -->
<div class="col-sm-4">
<div class="text-sm-center mt-2 mt-sm-0">
<label>Change Delivery status</label>
<select class="form-control select2 bg-success" name="deliver_status" id="deliver_status">
<option>Delivery Status</option>
<?php
foreach ($delivery as $key => $value) 
{
if ($key == $i_delivery_status) {
?>
<option value="<?=sec($key)?>" selected><?=$value?></option>
<?php
}
else
{
?>
<option value="<?=sec($key)?>"><?=$value?></option>
<?php
}
}
?>
</select>
</div>
</div> <!-- end col -->
</div> <!-- end row-->
</div>
</div>
</div>

</div>
