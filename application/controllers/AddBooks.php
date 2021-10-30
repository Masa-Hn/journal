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
            $data['book']  = $this->books->getbook($id);
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

            if($this->insertbook->addbook($name,$writer,$brief,$level,$section,$type,$post,$link,$pic)){

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
            
        if($this->insertbook->editbook($name,$writer,$brief,$level,$section,$type,$post,$link,$pic,$id)){

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
            $this->ManageBooks->delete_book($id);
            $this->session->set_flashdata('msg',"<div class='alert alert-success' style='text-align:right'>تم حذف الكتاب بنجاح</div>");
            redirect(base_url().'AddBooks/show_book/'.$type);
        }
}
    public function show_book(){
        
        
      $type=$this->uri->segment(3);
        $data['books'] = $this->ManageBooks->getbooks($type);
        $data['title'] = 'Show Book';
        $data['type'] = $type;
        $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/show_book',$data);
        $this->load->view('management_book/templates/footer');

    }

public function book_detailes()
{
    if ($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
        $data['book'] = $this->ManageBooks->getbook($id)->result();
        $data['id'] = $id;
    $data['title'] = 'Show Book Detailes';
      $this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/book_detailes',$data);
        $this->load->view('management_book/templates/footer');
    }
       
}
    public function searchByName(){
        $arr=[];
        $d=[]; 
        if(!empty($_POST['bookName'])){
            //echo $_POST['bookName'];
            $arr=$this->books->getbookByName($_POST['bookName'],$_POST['type']);
            if (count($arr) != 0 ) {
                foreach ($arr as $row){
                
                
               echo "<a class='book' style='font-size: 25px;' href='".base_url()."AddBooks/book_detailes/".$row->id ."'><li id='".$row->id ."'>".$row->name."</li></a>
                <hr style='width: 70%;display: block;border-top: 1px solid rgb(32, 93, 103) !important;'>
                ";
              
                }//foreach
            }//if
            else{
                echo "<li> لا يوجد نتائج لعرضها </li>";
            }

            // print_r($d);
        
        } 
        else {
            $arr['data']="";
            print_r($arr['data']);
        }
            

    }//searchByName

   

    


}
