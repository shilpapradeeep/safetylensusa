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
                        <!-- end page title -->
                        <div id="list-viewed">
                            
                        </div>
                        
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