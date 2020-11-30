<?php
class ArticleModel extends CI_Model {

  public function getArticles()
  {
    $this->db->order_by('id DESC');
    $this->db->limit(10);
    return $this->db->get('article')->result(); 


  }//getArticles

  public function getArticleById($id)
  {
    $this->db->from('article');
    $this->db->where('id',$id);
    return $this->db->get()->result();
  }//getArticleById

  public function getmore($id)
  { 
    $this->db->where('id <',$id);
    $this->db->order_by('id DESC');
    $this->db->limit(10);
    return $this->db->get('article');  
    
  }//getmore
}//class

?>
