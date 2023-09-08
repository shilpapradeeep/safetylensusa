<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_controller extends CI_Controller {

	public function pre()
	{
		$this->load->library('Timthumb');
	}

	public function img_upload()
	{
		$file_name=$this->input->post('file_name');

		$path_type = explode('-', $file_name);

		if ($path_type[0] == "product_galary") 
		{
			$path = 'assets/uploads/product/';
		}
		elseif ($path_type[0] == "member") 
		{
			$path = 'assets/uploads/members/';
		}
		elseif ($path_type[0] == "blog") 
		{
			$path = 'assets/uploads/blog/';
		}
		elseif ($path_type[0] == "lead") 
		{
			$path = 'assets/uploads/lead/';
		}
		elseif ($path_type[0] == "ad_file") 
		{
			$path = 'assets/uploads/download/';
		}
		elseif ($path_type[0] == "media") 
		{
			$path = 'assets/uploads/media/'.','.$this->input->post('f_height').','.$this->input->post('f_width');
		}
        elseif ($path_type[0] == "brandlogo")
        {
            $path = 'assets/uploads/brandlogo/';
        }
        elseif ($path_type[0] == "brand")
        {
            $path = 'assets/uploads/brandimage/';
        }
	
		if(!empty($_FILES[$file_name]['name']))
		{
			$this->load->library('essential');
			$res1=$this->essential->file_upload_new($path,$file_name);
			echo json_encode($res1);
		}

	}
}
