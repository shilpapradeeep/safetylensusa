$( document ).ready(function() {
});

// lens materials


$(document).on( "click", ".delete_lens_materials_row", function() { 
 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();

      if(confirm("Are you sure you want to delete this?"))
      {
        form_data.append(csrfName,csrfHash);
        form_data.append('id',id);
        $.ajax({
          url : base+'lens-materials-delete',
          type : 'post',
          data : form_data,
          dataType:'json',
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (data){
           
          if(data.res==1)
          {  
            $('#tr_'+id).remove();
            success(data.msg);
          }
          else
            error(data.msg);

        }).fail(function (){

          warning('Oops! Something Went Wrong. Please try again later or Contact admin');

        });
    }
    else
    {
        return false;
    }

 });

$(document).on( "click", "#lens_materials_add", function() {
   
   $('.validation-error').html('');
   $('#lm_id').val('');
   $('.imgdiv').html('');
   $('#lm_image_name').val('');
   $('#lens_materials_form').trigger("reset");
   $(".modal").modal("toggle");

    var base = $('#baseurl').val();
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
      $.ajax({
      type:'POST',
      dataType:'json',
      url:base+"lens-materials-pricing",
      data:form_data,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (response)
    {   
    $('#met-pricing').html(response);
    }).fail(function () {
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });


 });

$(document).on( "submit", "#lens_materials_form", function() {
    $('.validation-error').html(''); 
  var base = $('#baseurl').val();
    var form_data = $('#lens_materials_form').serializeArray();
    $.ajax({
      type:'POST',
      dataType:'json',
      url:base+"lens-materials-action",
      data:form_data
    }).done(function (response)
    {    
      if(response.res==1)
      {     
            success(response.msg);
            $('#lens_materials_form').trigger("reset");
            $(".modal").modal("toggle");
            list_lens_materials_tb();
      }
      else
      {
        if($.isEmptyObject(response.errors))
        {
          error(response.msg);
        }
        else
        { 
          for(var key in response.errors)
          { 
            var v = response.errors[key]; 
            $('#'+key+'_error').html(v);
          }
        }
      }

    }).fail(function () {
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    
  return false;
 });

$(document).on( "click", ".imagelm", function() {
$('#lm_image').click();
return false;
});

$(document).on('change','#lm_image',function(){
$('.imgdiv').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');

var filedata = $(this)[0].files[0];
var base = $('#baseurl').val();
var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('filedata',filedata);

    $.ajax({
      type:'POST',
      dataType:'json',
      url:base+"lens-materials-file",
      data:form_data,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (response)
    {    
        if(response.res==0)
          error('Something went wrong!');
        else
        {
           $('.imgdiv').html('<img width="100%" height="100%" src="'+base+response.path+'">');
           $('#lm_image_name').val(response.path);
        }

    }).fail(function () {
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    document.getElementById("lm_image").value = "";
});

$(document).on( "click", ".edit_lens_materials_row", function() { 
  $('.validation-error').html('');
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  form_data.append(csrfName,csrfHash);
  form_data.append('id',id);
      $.ajax({
        url : base+'lens-materials-view-edit',
        type : 'post',
        data : form_data,
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
                if(data.res==1)
                {  
                  $('#lm_id').val(id);
                  $('#lm_title').val(data.data[0].lm_title);
                  $('#lm_desc').val(data.data[0].lm_desc);
                  $('#lm_image_name').val(data.data[0].lm_image);
                  $('.imgdiv').html('<img width="100%" height="100%" src="'+base+data.data[0].lm_image+'">');
                  $('#met-pricing').html(data.content)
                  $(".modal").modal("toggle");
                }

    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
  
});

function list_lens_materials_tb()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'lens-materials-tbl',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
            $('#list-viewed').html(data);   
             var table = $('#lens_materials_table').DataTable({
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf','colvis' ]
             });
             table.buttons().container().appendTo( '#lens_materials_wrapper .col-md-6:eq(0)' ); 
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });

}


// lens options
$(document).on( "click", ".delete_lens_options_row", function() { 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();

      if(confirm("Are you sure you want to delete this?"))
      {
        form_data.append(csrfName,csrfHash);
        form_data.append('id',id);
        $.ajax({
          url : base+'lens-optns-delete',
          type : 'post',
          data : form_data,
          dataType:'json',
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (data){

          if(data.res==1)
          {  
            $('#tr_'+id).remove();
            success(data.msg);
          }
          else
            error(data.msg);

        }).fail(function (){

          warning('Oops! Something Went Wrong. Please try again later or Contact admin');

        });
    }
    else
    {
        return false;
    }
  
});

$(document).on( "click", ".edit_lens_options_row", function() { 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  form_data.append(csrfName,csrfHash);
  form_data.append('id',id);
      $.ajax({
        url : base+'lens-optns-view-edit',
        type : 'post',
        data : form_data,
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){

                if(data.res==1)
                {  
                  $('#lo_id').val(id);
                  $('#l_title').val(data.data[0].lo_name);
                  $('#l_price').val(data.data[0].lo_price);
                  $('#l_cost').val(data.data[0].lo_cost);
                  $(".modal").modal("toggle");
                }

    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
  
});


$(document).on( "click", "#lens_options_add", function() {
   $('#lo_id').val('');
   $('#lens_options_form').trigger("reset");
   $(".modal").modal("toggle");
 });

$(document).on( "submit", "#lens_options_form", function() {
    $('.validation-error').html(''); 
	var base = $('#baseurl').val();
    var form_data = $('#lens_options_form').serializeArray();
    $.ajax({
    	type:'POST',
    	dataType:'json',
    	url:base+"lens-options-action",
    	data:form_data
    }).done(function (response)
    {    
    	if(response.res==1)
    	{
            success(response.msg);
            $('#lens_options_form').trigger("reset");
            $(".modal").modal("toggle");
            list_lens_opt_tb();
    	}
    	else
    	{
    		if($.isEmptyObject(response.errors))
    		{
    			error(response.msg);
    		}
    		else
    		{ 
    			for(var key in response.errors)
    			{ 
    				var v = response.errors[key]; 
    				$('#'+key+'_error').html(v);
    			}
    		}
    	}

    }).fail(function () {
    	warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    
  return false;
 });

function list_lens_opt_tb()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'lens-optns-tbl',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
               
            $('#list-viewed').html(data);   
             var table = $('#lens_options_table').DataTable({
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf','colvis' ]
             });
             table.buttons().container().appendTo( '#lens_options_wrapper .col-md-6:eq(0)' ); 
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });

}


// lens type


$(document).on( "click", "#lens_type_add", function() {
  $('.validation-error').html('');
   $('#lt_id').val('');
   $('.imgdiv').html('');
   $('#lt_image_name').val('');
   $('#lens_type_form').trigger("reset");
   $(".modal").modal("toggle");
 });

$(document).on( "click", ".imagelt", function() {
$('#lt_image').click();
return false;
});

$(document).on('change','#lt_image',function(){
$('.imgdiv').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');

var filedata = $(this)[0].files[0];
var base = $('#baseurl').val();
var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append('filedata',filedata);

    $.ajax({
      type:'POST',
      dataType:'json',
      url:base+"lens-type-file",
      data:form_data,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (response)
    {    
        if(response.res==0)
          error('Something went wrong!');
        else
        {
           $('.imgdiv').html('<img width="100%" height="100%" src="'+base+response.path+'">');
           $('#lt_image_name').val(response.path);
        }

    }).fail(function () {
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    document.getElementById("lt_image").value = "";
});



$(document).on( "submit", "#lens_type_form", function() {
  $('.validation-error').html(''); 
  var base = $('#baseurl').val();
    var form_data = $('#lens_type_form').serializeArray();
    $.ajax({
      type:'POST',
      dataType:'json',
      url:base+"lens-type-action",
      data:form_data
    }).done(function (response)
    {   
      if(response.res==1)
      {
            success(response.msg);
            $('#lens_type_form').trigger("reset");
            $(".modal").modal("toggle");
            list_type_opt_tb();
      }
      else
      {
        if($.isEmptyObject(response.errors))
        {
          error(response.msg);
        }
        else
        { 
          for(var key in response.errors)
          { 
            var v = response.errors[key]; 
            $('#'+key+'_error').html(v);
          }
        }
      }

    }).fail(function () {
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    
  return false;
 });



$(document).on( "click", ".edit_lens_type_row", function() { 
  $('.validation-error').html('');
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  form_data.append(csrfName,csrfHash);
  form_data.append('id',id);
      $.ajax({
        url : base+'lens-type-view-edit',
        type : 'post',
        data : form_data,
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
                if(data.res==1)
                {  
                  $('#lt_id').val(id);
                  $('#lt_title').val(data.data[0].lt_title);
                  $('#lt_desc').val(data.data[0].lt_desc);
                  $('#lt_image_name').val(data.data[0].lt_image);
                  $('.imgdiv').html('<img width="100%" height="100%" src="'+base+data.data[0].lt_image+'">');
                  $(".modal").modal("toggle");
                }

    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
  
});

$(document).on( "click", ".delete_lens_type_row", function() { 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();

      if(confirm("Are you sure you want to delete this?"))
      {
        form_data.append(csrfName,csrfHash);
        form_data.append('id',id);
        $.ajax({
          url : base+'lens-type-delete',
          type : 'post',
          data : form_data,
          dataType:'json',
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (data){

          if(data.res==1)
          {  
            $('#tr_'+id).remove();
            success(data.msg);
          }
          else
            error(data.msg);

        }).fail(function (){

          warning('Oops! Something Went Wrong. Please try again later or Contact admin');

        });
    }
    else
    {
        return false;
    }
  
});


function list_type_opt_tb()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'lens-type-tbl',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
            $('#list-viewed').html(data);   
             var table = $('#lens_type_table').DataTable({
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf','colvis' ]
             });
             table.buttons().container().appendTo( '#lens_type_wrapper .col-md-6:eq(0)' ); 
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });

}




// tint type


$(document).on( "click", "#tint_type_add", function() {
   $('#tt_id').val('');
   $('#tint_type_form').trigger("reset");
   $(".modal").modal("toggle");
 });


$(document).on( "submit", "#tint_type_form", function() {
    $('.validation-error').html(''); 
  var base = $('#baseurl').val();
    var form_data = $('#tint_type_form').serializeArray();
    $.ajax({
      type:'POST',
      dataType:'json',
      url:base+"tint-type-action",
      data:form_data
    }).done(function (response)
    {    
      if(response.res==1)
      {
            success(response.msg);
            $('#tint_type_form').trigger("reset");
            $(".modal").modal("toggle");
            list_tint_type_tb();
      }
      else
      {
        if($.isEmptyObject(response.errors))
        {
          error(response.msg);
        }
        else
        { 
          for(var key in response.errors)
          { 
            var v = response.errors[key]; 
            $('#'+key+'_error').html(v);
          }
        }
      }

    }).fail(function () {
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    
  return false;
 });

$(document).on( "click", ".edit_tint_type_row", function() { 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  form_data.append(csrfName,csrfHash);
  form_data.append('id',id);
      $.ajax({
        url : base+'tint-type-view-edit',
        type : 'post',
        data : form_data,
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){

                if(data.res==1)
                {  
                  $('#tt_id').val(id);
                  $('#tt_name').val(data.data[0].tt_name);
                  $(".modal").modal("toggle");
                }

    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
  
});


$(document).on( "click", ".delete_tint_type_row", function() { 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();

      if(confirm("Are you sure you want to delete this?"))
      {
        form_data.append(csrfName,csrfHash);
        form_data.append('id',id);
        $.ajax({
          url : base+'tint-type-delete',
          type : 'post',
          data : form_data,
          dataType:'json',
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (data){

          if(data.res==1)
          {  
            $('#tr_'+id).remove();
            success(data.msg);
          }
          else
            error(data.msg);

        }).fail(function (){

          warning('Oops! Something Went Wrong. Please try again later or Contact admin');

        });
    }
    else
    {
        return false;
    }
  
});


function list_tint_type_tb()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'tint-type-tbl',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
               
            $('#list-viewed').html(data);   
             var table = $('#tint_type_table').DataTable({
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf','colvis' ]
             });
             table.buttons().container().appendTo( '#tint_type_wrapper .col-md-6:eq(0)' ); 
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
}


// polarized_lens

function list_polarized_lens_tb()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'polarized-lens-tbl',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
               
            $('#list-viewed').html(data);   
             var table = $('#polarized_lens_table').DataTable({
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf','colvis' ]
             });
             table.buttons().container().appendTo( '#polarized_lens_wrapper .col-md-6:eq(0)' ); 
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
}


$(document).on( "click", "#polarized_lens_add", function() {
   $('#pl_id').val('');
   $('#polarized_lens_form').trigger("reset");
   $(".modal").modal("toggle");
 });

$(document).on( "submit", "#polarized_lens_form", function() {
    $('.validation-error').html(''); 
    var base = $('#baseurl').val();
    var form_data = $('#polarized_lens_form').serializeArray();
    $.ajax({
      type:'POST',
      dataType:'json',
      url:base+"polarized-lens-action",
      data:form_data
    }).done(function (response)
    {    
      if(response.res==1)
      {
            success(response.msg);
            $('#polarized_lens_form').trigger("reset");
            $(".modal").modal("toggle");
            list_polarized_lens_tb();
      }
      else
      {
        if($.isEmptyObject(response.errors))
        {
          error(response.msg);
        }
        else
        { 
          for(var key in response.errors)
          { 
            var v = response.errors[key]; 
            $('#'+key+'_error').html(v);
          }
        }
      }

    }).fail(function () {
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    
  return false;
 });

$(document).on( "click", ".edit_polarized_lens_row", function() { 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  form_data.append(csrfName,csrfHash);
  form_data.append('id',id);
      $.ajax({
        url : base+'polarized-lens-view-edit',
        type : 'post',
        data : form_data,
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){

                if(data.res==1)
                {  
                  $('#pl_id').val(id);
                  $('#pl_name').val(data.data[0].pl_name);
                  $(".modal").modal("toggle");
                }

    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
  
});


$(document).on( "click", ".delete_polarized_lens_row", function() { 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();

      if(confirm("Are you sure you want to delete this?"))
      {
        form_data.append(csrfName,csrfHash);
        form_data.append('id',id);
        $.ajax({
          url : base+'polarized-lens-delete',
          type : 'post',
          data : form_data,
          dataType:'json',
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (data){

          if(data.res==1)
          {  
            $('#tr_'+id).remove();
            success(data.msg);
          }
          else
            error(data.msg);

        }).fail(function (){

          warning('Oops! Something Went Wrong. Please try again later or Contact admin');

        });
    }
    else
    {
        return false;
    }
  
});

// Transitions
function list_transitions_tb()
{
    $('#list-viewed').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
    var form_data = new FormData();
    var base = $('#baseurl').val();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);

    $.ajax({
        url : base+'transitions-tbl',
        type : 'post',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){
               
            $('#list-viewed').html(data);   
             var table = $('#transitions_table').DataTable({
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf','colvis' ]
             });
             table.buttons().container().appendTo( '#polarized_lens_wrapper .col-md-6:eq(0)' ); 
    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
}


$(document).on( "click", "#transitions_add", function() {
   $('#pl_id').val('');
   $('#transitions_form').trigger("reset");
   $(".modal").modal("toggle");
 });


 $(document).on( "submit", "#transitions_form", function() {
    $('.validation-error').html(''); 
    var base = $('#baseurl').val();
    var form_data = $('#transitions_form').serializeArray();
    $.ajax({
      type:'POST',
      dataType:'json',
      url:base+"transitions-action",
      data:form_data
    }).done(function (response)
    {    
      if(response.res==1)
      {
            success(response.msg);
            $('#transitions_form').trigger("reset");
            $(".modal").modal("toggle");
            list_transitions_tb();
      }
      else
      {
        if($.isEmptyObject(response.errors))
        {
          error(response.msg);
        }
        else
        { 
          for(var key in response.errors)
          { 
            var v = response.errors[key]; 
            $('#'+key+'_error').html(v);
          }
        }
      }

    }).fail(function () {
      warning('Oops! Something Went Wrong. Please try again later or Contact admin');
    });
    
  return false;
 });


 $(document).on( "click", ".edit_transitions_row", function() { 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();
  form_data.append(csrfName,csrfHash);
  form_data.append('id',id);
      $.ajax({
        url : base+'transitions-view-edit',
        type : 'post',
        data : form_data,
        dataType:'json',
        cache: false,
        contentType: false,
        processData: false,
    }).done(function (data){

                if(data.res==1)
                {  
                  $('#tr_id').val(id);
                  $('#tr_name').val(data.data[0].tr_name);
                  $(".modal").modal("toggle");
                }

    }).fail(function (){
            
            warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
  
});


 $(document).on( "click", ".delete_transitions_row", function() { 
  var id = $(this).attr('fet');
  var form_data = new FormData();
  var base = $('#baseurl').val();
  var csrfName = $('#csrf_token').val();
  var csrfHash = $('#csrf_hash').val();

      if(confirm("Are you sure you want to delete this?"))
      {
        form_data.append(csrfName,csrfHash);
        form_data.append('id',id);
        $.ajax({
          url : base+'transitions-delete',
          type : 'post',
          data : form_data,
          dataType:'json',
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (data){

          if(data.res==1)
          {  
            $('#tr_'+id).remove();
            success(data.msg);
          }
          else
            error(data.msg);

        }).fail(function (){

          warning('Oops! Something Went Wrong. Please try again later or Contact admin');

        });
    }
    else
    {
        return false;
    }
  
});








