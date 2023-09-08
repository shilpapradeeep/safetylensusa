var base=$("#base").val();
function cart(id)
{
  var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append("id",id);
    jQuery.ajax({
      url: base+'add_to_cart_id',
      method: 'post',
      data : form_data,
      dataType:'JSON',
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (data)
    {
      
      if(data.msg=="s_1")
      {
        var cart_quantity=parseInt($("#cart_quantity").html(), 10);
          $("#cart_quantity").html(cart_quantity+1);
        success(data.data);
      }
      else
      {
        error(data.data);
      }
      //$(".list").html(data);
      
    }).fail(function (){
        warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
    return false;
}
function get_compare_id(id)
{
  var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append("id",id);
    jQuery.ajax({
      url: base+'add_to_compare_id',
      method: 'post',
      data : form_data,
      dataType:'JSON',
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (data)
    {
      console.log(data);
      if(data.msg=="s_1")
      {
        var cmpcount=$("#compare_quantity").text();
        $("#compare_quantity").html(parseInt(cmpcount)+1);
        success(data.data);
      }
      else
      {
        error(data.data);
      }
      
    });
    return false;
}
function del_compare_id(id)
{
  var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append("id",id);
    jQuery.ajax({
      url: base+'delete-compare',
      method: 'post',
      data : form_data,
      dataType:'JSON',
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (data)
    {
      if(data.msg=="s_1")
        {
          success(data.data);
          var compare_quantity=parseInt($("#compare_quantity").html(), 10);
          $("#compare_quantity").html(compare_quantity-1);
          setTimeout(function(){
            window.location.reload(1);
          }, 1000);
        }
        else if(data.msg=="f_2")
        {
          warning(data.data);
        }
        else
        {
          error('Unknown Error Occoured #2442491');
        }
      
    }).fail(function (){
        warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
    return false;
  
   
  
}
function get_wishlist_id(id)
{
  var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append("id",id);
    jQuery.ajax({
      url: base+'add_to_wishlist_id',
      method: 'post',
      data : form_data,
      dataType:'JSON',
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (data)
    {
      
      if(data.msg=="s_1")
      {
        var wcount=$("#wishlist_quantity").text();
        $("#wishlist_quantity").html(parseInt(wcount)+1);
        success(data.data);
      }
      else
      {
        error(data.data);
      }
      //$(".list").html(data);
      
    }).fail(function (){
        warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
    return false;
}
function del_wishlist_id(id)
{
  var form_data = new FormData();
    var csrfName = $('#csrf_token').val();
    var csrfHash = $('#csrf_hash').val();
    form_data.append(csrfName,csrfHash);
    form_data.append("id",id);
    jQuery.ajax({
      url: base+'delete-wishlist',
      method: 'post',
      data : form_data,
      dataType:'JSON',
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (data)
    {
      if(data.msg=="s_1")
        {
          success(data.data);
          var wishlist_quantity=parseInt($("#wishlist_quantity").html(), 10);
          $("#wishlist_quantity").html(wishlist_quantity-1);
          setTimeout(function(){
            window.location.reload(1);
          }, 1000);
        }
        else if(data.msg=="f_2")
        {
          warning(data.data);
        }
        else
        {
          error('Unknown Error Occoured #2442491');
        }
      
    }).fail(function (){
        warning('Oops! Something Went Wrong. Please try again later or Contact admin');
            
    });
    return false;
  
  }
  function product_quantity(a)
  {
   // var baseurl=$('#baseurl').val();
    if(a!="")
    {

      var quantity=parseInt($("#product_quant"+a).val(),10);
      //alert(quantity);
      var form_data = new FormData();
      var csrfName = $('#csrf_token').val();
      var csrfHash = $('#csrf_hash').val();
      form_data.append(csrfName,csrfHash);

      form_data.append("id",a);
      form_data.append("quantity",quantity);
      $.ajax({
        url: base+"update-cart-quantity",
        type:"post",
        data : form_data,
        dataType:'JSON',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
          //console.log(data);
          if(data.msg=="s_1")
          {
            success(data.data, 'good');
            setTimeout(function(){
              window.location.reload(1);
            }, 1000);
          }
          else if(data.msg=="f_1")
          {
            error(data.data, 'danger');
          }
          else if(data.msg=="f_2")
          {
           warning(data.data, 'attention');
          }
          else
          {
            error('Unknown Error Occoured #2442491', 'danger');
          }
        }
      });
    }
  }
  function delete_cart_id(a)
  {
    //var baseurl=$('#baseurl').val();
    if(a!="")
    {
      //a=parseInt(a);
      var form_data = new FormData();
      var csrfName = $('#csrf_token').val();
      var csrfHash = $('#csrf_hash').val();
      form_data.append(csrfName,csrfHash);

      form_data.append("id",a);
      $.ajax({
        url: base+"delete-cart-id",
        type:"post",
        data : form_data,
        dataType:'JSON',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
          //console.log(data);
          if(data.msg=="s_1")
          {
            success(data.data, 'good');
            setTimeout(function(){
              window.location.reload(1);
            }, 1000);
          }
          else if(data.msg=="f_1")
          {
           error(data.data, 'danger');
          }
          else if(data.msg=="f_2")
          {
            warning(data.data, 'attention');
          }
          else
          {
            error('Unknown Error Occoured #2442491', 'danger');
          }
        }
      });
    }
  }
  function add_address(a)
  {
    if(a!="")
    {
        $("#ad_spin"+a).html('<i class="fa fa-spin fa-spinner"></i>');
        $(".ad_btn").attr('disabled',true);
      var form_data = new FormData();
      var csrfName = $('#csrf_token').val();
      var csrfHash = $('#csrf_hash').val();
      form_data.append(csrfName,csrfHash);
      form_data.append("type",a);
      form_data.append("address",$('#address'+a).val());
      form_data.append("pincode",$('#pincode'+a).val());
      form_data.append("state",$('#state'+a).val());
      form_data.append("district",$('#district'+a).val());
      $.ajax({
        url: base+"add_address",
        type:"post",
        data : form_data,
        dataType:'JSON',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            
          //console.log(data);
          if (data.msg == "f1")
          {
            $("#address"+a+"_span").html("");
            $("#pincode"+a+"_span").html("");
            $("#state"+a+"_span").html("");
            $("#district"+a+"_span").html("");

            var res = data.error;
            for (var key in res)
            {
              var dummy=key+'_'+a+"_span";
              $("#"+dummy).html("<p style='color:red; padding-bottom:unset; margin-bottom:unset; font-size: 12px;'>"+res[key]+"</p>");
            }
            $("#ad_spin"+a).html('Add Address');
            $(".ad_btn").attr('disabled',false);
            error(data.data, 'danger');
          }
          else if(data.msg=="s_1")
          {
            success(data.data, 'good');
             $("#ad_spin"+a).html('Add Address');
            $(".ad_btn").attr('disabled',false);
            if(data.auto_data)
            {
              var c=a;
               if(a==1)
              {
                //alert("aaa");
                //c=2;
                $('.delivery_form2').removeClass('show');
              }
              else
              {
               // c=1;
                $('.billing_form2').removeClass('show');
              }
              $("#address"+a+"_span").html("");
              $("#pincode_"+a+"_span").html("");
              $("#state_"+a+"_span").html("");
              $("#district_"+a+"_span").html("");

              $("#address_"+c).html(data.auto_data['address']);
              $("#pincode_"+c).html(data.auto_data['pincode']);
              $("#district_"+c).html(data.auto_data['district']);
              $("#state_"+c).html(data.auto_data['state']);
            }
            if(data.is_new=='new')
            {
              setTimeout(function(){
                window.location.reload(1);
              }, 1000);
            }
          }
          else if(data.msg=="f_1")
          {
               $("#ad_spin"+a).html('Add Address');
            $(".ad_btn").attr('disabled',false);
            error(data.data, 'danger');
          }
          else if(data.msg=="f_2")
          {
               $("#ad_spin"+a).html('Add Address');
            $(".ad_btn").attr('disabled',false);
            warning(data.data, 'attention');
          }
          else
          {
               $("#ad_spin"+a).html('Add Address');
            $(".ad_btn"+a).attr('disabled',false);
            error('Unknown Error Occoured #2442491', 'danger');
          }
        }
      });
    }
  }
  function same_as_address(a)
  {
      $(".sm_spin"+a).html('<i class="fa fa-spin fa-spinner"></i>');
        $(".sm_spin"+a).attr('disabled',true);
    //alert(a);
    if(a!="")
    {
      var form_data = new FormData();
      var csrfName = $('#csrf_token').val();
      var csrfHash = $('#csrf_hash').val();
      form_data.append(csrfName,csrfHash);
      form_data.append("id",a);
      $.ajax({
        url: base+"same_as_address",
        type:"post",
        data : form_data,
        dataType:'JSON',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
            if(a==1)
                $(".sm_spin"+a).html('Same as Delivery Address');
            else
                 $(".sm_spin"+a).html('Same as Billing Address');
        $(".sm_spin"+a).attr('disabled',false);
          //console.log(data);
          if(data.msg=="s_1")
          {
            success(data.data, 'good');
            setTimeout(function(){
              window.location.reload(1);
            }, 2000);
          }
          else if(data.msg=="f_1")
          {
            error(data.data, 'danger');
          }
          else if(data.msg=="f_2")
          {
            warning(data.data, 'attention');
          }
          else
          {
            error('Unknown Error Occoured #2442491', 'danger');
          }
        }
      });
    }
  }
  function update_address(a,b)
  {
    $("#spin1").show();
    $("#spin2").show();
    if(a!="" || b!="")
    {
      //var baseurl=$('#baseurl').val();
      var form_data = new FormData();
      var csrfName = $('#csrf_token').val();
      var csrfHash = $('#csrf_hash').val();
      form_data.append(csrfName,csrfHash);
      form_data.append("id",a);
      form_data.append("type",b);
      $.ajax({
        url: base+"update_address",
        type:"post",
        data : form_data,
        dataType:'JSON',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
        //alert(b);
          //console.log(data);
          if(data.msg=="s_1")
          {
            success(data.data, 'good');
            if(data.auto_data)
            {
              var c=1;
             // alert(a);
              if(b=='N1hrTkszRlk0ZitsV083N3FuKzI5QT09')
              {
                //alert("aaa");
                c=2;
                $('.delivery_form1').removeClass('show');
              }
              else
              {
                c=1;
                $('.billing_form1').removeClass('show');
              }
              $("#spin1").hide();
              $("#spin2").hide();
              $("#address_"+c).html(data.auto_data['address']);
              $("#pincode_"+c).html(data.auto_data['pincode']);
              $("#district_"+c).html(data.auto_data['district']);
              $("#state_"+c).html(data.auto_data['state']);
            }
          }
          else if(data.msg=="f_1")
          {
            error(data.data, 'danger');
          }
          else if(data.msg=="f_2")
          {
            warning(data.data, 'attention');
          }
          else
          {
            error('Unknown Error Occoured #2442491', 'danger');
          }
        }
      });
    }
  }

  function get_address(a)
  {

    if(a!="")
    { 
      $("#spin"+a).show();
      var form_data = new FormData();
      var csrfName = $('#csrf_token').val();
      var csrfHash = $('#csrf_hash').val();
      form_data.append(csrfName,csrfHash);
      form_data.append("id",a);
      $.ajax({
        url: base+"get_all_address",
        type:"post",
        data : form_data,
        dataType:'JSON',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data)
        {
      
         // console.log(data);
          if(data.msg=="s_1")
          {
            //simpleNotify.notify(data.data, 'good');
            $("#spin"+a).hide();
            $("#custom_message"+a).html(data.data);
            $("#content"+a).html(data.val);
          }
          else if(data.msg=="f_1")
          {
            error(data.data, 'danger');
          }
          else if(data.msg=="f_2")
          {
            warning(data.data, 'attention');
          }
          else
          {
            error('Unknown Error Occoured #2442491', 'danger');
          }
        }
      });
    }
  }