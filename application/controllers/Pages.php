<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Pages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'GeneralModel' );
		$this->load->library( 'form_validation' );
		if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
	} //end construct()

	public function index() {
		$pages=Orm_Pages::get_all();
		//$this->GeneralModel->get_all('pages');
		$arr1= Array();
		 foreach ($pages as $m) { 
        array_push($arr1,$m->get_id());
           }
		$data['pages']=$pages;
		$data['title']="Rearrange Pages";
		if (isset($_POST["page_id_array"]))

		{
		for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$arr['page_order']=$i;
				$updated=Orm_Pages::get_instance($_POST["page_id_array"][$i]);
				$updated->set_page_order($i);
				$updated->save();
				//$this->GeneralModel->update($arr,$_POST["page_id_array"][$i],'pages');

			}				

		}
		$this->load->view('management_book/templates/header',$data);
		$this->load->view('management_book/templates/navbar');
		$this->load->view('management_book/pages',$data);
		$this->load->view('management_book/templates/footer');

	}

	public function add() {
        
		$title=$this->input->post('title');
		//$data['title']=$title;
		//$this->GeneralModel->insert($data,'pages');
		$inserted=new Orm_Pages;
		$inserted->set_title($title);
		$inserted->save();
		redirect(base_url().'Pages/index');
	}
}