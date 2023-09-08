<!DOCTYPE html>
<html lang="en">

<head>
<?php
$this->load->view('back_end/include/head');
?>
<style>
.highcharts-figure, .highcharts-data-table table {
min-width: 310px; 
max-width: 800px;
margin: 1em auto;
}

#order {
height: 400px;
}

.highcharts-data-table table {
font-family: Verdana, sans-serif;
border-collapse: collapse;
border: 1px solid #EBEBEB;
margin: 10px auto;
text-align: center;
width: 100%;
max-width: 500px;
}
.highcharts-data-table caption {
padding: 1em 0;
font-size: 1.2em;
color: #555;
}
.highcharts-data-table th {
font-weight: 600;
padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
background: #f8f8f8;
}
.highcharts-data-table tr:hover {
background: #f1f7ff;
}
?>

</style>
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

<?php
$this->load->view('back_end/include/header');
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

<div data-simplebar class="h-100">

<!--- Sidemenu -->
<?php
$this->load->view('back_end/include/side_menu');
?>
<!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<?php
$this->load->view('back_end/include/breadcrumb');
?>
<div class="row">
<div class="col-md-4">
<div class="card mini-stats-wid">
<div class="card-body">
<a href="<?=b('all-order-list');?>" title="View">
<div class="media">
<div class="media-body">
<p class="text-muted font-weight-medium">Orders</p>
<h4 class="mb-0"><?=number_format($orders);?></h4>
</div>

<div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
<span class="avatar-title">
<i class="fa fa-shopping-cart  font-size-24"></i>
</span>
</div>
</div>
</a>
</div>
</div>
</div>

<div class="col-md-4" >
<div class="card mini-stats-wid">
<div class="card-body">
<a href="<?=b('category-add');?>" title="View">
<div class="media">
<div class="media-body">
<p class="text-muted font-weight-medium">Category</p>
<h4 class="mb-0"><?=number_format($category);?></h4>
</div>

<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
<span class="avatar-title rounded-circle bg-primary">
<i class="fa fa-list-alt font-size-24"></i>
</span>
</div>
</div>
</a>
</div>
</div>
</div>


<div class="col-md-4">
<div class="card mini-stats-wid">
<div class="card-body">
<a href="<?=b('list-product');?>" title="View">
<div class="media">
<div class="media-body">
<p class="text-muted font-weight-medium">Products</p>
<h4 class="mb-0"><?=number_format($products);?></h4>
</div>

<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
<span class="avatar-title rounded-circle bg-primary">
<i class="fab fa-product-hunt font-size-24"></i>


<!-- <i class="fa fa-dolly-flatbed-alt font-size-24"></i> -->
</span>
</div>
</div>
</a>
</div>
</div>
</div>
</div>
<div class="row">

<div class="col-lg-12">
<div class="card">
<div class="card-body">
<h4 class="card-title mb-4">Column Charts</h4>
<div class="row">
<div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
<div class="form-group ajax-select mt-3 mt-lg-0">
<label for="year" class="control-label">Year <span class="compulsory">*</span></label>
<select name="year" id="year" class="form-control select2-ajax"></select>
<span id="year_error" class="validation-error"></span>       
</div>


</div>
<div class="col-xl-6 col-md-12 col-sm-12 col-xs-12">
<div class="form-group ajax-select mt-3 mt-lg-0 month" style="display:none">
<label for="month" class="control-label">Month <span class="compulsory">*</span></label>
<select name="month" id="month" class="form-control select2-ajax"></select>
<span id="month_error" class="validation-error"></span>       
</div>
</div>


</div>


<div id="order" class="apex-charts" dir="ltr"></div>                                      
</div>
</div><!--end card-->
</div>
</div>
<!-- end row -->
</div>
</div>
<!-- end page title -->


</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->



<?php
$this->load->view('back_end/include/footer');
?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<?php
$this->load->view('back_end/include/script');
?>
<script type="text/javascript">
function list(slug)
{
var base = $('#baseurl').val();
setTimeout(function() {
location.href = base + slug;
}, 500);
}
</script>
<input type="hidden" name="current_month" id="current_month" value="<?=sec(Date('m'));?>">
<input type="hidden" name="current_year" id="current_year" value="<?=Date('Y');?>">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</body>

</html>