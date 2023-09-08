var base = $('#baseurl').val();
$(document).ready(function(){
	$(".reset").click(function() {
		$('#media_form').find("input[type=text]").val("");
		$('#m_id').val("");
		$('.dropify-clear').trigger('click');
		$('.card_img').remove();
		get_media_type();
		$('#max_file').val("0");
        $('#file_height').val("0");
        $('#file_width').val("0");
        $('#f_size_v').html("");
	});
    list();
    get_media_type();

    $('#m_type').change(function()
    {
    	var v = $(this).val();
    	get_details_media_type(v);
    })

    $('.select2').select2({
        minimumResultsForSearch: ''
    });
    
    $('.dropify-clear').click(function(){
        $('.dropify-preview').hide();
		$('.dropify-filename-inner').html(''); 
		$("#media_img_temp").val('');
    });

    var _URL = window.URL || window.webkitURL;

	$("#media-img").change(function(e) {
	    var file, img;


	    if ((file = this.files[0])) {
	        img = new Image();
	        img.onload = function() {
	            
	            // onchange="image_upload('media-img','blog_img_temp','max_file')"
	            if ($('#file_width').val() != '0' && $('#file_height').val() != '0') 
	            {
	            	var wid = this.width;
	            	var hgt = this.height;
	            	if (wid == parseInt($('#file_width').val()) && hgt == parseInt($('#file_height').val())) 
		            {
		            	image_upload('media-img','media_img_temp','max_file');
		            }
		            else
		            {
		            	error('File Width and height not match.');
		            	$('.dropify-preview').hide();
						$('.dropify-filename-inner').html(''); 
						$('dropify-clear').trigger('click');
						$("#media_img_temp").val('');
		            }
	            }
	            else
	            {
	            	error('Please select Media Type.');
	            	$('.dropify-preview').hide();
					$('.dropify-filename-inner').html('');
					$("#media_img_temp").val('');
	            }
	            
	            
	        };
	        img.onerror = function() {
	            alert( "not a valid file: " + file.type);
	        };
	        img.src = _URL.createObjectURL(file);
        
            
	    }

	});
	    
});

function get_media_type(id=null)
{
	var form_data = new FormData();
	var csrfName = $('#csrf_token').val();
	var csrfHash = $('#csrf_hash').val();
	form_data.append(csrfName,csrfHash);
	$.ajax({
	    type:'POST',
	    url:base+"get-media-type",
	    dataType:'json',
	    cache: false,
	    contentType: false,
	    processData: false,
	    data:form_data,
	    success:function(data)
	    {
	        var tl = data.data;
	   
	        $('#m_type').html('<option value="">select</option>');
	        if(!$.isEmptyObject(tl))
	        {
	            tl.forEach(function(element) {
	                if(!$.isEmptyObject(id) && id==element['id'])
	                    $('#m_type').append('<option selected value="'+element['id']+'">'+element['name']+'</option>')
	                else
	                    $('#m_type').append('<option  value="'+element['id']+'">'+element['name']+'</option>');
	                
	            });
	        }
	   
	    }
	});
}

function get_details_media_type(id)
{
	var form_data = new FormData();
	var csrfName = $('#csrf_token').val();
	var csrfHash = $('#csrf_hash').val();
	form_data.append(csrfName,csrfHash);
	form_data.append('id',id);
	$.ajax({
	    type:'POST',
	    url:base+"get-media-type-data",
	    dataType:'json',
	    cache: false,
	    contentType: false,
	    processData: false,
	    data:form_data,
	    success:function(data)
	    {
	        var d = data.data;
	   		if (data.res == '1') 
	   		{
	   			$('#max_file').val(d.mt_max_file);
		        $('#file_height').val(d.mt_height);
		        $('#file_width').val(d.mt_width);
		        $('#f_size_v').html('( '+ d.mt_width +'X'+ d.mt_height +' )');
	   		}
	   		if(!$.isEmptyObject(data.data1))
	   		{
	   			$('#c_f_c').val(data.data1);
	   		}
	        
	   
	    }
	});
}


