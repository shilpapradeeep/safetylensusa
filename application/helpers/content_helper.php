<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
{
	function content($a)
  	{
    	$res=array(
                    'project_name'=>'Safety Glasses | Safety Prescription Lens | Safety Frames',
                    'pop_lead_heading'=>'Subscribe to our Updates!',
                    'pop_lead_content'=>'Share your number to subscribe our updates via SMS / WhatsApp.',
                    'btn_submit'=>'Submit',
                    'menu_contact'=>'',
                    'btn_shop'=>'Shop Now',
                    'fav_icon'=>repo().'front_end/images/icons/favicon.ico',
                    'top_bar_phone_1'=>'',
                    'top_bar_email_1'=>'',
                    'contact_address'=>'',
                    'contact_phone'=>'0471-2700091',
                    'contact_email'=>'',
                    'pdf_header_img'=>'',
                    'main_logo_color'=>repo_fr().'front_end/images/kamco-logo.png',
                    'main_logo_white'=>repo_fr().'images/logo.png',
                    'admin_page_logo_dark_1'=>img_back().'logo.svg',
                    'admin_page_logo_dark_2'=>img_back().'logo-dark.png',
                    'admin_page_logo_light_1'=>img_back().'logo-light.svg',
                    'admin_page_logo_light_2'=>img_back().'logo-light.png',
                    'mail_header_img'=>repo()."front_end/images/kamco-logo.png"
                    
                    );

    	if(!empty($res))
    	{
    		if($res[$a])
    		{
    			$echo_res=$res[$a];
    		}
    		else
    		{
    			$echo_res='';
    		}
    		return $echo_res;
    	}
  	}
  	function banner_img($a)
    {
        $res=array(
            'Home_slider'=>'1',
            'Latest_product'=>'2',
            'Sale_Banner_1'=>'3',
            'Featured_Products'=>'4',
            'Popular_Products'=>'5',
            'Sale_Banner_2'=>'6',
            'Most_Selling_Product'=>'7',
            'Upcoming_Products'=>'8',
            'Categories_Shop_Now'=>'9',
            'Product_Shop_Now'=>'10',
            'Shop_Banner'=>'11',
            'Shop_Banner_2'=>'12',
            'Shop_Banner_3'=>'13',
            'Big_sale'=>'14',
            'tranding_prd'=>'15'
        );
        if(!empty($res))
        {
            if($res[$a])
            {
                $echo_res=$res[$a];
            }
            else
            {
                $echo_res='';
            }
            return $echo_res;
        }
    }
}