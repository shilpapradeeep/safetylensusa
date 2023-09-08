var base = $('#baseurl').val();
$(document).ready(function(){
    $('#pr_name').focus();
   
    $(".add-more").click(function(){
        var new_count = $('#vcount').val( ( Number($('#vcount').val()) + Number(1) ) );
        $('#variation_array').val(getCookie('variation_array'));
        var form_data = new FormData();
        var csrfName = $('#csrf_token').val();
        var csrfHash = $('#csrf_hash').val();
        form_data.append(csrfName,csrfHash);

        $.ajax({
            type:'POST',
            url: base+"add_more_variation",
            data:form_data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (html)
        {
            $(".after-add-more").before(html);
            $('.select2').select2({
                minimumResultsForSearch: ''
            });
        }).fail(function () {
            $('.btn-div').show();
            $('#spinner').hide();
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');

        });

    });
    $(".reset").click(function() {
        $('#product_form').find("input[type=text],input[type=number],textarea").val("");
        $("#p_d_desc").summernote("reset");
        $('.card_img').remove();
        $('.dropify-clear').trigger('click');
        $('#product_form').find("input[type=checkbox]").prop('checked', false);
    });
    $("body").on("click",".remove",function(){
        $(this).parents(".control-group").remove();
        var new_count = $('#vcount').val( ( Number($('#vcount').val()) - Number(1) ) );
    });

    if($('#pr_cat_id_edit').val())
    {
        get_category($('#pr_cat_id_edit').val());
    }
    else
    {
        get_category();
    }
    if($('#pr_brand_edit').val())
    {
        get_brand($('#pr_brand_edit').val());
    }
    else
    {
        get_brand();
    }
    if($('#pr_style_edit').val())
    {
        get_style($('#pr_style_edit').val());
    }
    else
    {
        get_style();
    }
    $('.select2').select2({
        minimumResultsForSearch: ''
    });

    if ($('#urisegment1').val() == "list-product") 
    {
    	list();
    }
    
    if ($('#urisegment1').val() == "view-product") 
    {
      view_datails();
    }
    // ***********edit ****************//
    if($('#pr_featured_edit').val() != '2')
    {
        ('#pr_featured').click();
    }
    if($('#pr_popular_edit').val() != '2')
    {
        ('#pr_popular').click();
    }
    if($('#pr_latest_edit').val() != '2')
    {
        ('#pr_latest').click();
    }
    if($('#pr_most_selling_edit').val() != '2')
    {
        ('#pr_most_selling').click();
    }
   
   
});

function image_upload(img_id,hdn_id,count_id)
{
    if(parseInt($('#count_limt').val())<5)
    {
          
          $('.btn-div').hide();
          $('#spin').show();
          $('#spin_1').show();
          var img = document.getElementById(img_id);
          var count = $('#'+count_id).val();
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
            $('#spin_1').hide();
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
            $('#spin_1').hide();
            if (response.res == 1) 
            {  
              var fileName = response.name;
              $("#"+hdn_id).val(fileName);
              success('Image Uploaded.');
              ap += '<div class="col-md-4 col-xl-2 text-center img_crd_'+count+' card_img">';
              ap += '<div class="p-1 mt-1 ml-1" style="border:1px solid #f5f5f5">'
              ap += '<input type="hidden" name="product_galary_img_temp'+count+'" id="product_galary_img_temp'+count+'" value="'+fileName+'">';
              ap += '<img src="'+response.full_path+'" alt="product-img" title="product-img" class="avatar-xl" />';
              ap += '<a class="btn btn-danger remove_img_btn text-white" style="position:absolute; margin:-3px 0px 0px -13px;" onclick=remove_class("img_crd_'+count+'")><i class="fa fa-trash"></i></a>'
              ap += '</div>'
              ap += '</div>'
              $('#gi_view').append(ap);
              $('#'+count_id).val(parseInt($('#'+count_id).val())+1);
            } 
            else 
            {          
              $("#"+hdn_id).val('');
            }
          }).fail(function (){     
          	$('.btn-div').show();
            $('#spin').hide();        
            $('#spin_1').hide();        
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            $('.dropify-preview').hide();
            $('.dropify-filename-inner').html(''); 
          });
        var cl = parseInt($('#count_limt').val())+1;
        $('#count_limt').val(cl);
    }
    else
    {
        error('You can upload only 5 images!');
    }
  
}
function get_category(id=null)
{
    $('#cat_spin').html('<i class="fa fa-1x fa-spin fa-spinner"></i>');
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    $.ajax({
        type:'POST',
        url:base+"get-category-data",
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
        data:form_data,
        success:function(data)
        {
            var tl = data.data;
            $('#cat_spin').html('');
            $('#pr_category').html('<option value="">select</option>');
            if(!$.isEmptyObject(tl))
            {
                tl.forEach(function(element) {
                    if(!$.isEmptyObject(id) && id==element['id'])
                        $('#pr_category').append('<option selected value="'+element['id']+'">'+element['name']+'</option>')
                    else
                        $('#pr_category').append('<option  value="'+element['id']+'">'+element['name']+'</option>');

                });
            }


        }
    });
}
function get_brand(id=null)
{
    $('#brand_spin').html('<i class="fa fa-1x fa-spin fa-spinner"></i>');
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    $.ajax({
        type:'POST',
        url:base+"get-brand-data",
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
        data:form_data,
        success:function(data)
        {
            var tl = data.data;
            $('#brand_spin').html('');
            $('#pr_brand').html('<option value="">select</option>');
            if(!$.isEmptyObject(tl))
            {
                tl.forEach(function(element) {
                    if(!$.isEmptyObject(id) && id==element['id'])
                        $('#pr_brand').append('<option selected value="'+element['id']+'">'+element['name']+'</option>')
                    else
                        $('#pr_brand').append('<option  value="'+element['id']+'">'+element['name']+'</option>');

                });
            }


        }
    });
}

