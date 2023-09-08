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
                                <?=form_open('',array('id'=>'member_form','onsubmit'=>'return member_submit_form()','autocomplete'=>'off'))?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Add Member</h4>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="m_id" id="m_id" value="">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="p_name">Name<span class="validation-error">*</span></label>
                                                    <input type="text" class="form-control" id="m_name" name="m_name" placeholder="Name" >
                                                    <span class="validation-error" id="m_name_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email<span class="validation-error">*</span></label>
                                                    <input type="text" class="form-control" id="m_email" name="m_email" placeholder="Email" >
                                                    <span class="validation-error" id="m_email_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone Number<span class="validation-error">*</span></label>
                                                    <input type="text" class="form-control" id="m_phone" name="m_phone" placeholder="Phone number" >
                                                    <span class="validation-error" id="m_phone_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div id="nn">
                                                    <label class="form-labeltext-muted">Profile Image<span class="validation-error">*</span></label>
                                                    <input type="file" class="dropify" id="member-img" name="member-img" onchange="image_upload('member-img','profile_img_temp')">
                                                    <input type="hidden" name="profile_img_temp" id="profile_img_temp" value="">
                                                    <span class="validation-error" id="profile_img_temp_error"></span>
                                                </div>
                                            </div>                                             
                                        </div>
                                    </div>
                                </div>

                                <div class="card delivery_add">
                                    <div class="card-header">
                                        <h4 class="card-title">Delivery Address</h4>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <label class="control-label">Address</label>
                                                <input type="text" class="form-control" id="m_address_d" name="m_address_d" placeholder="Address" >
                                            </div>
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                <label class="control-label">District</label>
                                                <input type="text" class="form-control" id="m_district_d" name="m_district_d" placeholder="District" >
                                            </div>
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                <label class="control-label">State</label>
                                                <input type="text" class="form-control" id="m_state_d" name="m_state_d" placeholder="State" >
                                            </div>
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                <label class="control-label">Pin-Number<span class="validation-error">*</span></label>
                                                <input type="text" class="form-control" id="m_pin_number_d" name="m_pin_number_d" placeholder="Pin Number" >
                                                <span class="validation-error" id="m_pin_number_d_error"></span>
                                            </div>                                   
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                <div class="card billing_add">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-12">
                                                <h4 class="card-title">Billing Address</h4>
                                            </div>
                                            <div class="col-xl-7 col-md-12"></div>
                                            <div class="col-xl-2 col-md-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="sua">
                                                    <label class="custom-control-label" for="sua" style="color: #fff">Same us Above</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <label class="control-label">Address</label>
                                                <input type="text" class="form-control" id="m_address_b" name="m_address_b" placeholder="Address" >
                                            </div>
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                <label class="control-label">District</label>
                                                <input type="text" class="form-control" id="m_district_b" name="m_district_b" placeholder="District" >
                                            </div>
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                <label class="control-label">State</label>
                                                <input type="text" class="form-control" id="m_state_b" name="m_state_b" placeholder="State" >
                                            </div>
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                <label class="control-label">Pin-Number<span class="validation-error">*</span></label>
                                                <input type="text" class="form-control" id="m_pin_number_b" name="m_pin_number_b" placeholder="Pin Number" >
                                                <span class="validation-error" id="m_pin_number_b_error"></span>
                                            </div>                                 
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="card">
                                    
                                    <div class="card-body">
                                        
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

                                <?=form_close()?>
                            
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-body" id="list-viewed">

                                        
                                    </div>
                                </div>
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
        <script type="text/javascript">
            $('#sua').change(function(){
                var checked=this.checked;
                if(checked==true)
                    {
                        $('#m_address_b').val($('#m_address_d').val());
                        $('#m_district_b').val($('#m_district_d').val());
                        $('#m_state_b').val($('#m_state_d').val());
                        $('#m_pin_number_b').val($('#m_pin_number_d').val());
                    }
                else
                    {
                        $('#m_address_b').val("");
                        $('#m_district_b').val("");
                        $('#m_state_b').val("");
                        $('#m_pin_number_b').val("");
                    }
            })
        </script>
    </body>

</html>