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
                                    <h4 class="card-title"><span id="change_title">Add</span> Home Banner</h4>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <input type="hidden" name="b_id" id="b_id" value="<?=!empty($banner[0]->b_id)?sec($banner[0]->b_id):''; ?>">
                                        <div class="col-xl-12 col-md-12">
                                            <div class="form-group">
                                                <label for="b_title1">Home Banner Title1 <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="b_title1" name="b_title1" placeholder="Enter Home Banner Title1" autofocus="autofocus" onfocus="this.select()" value="<?=!empty($banner[0]->b_title1)?$banner[0]->b_title1:''; ?>">
                                                <span class="validation-error" id="b_title1_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-md-12">
                                            <div class="form-group">
                                                <label for="t_cost">Home Banner Title2 <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="b_title2" name="b_title2" placeholder="Enter Home Banner Title2" autofocus="autofocus" value="<?=!empty($banner[0]->b_title2)?$banner[0]->b_title2:''; ?>">
                                                <span class="validation-error" id="b_title2_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <div class="form-group">
                                                <label for="b_title3">Home Banner Title3 <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="b_title3" name="b_title3" placeholder="Enter Home Banner Title3" autofocus="autofocus" value="<?=!empty($banner[0]->b_title3)?$banner[0]->b_title3:''; ?>">
                                                <span class="validation-error" id="b_title3_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <div class="form-group">
                                                <label for="b_title4">Home Banner Title4 <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="b_title4" name="b_title4" placeholder="Enter Home Banner Title4" autofocus="autofocus" value="<?=!empty($banner[0]->b_title4)?$banner[0]->b_title4:''; ?>">
                                                <span class="validation-error" id="b_title4_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <div class="form-group">
                                                <label for="b_title5">Home Banner Title5 <span class="star">*</span></label>
                                                <input type="text" class="form-control" id="b_title5" name="b_title5" placeholder="Enter Home Banner Title5" autofocus="autofocus" value="<?=!empty($banner[0]->b_title5)?$banner[0]->b_title5:''; ?>">
                                                <span class="validation-error" id="b_title5_error"></span>
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <div class="text-cEnter Home">
                                                <div class="btn-div">
                                                    <button type="submit" class="btn btn-primary my-4" id=""><span class="submit">Submit</span></button>
                                                    <button type="button" class="btn btn-warning reset">Cancel</button>
                                                </div>
                                                <div align="cEnter Home" class="col-md-12">
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