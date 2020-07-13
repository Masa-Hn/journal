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
        $arr['sections']=$this->books->getSections($_GET['type']);
        $arr['levels']=$this->books->getLevels($_GET['type']);
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

	public function sectionFilter(){
		$arr=[];
		if(!empty($_POST['section'])){

			$arr=$this->books->sectionFilter(implode(",",$_POST['section']),$_POST['type']);
			if (count($arr) != 0 ) {
				$this->displayBooks($arr);
	        }//if
	        else{
	        	echo '
	        	<div class="row" style="text-align:center">
	        		<h2> لا يوجد نتائج </h2>
	        	</div>';
	        }//else
	    }//if
	    else{
	    	$arr=$this->books->getbooks($_POST['type']);
	    	$this->displayBooks($arr);

	    }

	}//sectionFilter

	public function levelFilter(){
		$arr=[];
		if(!empty($_POST['level'])){	
			$arr=$this->books->levelFilter(implode(",",$_POST['level']),$_POST['type']);
			if (count($arr) != 0 ) {
				$this->displayBooks($arr);
	        }//if
	        else{
	        	echo '
	        	<div class="row" style="text-align:center">
	        		<h2> لا يوجد نتائج </h2>
	        	</div>';
	        }//else
	     }//if
	     else{
	    	$arr=$this->books->getbooks($_POST['type']);
	    	$this->displayBooks($arr);

	    }

	}//levelFilter
	public function levelAndSectionFilter(){
		$arr=[];
		if(!empty($_POST['section']) && !empty($_POST['level']) ){	
			$arr=$this->books->levelAndSectionFilter(implode(",",$_POST['section']),implode(",",$_POST['level']),$_POST['type']);
			if (count($arr) != 0 ) {
				$this->displayBooks($arr);
	        }//if
	        else{
	        	echo '
	        	<div class="row" style="text-align:center">
	        		<h2> لا يوجد نتائج </h2>
	        	</div>';
	        }//else
	    }//if
	    elseif(!empty($_POST['section'])){
	    	$this->sectionFilter();
	    }//elseif

	    elseif(!empty($_POST['level'])){
	    	$this->levelFilter();
	    }//elseif

	    else{
	    	$arr=$this->books->getbooks($_POST['type']);
	    	$this->displayBooks($arr);

	    }
	}//levelAndSectionFilter

	public function displayBooks($arr){
		foreach ($arr as $row){
	            echo '
		            <div class="row">
		                 <div class=" section-margin container container-fluid text-center col-md-12 col-12 direct">
		                   <div class="col-4 col-md-3">
		                     <img  src="'.$row->pic.'" class="bookImg" >
		                   </div>
		                   <div class="container-fluid text-center col-8 col-md-9">
		                     <h3 >'.$row->name.'</h3>
		                     <div class=" row">
		                       <p> '. substr($row->brief,0,400).' <a href="'. base_url().'bookDesc?id='.$row->id.'" style="color: #BB6854">المزيد</a></p>
		                       <button class="btn cusBtn" id="'.$row->id.'" onClick="downloadAlert(this.id)">تحميل الكتاب </button>
		                        <input type="hidden" name="id" id="download_link_'.$row->id.'" value="'.$row->link.'">
		                       <button class="btn cusBtn" ><a target="_blank" href="'.$row->post.'" style="color: #FCFAEF"> أطروحات الكتاب</a></button>
		                       <h5>لمن يعاني من ضعف الانترنت قم بتحميل الكتب من
		                        <a href="'. base_url().'Telegram">هنا </a></h5>
		                     </div>
		                   </div>
		                 </div>
		                 <div class="heading-underline col-sm-12"></div>
		            </div>
	            ';
            }//foreach
	}//displayBooks

}//class