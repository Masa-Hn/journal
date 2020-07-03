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
  public function getbookByName($name , $type)
  {
    // return $name;
    $this->db->select('id,name,pic,numdownload,uploadname,post,brief,link');
    $this->db->like('name',$name);
    $this->db->from('books');
    $this->db->where('type',$type);
    $this->db->limit(20);
    return $this->db->get()->result();
  }//getbookByName

   public function mostRead($type)
  {
    $this->db->select('id,name,link,brief,pic,numdownload');
    $this->db->from('books');
    $this->db->where('type',$type);
    $this->db->order_by('numdownload DESC');
    $this->db->limit(10);
    return $this->db->get()->result();
  }//mostRead

   public function newBook($type)
  {
    $this->db->select('id,name,link,brief,pic');
    $this->db->from('books');
    $this->db->where('type',$type);
    $this->db->order_by('id DESC');
    $this->db->limit(10);
    return $this->db->get()->result();
  }//mostRead

  public function lastId()
  {
    $this->db->select('id');
    $this->db->from('books');
    $this->db->order_by('id DESC');
    $this->db->limit(1);
    return $this->db->get()->result();
  }//lastId

  //SELECT COUNT(section),section FROM `books` GROUP BY section
  public function getSections($type)
  {
    $this->db->select('section,COUNT(section) As num_of_books');
    $this->db->from('books');
    $this->db->where('type',$type);
    $this->db->group_by('section');
    return $this->db->get()->result();
  }//getSections

   public function getLevels($type)
  {
    $this->db->select('level,COUNT(level) As num_of_books');
    $this->db->from('books');
    $this->db->where('type',$type);
    $this->db->group_by('level');
    return $this->db->get()->result();
  }//getLevels

  public function sectionFilter($section,$type)
  {
    $where = "section IN (". $section .") AND type = ".$type;
    $this->db->select('id,name,link,writer,pic,numdownload,uploadname,post,brief');
    $this->db->from('books');
    $this->db->where($where);
    return $this->db->get()->result();
  }//sectionFilter
  public function levelFilter($level,$type)
  {
    $where = "level IN (". $level .") AND type = ".$type;
    $this->db->select('id,name,link,writer,pic,numdownload,uploadname,post,brief');
    $this->db->from('books');
    $this->db->where($where);
    return $this->db->get()->result();
  }//levelFilters

  public function levelAndSectionFilter($section,$level,$type)
  {
    $where = "section IN (". $section .") AND level IN (". $level .") AND type = ".$type;
    $this->db->select('id,name,link,writer,pic,numdownload,uploadname,post,brief');
    $this->db->from('books');
    $this->db->where($where);
    return $this->db->get()->result();
  }//sectionFilter

}//class

?>
