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
                $last_id= $this->books->lastId();
                $random = rand(1,$last_id[0]->id);
                $found=false;
                $arr['data']="";
                while (!$found) {
                        $random = rand(1,$last_id[0]->id);
                        $arr['data']=$this->books->getbook($random);
                        // print_r(count($arr['data'])); die();
                        if (count($arr['data']) != 0 ) {
                                $found =true;     
                                echo "string";   
                                
                        }//if

                }//while
                $this->load->view('books_rack/templates/header');
                $this->load->view('books_rack/templates/navbar');
                $this->load->view('books_rack/bookDesc',$arr);
                $this->load->view('books_rack/templates/footer');
           
                
                

        }//randomBook
}
