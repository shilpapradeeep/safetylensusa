<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $this->load->view('back_end/include/head');
    ?>
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
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Change Password</h4>
                                    </div>
                                    <div class="card-body">
                                        <?=form_open('',array('id'=>'change_pwd_form','onsubmit'=>'return change_pwd_submit_form()','autocomplete'=>'off'))?>
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="p_name">Current Password</label>
                                                    <input type="password" class="form-control" id="current_pwd" name="current_pwd" placeholder="Current Password" >
                                                    <span class="validation-error" id="current_pwd_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">New Password</label>
                                                    <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="New Password" >
                                                    <span class="validation-error" id="new_pwd_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Confirm Password</label>
                                                    <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="Confirm Password" >
                                                    <span class="validation-error" id="confirm_pwd_error"></span>
                                                </div>
                                            </div>
                                            
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
                                        <?=form_close()?>
                                    </div>
                                </div>

                               
                                <!-- end card -->
                                
                            </div>
                            </div>
                        </div>

                        <!-- end page title -->

                        
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
        
    </body>

</html>