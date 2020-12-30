<?php
class ManageBooks extends CI_Model {

  public function getbooks($type){
      $this->db->select('id,name,writer,section,post,type,pic,level');
    $this->db->from('books');
    $this->db->where('type',$type);
    return $this->db->get();
  }

   public function getbook($id){
      $this->db->select('*');
    $this->db->from('books');
    $this->db->where('id',$id);
    return $this->db->get();
  }

  public function getallbooks(){

    $this->db->select(array('id','book_name','publisher','brief','type','found','link'));
    $this->db->from('suggestion_book');
    return $this->db->get()->result_array();
  }
  
public function delete_book($id)
{
	$this->db->where('id',$id);
	$this->db->delete('books');
		}
}