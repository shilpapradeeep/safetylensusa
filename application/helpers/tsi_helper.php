<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
{



  function tsi($abc)

  {

    echo "<pre>";

    print_r($abc);

    echo "</pre>";

  }



  function repo()

  {

    return b().'assets/';

  }



  function css()

  {

    return b().'assets/css/';

  }



  function js()

  {

    return b().'assets/js/';

  }



  function img($a)

  {

    return repo().'images/'.$a;

  }



  function dev_path()

  {

    return 'https://threeseasinfologics.com/';

  }



  function lq()

  {

    echo get_instance()->db->last_query();

  }



  function repo_fr()

  {

    return b().'assets/front_end/';

  }


  function repo_back_end()
  {
    return b().'assets/back_end/';
  }

  function img_back()
  {
    return repo_back_end().'images/';
  }




  function word($value,$count)

  {

    $ff = & get_instance();

    $ff->load->helper('text');

    $value=trim(strip_tags($value));

    return character_limiter($value, $count);

  }



  function thisuid($a=NULL)

  {

    $CI = &get_instance();

    if(!empty($CI->session->userdata('l_uid')))

    {

      $sess=$CI->session->userdata('l_uid');

      if(!empty($a))

        $s=sec($sess[$a],'d');

      else

        $s=sec($sess['l_id'],'d');

      if(!empty($s))

        return $s;

      return false;

    }

    else

      return false;

  }



  function img1($x,$y)

  {

    if(!empty($x) && !empty($y))

    {

      if(file_exists(FCPATH.'assets/'.$x.$y))

        return repo().$x.$y;

      else

        return repo().'uploads/no-image.jpg';

    }

    else

      return repo().'uploads/no-image.jpg';

  }



  function current_url1()

  {

    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  }



  function dateConvert($originalDate)

  {

    return date("d-m-Y", strtotime($originalDate));

  }



  function dateWord($originalDate)

  {

    $a=explode('-', $originalDate);

    switch ($a[1])

    {

      case '1': $b="Jan"; break;

      case '2': $b="Feb"; break;

      case '3': $b="Mar"; break;

      case '4': $b="Apr"; break;

      case '5': $b="May"; break;

      case '6': $b="Jun"; break;

      case '7': $b="Jul"; break;

      case '8': $b="Aug"; break;

      case '9': $b="Sep"; break;

      case '10': $b="Oct"; break;

      case '11': $b="Nov"; break;

      case '12': $b="Dec"; break;

      default: $b=''; break;

    }

    return $a[2].' - '.$b.' - '.$a[0];

  }



  function dateWord1($originalDate)

  {

    $a=explode('/', $originalDate);

    switch ($a[1])

    {

      case '1': $b="Jan"; break;

      case '2': $b="Feb"; break;

      case '3': $b="Mar"; break;

      case '4': $b="Apr"; break;

      case '5': $b="May"; break;

      case '6': $b="Jun"; break;

      case '7': $b="Jul"; break;

      case '8': $b="Aug"; break;

      case '9': $b="Sep"; break;

      case '10': $b="Oct"; break;

      case '11': $b="Nov"; break;

      case '12': $b="Dec"; break;

      default: $b=''; break;

    }

    return $a[0].' - '.$b.' - '.$a[2];

  }



  function nocache()

  {

    header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');

    header('Cache-Control: post-check=0, pre-check=0', FALSE);

    header('Pragma: no-cache');

    header('Expires: Wed, 05 Oct 1988 09:30:00 GMT');

    header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');

  }



  function noHtml($str, $encoding='UTF-8')

  {

    $str=strip_tags($str);

    return (htmlspecialchars($str, ENT_QUOTES, $encoding));

  }



  function seg($a=1)

  {

    $amnc = & get_instance();

    return $amnc->uri->segment($a);

  }



  function get_title()

  {

    $amnc = & get_instance();

    $a=$amnc->uri->segment(1);

    if(!empty($a))

    {

      $a=str_replace('-', ' ', $a);

      $a=strtoupper($a);

      $a=$a.' | ';

      

        $b=$amnc->uri->segment(2);

        $b=explode('-', $b);

        $b=array_reverse($b);

        foreach ($b as $k)

        {

          if(is_numeric(sec1($k,'d')))

          {

          }

          else

          {

            $k=str_replace('-', ' ', $k);

            $k=strtoupper($k);

            if(!empty($k))

            {

              $a=$k.' '.$a;

              $a = preg_replace('/[0-9]+/', '', $a).' | ';

            }

          }

        }

      

    }

    else

    {

      $a="";

    }

    if ( !empty($amnc->session->userdata['l_uid']['l_name']) )

    {

        $ins_name = sec($amnc->session->userdata['l_uid']['l_name'],'d');

    }

    else

    {

        $ins_name =content('project_name');

    }



    return $a." $ins_name";

  }



  function disable_bot()

  {

    $amnc = & get_instance();



    if(!$amnc->load->is_loaded('user_agent'))

      $amnc->load->library('user_agent');



    $agent = $amnc->agent->agent_string();



    if(strpos($agent,"WebCopier v.2.2") || strpos($agent,"WebCopier v2.5") || strpos($agent,"WebZIP/5.0 PR1 (http://www.spidersoft.com)") || strpos($agent,"HTTrack") )

    {

      header("Location: https://www.assets.com/no_download");

      exit();

    }

  }



  function slugAdmin($x,$y=null)

 {

  $x=sec1($x);

  $y=gen_slug($y);

  return $y.'-'.$x;

 }

 function slug($x,$y=null)

 {

   $x=($x);

   $y=gen_slug($y);
  if(!empty($y))
   return $x.'-'.$y;
   else
   return $x;

 }


  function slug_title($x=1)

  {

    $amnc = & get_instance();

    $words=ucwords(str_replace('-', ' ', $amnc->uri->segment($x)));

    return preg_replace('/[0-9]+/', '', $words);

  }



  function gen_slug($a)

  {

    $a=strtolower($a);

    $specialchar = array("9#39;","!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "-", "+", "=", "|", "/\/", "/", ".", '"', ",", "'", ":", ";", ",", "~", "`" ,"]", "[", "}", "{", "?");

    $title = str_replace($specialchar, "", $a);

    $title = str_replace(" ", "-", $title);

    return $title;

  }

  if ( ! function_exists('sec'))

  {

    function sec( $string, $action = 'e' )

    {

      $secret_key = PASS1;

      $secret_iv = PASS2;



      $output = false;

      $encrypt_method = "AES-256-CBC";

      $key = hash( 'sha256', $secret_key );

      $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );



      if( $action == 'e' )

      {

        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );

      }

      else if( $action == 'd' )

      {

        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );

      }

      return $output;

    }

  }

if ( ! function_exists('sec1'))

  {

    function sec1( $string, $action = 'e' )

    {

      $secret_key = PASS3;

      $secret_iv = PASS4;



      $output = false;

      $encrypt_method = "AES-256-CBC";

      $key = hash( 'sha256', $secret_key );

      $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );



      if( $action == 'e' )

      {

        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );

      }

      else if( $action == 'd' )

      {

        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );

      }

      return $output;

    }

  }

  

  function get_id($b)

 {

   $b=explode('-',$b);

   $b=end($b);

   $b=sec1($b,'d');

   return $b;

 }



  function random_num($size)

  {

    $alpha_key = '';

    $keys = range('A', 'Z');



    for ($i = 0; $i < 2; $i++)

    {

      $alpha_key .= $keys[array_rand($keys)];

    }



    $length = $size - 2;



    $key = '';

    $keys = range(0, 9);



    for ($i = 0; $i < $length; $i++)

    {

      $key .= $keys[array_rand($keys)];

    }



    return $alpha_key . $key;

  }



  function encrypt_pwd($unique_id, $pass) {

    $pKey = $unique_id;

    $p1 = md5($pass);

    $p2 = $pKey . $p1 . md5($pKey);

    $new_pwd = md5(sha1($p2));

    return $new_pwd;

  }



/*  function mobile_check()

  {

    $amnc = & get_instance();

    $amnc->load-> library('Mobile_Detect');

    $detect = new Mobile_Detect();

    if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS())

    {

      $amnc->session->set_userdata('device','mobile');

       header('Location: https://www.mahalsoft.com/');

      // exit;

    }

    else

    {

      $amnc->session->set_userdata('device','computer');

            //header("Location: ".$this->config->item('base_url')."/mobile"); 

    }

  }*/



  function b($a=null)

  {

    if(!empty($a))

    {

      return base_url($a);

    }

    return base_url();

  }



  function menu_active($x,$y=1,$z=1)

  {

    if(!empty($x))

    {

      $rr = & get_instance();

      $y=$rr->uri->segment($y);

      if($z==1)

      {

        if(in_array($y, $x))

          return "resp-tab-active";

      }

      else if($z==2)

      {

        if(in_array($y, $x))

          return "resp-tab-active";

      }

      else

      {

        if($x==$y)

          return "resp-tab-active active ";

      }

      return false;

    }

    return false;

  }











  function check_session()

  {

    $CI = &get_instance();

    return $CI->essential->login_credential_check();

  }



  function not($a,$b=NULL)

  {

    $a=trim($a);

    if(!empty($a))

      return $a;

    else

    {

      if(isset($b))

        return $b;

      else

        return '';

    }

  }



  function thumb($a,$w=NULL,$h=NULL,$q=NULL)

  {

      //if(file_exists(FCPATH.'assets/'.$x.$y))

    if(!empty($w))

      $w='&w='.$w;

    if(!empty($h))

      $h='&h='.$h;

    if(!empty($q))

      $q='&q='.$q;



    $file_check=str_replace(b(),'',$a);



    if(file_exists($file_check))

    {

    $x=preg_replace('#^https?://#', '', $a);

    return b().'preview/?src='.$x.$w.$h.$q;

    }

    else

    {

      $x=preg_replace('#^https?://#', '', repo().'uploads/no-image.jpg');

      return b().'preview/?src='.$x.$w.$h.$q;

    }

  }



  function isajax()

  {

    $kk = & get_instance();

    if (!$kk->input->is_ajax_request())

    {

        //exit('No direct script access allowed');

      //blacklist();

      $kk->session->set_flashdata('msg','Oops. Unauthorized Access. Error code 666294');

      redirect('error');

    }

  }



  function get_ip()

  {

    if(!empty($_SERVER['HTTP_CLIENT_IP']))

    {

        //ip from share internet

      $ip = $_SERVER['HTTP_CLIENT_IP'];

    }

    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))

    {

        //ip pass from proxy

      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }

    else

    {

      $ip = $_SERVER['REMOTE_ADDR'];

    }

    return $ip;

  }



  function get_visitor_details()

  {

    $CI = & get_instance();



    if(!$CI->load->is_loaded('user_agent'))

      $CI->load->library('user_agent');



    $agent_string= $CI->agent->agent_string();

    $platform= $CI->agent->platform();

    $browser= $CI->agent->browser();

    $version= $CI->agent->version();

    $robot= $CI->agent->robot();

    $mobile= $CI->agent->mobile();

    $referrer= $CI->agent->referrer();

    $is_referral= $CI->agent->is_referral();

    $a= $CI->agent->languages();

    $b= $CI->agent->charsets();

    $arr = $a;

    $languages= implode(" ",$arr);

    $arrr = $b;

    $charsets= implode(" ",$arrr);

    $ip_address= $CI->input->ip_address();



    $url = $CI->config->site_url($CI->uri->uri_string());

    $url = $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;





    $agent_array = array(

      'agent_string' => $agent_string,

      'platform' => $platform,

      'browser' => $browser,

      'version' => $version,

      'robot' => $robot,

      'mobile' => $mobile,

      'referrer' => $referrer,

      'is_referral' => $is_referral,

      'current_url' => $url,

      'languages' => $languages,

      'charsets' => $charsets,

      'ip_address' => $ip_address,

      'status' => 'success'

    );



    return $agent_array;

  }



  function formatDateAgo($value)

  {

    date_default_timezone_set('Asia/Kolkata');

    $time = strtotime($value);

    $d = new \DateTime($value);



    $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    $months = ['January', 'February', 'March', 'April',' May', 'June', 'July', 'August', 'Septmber', 'October', 'November', 'December'];



    if ($time > strtotime('-2 minutes'))

    {

      return 'few seconds ago';

    }

    elseif ($time > strtotime('-30 minutes'))

    {

      return floor((strtotime('now') - $time)/60) . ' min ago';

    }

    elseif ($time > strtotime('today'))

    {

      return $d->format('G:i');

    }

    elseif ($time > strtotime('yesterday'))

    {

      return 'Yesterday, ' . $d->format('G:i');

    }

    elseif ($time > strtotime('this week'))

    {

      return $weekDays[$d->format('N') - 1] . ', ' . $d->format('G:i');

    }

    else

    {

      return $d->format('j') . ' ' . $months[$d->format('n') - 1] . ', ' . $d->format('G:i');

    }

  }

    function mailDate($originalDate)

 {

   $date =  date("d-m-Y", strtotime($originalDate));

   $a=explode('-', $date);

   switch ($a[1])

   {

     case '1': $b="Jan"; break;

     case '2': $b="Feb"; break;

     case '3': $b="Mar"; break;

     case '4': $b="Apr"; break;

     case '5': $b="May"; break;

     case '6': $b="Jun"; break;

     case '7': $b="Jul"; break;

     case '8': $b="Aug"; break;

     case '9': $b="Sep"; break;

     case '10': $b="Oct"; break;

     case '11': $b="Nov"; break;

     case '12': $b="Dec"; break;

     default: $b=''; break;

   }

   return $b.' '.$a[0].' , '.$a[2].' '.date('h:i a', strtotime($originalDate));;

 }



  function time_difference($a,$b)

  {

    $start = strtotime($a);

    $end = strtotime($b);

    $current = time();

    $completed = (($current - $start) / ($end - $start)) * 100;

    if($completed>=100)

      $completed=100;

    if($completed<=0)

      $completed=0;

    return round($completed,2);

  }

      function blacklist()

  {

    $CI = & get_instance();

    $CI->HomeDb->insert(array('ip_ip'=>get_ip(),'ip_lid'=>this_user(),'ip_url'=>current_url1()),'bl_ip_blacklist');

    redirect('logout');

  }
  
  function this_user($a=NULL)
  {
    $CI = &get_instance();
    if(!empty($CI->session->userdata('l_uid')))
    {
      $sess=$CI->session->userdata('l_uid');
      if(!empty($a))
        $s=sec($sess[$a],'d');
      else
        $s=sec($sess['l_id'],'d');
      if(!empty($s))
        return $s;
      return false;
    }
    else
      return false;
  }
  
function removeElement($array,$value)
{
    if (($key = array_search($value, $array)) !== false)
    {
        unset($array[$key]);
    }
    return $array;
}
function activation_code()
     {
       
        $n1 = rand(0, 9);
        $n2 = rand(0, 9);
        $n3 = rand(0, 9);
        $n4 = rand(0, 9);
        $n5 = rand(0, 9);
        $n6 = rand(0, 9);
        $no = $n1 . $n2 . $n3 . $n4. $n5 . $n6;
        return $no;
   
     }


}
function getWishlist()
{
    $CI = & get_instance();
    $myWishlist = $CI->input->cookie('myWishlist',TRUE);
    if(!empty($myWishlist))
    {
      $wlist = explode(',',$myWishlist);
    }
    else
    {
      $wlist = null;
    }
    return $wlist;
}
function getMenuCartData()
{
  $CI = & get_instance();
  $data = $CI->essential->getMenuCartData();
  
  return $data;
}
