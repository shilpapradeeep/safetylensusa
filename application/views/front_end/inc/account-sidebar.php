<aside class="sidebar col-lg-3">
						<div class="widget widget-dashboard">
							<h3 class="widget-title">My Account</h3>
                            <?php 
                            $uri=$this->uri->segment(1);
                            $uri1=$this->uri->segment(2); ?>
							<ul class="list">
								<li class="<?=in_array($uri,array('account'))?'active':''?>"><a href="<?=b('account')?>">Account Dashboard</a></li>
								<!--<li class="<?=in_array($uri,array('order-history'))?'active':''?>"><a href="<?=b('order-history')?>">My Orders</a></li>-->
								<li class="<?=in_array($uri,array('change-my-password'))?'active':''?>"><a href="<?=b('change-my-password')?>">Change Password</a></li>
                                <li class="<?=in_array($uri,array('logout'))?'active':''?>"><a href="<?=b('logout')?>">Log Out</a></li>
							</ul>
						</div><!-- End .widget -->
					</aside><!-- End .col-lg-3 -->