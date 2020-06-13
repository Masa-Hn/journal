<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class management_book extends CI_Controller {
    
	public function index()
	{
		
        $this->load->view('management_book/management');
	}
	public function add_book()
	{
		

            $this->load->view('management_book/add_book');
        	}

    public function show_book()
    {
       
            $this->load->view('management_book/show_book');
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
}
