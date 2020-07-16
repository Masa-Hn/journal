<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddInfographic extends CI_Controller {
    
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
       $data['title'] = 'Add Infographic';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_infographic');
        $this->load->view('management_book/templates/footer');
       
       
    

    }
    
    public function add_infographic()
    {
         

         $config['upload_path'] = './assets/img/infographic';
         $config['allowed_types']='jpg|jpeg|gif|png';
         $config['max_size'] = 2000;
         $config['encrypt_name'] = TRUE;
        $this->load->helper('form');
        
        $this->load->library('upload', $config);
     
        $a=$this->input->post('adress_info');  
        $d=$this->input->post('date');
        
        $this->upload->do_upload('info_pic');
        $image_data = $this->upload->data();  
        $i=$image_data['file_name'];
        $this->management->save_infographic($a,$d,$i);  
        
        $data['info'] = 'تم إضافة صورة انفوجرافيك بنجاح';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/success',$data);
        $this->load->view('management_book/templates/footer');
        
    }
    }