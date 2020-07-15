<?php
class Management extends CI_Model {

public function savearticle($n,$w,$d,$a,$i)
{
	$data['title']=$n;
		$data['article']=$a;
		$data['date']=$d;
		$data['writer']=$w;
		$data['pic']=$i;
		

		$this->db->insert('article',$data);
}

public function delete_article($id)
{
	$this->db->where('id',$id);
	$this->db->delete('article');
		}



public function get_articles()
{
	 $query=$this->db->get('article');

   return $query;
}

public function getimgs()
{
		 $query=$this->db->get('infographic');

   return $query;
}

public function save_infographic($title,$date,$pic)
{	
	$data['pic']=$pic;
	$data['date']=$date;
	$data['title']=$title;
		

		$this->db->insert('infographic',$data);
}


public function delete_infographic($id)
{
	$this->db->where('id',$id);
	$this->db->delete('infographic');
		}
}
?>