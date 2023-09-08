<?php
if(!empty($cart_list))
{

    ?>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Product Desc</th>
                                    <th>MRP</th>
                                    <th>Selling Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                                    
                                                
    <?php

    $a = 0;
    $k = 0;
    $saving =0;
    $mrpa=0;
    foreach($cart_list as $key => $val)
    {
        ?>
            <tr>
                <td><?=$key+1?></td>
                <td>
                    <?php
                    if ( !empty($val['pr_img']) &&  file_exists( FCPATH.'ThreeSeasInfologics/uploads/product/'.$val['pr_img']) ) 
                        $img1 = thumb(b('ThreeSeasInfologics/uploads/product/').$val['pr_img'],430,200);
                    else
                        $img1 = thumb(repo().'uploads/no-image.jpg',316,200);
                    ?>
                    <img src="<?=$img1?>" alt="product-img"
                        title="product-img" class="avatar-md" />
                </td>
                <td>
                    <h5 class="font-size-14 text-truncate"><?=not($val['pr_title'],'-')?></h5>
                </td>
                <td>
                    <i class="fa fa-inr"></i> <?=not($val['pr_mrp'],'-')?>
                </td>
                <td>
                    <i class="fa fa-inr"></i> <?=not($val['pr_selling_price'],'-')?>
                </td>
                <td>
                    <!-- <div style="width: 120px;" class="form-group">
                        <input type="number" value="<?=not($val['qty'],'-')?>" id="qty_<?=$key+1?>" name="qty_<?=$key+1?>" class="form-control" onchange="get_total('qty_<?=$key+1?>','<?=not($val['pr_selling_price'],'-')?>','total_price_show_<?=$key+1?>','total_price_<?=$key+1?>')">
                        <span><?=not($val['qty'],'-')?></span>
                    </div> -->
                    <span><?=not($val['qty'],'-')?></span>
                </td>
                <td>
                    <?php
                    $a = $a + $val['qty'] * $val['pr_selling_price'];
                    $mrpa = $mrpa + $val['qty'] * $val['pr_mrp'];
                    $dif = ($val['qty'] * $val['pr_mrp']) - ($val['qty'] * $val['pr_selling_price']);
                    $saving = $saving + $dif;
                    ?>
                    <?=$dif?>
                </td>
                <td>
                    <i class="fa fa-inr"></i> <span id="total_price_show_<?=$key+1?>"> <?=not($val['qty'] * $val['pr_selling_price'],'-')?></span>
                    <input type="hidden" name="total_price_<?=$key+1?>" id="total_price_<?=$key+1?>" value="<?=not($val['qty'] * $val['pr_selling_price'],'-')?>">
                    
                    
                </td>
                <td>
                    <!-- <a href="javascript:void(0);" class="action-icon text-danger" onclick="delete_single_cart('<?=sec($val['cr_products_id'])?>','<?=sec($val['cr_l_id'])?>')"> <i class="mdi mdi-trash-can font-size-18"></i></a> -->
                </td>
            </tr>

        <?php
        $k = $k+$key+1;
    }
    ?>
    <input type="hidden" name="key_count" id="key_count" value="<?=$k?>">
    </tbody>
                </table>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6">
                    <a href="<?=b('cart-list')?>" class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left mr-1"></i> Back to Cart List </a>
                </div> <!-- end col -->
                <div class="col-sm-6">
                    <!-- <div class="text-sm-right mt-2 mt-sm-0">
                        <a href="ecommerce-checkout.html" class="btn btn-success">
                            <i class="mdi mdi-cart-arrow-right mr-1"></i> Checkout </a>
                    </div> -->
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
    </div>
</div>
<div class="col-xl-4">
</div>
<div class="col-xl-4">
    
     <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">Order Summary</h4>

            <div class="table-responsive">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <td>Selling Price :</td>
                            <td><span id="gt"><?=$a?></span></td>
                        </tr>
                        <tr>
                            <td>MRP : </td>
                            <td><span id="gt"><?=$mrpa?></span></td>
                        </tr>
                        <tr>
                            <td>Saving :</td>
                            <td><span id="gt"><?=$saving?></span></td>
                        </tr>
                        <tr>
                            <th>Grant Total :</th>
                            <th><span id="total"><?=$a?></span></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- end table-responsive -->
        </div>
    </div>
    <!-- end card -->
</div>
<div class="col-xl-4">
</div>
</div>
    <?php
}
?>