function remove_class(rc)
{
	$("."+rc).remove();
	var cl = parseInt($('#count_limt').val())-1;
    $('#count_limt').val(cl);
}

$('#pr_selling_price').change(function(){
	if (!$.isEmptyObject($("#pr_mrp").val()) && !$.isEmptyObject($("#pr_selling_price").val()))
	{
		discount_cal();
	}
})

$('#pr_mrp').change(function(){
	if (!$.isEmptyObject($("#pr_mrp").val()) && !$.isEmptyObject($("#pr_selling_price").val()))
	{
		discount_cal();
	}
})

function discount_cal()
{
 // alert("");
    var cp=parseFloat(0.0);
    var sp=parseFloat(0.0);
     var x =0;
    cp=$("#pr_mrp").val();
    sp=$("#pr_selling_price").val();
    
    if(cp==0)
     {
        x=0;
     }
     else
     {
        x =parseFloat(100-((sp / cp)*100));
     }
     if(parseFloat(x)<0)
     {
        // error(2,"Percentage Cannot be able to calculate in negative value");
        $("#discount").val(0);
     }
     else
     {
      var num=parseFloat(x);
       $("#discount").val(num.toFixed(2));
     }
    
}


function get_style(id=null)
{

    $('#style_spin').html('<i class="fa fa-1x fa-spin fa-spinner"></i>');
	var form_data = new FormData();
	var csrfName = $('#csrf_token').val();
	var csrfHash = $('#csrf_hash').val();
	form_data.append(csrfName,csrfHash);
	$.ajax({
	    type:'POST',
	    url:base+"get-style-data",
	    dataType:'json',
	    cache: false,
	    contentType: false,
	    processData: false,
	    data:form_data,
	    success:function(data)
	    {
	        var tl = data.data;
            $('#style_spin').html('');
	        $('#pr_style').html('<option value="">select</option>');
	        if(!$.isEmptyObject(tl))
	        {
	            tl.forEach(function(element) {
	                if(!$.isEmptyObject(id) && id==element['id'])
	                    $('#pr_style').append('<option selected value="'+element['id']+'">'+element['name']+'</option>')
	                else
	                    $('#pr_style').append('<option  value="'+element['id']+'">'+element['name']+'</option>');
	                
	            });
	            $('#sub_cat_spin').hide();
	        }
	        else
	        {
	            $('#sub_cat_spin').hide();
	            error('Style not available');
	        }
	    }
	});
}

