var base=$("#base").val();
$(document).ready(function(){
  fill_profile();
});

function fill_profile()
{

  
  $('.main-spinner').show();

  
 
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  var fd = new FormData();
  fd.append(csrfName,csrfHash);
  $.ajax({
      type: 'post',
      url: base+"view_profile",
      dataType:'json',
      data:fd,
      cache: false,
      contentType: false,
      processData: false
    }).done(function (data)  
    {  
     // $("#user-profile").html(html);
     $('.main-spinner').hide();
     if(data.res==1)
      {
        
        $('#user-profile').show();
        $("#user-profile").html(data.html);
      }
      else
      {
        error(data.msg);
      }
    }).fail(function () {
      $('.main-spinner').hide();
      $("#user-profile").html('');
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');

    });

}

function profile_edit()
{
  $('#user-profile').hide();
  /*$('#edit-profile').show();*/
  $('.main-spinner').show();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  var fd = new FormData();
  fd.append(csrfName,csrfHash);
  $.ajax({
      type: 'post',
      url: base+"edit_profile",
      dataType:'json',
      data:fd,
      cache: false,
      contentType: false,
      processData: false
    }).done(function (data)  
    {  
     $('.main-spinner').hide();
     if(data.res==1)
      {
        $('#edit-profile').show();
        $("#edit-profile").html(data.html);
      }
      else
      {
        error(data.msg);
      }
    }).fail(function () {
      $('.main-spinner').hide();
      $("#edit-profile").html('');
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');

    });

}
function readURL(input)
{

  $('#img-spinner').show();
  $('#pf-img').hide();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  var fd = new FormData();
  fd.append(csrfName,csrfHash);
  //var files = $(this)[0].files[0];this.files[0];
  fd.append('profile-img', input.files[0]);
  $.ajax({
   url: base + "profile-img-upload",
   type: 'post',
   dataType: "JSON",
   data: fd,
   cache: false,
   contentType: false,
   processData: false,
   success: function(response) {
    console.log(response);
    if (response.res == 1) 
    {
       $('#img-spinner').hide();
       $('#pf-img').show();
       $('#pf-img').attr('src', response.full_path );
       success('File Uploaded');
     } 
     else 
     {
      error(response.error);
    }
  },
})
}
function submit_profile()
{

  $('.form-btn').hide();
  $('.spinner').show();
  $('.validation-error').hide();
  $('.validation-error').html("");
  var data = new FormData();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  data.append(csrfName,csrfHash);
    //Form data
    var form_data = $('#pform').serializeArray();
    $.each(form_data, function (key, input) 
    {
      data.append(input.name, input.value);
    });
    
    //File data
    
    var file_data = $('input[name="profile_img"]')[0].files;
    for (var i = 0; i < file_data.length; i++) {
      data.append("profile_img", file_data[i]);
    }
    
    $.ajax({
      url : base+'profile_edit',
      type : 'post',
      data:data,
      cache:false,
      contentType:false,
      processData:false,
      dataType : 'json',
      success:function(data)
      {
        console.log(data);
        $('.form-btn').show();
        $('.spinner').hide();
        if(data.res==1)
        {
         
          success(data.msg);
          $('#edit-profile').hide();
          $('#user-name').html(data.username);
          fill_profile();

        }
        else
        {
          if($.isEmptyObject(data.errors))
          {
            error(data.msg);
          }else{
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
    return false;
  }