<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_book extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->view('management_book/js/management_book');
        $this->load->database();
        $this->load->model('management');
        $this->load->model('ActivitiesModel');
        $this->load->model('CertificateModel');
        
        if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
    }//end construct()
	public function index()
	{
        $data['title'] = 'Management Book';
		$this->load->view('management_book/templates/header', $data);
        //$this->load->view('books_rack/templates/header');

        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/management');
        $this->load->view('management_book/templates/footer');
	}
    
   
    
    public function show_article()
    {
                $this->load->helper('form');

       if(isset($_POST['delete'])){
            $id=$this->input->post('id');
           $this->management->delete_article($id);
 $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم حذف المقال بنجاح</div>");
            redirect(base_url().'Management_book/show_article');

                    }
         $data['title'] = 'Show Article';
         $articles=$this->management->get_articles();
         $num=$articles->num_rows();
         $data['num_rows']=$num;
         $data['articles']=$articles;
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_article',$data);
        $this->load->view('management_book/templates/footer');
    }
    
   
    public function show_activities()
    {
        $this->load->helper('form');

       // if(isset($_POST['delete'])){
       //      $id=$this->input->post('id');
       //      $this->management->delete_article($id);
       //      $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم حذف المقال بنجاح</div>");
       //      redirect(base_url().'Management_book/show_article');

       //  }//if
        $data['title'] = 'Show Activites';
        $activites=$this->ActivitiesModel->getActivities();
        $data['num_rows']=count($activites);
        $data['activites']=$activites;
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_activites',$data);
        $this->load->view('management_book/templates/footer');
    }//show_activities  

        public function show_activity()
    {
        $this->load->helper('form');
        $data['title'] = 'Show Certificates';

       if(isset($_GET['id'])){
            $data['certificates']=$this->CertificateModel->getAllCertificates($_GET['id']);
            if (count($data) != 0 ) {
            $data['activity']=$this->ActivitiesModel->getActivityById($_GET['id']);
            $data['exist']=true;
            }//if
        }//if
     
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_certificates',$data);
        $this->load->view('management_book/templates/footer');
    }//show_activity  

    public function delete_certificate(){

       return $this->CertificateModel->deleteCertificate($_POST['id']);
    }//delete_certificate

        public function add_infographic()
    {
        $data['title'] = 'Add Infographic';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_infographic');
        $this->load->view('management_book/templates/footer');

    }

     public function show_infographic(){
        if ($this->uri->segment(3))
        {
              $id=$this->uri->segment(3);
           $this->management->delete_infographic($id);
 $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم حذف الانفوجرافيك بنجاح</div>");
            redirect(base_url().'Management_book/show_infographic');
        }
        $data['imgs'] = $this->management->getimgs();
        $data['title'] = 'Show Infographic';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_infographic',$data);
        $this->load->view('management_book/templates/footer');
    }

}