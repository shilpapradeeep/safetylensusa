<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller 
{
	
  function __construct()
   {
      parent::__construct();
      $this->load->library(array('Globals','Essential'));
      
   }
   function add()
   {
   		$infos = $this->input->post();

		   if(!$this->session->userdata('l_uid'))
	   		{
				$sessFlag = false;
	   			if($this->session->userdata('cart_products'))
	   			{
	   				$cart_array = $this->session->userdata['cart_products']['cart'];
	   				$cart_array = (array)json_decode($cart_array);
	   				$odata = $this->session->userdata['cart_products']['order'];
	   				$odata = (array)json_decode($odata);
	   				
	   			}
	   			else
	   			{
	   				$cart_array = array();
	   				$odata = null;
	   			}
			}
			else
			{
				$sessFlag = true;
				$ccc = $this->essential->getCartPageData();
				$cart_array = $ccc['cart'];
				$odata = $ccc['order'];
				
			}

	   			$pr_id = sec($infos['pr_id'],'d');
	   			$pv_id = sec($infos['pv_id'],'d');
	   			$pData =  $this->HomeDb->getData('pr_product',array("pr_id"=>$pr_id));
	   			
	   			$pArray = array();
	   			$pArray["c_pr_id"] = $infos['pr_id'];
	   			$pArray["c_pv_id"] = $infos['pv_id'];
	   			$pArray["c_height_progressive"] = 0;
	   			$pArray["c_height_bifocal"] = 0;
				if(is_numeric($infos['p_qty']))
				   $pArray["c_qty"] = sec($infos['p_qty']);
				else
	   				$pArray["c_qty"] = $infos['p_qty'];
	   			$c_price = $pData[0]->pr_selling_price;
	   			
	   			$c_cost = 0;
	   			$pArray["c_lens"] = !empty($infos['lt_id'])?1:0;
	   			$pArray["c_prescription"] = 0;
	   			
	   			

	   			$pArray["c_product_title"] = sec($pData[0]->pr_title);
	   			$pArray["c_product_thumb"] = $pData[0]->pr_thumb_image;
	   			$pArray["c_product_color"] = $pData[0]->pr_product_color;
	   			if(!empty($infos['pv_id']))
				{
					$pvData =  $this->HomeDb->getData('pv_variation',array("pv_id"=>$pv_id));
					$cart_product_size = array("cps_eye_size"=>sec($pvData[0]->pv_eye_size),"cps_bridge"=>sec($pvData[0]->pv_bridge),"pv_ed"=>sec($pvData[0]->pv_ed),"cps_temple"=>sec($pvData[0]->pv_temple),"cps_b_measurement"=>sec($pvData[0]->pv_b_measurement),"cps_price"=>sec($pvData[0]->pv_price),"cps_cost"=>sec($pvData[0]->pv_cost),"cps_size"=>$pvData[0]->pv_eye_size.'-'.$pvData[0]->pv_bridge.'-'.$pvData[0]->pv_temple.'-B'.$pvData[0]->pv_b_measurement);
					$pArray["cart_product_size"] = $cart_product_size;
				}
	   			


	   			//lens material
				if(!empty($infos['lm_id']))
				{
					$lens_material_pricing = $this->HomeDb->getDetailedData(array("lt.lt_title","lmp.*","lm.lm_title"),'lens_material_price lmp',array("lmp_material_id"=>sec($infos['lm_id'],'d'),"lmp.lmp_type_id"=>sec($infos['lt_id'],'d'),"lmp.lmp_status"=>'1'),null,null,null,array(array("lens_type lt","lt.lt_id = lmp.lmp_type_id","left"),array("lens_materials lm","lm.lm_id = lmp.lmp_material_id","left")));
					$pArray['cart_lens_material'] = array("cm_lens"=>$infos['lt_id'],"cm_material"=>sec(1),"cm_price"=>sec($lens_material_pricing[0]->lmp_price),"cm_cost"=>sec($lens_material_pricing[0]->lmp_cost),"cm_lens_type_title"=>sec($lens_material_pricing[0]->lt_title),"cm_lens_mat_title"=>sec($lens_material_pricing[0]->lm_title));
					$c_price+=$lens_material_pricing[0]->lmp_price;
					$c_cost+=$lens_material_pricing[0]->lmp_cost;
				}
	   			

	   			//c_cart_polarised_lens
	   			if(!empty($infos['polarised_lens']))
	   			{
	   				
	   				$plData =  $this->HomeDb->getData('polarized_lens',array("pl_id"=>sec($infos['polarised_lens'],'d')));
	   				$pArray['cart_polarised_lens'] = array("cp_polarised_lens"=>$infos['polarised_lens'],"cp_price"=>$infos['polarised_lens_price'],"cp_cost"=>$infos['polarised_lens_cost'],"polarised_lens_title"=>sec($plData[0]->pl_name));
	   				$c_price+=sec($infos['polarised_lens_price'],'d');
	   			    $c_cost+=sec($infos['polarised_lens_cost'],'d');

	   			}
	   			//c_cart_transition
	   			if(!empty($infos['transition']))
	   			{
	   				
	   				$trData =  $this->HomeDb->getData('transitions',array("tr_id"=>sec($infos['transition'],'d')));
	   				$pArray['c_cart_transition'] = array("ct_transition_title"=>sec($trData[0]->tr_name,'d'),"ct_price"=>$infos['transition_price'],"ct_cost"=>$infos['transition_cost'],"ct_tr_id"=>$infos['transition']);
	   				$c_price+=sec($infos['transition_price'],'d');
	   			    $c_cost+=sec($infos['transition_cost'],'d');

	   			}


	   			//c_cart_lens_options
	   			if(!empty($infos['lens_opt']))
	   			{
	   				$lopt = array();
	   				foreach($infos['lens_opt'] as $index=>$i)
	   				{
	   					$loData =  $this->HomeDb->getData('lens_options',array("lo_id"=>$index));
	   					$lopt[] = array("co_options_title"=>sec($loData[0]->lo_name),"co_options_id"=>sec($index),"co_price"=>$i,"co_cost"=>$infos['lens_opt_cost'][$index]);
	   					$c_price+=sec($i,'d');
	   			    	$c_cost+=sec($infos['lens_opt_cost'][$index],'d');
					}
					$pArray['cart_lens_options'] = ($lopt);
	   			}
			if(!$infos['no_prec'])
			{
	   			//
	   			$prs['cp_right_sphere'] = $infos['right_od_sphere'];
	   			$prs['cp_right_cylinder'] = $infos['right_od_cylinder'];
	   			$prs['cp_right_axis'] = $infos['right_od_axis'];
	   			$prs['cp_right_add'] = !empty($infos['right_od_add'])? $infos['right_od_add'] :0;
	   			$prs['cp_left_sphere'] = $infos['left_os_sphere'];
	   			$prs['cp_left_cylinder'] = $infos['left_os_cylinder'];
	   			$prs['cp_left_axis'] = $infos['left_os_axis'];
	   			$prs['cp_left_add'] = !empty($infos['left_os_add'])?$infos['left_os_add']:0;
	   			$infos['pd_values'] = empty($infos['pd_values'])?0:$infos['pd_values'];
	   			$prs['cp_pd_no'] = sec($infos['pd_values']);
	   			$prs['cp_pd_one'] = $infos['pd_values']==1?$infos['pd_one']:0;
	   			$prs['cp_pd_right'] = $infos['pd_values']==2?$infos['pd_twor']:0;;
	   			$prs['cp_pd_left'] = $infos['pd_values']==2?$infos['pd_twol']:0;;
	   			$prs['cp_instruction'] = $infos['sp_in'];

	   			$pArray['c_precription'] = ($prs);
			}
	   			
	   			//c_cart_tint
	   			if(!empty($infos['tint_type']))
	   			{
	   				$ttdata =  $this->HomeDb->getData('tint_type',array("tt_id"=>sec($infos['tint_type'],'d')));
	   			 	$tt  =array("ct_tint_type"=>$infos['tint_type'],
	   			 		"ct_ttype_title"=>sec($ttdata[0]->tt_name),
	   			 		"ct_tint_color" => $infos['tint_color'],
	   			 		"ct_price"=>$infos['tint_type_price'],
	   			 		"ct_cost"=>$infos['tint_type_cost']);
	   			 	$c_price+=sec($infos['tint_type_price'],'d');
	   			    $c_cost+=sec($infos['tint_type_cost'],'d');
					$pArray['cart_tint'] = ($tt);
	   			}
				   $pArray["c_price"] = sec($c_price);
				 
				   $pArray["c_price"] = sec($c_price);
	   			   $pArray["c_cost"] = sec($c_cost);
				   $c_price = $c_price * sec($pArray["c_qty"],'d');  
				   $c_cost = $c_cost * sec($pArray["c_qty"],'d');  
	   			$pArray['cart_tot_price'] = sec($c_price);
	   			$pArray['cart_tot_cost'] = sec($c_cost);
				$pArray["c_tprice"] = sec($c_price);
				$pArray["c_tcost"] = sec($c_cost);

	   			$o_total_price = !empty($odata)?sec($odata['o_total_price'],'d') + $c_price : $c_price;
	   			$o_total_cost = !empty($odata)?sec($odata['o_total_cost'],'d') + $c_cost : $c_cost;
	   			$odata['o_total_price'] = sec($o_total_price);
	   			$odata['o_total_cost'] = sec($o_total_cost);
	   			
	   				$odata['o_admin_delivery_charge'] = $infos['delivery_charge'];
	   				$odata['o_addtl_charge'] = $infos['additional_charge'];
	   			$o_grandtotal_price = $o_total_price+sec($infos['delivery_charge'],'d')+sec($infos['additional_charge'],'d');
	   			$odata['o_grandtotal_price'] = sec($o_grandtotal_price);
	   			$cart_array[$infos['pr_id']] = $pArray;
	   			
	   			$this->session->set_userdata('cart_products',array("cart"=>json_encode($cart_array),"order"=>json_encode($odata)));
	   			if($sessFlag)
				{
					if($this->essential->mageCartData())
						echo json_encode(array("res"=>1,"url"=>'cart'));
					else
						echo json_encode(array("res"=>0));
					
				}
				else
				{
					if($this->session->userdata('cart_products'))
						echo json_encode(array("res"=>1,"url"=>'cart'));
					else
						echo json_encode(array("res"=>0));
				}
	  }
	function delete_cart()
	{
		$res = array();
		if($this->session->userdata('l_uid'))
		{
			$lid = sec($this->session->userdata['l_uid']['l_id'],'d');
			$item = $this->input->post('item');
			 $orderid = $this->essential->getOrderId($lid);
			$item = sec($item,'d');
			$cartData = $this->HomeDb->getData('c_cart',array("c_o_id"=>$orderid,"c_pr_id"=>$item));
			$orderData = $this->HomeDb->getData('o_order',array("o_id"=>$orderid));
			if(!empty($cartData) && !empty($orderData))
			{
				$k = $cartData[0];
				$cart_tot_price = $k->c_tprice;
				$cart_tot_cost = $k->c_tcost;
				$c_product_title = 'Product';

				$o = $orderData[0];
				$o_total_price = $o->o_total_price;
				$o_total_cost = $o->o_total_cost;
				$o_admin_delivery_charge = $o->o_admin_delivery_charge;
				$o_addtl_charge = $o->o_addtl_charge;
				//................................................
				$orderParam['o_total_price'] = $o_total_price - $cart_tot_price;
				$orderParam['o_total_cost'] = $o_total_cost - $o_total_cost;
				$orderParam['o_grant_total'] = $o_total_price + $o_admin_delivery_charge + $o_addtl_charge;

				$this->db->trans_start();
				$this->HomeDb->delete('c_cart',array("c_id"=>$k->c_id));
				$allCartData = $this->HomeDb->getData('c_cart',array("c_o_id"=>$orderid));
				if(!empty($allCartData))
				{
					$this->HomeDb->update($orderParam,'o_order',array("o_id"=>$orderid));
				}
				else
				{
					$this->HomeDb->delete('o_order',array("o_id"=>$orderid));
				}
				
				$this->db->trans_complete();
				if($this->db->trans_status()===true)
				{
					$info = $this->essential->getCartPageData();
					$menu['menuCartData'] = getMenuCartData();
					$res['menuCartDiv'] = $this->load->view('front_end/inc/cart/menuCart', $menu,true);
					$res['cartDiv'] = $this->load->view('front_end/inc/cart/mainDiv', $info,true);
					$res['res'] = 1;
					$res['msg'] = $c_product_title." deleted from cart";
				}
				else
				{
					$res = array("res"=>0,'msg'=>"Something went wrong");
				}


			}
			else
			{
				$res = array("res"=>0,'msg'=>"Something went wrong");
			}
			
		}
		else
		{
			$item = $this->input->post('item');
			if($this->session->userdata('cart_products'))
			{
				$cart_array = $this->session->userdata['cart_products']['cart'];
				$cart_array = (array)json_decode($cart_array);
				$odata = $this->session->userdata['cart_products']['order'];
				$odata = json_decode($odata);
				$cart_tot_price = 0;
				$cart_tot_cost = 0;
				
				foreach($cart_array as $index=>$k)
				{
					
					if(empty(strcmp($item,$index)))
					{
						$cart_tot_price = sec($k->cart_tot_price,'d');
						$cart_tot_cost = sec($k->cart_tot_cost,'d');
						$c_product_title = sec($k->c_product_title,'d');
						
						break;
					}
				}
				unset($cart_array[$item]);   
				
				$o_total_price = sec($odata->o_total_price,'d');
				$o_total_cost = sec($odata->o_total_cost,'d');
				$o_admin_delivery_charge = sec($odata->o_admin_delivery_charge,'d');
				$o_addtl_charge = sec($odata->o_addtl_charge,'d');
				//................................................
				$o_total_price = $o_total_price - $cart_tot_price;
				$o_total_cost = $o_total_cost - $o_total_cost;
				$o_grandtotal_price = $o_total_price + $o_admin_delivery_charge + $o_addtl_charge;
	
				$odata->o_total_price = sec($o_total_price);
				$odata->o_total_cost = sec($o_total_cost);
				$odata->o_grandtotal_price = sec($o_grandtotal_price);
				if(empty( $cart_array))
				{
					$this->session->unset_userdata('cart_products');
				}
				else
				$this->session->set_userdata('cart_products',array("cart"=>json_encode($cart_array),"order"=>json_encode($odata)));
				
				$info = $this->essential->getCartPageData();
				$menu['menuCartData'] = getMenuCartData();
				$res['menuCartDiv'] = $this->load->view('front_end/inc/cart/menuCart', $menu,true);
				$res['cartDiv'] = $this->load->view('front_end/inc/cart/mainDiv', $info,true);
				$res['res'] = 1;
				$res['msg'] = $c_product_title." deleted from cart";
				
			}
			else
			{
				$res = array("res"=>0,'msg'=>"Something went wrong");
			}
			
		}
		echo json_encode($res);
		
	}
	function cart_page()
	{
		
		$data = $this->essential->getCartPageData();
		
		$this->load->view('front_end/cart',$data);
	}
	function checkout_page()
	{
		
		if($this->session->userdata("cart_address"))
        {
        	$cartAddr = $this->session->userdata("cart_address");
        	if($cartAddr['billing'])
        	{
        		$p[] = $cartAddr['billing'];
        	}
        	if($cartAddr['shipping'])
        	{
        		$p[] = $cartAddr['shipping'];
        	}
        	$data['cartAddr'] = $p;
        	$data['cartAddrData'] = $cartAddr;
        }

		if($this->session->userdata('l_uid'))
		{
			$lid = sec($this->session->userdata['l_uid']['l_id'],'d');
			$orderid = $this->essential->getOrderId($lid);
			
			if(!empty($orderid))
			{
				$cinfo = $this->essential->getUserCartInfo($orderid);
				$data['cart'] = !empty($cinfo) && !empty($cinfo['cart'])?$cinfo['cart']:null;
				$data['order'] = !empty($cinfo) && !empty($cinfo['order'])?$cinfo['order']:null;;
			}
			$info['address'] = $this->essential->getAddress($lid);
			$info['cartAddr'] = !empty($data['cartAddr'])?$data['cartAddr']:null;
        	$data['addessDiv'] = $this->load->view('front_end/inc/address/list_address',$info,true);
        	$data['have_sess'] = true;
			
		}
		else
		{
			$data=null;
			if($this->session->userdata('cart_products'))
			{
				$cart_array = $this->session->userdata['cart_products']['cart'];
				$cart_array = (array)json_decode($cart_array);
				$odata = $this->session->userdata['cart_products']['order'];
				$odata = (array)json_decode($odata);
				
				$data['cart'] = $cart_array;
				$data['order'] = $odata;
			}
			$data['have_sess'] = false;;

			 
			
		}
        
		$data['countries'] = $this->HomeDb->getData("c_country");
		$this->load->view('front_end/checkout',$data);
	}
	function checkout_review()
	{
		$data = null;
		
		if($this->session->userdata('l_uid'))
		{
			$lid = sec($this->session->userdata['l_uid']['l_id'],'d');
			$orderid = $this->essential->getOrderId($lid);
			
			if(!empty($orderid))
			{
				$cinfo = $this->essential->getUserCartInfo($orderid);
				$data['cart'] = !empty($cinfo) && !empty($cinfo['cart'])?$cinfo['cart']:null;
				$data['order'] = !empty($cinfo) && !empty($cinfo['order'])?$cinfo['order']:null;;
			}
			$info['address'] = $this->essential->getAddress($lid);
			
        	$data['addessDiv'] = $this->load->view('front_end/inc/address/list_address',$info,true);
        	$addArr = $this->session->userdata("cart_address");
		    $data['addData'] = $this->essential->getUserCartAddressInfo($addArr);
			
		}
		else
		{
			$data=null;
			if($this->session->userdata('cart_products'))
			{
				$cart_array = $this->session->userdata['cart_products']['cart'];
				$cart_array = (array)json_decode($cart_array);
				$odata = $this->session->userdata['cart_products']['order'];
				$odata = (array)json_decode($odata);
				
				$data['cart'] = $cart_array;
				$data['order'] = $odata;
			}
			$data['addData'] = $this->essential->getGuestCartAddressInfo();
			 
			
		}
       if(empty($data['addData']))
	   redirect('cart','refresh');
	   else
		$this->load->view('front_end/checkout-review',$data);
	}
	function PrepareCartData($cart_array)
	{
		if(!empty($cart_array))
		{
			$res = array();
			foreach($cart_array as $index=>$c)
            {

            }
		}
	}

    public function checkoutLogin()
    {
        // isajax();
		

        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[55]|callback_chk_usr');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[55]|callback_chk_pwd');
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
        	$lid = sec($this->session->userdata['l_uid']['l_id'],'d');
        	$info['address'] = $this->essential->getAddress($lid);
			
        	$addessDiv = $this->load->view('front_end/inc/address/list_address',$info,true);
            $res    = array(
                "res" => 1,
                "type" =>sec($this->session->userdata['l_uid']['l_type'],'d'),
                "msg" => "success",
                "address"=>$addessDiv
            );
            $this->essential->mageCartData();
        }


        echo json_encode($res);
    }
    function chk_usr()
    {

        $email=trim($this->input->post('username'));
        if(!empty($email))
        {


            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $cond = array('l_username'=>$email,'l_login_status'=>'1');
            }
            else
            {
                $cond = array('l_phone'=>$email,'l_login_status'=>'1');
            }

            $user_check=$this->HomeDb->getDetailedData(array('l_name','l_login_status'),'l_login',$cond);


            if(!empty($user_check))
            {

                if($user_check[0]->l_login_status==1)
                {

                    return TRUE;
                }
                else
                {
                    $this->form_validation->set_message('chk_usr', 'invalid username #4245');
                    return FALSE;
                }
            }
            else
            {

                $this->form_validation->set_message('chk_usr', 'invalid username #4246');
                return FALSE;
            }

        }

        return TRUE;
    }
    function chk_pwd()
    {
		
        $email=trim($this->input->post('username'));
        $pwd=trim($this->input->post('password'));
        if(!empty($email) && !empty($pwd))
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $cond = array('l_username'=>$email,'l_login_status'=>'1');
            }
            else
            {
                $cond = array('l_phone'=>$email,'l_login_status'=>'1');
            }
            if (!empty($cond))
            {
                $user_check=$this->HomeDb->getDetailedData(array('l_id','l_name','l_login_status','l_password','l_unique_id','l_username','l_type'),'l_login',$cond);
                if(!empty($user_check))
                {
                    if($user_check[0]->l_login_status==1 && !empty($user_check[0]->l_password))
                    {
                        if(!empty($user_check[0]->l_name))
                            $name=$user_check[0]->l_name;
                        else
                            $name=' ';
                        $unique = $user_check[0]->l_unique_id;
                        $upassword = encrypt_pwd($unique,$pwd);
                        if(empty(strcmp($upassword, $user_check[0]->l_password)))
                        {
							
                            $sess=array(
                                'l_id'=>sec($user_check[0]->l_id),
                                'l_name'=>sec($user_check[0]->l_name),
                                'l_username'=>sec($user_check[0]->l_username),
                                'l_type'=>sec($user_check[0]->l_type)
                            );
                            $this->load->helper('cookie');
                            //set_cookie('ecom_global_regenerate_id',sec($user_check[0]->l_id),time()+60*60*24*30);
                            $this->session->set_userdata('l_uid',$sess);
							
							
                            return TRUE;
                        }
                        else
                        {
                            $this->form_validation->set_message('chk_pwd', 'invalid username / password #4248');
                            return FALSE;
                        }
                    }
                    else
                    {
                        $this->form_validation->set_message('chk_pwd', 'invalid username / password #4249');
                        return FALSE;
                    }
                }
                else
                {
                    $this->form_validation->set_message('chk_pwd', 'invalid username / password #4250');
                    return FALSE;
                }
            }
            else
            {
                $this->form_validation->set_message('chk_pwd', 'invalid username / password #4251');
                return FALSE;
            }
        }
        else
        {
            $this->form_validation->set_message('chk_pwd', 'invalid username / password #42523');
            return FALSE;
        }

    }
    
  
}