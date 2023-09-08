<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {

	public function fp_form()
	{
		$data['css']=array('css/all.min.css',
							'css/ionicons.min.css',
							'css/themify-icons.css',
							'css/linearicons.css',
							'css/flaticon.css',
							'css/simple-line-icons.css',
							'owlcarousel/css/owl.carousel.min.css',
							'owlcarousel/css/owl.theme.css',
							'owlcarousel/css/owl.theme.default.min.css',
							'css/magnific-popup.css',
							'css/slick.css',
							'css/slick-theme.css',
							"iziToast-master/dist/css/iziToast.min.css",
							'css/style.css',
							'css/responsive.css');
		$data['css_url']=array('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap',
							'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap');
		$data['js']=array('js/jquery-1.12.4.min.js',
							'js/popper.min.js',
							'bootstrap/js/bootstrap.min.js',
							'owlcarousel/js/owl.carousel.min.js',
							'js/magnific-popup.min.js',
							'js/waypoints.min.js',
							'js/parallax.js',
							'js/jquery.countdown.min.js',
							'js/Hoverparallax.min.js',
							'js/jquery.countTo.js',
							'js/imagesloaded.pkgd.min.js',
							'js/isotope.min.js',
							'js/jquery.appear.js',
							'js/jquery.parallax-scroll.js',
							'js/jquery.dd.min.js',
							'js/slick.min.js',
							'iziToast-master/dist/js/iziToast.min.js',
							'js/jquery.elevatezoom.js',
							'js/scripts.js',
							'js/common/common.js');	
		
		
		$this->load->view('front_end/forgot-password',$data);
	}
	public function email_check()
	{
		isajax();
		$this->load->helper("email_helper");	

			
			$this->form_validation->set_rules('uemail', 'Your Email', 'required|trim|valid_email|callback_checkuserexits');
			
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
	        	
	        	/*$otp = activation_code();
	        	mail("shilpathreeseas@gmail.com","OTP",$otp); */
	        		$otp = activation_code();
		
			$this->session->set_userdata('otp', sec($otp));
	//**********************Mail Send start*************************//
			                
           $data['mailData']=array(
           	'm_name'=>noHtml($this->input->post('uemail')),
           	'm_email'=>noHtml($this->input->post('uemail')),
           	'otp'=>$otp
           );
           $data['mailData']['subject']='OTP';
           $data['type']='forgot-password-otp';

            $str=get_instance()->essential->mail_send($data);
            

            if($str==1)
	        {
	        	$rg_res = $this->HomeDb->getData("l_login", array("l_login_status"=>'1',"l_username"=>trim($this->input->post('uemail')),"l_type"=>'2'));
	        	
	        	$res = array("res"=>1,"uid"=>sec($rg_res[0]->l_id),"msg"=>"Please enter the otp send to your email address");
	        }
	        else
	        	$res = array("res"=>0,"msg"=>"Unable to send mail. Error Code #852741");

  
      //**********************Mail Send end**************************//

	    

	        	
			    

	        	
            }


      echo json_encode($res);
	}
	public function sub_otp()
	{
		isajax();


			
			$this->form_validation->set_rules('otp', 'OTP', 'required|trim|callback_checkotp');
			
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
	        	
	        	/*$otp = activation_code();
	        	mail("shilpathreeseas@gmail.com","OTP",$otp); */
	        	$res = array("res"=>1,"msg"=>"Please enter your new password");
			    

	        	
            }


      echo json_encode($res);
	}
	public function sub_new_pass()
	{
		isajax();


			
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

	function checkuserexits($str)
	{
	  if(!empty($str))
	  {
	   
	  
	    $rg_res = $this->HomeDb->getData("l_login", array("l_login_status"=>'1',"l_username"=>$str,"l_type"=>'2'));
	    if (empty($rg_res))
	    {
	      $this->form_validation->set_message('checkuserexits', "Invalid username #4501");
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

}
