<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_controller extends CI_Controller 
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
					"libs/select2/css/select2.min.css",
				);
		$js = array(
				"libs/dropzone/min/dropzone.min.js",
				"libs/fileuploads/js/dropify.js",
				"libs/fileuploads/js/fileupload.js",
				"libs/select2/js/select2.min.js",
				'js/media.js',
				'js/common.js',
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Media',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/media_add',$data);

	}

	

	public function submit_media()
	{
		isajax();

		$this->form_validation->set_message('required','Please Select %s');
		$this->form_validation->set_rules('m_type','Media Type','trim|required');
		$this->form_validation->set_rules('media_img_temp','Image','trim|required');
		
		if(!empty($this->input->post('m_url')))
		{
		    $this->form_validation->set_rules('m_url','Link','trim|callback_valid_url');
		}
		
		if($this->form_validation->run())     
    	{ 
			
			$data['m_type_id'] = sec($this->input->post('m_type'),'d');
			$data['m_file_link'] = noHtml($this->input->post('m_url'));
			$data['m_file_path'] = noHtml($this->input->post('media_img_temp'));

			
			
			if(empty($this->input->post('m_id')))
			{
				
				$l_id = $this->HomeDb->insert($data,"m_media");
				if(!empty($l_id))
				{
					$res = array("res"=>1,"msg"=>"Media File Added Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #02");
				// lq();
			}
			else
			{
				$m_id = sec($this->input->post('m_id'),'d');
				if(is_numeric($m_id))
				{
					$tdata= $this->HomeDb->getDetailedData(array('*'),'m_media',array("m_id"=>$m_id,"m_status"=>'1'));
					
					if(!empty($tdata))
					{
						if($this->HomeDb->update($data,"m_media",array("m_id"=>$m_id)))
						{
							$res = array("res"=>1,"msg"=>"Media File Edited Successfully");
						}
						else
							$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
					}
					else
						$res = array("res"=>0,"msg"=>"Invalid Media File choosed.");
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
    
    public function media_tbl()
    {
    	isajax();
		$data['media_list'] = $this->media_lst(); 
		if (!empty($data['media_list'])) {
			$this->load->view('back_end/table/media_tbl',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}
    }

    public function media_lst($id=null)
    {
    	if (!empty($id))
		{
			$select = array('m.m_id','m.m_type_id','m.m_file_link','m.m_file_path','mt.mt_max_file','mt.mt_height','mt.mt_width');
			$cond = array('m.m_status'=>'1','m.m_id'=>$id);
			$join = array(
				array('mt_media_type mt','mt.mt_id=m.m_type_id','left'),
			);
		}
		else
		{
			$select = array('m.m_file_path','m.m_file_link','mt.mt_title','m.m_id');
			$cond = array('m.m_status'=>'1');
			$join = array(
				array('mt_media_type mt','mt.mt_id=m.m_type_id','left'),
			);
		}
		$data=$this->HomeDb->getDetailedData($select,'m_media m',$cond,null,null,array('m_id','desc'),$join);
		return $data;
    }

    
    public function delete_media()
	{
		isajax();
		$m_id = sec($this->input->post('id'),'d');
		$data['m_status'] = "2";

		if(!empty($m_id) && is_numeric($m_id))
		{

			$tdata= $this->HomeDb->getDetailedData(array('*'),'m_media',array("m_id"=>$m_id,"m_status"=>'1'));
			
			if(!empty($tdata))
			{

				if($this->HomeDb->update($data,"m_media",array("m_id"=>$m_id)))
				{
					$res = array("res"=>1,"msg"=>"Media deleted Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
			}
			else
				$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");
		}
		else
		{
			$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421135");
		}
		echo json_encode($res);
	}

	public function get_edit_media()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if (!empty($id) && is_numeric($id)) 
		{
			$data = $this->media_lst($id);
			if (!empty($data)) 
			{
				
            	if ( !empty($data[0]->m_file_path) &&  file_exists( FCPATH.'ThreeSeasInfologics/uploads/media/'.$data[0]->m_file_path) ) 
              		$img2 = thumb(b('ThreeSeasInfologics/uploads/media/').$data[0]->m_file_path,430,200);
           		else
                  	$img2 = thumb(repo().'uploads/no-image.jpg',316,200); 
                
				$arr_val = array(
					'm_type' => sec($data[0]->m_type_id),
					'm_file_link' => $data[0]->m_file_link,
					'mt_max_file' => $data[0]->mt_max_file,
					'mt_height' => $data[0]->mt_height,
					'mt_width' => $data[0]->mt_width,
					'm_id' => sec($data[0]->m_id),
					'img_path'=>$img2,
					'img'=>$data[0]->m_file_path,
				);

				$res = array('res'=>'1','data'=>$arr_val);
			}
			else
			{
				$res = array('res'=>'0','data'=>"");
			}
		}
		echo json_encode($res);
	}
    public function valid_url($str) {
        if(filter_var($str, FILTER_VALIDATE_URL) !== FALSE)
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('valid_url', 'Website link is not valid.');
            return false;
        }
        
    }
}
