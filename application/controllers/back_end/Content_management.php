<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_management extends CI_Controller
{
	public function home_banner()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

		$css = array(
					'libs/dropzone/min/dropzone.min.css',
				);
		$js = array(
				"libs/dropzone/min/dropzone.min.js",

				'js/home_banner.js',
				'js/common.js',
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Home Banner Management',
	      3=>'javascript:void(0)',
	    );
        $data['banner']=$this->HomeDb->getDetailedData(array('b.*'),'b_home_banner b',array('b.b_status'=>'1'),null,null,array('b.b_id','desc'));
		$this->load->view('back_end/home_banner',$data);

	}

	

	public function submit_home_banner()
	{
		isajax();

		$this->form_validation->set_message('required','Please Enter %s');
		$this->form_validation->set_message('is_unique','%s already exist.');
		$this->form_validation->set_rules('b_title1','Home Banner Title1','trim|required|min_length[3]|max_length[55]');
        $this->form_validation->set_rules('b_title2','Home Banner Title2','trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('b_title3','Home Banner Title3','trim|required|min_length[3]|max_length[55]');
        $this->form_validation->set_rules('b_title4','Home Banner Title4','trim|required|min_length[3]|max_length[55]');
        $this->form_validation->set_rules('b_title5','Home Banner Title5','trim|required|min_length[3]|max_length[100]');
       

		if($this->form_validation->run())
    	{ 

            $data = array(
                'b_title1'=>noHtml($this->input->post('b_title1')),
                'b_title2'=>noHtml($this->input->post('b_title2')),
                'b_title3'=>noHtml($this->input->post('b_title3')),
                'b_title4'=>noHtml($this->input->post('b_title4')),
                'b_title5'=>noHtml($this->input->post('b_title5'))
                );
			
			if(empty($this->input->post('b_id')))
			{
				
				$l_id = $this->HomeDb->insert($data,"b_home_banner");
				if(!empty($l_id))
				{
					$res = array("res"=>1,"msg"=>"Home Banner Added Successfully");
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
					$tdata= $this->HomeDb->getDetailedData(array('*'),'b_home_banner',array("b_id"=>$b_id,"b_status"=>'1'));
					
					if(!empty($tdata))
					{
						if($this->HomeDb->update($data,"b_home_banner",array("b_id"=>$b_id)))
						{
							$res = array("res"=>1,"msg"=>"Home Banner Edited Successfully");
						}
						else
							$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
					}
					else
						$res = array("res"=>0,"msg"=>"Invalid Home Banner choosed.");
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
    


}
