<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class EditUsers extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('GeneralModel');
	} //end construct()

    public function index() {
        
        $this->load->helper('url');
        $this->load->library("pagination");

        $config = array();
        $config["base_url"]   = base_url() . "EditUsers";
        $config["total_rows"] = $this->GeneralModel->get_data(1,'regstatus','users')->num_rows();
        $config["per_page"]        = 5;
        $config["uri_segment"]     = 2;
        $config['full_tag_open']   = '<ul class="pagination justify-content-center" >';
        $config['full_tag_close']  = '</ul>';
        $config['attributes']      = ['class' => 'page-link'];
        $config['first_link']      = '&laquo;';
        $config['first_tag_open']  = '<li class="page-item" style="border:solid 1px #A52A2A;">';
        $config['first_tag_close'] = '</li>';
		$config['last_link']       = '&raquo;';
		$config['last_tag_open']   = '<li class="page-item" style="border:solid 1px #A52A2A">';
		$config['last_tag_close']  = '</li>';
		$config['next_link']       = '&rarr;';
		$config['next_tag_open']   = '<li class="page-item" style="border:solid 1px #A52A2A">';
		$config['next_tag_close']  = '</li>';
		$config['prev_link']       = '&larr;';
		$config['prev_tag_open']   = '<li class="page-item" style="border:solid 1px #A52A2A">';
		$config['prev_tag_close']  = '</li>';
		$config['cur_tag_open']    = '<li class="page-item active"><a href="#" class="page-link" style="background-color :#A52A2A;border:solid 1px #A52A2A;">';
		$config['cur_tag_close']   = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open']    = '<li class="page-item" style="border:solid 1px #A52A2A">';
		$config['num_tag_close']   = '</li>';
		 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) :0;
		$data["links"] = $this->pagination->create_links();
		$data['title'] = 'Edit Members';
		$data['members']=$this->GeneralModel->get_data_limit(1,'regstatus','users',$config["per_page"], $page);
					
		$this->load->view('management_book/templates/header',$data);
		$this->load->view('management_book/templates/navbar');
		$this->load->view( 'management_book/EditUsers',$data );
		$this->load->view('management_book/templates/footer');
    }

    function edit(){
        $teams = $_POST['team'];
        $str="";
        $id=$this->input->post('id');
        if(!empty($teams)) 
        {
            $N = count($teams);
            for($i=0; $i < $N; $i++)
            {
                if($i!=$N-1)
                    $str=$str.$teams[$i]."+";
                if($i==$N-1)
                    $str=$str.$teams[$i];
            }
            mb_substr($str ,0, -1);		
        }
        $data['team']=$str;
        $this->GeneralModel->update($data,$id,'users');

        redirect(base_url().'EditUsers/index');
    }

    function delete(){
        $id=$this->input->post('id');
        $this->GeneralModel->remove($id,'users','id');
        redirect(base_url().'EditUsers/index');
    }
} 