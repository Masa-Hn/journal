<?php
class CertificateModel extends CI_Model {

  public function getAllCertificates($id)
  {
    $this->db->where('activity_id =',$id);
    return $this->db->get('certificate')->result(); 


  }//getAllCertificates

  public function getCertificateById($id)
  {
    $this->db->where('id =',$id);
    $this->db->limit(1);
    return $this->db->get('certificate')->result(); 


  }//getCertificateById

   public function deleteCertificate($id)
  {
    $this->db->where('id =',$id);
    return $this->db->delete('certificate');


  }//deleteCertificate

}//class

?>
