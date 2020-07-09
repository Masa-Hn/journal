<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddArticle extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->view('management_book/js/management_book');
        $this->load->database();
        $this->load->model('management');
    }



 public function index()
    {
       $data['title'] = 'Add Article';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_article');
        $this->load->view('management_book/templates/footer');
       
       
    

    }
    
    public function add_article()
    {
         

         $config['upload_path'] = './assets/article_img';
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
        $this->management->savearticle($n,$w,$d,$a,$i);  
        
        $data['title'] = 'Article Added Successfully';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/success_article');
        $this->load->view('management_book/templates/footer');
    }
    }