<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddArticle extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->view('management_book/js/management_book');
        $this->load->database();
        $this->load->model('management');
        
        if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
    }



 public function index()
    {
         if($this->uri->segment(3)){
            $id = $this->uri->segment(3);
            $data['article']  = Orm_article::get_instance($id);
            //$this->books->getbook($id);
        } 
       $data['title'] = 'Add Article';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_article',$data);
        $this->load->view('management_book/templates/footer');
       
       
    

    }
    
    public function add_article()
    {
         

         $config['upload_path'] = './assets/img/article';
         $config['allowed_types']='jpg|jpeg|gif|png';
         $config['max_size'] = 2000;
         $config['encrypt_name'] = TRUE;
        $this->load->helper('form');
        
        $this->load->library('upload', $config);
     
        $a=$this->input->post('article');  
        $n=$this->input->post('article_name');
        $w=$this->input->post('writer');
        $d=$this->input->post('date');
     
        $this->upload->do_upload('article_img');
        $image_data = $this->upload->data();  
        $i=$image_data['file_name'];
        $inserted=new Orm_article();
        $inserted->set_title($n);
        $inserted->set_writer($w);
        $inserted->set_article($a);
        $inserted->set_date($d);
        $inserted->set_pic($i);

        if ($inserted->save()) {
       $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم إضافة المقال بنجاح</div>");
        redirect(base_url().'AddArticle/index');
        }else{

            $this->session->set_flashdata('msg',"<div class='alert alert-danger' style='text-align:right'>خطأ</div>");
            redirect(base_url().'AddArticle/index');
        }
    }

     public function update(){
       $config['upload_path'] = './assets/img/article';
         $config['allowed_types']='jpg|jpeg|gif|png';
         $config['max_size'] = 2000;
         $config['encrypt_name'] = TRUE;
        $this->load->helper('form');
        
        $this->load->library('upload', $config);
     
        $a=$this->input->post('article');  
        $n=$this->input->post('article_name');
        $w=$this->input->post('writer');
        $d=$this->input->post('date');
        $aid=$this->input->post('aid');
        $this->upload->do_upload('article_img');
        $image_data = $this->upload->data();  
        if ($image_data)
        $i=$image_data['file_name'];
        $updated=Orm_article::get_instance($aid);
        $updated->set_title($n);
        $updated->set_writer($w);
        $updated->set_article($a);
        $updated->set_date($d);
        if ($i)
        $updated->set_pic($i); 
        
            if ($updated->save()){
            $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم تعديل المقال بنجاح</div>");
            redirect(base_url().'AddArticle/index/'.$id);
        }else{

            $this->session->set_flashdata('msg',"<div class='alert alert-danger' style='text-align:right'>خطأ</div>");
            redirect(base_url().'AddArticle/index/'.$id);
        }
    }
    }