<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_book extends CI_Controller {
    
	public function index()
	{
        $data['title'] = 'Management Book';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/management');
        $this->load->view('management_book/templates/footer');
	}
	public function add_book()
	{
		$data['title'] = 'Add Book';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_book');
        $this->load->view('management_book/js/add_book_js');
        $this->load->view('management_book/templates/footer');
    }

    public function show_book()
    {
        $data['title'] = 'Show Book';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_book');
        $this->load->view('management_book/js/show_book_js');
        $this->load->view('management_book/templates/footer');
    }
    
    public function change_pic()
    {
        $data['title'] = 'Book Image';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/change_pic');
        $this->load->view('management_book/templates/footer');

    }
    
    public function show_article()
    {
         $data['title'] = 'Show Article';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_article');
$this->load->view('management_book/js/show_article_js');
        $this->load->view('management_book/templates/footer');
    }
    
    public function add_activity()
    {

        $data['title'] = 'Add Activity';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_activity');
        $this->load->view('management_book/js/add_activity_js');
        $this->load->view('management_book/templates/footer');

    }
    
    public function add_article()
    {
       $data['title'] = 'Add Article';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_article');
        $this->load->view('management_book/js/add_article_js');
        $this->load->view('management_book/templates/footer');

    }
    
    public function add_infographic()
    {
        $data['title'] = 'Add Infographic';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_infographic');
        $this->load->view('management_book/js/add_infographic_js');
        $this->load->view('management_book/templates/footer');

    }
}
