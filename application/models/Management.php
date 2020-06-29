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
}
?>