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
        <div class="page-header page-header-bg text-left" style="background: 70%/cover #D4E1EA url('assets/front_end/images/slider/Slider-Image-02.jpg');">
            <div class="container">
                <h1><span>ABOUT US</span>
                    OUR COMPANY</h1>
                <a href="<?=b('contact-us');?>" class="btn btn-dark">Contact</a>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=b();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="about-section">
            <div class="container">
                <h2 class="subtitle">About SafetyLensUSA.com</h2>
                <p>SafetyLensUSA.com is excited to expand its services directly to retail customers. Our wide selection of frames and prescription lenses are available for purchase online at reasonable prices beating those of our competitors. Our "Grade A" quality lenses can also be a perfect fit on your own frame. In offering to meet your vision needs, the CEO of LensRxUSA.com stands behind his 30 years of optical industry experience to guarantee the quality and service of our products.</p>
                <p>Our Single-Vision, Bi-Focal, Tri-Focal and Progressive lenses are available in plastic, polycarbonate, 1.67 High Index or 1.74 High Index. We feature Transition, Photochromic and Polarized lenses. Most lenses can be shipped out on the same day of order received, for customer receipt within 4 days in the U.S.</p>

                <p >The use of digital technology, for single-vision and "no-line" progressive lenses, enables us to customize lenses to each frame. This will provide distortion-free side views and a larger effective reading area, in delivering optimal vision for you!</p>
            </div><!-- End .container -->
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