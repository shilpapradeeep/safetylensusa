<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front_end/inc/head')?>
    <style type="text/css">
 
.product-single-container
{
    margin-top:25px;
}
.product-single-details .product-title {
   text-align:center !important;
    font-size: 1.7rem;
    padding:10px 0px;
    font-weight:400;
}
.product-default 
        {
            padding:10px;
               /*border: 1px #333 solid;*/
   box-shadow: 0 1px 9px 0 rgb(0 0 0 / 5%);
        }
        .product-default:hover figure {
     box-shadow: none !important;
}
       .product-default:hover {
     box-shadow: 0 5px 25px 0 rgb(0 0 0 / 8%);
}
.product-default a {
    
white-space: unset; 
    /* overflow: hidden;
    text-overflow: ellipsis; */
}
.table.table-totals tbody tr:first-child td {
    padding-top: 1.6rem;
    vertical-align: middle;
    padding-right: 10px;
}
.table.table-totals tbody tr td {
    padding-top: 1.6rem;
    vertical-align: middle;
    padding-right: 10px;
}
.select.form-control-sm
{
    margin-right:10px
}
.cart-prescription {
   
    padding:0rem 11.8rem ;
  
}
.cart-prescription .form-group-sm {
    max-width: 15rem;
    margin-bottom: .9rem;
}
.form-container {
    max-width: 730px;
    margin: 0 auto;
}
    </style>
