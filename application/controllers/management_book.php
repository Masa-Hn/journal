<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_book extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->view('management_book/js/management_book');
        $this->load->database();
        $this->load->model('management');
    }//end construct()
	public function index()
	{
        $data['title'] = 'Management Book';
		$this->load->view('management_book/templates/header', $data);
        //$this->load->view('books_rack/templates/header');

        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/management');
        $this->load->view('management_book/templates/footer');
	}
    
   
    
    public function show_article()
    {
                $this->load->helper('form');

       if(isset($_POST['delete'])){
            $id=$this->input->post('id');
           $this->management->delete_article($id);
 $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم حذف المقال بنجاح</div>");
            redirect(base_url().'Management_book/show_article');

                    }
         $data['title'] = 'Show Article';
         $articles=$this->management->get_articles();
         $num=$articles->num_rows();
         $data['num_rows']=$num;
         $data['articles']=$articles;
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_article',$data);
        $this->load->view('management_book/templates/footer');
    }
    
    public function add_activity()
    {

        $data['title'] = 'Add Activity';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_activity');
        $this->load->view('management_book/templates/footer');

    }
    
   
        public function add_infographic()
    {
        $data['title'] = 'Add Infographic';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_infographic');
        $this->load->view('management_book/templates/footer');

    }

     public function show_infographic(){
        if ($this->uri->segment(3))
        {
              $id=$this->uri->segment(3);
           $this->management->delete_infographic($id);
 $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم حذف الانفوجرافيك بنجاح</div>");
            redirect(base_url().'Management_book/show_infographic');
        }
        $data['imgs'] = $this->management->getimgs();
        $data['title'] = 'Show Infographic';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_infographic',$data);
        $this->load->view('management_book/templates/footer');
    }

}