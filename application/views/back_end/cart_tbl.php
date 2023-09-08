<div class="row">
 <?php if(!empty($cart_list))
 { ?>
   <div class="col-md-12 col-lg-12">



    <div class="table-responsive">
     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

      <div class="row">
       <div class="col-sm-12">
        <table id="example" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
         <thead>
          <tr role="row">
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Quantity</th>
            <th>Updated Date</th>
            <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($cart_list as $key => $val) { ?>
          <tr>
            <td><?=$key+1?></td>
            <td><?=not($val['m_name'],'-')?></td>
            <td><?=not($val['m_email'],'-')?></td>
            <td><?=not($val['m_phone'],'-')?></td>
            <td><?=not($val['cr_quantity'],'-')?></td>
            <td><?=not(date('d-M-Y',strtotime($val['cr_updated'])),'-')?></td>
            <td>
                <a class="btn btn-success text-white" title="View" href="<?=b().'cart-details/'.slug($val['cr_l_id'],$val['m_name'])?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-danger text-white" title="Delete" onclick="delete_cart('<?=sec($val['cr_l_id'])?>')"><i class="fa fa-trash"></i></a>
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