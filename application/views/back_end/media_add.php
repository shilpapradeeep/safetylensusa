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
                        <?=form_open('',array('id'=>'media_form','onsubmit'=>'return media_submit_form()','autocomplete'=>'off'))?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><span id="change_title">Add</span> Media</h4>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <input type="hidden" name="m_id" id="m_id" value="">
                                            <div class="col-xl-6 col-md-12">
                                                <label class="control-label">Media Type<span class="star">*</span></label>
                                                <select class="form-control select2" name="m_type" id="m_type">
                                                    <option>Select</option>
                                                </select>
                                                <span class="validation-error" id="m_type_error"></span>
                                            </div>
                                                                                        
                                            <div class="col-xl-6 col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="p_name">Website URL</label>
                                                    <input type="text" class="form-control" id="m_url" name="m_url" placeholder="Website URL Link">
                                                    <span class="validation-error" id="m_url_error"></span>
                                                </div>
                                            </div> 
                                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <input type="hidden" name="max_file" id="max_file" value="0">
                                                <input type="hidden" name="file_height" id="file_height" value="0">
                                                <input type="hidden" name="file_width" id="file_width" value="0">
                                                <div id="nn">
                                                    <label class="form-labeltext-muted">Image <span id='f_size_v'></span><span class="validation-error">*</span></label>
                                                    <input type="file" class="dropify" id="media-img" name="media-img" >
                                                    <input type="hidden" name="media_img_temp" id="media_img_temp" value="">
                                                    <input type="hidden" name="c_f_c" id="c_f_c" value="0">
                                                    <span class="validation-error" id="media_img_temp_error"></span>
                                                </div>
                                                <div class="row" id="m_f_view">
                                                    
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