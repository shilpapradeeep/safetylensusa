<?php
    if (!empty($member_d_address)) 
    {
        foreach ($member_d_address as $key => $val) {
            ?>
                <div class="row mb-2" style="border-bottom: 1px solid #f6f6f6; ">
                    <div class="form-group col-xl-10 col-lg-10 col-md-10 col-sm-10">
                        <label class="control-label">Address</label>
                        <input type="hidden" class="form-control" id="m_address_d" name="m_address_d" placeholder="Address" readonly="" value="<?=$val->md_address?>">
                        <h5><?=$val->md_address?></h5>
                    </div>
                    <div class="form-group col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <?php
                        if ($val->md_status == '1') {
                        ?>
                        <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                        <?php
                        }
                        ?>
                        
                    </div>
                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <label class="control-label">District</label>
                        <input type="hidden" class="form-control" id="m_district_d" name="m_district_d" placeholder="District" readonly="" value="<?=$val->md_district?>">
                        <h5><?=$val->md_district?></h5>
                    </div>
                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <label class="control-label">State</label>
                        <input type="hidden" class="form-control" id="m_state_d" name="m_state_d" placeholder="State" readonly="" value="<?=$val->md_state?>">
                        <h5><?=$val->md_state?></h5>
                    </div>
                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <label class="control-label">Pin-number</label>
                        <input type="hidden" class="form-control" id="m_pin_number_d" name="m_pin_number_d" placeholder="Pin Number" readonly=""  value="<?=$val->md_pin?>">
                        <h5><?=$val->md_pin?></h5>
                    </div>                                 
                </div>
            <?php
        }
    }
?>