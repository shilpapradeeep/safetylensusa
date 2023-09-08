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
                        <div class="row">
                            <div class="col-xl-4 col-md-12 text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="m_l_id" id="m_l_id" value="<?=sec($member_details[0]->m_l_id)?>">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12">
                                                <?php
                                                    if ( !empty($member_details[0]->m_photo) &&  file_exists( FCPATH.'ThreeSeasInfologics/uploads/members/'.$member_details[0]->m_photo) ) 
                                                        $img1 = thumb(b('ThreeSeasInfologics/uploads/members/').$member_details[0]->m_photo,330,200);
                                                    else
                                                        $img1 = thumb(repo().'uploads/no-image.jpg',316,200); 
                                                ?>
                                                <img src="<?=$img1?>" class="w-100">
                                            </div>
                                        </div>
                                        <div class="row pt-3 pl-1">
                                            <p class="text-muted">
                                            <div class="col-xl-4 col-md-4 text-left">Name</div>
                                            <div class="col-xl-8 col-md-8 text-right"><?=$member_details[0]->m_name?></div>
                                            </p>
                                        </div>
                                        <div class="row pt-3 pl-1">
                                            <p class="text-muted">
                                            <div class="col-xl-4 col-md-4 text-left">Email</div>
                                            <div class="col-xl-8 col-md-8 text-right"><?=$member_details[0]->m_email?></div>
                                            </p>
                                        </div>
                                        <div class="row pt-3 pl-1">
                                            <p class="text-muted">
                                            <div class="col-xl-6 col-md-6 text-left">Phone Number</div>
                                            <div class="col-xl-6 col-md-6 text-right"><?=$member_details[0]->m_phone?></div>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Delivery Address</div>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="member_d_address"></div>
                                        <div class="row mt-2">
                                            <div class="col-md-12 col-xl-12 text-center">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center" data-whatever="1" data-whatever1="Delivery">+ Add Delivery Address</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>       
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Billing Address</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="member_b_address"></div>
                                    
                                        <div class="row mt-2">
                                            <div class="col-md-12 col-xl-12 text-center">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center" data-whatever="2" data-whatever1="Billing">+ Add Billing Address</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                       
                            </div>
                            
                           
                        </div>
                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <?=form_open('',array('id'=>'address_form','onsubmit'=>'return address_submit_form()','autocomplete'=>'off'))?>
                            <div class="modal-header">
                                <h5 class="modal-title mt-0"></h5>
                                <input type="hidden" name="m_id" id="m_id" value="<?=sec($member_details[0]->m_l_id)?>">
                                <input type="hidden" name="ma_type" id="ma_type" value="">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="control-label">Address</label>
                                        <input type="text" class="form-control" id="m_address" name="m_address" placeholder="Address" >
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                        <label class="control-label">District</label>
                                        <input type="text" class="form-control" id="m_district" name="m_district" placeholder="District" >
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                        <label class="control-label">State</label>
                                        <input type="text" class="form-control" id="m_state" name="m_state" placeholder="State" >
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                        <label class="control-label">Pin-Number<span class="validation-error">*</span></label>
                                        <input type="text" class="form-control" id="m_pin_number" name="m_pin_number" placeholder="Pin Number" >
                                        <span class="validation-error" id="m_pin_number_error"></span>
                                    </div>                                 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add address</button>
                                <button type="button" class="btn btn-secondary reset_address" data-dismiss="modal">Close</button>
                            </div>
                            <?=form_close()?>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                

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
            $('.bs-example-modal-center').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget)
              var ma_type = button.data('whatever') 
              var ma_type_name = button.data('whatever1') 
              var modal = $(this)
              modal.find('.modal-title').text(ma_type_name)
              modal.find('#ma_type').val(ma_type)
            })
        </script>
        
    </body>

</html>