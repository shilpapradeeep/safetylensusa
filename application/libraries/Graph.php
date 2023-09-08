<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Graph
{
	function login_credential_check()
    {
        $CI = &get_instance();
    }
    
	function get_order_status_data($year=null,$month=null)
	{
		$CI = &get_instance();
		//$marray = ret_status('blood',null);
		$nodays = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		

		$total = 0;
		$categories = array();
		for($i=1;$i<=$nodays;$i++)
		{
			$date = "$year-$month-$i";
			$cond['DATE_FORMAT(i.i_added, "%Y-%m")='] = date('Y-m',strtotime($date));
			$x['table']='i_invoice i';
			$x['select']=array('COUNT(i.i_id) as count','i.i_added');

			$x['where']=array('i.i_status!='=>'3');

			$x['where'] = array_merge($x['where'],$cond);
			$x['object'] = 1;
			$res=$CI->HomeDb->grab($x);
			$graphData[] = array("name"=>$i,"data"=>array((int)$res[0]->count));
		    $categories[] = 'Days';


			
		}

		return array("res"=>1,"categories"=>$categories,"graph"=>$graphData);
		
	}
	
}