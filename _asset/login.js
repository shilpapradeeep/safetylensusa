function submit_log()
{
	$('#form-btn').hide();
	$('.spinner').show();
	$('.invalid-feedback').hide();
	$('.invalid-feedback').html("");
	var base = $('#baseurl').val();
	$.ajax({
		url : base+'submit_login',
		type : 'post',
		data : $('#lform').serialize(),
		dataType : 'json',
		success:function(data)
		{
			console.log(data);
			$('#form-btn').show();
			$('.spinner').hide();
			if(data.res==1)
			{
				
				if(data.type==1)
				{

					window.location=base+'dashboard';
				}
				else if(data.type==2)
				{

					window.location=base+'account';
				}

				
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