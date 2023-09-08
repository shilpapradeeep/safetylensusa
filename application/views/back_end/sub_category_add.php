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
                                        <h4 class="card-title">Basic Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <?=form_open('',array('id'=>'sform','onsubmit'=>'return submit_sub_category()','autocomplete'=>'off')); ?>  
                                        <input type="hidden" name="h_id" id="h_id">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                              <div class="form-group ajax-select mt-3 mt-lg-0">
                                                        <label for="category" class="control-label">Category <span class="compulsory">*</span></label>
                                                        <select name="category" id="category" class="form-control select2-ajax"></select>
                                                  <span id="category_error" class="validation-error"></span>       
                                              </div>

                                              
                                            </div>
                                            <div class="col-xl-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="sub_category">Sub Category <span class="compulsory">*</span></label>
                                                    <input type="text" class="form-control" id="sub_category" name="sub_category" placeholder="Category Name" >
                                                    <span id="sub_category_error" class="validation-error"></span>
                                                </div>
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                           <div class="col-md-12 col-sm-12 col-xs-12 text-center" >
                                            <div class="form-group mb-0 mt-3 justify-content-end">
                                             <div align="center" class="col-md-12">
                                              <span style="display: none;" id="spinner"><i class="fa fa-2x fa-spin fa-spinner"></i></span>
                                          </div>
                                          <div class="btn-div"> 
                                              <button type="submit" id="btn-save" class="btn btn-primary">Submit</button> 
                                              <button type="reset" class="reset btn btn-warning">Cancel</button> 
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <?=form_close();  ?> 
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
                   <?php $this->load->view('back_end/common-list.php'); ?>
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
    $('.select2').select2({
        minimumResultsForSearch: ''
    });
    $(".demo_vertical").TouchSpin({
      verticalbuttons: true,
      verticalupclass: 'glyphicon glyphicon-plus',
      verticaldownclass: 'glyphicon glyphicon-minus'
  });


</script>
</body>

</html>