function product_submit_form()
{
	$('.btn-div').hide();
    $('#spin').show();
    $('.validation-error').html("");
	var data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    data.append(csrfName,csrfHash);
    data.append('pr_d_desc',$('#pr_d_desc').summernote('code'));
    //Form data
    var form_data = $('#product_form').serializeArray();
    $.each(form_data, function (key, input) 
    {
        data.append(input.name, input.value);
    });
    
    $.ajax({
    type:'POST',
    url:base+"submit-product",
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
            setInterval(function(){ window.location.href=base+'list-product'; }, 2000);
        }       
        else
        {
            error('Please fill the required fields');
            if($.isEmptyObject(data.errors))
            {
                error(data.msg);
            }
            else
            {
            	if ($.isEmptyObject(data.img_error)) 
            	{
            		$('#product_galary_img_error').html(data.img_error);
            	}
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



function delete_product(id)
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
                url: base+'delete-product',
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

/*function edit_data(id)
{
 	var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',id);
    jQuery.ajax({
        url: base+'edit-product-data',
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
                console.log(d);
                $('#pr_name').val(d.pr_title);
                $('#pr_mrp').val(d.pr_mrp);
                $('#pr_selling_price').val(d.pr_selling_price);
                if(d.pr_discount != "" || d.pr_discount != " " )
                {
                    $('#discount_check').prop('checked', true);
                    $('#view_discount').css('display','block');
                }
                $('#discount').val(d.pr_discount);
                $('#pr_s_desc').val(d.pr_tiny_description);
                $('#pr_terms').val(d.pr_terms_and_conditions);
                $('#pr_d_desc').summernote('pasteHTML', d.pr_detailed_description);
                if (d.pr_is_featured == '1') 
                {
                	$('#pr_featured').prop('checked', true);
                }
                else
                {
                	$('#pr_featured').prop('checked', false);
                }
                if (d.pr_popular == 1) 
                {
                	$('#pr_popular').prop('checked', true);
                }
                else 
                {
                	$('#pr_popular').prop('checked', false);
                }
                if (d.pr_latest == 1) 
                {
                	$('#pr_latest').prop('checked', true);
                }
                else
                {
                	$('#pr_latest').prop('checked', false);
                }
                if (d.pr_most_selling == 1) 
                {
                	$('#pr_most_selling').prop('checked', true);
                }
                else
                {
                	$('#pr_most_selling').prop('checked', false);
                }
                get_category(d.pr_cat_id);
                get_sub_cetegory(d.pr_cat_id,d.pr_sub_cat_id);
                
                

                $('.select2').select2({
			        minimumResultsForSearch: ''
			    });

                for (var i = 0; i < d.pr_gallery_image.length; i++) 
                {
                	var a = i + 1;
                	
                	ap += '<div class="col-md-4 col-xl-2 text-center img_crd_'+a+' card_img">';
        					ap += '<div class="p-1 mt-1 ml-1" style="border:1px solid #f5f5f5">'
        					ap += '<input type="hidden" name="product_galary_img_temp'+a+'" id="product_galary_img_temp'+a+'" value="'+d.pr_gallery_image_val[i]+'">';
        					ap += '<img src="'+d.pr_gallery_image[i]+'" alt="product-img" title="product-img" class="avatar-xl" />';
        					ap += '<a class="btn btn-danger remove_img_btn text-white" style="position:absolute; margin:-3px 0px 0px -13px;" onclick=remove_class("img_crd_'+a+'")><i class="fa fa-trash"></i></a>'
        					ap += '</div>'
        					ap += '</div>'
                	
                }
                $('#gi_view').append(ap);
				$('#count').val(d.pr_gallery_image.length+1);
				$('#count_limt').val(d.pr_gallery_image.length);


            }
            else
            {
                error(data.msg);
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}*/

function list()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'list-product-tbl',
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

function view_datails()
{
    $('#detailed-view').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',$('#pid').val());

    $.ajax({
        url : base+'view-product-data',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
            $('#detailed-view').html(data);   
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
}