<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddActivity extends CI_Controller {
    
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
       $data['title'] = 'Add Activity';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_activity');
        $this->load->view('management_book/templates/footer');
       
       
    

    }
    
    public function add_activity()
    {
         

        $this->load->helper('form');
        
     
        $a=$this->input->post('activity_name');  
        $n=$this->input->post('copy');
      
        $id= $this->management->saveactivity($a,$n);  


      // Count total files
      $countfiles = count($_FILES['files']['name']);
 
      // Looping all files
      for($i=0;$i<$countfiles;$i++){
 
        if(!empty($_FILES['files']['name'][$i])){
 
          // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
          

         $config['upload_path'] = './assets/img/certificate';
         $config['allowed_types']='jpg|jpeg|gif|png';
         $config['max_size'] = 2000;
         $config['encrypt_name'] = TRUE;
        $config['file_name'] = $_FILES['files']['name'][$i];

        $this->load->library('upload', $config);
    if($this->upload->do_upload('file')){
            // Get data about the file
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
         $this->management->savecertificate($id,$filename);  

        }
    }
}
       
        $data['info'] = 'تم إضافة نشاط (إنجاز) جديد بنجاح';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/success',$data);
        $this->load->view('management_book/templates/footer');
    }
    }