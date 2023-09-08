<div class="row">
 <?php if(!empty($d_list))
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
            <th>File</th>
            <th>Add Date</th>
            <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($d_list as $skey => $val) { ?>
          <tr>
            <td><?=$skey+1?></td>
            <td><?=not($val->ad_title,'-')?></td>
            <td><?=not($val->ad_file_path,'-')?></td>
            <td><?=not(date('d-M-Y',strtotime($val->ad_added)),'-')?></td>
            <td>
                <?php 
                if(!empty($val->ad_file_path))
                {
                ?>
                <a class="btn btn-success text-white" href="<?=repo().'uploads/download/'.$val->ad_file_path?>" download><i class="fa fa-download"></i></a>
                <?php
                }
                ?>
                 <a class="btn btn-secondary text-white" onclick="delete_download('<?=sec($val->ad_id)?>')"><i class="fa fa-trash"></i></a>
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