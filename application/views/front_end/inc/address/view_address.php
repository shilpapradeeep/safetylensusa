<?php defined('BASEPATH') OR exit('No direct script access allowed');
$type;
if($type==1 || $type==2)
{
  
  ?>
  
    <?php
      foreach ($address as $adk => $addr) 
      {
        ?>
        <div class="col-md-12" style="padding: 10px;border: 1px solid #dddddd;background: #fff;margin-bottom: 10px">
        <p><?=$addr['addr']?></p>
        <a onclick="update_address(<?="'".sec($addr['id'])."','".sec($type)."'"?>)" class="btn btn-fill-line btn-block" style="color:#fff;width: 50%;margin:0px 25%"><span id="up_spin<?=$type?>">Change Address </span> </a>
         </div>
        <?php
      }
    ?>
 

  
  <?php
}
?>
