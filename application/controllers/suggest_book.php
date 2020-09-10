<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class suggest_book extends CI_Controller {

	public

	function __construct() {
		parent::__construct();


	} //end construct()

	public

	function index() {

			$this->load->view('books_rack/templates/header');
            $this->load->view('books_rack/templates/navbar');
			$this->load->view( 'books_rack/suggest_book' );
		                $this->load->view('books_rack/templates/footer');

		}
	}
