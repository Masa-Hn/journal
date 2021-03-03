<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->model('ManageBooks');

        
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
    
    public function GetSuggestions(){
    
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $table_columns = array(
            
            "-", 
            "اسم الكتاب",
            "النبذة", 
            "النوع", 
            "دار النشر", 
            "موجود إلكترونيًا؟", 
            "رابط الكتاب"
        );

        $column = 0;
        foreach($table_columns as $field){
            
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $books = Orm_suggestion_book::get_all();
        //$this->ManageBooks->getallbooks();

        $excel_row = 2;
        foreach($books as $row){
            
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->get_id());
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->get_book_name());
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->get_brief());
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->get_type());
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->get_publisher());
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->get_found());
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->get_link());
            $excel_row++;
        }
        
        $filename = "suggestion books ". date("Y-m-d H:i:s");
        
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=" '. $filename .'.xls"');
        $object_writer->save('php://output');
    }
}