<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller 
{
	public function index()
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
$this->load->view('errors/error_page',$data);
	}
	

}
