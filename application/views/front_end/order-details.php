<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('front_end/inc/head')?>
<style type="text/css">
.displayAddressDiv li {
list-style: none;
color: #000;
}

ul.timeline {
list-style-type: none;
position: relative;
}
ul {
margin-top: 0;
margin-bottom: 1rem;
}
ul.timeline:before {
content: ' ';
background: #d4d9df;
display: inline-block;
position: absolute;
left: 29px;
width: 2px;
height: 100%;
z-index: 400;
}
ul.timeline > li:before {
content: ' ';
background: white;
display: inline-block;
position: absolute;
border-radius: 50%;
border: 3px solid #ff324d;
left: 20px;
width: 20px;
height: 20px;
z-index: 400;
}
ul.timeline > li {
margin: 20px 0;
padding-left: 20px;
}
ul.timeline > li:before {
content: ' ';
background: white;
display: inline-block;
position: absolute;
border-radius: 50%;
border: 3px solid #ff324d;
left: 20px;
width: 20px;
height: 20px;
z-index: 400;
}
}
a:not([href]) {
color: inherit;
text-decoration: none;
}
.text-right {
text-align: right!important;
}
.float-right {
float: right!important;
}
a, button {
outline: 0!important;
}
a {
text-decoration: none!important;
}



</style>
</head>

<body>

<!-- LOADER -->
<?php $this->load->view('front_end/inc/preloader')?>
<!-- END LOADER -->
<!-- Home Popup Section -->
<?php 
if(empty($this->session->userdata('ld_phone')))
{
$this->load->view('front_end/inc/newsletter-modal');
}
?>
<!-- End Screen Load Popup Section --> 

<!-- START HEADER -->
<header class="fixed-top header_wrap">
<?php 
$this->load->view('front_end/inc/top-bar');
$this->load->view('front_end/inc/search-bar');
$this->load->view('front_end/inc/menu-bar');
?>


</header>
<!-- END HEADER -->

<!-- START BREADCRUMB -->
<?php $this->load->view('front_end/inc/breadcrumb'); ?>
<!-- END BREADCRUMB -->

