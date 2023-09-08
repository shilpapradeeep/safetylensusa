<div class="row">
    <div class="col-xl-12 col-md-12">
        <?php
            if ( !empty($member_details[0]->m_photo) &&  file_exists( FCPATH.'ThreeSeasInfologics/uploads/members/'.$member_details[0]->m_photo) ) 
                $img1 = thumb(b('ThreeSeasInfologics/uploads/members/').$member_details[0]->m_photo,430,200);
            else
                $img1 = thumb(repo().'uploads/no-image.jpg',316,200); 
        ?>
        <img src="<?=$img1?>" class="w-100">
    </div>
</div>
<div class="row pt-3 pl-1">
    <p class="text-muted">
    <div class="col-xl-4 col-md-4 text-left">Name</div>
    <div class="col-xl-8 col-md-8 text-right"><?=$member_details[0]->m_name?></div>
    </p>
</div>
<div class="row pt-3 pl-1">
    <p class="text-muted">
    <div class="col-xl-4 col-md-4 text-left">Email</div>
    <div class="col-xl-8 col-md-8 text-right"><?=$member_details[0]->m_email?></div>
    </p>
</div>
<div class="row pt-3 pl-1">
    <p class="text-muted">
    <div class="col-xl-6 col-md-6 text-left">Phone Number</div>
    <div class="col-xl-6 col-md-6 text-right"><?=$member_details[0]->m_phone?></div>
    </p>
</div>
