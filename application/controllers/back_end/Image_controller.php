<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Image_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        
        $this->load->library('session');
       
        $this->load->model('HomeDb');
        date_default_timezone_set('Asia/Kolkata');
        /*$this->load->helper(array('grace_authenticate','file'));
        authenticate();  */
    }
   
    public function upload_filegroups()
    {

        if($this->input->is_ajax_request()) 
        {
            $type=$this->input->post('type');
            $files=$this->input->post('files');
            $path='uploads/';
             if($this->session->userdata($type))
             {
                $image_sess = $this->session->userdata($type);
                $imagecount= count($image_sess);
             }
                
            else
                    $imagecount=0;
            $uploadPath = './'.$path;
            $data_img_id=array();
            if (!is_dir($uploadPath))
            {
                mkdir($uploadPath, 755, TRUE);
            }
            if($type == 'product_images' || $type== 'product_edit_images')
            {
                $temp_path=date("Y").'/'.date("m").'/';
                $path = $path.$temp_path;
                $uploadPath = './'.$path;
                 
            }
            elseif($type == 'cat_images')
            {
                $temp_path='category'.'/';
                $path = $path.$temp_path;
                $uploadPath = './'.$path;
            }
            elseif($type=="subcat_images")
            {
                $temp_path='subcategory'.'/';
                $path = $path.$temp_path;
                $uploadPath = './'.$path;
            }
            if (!is_dir($uploadPath))
            {
                mkdir($uploadPath, 755, TRUE);
            }  
            
           

            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
           
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $file_data=array();
            $image_id=array();
            $i=$imagecount+1;

           foreach($_FILES as $n)
           {
                $_FILES['userFile']['name'] = preg_replace('/\s+/', '-',$n['name']);
                $_FILES['userFile']['type'] = $n['type'];
                $_FILES['userFile']['tmp_name'] = $n['tmp_name'];
                $_FILES['userFile']['error'] = $n['error'];
                $_FILES['userFile']['size'] = $n['size'];
                if ($n["error"] <= 0) 
                {
                    if($this->upload->do_upload('userFile'))
                    {
                        
                        $fileData = $this->upload->data();
                        $uploadData =  $uploadPath.$fileData['file_name'];
                        $file_data[]=$temp_path.$fileData['file_name'];
                    }
                }
                $i++;
            }
          
          
            if(!empty($file_data))
            {
                if($this->session->userdata($type))
                {
                    $image_sess = $this->session->userdata($type);
                    $image_sess = array_merge( $image_sess, $file_data);
                }
                else
                    $image_sess = $file_data;
                $this->session->set_userdata($type, $image_sess);
                $item_id = count($image_sess)+1;
                foreach($file_data as $index=>$f)
                {
                    
                    $pimg = $f;
                     

                    $image=base_url().'uploads/'.$pimg;
                    $arg="'".$type."'";
                    if($type == 'product_images' || $type== 'product_edit_images')
                    {
                         print('<li onclick="select_thumb('.$item_id.','.$arg.')" thumb-data = "'.$pimg.'" class="fileuploader-item file-type-image file-ext-jpg '.$type.'" id="'.$item_id.'">');
                    }
                   else
                   {
                         print('<li  thumb-data = "'.$pimg.'" class="fileuploader-item file-type-image file-ext-jpg '.$type.'" id="'.$item_id.'">');
                   }
                    print('<div class="fileuploader-item-inner">
                                <div class="thumbnail-holder">
                                    <div class="fileuploader-item-image fileupload-no-thumbnail"><img src="'.$image.'">
                                    </div>
                                </div>
                    <div class="actions-holder"><a onclick="delete_image('.$item_id.','.$arg.')" class="fileuploader-action fileuploader-action-remove" title="Remove"><i class="remove"></i></a>
                                </div>
                            </div>
                        </li>');
                    $item_id = $item_id+1;
                }

            }
            else
            {
               foreach($file_data as $f)
               {
                    unlink('./'.$f); 
               }
            }
        }
        
    }
    public function delete_file()
    {
        if ($this->input->is_ajax_request()) 
        {

            $image=$this->input->post('image_id');
            $type=$this->input->post('image_type');
            $item=$this->input->post('item');
            $imgarray[]=  $image;
            $result=$this->session->userdata($type);
            $path = 'uploads/';

            if(!empty($result))
            {
               if (($key = array_search($item, $result)) !== false) 
               {

                    unset($result[$key]);
                    if(file_exists('./'.$path.$item))
                    {  
                        
                        unlink($path.$item); 
                    }
                    $image_sess = array_values($result);
                    $this->session->set_userdata($type,$image_sess);
                    echo json_encode(array("res"=>1,"msg"=>"Image Deleted Sucessfully"));
                }
                else
                echo json_encode(array("res"=>2,"msg"=>"No image exist to delete"));
            }
           else
            echo json_encode(array("res"=>2,"msg"=>"No image exist to delete"));
        }    
    }
}