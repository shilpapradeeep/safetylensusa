<!DOCTYPE html>
<html lang="en">
   <head>
      <?php $this->load->view('front_end/inc/head')?>
      <link rel="stylesheet" type="text/css" href="<?=repo_back_end()?>libs/iziToast-master/dist/css/iziToast.min.css">
   </head>
   <body>
      <div class="page-wrapper">
         <div class="top-notice bg-primary text-white">
            <div class="container text-center">
               <h5 class="d-inline-block mb-0 mr-2">Get Up to <b>40% OFF</b> New-Season Styles</h5>
               <a href="category.html" class="category">MEN</a>
               <a href="category.html" class="category ml-2 mr-3">WOMEN</a>
               <small>* Limited time only</small>
               <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            </div>
            <!-- End .container -->
         </div>
         <!-- End .top-notice -->
         <header class="header">
            <?php
               $this->load->view('front_end/inc/header-top');
               $this->load->view('front_end/inc/header-middle');
               $this->load->view('front_end/inc/header-bottom');
               ?>
         </header>
         <!-- End .header -->
         <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
               <div class="container">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                     <li class="breadcrumb-item active" aria-current="page">Login</li>
                  </ol>
               </div>
               <!-- End .container -->
            </nav>
            <div class="container">
               <div class="sign-in">
               <?=form_open('',array('id'=>'rform','onsubmit'=>'return submit_reg()','autocomplete'=>'off')); ?>
               <div class="row">
                  <div class="col-md-12">
                     <div class="heading">
                        <h2 class="title">Create Your Account</h2>
                     </div>
                     <!-- End .heading -->
                  </div>
                  <?php $this->load->view('front_end/inc/login_form'); ?>
                  <?php form_close();  ?> 
               </div>
               

               </div>

               <div class="otp"></div>
               
            </div>
               
            <!-- End .container -->
            </div>
            <div class="mb-5"></div>
            <!-- margin -->
         </main>
         <!-- End .main -->
         <?php
            $this->load->view('front_end/inc/footer');
            ?>
      </div>
      <!-- End .page-wrapper -->
      <?php
         $this->load->view('front_end/inc/mobile-menu-bar');
         ?>
      <!-- Add Cart Modal -->
      <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
      <?php $this->load->view('front_end/inc/script'); ?>
      <script src="<?= b().'_asset/sign-in.js' ?>"></script>
      <script src="<?=repo_back_end()?>libs/iziToast-master/dist/js/iziToast.min.js"></script>
      <input type="hidden" id="baseurl" value="<?= b() ?>">
      <input type="hidden" id="csrf_token" value="<?=$this->security->get_csrf_token_name();?>">
      <input type="hidden" id="csrf_hash" value="<?=$this->security->get_csrf_hash();?>">
   </body>
</html>