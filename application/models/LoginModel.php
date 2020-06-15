<?php

class LoginModel extends CI_Model{
    
    public function	__construct(){
		parent::__construct();
    }
    
    function can_login($email, $password){
        
        $this->db->where(array(
            'email'     => $email, 
            'password'  => $password,
            'regstatus' => 1
        ));
        $result = $this->db->get('users'); 
            
        if($result->num_rows() == 1){
            foreach($result->result() as $row){
                $data = array (

                    'user_id'   => $row->UserID,
                    'username'  => $row->Username,
                    'email'     => $row->Email,
                    'logged_in' => true
                );
                $this->session->set_userdata($data);
            }
            return true;
        }else{  
            return false;
        }
    }
    
    function is_email_available($email){
        
        $this->db->where('email', $email);
        $query = $this->db->get('users'); 
        
        if($query->num_rows() > 0){
            
            return true; 
        }else{
            return false;
        }
    }
    
}
?>