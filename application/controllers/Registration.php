<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('SignUpModel');
    $this->load->model('AmbassadorModel');
    $this->load->model('RequestsModel');
    $this->load->model('books');
    $this->load->model('StatisticsModel');
    $this->load->library('session');

	}//end construct()

 	public function index()
  {

    if (!empty($_SESSION['question_5'])) {
      session_destroy();
      $this->load->view('registration/question_5');
    }
    else{
      $this->load->view( 'registration/templates/header');
      $this->load->view( 'registration/templates/navbar' );
      //Load Main Page
      $this->load->view('registration/index');
      $this->load->view( 'registration/templates/footer');

    }

  }//index
 public function teamInfo(){
     if(! empty($_GET['email'])){

      $data['email']=$_GET['email'];
      $data['name']=$_GET['name'];
      $data['gender']=$_GET['gender'];
      $this->load->view('registration/team_info',$data);

     }//if
 }//teamInfo

 public function nextPage()
  {
    if(! empty($_POST['next'])){
      $page="registration/".$_POST['next'];

      if($_POST['next'] == "question_4"){
        $sections['sections']=$this->books->getSections(1);

          $data = $this->load->view($page,$sections);
          return $data;

      }//if
      else{
        $file=APPPATH.'views/'.$page.'.php';
        if(file_exists($file)){
          $data =$this->load->view($page);
          return $data;
        }//if
        else{
          $data = $this->load->view('registration/404');
          return $data;


        }//else

      }//else
    }//if
    else{
      $data = $this->load->view('registration/404');
      return $data;

    }

  }//nextPage

}//class
?>
