<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchForTeams extends CI_Controller {
    
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
        $this->load->view('management_book/search_for_teams');
        $this->load->view('management_book/templates/footer');
	}
    public function getTeamInfo()
    {
        $msg=0;
        $exists=false;
        $teamInfo='no data';
        if(isset($_POST['leaderName']) && $_POST['leaderName'] != "" ){
            $teamInfo=$this->LeaderInfoModel->getInfoByLeaderName($_POST['leaderName']);
            if ( count((array)$teamInfo) != 0 ){
                $exists=true;
            }//else
                
            else{
                $msg= "لا يتوفر معلومات لهذا القائد";            
            }//else
        }//if
        
        elseif (isset($_POST['teamName']) && $_POST['teamName'] != "" ) {
            $teamInfo=$this->LeaderInfoModel->getInfoByTeamName($_POST['teamName']);
            if ( count((array)$teamInfo) > 0 ){
                $exists=true;
            }//if
                
            else{
                $msg= "لا يتوفر معلومات لهذا الفريق";
            }//else
        }//elseif    
        else{
            $msg= "يرجى تحديد البحث";
        }//else
      
        echo json_encode(array('teamInfo'=>$teamInfo,"msg"=>$msg,'exists'=>$exists));  
        
    }//getTeamInfo
    
    

}//class
?>