<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SampleMail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        
        $this->load->library('session');
       
        $this->load->model('HomeDb');
        date_default_timezone_set('Asia/Kolkata');
        /*$this->load->helper(array('grace_authenticate','file'));
        authenticate();  */
    }
   
    public function index()
    {

       /****** Mail Detail *********/
            $data['mail_invo']=get_instance()->essential->get_mail_invoice('29','2');
            
            if(!empty($data['mail_invo']))
            {
            $data['mailData']=array('m_name'=>$data['mail_invo'][0]['m_name'],
                'm_email'=>$data['mail_invo'][0]['m_email']);
            }
            
        /****** End Mail Detail *********/
        if(!empty($data['mail_invo']))
        {
            $data['mailData']['subject']=" order placed successfully.";
            $data['type']='order-success';

            //$data['mail_addr']=get_instance()->essential->get_addr('ma_id',array($data['mail_invo'][0]['i_billing_id'],$data['mail_invo'][0]['i_delivery_id']));
            $data['cart_detail']=get_instance()->essential->get_cart_det($data['mail_invo'][0]['o_id']);
           // tsi($data['cart_detail']);
            if(!empty(content('pdf_header_img')))
            {
                $data['header_from']="ltr_hd";
                $data['img_path']=content('pdf_header_img');
            }
            else
            {
                $data['header_from']="lgo";
                $data['img_path']=repo().'front_end/images/logo/three.png';
            }
            //     $path='ThreeSeasInfologics/invoice/'.$data['mail_invo'][0]['o_id'].'.pdf';
            //     $str=get_instance()->essential->create_pdf($data,$path);
            //     $this->db->trans_start();
            //      $upd_stat=$this->HomeDb->update(array('i_pdf'=>$data['mail_invo'][0]['i_unique_id'].'.pdf'), 'i_invoice', array('i_id'=>sec($invo_id,'d'),'i_lid'=>$this->lid,'i_unique_id'=>$uniq));
            //     $this->db->trans_complete();
            // $data['pdf_path']=$path;
        }
       
        if(!empty($data['mail_invo']))
        {
            $str=get_instance()->essential->mail_send($data);
            if($str!=1)
            {
                get_instance()->essential->mail_error($data,$str);
            }
        }
        
    }
    
}