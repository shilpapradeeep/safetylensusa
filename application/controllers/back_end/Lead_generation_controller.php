<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_generation_controller extends CI_Controller {

	public function lead_active_page()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();
    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

    	
    	$css = array(
					'libs/fileuploads/css/dropify.css',
				);
		$js = array(
				"libs/fileuploads/js/dropify.js",
				"libs/fileuploads/js/fileupload.js",
		
    			'js/lead.js',
				"js/common.js",
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);
        
		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Lead Generation',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/lead_gen',$data);
	}

	public function lead()
	{

		$data['lg_lead'] = not($this->input->post('lead'),'2');


		if ($this->HomeDb->update($data,"lg_lead_generation",array("lg_id"=>'1'))) 
		{
			if ($data['lg_lead'] == '1') 
			{
				$res = array('res'=>'1','msg'=>'Enable');
			}
			else
			{
				$res = array('res'=>'0','msg'=>'Disable');
			}
			
		}

		echo json_encode($res);
	}

	public function title()
	{

		if (!empty($this->input->post('l_title'))) 
		{
			$data['lg_title'] = noHtml($this->input->post('l_title'));
		}


		if ($this->HomeDb->update($data,"lg_lead_generation",array("lg_id"=>'1'))) 
		{
			$res = array('res'=>'1','msg'=>'Title added');	
		}
		else
		{
			$res = array('res'=>'0','msg'=>'Please Enter Title');
		}

		echo json_encode($res);
	}

	public function img()
	{

		if (!empty($this->input->post('img'))) 
		{
			$data['lg_image'] = noHtml($this->input->post('img'));
		}


		if ($this->HomeDb->update($data,"lg_lead_generation",array("lg_id"=>'1'))) 
		{
			$res = array('res'=>'1','msg'=>'Image added');	
		}
		else
		{
			$res = array('res'=>'0','msg'=>'Something went Wrong! Error Code #5421133');
		}

		echo json_encode($res);
	}

	public function name()
	{

		$data['lg_u_name'] = not($this->input->post('name'),'2');

		if ($this->HomeDb->update($data,"lg_lead_generation",array("lg_id"=>'1'))) 
		{
			if ($data['lg_u_name'] == '1') 
			{
				$res = array('res'=>'1','msg'=>'Enable');
			}
			else
			{
				$res = array('res'=>'0','msg'=>'Disable');
			}
			
		}

		echo json_encode($res);
	}

	public function email()
	{

		$data['lg_email'] = not($this->input->post('email'),'2');

		if ($this->HomeDb->update($data,"lg_lead_generation",array("lg_id"=>'1'))) 
		{
			if ($data['lg_email'] == '1') 
			{
				$res = array('res'=>'1','msg'=>'Enable');
			}
			else
			{
				$res = array('res'=>'0','msg'=>'Disable');
			}
			
		}

		echo json_encode($res);
	}

	public function phone()
	{

		$data['lg_phone'] = not($this->input->post('phone'),'2');

		if ($this->HomeDb->update($data,"lg_lead_generation",array("lg_id"=>'1'))) 
		{
			if ($data['lg_phone'] == '1') 
			{
				$res = array('res'=>'1','msg'=>'Enable');
			}
			else
			{
				$res = array('res'=>'0','msg'=>'Disable');
			}
			
		}

		echo json_encode($res);
	}

	public function lead_status_data()
	{
		$data = $this->HomeDb->getDetailedData(array('*'),'lg_lead_generation');
		if (!empty($data)) 
		{
			if ( !empty($data[0]->lg_image) &&  file_exists( FCPATH.'ThreeSeasInfologics/uploads/lead/'.$data[0]->lg_image) ) 
              		$img1 = thumb(b('ThreeSeasInfologics/uploads/lead/').$data[0]->lg_image,430,200);
           		else
                  	$img1 = thumb(repo().'uploads/no-image.jpg',316,200); 
           
				$arr_val = array(
					'lg_id'=>sec($data[0]->lg_id),
					'lg_title'=>$data[0]->lg_title,
					'lg_image'=>$data[0]->lg_image,
					'lg_image_full'=>$img1,
					'lg_lead'=>$data[0]->lg_lead,
					'lg_u_name'=>$data[0]->lg_u_name,
					'lg_phone'=>$data[0]->lg_phone,
					'lg_email'=>$data[0]->lg_email,
				);

				$res = array('res'=>'1','data'=>$arr_val);
		}
		else
		{
			$res = array('res'=>'0','msg'=>'Disable');
		}
		echo json_encode($res);
		
	}

	public function lead_tbl()
	{
		$data['lead_list'] = $this->HomeDb->getDetailedData(array('*'),'ld_lead_data',array('ld_status'=>'1'),'','',array('ld_id','desc'));
		if (!empty($data['lead_list'])) 
		{
			$this->load->view('back_end/lead_user_tbl',$data);
		}
		else
		{
			echo "No Data Found";
		}
	}

	public function delete_lead()
	{
		$id = sec($this->input->post('id'),'d');
		if (!empty($id) && is_numeric($id)) 
		{
			$data['ld_status'] = "2";

			if ($this->HomeDb->update($data,"ld_lead_data",array("ld_id"=>$id))) 
			{
				$res = array('res'=>'1','msg'=>'Lead data deleted');				
			}
			else
			{
				$res = array('res'=>'0','msg'=>'Something went Wrong! Error Code #5421133');
			}
		}
		echo json_encode($res);
	}

}
