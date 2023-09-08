<?php $uri = $this->uri->segment(1); ?>
<!-- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="<?=b('dashboard')?>" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span>Dashboards</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect <?=$uri == 'order-details' ? 'mm-active' : '' ?>">
                <i class="bx bxs-truck"></i>
                <span>Order Management</span>
            </a>
            <ul class="sub-menu <?=$uri == 'order-details' ? 'mm-show' : '' ?>" aria-expanded="false">
                <li><a href="<?=b('all-order-list')?>">All</a></li>
                <li><a href="<?=b('pending-order-list')?>">Pending</a></li>
                <li><a href="<?=b('packing-order-list')?>">Packing</a></li>
                <li><a href="<?=b('delivery_initiated-order-list')?>">Delivery Initiated</a></li>
                <li><a href="<?=b('intransit-order-list')?>">In Transit</a></li>
                <li><a href="<?=b('collected_at_next_center-order-list')?>">Collected At Next Center</a></li>
                <li><a href="<?=b('waiting_for_delivery-order-list')?>">Waiting For Delivery</a></li>
                <li><a href="<?=b('delivered-order-list')?>">Delivered</a></li>
                <li><a href="<?=b('cancelled-order-list')?>">Cancelled</a></li>
                <li><a href="<?=b('undelivered-order-list')?>">Undelivered</a></li>
            </ul>
        </li>

      
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect <?=$uri == 'edit-product' ? 'mm-active' : '' ?>">
                <i class="bx bx-layout"></i>
                <span>Products</span>
            </a>
            <ul class="sub-menu <?=$uri == 'edit-product' ? 'mm-show' : '' ?>" aria-expanded="false">
                <li><a href="<?=b('add-product')?>" class='<?=$uri == 'edit-product' ? 'mm-active' : '' ?>'>Product Add</a></li>
                <li><a href="<?=b('list-product')?>">Product List</a></li>
            </ul>
        </li>
                <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect <?=$uri == 'edit-product' ? 'mm-active' : '' ?>">
                <i class="bx bx-menu-alt-right"></i>
                <span>Lens Management</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?=b('lens-options')?>">Lens Options</a></li>
                <li><a href="<?=b('lens-materials')?>">Lens Materials</a></li>
                <li><a href="<?=b('lens-type')?>">Lens Type</a></li>
                <li><a href="<?=b('tint-type')?>">Tint Type</a></li>
                <li><a href="<?=b('polarized-lens')?>">Polarized Lens</a></li>
                <li><a href="<?=b('transitions')?>">Transitions</a></li>
                <li><a class="lens_values" typ="pd_one_value" href="javascript:void(0)">PD One Value</a></li>
                <li><a class="lens_values" typ="pd_right_value" href="javascript:void(0)">PD Right Value</a></li>
                <li><a class="lens_values" typ="pd_left_value" href="javascript:void(0)">PD Left Value</a></li>
                <li><a class="lens_values" typ="sphere_value" href="javascript:void(0)">Sphere Value</a></li>
                <li><a class="lens_values" typ="cylinder_value" href="javascript:void(0)">Cylinder Value</a></li>
                <li><a class="lens_values" typ="axis_value" href="javascript:void(0)">Axis Value</a></li>
                <li><a class="lens_values" typ="add_value" href="javascript:void(0)">Add Value</a></li>
            </ul>
        </li>
        <li>
            <a href="<?=b('category-add');?>" class=" waves-effect">
                <i class="bx bx-square"></i>
                <span>Category</span>
            </a>
        </li>
        <li>
            <a href="<?=b('add-brand');?>" class=" waves-effect">
                <i class="bx bx-briefcase"></i>
                <span>Brand</span>
            </a>
        </li>
        <li>
            <a href="<?=b('add-styles');?>" class=" waves-effect">
                <i class="bx bx-code-alt"></i>
                <span>Styles</span>
            </a>
        </li>
        <li>
            <a href="<?=b('add-price');?>" class=" waves-effect">
                <i class="bx bx-money"></i>
                <span>Price Settings</span>
            </a>
        </li>
        <li>
            <a href="<?=b('product-reviews')?>" class="waves-effect">
                <i class="bx bx-star"></i>
                <span>Product Reviews</span>
            </a>
        </li>
      
        <!--<li>-->
        <!--    <a href="<?=b('blog-add');?>" class=" waves-effect">-->
        <!--        <i class="bx bxl-blogger"></i>-->
        <!--        <span>Blog</span>-->
        <!--    </a>-->
        <!--</li>-->
         <li>
            <a href="<?=b('user-management');?>" class=" waves-effect">
                <i class="bx bx-group"></i>
                <span>User Management</span>
            </a>
        </li>
        <li>
            <a href="<?=b('corporate-management');?>" class=" waves-effect">
                <i class="bx bxs-user-circle"></i>
                <span>Corporate Management</span>
            </a>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect <?=$uri == 'order-details' ? 'mm-active' : '' ?>">
                <i class="bx bx-layout"></i>
                <span>Content Management</span>
            </a>
            <ul class="sub-menu " aria-expanded="false">
                <li>
                    <a href="<?=b('home-banner-management');?>" class=" waves-effect">
                        <i class="bx bx-image"></i>
                        <span>Home Banner</span>
                    </a>
                </li>
                <li>
                    <a href="<?=b('blog-add');?>" class=" waves-effect">
                        <i class="bx bx bxl-blogger"></i>
                        <span>Blog</span>
                    </a>
                </li>
               
            </ul>
        </li>
         <li>
            <a href="<?=b('messages');?>" class=" waves-effect">
                <i class="bx bx-message"></i>
                <span>Messages</span>
            </a>
        </li>
     
        <li>
            <a href="<?=b('change-password')?>" class="waves-effect">
                <i class="bx bx-key"></i>
                <span>Change Password</span>
            </a>
        </li>

        <li>
            <a href="<?=b('logout')?>" class="waves-effect">
                <i class="bx bx-log-out-circle"></i>
                <span>Logout</span>
            </a>
        </li>




    </ul>
</div>
<!-- Sidebar 