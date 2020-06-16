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
			
			foreach ($arr as $row){
				echo "<a href='".base_url()."bookDesc/".$row->id ."'><li id='".$row->id ."'>".$row->name."</li></a>";
				// array_push($d, ["id" => $row->id , "name"=>$row->name]);
			}

			// print_r($d);
	    
		} 
		else {
			$arr['data']="";
			print_r($arr['data']);
		}
			

	}//searchByName

}
