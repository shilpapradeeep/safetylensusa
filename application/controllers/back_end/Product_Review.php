<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Review extends CI_Controller
{
    public function list()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

    	$js = array(
				'js/product_review.js',
				'js/common.js',
		);
		$data['js']=array_merge($data['js'],$js);

		
		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Product Reviews',
	      3=>'javascript:void(0)',
	    );
        $data['review_list'] = $this->review_list();
		$this->load->view('back_end/product_review',$data);
	}
    public function list_data()
	{
		isajax();
		$data['review_list'] = $this->review_list();
		if(!empty($data['review_list']))
		{
			$this->load->view('back_end/table/review_tbl',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}
	}
    public function review_list($id=null,$type=null)
	{
        $input['select'] = array('pr.*','p.pr_title');
        $input['join_table']  = array('pr_product p','p.pr_id =pr.p_product','left');
        $input['group_by'] = array('pr.p_id');
        $input['order_by'] = array('pr.p_id','desc');
        $input['object'] = 1;
		$input['where']  = array('p_status!='=>'3');
        $input['table'] = 'p_product_review pr';
        $data=$this->HomeDb->grab($input);

		return $data;
	}
	public function delete_review()
	{
		$p_id = sec($this->input->post('id'),'d');
		$data['p_status'] = "3";

		if(!empty($p_id) && is_numeric($p_id))
		{

			$tdata= $this->HomeDb->getData('p_product_review',array("p_id"=>$p_id,"p_status!="=>'3'));
			
			if(!empty($tdata))
			{

				if($this->HomeDb->update($data,"p_product_review",array("p_id"=>$p_id)))
				{
					$res = array("res"=>1,"msg"=>"Product Review deleted Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
			}
			else
				$res = array("res"=>0,"msg"=>"Invalid Product Review choosed.");
		}
		else
		{
			$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
		}
		echo json_encode($res);
		
	}

}
