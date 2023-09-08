<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	
	<title>Editable Invoice</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		body
		{
			margin: 0;
		  	font-family: calibri;
		}
		.primary-color
		{
			font-weight: 600;
    		color: #f15723;
		}
		.fnt-19
		{
			font-size: 19px;
		}
  
	</style>
</head>

<body>

	<div  class="container-fluid">

		<div class="row">
			
		</div>
		<div class="row">
			<div class="page-content">
				<!-- Panel -->
				<div class="panel">
					<div class="panel-body container-fluid">
							<table style="width: 100%;"  style="margin: 0">
								<?php $this->load->view('pdf/inc/header')?>
								<?php $this->load->view('pdf/inc/customer-details')?>
							</table>
							<?php $this->load->view('pdf/inc/order-summery')?>
					
        		</div>
        	</div>
        	<!-- End Panel -->
        </div>
    </div>
</div>

</body>

</html>