<?php
class ArticleModel extends CI_Model {

  public function getArticles()
  {
    $this->db->from('article');
    return $this->db->get()->result();

  }//getArticles

  public function getArticleById($id)
  {
    $this->db->from('article');
    $this->db->where('id',$id);
    return $this->db->get()->result();
  }//getArticleById

   
}//class

?>
