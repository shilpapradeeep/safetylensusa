<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title><?=get_title()?></title>

<meta property="og:type" content="website" />
<?php
if(seg(1)=='product-detail')
{
    $title = !empty($pr_det[0]->pr_seo_title)?$pr_det[0]->pr_seo_title:'-';
}
else
{
   $title = get_title();
} 

?>
<meta property="og:title" content="<?=$title?>">
<?php
if(seg(1)=='product-detail')
{
    ?>
    <meta property="og:description" content="<?=not(!empty($pr_det[0]->pr_seo_desp)?$pr_det[0]->pr_seo_desp:'-','-')?>">
    <?php $gl_img=!empty($pr_det[0]->pr_gallery_image)?explode(',',$pr_det[0]->pr_gallery_image):'-'; ?>
    <meta property="og:image" content="<?=repo()."uploads/product/".$gl_img[0]?>">
    <?php
}
else
{
    ?>
    <meta property="og:description" content="Safety Prescription Lens and Safety Frames at lowest price. Digital Progressive Lens $59.98 per pair. Z87, ANSI Lenses. Safety glasses, UVEX, ArmouRx, Pentax..">
    <meta property="og:image" content="<?= b().'assets/front_end/images/kamco-logo.png' ?>">
<?php } ?>

  <meta name="keywords" content="Safety Prescription Lens">
  <meta name="keywords" content="Safety Glasses">
  <meta name="keywords" content="Safety Prescription Glasses">
  <meta name="keywords" content="Prescription Lens">
  <meta name="keywords" content="Safety Frames">
  <meta name="keywords" content="Safety Eyeglasses">
  <meta name="keywords" content="Safety glasses Houston">
  <meta name="keywords" content="Safety prescription lens Houston">
  <meta name="keywords" content="safety Glasses Sugarland">
  <meta name="keywords" content="Safety prescription lens Sugarland">
  <meta name="keywords" content="Safety goggles">
<meta name="description" content="Safety Prescription Lens and Safety Frames at lowest price. Digital Progressive Lens $59.98 per pair. Z87, ANSI Lenses. Safety glasses, UVEX, ArmouRx, Pentax..">

<!-- Favicon -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="<?=content('fav_icon')?>">


<!-- Plugins CSS File -->
<link rel="stylesheet" href="<?=repo_fr()?>css/bootstrap.min.css">

<!-- Main CSS File -->
<link rel="stylesheet" href="<?=repo_fr()?>css/style.css">
<link rel="stylesheet" href="<?=repo_fr()?>css/custom.css">
<link rel="stylesheet" type="text/css" href="<?=repo_fr()?>vendor/fontawesome-free/css/all.min.css">