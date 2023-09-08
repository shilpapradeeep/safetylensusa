<?php $m1=get_instance()->essential->latest_blogs(5); 
                     ?>
            <?php if(!empty($m1))
                    { ?> 
<aside class="sidebar col-lg-3">
						<div class="pin-wrapper" style="height: 889.656px;"><div class="sidebar-wrapper" style="border-bottom: 0px none rgb(119, 119, 119); width: 280px;">
							


							<div class="widget">
								<h4 class="widget-title">Recent Posts</h4>

								<ul class="simple-post-list">
								<?php
                    foreach ($m1 as $k)
                    {
                        $link=b().'blog-details/'.slug($k->b_id,$k->b_title);
                        if(!empty($k->b_img) &&    file_exists( FCPATH.'assets/uploads/blog/'.$k->b_img ))
                                {
                            $img = thumb(b().'assets/uploads/blog/'.$k->b_img,265,198);
                            }
                            else
                            {
                            $img = thumb(repo().'assets/uploads/no-image.jpg',265,198);
                        }
                        $sl = !empty($k->b_slug)? $k->b_slug:preg_replace('~[^\pL\d]+~u', '-', $k->b_title);
						$link = b().$sl.'/blog/'.$k->b_id;

                   ?>
									<li>
										<div class="post-media">
											<a href="<?=$link;?>">
												<img src="<?=$img;?>" alt="Post">
											</a>
										</div><!-- End .post-media -->
										<div class="post-info">
											<a href="<?=$link;?>"><?=not(word($k->b_title,50),'');?></a>
											<div class="post-meta">
											<?=not(date('F d,Y',strtotime($k->b_added)),'-');?>
											</div><!-- End .post-meta -->
										</div><!-- End .post-info -->
									</li>
					<?php } ?>				

									
								</ul>
							</div><!-- End .widget -->

							
						</div></div><!-- End .sidebar-wrapper -->
					</aside><!-- End .col-lg-3 -->
<?php } ?>