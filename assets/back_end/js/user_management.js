
$(document).ready(function(){
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
		url : base+'user-management-view',
		type : 'post',
		data : form_data,
		dataType:'json',
		cache: false,
		contentType: false,
		processData: false,
	}).done(function (data){
		if (data.res==1) { 
			$('#firstname').html(data.data[0].m_name);
			$('#lastname').html(data.data[0].m_lname);
			$('#email').html(data.data[0].m_email);
			$('#phone').html(data.data[0].m_phone);
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
			url : base+'delete-user',
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

