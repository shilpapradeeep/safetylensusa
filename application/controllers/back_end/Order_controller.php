<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_controller extends CI_Controller {

	public function order_list()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

    	$js = array(
				'js/order.js',
				'js/common.js',
		);
        $data['js']=array_merge($data['js'],$js);

		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Order List',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/order_list',$data);
	}

	public function order_details($id)
	{
		$data['css']= css_link();
    	$data['js'] = js_link();
		
		$css = array(
			"libs/select2/css/select2.min.css",
		);

    	$js = array(
    			"libs/select2/js/select2.min.js",
				'js/order.js',
				'js/common.js',
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['id'] = $id;
    	
		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Order Summary',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/order_details',$data);
	}

	public function order_tbl()
	{
		isajax();
		$type = explode('-', $this->input->post('type'));

		$cond_arr = array('1'=>'pending','2'=>'packing','3'=>'delivery_initiated','4'=>'intransit','5'=>'collected_at_next_center','6'=>'waiting_for_delivery','7'=>'delivered','8'=>'cancelled','9'=>'undelivered','10'=>'all');

		$typee = array_search($type[0], $cond_arr);

		$data['order_tbl'] = $this->order_lst(null,$typee);
		if ($typee == 10) {
			$data['all'] = 1;
		}
		else
		{
			$data['all'] = 0;
		}
		if (!empty($data['order_tbl'])) 
		{
			$this->load->view('back_end/order_tbl',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}
	}
	public function order_lst($id=null,$type=null)
	{

		if (!empty($id)) 
		{
			$select = array('m.m_name','i.i_unique_id','i.i_lid','i.i_pdf','i.i_summary','i.i_cart_ids','i.i_product_types','i.i_no_of_pieces','i.i_total_mrp','i.i_total_selling_price','i.i_your_savings','i.i_new_total','i.i_net_payable','i.i_update','i.i_payment_status','i.i_delivery_status','i.i_cart_ids','i.i_payment_mode','mb.ma_address as mb_address','md.ma_address as md_address','mb.ma_pincode as mb_pin','md.ma_pincode as md_pin','md.ma_distrct as md_district','mb.ma_distrct as mb_district','mb.ma_state as mb_state','md.ma_state as md_state');
			$cond = array('i.i_id'=>$id);
			$join = array(
				array('m_member m','m.m_l_id=i.i_lid','left'),
				array('ma_member_address mb','mb.ma_id=i.i_billing_id','left'),
				array('ma_member_address md','md.ma_id=i.i_delivery_id','left'),
			);
		}
		elseif(!empty($type))
		{
			
			$select = array('i.i_id','m.m_name','i.i_unique_id','i.i_lid','i.i_pdf','i.i_summary','i.i_cart_ids','i.i_product_types','i.i_no_of_pieces','i.i_total_mrp','i.i_total_selling_price','i.i_your_savings','i.i_delivery_charge','i.i_new_total','i.i_net_payable','i.i_update','i.i_payment_status','i.i_delivery_status','i.i_payment_mode');
			$cond = array('i_status!='=>'3');
			if ($type != 10) 
			{
				$c = array('i.i_delivery_status'=>$type);
				$cond = array_merge($cond,$c);
			}
			$join = array(
				array('m_member m','m.m_l_id=i.i_lid','left'),
			);
		}
		$data = $this->HomeDb->getDetailedData($select,'i_invoice i',$cond,null,null,array('i.i_id','desc'),$join);
		return $data;
	}

	public function order_details_dta()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if (!empty($id) && is_numeric($id)) 
		{
			$data = $this->order_lst($id);
			if (!empty($data)) 
			{
				
				if (!empty($data[0]->i_cart_ids)) 
				{
					$d = explode(',', $data[0]->i_cart_ids);
					
					foreach ($d as $key => $val) 
					{
						$product = $this->product_get($val);
						if (!empty($product[0]->pr_id)) 
						{
							if ( !empty($product[0]->pr_thumb_image) &&  file_exists( FCPATH.'ThreeSeasInfologics/uploads/product/'.$product[0]->pr_thumb_image) ) 
			              		$img1 = thumb(b('ThreeSeasInfologics/uploads/product/').$product[0]->pr_thumb_image,430,200);
			           		else
			                  	$img1 = thumb(repo().'uploads/no-image.jpg',316,200);
							$pro_dta[] =array(
								'pro_title'=>$product[0]->pr_title,
								'pro_img'=>$product[0]->pr_thumb_image,
								'pro_img_full'=>$img1,
								'pro_selling_price'=>$product[0]->pr_selling_price,
								'pro_mrp'=>$product[0]->pr_mrp,
								'pro_qty'=>$product[0]->cr_quantity
							);
						}
						
					}
				}
				$arr_val = array(
					'order_id'=>$data[0]->i_unique_id,
					'name'=>$data[0]->m_name,
					'i_lid'=>$data[0]->i_lid,
					'i_summary'=>$data[0]->i_summary,
					'i_no_of_pieces'=>$data[0]->i_no_of_pieces,
					'i_total_mrp'=>$data[0]->i_total_mrp,
					'i_total_selling_price'=>$data[0]->i_total_selling_price,
					'i_your_savings'=>$data[0]->i_your_savings,
					'i_new_total'=>$data[0]->i_new_total,
					'i_net_payable'=>$data[0]->i_net_payable,
					'i_update'=>$data[0]->i_update,
					'i_payment_status'=>$data[0]->i_payment_status,
					'i_delivery_status'=>$data[0]->i_delivery_status,
					'i_payment_mode'=>$data[0]->i_payment_mode,
					'd_address'=>$data[0]->md_address,
					'b_address'=>$data[0]->mb_address,
					'b_pin'=>$data[0]->mb_pin,
					'd_pin'=>$data[0]->md_pin,
					'd_district'=>$data[0]->md_district,
					'b_district'=>$data[0]->mb_district,
					'b_state'=>$data[0]->mb_state,
					'd_state'=>$data[0]->md_state,
				);

				if (!empty($pro_dta)) 
				{
					$a = array('cart_list'=>$pro_dta);
					$arr_val = array_merge($arr_val,$a);
				}
				$this->load->view('back_end/order_details_val',$arr_val);
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

	public function product_get($id=null)
	{
		$select = array('cr.cr_quantity','pr.pr_id','pr.pr_title','pr.pr_thumb_image','pr.pr_mrp','pr.pr_selling_price');
		$cond = array('cr.cr_id'=>$id);
		$join = array(
			array('pr_product pr','pr.pr_id=cr_products_id','left'),
		);
		$data = $this->HomeDb->getDetailedData($select,'cr_cart cr',$cond,null,null,null,$join);
		return $data;
	}

	public function change_delivery_status()
	{
		isajax();
		$cond_arr = array('1'=>'Pending','2'=>'Packing','3'=>'Delivery Initiated','4'=>'Intransit','5'=>'Collected at Next Center','6'=>'Waiting for Delivery','7'=>'Delivered','8'=>'Cancelled','9'=>'Undelivered','10'=>'All');
		date_default_timezone_set('Asia/Kolkata');
		$id = sec($this->input->post('id'),'d');
		$ds = sec($this->input->post('d_s'),'d');
		
		if (!empty($id) && is_numeric($id) && !empty($ds) && is_numeric($ds)) 
		{
			$i = $this->HomeDb->getDetailedData(array('i_summary','i_unique_id','i_total_mrp','i_total_selling_price','i_your_savings','i_delivery_charge','i_net_payable'),'i_invoice',array('i_id'=>$id));
			if (!empty($i[0]->i_summary)) 
			{
				$i_sum = json_decode($i[0]->i_summary);
				
				if (!empty($i_sum->delivery_status)) {
					$i_sum->delivery_status[] = array('d_status'=>$ds,'d_status_time'=>date('Y-m-d h:i:s')) ;
				}
				else
				{
					$i_sum->delivery_status[] = array('d_status'=>$ds,'d_status_time'=>date('Y-m-d h:i:s')) ;
				}
				// tsi($i_sum);
				
			}
			$data['i_summary'] = json_encode($i_sum);
			$data['i_delivery_status'] = $ds;
			if ($this->HomeDb->update($data,"i_invoice",array("i_id"=>$id))) 
			{
				$d_m['mailData']=array(
					'm_name'=>$i_sum->user[0]->m_name,
					'm_email'=>$i_sum->user[0]->m_email,
					'subject'=>'Your order status is changed to '.$cond_arr[$ds],
				);
				$path='ThreeSeasInfologics/invoice/'.$i[0]->i_unique_id.'.pdf';
				$d_m['pdf_path']=$path;
				$d_m['type']='order-status';
				$d_m['order_info'] = array(
					'i_unique_id'=>$i[0]->i_unique_id,
					'mail_order_status'=>$cond_arr[$ds],
					'tracker'=>b('order-history'),
					'mail_order_status_date'=>date('g:ia \o\n l jS F Y')
				);
				$d_m['user_info'] = array(
					'm_name'=>$i_sum->user[0]->m_name,
					'm_phone'=>$i_sum->user[0]->m_phone,
					'm_email'=>$i_sum->user[0]->m_email,
					'u_billing_address'=>$i_sum->address[0]->ma_address,
					'u_billing_pincode'=>$i_sum->address[0]->ma_pincode,
					'u_billing_distrct'=>$i_sum->address[0]->ma_distrct,
					'u_billing_state'=>$i_sum->address[0]->ma_state,
					'u_delivery_address'=>$i_sum->address[1]->ma_address,
					'u_delivery_pincode'=>$i_sum->address[1]->ma_pincode,
					'u_delivery_distrct'=>$i_sum->address[1]->ma_distrct,
					'u_delivery_state'=>$i_sum->address[1]->ma_state,
				);
				// $pro = $i_sum->prod_detail;
				// if (!empty($pro)) 
				// {
				// 	foreach ($pro as $key => $va) 
				// 	{
				// 		$pro_info[] = array(
				// 			'pro_img'=>$va[0]->pr_thumb_image,
				// 			'pr_title'=>$va[0]->pr_title,
				// 			'pr_selling_price'=>$va[0]->pr_selling_price,
				// 			'pr_mrp'=>$va[0]->pr_mrp,
				// 			'qty'=>$va[0]->cr_quantity
				// 		);
				// 	}
				// }
				// else
				// {
				// 	$pro_info[] = array();
				// }
				// $d_m['cart_detail'] = $pro_info;
				// $d_m['product_info'] = array(
				// 	'i_total_mrp'=>$i[0]->i_total_mrp,
				// 	'i_total_selling_price'=>$i[0]->i_total_selling_price,
				// 	'i_your_savings'=>$i[0]->i_your_savings,
				// 	'i_net_payable'=>$i[0]->i_net_payable,
				// 	'i_delivery_charge'=>$i[0]->i_delivery_charge
				// );
                // $this->load->helper('email');
				// $mail_con = $this->load->view('mail/mail-design',$d_m,TRUE);
				// tsi($i_sum->user[0]->m_email);
				if(!empty($i_sum->user[0]->m_email) && $i_sum->user[0]->m_email != '-')
				{
				    $str=get_instance()->essential->mail_send($d_m);
    				if($str!=1)
    		        {
    		            
    		            $res = array("res"=>0,"msg"=>"Mail Something went Wrong! Error Code #5421001");
    		        }
    		        else
    		        {
    		            $res = array('res'=>'1','msg'=>'Delivery Status Changed');
    		        }
				}
				else
				{
				    $res = array('res'=>'1','msg'=>'Delivery Status Changed');
				}
				
			}
			else
			{
				$res = array('res'=>'0','msg'=>'Something went Wrong! Error Code #5421134');
			}
		}
		else
		{
			$res = array('res'=>'0','msg'=>'Something went Wrong! Error Code #5421135');
		}
		echo json_encode($res);
	}
}
	