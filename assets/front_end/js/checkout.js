$(document).ready(function(){

     $('#address_checkbox').change(function() {
        if(this.checked) {
           $('.shipping-address-div').hide();
                   }
        else
           $('.shipping-address-div').show();        
    });
     $('.final-payment').click(function(){
         $(this).html('<i class="fa fa-spin fa-spinner"></i> Continue');
         $(this).prop('disabled',true);
        var amount = 50.00;
        var base=$('#base').val();
            var token=$('#csrf_token').val();
            var hash=$('#csrf_hash').val();
            var otp=$('#otp').val();
            var lc = new FormData();
            lc.append(token,hash);
            lc.append('amount',amount);
            

            $.ajax({
                url : base+'to-paypal-for-payment',
                type : 'post',
                data : lc,
                dataType : 'json',
                processData: false,
                contentType: false,
                cache: false,
                success:function(data)
                {
                    console.log(data);
                    $(this).show();
                    $('#review-spinner').html('');
                   
                    if(data.res==1)
                    {
                        window.location = data.link.href;
                    }
                    else
                    {
                      error(sata.msg);
                       $(this).html('Checkout');
                      $(this).removeAttr('disabled');
                    }
                    
                }
            });
     })
     $('.continue-review').click(function(){
console.log($('#have_sess').val());
if($('#have_sess').val())
{
         var flag=true;
        $(this).html('<i class="fa fa-spin fa-spinner"></i> Continue');
       $(this).prop('disabled',true);
        if($('#address_id').val()==null || $('#address_id').val()=='')
        {
            error('Please choose shipping address');
            flag=false;
        }
        if($('#bill_address_id').val()==null || $('#bill_address_id').val()=='')
        {
            error('Please choose billing address');
            flag=false;
        }
        if(flag)
        {
            var base=$('#base').val();
            var token=$('#csrf_token').val();
            var hash=$('#csrf_hash').val();
            var otp=$('#otp').val();
            var lc = new FormData();
            lc.append(token,hash);
            lc.append('shipping',$('#address_id').val());
            lc.append('billing',$('#bill_address_id').val());

            $.ajax({
                url : base+'to-review-page',
                type : 'post',
                data : lc,
                dataType : 'json',
                processData: false,
                contentType: false,
                cache: false,
                success:function(data)
                {
                    console.log(data);
                    $(this).show();
                    $('#review-spinner').html('');
                   
                    if(data.res==1)
                    {
                        window.location = base+'checkout-review';
                    }
                    else
                    {
                      
                    }
                }
            });
        }
        else
        {
            $(this).html('Continue');
            $(this).removeAttr('disabled');
        }
    }
    else
    {

        addGuestAddress();
    }
     })
     $('#newshippingAdd').submit(function(){
       
        event.preventDefault();
        var form_data = $("#newshippingAdd").serializeArray();
        var baseurl= $('#base').val();
        $.ajax({
        url : baseurl+'submit-address',
        type : 'post',
        data : form_data,
        dataType : 'json',
        success:function(data)
        {
            console.log(data);
            // $('#form-btn').show();
            // $('.spinner').hide();
            if(data.res==1)
            {
                success(data.msg);
                if($('#add_type').val()==1)
                    $('#address-steps').append(data.newDiv);
                else
                    $('#billing-address-steps').append(data.newDiv);
                 $('#add_type').val(null);
                 $('#addressModal').modal('hide');
            }
            else
            {
                if($.isEmptyObject(data.errors))
                {
                    error(data.msg);
                }
                else
                {
                    console.log(data.errors.length);
                    for(var key in data.errors)
                    {
                        var v = data.errors[key];
                        error(v);

                    }
                }
            }
        }
    });
        return false;
             
    })
    
 })
 $(document).on("click",".ship-here",function() {
    var id = $(this).attr("id");
    $('.shipping-address-div').removeClass('active');
    $('#'+id).addClass('active');
    $('#address_id').val(id);

    })
 $(document).on("click",".bill-here",function() {
    var id = $(this).attr("id");
    $('.billing-address-div').removeClass('active');
    $('#'+id).addClass('active');
    $('#bill_address_id').val(id);

    })
$(document).on("click",".btn-new-address",function() {
    var type = $(this).attr("type");
    $('#addressModal').modal('show');
    
    $('#add_type').val(type);

    })
function addGuestAddress()
{

     var base=$('#base').val();
            var token=$('#csrf_token').val();
            var hash=$('#csrf_hash').val();
            var otp=$('#otp').val();
           
            var lc = $('#guestAddressAdd').serializeArray();
            
            $.ajax({
                url : base+'add-guest-address',
                type : 'post',
                data : lc,
                dataType : 'json',
              
                success:function(data)
                {
                    console.log(data);
                   
                    
                   
                    if(data.res==1)
                    {
                        window.location = base+'checkout-review';
                    }
                    else
                    {
                        if($.isEmptyObject(data.errors))
                        {
                           error(data.msg);
                        }
                        else
                        {
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
    
}
function submit_log()
{
    $('#form-btn').hide();
    $('.spinner').show();
    $('.invalid-feedback').hide();
    $('.invalid-feedback').html("");
    var base = $('#base').val();
    $.ajax({
        url : base+'checkoutLogin',
        type : 'post',
        data : $('#lform').serialize(),
        dataType : 'json',
        success:function(data)
        {
            console.log(data);
            if(data.res==1)
            {
                $('#checkout-steps').hide();
                $('#mainDiv').html(data.address)
            }
            else
            {
                 if($.isEmptyObject(data.errors))
                {
                   error(data.msg);
                }
                else
                {
                    $('.invalid-feedback').show();
                    for(var key in data.errors)
                    {
                        var v = data.errors[key];
                        error(v);

                    }
                }
            }
            

        }
    });
    return false;
}