</head>
<body>
<div class="page-wrapper">
<?php
       ?>

    <header class="header">

        <?php
        $this->load->view('front_end/inc/header-top');
        $this->load->view('front_end/inc/header-middle');
        $this->load->view('front_end/inc/header-bottom');
        ?>



    </header><!-- End .header -->

    <main class="main">
			<div class="container">
           <?=form_open('',array("id"=>"cartForm" )) ;?>
				<div class="product-single-container product-single-default">
					<div class="row" style="text-align:center">
						<div class="col-md-12 product-single-gallery">
                        <div class="heading mb-4">
					<h2 class="title"><?=$pData[0]->pr_title;?></h2>
					
				<ul class="checkout-progress-bar">
					<li >
						<span>Lens</span>
					</li>
					<li class="active">
						<span>Your Prescription</span>
					</li>
				</ul>

                </div>
							
						</div><!-- End .product-single-gallery -->

						<div class="col-md-12">
                        <div class="cart-summary">
							<h3>Your Prescription</h3>
                            <div class="form-container">

							<table class="table table-totals">
								<tbody>
									<tr>
										<td align="right">Right (OD)</td>
										<td>
                                            <div class="form-group form-group-sm">
                                            
                                            <div class="select-custom">
                                                <select class="form-control form-control-sm" id="right_od_sphere" name="right_od_sphere">
                                                <option value="" >Sphere</option>
                                                <?php
                                                for($i=600;$i>=-975;$i=$i-25)
                                                {
                                                    if($i==0)
                                                    echo '<option  value="'.sec($i).'">'.$i.'</option>';
                                                    elseif($i>0)
                                                    echo '<option value="'.sec($i).'">+'.$i.'</option>';
                                                    else
                                                    echo '<option value="'.sec($i).'">'.$i.'</option>';
                                                }
                                                ?>
                                                
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->
                                    </td>
                                        <td>
                                        <div class="form-group form-group-sm">
                                            
                                            <div class="select-custom">
                                            <select class="form-control form-control-sm" name="right_od_cylinder" id="right_od_cylinder">
                                                <option value="">Cylinder</option>
                                                <?php
                                                for($i=600;$i>=-600;$i=$i-25)
                                                {
                                                    if($i==0)
                                                    echo '<option  value="'.sec($i).'">'.$i.'</option>';
                                                    elseif($i>0)
                                                    echo '<option value="'.sec($i).'">+'.$i.'</option>';
                                                    else
                                                    echo '<option value="'.sec($i).'">'.$i.'</option>';
                                                }
                                                ?>
                                                
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->
                                        </td>
                                        <td>
                                        <div class="form-group form-group-sm">
                                            
                                            <div class="select-custom">
                                            <select name="right_od_axis" id="right_od_axis" class="form-control form-control-sm">
                                                <option value="">Axis</option>
                                                <?php
                                                for($i=1;$i<=180;$i++)
                                                {
                                                    
                                                    echo '<option value="'.sec($i).'">'.$i.'</option>';
                                                }
                                                ?>
                                                
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->
                                        </td>
                                        <?php if(in_array(4,$lt_fields))
                                        {
                                            ?>
                                            <td>
                                        <div class="form-group form-group-sm">
                                            
                                            <div class="select-custom">
                                            <select name="right_od_add" id="right_od_add" class="form-control form-control-sm">
                                                <option value="">Add</option>
                                                <?php
                                                for($i=100;$i<=325;$i=$i+25)
                                                {
                                                    
                                                    echo '<option value="'.sec($i).'">+'.$i.'</option>';
                                                }
                                                ?>
                                                
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->
                                        </td>

                                            <?php
                                        }
                                        ?>
									</tr>

									<tr>
										<td align="right">Left (OS)</td>
										<td>
                                            <div class="form-group form-group-sm">
                                            
                                            <div class="select-custom">
                                                <select class="form-control form-control-sm" name="left_os_sphere" id="left_os_sphere">
                                                <option value="">Sphere</option>
                                                <?php
                                                for($i=600;$i>=-975;$i=$i-25)
                                                {
                                                    if($i==0)
                                                    echo '<option  value="'.sec($i).'">'.$i.'</option>';
                                                    elseif($i>0)
                                                    echo '<option value="'.sec($i).'">+'.$i.'</option>';
                                                    else
                                                    echo '<option value="'.sec($i).'">'.$i.'</option>';
                                                }
                                                ?>
                                                
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->
                                    </td>
                                    <td>
                                        <div class="form-group form-group-sm">
                                            
                                            <div class="select-custom">
                                            <select name="left_os_cylinder" id="left_os_cylinder" class="form-control form-control-sm">
                                                <option value="">Cylinder</option>
                                                <?php
                                                for($i=600;$i>=-600;$i=$i-25)
                                                {
                                                    if($i==0)
                                                    echo '<option  value="'.sec($i).'">'.$i.'</option>';
                                                    elseif($i>0)
                                                    echo '<option value="'.sec($i).'">+'.$i.'</option>';
                                                    else
                                                    echo '<option value="'.sec($i).'">'.$i.'</option>';
                                                }
                                                ?>
                                                
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->
                                        </td>
                                        <td>
                                        <div class="form-group form-group-sm">
                                            
                                            <div class="select-custom">
                                            <select id="left_os_axis" name="left_os_axis" class="form-control form-control-sm">
                                                <option value="">Axis</option>
                                                <?php
                                                for($i=1;$i<=180;$i++)
                                                {
                                                    
                                                    echo '<option value="'.sec($i).'">'.$i.'</option>';
                                                }
                                                ?>
                                                
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->
                                        </td>
                                         <?php if(in_array(4,$lt_fields))
                                        {
                                            ?>
                                            <td>
                                        <div class="form-group form-group-sm">
                                            
                                            <div class="select-custom">
                                            <select id="left_os_add" name="left_os_add" class="form-control form-control-sm">
                                                <option value="">Add</option>
                                                <?php
                                                for($i=100;$i<=325;$i=$i+25)
                                                {
                                                    
                                                    echo '<option value="'.sec($i).'">+'.$i.'</option>';
                                                }
                                                ?>
                                                
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->
                                        </td>

                                            <?php
                                        }
                                        ?>
									</tr>
								</tbody>
								<!-- <tfoot>
									<tr>
										<td>Order Total</td>
										<td>$17.90</td>
									</tr>
								</tfoot> -->
							</table>
                        </div>
                        <div class="row" style="text-align:center">
                            <div class="col-md-12" >
                                <h3 style="padding:20px">PD ( Pupillary Distance)</h3>
                            </div>
                        
                            <div class="col-md-12" style="margin-top:15px;margin-bottom:15px">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-2">
                                        <input type="radio" name="pd_values" value="1" id="radio_one_pd"> <label for="radio_one_pd" >One</label>
                                    </div>
                                    <div class="col-md-2">
                                        
                                    <input type="radio" name="pd_values" value="2" id="radio_two_pd"> <label for="radio_two_pd" >Two</label>
                                    </div>
                                    <div class="col-md-2">
                                        
                            <input type="radio" name="pd_values" value="0" id="radio_none_pd"> <label for="radio_none_pd" >None</label>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>



                            </div>
                       
    <div class="col-md-12 pd-div" style="display:none">
        <div class="form-container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3 pd-one" align="center">
                  <select name="pd_one" id="pd_one" class="form-control form-control-sm" style="width:100%">
            			<option value="">PD</option>
                        <?php
                            for($i=40;$i<=80;$i++)
                            {
                                
                                echo '<option value="'.sec($i).'">'.$i.'</option>';
                            }
                            ?>
            		</select>
                </div>
                <div class="col-md-3 pd-two">
                    <select name="pd_twor" class="form-control form-control-sm"  id="pd_twor" style="width:100%">
						<option value="">PD-R</option>
                        <?php
                            for($i=20;$i<=80;$i++)
                            {
                                
                                echo '<option value="'.sec($i).'">'.$i.'</option>';
                            }
                            ?>
					</select>
                </div>
                <div class="col-md-3 pd-two">
                    <select name="pd_twol" class="form-control form-control-sm"  id="pd_towl" style="width:100%">
                        <option value="">PD-L</option>
                        <?php
                            for($i=20;$i<=80;$i++)
                            {
                                
                                echo '<option value="'.sec($i).'">'.$i.'</option>';
                            }
                            ?>
                    </select>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="text-align:center;margin-top:30px">
    <div class="col-md-4">
    <a class="btn btn-dark add-cart " title="Sample Prescription" href="#" data-toggle="modal" data-target="#modal1">Sample Prescription </a>
                                                
    </div>
    <div class="col-md-4">
    <a class="btn btn-dark add-cart " title="pd Details" href="#" data-toggle="modal" data-target="#modal2">PD Details </a>
                                                
    </div>
    <div class="col-md-4">
    <a class="btn btn-dark add-cart " title="To Get a Perfect PD Goto PupilsDistance.com"  href="https://pupilsdistance.com/" target="_blank">Goto PupilsDistance.com</a>
                                          
    </div>
    
