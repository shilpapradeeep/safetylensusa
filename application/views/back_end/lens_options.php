<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $this->load->view('back_end/include/head');
    ?>
    <style type="text/css">
        .page-title-box 
        {
           padding-bottom: 6px;
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
                        <a style="margin-bottom: 10px;" class="btn btn-primary text-white" id="lens_options_add">Add new</a>
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

        <div class="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Fill the form</h5>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?=form_open('',array('id'=>'lens_options_form','autocomplete'=>'off'))?>
                    <input type="hidden" name="lo_id" id="lo_id" value="">
                    <div class="modal-body">
                        <div class="col-xl-12 col-md-12">
                            <div class="form-group">
                                <label for="l_title">Name/Title <span class="star">*</span></label>
                                <input type="text" class="form-control" id="l_title" name="l_title" placeholder="Enter the Name/Title" autofocus="autofocus" onfocus="this.select()">
                                <span class="validation-error" id="l_title_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="l_price">Price <span class="star">*</span></label>
                                <input type="text" class="form-control" id="l_price" name="l_price" placeholder="Enter the Price" autofocus="autofocus" onfocus="this.select()">
                                <span class="validation-error" id="l_price_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="l_cost">Cost <span class="star">*</span></label>
                                <input type="text" class="form-control" id="l_cost" name="l_cost" placeholder="Enter the Cost" autofocus="autofocus" onfocus="this.select()">
                                <span class="validation-error" id="l_cost_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?=form_close()?>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <?php
            $this->load->view('back_end/include/script');
        ?>
        <script type="text/javascript">
        $( document ).ready(function() {
          list_lens_opt_tb();
        });
        </script>
    </body>

</html>