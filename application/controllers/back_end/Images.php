<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}
	public function upload_asset_photo()
	{

		$control = $this->input->post('item');
		$count = 0;
		if($control=='files')
		{
			$session = 'product_photos';
			if($this->session->userdata($session))
			{
				$sessimg = $this->session->userdata[$session]['images'];

				$count  = count($sessimg);
			}
			$path='assets/uploads/product/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		} 
		else
		{
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		}

		$uploadPath = './'.$path;
		$data_img_id=array();  
		if (!is_dir($uploadPath))
		{
			mkdir($uploadPath, 0755, TRUE);
		}
		$temp_path=date("Y").'/'.date("m").'/';
		$path = $path.$temp_path;
		$uploadPath = './'.$path;
		if (!is_dir($uploadPath))
		{
			mkdir($uploadPath, 0755, TRUE);
		}
		$config['upload_path'] = $uploadPath;
		$config['remove_spaces'] = FALSE;
		$config['max_size'] = '5120'; 
		$this->load->library('upload', $config);
		$file_data=array();
		$imgs=array();
		$flag=true;

		foreach($_FILES as $n)
		{



			$namearray=explode(".",$n['name']);
			$_FILES['userFile']['name'] = preg_replace('/\s+/', '-',$n['name']);
			$_FILES['userFile']['type'] = $n['type'];
			$_FILES['userFile']['tmp_name'] = $n['tmp_name'];
			$_FILES['userFile']['error'] = $n['error'];
			$_FILES['userFile']['size'] = $n['size'];


			$this->upload->initialize($config);
			if($this->upload->do_upload('userFile'))
			{
				$fileData = $this->upload->data();
				$uploadData =  $uploadPath.$fileData['file_name'];
				$images=array();
				if($this->session->userdata($session))
				{
					$images = $this->session->userdata[$session]['images'];
				}
				$images[]= $temp_path.$fileData['file_name'];
				$this->session->set_userdata($session,array("images"=>$images));



				$filepath = $temp_path.$fileData['file_name'];
				$file_data[]=array(
					"filepath"=>$filepath,
					"filepathfull"=>$path.$fileData['file_name'],
					"filename"=>$fileData['file_name'],
					"filesize"=>$fileData['file_size']); 
				$count+=1;               
			}
			else
			{
				$flag=false;
				$error = $this->upload->display_errors();
				break;
			}



		}

		if($flag)
		{
			if(!empty($file_data))
			{
				echo json_encode(array("msg"=>1,"data"=>$file_data,"count"=>count($file_data)));
			}
			else 
			{
				echo json_encode(array("msg"=>0,'error' => $this->upload->display_errors()));
			}

		}
		else
		{
			echo json_encode(array("msg"=>1,'error' => $error,"data"=>$file_data));
		}



	}
 
public function editGallery_filegroups1()
{
	echo json_encode(array('res'=>"success"));

}


public function delete_img()
{
	$item = $this->input->post('item');
	
	$path = $this->input->post('path');
	
	if($item=='files')
	{

		$session = 'product_photos';
		$path='assets/uploads/product/';

	}
	
	$images = $this->session->userdata['product_photos']['images'];

	if(!empty($images))
	{
		$key = array_search($path, $images);
		if($key>=0) 
		{
			if($this->session->userdata('del_'.$session))
			{
				$del_images = $this->session->userdata('del_'.$session);
				$del_images[] = $images[$key];
				$this->session->set_userdata('del_'.$session, $del_images);
			}
			unset($images[$key]);
			if($session=='download_upfile' || $session=='download_preimg')
				$this->session->unset_userdata($session);
			else
				$this->session->set_userdata($session,array("images"=>$images));
			echo json_encode(array("res"=>1,"msg"=>'Image deleted!'));
		}
		else
			echo json_encode(array("res"=>0, "msg"=>'Invalid image!'));
	}
	else
		echo json_encode(array("res"=>0,"msg"=>'Image not deleted!'));
}
}
