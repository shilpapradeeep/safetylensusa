function fill_year(variable,year_id)
{


  $("label[for='"+variable+"']").html('<i class="fa fa-spin fa-spinner"></i> Year <span class="compulsory">*</span>');
  var base = $('#baseurl').val();
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    $.ajax({
    type:'POST',
    url:base+"fill-year",
    dataType:'json',
    cache: false,
    contentType: false, 
    processData: false,
    data:form_data,
    success:function(data)
    {  
      $("label[for='"+variable+"']").html('Year <span class="compulsory">*</span>');
      $('#'+variable).html('<option value="">Select</option>');
      var yt = data.years;
      if(yt.length>=1)
    {
      yt.forEach(function(element) {
        
        if(!$.isEmptyObject(year_id) && year_id==element['name'])
            $('#'+variable).append('<option  selected value="'+element['name']+'">'+element['name']+'</option>');      
        else
            $('#'+variable).append('<option  value="'+element['name']+'">'+element['name']+'</option>');
        
      });
    }
 
    }
  });
}
function fill_month(variable,month_id)
{


  $("label[for='month']").html('<i class="fa fa-spin fa-spinner"></i> Month <span class="compulsory">*</span>');
  var base = $('#baseurl').val();
    var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    $.ajax({
    type:'POST',
    url:base+"fill-month",
    dataType:'json',
    cache: false,
    contentType: false, 
    processData: false,
    data:form_data,
    success:function(data)
    {  
      $("label[for='month']").html('Month <span class="compulsory">*</span>');
      $('#'+variable).html('<option value="">Select</option>');
      var mt = data.months;
      if(mt.length>=1)
    {
      mt.forEach(function(element) {
        
        if(!$.isEmptyObject(month_id) && month_id==element['id'])
            $('#'+variable).append('<option  selected value="'+element['id']+'">'+element['name']+'</option>');      
        else
            $('#'+variable).append('<option  value="'+element['id']+'">'+element['name']+'</option>');
        
      });
    }
 
    }
  });
}