</div>

<div class="row" style="text-align:center;margin-top:30px">
<div class="col-md-12" >
<h3 style="padding:20px">Choose other options</h3>
</div>
    <div class="col-md-3">
        <input type="hidden" id="additional_charge" name="additional_charge" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_additional_charge)? sec($price_settings[0]->t_additional_charge):'';?>">
         <input type="hidden" id="delivery_charge" name="delivery_charge" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_delivery_charge)? sec($price_settings[0]->t_delivery_charge):'';?>">
        <input type="hidden" id="tint_type_price" name="tint_type_price" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_charge)? sec($price_settings[0]->t_charge):'';?>">
         <input type="hidden" id="tint_type_cost" name="tint_type_cost" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_cost_title)? sec($price_settings[0]->t_cost_title):'';?>">
    <select name="tint_type" id="tint_type" class="form-control form-control-sm"  style="width:100%">
              <option value="">Tint Type <?=!empty($price_settings) && !empty($price_settings[0]->t_charge)?'($'.$price_settings[0]->t_charge.')':'';?></option>
              <?php if(!empty($tint_type))
              {
                foreach($tint_type as $t)
                {
                    echo '<option value="'.sec($t->tt_id).'">'.$t->tt_name.'</option>';
                }
              }
              ?>
			  </select>                                           
    </div>
    <div class="col-md-3">
    <select name="tint_color"  id="tint_color" class="form-control form-control-sm"  style="width:100%">
				<option value="">Tint Color</option>
				<option>Grey</option>
				<option>Brown</option>	
				<option>Blue</option>
				<option>Green</option>
				<option>Pink</option>				
            </select>                                           
    </div>
    <div class="col-md-3">
          <input type="hidden" id="polarised_lens_price" name="polarised_lens_price" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_lens_charge)? sec($price_settings[0]->t_lens_charge):'';?>">
           <input type="hidden" id="polarised_lens_cost" name="polarised_lens_cost" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_lens_cost)? sec($price_settings[0]->t_lens_cost):'';?>">
    <select name="polarised_lens" id="polarised_lens" class="form-control form-control-sm"  style="width:100%">
              <option value="">Polarized Lens <?=!empty($price_settings) && !empty($price_settings[0]->t_lens_charge)?'($'.$price_settings[0]->t_lens_charge.')':'';?></option>
			  <?php if(!empty($polarized_lens))
              {
                foreach($polarized_lens as $t)
                {
                    echo '<option value="'.sec($t->pl_id).'">'.$t->pl_name.'</option>';
                }
              }
              ?>
				              </select>                                     
    </div>
    <div class="col-md-3">
        <input type="hidden" id="transition_price" name="transition_price" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_transition_charge)? sec($price_settings[0]->t_transition_charge):'';?>">
        <input type="hidden" id="transition_cost" name="transition_cost" value="<?=!empty($price_settings) && !empty($price_settings[0]->t_transition_cost)? sec($price_settings[0]->t_transition_cost):'';?>">
    <select name="transition"  id="transition" class="form-control form-control-sm"  style="width:100%">
              <option value="">Transition <?=!empty($price_settings) && !empty($price_settings[0]->t_transition_charge)?'($'.$price_settings[0]->t_transition_charge.')':'';?></option>
			  <?php if(!empty($transitions))
              {
                foreach($transitions as $t)
                {
                    echo '<option value="'.sec($t->tr_id).'">'.$t->tr_name.'</option>';
                }
              }
              ?>
				              </select>                                 
    </div>
    <?php
    if(!empty($lens_options))
    {
        foreach($lens_options as $l)
        {
            ?>
                <div class="col-md-3">
                    <div class="form-group form-group-custom-control">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" id="lo_cost_<?=$l->lo_id;?>"  name="lens_opt_cost[<?=$l->lo_id;?>]" value="<?=sec($l->lo_cost);?>">
                            <input name="lens_opt[<?=$l->lo_id;?>]" type="checkbox" class="custom-control-input" id="lo<?=$l->lo_id;?>" value="<?=sec($l->lo_price);?>">
                            <label align="left" class="custom-control-label" for="lo<?=$l->lo_id;?>"><?=$l->lo_name;?> ($<?=$l->lo_price;?>)</label>
                        </div><!-- End .custom-checkbox -->
                    </div>
                </div>
            <?php
        }
    }
    ?>
   
    
