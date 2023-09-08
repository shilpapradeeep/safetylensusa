var base= $("#base").val();
function lead_submit(val=null)
{
   if(val==1)
   {
        var form_data=$('#lead_submit').serialize();
   }
   else
   {
        var form_data=$('#lead_submit1').serialize();
         $(".nl_btn").html('<i class="fa fa-spin fa-spinner"></i>');
        $(".nl_btn").attr('disabled',true);
   }
	$.ajax({
        url : base+'lead-submit',
        type : 'post',
        data : form_data,
        dataType : 'json',
        success:function(data)
        {
        	
        	if(data.res==1)
        	{
                if(val==1)
                {
                    success(data.msg);
                }
                else
                {
                    $(".nl_btn").html('Submit');
                    $(".nl_btn").attr('disabled',false);
                    success(data.msg);
                $(".subscribe_popup").removeClass("show");
                //$("#onload-popup").hide();
                window.location.reload();
                }
        		
        	}
        	else
        	{

                if(val==1)
                {
                    if($.isEmptyObject(data.errors))
                    {
                        error(data.msg);
                    }
                    else
                    {
                        
                        //$('.validation-error').show();
                        for(var key in data.errors)
                        {

                            error(data.errors[key]);

                        }
                    }
                }
                else
                {
                    $(".nl_btn").html('Submit');
                    $(".nl_btn").attr('disabled',false);

                    if($.isEmptyObject(data.errors))
                    {
                        error(data.msg);
                    }
                    else
                    {
                        $('.validation-error').show();
                        for(var key in data.errors)
                        {
                            //console.log(key);
                            var v = data.errors[key];
                            error(v);
                            //$('#lead_phone_error').html(v);

                        }
                    }
                }
        		
        	}
        }
    });
	return false;
}


function close_lead_modal()
{
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
	$.ajax({
        url : base+'lead-submit-close',
        type : 'post',
        dataType : 'json',
        data : {[csrfName]: csrfHash},
        success:function(data)
        {
        }
    });
	return false;
}
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	   return false;

	return true;
}
function success(msg)
{
  	iziToast.show({
                    id:'',
                    color: 'green', // blue, red, green, yellow
                    title: 'Well done',
                    message: msg,
                    transitionInMobile: 'fadeInUp',

                });
}
function error(msg)
{
  	iziToast.show({
                    id:'',
                    color: 'red', // blue, red, green, yellow
                    title: 'Sorry',
                    message: msg,
                    transitionInMobile: 'fadeInUp',

                });
}
function warning(msg)
{
  	iziToast.show({
                    id:'',
                    color: 'yellow', // blue, red, green, yellow
                    title: 'Warning',
                    message: msg,
                    transitionInMobile: 'fadeInUp',

                });
}
function all_product()
{
    window.location.href=base+"all-products";
}
function ajax_search(id)
{
    $(".lst").html('');
    $(".spin").show();
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append("cus_sel",$("#cus_sel").val());
    form_data.append("src_c_id",$("#src_c_id"+id).val());
    jQuery.ajax({
      url: base+'product-load-ajax',
      method: 'post',
      data : form_data,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (data)
    {
        $(".spin").hide();
       $(".pg").hide();
      $(".lst").html(data);

      
    }).fail(function (){
        warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
    return false;
}
function close_lead_modal()
{
     $(".lst").html('');
    $(".spin").show();
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    jQuery.ajax({
      url: base+'lead-submit-close',
      method: 'post',
      data : form_data,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (data)
    {
    

      
    }).fail(function (){
        warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
    return false;
}