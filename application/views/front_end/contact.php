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
            
        </div><!-- End .page-header -->

        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=b();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
      
            	<div class="row">
					<div class="col-md-8">
						<h2 class="light-title">Write <strong>Us</strong></h2>

                        <?=form_open('',array('id'=>'cform','onsubmit'=>'return submit_contact()','autocomplete'=>'off')); ?>
                        
							<div class="form-group required-field">
								<label for="cname">Name</label>
								<input type="text" class="form-control" id="cname" name="cname" >
                                <div id="cname_error" class="invalid-feedback"></div>
							</div><!-- End .form-group -->

							<div class="form-group required-field">
								<label for="cemail">Email</label>
								<input type="text" class="form-control" id="cemail" name="cemail" >
                                <div id="cemail_error" class="invalid-feedback"></div>
							</div><!-- End .form-group -->

							<div class="form-group required-field">
								<label for="cphone">Phone Number</label>
								<input type="text" class="form-control" id="cphone" name="cphone">
                                <div id="cphone_error" class="invalid-feedback"></div>
							</div><!-- End .form-group -->
                            <div class="form-group required-field">
								<label for="csubject">Subject</label>
								<input type="text" class="form-control" id="csubject" name="csubject">
                                <div id="csubject_error" class="invalid-feedback"></div>
							</div><!-- End .form-group -->

							<div class="form-group required-field">
								<label for="cmessage">Message</label>
								<textarea cols="30" rows="1" id="cmessage" class="form-control" name="cmessage" ></textarea>
                                <div id="cmessage_error" class="invalid-feedback"></div>
							</div><!-- End .form-group -->

							<div class="form-footer">
                                <!-- <div align="center" class="col-md-12">
                                    
                                </div> -->
                                <span style="display: none;" id="spin"><i class="fa fa-2x fa-spin fa-spinner"></i></span>
								<button id="form-btn" type="submit" class="btn btn-primary">Submit</button>
							</div><!-- End .form-footer -->
                     <?=form_close();  ?> 
					</div><!-- End .col-md-8 -->

					<div class="col-md-4">
						<h2 class="light-title">Contact <strong>Details</strong></h2>

						<div class="contact-info">
							<div>
                                <i class="fa fa-address-card" aria-hidden="true"></i>
								<p>12802 Murphy Rd, Suite C,</p>
								<p>Stafford, Texas 77477, USA</p>
							</div>
							<div>
								<i class="icon-mobile"></i>
								<p><a href="tel:18004965168">1-800-496-5168</a></p>
							</div>
							<div>
								<i class="icon-mail-alt"></i>
								<p><a href="mailto:info@safetylensusa.com">info@safetylensusa.com</a></p>
							</div>
						</div><!-- End .contact-info -->
					</div><!-- End .col-md-4 -->
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
<script type="text/javascript">
function submit_contact()
{
    $('#form-btn').hide();
    $('#spin').show();
    $('.invalid-feedback').hide();
    $('.invalid-feedback').html("");
    var base = $('#base').val();
    $.ajax({
        url : base+'submit_contact',
        type : 'post',
        data : $('#cform').serialize(),
        dataType : 'json',
        success:function(data)
        {
            console.log(data);
            $('#form-btn').show();
            $('#spin').hide();
            if(data.res==1)
            {
                success(data.msg);
                $('#cform').find("input[type=text],textarea").val("");

                
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