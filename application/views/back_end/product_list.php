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
                                <?php if(!empty($pro_list))
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
                                                                <th>Name</th>
                                                                <th>Prdt No</th>
                                                                <th>Category</th>
                                                                <th>Model</th>
                                                                <!-- <th>Sales Price</th> -->
                                                                <!-- <th>Selling Price</th> -->
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($pro_list as $skey => $val) { ?>
                                                                <tr>
                                                                    <td><?=$skey+1?></td>
                                                                    <td><?=not($val->pr_title,'-')?></td>
                                                                    <td><?=not($val->pr_product_no,'-')?></td>
                                                                    <td><?=not($val->pr_category,'-')?></td>
                                                                    <td><?=not($val->pr_model,'-')?></td>
                                                                    <!-- <td><?=not($val->pr_mrp,'-')?></td> -->
                                                                    <!-- <td><?=not($val->pr_selling_price,'-')?></td> -->
                                                                    <td>
                                                                        <!--<a class="btn btn-success text-white" title="View" href="<?=b().'view-product/'.slugAdmin($val->pr_id,$val->pr_title)?>"><i class="fa fa-eye"></i></a>-->
                                                                        <a class="btn btn-primary text-white" title="Edit" href="<?=b().'edit-product/'.slugAdmin($val->pr_id,$val->pr_title)?>"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-secondary text-white" title="Delete" onclick="delete_product('<?=sec($val->pr_id)?>')"><i class="fa fa-trash"></i></a>
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
                                <?php } else
                                {

                                    $this->load->view('back_end/no-data');


                                } ?>
                            </div>
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
        <script>
            $(document).ready(function(){
                var table = $('#example').DataTable({
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf','colvis' ]
             });
            });
        </script>
         
    </body>

</html>