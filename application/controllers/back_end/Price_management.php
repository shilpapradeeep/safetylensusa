<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price_management extends CI_Controller
{
	public function price_page()
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

				'js/price.js',
				'js/common.js',
		);
		$data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['bread_crum']=array(0=>'Dashboard',
	      1=>'javascript:void(0)',
	      2=>' Price Management',
	      3=>'javascript:void(0)',
	    );
        $data['price']=$this->HomeDb->getDetailedData(array('t.*'),'t_price_settings t',array('t.t_status'=>'1'),null,null,array('t.t_id','desc'));
		$this->load->view('back_end/price_add',$data);

	}

	

	public function submit_price()
	{
		isajax();

		$this->form_validation->set_message('required','Please Enter %s');
		$this->form_validation->set_message('is_unique','%s already exist.');
		$this->form_validation->set_rules('t_charge','Tint Charge','trim|required|min_length[3]|max_length[55]');
        $this->form_validation->set_rules('t_cost_title','Tint Cost','trim|required');
        $this->form_validation->set_rules('t_lens_charge','Polarised Lens Charge','trim|required');
        $this->form_validation->set_rules('t_lens_cost','Polarised Lens Cost','trim|required');
        $this->form_validation->set_rules('t_transition_charge','Transition Charge','trim|required');
        $this->form_validation->set_rules('t_transition_cost','Transition Cost','trim|required');
        $this->form_validation->set_rules('t_delivery_charge','Admin Delivery Charge','trim|required');
        $this->form_validation->set_rules('t_additional_charge','Additional Charge','trim|required');

		if($this->form_validation->run())
    	{ 

            $data = array(
                't_charge'=>noHtml($this->input->post('t_charge')),
                't_cost_title'=>noHtml($this->input->post('t_cost_title')),
                't_lens_charge'=>noHtml($this->input->post('t_lens_charge')),
                't_lens_cost'=>noHtml($this->input->post('t_lens_cost')),
                't_transition_charge'=>noHtml($this->input->post('t_transition_charge')),
                't_transition_cost'=>noHtml($this->input->post('t_transition_cost')),
                't_delivery_charge'=>noHtml($this->input->post('t_delivery_charge')),
                't_additional_charge'=>noHtml($this->input->post('t_additional_charge'))
                );
			
			if(empty($this->input->post('t_id')))
			{
				
				$l_id = $this->HomeDb->insert($data,"t_price_settings");
				if(!empty($l_id))
				{
					$res = array("res"=>1,"msg"=>"Price Added Successfully");
				}
				else
                {
                    $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421130");
                }
			}
			else
			{
				$t_id = sec($this->input->post('t_id'),'d');
				if(is_numeric($t_id))
				{
					$tdata= $this->HomeDb->getDetailedData(array('*'),'t_price_settings',array("t_id"=>$t_id,"b_status"=>'1'));
					
					if(!empty($tdata))
					{
						if($this->HomeDb->update($data,"t_price_settings",array("t_id"=>$t_id)))
						{
							$res = array("res"=>1,"msg"=>"Price Edited Successfully");
						}
						else
							$res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
					}
					else
						$res = array("res"=>0,"msg"=>"Invalid Price choosed.");
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
    


}
