<?php 
if($this->uri->segment(1) == 'corporate')
{
    $fname = 'Company Name';
    $lname = 'Owner Name';
    $type = '3';
}
else
{
    $fname = 'First name';
    $lname = 'Last name';
    $type = '2';
}

?>
<input type="hidden" name="l_type" id="l_type" value="<?=sec($type);?>">
<div class="col-md-6">
                     <div class="form-group">
                        <input id="fname" type="text" class="form-control" name="fname" tabindex="1"  placeholder="<?=$fname;?>">
                        <div id="fname_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                        <input class="form-control" type="text"  id="uemail" name="uemail" placeholder="Email Id">
                        <div id="uemail_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                        <input class="form-control" type="password"  id="upassword" name="upassword" placeholder="Password">
                        <div id="upassword_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                        <textarea class="form-control" id="uaddress" name="uaddress" placeholder="Address"></textarea>
                        <div id="uaddress_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                        <input class="form-control" type="text" id="ucity" name="ucity" placeholder="City">
                        <div id="ucity_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                         <?php $countries=get_country(array('status'=>'1'));  ?>
                         <select class="form-control" type="text" id="ucountry" name="ucountry" >
                            <option value="">Please select Country</option>
							<?php if(!empty($countries)) { 
							foreach($countries as $ckey=>$cval){ ?>
							<option <?php if(!empty($cval->code) && $cval->code == 'US') echo 'selected'; ?> value="<?=!empty($cval->id)?$cval->id:'';?>"><?=!empty($cval->id)?$cval->name:'';?></option>
							<?php } } ?>
						</select>
                        <div id="ucountry" class="invalid-feedback"></div>
                     </div>
                     <div class="form-footer">
                        <span style="display: none;" class="spinner"><i class="fa fa-2x fa-spin fa-spinner"></i></span>
                        <input type="submit" id="form-btn" class="btn btn-primary" value="Register">
                     </div>
                     <!-- End .form-footer -->
                     <div class="form-note ">Already Have an Account? <a href="<?=b('login'); ?>">Login In now</a></div>
                  </div>
                  <!-- End .col-md-6 -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <input id="lname" type="text" class="form-control" name="lname" tabindex="1"  placeholder="<?=$lname;?>">
                        <div id="lname_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                        <input class="form-control" type="text"  id="uphone" name="uphone" placeholder="Phone No">
                        <div id="uphone_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                        <input class="form-control" type="password"  id="cpassword" name="cpassword" placeholder="Confirm Password">
                        <div id="cpassword_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                        <input class="form-control" type="text"  id="usuite" name="usuite" placeholder="Suite">
                        <div id="usuite_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                        <input class="form-control" type="text"  id="uzip" name="uzip" placeholder="Zip Code">
                        <div id="uzip_error" class="invalid-feedback"></div>
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="ustate" name="ustate" placeholder="State">
                        <div id="ustate_error" class="invalid-feedback"></div>
                     </div>
                  </div>
                  <!-- End .col-md-6 -->