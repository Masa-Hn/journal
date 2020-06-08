<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
	public function index()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('index');
        $this->load->view('templates/footer');
	}//index

	public function accomp()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('accomp');
        $this->load->view('templates/footer');
	}//accomp

	public function articles()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('articles');
        $this->load->view('templates/footer');
	}//articles

	public function articleView()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('articleView');
        $this->load->view('templates/footer');
	}//articleView

	public function bookDesc()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('bookDesc');
        $this->load->view('templates/footer');
	}//bookDesc

	public function bookSearch()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('bookSearch');
        $this->load->view('templates/footer');
	}//bookSearch

	public function bookshelf()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('bookshelf');
        $this->load->view('templates/footer');
	}//bookshelf

	public function display()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('display');
        $this->load->view('templates/footer');
	}//display

	public function donate()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('donate');
        $this->load->view('templates/footer');
	}//donate

	public function join_us()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('join_us');
        $this->load->view('templates/footer');
	}//join_us

	

	public function telegram()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('telegram');
        $this->load->view('templates/footer');
	}//telegram

	
}//class
