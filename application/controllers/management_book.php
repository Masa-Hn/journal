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
        $this->load->model('InfographicModel');
        $this->load->model('SeriesModel');
        
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
            $deleted= Orm_Article::get_instance($id);
            $deleted->delete();
           //$this->management->delete_article($id);
    $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم حذف المقال بنجاح</div>");
            redirect(base_url().'Management_book/show_article');

                    }
         $data['title'] = 'Show Article';
         $articles=Orm_Article::get_all();
         //$this->management->get_articles();
         $num=Orm_Article::get_count($articles);
         //$articles->num_rows();
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
        $data['title'] = 'Show Activites';
        $activites=Orm_Activities::get_all();
        //$this->ActivitiesModel->getActivities();
        $data['num_rows']=Orm_Activities::get_count($activites);
        //count($activites);
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
            $data['certificates']=Orm_Certificate::get_all(array('activity_id' => $_GET['id']));
            //$this->CertificateModel->getAllCertificates($_GET['id']);
            if (Orm_Certificate::get_count($data['certificates']) != 0 ) {
            $data['activity']=Orm_Activities::get_all(array('id' => $_GET['id']));
            //$this->ActivitiesModel->getActivityById($_GET['id']);
            $data['exist']=true;
            }//if
        }//if
     
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_certificates',$data);
        $this->load->view('management_book/templates/footer');
    }//show_activity  

    public function delete_certificate(){

        $deleted=Orm_Certificate::get_instance($_POST['id']);
        return $deleted->delete();
       //return $this->CertificateModel->deleteCertificate($_POST['id']);
    }//delete_certificate

        public function add_infographic()
    {
        $data['title'] = 'Add Infographic';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_infographic');
        $this->load->view('management_book/templates/footer');

    }
    public function delete_Infographic(){
    
        $series_info=$this->SeriesModel->getById($_POST['id']);
        $newCount=$series_info[0]->num_of_photos - 1;
        $this->management->delete_infographic($_POST['id']);
        $this->SeriesModel->updateNumberOfPhotos($_POST['id'],$newCount);   
    }//delete_Infographic

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
    public function show_series(){
        $this->load->helper('form');
        $data['title'] = 'Show Series';
        $series=$this->SeriesModel->getSeries();
        $data['num_rows']=count($series);
        $data['series']=$series;

        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_series',$data);
        $this->load->view('management_book/templates/footer');
    }//show_series

    public function show_detailed_series(){
        $this->load->helper('form');
        $data['title'] = 'Show Detailed Series';

       if(isset($_GET['id'])){
            $data['photos']=$this->InfographicModel->getBySeries($_GET['id']);
            $data['series_id']=$_GET['id'];
            if (count($data) != 0 ) {
            $data['series_info']=$this->SeriesModel->getById($_GET['id']);
            $data['exist']=true;
            }//if
        }//if
     
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/series_photos',$data);
        $this->load->view('management_book/templates/footer');       
    }//show_detailed_series

    public function mentorshipTeam(){
        $this->load->view('management_book/templates/header');
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/mentorshipTeam');
        $this->load->view('management_book/templates/footer'); 
    }//mentorshipTeam

    public function mentorshipTeam_2(){
        $this->load->view('management_book/templates/header');
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/mentorshipTeam_2');
        $this->load->view('management_book/templates/footer'); 
    }//mentorshipTeam
}