<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class AmbassadorsJoining extends CI_Controller {
	public
	function __construct() {
		parent::__construct();
    $this->load->model( 'requestsModel' );
		$this->load->model( 'GeneralModel' );
	} //end construct()

  public function index()
  {
    $title[ 'title' ]="عرض السفراء الجدد";
    $this->load->view( 'management_book/templates/header', $title );
    $this->load->view( 'management_book/templates/navbar' );

    $data['ambassadors'] = $this->requestsModel->get_ambassadors();

    $this->load->view( 'management_book/display_ambassadors', $data);
    $this->load->view( 'management_book/templates/footer' );

  }

public function searchAmbassador()
{
	$title[ 'title' ]="عرض السفراء الجدد";
	$this->load->view( 'management_book/templates/header', $title );
	$this->load->view( 'management_book/templates/navbar' );
	if(isset($_POST['s-btn'])){
		$searchValue = $_POST['s-text'];
			$whereCondition = "is_joined=0 and name like '%".$searchValue."%'";

			$data['ambassadors'] = $this->requestsModel->searchAmbassador($whereCondition);
			$this->load->view('management_book/display_ambassadors', $data);
	}
			$this->load->view( 'management_book/templates/footer' );
}

  public function joined_ambassador()
  {
    if(isset($_POST['checked'])){
      $id = $_POST['checked'];
      $data['is_joined'] = 1;
      $this->GeneralModel->update($data, $id, 'ambassador');

    }else if(isset($_POST['notChecked'])){
      $id = $_POST['notChecked'];
      $data['is_joined'] = 0;
      $this->GeneralModel->update($data, $id, 'ambassador');
    }
  }
}
