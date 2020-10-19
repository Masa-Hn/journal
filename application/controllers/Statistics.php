<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Statistics extends CI_Controller {
	public
	function __construct() {
		parent::__construct();
		$this->load->model( 'StatisticsModel' );
	} //end construct()
	public
	function index() {
		$data['title'] = 'الإحصائيات';
	
		//this is the code for testing == to count viewers per page ==> to be inserted in each page of mentorship pages
		
		//change the ip_add, page_id, or date to test it
		$page_id = 6;
		
		$this->StatisticsModel->addVisitor($page_id);
		
		//end code
		
		$this->load->view('management_book/templates/header', $data);
		$this->load->view('management_book/templates/navbar');
		$this->load->view('management_book/statistics', $data);
		$this->load->view('management_book/templates/footer');
		
	}
	

}
	
?>
