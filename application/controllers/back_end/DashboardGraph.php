<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardGraph extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('Graph');
	}
	public function ploat_graph()
	{
		$item = noHtml($this->input->post('type'));
		//$m_id = sec(noHtml($this->input->post('m_id')),'d');
		$m_id = '4';
		if($item=="order_status")
		{
			$this->order_graph($m_id);
		}
	}
	function order_graph($m_id)
	{
		
		$year = noHtml($this->input->post('year'));
        $month = sec($this->input->post('month'),'d');
		$result = $this->graph->get_order_status_data($year,$month);
		
		//$result= array("res"=>1);;
		echo json_encode($result);
	}

}
