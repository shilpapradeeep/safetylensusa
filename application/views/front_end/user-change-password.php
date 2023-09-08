<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
    <link rel="stylesheet" type="text/css" href="<?=repo_back_end()?>libs/iziToast-master/dist/css/iziToast.min.css">
  
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
                <h1><span>ABOUT US</span>
                    OUR COMPANY</h1>
                <a href="contact.html" class="btn btn-dark">Contact</a>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=b();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
				<div class="row">
					<div class="col-lg-9 order-lg-last dashboard-content">
						<h2>Change Password</h2>
                        <?=form_open('',array('id'=>'fform','onsubmit'=>'return submit_password()','autocomplete'=>'off')); ?>
                        <input type="hidden" name="user_id" id="user_id" value="<?=$this->session->userdata['l_uid']['l_id'];?>">
                            <div class="form-group required-field">
                                <label for="reset-email">Current Password</label>
                                <input type="password" class="form-control" id="cu_password" name="cu_password" >
                                <div id="cu_password_error" class="invalid-feedback"></div>
                            </div><!-- End .form-group -->
                            <div class="form-group required-field">
                                <label for="reset-email">Current Password</label>
                                <input type="password" class="form-control" name="upassword" id="upassword" >
                                <div id="upassword_error" class="invalid-feedback"></div>
                            </div><!-- End .form-group -->
                            <div class="form-group required-field">
                                <label for="reset-email">Current Password</label>
                                <input type="password" class="form-control" name="cpassword" id="cpassword" >
                                <div id="cpassword_error" class="invalid-feedback"></div>
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" id="form-btn" class="btn btn-primary">Reset My Password</button>
                            </div><!-- End .form-footer -->
                        <?=form_close();?>
                       
						
					</div><!-- End .col-lg-9 -->

					
					
					<?php $this->load->view('front_end/inc/account-sidebar'); ?>
				</div><!-- End .row -->
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
<script src="<?=repo_back_end()?>libs/iziToast-master/dist/js/iziToast.min.js"></script>
<input type="hidden" id="baseurl" value="<?= b() ?>">
    <input type="hidden" id="csrf_token" value="<?=$this->security->get_csrf_token_name();?>">
    <input type="hidden" id="csrf_hash" value="<?=$this->security->get_csrf_hash();?>">
    <script type="text/javascript">
        function submit_password()
        {
            
            $('#form-btn').hide();
            $('#spin').show();
            $('.invalid-feedback').hide();
            $('.invalid-feedback').html("");
            var base=$('#baseurl').val();
            var token=$('#csrf_token').val();
            var hash=$('#csrf_hash').val();
            

            var lc = new FormData();
            lc.append(token,hash);
            lc.append('user_id',$('#user_id').val());
            lc.append('cu_password',$('#cu_password').val());
            lc.append('upassword',$('#upassword').val());
            lc.append('cpassword',$('#cpassword').val());

            $.ajax({
                url : base+'submit_user_password',
                type : 'post',
                data : lc,
                dataType : 'json',
                processData: false,
                contentType: false,
                cache: false,
                success:function(data)
                {
                    //alert(data);
                    
                    console.log(data);
                    $('#form-btn').show();
                    $('#spin').hide();
                    if(data.res==1)
                    {
                        success(data.msg);

                        setInterval(function(){ window.location.href=base+'account'; }, 2000);
                        
                        
                    }
                    else
                    {
                        if($.isEmptyObject(data.errors))
                        {
                            if(data.type==1)
                            {
                                $('.invalid-feedback').show();
                                $('#username_error').html(data.msg);    
                            }
                            //error(data.msg);
                        }else{
                            $('.invalid-feedback').show();
                            for(var key in data.errors)
                            {
                                var v = data.errors[key];
                                $('#'+key+'_error').html(v);

                            }
                        }
                    }
                }
            });
            return false;
        }
    </script>
</body>

</html>