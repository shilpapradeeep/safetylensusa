    <script>

$(document).ready(function(){
    
    $('#thumb_image').val("");
    $('.numeric').keypress(function(evt) {
        if (evt.which < 48 || evt.which > 57)
        {
            evt.preventDefault();
        }
    });
    
    
    
});

function upload_grp_images(img_type)
{

    var baseurl=$('#baseurl').val();//
    
    var id = img_type+"_error";
    var pbar= img_type+"_pbar";
    $('#'+pbar).html('<div align="center"><img  src="'+baseurl+'/assets/back_end/images/load_img.gif" width="60" height="60"></div>');
  
    
    $('#'+id).html("");
    var file_grp=[];
    var str= "";
    var form_data = new FormData();
    form_data.append("type", img_type);
    form_data.append("<?php echo $this->security->get_csrf_token_name(); ?>", '<?php echo $this->security->get_csrf_hash(); ?>');
 
    var types = [ "jpeg", "jpg", "png", "bmp", "gif" ];
    var limit = $('#'+img_type).get(0).files.length;
    if(img_type=='cat_images')
    {

        limit=$('#'+img_type).get(0).files.length>3?3:limit;
        if($('.fileuploader-items ul li').size() >=3 )
        {
             $('#cat_images_error').html("Image number exceeds maximum limit.");
             $('#cat_images_pbar').html("");
             return;
        }
           
    }
    
         for (var i = 0; i < limit; ++i) 
            {

                    var flag=0;
                    var names = ($('#'+img_type).get(0).files[i].name);
                    var ext = names.split(".").pop();
                    if(jQuery.inArray( ext, types )<0)
                    {
                       flag = 1;
                       str = str +'<br><font color="red">Cannot upload '+names+' - File type not allowed.</font>' 
                    }
                    
                    else if(names.length>150)
                    {
                        flag = 1;
                        str = str +'<br><font color="red">Cannot upload '+names+' - Name length exceeds 150 characters.</font>';
                    }
                    else if(parseFloat($('#'+img_type).get(0).files[i].size)>1572864)//
                    {   
                        flag = 1;
                        str = str + '<br><font color="red">Cannot upload '+names+' - Size larger than 1.5 MB</font>';
                    }
                    if(flag == 0)
                    {
                       
                        form_data.append('files-'+i,  $('#'+img_type).get(0).files[i]); 
                        file_grp.push($('#'+img_type).get(0).files[i]);
                        
                    }
                    else
                        $('#'+id).html(str);
                 //}
               // else
               //  {
               //      str = '<br><font color="red">File No exceeds maximum!</font>';
               //      $('#'+id).html(str); 
               //      break;
               //  }
                
            }
            if(file_grp.length === 0 )
            {
                str = str +'<br><font color="red">No file to upload. Try again!</font>';
                $('#'+id).html(str); 
            }
            else
            {
                form_data.append("<?php echo $this->security->get_csrf_token_name(); ?>", '<?php echo $this->security->get_csrf_hash(); ?>');
                $.ajax({
                    url: baseurl + 'back_end/Image_controller/upload_filegroups',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success:function(result)
                    {  
                       
                        var list_id = img_type + '_list';
                        $("#"+list_id).append(result);
                        str = str +'<br><font color="green">File upload completed!</font>';
                        $('#'+id).html(str);
                        $('#'+pbar).html('');
                    }
                });
                
                

            }
    }
    
   

function select_thumb(id,type)
{
  
    var thumb= type +'_thumbnail';
    $('.product_edit_images').removeAttr("style","none");

    $('.'+type).css("border","none");
    $('#'+id).css("border","2px solid #4caf50");
    
    $('#'+thumb).val($('#'+id).attr('thumb-data'));
}
function delete_image(id,type)
{
    if(confirm("Are you sure?"))
    {
        var baseurl = $('#baseurl').val();
        
        var msgid = type+"_error";
        var image_item = $('#'+id).attr('thumb-data');
       
        $.ajax({
                url: baseurl + "delete-uploaded-files",
                type:"post",
               
                dataType:'JSON',
                data:{"image_id":id,"item":image_item,"image_type":type,'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
                success:function(result)
                {  
                
                
                 if(result.res=="1")
                  {
                        if($('#'+id).remove())
                        {
                            $('#'+msgid).html('<font color="green" >'+result.msg+'</font>');
                        }
                        
                    } 
                    else
                    {
                         
                         $('#'+msgid).html('<font color="red" >'+result.msg+'</font>');
                    }
                   
               }
           })
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
</script>