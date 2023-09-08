<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
</head>
<body>
<div class="page-wrapper">
<?php
      $this->load->view('front_end/inc/offer-top'); ?>

    <header class="header">

        <?php
        $this->load->view('front_end/inc/header-top');
        $this->load->view('front_end/inc/header-middle');
        $this->load->view('front_end/inc/header-bottom');
        ?>



    </header><!-- End .header -->

    <main class="main">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Blog Post</li>
					</ol>
				</div><!-- End .container -->
			</nav>
            <?php if(!empty($blog)){  
                   if(!empty($blog[0]->b_img) &&    file_exists( FCPATH.'assets/uploads/blog/'.$blog[0]->b_img ))
                   {
                     $img = thumb(b().'assets/uploads/blog/'.$blog[0]->b_img,880,334);
                   }
                   else
                   {
                    $img = thumb(repo().'uploads/no-image.jpg',880,334);
                  }
                
                ?>
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<article class="post single">
                        <div class="post-media">
								
									<img src="<?=$img;?>" alt="<?=not($blog[0]->b_title,'');?>">
							</div><!-- End .post-media -->

							<div class="post-body">
								<div class="post-date">
									<span class="day"><?=not(date('d',strtotime($blog[0]->b_added)),'-');?></span>
									<span class="month"><?=not(date('d',strtotime($blog[0]->b_added)),'-');?></span>
								</div><!-- End .post-date -->

								<h2 class="post-title">
                                <?=not($blog[0]->b_title,'');?>
								</h2>

								<div class="post-meta">
									<span><i class="icon-calendar"></i><?=not(date('F d,Y',strtotime($blog[0]->b_added)),'-');?></span>
									<span><i class="icon-user"></i>By <a href="#">Admin</a></span>
									
								</div><!-- End .post-meta -->

								<div class="post-content">
                                <?=not($blog[0]->b_content,'');?></div><!-- End .post-content -->

								
							</div><!-- End .post-body -->
						</article><!-- End .post -->

					</div><!-- End .col-lg-9 -->

					<?php $this->load->view('front_end/inc/blog-sidebar'); ?>
				</div><!-- End .row -->
			</div><!-- End .container -->
            <?php } ?>
			<div class="mb-6"></div><!-- margin -->
		</main>

    <?php
    $this->load->view('front_end/inc/footer');
    ?>
</div><!-- End .page-wrapper -->


<?php
$this->load->view('front_end/inc/mobile-menu-bar');
?>


<!-- Add Cart Modal -->

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<?php $this->load->view('front_end/inc/script'); ?>
</body>

</html>