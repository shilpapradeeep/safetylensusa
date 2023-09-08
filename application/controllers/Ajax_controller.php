<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_controller extends CI_Controller 
{

    public function fill_category()
	{
		isajax();

		$cond = array("c_status"=>'1');
		$categories = $this->HomeDb->getDetailedData(array("c_id","c_title"),'c_category',$cond,null,null,array("c_title",'desc'));
		$iarray = array();
		if(!empty($categories))
		{
			foreach($categories as $v)
			{
				$carray[] = array("id"=>sec($v->c_id),"name"=>$v->c_title);
			}
		}
		$res = array("categories"=>$carray);
		echo json_encode($res);
	}

	public function get_category()
	{
		isajax();
		$data=$this->HomeDb->getDetailedData(array('c_id','c_title'),'c_category',array('c_status'=>'1'),null,null,array('c_id','desc'));
		if (!empty($data)) {
			foreach ($data as $key => $value) {
				$c_data[] = array('id'=>sec($value->c_id),'name'=>$value->c_title); 
			}
			$res = array('res'=>1,'data'=>$c_data);
		}
		else
		{
			$res = array('res'=>0,'msg'=>"No data");
		}
		
		echo json_encode($res);
	}

	public function get_brand()
	{
		isajax();
		$data=$this->HomeDb->getDetailedData(array('b_id','b_title'),'b_brand',array('b_status'=>'1'),null,null,array('b_id','desc'));
			if (!empty($data)) {
				foreach ($data as $key => $value) {
					$brand_data[] = array('id'=>sec($value->b_id),'name'=>$value->b_title);
				}
				$res = array('res'=>1,'data'=>$brand_data);
			}
			else
			{
				$res = array('res'=>0,'msg'=>"No data");
			}
		
		
		echo json_encode($res);
	}
    public function get_style()
    {
        isajax();
        $data=$this->HomeDb->getDetailedData(array('s_id','s_title'),'s_style',array('s_status'=>'1'),null,null,array('s_id','desc'));
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $style_data[] = array('id'=>sec($value->s_id),'name'=>$value->s_title);
            }
            $res = array('res'=>1,'data'=>$style_data);
        }
        else
        {
            $res = array('res'=>0,'msg'=>"No data");
        }


        echo json_encode($res);
    }
	public function fill_year()
	{
		isajax();
		$years = years();
		$yarray = array();
		if(!empty($years))
		{
			foreach($years as $key => $value)
			{
				$yarray[] = array("name"=>$value);
			}
		}
		$res = array("years"=>$yarray);
		echo json_encode($res);
	}
	public function fill_month()
	{
		isajax();
		$months = months();

		$marray = array();
		if(!empty($months))
		{
			foreach($months as $key => $value)
			{
				$marray[] = array("id"=>sec($key),"name"=>$value);
			}
		}
		$res = array("months"=>$marray);
		echo json_encode($res);
	}



}
