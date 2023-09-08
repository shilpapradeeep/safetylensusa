var base = $('#baseurl').val();
$(document).ready(function(){
    $('#otp').change(function(){
        otp();
    })
    otp_defalut();
});
function otp()
{
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    var daata = $('#otp_form').serializeArray();
    $.each(daata, function (key, input) 
    {
        form_data.append(input.name, input.value);
    });
    
    jQuery.ajax({
        url: base+'otp-active',
        method: 'post',
        data : form_data,
        dataType : "json",
        cache: false,
        contentType: false,
        processData: false,
        }).done(function (data){
            if(data.res==1)
            {
                success(data.msg);
            }
            else
            {
                success(data.msg);
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}
function otp_defalut()
{
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    
    jQuery.ajax({
        url: base+'otp-default',
        method: 'post',
        data : form_data,
        dataType : "json",
        cache: false,
        contentType: false,
        processData: false,
        }).done(function (data){
            if(data.res==1)
            {
                d=data.data[0];
               
                if (d.lo_status == '1') 
                {
                    $('#otp').prop('checked', true);
                }
                else
                {
                    $('#otp').prop('checked', false);
                }
            }
            else
            {
                success(data.msg);
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}