<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
    <style>
        .section-title
        {
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }
        .heading-border:before, .heading-border:after {
                border-top: 3px solid #dcdee3 !important;
        }
                .home-slide2 h4 {
            font-size: 1.1875em !important;
            font-weight: 500 !important;
            letter-spacing: .08em !important;
            opacity: .7 !important;
        }
        .home-slide2 h4 {
            color: #343a40 !important;
        }
        .home-slide2 h2 {
            font-size: 3rem !important;
            font-weight: 500 !important;
            letter-spacing: .08em !important;
            opacity: .7 !important;
            color: #222529 !important;
        }
        .home-slide2 .banner-box{
            border: 2px solid #fff !important;
            padding: 10px 10px !important;
        }
        .home-slide2 p{
            font-size: 1.549rem;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <div class="top-notice bg-primary text-white">
        <div class="container text-center">
            <h5 class="d-inline-block mb-0 mr-2">Get Up to <b>40% OFF</b> New-Season Styles</h5>
           <!--  <a href="category.html" class="category">MEN</a>
            <a href="category.html" class="category ml-2 mr-3">WOMEN</a> -->
            <small>* Limited time only</small>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div><!-- End .container -->
    </div><!-- End .top-notice -->

    <header class="header">

      <?php
      $this->load->view('front_end/inc/header-top');
      $this->load->view('front_end/inc/header-middle');
      $this->load->view('front_end/inc/header-bottom');
      ?>



    </header><!-- End .header -->

    <main class="main">
   <!--     <div class="home-slider owl-carousel owl-theme owl-carousel-lazy show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{-->
			<!--	'loop': false-->
			<!--}">-->
   <!--         <div class="home-slide home-slide1 banner">-->
   <!--             <img class="owl-lazy slide-bg" src="<?=repo_fr()?>images/slider/Slider-Image-01.jpg" data-src="<?=thumb(repo_fr().'images/slider/Slider-Image-01.jpg',1518,500)?>" alt="slider image">-->
   <!--             <div class="container">-->
   <!--                 <div class="banner-layer banner-layer-middle">-->
                        
   <!--                     <h2 class="text-transform-none mb-0">Today's Sale</h2>-->
   <!--                     <h4 class="text-transform-none m-b-3">Single Vision  $19.98    <span>|</span>    Bi Focal  $39.98</h4>-->
   <!--                     <h4 class="m-b-3">Digital No-line Progressive  $59.98</h4>-->
                        
   <!--                     <a href="<?=b('products');?>" class="btn btn-dark btn-lg ls-10">Shop Now!</a>-->
   <!--                 </div>-->
   <!--             </div>-->
   <!--         </div>-->

           
   <!--     </div>-->
   <div class="home-slider owl-carousel owl-theme owl-carousel-lazy show-nav-hover nav-big mb-2 text-uppercase owl-loaded owl-drag loaded" data-owl-options="{
   'loop': false
   }">
   <!-- End .home-slide -->
   <!-- End .home-slide -->
   <div class="owl-stage-outer">
      <div class="owl-stage" style="transform: translate3d(-1518px, 0px, 0px); transition: all 0s ease 0s; width: 3036px;">
         
         <div class="owl-item active" style="width: 1518px;">
            <div class="home-slide home-slide2 banner banner-md-vw loaded">
               <img class="owl-lazy slide-bg" src="<?=thumb(repo_fr().'images/slider/Slider-Image-01.jpg',1518,500)?>" data-src="<?=thumb(repo_fr().'images/slider/Slider-Image-01.jpg',1518,500)?>" alt="slider image" style="opacity: 1;">
               <div class="container">
                  <div class="banner-layer banner-layer-middle d-flex justify-content-center">
                     <div class="mx-auto">
                        <h3 class="m-b-2"><?=!empty($banner[0]->b_title1)?$banner[0]->b_title1:''; ?></h3>
                        <h4 class="mb-2 heading-border"><?=!empty($banner[0]->b_title2)?$banner[0]->b_title2:''; ?></h4>
                        <h2 class="text-transform-none m-b-4"><?=!empty($banner[0]->b_title3)?$banner[0]->b_title3:''; ?></h2>
                        <h4 class="mb-2 heading-border banner-box"><?=!empty($banner[0]->b_title4)?$banner[0]->b_title4:''; ?></h4>
                        <p class="m-b-1"><?=!empty($banner[0]->b_title5)?$banner[0]->b_title5:''; ?></p>
                        <a href="<?=b('products');?>" class="btn btn-block btn-dark">Shop Now</a>
                        
                     </div>
                  </div>
                  <!-- End .banner-layer -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--<div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next disabled"><i class="icon-angle-right"></i></button></div>-->
   <!--<div class="owl-dots disabled"></div>-->