<!-- END MAIN CONTENT -->
<div class="main_content">
<div class="section">
<div class="container">
<?php if(!empty($orders)){ 

$or_summary=json_decode($orders[0]->i_summary);

if(!empty($or_summary->added_date))
{
/*$date_arr=explode(" ",$or_summary->added_date);
$date=dateWord(dateConvert($date_arr[0]));*/
$date= date('M d,Y',strtotime($or_summary->added_date));
} 
$or_summary=json_decode($orders[0]->i_summary);
$baddr=array();
$daddr=array();

foreach($or_summary->address as $key=>$or_addr)
{

if($key==0)
{
$baddr[]=$or_addr;
}
else
{
$daddr[]=$or_addr;
}
//tsi($baddr);

}

?>
<div class="row">
<div class="col-md-12">
<div class="order_review">
<div class="heading_s1">
<h4>Order Details</h4>
</div>
<div class="row" style="padding-top: 10px">
<div class="col-md-4">
<span class="order-date-invoice-item pull-left">
Order ID <span style="color: #FF324D;"><?=not($orders[0]->i_unique_id,'-');?></span>

</span>


</div>
<div class="col-md-4">

<span class="order-date-invoice-item pull-right">
Ordered on :  <?=not($date,'-');?>

</span>

</div>
<?php if(!empty($orders[0]->i_pdf)  &&    file_exists( FCPATH.'ThreeSeasInfologics/invoice/'.$orders[0]->i_unique_id.'.pdf' ) )  { 
$pdfpath='invoice/'.$orders[0]->i_unique_id.'.pdf'; ?>



<div class="col-md-4">
<a href="<?=repo().$pdfpath?>" download class="btn btn-fill-out btn-block" name="login"><i class="fa fa-download" aria-hidden="true"></i>
Download</a>
</div>
<?php } ?>
</div>
<div class="row" style="padding-top: 10px">

<div class="col-md-4">
<h5>Delivery Address</h5>
<div class="displayAddressDiv">
<ul class="displayAddressUL">
<li class="displayAddressLI displayAddressFullName"><?=not($daddr[0]->ma_address,'-');?></li>

<li class="displayAddressLI displayAddressCityStateOrRegionPostalCode"><?=not($daddr[0]->ma_distrct,'-');?> <?=not($daddr[0]->ma_pincode,'-');?></li>
<li class="displayAddressLI displayAddressCountryName"><?=not($daddr[0]->ma_state,'-');?></li>
</ul>
</div>
</div>
<div class="col-md-4">
<h5>Billing Address</h5>

<div class="displayAddressDiv">
<?php if(!empty($baddr)) { ?>
<ul class="displayAddressUL">
<li class="displayAddressLI displayAddressFullName"><?=not($baddr[0]->ma_address,'-');?></li>

<li class="displayAddressLI displayAddressCityStateOrRegionPostalCode"><?=not($daddr[0]->ma_distrct,'-');?> <?=not($daddr[0]->ma_pincode,'-');?></li>
<li class="displayAddressLI displayAddressCountryName"><?=not($daddr[0]->ma_state,'-');?></li>
</ul>
<?php } else { echo 'No Address'; } ?>
</div>
</div>
<div class="col-md-4">


</div>
</div>


<div class="table-responsive order_table"></div>

</div>
</div>
</div>
<div class="row"  style="padding-top: 15px">
<div class="col-12">
<div class="table-responsive shop_cart_table">
<table class="table">
<thead>
<tr>
<th class="product-thumbnail">&nbsp;</th>
<th class="product-name">Product</th>
<th class="product-price">MRP</th>
<th class="product-price">Selling Price</th>
<th class="product-price">Savings</th>
<th class="product-quantity">Quantity</th>
<th class="product-subtotal">Total</th>
<!-- <th class="product-remove">Remove</th> -->
</tr>
</thead>
<tbody>
<?php 
$total_mrp = 0; 
$total_selling_prize = 0;
$total_savings = 0;
$total_qty = 0;
$total_amount = 0;
if(!empty($or_summary->prod_detail)) {
foreach ($or_summary->prod_detail as $index => $or_key)  { 
$link=b().'product-detail/'.slug(sec($or_key[0]->pr_id,'d'),$or_key[0]->pr_title);

if(!empty($or_key[0]->pr_thumb_image) &&    file_exists( FCPATH.'ThreeSeasInfologics/uploads/product/'.$or_key[0]->pr_thumb_image ))
{
$img = thumb(b().'ThreeSeasInfologics/uploads/product/'.$or_key[0]->pr_thumb_image,280,310);
}
else
{
$img = thumb(repo().'ThreeSeasInfologics/uploads/no-image.jpg',280,310);
}
$total_mrp+= $or_key[0]->pr_mrp; 
$total_selling_prize+= $or_key[0]->pr_selling_price;
$total_savings+= ($or_key[0]->pr_mrp*$or_key[0]->cr_quantity)-($or_key[0]->pr_selling_price*$or_key[0]->cr_quantity);
$total_qty+= $or_key[0]->cr_quantity;
$total_amount+= ($or_key[0]->pr_selling_price*$or_key[0]->cr_quantity);
?>
<tr>
<td class="product-thumbnail"><a href="<?=$link;?>"><img src="<?=$img;?>" alt="product1"></a></td>
<td class="product-name" data-title="Product"><a href="<?=$link;?>"><?=$or_key[0]->pr_title?></a></td>
<td class="product-price" data-title="Price">₹<?=not($or_key[0]->pr_mrp,'-');?></td>
<td class="product-price" data-title="Price">₹<?=not($or_key[0]->pr_selling_price,'-');?></td>
<td class="product-price" data-title="Price">₹<?=($or_key[0]->pr_mrp*$or_key[0]->cr_quantity)-($or_key[0]->pr_selling_price*$or_key[0]->cr_quantity)?></td>
<td class="product-quantity" data-title="Quantity"><?=not($or_key[0]->cr_quantity,'-');?></td>
<td class="product-subtotal" data-title="Total">₹<?=not(($or_key[0]->pr_selling_price*$or_key[0]->cr_quantity),'-');?></td>
<!-- <td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td> -->
</tr>
<?php } } ?>

</tbody>
<tfoot>
<tr>
<th colspan="2" >
Total
</th>
<th class="product-name">₹<?=not($total_mrp,'-');?></th>
<th class="product-price">₹<?=not($total_selling_prize,'-');?></th>
<th class="product-price">₹<?=not($total_savings,'-');?></th>
<th class="product-price"><?=not($total_qty,'-');?></th>
<th class="product-quantity">₹<?=not($total_amount,'-');?></th>

</tr>
</tfoot>
</table>
</div>
</div>
</div>
<div class="row"  style="padding-top: 15px">
<div class="col-12">
<div class="heading_s1">
<h4>Tracking</h4>
</div>
</div>


<div class="row">
<div class="col-md-12">

<ul class="timeline">
<?php
$delivery = array('1'=>'Pending','2'=>'Packing','3'=>'Delivery Initiated','4'=>'In Transit','5'=>'Collected at next Center','6'=>'Waiting for Delivery','7'=>'Delivered','8'=>'Cancelled','9'=>'Undelivered');

if (!empty($or_summary->delivery_status)) 
{
$i_sum = $or_summary->delivery_status;
foreach ($i_sum as $key => $value) {

?>
<li>
<a style="margin-left: 2rem;"><?=not($delivery[$value->d_status],'-')?></a>
<a style="margin-left: 1rem;" class="float-right text-right"><?=not(date('d-M-Y',strtotime($value->d_status_time)),'-')?>&nbsp;<?=not(date('H:i:s',strtotime($value->d_status_time)),'-')?></a>
<p></p>
</li>
<?php
}
}
else
{
?>
<li>
<a style="margin-left: 2rem;" ><?=not( $delivery[$orders[0]->i_delivery_status],'-')?></a>
<a style="margin-left: 1rem;" class="float-right text-right"><?=not(date('d-M-Y',strtotime($orders[0]->i_update )),'-')?><br><?=not(date('H:i:s',strtotime($orders[0]->i_update )),'-')?></a>
<p></p>
</li>
<?php
}

?>
</ul>
</div>
</div>

</div>

<?php } ?>
</div>
</div>
</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<?php 
$this->load->view('front_end/inc/footer');
$this->load->view('front_end/inc/script');
?>



</body>

</html>