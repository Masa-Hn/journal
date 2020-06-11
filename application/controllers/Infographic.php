<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infographic extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('InfographicModel');
  }//end construct()
    
	public function index()
	{	
    $result['exist']=false;
   	$result['infographic']=$this->InfographicModel->getPhoto()->result();
    $rowNum=$this->InfographicModel->getPhoto()->num_rows();

    
    if($rowNum > 0){
      $result['exist']=true;
    }//if    

		$this->load->view('templates/header');
    $this->load->view('templates/navbar');
    $this->load->view('infographic',$result);
    $this->load->view('templates/footer');
	}//index
  

  public function getmore()
  { 
    
    $result['infographic']=$this->InfographicModel->getmore($_POST['id'])->result();
      foreach ($result['infographic'] as $row) {
        echo
          '<div class="masonryblocks"><img src="'. base_url().'assets/img/infographic/'.$row->pic .'" class="my-masonry-grid-item gallaryImg " id="'.$row->id.'" onClick="show(this.id)"></div>';
      }
      
  }//getmore 

  public function infographicDisplay($id){
    $result['infographic']=$this->InfographicModel->getById($id)->result();
    $rowNum=$this->InfographicModel->getById($id)->num_rows();

    if($rowNum > 0){
      $result['exist']=true;
    }//if    

    $this->load->view('templates/header');
    $this->load->view('templates/navbar');
    $this->load->view('display',$result);
    $this->load->view('templates/footer');
  }//infographicDisplay
}