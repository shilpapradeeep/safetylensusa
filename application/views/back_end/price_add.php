<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $this->load->view('back_end/include/head');
    ?>
    <style type="text/css">
        /*.remove_img_btn
        {
            display: none;
        }*/
        .validation-error
        {
            color: red;
        }
        #view_discount
        {
            display: none;
        }
    </style>
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <?php
    $this->load->view('back_end/include/header');
    ?>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <?php
            $this->load->view('back_end/include/side_menu');
            ?>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <?php
                        $this->load->view('back_end/include/breadcrumb');
                        ?>
                    </div>
                </div>
                <?=form_open('',array('id'=>'p_form','onsubmit'=>'return form_submit()','autocomplete'=>'off'))?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><span id="change_title">Add</span> Price</h4>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <input type="hidden" name="t_id" id="t_id" value="<?=!empty($price[0]->t_id)?sec($price[0]->t_id):''; ?>">
                                        <div class="col-xl-4 col-md-4">
                                            <div class="form-group">
                                                <label for="t_charge">Tint Charge <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="t_charge" name="t_charge" placeholder="Tint Charge" autofocus="autofocus" onfocus="this.select()" value="<?=!empty($price[0]->t_charge)?$price[0]->t_charge:''; ?>">
                                                <span class="validation-error" id="t_charge_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-4">
                                            <div class="form-group">
                                                <label for="t_cost">Tint Cost <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="t_cost_title" name="t_cost_title" placeholder="Tint Cost" autofocus="autofocus" value="<?=!empty($price[0]->t_cost_title)?$price[0]->t_cost_title:''; ?>">
                                                <span class="validation-error" id="t_cost_title_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4">
                                            <div class="form-group">
                                                <label for="t_lens_charge">Polarised Lens Charge <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="t_lens_charge" name="t_lens_charge" placeholder="Polarised Lens Charge" autofocus="autofocus" value="<?=!empty($price[0]->t_lens_charge)?$price[0]->t_lens_charge:''; ?>">
                                                <span class="validation-error" id="t_lens_charge_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4">
                                            <div class="form-group">
                                                <label for="t_lens_cost">Polarised Lens Cost <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="t_lens_cost" name="t_lens_cost" placeholder="Polarised Lens Cost" autofocus="autofocus" value="<?=!empty($price[0]->t_lens_cost)?$price[0]->t_lens_cost:''; ?>">
                                                <span class="validation-error" id="t_lens_cost_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4">
                                            <div class="form-group">
                                                <label for="t_transition_charge">Transition Charge <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="t_transition_charge" name="t_transition_charge" placeholder="Transition Charge" autofocus="autofocus" value="<?=!empty($price[0]->t_transition_charge)?$price[0]->t_transition_charge:''; ?>">
                                                <span class="validation-error" id="t_transition_charge_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4">
                                            <div class="form-group">
                                                <label for="t_transition_cost">Transition Cost <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="t_transition_cost" name="t_transition_cost" placeholder="Transition Cost" autofocus="autofocus" value="<?=!empty($price[0]->t_transition_cost)?$price[0]->t_transition_cost:''; ?>">
                                                <span class="validation-error" id="t_transition_cost_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <label for="t_delivery_charge">Admin Delivery Charge <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="t_delivery_charge" name="t_delivery_charge" placeholder="Admin Delivery Charge" autofocus="autofocus" value="<?=!empty($price[0]->t_delivery_charge)?$price[0]->t_delivery_charge:''; ?>">
                                                <span class="validation-error" id="t_delivery_charge_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <label for="t_additional_charge">Additional Charge <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="t_additional_charge" name="t_additional_charge" placeholder="Additional Charge" autofocus="autofocus" value="<?=!empty($price[0]->t_additional_charge)?$price[0]->t_additional_charge:''; ?>">
                                                <span class="validation-error" id="t_additional_charge_error"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <div class="text-center">
                                                <div class="btn-div">
                                                    <button type="submit" class="btn btn-primary my-4" id=""><span class="submit">Submit</span></button>
                                                    <button type="button" class="btn btn-warning reset">Cancel</button>
                                                </div>
                                                <div align="center" class="col-md-12">
                                                    <span style="display: none;" id="spin"><i class="fa fa-2x fa-spin fa-spinner"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <!-- end card -->
                        </div>
                    </div>
                </div>
                <?=form_close()?>
                <!-- end page title -->

                <div id="list-viewed"></div>


            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



        <?php
        $this->load->view('back_end/include/footer');
        ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<?php
$this->load->view('back_end/include/script');
?>
<script type="text/javascript">

</script>
</body>

</html>