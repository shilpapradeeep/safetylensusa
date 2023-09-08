<h2>Edit Account Information</h2>
						
<?=form_open('',array('id'=>'pform','onsubmit'=>'return submit_profile()','autocomplete'=>'off')); ?>
<input type="hidden" name="l_id" id="l_id" value="<?=not($this->session->userdata['l_uid']['l_id'],'-');?>">
<input type="hidden" name="p_id" id="p_id" value="<?=sec($member[0]->m_id);?>">
							<div class="row">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group required-field">
												<label for="acc-name">First Name</label>
												<input type="text" class="form-control" type="text" name="uname" id="uname" value="<?=not($member[0]->m_name,'-');?>">
                                                <div id="uname_error" class="invalid-feedback"></div>
											</div><!-- End .form-group -->
										</div><!-- End .col-md-4 -->

										<div class="col-md-4">
											<div class="form-group">
												<label for="acc-mname">Last Name</label>
												<input type="text" class="form-control" type="text" name="lname" id="lname" value="<?=not($member[0]->m_lname,'-');?>">
                                                <div id="lname_error" class="invalid-feedback"></div>
											</div><!-- End .form-group -->
										</div><!-- End .col-md-4 -->

										<div class="col-md-4">
											<div class="form-group required-field">
												<label for="acc-lastname">Email ID</label>
												<input type="text" class="form-control" name="uemail" disabled id="uemail"placeholder="Email address *" value="<?=not($member[0]->m_email,'-');?>">
                                                <div id="uemail_error" class="invalid-feedback"></div>
                                            </div><!-- End .form-group -->
										</div><!-- End .col-md-4 -->
									</div><!-- End .row -->
								</div><!-- End .col-sm-11 -->
							</div><!-- End .row -->

							<div class="form-group required-field">
								<label for="acc-email">Phone No</label>
								<input type="email" class="form-control" name="uphone" disabled id="uphone"placeholder="Phone *" value="<?=not($member[0]->m_phone,'-');?>">
                                <div id="uphone_error" class="invalid-feedback"></div>
							</div><!-- End .form-group -->

							

							<div class="required text-right">* Required Field</div>
							<div class="form-footer">
								<!--<a href="#"><i class="icon-angle-double-left"></i>Back</a>-->

								<div class="form-footer-right">
									<button type="submit" class="btn btn-primary">Save</button>
								</div>
							</div><!-- End .form-footer -->
						    <?=form_close();?>