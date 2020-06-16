<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookDesc extends CI_Controller {

	public function index()
	{
        $id=$_GET['id'];
	$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->model('books');
        $arr['data']=$this->books->getbook($id);
        $this->load->view('bookDesc',$arr);
        $this->load->view('templates/footer');
	}//index

}
