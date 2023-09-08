<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CorporateManagement extends CI_Controller
{
	public function cortbl()
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
				'js/corporate_management.js'
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>'Corporate Management',
	      3=>'javascript:void(0)',
	    );
	    $cond = array('m.m_status'=>'1','l.l_login_status'=>'1','l.l_type'=>'3');
        $data['members']=$this->HomeDb->getDetailedData(array('*'),'m_member m',$cond,null,null,array('m.m_id','desc'),array(array('l_login l','l.l_id = m.m_l_id','left')));

		$this->load->view('back_end/corporate_management',$data);

	}
  
  public function amountAction()
  { 
    isajax();
    $this->form_validation->set_rules('m_amount','Amount','trim|required|numeric');
    $this->form_validation->set_rules('m_credit_balance','Credit/Balance','trim|required');

    if($this->form_validation->run()==false)     
    { 
      $errors = $this->form_validation->error_array();
      $res = array("res"=>0,"errors"=>$errors);
    }
    else
    {
      $memberId = $this->input->post('memberId');
      $m_amount = $this->input->post('m_amount');
      $m_credit_balance = $this->input->post('m_credit_balance');

      if(!empty($memberId))
      {    
       $cond = array('m.m_status'=>'1','l.l_login_status'=>'1','l.l_type'=>'3','m.m_id'=>$memberId);
       $data = $this->HomeDb->getDetailedData(array('m.*'),'m_member m',$cond,null,null,array('m.m_id','desc'),array(array('l_login l','l.l_id = m.m_l_id','left')));

       if(!empty($data))
       {   
        $param = array('m_amount'=>$m_amount,
          'm_credit_balance'=>$m_credit_balance
        );

        $this->HomeDb->update($param, 'm_member', array('m_id'=>$memberId));

        $res = array('res'=>1,'msg'=>'successfully added');
      }
      else
       $res = array('res'=>0,'msg'=>'something went wrong! #001');  
   }
   else
    $res = array('res'=>0,'msg'=>'something went wrong! #001'); 
}


echo json_encode($res);
}

	public function viewDetail()
	{
       isajax();
       $id = sec($this->input->post('id'),'d');

       if(!empty($id) && is_numeric($id))
       {
       	$cond = array('m.m_status'=>'1','l.l_login_status'=>'1','l.l_type'=>'3','m.m_id'=>$id);
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
       	$cond = array('m.m_status'=>'1','l.l_login_status'=>'1','l.l_type'=>'3','m.m_id'=>$id);
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
