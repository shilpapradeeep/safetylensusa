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
        <div class="page-header page-header-bg text-left" style="background: 70%/cover #D4E1EA url('assets/front_end/images/page-header-bg.jpg');">
            <div class="container">
                <h1>CANCEL AN ORDER</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=b();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cancel an Order</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="about-section">
            <div class="container">
                <h3>Cancel an Order</h3>
                <p>&#8226;  We accept order cancellation on full refund within 24 hours* of placing it by calling <strong>1-800-496-5168</strong><br>
                &#8226; Oder with status as “shipped “cannot be canceled. But you can return or exchange the item once delivered<br><br>

                Cancellation AFTER 24 hours from placing the order will be accepted with a cancellation cost of 10% restocking fee. For cancellation of prescription eyewear, you will be 
                charged 50% of lens cost also. For Savile Row eyewear, cancellation will be accepted within 24 hours of order placement.
                </p>
                <h3>Questions or Enquiry?</h3>
                <p>Call our Customer Service Department at <strong>1-800-496-5168</strong>
                <br>
                <strong>Hours:</strong><br>
                Monday–Thursday: 8:00 am – 7:00 pm<br>
                Friday: 8:00 am–6:00 pm<br>
                Saturday: 8:00 am–5:00 pm<br>
                </p>
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