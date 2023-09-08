$(document).ready(function(){
    $('.add-cart-no-pres').click(function(){
        
        
        if($('#pv_id').val()==null || $('#pv_id').val()=='')
        {
            error('Please Choose frame size');
        }
        else
        {
            var base=$('#base').val();
            var token=$('#csrf_token').val();
            var hash=$('#csrf_hash').val();
        
            var lc = new FormData();
            lc.append(token,hash);
            lc.append('pr_id',$('#pr_id').val());
            lc.append('pv_id',$('#pv_id').val());
            lc.append('p_qty',$('#p_qty').val());
            lc.append('additional_charge',$('#additional_charge').val());
            lc.append('delivery_charge',$('#delivery_charge').val());
            lc.append('no_prec',true);
        

            $.ajax({
                url : base+'addToCart',
                type : 'post',
                data : lc,
                dataType : 'json',
                processData: false,
                contentType: false,
                cache: false,
                success:function(data)
                {
                    console.log(data);
                     
                        if(data.res==1)
                        {
                            window.location = base+data.url;
                        }
                }
        });
        }
        
    })
    $('#cartForm').submit(function(event){
        event.preventDefault();
        
            // $(".add-to-cart").prop('disabled',true);
            // $(".add-to-cart").html('<i class="fa fa-spin fa-spinner"></i> Add to cart');
            
            var form_data = $("#cartForm").serialize();
            var baseurl= $('#base').val();
          
             $.ajax({
                type:'POST',
                url:baseurl+'addToCart',
                data : form_data,
                // cache: false,
                // contentType: false,
                // processData: false,
                dataType:'json',
                success:function(data)
                { 
                    console.log(data);
                    $(".add-to-cart").removeAttr('disabled');
                    $(".add-to-cart").html('Add to cart');
                    if(data.res==1)
                    {
                        window.location = baseurl+data.url;
                    }
                }
            });
     

    })
    $('.select-lens').click(function(){
        var pr_id = $(this).attr('pr_id');
        var pv_id = $('#pv_id').val();
        var p_qty = $('#p_qty').val();
        
        if(pv_id=='' || pv_id==null)
        {
            error('Please Choose frame size');
        }
        else
        {
            var base  = $('#base').val();
            
            window.location = base+'select-lens?product='+pr_id+'&size='+pv_id+'&qty='+p_qty;
        }
        
    })
     $('.product-variantion').click(function(){
        var pv_id = $(this).attr('pv-id');
        $('#pv_id').val(pv_id);
        $('.product-variantion').removeClass('product-variantion-choosed');
         $('.pv-'+pv_id).addClass('product-variantion-choosed');
        
        
    })
    
    $('#orderby').change(function(){
        var v = $(this).val();
       
        var base  = $('#base').val();
        var getUri  = $('#getUri').val();
        var get_param  = $('#getParams').val();
        if(getParams=='' || getParams==null)
        {
            var urlToGo = 'sort='+v;
        }
        else
        {
            var urlToGo = get_param+'&sort='+v;
        }
        window.location = base+getUri+'?'+urlToGo;
    })
     $('#count').change(function(){
        var v = $(this).val();
       
        var base  = $('#base').val();
        var getUri  = $('#getUri').val();
        var get_param  = $('#getParams').val();
        if(getParams=='' || getParams==null)
        {
            var urlToGo = 'per_page='+v;
        }
        else
        {
            var urlToGo = get_param+'&per_page='+v;
        }
        window.location = base+getUri+'?'+urlToGo;
    })
    $(document).on("click",".cart-delete",function() {
        var item = $(this).attr('item');
        
        var base=$('#base').val();
            var token=$('#csrf_token').val();
            var hash=$('#csrf_hash').val();
           
            var lc = new FormData();
            lc.append(token,hash);
            lc.append('item',item);
           

            $.ajax({
                url : base+'delete-cart',
                type : 'post',
                data : lc,
                dataType : 'json',
                processData: false,
                contentType: false,
                cache: false,
                success:function(data)
                {
                   
                   console.log(data);
                   
                    if(data.res==1)
                    {
                        success(data.msg);
                        $('#mainCartDiv').html(data.cartDiv);
                        $('#menuCart').html(data.menuCartDiv);
                        
                        //setTimeout(function(){ location.reload(); }, 900);
                    }
                    else
                    {
                        error('Something went wrong');
                    }
                }
            });
    }); 
    $(document).on("click",".to-wishlist111",function() {
        var pr_id = $(this).attr('pr_id');
       
        var title = $(this).attr('pr_title');
        var wlist = getCookie('myWishlist');
        var flag=false;
        if(wlist!='')
        {
            var w=wlist.split(',');
           
            for(var key in w)
            {
                
                if(w[key]==pr_id)
                {
                    flag=true;
                    break;
                }
            }
            if(flag)
            {
                w.splice(key,1);
               
                
                document.cookie="myWishlist="+w+"; path=/";
                $('.'+pr_id).remove();
                success(title+' removed from wishlist.');

            }
            else
            {
               $('.'+pr_id).remove();
                success(title+' removed from wishlist.');
            }
        }
        else
        {
           $('.'+pr_id).remove();
            success(title+' removed from wishlist.');
        }
       var numItems = $('#wishlistDiv').children('.product-layout').length;
       if(numItems==0)
       {
       		$('#wishlistDiv').html('<div class="col-md-3"></div><div class="col-md-6"><div class="alert alert-info">'+
                    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                      '<i class="fa fa-times"></i> <strong>Sorry!</strong> No products found in the wishlist!!'+
                    '</div></div>');
       }
    }); 
})
$(document).on('click','.to-wishlist',function(e){
   
        
       
    var pr_id = $(this).attr('pr_id');
       
    var title = $(this).attr('pr_title');
    var wlist = getCookie('myWishlist');
    var flag=true;
    if(wlist!='')
    {
        var w=wlist.split(',');
        for(var key in w)
        {
            
            if(w[key]==pr_id)
            {
                flag=false;
                break;
            }
        }
        if(flag)
        {
            w.push(pr_id);
            $(this).find('a').addClass('active');
            $(this).removeClass('to-wishlist');
            $(this).addClass('in-whishlist');
            document.cookie="myWishlist="+w+"; path=/";
            success(title+' added to wishlist.');
        }
        else
        {
            
            w.splice(key, 1);
            $(this).find('a').removeClass('active');
            $(this).removeClass('to-wishlist');
            $(this).addClass('in-whishlist');
            document.cookie="myWishlist="+w+"; path=/";
            success(title+' removed from wishlist.');
        }
    }
    else
    {
        var w=[];
        w.push(pr_id);
        document.cookie="myWishlist="+w+"; path=/";
        $(this).find('a').addClass('active');
        $(this).removeClass('to-wishlist');
        $(this).addClass('in-whishlist');
        success($('.product-title').html()+' added to wishlist.');
    }
   
   
   
    
})
$(document).on('click','.in-whishlist',function(e){

    
   
    var vid = $(this).attr('pr_id');
   
    var title = $(this).attr('pr_title');
    var wlist = getCookie('myWishlist');
    var flag=false;
    if(wlist!='')
    {
        var w=wlist.split(',');
        for(var key in w)
        {
            
            if(w[key]==vid)
            {
                flag=true;
                break;
            }
        }
        if(flag)
        {
            w.splice(key,1);
           
            $(this).find('a').removeClass('active');
            $(this).removeClass('in-whishlist');
            $(this).addClass('to-wishlist');
            document.cookie="myWishlist="+w+"; path=/";
            success(title+' removed from wishlist.');
        }
        else
        {
            
            $(this).find('a').removeClass('active');
            $(this).removeClass('in-whishlist');
            $(this).addClass('to-wishlist');
            success(title+' removed from wishlist.');
        }
    }
    else
    {
        $(this).find('a').removeClass('active');
        $(this).removeClass('in-whishlist');
        $(this).addClass('to-wishlist');
        success(title+' removed from wishlist.');
    }
   
   
   
    
})
function success(msg)
{
$.toast({
heading: 'Welll done!',
text: msg,
showHideTransition: 'slide',
icon: 'success'
})
}
function error(msg)
{
$.toast({
heading: 'Sorry!',
text: msg,
showHideTransition: 'slide',
icon: 'error'
})
}
function info(msg)
{
$.toast({
heading: 'Hello!',
text: msg,
showHideTransition: 'slide',
icon: 'info'
})
}
function warning(msg)
{
$.toast({
heading: 'Hello!',
text: msg,
showHideTransition: 'slide',
icon: 'warning'
})
}
function getCookie(cname) 
{
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
function load_wishlist()
{
$("#spin").show();
            $(".con-btn").hide();
            
            var form_data = new FormData();
            var baseurl= $('#base').val();
            var token = $('#token').val();
             var hash = $('#hash').val();
            form_data.append(token,hash);
            var wlist = getCookie('myWishlist');
            alert(wlist);
            form_data.append("wlist",wlist);

       $.ajax({
            type:'POST',
            //dataType:'json',
            url:baseurl+'load-wishlist-action',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data)
            { 
          
                
            }
        }); 


}