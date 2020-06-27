<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookSearch extends CI_Controller {
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
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->model('books');
        $arr['data']=$this->books->getbooks($_GET['type']);
        $this->load->view('books_rack/bookSearch',$arr);
        $this->load->view('books_rack/templates/footer');
	}//index

	public function searchByName(){
		$arr=[];
		$d=[]; 
		if(!empty($_POST['bookName'])){
			//echo $_POST['bookName'];
			$arr=$this->books->getbookByName($_POST['bookName'],$_POST['type']);
			if (count($arr) != 0 ) {
				foreach ($arr as $row){
				echo "<a href='".base_url()."bookDesc?id=".$row->id ."'><li id='".$row->id ."'>".$row->name."</li></a>";
				}//foreach
			}//if
			else{
				echo "<li> لا يوجد نتائج لعرضها </li>";
			}

			// print_r($d);
	    
		} 
		else {
			$arr['data']="";
			print_r($arr['data']);
		}
			

	}//searchByName
	public function getByName(){
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->model('books');
		$arr['data']=$this->books->getbookByName($_GET['name'],$_GET['type']);
        $this->load->view('books_rack/bookSearch',$arr);
        $this->load->view('books_rack/templates/footer');
	}//getByName
}
