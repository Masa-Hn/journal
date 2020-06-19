<?php
class Books extends CI_Model {

  public function getbooks($type)
  {
  $query = $this->db->query("SELECT id,name,link,writer,pic,numdownload,uploadname,post,brief,(resofrate/numofrate) as rate from books WHERE  type=$type ORDER BY rate DESC ");
  return $query->result();
  }


  public function getbook($id)
   {
   $this->db->select('id,name,link,level,section,writer,brief,pic,post,date,uploadname,type,numdownload');
   $this->db->where('id',$id);
     $this->db->from('books');
     return $this->db->get()->result();
   }
  public function getbookByName($name)
  {
    // return $name;
    $this->db->select('id,name');
    $this->db->like('name',$name);
    $this->db->from('books');
    $this->db->limit(20);
    return $this->db->get()->result();
  }//getbookByName

}
?>
