<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Statistics extends CI_Controller {

	public
	function __construct() {
		parent::__construct();
		$this->load->model( 'StatisticsModel' );

        if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
	} //end construct()

	public
	function index() {
		$data[ 'title' ] = 'الإحصائيات';
		$this->load->view( 'management_book/templates/header', $data );
		$this->load->view( 'management_book/templates/navbar' );
		$this->load->view( 'management_book/statistics', $data );
		$this->load->view( 'management_book/templates/footer' );
	}
}
?>
