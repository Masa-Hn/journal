<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_book extends CI_Controller {
    
	public function index()
	{
        $data['title'] = 'Management Book';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/management');
        $this->load->view('management_book/templates/footer');
	}
	public function add_book()
	{
		$data['title'] = 'Add Book';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/add_book');
        $this->load->view('management_book/js/add_book_js');
        $this->load->view('management_book/templates/footer');
    }

    public function show_book()
    {
        $data['title'] = 'Show Book';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/show_book');
        $this->load->view('management_book/templates/footer');
    }
    
    public function change_pic()
    {
        $this->load->view('management_book/change_pic');

    }
    
    public function show_article()
    {
        $this->load->view('management_book/show_article');

    }
    
    public function add_activity()
    {
        $this->load->view('management_book/add_activity');

    }
    
    public function add_article()
    {
        $this->load->view('management_book/add_article');

    }
    
    public function add_infographic()
    {
        $data['title'] = 'Add Infographic';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/add_infographic');
        $this->load->view('management_book/templates/footer');

    }
}
