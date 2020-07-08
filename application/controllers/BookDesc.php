<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookDesc extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('books');
        }//end construct()

	public function index()
	{
                $id=$_GET['id'];
                $this->load->view('books_rack/templates/header');
                $this->load->view('books_rack/templates/navbar');
                $arr['data']=$this->books->getbook($id);
                $this->load->view('books_rack/bookDesc',$arr);
                $this->load->view('books_rack/templates/footer');
	}//index

        public function randomBook()
        {  
                $arr['data']=$this->books->getRandombook($_GET['type']);

                $this->load->view('books_rack/templates/header');
                $this->load->view('books_rack/templates/navbar');
                $this->load->view('books_rack/bookDesc',$arr);
                $this->load->view('books_rack/templates/footer');
         
        }//randomBook

        public function updateNumDownload()
        {  
               $this->books->updateNumDownload($_POST['id']);
         
        }//updateNumDownload

}
