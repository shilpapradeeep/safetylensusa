var base = $('#baseurl').val();
$(document).ready(function(){
    
    if ($('#urisegment1').val() == 'order-details') 
    {
        order_details();       
    }
    else
    {
        list();
    }
    
});

function list()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('type',$('#urisegment1').val());

    $.ajax({
        url : base+'list-order-tbl',
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

function order_details()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',$('#i_id').val());

    $.ajax({
        url : base+'order-details-data',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
            $('#list-viewed').html(data);
            $('.select2').select2({
                minimumResultsForSearch: ''
            });
            $('#deliver_status').change(function(){
                var form_data = new FormData();
                var base = $('#baseurl').val();
                var csrfName = $('#csrf_token').val();
                var csrfHash = $('#csrf_hash').val();
                form_data.append(csrfName,csrfHash);
                form_data.append('id',$('#i_id').val());
                form_data.append('d_s',$('#deliver_status').val());

                $.ajax({
                    url : base+'order-status-change',
                    type : 'post',
                    data : form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:'json',
                }).done(function (data){
                    console.log(data);
                        if(data.res==1)
                        {
                            success(data.msg);
                            order_details();
                        }       
                        else
                        {
                            error(data.msg);
                        }

                }).fail(function (){
                        
                        warning('Oops! Something Went Wrong. Please try again later or Contact admin');
                        
                });
            })

    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
}