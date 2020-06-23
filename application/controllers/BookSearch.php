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
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->model('books');
        $arr['data']=$this->books->getbooks(1);
        $this->load->view('bookSearch',$arr);
        $this->load->view('templates/footer');
	}//index

	public function searchByName(){
		$arr=[];
		$d=[]; 
		if(!empty($_POST['bookName'])){
			//echo $_POST['bookName'];
			$arr=$this->books->getbookByName($_POST['bookName']);
			if(count($arr) == 0){
				echo "<li> لا يوجد نتائج </li>";
			}//if
			else{
				foreach ($arr as $row){
				echo "<a href='".base_url()."bookDesc?id=".$row->id ."'><li id='".$row->id ."'>".$row->name."</li></a>";
			}//for
			}//else
				    
		} 
		else {
			$arr['data']="";
			print_r($arr['data']);
		}
			

	}//searchByName
	public function mostRead(){
		$arr=$this->books->mostRead();
		foreach ($arr as $row){
			print_r( $row->numdownload);
			echo "---------------------- </br>";
		}
	}
}
