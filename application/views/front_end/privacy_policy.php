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
                <h1>PRIVACY POLICY (REVISED AUGUST 28, 2019)</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=b();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Privacy Policy </li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="about-section">
            <div class="container">
            <h3>Information we Collect:</h3>
            <p>We collect information from you when you register on our site, place an order, subscribe to our
            newsletter, respond to a survey or fill out a form. When ordering or registering on our site, as appropriate,
            you may be asked to enter your name, e-mail address, mailing address or phone number. You may,
            however, visit our site anonymously.</p>
            <h3>Our Use of Your Information:</h3>
            <p>Any information we collect from you may be used in the following ways:<br>
            <strong>a. To process transactions</strong><br>
            Your information, whether public or private, will not be sold, exchanged, transferred, or given to
            any other company for any reason whatsoever, without your consent, other than for the
            expressed purpose of delivering the purchased product or service requested.<br>
            <strong>b. To send periodic emails</strong><br>
            The email address you provide for order processing will only be used to send you information
            and updates pertaining to your order
            </p>


            <h3>Protecting Your Information:</h3>
            <p>We implement a variety of security measures to maintain the safety of your personal information when
            you place an order or access your personal information.
            </p>


            <h3>Disclosing Information to Outside Parties:</h3>
            <p>We do not sell, trade, or otherwise transfer your personally identifiable information to outside parties.
            This does not include trusted third parties who assist us in operating our website, conducting our business,
            or servicing you, so long as those parties agree to keep this information confidential. We may also release
            your information when we believe such release is appropriate to comply with the law, enforce our site
            policies, or protect our or other’s rights, property, or safety. However, non-personally identifiable visitor
            information may be provided to other parties for marketing, advertising, or other uses.</p>


            <h3>Third-Party Links:</h3>
            <p>Occasionally, at our discretion, we may include or offer third-party products or services on our website
            or one of our blogs. These third-party sites have separate and independent privacy policies. We
            therefore have no responsibility or liability for the content and activities of these linked sites.
            Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.
            </p>


            <h3>Online Privacy Protection:</h3>
            <p>Because we value your privacy, we have taken the necessary precautions to comply with the Online
            Privacy Protection Act. We therefore will not distribute your personal information to outside parties
            without your consent.
            </p>

            <h3>Children’s Online Privacy Protection:</h3>
            <p>We comply with the requirements of COPPA (Children’s Online Privacy Protection Act), and do not
            collect any information from anyone under 13 years of age. Our website, products and services are all
            directed to people who are at least 13 years old or older.
            </p>


            <h3>Your Consent:</h3>
            <p>By using our site, you consent to our privacy policy.</p>


            <h3>Changes to our Privacy Policy:</h3>
            <p>If we decide to change our privacy policy, we will post those changes on this page.
            </p>


            <h3>Contacting Us:</h3>
            <p>If you have any questions regarding this privacy policy, please contact us using the information below:<br>
            <strong>SafetyLensUSA</strong><br>
            12802 Murphy Rd, Suite C,<br>
            Stafford, Texas 77477, USA.<br>
            <strong>info@safetylensusa.com</strong>

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