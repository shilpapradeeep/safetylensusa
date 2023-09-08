$(document).keypress(function(e) {
	if ($('#username').is(":focus")) {
		if(e.which == 13) {
			$('#email_button').click();
		}
	}
	if ($('#password').is(":focus")) {
		if(e.which == 13) {
			$('#password_button').click();
		}
	}
});

/*function check_user()
{
	var base=$('#baseurl').val();
	var token=$('#csrf_token').val();
	var hash=$('#csrf_hash').val();
	var user=$('#uemail').val();
	var lc = new FormData();
	lc.append(token,hash);
	lc.append('user_email',user);

	$.ajax({
		url : base+'user_email_check',
		type : 'post',
		data : lc,
		dataType : 'json',
		success:function(data)
		{
			console.log(data);
			
			if(data.type==1)
			{
				success(data.msg);
				$( "#uemail" ).parent().hide();
				$(".ajax-load").before('<div class="form-group">'+
									    '<input type="text"  class="form-control" name="otp" id="otp" placeholder="Enter OTP">'+
									    '<div id="otp_error" class="invalid-feedback"></div>'+
									'</div>');
			}
			else
			{
				if($.isEmptyObject(data.errors))
				{
					if(data.type==1)
			        {
			        	$('.invalid-feedback').show();
			        	$('#username_error').html(data.msg);	
			        }
					//error(data.msg);
				}else{
					$('.invalid-feedback').show();
					for(var key in data.errors)
					{
						var v = data.errors[key];
						$('#'+key+'_error').html(v);

					}
				}
			}  
		}
	});
	
	/*return false;
}*/

function check_user()
{
	$('#form-btn').hide();
	$('#email_button').hide();
	$('.spinner').show();
	$('.invalid-feedback').hide();
	$('.invalid-feedback').html("");
	var base=$('#baseurl').val();
	var token=$('#csrf_token').val();
	var hash=$('#csrf_hash').val();
	var user=$('#uemail').val();
	var lc = new FormData();
	lc.append(token,hash);
	lc.append('uemail',user);

	$.ajax({
		url : base+'user_email_check',
		type : 'post',
		data : lc,
		dataType : 'json',
		processData: false,
	    contentType: false,
	    cache: false,
		success:function(data)
		{
			//alert(data);
			
			console.log(data);
			$('#form-btn').show();
			$('.spinner').hide();
			if(data.res==1)
			{
				success(data.msg);

				$( "#useremail" ).hide();

				$( "#user_id" ).val(data.uid);
				$(".otp").html('<div class="form-group">'+
									    '<input type="text"  class="form-control" name="otp" id="otp" placeholder="Enter OTP">'+
									    '<div id="otp_error" class="invalid-feedback"></div>'+
									'</div>'+
									'<div class="form-group">'+
                                    '<button type="submit" id="otp_button" class="btn btn-fill-out btn-block" name="register" onclick="check_otp()">Submit</button>'+
                                '</div>');
				
				
			}
			else
			{
				if($.isEmptyObject(data.errors))
				{
					if(data.type==1)
			        {
			        	$('.invalid-feedback').show();
			        	$('#username_error').html(data.msg);	
			        }
					//error(data.msg);
				}else{
					$('.invalid-feedback').show();
					for(var key in data.errors)
					{
						var v = data.errors[key];
						$('#'+key+'_error').html(v);

					}
				}
			}
		}
	});
	return false;
}
function check_otp()
{
	
	
	$('.invalid-feedback').hide();
	$('.invalid-feedback').html("");
	var base=$('#baseurl').val();
	var token=$('#csrf_token').val();
	var hash=$('#csrf_hash').val();
	var otp=$('#otp').val();
	var lc = new FormData();
	lc.append(token,hash);
	lc.append('otp',otp);

	$.ajax({
		url : base+'user_otp_check',
		type : 'post',
		data : lc,
		dataType : 'json',
		processData: false,
	    contentType: false,
	    cache: false,
		success:function(data)
		{
			//alert(data);
			
			console.log(data);
			$('#form-btn').show();
			$('#spin').hide();
			if(data.res==1)
			{
				success(data.msg);

				$( "#useremail" ).hide();


				$(".otp").html('<div class="form-group">'+
                                '<input class="form-control"  type="password" name="upassword" id="upassword" placeholder="Password">'+
                                '<div id="upassword_error" class="invalid-feedback"></div>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<input class="form-control"  type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">'+
                                '<div id="cpassword_error" class="invalid-feedback"></div>'+
                            '</div>'+
									'<div class="form-group">'+
                                    '<button type="submit" id="confrm_button" class="btn btn-fill-out btn-block" name="register" onclick="submit_password()">Submit</button>'+
                                '</div>');
				
				
			}
			else
			{
				if($.isEmptyObject(data.errors))
				{
					if(data.type==1)
			        {
			        	$('.invalid-feedback').show();
			        	$('#username_error').html(data.msg);	
			        }
					//error(data.msg);
				}else{
					$('.invalid-feedback').show();
					for(var key in data.errors)
					{
						var v = data.errors[key];
						$('#'+key+'_error').html(v);

					}
				}
			}
		}
	});
	return false;
}
function submit_password()
{
	
	
	$('.invalid-feedback').hide();
	$('.invalid-feedback').html("");
	var base=$('#baseurl').val();
	var token=$('#csrf_token').val();
	var hash=$('#csrf_hash').val();
	

	var lc = new FormData();
	lc.append(token,hash);
	lc.append('user_id',$('#user_id').val());
	lc.append('upassword',$('#upassword').val());
	lc.append('cpassword',$('#cpassword').val());

	$.ajax({
		url : base+'submit_new_password',
		type : 'post',
		data : lc,
		dataType : 'json',
		processData: false,
	    contentType: false,
	    cache: false,
		success:function(data)
		{
			//alert(data);
			
			console.log(data);
			$('#form-btn').show();
			$('#spin').hide();
			if(data.res==1)
			{
				success(data.msg);

				window.location=base+'login';
				
				
			}
			else
			{
				if($.isEmptyObject(data.errors))
				{
					if(data.type==1)
			        {
			        	$('.invalid-feedback').show();
			        	$('#username_error').html(data.msg);	
			        }
					//error(data.msg);
				}else{
					$('.invalid-feedback').show();
					for(var key in data.errors)
					{
						var v = data.errors[key];
						$('#'+key+'_error').html(v);

					}
				}
			}
		}
	});
	return false;
}