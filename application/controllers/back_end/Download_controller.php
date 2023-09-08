<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_controller extends CI_Controller 
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
				);
		$js = array(
				"libs/dropzone/min/dropzone.min.js",
				"libs/fileuploads/js/dropify.js",
				"libs/fileuploads/js/fileupload.js",
				
				'js/download.js',
				'js/common.js',
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Download File Add',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/download_add',$data);
	}

	

	public function submit_download()
	{
		isajax();

		$this->form_validation->set_message('required','Please Enter %s');
		$this->form_validation->set_message('is_unique','%s already exist.');
		$this->form_validation->set_rules('d_title','Title','trim|required');
		$this->form_validation->set_rules('ad_file_temp','Image','trim|required',array('required'=>'Please select %s'));
		
		
		if($this->form_validation->run())     
    	{ 
			
			$data['ad_title'] = noHtml($this->input->post('d_title'));
			$data['ad_file_path'] = noHtml($this->input->post('ad_file_temp'));
			
			
			if(empty($this->input->post('ad_id')))
			{
				
				$l_id = $this->HomeDb->insert($data,"ad_admin_download");
				if(!empty($l_id))
				{
					$res = array("res"=>1,"msg"=>"Download File Added Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #02");
				// lq();
			}
			
		}
		else
	    {    
	        $errors = $this->form_validation->error_array();
	        $res = array("res"=>0,"errors"=>$errors);
	    }
		echo json_encode($res);
	}
    
    public function download_tbl()
    {
    	isajax();
		$data['d_list'] = $this->ad_list(); 
		if (!empty($data['d_list'])) {
			$this->load->view('back_end/table/download_tbl',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}
    }

    public function ad_list()
    {
    	$select = array('ad_id','ad_title','ad_added','ad_file_path');
		$cond = array('ad_status'=>'1');

		$data=$this->HomeDb->getDetailedData($select,'ad_admin_download',$cond,null,null,array('ad_id','desc'));
		return $data;
    }

  //   public function edit_blog()
  //   {
  //   	$id = sec($this->input->post('id'),'d');
  //   	if(!empty($id) && is_numeric($id))
  //   	{
  //   		$data = $this->blog_lst($id);
		// 	// lq();
		// 	if (!empty($data)) 
		// 	{
		// 		if ( !empty($data[0]->b_img) &&  file_exists( FCPATH.'ThreeSeasInfologics/uploads/blog/'.$data[0]->b_img) ) 
  //             		$img1 = thumb(b('ThreeSeasInfologics/uploads/blog/').$data[0]->b_img,430,200);
  //          		else
  //                 	$img1 = thumb(repo().'uploads/no-image.jpg',316,200); 
                
		// 		$arr_val = array(
		// 			'b_id'=>sec($data[0]->b_id),
		// 			'b_title'=>$data[0]->b_title,
		// 			'b_content'=>$data[0]->b_content,
		// 			'b_img'=>$data[0]->b_img,
		// 			'b_img_full'=>$img1,
		// 		);

		// 		$res = array('res'=>'1','data'=>$arr_val);
		// 	}
		// 	else
		// 	{
		// 		$res = array('res'=>'0','msg'=>"Something went Wrong! Error Code #5421134");
		// 	}
		// }
		// echo json_encode($res);
  //   }

    public function delete_ad_file()
	{
		isajax();
		$ad_id = sec($this->input->post('id'),'d');
		$data['ad_status'] = "2";

		if(!empty($ad_id) && is_numeric($ad_id))
		{

			$tdata= $this->HomeDb->getDetailedData(array('*'),'ad_admin_download',array("ad_id"=>$ad_id,"ad_status"=>'1'));
			
			if(!empty($tdata))
			{

				if($this->HomeDb->update($data,"ad_admin_download",array("ad_id"=>$ad_id)))
				{
					$res = array("res"=>1,"msg"=>"Download File deleted Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
			}
			else
				$$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");
		}
		else
		{
			$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421135");
		}
		echo json_encode($res);
	}

}
