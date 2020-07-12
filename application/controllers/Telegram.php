<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telegram extends CI_Controller {

	public function index()
	{
        $this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/telegram');
        $this->load->view('books_rack/templates/footer');
        
    }//index


}//class
