var base = $('#baseurl').val();
$(document).ready(function(){

    if ($('#urisegment1').val() == "cart-list") 
    {
        list();
    }
    else if ($('#urisegment1').val() == "cart-details") 
    {
        list_single();
        console.log($('#grand_total').val());
        $('#gt').html();
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

    $.ajax({
        url : base+'list-cart-tbl',
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

function list_single()
{
    $('#cart_view').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',$('#cr_l_id').val());

    $.ajax({
        url : base+'cart-details-data',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
            $('#cart_view').html(data);   
            
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
}

function get_total(qty,price,view,v)
{
    var x = $('#'+qty).val() * price;
    var t = 0;
    
    $('#'+view).html(x);
    $('#'+v).val(x);
    var c = $('#key_count').val();
    for (var i = 0; i < c; i++) {
        z = i+1;
        t = t + parseInt($('#total_price_'+z).val());
    }
    
    $('#gt').html(t);
    $('#total').html(t);
}

function delete_single_cart(pr_id,cr_l_id)
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
            form_data.append('pr_id',pr_id);
            form_data.append('cr_l_id',cr_l_id);
            jQuery.ajax({
                url: base+'delete-single-cart',
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
                        list_single();
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

function delete_cart(cr_l_id)
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
            form_data.append('cr_l_id',cr_l_id);
            jQuery.ajax({
                url: base+'delete-cart',
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
