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
                    <li class="breadcrumb-item"><a href="<?=b();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
        <?php if(!empty($blog)) { ?>
				<div class="row">
					<div class="col-lg-9">
                    <?php foreach ($blog as $b) { 
                            if(!empty($b->b_img) &&    file_exists( FCPATH.'assets/uploads/blog/'.$b->b_img ))
                            {
                                $img = thumb(b().'assets/uploads/blog/'.$b->b_img,880,334);
                            }
                            else
                            {
                                $img = thumb(repo().'uploads/no-image.jpg',880,334);

                        	}
						$sl = !empty($b->b_slug)? $b->b_slug:preg_replace('~[^\pL\d]+~u', '-', $b->b_title);
						$slug = b().$sl.'/blog/'.$b->b_id;
                        ?>
						<article class="post">
							

							<div class="post-body">
							    <div class="post-date">
									<span class="day"><?=not(date('d',strtotime($b->b_added)),'-');?></span>
									<span class="month"><?=not(date('M',strtotime($b->b_added)),'-');?></span>
								</div><!-- End .post-date -->

								<h2 class="post-title">
									<a href="<?=$slug;?>"><?=not($b->b_title,'');?></a>
								</h2>
    							    <div class="post-media">
    								<a href="<?=$slug;?>">
    									<img src="<?=$img;?>" alt="Post">
    								</a>
    							</div><!-- End .post-media -->
								

								<div class="post-content">
									<p><?=not(word($b->b_content,150),'');?></p>

									<a href="<?=$slug;?>" class="read-more">Read More <i class="icon-angle-double-right"></i></a>
								</div><!-- End .post-content -->

								<div class="post-meta">
									<span><i class="icon-calendar"></i><?=not(date('F d,Y',strtotime($b->b_added)),'-');?></span>
									<span><i class="icon-user"></i>By <a href="#">Admin</a></span>
			
								</div><!-- End .post-meta -->
							</div><!-- End .post-body -->
						</article><!-- End .post -->
                        <?php } ?>
						

						<!-- <nav class="toolbox toolbox-pagination border-0">
							<ul class="pagination">
								<li class="page-item active">
									<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
								</li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item"><a class="page-link" href="#">5</a></li>
								<li class="page-item"><span class="page-link">...</span></li>
								<li class="page-item">
									<a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
								</li>
							</ul>
						</nav> -->
					</div><!-- End .col-lg-9 -->

					
					<?php $this->load->view('front_end/inc/blog-sidebar'); ?>
				</div><!-- End .row -->
        <?php } else { echo "<p>Coming Soon!</p>"; } ?>
			</div>

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->

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