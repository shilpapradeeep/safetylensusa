<!-- <div class="row justify-content-center">
          
            <div class="col-lg-4 col-sm-6">
                <div class="team_box team_style1">
                    <?php   
                    // if ( !empty($member[0]->m_photo) &&  file_exists( FCPATH.'assets/uploads/members/'.$member[0]->m_photo ) )  
                    //     {
                    //         $img = thumb(b('assets/uploads/members/').$member[0]->m_photo,350,315); 
                    //     }
                    //     else
                    //     {
                            
                    //         $img = thumb(repo().'front_end/images/user-icon.png',350,315);
                            
                    //     } ?>

                    <div class="team_img">
                        <img src="<?=$img;?>">
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-8 col-sm-6">
                <div class="order_review">
                    <div class="heading_s1">
                    </div>
                        <h4 class="text-center"><?=not($member[0]->m_name,'-');?></h4>
                    <div class="table-responsive order_table">
                        <table class="table">
                            
                            <tbody>
                                <tr>
                                    <td><strong>Email</strong> </td>
                                    <td><?=not($member[0]->m_email,'-');?></td>
                                </tr>
                                <tr>
                                    <td><strong>Phone</strong></td>
                                    <td><?=not($member[0]->m_phone,'-');?></td>
                                </tr>
                                
                            </tbody>
                           
                        </table>
                    </div>
                    <div class="payment_method"></div>
                    
                    <a onclick="profile_edit()" class="btn btn-fill-out btn-block">Edit Profile</a>
                </div>
            </div>
        </div> -->
        <h3>Account Information</h3>
        <div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										Contact Information
										<a onclick="profile_edit()" class="card-edit">Edit</a>
									</div><!-- End .card-header -->

									<div class="card-body">
										<p>
                                        <?=not($member[0]->m_name,'-')." ".not($member[0]->m_lname,'-');?><br>
                                        <?=not($member[0]->m_email,'-');?><br>
                                        <?=not($member[0]->m_phone,'-');?><br>
										</p>
									</div><!-- End .card-body -->
								</div><!-- End .card -->
							</div><!-- End .col-md-6 -->
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										Address Information
									</div><!-- End .card-header -->

									<div class="card-body">
										<p>
                                        <?=not($address[0]->us_address,'-');?><br>
                                        <?=not($address[0]->ua_street,'-'),", ".not($address[0]->ua_city,'-');?><br>
                                        <?=not($address[0]->ua_state,'-'),", ".not($address[0]->ua_zip,'-');?><br>
										</p>
									</div><!-- End .card-body -->
								</div><!-- End .card -->
							</div><!-- End .col-md-6 -->

							
						</div><!-- End .row -->

						<!-- <div class="card">
							<div class="card-header">
								Address Book
								<a href="#" class="card-edit">Edit</a>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<h4 class="">Default Billing Address</h4>
										<address>
											You have not set a default billing address.<br>
											<a href="#">Edit Address</a>
										</address>
									</div>
									<div class="col-md-6">
										<h4 class="">Default Shipping Address</h4>
										<address>
											You have not set a default shipping address.<br>
											<a href="#">Edit Address</a>
										</address>
									</div>
								</div>
							</div>
						</div> -->
                        <!-- End .card -->
        