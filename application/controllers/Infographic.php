<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infographic extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('InfographicModel');
    $this->load->model('SeriesModel');
  }//end construct()
    
	public function index()
	{	
    $result['exist']=false;
   	$result['infographic']=$this->InfographicModel->getPhoto()->result();
    $result['sections']=$this->InfographicModel->getSections();
    $result['num_of_series']=$this->SeriesModel->countSseries();
    $rowNum=$this->InfographicModel->getPhoto()->num_rows();

    
    if($rowNum > 0){
      $result['exist']=true;
    }//if    

		$this->load->view('books_rack/templates/header');
    $this->load->view('books_rack/templates/navbar');
    $this->load->view('books_rack/infographic',$result);
    $this->load->view('books_rack/templates/footer');
	}//index
  

  public function seriesDisplay(){
    $result['series']=$this->SeriesModel->getSeries();

    $this->load->view('books_rack/templates/header');
    $this->load->view('books_rack/templates/navbar');
    $this->load->view('books_rack/seriesDisplay',$result);
    $this->load->view('books_rack/templates/footer');
  }//seriesDisplay
  
  public function seriesPhotos(){
    if(!empty($_GET['series_id'])){
      $arr['series_info']=$this->SeriesModel->getById($_GET['series_id']);
      $arr['photos']=$this->InfographicModel->getBySeries($_GET['series_id']);
      $arr['series_id']=$_GET['series_id'];
      $this->load->view('books_rack/templates/header');
      $this->load->view('books_rack/templates/navbar');
      $this->load->view('books_rack/displaySeriesPhotos',$arr);
      $this->load->view('books_rack/templates/footer');
    }
    else{

    }//else
  }//seriesPhotos

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

    $this->load->view('books_rack/templates/header');
    $this->load->view('books_rack/templates/navbar');
    $this->load->view('books_rack/display',$result);
    $this->load->view('books_rack/templates/footer');
  }//infographicDisplay

  public function sectionFilter(){
    $arr=[];
    if(!empty($_POST['section'])){

      $infographic=$this->InfographicModel->sectionFilter(implode(",",$_POST['section']));
      if (count($infographic) != 0 ) {
        $this->displayInfographics($infographic);
      }//if
      else{
        echo "
          <input type='hidden' id='exist' value='0'>
          <div class='col-md-3 col-sm-12 fade-in' style='margin:0 auto'>
          <h2 style='text-align: center;'>لا يوجد نتائج </h2> </div>";
        }//else       
    }//if
    else{
      $infographic=$this->InfographicModel->getPhoto()->result();
      $this->displayInfographics($infographic);
    }//else
  }//sectionFilter
  public function displayInfographics($infographic){
    echo "<input type='hidden' id='exist' value='1'>";
    echo '<div class="masonryholder " id="masonryholder">';
    foreach ($infographic as $row) {
      echo
        '<div class="masonryblocks"><img src="'. base_url().'assets/img/infographic/'.$row->pic .'" class="my-masonry-grid-item gallaryImg" id="'.$row->id.'" onClick="show(this.id)"></div>';
    }//foreach
    echo "</div>";

  }//displayInfographics 

  public function updateInfograpgic(){
    if (!empty($_GET['id']) && !empty($_GET['title']) && !empty($_GET['section'])) {
      $this->InfographicModel->updateInfographic($_GET['id'],$_GET['title'],$_GET['section']);
        $data['title'] = 'تم التعديل بنجاح';   
        $data['info'] = 'تم التعديل بنجاح';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/success',$data);
        $this->load->view('management_book/templates/footer');
    }
  }//updateInfograpgic

  public function deleteSeries(){
     return $this->SeriesModel->deleteSeries($_POST['id']);
   }//deleteSeries

}



