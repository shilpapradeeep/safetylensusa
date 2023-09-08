<?php
if (!empty($member_b_address)) 
{
    foreach ($member_b_address as $key => $val) {
        ?>
            
            <div class="row mb-2" style="border-bottom: 1px solid #f6f6f6; ">
                <div class="form-group col-xl-10 col-lg-10 col-md-10 col-sm-10">
                    <label class="control-label">Address</label>
                    <input type="hidden" class="form-control" id="m_address_b" name="m_address_b" placeholder="Address" readonly="" value="<?=$val->mb_address?>">
                    <h5><?=$val->mb_address?></h5>
                </div>
                <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                    <?php
                    if ($val->mb_status == '1') {
                    ?>
                    <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                    <?php
                    }
                    ?>
                </div>
                <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <label class="control-label">District</label>
                    <input type="hidden" class="form-control" id="m_district_b" name="m_district_b" placeholder="District" readonly="" value="<?=$val->mb_district?>">
                    <h5><?=$val->mb_district?></h5>
                </div>
                <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <label class="control-label">State</label>
                    <input type="hidden" class="form-control" id="m_state_b" name="m_state_b" placeholder="State" readonly="" value="<?=$val->mb_state?>">
                    <h5><?=$val->mb_state?></h5>
                </div>
                <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <label class="control-label">Pin-number</label>
                    <input type="hidden" class="form-control" id="m_pin_number_b" name="m_pin_number_b" placeholder="Pin Number" readonly="" value="<?=$val->mb_pin?>">
                    <h5><?=$val->mb_pin?></h5>
                </div>                                 
            </div>
        <?php
    }
}
?>