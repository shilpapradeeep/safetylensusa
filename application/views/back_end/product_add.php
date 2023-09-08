<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $this->load->view('back_end/include/head');
    ?>
    <style type="text/css">
        /*.remove_img_btn
        {
            display: none;
        }*/
        .validation-error
        {
            color: red;
        }
        #view_discount
        {
            display: none;
        }
        .addMoreControl {
            margin-bottom: 8px;
            background-color: #f0f3f5;
            padding: 4px 8px 8px;
            border: solid 1px #ddd;
            border-top: solid 2px #777;
            margin-top: 26px;
        }
        .input-group-addon, .input-group-btn {
            margin-top: 27px;
        }
        .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
            z-index: 2;
            margin-left: -1px;
        }

    </style>
    <style>
        .fileuploader-theme-thumbnails {
            background: #fff;
        }
        .fileuploader-item-image {
            background: #fff !important;
        }
    </style>
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <?php
    $this->load->view('back_end/include/header');
    ?>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <?php
            $this->load->view('back_end/include/side_menu');
            ?>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <?php
                        $this->load->view('back_end/include/breadcrumb');
                        ?>
                    </div>
                </div>
                <!-- Bootstrap CSS -->
                <!-- jQuery first, then Bootstrap JS. -->
                <!-- Nav tabs -->

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#variation" role="tab" data-toggle="tab">Variations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#seo" role="tab" data-toggle="tab">SEO Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#images" role="tab" data-toggle="tab">Images</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <?=form_open('',array('id'=>'product_form','onsubmit'=>'return product_submit_form()','autocomplete'=>'off'))?>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="profile">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="">
                                    <div class="card">

                                        <div class="card-body">
                                            <input type="hidden" name="pr_id" id="pr_id" value="<?=!empty($product[0]->pr_id)? sec($product[0]->pr_id):''; ?>">
                                            <input type="hidden" name="pr_cat_id_edit" id="pr_cat_id_edit" value="<?=!empty($product[0]->pr_cat_id)? sec($product[0]->pr_cat_id):''; ?>">
                                            <input type="hidden" name="pr_brand_edit" id="pr_brand_edit" value="<?=!empty($product[0]->pr_brand)? sec($product[0]->pr_brand):''; ?>">
                                            <input type="hidden" name="pr_style_edit" id="pr_style_edit" value="<?=!empty($product[0]->pr_style)? sec($product[0]->pr_style):''; ?>">
                                            <input type="hidden" name="pr_featured_edit" id="pr_featured_edit" value="<?=!empty($product[0]->pr_is_featured)? $product[0]->pr_is_featured:''; ?>">
                                            <input type="hidden" name="pr_popular_edit" id="pr_popular_edit" value="<?=!empty($product[0]->pr_popular)? $product[0]->pr_popular:''; ?>">
                                            <input type="hidden" name="pr_latest_edit" id="pr_latest_edit" value="<?=!empty($product[0]->pr_latest)? $product[0]->pr_latest:''; ?>">
                                            <input type="hidden" name="pr_most_selling_edit" id="pr_most_selling_edit" value="<?=!empty($product[0]->pr_most_selling)? $product[0]->pr_most_selling:''; ?>">
                                            <input type="hidden" name="pr_d_desc_edit" id="pr_d_desc_edit" value="<?=!empty($product[0]->pr_detailed_description)? $product[0]->pr_detailed_description:''; ?>">


                                            <div class="row">
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="pr_name">Product Name <span class="star">*</span></label>
                                                        <input type="text" class="form-control" id="pr_name" name="pr_name" placeholder="Enter the Product Name" autofocus="autofocus" onfocus="this.select()" value="<?=!empty($product[0]->pr_title)? $product[0]->pr_title:''; ?>">
                                                        <span class="validation-error" id="pr_name_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="pr_model">Model <span class="star"></span></label>
                                                        <input type="text" class="form-control" id="pr_model" name="pr_model" placeholder="Enter the Model" autofocus="autofocus" onfocus="this.select()" value="<?=!empty($product[0]->pr_model)? $product[0]->pr_model:''; ?>">
                                                        <span class="validation-error" id="pr_model_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="pr_product_no">Product No: <span class="star">*</span></label>
                                                        <input type="text" class="form-control" id="pr_product_no" name="pr_product_no" placeholder="Enter the Product No:" autofocus="autofocus" onfocus="this.select()" value="<?=!empty($product[0]->pr_product_no)? $product[0]->pr_product_no:''; ?>">
                                                        <span class="validation-error" id="pr_product_no_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <label class="control-label"><span id="cat_spin"></span>Category <span class="star">*</span></label>
                                                    <select class="form-control select2" name="pr_category" id="pr_category">
                                                        <option>Choose a category</option>
                                                    </select>
                                                    <span class="validation-error" id="pr_category_error"></span>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <label class="control-label"><span id="brand_spin"></span>Brand <span class="star">*</span></label>
                                                    <select class="form-control select2" name="pr_brand" id="pr_brand">
                                                        <option>Choose a Brand</option>
                                                    </select>
                                                    <span class="validation-error" id="pr_brand_error"></span>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <label class="control-label"><span id="style_spin"></span>Style <span class="star">*</span></label>
                                                    <select class="form-control select2" name="pr_style" id="pr_style">
                                                        <option>Choose a Style</option>
                                                    </select>
                                                    <span class="validation-error" id="pr_style_error"></span>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="form-group">
                                                        <label for="pr_product_no">Color </label>
                                                        <input type="text" class="form-control" id="pr_product_color" name="pr_product_color" placeholder="Enter the Color" autofocus="autofocus" value="<?=!empty($product[0]->pr_product_color)? $product[0]->pr_product_color:''; ?>">
                                                        <span class="validation-error" id="pr_product_color_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 mb-2">
                                                    <label for="pr_d_desc">Description</label>
                                                    <div class="summernote" name="pr_d_desc" id="pr_d_desc" value=""></div>
                                                    <span class="validation-error" id="pr_d_desc_error"></span>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Order No</label>
                                                        <input class="form-control" type="text" name="pr_order_no" id="pr_order_no" placeholder="Enter the Order No:" value="<?=!empty($product[0]->pr_order_no)? $product[0]->pr_order_no:''; ?>">
                                                        <span class="validation-error" id="pr_order_no_error"></span>
                                                    </div>
                                                </div>

                                                <!--<div class="col-xl-4 col-md-6">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label class="control-label">Product MRP Price </label>-->
                                                <!--        <input class="form-control" type="text" value="" id="pr_mrp_price" name="pr_mrp_price" placeholder="Enter the MRP Price" value="<?=!empty($product[0]->pr_mrp)? $product[0]->pr_mrp:''; ?>">-->
                                                <!--        <span class="validation-error" id="pr_mrp_price_error"></span>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <!--<div class="col-xl-4 col-md-6">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label class="control-label">Product Selling Price <span class="star">*</span></label>-->
                                                <!--        <input class="form-control" type="text" id="pr_selling_price" name="pr_selling_price" placeholder="Enter the Selling Price" value="<?=!empty($product[0]->pr_selling_price)? $product[0]->pr_selling_price:''; ?>">-->
                                                <!--        <span class="validation-error" id="pr_selling_price_error"></span>-->
                                                <!--    </div>-->
                                                <!--</div>-->

                                                <!--<div class="col-xl-4 col-md-6">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="discount_check">
                                                        <label class="custom-control-label" for="discount_check">If you need Discount percentage ?</label>
                                                        <input type="hidden" name="type_dis" id="type_dis" value="">
                                                    </div>
                                                    <div id="view_discount">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="discount" name="discount" placeholder="" readonly="">
                                                            <div class="input-group-postpend">
                                                                <span class="input-group-text bg-primary text-white" id="postpand">%</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>-->
                                                <div class="col-xl-2 col-md-3">
                                                    <div class="form-group mt-4 pt-2">
                                                        <div class="custom-control custom-switch mb-2" dir="ltr">
                                                            <input type="checkbox" class="custom-control-input" id="pr_featured"  name="pr_featured" value="1">
                                                            <label class="custom-control-label" for="pr_featured">Featured</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--<div class="col-xl-2 col-md-3">-->
                                                <!--    <div class="form-group mt-4 pt-2">-->
                                                <!--        <div class="custom-control custom-switch mb-2" dir="ltr">-->
                                                <!--            <input type="checkbox" class="custom-control-input" id="pr_popular" name="pr_popular"value="1">-->
                                                <!--            <label class="custom-control-label" for="pr_popular">Popular</label>-->
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                <!--</div>-->

                                                <!--<div class="col-xl-2 col-md-3">-->
                                                <!--    <div class="form-group mt-4 pt-2">-->
                                                <!--        <div class="custom-control custom-switch mb-2" dir="ltr">-->
                                                <!--            <input type="checkbox" class="custom-control-input" id="pr_latest" name="pr_latest" value="1">-->
                                                <!--            <label class="custom-control-label" for="pr_latest">Upcoming</label>-->
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                <!--</div>-->

                                                <!--<div class="col-xl-2 col-md-3">-->
                                                <!--    <div class="form-group mt-4 pt-2">-->
                                                <!--        <div class="custom-control custom-switch mb-2" dir="ltr">-->
                                                <!--            <input type="checkbox" class="custom-control-input" id="pr_most_selling" name="pr_most_selling" value="1">-->
                                                <!--            <label class="custom-control-label" for="pr_most_selling">Most selling</label>-->
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <div class="col-xl-3 col-md-3">
                                                    <div class="form-group mt-4 pt-2">
                                                        <div class="custom-control custom-switch mb-2" dir="ltr">
                                                            <input type="checkbox" class="custom-control-input" id="pr_prescription_glass" name="pr_prescription_glass" value="1">
                                                            <label class="custom-control-label" for="pr_prescription_glass"> Non Prescription Glasses</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- end card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="variation">
                    <?php if( !empty($product) && $product[0]->pv_product_id ) {
                        foreach ($product as $KeyVar=>$variation) { ?>
                            <div class="control-group input-group addMoreControl">
                                                <?php  $data['variation'] =$variation; $this->load->view('back_end/include/input-variations',$data); ?>
                                <?php if($KeyVar==0 ) { ?>
                                    <div class="input-group-btn">
                                        <button class="btn btn-success  add-more" type="button" data-before=".vartAdditionRowBefore" data-copy=".vartAdditionInfoRow">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                <?php }else { ?>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger  remove" type="button" data-before=".vartAdditionRowBefore" data-copy=".vartAdditionInfoRow">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                <?php } ?>

                            </div>
                    <?php  }  } else {  ?>
                        <div class="control-group input-group addMoreControl">
                            <?php  $this->load->view('back_end/include/input-variations'); ?>
                            <div class="input-group-btn">
                                <button class="btn btn-success  add-more" type="button" data-before=".vartAdditionRowBefore" data-copy=".vartAdditionInfoRow">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="after-add-more"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="seo">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="">
                                    <div class="card">

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="pr_seo_title">SEO Title</label>
                                                        <input type="text" class="form-control" id="pr_seo_title" name="pr_seo_title" placeholder="Enter the SEO Title" autofocus="autofocus" value="<?=!empty($product[0]->pr_seo_title)? $product[0]->pr_seo_title:''; ?>">
                                                        <span class="validation-error" id="pr_seo_title_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="pr_slug">Slug</label>
                                                        <input type="text" class="form-control" id="pr_slug" name="pr_slug" placeholder="Enter the Slug" autofocus="autofocus" value="<?=!empty($product[0]->pr_slug)? $product[0]->pr_slug:''; ?>">
                                                        <span class="validation-error" id="pr_slug_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="pr_seo_keywords">SEO Keywords</label>
                                                        <textarea class="form-control" id="pr_seo_keywords" name="pr_seo_keywords" placeholder="Enter the SEO Keywords" rows="5"><?=!empty($product[0]->pr_seo_keywords)? $product[0]->pr_seo_keywords:''; ?></textarea>
                                                        <span class="validation-error" id="pr_seo_keywords_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="pr_seo_desp">SEO Description</label>
                                                        <textarea class="form-control" id="pr_seo_desp" name="pr_seo_desp" placeholder="Enter the Slug Description" rows="5"><?=!empty($product[0]->pr_seo_desp)? $product[0]->pr_seo_desp:''; ?></textarea>
                                                        <span class="validation-error" id="pr_seo_desp_error"></span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="images">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label> </label>
                                    <div class="fileuploader fileuploader-theme-thumbnails">

                                        <input type="file" id="files" name="files[]" multiple="multiple" style="position: absolute; z-index: -9999; height: 0px; width: 0px; padding: 0px; margin: 0px; line-height: 0; outline: 0px; border: 0px; opacity: 0;" onchange="upload_grp_images(this.files,'files')">
                                        <div class="fileuploader-items">
                                            <ul class="fileuploader-items-list" id="files-images_list">
                                                <?php
                                                if(!empty($product[0]->pr_gallery_image))
                                                    $gm = json_decode($product[0]->pr_gallery_image);
                                                $images = array();
                                                if(!empty($gm)){

                                                    foreach ($gm as $key => $value) {

                                                        $images[]= $value;
                                                        $this->session->set_userdata('product_photos',array("images"=>$images));

                                                        $v = base_url('assets/uploads/product/'.$value);
                                                        $div_id="img_list_".($key+1);
                                                        $thumb = "'".$value."'";
                                                        $thumb_divid = "'".$div_id."'";
                                                        $del_args = "'files','".$value."','".$div_id."'";
                                                        print('<li onclick="select_thumb('.$thumb.','.$thumb_divid.')" class="fileuploader-item file-type-image file-ext-jpg" id="'.$div_id.'">'.
                                                            '<div class="fileuploader-item-inner">'.
                                                            '<input type="hidden" name="files_input[]" value="'.$value.'">'.
                                                            '<div class="thumbnail-holder">'.
                                                            '<div class="fileuploader-item-image fileupload-no-thumbnail"><img src="'.$v.'" >'.
                                                            '</div>'.
                                                            '</div>'.
                                                            '<div class="actions-holder"><a onclick="remove_img('.$del_args.')"  class="remove-btn" title="Remove">'.
                                                            '<i class="fa fa-trash icon-style"></i></a>'.
                                                            '</div>'.
                                                            '</div>'.
                                                            '</li>'); } }?>
                                            </ul>

                                        </div>
                                        <div id="progressbar"></div><br>
                                        <div class="fileuploader-input"><div class="fileuploader-input" onclick="$('#files').click()" style="margin-left: 45%;">

                                                <div class="fileuploader-input-button"><span>Choose Files *</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align: center;padding-bottom: 20px;">
                                        <div id="product_photo_error" class="invalid-feedback"></div>

                                    </div>
                                    <input type="hidden" name="images_thumbnail" id="images_thumbnail">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <div class="text-center">
                                    <div class="btn-div">
                                        <button type="submit" class="btn btn-primary my-4" id=""><span class="submit"><?=!empty($product[0]->pr_id)? 'Edit':'Submit'; ?></span></button>
                                        <button type="button" class="btn btn-warning reset">Cancel</button>
                                    </div>
                                    <div align="center" class="col-md-12">
                                        <span style="display: none;" id="spin"><i class="fa fa-2x fa-spin fa-spinner"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="vcount" id="vcount" value="<?=!empty($product[0]->pv_product_id)? count($product):1 ?>">
                <input type="hidden" name="variation_array" id="variation_array" value="<?=!empty($new_cookie)?$new_cookie:'';?>"  >
                <?=form_close()?>
                <!-- end page title -->


            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



        <?php
        $this->load->view('back_end/include/footer');
        ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<?php
$this->load->view('back_end/include/script');
?>

<script type="text/javascript">
    $('#discount_check').change(function(){
        var checked=this.checked;
        if(checked==true)
        {
            discount_cal();
            $('#view_discount').show();
            $('#type_dis').val('1');
        }
        else
        {
            $('#view_discount').hide();
            $('#type_dis').val('0');
        }
    })
</script>
</body>

</html>