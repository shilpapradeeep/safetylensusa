var base = $('#baseurl').val();
$(document).ready(function(){
   
    list();
    


   
});




function delete_review(id)
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
                url: base+'delete-productReview',
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

function list()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'product-review-tbl',
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