</div>
        
        
        <!-- End .home-slider -->
        
      <section class="new-products-section">
            <div class="container">
            <?php if(!empty($safety_frames))  { $productData['products'] = $safety_frames; ?>
            <h2 class="section-title heading-border ls-20 border-0">Safety Frames</h2>
            <?php $this->load->view('front_end/inc/widget/featured-product-widget_1',$productData);?>
            <?php } ?>
      <!--   <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
         <?php /* foreach($brands as $bkey=>$bval) { 
             if(!empty($bval->b_brand_logo) &&    file_exists( FCPATH.'assets/uploads/brandlogo/'.$bval->b_brand_logo ))
             {
                 $img = thumb(b().'assets/uploads/brandlogo/'.$bval->b_brand_logo,270,70);
             }
             else
             {
                 $img = thumb(repo().'assets/uploads/no-image.jpg',270,70);
             } */
             ?> 
                    <div class="product-category">
                        <a href="<?=b('products');?>">
                            <figure>
                                <img src="<?=$img;?>" alt="category">
                            </figure>
                            <div class="category-content">
                                <h3>Shop Now</h3>
                                
                            </div>
                        </a>
                    </div>
                    <?php /* } ?>

                     <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="<?=repo_fr()?>images/brands/bolle_Logo.png" alt="category">
                            </figure>
                            <div class="category-content">
                              <h3>Shop Now</h3>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="<?=repo_fr()?>images/brands/armourx_Logo.png" alt="category">
                            </figure>
                            <div class="category-content">
                                <h3>Shop Now</h3>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="<?=repo_fr()?>images/brands/uvex_Logo.png" alt="category">
                            </figure>
                            <div class="category-content">
                                 <h3>Shop Now</h3>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="<?=repo_fr()?>images/brands/pentax_Logo.png" alt="category">
                            </figure>
                            <div class="category-content">
                                <h3>Shop Now</h3>
                            </div>
                        </a>
                    </div> 
                    
                </div>-->
            </div>
        </section>
   
        <!--<div class="container">

            <div class="info-boxes-slider owl-carousel owl-theme mb-2" data-owl-options="{
					'dots': false,
					'loop': false,
					'responsive': {
						'576': {
							'items': 2
						},
						'992': {
							'items': 3
						}
					}
				}">
                <div class="info-box info-box-icon-left">
                    <i class="icon-shipping"></i>

                    <div class="info-box-content">
                        <h4>FREE SHIPPING &amp; RETURN</h4>
                        <p class="text-body">Free shipping on all orders over $99.</p>
                    </div>
                </div>

                <div class="info-box info-box-icon-left">
                    <i class="icon-money"></i>

                    <div class="info-box-content">
                        <h4>MONEY BACK GUARANTEE</h4>
                        <p class="text-body">100% money back guarantee</p>
                    </div>
                </div>

                <div class="info-box info-box-icon-left">
                    <i class="icon-support"></i>

                    <div class="info-box-content">
                        <h4>ONLINE SUPPORT 24/7</h4>
                        <p class="text-body">Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>

            <div class="banners-container">
                <div class="banners-slider owl-carousel owl-theme">
                    <div class="banner banner1 banner-sm-vw">
                        <figure>
                            <img src="<?/*=repo_fr()*/?>images/banners/banner-1.jpg" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-middle">
                            <h3 class="m-b-2">Porto Watches</h3>
                            <h4 class="m-b-3 ls-10 text-primary"><sup class="text-dark"><del>20%</del></sup>30%<sup>OFF</sup></h4>
                            <a href="#" class="btn btn-sm btn-dark ls-10">Shop Now</a>
                        </div>
                    </div>

                    <div class="banner banner2 banner-sm-vw text-uppercase">
                        <figure>
                            <img src="<?/*=repo_fr()*/?>images/banners/banner-2.jpg" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-middle text-center">
                            <div class="row align-items-lg-center">
                                <div class="col-lg-7 text-lg-right">
                                    <h3 class="m-b-1">Deal Promos</h3>
                                    <h4 class="pb-4 pb-lg-0 mb-0 text-body">Starting at $99</h4>
                                </div>
                                <div class="col-lg-5 text-lg-left px-0 px-xl-3">
                                    <a href="#" class="btn btn-sm btn-dark ls-10">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="banner banner3 banner-sm-vw">
                        <figure>
                            <img src="<?/*=repo_fr()*/?>images/banners/banner-3.jpg" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-middle text-right">
                            <h3 class="m-b-2">Handbags</h3>
                            <h4 class="m-b-2 text-secondary text-uppercase">Starting at $99</h4>
                            <a href="#" class="btn btn-sm btn-dark ls-10">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>--><!-- End .container -->
      
        <section class="featured-products-section home-featured-top">
            <div class="container">
                <?php if(!empty($eyeglasses))  { $productData['products'] = $eyeglasses; ?>
               
               
                <h2 class="section-title heading-border ls-20 border-0">Eye Glass Frames</h2>
                 <!-- start .featured-proucts -->
                <?php $this->load->view('front_end/inc/widget/featured-product-widget_1',$productData);?>
                <!-- End .featured-proucts -->
                <?php  } ?>
                
                <?php if(!empty($sunglasses))  { $productData['products'] = $sunglasses; ?>
               
               
                <h2 class="section-title heading-border ls-20 border-0">Sunglasses</h2>
                 <!-- start .featured-proucts -->
                <?php $this->load->view('front_end/inc/widget/featured-product-widget_1',$productData);?>
                <!-- End .featured-proucts -->
                <?php  } ?>
                
                <?php if(!empty($loupes))  { $productData['products'] = $loupes; ?>
               
               
                <h2 class="section-title heading-border ls-20 border-0">Loupes</h2>
                 <!-- start .featured-proucts -->
                <?php $this->load->view('front_end/inc/widget/featured-product-widget_1',$productData);?>
                <!-- End .featured-proucts -->
                <?php  } ?>

            </div>
        </section>




         <section class="new-products-section home-offer-section pb-15">
                <div class="container-fluid">
                    <div class="row align-items-lg-center">
                        <div class="col-lg-6 mb-15">
                            <img src="<?=repo_fr()?>images/banners/offer1.png" alt="image">
                           
                            <div class="banner-layer banner-layer-middle">
                                <h2 class="text-black">Pantone Color of the Year</h2>
                                <h4 class="text-black m-b-1">Illuminating Yellow & Ultimate Gray</h4>
                                
                                <a href="<?=b('products');?>" class="mt-20 btn btn-primary btn-md ls-10 align-bottom">Shop Now!</a>
                            </div>
                        </div><!-- End .col-lg-6 -->

                        <div class="col-lg-6  mb-15">
                            <img src="<?=repo_fr()?>images/banners/offer2.png" alt="image">
                            <div class="banner-layer banner-layer-middle">
                                <h2 class="text-white">Back to
