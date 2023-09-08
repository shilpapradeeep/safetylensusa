<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('front_end/inc/head')?>
  <style type="text/css">

    .pr_title {
      margin-bottom: -1rem !important;
    }
    .list_product_action_box
    {
      margin-top: 2.5rem !important;
     
    }

  </style>
</head>
<body>
  <!-- LOADER -->
  <?php $this->load->view('front_end/inc/preloader')?>
  <!-- END LOADER -->
  <!-- Home Popup Section -->
  <?php 
  if(empty($this->session->userdata('ld_phone')))
  {
   $this->load->view('front_end/inc/newsletter-modal');
 }
 ?>
 <!-- End Screen Load Popup Section --> 
 <!-- START HEADER -->
 <header class="fixed-top header_wrap">
  <?php 
  $this->load->view('front_end/inc/top-bar');
  $this->load->view('front_end/inc/search-bar');
  $this->load->view('front_end/inc/menu-bar');
  ?>
</header>
<!-- END HEADER -->
<!-- START BREADCRUMB -->
<?php $this->load->view('front_end/inc/breadcrumb'); ?>
<!-- END BREADCRUMB -->
<!-- END MAIN CONTENT -->
<div class="main_content">
  <div class="section">
    <div class="container">
     <div class="row shop_container list">
      <?php if(!empty($orders)) { ?>  
            <?php  foreach ($orders as $index => $orders_key) 
            {
             if(!empty($orders_key->i_summary))
             {
              $pr_det_arr=json_decode($orders_key->i_summary);



              if(!empty($pr_det_arr->added_date))
              {
                $date_arr=explode(" ",$pr_det_arr->added_date);
                $date=dateWord(dateConvert($date_arr[0]));
              }
              else
                $date="";
              
              $total_qty = 0;
              $total_mrp = 0;
              $total_selling_price =0;
              $img = thumb(repo().'ThreeSeasInfologics/uploads/no-image.jpg',280,250);
             if(!empty($pr_det_arr->prod_detail)) {
              foreach ($pr_det_arr->prod_detail as $index => $pr_val) 
              {
                $total_qty+= $pr_val[0]->cr_quantity;
                $link=b().'product-detail/'.slug(sec($pr_val[0]->pr_id,'d'),$pr_val[0]->pr_title);

                if(!empty($pr_val[0]->pr_thumb_image) &&    file_exists( FCPATH.'ThreeSeasInfologics/uploads/product/'.$pr_val[0]->pr_thumb_image ))
                {
                  $img = thumb(b().'ThreeSeasInfologics/uploads/product/'.$pr_val[0]->pr_thumb_image,280,250);
                }
                else
                {
                 $img = thumb(repo().'ThreeSeasInfologics/uploads/no-image.jpg',280,250);
               }
               $p_title = $pr_val[0]->pr_title;
               //$p_selling_price = $pr_val[0]->pr_selling_price;
               //$p_mrp = $pr_val[0]->pr_mrp;
               $c_quantity = $pr_val[0]->cr_quantity;
               $total_mrp+=$pr_val[0]->pr_mrp;
               $total_selling_price+=$pr_val[0]->pr_selling_price;
               //$discount = (($p_mrp-$p_selling_price)/$p_mrp)*100;
               $p_description = $pr_val[0]->pr_tiny_description;
               $pr_discount =!empty($prls->pr_discount)?$prls->pr_discount:'0';
             }
            }


           }
            if(!empty($pr_det_arr->prod_detail)) {
           ?>    
      <div class="col-lg-3 col-md-4 col-6">

        <div class="product">
          <div class="product_img">
              <a href="<?=$link;?>">
               
                <img src="<?=$img;?>" alt="product_img2">
              </a>
          </div>
          <div class="product_info">

            <div class="product_price">
              <div class="invoice" style="float: left;">
                <span>Order ID:</span> 
                <span style="color: #FF324D;"><?=not($orders_key->i_unique_id,'-');?></span>
              </div>
            </div>
            <div class="rating_wrap">
              <span>Ordered On :   </span> 
              <span style="color: #FF324D;"><?=not($date,'-');?></span>
            </div>

            <div class="pr_desc pr_title"><h6 class="product_title"><a href="<?=$link;?>"><?=not($p_title,'-');?></a></h6></div>
            
           <div class="pr_desc">
            <p><?=not($p_description,'-');?></p>
          </div>
          <div class="product_price">
            <span><strong>Total Quantity :</strong> <?=not($total_qty,'-');?></span>
              
           </div>
           <div class="rating_wrap">
              <span class="price">₹<?=not($total_selling_price,'-');?></span>
              <del>₹<?=not($total_mrp,'-');?></del>
              <div class="on_sale">
               <span><?=$pr_discount;?>% Off</span>
             </div>
            </div>
          
            
            <div class="list_product_action_box">
              <ul class="list_none pr_action_btn">
                <li class="add-to-cart"><a href="<?=b().'your-order-details/'.sec($orders_key->i_unique_id)?>"><i class="icon-basket-loaded"></i> View More Details</a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
     <?php } 
       }else { 
        echo "No orders yet!";
        } ?>
    </div>
  </div>
</div>
<!-- END MAIN CONTENT -->
<!-- START FOOTER -->
<?php 
$this->load->view('front_end/inc/footer');
$this->load->view('front_end/inc/script');
?>

</body>
</html>