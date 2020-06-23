<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookDesc extends CI_Controller {

	public function index()
	{
        $id=$_GET['id'];
        $this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->model('books');
        $arr['data']=$this->books->getbook($id);
        $this->load->view('books_rack/bookDesc',$arr);
        $this->load->view('books_rack/templates/footer');
	}//index

}
