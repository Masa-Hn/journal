<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Suggest_book extends CI_Controller {

	public

	function __construct() {
		parent::__construct();

		$this->load->model('GeneralModel');
        $this->load->model('ManageBooks');

	} //end construct()

	public

	function index() {

			$this->load->view('books_rack/templates/header');
            $this->load->view('books_rack/templates/navbar');
			$this->load->view( 'books_rack/suggest_book' );
		    $this->load->view('books_rack/templates/footer');

		}

		public function add()
		{


			 $data['book_name']    = $this->input->post('bookName');
        $data['writer']  = $this->input->post('writer');
        $data['brief']   = $this->input->post('brief');
        
        $data['type']    = $this->input->post('type');
        $data['found']   = $this->input->post('found');
        $data['link']    = $this->input->post('link');

        $like=$this->GeneralModel->get_data( $data['book_name'],'name','books')->result();
        if ($like)
        {
            $id=$like[0]->id;
        	 $this->session->set_flashdata('msg2',"<p class='alert alert-warning' style='text-align:right'>اسم الكتاب موجود مسبقاً ... <a href='" . base_url()."bookDesc?id=".$id ."'>عرض الكتاب</a> </p>");
        	// print_r($like);
           // echo $id;
            redirect(base_url().'suggest_book/index');
        }
           else{ 
        if($this->GeneralModel->insert($data,'suggestion_book')){

            $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم إضافة الكتاب بنجاح</div>");
            redirect(base_url().'suggest_book/index');
        }else{

            $this->session->set_flashdata('msg',"<div class='alert alert-danger' style='text-align:right'>خطأ</div>");
            redirect(base_url().'suggest_book/index');
        }
    }
    }

     
		}
	