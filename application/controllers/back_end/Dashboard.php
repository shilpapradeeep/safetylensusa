<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function dash()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();
    	//'libs/apexcharts/apexcharts.min.js',
		$js = array(
			
			'js/dashboard.js',
			'js/common-year-month.js',
		);
		
		$data['js']=array_merge($data['js'],$js);

		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	    );
	    $data['orders'] = $this->HomeDb->getDetailedData(array("i_id"),'i_invoice',array("i_status!="=>3),null,null,null,null,1);
	    $data['category'] = $this->HomeDb->getDetailedData(array("c_id"),'c_category',array("c_status"=>1),null,null,null,null,1);
	    $data['products'] = $this->HomeDb->getDetailedData(array("pr_id"),'pr_product',array("pr_status"=>1),null,null,null,null,1);
		$this->load->view('back_end/dashboard',$data);
	}

	function js_datatable()
	{
		$pagejs = array(
						);
		return $pagejs;
	}
	
	function css_datatable()
	{
		 $pagecss = array('');
		return $pagecss;
	}
}
