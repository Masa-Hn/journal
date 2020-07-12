<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

        public function __construct()
        {
        parent::__construct();
        $this->load->model('ArticleModel');
        }//end construct()

	public function index()
	{
               $arr['articles']=$this->ArticleModel->getArticles();
                $this->load->view('books_rack/templates/header');
                $this->load->view('books_rack/templates/navbar');
                $this->load->view('books_rack/articles',$arr);
                $this->load->view('books_rack/templates/footer');
        
        }//index

        public function articleView()
        {       
                $arr['article']=$this->ArticleModel->getArticleById($_GET['id']);
                $this->load->view('books_rack/templates/header');
                $this->load->view('books_rack/templates/navbar');
                $this->load->view('books_rack/articleView',$arr);
                $this->load->view('books_rack/templates/footer');
        
        }//articleView

}//class
