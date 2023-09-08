<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_controller extends CI_Controller
{
	public function add_page()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

		$css = array(
					'libs/fileuploads/css/dropify.css',
					'libs/dropzone/min/dropzone.min.css',
					'libs/summernote/summernote-bs4.min.css',
				);
		$js = array(
				"libs/dropzone/min/dropzone.min.js",
				"libs/fileuploads/js/dropify.js",
				"libs/fileuploads/js/fileupload.js",

				'libs/summernote/summernote-bs4.min.js',
				'js/pages/form-editor.init.js',
				'js/brand.js',
				'js/common.js',
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Add Brand',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/brand_add',$data);

	}

	

	public function submit_brand()
	{
		isajax();

		$this->form_validation->set_message('required','Please Enter %s');
		$this->form_validation->set_message('is_unique','%s already exist.');
		$this->form_validation->set_rules('b_title','Name/Title','trim|required|min_length[3]|max_length[55]');
        $this->form_validation->set_rules('b_gender_type','Gender Type','trim|required');
        $this->form_validation->set_rules('b_logo_temp','Brand Logo','trim|required');
        $this->form_validation->set_rules('b_img_temp','Brand Image','trim|required');

		if($this->form_validation->run())
    	{ 

            $data = array(
                'b_title'=>noHtml($this->input->post('b_title')),
                'b_gender'=>noHtml(sec($this->input->post('b_gender_type'),'d')),
                'b_seo_title'=>noHtml($this->input->post('b_seo_title')),
                'b_seo_description'=>noHtml($this->input->post('b_seo_description')),
                'b_brand_logo'=>noHtml($this->input->post('b_logo_temp')),
                'b_brand_img'=>noHtml($this->input->post('b_img_temp')),
                );
			
			if(empty($this->input->post('b_id')))
			{
				
				$l_id = $this->HomeDb->insert($data,"b_brand");
				if(!empty($l_id))
				{
					$res = array("res"=>1,"msg"=>"Brand Added Successfully");
				}
				else
                {
                    $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421130");
                }
			}
			else
			{
				$b_id = sec($this->input->post('b_id'),'d');
				if(is_numeric($b_id))
				{
					$tdata= $this->HomeDb->getDetailedData(array('*'),'b_brand',array("b_id"=>$b_id,"b_status"=>'1'));
					
					if(!empty($tdata))
					{
						if($this->HomeDb->update($data,"b_brand",array("b_id"=>$b_id)))
						{
							$res = array("res"=>1,"msg"=>"Brand Edited Successfully");
						}
						else
							$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
					}
					else
						$res = array("res"=>0,"msg"=>"Invalid Brand choosed.");
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
    
    public function brand_tbl()
    {
    	isajax();
		$data['brand_list'] = $this->brand_lst();

		if (!empty($data['brand_list']))
		{
			$this->load->view('back_end/table/brand_tbl',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}
    }

    public function brand_lst($id=null)
    {
    	if (!empty($id))
		{
			$select = array('b_id','b_title','b_gender','b_seo_title','b_seo_description','b_brand_logo','b_brand_img');
			$cond = array('b_status'=>'1','b_id'=>$id);
		}
		else
		{
			$select = array('b_id','b_title','b_added');
			$cond = array('b_status'=>'1');
		}
		$data=$this->HomeDb->getDetailedData($select,'b_brand',$cond,null,null,array('b_id','desc'));
		return $data;
    }

    public function edit_brand()
    {
    	$id = sec($this->input->post('id'),'d');
    	if(!empty($id) && is_numeric($id))
    	{
    		$data = $this->brand_lst($id);
			// lq();
			if (!empty($data)) 
			{
                if ( !empty($data[0]->b_brand_logo) &&  file_exists( FCPATH.'assets/uploads/brandlogo/'.$data[0]->b_brand_logo) )
                    $brand_logo = b('assets/uploads/brandlogo/').$data[0]->b_brand_logo;
                else
                    $brand_logo = repo('assets/no-image.jpg');

                if ( !empty($data[0]->b_brand_img) &&  file_exists( FCPATH.'assets/uploads/brandimage/'.$data[0]->b_brand_img) )
                    $brandimage = b('assets/uploads/brandimage/'.$data[0]->b_brand_img);
                else
                    $brandimage = repo('assets/no-image.jpg');

                $arr_val = array(
					'b_id'=>sec($data[0]->b_id),
					'b_title'=>$data[0]->b_title,
                    'b_gender'=>sec($data[0]->b_gender),
                    'b_seo_title'=>$data[0]->b_seo_title,
                    'b_seo_description'=>$data[0]->b_seo_description,
                    'b_brand_logo'=>$data[0]->b_brand_logo,
                    'b_brand_logo_full'=>$brand_logo,
                    'b_brand_img'=>$data[0]->b_brand_img,
                    'b_brand_img_full'=>$brandimage,
				);

				$res = array('res'=>'1','data'=>$arr_val);
			}
			else
			{
				$res = array('res'=>'0','msg'=>"Something went Wrong! Error Code #5421134");
			}
		}
		echo json_encode($res);
    }

    public function delete_brand()
	{
		$b_id = sec($this->input->post('id'),'d');
		$data['b_status'] = "2";

		if(!empty($b_id) && is_numeric($b_id))
		{

			$tdata= $this->HomeDb->getDetailedData(array('*'),'b_brand',array("b_id"=>$b_id,"b_status"=>'1'));
			
			if(!empty($tdata))
			{

				if($this->HomeDb->update($data,"b_brand",array("b_id"=>$b_id)))
				{
					$res = array("res"=>1,"msg"=>"Brand deleted Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
			}
			else
				$res = array("res"=>0,"msg"=>"Invalid Brand choosed.");
		}
		else
		{
			$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
		}
		echo json_encode($res);
	}

}
