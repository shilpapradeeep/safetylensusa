<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
{
	
	function set_upload_options($path,$val=null)
	{
	    $exp = explode(',', $path);
	    $path = $exp[0];
	    $config['upload_path'] = $path;

	    if (!empty($val)) {
	    	$var = explode('-', $val);
	    	if (!empty($var[1])) 
	    	{
	    		if ($var[1] == 'img') 
	    		{
	    			$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG|JPEG';
	    			if ($var[0] == 'ad_file')
	    			{
	    				$config['allowed_types'] = 'gif|GIF|jpg|png|jpeg|PNG|JPG|JPEG|pdf|doc|docx|PDF|DOC|DOCX';
	    			}
	    			if ($var[0] == 'media') 
	    			{
	    				$config['min-width'] = $exp[2];
						$config['min-height'] = $exp[1];
						$config['max-width'] = $exp[2];
						$config['max-height'] = $exp[1];
	    			}
	    		}
	    		elseif ($var[1] == 'file') 
	    		{
	    			$config['allowed_types'] = 'pdf|doc|docx|PDF|DOC|DOCX';
	    		}
	    		elseif( $var[1] == 'imfile' )
	    		{
	    			$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG|JPEG';
	    		}

	    	}
	    	$config['max_size'] = 102400;
	    		    	
	    }
        
        
		if(!is_dir($path)) 
		{
	    	mkdir($path, 755, TRUE);
		}
		
	    return $config;
	}
}