function image_upload(img_id,hdn_id,max_file_c)
{
	var current_file_c = parseInt($('#c_f_c').val());
	var max_file_c = parseInt($('#'+max_file_c).val());
	if (current_file_c<max_file_c) 
	{

		$('.btn-div').hide();
		$('#spin').show();
		var img = document.getElementById(img_id);
		var name = img.files[0].name;
		var ap = "";
		var form_data = new FormData();
		var ext = name.split('.').pop().toLowerCase();
		if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
		{
			error('Invalid Image File.');
		}
		var oFReader = new FileReader();
		oFReader.readAsDataURL(img.files[0]);
		var f = img.files[0];
		var fsize = f.size||f.fileSize;
		if(fsize >= 2000000)
		{
			$('.btn-div').show();
			$('#spin').hide();
			error('Image File Size is very big.');
		}
		else
		{
			form_data.append(img_id, img.files[0]);
		}
		var csrfName = $('#csrf_token').val();
		var csrfHash = $('#csrf_hash').val();
		form_data.append(csrfName,csrfHash);
		form_data.append("file_name",img_id);
		form_data.append("f_height",$('#file_height').val());
		form_data.append("f_width",$('#file_width').val());
		$.ajax({
			url : base+'img-upload',
			type : 'post',
			data : form_data,
			cache: false,
			contentType: false,
			processData: false,
			dataType : 'json',
		}).done(function (response)
		{
		$('.btn-div').show();
		$('#spin').hide();
		if (response.res == 1) 
		{  
		  var fileName = response.name;
		  $("#"+hdn_id).val(fileName);
		  success('Image Uploaded.');
		  $('#c_f_c').val(parseInt($('#c_f_c').val())+1);
		} 
		else 
		{          
		  $("#"+hdn_id).val('');
		}
		}).fail(function (){     
			$('.btn-div').show();
			$('#spin').hide();        
			warning('Oops! Something Went Wrong. Please try again later or Contact admin');
			$('.dropify-preview').hide();
			$('.dropify-filename-inner').html(''); 
		});
	}
	else
	{
		error('Oops! You exide this media type limit.');
		$('.dropify-preview').hide();
		$('.dropify-filename-inner').html('');
	}
  
}

function remove_class(rc)
{
	$("."+rc).remove();
	$('#c_f_c').val(parseInt($('#c_f_c').val())-1);
}

function media_submit_form()
{
	$('.btn-div').hide();
    $('#spin').show();
    $('.validation-error').html("");
	var data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    data.append(csrfName,csrfHash);
    //Form data
    var form_data = $('#media_form').serializeArray();
    $.each(form_data, function (key, input) 
    {
        data.append(input.name, input.value);
    });
    
    $.ajax({
    type:'POST',
    url:base+"media-submit",
    dataType:'json',
    data:data,
    chach:false,
    contentType:false,
    processData:false
    }).done(function(data)
    {  
      $('.btn-div').show();
      $('#spin').hide();
        if(data.res==1)
        {
            success(data.msg);
            $('.reset').trigger('click');
            list();
            $('#change_title').html('Add');
    		$('.submit').html('Submit');
        }       
        else
        {
            if($.isEmptyObject(data.errors))
            {
                error(data.msg);
            }
            else
            {
                validation_error_fun(data.errors);
            }
        }
         
    }).fail(function () {
    	$('.btn-div').show();
    	$('#spin').hide();
        warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    return false;
}


function list()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'list-media',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
            $('#list-viewed').html(data);   
             var table = $('#example').DataTable({
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf','colvis' ]
             });
             table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' ); 
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
}

function delete_media(id)
{
  	swal({
            title: "Alert",
            text: "Do you really want to delete",
            type: "warning",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF0000',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Exit'
        },
        function(isConfirm){
          if (isConfirm) {
            var base = $('#baseurl').val();
            var form_data = new FormData();
            var csrfName = $('#csrf_token').val();
            var csrfHash = $('#csrf_hash').val();
            form_data.append(csrfName,csrfHash);
            form_data.append('id',id);
            jQuery.ajax({
                url: base+'delete-media',
                method: 'post',
                data : form_data,
                dataType : "json",
                cache: false,
                contentType: false,
                processData: false,
                }).done(function (data){
                    console.log(data)
                    if(data.res==1)
                    {
                        success(data.msg);
                        list();
                    }
                    else
                    {
                        error(data.msg);
                    }
                    
                }).fail(function (){
                    warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
                });
          } 
          else 
          {
            warning("Cancelled");
          }
        });
}


function edit_media(id)
{
 	var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',id);
    jQuery.ajax({
        url: base+'edit-media',
        method: 'post',
        data : form_data,
        dataType : "json",
        cache: false,
        contentType: false,
        processData: false,
        }).done(function (data){
            if(data.res==1)
            {
            	var ap = "";
                d=data.data;
                get_media_type(d.m_type);
                $('#m_url').val(d.m_file_link);
                $('#file_width').val(d.mt_width);
                $('#file_height').val(d.mt_height);
                $('#max_file').val(d.mt_max_file);
                $('#m_id').val(d.m_id);

			    $('#f_size_v').html('( '+ d.mt_width +'X'+ d.mt_height +' )');
			    $('.select2').select2({
			        minimumResultsForSearch: ''
			    });

			    $('#media_img_temp').val(d.img);
                
                $("#nn .dropify-wrapper").addClass("has-preview");
                $("#nn .dropify-preview").attr('style','display:block');
                $("#nn .dropify-preview").html('<span class="dropify-render"><img src="'+d.img_path+'"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner">'+d.img+'</span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div>');
                window.scrollTo(500, 0);
            }
            else
            {
                error(data.msg);
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}