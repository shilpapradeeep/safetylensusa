var base = $('#baseurl').val();
$(document).ready(function(){
	$(".reset").click(function() {
		$('#iform').find("input[type=text],textarea").val("");
       

		$('#main-title').html('New Category');
        $('#btn-save').html('Submit');
        $("#h_id").val('');
        list_tb();
        
	});
    
    list_tb();
    
});
function submit_category()
{

    $('.btn-div').hide();
    $('#spinner').show();
    $('.validation-error').hide();
    $('.validation-error').html("");
    
    $.ajax({
        url : base+'submit_category',
        type : 'post',
        data : $('#cform').serialize(),
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
  
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'category_tbl',
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
    url:base+"get-category",
    cache: false,
    contentType: false,
    processData: false,
    data:form_data
    }).done(function (data)
    {  
        if(data.res==1)
        {
            $('#main-title').html('Edit Category');
            $('#btn-save').html('Edit');
            var f_data = data.form_data;
            $('#h_id').val(f_data['c_id']);
            $('#cname').val(f_data['c_title']);
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
    
    delete_field(id,'delete-category');
    
 
}