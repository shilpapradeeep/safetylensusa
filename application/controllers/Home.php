<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index()
	{
	    $data['safety_frames']=prducts(array('pr_status'=>'1','pr_cat_id'=>1),5,null,array('pr_id','desc'));
        $data['sunglasses']=prducts(array('pr_status'=>'1','pr_cat_id'=>3),5,null,array('pr_id','desc'));
        $data['eyeglasses']=prducts(array('pr_status'=>'1','pr_cat_id'=>8),5,null,array('pr_id','desc'));
        $data['loupes']=prducts(array('pr_status'=>'1','pr_cat_id'=>2),5,null,array('pr_id','desc'));
        $data['sports_goggles']=prducts(array('pr_status'=>'1','pr_cat_id'=>4),4,null,array('pr_id','desc'));
        $data['swimming_goggles']=prducts(array('pr_status'=>'1','pr_cat_id'=>5),4,null,array('pr_id','desc'));
        $data['reading_glass']=prducts(array('pr_status'=>'1','pr_cat_id'=>6),4,null,array('pr_id','desc'));
        $data['safety_goggles']=prducts(array('pr_status'=>'1','pr_cat_id'=>7),4,null,array('pr_id','desc'));
        $data['brands']=$this->HomeDb->getData('b_brand',array('b_status'=>'1'));
        $data['banner']=$this->HomeDb->getDetailedData(array('b.*'),'b_home_banner b',array('b.b_status'=>'1'),null,null,array('b.b_id','desc'));
		
		$this->load->view('front_end/home',$data);
	}
	
	public function about()
	{

		$this->load->view('front_end/about');
	}
	public function terms_conditions()
	{

		$this->load->view('front_end/terms_conditions');
	}
	public function privacy_policy()
	{

		$this->load->view('front_end/privacy_policy');
	}
	public function refund_policy()
	{

		$this->load->view('front_end/refund_policy');
	}
	
	public function cancellation_policy()
	{

		$this->load->view('front_end/cancellation_policy');
	}
	
	public function contact()
	{
	    $this->load->view('front_end/contact');
	}
	public function c_submit()
	{
		isajax();
		$this->load->helper("email_helper");	

		$this->form_validation->set_rules('cname', 'Name', 'required|trim|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('cphone', 'Your Phone', 'trim|required|callback_validate_mobile');
		$this->form_validation->set_rules('cemail', 'Email', 'required|trim|min_length[3]|max_length[55]|valid_email');
		$this->form_validation->set_rules('csubject', 'Subject', 'required|trim|min_length[3]|max_length[55]');
		$this->form_validation->set_rules('cmessage', 'Message', 'required|trim|min_length[3]');
		
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
			
			$data_insert=array(
					'c_name'=>noHtml($this->input->post('cname')),
					'c_email'=>noHtml($this->input->post('cemail')),
					'c_phone'=>noHtml($this->input->post('cphone')),
					'c_subject'=>noHtml($this->input->post('csubject')),
					'c_message'=>noHtml($this->input->post('cmessage'))
				);

			
    	//**********************Mail Send start*************************//
    			                
               // user   
               $data['mailData']=array(
    	           	'm_name'=>noHtml($this->input->post('cname')),
    	           	'm_email'=>noHtml($this->input->post('cemail'))
    	           );
               $data['mailData']['subject']='Contact Us';
               $data['type']='contact-user';
    
                $str=get_instance()->essential->mail_send($data);
                
             // admin
                $adata['mailData']=array(
    	           	'm_name'=>admin_name,
    	           	'm_email'=>admin_email
    	           );
                $adata['mail_contact']=array(
                	'c_name'=>noHtml($this->input->post('cname')),
    	           	'c_email'=>noHtml($this->input->post('cemail')),
    	           	'c_phone'=>noHtml($this->input->post('cphone')),
    	           	'c_message'=>noHtml($this->input->post('cmessage')),
    	           	'c_subject'=>noHtml($this->input->post('csubject'))
                );
                $adata['mailData']['subject']='Contact Us';
                $adata['type']='contact-admin';
    
                $str=get_instance()->essential->mail_send($adata);
                
          //**********************Mail Send end**************************//

			
			if($this->HomeDb->insert($data_insert, 'c_contact'))
			{
				$res    = array(
					"res" => 1,
					"msg" => "Successfully submitted"
				);

			}
			else
				$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #852741");




			}


			echo json_encode($res);
		}
	function validate_mobile($str)
	{
		if(!empty($str))
		{
			$pattern = "^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$^";
			if (!preg_match($pattern, $str))
			{
				$this->form_validation->set_message('validate_mobile', 'Mobile Number must be valid.');
				return FALSE;
			}
		}
		return TRUE;
	}
	public function blog($page=0)
	{
		$url=$this->uri->segment(1);
			
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().$url;
		
		
		$config['num_links'] = 3;
      	$config['use_page_numbers'] = TRUE;
      	$config['attributes'] = array('class' => 'page-link');
      	$config['anchor_class'] = 'class="page-link" ';
		$config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li class="page-item">';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['first_tag_open'] = '<li class="page-item">';
	    $config['first_tag_close'] = '</a></li>';
	    $config['last_tag_open'] = '<li class="page-item next">';
	    $config['last_tag_close'] = '</li>';
	    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
	    $config['prev_tag_open'] = '<li class="prev">';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
	    $config['next_tag_open'] = '<li class="next">';
	    $config['next_tag_close'] = '</li>';


		$cond=array('b_status'=>'1');
		
		$config['total_rows'] =$this->HomeDb->getCount(array(),'b_blog',$cond);
      	$config['per_page'] =15;
      	$choice = $config["total_rows"] / $config["per_page"];
		$this->pagination->initialize($config);
      	//$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
      	$offset = $page==0? 0: ($page-1)*$config["per_page"];
      	//tsi($offset);
      	$data['choice'] = $config["num_links"]+1;
	
      	if($page-1>$choice)
      	{
            redirect('error','refresh');
      	}
      	else 
      	{
      		    $g['select']=array('b_id','b_title','b_content','b_img','b_added','b_summary','b_seo_title','b_slug','b_seo_keywords','b_seo_description');
	      		$g['where']=$cond;
	      		$g['table']='b_blog';
				$g['order_by']=array('b_id','desc');
				$g['object']="1";
				$g['limit']=$config['per_page'];
				
				$g['offset']=$offset;
				$res=$this->HomeDb->grab($g);
	            $str_links = $this->pagination->create_links($choice);
	            $data["links"] = explode('&nbsp;',$str_links);
           	
      	}
		
		$data['blog']=$res;
		
		
		$this->load->view('front_end/blog',$data);	
		
	}
	public function blog_details($slug,$id)
	{
	
		if(!empty($id) && is_numeric($id))
		{
			$data['blog']=$this->HomeDb->getData('b_blog',array('b_status'=>'1','b_id'=>$id));
			$this->load->view('front_end/blog-detail',$data);

		}
		else
		{
			$this->session->set_flashdata('msg','Oops. Unauthorized Access. Error code 6664529433');
		}

		
		
	}
	
    public function image_col()
	{
		$ipt['select'] = array('GROUP_CONCAT(m_file_path) as img','m_type_id');
		$ipt['where'] = array("m_status"=>'1');
		$ipt['group_by'] = array("m_type_id");
		$ipt['table'] = 'm_media';
		$data = $this->HomeDb->grab($ipt);
		foreach ($data as $key => $val) {
			$arr_img[$val['m_type_id']] = $val['img'];
		}
		return $arr_img;
	}
	
}