the Future</h2>
                                <h4 class="text-white m-b-1">Glasses inspired by iconic
retro shapes.</h4>
                                
                                <a href="<?=b('products');?>" class="mt-20 btn btn-primary btn-md ls-10 align-bottom">Shop Now!</a>
                            </div>
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6 mb-15">
                            <img src="<?=repo_fr()?>images/banners/offer3.png" alt="image">
                            <div class="banner-layer banner-layer-middle">
                                <h2 class="text-white">Blokz®
by Zenni</h2>
                                <h4 class="text-white m-b-1">Protect your eyes from
harmful UV and blue light.</h4>
                                
                                <a href="<?=b('products');?>" class="mt-20 btn btn-primary btn-md ls-10 align-bottom">Shop Now!</a>
                            </div>
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6 mb-15">
                            <img src="<?=repo_fr()?>images/banners/offer4.png" alt="image">
                            <div class="banner-layer banner-layer-middle">
                                <h2 class="text-black">Back to
the Future</h2>
                                <h4 class="text-black m-b-1">Glasses inspired by iconic
retro shapes.</h4>
                                
                                <a href="<?=b('products');?>" class="mt-20 btn btn-primary btn-md ls-10 align-bottom">Shop Now!</a>
                            </div>
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </section>

       

        <section class="new-products-section pt-0">
                <div class="container">
                    <!-- <hr class="mt-4 m-b-5"> -->

                <div class="product-widgets-container row mb-2 pb-2">
                     <?php 
                     if(!empty($sports_goggles))  { $productData['products'] = $sports_goggles; ?>
                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title mb-2">Sports Goggles</h4>
                        <?php $this->load->view('front_end/inc/widget/featured-product-widget_2',$productData);?>
                    </div>
                     <?php } ?>
                     <?php 
                     if(!empty($swimming_goggles))  { $productData['products'] = $swimming_goggles; ?>
                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title mb-2">Swimming goggles</h4>
                        <?php $this->load->view('front_end/inc/widget/featured-product-widget_2',$productData);?>
                    </div>
                    
                    <?php } ?>
                    <?php 
                     if(!empty($reading_glass))  { $productData['products'] = $reading_glass; ?>
                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title mb-2">Reading Glass</h4>
                        <?php $this->load->view('front_end/inc/widget/featured-product-widget_2',$productData);?>
                    </div>
                    
                    <?php } ?>
                    <?php 
                     if(!empty($safety_goggles))  { $productData['products'] = $safety_goggles; ?>
                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title mb-2">Safety goggles</h4>
                        
                        <?php $this->load->view('front_end/inc/widget/featured-product-widget_2',$productData);?>
                    </div>
                    <?php } ?>
                </div><!-- End .row -->
                </div>
            </section>


            <?php $m1=get_instance()->essential->latest_blogs(5); 
                     ?>
            <?php if(!empty($m1))
                    { ?> 
        <section class="blog-section">
            <div class="container">
                <h2 class="section-title heading-border border-0 mb-2">Latest Blog</h2>

                <div class="owl-carousel owl-theme" data-owl-options="{
						'loop': false,
						'margin': 20,
						'autoHeight': true,
						'autoplay': false,
						'dots': false,
						'items': 2,
						'responsive': {
							'576': {
								'items': 3
							},
							'768': {
								'items': 4
							}
						}
					}">
                    
                    
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
                       
                    <article class="post">
                        <div class="post-media">
                            <a href="<?=$link;?>">
                                <img src="<?=$img;?>" alt="<?=not($k->b_title,'');?>" >
                            </a>
                            <div class="post-date">
                                <span class="day"><?=not(date('d',strtotime($k->b_added)),'-');?></span>
                                <span class="month"><?=not(date('M',strtotime($k->b_added)),'-');?></span>
                            </div>
                        </div><!-- End .post-media -->

                        <div class="post-body">
                            <h2 class="post-title">
                                <a href="<?=$link;?>"><?=not(word($k->b_title,150),'');?></a>
                            </h2>
                            <div class="post-content">
                                <?=!empty($k->b_summary)?word($k->b_summary,150):word($k->b_content,150)?>
                            </div><!-- End .post-content -->
                        </div><!-- End .post-body -->
                    </article><!-- End .post -->
                    <?php } ?>
                    

                </div>

                <!--<hr class="mt-0 m-b-5">-->

                <!--<div class="brands-slider owl-carousel owl-theme images-center pb-2">-->
                <!--    <img src="<?=repo_fr()?>images/brands/brand1.png" width="140" height="60" alt="brand">-->
                <!--    <img src="<?=repo_fr()?>images/brands/brand2.png" width="140" height="60" alt="brand">-->
                <!--    <img src="<?=repo_fr()?>images/brands/brand3.png" width="140" height="60" alt="brand">-->
                <!--    <img src="<?=repo_fr()?>images/brands/brand4.png" width="140" height="60" alt="brand">-->
                <!--    <img src="<?=repo_fr()?>images/brands/brand5.png" width="140" height="60" alt="brand">-->
                <!--    <img src="<?=repo_fr()?>images/brands/brand6.png" width="140" height="60" alt="brand">-->
                <!--</div>-->
                
                <!-- End .brands-slider -->


            </div>
        </section>
        <?php } ?>
        <?php /** ?>
        <section class="container pb-3 mb-1">
            <div class="row feature-boxes-container pt-2">
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box feature-box-simple text-center">
                        <i class="icon-earphones-alt"></i>

                        <div class="feature-box-content">
                            <h3 class="text-uppercase">Customer Support</h3>
                            <h5>Need Assistence?</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box feature-box-simple text-center">
                        <i class="icon-credit-card"></i>

                        <div class="feature-box-content">
                            <h3 class="text-uppercase">Secured Payment</h3>
                            <h5>Safe &amp; Fast</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box feature-box-simple text-center">
                        <i class="icon-action-undo"></i>

                        <div class="feature-box-content">
                            <h3 class="text-uppercase">Free Returns</h3>
                            <h5>Easy &amp; Free</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box feature-box-simple text-center">
                        <i class="icon-shipping"></i>

                        <div class="feature-box-content">
                            <h3 class="text-uppercase">Free Shipping</h3>
                            <h5>Orders Over $99</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-3 -->
            </div>
        </section>
        <?php **/ ?>

    </main><!-- End .main -->

    <?php
    $this->load->view('front_end/inc/footer');
    ?>
</div><!-- End .page-wrapper -->

<?php
$this->load->view('front_end/inc/mobile-menu-bar');
?>




<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<?php $this->load->view('front_end/inc/script'); ?>
</body>

</html>