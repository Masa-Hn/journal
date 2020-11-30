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
        public function getmore()
          { 
            $result['articles']=$this->ArticleModel->getmore($_POST['id'])->result();
              foreach ($result['articles'] as $article) {
                echo
                  '<div class="col-md-3 col-sm-12  articleDiv " id="'.$article->id .'">  
              
                          <a href="'. base_url().'Article/articleView?id='.$article->id.'" >
                            <div class="card">
                              <img  class="card-img-top" src="'. base_url() .'assets/img/article/'.$article->pic .'">
                              <div class="card-body">
                                <h1 class="artical-title-small">'.$article->title .' </h1>
                                <p class="card-text artical-description">'. substr($article->article,0,80).'</p>
                              </div>
                            </div> 
                          </a>
            
                      </div>';
              }
              
          }//getmore 

}//class
