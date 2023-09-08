 $(document).ready(function(){
      
        $('.noNum').keypress(function(e) {
            preventNumberInput(e);
        });
        $('.nonAlpha').keypress(function (key) {
   
            if(key.charCode < 48 || key.charCode > 57) return false;
        });
         $('.isDecimal').keypress(function(e) {
            CheckDecimal(e);
        });
         $('.isMobile').keypress(function(key) {
            if(key.charCode < 48 || key.charCode > 57) return false;
        });
        $('.select2').select2({
            minimumResultsForSearch: ''
        });
        setInterval(function() {

          var currentTime = new Date();
          var hours = currentTime.getHours();
          var minutes = currentTime.getMinutes();
          var seconds = currentTime.getSeconds();

          // Add leading zeros
          hours = (hours < 10 ? "0" : "") + hours;
          minutes = (minutes < 10 ? "0" : "") + minutes;
          seconds = (seconds < 10 ? "0" : "") + seconds;

          // Compose the string for display
          var currentTimeString = hours + ":" + minutes + ":" + seconds;
          $(".timer").html(currentTimeString);

        }, 1000);
    
})
  function preventNumberInput(e)
  {
      var keyCode = (e.keyCode ? e.keyCode : e.which);
     
      if ((keyCode < 97 || keyCode > 122) && (keyCode < 65 || keyCode > 90) && keyCode>32) {
          e.preventDefault();
      }
  }
  function CheckDecimal(evt) 
  { 

   if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) 
        evt.preventDefault();
  }
  function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;

       return true;
    }
    function isNameKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode
     
       if ((charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90) && charCode>32)
           return false;
       return true;
    }
    function isNameNumberKey(evt)
    {
      var charCode = (evt.which) ? evt.which : event.keyCode
     
       if ((charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90) && charCode>32 && charCode > 31 && (charCode < 48 || charCode > 57))
           return false;
       return true;
    }
 function success(msg)
{
  iziToast.show({
                        id:'',
                        color: 'green', // blue, red, green, yellow
                    title: 'Well done',
                    message: msg,
                    transitionInMobile: 'fadeInUp',

                });
}
 function error(msg)
{
  iziToast.show({
                        id:'',
                        color: 'red', // blue, red, green, yellow
                    title: 'Sorry',
                    message: msg,
                    transitionInMobile: 'fadeInUp',

                });
}
 function warning(msg)
{
  iziToast.show({
                        id:'',
                        color: 'yellow', // blue, red, green, yellow
                    title: 'Warning',
                    message: msg,
                    transitionInMobile: 'fadeInUp',

                });
}
/*function delete_field(id,slug)
{
  Swal.fire({
    title: "Alert",
    text: "Do you really want to delete",
    type: "warning",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#FF0000',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Confirm',
    cancelButtonText: 'Exit'
  }).then(function(t) {
    t.value ? del(id,slug) : warning("Cancelled");
  })
      
      }
      function del(id,slug)
      {
       var base = $('#baseurl').val();
       var form_data = new FormData();
       var csrfName = $('#csrf_token').val();
       var csrfHash = $('#csrf_hash').val();
       form_data.append(csrfName,csrfHash);
       form_data.append('id',id);
       jQuery.ajax({
        url: base+slug,
        method: 'post',
        data : form_data,
        dataType : "JSON",
        cache: false,
        contentType: false,
        processData: false,
      }).done(function (data){
        console.log(data)
        if(data.res==1)
        {
         success(data.msg);
         list_tb();
         
       }
       else
       {
        error(data.msg);
      }
      
    }).fail(function (){
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
  }*/
function validation_error_fun(err)
{
   for(var key in err)
   {
     var v = err[key];
     $('#'+key+'_error').html(v);
   }
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function delete_field(id,slug)
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
                url: base+slug,
                method: 'post',
                data : form_data,
                dataType : "JSON",
                cache: false,
                contentType: false,
                processData: false,
                }).done(function (data){
                    console.log(data)
                    if(data.res==1)
                    {
                        success(data.msg);
                        list_tb();
                    }
                    else
                    {
                        error(data.msg);
                    }
                    
                }).fail(function (){
                    warning('Oops! Something Went Wrong. Please try again later or Contact admin');
                });
          } 
          else 
          {
            warning("Cancelled");
          }
        });
}

// Lens values model form
$(document).on( "click", ".lens_values", function() {
  var type = $(this).attr('typ');
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  var form_data = new FormData();
  form_data.append(csrfName,csrfHash);
  form_data.append('type',type);

  $.ajax({
    url : base+'lens-values-modals',
    type : 'post',
    data : form_data,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (data){
    $('#modalDiv').html(data);
    $(".value_modal").modal("toggle");
  }).fail(function (){

    warning('Oops! Something Went Wrong. Please try again later or Contact admin');

  });

});


$(document).on( "click", ".remove-new-value", function() { 

  var type = $(this).attr('typ');
  var divid = $(this).attr('fet');

  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  var form_data = new FormData();
  form_data.append(csrfName,csrfHash);
  form_data.append('type',type);
  form_data.append('divid',divid);
  
  $.ajax({
    url : base+'lens-values-delete-input',
    dataType:'json',
    type : 'post',
    data : form_data,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (data){
    if(data.res==1)
    { 
      $('#dv_'+divid).remove();
    }
    else
      error(data.msg);
  }).fail(function (){

    warning('Oops! Something Went Wrong. Please try again later or Contact admin');

  });
  


 });

$(document).on( "click", ".add-new-value", function() { 
  var numItems = $('.form-div').length;
  var type = $(this).attr('typ');
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  var form_data = new FormData();
  form_data.append(csrfName,csrfHash);
  form_data.append('type',type);
  form_data.append('numItems',numItems);
  
  $.ajax({
    url : base+'lens-values-add-new',
    dataType:'json',
    type : 'post',
    data : form_data,
    cache: false,
    contentType: false,
    processData: false,
  }).done(function (data){
    if(data.res==1)
    {
      $('.input-divs').append(data.inputDiv);
    }
    else
      error(data.msg);
  }).fail(function (){

    warning('Oops! Something Went Wrong. Please try again later or Contact admin');

  });
  


 });

$(document).on( "submit", ".lens_value_form", function() { 
  var base = $('#baseurl').val();
  var form_data = $('.lens_value_form').serializeArray();

  $.ajax({
    url : base+'lens-values-action',
    dataType:'json',
    type : 'post',
    data : form_data,
  }).done(function (data){

    if(data.res==1)
    {
     success(data.msg);
     $(".value_modal").modal("toggle");
    }
   else
    error(data.msg);
    
  }).fail(function (){
    warning('Oops! Something Went Wrong. Please try again later or Contact admin');
  });

  return false;
 });