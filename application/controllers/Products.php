<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	
  function __construct()
   {
      parent::__construct();
      $this->load->library('Globals');
      
   }
	function products_list()
	{
	
       $config = $this->paginations();
       $this->pagination->initialize($config);
       $page = $this->input->get('page');
       $info['page'] = $page;
       $info['sort'] = $this->input->get('sort');
       $info['per_page'] = $this->input->get('per_page');
       $info['category'] = $this->input->get('category')?sec($this->input->get('category'),'d'):null;
       if($page != 0){
        $page = ($page-1) * $config["per_page"];
      }
      $getData = $this->input->get();
     
     

      $data['products'] = $this->HomeDb->getProducts($config['per_page'],$page,$getData);
     
      if(!empty($data['products'] ))
      {
        $data["links"] = $this->pagination->create_links();
        $data['sort'] = array("default"=>"Default sorting","price_asc"=>"Price -- Low to High","price_desc"=>"Price -- Hight to Low","recency_desc"=>"Newest First");
        
         $data['getParams'] = !empty($getData)?$this->prepareParams($getData):'';
        
        $this->load->view('front_end/products',$data);
     }
     else
       redirect(base_url('products'));
		
	}


  function paginations()
  {
      $count = count($this->HomeDb->getData("pr_product",array("pr_status"=>'1')));
     
      $this->load->library('pagination');

      $config['base_url'] = base_url().'products';
      // $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

      $getData = $this->input->get();
      $qstring = [];
      if(!empty($getData['per_page']))
        $qstring[]= 'per_page='.$getData['per_page'];
      if(!empty($getData['sort']))
        $qstring[]= 'sort='.$getData['sort'];
      if(!empty($getData['for']))
        $qstring[]= 'for='.$getData['for'];
      if(!empty($getData['category']))
        $qstring[]= 'for='.$getData['category'];
      
      if(!empty($qstring))
      $config['get'] = implode('&', $qstring);
      $config['page_query_string'] = TRUE;
      $config['total_rows'] = $count;
      $config['per_page'] = !empty($getData['per_page'])?$getData['per_page']:9;
      $config['use_page_numbers'] = TRUE;
      $config['enable_query_strings'] = TRUE;
      $config['page_query_string'] = TRUE;
      $config['use_page_numbers'] = TRUE;
      $config['reuse_query_string'] = TRUE;
      $config['query_string_segment'] = 'page';

      $config['num_links'] = 4;
      $config['full_tag_open'] = '<div class="container"><ul class="pagination pagination-lg">';
      $config['full_tag_close'] = '  </ul></div>';

      $config['first_link'] = 'First';
      $config['last_link'] = 'Last';

      $config['next_link'] = '>>';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</li>';

      $config['prev_link'] = '<<';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</li>';

      $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
      $config['cur_tag_close'] = '</a></li>';

      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</li>';

      $config['attributes'] = array('class' => 'page-link');

      return $config;
  }
  function prepareParams($getData)
  {
       if(!empty($getData['page']))
        {
          unset($getData['page']);
        }
        if(isset($getData['sort']))
        {
          unset($getData['sort']);
        }
        if(isset($getData['per_page']))
        {
          unset($getData['per_page']);
        }
        if(isset($getData['category']))
        {
          unset($getData['category']);
        }

      $res = array();
      foreach($getData as $i=>$s)
      {
         $res[] = $i.'='.$s;
      }
      return implode('&', $res);
  }
	function wishlist($page_no=0)
  {
        $this->load->library('pagination');
        $wlist = getWishlist();
        $config['base_url'] = base_url() . 'wishlist/';
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = count($wlist);
        $config['cur_tag_open'] = '<li class="active"><a class="active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close’'] = '</li>';
         $config['next_tag_open'] = '<li>';
        $config['next_tag_close’'] = '</li>';

        $config['per_page'] = 6;
        $choice = $config["total_rows"] / $config["per_page"];
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $offset = $page == 0 ? 0 : ($page - 1) * $config["per_page"];
        $data['choice'] = $config["num_links"] + 1;
        if ($page - 1 > $choice) {
            redirect('error', 'refresh');
        } else {
            $pageno = $page == null ? 1 : $page;
           
            $str_links = $this->pagination->create_links($choice);
            $data["links"] = explode('&nbsp;', $str_links);
            $data['wlists'] = $this->essential->get_products_for_wishlist($wlist,$config['per_page'],$offset);
        
           
           
        $data['wish_list']  =$wlist;
             $this->load->view('wishlist',$data);       
        }
  
      
}
	function products_details($slug)
  {
    $sarray = explode('-',$slug);
    $id = $sarray[0];
    $data=null;
    $data['images'] = array(base_url('assets/front_end/images/products/p1.png'),base_url('assets/front_end/images/products/p2.png'),base_url('assets/front_end/images/products/p3.png'),base_url('assets/front_end/images/products/p4.png'));
    $pData = $this->HomeDb->getSingleProducts($id);
    $data['total_rev'] = 0;
    $data['reviews'] = $this->HomeDb->getData('p_product_review',array('p_status'=>'1','p_product'=>$id),null,null,array('p_id','desc'));
    if(!empty($pData))
    {
      $data['pData'] = $pData[0];
      if(!empty($data['reviews']))
      {
        foreach ($data['reviews'] as $key => $value) {
         $value->p_rating =$this->ratingPer($value->p_rating);
        }

        $data['total_rev'] = count($data['reviews']);
      }
      $data['pvariants'] = $this->HomeDb->getData('pv_variation',array("pv_product_id"=>$pData[0]->pr_id));
      if(!empty($data['pvariants'] ))
      {
        $data['sizes'] = array("62-2.png","39-2.png","65-2.png","16.png","125.png");
      }
      $data['price_settings'] = $this->HomeDb->getData('t_price_settings');
      $this->load->view('front_end/product-single',$data);  
    }
    
   
  }
  function select_lens()
  {
    
    $data['pr_id'] = $this->input->get('product');
    $data['pv_id'] = $this->input->get('size');
    $data['qty'] = $this->input->get('qty');
    $data['lens'] = $this->HomeDb->getData('lens_type',array("lt_status"=>'1'));
    $this->load->view('front_end/choose-lens',$data);  
   
  }
  function prescription()
  {
     //$order= $this->HomeDb->getDetailedData(array("max(o_id) as o_max"),'o_order');
    // if($this->session->userdata('l_uid'))
    // {
    //   $order= $this->HomeDb->getDetailedData(array("o_id "),'o_order',array("o_user"=>sec($this->session->userdata['l_uid']['l_id'],'d'),"o_order_status_id"=>'1'));
    //   if(!empty($order))
    //    $data['order_id'] = !empty($order)? sec($order[0]->o_id):null;
    // }
    // else
    //   $data['order_id'] = sec($order[0]->o_max+1);

   $arr= array("1","2","3","4");

    $product = $this->input->get('product');
    $data['pData'] = $this->HomeDb->getData('pr_product',array("pr_id"=>sec($product,'d')));
    
    $lens = $this->input->get('lens');
    $data['lens'] = $this->HomeDb->getData('lens_type',array("lt_status"=>'1',"lt_id"=>sec($lens,'d')));
     $data['lens_options'] = $this->HomeDb->getData('lens_options',array("lo_status"=>'1'));
    $data['price_settings'] = $this->HomeDb->getData('t_price_settings');
     $data['tint_type'] = $this->HomeDb->getData('tint_type',array("tt_status"=>'1'));
    $data['transitions'] = $this->HomeDb->getData('transitions',array("tr_status"=>'1'));
    $data['polarized_lens'] = $this->HomeDb->getData('polarized_lens',array("pl_status"=>'1'));
    $lens_materials= $this->HomeDb->getData('lens_materials',array("lm_status"=>'1'),1);
    $data['lens_materials'] = !empty($lens_materials)?sec($lens_materials[0]->lm_id):null;
    $data['p_size'] = $this->input->get('size');
    $data['p_qty'] = sec($this->input->get('qty'));
    $data['p_pr_id'] = $product;
    $data['p_lens_type'] = $lens;
    if(!empty( $data['lens']))
    {
      $data['lt_fields'] = json_decode($data['lens'][0]->it_fields);
    }
    $this->load->view('front_end/prescription',$data);  
   
  }
  function reviewAction()
{ 
  isajax();
  $this->form_validation->set_rules('rating', 'Rating', 'required|trim');
  $this->form_validation->set_rules('review_detail','Review', 'required|trim');
  $this->form_validation->set_rules('review_name', 'Name', 'required|trim');

  if ($this->form_validation->run() == false)
  {
    $errors = $this->form_validation->error_array();
    $res    = array("res" => 0,"errors" => $errors);
  }
  else
  {
   $params = array('p_user'=>$this->input->post('review_name'),
    'p_product'=>sec($this->input->post('product_id'),'d'),
    'p_review'=>$this->input->post('review_detail'),
    'p_rating'=>$this->input->post('rating')
  );

   if($this->HomeDb->insert($params,'p_product_review'))
   { 
     $reviews = $this->HomeDb->getData('p_product_review',array('p_status'=>'1'),null,null,array('p_id','desc'));

     if(empty($reviews))
       $all_reviews = '';
     else
      $all_reviews = $this->reviewD($reviews);

    $res = array('res'=>1,'msg'=>'Success','reviews'=>$all_reviews);
  }
  else
    $res = array('res'=>0,'msg'=>'Something went wrong!');
}

echo json_encode($res);
}
	
}
