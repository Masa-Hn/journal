<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompleateReq extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('LeaderInfoModel');        
        if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
    }//end construct()
	public function index()
	{
        $data['title'] = 'البحث عن الأفرقة';
		$this->load->view('management_book/templates/header', $data);
        $this->load->view('management_book/templates/navbar');
        $this->load->view('management_book/compleate_requests');
        $this->load->view('management_book/templates/footer');
	}
    public function getTeamInfo()
    {
        $msg=0;
        $exists=false;
        $teamInfo='no data';
        if(isset($_POST['leaderEmail']) && $_POST['leaderEmail'] != "" ){
            $leaderInfo=$this->LeaderInfoModel->getLeaderInfoByEmail($_POST['leaderEmail']);
            if ( count((array)$leaderInfo) != 0 ){
                $teamInfo=$this->LeaderInfoModel->getReqInfo($leaderInfo->id);
                if ( count((array)$teamInfo) != 0 ){
                    $exists=true;
                }
                else{
                $msg= "لا يتوفر طلبات لهذا القائد";            
                }//else
            }
                
            else{
                $msg= "لا يتوفر معلومات لهذا القائد";            
            }//else
        }//if
          
        else{
            $msg= "يرجى تحديد البحث";
        }//else
      
        echo json_encode(array('teamInfo'=>$teamInfo,"msg"=>$msg,'exists'=>$exists));  
        
    }//getTeamInfo
    
    
     public function compleateRequest()
    {
        $this->LeaderInfoModel->updateRequest($_POST['requestId']);

    }
}//class
?>