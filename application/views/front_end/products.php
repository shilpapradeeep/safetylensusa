<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
    <style type="text/css">
        .product-default 
        {
            padding:10px;
               /*border: 1px #333 solid;*/
   box-shadow: 0 1px 9px 0 rgb(0 0 0 / 5%);
        }
        .product-default:hover figure {
     box-shadow: none !important;
}
       .product-default:hover {
     box-shadow: 0 5px 25px 0 rgb(0 0 0 / 8%);
}
    
    </style>
</head>
<body>
<div class="page-wrapper">
<?php
       ?>

    <header class="header">

        <?php
        $this->load->view('front_end/inc/header-top');
        $this->load->view('front_end/inc/header-middle');
        $this->load->view('front_end/inc/header-bottom');
        ?>



    </header><!-- End .header -->

    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Men</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Accessories</li>
                    </ol>
                </nav>
                <div class="row">
                    <!-- <div class="col-lg-3"></div> -->
                    <div class="col-lg-12">
                       

                        <nav class="toolbox pt-4">
                            <div class="toolbox-left">
                                <div class="toolbox-item toolbox-sort" >
                                    <label>Sort By:</label>

                                    <div class="select-custom">
                                        <select name="orderby" id="orderby" class="form-control">
                                          <?php foreach($sort as $i=>$s)
                                          {
                                                echo '<option value="'.$i.'">'.$s.'</option>';
                                          }?>
                                        </select>
                                    </div><!-- End .select-custom -->

                                    
                                </div><!-- End .toolbox-item -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="count" id="count" class="form-control">
                                            <option value="12">12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                </div><!-- End .toolbox-item -->

                                <!-- <div class="toolbox-item layout-modes">
                                    <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div> -->
                            </div><!-- End .toolbox-right -->
                        </nav>

                        <div class="row">
                            <?php if(!empty($products))
                            { 
                                foreach($products as $index=>$p)
                                    { ?>
                            <div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="<?=base_url('products-details/'.slug($p->pr_id,$p->pr_title));?>">
                                            <img src="<?=base_url('assets/front_end/images/products/s1.jpg');?>">
                                        </a>
                                        <!-- <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                            <div class="product-label label-sale">-20%</div>
                                        </div> -->
                                        <div class="btn-icon-group">
                                            <a class="btn-icon btn-add-cart" href="<?=base_url('products-details/'.slug($p->pr_id,$p->pr_title));?>"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                    <!--     <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>  -->
                                    </figure>
                                    <div class="product-details">
                                       
                                        <h2 class="product-title">
                                            <a href="product.html"><?=$p->pr_title;?></a>
                                        </h2>
                                         <div class="category-wrap">
                                            <div class="category-list">
                                               <?=!empty($p->pv_eye_size)?"Frame Size : ".$p->pv_eye_size.' |':'';?>
                                               <?=!empty($p->pv_bridge)?"Bridge : ".$p->pv_bridge.' |':'';?>
                                               <?=!empty($p->pv_temple)?"Temple : ".$p->pv_temple:'';?>
                                            </div>
                                            <a href="#" pr_id = "<?=sec($p->pr_id);?>" pr_title="<?=$p->pr_title;?>" class="btn-icon-wish <?=!empty($wishlist) && in_array(sec($p->pr_id),$wishlist)?'in-whishlist':'to-wishlist';?>"><i class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <?php if(!empty($p->pr_mrp))
                                             echo '<span class="old-price">$'.$p->pr_mrp.'</span>';
                                             echo '<span class="product-price">$'.$p->pr_selling_price.'</span>';
                                             ?>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .col-sm-4 -->
                        <?php }  } ?>

                        </div><!-- End .row -->

                        <nav class="toolbox toolbox-pagination">
                        <?= !empty($links)?$links:'' ?>

<!-- 
                            <ul class="pagination toolbox-item">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><span class="page-link">...</span></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul> -->
                        </nav>
                    </div>
                </div>
        </div>

      
        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->
    <input type="hidden" id="getUri" value="<?=$this->uri->segment(1);?>">
    <input type="hidden" id="getParams" value="<?=$getParams;?>">
    <?php

    $this->load->view('front_end/inc/footer');
    ?>
</div><!-- End .page-wrapper -->


<?php
$this->load->view('front_end/inc/mobile-menu-bar');
?>


<!-- Add Cart Modal -->

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<?php $this->load->view('front_end/inc/script'); ?>
<script src="<?=repo_fr()?>js/custom.js"></script>
</body>

</html>