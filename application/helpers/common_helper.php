<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
{
	function css_link()
	{
	    $css=array('css/bootstrap.min.css',
	    			'css/icons.min.css',
	    			'css/app.min.css',
	    			'libs/iziToast-master/dist/css/iziToast.min.css',
	    			"libs/sweet-alert/sweetalert.css",
				);
	    return $css;
	}
	
	function js_link()
	{
	    $js=array("libs/jquery/jquery.min.js",
					"libs/bootstrap/js/bootstrap.bundle.min.js",
					"libs/metismenu/metisMenu.min.js",
					"libs/simplebar/simplebar.min.js",
					"libs/node-waves/waves.min.js",
					"libs/iziToast-master/dist/js/iziToast.min.js",
					"libs/sweet-alert/sweetalert.min.js",
					"js/app.js",
				);
	    return $js;
	}

	function css_datatable()
	{
		$css_dt = array('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
					'libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
					'libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
				);
		return $css_dt;
	}

	function js_datatable()
	{
		$js_dt = array('libs/datatables.net/js/jquery.dataTables.min.js',
					'libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
					'libs/datatables.net-buttons/js/dataTables.buttons.min.js',
					'libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
					'libs/jszip/jszip.min.js',
					'libs/pdfmake/build/pdfmake.min.js',
					'libs/pdfmake/build/vfs_fonts.js',
					'libs/datatables.net-buttons/js/buttons.html5.min.js',
					'libs/datatables.net-buttons/js/buttons.print.min.js',
					'libs/datatables.net-buttons/js/buttons.colVis.min.js',
					'libs/datatables.net-responsive/js/dataTables.responsive.min.js',
					'libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
					'js/pages/datatables.init.js'
				);
		return $js_dt;
	}
	function cmenu($cond,$limit=null)
	{
		$CI=& get_instance();
		return $CI->essential->category($cond,$limit);
	}
	function get_country($cond,$limit=null)
	{
		$CI=& get_instance();
		return $CI->essential->country($cond,$limit);
	}
	function sbmenu($cond)
	{
		$CI=& get_instance();
		return $CI->essential->sub_category($cond);
	}
	function prducts($cond,$limit=null,$st=null,$or=null)
	{
		$CI=& get_instance();
		return $CI->essential->products($cond,$limit,$st,$or);
	}
	function get_Det($tbl,$cond,$limit=null,$st=null,$or=null)
	{
		$CI=& get_instance();
		return $CI->essential->get_det($tbl,$cond,$limit,$st,$or);
	}
	function months()
	{
		$months = array(
						"01"=>'Jan',
						"02"=>'Feb',
						"03"=>'Mar',
						"04"=>'Apr',
						"05"=>'May',
						"06"=>'Jun',
						"07"=>'Jul',
						"08"=>'Aug',
						"09"=>'Sep',
						"10"=>'Oct',
						"11"=>'Nov',
						"12"=>'Dec'
					);
		return $months;

	}
	function years()
	{
		$years = array(
						"2020"=>'2020',
						"2021"=>'2021',
						"2022"=>'2022',
						"2023"=>'2023',
						"2024"=>'2024',
						"2025"=>'2025',
						"2026"=>'2026',
						"2027"=>'2027',
						"2028"=>'2028',
						"2029"=>'2029',
						"2030"=>'2030'
					);
		return $years;

	}
}
	