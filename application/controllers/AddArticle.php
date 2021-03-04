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
       $data['title'] = 'إضافة مقال';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_article');
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
        //article text
        $a=$this->input->post('article');  
        //article title
        $n=$this->input->post('article_name');
        //name of the article writer
        $w=$this->input->post('writer');
        //date of the article
        $d=$this->input->post('date');
     
        $this->upload->do_upload('article_img');
        $image_data = $this->upload->data();
        //article image  
        $i=$image_data['file_name'];

        //save the article to the database
        $article_orm = new Orm_Article();
        $article_orm->set_article($a);
        $article_orm->set_title($n);
        $article_orm->set_writer($w);
        $article_orm->set_date($d);
        $article_orm->set_pic($i);
        $article_orm->save(); 
        
        $data['info'] = 'تم إضافة المقال بنجاح';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/success',$data);
        $this->load->view('management_book/templates/footer');
    }
    }