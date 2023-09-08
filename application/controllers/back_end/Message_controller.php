<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_controller extends CI_Controller 
{
	public function view_page()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

		$js = array(
				'js/message.js',
		);
        $data['js']=array_merge($data['js'],$js);

        $data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Messages',
	      3=>'javascript:void(0)',
	    );
		$this->load->view('back_end/contact',$data);

	}

	

	
    
    public function message_tbl()
    {
    	isajax();
		$data['msg_list'] = $this->msg_lst(); 
		if (!empty($data['msg_list'])) {
			$this->load->view('back_end/table/message_tbl',$data);
		}
		else
		{
			echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
		}
    }

    public function msg_lst($id=null)
    {
    	$select = array('c_id','c_name','c_email','c_phone','c_added','c_subject','c_message');
		$data=$this->HomeDb->getDetailedData($select,'c_contact',null,null,null,array('c_id','desc'));
		return $data;
    }

    

}
