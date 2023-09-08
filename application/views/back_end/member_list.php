<!--<div class="row">-->
 <?php if(!empty($mem_list))
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
            <th>Phone Number</th>
            <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($mem_list as $skey => $val) { ?>
          <tr>
            <td><?=$skey+1?></td>
            <td><?=not($val->m_name,'-')?></td>
            <td><?=not($val->m_email,'-')?></td>
            <td><?=not($val->m_phone,'-')?></td>
            <td>
                <a class="btn btn-success text-white" title="View" href="<?=b().'member-details/'.sec($val->m_l_id)?>"><i class="fa fa-eye"></i></a>
                <a class="btn btn-primary text-white" title="Edit" onclick="edit_member('<?=sec($val->m_l_id)?>')"><i class="fa fa-edit"></i></a>
                <a class="btn btn-secondary text-white" title="Delete" onclick="delete_member('<?=sec($val->m_l_id)?>')"><i class="fa fa-trash"></i></a>
                <a class="btn btn-warning text-white" title="Change Password" onclick="change_password('<?=sec($val->m_l_id)?>')"><i class="fa fa-key"></i></a>

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