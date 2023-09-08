<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller
{
	public function usertbl()
	{
		$data['css']= css_link();
    	$data['js'] = js_link();

    	$data['js']=array_merge($data['js'],js_datatable());
    	$data['css']=array_merge($data['css'],css_datatable());

		$css = array(
					'libs/dropzone/min/dropzone.min.css',
				);
		$js = array(
				"libs/dropzone/min/dropzone.min.js",

				'js/banner.js',
				'js/common.js',
				'js/user_management.js'
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'User Management',
	      3=>'javascript:void(0)',
	    );
	    $cond = array('m.m_status'=>'1','l.l_login_status'=>'1','l.l_type'=>'2');
        $data['members']=$this->HomeDb->getDetailedData(array('m.*'),'m_member m',$cond,null,null,array('m.m_id','desc'),array(array('l_login l','l.l_id = m.m_l_id','left')));

        $this->load->view('back_end/user_management',$data);
  
	}
    
    public function viewDetail()
	{
       isajax();
       $id = sec($this->input->post('id'),'d');

       if(!empty($id) && is_numeric($id))
       {
       	$cond = array('m.m_status'=>'1','l.l_login_status'=>'1','l.l_type'=>'2','m.m_id'=>$id);
       	$data = $this->HomeDb->getDetailedData(array('m.*'),'m_member m',$cond,null,null,array('m.m_id','desc'),array(array('l_login l','l.l_id = m.m_l_id','left')));

       	if(!empty($data))
       	{   
           $res = array('res'=>1,'data'=>$data);
       	}
       	else
       		$res = array('res'=>0,'msg'=>'something went wrong! #002');
       } 
       else
       	$res = array('res'=>0,'msg'=>'something went wrong! #001');


       echo json_encode($res);
       
	}

	public function deleteUser()
	{
	   isajax();
       $id = sec($this->input->post('id'),'d');

       if(!empty($id) && is_numeric($id))
       {
       	$cond = array('m.m_status'=>'1','l.l_login_status'=>'1','l.l_type'=>'2','m.m_id'=>$id);
       	$data = $this->HomeDb->getDetailedData(array('m.*'),'m_member m',$cond,null,null,array('m.m_id','desc'),array(array('l_login l','l.l_id = m.m_l_id','left')));

       	if(!empty($data))
       	{   

       		$this->db->trans_start();
       		$this->HomeDb->update(array('m_status'=>'2'),'m_member',array('m_id'=>$id,'m_status'=>'1'));
       		$this->HomeDb->update(array('l_login_status'=>'2'),'l_login',array('l_username'=>$data[0]->m_email,'l_login_status'=>'1'));
       		$this->db->trans_complete();

       		if ($this->db->trans_status() === TRUE)
                $res = array('res'=>1,'msg'=>'Successfully Removed');
            else
            	$res = array('res'=>0,'msg'=>'something went wrong! #003');
       		
       	}
       	else
       		$res = array('res'=>0,'msg'=>'something went wrong! #002');
       } 
       else
       	$res = array('res'=>0,'msg'=>'something went wrong! #001');


       echo json_encode($res);	
	}

	
}
