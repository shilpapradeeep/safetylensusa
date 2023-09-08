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
                        <a style="margin-bottom: 10px;" class="btn btn-primary text-white" id="lens_type_add">Add new</a>
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
                    <?=form_open('',array('id'=>'lens_type_form','autocomplete'=>'off'))?>
                    <input type="hidden" name="lt_id" id="lt_id" value="">
                    <div class="modal-body">
                        <div class="col-xl-12 col-md-12">
                            <div class="form-group">
                                <label for="lt_title">Title <span class="star">*</span></label>
                                <input type="text" class="form-control" id="lt_title" name="lt_title" placeholder="Enter the Name/Title" autofocus="autofocus" onfocus="this.select()">
                                <span class="validation-error" id="lt_title_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="lt_desc">Description <span class="star">*</span></label>
                                <textarea class="form-control" id="lt_desc" name="lt_desc" placeholder="Enter the Description" autofocus="autofocus" onfocus="this.select()"></textarea>
                                <span class="validation-error" id="lt_desc_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="lt_image">Image <span class="star">*</span></label>
                                <input type="file" name="lt_image" id="lt_image"><br>
                                <input type="hidden" id="lt_image_name" name="lt_image_name" value="">
                                <button class="btn btn-primary imagelt">Browse</button>
                                <span class="validation-error" id="lt_image_name_error"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 imgdiv">

                                </div>
                                <div class="col-md-3"></div>
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
          list_type_opt_tb();
          $('#lt_image').hide();
        });
        </script>
    </body>

</html>