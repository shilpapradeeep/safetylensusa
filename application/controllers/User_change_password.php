<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_change_password extends CI_Controller {

	public function chng_pass()
	{

		
		
		 if( !empty($this->session->userdata['l_uid']) && sec($this->session->userdata['l_uid']['l_type'],'d') == 2) 
		 {  
				$this->load->view('front_end/user-change-password');
		 }
		 else 
		 	redirect('login','refresh');

	}
	public function sub_new_pass()
	{
		isajax();


			$this->form_validation->set_rules('cu_password', 'Current Password', 'required|trim|min_length[8]|max_length[20]call|callback_check_current_pass');
			$this->form_validation->set_rules('upassword', 'Password', 'required|trim|min_length[8]|max_length[20]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|min_length[8]|max_length[20]|matches[upassword]');
			
            $this->form_validation->set_message('min_length','Password must be 8 characters or above in length.');
            $this->form_validation->set_message('max_length','Password must be below 20 characters.');
            $this->form_validation->set_message('required','Please Enter %s');

            if ($this->form_validation->run() == false) 
         	{
     
     			$errors = $this->form_validation->error_array();
	            
	            
		            $res    = array(
		                "res" => 0,
		                "errors" => $errors
		            );
	            
	        } 
	        else 
	        {
	        	
	        	$uid = sec($this->input->post('user_id'),'d');
	        	$lg_res = $this->HomeDb->getData("l_login", array("l_login_status"=>'1',"l_id"=>$uid,"l_type"=>'2'));

	        	if(!empty($lg_res))
					{
						$unique_id = $lg_res[0]->l_unique_id;
						$upassword = encrypt_pwd($unique_id,trim($this->input->post('upassword')));
						$data_to_insert= array('l_password'=>$upassword);

						if($this->HomeDb->update($data_to_insert,"l_login",array("l_id"=>$uid,"l_login_status"=>'1')))
						{
                            //************Mail Send start************//
                                if(!empty($lg_res[0]->l_name) && !empty($lg_res[0]->l_username))
                					{
                						$data['mailData']=array(
                							'm_name'=>$lg_res[0]->l_name,
                							'm_email'=>$lg_res[0]->l_username
                						);
                						$data['mailData']['subject']='Change Password';
                						$data['type']='change-my-password';
                						$str=get_instance()->essential->mail_send($data);
                					}
            					
            
                             //************Mail Send end************//

							$res = array("res"=>1,"msg"=>"Password changed successfully");
						}
						else
							$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5023");
					}
					else
						$res = array("res"=>0,"msg"=>"Invalid Username.");
			    

	        	
            }


      echo json_encode($res);
	}
	function check_current_pass($pwd)
		{
			
			if(!empty($pwd))
			{
				$uid = sec($this->session->userdata['l_uid']['l_id'],'d');
				$user_check=$this->HomeDb->getDetailedData(array('l_password','l_unique_id'),'l_login',array('l_id'=>$uid));
				

				if(!empty($user_check))
				{
					     
		      			 $exst_pwd=encrypt_pwd($user_check[0]->l_unique_id,$pwd);
		      			 if(empty(strcmp($exst_pwd, $user_check[0]->l_password))) 
		      			 {
		      				return TRUE;
						 } 
						 else 
						 {
						    $this->form_validation->set_message('check_current_pass', 'Current Password is incorrect.');
						    return FALSE;
						 }
				}
			}
			
		return TRUE;
			


		}
		
}
	