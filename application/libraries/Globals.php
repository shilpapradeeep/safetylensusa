<?php

class Globals {

  //  Pass array as an argument to constructor function

  public function __construct() 
  {
    $data=array();

  // Make instance of CodeIgniter to use its resources
    $CI = & get_instance();
   //$CI->load->library('Globals');
    $data['wishlist'] = getWishlist();
    $data['menuCartData'] = getMenuCartData();
    $CI->load->vars($data);
  }
 
  function getWishlist()
  {
      $CI = & get_instance();
      $myWishlist = $CI->input->cookie('myWishlist',TRUE);
      if(!empty($myWishlist))
      {
        $data['wlist'] = explode(',',$myWishlist);
      }
      else
      {
        $data['wlist'] = null;
      }
      $CI->load->vars($data);
  }

}

?>