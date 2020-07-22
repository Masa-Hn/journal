<?php
class EvaluationModel extends CI_Model {

  public function getEvaluation()
  {
    $this->db->order_by('id');
    return $this->db->get('evaluation'); 


  }//getEvaluation
public function saveEval($w,$i)
{
	
		$data['title']=$w;
		$data['pic']=$i;
		
$rows=$this->getEvaluation();

		if ($rows->num_rows()<4)
		{
		$this->db->insert('evaluation',$data);
		return true;
		}
		else
		{
		$this->db->insert('evaluation',$data);
		$sql="DELETE  i1.* FROM    evaluation i1 LEFT JOIN 
		( SELECT  id FROM evaluation ii ORDER BY id DESC LIMIT 4 ) i2 ON i1.id = i2.id WHERE   i2.id IS NULL";
		$this->db->query($sql);
		return true;

		}
		return false;

}


public function delete_evaluation($id)
{
	$this->db->where('id',$id);
	$this->db->delete('evaluation');
		}
}//class

?>
