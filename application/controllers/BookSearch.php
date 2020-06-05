<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookSearch extends CI_Controller {

	public function index()
	{
		   $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->model('books');
        $arr['data']=$this->books->getbooks(1);
        $this->load->view('bookSearch',$arr);
        $this->load->view('templates/footer');
	}//index



}
