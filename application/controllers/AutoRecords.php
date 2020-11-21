<?php

defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class AutoRecords extends CI_Controller {
	public

	function __construct() {
		parent::__construct();
		$this->load->model( 'StatisticsModel' );
	} //end construct()

	public

	function index() {
		//to be added in each page belongs to statistics
		$this->StatisticsModel->incrementVisitors(1 , date('y-m-d'));

		$this->load->view( 'management_book/triggerAutoRecords' );
	}

	public
	function addRecords() {
		$page_ids = 15;
		$days = 7;
		$records = $this->StatisticsModel->getRecords();
		if($records->num_rows() == 0)
		{
		for ( $i = 1; $i <= $page_ids; $i++ ) {
			for ( $j = 0; $j < $days; $j++ ) {
				$data[ 'page_id' ] = $i;
				$data[ 'visitors' ] = 0;
				$data[ 'date' ] = date( 'y-m-d', strtotime( date( 'y-m-d' ) . ' + ' . $j . ' days' ) );
				$this->StatisticsModel->addRecords( $data );	
			}
		}	
		}else{
			$res = $records->last_row();
			for ( $i = 1; $i <= $page_ids; $i++ ) {
			for ( $j = 1; $j < $days; $j++ ) {
				$data[ 'page_id' ] = $i;
				$data[ 'visitors' ] = 0;
				$data[ 'date' ] = date($res->date , strtotime( $res->date . ' + ' . $j . ' days' ) );
				$this->StatisticsModel->addRecords( $data );	
			}
		}	
	}
		echo "success";
	}

}