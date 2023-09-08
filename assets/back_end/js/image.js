
$(document).ready(function(){
 
})
function remove_img(item,path,remdiv)
{
  var baseurl=$('#baseurl').val();
  var form_data = new FormData();
  var csrfName = $('#csrf_token').val(),
      csrfHash = $('#csrf_hash').val();
      form_data.append(csrfName,csrfHash);
      form_data.append("item",item);
      form_data.append("path",path);
      form_data.append("remdiv",remdiv);
      $.ajax({
                url: baseurl+"delete-image",
                type:"post",
                dataType:'json',
                data:form_data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(result)
                {  
                  if(result.res==1)
                  {
                   
                     $('#'+remdiv).remove();
                      success(result.msg);
                  } 
                  else
                  {
                        error(result.msg);
                  }
                   
               }
          });
}
function select_thumb(value,id)
{
  $(".fileuploader-items>ul>li").attr("style",'');
    $('#'+id).attr("style",'border: 3px solid #28a745;border-radius: 10px;');
    $('#images_thumbnail').val(value);
     //  error('Thumbnail selected');
}
function upload_grp_images(data,item)
{
    var baseurl=$('#baseurl').val();
    var msg="";
    $('#progressbar').html('<div align="center"><img  src="'+baseurl+'assets/back_end/images/load_img.gif" width="70" style="padding:10px"></div>');
    $('#file_msg').html("");
    var numItems = $(".fileuploader-items-list li");
    var count=numItems.length;
    console.log(count);
    var str=$('#all_images').val();
    if(count>=5)
    {
        msg="Only 5 files are allowed to be uploaded.";
        $('#progressbar').html("");
         error(msg);
    }
    else
    {
       
        var form_data = new FormData();
        var len=data.length;
         
        if(len>=1)
        {

          
         // console.log(count);
            var temp_count = len + count;
            var form_data = new FormData(); 

         for(i=0;i<len;i++)
         {
          
            var flag=0;
            if(parseInt(i+count)<5 )
            {
             
               if(!$.isEmptyObject(data[i]))
               {
                  if(parseFloat(data[i].size)>4572864)//
                  {   var name=data[i]['name'];
                    
                       $('#progressbar').html("");
                       msg= 'Please Upload file upto 4.5 MB';
                      flag=1;
                  }
                  if(data[i]['name'].length>150)
                  {
                     
                      $('#progressbar').html("");
                       msg="File name must be less than 150 characters.";
                      
                        flag=1;
                  }
                  if(flag==0)
                  {

                      form_data.append('file-'+i,  data[i]); 
                  }
                  else
                  {

                       error(msg);
                  }
                }
            }
            else
            {
                   msg="Only 5 files are allowed to be uploaded.";
                    error(msg);
                   break;
            }

         }
         var csrfName = $('#csrf_token').val(),
             csrfHash = $('#csrf_hash').val();
            form_data.append(csrfName,csrfHash);
            form_data.append('item',item);
            ajax_fun(form_data,item);
        }
        else
        {
          msg="Choose images to upload";
          $('#progressbar').html("");
           error(msg);
        }
        
      }
       
}
function ajax_fun(form_data,item)
{

    var baseurl=$('#baseurl').val();
	$.ajax({
            url: baseurl+'upload-images',
            type:"post",
            dataType:'json',
            data:form_data,
            cache: false,
			      contentType: false,
			      processData: false,

                success:function(result)
                {  
                   console.log(result);
                   $('#progressbar').html(' ');
                	if(result.msg==1)
                    {
                    	var str="";
                    	if($.isEmptyObject(result.data))
						{
							 warning('Something went wrong! Try again.');
						}
						else
						{
							var images = result.data;
							for(var key in images)
							{
								var v = baseurl+images[key]['filepathfull'];
								if(item=="files")
								{
									var numItems = $(".fileuploader-items-list li");
									var count=numItems.length;
									var div_id="img_list_"+(count+1);
									if($("#" + div_id).length > 0) 
									{
									   div_id="img_list_"+(count+1+100);
									}
								}
								else
								{
									var div_id=item+"_list1";
								}
						   
								var thumb = "'"+images[key]['filepath']+"'";
								var thumb_divid = "'"+div_id+"'";
								var divid = item+"-images_list";
								var input_item = item+"_input";
								var del_args = "'"+item+"','"+images[key]['filepath']+"','"+div_id+"'";
								if(item=="up_file" || item=="preview_img")
								{
									
								  str='<li id="'+div_id+'" class="fileuploader-item file-has-popup file-type-image file-ext-jpg">'+
										  '<div class="columns">'+
											'<div class="column-thumbnail">'+
											  '<div class="fileuploader-item-image">'+
												'<img src="'+v+'" width="48" height="36">'+
												 '<input type="hidden" name="'+input_item+'[]" value="'+images[key]['filepath']+'">'+
											  '</div>'+
											  '<span class="fileuploader-action-popup"></span>'+
											'</div>'+
											'<div class="column-title"><div title="Hydrangeas.jpg">'+images[key]['filename']+'</div><span>'+images[key]['filesize']+' KB</span></div>'+
											'<div class="column-actions">'+
											  '<a class="fileuploader-action fileuploader-action-remove" onclick="remove_img('+del_args+')" title="Remove"><i></i></a>'+
											'</div>'+
										  '</div>'+
										  '<div class="progress-bar2"><span></span></div>'+
										  '</li>';
										  $('#'+divid).html(str);
								}
								else
								{
							   
									str='<li onclick="select_thumb('+thumb+','+thumb_divid+')" class="fileuploader-item file-type-image file-ext-jpg" id="'+div_id+'">'+
									'<div class="fileuploader-item-inner">'+
									'<input type="hidden" name="'+input_item+'[]" value="'+images[key]['filepath']+'">'+
									  '<div class="thumbnail-holder">'+
										  '<div class="fileuploader-item-image fileupload-no-thumbnail"><img src="'+v+'" >'+
										  '</div>'+
									  '</div>'+
									'<div class="actions-holder"><a onclick="remove_img('+del_args+')" class="remove-btn" title="Remove">'+
									'<i class="fa fa-trash icon-style"></i></a>'+
									  '</div>'+
										'</div>'+
									'</li>';
									$('#'+divid).append(str);
								}
								count++;
							}
						   
							$('#progressbar').html("");
							if($.isEmptyObject(result.error))
							{
								
								var msg="File uploaded.";
							     success(msg);
							}
							else
							{
								 warning(result.error);
							}
						}  
						
						
    				}
                    else
                    {
                       error(result.error);
                    }
                 
               }
          });
   
}
function replace_comma(str)
{
    if (str.match(/,.*,/)) 
    { // Check if there are 2 commas
        str = str.replace(',', ''); // Remove the first one
    }
    return str;
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
