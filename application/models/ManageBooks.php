<?php
class ManageBooks extends CI_Model {

  public function getbooks($type){
      $this->db->select('id,name,writer,section,post,type,pic,level');
    $this->db->from('books');
    $this->db->where('type',$type);
    return $this->db->get();
  }

}