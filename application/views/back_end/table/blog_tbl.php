<div class="row">
 <?php if(!empty($blog_list))
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
            <th>Title</th>
            <th>Add Date</th>
            <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($blog_list as $skey => $val) { ?>
          <tr>
            <td><?=$skey+1?></td>
            <td><?=not($val->b_title,'-')?></td>
            <td><?=not(date('d-M-Y',strtotime($val->b_added)),'-')?></td>
            <td>
                <a class="btn btn-primary text-white" title="Edit" onclick="edit_blog('<?=sec($val->b_id)?>')"><i class="fa fa-edit"></i></a>
                <a class="btn btn-secondary text-white" title="Delete" onclick="delete_blog('<?=sec($val->b_id)?>')"><i class="fa fa-trash"></i></a>
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