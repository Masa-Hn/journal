<?php
class EvaluationModel extends CI_Model {

  public function getEvaluation()
  {
    $this->db->order_by('id DESC');
    $this->db->limit(1);
    return $this->db->get('evaluation')->result(); 


  }//getEvaluation


}//class

?>
