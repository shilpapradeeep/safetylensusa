function fill_category(variable,category_id,type=null)
{


  $("label[for='category']").html('<i class="fa fa-spin fa-spinner"></i> Category <span class="compulsory">*</span>');
  $("#inst_det").html('');
    var base = $('#baseurl').val();
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    if(type!=null)
    {
      form_data.append('type',type);
    }
    $.ajax({
    type:'POST',
    url:base+"fill-category",
    dataType:'json',
    cache: false,
    contentType: false, 
    processData: false,
    data:form_data,
    success:function(data)
    {  
      $("label[for='category']").html('Category <span class="compulsory">*</span>');
      $('#'+variable).html('<option value="">Select</option>');
      var it = data.categories;
      if(it.length>=1)
      {
        it.forEach(function(element) {
          
          if(!$.isEmptyObject(category_id) && category_id==element['id'])
              $('#'+variable).append('<option  selected value="'+element['id']+'">'+element['name']+'</option>');      
          else
              $('#'+variable).append('<option  value="'+element['id']+'">'+element['name']+'</option>');
          
        });
      }
      else
      {
        warning('No category were found.');
      }
      $('#category').select2({
                minimumResultsForSearch: ''
           });
 
    }
  });
}