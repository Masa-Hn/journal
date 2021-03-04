<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class AmbassadorsJoining extends CI_Controller {
	public
	function __construct() {
		parent::__construct();
    if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
	} //end construct()

  public function index()
  {
    $title[ 'title' ]="عرض السفراء الجدد";
    $this->load->view( 'management_book/templates/header', $title );
    $this->load->view( 'management_book/templates/navbar' );

    $data['ambassadors'] = Orm_Ambassador::get_all(array("is_joined"=>0),0,0,array('name'));
    $data['num_rows'] = Orm_Ambassador::get_count(array("is_joined"=>0));

    $this->load->view( 'management_book/display_ambassadors', $data);
    $this->load->view( 'management_book/templates/footer' );

  }

public function searchAmbassador()
{
	$title[ 'title' ]="عرض السفراء الجدد";
	$this->load->view( 'management_book/templates/header', $title );
	$this->load->view( 'management_book/templates/navbar' );
	if(isset($_POST['s-btn'])){
    //get the searched value
		$searchValue = $_POST['s-text'];
    //specify the conditons
    $filters['is_joined'] = 0;
    $filters['conditions'] = "name like '%".$searchValue."%'";

    //assign the variables to data variable and pass it to the view
		$data['ambassadors'] = Orm_Ambassador::get_all($filters, 0, 0, array("name"));
    $data['num_rows'] = Orm_Ambassador::get_count($filters);
		$this->load->view('management_book/display_ambassadors', $data);
	}
		$this->load->view( 'management_book/templates/footer' );
}

  public function joined_ambassador()
  {
    if(isset($_POST['checked'])){
      //get the id of the ambassador
      $id = $_POST['checked'];
      //update the field
      $data = Orm_Ambassador::get_instance($id);
      $data->set_is_joined(1);
      $data->save();

    }else if(isset($_POST['notChecked'])){
      //ambassador id
      $id = $_POST['notChecked'];
      //update the field
      $data = Orm_Ambassador::get_instance($id);
      $data->set_is_joined(0);
      $data->save();
    }
  }
}
