<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_controller extends CI_Controller {

	public function cart_list()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

    	$js = array(
				"js/cart.js",
				"js/common.js",
		);
        $data['js']=array_merge($data['js'],$js);

    	
		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Cart List',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/cart_list',$data);
	}

	public function single_cart($id)
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$css = array(
					'libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css',
				);
		$js = array(
				"libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js",
				"js/cart.js",
				"js/common.js",
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $id = get_id($id);
        $data['id'] = sec($id);

    	$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Cart Details',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/single_cart',$data);
	}

	public function cart_list_data()
	{
		isajax();
		$data['cart_list'] = $this->cart_lst();
		// lq();
		// tsi($data);
		if(!empty($data['cart_list']))
		{
			$this->load->view('back_end/cart_tbl',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}
	}

	public function cart_lst($id=null)
	{
		if (!empty($id))
		{
			$input['select'] = array('cr.cr_l_id','cr.cr_products_id','COUNT(cr.cr_products_id) as pro_count','SUM(cr.cr_quantity) as qty','pr.pr_title','pr.pr_thumb_image as pr_img','pr.pr_selling_price','pr.pr_mrp');
			$input['where']  = array('cr.cr_status'=>'1','cr.cr_l_id'=>$id );
			$input['join_table']  = array('pr_product pr','pr.pr_id=cr.cr_products_id','left');
			$input['group_by'] = array('cr.cr_products_id');
		}
		else
		{
			$input['select'] = array('cr.cr_l_id','m.m_name','m.m_email','m.m_phone','cr.cr_updated','COUNT(cr.cr_products_id) as cr_quantity');
			$input['where']  = array('cr.cr_status'=>'1');
			$input['join_table']  = array('m_member m','m.m_l_id=cr.cr_l_id','left','pr_product pr','pr.pr_id=cr.cr_products_id','left');
			$input['group_by'] = array('cr_l_id');
			$input['order_by'] = array('cr.cr_id','asc');
		}
		$input['table'] = 'cr_cart cr';
		$data=$this->HomeDb->grab($input);

		return $data;
	}

	public function single_cart_details()
	{
		isajax();
		$cr_l_id = sec($this->input->post('id'),'d');
		if (!empty($cr_l_id) && is_numeric($cr_l_id)) 
		{
			$data['cart_list'] = $this->cart_lst($cr_l_id);
			if (!empty($data['cart_list'])) 
			{
				$this->load->view('back_end/single_cart_tbl',$data);
			}
			else
			{
				echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
			}
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}
	}

	public function single_cart_delete()
	{
		$cr_l_id = sec($this->input->post('cr_l_id'),'d');
		$pr_id = sec($this->input->post('pr_id'),'d');
		// tsi($cr_l_id);

		if (!empty($cr_l_id) && !empty($pr_id) && is_numeric($cr_l_id) && is_numeric($pr_id)) 
		{
			$tdata= $this->HomeDb->getData('cr_cart',array("cr_l_id"=>$cr_l_id,"cr_products_id"=>$pr_id));
			
			if(!empty($tdata))
			{
				$data['cr_status'] = '2';
				if($this->HomeDb->update($data,"cr_cart",array("cr_l_id"=>$cr_l_id,"cr_products_id"=>$pr_id)))
				{
					$res = array("res"=>1,"msg"=>"Product remove from your cart");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
			}
			else
				$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");
		}
		echo json_encode($res);
	}

	public function cart_list_delete()
	{
		$cr_l_id = sec($this->input->post('cr_l_id'),'d');
		// tsi($cr_l_id);

		if (!empty($cr_l_id) &&  is_numeric($cr_l_id)) 
		{
			$tdata= $this->HomeDb->getData('cr_cart',array("cr_l_id"=>$cr_l_id));
			
			if(!empty($tdata))
			{
				$data['cr_status'] = '2';
				if($this->HomeDb->update($data,"cr_cart",array("cr_l_id"=>$cr_l_id)))
				{
					$res = array("res"=>1,"msg"=>"Cart list removed");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
			}
			else
				$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");
		}
		echo json_encode($res);
	}
}
	