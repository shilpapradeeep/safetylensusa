<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
</head>

<body>

<!-- LOADER -->
<?php $this->load->view('front_end/inc/preloader')?>


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

<!-- END SECTION SHOP -->

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="compare_box">
                    <?php
                        if(!empty($cmp1))
                        {
                            ?>
                            <div class="table-responsive">
                        <table class="table table-bordered text-center">
                        <tbody>
                            <tr class="pr_image">
                                <td class="row_title">Product Image</td>
                            <?php
                                foreach($cmp1 as $cind => $ci)
                                {
                                    $thm_img=$ci->pr_thumb_image;
                                    ?>
                                    <td class="row_img">
                                        <a href="<?=b().'product-detail/'.slug($ci->pr_id,$ci->pr_title)?>">
                                            <img src="<?=thumb(repo().'uploads/product/'.$thm_img,275,305)?>" alt="compare-img">
                                        </a>
                                        </td>
                                    <?php
                                }
                            ?>
                            </tr>
                            <tr class="pr_title">
                                <td class="row_title">Product Name</td>
                                 <?php
                                foreach($cmp1 as $cind => $ci)
                                {
                                    ?>
                                   <td class="product_name"><a href="<?=b().'products-detail/'.slug($ci->pr_id,$ci->pr_title)?>"><?=!empty($ci->pr_title)?$ci->pr_title:''?></a></td>
                                    <?php
                                }
                            ?>
                            </tr>
                            <tr class="pr_price">
                                <td class="row_title">Selling Price</td>
                                <?php
                                foreach($cmp1 as $cind => $ci)
                                {
                                    ?>
                                   <td class="product_price"><span class="price">&#x20B9;<?=!empty($ci->pr_selling_price)?$ci->pr_selling_price:'-'?></span></td>
                                    <?php
                                }
                            ?>
                            </tr>
                            <tr class="pr_price">
                                <td class="row_title">MRP</td>
                                <?php
                                foreach($cmp1 as $cind => $ci)
                                {
                                    ?>
                                   <td class="product_price"><span class="price">&#x20B9;<?=!empty($ci->pr_mrp)?$ci->pr_mrp:'-'?></span></td>
                                    <?php
                                }
                            ?>
                            <tr class="pr_price">
                                <td class="row_title">Discount %</td>
                                <?php
                                foreach($cmp1 as $cind => $ci)
                                {
                                    ?>
                                   <td class="product_price"><span class="price"><?=!empty($ci->pr_discount)?$ci->pr_discount.' %':'-'?></span></td>
                                    <?php
                                }
                            ?>
                            </tr>
                            <tr class="pr_add_to_cart">
                                <td class="row_title">Add To Cart</td>
                                <?php
                                foreach($cmp1 as $cind => $ci)
                                {
                                    ?>
                                   <td class="row_btn"><a onclick="cart(<?="'".sec1($ci->pr_id)."'"?>)" style="cursor:pointer;color: #fff" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> Add To Cart</a></td>
                                   
                                    <?php
                                }?>
                            </tr>
                            <tr class="description">
                                <td class="row_title">Description</td>
                                 <?php
                                foreach($cmp1 as $cind => $ci)
                                {
                                    ?>
                                   <td class="row_text"><p><?=!empty($ci->pr_tiny_description)?$ci->pr_tiny_description:''?></p></td>
                                   
                                    <?php
                                }?>
                            </tr>
                            
                            <tr class="pr_stock">
                                <td class="row_title">Item Availability</td>
                                 <?php
                                foreach($cmp1 as $cind => $ci)
                                {
                                    ?>
                                   <td class="row_stock"><span class="in-stock">In Stock</span></td>
                                    <?php
                                }?>
                            </tr>
                            
                            <tr class="pr_remove">
                                <td class="row_title"></td>
                                 <?php
                                foreach($cmp1 as $cind => $ci)
                                {
                                    ?>
                                    <td class="row_remove">
                                        <a onclick="del_compare_id(<?="'".sec1($ci->pr_id)."'"?>)" style="cursor: pointer;color: #FF0000;"><span>Remove</span> <i class="fa fa-times"></i></a>
                                    </td>
                                    <?php
                                }?>
                                
                            </tr>
                        </tbody>
                    </table>
                    </div>
                            <?php
                        }
                        else
                        {
                            echo "No data found.....";
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    $this->load->view('front_end/inc/widget/news-letter-widget');
?>
</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<?php 
    $this->load->view('front_end/inc/footer');
    $this->load->view('front_end/inc/script');
?>


</body>

</html>