<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_controller extends CI_Controller {

	public function member_add()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

    	$css = array(
					'libs/fileuploads/css/dropify.css',

				);
		$js = array(
				"libs/fileuploads/js/dropify.js",
				"libs/fileuploads/js/fileupload.js",
				"js/member.js",
				"js/common.js",
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['mem_list'] = $this->member_lst(); 
    	
		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'User Management',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/member_add',$data);
	}

	public function member_details()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	
		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Member Details',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/member_details',$data);
	}

	public function member_lst($id=null,$type=null)
	{
		if (!empty($id) && $type == "edit")
		{
			$select = array('m.m_id','m.m_l_id','m.m_name','m.m_email','m.m_phone','md.ma_address as md_address','md.ma_pincode as md_pin','md.ma_distrct as md_district','md.ma_state as md_state','mb.ma_address as mb_address','mb.ma_pincode as mb_pin','mb.ma_distrct as mb_district','mb.ma_state as mb_state','m.m_photo');
			$cond = array('m.m_status'=>'1','m.m_l_id'=>$id,'md.ma_type'=>'1','mb.ma_type'=>'2','md.ma_status'=>'1','mb.ma_status'=>'1');
			$join = array(
				array('ma_member_address md','md.ma_l_id = m.m_l_id','left'),
				array('ma_member_address mb','mb.ma_l_id = m.m_l_id','left'),
			);
		}
		elseif (!empty($id) && $type == "member_details")
		{
			$select = array('m.m_id','m.m_l_id','m.m_name','m.m_email','m.m_phone','m.m_photo');
			$cond = array('m.m_status'=>'1','m.m_l_id'=>$id);
			$join = array();
		}
		elseif (!empty($id) && $type == "delivery")
		{
			$select = array('md.ma_address as md_address','md.ma_pincode as md_pin','md.ma_distrct as md_district','md.ma_state as md_state','md.ma_status as md_status');
			$cond = array('m.m_status'=>'1','m.m_l_id'=>$id,'md.ma_type'=>'1');
			$join = array(
				array('ma_member_address md','md.ma_l_id = m.m_l_id','left'),
			);
		}
		elseif (!empty($id) && $type == "billing")
		{
			$select = array('mb.ma_address as mb_address','mb.ma_pincode as mb_pin','mb.ma_distrct as mb_district','mb.ma_state as mb_state','mb.ma_status as mb_status');
			$cond = array('m.m_status'=>'1','m.m_l_id'=>$id,'mb.ma_type'=>'2');
			$join = array(
				array('ma_member_address mb','mb.ma_l_id = m.m_l_id','left'),
			);
		}
		elseif (!empty($id) && $type == "delivery_edit")
		{
			$select = array('md.ma_address as md_address','md.ma_pincode as md_pin','md.ma_distrct as md_district','md.ma_state as md_state','md.ma_status as md_status');
			$cond = array('m.m_status'=>'1','m.m_l_id'=>$id,'md.ma_type'=>'1','md.ma_status'=>'1');
			$join = array(
				array('ma_member_address md','md.ma_l_id = m.m_l_id','left'),
			);
		}
		elseif (!empty($id) && $type == "billing_edit")
		{
			$select = array('mb.ma_address as mb_address','mb.ma_pincode as mb_pin','mb.ma_distrct as mb_district','mb.ma_state as mb_state','mb.ma_status as mb_status');
			$cond = array('m.m_status'=>'1','m.m_l_id'=>$id,'mb.ma_type'=>'2','mb.ma_status'=>'1');
			$join = array(
				array('ma_member_address mb','mb.ma_l_id = m.m_l_id','left'),
			);
		}
		else
		{
			$select = array('m.m_id','m.m_l_id','m.m_name','m.m_email','m.m_phone');
			$cond = array('m.m_status'=>'1');
			$join = array();
		}
		$data=$this->HomeDb->getDetailedData($select,'m_member m',$cond,null,null,array('m.m_id','desc'),$join);
		return $data;
	}

	public function submit_member()
	{
		isajax();

		$this->form_validation->set_message('required','Please Enter %s');
		$this->form_validation->set_message('is_unique','%s already exist.');
		$this->form_validation->set_rules('m_name','Name','trim|required');
		$this->form_validation->set_rules('m_email','Email','trim|required|valid_email|callback_check_unique');
		$this->form_validation->set_rules('m_phone','Phone','trim|required|callback_check_phone');
		$this->form_validation->set_rules('profile_img_temp','Image','trim|required',array('required'=>'Please Select %s'));
		if(empty($this->input->post('m_id')))
		{
			$this->form_validation->set_rules('m_pin_number_d','Pin Number','trim|required|callback_check_pin');
			$this->form_validation->set_rules('m_pin_number_b','Pin Number','trim|required|callback_check_pin');
		}

		
		if($this->form_validation->run())     
    	{ 
			
			$data['m_name'] = noHtml($this->input->post('m_name'));
			$data['m_email'] = noHtml($this->input->post('m_email'));
			$data['m_phone'] = noHtml($this->input->post('m_phone'));
			$data['m_photo'] =	noHtml($this->input->post('profile_img_temp'));
			
			

			if(empty($this->input->post('m_id')))
			{
				$data1['ma_address'] = noHtml($this->input->post('m_address_d'));
				$data1['ma_pincode'] = noHtml($this->input->post('m_pin_number_d'));
				$data1['ma_distrct'] = noHtml($this->input->post('m_district_d'));
				$data1['ma_state'] = noHtml($this->input->post('m_state_d'));
				$data1['ma_type'] = '1';
				$data2['ma_address'] = noHtml($this->input->post('m_address_b'));
				$data2['ma_pincode'] = noHtml($this->input->post('m_pin_number_b'));
				$data2['ma_distrct'] = noHtml($this->input->post('m_district_b'));
				$data2['ma_state'] = noHtml($this->input->post('m_state_b'));
				$data2['ma_type'] = '2';
				$data3['l_name'] = noHtml($this->input->post('m_name'));
				$data3['l_username'] = noHtml($this->input->post('m_email'));
				$data3['l_phone'] = $data['m_phone'];
				$options = ['cost' => 10];
				$pwd = random_num(8);
				$data3['l_unique_id'] ="6d740024fa4fcec9e3b3439924ef99f6";
				$data3['l_password'] = encrypt_pwd($data3['l_unique_id'],$pwd);
				$data3['l_type'] ='2';
				
				$d_m['mailData']=array(
					'a_title'=>content('project_name'),
					'm_name'=>$data['m_name'],
					'm_email'=>$data['m_email'],
					'pwd'=>$pwd,
					'subject'=>'Welcome To '.content('project_name'),
					'content'=>'The Registration completed successfully.',
					'i_type'=>'1',
				);
				$d_m['type'] = 'user';

				$data['m_status'] = '1';
				$data['m_l_id'] = "0";
				
				
				// $l_id = $this->HomeDb->insert($data,"m_member");
				// if(!empty($l_id))
				// {
				// 	$lg_id = $this->HomeDb->insert($data3,"l_login");
				// 	$data4['m_l_id'] = $lg_id;
				// 	if ($this->HomeDb->update($data4,"m_member",array("m_id"=>$l_id))) {
				// 		$data1['ma_l_id'] = $lg_id;
				// 		$data2['ma_l_id'] = $lg_id;
				// 		$ma_l_id1 = $this->HomeDb->insert($data1,"ma_member_address");
				// 		$ma_l_id2 = $this->HomeDb->insert($data2,"ma_member_address");
				// 		if (!empty($ma_l_id1) && !empty($ma_l_id2)) 
				// 		{
						
							// $res = array("res"=>1,"msg"=>"Member Added Successfully");
				            //$this->load->helper('email');
					        
					       // $mail_con = $this->load->view('mail/mail-design',$d_m,TRUE);
					        
					       // $mail_con = "Your Password is ".$pwd  content('project_name')
					        
					       // $str=get_instance()->essential->mail_send($d_m);
            // 				if($str!=1)
            // 				{
            // 					get_instance()->essential->mail_error($d_m,$str);
            // 					$res = array("res"=>1,"msg"=>"Mail Something went Wrong! Error Code #5421130");
					       //     $this->HomeDb->update(array('m_status'=>'2'),"m_member",array("m_id"=>$l_id));
					       //     $this->HomeDb->update(array('ma_status'=>'2'),"ma_member_address",array("ma_id"=>$ma_l_id1));
					       //     $this->HomeDb->update(array('ma_status'=>'2'),"ma_member_address",array("ma_id"=>$ma_l_id2));
					       //     $this->HomeDb->update(array('l_login_status'=>'2'),"l_login",array("lg_id"=>$lg_id));
            // 				}
            // 				else
            // 				{
            // 					$res = array("res"=>1,"msg"=>"Member Added Successfully");
            // 				}
					        
				// 		}
				// 		else
				// 			$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421131");
				// 	}
				// 	else
				// 	{
				// 		$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421132");
				// 		$this->HomeDb->update(array('m_status'=>'2'),"m_member",array("m_id"=>$l_id));
				// 	}
				// }
				// else
				// 	$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
				// lq();
				
				$this->db->trans_start();
				$l_id = $this->HomeDb->insert($data,"m_member");
				$lg_id = $this->HomeDb->insert($data3,"l_login");
				$data4['m_l_id'] = $lg_id;
				$data1['ma_l_id'] = $lg_id;
				$data2['ma_l_id'] = $lg_id;
				$this->HomeDb->insert($data1,"ma_member_address");
				$this->HomeDb->insert($data2,"ma_member_address");
				$this->HomeDb->update($data4,"m_member",array("m_id"=>$l_id));
				$this->db->trans_complete();
				if($this->db->trans_status())
				{
				    $str=get_instance()->essential->mail_send($d_m);
                    if($str!=1)
                    {
                    	get_instance()->essential->mail_error($d_m,$str);
                    	$res = array("res"=>1,"msg"=>"Mail Something went Wrong! Error Code #5421130");
                    }
                    else
                    {
                    	$res = array("res"=>1,"msg"=>"Member Added Successfully");
                    }
				}
				else
				{
				    $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421131");
				}
			}
			else
			{
				$m_id = sec($this->input->post('m_id'),'d');
				if(is_numeric($m_id))
				{
					$tdata= $this->HomeDb->getDetailedData(array('m_l_id'),'m_member',array("m_id"=>$m_id,"m_status"=>'1'));
					
					if(!empty($tdata))
					{
						if($this->HomeDb->update($data,"m_member",array("m_id"=>$m_id)))
						{
							$res = array("res"=>1,"msg"=>"Member Edited Successfully");
						}
						else
							$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
					}
					else
						$res = array("res"=>0,"msg"=>"Invalid Member choosed.");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");	
			}
		}
		else
	    {    
	        $errors = $this->form_validation->error_array();
	        $res = array("res"=>0,"errors"=>$errors);
	    }
		echo json_encode($res);
	}
	
	public function check_phone($str)
	{
		if(!empty($str))
        {
        	if(strlen($str) > 13)
        	{
        		$this->form_validation->set_message('check_phone', 'Mobile Number must be valid.');
                return FALSE;
        	}
        	else
        	{
        		$pattern = "^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$^";
	            if(!preg_match($pattern, $str))
	            {
	                $this->form_validation->set_message('check_phone', 'Mobile Number must be valid.');
	                return FALSE;
	            }
	            else
	            {
	                return TRUE;
	            }
        	}
            
        }
        return TRUE;
	}

	public function check_pin($str)
	{
		if(!empty($str))
        {
        	if(strlen($str) != 6)
        	{
        		$this->form_validation->set_message('check_pin', 'Pin Number must be valid.');
                return FALSE;
        	}
        	else
        	{
        		if (is_numeric($str)) {
        			return TRUE;
        		}
        		else
        		{
        			$this->form_validation->set_message('check_pin', 'Pin Number must be valid.');
                	return FALSE;
        		}
        		
        	}
            
        }
        return TRUE;
	}

	public function check_unique($str)
	{
		if(!empty($str))
        {
    		$id = sec($this->input->post('m_id'),'d');
    		$mail= $this->HomeDb->getData('m_member',array("m_email"=>$str,"m_status"=>'1'));
    		if (!empty($id) && is_numeric($id)) 
    		{
    			$tdata= $this->HomeDb->getDetailedData(array('m_email'),'m_member',array("m_id"=>$id,"m_status"=>'1'));

	            if($tdata[0]->m_email == $str)
	            {
	                return TRUE;
	            }
	            else
	            {
	                if (!empty($mail)) 
	                {
	                	$this->form_validation->set_message('check_unique', 'Email already exist. #5421130');
                		return FALSE;
	                }
	                else
	                {
	                	return TRUE;
	                }
	            }
    		}
    		else
    		{
    			if (!empty($mail)) 
                {
                	$this->form_validation->set_message('check_unique', 'Email already exist. #5421131');
            		return FALSE;
                }
                else
                {
                	return TRUE;
                }
    		}
    		
            
        }
        return TRUE;
	}

	public function delete_member()
	{
		$m_id = sec($this->input->post('id'),'d');
		$data['m_status'] = "2";
		$data1['l_login_status'] = "2";

		if(!empty($m_id) && is_numeric($m_id))
		{

			$tdata= $this->HomeDb->getDetailedData(array('m_l_id'),'m_member',array("m_l_id"=>$m_id,"m_status"=>'1'));
			
			if(!empty($tdata))
			{

				if($this->HomeDb->update($data,"m_member",array("m_l_id"=>$m_id)) && $this->HomeDb->update($data1,"l_login",array("l_id"=>$tdata[0]->m_l_id)))
				{
				
					// lq();
					$res = array("res"=>1,"msg"=>"Member deleted Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
			}
			else
				$res = array("res"=>0,"msg"=>"Invalid Member choosed.");
		}
		else
		{
			$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
		}
		echo json_encode($res);
	}
	
	public function user_password_change()
	{
		isajax();
		$l_id = sec($this->input->post('id'),'d');

		if(!empty($l_id) && is_numeric($l_id))
		{
		    $pwd = random_num(8) ;
			$data['l_unique_id'] ="6d740024fa4fcec9e3b3439924ef99f6";
			$data['l_password'] = encrypt_pwd($data['l_unique_id'],$pwd);



			$tdata= $this->HomeDb->getDetailedData(array('*'),'m_member',array("m_l_id"=>$l_id,"m_status"=>'1'));
			
			if(!empty($tdata))
			{
				$d_m['mailData']=array(
					'a_title'=>content('project_name'),
					'm_name'=>$tdata[0]->m_name,
					'm_email'=>$tdata[0]->m_email,
					'pwd'=>$pwd,
					'subject'=>'Welcome To '.content('project_name'),
					'content'=>'Your password is changed as per the request. New credentials are given below.',
				);
				$d_m['type'] = 'user';

				if($this->HomeDb->update($data,"l_login",array("l_id"=>$l_id)))
				{
					// lq();					        

			        $str=get_instance()->essential->mail_send($d_m);
    				if($str!=1)
    				{
    					get_instance()->essential->mail_error($d_m,$str);
    					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421132");
    				}
    				else
    				{
    					$res = array("res"=>1,"msg"=>"Member Password change Successfully");
    				}
				// 	$res = array("res"=>1,"msg"=>"Member Password change Successfully");
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
			}
			else
				$res = array("res"=>0,"msg"=>"Invalid Member choosed.");
		}
		else
		{
			$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");
		}
		echo json_encode($res);
	}

	public function get_edit_data()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if (!empty($id) && is_numeric($id)) 
		{
			$data = $this->member_lst($id,'member_details');
			// lq();
			if (!empty($data)) 
			{
				if ( !empty($data[0]->m_photo) &&  file_exists( FCPATH.'ThreeSeasInfologics/uploads/members/'.$data[0]->m_photo) ) 
              		$img1 = thumb(b('ThreeSeasInfologics/uploads/members/').$data[0]->m_photo,430,200);
           		else
                  	$img1 = thumb(repo().'uploads/no-image.jpg',316,200); 
                // $data1 = $this->member_lst($id,'delivery_edit');
                // $data2 = $this->member_lst($id,'billing_edit');
           
				$arr_val = array(
					'm_id'=>sec($data[0]->m_id),
					'm_name'=>$data[0]->m_name,
					'm_email'=>$data[0]->m_email,
					'm_phone'=>$data[0]->m_phone,
					'm_photo'=>$data[0]->m_photo,
					'm_photo_path'=>$img1,
				);

				// if(!empty($data1))
				// {
				// 	$d = array(
				// 		'md_address'=>not($data1[0]->md_address,''),
				// 		'md_pin'=>not($data1[0]->md_pin,''),
				// 		'md_district'=>not($data1[0]->md_district,''),
				// 		'md_state'=>not($data1[0]->md_state,''),
				// 	);
				// 	$arr_val = array_merge($arr_val,$d);
				// }
				// if(!empty($data2))
				// {
				// 	$b = array(
				// 		'mb_address'=>not($data2[0]->mb_address,''),
				// 		'mb_pin'=>not($data2[0]->mb_pin,''),
				// 		'mb_district'=>not($data2[0]->mb_district,''),
				// 		'mb_state'=>not($data2[0]->mb_state,''),
				// 	);
				// 	$arr_val = array_merge($arr_val,$b);
				// }

				$res = array('res'=>'1','data'=>$arr_val);
			}
			else
			{
				$res = array('res'=>'0','data'=>"");
			}
		}
		echo json_encode($res);
	}

	public function get_detail_data($id)
	{
		$id = sec($id,'d');
		$data['css']= css_link();
    	$data['js'] = js_link();


		$js = array(
				
				"js/member.js",
				"js/common.js",
		);
        $data['js']=array_merge($data['js'],$js);

    	$data['member_details'] = $this->member_lst($id,'member_details');

		$data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Member Details',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/member_details',$data);
	}

	public function add_address()
	{
		isajax();

		$this->form_validation->set_message('required','Please Enter %s');
		$this->form_validation->set_message('is_unique','%s already exist.');
		$this->form_validation->set_rules('m_pin_number','Pin Number','trim|required|callback_check_pin');

		
		if($this->form_validation->run())     
    	{ 
			
			$data1['ma_address'] = noHtml($this->input->post('m_address'));
			$data1['ma_pincode'] = noHtml($this->input->post('m_pin_number'));
			$data1['ma_distrct'] = noHtml($this->input->post('m_district'));
			$data1['ma_state'] = noHtml($this->input->post('m_state'));
			$data1['ma_type'] = noHtml($this->input->post('ma_type'));
			$data1['ma_l_id'] = sec($this->input->post('m_id'),'d');
			

			if(!empty($data1['ma_l_id']) && is_numeric($data1['ma_l_id']))
			{
				$data1['ma_status'] = '1';
				

				$l_id = $this->HomeDb->insert($data1,"ma_member_address");
				if(!empty($l_id))
				{
					$data2['ma_status'] = '2';
					if ($this->HomeDb->update($data2,"ma_member_address",array("ma_l_id"=>$data1['ma_l_id'],'ma_type'=>$data1['ma_type'],'ma_id!='=>$l_id))) {
						$res = array("res"=>1,"msg"=>"Member Address Added Successfully");
					}
					else
						$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421130");					
				}
				else
					$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421131");
				// lq();
			}
			else
			{
				$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");	
			}
		}
		else
	    {    
	        $errors = $this->form_validation->error_array();
	        $res = array("res"=>0,"errors"=>$errors);
	    }
		echo json_encode($res);
	}
	public function member_list()
	{
		isajax();
		$data['mem_list'] = $this->member_lst(); 
		if (!empty($data['mem_list'])) {
			$this->load->view('back_end/member_list',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}

	}

	public function member_pro_details()
	{
		isajax();
		
		$data['member_details'] = $this->member_lst($id,'member_details');
		if (!empty($data['member_details'])) {
			$this->load->view('back_end/membe_details/member_personal_details',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}

		
	}
	public function member_d_address()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if (!empty($id) && is_numeric($id)) {
			$data['member_d_address'] = $this->member_lst($id,'delivery');
			if (!empty($data['member_d_address'])) {
				$this->load->view('back_end/member_details/member_d_address',$data);
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
	public function member_b_address()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if (!empty($id) && is_numeric($id)) {
			$data['member_b_address'] = $this->member_lst($id,'billing');
			if (!empty($data['member_b_address'])) {
				$this->load->view('back_end/member_details/member_b_address',$data);
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
}
