var base = $('#baseurl').val();
$(document).ready(function(){
    lead_data();
    list();
   $('#lead').change(function(){
        lead();
        var checked=this.checked;
        if(checked==true)
        {
            $('.lead_fields').show();
            
        }
        else
        {
            $('.lead_fields').hide();
        }
        
    })
    $('#name').change(function(){
        name();
    })
    $('#email').change(function(){
        email();
    })
    $('#phone').change(function(){
        phone();
    })
    
   
});

function lead_data()
{
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    jQuery.ajax({
        url: base+'lead-status',
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
                // console.log(d);
                
                if (d.lg_lead == '1') 
                {
                    $('#lead').prop('checked', true);
                    $('.lead_fields').show();
                }
                else
                {
                    $('#lead').prop('checked', false);
                }

                if (d.lg_u_name == '1') 
                {
                    $('#name').prop('checked', true);
                }
                else
                {
                    $('#name').prop('checked', false);
                }

                if (d.lg_email == '1') 
                {
                    $('#email').prop('checked', true);
                }
                else
                {
                    $('#email').prop('checked', false);
                }

                if (d.lg_phone == '1') 
                {
                    $('#phone').prop('checked', true);
                }
                else
                {
                    $('#phone').prop('checked', false);
                }

                $('#l_title').val(d.lg_title);

                $('#lead_img_temp').val(d.lg_image);
                
                $("#nn .dropify-wrapper").addClass("has-preview");
                $("#nn .dropify-preview").attr('style','display:block');
                $("#nn .dropify-preview").html('<span class="dropify-render"><img src="'+d.lg_image_full+'"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner">'+d.lg_image+'</span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div>');
                

            }
            else
            {
                error(data.msg);
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}

function lead()
{
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    var daata = $('#lead_form').serializeArray();
    $.each(daata, function (key, input) 
    {
        form_data.append(input.name, input.value);
    });
    jQuery.ajax({
        url: base+'lead-active',
        method: 'post',
        data : form_data,
        dataType : "json",
        cache: false,
        contentType: false,
        processData: false,
        }).done(function (data){
            // console.log(data)
            if(data.res==1)
            {
                success(data.msg);
                // lead_data()
            }
            else
            {
                success(data.msg);
                $('.lead_fields').hide();
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}
function name()
{
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    var daata = $('#lead_form').serializeArray();
    $.each(daata, function (key, input) 
    {
        form_data.append(input.name, input.value);
    });
    jQuery.ajax({
        url: base+'name-active',
        method: 'post',
        data : form_data,
        dataType : "json",
        cache: false,
        contentType: false,
        processData: false,
        }).done(function (data){
            // console.log(data)
            if(data.res==1)
            {
                success(data.msg);
                // lead_data()
            }
            else
            {
                success(data.msg);
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}
function email()
{
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    var daata = $('#lead_form').serializeArray();
    $.each(daata, function (key, input) 
    {
        form_data.append(input.name, input.value);
    });
    jQuery.ajax({
        url: base+'email-active',
        method: 'post',
        data : form_data,
        dataType : "json",
        cache: false,
        contentType: false,
        processData: false,
        }).done(function (data){
            // console.log(data)
            if(data.res==1)
            {
                success(data.msg);
                // lead_data()
            }
            else
            {
                success(data.msg);
                
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}
function phone()
{
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    var daata = $('#lead_form').serializeArray();
    $.each(daata, function (key, input) 
    {
        form_data.append(input.name, input.value);
    });
    jQuery.ajax({
        url: base+'phone-active',
        method: 'post',
        data : form_data,
        dataType : "json",
        cache: false,
        contentType: false,
        processData: false,
        }).done(function (data){
            // console.log(data)
            if(data.res==1)
            {
                success(data.msg);
                // lead_data()
            }
            else
            {
                success(data.msg);
               
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
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
        url : base+'lead-data-tbl',
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

function delete_user_lead(id)
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
                url: base+'delete-lead-back-data',
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

function title_lead()
{
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    var daata = $('#lead_form').serializeArray();
    $.each(daata, function (key, input) 
    {
        form_data.append(input.name, input.value);
    });
    jQuery.ajax({
        url: base+'title-active',
        method: 'post',
        data : form_data,
        dataType : "json",
        cache: false,
        contentType: false,
        processData: false,
        }).done(function (data){
            // console.log(data)
            if(data.res==1)
            {
                success(data.msg);
                // lead_data()
                // lead_data();
            }
            else
            {
                success(data.msg);
                // $('.lead_fields').hide();
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}

function img_lead(img)
{
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('img',img);


    jQuery.ajax({
        url: base+'image-active',
        method: 'post',
        data : form_data,
        dataType : "json",
        cache: false,
        contentType: false,
        processData: false,
        }).done(function (data){
            // console.log(data)
            if(data.res==1)
            {
                success(data.msg);
                // lead_data()
                // lead_data();
            }
            else
            {
                success(data.msg);
                // $('.lead_fields').hide();
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}

function image_upload(img_id,hdn_id)
{
  $('.btn-div').hide();
  $('#spin').show();
  var img = document.getElementById(img_id);
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
    if (response.res == 1) 
    {  
      var fileName = response.name;
      $("#"+hdn_id).val(fileName);
      img_lead(fileName);
    } 
    else 
    {          
      $("#"+hdn_id).val('');
    }
  }).fail(function (){     
    $('.btn-div').show();
    $('#spin').hide();        
    warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    $('.dropify-preview').hide();
    $('.dropify-filename-inner').html(''); 
  });
}