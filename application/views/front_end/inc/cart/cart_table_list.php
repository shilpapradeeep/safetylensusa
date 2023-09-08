<?php
$mrp_total=0;
$selling_price_total=0;
foreach($cart as $w)
{
   // tsi($w);
$pro_link=b().'product-detail/'.slug($w->pr_id,$w->pr_title);
//$type_link=b().'product-list/'.slug($w->t_id,$w->t_name);
$mrp_total+=$w->pr_mrp;
$selling_price_total+=$w->pr_selling_price;
?>
<tr>
    <td class="product-thumbnail"><a href="<?= $pro_link ?>"><img src="<?= thumb(repo().'uploads/product/'.$w->pr_thumb_image,100,100,75); ?>" alt="product1"></a></td>
    <td class="product-name" data-title="Product"><a href="<?= $pro_link ?>"><?= not(nohtml($w->pr_title)); ?></a></td>
    <td class="product-price" data-title="Price"><?php if(!empty($w->pr_selling_price)){ ?>
      &#x20B9;<?= not($w->pr_selling_price); ?>
      <?php if(!empty($w->pr_mrp)){ ?>
        <strike style="color:red"><?= not($w->pr_mrp); ?></strike>
      <?php }} ?></td>
    <td class="product-quantity" data-title="Quantity">
        <div class="quantity" id="<?= not(sec($w->pr_id)); ?>" onclick="product_quantity(this.id)">
            <input type="button" value="-" class="minus">
            <input type="text" name="qtybutton" id="product_quant<?= not(sec($w->pr_id)); ?>" value="<?= not($w->cr_quantity);?>" title="Qty" class="qty" size="4">
            <input type="button" value="+" class="plus">
          </div>
    </td>
    <td class="product-subtotal"><?php $sav=$w->pr_mrp-$w->pr_selling_price; if(!empty($sav)) echo '₹'.$sav; ?></td>
    <td class="product-subtotal" data-title="Total"><?php if(!empty($w->pr_selling_price))
      {
        echo "₹".$w->pr_selling_price*$w->cr_quantity;
      }
      ?></td>
    <td class="product-remove" data-title="Remove"><a id="<?= not(sec($w->pr_id)); ?>" onclick="delete_cart_id(this.id)"><i class="ti-close"></i></a></td>
</tr>

  <?php
}
?>