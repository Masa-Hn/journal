<?php
class Books extends CI_Model {

  public function getbooks($type)
  {
  $query = $this->db->query("SELECT id,name,link,writer,pic,numdownload,uploadname,post,brief,(resofrate/numofrate) as rate from books WHERE  type=$type ORDER BY rate DESC ");
  return $query->result();
  }


  public function getbook($id)
   {
   $this->db->select('id,name,link,writer,brief,pic,post,date,uploadname,type,numdownload');
   $this->db->where('id',$id);
     $this->db->from('books');
     return $this->db->get()->result();
   }


}
?>
