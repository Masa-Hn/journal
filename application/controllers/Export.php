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
    

  public function GetSuggestions()
    {
          // create file name
        $fileName = 'data-'.time().'.xlsx';  
    // load excel library
        $this->load->library('excel');
        $SuggestionBooks = $this->ManageBooks->getallbooks();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Id');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Book Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'publisher');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Brief');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Type'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Publisher'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Found');       
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Link');       

        // set Row
        $rowCount = 2;
        foreach ($SuggestionBooks as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['book_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['publisher']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['brief']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['type']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['publisher']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['found']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['link']);

            $rowCount++;
        }
                $filename = "suggestion_books". date("Y-m-d-H-i-s").".xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
            ob_end_clean();
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
        $objWriter->save('php://output'); 
    }
}