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
                                <?=form_open('',array('id'=>'otp_form'))?>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">OTP Switch</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-4 col-md-12">
                                                        
                                                    </div>
                                                    <div class="col-xl-4 col-md-12 text-center">
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="otp" name="otp" switch="bool" value="1" />
                                                            <label for="otp" data-on-label="Enable"
                                                                    data-off-label="Disable" style="width: 100px;height: 40px"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-12">
                                                        
                                                    </div>
                                                    
                                                </div>
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