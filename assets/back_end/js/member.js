var base = $('#baseurl').val();
$(document).ready(function(){

    
    $(".reset").click(function() {
        $('#member_form').find("input[type=text],input[type=number]").val("");
        $('.dropify-clear').trigger('click');
        $('.delivery_add').show();
        $('.billing_add').show();
    });
    
    $('.reset_address').click(function() {
        $('#address_form').find("input[type=text],input[type=number]").val("");
        $('.bs-example-modal-center').modal('toggle');
    });
    if ($('#urisegment1').val() == "member") 
    {
        list();
    }
    else if ($('#urisegment1').val() == "member-details") 
    {
        member_d_address();
        member_b_address();
    }

});


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

function member_submit_form()
{
    $('.btn-div').hide();
    $('#spin').show();
    $('.validation-error').html("");
    var data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    data.append(csrfName,csrfHash);
    //Form data
    var form_data = $('#member_form').serializeArray();
    $.each(form_data, function (key, input) 
    {
        data.append(input.name, input.value);
    });
    
    $.ajax({
    type:'POST',
    url:base+"submit-member",
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
            $(".reset").trigger('click');
            list();
            $('.delivery_add').show();
            $('.billing_add').show();
            $('#change_title').html('Add');
            $('.submit').html('Add');

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

function delete_member(id)
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
                url: base+'delete-member',
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

function edit_member(id)
{
    $('.delivery_add').hide();
    $('.billing_add').hide();
    $('#change_title').html('Edit');
    $('.submit').html('Edit');
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',id);
    jQuery.ajax({
        url: base+'edit-member-data',
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
                $('#m_id').val(d.m_id);
                $('#m_name').val(d.m_name);
                $('#m_email').val(d.m_email);
                $('#m_phone').val(d.m_phone);

                // $('#m_address_d').val(d.md_address);
                // $('#m_district_d').val(d.md_district);
                // $('#m_state_d').val(d.md_state);
                // $('#m_pin_number_d').val(d.md_pin);

                // $('#m_address_b').val(d.mb_address);
                // $('#m_district_b').val(d.mb_district);
                // $('#m_state_b').val(d.mb_state);
                // $('#m_pin_number_b').val(d.mb_pin);

                $('#profile_img_temp').val(d.m_photo);
                
                $("#nn .dropify-wrapper").addClass("has-preview");
                $("#nn .dropify-preview").attr('style','display:block');
                $("#nn .dropify-preview").html('<span class="dropify-render"><img src="'+d.m_photo_path+'"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="dropify-filename-inner">'+d.m_photo+'</span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div>');
                window.scrollTo(500, 0);
            }
            else
            {
                error(data.msg);
            }
            
        }).fail(function (){
            warning('Oops! Something Went Wrong. Please try again later or Contact admin#01');
        });
}

function address_submit_form()
{
    $('.btn-div').hide();
    $('#spin').show();
    $('.validation-error').html("");
    var data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    data.append(csrfName,csrfHash);
    //Form data
    var form_data = $('#address_form').serializeArray();
    $.each(form_data, function (key, input) 
    {
        data.append(input.name, input.value);
    });
    
    $.ajax({
    type:'POST',
    url:base+"submit-address",
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
            $('.reset_address').trigger('click');
            if ($('#ma_type').val() == '1') 
            {
                member_d_address()
            }
            else
            {
                member_b_address()
            }

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

function list()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'list-member-tbl',
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

function member_d_address()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',$('#m_l_id').val());

    $.ajax({
        url : base+'member-d-address-back',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
            $('.member_d_address').html(data);   
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
}

function member_b_address()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('id',$('#m_l_id').val());


    $.ajax({
        url : base+'member-b-address-back',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
            $('.member_b_address').html(data);   
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
}

function change_password(id)
{
  swal({
            title: "Alert",
            text: "Do you really want to Change Password",
            type: "warning",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
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
                url: base+'admin-change-user-password',
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

