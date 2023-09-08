<?php

defined('BASEPATH') OR exit('No direct script access allowed');


$route['404_override'] = 'Error404';

$route['error'] = 'Error404';

$route['default_controller'] = 'Home';
$route['home2'] = 'Home/index/home2';
$route['home3'] = 'Home/index/home3';
$route['home4'] = 'Home/index/home4';
$route['home5'] = 'Home/index/home5';
$route['home6'] = 'Home/index/home6';

// user login
$route['login'] = 'Login/l_page';
$route['submit_login'] = 'Login/l_login';
$route['logout'] = 'Login/l_ogout';
// user sign up
$route['register'] = 'SignUp/s_page';
$route['submit_reg'] = 'SignUp/s_submit';
$route['sign_otp_check'] = 'SignUp/sub_otp';

$route['account'] = 'User_Profile/u_page';
$route['view_profile'] = 'User_Profile/v_page';
$route['edit_profile'] = 'User_Profile/e_page';
$route['profile-img-upload'] = 'User_Profile/profile_upload';
$route['profile_edit'] = 'User_Profile/pf_edit';

$route['change-my-password'] = 'User_change_password/chng_pass';
$route['submit_user_password'] = 'User_change_password/sub_new_pass';

$route['corporate'] = "Corporate";
$route['about-us'] = "Home/about";
$route['about-us'] = 'Home/about';
$route['contact-us'] = 'Home/contact';
$route['submit_contact'] = 'Home/c_submit'; 

$route['blog'] = 'Home/blog';
$route['(:any)/blog/(:any)']='Home/blog_details/$1/$2';

$route['terms-and-conditions'] = 'Home/terms_conditions';
$route['privacy-policy'] = 'Home/privacy_policy';
$route['refund-policy'] = 'Home/refund_policy';
$route['cancellation-policy'] = 'Home/cancellation_policy';




$route['preview'] = 'Common_controller/pre';
$route['img-upload'] = 'Common_controller/img_upload';


$route['products'] = 'Products/products_list';
$route['products-details/(:any)'] = 'Products/products_details/$1';
$route['select-lens'] = 'Products/select_lens';
$route['your-prescription'] = 'Products/prescription';
$route['addToCart'] = 'Cart/add';
$route['cart'] = 'Cart/cart_page';
$route['checkout'] = 'Cart/checkout_page';
$route['checkoutLogin'] = 'Cart/checkoutLogin';

$route['submit-address'] = 'Address/add_address';
$route['to-review-page'] = 'Address/add_address_to_session';
$route['checkout-review'] = 'Cart/checkout_review';
$route['to-paypal-for-payment'] = 'Checkout/to_paypal';
$route['add-guest-address'] = 'Address/guest_address';

$route['delete-cart'] = 'Cart/delete_cart';
$route['review-action'] = 'Products/reviewAction';




//************************* ADMIN ***************************//
$route['dashboard'] = 'back_end/Dashboard/dash';
$route['ploat-order-graph'] = 'back_end/DashboardGraph/ploat_graph';

$route['add-product'] = 'back_end/Product_controller/product_add';
$route['list-product'] = 'back_end/Product_controller/product_list';
$route['submit-product'] = 'back_end/Product_controller/submit_product';
$route['list-product-tbl'] = 'back_end/Product_controller/list_data';
$route['delete-product'] = 'back_end/Product_controller/delete_product';
$route['edit-product/(:any)'] = 'back_end/Product_controller/product_edit/$1';
$route['view-product/(:any)'] = 'back_end/Product_controller/product_view/$1';
$route['view-product-data'] = 'back_end/Product_controller/product_detailed_view';
$route['add_more_variation'] = 'back_end/Product_controller/add_more_variation';

$route['add-brand'] = "back_end/Brand_controller/add_page";
$route['submit-brand'] = "back_end/Brand_controller/submit_brand";
$route['list-brand'] = "back_end/Brand_controller/brand_tbl";
$route['edit-brand-data'] = "back_end/Brand_controller/edit_brand";
$route['delete-brand'] = "back_end/Brand_controller/delete_brand";

