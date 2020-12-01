<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Pages extends CI_Controller {

	public
	function __construct() {
		parent::__construct();
		$this->load->model( 'GeneralModel' );
		$this->load->library( 'form_validation' );
	} //end construct()

	public
	function index() {
		$pages=$this->GeneralModel->get_all('pages');
		$arr1= Array();
		 foreach ($pages->result() as $m) { 
        array_push($arr1,$m->id);
           }
		$data['pages']=$pages->result();
		$data['title']="Rearrange Pages";
		if (isset($_POST["page_id_array"]))

		{
		for($i=0; $i<count($_POST["page_id_array"]); $i++)
			{
				$arr['page_order']=$i;
				$this->GeneralModel->update($arr,$_POST["page_id_array"][$i],'pages');

			}				

		}
		$this->load->view('management_book/templates/header',$data);
		$this->load->view('management_book/templates/navbar');
		$this->load->view('management_book/pages',$data);
		$this->load->view('management_book/templates/footer');

	}

	public function add()
	{
		$title=$this->input->post('title');
		$data['title']=$title;
		$this->GeneralModel->insert($data,'pages');
		redirect(base_url().'Pages/index');
	}
}