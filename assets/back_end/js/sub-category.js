var base = $('#baseurl').val();
$(document).ready(function(){
$(".reset").click(function() {
	$('#sform').find("input[type=text],textarea").val("");
    $('#main-title').html('New Sub Category');
    $('#btn-save').html('Submit');
    $("#h_id").val('');
    fill_category('category');
    //list_tb();
        
});
    fill_category('category');
    list_tb();
    
});
function submit_sub_category()
{

    $('.btn-div').hide();
    $('#spinner').show();
    $('.validation-error').hide();
    $('.validation-error').html("");
    
    $.ajax({
        url : base+'submit_sub_category',
        type : 'post',
        data : $('#sform').serialize(),
        dataType : 'json',
        success:function(data)
        {
            console.log(data);
            $('.btn-div').show();
            $('#spinner').hide();
            if(data.res==1)
            {
                $('.reset').trigger('click');
                success(data.msg);
                list_tb();
                 
                
            }
            else
            {
                if($.isEmptyObject(data.errors))
                {
                    error(data.msg);
                }else{
                    $('.validation-error').show();
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

function list_tb()
{
    page=1;
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'sub_category_tbl',
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
function e_dit(id)
{
    
    var base = $('#baseurl').val();
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',id);

    $.ajax({
    type:'POST',
    dataType:'json',
    url:base+"get-sub-category",
    cache: false,
    contentType: false,
    processData: false,
    data:form_data
    }).done(function (data)
    {  
        if(data.res==1)
        {
            $('#main-title').html('Edit Sub Category');
            $('#btn-save').html('Edit');
            var f_data = data.form_data;
            $('#h_id').val(f_data['sb_id']);
            fill_category('category',f_data['sb_cat_id']);
            $('#sub_category').val(f_data['sb_title']);
            window.scrollTo(500, 0);
         }
        else
        {
            warning(data.msg);
        }
   }).fail(function () {
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    
}
function d_elete(id)
{
  
    delete_field(id,'delete-sub-category');
 
}