$route['change-password'] = 'back_end/Change_password_controller/change_pwd';
$route['submit-change-password'] = 'back_end/Change_password_controller/submit_change_pwd';

$route['blog-add'] = "back_end/Blog_controller/add_page";
$route['submit-blog'] = "back_end/Blog_controller/submit_blog";
$route['list-blog'] = "back_end/Blog_controller/blog_tbl";
$route['edit-blog-data'] = "back_end/Blog_controller/edit_blog";
$route['delete-blog'] = "back_end/Blog_controller/delete_member";

$route['messages'] = "back_end/Message_controller/view_page";
$route['message-list'] = "back_end/Message_controller/message_tbl";

$route['add-styles'] = "back_end/Style_controller/add_page";
$route['submit-styles'] = "back_end/Style_controller/submit_";
$route['list-styles'] = "back_end/Style_controller/list_tbl";
$route['edit-styles-data'] = "back_end/Style_controller/edit_";
$route['delete-styles'] = "back_end/Style_controller/delete_";

$route['category-add'] = 'back_end/Category/cat_add';
$route['submit_category'] = 'back_end/Category/cat_submit';
$route['category_tbl'] = 'back_end/Category/list_t';
$route['get-category'] = 'back_end/Category/get_edata';
$route['delete-category'] = 'back_end/Category/delete';

// ajax
$route['get-category-data'] = 'Ajax_controller/get_category';
$route['get-brand-data'] = 'Ajax_controller/get_brand';
$route['get-style-data'] = 'Ajax_controller/get_style';
$route['fill-category'] = 'Ajax_controller/fill_category';
$route['fill-year'] = 'Ajax_controller/fill_year';
$route['fill-month'] = 'Ajax_controller/fill_month';

$route['fill-month'] = 'Ajax_controller/fill_month';

// gallery upload
$route['upload-images'] = 'back_end/Images/upload_asset_photo';
$route['delete-image'] = 'back_end/Images/delete_img';

$route['add-price'] = "back_end/Price_management/price_page";
$route['submit-price'] = "back_end/Price_management/submit_price";

$route['add-banner'] = "back_end/Banner_management/banner_page";
$route['submit-banner'] = "back_end/Banner_management/submit_banner";

$route['product-reviews'] = "back_end/Product_Review/list";
$route['product-review-tbl'] = 'back_end/Product_Review/list_data';

//lens

//lens options
$route['lens-options'] = "back_end/Lens_controller/lensoptionspage";
$route['lens-options-action'] = "back_end/Lens_controller/lensOptionsAction";
$route['lens-optns-tbl'] = "back_end/Lens_controller/list_lens_options";
$route['lens-optns-view-edit'] = "back_end/Lens_controller/vieweditlensoptions";
$route['lens-optns-delete'] = "back_end/Lens_controller/lensoptiondelete";

//tint type
$route['tint-type'] = "back_end/Lens_controller/tinttypepage";
$route['tint-type-tbl'] = "back_end/Lens_controller/list_tint_type";
$route['tint-type-action'] = "back_end/Lens_controller/tintTypeAction";
$route['tint-type-view-edit'] = "back_end/Lens_controller/viewedittinttype";
$route['tint-type-delete'] = "back_end/Lens_controller/tinttypedelete";

//Polarized-lens
$route['polarized-lens'] = "back_end/Lens_controller/polarizedlenspage";
$route['polarized-lens-tbl'] = "back_end/Lens_controller/list_polarized_lens";
$route['polarized-lens-action'] = "back_end/Lens_controller/polarizedLensAction";
$route['polarized-lens-view-edit'] = "back_end/Lens_controller/vieweditpolarizedlens";
$route['polarized-lens-delete'] = "back_end/Lens_controller/polarizedlensdelete";

