<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lens_controller extends CI_Controller {
     

     //lens materials
    

    function lens_materials_delete()
    {
	    isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('lm_id','lm_title','lm_desc','lm_image'),'lens_materials',array('lm_id'=>$id,'lm_status'=>'1'));

			if(!empty($data))
			{   
				$this->HomeDb->update(array('lm_status'=>'2'),'lens_materials',array('lm_id'=>$id,'lm_status'=>'1'));
				$this->db->delete('lens_material_price',array('lmp_material_id'=>$id));
				$res =  array('res'=>1,'msg'=>'Removed Successfully');
			}
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
    }

	function lensMaterialsPricingForms($id=null)
	{   
		$flag = 0;
		$price = 0;
		$cost = 0;
		$ids = array();

		if(!empty($id))
		{
			$pricedata = $this->HomeDb->getDetailedData(array('lmp_type_id','lmp_price','lmp_cost'),'lens_material_price',array('lmp_material_id'=>$id));
			if(!empty($pricedata))
			{
				foreach ($pricedata as $pd) {
					$lmp_array[$pd->lmp_type_id] = array('price'=>$pd->lmp_price,'cost'=>$pd->lmp_cost);
					$ids[] =  $pd->lmp_type_id;
					$flag = 1;
				}
			}

		} 


		$data = $this->HomeDb->getDetailedData(array('lt_id','lt_title'),'lens_type',array('lt_status'=>'1'),null,null,array('lt_title','asc'));
        
        if(!empty($data))
        {   

        	$content = '';
        	$i=0;
        	foreach ($data as $key => $value) {
       
        		if($flag=1)
        		{
        			if(in_array($value->lt_id, $ids))
        			{
        				$price = $lmp_array[$value->lt_id]['price'];
        				$cost = $lmp_array[$value->lt_id]['cost'];
        			}
        			else
        			{
						$price = 0;
						$cost = 0;
        			}
        		}


			$content .= '<h5>Pricing</h5><div class="form-group">
			<div class="row">
			<div class="col-md-8">
			<label for="ln_type_'.$i.'">Lens Type <span class="star">*</span></label>
			<input type="hidden" id="ln_type_id_'.$i.'" name="ln_type_id_'.$i.'" value="'.$value->lt_id.'">
			<input value="'.$value->lt_title.'" type="text" class="form-control" id="ln_type_'.$i.'" name="ln_type_'.$i.'" placeholder="Enter the Name/Title" autofocus="autofocus" onfocus="this.select()">
			<span class="validation-error" id="lm_title_error"></span>
			</div>
			<div class="col-md-2">
             <label for="price_'.$i.'">Price<span class="star">*</span></label>
			<input value="'.$price.'" type="text" class="form-control" id="price_'.$i.'" name="price_'.$i.'" placeholder="" autofocus="autofocus" onfocus="this.select()">
			</div>
			<div class="col-md-2">
			             <label for="cost_'.$i.'">Cost<span class="star">*</span></label>
			<input value="'.$cost.'" type="text" class="form-control" id="cost_'.$i.'" name="cost_'.$i.'" placeholder="" autofocus="autofocus" onfocus="this.select()"></div>
			</div>
			</div>';
  $i++;
        	}
        }
        else
        	$content = '';

        return $content;
	}

	function lens_materials_pricing()
	{   
        $content = $this->lensMaterialsPricingForms();
		echo json_encode($content);
	}

	function lens_materials()
	{
		$data['css']= css_link();
		$data['js'] = js_link();

		$data['js']=array_merge($data['js'],js_datatable());
		$data['css']=array_merge($data['css'],css_datatable());

		$js = array(
			'js/common.js',
			'js/lens.js'
		);

		$data['js']=array_merge($data['js'],$js);

		$data['bread_crum']=array(0=>'Dashboard',
			1=>'javascript:void(0)',
			2=>'Lens Materials',
			3=>'javascript:void(0)',
		);


		$this->load->view('back_end/lens_materials',$data);
	}

	function lens_materials_action()
	{
	    isajax();
		$this->form_validation->set_rules('lm_title','Name/Title','trim|required');
		$this->form_validation->set_rules('lm_desc','Description','trim|required');
		$this->form_validation->set_rules('lm_image_name','Image','trim|required');

		if($this->form_validation->run() == false)     
		{ 
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		}
		else
		{   
			$id = sec($this->input->post('lm_id'),'d');
            
            $datad = $this->HomeDb->getDetailedData(array('lt_id','lt_title'),'lens_type',array('lt_status'=>'1'),null,null,array('lt_title','asc'));


			$param = array(
				'lm_title'=>$this->input->post('lm_title'),
				'lm_desc'=>$this->input->post('lm_desc'),
				'lm_image'=>$this->input->post('lm_image_name')
			);
			
             if(!empty($id))
             {
                  if(is_numeric($id))
                  {
                     $len_data = $this->HomeDb->getDetailedData(array('lm_id','lm_title','lm_desc','lm_image'),'lens_materials',array('lm_id'=>$id,'lm_status'=>'1'));
                     if(!empty($len_data))
                     {
                     	
                     	if(!empty($datad))
                  		{   
                  			$this->db->delete('lens_material_price',array('lmp_material_id'=>$id));
                  			$count = count($datad);
                  			for ($i=0; $i < $count; $i++) { 

                  				$param2[] = array('lmp_type_id'=>$this->input->post('ln_type_id_'.$i),
                  					'lmp_material_id' => $id,
                  					'lmp_price'=>$this->input->post('price_'.$i),
                  					'lmp_cost'=>$this->input->post('cost_'.$i)
                  				);

                  			}

                  			$this->HomeDb->batch_insert($param2,'lens_material_price');
                  		}

                     	$this->HomeDb->update($param,'lens_materials',array('lm_id'=>$id,'lm_status'=>'1'));
                     	$res = array("res"=>1,"msg"=>'Successfully Edited');
                     }
                     else
                     	$res = array("res"=>0,"msg"=>'Something went wrong! 001');
                  }
                  else
                    $res = array("res"=>0,"msg"=>'Something went wrong! 002');

             }
             else
             {
                  	if($id = $this->HomeDb->insert($param,'lens_materials'))
                  	{    
                  		if(!empty($datad))
                  		{   
                  			$count = count($datad);
                  			for ($i=0; $i < $count; $i++) { 

                  				$param2[] = array('lmp_type_id'=>$this->input->post('ln_type_id_'.$i),
                  					'lmp_material_id' => $id,
                  					'lmp_price'=>$this->input->post('price_'.$i),
                  					'lmp_cost'=>$this->input->post('cost_'.$i)
                  				);

                  			}

                  			$this->HomeDb->batch_insert($param2,'lens_material_price');
                  		}

                  		$res = array("res"=>1,"msg"=>'Successfully Added');
                  	}
                  	else
                  		$res = array("res"=>0,"msg"=>'Something went wrong! 003');
             }
		}

		echo json_encode($res);
	}

	function lens_materials_file()
	{
				$data = array();
		$filepath ='';
        $this->load->library('image_lib');
			if(!empty($_FILES['filedata']['name']))
			{ 
			$path = 'assets/uploads/lens/lensmaterials/';
			$uploadPath = './'.$path;
	        if (!is_dir($uploadPath))
	        {
	            mkdir($uploadPath, 0755, TRUE);
	        }
	
			$config['upload_path'] = $path;
		    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
		    $config['max_size'] = '5024000'; // max_size in kb 
			$config['file_name'] = $_FILES['filedata']['name'];
			$file_name=$_FILES['filedata']['name']; 
			$newfile_name= preg_replace('/[^A-Za-z0-9.]/', "", $file_name); 
			$config['file_name'] = $newfile_name;
		    // Load upload library 
		    $this->load->library('upload',$config); 
		    // File upload
			    if($this->upload->do_upload('filedata'))
			    { 
			    	 $fileData = $this->upload->data();
			   		 $data['path'] = $path.$fileData['file_name'];	
			   		 $data['filename'] = $newfile_name;	
			   		 $data['res']=1;
			   		
			    }
			    else
			    { 
			       $data['response'] = 'failed';
			       $data['res']=0; 
			    } 
		   }
		   else
		   { 
		    $data['response'] = 'failed'; 
		    $data['res']=0; 
		   } 
		   echo json_encode($data);
	}

	function list_lens_materials()
	{
		isajax();
		$data['tdata'] = $this->lensmaterials();
		$this->load->view('back_end/table/lens-materials-list',$data);
	}

	function lensmaterials($start=null,$limit=null)
	{
		$data = $this->HomeDb->getDetailedData(array('lm_id','lm_title','lm_desc','lm_image'),'lens_materials',array('lm_status'=>'1'),null,null,array('lm_title','asc'));
		return $data;
	}

	function lens_materials_view_edit()
	{
	    isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('lm_id','lm_title','lm_desc','lm_image'),'lens_materials',array('lm_id'=>$id,'lm_status'=>'1'));
			// $this->lensMaterialsPricingForms($id)
			if(!empty($data))
				$res =  array('res'=>1,'data'=>$data,'content'=>$this->lensMaterialsPricingForms($id));
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
	}

     	//Lens type

	function lenstypewpage()
	{
		$data['css']= css_link();
		$data['js'] = js_link();

		$data['js']=array_merge($data['js'],js_datatable());
		$data['css']=array_merge($data['css'],css_datatable());

		$js = array(
			'js/common.js',
			'js/lens.js'
		);
		
		$data['js']=array_merge($data['js'],$js);

		$data['bread_crum']=array(0=>'Dashboard',
			1=>'javascript:void(0)',
			2=>'Lens Type',
			3=>'javascript:void(0)',
		);
     

       $this->load->view('back_end/lens_type',$data);
	}

	function lens_type_file()
	{   
		
		$data = array();
		$filepath ='';
        $this->load->library('image_lib');
			if(!empty($_FILES['filedata']['name']))
			{ 
			$path = 'assets/uploads/lens/lenstype/';
			$uploadPath = './'.$path;
	        if (!is_dir($uploadPath))
	        {
	            mkdir($uploadPath, 0755, TRUE);
	        }
	
			$config['upload_path'] = $path;
		    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
		    $config['max_size'] = '5024000'; // max_size in kb 
			$config['file_name'] = $_FILES['filedata']['name'];
			$file_name=$_FILES['filedata']['name']; 
			$newfile_name= preg_replace('/[^A-Za-z0-9.]/', "", $file_name); 
			$config['file_name'] = $newfile_name;
		    // Load upload library 
		    $this->load->library('upload',$config); 
		    // File upload
			    if($this->upload->do_upload('filedata'))
			    { 
			    	 $fileData = $this->upload->data();
			   		 $data['path'] = $path.$fileData['file_name'];	
			   		 $data['filename'] = $newfile_name;	
			   		 $data['res']=1;
			   		
			    }
			    else
			    { 
			       $data['response'] = 'failed';
			       $data['res']=0; 
			    } 
		   }
		   else
		   { 
		    $data['response'] = 'failed'; 
		    $data['res']=0; 
		   } 
		   echo json_encode($data);

	}

	function lens_type_action()
	{
	    isajax();
		$this->form_validation->set_rules('lt_title','Name/Title','trim|required');
		$this->form_validation->set_rules('lt_desc','Description','trim|required');
		$this->form_validation->set_rules('lt_image_name','Image','trim|required');

		if($this->form_validation->run() == false)     
		{ 
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		}
		else
		{   
			$id = sec($this->input->post('lt_id'),'d');

			$param = array(
				'lt_title'=>$this->input->post('lt_title'),
				'lt_desc'=>$this->input->post('lt_desc'),
				'lt_image'=>$this->input->post('lt_image_name')
			);
			
             if(!empty($id))
             {
                  if(is_numeric($id))
                  {
                     $len_data = $this->HomeDb->getDetailedData(array('lt_id','lt_title','lt_desc','lt_image'),'lens_type',array('lt_id'=>$id,'lt_status'=>'1'));
                     if(!empty($len_data))
                     {
                     	$this->HomeDb->update($param,'lens_type',array('lt_id'=>$id,'lt_status'=>'1'));
                     	$res = array("res"=>1,"msg"=>'Successfully Edited');
                     }
                     else
                     	$res = array("res"=>0,"msg"=>'Something went wrong! 001');
                  }
                  else
                    $res = array("res"=>0,"msg"=>'Something went wrong! 002');

             }
             else
             {
                  	if($this->HomeDb->insert($param,'lens_type'))
                  		$res = array("res"=>1,"msg"=>'Successfully Added');
                  	else
                  		$res = array("res"=>0,"msg"=>'Something went wrong! 003');
             }
		}

		echo json_encode($res);
	}

	function lens_type_view_edit()
	{
	    isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('lt_id','lt_title','lt_desc','lt_image'),'lens_type',array('lt_id'=>$id,'lt_status'=>'1'));

			if(!empty($data))
				$res =  array('res'=>1,'data'=>$data);
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
	}

	function list_lens_type()
	{
		isajax();
		$data['tdata'] = $this->lenstype();
		$this->load->view('back_end/table/lens-type-list',$data);
	}

		function lenstype($start=null,$limit=null)
	{
		$data = $this->HomeDb->getDetailedData(array('lt_id','lt_title','lt_desc','lt_image'),'lens_type',array('lt_status'=>'1'),null,null,array('lt_title','asc'));
		return $data;
	}
	function lens_type_delete()
	{
	    isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('lt_id','lt_title','lt_desc','lt_image'),'lens_type',array('lt_id'=>$id,'lt_status'=>'1'));

			if(!empty($data))
			{   
				$this->HomeDb->update(array('lt_status'=>'2'),'lens_type',array('lt_id'=>$id,'lt_status'=>'1'));
				$this->db->delete('lens_material_price',array('lmp_type_id'=>$id));
				$res =  array('res'=>1,'msg'=>'Removed Successfully');
			}
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
	}

    // Lens options

	public function lensoptionspage()
	{   
		$data['css']= css_link();
		$data['js'] = js_link();
        
		$data['js']=array_merge($data['js'],js_datatable());
		$data['css']=array_merge($data['css'],css_datatable());

		$js = array(
		'js/common.js',
		'js/lens.js'
		);
		
		$data['js']=array_merge($data['js'],$js);


		$data['bread_crum']=array(0=>'Dashboard',
			1=>'javascript:void(0)',
			2=>'Lens Options',
			3=>'javascript:void(0)',
		);
     

       $this->load->view('back_end/lens_options',$data);
	}

	function lensOptionsAction()
	{   
		isajax();
		$this->form_validation->set_rules('l_title','Name/Title','trim|required');
		$this->form_validation->set_rules('l_price','Price','trim|numeric|required');
		$this->form_validation->set_rules('l_cost','Cost','trim|numeric|required');

		if($this->form_validation->run() == false)     
		{ 
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		}
		else
		{   
			$id = sec($this->input->post('lo_id'),'d');

			$param = array(
				'lo_name'=>$this->input->post('l_title'),
				'lo_price'=>$this->input->post('l_price'),
				'lo_cost'=>$this->input->post('l_cost')
			);
			
             if(!empty($id))
             {
                  if(is_numeric($id))
                  {
                     $len_data = $this->HomeDb->getDetailedData(array('lo_id','lo_name','lo_price','lo_cost'),'lens_options',array('lo_id'=>$id,'lo_status'=>'1'));
                     if(!empty($len_data))
                     {
                     	$this->HomeDb->update($param,'lens_options',array('lo_id'=>$id,'lo_status'=>'1'));
                     	$res = array("res"=>1,"msg"=>'Successfully Edited');
                     }
                     else
                     	$res = array("res"=>0,"msg"=>'Something went wrong! 001');
                  }
                  else
                    $res = array("res"=>0,"msg"=>'Something went wrong! 002');

             }
             else
             {
                  	if($this->HomeDb->insert($param,'lens_options'))
                  		$res = array("res"=>1,"msg"=>'Successfully Added');
                  	else
                  		$res = array("res"=>0,"msg"=>'Something went wrong! 003');
             }
		}

		echo json_encode($res);
	}

	public function list_lens_options()
	{
		isajax();
		$data['tdata'] = $this->lensoptions();
		$this->load->view('back_end/table/lens-opt-list',$data);

	}

	function lensoptions($start=null,$limit=null)
	{
		$data = $this->HomeDb->getDetailedData(array('lo_id','lo_name','lo_price','lo_cost'),'lens_options',array('lo_status'=>'1'),null,null,array('lo_name','asc'));
		return $data;
	}

	function vieweditlensoptions()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
             $data = $this->HomeDb->getDetailedData(array('lo_id','lo_name','lo_price','lo_cost'),'lens_options',array('lo_id'=>$id,'lo_status'=>'1'));

             if(!empty($data))
             	$res =  array('res'=>1,'data'=>$data);
             else
             	$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
	}

	function lensoptiondelete()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('lo_id','lo_name','lo_price','lo_cost'),'lens_options',array('lo_id'=>$id,'lo_status'=>'1'));

			if(!empty($data))
			{   
				$this->HomeDb->update(array('lo_status'=>'2'),'lens_options',array('lo_id'=>$id,'lo_status'=>'1'));
				$res =  array('res'=>1,'msg'=>'Removed Successfully');
			}
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
	}
   

    // Tint type

	function tinttypepage()
	{   
				$data['css']= css_link();
		$data['js'] = js_link();
        
		$data['js']=array_merge($data['js'],js_datatable());
		$data['css']=array_merge($data['css'],css_datatable());

		$js = array(
		'js/common.js',
		'js/lens.js'
		);
		
		$data['js']=array_merge($data['js'],$js);


		$data['bread_crum']=array(0=>'Dashboard',
			1=>'javascript:void(0)',
			2=>'Tint Type',
			3=>'javascript:void(0)',
		);


		$this->load->view('back_end/tint_type',$data);
	}

	function list_tint_type()
	{
		isajax();
		$data['tdata'] = $this->tinttype();
		$this->load->view('back_end/table/tint-type-list',$data);

	}	

	function tinttype($start=null,$limit=null)
	{
		$data = $this->HomeDb->getDetailedData(array('tt_id','tt_name'),'tint_type',array('tt_status'=>'1'),null,null,array('tt_name','asc'));
		return $data;
	}

	function tintTypeAction()
	{
	    isajax();
		$this->form_validation->set_rules('tt_name','Name/Title','trim|required');

		if($this->form_validation->run() == false)     
		{ 
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		}
		else
		{   
			$id = sec($this->input->post('tt_id'),'d');

			$param = array(
				'tt_name'=>$this->input->post('tt_name'),
			);
			
             if(!empty($id))
             {
                  if(is_numeric($id))
                  {
                     $len_data = $this->HomeDb->getDetailedData(array('tt_id','tt_name'),'tint_type',array('tt_id'=>$id,'tt_status'=>'1'));
                     if(!empty($len_data))
                     {
                     	$this->HomeDb->update($param,'tint_type',array('tt_id'=>$id,'tt_status'=>'1'));
                     	$res = array("res"=>1,"msg"=>'Successfully Edited');
                     }
                     else
                     	$res = array("res"=>0,"msg"=>'Something went wrong! 001');
                  }
                  else
                    $res = array("res"=>0,"msg"=>'Something went wrong! 002');

             }
             else
             {
                  	if($this->HomeDb->insert($param,'tint_type'))
                  		$res = array("res"=>1,"msg"=>'Successfully Added');
                  	else
                  		$res = array("res"=>0,"msg"=>'Something went wrong! 003');
             }
		}

		echo json_encode($res);
	}


	function viewedittinttype()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
             $data = $this->HomeDb->getDetailedData(array('tt_id','tt_name'),'tint_type',array('tt_id'=>$id,'tt_status'=>'1'));

             if(!empty($data))
             	$res =  array('res'=>1,'data'=>$data);
             else
             	$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
	}


	function tinttypedelete()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('tt_id','tt_name'),'tint_type',array('tt_id'=>$id,'tt_status'=>'1'));

			if(!empty($data))
			{   
				$this->HomeDb->update(array('tt_status'=>'2'),'tint_type',array('tt_id'=>$id,'tt_status'=>'1'));
				$res =  array('res'=>1,'msg'=>'Removed Successfully');
			}
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
	}

	//Polarized Lens
	public function polarizedlenspage()
	{   
		$data['css']= css_link();
		$data['js'] = js_link();

		$data['js']=array_merge($data['js'],js_datatable());
		$data['css']=array_merge($data['css'],css_datatable());

		$js = array(
			'js/common.js',
			'js/lens.js'
		);
		
		$data['js']=array_merge($data['js'],$js);


		$data['bread_crum']=array(0=>'Dashboard',
			1=>'javascript:void(0)',
			2=>'Polarized Lens',
			3=>'javascript:void(0)',
		);


		$this->load->view('back_end/polarized_lens',$data);
	}

	function list_polarized_lens()
	{
		isajax();
		$data['tdata'] = $this->polarizedlens();
		$this->load->view('back_end/table/polarized-lens-list',$data);
	}	

	function polarizedlens($start=null,$limit=null)
	{
		$data = $this->HomeDb->getDetailedData(array('pl_id','pl_name'),'polarized_lens',array('pl_status'=>'1'),null,null,array('pl_name','asc'));
		return $data;
	}

	function polarizedLensAction()
	{
	    isajax();
		$this->form_validation->set_rules('pl_name','Name/Title','trim|required');

		if($this->form_validation->run() == false)     
		{ 
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		}
		else
		{   
			$id = sec($this->input->post('pl_id'),'d');

			$param = array(
				'pl_name'=>$this->input->post('pl_name'),
			);
			
             if(!empty($id))
             {
                  if(is_numeric($id))
                  {
                     $len_data = $this->HomeDb->getDetailedData(array('pl_id','pl_name'),'polarized_lens',array('pl_id'=>$id,'pl_status'=>'1'));
                     if(!empty($len_data))
                     {
                     	$this->HomeDb->update($param,'polarized_lens',array('pl_id'=>$id,'pl_status'=>'1'));
                     	$res = array("res"=>1,"msg"=>'Successfully Edited');
                     }
                     else
                     	$res = array("res"=>0,"msg"=>'Something went wrong! 001');
                  }
                  else
                    $res = array("res"=>0,"msg"=>'Something went wrong! 002');

             }
             else
             {
                  	if($this->HomeDb->insert($param,'polarized_lens'))
                  		$res = array("res"=>1,"msg"=>'Successfully Added');
                  	else
                  		$res = array("res"=>0,"msg"=>'Something went wrong! 003');
             }
		}

		echo json_encode($res);	
	}

	function vieweditpolarizedlens()
	{
		isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('pl_id','pl_name'),'polarized_lens',array('pl_id'=>$id,'pl_status'=>'1'));

			if(!empty($data))
				$res =  array('res'=>1,'data'=>$data);
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
	}

	function polarizedlensdelete()
	{
	    isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('pl_id','pl_name'),'polarized_lens',array('pl_id'=>$id,'pl_status'=>'1'));

			if(!empty($data))
			{   
				$this->HomeDb->update(array('pl_status'=>'2'),'polarized_lens',array('pl_id'=>$id,'pl_status'=>'1'));
				$res =  array('res'=>1,'msg'=>'Removed Successfully');
			}
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);	
	}

    // Transitions
	function transitionspage()
	{
		$data['css']= css_link();
		$data['js'] = js_link();

		$data['js']=array_merge($data['js'],js_datatable());
		$data['css']=array_merge($data['css'],css_datatable());

		$js = array(
			'js/common.js',
			'js/lens.js'
		);

		$data['js']=array_merge($data['js'],$js);


		$data['bread_crum']=array(0=>'Dashboard',
			1=>'javascript:void(0)',
			2=>'Transitions',
			3=>'javascript:void(0)',
		);


		$this->load->view('back_end/transitions',$data);	
	}

	function list_transitions()
	{
		isajax();
		$data['tdata'] = $this->transitions();
		$this->load->view('back_end/table/transitions-list',$data);
	}	

	function transitions()
	{
		$data = $this->HomeDb->getDetailedData(array('tr_id','tr_name'),'transitions',array('tr_status'=>'1'),null,null,array('tr_name','asc'));
		return $data;
	}

	function transitionsAction()
	{
	    isajax();
		$this->form_validation->set_rules('tr_name','Name/Title','trim|required');

		if($this->form_validation->run() == false)     
		{ 
			$errors = $this->form_validation->error_array();
			$res = array("res"=>0,"errors"=>$errors);
		}
		else
		{   
			$id = sec($this->input->post('tr_id'),'d');

			$param = array(
				'tr_name'=>$this->input->post('tr_name'),
			);
			
             if(!empty($id))
             {
                  if(is_numeric($id))
                  {
                     $len_data = $this->HomeDb->getDetailedData(array('tr_id','tr_name'),'transitions',array('tr_id'=>$id,'tr_status'=>'1'));
                     if(!empty($len_data))
                     {
                     	$this->HomeDb->update($param,'transitions',array('tr_id'=>$id,'tr_status'=>'1'));
                     	$res = array("res"=>1,"msg"=>'Successfully Edited');
                     }
                     else
                     	$res = array("res"=>0,"msg"=>'Something went wrong! 001');
                  }
                  else
                    $res = array("res"=>0,"msg"=>'Something went wrong! 002');

             }
             else
             {
                  	if($this->HomeDb->insert($param,'transitions'))
                  		$res = array("res"=>1,"msg"=>'Successfully Added');
                  	else
                  		$res = array("res"=>0,"msg"=>'Something went wrong! 003');
             }
		}

		echo json_encode($res);	
	}

	function viewedittransitions()
	{
	    isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('tr_id','tr_name'),'transitions',array('tr_id'=>$id,'tr_status'=>'1'));

			if(!empty($data))
				$res =  array('res'=>1,'data'=>$data);
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);
	}

	function transitionsdelete()
	{
	    isajax();
		$id = sec($this->input->post('id'),'d');
		if(!empty($id) && is_numeric($id))
		{
			$data = $this->HomeDb->getDetailedData(array('tr_id','tr_name'),'transitions',array('tr_id'=>$id,'tr_status'=>'1'));

			if(!empty($data))
			{   
				$this->HomeDb->update(array('tr_status'=>'2'),'transitions',array('tr_id'=>$id,'tr_status'=>'1'));
				$res =  array('res'=>1,'msg'=>'Removed Successfully');
			}
			else
				$res = array('res'=>0,'msg'=>'something went wrong! #002');
		} 
		else
			$res = array('res'=>0,'msg'=>'something went wrong! #001');

		echo json_encode($res);	
	}


    //Lens Values

	function lensValues()
	{
		isajax();
		$type = $this->input->post('type');
		if(!empty($type))
		{    
			$data[$type] = $this->HomeDb->getData($type);
			$this->load->view('back_end/modals/'.$type,$data);
		}
	}

	function lensValuesAddNew()
	{
		isajax();
		$type = $this->input->post('type');
		$numItems = $this->input->post('numItems');
		if(!empty($type) && $numItems)
		{            $numItems = $numItems+1;
            		$inputDiv = '<div class="form-group form-div" id="dv_'.$numItems.'">
                                <label for="po_val">Value <span class="star">*</span></label>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-10 col-sm-10">
                                            <input type="text" class="form-control" id="po_val" name="po_val[]" placeholder="Enter the Name/Title" autofocus="autofocus" onfocus="this.select()">
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <a class="btn btn-danger text-white remove-new-value" typ='.$type.' fet='.$numItems.' title="Edit"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <span class="validation-error" id="tr_name_error"></span>
                            </div>';

                            $res = array('res'=>1,'inputDiv'=>$inputDiv);
		}
		else
			$res = array('res'=>0,'msg'=>'Something went wrong!');

        echo json_encode($res);

	}

	function lensValuesDeleteInput()
	{   
		$res = array('res'=>1);
		echo json_encode($res);
	}

	function lensValuesAction()
	{
	    isajax();
		$this->form_validation->set_rules('po_val[]','Po Value','trim|required|numeric');
		$this->form_validation->set_message('required', 'All input feilds are required');
		$this->form_validation->set_message('numeric', 'All input feilds must contain only numbers');

		if($this->form_validation->run() == false)     
		{   foreach ($this->form_validation->error_array() as $value) {
			$error = $value;
		}
			$res = array('res'=>0,'msg'=>$error);
	    }
	    else
	    {   
	    	$type = $this->input->post('type');
	    	$values = $this->input->post('po_val');
	    	if(!empty($values))
	    	{    
                foreach ($values as $key => $value) {
                	$arr[]['po_val']=$value;
                }

				$this->db->from($type);
				$this->db->truncate();

				if($this->HomeDb->batch_insert($arr,$type))
					$res =  array('res'=>1,'msg'=>'successfully submited');
				else
					$res =  array('res'=>0,'msg'=>'something went wrong! #error 3456');
	    	}
	    }

	  echo json_encode($res);	
	}

}
