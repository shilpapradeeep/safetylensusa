var base = $('#baseurl').val();
$(document).ready(function(){
	$(".reset").click(function() {
		$('#b_form').find("input[type=text]").val("");
		$('#b_id').val("");
		$("#b_content").summernote("reset");
		$('.dropify-clear').trigger('click');
	});
    $('#b_title').focus();
    list();
	    
});
function image_upload(img_id,hdn_id)
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
            success('Image Uploaded.');
            var fileName = response.name;
            $("#"+hdn_id).val(fileName);
        }
        else
        {
            warning('Oops! Something Went Wrong. Please try again later.');
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

function form_submit()
{
	$('.btn-div').hide();
    $('#spin').show();
    $('.validation-error').html("");
	var data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    data.append(csrfName,csrfHash);
    //Form data
    var form_data = $('#b_form').serializeArray();
    $.each(form_data, function (key, input) 
    {
        data.append(input.name, input.value);
    });
    
    $.ajax({
    type:'POST',
    url:base+"submit-brand",
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
        url : base+'list-brand',
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

function edit_brand(id)
{
    $('#change_title').html('Edit');
    $('.submit').html('Edit');
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',id);
    jQuery.ajax({
        url: base+'edit-brand-data',
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
                var ap = "";
                d=data.data;
                // console.log(d);
                $('#b_id').val(d.b_id);
                $('#b_title').val(d.b_title);
                $('#b_seo_title').val(d.b_seo_title);
                $('#b_seo_description').html(d.b_seo_description);
                $('#b_gender_type').val(d.b_gender);


                $('#b_logo_temp').val(d.b_brand_logo);
                $("#b-logo .dropify-wrapper").addClass("has-preview");
                $("#b-logo .dropify-preview").attr('style','display:block');
                $("#b-logo .dropify-preview").html('<span class="dropify-render"><img src="'+d.b_brand_logo_full+'"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner">'+d.b_brand_logo+'</span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div>');

                $('#b_img_temp').val(d.b_brand_img);
                $("#b-img .dropify-wrapper").addClass("has-preview");
                $("#b-img .dropify-preview").attr('style','display:block');
                $("#b-img .dropify-preview").html('<span class="dropify-render"><img src="'+d.b_brand_img_full+'"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner">'+d.b_brand_img+'</span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div>');


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

function delete_brand(id)
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
                url: base+'delete-brand',
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
