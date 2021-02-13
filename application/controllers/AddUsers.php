<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class AddUsers extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('GeneralModel');
		if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
	} //end construct()

    public function index() {
		//$this->load->helper('url');
		$this->load->library("pagination");

		$config = array();
		$config["base_url"] = base_url() . "AddUsers";
		$config["total_rows"] = $this->GeneralModel->get_data(0,'regstatus','users')->num_rows();
        $filters["regstatus"] = 0;
        //$teat = new Orm_users;
        //echo '<pre>';
        //print_r (Orm_Users::get_count($filters));die;
        $config["total_rows"] = Orm_users::get_count($filters);
        
		$config["per_page"] = 5;
		$config["uri_segment"] = 2;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center" >';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = '&laquo;';
		$config['first_tag_open'] = '<li class="page-item" style="border:solid 1px #A52A2A;">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '&raquo;';
		$config['last_tag_open'] = '<li class="page-item" style="border:solid 1px #A52A2A">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&rarr;';
		$config['next_tag_open'] = '<li class="page-item" style="border:solid 1px #A52A2A">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr;';
		$config['prev_tag_open'] = '<li class="page-item" style="border:solid 1px #A52A2A">';
		$config['prev_tag_close'] = '</li>'; 
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link" style="background-color :#A52A2A;border:solid 1px #A52A2A;">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item" style="border:solid 1px #A52A2A">';
		$config['num_tag_close'] = '</li>';
		 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) :0;
		$data["links"] = $this->pagination->create_links();
		$data['title'] = 'Accept Members';
		$data['members']=$this->GeneralModel->get_data_limit(0,'regstatus','users',$config["per_page"], $page);
		$this->load->view('management_book/templates/header',$data);
		$this->load->view('management_book/templates/navbar');
		$this->load->view( 'management_book/AddUsers',$data );
		$this->load->view('management_book/templates/footer');
    }

    function add(){
		$username=$this->input->post('name');
		$data['regstatus']=1;
		$this->GeneralModel->update($data,$username,'users','username');
		redirect(base_url().'AddUsers/index');
    }

    function delete(){	
		$id=$this->input->post('id');
		$this->GeneralModel->remove($id,'users','id');
		redirect(base_url().'AddUsers/index');
    }
}