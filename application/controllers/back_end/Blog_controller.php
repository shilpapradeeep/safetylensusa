<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_controller extends CI_Controller
{
    public function add_page()
    {
        $data['css']= css_link();
        $data['js'] = js_link();

        $data['js']=array_merge($data['js'],js_datatable());
        $data['css']=array_merge($data['css'],css_datatable());

        $css = array(
            'libs/fileuploads/css/dropify.css',
            'libs/dropzone/min/dropzone.min.css',
            'libs/summernote/summernote-bs4.min.css',
        );
        $js = array(
            "libs/dropzone/min/dropzone.min.js",
            "libs/fileuploads/js/dropify.js",
            "libs/fileuploads/js/fileupload.js",

            'libs/summernote/summernote-bs4.min.js',
            'js/pages/form-editor.init.js',
            'js/blog.js',
            'js/common.js',
        );
        $data['css']=array_merge($data['css'],$css);
        $data['js']=array_merge($data['js'],$js);

        $data['bread_crum']=array(0=>'Dashboard',
            1=>'javascript:void(0)',
            2=>'Blog Add',
            3=>'javascript:void(0)',
        );
        $this->load->view('back_end/blog_add',$data);

    }



    public function submit_blog()
    {
        isajax();
        $this->form_validation->set_message('required','Please Enter %s');
        $this->form_validation->set_message('is_unique','%s already exist.');
        $this->form_validation->set_rules('b_title','Title','trim|required');
        $this->form_validation->set_rules('b_content','Content','trim|required');
        $this->form_validation->set_rules('b_summary','Summary','trim|required|min_length[3]|max_length[100]');

        $this->form_validation->set_rules('b_seo_title','SEO Title','trim|min_length[3]|max_length[55]');
        $this->form_validation->set_rules('b_slug','Slug','trim|min_length[3]|max_length[55]');
        $this->form_validation->set_rules('b_seo_keywords','SEO Keywords','trim|min_length[3]|max_length[1000]');
        $this->form_validation->set_rules('b_seo_description','SEO Description','trim|min_length[3]|max_length[1000]');

        $this->form_validation->set_rules('blog_img_temp','Image','trim|required', array('required' => 'Please Select %s'));



        if($this->form_validation->run())
        {

            $data['b_title'] = noHtml($this->input->post('b_title'));
            $data['b_summary'] = $this->input->post('b_summary');
            $data['b_content'] = $this->input->post('b_content');
            $data['b_img'] = noHtml($this->input->post('blog_img_temp'));

            $data['b_seo_title'] = noHtml($this->input->post('b_seo_title'));

            $data['b_slug'] = noHtml($this->input->post('b_slug'));
            $data['b_seo_keywords'] = $this->input->post('b_seo_keywords');
            $data['b_seo_description'] = $this->input->post('b_seo_description');


            if(empty($this->input->post('b_id')))
            {

                $l_id = $this->HomeDb->insert($data,"b_blog");
                if(!empty($l_id))
                {
                    $res = array("res"=>1,"msg"=>"Blog Added Successfully");
                }
                else
                    $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421130");
                // lq();
            }
            else
            {
                $b_id = sec($this->input->post('b_id'),'d');
                if(is_numeric($b_id))
                {
                    $tdata= $this->HomeDb->getDetailedData(array('*'),'b_blog',array("b_id"=>$b_id,"b_status"=>'1'));

                    if(!empty($tdata))
                    {
                        if($this->HomeDb->update($data,"b_blog",array("b_id"=>$b_id)))
                        {
                            $res = array("res"=>1,"msg"=>"Blog Edited Successfully");
                        }
                        else
                            $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
                    }
                    else
                        $res = array("res"=>0,"msg"=>"Invalid Blog choosed.");
                }
                else
                    $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421134");
            }
        }
        else
        {
            $errors = $this->form_validation->error_array();
            $res = array("res"=>0,"errors"=>$errors);
        }
        echo json_encode($res);
    }

    public function blog_tbl()
    {
        isajax();
        $data['blog_list'] = $this->blog_lst();
        if (!empty($data['blog_list'])) {
            $this->load->view('back_end/table/blog_tbl',$data);
        }
        else
        {
            echo '<div class="row"><div class="col-12 text-center">No Data Found.</div></div>';
        }
    }

    public function blog_lst($id=null)
    {
        if (!empty($id))
        {
            $select = array('b_id','b_title','b_content','b_img','b_summary','b_seo_title','b_slug','b_seo_keywords','b_seo_description');
            $cond = array('b_status'=>'1','b_id'=>$id);
        }
        else
        {
            $select = array('b_id','b_title','b_added');
            $cond = array('b_status'=>'1');
        }
        $data=$this->HomeDb->getDetailedData($select,'b_blog',$cond,null,null,array('b_id','desc'));
        return $data;
    }

    public function edit_blog()
    {
        $id = sec($this->input->post('id'),'d');
        if(!empty($id) && is_numeric($id))
        {
            $data = $this->blog_lst($id);
            // lq();
            if (!empty($data))
            {
                if ( !empty($data[0]->b_img) &&  file_exists( FCPATH.'assets/uploads/blog/'.$data[0]->b_img) )
                    $img1 = thumb(b('assets/uploads/blog/').$data[0]->b_img,430,200);
                else
                    $img1 = thumb(repo().'uploads/no-image.jpg',316,200);

               //     tsi($data);
                $arr_val = array(
                    'b_id'=>sec($data[0]->b_id),
                    'b_title'=>$data[0]->b_title,
                    'b_summary'=>$data[0]->b_summary,
                    'b_content'=>$data[0]->b_content,
                    'b_seo_title'=>$data[0]->b_seo_title,
                    'b_slug'=>$data[0]->b_slug,
                    'b_seo_keywords'=>$data[0]->b_seo_keywords,
                    'b_seo_description'=>$data[0]->b_seo_description,
                    'b_img'=>$data[0]->b_img,
                    'b_img_full'=>$img1,
                );

                $res = array('res'=>'1','data'=>$arr_val);
            }
            else
            {
                $res = array('res'=>'0','msg'=>"Something went Wrong! Error Code #5421134");
            }
        }
        echo json_encode($res);
    }

    public function delete_member()
    {
        $b_id = sec($this->input->post('id'),'d');
        $data['b_status'] = "2";

        if(!empty($b_id) && is_numeric($b_id))
        {

            $tdata= $this->HomeDb->getDetailedData(array('*'),'b_blog',array("b_id"=>$b_id,"b_status"=>'1'));

            if(!empty($tdata))
            {

                if($this->HomeDb->update($data,"b_blog",array("b_id"=>$b_id)))
                {
                    $res = array("res"=>1,"msg"=>"Blog deleted Successfully");
                }
                else
                    $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
            }
            else
                $res = array("res"=>0,"msg"=>"Invalid Blog choosed.");
        }
        else
        {
            $res = array("res"=>0,"msg"=>"Something went Wrong! Error Code #5421133");
        }
        echo json_encode($res);
    }

}
