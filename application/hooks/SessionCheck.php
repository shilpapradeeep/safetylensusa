<?php defined('BASEPATH') OR exit('No direct script access allowed');
// class SessionCheck 
// {
// 	public function do_check()
// 	{
// 		if(seg(1)=='' ||seg(1)=='lead-submit' ||seg(1)=='product-category-wise' ||seg(1)=='all-products' ||seg(1)=='product-list' ||seg(1)=='product-list' ||seg(1)=='product-detail' ||seg(1)=='add_to_cart_id' ||seg(1)=='add_to_wishlist_id' ||seg(1)=='favourites' ||seg(1)=='delete-wishlist' || seg(1)=='Login' || seg(1)=='logout' || seg(1)=='preview' || seg(1)=='login' || seg(1) == 'api' || seg(1) == 'submit_login'  || seg(1) == 'signup' || seg(1) == 'submit_reg'||seg(1)=='search-product'||seg(1)=="compare" || seg(1) == "checkout" ||seg(1)=="cart" || seg(1) == "place-order"|| seg(1)=='payment' || seg(1)=='order-success' || seg(1)=='submit_contact' || seg(1)=='order-history' || seg(1)=='blog' || seg(1)=='blog-details' || seg(1)=='about-us' || seg(1)=='contact-us' ||  seg(1)=='change-my-password' ||  seg(1)=='submit_user_password')
// 		{
			
// 		}
// 		else
// 		{
// 			check_session();
// 		}

		
// 	}
// }

class SessionCheck 
{
	public function do_check()
	{
    	$this->CI = &get_instance();
    	date_default_timezone_set('asia/kolkata');
    	$flag = true;
    	
    	$common_pages=array('','home','home2','home3','home4','home5','home6','index','preview','login','logout');
    	
    	if(in_array($this->CI->uri->segment(1),$common_pages))
    	{
    	}
    	else
    	{
        	$permission=$this->CI->HomeDb->getData('u_user_permission',array('u_url'=>$this->CI->uri->segment(1),'u_status'=>'1'));
        	if(!empty($permission)) 
        	{
        	    if(!empty($this->CI->session->userdata['l_uid']['l_type']))
        	        $login_type = sec($this->CI->session->userdata['l_uid']['l_type'],'d');
        	    else
        	    {
        	        $this->CI->load->helper('cookie');
                    $cook_uid=(get_cookie('ecom_global_regenerate_id',true));
                    $cook_uid=sec($cook_uid,'d');
                    if(!empty($cook_uid) && is_numeric($cook_uid))
                    {
                        $db_data=$this->CI->HomeDb->getDetailedData(array('l_id','l_name','l_username','l_type'),'l_login',array('l_id'=>$cook_uid,'l_login_status'=>1));
                        if(!empty($db_data))
                        {
                            $sess=array(
                                'l_id'=>sec($db_data[0]->l_id),
                                'l_name'=>sec($db_data[0]->l_name),
                                'l_email'=>sec($db_data[0]->l_username),
                                'l_type'=>sec($db_data[0]->l_type)
                            );
                            $this->CI->session->set_userdata('l_uid',$sess);
                            
                            if(!empty($db_data[0]->l_type))
                                $login_type = $db_data[0]->l_type;
                            else
                                $login_type = '3';
                        }
                        else
                            $login_type = '3';
                    }
                    else
                        $login_type = '3';
        	    }
        	        
        		if($permission[0]->u_user_type1==1 && $login_type==1)
        		{
        		}
        		elseif($permission[0]->u_user_type2==1 && $login_type==2)
        		{
        		}
        		elseif($permission[0]->u_guest_user==1 && $login_type==3)
        		{
        		}
        		else
        		{
        		    redirect('error');
        		}
        	}
        	else
        	{
        		redirect('error');
        	}
    	}
	}
}



