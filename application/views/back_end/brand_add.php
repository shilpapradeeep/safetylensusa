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
                        <?=form_open('',array('id'=>'blog_form','onsubmit'=>'return blog_submit_form()','autocomplete'=>'off'))?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><span id="change_title">Add</span> Blog</h4>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <input type="hidden" name="b_id" id="b_id" value="">
                                            <div class="col-xl-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="p_name">Blog Title<span class="star">*</span></label>
                                                    <input type="text" class="form-control" id="b_title" name="b_title" placeholder="Product Name" autofocus="autofocus" onfocus="this.select()">
                                                    <span class="validation-error" id="b_title_error"></span>
                                                </div>
                                            </div>
                                                                                        
                                            <div class="col-xl-12 col-md-12 mb-2">
                                                <label for="p_offer">Blog content</label>
                                                <div class="summernote" name="b_content" id="b_content"></div>
                                                <span class="validation-error" id="b_content_error"></span>
                                            </div> 
                                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div id="nn">
                                                    <label class="form-labeltext-muted">Blog Image<span class="validation-error">*</span></label>
                                                    <input type="file" class="dropify" id="blog-img" name="blog-img" onchange="image_upload('blog-img','blog_img_temp')">
                                                    <input type="hidden" name="blog_img_temp" id="blog_img_temp" value="">
                                                    <span class="validation-error" id="blog_img_temp_error"></span>
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