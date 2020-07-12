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
}
?>