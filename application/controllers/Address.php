<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

function __construct()
   {
      parent::__construct();
      $this->load->library('Globals');
      
   }
	

	public function add_address()
	{
		
		
// 		$this->load->helper("email_helper");	

		$this->form_validation->set_rules('ship_fname', 'First Name', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('ship_lname', 'Last name', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('ship_phone', 'Your Phone', 'trim|required|required|callback_validate_mobile|callback_checkuserphoneexits');
		$this->load->helper("email_helper");
		$this->form_validation->set_rules('ship_email', 'Your Email', 'required|required|trim|valid_email|callback_checkuserexits');
	
		$this->form_validation->set_rules('ship_street', 'Street', 'trim|required|min_length[3]|max_length[255]');
 		$this->form_validation->set_rules('ship_addr', 'Address', 'trim|required');
		$this->form_validation->set_rules('ship_city', 'City', 'trim|required|min_length[3]|max_length[60]');
		
		$this->form_validation->set_rules('ship_state', 'State', 'trim|required|min_length[3]|max_length[60]');
$this->form_validation->set_rules('ship_ctry', 'Country', 'trim|min_length[3]|max_length[60]');

		$this->form_validation->set_rules('ship_zip', 'Zip Code', 'trim|required|min_length[3]|max_length[6]');
		
		
		
		$this->form_validation->set_message('min_length','%s must be 8 characters or above in length.');
        $this->form_validation->set_message('max_length','%s must be below 20 characters.');
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
			
			
			$lid = sec($this->session->userdata['l_uid']['l_id'],'d');
			$mem = $this->HomeDb->getData('m_member',array("m_l_id"=>$lid));
			$data_address = array(
				'ua_fname'=>noHtml($this->input->post('ship_fname')),
				'ua_lname'=>noHtml($this->input->post('ship_lname')),
				'ua_email'=>noHtml($this->input->post('ship_email')),
				'ua_phone'=>noHtml($this->input->post('ship_phone')),
				'us_address'=>noHtml($this->input->post('ship_addr')),
				'ua_street'=>noHtml($this->input->post('ship_street')),
				'ua_city'=>noHtml($this->input->post('ship_city')),
				'ua_state'=>noHtml($this->input->post('ship_state')),
				'ua_zip'=>noHtml($this->input->post('ship_zip')),
				'ua_country'=>'USA',
				'ua_type'=>noHtml($this->input->post('add_type')),
				'ua_user'=>$mem[0]->m_id
				
			);
            $insert_id = $this->HomeDb->insert($data_address, 'ua_address');
					if($insert_id)
					{
						$info['address'] = array("id"=>sec($insert_id),
							"name"=>$data_address['ua_fname'].''.$data_address['ua_lname'],
							"address"=>$data_address['ua_fname'],
							"street"=>$data_address['ua_street'],
							"city"=>$data_address['ua_city'],
							"state"=>$data_address['ua_state'],
							"zip"=>$data_address['ua_zip'],
							"phone"=>$data_address['ua_phone'],
							"email"=>$data_address['ua_email'],
							"type"=>$data_address['ua_type']);
						$addressDiv = $this->load->view('front_end/inc/address/div_addreslist',$info,true);
						$res = array("res"=>1,"msg"=>"Address added successfully",'newDiv'=>$addressDiv);
					}
					else
					{
						$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #852741");
					}
			//**********************Mail Send end**************************//
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
	public function sub_otp()
	{
		isajax();
    
        $data = $this->get_lo();
			
			if ($data[0]->lo_status == "1") 
			{
    			$this->form_validation->set_rules('otp', 'OTP', 'required|trim|callback_checkotp');
    			
                $this->form_validation->set_message('min_length','ah, it seems like the details you entered is not enough !');
                $this->form_validation->set_message('max_length','ah, %s contains data which exceeds our limit.');
                $this->form_validation->set_message('required','Please Enter %s');
                
                if ($this->form_validation->run() == false) 
         		{
         			$validation = '0';
         		}
         		else
         		{
         			$validation = '1';
         		}
			}
			else
			{
			    $validation = '1';
			}

            if ($validation == '0') 
         	{
     
     			$errors = $this->form_validation->error_array();
	            
	            
		            $res    = array(
		                "res" => 0,
		                "errors" => $errors
		            );
	            
	        } 
	        else 
	        {
	        // 	$uname = $this->session->userdata['sgdata']['l_name'];
	        // 	$uemail = $this->session->userdata['sgdata']['l_username'];
	        // 	$new_password = $this->session->userdata['sgdata']['l_password'];
	        // 	$uniqueid = $this->session->userdata['sgdata']['l_unique_id'];
	        	
	        // 	$uphone = $this->session->userdata['sgdata']['m_phone'];


	        // $login_insert = array(
			// 	'l_name'=>$uname,
			// 	'l_username'=>$uemail,
			// 	'l_phone'=>$uphone,
			// 	'l_password'=>$new_password,
			// 	'l_unique_id'=>$uniqueid,
			// 	'l_type'=>2
			// );
	        $this->db->trans_start();
			$l_id= $this->HomeDb->insert($this->session->userdata['sgdata'], 'l_login');
			$address_data = $this->session->userdata('sgaddressdata');
			$user_insert = array(
				'm_l_id'=>$l_id,
				'm_name'=>$this->session->userdata['sgdata']['l_name'],
				'm_lname'=>$this->session->userdata['sgdata']['l_last_name'],
				'm_phone'=>$this->session->userdata['sgdata']['l_phone'],
				'm_email'=>$this->session->userdata['sgdata']['l_username'],
				'm_photo'=>$this->session->userdata['sgdata']['l_phone']
			);

			$m_id= $this->HomeDb->insert($user_insert, 'm_member');
			$address_data['ua_user'] = $m_id;
			$this->HomeDb->insert($address_data, 'ua_address');
			$this->db->trans_complete();
			if($this->db->trans_status())
			{

				$sess=array(
					'l_id'=>sec($l_id),
					'l_name'=>sec($this->session->userdata['sgdata']['l_name']),
					'l_username'=>sec($this->session->userdata['sgdata']['l_username']),
					'l_type'=>sec(2)
				);
				$this->load->helper('cookie');
				set_cookie('mhl_u_global_regenerate_id',sec($l_id),time()+60*60*24*30);
				$this->session->set_userdata('l_uid',$sess);
				$this->session->unset_userdata('sgdata');
				$this->session->unset_userdata('otp');
				$mdata['mailData']=array(
                   	'm_name'=>$uname,
                   	'm_email'=>$uemail
                   );
                //    $mdata['mailData']['subject']='New Sign In';
                //    $mdata['type']='sign-up';
        
                //     $str=get_instance()->essential->mail_send($mdata);
				
				$res    = array(
					"res" => 1,
					"type" =>sec($this->session->userdata['l_uid']['l_type'],'d'),
					"msg" => "Logged In"
				);

			}
			else
			{
				tsi($this->db->error());
				$this->db->trans_rollback();
				
				$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #852741");
			}
			    

	        	
            }


      echo json_encode($res);
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
	function checkotp($str)
	{
	  if(!empty($str))
	  {
			$otp = sec($this->session->userdata['otp'],'d');

			if($str!=$otp)
			{
			      $this->form_validation->set_message('checkotp', "OTP doesn't matches ");
			      return FALSE;
			 }
			
	}
	return TRUE;
	}
	function get_lo()
	{
		$data = $this->HomeDb->getDetailedData(array('lo_status'),'lo_login_otp_settings');
		return $data;
	}
	function add_address_to_session()
	{
		$cart['shipping'] = noHtml($this->input->post('shipping'));
		$cart['billing'] = noHtml($this->input->post('billing'));
		$this->session->set_userdata("cart_address",$cart);
		if($this->session->userdata("cart_address"))
			$res = array("res"=>1);
		else
			$res = array("res"=>0);
		echo json_encode($res);

	}
	function guest_address()
	{
		
		$this->load->library("form_validation");
		if(!$this->input->post('address_checkbox'))
		{
		$this->form_validation->set_rules('ship_fname', 'First Name', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('ship_lname', 'Last name', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('ship_phone', 'Your Phone', 'trim|required|required|callback_validate_mobile|callback_checkuserphoneexits');
		$this->load->helper("email_helper");
		$this->form_validation->set_rules('ship_email', 'Your Email', 'required|required|trim|valid_email');
	
		$this->form_validation->set_rules('ship_street', 'Street', 'trim|required|min_length[3]|max_length[255]');
 		$this->form_validation->set_rules('ship_addr', 'Address', 'trim|required');
		$this->form_validation->set_rules('ship_city', 'City', 'trim|required|min_length[3]|max_length[60]');
		
		$this->form_validation->set_rules('ship_state', 'State', 'trim|required|min_length[3]|max_length[60]');
        $this->form_validation->set_rules('ship_ctry', 'Country', 'trim|required|min_length[3]|max_length[60]');

		$this->form_validation->set_rules('ship_zip', 'Zip Code', 'trim|required|min_length[3]|max_length[6]');
	}
		
			$this->form_validation->set_rules('bill_fname', 'First Name', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('bill_lname', 'Last name', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('bill_phone', 'Your Phone', 'trim|required|required|callback_validate_mobile|callback_checkuserphoneexits');
		$this->load->helper("email_helper");
		$this->form_validation->set_rules('bill_email', 'Your Email', 'required|required|trim|valid_email');
	
		$this->form_validation->set_rules('bill_street', 'Street', 'trim|required|min_length[3]|max_length[255]');
 		$this->form_validation->set_rules('bill_addr', 'Address', 'trim|required');
		$this->form_validation->set_rules('bill_city', 'City', 'trim|required|min_length[3]|max_length[60]');
		
		$this->form_validation->set_rules('bill_state', 'State', 'trim|required|min_length[3]|max_length[60]');
$this->form_validation->set_rules('bill_ctry', 'Country', 'trim|min_length[3]|max_length[60]');

		$this->form_validation->set_rules('bill_zip', 'Zip Code', 'trim|required|min_length[3]|max_length[6]');
		
		
		
		$this->form_validation->set_message('min_length','%s must be 8 characters or above in length.');
        $this->form_validation->set_message('max_length','%s must be below 20 characters.');
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
			
			$billing = array(
				'ua_fname'=>noHtml($this->input->post('bill_fname')),
				'ua_lname'=>noHtml($this->input->post('bill_lname')),
				'ua_email'=>noHtml($this->input->post('bill_email')),
				'ua_phone'=>noHtml($this->input->post('bill_phone')),
				'us_address'=>noHtml($this->input->post('bill_addr')),
				'ua_street'=>noHtml($this->input->post('bill_street')),
				'ua_city'=>noHtml($this->input->post('bill_city')),
				'ua_state'=>noHtml($this->input->post('bill_state')),
				'ua_zip'=>noHtml($this->input->post('bill_zip')),
				'ua_country'=>'USA',
				'ua_type'=>1,
				'ua_user'=>null);
				
			if($this->input->post('address_checkbox')==1)
				$shipping = 1;
			else
			{
				$shipping = array(
				'ua_fname'=>noHtml($this->input->post('ship_fname')),
				'ua_lname'=>noHtml($this->input->post('ship_lname')),
				'ua_email'=>noHtml($this->input->post('ship_email')),
				'ua_phone'=>noHtml($this->input->post('ship_phone')),
				'us_address'=>noHtml($this->input->post('ship_addr')),
				'ua_street'=>noHtml($this->input->post('ship_street')),
				'ua_city'=>noHtml($this->input->post('ship_city')),
				'ua_state'=>noHtml($this->input->post('ship_state')),
				'ua_zip'=>noHtml($this->input->post('ship_zip')),
				'ua_country'=>'USA',
				'ua_type'=>2,
				'ua_user'=>null);

				
			}
			$this->session->set_userdata('cart_address',array("shipping"=>$shipping,"billing"=>$billing));
			if($this->session->userdata('cart_address'))
			{
				$res    = array(
				"res" => 1,
				
				);
			}
			else
			{
				$res    = array(
				"res" => 0,
				"msg" => 'Something went wrong'
				);
			}
				
				
		}
		
		echo json_encode($res);
	}

}
	