<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Profile extends CI_Controller {

	public function u_page()
	{
		if( !empty($this->session->userdata['l_uid']) && sec($this->session->userdata['l_uid']['l_type'],'d') == 2) 
		 {  
				$this->load->view('front_end/profile');
		 }
		 else 
		 	redirect('login','refresh');

	}
	public function v_page()
	{

		isajax();

		if(!empty($this->session->userdata['l_uid']['l_id']))
		{

			$select = array('m_id','m_name','m_lname','m_phone','m_email','m_photo');
			$result['member'] = $this->HomeDb->getDetailedData($select,'m_member m',array('m.m_l_id'=>sec($this->session->userdata['l_uid']['l_id'],'d'),'m_status'=>'1'),null,null,array("m.m_id","desc"));
			$result['address'] = $this->HomeDb->getDetailedData(array('ua_id','us_address','ua_zip','ua_street','ua_city','ua_state','ua_country'),'ua_address ua',array('ua.ua_user'=>$result['member'][0]->m_id,'ua.ua_status'=>'1'),null,null,array("ua.ua_id","desc"));
			//tsi($result['member']);

			if(!empty($result['member']))
			{
				$profile = $this->load->view('front_end/inc/profile/user-profile',$result,true);

				$res = array("res"=>1,"html"=>$profile);
			}
		    else
		    	$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #658521");
		}
		else
		   $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #658522");


		echo json_encode($res);
	}
	public function e_page()
	{

		isajax();

		if(!empty($this->session->userdata['l_uid']['l_id']))
		{

			$select = array('m_id','m_name','m_lname','m_phone','m_email','m_photo');
			$result['member'] = $this->HomeDb->getDetailedData($select,'m_member m',array('m.m_l_id'=>sec($this->session->userdata['l_uid']['l_id'],'d'),'m_status'=>'1'),null,null,array("m.m_id","desc"));
			//tsi($result['member']);

			if(!empty($result['member']))
			{
				$profile = $this->load->view('front_end/inc/profile/edit-profile',$result,true);

				$res = array("res"=>1,"html"=>$profile);
			}
		    else
		    	$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #658523");
		}
		else
		   redirect('dashboard','refresh');

		
		echo json_encode($res);
	}
	public function profile_upload()
	{

		isajax();

		$this->load->library('essential');
		$img=$this->essential->file_upload_new('ThreeSeasInfologics/uploads/members/','profile-img');
		echo json_encode($img);

	}
	public function pf_edit()
	{
		//isajax();
		$this->form_validation->set_rules('uname', 'Username', 'required|trim|min_length[3]|max_length[55]');

		$this->form_validation->set_rules('lname', 'Last name', 'required|trim|min_length[3]|max_length[50]');
		
		$this->form_validation->set_message('min_length','ah, it seems like the details you entered is not enough !');
		$this->form_validation->set_message('max_length','ah, %s contains data which exceeds our limit.');
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
		 if( !empty($this->session->userdata['l_uid']['l_id']) ) {
			$profile_img = '';
			
			$uname = noHtml($this->input->post('uname'));
			$lname = noHtml($this->input->post('lname'));

			$mem_tbl_insert = array(
				'm_name'=>$uname,
				'm_lname'=>$lname
			);
			$lg_tbl_insert = array(
				'l_name'=>$uname,
				'l_last_name'=>$lname
			);

			
			if(!empty($this->input->post('p_id')) && is_numeric(
				sec($this->input->post('p_id'),'d')))
			{
				$m_id=sec($this->input->post('p_id'),'d');
				$this->db->trans_start();

			    $this->HomeDb->update($lg_tbl_insert,"l_login",array("l_id"=>sec($this->session->userdata['l_uid']['l_id'],'d'),"l_login_status"=>'1'));
				$this->HomeDb->update($mem_tbl_insert,"m_member",array("m_id"=>$m_id,"m_status"=>'1'));

				$this->db->trans_complete();
				if($this->db->trans_status())
				{
				    $this->session->userdata['l_uid']['l_name'] = sec($uname);
					$res = array("res"=>1,"username"=>$uname,"msg"=>"Profile Edited Successfully");
				}
				else
				  $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #658525");

				
			}
			else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #658526");
		   }
		   else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #658527");
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

	   if(!empty($this->input->post('p_id')) && is_numeric(
				sec($this->input->post('p_id'),'d')))
			{
	  			$m_id =sec($this->input->post('p_id'),'d');
	  			
			    $rg_res = $this->HomeDb->getData("m_member", array("m_id!="=>$m_id,"m_status"=>'1',"m_email"=>$str));

			    if(!empty($rg_res))
			    {
			      $this->form_validation->set_message('checkuserexits', "User already registered #658528");
			      return FALSE;
			    }
			}
	}
	return TRUE;
	}
	function checkuserphoneexits($str)
	{
	  if(!empty($str))
	  {

	   if(!empty($this->input->post('p_id')) && is_numeric(
				sec($this->input->post('p_id'),'d')))
			{
	  			$m_id =sec($this->input->post('p_id'),'d');
	  			
			    $rg_res = $this->HomeDb->getData("m_member", array("m_id!="=>$m_id,"m_status"=>'1',"m_phone"=>$str));
			   
			    if(!empty($rg_res))
			    {
			      $this->form_validation->set_message('checkuserphoneexits', "Phone number is already registered #658529");
			      return FALSE;
			    }
			}
	}
	return TRUE;
	}

	
	
}
	