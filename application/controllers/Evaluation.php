<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->view('management_book/js/management_book');
        $this->load->database();
        $this->load->model('EvaluationModel');
        
        if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
    }//end construct()
	public function index()
	{
        $data['title'] = 'Add Evaluation';
		$this->load->view('management_book/templates/header', $data);
        //$this->load->view('books_rack/templates/header');

        $this->load->view('management_book/templates/navbar');
        $this->load->view('add_evaluation');
        $this->load->view('management_book/templates/footer');
	}

     public function add_evaluation()
    {
         

         $config['upload_path'] = './assets/img/evaluation';
         $config['allowed_types']='jpg|jpeg|gif|png';
         $config['max_size'] = 2000;
         $config['encrypt_name'] = TRUE;
        $this->load->helper('form');
        
        $this->load->library('upload', $config);
     
       
        $w=$this->input->post('week');

        $this->upload->do_upload('pic');
        $image_data = $this->upload->data();  
        $i=$image_data['file_name'];
        if($this->EvaluationModel->saveEval($w,$i)){

            $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم إضافة التقييم بنجاح</div>");
            redirect(base_url().'Evaluation/index');
        }else{

            $this->session->set_flashdata('msg',"<div class='alert alert-danger' style='text-align:right'>خطأ</div>");
            redirect(base_url().'Evaluation/index');
        }
        
        $data['info'] = 'تم إدخال التقييم الأسبوعي بنجاح';
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/success',$data);
        $this->load->view('management_book/templates/footer');
    }

        public function show_evaluation()
    {
                $this->load->helper('form');

       if(isset($_POST['delete'])){
            $id=$this->input->post('id');
           $this->EvaluationModel->delete_evaluation($id);
 $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم حذف التقييم بنجاح</div>");
            redirect(base_url().'Evaluation/show_evaluation');

                    }
         $data['title'] = 'Show Article';
         $Evals=$this->EvaluationModel->getEval();
         $num=$Evals->num_rows();
         $data['num_rows']=$num;
         $data['Evals']=$Evals;
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('show_evaluation',$data);
        $this->load->view('management_book/templates/footer');
    }
}