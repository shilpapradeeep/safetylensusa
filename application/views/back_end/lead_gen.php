<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $this->load->view('back_end/include/head');
    ?>
    <style type="text/css">
        input[switch]:checked+label:before {
            left: 3px;
            top: 5px;
        }
        input[switch]:checked+label:after {
            left: 75px;
            top: 9px;
        }
        input[switch=bool]+label:before, input[switch=bool]:checked+label:before, input[switch=default]:checked+label:before {
            top: 5px;
        }
        input[switch]+label:after {
            top: 8px;
        }
        .lead_fields
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
                                <?=form_open('',array('id'=>'lead_form'))?>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Lead Switch</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-4 col-md-12">
                                                        
                                                    </div>
                                                    <div class="col-xl-4 col-md-12 text-center">
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="lead" name="lead" switch="bool" value="1" />
                                                            <label for="lead" data-on-label="Enable"
                                                                    data-off-label="Disable" style="width: 100px;height: 40px"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-12">
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card lead_fields">
                                            <div class="card-header">
                                                <h4 class="card-title">Lead Fields</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-4 col-md-12 text-center">
                                                        <label>Name</label>
                                                        <div class="square-switch">
                                                            
                                                            <input type="checkbox" id="name" name="name" switch="bool" value="1" />
                                                            <label for="name" data-on-label="Enable"
                                                                    data-off-label="Disable" style="width: 100px;height: 40px"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-12 text-center">
                                                        <label>Phone</label>
                                                        <div class="square-switch">
                                                            
                                                            <input type="checkbox" id="phone" name="phone" switch="bool" value="1"/>
                                                            <label for="phone" data-on-label="Enable"
                                                                    data-off-label="Disable" style="width: 100px;height: 40px"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-12 text-center">
                                                        <label>Email</label>
                                                        <div class="square-switch">
                                                            
                                                            <input type="checkbox" id="email" name="email" switch="bool" value="1"/>
                                                            <label for="email" data-on-label="Enable"
                                                                    data-off-label="Disable" style="width: 100px;height: 40px"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="p_name">Lead Title</label>
                                                            <input type="text" class="form-control" id="l_title" name="l_title" placeholder="Lead Title" onchange="title_lead()">
                                                        </div>
                                                    </div>
                                                                                                
                                                    
                                                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                        <div id="nn">
                                                            <label class="form-labeltext-muted">Lead Image</label>
                                                            <input type="file" class="dropify" id="lead-img" name="lead-img" onchange="image_upload('lead-img','lead_img_temp')">
                                                            <input type="hidden" name="lead_img_temp" id="lead_img_temp" value="">
                                                            <span class="validation-error" id="lead_img_temp_error"></span>
                                                        </div>
                                                    </div> 
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">List Entry</h4>
                                            </div>
                                            <div class="card-body" id="list-viewed">
                                               
                                            </div>
                                        </div>

                                       

                                        
                                        <!-- end card -->
                                    </div>
                                    </div>
                                </div>
                                <?form_close()?>
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