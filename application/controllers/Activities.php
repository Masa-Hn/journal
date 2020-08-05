<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    	$this->load->model('ActivitiesModel');
    	$this->load->model('CertificateModel');
    }//end construct()

	public function index()
	{
  	if (!isset($_GET['id']) || empty($_GET['id']))
		{
      $arr['activity']=$this->ActivitiesModel->getLastActivity();
			$id = $arr['activity'][0]->id;
		}//if
		else{
      $id=$_GET['id'];
      $arr['activity']=$this->ActivitiesModel->getActivityById($id);
			
		}//else
  	 	$arr['allActivity']=$this->ActivitiesModel->getAllActivities();
  	 	$arr['certificates']=$this->CertificateModel->getAllCertificates($id);
   	 	$this->load->view('books_rack/templates/header');
    	$this->load->view('books_rack/templates/navbar');
    	$this->load->view('books_rack/accomp',$arr);
    	$this->load->view('books_rack/templates/footer');
        
    }//index

  public function getCopies()
	{
  	$arr['copies']=$this->ActivitiesModel->getCopies($_POST['activity']);
  	echo '<option value="0" selected=""> اختر النسخة</option>';
  	foreach ($arr['copies'] as $copy) {
      echo'<option value="'.$copy->id.'">'.$copy->copy .'</option>';
    }//foreach
  }//getCopies

  public function certificateDisplay($id)
  { 
    
    $arr['certificates']=$this->CertificateModel->getCertificateById($id);
    if (count($arr) != 0 ) {
      $arr['activity']=$this->ActivitiesModel->getActivityById($arr['certificates'][0]->activity_id);
      $arr['exist']=true;
    }//if

    $this->load->view('books_rack/templates/header');
    $this->load->view('books_rack/templates/navbar');
    $this->load->view('books_rack/displayCertificate',$arr);
    $this->load->view('books_rack/templates/footer');
  
  }//certificateDisplay

  public function deleteActivity(){
    return $this->ActivitiesModel->deleteActivity($_POST['id']);

  }//deleteActivity
      
}//class
