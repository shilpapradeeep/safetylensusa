<div class="row">
                        <?php if(!empty($tdata))
                        { ?>
                        <div class="col-md-12 col-lg-12">

                        <div class="table-responsive">
                        <div id="polarized_lens_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                        <div class="col-sm-12">
                        <table id="polarized_lens_table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr role="row">
                                <th>#</th>
                                <th>Polarized Lens</th>
                                <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tdata as $skey => $val) { ?>
                                <tr id="tr_<?=sec($val->pl_id)?>">
                                <td><?=$skey+1?></td>
                                <td><?=not($val->pl_name,'-')?></td>
                                <td>

                                <a class="btn btn-success text-white edit_polarized_lens_row" fet="<?=sec($val->pl_id)?>" title="Edit"><i class="fa fa-edit"></i> / <i class="fa fa-eye"></i></a>
                                <a class="btn btn-secondary text-white delete_polarized_lens_row" fet="<?=sec($val->pl_id)?>" title="Delete"><i class="fa fa-trash"></i></a>

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

                        // $this->load->view('back_end/no-data');


                        } ?>
                        </div>