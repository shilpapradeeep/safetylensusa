<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function l_page()
    {
        $data['css']=array('css/all.min.css',
            'css/ionicons.min.css',
            'css/themify-icons.css',
            'css/linearicons.css',
            'css/flaticon.css',
            'css/simple-line-icons.css',
            'owlcarousel/css/owl.carousel.min.css',
            'owlcarousel/css/owl.theme.css',
            'owlcarousel/css/owl.theme.default.min.css',
            'css/magnific-popup.css',
            'css/slick.css',
            'css/slick-theme.css',
            "iziToast-master/dist/css/iziToast.min.css",
            'css/style.css',
            'css/responsive.css');
        $data['css_url']=array('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap',
            'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap');
        $data['js']=array('js/jquery-1.12.4.min.js',
            'js/popper.min.js',
            'bootstrap/js/bootstrap.min.js',
            'owlcarousel/js/owl.carousel.min.js',
            'js/magnific-popup.min.js',
            'js/waypoints.min.js',
            'js/parallax.js',
            'js/jquery.countdown.min.js',
            'js/Hoverparallax.min.js',
            'js/jquery.countTo.js',
            'js/imagesloaded.pkgd.min.js',
            'js/isotope.min.js',
            'js/jquery.appear.js',
            'js/jquery.parallax-scroll.js',
            'js/jquery.dd.min.js',
            'js/slick.min.js',
            'iziToast-master/dist/js/iziToast.min.js',
            'js/jquery.elevatezoom.js',
            'js/scripts.js',
            'js/common/common.js');

        if(!empty($this->session->userdata('l_uid')))
        {
            $se=$this->session->userdata('l_uid');
            if(sec($se['l_type'],'d')==1)
                redirect('dashboard','refresh');
            elseif(sec($se['l_type'],'d')==2)
                redirect('account','refresh');
            else
            {

            }
        }

        $this->load->view('front_end/login',$data);
    }


    public function l_login()
    {
        isajax();

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
            $res    = array(
                "res" => 1,
                "type" =>sec($this->session->userdata['l_uid']['l_type'],'d'),
                "msg" => "success"
            );
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
                            set_cookie('ecom_global_regenerate_id',sec($user_check[0]->l_id),time()+60*60*24*30);
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
    public function l_ogout()
    {
        //echo 'Please wait... you will redirect in a moment.';
        $this->load->helper('cookie');
        $this->session->unset_userdata('l_uid');
        $this->session->sess_destroy();

        delete_cookie(session_name());
        delete_cookie($this->config->item('sess_cookie_name'));
        delete_cookie('ecom_global_regenerate_id');
        redirect('login','refresh');
    }
    public function change_pass_form()
    {
        $this->load->view('back_end/change-password');
    }
    public function change_pass()
    {

        isajax();


        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|min_length[8]|max_length[20]|callback_check_current_pass');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_length[8]|max_length[20]|matches[new_password]');
        $this->form_validation->set_message('required','Please Enter %s');
        $this->form_validation->set_message('min_length','It seems like the details you entered are not enough !');
        $this->form_validation->set_message('max_length','%s contains data which exceeds our limit.');
        if ($this->form_validation->run() == false) {

            $errors = $this->form_validation->error_array();
            $res    = array(
                "res" => 0,
                "errors" => $errors
            );
        }
        else
        {
            $uid = sec($this->session->userdata['l_uid']['l_id'],'d');
            $pwd = trim($this->input->post('new_password'));;
            $options = ['cost' => 10];
            $new_pwd=password_hash($pwd, PASSWORD_BCRYPT, $options);
            $params['l_password'] = $new_pwd;
            if($this->HomeDb->update($params, "l_login",array("l_id"=>$uid)))
                $res = array("res"=>1,"msg"=>'Successfully changed your password!.');
            else
                $res = array("res"=>0,"msg"=>'Failed to change your password #4249');
        }



        echo json_encode($res);

    }
    function check_current_pass($pwd)
    {
        if(!empty($pwd))
        {
            $uid = sec($this->session->userdata['l_uid']['l_id'],'d');
            $user_check=$this->HomeDb->getDetailedData(array('l_password'),'l_login',array('l_id'=>$uid));


            if(!empty($user_check))
            {
                $options = ['cost' => 10];
                $exst_pwd=password_hash($pwd, PASSWORD_BCRYPT, $options);
                if(password_verify($pwd,$user_check[0]->l_password))
                {
                    return TRUE;
                }
                else
                {
                    $this->form_validation->set_message('check_current_pass', 'Current Password is incorrect.');
                    return FALSE;
                }
            }
        }
        else
        {
            return TRUE;
        }


    }
}
	