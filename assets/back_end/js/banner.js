var base = $('#baseurl').val();
$(document).ready(function(){
    $(".reset").click(function() {
        $('#p_form').find("input[type=text]").val("");
        $('#b_id').val("");
    });
    $('#t_charge').focus();

});

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
    var form_data = $('#p_form').serializeArray();
    $.each(form_data, function (key, input)
    {
        data.append(input.name, input.value);
    });

    $.ajax({
        type:'POST',
        url:base+"submit-price",
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

