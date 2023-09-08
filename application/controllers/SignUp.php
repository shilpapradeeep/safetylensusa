<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {

	public function s_page()
	{

		if(!empty($this->session->userdata('l_uid')))
		{
		    $se=$this->session->userdata('l_uid');
		    
		    if(sec($se['l_type'],'d')==1)
		        redirect('dashboard','refresh');
		    elseif(sec($se['l_type'],'d')==2)
		       redirect('account','refresh');
		    else
		      {
		          
		      }
		}
		$this->load->view('front_end/sign-up');
	}

	public function s_submit()
	{
		isajax();
		
// 		$this->load->helper("email_helper");	

		$this->form_validation->set_rules('fname', 'First Name', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('lname', 'Last name', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('uphone', 'Your Phone', 'trim|required|callback_validate_mobile|callback_checkuserphoneexits');
		$this->load->helper("email_helper");
		$this->form_validation->set_rules('uemail', 'Your Email', 'required|trim|valid_email|callback_checkuserexits');
	
 		$this->form_validation->set_rules('uaddress', 'Address', 'trim|min_length[3]|max_length[255]');
		$this->form_validation->set_rules('ucity', 'City', 'trim|min_length[3]|max_length[60]');
		
		$this->form_validation->set_rules('ustate', 'State', 'trim|min_length[3]|max_length[60]');
		$this->form_validation->set_rules('uzip', 'Zip Code', 'trim|min_length[3]|max_length[6]');
		
		
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
			
			
			$upassword = noHtml($this->input->post('upassword'));
			$uniqueid = random_num(32);
			$new_password = encrypt_pwd($uniqueid,$upassword);
			$login_insert = array(
				'l_name'=>noHtml($this->input->post('fname')),
				'l_last_name'=>noHtml($this->input->post('lname')),
				'l_username'=>noHtml($this->input->post('uemail')),
				'l_password'=>$new_password,
				'l_unique_id'=>$uniqueid,
				'l_phone'=>noHtml($this->input->post('uphone')),
				'l_type'=>sec($this->input->post('l_type'),'d')
				
			);
			$this->db->trans_start();
			$l_id= $this->HomeDb->insert($login_insert, 'l_login');

			$user_insert = array(
				'm_l_id'=>$l_id,
				'm_name'=>noHtml($this->input->post('fname')),
				'm_lname'=>noHtml($this->input->post('lname')),
				'm_phone'=>noHtml($this->input->post('uphone')),
				'm_email'=>noHtml($this->input->post('uemail')),
				'm_photo'=>''
			);
			$m_id= $this->HomeDb->insert($user_insert, 'm_member');
			
			$address_insert = array(
			    'ua_fname'=>noHtml($this->input->post('fname')),
			    'ua_lname'=>noHtml($this->input->post('lname')),
			    'ua_email'=>noHtml($this->input->post('uemail')),
			    'ua_phone'=>noHtml($this->input->post('uphone')),
				'ua_user'=>$m_id,
				'us_address'=>noHtml($this->input->post('uaddress')),
				'ua_zip'=>noHtml($this->input->post('uzip')),
				'ua_street'=>noHtml($this->input->post('usuite')),
				'ua_city'=>noHtml($this->input->post('ucity')),
				'ua_state'=>noHtml($this->input->post('ustate')),
				'ua_country'=>noHtml($this->input->post('ucountry'))
			);
			$a_id= $this->HomeDb->insert($address_insert, 'ua_address');
			$this->db->trans_complete();
			if($this->db->trans_status())
			{

				$sess=array(
					'l_id'=>sec($l_id),
					'l_name'=>sec(noHtml($this->input->post('fname')).' '.noHtml($this->input->post('lname'))),
					'l_username'=>sec(noHtml($this->input->post('uemail'))),
					'l_type'=>sec(2)
				);
				$this->load->helper('cookie');
				set_cookie('mhl_u_global_regenerate_id',sec($l_id),time()+60*60*24*30);
				$this->session->set_userdata('l_uid',$sess);
			
				
			//**********************Mail Send start*************************//
    			$mdata['mailData']=array(
    				'm_name'=>noHtml($this->input->post('fname')).' '.noHtml($this->input->post('lname')),
    				'm_email'=>noHtml($this->input->post('uemail'))
    			);
    		    $mdata['mailData']['subject']='New Sign In';
    		    $mdata['type']='sign-up';
    
    		    $str=get_instance()->essential->mail_send($mdata);
			//**********************Mail Send start*************************//    
				    
				$this->session->set_flashdata('success', 'Thank you for registering with Safetylensusa.');
				$res    = array(
					"res" => 1,
					"type" =>sec($this->session->userdata['l_uid']['l_type'],'d'),
					"msg" => "Logged In"
				);

			}
			else
			{
			    $this->db->trans_rollback();
				$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #852741");
			}
      	}
			echo json_encode($res);
	}
	function validate_mobile($str)
	{
		if(!empty($str))
		{
			$pattern = "^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$^";
			if (!preg_match($pattern, $str))
			{
				$this->form_validation->set_message('validate_mobile', 'Mobile Number must be valid.');
				return FALSE;
			}
		}
		return TRUE;
	}
	function checkuserexits($str)
	{
	  if(!empty($str))
	  {

	     $rg_res = $this->HomeDb->getData("m_member", array("m_status"=>'1',"m_email"=>$str));

			    if(!empty($rg_res))
			    {
			      $this->form_validation->set_message('checkuserexits', "User already registered #852742");
			      return FALSE;
			    }
			
	}
	return TRUE;
	}


	function checkuserphoneexits($str)
	{
	  if(!empty($str))
	  {

	   
	  			
			    $rg_res = $this->HomeDb->getData("m_member", array("m_status"=>'1',"m_phone"=>$str));
			   
			    if(!empty($rg_res))
			    {
			      $this->form_validation->set_message('checkuserphoneexits', "Phone number is already registered #852743");
			      return FALSE;
			    }
			
	}
	return TRUE;
	}



	}
	