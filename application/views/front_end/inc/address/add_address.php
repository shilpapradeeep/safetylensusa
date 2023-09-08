<?php defined('BASEPATH') OR exit('No direct script access allowed');
$type;
if($type==1 || $type==2)
{
  ?>
  <span id="address<?= '_'.$type.'_span'; ?>"></span>
  <textarea id="address<?= $type; ?>"   placeholder="Address" class="form-control" style="margin-bottom:10px"></textarea>

  <span id="pincode<?= '_'.$type.'_span'; ?>" ></span>
  <input type="text" id="pincode<?= $type; ?>"  placeholder="Pincode" class="form-control" style="margin-bottom:10px">

  <span id="state<?= '_'.$type.'_span'; ?>" ></span>
  <input type="text" id="state<?= $type; ?>"  placeholder="State" class="form-control" style="margin-bottom:10px">

  <span id="district<?= '_'.$type.'_span'; ?>" ></span>
  <input type="text" id="district<?= $type; ?>"  placeholder="District" class="form-control " style="margin-bottom:10px">

  <a onclick="add_address(<?= $type ?>)" class="btn btn-fill-out btn-block ad_btn<?=$type?>" style="color:#fff"><span id="ad_spin<?=$type?>">Add Address </span> </a>
  <?php
}
?>
