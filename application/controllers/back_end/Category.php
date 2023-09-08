<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function cat_add()
	{
		$data['css']= css_link();
		$data['js'] = js_link();
		$data['js']=array_merge($data['js'],js_datatable());
		$data['css']=array_merge($data['css'],css_datatable());

		$css = array(
			"libs/select2/css/select2.min.css",
			'libs/dropzone/min/dropzone.min.css',
			'libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css',
			'libs/summernote/summernote-bs4.min.css',
		);
		$js = array(
			"libs/select2/js/select2.min.js",
			"libs/dropzone/min/dropzone.min.js",
			"libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js",
			'libs/bs-custom-file-input/bs-custom-file-input.min.js',
			'libs/tinymce/tinymce.min.js',
			'js/pages/form-element.init.js',
			'js/category.js',
			'js/common.js'
		);
		$data['css']=array_merge($data['css'],$css);
		$data['js']=array_merge($data['js'],$js);


		$data['bread_crum']=array(0=>'Dashboard',
			1=>'javascript:void(0)',
			2=>'Category Add',
			3=>'javascript:void(0)',
		);
		$this->load->view('back_end/category_add',$data);
	}
	public function cat_submit()
	{
		isajax();
		//tsi($_POST);
//|callback_checkcategoryUnique
		$this->form_validation->set_rules('cname', 'Category Name', 'required|trim|min_length[1]|max_length[30]|callback_checkcategoryUnique');
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

			$data_to_insert = array(
				'c_title'=>noHtml($this->input->post('cname'))
			);
			if(empty($this->input->post('h_id')))
			{
				if($q= $this->HomeDb->insert($data_to_insert, 'c_category')) 
					$res = array("res" => 1,"msg" => 'Your data has been successfully submitted');

				else 
					$res = array("res" => 0,"msg" => 'Something went Wrong. Error Code #4052');

			}
			else
			{
				$c_id = sec($this->input->post('h_id'),'d');
				if(is_numeric($c_id))
				{

					$sdata= $this->HomeDb->getData('c_category',array("c_id"=>$c_id,"c_status"=>'1'),null);

					if(!empty($sdata))
					{
						if($this->HomeDb->update($data_to_insert,"c_category",array("c_id"=>$c_id,"c_status"=>'1')))
						{


							$res = array("res"=>1,"msg"=>"Category Edited Successfully");
						}
						else
							$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5023");
					}
					else
						$res = array("res"=>0,"msg"=>"Invalid Category choosed.");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5024"); 
			}
		}


		echo json_encode($res);
	}
	function checkcategoryUnique($str)
	{
		if(!empty($str))
		{
			$id = $this->input->post('h_id');

			if(!empty($id))
			{
				$fid = sec($id,'d'); 
				if(!empty($fid)&&is_numeric($fid))
				{

					$rg_res = $this->HomeDb->getData("c_category", array("c_id!="=> $fid,"c_status"=>'1',"c_title"=>$str));
				}
				if (!empty($rg_res))
				{
					$this->form_validation->set_message('checkcategoryUnique', "Category already added.");
					return FALSE;
				}
			}
			else
			{
				$rg_res = $this->HomeDb->getData("c_category", array("c_status"=>'1',"c_title"=>$str));
				if (!empty($rg_res))
				{
					$this->form_validation->set_message('checkcategoryUnique', "Category already added.");
					return FALSE;
				}
			}
		}
		return TRUE;
	}
	public function list_t()
	{
		isajax();

		$data['tdata'] = $this->categories();
		

		$this->load->view('back_end/table/category-list',$data);

	}
	function categories($start=null,$limit=null)
	{

		$select = array("c.c_id","c.c_title");
		$cond = array("c.c_status"=>'1');

		$data = $this->HomeDb->getDetailedData($select,'c_category c',$cond,$limit,$start,array("c.c_id","desc"));
		return $data;
	}
	public function get_edata()
	{
		isajax();
		$id = noHtml($this->input->post('id'));
		if(!empty($id) && is_numeric(sec($id,'d')))
		{
			$c_id = sec($id,'d');
			$select = array("c.c_id","c.c_title");


			$fdata = $this->HomeDb->getDetailedData($select,'c_category c',array("c.c_id"=>$c_id,"c.c_status"=>'1'));



			if(empty($fdata))
			{
				$res = array("res"=>0,"msg"=>"No such category exists.");
			}
			else
			{
				$f_array = 
				array(
					"c_title"=>!empty($fdata[0]->c_title)?$fdata[0]->c_title:null,
					"c_id"=>!empty($fdata[0]->c_id)?sec($fdata[0]->c_id):null
				);

				$res = array("res"=>1,"form_data"=>$f_array);
			}
		}
		else
			$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5031");

		echo json_encode($res);

	}
	function delete()
	{
		isajax();
		if(!empty($this->input->post('id')))
		{
			$id=sec($this->input->post('id'),'d');
			if(!empty($id)&&is_numeric($id))
			{
				$check_exit=$this->HomeDb->getDetailedData(array('c_id'),'c_category',array('c_id'=>$id),null,null,null);
				if(!empty($check_exit))
				{

					$params=array('c_status'=>'2');
					if($mha_res=$this->HomeDb->update($params, 'c_category', array('c_id'=>$check_exit[0]->c_id)))
					{
						$res = array("res"=>1,"msg"=>'Successfully Deleted Category');
					}
					else
					{
						$res = array("res"=>0,"msg"=>'Failed to Delete Category');
					}
				}
				else
				{
					$res = array("res"=>0,"msg"=>'Something went Wrong. Error Code #5032');
				}
			}
			else
			{
				$res = array("res"=>0,"msg"=>'Something went Wrong. Error Code #5033');
			}
		}
		else
		{
			$res = array("res"=>0,"msg"=>'Something went Wrong. Error Code #5034');
		}
		echo json_encode($res);
	}


}
