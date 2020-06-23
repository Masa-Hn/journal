<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookShelf extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('books');
  	}//end construct()
	public function index()
	{
		$arr['mostRead'] =$this->books->mostRead();
		$arr['newBook'] =$this->books->newBook();
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/bookshelf',$arr);
        $this->load->view('books_rack/templates/footer');
	}//index


}//class
