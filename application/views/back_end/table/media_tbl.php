<div class="row">
 <?php if(!empty($media_list))
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
            <th>Link</th>
            <th>Images</th>
            <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($media_list as $skey => $val) { ?>
          <tr>
            <td><?=$skey+1?></td>
            <td><?=not($val->mt_title,'-')?></td>
            <td><?=not($val->m_file_link,'-')?></td>
            <td>
              <div class="avatar-list">
              <?php
                $img_arr = $val->m_file_path;
                if (!empty($img_arr)) 
                {
                  
                    if ( !empty($img_arr) &&  file_exists( FCPATH.'ThreeSeasInfologics/uploads/media/'.$img_arr) ) 
                        $img1 = thumb(b('ThreeSeasInfologics/uploads/media/').$img_arr,430,200);
                    else
                        $img1 = thumb(repo().'uploads/no-image.jpg',316,200); 

                    ?>
                    <img src="<?=$img1?>" alt="" class="rounded avatar-md">
                    <?php
                  
                }
              ?>
              </div>
            </td>
            <td>
                <a class="btn btn-primary text-white" onclick="edit_media('<?=sec($val->m_id)?>')"><i class="fa fa-edit"></i></a>
                <a class="btn btn-secondary text-white" onclick="delete_media('<?=sec($val->m_id)?>')"><i class="fa fa-trash"></i></a>
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