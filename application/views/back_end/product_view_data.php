<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product-detai-imgs">
                            <div class="row">
                                <div class="col-md-2 col-sm-3 col-4">
                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <?php
                                            foreach ($imgs as $key => $val) 
                                            {
                                                $cnt_id = $key+1;
                                                if($key == 0)
                                                {
                                                ?>
                                                    <a class="nav-link active" id="product-<?=$cnt_id?>-tab" data-toggle="pill" href="#product-<?=$cnt_id?>" role="tab" aria-controls="product-<?=$cnt_id?>" aria-selected="true">
                                                        <img src="<?=$val?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </a>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <a class="nav-link" id="product-<?=$cnt_id?>-tab" data-toggle="pill" href="#product-<?=$cnt_id?>" role="tab" aria-controls="product-<?=$cnt_id?>" aria-selected="false">
                                                        <img src="<?=$val?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </a>
                                                <?php 
                                                }
                                            }
                                        ?>                                      
                                    </div>
                                </div>
                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <?php
                                            foreach ($imgs as $key => $val) 
                                            {
                                                $cnt_id_prv = $key+1;
                                                if($key == 0)
                                                {
                                                ?>
                                                    <div class="tab-pane fade show active" id="product-<?=$cnt_id_prv?>" role="tabpanel" aria-labelledby="product-<?=$cnt_id_prv?>-tab">
                                                        <div>
                                                            <img src="<?=$val?>" alt="" class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <div class="tab-pane fade" id="product-<?=$cnt_id_prv?>" role="tabpanel" aria-labelledby="product-<?=$cnt_id_prv?>-tab">
                                                        <div>
                                                            <img src="<?=$val?>" alt="" class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                <?php 
                                                }
                                            }
                                        ?>   
                                    </div>
                                    <!-- <div class="text-center">
                                        <button type="button" class="btn btn-primary waves-effect waves-light mt-2 mr-1">
                                            <i class="bx bx-cart mr-2"></i> Add to cart
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect  mt-2 waves-light">
                                            <i class="bx bx-shopping-bag mr-2"></i>Buy now
                                        </button>
                                    </div>
                                     -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="mt-4 mt-xl-3">
                            <a href="#" class="text-primary"><?=not($pr_sub_cat,'')?></a>
                            <h4 class="mt-1 mb-3"><?=not($pr_title,'-')?></h4>

                            <?=(!empty($pr_discount))?'<h6 class="text-success text-uppercase">'.not($pr_discount,'-').'% Off</h6>' : '' ?>
                            <h5 class="mb-4">Price : <span class="text-muted mr-2"><?=(!empty($pr_mrp)) ? '<del>₹'.not($pr_mrp,'').'</del>' : ''?></span> <b>₹<?=not($pr_selling_price,'')?></b></h5>

                            <p style="margin-bottom: 0px">Category : <b><?=not($pr_cat,'-')?></b></p>
                            <p >Sub Category : <b><?=not($pr_sub_cat,'-')?></b></p>

                            <p class="text-muted mb-4"><?=not($pr_tiny_description,'')?></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="mt-4 mt-xl-3">
                            <h4 class="mt-1 mb-3">Description</h4>
                            <p class="text-muted mb-4"><?=not($pr_detailed_description,'')?></p>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="mt-4 mt-xl-3">
                            <h4 class="mt-1 mb-3">Terms and Conditions</h4>
                            <p class="text-muted mb-4"><?=not($pr_terms_and_conditions,'')?></p>
                        </div>
                    </div>
                </div>
                
                <!-- end Specifications -->

            </div>
        </div>
        <!-- end card -->
    </div>
</div>