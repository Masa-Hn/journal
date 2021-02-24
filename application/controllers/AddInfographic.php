<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddInfographic extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->view('management_book/js/management_book');
        $this->load->database();
        $this->load->model('management');
        $this->load->model('InfographicModel');
        $this->load->model('SeriesModel');

        $config['upload_path'] = './assets/img/infographic';
        $config['allowed_types']='jpg|jpeg|gif|png';
        $config['max_size'] = 2000;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        
        if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
    }



    public function index()
    {
        $data['title'] = 'Add Infographic';
        $data['sections']=orm_infographic::find(array('section','COUNT(section) as num_of_infographics'),array(),array(),array('section'));

        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_infographic');
        $this->load->view('management_book/templates/footer');

    }//index
    
    public function add_infographic()
    {
        
        $this->load->helper('form');
     
        $a=$this->input->post('adress_info'); 
        if (! empty($_POST["new_section"])) {
         $section=$this->input->post('new_section');  
        }//if
        else{
          $section=$this->input->post('section');  
        }//else
        
        $d=$this->input->post('date');
        
        $this->upload->do_upload('info_pic');
        $image_data = $this->upload->data();  
        $infographic = new orm_infographic();   
        $infographic->set_title($a);
        $infographic->set_section($section);
        $infographic->set_pic($image_data['file_name']);
        $infographic->set_date($d);
        $infographic->save();
        $data['title'] = 'تمت الاضافة  بنجاح';  
        $data['info'] = 'تم إضافة صورة انفوجرافيك بنجاح';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/success',$data);
        $this->load->view('management_book/templates/footer');
        
    }//add_infographic
   
    public function add_series_form()
    {
        $data['title'] = 'Add Series';
        $data['sections']=$this->InfographicModel->getSections();

        $this->load->view('management_book/templates/header');
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_series_form',$data);
        $this->load->view('management_book/templates/footer');
 
    }//add_series_form

    public function add_series()
    {
        $this->load->helper('form');
        if (! empty($_POST["new_section"])) {
          $section=$this->input->post('new_section');
        }//if
        else{
          $section=$this->input->post('section');
        }//else

        $title=$this->input->post('title');

        $config['upload_path'] = './assets/img/infographic';
        $config['allowed_types']='jpg|jpeg|gif|png';
        $config['max_size'] = 2000;
        $config['encrypt_name'] = TRUE;
        $this->load->helper('form');
        $this->upload->do_upload('first_pic');
        $image_data = $this->upload->data();  
        $i=$image_data['file_name'];
        
        // Count total files
        $countfiles = count($_FILES['files']['name']);

        $this->load->library('upload', $config);  
        $series_id= $this->SeriesModel->insertSeries($title,$i,$countfiles);  

        
        // Looping all files
        for($i=0;$i<$countfiles;$i++){
          if(!empty($_FILES['files']['name'][$i])){
            // Define new $_FILES array - $_FILES['file']
            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
            $_FILES['file']['size'] = $_FILES['files']['size'][$i];
              

            $config['upload_path'] = './assets/img/infographic';
            $config['allowed_types']='jpg|jpeg|gif|png';
            $config['max_size'] = 2000;
            $config['encrypt_name'] = TRUE;
            $config['file_name'] = $_FILES['files']['name'][$i];

            $this->load->library('upload', $config);
            if($this->upload->do_upload('file')){
              // Get data about the file
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
            
                //$title,$pic,$section,$series_id
              $this->InfographicModel->insertBySeries($title,$filename,$section,$series_id);  
            }//if
          }//if
        }//for
        
        $data['title'] = 'تمت الاضافة  بنجاح';   
        $data['info'] = 'تم إضافة سلسلة جديدة بنجاح';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/success',$data);
        $this->load->view('management_book/templates/footer');
  }//add_series
    
}//class