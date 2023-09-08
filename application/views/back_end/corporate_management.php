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
                        <div class="row">
                        <?php if(!empty($members))
                        { ?>
                        <div class="col-md-12 col-lg-12">



                            <div class="table-responsive">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr role="row">
                                <th>#</th>
                                    <th>Company</th>
                                    <th>Owner</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($members as $mkey => $mval) { ?>
                                <tr id="tr_<?=sec($mval->m_id)?>">
                                    <td><?=$mkey+1?></td>
                                    <td><?=not($mval->m_name,'-').' '.not($mval->m_lname,'-')?></td>
                                    <td><?=not($mval->m_email,'-')?></td>
                                    <td><?=not($mval->m_phone,'-')?></td>
                                    <td><?='-'?></td>
                                    <td>
                                        <a class="btn btn-success viewdetail text-white" title="Edit" fet="<?=sec($mval->m_id)?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-secondary deleteuser text-white" title="Delete" fet="<?=sec($mval->m_id)?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php  } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>

                        </div>
                        </div>


                        </div>
                        <?php }  ?>
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

        <div class="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detailed View</h5>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="col-xl-12 col-md-12">
                          <table class="table table-bordered">
                              <tr>
                                  <td>First Name</td>
                                  <td id="firstname"></td>
                              </tr>
                              <tr>
                                  <td>Last Name</td>
                                  <td id="lastname"></td>
                              </tr>
                              <tr>
                                  <td>Email</td>
                                  <td id="email"></td>
                              </tr>
                              <tr>
                                <td>Phone</td>
                                  <td id="phone"></td>
                              </tr>
                              <tr>
                                  <td>City</td>
                                  <td id="city">-</td>
                              </tr>
                          </table>
                          <div class="col-xl-12 col-md-12">
<?= form_open('',array('id'=>'member_amount_form')) ?>
                            <input type="hidden" name="memberId" id="memberId" value="">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="m_amount">Amount</label>
                                    <input type="text" class="form-control" id="m_amount" name="m_amount" placeholder="Enter Amount" autofocus="autofocus" >
                                    <span class="validation-error" id="m_amount_error"></span>
                                </div>
                                <div class="form-group">
                                  <label for="m_credit_balance">Credit/Balance</label>
                                  <select class="form-control" name="m_credit_balance">
                                      <option value="">Select an option</option>
                                      <option value="1">Balance</option>
                                      <option value="2">Credit</option>
                                  </select>
                                  <span class="validation-error" id="m_credit_balance_error"></span>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
</form>
                    </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
            $this->load->view('back_end/include/script');
        ?>
    </body>

</html>