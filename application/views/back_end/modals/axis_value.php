        <div class="modal value_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Axis Value</h5>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?=form_open('',array('class'=>'lens_value_form','autocomplete'=>'off'))?>
                    <input type="hidden" name="po_id" id="po_id" value="">
                    <div class="modal-body">
                        <div class="col-xl-12 col-md-12 input-divs">
                         <?php if(!empty($axis_value))  
                         {     $num = 0;
                            foreach ($axis_value as $value) { 
                              $num++;
                             ?>
                            <div class="form-group form-div" id="dv_<?=$num?>">
                                <label for="po_val">Value <span class="star">*</span></label>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-10 col-sm-10">
                                            <input type="text" value="<?=$value->po_val?>" class="form-control" id="po_val" name="po_val[]" placeholder="Enter the Name/Title" autofocus="autofocus" onfocus="this.select()">
                                        </div>
                                        <?php if($num!=1){ ?>
                                        <div class="col-md-2 col-sm-2">
                                            <a class="btn btn-danger text-white remove-new-value" typ='axis_value' fet='<?=$num?>' title="Edit"><i class="fa fa-times"></i></a>
                                        </div>
                                    <?php }else{?>

                                        <div class="col-md-2 col-sm-2">
                                            <a class="btn btn-primary text-white add-new-value" typ="axis_value" title="Edit"><i class="fa fa-plus"></i></a>
                                        </div>
                                    <?php } ?>

                                    </div>
                                </div>
                                
                                <span class="validation-error" id="tr_name_error"></span>
                            </div>
<?php }}else{ ?>

                            <div class="form-group form-div" id="dv_1">
                                <label for="po_val">Value <span class="star">*</span></label>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-10 col-sm-10">
                                            <input type="text" class="form-control" id="po_val" name="po_val[]" placeholder="Enter the Name/Title" autofocus="autofocus" onfocus="this.select()">
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <a class="btn btn-primary text-white add-new-value" typ="axis_value" title="Edit"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <span class="validation-error" id="tr_name_error"></span>
                            </div>
<?php  } ?>
                        </div>
                    </div>
                    <input type="hidden" name="type" value="axis_value">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?=form_close()?>
                </div>
            </div>
        </div>
