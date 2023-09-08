<div class="row">
 <?php if(!empty($lead_list))
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
            <th>Added On</th>
            <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($lead_list as $skey => $val) { ?>
          <tr>
            <td><?=$skey+1?></td>
            <td><?=not($val->ld_name,'-')?></td>
            <td><?=not($val->ld_email,'-')?></td>
            <td><?=not($val->ld_phone,'-')?></td>
            <td><?=not($val->ld_added,'-')?></td>
            <td>
                <a class="btn btn-secondary text-white" title="Delete" onclick="delete_user_lead('<?=sec($val->ld_id)?>')"><i class="fa fa-trash"></i></a>
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