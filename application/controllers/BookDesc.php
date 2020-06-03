<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookDesc extends CI_Controller {
    
	public function index()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('bookDesc');
        $this->load->view('templates/footer');
	}//index
    
}