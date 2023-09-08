<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otp_back_controller extends CI_Controller {

	public function view_page()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();
    	
    	$js = array(
				'js/otp.js',
				"js/common.js",
		);

        $data['js']=array_merge($data['js'],$js);
		

		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'OTP Settings',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/otp_status',$data);
	}

	public function otp_active()
	{
		isajax();
		$data['lo_status'] = not($this->input->post('otp'),'2');


		if ($this->HomeDb->update($data,"lo_login_otp_settings",array("lo_id"=>'1'))) 
		{
			if ($data['lo_status'] == '1') 
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
	public function otp_default()
	{
		isajax();
		$data = $this->HomeDb->getDetailedData(array('lo_status'),'lo_login_otp_settings');
		if (!empty($data)) 
		{
			$res = array('res'=>'1','data'=>$data);
		}
		else
		{
			$res = array('res'=>'0','msg'=>'Disable');
		}
		echo json_encode($res);
	}
}