</div>
 <div class="row" style="text-align:center">
    <div class="col-md-12" >
        <h3 style="padding:20px">Special Instruction</h3>
    </div>
    <div class="col-md-12">
        <textarea class="form-control" id="sp_in" name="sp_in" style="max-width:100%"></textarea>
    </div>
</div>
<div class="row" style="text-align:center">
    <input type="hidden" id="pr_id"  name="pr_id" value="<?=$p_pr_id;?>">
    <input type="hidden" id="pv_id"  name="pv_id" value="<?=$p_size;?>">
    <input type="hidden" id="lt_id"  name="lt_id"  value="<?=$p_lens_type;?>">
    <input type="hidden" id="o_id"  name="o_id"  value="<?='';?>">
    <input type="hidden" id="p_qty"  name="p_qty"  value="<?=$p_qty;?>">
    <input type="hidden" id="lm_id"  name="lm_id"  value="<?=$lens_materials;?>">
    <input type="hidden" id="no_prec"  name="no_prec"  value="false">
    
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <div class="checkout-methods">
            <a href="javascript:void(0)" class="btn btn-block btn-sm btn-primary">Go to Back</a>
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="checkout-methods">
            <a href="javascript:void(0)" class="btn btn-block btn-sm btn-primary">Go to Instruction of Option</a>
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="checkout-methods">
            <button  type="submit" class="add-to-cart btn btn-block btn-sm btn-primary">Add to cart</a>
            
        </div>
    </div>
</div>

</div>
                         
						

						</div><!-- End .product-single-details -->
					</div><!-- End .row -->
				</div><!-- End .product-single-container -->
<?=form_close();?>
			

				
			</div><!-- End .container -->
		</main><!-- End .main -->
        <div class="modal" tabindex="-1" role="dialog" id="modal1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sample Prescription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?=base_url('assets/front_end/images/lens-image11.png');?>" width="100%">
            </div>
           
            </div>
        </div>
        </div>


        <div class="modal" tabindex="-1" role="dialog" id="modal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PD Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?=base_url('assets/front_end/images/lens-image.png');?>" width="100%">
            </div>
           
            </div>
        </div>
        </div>
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
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="<?=base_url().'assets/front_end/vendor/slider/src/jquery.exzoom.js';?>"></script>
<link href="<?=base_url().'assets/front_end/vendor/slider/src/jquery.exzoom.css';?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript">

      $('.container').imagesLoaded( function() {
      $("#exzoom").exzoom({
            autoPlay: false,
        });
      $("#exzoom").removeClass('hidden')
    });

</script>
<script src="<?=repo_fr()?>js/custom.js"></script>
<script>
$(document).ready(function(){

    $("input:radio").change(function(){
    var v = $(this).val();
   if(v>0)
   {
       $('.pd-div').show();
       if(v==1)
       {
        $('.pd-one').show();
        $('.pd-two').hide();
       }
       else{
        $('.pd-two').show();
        $('.pd-one').hide();
       }
   }
   else{
        $('.pd-div').hide();
        $('.pd-two').hide();
        $('.pd-one').hide();
   }
});
})</script>
</body>

</html>