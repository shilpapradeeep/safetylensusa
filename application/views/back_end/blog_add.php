<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        $this->load->view('back_end/include/head');
    ?>
    <style type="text/css">
        /*.remove_img_btn
        {
            display: none;
        }*/
        .validation-error
        {
            color: red;
        }
        #view_discount
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
                            </div>
                        </div>
                        <?=form_open('',array('id'=>'blog_form','onsubmit'=>'return blog_submit_form()','autocomplete'=>'off'))?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><span id="change_title">Add</span> Blog</h4>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <input type="hidden" name="b_id" id="b_id" value="">
                                            <div class="col-xl-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="p_name">Blog Title <span class="star">*</span></label>
                                                    <input type="text" class="form-control" id="b_title" name="b_title" placeholder="Product Name" autofocus="autofocus" onfocus="this.select()">
                                                    <span class="validation-error" id="b_title_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 mb-2">
                                                <label for="p_offer">Summary (Max 100 chars) <span class="star">*</span></label>
                                                <textarea class="tinymce" name="b_summary" id="b_summary"></textarea>
                                                <span class="validation-error" id="b_summary_error"></span>
                                            </div> 

                                            <div class="col-xl-12 col-md-12 mb-2">
                                                <label for="p_offer">Blog content <span class="star">*</span></label>
                                                <textarea class="tinymce" name="b_content" id="b_content"></textarea>
                                                <span class="validation-error" id="b_content_error"></span>
                                            </div> 
                                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div id="nn">
                                                    <label class="form-labeltext-muted">Blog Image <span class="validation-error">*</span></label>
                                                    <input type="file" class="dropify" id="blog-img" name="blog-img" onchange="image_upload('blog-img','blog_img_temp')">
                                                    <input type="hidden" name="blog_img_temp" id="blog_img_temp" value="">
                                                    <span class="validation-error" id="blog_img_temp_error"></span>
                                                </div>
                                            </div>  
                                            <div class="col-xl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="b_seo_title">SEO Title</label>
                                                        <input type="text" class="form-control" id="b_seo_title" name="b_seo_title" placeholder="Enter the SEO Title" autofocus="autofocus" >
                                                        <span class="validation-error" id="b_seo_title_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="b_slug">Slug</label>
                                                        <input type="text" class="form-control" id="b_slug" name="b_slug" placeholder="Enter the Slug" autofocus="autofocus" >
                                                        <span class="validation-error" id="b_slug_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="b_seo_keywords">SEO Keywords</label>
                                                        <textarea class="form-control tinymce" id="b_seo_keywords" name="b_seo_keywords" placeholder="Enter the SEO Keywords" rows="5"></textarea>
                                                        <span class="validation-error" id="b_seo_keywords_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="b_seo_description">SEO Description</label>
                                                        <textarea class="form-control tinymce" id="b_seo_description" name="b_seo_description" placeholder="Enter the Slug Description" rows="5"></textarea>
                                                        <span class="validation-error" id="b_seo_description_error"></span>
                                                    </div>
                                                </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="row">
                                          <div class="form-group col-12">
                                            <div class="text-center"> 
                                              <div class="btn-div">
                                                <button type="submit" class="btn btn-primary my-4" id=""><span class="submit">Submit</span></button> 
                                                <button type="button" class="btn btn-warning reset">Cancel</button> 
                                                </div>
                                                <div align="center" class="col-md-12">
                                                  <span style="display: none;" id="spin"><i class="fa fa-2x fa-spin fa-spinner"></i></span>
                                                </div>
                                            </div> 
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>

                               
                                <!-- end card -->
                            </div>
                            </div>
                        </div>
                        <?=form_close()?>
                        <!-- end page title -->

                        <div id="list-viewed"></div>

                        
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
       <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=tfsqh0u009vdg9i8lkuj7r4ibz63lnmvrob8o52t5e26dhx6"></script>
            <script type="text/javascript">
              tinymce.init({
                selector: "textarea",
                theme: "modern",
                height: 200,
                paste_data_images: true,

                plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern","image","image code"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image|image|undo redo | image code |code",
                extended_valid_elements:'script[language|type|src]',
                toolbar2: "print preview media | forecolor backcolor emoticons ",
                image_advtab: true,
                image_title: true,
                // enable automatic uploads of images represented by blob or data URIs
                automatic_uploads: true,
                // URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
                // images_upload_url: 'postAcceptor.php',
                // here we add custom filepicker only to Image dialog
                file_browser_callback_types: 'image',
                // and here's our custom image picker
                templates: [{
                  title: 'Test template 1',
                  content: 'Test 1'
                }, {
                  title: 'Test template 2',
                  content: 'Test 2'
                }],
              }); 
            </script>
    </body>

</html>