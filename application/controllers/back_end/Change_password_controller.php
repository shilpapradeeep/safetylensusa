<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password_controller extends CI_Controller {

	public function change_pwd()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$js = array(
				"js/change_password.js",
				"js/common.js",
		);
        $data['js']=array_merge($data['js'],$js);

		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Change Password',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/change_password',$data);
	}

	public function submit_change_pwd()
	{
		isajax();
		
		$sess = $this->session->userdata('l_uid');

		$this->form_validation->set_message('required','Please Enter %s');
		$this->form_validation->set_message('is_unique','%s already exist.');
		$this->form_validation->set_rules('current_pwd','current password','trim|required|callback_check_password');
		$this->form_validation->set_rules('new_pwd','new password','trim|required');
		$this->form_validation->set_rules('confirm_pwd','confirm password','trim|required|callback_check_confirm');


		if($this->form_validation->run())     
    	{ 
			$user_check=$this->HomeDb->getDetailedData(array('l_password','l_unique_id'),'l_login',array('l_id'=>sec($sess['l_id'],'d')));
			$unique = $user_check[0]->l_unique_id;
			$upassword = encrypt_pwd($unique,$this->input->post('confirm_pwd'));
			$data['l_password'] = $upassword;

			$l_id = sec($sess['l_id'],'d');

			if(is_numeric($l_id))
			{
				$tdata= $this->HomeDb->getData('l_login',array("l_id"=>$l_id,"l_login_status"=>'1'));
				
				if(!empty($tdata))
				{
					if($this->HomeDb->update($data,"l_login",array("l_id"=>$l_id)))
					{
						$res = array("res"=>1,"msg"=>"Password Changed Successfully");
					}
					else
						$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
				}
				else
					$res = array("res"=>0,"msg"=>"Invalid User choosed.");
			}
			else
				$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");	
			
		}
		else
	    {    
	        $errors = $this->form_validation->error_array();
	        $res = array("res"=>0,"errors"=>$errors);
	    }
		echo json_encode($res);


	}
	public function check_password($str)
	{
		if (!empty($str)) 
		{
			$sess = $this->session->userdata('l_uid');
			$user_check=$this->HomeDb->getDetailedData(array('l_password','l_unique_id'),'l_login',array('l_id'=>sec($sess['l_id'],'d')));
			if (!empty($user_check)) 
			{
				$unique = $user_check[0]->l_unique_id;
				$upassword = encrypt_pwd($unique,$str);
				if ($user_check[0]->l_password == $upassword) 
				{
					return TRUE;
				}
				else
				{
					$this->form_validation->set_message('check_password', 'Password not match.');
			        return FALSE;
				}
			}
			else
			{
				$this->form_validation->set_message('check_password', 'Please Enter Password.');
			        return FALSE;
			}
		}
		else
		{
			$this->form_validation->set_message('check_password', 'Please Enter Password.');
	        return FALSE;	
		}
		
		
	}
	public function check_confirm($str)
	{
		
		if ($this->input->post('new_pwd') == $str) 
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_confirm', 'Password not match.');
            return FALSE;
		}
	}
	
}
