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
                        <?=form_open('',array('id'=>'b_form','onsubmit'=>'return form_submit()','autocomplete'=>'off'))?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><span id="change_title">Add</span> Brand</h4>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <input type="hidden" name="b_id" id="b_id" value="">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="p_name">Name/Title <span class="star">*</span></label>
                                                    <input type="text" class="form-control" id="b_title" name="b_title" placeholder="Brand Title" autofocus="autofocus" onfocus="this.select()">
                                                    <span class="validation-error" id="b_title_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <label class="control-label">Gender Type <span class="star">*</span></label>
                                                <select class="form-control" name="b_gender_type" id="b_gender_type">
                                                    <option value="">Choose Gender Type</option>
                                                    <option title="Men" value="<?=sec('1');?>">Men</option>
                                                    <option title="Women" value="<?=sec('2');?>">Women</option>
                                                    <option title="Kids" value="<?=sec('3');?>">Kids</option>
                                                    <option title="Unisex" value="<?=sec('4');?>">Unisex</option>
                                                </select>
                                                <span class="validation-error" id="b_gender_type_error"></span>
                                            </div>
                                            <div class="col-xl-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="p_name">SEO Title</label>
                                                    <input type="text" class="form-control" id="b_seo_title" name="b_seo_title" placeholder="Brand Title" autofocus="autofocus" >
                                                    <span class="validation-error" id="b_seo_title_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="p_name">SEO Description</label>
                                                    <textarea class="form-control" id="b_seo_description" name="b_seo_description"  autofocus="autofocus" >
                                                    </textarea>
                                                    <span class="validation-error" id="b_seo_description_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group ">
                                                <div id="b-logo">
                                                    <label class="form-labeltext-muted">Brand Logo <span class="validation-error">*</span></label>
                                                    <input type="file" class="dropify" id="brandlogo-img" name="brandlogo-img" onchange="image_upload('brandlogo-img','b_logo_temp')">
                                                    <input type="hidden" name="b_logo_temp" id="b_logo_temp" value="">
                                                    <span class="validation-error" id="b_logo_temp_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group ">
                                                <div id="b-img">
                                                    <label class="form-labeltext-muted">Brand Image <span class="validation-error">*</span></label>
                                                    <input type="file" class="dropify" id="brand-img" name="brand-img" onchange="image_upload('brand-img','b_img_temp')">
                                                    <input type="hidden" name="b_img_temp" id="b_img_temp" value="">
                                                    <span class="validation-error" id="b_img_temp_error"></span>
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