<div class="row">
 <?php if(!empty($order_tbl))
 { 
  $color_d = array('1'=>'warning','2'=>'warning','3'=>'warning','4'=>'warning','5'=>'secondary','6'=>'secondary','7'=>'success','8'=>'danger','9'=>'danger');
  $cond_arr = array('1'=>'Pending','2'=>'Packing','3'=>'Delivery Initiated','4'=>'Intransit','5'=>'Collected at Next Center','6'=>'Waiting for Delivery','7'=>'Delivered','8'=>'Cancelled','9'=>'Undelivered','10'=>'All');
$color_p = array('1'=>'warning','2'=>'success','3'=>'danger','4'=>'danger','6'=>'success','7'=>'warning');
$pay_mode = array('1'=>'unpaid','2'=>'cc','3'=>'dc','4'=>'online_banking','5'=>'wallet','6'=>'cod','7'=>'cheque');
  ?>
   <div class="col-md-12 col-lg-12">



    <div class="table-responsive">
     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

      <div class="row">
       <div class="col-sm-12">
        <table id="example" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
         <thead>
          <tr role="row">
            <th>#</th>
            <th>Order ID</th>
            <th>Member Name</th>
            <th>Date</th>
            <th>Total</th>
            <th>Payment Status</th>
            <?php
            if ($all == 1) {
              ?><th>Delivery Status</th><?php
            }
            ?>
            
            <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($order_tbl as $skey => $val) { ?>
          <tr>
            <td><?=$skey+1?></td>
            <td><?=not($val->i_unique_id,'-')?></td>
            <td><?=not($val->m_name,'-')?></td>
            <td><?=not(date('d-M-Y',strtotime($val->i_update)),'-')?></td>
            <td><?=not($val->i_net_payable,'-')?></td>
            <td><!-- <?=not($val->i_payment_status,'-')?> --><span class="btn btn-<?=$color_p[$val->i_payment_status]?> btn-sm btn-rounded"><?= $pay_mode[not($val->i_payment_mode,'-')]?></span></td>
            <?php
            if ($all == 1) {
              ?><td><span class="btn btn-<?=$color_d[$val->i_delivery_status]?> btn-sm btn-rounded"><?= $cond_arr[not($val->i_delivery_status,'-')]?></span></td><?php
            }
            ?>
            
            <td>
                <a class="btn btn-success text-white" title="View" href="<?=b().'order-details/'.sec($val->i_id)?>"><i class="fa fa-eye"></i></a>
            </td>
        </tr>
      <?php  } ?>
    </tbody>
  </table>
</div>
</div>

</div>
</div>


</div>
<?php } else
{

  $this->load->view('back_end/no-data');


} ?>
</div>