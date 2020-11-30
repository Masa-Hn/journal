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
		if (!isset($_GET['type']) || empty($_GET['type']))
		{
			$_GET['type'] = 1;
		}//if
		$arr['type']=$_GET['type'];
		$arr['mostRead'] =$this->books->mostRead($_GET['type']);
		$arr['newBook'] =$this->books->newBook($_GET['type']);
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/bookshelf',$arr);
        $this->load->view('books_rack/templates/footer');
	}//index


}//class
