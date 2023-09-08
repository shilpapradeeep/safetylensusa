<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Essential

{



    public function file_upload_new($path,$cond)
    {
        $CI = &get_instance();
        $CI->load->helper('image');
        $CI->load->library('upload', set_upload_options($path,$cond));

        if (!$CI->upload->do_upload($cond)) 
        {
            $error = array(
                'error' => $CI->upload->display_errors()
            );
            $res   = array(
                'error' => $CI->upload->display_errors(),
                'res' => 0
            );
        } 
        else 
        {
            $data = array(
                'upload_data' => $CI->upload->data()
            );
            $exp = explode(',', $path);
            $path = $exp[0];
            $res = array(
                'name' => $data['upload_data']['file_name'],
                'res' => 1,
                'full_path'=>thumb(b($path.$data['upload_data']['file_name']),250,200)
            );
        }
        return $res;
    }
    public function category($x,$y=null)
    {
        $CI =&get_instance();
        return $CI->HomeDb->getDetailedData(array('c_id','c_title'),'c_category',$x,$y);
    }
    public function country($x,$y=null)
    {
        $CI =&get_instance();
        return $CI->HomeDb->getDetailedData(array('id','code','name'),'c_country',$x,$y);
    }


      public function products($x,$y=null,$st=null,$or=null)
    {
        $CI =&get_instance();
        return $CI->HomeDb->getDetailedData(array('pr_id','pr_title','pr_detailed_description','pr_selling_price','pr_mrp','pr_thumb_image','pr_gallery_image','pr_is_featured','pr_latest','pr_popular','pr_most_selling'),'pr_product',$x,$y,$st,$or);
    }
    public function get_det($t,$x,$y=null,$st=null,$or=null)
    {
        $CI =&get_instance();
        return $CI->HomeDb->getDetailedData(array(),$t,$x,$y,$st,$or);
    }
    public function get_cart_list($lid)
    {
        $CI =&get_instance();
        $dbarr['select']= array('pr_id','pr_title','pr_detailed_description','pr_selling_price','pr_mrp','pr_thumb_image','pr_gallery_image','pr_is_featured','pr_latest','pr_popular','pr_most_selling','c_id','c_title','cr_quantity');
        $dbarr['table']='pr_product';
        $dbarr['where']=array('pr_status'=>'1','cr_l_id'=>$lid,'cr_status'=>'1');
        $dbarr['join_table']=array('c_category','c_id=pr_cat_id','inner',
        'sb_sub_category','sb_id=pr_sub_cat_id','left',
        'cr_cart','pr_id=cr_products_id','inner');
        $dbarr['order_by']=array('cr_id','desc');
        $dbarr['object']='1';
        return $CI->HomeDb->grab($dbarr);
    }
    public function cart_count($x)
    {
        $CI =&get_instance();
        $x=sec($x,'d');
        return $CI->HomeDb->getData('cr_cart',array('cr_status'=>'1','cr_l_id'=>$x));
    }
     public function get_cart_det($cid)
     {
        if(!empty($cid))
        {
            $CI =&get_instance();
            $dbdata['select']=array('cr_quantity','pr_title','pr_selling_price','pr_mrp','pr_thumb_image');
            $dbdata['table']='cr_cart';
            $dbdata['where_in']['cr_id']=explode(',',$cid);
            $dbdata['join_table']=array('pr_product','cr_products_id=pr_id','inner');
            $cart_detail=$CI->HomeDb->grab($dbdata);
            if(!empty($cart_detail))
                return $cart_detail;
            else
                return false;
        }
        else
        return false;
    }
    public function create_pdf($data,$path)
    {
        $CI =&get_instance();
        //$data = [];
        $html=$CI->load->view('pdf/pdfGeneration', $data, true);
        $pdfFilePath = $path;
        $CI->load->library('m_pdf');
      //  $CI->m_pdf->pdf->SetHTMLFooter('<img src="' . repo() . 'pdf/images/footer.jpg"/>');
        $CI->m_pdf->pdf->WriteHTML($html);
        $CI->m_pdf->pdf->Output($pdfFilePath, "F");
        
    }
    public function get_addr($v,$did_arr)
    {
        if(!empty($v) && !empty($did_arr))
        {
            $CI =&get_instance();
            $dbdata['select']=array('ma_address','ma_distrct','ma_state','ma_pincode','ma_type');
            $dbdata['table']='ma_member_address';
             $dbdata['where_in'][$v]=$did_arr;
            $mail_addr=$CI->HomeDb->grab($dbdata);
            if(!empty($mail_addr))
            {
                foreach ($mail_addr as $key)
                {
                    $data[$key['ma_type']]=$key;
                }
                return $data;
            }
            else
            return false;
        }
        else
        return false;
    }
    public function get_mail_invoice($invo_id,$lid)
    {
        $CI =&get_instance();
        if(!empty($invo_id) && !empty($lid))
        {
            $dbdata['select']=array('o.o_id','o.o_date','o.o_grant_total','o.o_total_price','o.o_total_cost','o.o_delivery_charge','o.o_admin_delivery_charge','o.o_addtl_charge','o.o_paid_status','o.o_order_status_id','m.m_name','m.m_email','m.m_phone');
            $dbdata['table']='o_order o';
            //,'o.o_order_status_id'=>'1','o.o_paid_status'=>'1'
            $dbdata['where']=array('o.o_id'=>$invo_id,'o.o_user'=>$lid);
            $dbdata['join_table']=array('m_member m','m.m_l_id=o.o_user','inner');
            $mail_invo=$CI->HomeDb->grab($dbdata);
           
            if(!empty($mail_invo))
                return $mail_invo;
            else
                return false;
        }
        else
            return false;
    }
    public function mail_send($data)
    {
        $CI =&get_instance();
        $CI->load->helper('email');
        //tsi($data);
         $mail_design=$CI->load->view('mail/mail-design',$data,TRUE);
         tsi( $mail_design);
         exit;
        $data['mailData']['email']=$data['mailData']['m_email'];
        $data['mailData']['uname']=$data['mailData']['m_name'];
       
       // // $msg=mail_send($msg,$data)
        $msg=mail_send($mail_design,$data);
       //  // return $mail_design;
        if($msg==1)
        {
            return true;
        }
        else
        {
            $arr=array('mail_design'=>$mail_design,'err_msg'=>$msg);
            return $arr;
        }
    }
    
    public function get_ad_det()
    {
        $CI =&get_instance();
        $db_data=$CI->HomeDb->getData('lg_lead_generation');
        if(!empty($db_data))
        {
            if($db_data[0]->lg_lead==1)
            {
                if($db_data[0]->lg_u_name==1 || $db_data[0]->lg_phone==1 || $db_data[0]->lg_email==1)
                    return $db_data;
                else
                    return false;
            }
            else
                return false;
        }
        else
            return false;
    }
    public function mail_error($content,$design_page)
	{
		$CI = & get_instance();
		$mail_fail_arr=array('mf_to_mail'=>$content['mailData']['email'],
		'mf_content_array'=>json_encode($content),
		'mf_design_page'=>$design_page['mail_design'],
		'mf_mail_type'=>$content['type'],
		'mf_error_reason'=>$design_page['err_msg']['error'],
		'mf_from_mail'=>$design_page['err_msg']['from_email'],
		'mf_status'=>1);
		$CI->HomeDb->insert($mail_fail_arr, 'mf_mail_failed');
	}
    public function latest_blogs($x)
    {
        $CI =&get_instance();
        return $CI->HomeDb->getDetailedData(array('b_id','b_title','b_img','b_summary','b_content','b_added'),'b_blog',array('b_status'=>1),$x,'',array('b_id','desc'));
    }
       function getMenuCartData()
    {
        $CI =&get_instance();
        $res = null;
        if(!$CI->session->userdata('l_uid'))
        {
           if($CI->session->userdata('cart_products'))
           {
                $cart_array = $CI->session->userdata['cart_products']['cart'];
                $cart_array = (array)json_decode($cart_array);
                $odata = $CI->session->userdata['cart_products']['order'];
                $odata = (array)json_decode($odata);
                    
            $res = array();
            $tot = 0;
            foreach($cart_array as $i=>$v)
            {
              
                    $res['cart'][$i] = array("title"=>sec($v->c_product_title,'d'),"thumb"=>($v->c_product_thumb),"qty"=>sec($v->c_qty,'d'),'price'=>sec($v->c_price,'d'));
                    $tot+=sec($v->cart_tot_price,'d');
            }
            $res['tot'] = $tot;
           }
     
          
           return $res;

        }
        else
        {
          
            $lid = sec($CI->session->userdata['l_uid']['l_id'],'d');
             $orderid = $CI->essential->getOrderId($lid);
            $res = array();
            if(!empty($orderid))
            {
                $cinfo = $CI->essential->getUserCartInfo($orderid);
                $cart_array = !empty($cinfo) && !empty($cinfo['cart'])?$cinfo['cart']:null;
                
                if(!empty($cart_array))
                {
                    $tot = 0;
                    foreach($cart_array as $i=>$v)
                    {
                            $res['cart'][$i] = array("title"=>sec($v->c_product_title,'d'),"thumb"=>($v->c_product_thumb),"qty"=>sec($v->c_qty,'d'),'price'=>sec($v->cart_tot_price,'d'));
                            $tot+=sec($v->cart_tot_price,'d');
                    }
                    $res['tot'] = $tot;
                }
               
            }
           
            return $res;
        }
        
    }
    function getCartPageData()
    {
        $CI =&get_instance();
            $data=null;

        if($CI->session->userdata('l_uid'))
        {
            $lid = sec($CI->session->userdata['l_uid']['l_id'],'d');
            $orderid = $CI->essential->getOrderId($lid);
            
            if(!empty($orderid))
            {
                $cinfo = $CI->essential->getUserCartInfo($orderid);
                $data['cart'] = !empty($cinfo) && !empty($cinfo['cart'])?$cinfo['cart']:null;
                $data['order'] = !empty($cinfo) && !empty($cinfo['order'])?$cinfo['order']:null;;
            }
        }
        else
        {
            if($CI->session->userdata('cart_products'))
            {
                $cart_array = $CI->session->userdata['cart_products']['cart'];
                $cart_array = (array)json_decode($cart_array);
                $odata = $CI->session->userdata['cart_products']['order'];
                $odata = (array)json_decode($odata);
                
                $data['cart'] = $cart_array;
                $data['order'] = $odata;
            }

             
            
        }
        return $data;
    }
    
     function getUserId($lid)
    {
        
        $CI =&get_instance();
        $CI->db->select(array("m.m_id"));
        $CI->db->from("m_member m");
        $CI->db->join("l_login l","l.l_id=m.m_l_id","left");
        $CI->db->where("ua.ua_status",'1');
        $CI->db->where("l.l_id",$lid);
        $query = $CI->db->get();
        $res = $query->result();
        return $res[0]->m_id;
    }
    function getAddress($lid)
    {
        $address = array();
        $CI =&get_instance();
        $CI->db->select(array("ua.*"));
        $CI->db->from("ua_address ua");
        $CI->db->join("m_member m","m.m_id=ua.ua_user","left");
        $CI->db->join("l_login l","l.l_id=m.m_l_id","left");
        $CI->db->where("ua.ua_status",'1');
        $CI->db->where("l.l_id",$lid);
        $query = $CI->db->get();
        $res = $query->result();
        if(!empty($res))
        {
            $address = array();
            foreach($res as $r)
            {
                $add = array("id"=>sec($r->ua_id),
                                   "name"=>$r->ua_fname.' '.$r->ua_lname,
                                   "email"=>$r->ua_email,
                                   "phone"=>$r->ua_phone,
                                   "address"=>$r->us_address,
                                   "street"=>$r->ua_street,
                                   "city"=>$r->ua_city,
                                   "state"=>$r->ua_state,
                                    "zip"=>$r->ua_zip,
                                    "country"=>$r->ua_country,
                                    "type"=>$r->ua_type);
                if($r->ua_type=='1')
                    $address['shipping'][] = $add;
                else
                    $address['billing'][] = $add;
            }

        }
        return $address;
    }
    function getGuestCartAddressInfo()
    {
        $CI =&get_instance();
        $addrss = $CI->session->userdata('cart_address');
        $add = array();
        $addData = array();
        if(!empty($addrss['billing']))
        {
            $add[1][] = array("id"=>null,
                                   "name"=>$addrss['billing']['ua_fname'].' '.$addrss['billing']['ua_lname'],
                                   "email"=>$addrss['billing']['ua_email'],
                                   "phone"=>$addrss['billing']['ua_phone'],
                                   "address"=>$addrss['billing']['us_address'],
                                   "street"=>$addrss['billing']['ua_street'],
                                   "city"=>$addrss['billing']['ua_city'],
                                   "state"=>$addrss['billing']['ua_state'],
                                    "zip"=>$addrss['billing']['ua_zip'],
                                    "country"=>$addrss['billing']['ua_country'],
                                    "type"=>1);
        }
        if(!empty($addrss['shipping']))
        {
            if($addrss['shipping']==1)
            {
                $add[2] = $add[1];
            }
            else
            {
            $add[2][] = array("id"=>null,
                                   "name"=>$addrss['shipping']['ua_fname'].' '.$addrss['shipping']['ua_lname'],
                                   "email"=>$addrss['shipping']['ua_email'],
                                   "phone"=>$addrss['shipping']['ua_phone'],
                                   "address"=>$addrss['shipping']['us_address'],
                                   "street"=>$addrss['shipping']['ua_street'],
                                   "city"=>$addrss['shipping']['ua_city'],
                                   "state"=>$addrss['shipping']['ua_state'],
                                    "zip"=>$addrss['shipping']['ua_zip'],
                                    "country"=>$addrss['shipping']['ua_country'],
                                    "type"=>2);
            }
        }
        return $add;

    }
    function getUserCartAddressInfo($addArr)
    {
        $CI =&get_instance();
        $id[] = sec($addArr['shipping'],'d');
        $id[] = sec($addArr['billing'],'d');
        $CI->db->select("*");
        $CI->db->from("ua_address");
        $CI->db->where_in("ua_id",$id);
        $query = $CI->db->get();
        $res = $query->result();
        if(!empty($res))
        {
            $data = array();
            foreach($res as $r)
            {
                $data[$r->ua_type][] = array("id"=>sec($r->ua_id),
                                   "name"=>$r->ua_fname.' '.$r->ua_lname,
                                   "email"=>$r->ua_email,
                                   "phone"=>$r->ua_phone,
                                   "address"=>$r->us_address,
                                   "street"=>$r->ua_street,
                                   "city"=>$r->ua_city,
                                   "state"=>$r->ua_state,
                                    "zip"=>$r->ua_zip,
                                    "country"=>$r->ua_country,
                                    "type"=>$r->ua_type);
            }
            return $data;
        }
        else
            return null;
    }
    function getOrderId($lid)
    {
        $CI =&get_instance();
        $CI->db->limit(1);
        $CI->db->select("o.*");
        $CI->db->from("o_order o");
        $CI->db->join("m_member m","m.m_id=o.o_user","left");
        $CI->db->join("l_login l","l.l_id=m.m_l_id","left");
        $CI->db->where("o.o_order_status_id",'2');
        $CI->db->where("l.l_id",(int)$lid);
        $CI->db->order_by("o.o_id","desc");
        $query = $CI->db->get();
        $res = $query->result();
        if(!empty($res))
            return $res[0]->o_id;
        else
            return null;
    }
function getUserCartInfo($oid)
{
    $CI =&get_instance();
    $order = $CI->HomeDb->getData("o_order",array("o_id"=>$oid));
    $cart = $CI->HomeDb->getData("c_cart",array("c_o_id"=>$oid));
    if(!empty($cart))
    {
         $oData = array("o_total_price"=>sec($order[0]->o_total_price),
                               "o_total_cost"=>sec($order[0]->o_total_cost),
                               "o_admin_delivery_charge"=>sec($order[0]->o_admin_delivery_charge),
                            "o_addtl_charge"=>sec($order[0]->o_addtl_charge),
                            "o_grandtotal_price"=>sec($order[0]->o_grant_total));
         $data['order'] = $oData;
        $cData = null;
        foreach($cart as $c)
        {
            $cData[sec($c->c_pr_id)] = array();
           
            $pData =  $CI->HomeDb->getData('pr_product',array("pr_id"=>$c->c_pr_id));
                
                
                $ccc["c_pr_id"] = sec($c->c_pr_id);;
                $ccc["c_pv_id"] = sec($c->c_pv_id);
                $ccc["c_height_progressive"] = 0;
                $ccc["c_height_bifocal"] = 0;
                $ccc["c_qty"] = sec($c->c_qty);
                $c_price = $pData[0]->pr_selling_price;
                $ccc["c_price"] = sec($pData[0]->pr_selling_price);
                $ccc["c_cost"] = 0;
                $c_cost = 0;
                $ccc["c_lens"] = $c->c_lens;
                $ccc["c_prescription"] = 0;
                $ccc["c_tprice"] = 0;
                

                $ccc["c_product_title"] = sec($pData[0]->pr_title);
                $ccc["c_product_thumb"] = $pData[0]->pr_thumb_image;
                $ccc["c_product_color"] = $pData[0]->pr_product_color;
                $ccc["cart_tot_price"] = sec($c->c_tprice);
                $ccc["cart_tot_cost"] = sec($c->c_tcost);
                $cData[sec($c->c_pr_id)] = (object)$ccc;
                if(!empty($c->c_pv_id))
                {
                    $pvData =  $CI->HomeDb->getData('pv_variation',array("pv_id"=>$c->c_pv_id));
                    $cart_product_size = array("cps_eye_size"=>sec($pvData[0]->pv_eye_size),
                        "cps_bridge"=>sec($pvData[0]->pv_bridge),"pv_ed"=>sec($pvData[0]->pv_ed),
                        "cps_temple"=>sec($pvData[0]->pv_temple),"cps_b_measurement"=>sec($pvData[0]->pv_b_measurement),"cps_price"=>sec($pvData[0]->pv_price),"cps_cost"=>sec($pvData[0]->pv_cost),"cps_size"=>$pvData[0]->pv_eye_size.'-'.$pvData[0]->pv_bridge.'-'.$pvData[0]->pv_temple.'-B'.$pvData[0]->pv_b_measurement);
                    $cData[sec($c->c_pr_id)]->cart_product_size = (object)$cart_product_size;
                }
                //lens material
               

                $lmData = $CI->HomeDb->getDetailedData(array("lt.lt_title","lc.*","lm.lm_title"),'c_cart_lens_material lc',array("lc.cm_c_id"=>$c->c_id),null,null,null,array(array("lens_type lt","lt.lt_id = lc.cm_lens","left"),array("lens_materials lm","lm.lm_id = lc.cm_material","left")));
                if(!empty($lmData))
                {
                    $xxx = array("cm_lens"=>sec($lmData[0]->cm_lens),"cm_material"=>sec($lmData[0]->cm_material),"cm_price"=>sec($lmData[0]->cm_price),"cm_cost"=>sec($lmData[0]->cm_cost),"cm_lens_type_title"=>sec($lmData[0]->lt_title),"cm_lens_mat_title"=>sec($lmData[0]->lm_title));
                     $cData[sec($c->c_pr_id)]->cart_lens_material = (object)$xxx;
                }
               

                //c_cart_polarised_lens
                 
                $plData =  $CI->HomeDb->getDetailedData(array("cpl.*","pl.pl_name"),'c_cart_polarised_lens cpl',array("cpl.cp_c_id"=>$c->c_id),null,null,null,array(array("polarized_lens pl","pl.pl_id=cpl.cp_lens","left")));
            if(!empty($plData))
            {
                $xxx = array("cp_polarised_lens"=>sec($plData[0]->cp_lens),"cp_price"=>sec($plData[0]->cp_price),"cp_cost"=>sec($plData[0]->cp_cost),"polarised_lens_title"=>sec($plData[0]->pl_name));;
                $cData[sec($c->c_pr_id)]->cart_polarised_lens = (object)$xxx;
               
            }
             $trData =  $CI->HomeDb->getDetailedData(array("ct.*","t.tr_name"),'c_cart_transition ct',array("ct.ct_c_id"=>$c->c_id),null,null,null,array(array("transitions t","t.tr_id = ct.ct_tr_id","left")));
            
             if(!empty($trData))
                {
                    
                   $xxx = array("ct_transition_title"=>sec($trData[0]->tr_name),"ct_price"=>sec($trData[0]->ct_price),"ct_cost"=>sec($trData[0]->ct_cost),"ct_tr_id"=>sec($trData[0]->ct_tr_id));;
                   $cData[sec($c->c_pr_id)]->c_cart_transition = (object)$xxx;
                    

                }

                $loData =  $CI->HomeDb->getDetailedData(array("lo.lo_name","lo.lo_id","clo.*"),'c_cart_lens_options clo',array("clo.co_c_id"=>$c->c_id),null,null,null,array(array("lens_options lo","lo.lo_id=clo.co_options_id","left")));
                if(!empty($loData ))
                {
                    $lopt = array();
                    foreach ($loData  as $key => $value) 
                    {
                        $xxx = array("co_options_title"=>sec($value->lo_name),"co_options_id"=>sec($value->lo_id),"co_price"=>sec($value->co_price),"co_cost"=>sec($value->co_cost));
                       $lopt[] = (object)$xxx;
                    }
                    $cData[sec($c->c_pr_id)]->cart_lens_options = $lopt;
                }
                $ttdata =  $CI->HomeDb->getDetailedData(array("t.tt_name","ct.*"),'c_cart_tint ct',array("ct.ct_c_id"=>$c->c_id),null,null,null,array(array("tint_type t","t.tt_id=ct.ct_tint_type","left")));
                if(!empty($ttdata))
                {
                    $xxx = array("ct_tint_type"=>sec($ttdata[0]->ct_tint_type),
                        "ct_ttype_title"=>sec($ttdata[0]->tt_name),
                        "ct_tint_color" => sec($ttdata[0]->ct_tint_color),
                        "ct_price"=>sec($ttdata[0]->ct_price),
                        "ct_cost"=>sec($ttdata[0]->ct_cost));
                    $cData[sec($c->c_pr_id)]->cart_tint  = (object)$xxx;
                   
                     
                }

                
        }
        $data['cart'] = $cData;
    }
    else
        $data = null;
    return $data;
}




      function mageCartData()
    {
        $CI =&get_instance();
       
        if($CI->session->userdata('cart_products'))
        {
            $cart_array = $CI->session->userdata['cart_products']['cart'];
            $cart_array = (array)json_decode($cart_array);
            $odata = $CI->session->userdata['cart_products']['order'];
            $odata = (array)json_decode($odata);
            
            $cart = $cart_array;
            $order = $odata;
            return $CI->essential->modifyCart($cart,$order);
        }
       
    }
    function modifyCart($cart,$order)
    {
        $CI =&get_instance();
         $CI->db->trans_start();
      
         $lid = sec($CI->session->userdata['l_uid']['l_id'],'d');
         $mem = $CI->HomeDb->getData('m_member',array("m_l_id"=>$lid));
        $order_id = $CI->essential->getOrderId($lid);
        if(!empty($order_id))
        {
            $orderDbData = $CI->HomeDb->getData('o_order',array("o_id"=>$order_id));
           
            if(!empty($orderDbData))
            {
                $o_grant_total = $orderDbData[0]->o_grant_total;
                $o_total_price = $orderDbData[0]->o_total_price;
                $o_total_cost = $orderDbData[0]->o_total_cost;
                $flag = true;
            }
            else
            $flag = false;
            
        }
        else
        $flag = false;
        if(!$flag)
        {
            $orderData['o_grant_total'] = sec($order['o_total_price'],'d') +sec($order['o_admin_delivery_charge'],'d') + sec($order['o_addtl_charge'],'d') ;
            $orderData['o_total_price'] = sec($order['o_total_price'],'d');
            $orderData['o_total_cost'] = sec($order['o_total_cost'],'d');
            $orderData['o_admin_delivery_charge'] = sec($order['o_admin_delivery_charge'],'d');
            $orderData['o_addtl_charge'] = sec($order['o_addtl_charge'],'d');
            $orderData['o_total_price'] = sec($order['o_total_price'],'d');
            $orderData['o_order_status_id'] = '2';
            $orderData['o_paid_status'] = '2';
            
            $orderData['o_user'] = $mem[0]->m_id;
            $orderData['o_delivery_charge'] = 0;
            $order_id = $CI->HomeDb->insert($orderData, 'o_order');
        }
        else
        {
                $orderData['o_grant_total'] = $o_grant_total + sec($order['o_total_price'],'d')  ;
                $orderData['o_total_price'] = $o_total_price + sec($order['o_total_price'],'d');
                $orderData['o_total_cost'] = $o_total_cost + sec($order['o_total_cost'],'d');
                $CI->HomeDb->update($orderData,'o_order',array("o_id"=>$order_id));
        }
        
        
        foreach($cart as $index=>$c)
        {
            $cartData['c_o_id'] = $order_id;
            $cartData['c_pr_id'] = sec($c->c_pr_id,'d');
            $cartData['c_pv_id'] = sec($c->c_pv_id,'d');
            $cartData['c_height_progressive'] = $c->c_height_progressive;
            $cartData['c_height_bifocal'] = $c->c_height_bifocal;
            $cartData['c_qty'] = 1;//sec($c->c_qty,'d');
            $cartData['c_price'] = sec($c->c_price,'d');
            $cartData['c_cost'] = sec($c->c_cost,'d');
            $cartData['c_lens'] =$c->c_lens;
            $cartData['c_prescription '] = 0;
            $cartData['c_tprice'] = sec($c->cart_tot_price,'d');
            $cartData['c_tcost'] = sec($c->cart_tot_cost,'d');;
            $cart_id = $CI->HomeDb->insert($cartData, 'c_cart');

           
            $cps = $c->cart_product_size;
            $cartPSizeData['cps_pv_id'] = sec($c->c_pv_id,'d');;
            $cartPSizeData['cps_eye_size'] = sec($cps->cps_eye_size,'d');;
            $cartPSizeData['cps_bridge'] = sec($cps->cps_bridge,'d');;
            $cartPSizeData['cps_ed'] = sec($cps->pv_ed,'d');;
            $cartPSizeData['cps_temple'] = sec($cps->cps_temple,'d');;
            $cartPSizeData['cps_b_measurement'] = sec($cps->cps_b_measurement,'d');;
            $cartPSizeData['cps_price'] = sec($cps->cps_price,'d');;
            $cartPSizeData['cps_cost'] = sec($cps->cps_cost,'d');;
            $cartPSizeData['cps_c_id'] = $cart_id;

           
            if(!empty($c->cart_lens_material))
            {
                     $cmat = $c->cart_lens_material;
                $cart_lens_material['cm_c_id'] = $cart_id;
                $cart_lens_material['cm_lens'] = sec($cmat->cm_lens,'d');;
                $cart_lens_material['cm_material'] = sec($cmat->cm_material,'d');;
                $cart_lens_material['cm_price'] = sec($cmat->cm_price,'d');;
                $cart_lens_material['cm_cost'] = sec($cmat->cm_cost,'d');;
                $CI->HomeDb->insert($cart_lens_material, 'c_cart_lens_material');
            }
           
            if(!empty($c->cart_polarised_lens))
            {
                $cplens = $c->cart_polarised_lens;
                $cart_polarised_lens['cp_c_id'] = $cart_id;
                $cart_polarised_lens['cp_lens'] = sec($cplens->cp_polarised_lens,'d');;
                $cart_polarised_lens['cp_price'] = sec($cplens->cp_price,'d');;
                $cart_polarised_lens['cp_cost'] = sec($cplens->cp_cost,'d');;
                 $CI->HomeDb->insert($cart_polarised_lens, 'c_cart_polarised_lens');

                
            }
            if(!empty($c->c_cart_transition))
            {
                $ctrans = $c->c_cart_transition;
                $c_cart_transition['ct_c_id'] = $cart_id;
                $c_cart_transition['ct_tr_id'] = sec($ctrans->ct_tr_id,'d');;
                $c_cart_transition['ct_price'] = sec($ctrans->ct_price,'d');;
                $c_cart_transition['ct_cost'] = sec($ctrans->ct_cost,'d');;
                $CI->HomeDb->insert($c_cart_transition, 'c_cart_transition');
               
            }
            
            if(!empty($c->cart_lens_options))
            {
                $clop = $c->cart_lens_options;
                foreach($clop as $op)
                {

                    $cart_lens_options['co_c_id'] = $cart_id;
                    $cart_lens_options['co_options_id'] = sec($op->co_options_id,'d');;
                    $cart_lens_options['co_price'] = sec($op->co_price,'d');;
                    $cart_lens_options['co_cost'] = sec($op->co_cost,'d');;
                     $CI->HomeDb->insert($cart_lens_options, 'c_cart_lens_options');
                     
                }

            }
            
            if(!empty($c->c_precription))
            {
                $cpres = $c->c_precription;
                $c_precription['cp_c_id'] = $cart_id;
                $c_precription['cp_right_sphere'] = sec($cpres->cp_right_sphere,'d');;
                $c_precription['cp_right_cylinder'] = sec($cpres->cp_right_cylinder,'d');;
                $c_precription['cp_right_axis'] = sec($cpres->cp_right_axis,'d');;
                $c_precription['cp_right_add'] = sec($cpres->cp_right_add,'d');;
                $c_precription['cp_left_sphere'] = sec($cpres->cp_left_sphere,'d');;
                $c_precription['cp_left_cylinder'] = sec($cpres->cp_left_cylinder,'d');;
                $c_precription['cp_left_axis'] = sec($cpres->cp_left_axis,'d');;
                $c_precription['cp_left_add'] = sec($cpres->cp_left_add,'d');;
                $c_precription['cp_pd_no'] = sec($cpres->cp_pd_no,'d');;
                $c_precription['cp_pd_one'] = !empty($c_precription->cp_pd_no) && $c_precription->cp_pd_no==1?sec($cpres->cp_pd_one,'d'):0;;
                $c_precription['cp_pd_right'] = !empty($c_precription->cp_pd_no) && $c_precription->cp_pd_no==2?sec($cpres->cp_pd_right,'d'):0;;
                $c_precription['cp_pd_left'] = !empty($c_precription->cp_pd_no)  && $c_precription->cp_pd_no==2?sec($cpres->cp_pd_left,'d'):0;

                $CI->HomeDb->insert($c_precription, 'c_cart_prescription');
               
            }
            if(!empty($c->cart_tint))
            {

                $cint = $c->cart_tint;
                $cart_tint['ct_c_id'] = $cart_id;
                $cart_tint['ct_tint_type'] = sec($cint->ct_tint_type,'d');;
                $cart_tint['ct_tint_color'] = $cint->ct_tint_color;;
                $cart_tint['ct_price'] = sec($cint->ct_price,'d');;
                $cart_tint['ct_cost'] = sec($cint->ct_cost,'d');;
                $CI->HomeDb->insert($cart_tint, 'c_cart_tint');
               
            }

            $CI->HomeDb->insert($cartPSizeData, 'c_cart_product_size');
            
           
       }




        $CI->db->trans_complete();
        
        if($CI->db->trans_status()===true)
        {
            
            $CI->session->unset_userdata('cart_products');
           return true;
        }
        else
        {
            
            return false;
        }
           
    }
    
    
}