<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
	public function index()
	{	
		$this->load->model('VisitorModel');
		$this->VisitorModel->incrementVisitors();
		$countVisitors=$this->VisitorModel->countVisitors();

		$this->load->library('session');
		$this->session->set_userdata('counter',$countVisitors[0]->visit_times);
		$this->load->model('EvaluationModel');
		$arr['evaluation']=$this->EvaluationModel->getEvaluation();
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/index',$arr);
        $this->load->view('books_rack/templates/footer');
	}//index

	public function accomp()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/accomp');
        $this->load->view('books_rack/templates/footer');
	}//accomp

	public function articles()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/articles');
        $this->load->view('books_rack/templates/footer');
	}//articles

	public function articleView()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/articleView');
        $this->load->view('books_rack/templates/footer');
	}//articleView

	public function bookDesc()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/bookDesc');
        $this->load->view('books_rack/templates/footer');
	}//bookDesc

	public function bookSearch()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/bookSearch');
        $this->load->view('books_rack/templates/footer');
	}//bookSearch

	public function bookshelf()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/bookshelf');
        $this->load->view('books_rack/templates/footer');
	}//bookshelf

	public function display()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/display');
        $this->load->view('books_rack/templates/footer');
	}//display

	public function donate()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/donate');
        $this->load->view('books_rack/templates/footer');
	}//donate

	public function join_us()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/join_us');
        $this->load->view('books_rack/templates/footer');
	}//join_us

	

	public function telegram()
	{
		$this->load->view('books_rack/templates/header');
        $this->load->view('books_rack/templates/navbar');
        $this->load->view('books_rack/telegram');
        $this->load->view('books_rack/templates/footer');
	}//telegram

	
}//class
