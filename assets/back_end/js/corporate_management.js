
$(document).ready(function(){
});


$(document).on( "submit", "#member_amount_form", function() { 
   $('.validation-error').html('');
   var base = $('#baseurl').val();
   var form_data = $('#member_amount_form').serialize();
 
   	$.ajax({
		url : base+'corporate-management-amount-action',
		type : 'post',
		data : form_data,
		dataType:'json',
	}).done(function (data){
		if (data.res==1) { 
          success(data.msg)
		}else{

			if($.isEmptyObject(data.errors))
			{
				error(data.msg);
			}else{

				for(var key in data.errors)
				{
					var v = data.errors[key];
					$('#'+key+'_error').html(v);

				}
			}

		}

	}).fail(function (){

		warning('Oops! Something Went Wrong. Please try again later or Contact admin');

	});
  


  return false;
 });


$(document).on( "click", ".viewdetail", function() {

	var id = $(this).attr('fet');
	var form_data = new FormData();
	var base = $('#baseurl').val();
	var csrfName = $('#csrf_token').val();
	var csrfHash = $('#csrf_hash').val();
	form_data.append(csrfName,csrfHash);
	form_data.append('id',id);
	$.ajax({
		url : base+'corporate-management-view',
		type : 'post',
		data : form_data,
		dataType:'json',
		cache: false,
		contentType: false,
		processData: false,
	}).done(function (data){
		if (data.res==1) { 
			$('#memberId').val(data.data[0].m_id);
			$('#firstname').html(data.data[0].m_name);
			$('#lastname').html(data.data[0].m_lname);
			$('#email').html(data.data[0].m_email);
			$('#phone').html(data.data[0].m_phone);
			$('#m_amount').val(data.data[0].m_amount);
			$('[name=m_credit_balance]').val( data.data[0].m_credit_balance )
			$(".modal").modal("toggle");
		}else{
			error(data.msg);
		}

	}).fail(function (){

		warning('Oops! Something Went Wrong. Please try again later or Contact admin');

	});

});


$(document).on( "click", ".deleteuser", function() { 

	var id = $(this).attr('fet');
	var form_data = new FormData();
	var base = $('#baseurl').val();
	var csrfName = $('#csrf_token').val();
	var csrfHash = $('#csrf_hash').val();

	if(confirm("Are you sure you want to delete this?"))
	{
		form_data.append(csrfName,csrfHash);
		form_data.append('id',id);
		$.ajax({
			url : base+'delete-corporate',
			type : 'post',
			data : form_data,
			dataType:'json',
			cache: false,
			contentType: false,
			processData: false,
		}).done(function (data){
			if (data.res==1) { 
				$('#tr_'+id).remove();
				success(data.msg)
			}else{
				error(data.msg);
			}

		}).fail(function (){

			warning('Oops! Something Went Wrong. Please try again later or Contact admin');

		});

	}
	else
	{
		return false;
	}

});

