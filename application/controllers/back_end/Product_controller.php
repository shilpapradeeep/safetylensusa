<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_controller extends CI_Controller {

	public function product_add()
	{

		$data['css']= css_link();
    	$data['js'] = js_link();

    	$css = array(
					"libs/select2/css/select2.min.css",
					'libs/fileuploads/css/dropify.css',
					'libs/dropzone/min/dropzone.min.css',
					'libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css',
					'libs/summernote/summernote-bs4.min.css',
                    'css/jquery.fileuploader-theme-thumbnails.css',
                    'css/jquery.fileuploader.min.css',
				);
		$js = array(
				"libs/select2/js/select2.min.js",
				"libs/dropzone/min/dropzone.min.js",
				"libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js",
				'libs/bs-custom-file-input/bs-custom-file-input.min.js',
				"libs/fileuploads/js/dropify.js",
				"libs/fileuploads/js/fileupload.js",

				'js/pages/form-element.init.js',
				'libs/tinymce/tinymce.min.js',
				'libs/summernote/summernote-bs4.min.js',
				'js/pages/form-editor.init.js',
				'js/product.js',
				'js/common.js',
                'js/image.js',
		);

        $data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

    	
		$data['bread_crum']=array(
		  0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Add Product',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/product_add',$data);
	}

	public function product_edit($id)
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$css = array(
					"libs/select2/css/select2.min.css",
					'libs/fileuploads/css/dropify.css',
					'libs/dropzone/min/dropzone.min.css',
					'libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css',
					'libs/summernote/summernote-bs4.min.css',
                    'css/jquery.fileuploader-theme-thumbnails.css',
                    'css/jquery.fileuploader.min.css',
				);
		$js = array(
				"libs/select2/js/select2.min.js",
				"libs/dropzone/min/dropzone.min.js",
				"libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js",
				'libs/bs-custom-file-input/bs-custom-file-input.min.js',
				"libs/fileuploads/js/dropify.js",
				"libs/fileuploads/js/fileupload.js",

				'js/pages/form-element.init.js',
				'libs/tinymce/tinymce.min.js',
				'libs/summernote/summernote-bs4.min.js',
				'js/pages/form-editor.init.js',
				'js/product.js',
				'js/common.js',
                'js/image.js',
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);
    	$data['id'] = sec($id);

		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Product Edit',
	      3=>'javascript:void(0)',
	    );
        $data['product'] = $this->product_lst(get_id($id),'edit');
		$this->load->view('back_end/product_add',$data);
	}
	
	public function product_view($id)
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$id = get_id($id);
    	$data['id'] = sec($id);
    	$js = array(
				'js/product.js',
				'js/common.js',
		);
        $data['js']=array_merge($data['js'],$js);

		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Product View',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/product_details',$data);
	}


	public function product_list()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

    	$js = array(
				'js/product.js',
				'js/common.js',
		);
		$data['js']=array_merge($data['js'],$js);

		$data['pro_list'] = $this->product_lst();
		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Product List',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/product_list',$data);
	}

	public function submit_product()
	{
		isajax();
		$img_c = 0;
		$this->form_validation->set_message('required','Please Enter %s');
		$this->form_validation->set_message('is_unique','%s already exist.');
		$this->form_validation->set_rules('pr_name','Name','trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('pr_model','Model','trim|min_length[3]|max_length[255]');
		$this->form_validation->set_rules('pr_product_no','Product No','trim|required|min_length[1]|max_length[11]|numeric');
		$this->form_validation->set_rules('pr_category','Category','trim|required');
        $this->form_validation->set_rules('pr_brand','Brand','trim|required');
        $this->form_validation->set_rules('pr_style','Style','trim|required');
        $this->form_validation->set_rules('pr_product_color','Color','trim|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('pr_d_desc','Description','trim|min_length[3]|max_length[65535]');
        $this->form_validation->set_rules('pr_order_no','Order No','trim|min_length[1]|max_length[11]');

        // if(!empty($this->input->post('pr_mrp')))
        // {
        //     $this->form_validation->set_rules('pr_selling_price','Selling price','trim|required|callback_compare_price');
        // }
        // else
        // {
        //     $this->form_validation->set_rules('pr_selling_price','Selling price','trim|required');
        // }
        // $this->form_validation->set_rules('pr_mrp_price','Product MRP Price','trim|min_length[1]|max_length[11]');
		$this->form_validation->set_rules('pr_seo_title','SEO Title','trim|min_length[3]|max_length[255]');
		$this->form_validation->set_rules('pr_slug','SEO Slug','trim|min_length[3]|max_length[55]');
		$this->form_validation->set_rules('pr_seo_keywords','SEO Keywords','trim|min_length[3]|max_length[1000]');
		$this->form_validation->set_rules('pr_seo_desp','SEO Description','trim|min_length[3]|max_length[5000]');


        $asset_img_arr = '';
        $thumb = '';
        $product_img_arr = '';
        if(!empty($this->input->post('files_input')))
        {

            $product_img = $this->input->post('files_input');
            $thumb = $product_img[0];
            $product_img_arr =  json_encode($product_img);

        }
        if($this->form_validation->run() )
    	{
            $DBdata = array(
    	        'pr_title' =>noHtml($this->input->post('pr_name')),
                'pr_model' => noHtml($this->input->post('pr_model')),
                'pr_product_no' => noHtml($this->input->post('pr_product_no')),
                'pr_cat_id' => sec($this->input->post('pr_category'),'d'),
                'pr_brand' => sec($this->input->post('pr_brand'),'d'),
                'pr_style' => sec($this->input->post('pr_style'),'d'),
                'pr_product_color' => noHtml($this->input->post('pr_product_color')),
                'pr_detailed_description' => noHtml($this->input->post('pr_detailed_description')),
                'pr_order_no' => !empty($this->input->post('pr_order_no'))?noHtml($this->input->post('pr_order_no')):0,
                'pr_mrp' => !empty($this->input->post('pr_mrp'))?noHtml($this->input->post('pr_mrp')):0,
                'pr_selling_price' => 0, //!empty($this->input->post('pr_selling_price'))?$this->input->post('pr_selling_price'):''
                'pr_is_featured' => !empty($this->input->post('pr_is_featured'))?$this->input->post('pr_is_featured'):'2',
                'pr_popular' => !empty($this->input->post('pr_popular'))?$this->input->post('pr_popular'):'2',
                'pr_latest' => !empty($this->input->post('pr_latest'))?$this->input->post('pr_latest'):'2',
                'pr_most_selling' => !empty($this->input->post('pr_most_selling'))?$this->input->post('pr_most_selling'):'2',
                'pr_prescription_glass' => !empty($this->input->post('pr_prescription_glass'))?$this->input->post('pr_prescription_glass'):'2',
                'pr_seo_title' => noHtml($this->input->post('pr_seo_title')),
                'pr_slug' => noHtml($this->input->post('pr_slug')),
                'pr_seo_keywords' => noHtml($this->input->post('pr_seo_keywords')),
                'pr_seo_desp' => noHtml($this->input->post('pr_slug_desp')),
                'pr_gallery_image'=>$product_img_arr,
                'pr_thumb_image'=>$thumb,

            );



			if(empty($this->input->post('pr_id')))
			{
			    $pid = $this->HomeDb->insert($DBdata,"pr_product");
                if(!empty($this->input->post('vcount')) )
                {
                    $variation_count = $this->input->post('vcount');
                    for ($i=0;$i<$variation_count;$i++)
                    {

                        $VariationData[] =
                            array(
                                'pv_eye_size' => !empty($this->input->post('pv_eye_size')[$i])?noHtml($this->input->post('pv_eye_size')[$i]):0 ,
                                'pv_bridge' => !empty($this->input->post('pv_bridge')[$i])?noHtml($this->input->post('pv_bridge')[$i]) :0,
                                'pv_ed' => !empty($this->input->post('pv_ed')[$i])?noHtml($this->input->post('pv_ed')[$i]):0 ,
                                'pv_temple' => !empty($this->input->post('pv_temple')[$i])?noHtml($this->input->post('pv_temple')[$i]):0 ,
                                'pv_b_measurement' => !empty($this->input->post('pv_b_measurement')[$i])?noHtml($this->input->post('pv_b_measurement')[$i]):0 ,
                                'pv_price' => !empty($this->input->post('pv_price')[$i])?noHtml($this->input->post('pv_price')[$i]):0 ,
                                'pv_cost' => !empty($this->input->post('pv_cost')[$i])?noHtml($this->input->post('pv_cost')[$i]):0 ,
                                'pv_height_progressive' => !empty($this->input->post('pv_height_progressive')[$i])?noHtml($this->input->post('pv_height_progressive')[$i]):0 ,
                                'pv_height_bifocal' => !empty($this->input->post('pv_height_bifocal')[$i])?noHtml($this->input->post('pv_height_bifocal')[$i]) :0,
                                'pv_product_id'=>$pid
                            );


                    }
                    $this->HomeDb->batch_insert($VariationData, 'pv_variation');
                }

				if(!empty($pid))
				{
					$res = array("res"=>1,"msg"=>"Product Added Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421130");
				// lq();
			}
			else
			{
				$pr_id = sec($this->input->post('pr_id'),'d');
				if(is_numeric($pr_id))
				{
					$tdata= $this->HomeDb->getData('pr_product',array("pr_id"=>$pr_id,"pr_status"=>'1'));
					
					if(!empty($tdata))
					{
						if($this->HomeDb->update($DBdata,"pr_product",array("pr_id"=>$pr_id)))
						{
						    if( $this->HomeDb->getData('pv_variation',array("pv_product_id"=>$pr_id)) )
                            {
                                $this->HomeDb->delete('pv_variation',array("pv_product_id"=>$pr_id));
                            }
                            if(!empty($this->input->post('vcount')) )
                            {
                               // tsi($_POST);
                                $variation_count = $this->input->post('vcount');
                                for ($i=0;$i<$variation_count;$i++)
                                {
                                    $VariationData[] =
                                        array(
                                            'pv_eye_size' => !empty($this->input->post('pv_eye_size')[$i])?noHtml($this->input->post('pv_eye_size')[$i]):0 ,
                                            'pv_bridge' => !empty($this->input->post('pv_bridge')[$i])?noHtml($this->input->post('pv_bridge')[$i]) :0,
                                            'pv_ed' => !empty($this->input->post('pv_ed')[$i])?noHtml($this->input->post('pv_ed')[$i]):0 ,
                                            'pv_temple' => !empty($this->input->post('pv_temple')[$i])?noHtml($this->input->post('pv_temple')[$i]):0 ,
                                            'pv_b_measurement' => !empty($this->input->post('pv_b_measurement')[$i])?noHtml($this->input->post('pv_b_measurement')[$i]):0 ,
                                            'pv_price' => !empty($this->input->post('pv_price')[$i])?noHtml($this->input->post('pv_price')[$i]):0 ,
                                            'pv_cost' => !empty($this->input->post('pv_cost')[$i])?noHtml($this->input->post('pv_cost')[$i]):0 ,
                                            'pv_height_progressive' => !empty($this->input->post('pv_height_progressive')[$i])?noHtml($this->input->post('pv_height_progressive')[$i]):0 ,
                                            'pv_height_bifocal' => !empty($this->input->post('pv_height_bifocal')[$i])?noHtml($this->input->post('pv_height_bifocal')[$i]) :0,
                                            'pv_product_id'=>$pr_id
                                        );


                                }
                                $this->HomeDb->batch_insert($VariationData, 'pv_variation');
                            }
							$res = array("res"=>1,"msg"=>"Product Edited Successfully");
						}
						else
							$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
					}
					else
						$res = array("res"=>0,"msg"=>"Invalid Product choosed.");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");	
			}
		}
		else
	    {    
	        $errors = $this->form_validation->error_array();
	        $res = array("res"=>0,"errors"=>$errors);
	    }
		echo json_encode($res);
	}
	
	public function compare_price($str)
	{
	    if(!empty($str))
	    {
	        $mrp = $this->input->post('pr_mrp');
	        if($mrp < $str)
	        {
	            $this->form_validation->set_message('compare_price', 'Selling price must be less than mrp');
                return FALSE;
	        }
	        else
	        {
	            return TRUE;
	        }
	        
	    }
	    else
	    {
	        return TRUE;
	    }
	}

	public function product_lst($id=null,$type=null)
	{
        if (!empty($id) && $type == 'edit')
        {
            $input['select'] = array('*','v.*');
            $input['where']  = array('pr.pr_status'=>'1','pr.pr_id'=>$id);
            $input['join_table']  = array('pv_variation v','v.pv_product_id =pr.pr_id','left');
            $input['group_by'] = array('v.pv_id');
        }
        elseif (!empty($id) && $type == 'view')
        {
            $input['select'] = array('*','v.*');
            $input['where']  = array('pr.pr_status'=>'1','pr.pr_id'=>$id);
            $input['join_table']  = array('pv_variation v','v.pv_product_id =pr.pr_id','left');
            $input['group_by'] = array('v.pv_id');
        }
        else
        {
            $input['select'] = array('pr.pr_id','pr.pr_title','pr.pr_model','pr.pr_product_no','c.c_title as pr_category','pr.pr_mrp','pr.pr_selling_price');
            $input['where']  = array('pr_status'=>'1');
            $input['join_table']  = array('c_category c','c.c_id = pr.pr_cat_id','left');

        }
        $input['order_by'] = array('pr_id','desc');
        $input['object'] = 1;
        $input['table'] = 'pr_product pr';
        $data=$this->HomeDb->grab($input);

		return $data;
	}

	public function list_data()
	{
		isajax();
		$data['pro_list'] = $this->product_lst();
		if(!empty($data['pro_list']))
		{
			$this->load->view('back_end/product_tbl',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}
	}
	
	public function delete_product()
	{
		$pr_id = sec($this->input->post('id'),'d');
		$data['pr_status'] = "2";

		if(!empty($pr_id) && is_numeric($pr_id))
		{

			$tdata= $this->HomeDb->getData('pr_product',array("pr_id"=>$pr_id,"pr_status"=>'1'));
			
			if(!empty($tdata))
			{

				if($this->HomeDb->update($data,"pr_product",array("pr_id"=>$pr_id)))
				{
					$res = array("res"=>1,"msg"=>"Product deleted Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
			}
			else
				$res = array("res"=>0,"msg"=>"Invalid Product choosed.");
		}
		else
		{
			$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
		}
		echo json_encode($res);
		
	}


    public function add_more_variation()
    {

        $data['count'] = noHtml($this->input->post('new_count'));

        $this->load->view('back_end/include/add-more-variation',$data);
    }

}
