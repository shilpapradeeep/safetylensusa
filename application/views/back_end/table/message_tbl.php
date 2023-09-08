<div class="row">
 <?php if(!empty($msg_list))
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
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($msg_list as $skey => $val) { ?>
          <tr>
            <td><?=$skey+1?></td>
            <td><?=not($val->c_name,'-')?></td>
            <td><?=not($val->c_email,'-')?></td>
            <td><?=not($val->c_phone,'-')?></td>
            <td><?=not($val->c_subject,'-')?></td>
            <td><?=not($val->c_message,'-')?></td>
            <td><?=not(date('d-M-Y',strtotime($val->c_added)),'-')?></td>
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