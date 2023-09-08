<!-- Modal -->
	<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<?=form_open('',array("id"=>"newshippingAdd")) ;?>
					<div class="modal-header">
						<h3 class="modal-title" id="addressModalLabel">Shipping Address</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div><!-- End .modal-header -->

					<div class="modal-body">
							
                                 <div class="row">
                                      <div class="col-md-6">
                                        <input type="hidden" class="form-control"  id="add_type" name="add_type">
                                    <div class="form-group ">
                                        <label>First Name </label>
                                        <input type="text" class="form-control"  id="ship_fname" name="ship_fname">
                                    </div><!-- End .form-group -->
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Last Name </label>
                                        <input type="text" class="form-control"  id="ship_lname" name="ship_lname">
                                    </div><!-- End .form-group -->
                                    </div>
                                      <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Address  </label>
                                        <input type="email" class="form-control" id="ship_email" name="ship_email">
                                    </div><!-- End .form-group -->
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Address </label>
                                        <input type="text" class="form-control"  id="ship_addr" name="ship_addr">
                                        
                                    </div><!-- End .form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Street  </label>
                                       <input type="text" class="form-control"  id="ship_street" name="ship_street">
                                    </div><!-- End .form-group -->
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>City  </label>
                                        <input type="text" class="form-control" id="ship_city" name="ship_city">
                                    </div><!-- End .form-group -->
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State/Province</label>
                                        <div class="select-custom" >
                                           <input type="text" class="form-control" id="ship_state" name="ship_state">
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Zip/Postal Code </label>
                                        <input type="text" class="form-control"  id="ship_zip" name="ship_zip">
                                    </div><!-- End .form-group -->
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <div class="select-custom">
                                            <select class="form-control" id="ship_ctry" name="ship_ctry">
                                              <?php
                                                if(!empty($countries))
                                                {
                                                    foreach($countries as $c)
                                                    {
                                                        echo ' <option '.$c->code=='US'?'selected':''.' value="'.$c->id.'">'.$c->code.'-'.$c->name.'</option>';
                                                    }
                                                } ?>
                                              
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->
                                </div>
                                  <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Phone Number </label>
                                        <div class="form-control-tooltip">
                                            <input type="tel" class="form-control"  id="ship_phone" name="ship_phone">
                                            <span class="input-tooltip" data-toggle="tooltip" title="" data-placement="right" data-original-title="For delivery questions."><i class="icon-question-circle"></i></span>
                                        </div><!-- End .form-control-tooltip -->
                                    </div><!-- End .form-group -->
                                </div>
                                  </div>
                                 
                                
					</div><!-- End .modal-body -->

					<div class="modal-footer">
						<button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary btn-sm">Save changes</button>
					</div><!-- End .modal-footer -->
				</form>
				
			</div><!-- End .modal-content -->
		</div><!-- End .modal-dialog -->
	</div><!-- End .modal -->