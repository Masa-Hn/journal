<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddBooks extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->model('insertbook');
        $this->load->model('books');
        $this->load->model('ManageBooks');

        $this->load->view('management_book/js/management_book');
        
        if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
    }

    public function index(){
        
        if($this->uri->segment(3)){
            $id = $this->uri->segment(3);
            $data['book']  = Orm_Books::get_instance($id);
            //$this->books->getbook($id);
        } 
		$data['title'] = 'Add Book';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/add_book',$data);
        $this->load->view('management_book/templates/footer');
    }
    
    public function insert(){
        
        $name    = $this->input->post('name');
        $writer  = $this->input->post('writer');
        $brief   = $this->input->post('brief');
        $level   = $this->input->post('level');
        $section = $this->input->post('section');
        $type    = $this->input->post('type');
        
        $post    = $this->input->post('post_link');
        $link    = $this->input->post('download_link');
        $pic     = $this->input->post('img_link');

            $inserted=new Orm_Books;
            $inserted->set_name($name);
            $inserted->set_writer($writer);
            $inserted->set_brief($brief);
            $inserted->set_level($level);
            $inserted->set_section($section);
            $inserted->set_type($type);
            $inserted->set_post($post);
            $inserted->set_link($link);
            $inserted->set_pic($pic);
            $inserted->set_date(date("Y-m-d H:i:s", time()));

       // if($this->insertbook->addbook($name,$writer,$brief,$level,$section,$type,$post,$link,$pic)){
            if ($inserted->save()){
            $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم إضافة الكتاب بنجاح</div>");
            redirect(base_url().'AddBooks/index');
        }else{

            $this->session->set_flashdata('msg',"<div class='alert alert-danger' style='text-align:right'>خطأ</div>");
            redirect(base_url().'AddBooks/index');
        }
    }
    
    public function update(){
        
        $name    = $this->input->post('name');
        $writer  = $this->input->post('writer');
        $brief   = $this->input->post('brief');
        $level   = $this->input->post('level');
        $section = $this->input->post('section');
        $type    = $this->input->post('type');
        
        $post    = $this->input->post('post_link');
        $link    = $this->input->post('download_link');
        $pic     = $this->input->post('img_link');

        $id      =  $this->input->post('bid');   
            
        //if($this->insertbook->editbook($name,$writer,$brief,$level,$section,$type,$post,$link,$pic,$id)){
        $updated=Orm_Books::get_instance($id);
             $updated->set_name($name);
            $updated->set_writer($writer);
            $updated->set_brief($brief);
            $updated->set_level($level);
            $updated->set_section($section);
            $updated->set_type($type);
            $updated->set_post($post);
            $updated->set_link($link);
            $updated->set_pic($pic);
            $updated->set_date(date("Y-m-d H:i:s", time()));
            if ($updated->save()){
            $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم تعديل الكتاب بنجاح</div>");
            redirect(base_url().'AddBooks/index/'.$id);
        }else{

            $this->session->set_flashdata('msg',"<div class='alert alert-danger' style='text-align:right'>خطأ</div>");
            redirect(base_url().'AddBooks/index/'.$id);
        }
    }

public function delete()
{
          $type=$this->uri->segment(3);

     if ($this->uri->segment(4))
        {
            $id=$this->uri->segment(4);
            $deleted=Orm_Books::get_instance($id);
            $deleted->delete();
            //$this->ManageBooks->delete_book($id);
            $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم حذف الكتاب بنجاح</div>");
            redirect(base_url().'AddBooks/show_book/'.$type);
        }
}
    public function show_book(){
        
      $type=$this->uri->segment(3);
        $data['books'] = Orm_Books::get_all(array('type'=>$type));
        //$this->ManageBooks->getbooks($type);
        $data['title'] = 'Show Book';
        $data['type'] = $type;
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_book',$data);
        $this->load->view('management_book/templates/footer');

       
    }

    

   

    


}
