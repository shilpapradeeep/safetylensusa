<ul class="checkout-steps" id="address-steps">
	
		<li>
			<h2 class="step-title">Shipping Address</h2>
			<?php 
			$kk['cartAddr'] = !empty($cartAddr)?$cartAddr:null;
			$kk['address'] = !empty($address['shipping'])?$address['shipping']:null;
			$this->load->view('front_end/inc/address/div_addreslist', $kk);?>
			<a href="#" class="btn btn-sm btn-outline-secondary btn-new-address" type="1">+ New Address</a>
		</li>
</ul>
<ul class="checkout-steps" id="billing-address-steps">
	<li>
		<h2 class="step-title">Billing Address</h2>
		<?php
		$kk = null;
		$kk['cartAddr'] = !empty($cartAddr)?$cartAddr:null;
		$kk['address'] = !empty($address['billing'])?$address['billing']:null;
		$this->load->view('front_end/inc/address/div_addreslist',$kk);?>
		<a href="#" type="2" class="btn btn-sm btn-outline-secondary btn-new-address" >+ New Address</a>
	</li>
</ul>
<!-- data-toggle="modal" data-target="#addressModal" -->