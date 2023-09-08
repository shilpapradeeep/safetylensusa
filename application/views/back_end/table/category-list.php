
<div class="row">
 <?php if(!empty($tdata))
 { ?>
   <div class="col-md-12 col-lg-12">



    <div class="table-responsive">
     <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

      <div class="row">
       <div class="col-sm-12">
        <table id="example" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
         <thead>
          <tr role="row">
           <th># </th>
           <th>Chapter Name</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($tdata as $skey => $val) { ?>
          <tr >
           <td ><?=$skey+1;?></td>
           <td><?=not($val->c_title,'-');?></td>
           <td>  
            <a onclick="e_dit('<?=sec($val->c_id);?>')" title="Edit" class="btn btn-info btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
            <a onclick="d_elete('<?=sec($val->c_id);?>')" title="Delete" class="btn btn-danger btn-sm mb-2 mb-xl-0 text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-trash"></i></a>
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

 echo '<div class="col-md-12" style="text-align:center;font-size: 20px;">
 <p>No data found</p>
    </div>';


} ?>
</div>