//Transitions 
$route['transitions'] = "back_end/Lens_controller/transitionspage";
$route['transitions-tbl'] = "back_end/Lens_controller/list_transitions";
$route['transitions-action'] = "back_end/Lens_controller/transitionsAction";
$route['transitions-view-edit'] = "back_end/Lens_controller/viewedittransitions";
$route['transitions-delete'] = "back_end/Lens_controller/transitionsdelete";

//Lens-values
$route['lens-values-modals'] = "back_end/Lens_controller/lensValues";
$route['lens-values-add-new'] = "back_end/Lens_controller/lensValuesAddNew";
$route['lens-values-action'] = "back_end/Lens_controller/lensValuesAction";
$route['lens-values-delete-input'] = "back_end/Lens_controller/lensValuesDeleteInput";

//Lens Type
$route['lens-type'] = "back_end/Lens_controller/lenstypewpage";
$route['lens-type-tbl'] = "back_end/Lens_controller/list_lens_type";
$route['lens-type-file'] = "back_end/Lens_controller/lens_type_file";
$route['lens-type-action'] = "back_end/Lens_controller/lens_type_action";
$route['lens-type-view-edit'] = "back_end/Lens_controller/lens_type_view_edit";
$route['lens-type-delete'] = "back_end/Lens_controller/lens_type_delete";

$route['user-management'] = 'back_end/UserManagement/usertbl';
$route['user-management-view'] = 'back_end/UserManagement/viewDetail';
$route['delete-user'] = 'back_end/UserManagement/deleteUser';

$route['corporate-management'] = 'back_end/CorporateManagement/cortbl';
$route['corporate-management-view'] = 'back_end/CorporateManagement/viewDetail';
$route['delete-corporate'] = 'back_end/CorporateManagement/deleteUser';
$route['corporate-management-amount-action'] = "back_end/CorporateManagement/amountAction";



$route['all-order-list'] = 'back_end/Order_controller/order_list';
$route['order-details/(:any)'] = 'back_end/Order_controller/order_details/$1';
$route['list-order-tbl'] = 'back_end/Order_controller/order_tbl';
$route['order-details-data'] = 'back_end/Order_controller/order_details_dta';
$route['order-status-change'] = 'back_end/Order_controller/change_delivery_status';
$route['pending-order-list'] = 'back_end/Order_controller/order_list';
$route['packing-order-list'] = 'back_end/Order_controller/order_list';
$route['delivery_initiated-order-list'] = 'back_end/Order_controller/order_list';
$route['intransit-order-list'] = 'back_end/Order_controller/order_list';
$route['collected_at_next_center-order-list'] = 'back_end/Order_controller/order_list';
$route['waiting_for_delivery-order-list'] = 'back_end/Order_controller/order_list';
$route['delivered-order-list'] = 'back_end/Order_controller/order_list';
$route['cancelled-order-list'] = 'back_end/Order_controller/order_list';
$route['undelivered-order-list'] = 'back_end/Order_controller/order_list';

//lens materials
$route['lens-materials'] = "back_end/Lens_controller/lens_materials";
$route['lens-materials-action'] = "back_end/Lens_controller/lens_materials_action";
$route['lens-materials-file'] = "back_end/Lens_controller/lens_materials_file";
$route['lens-materials-tbl'] = "back_end/Lens_controller/list_lens_materials";
$route['lens-materials-view-edit'] = "back_end/Lens_controller/lens_materials_view_edit";
$route['lens-materials-pricing'] = "back_end/Lens_controller/lens_materials_pricing";
$route['lens-materials-delete'] = "back_end/Lens_controller/lens_materials_delete";


//Product Reviews
$route['product-reviews'] = "back_end/Product_Review/list";
$route['product-review-tbl'] = 'back_end/Product_Review/list_data';
$route['delete-productReview'] = 'back_end/Product_Review/delete_review';

$route['home-banner-management'] = "back_end/Content_management/home_banner";
$route['submit-home-banner'] = "back_end/Content_management/submit_home_banner";
//************************* ADMIN END***************************//

$route['mail'] = 'SampleMail';

