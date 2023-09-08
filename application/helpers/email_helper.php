<?php defined('BASEPATH') OR exit('No direct script access allowed');

function mail_send($msg_content,$data)
{
	$CI=get_instance();
	$CI->config->load('email',true);
	$from=$CI->config->item('smtp_user','email');
	$from='shilpapradeep424@gmail.com';
	$CI->load->library('email'); 
	$CI->email->from($from, 'Safetylensusa');
	$CI->email->to($data['mailData']['email'],$data['mailData']['uname']);
	$CI->email->subject($data['mailData']['subject']);
	$CI->email->message($msg_content); 
	if(!empty($data['pdf_path']))
		 $CI->email->attach($data['pdf_path']);
	if($CI->email->send())
	{
		return true;
	}
	else
	{
		$val_error= $CI->email->print_debugger();
		$err_arr=array('from_email'=>$from,'error'=>$val_error);
		return $err_arr;
	}
}