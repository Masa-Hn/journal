<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class HighPriorityReq extends CI_Controller {

	public function __construct() {
		parent::__construct();
	    $this->load->model('SignUpModel');
	    $this->load->model('RequestsModel');
	    $this->load->model('HighPriorityReqModel');
        if(!$this->session->userdata('logged_in')){
            redirect(base_url("login"));
        }
	} //__construct()

	public function index() {

		$data[ 'title' ] = 'ادارة أولوية التوزيع'; $this->load->view
		( 'management_book/templates/header', $data ); $this->load->view
		( 'management_book/templates/navbar' ); $this->load->view
		( 'management_book/high_ptiority_req', $data ); $this->load->view
		( 'management_book/templates/footer' );

	}//index()

	public function store() {
		if($_POST['request_id']){
			$this->HighPriorityReqModel->store($_POST['request_id']);
		}
	}// store()

	public function getRequestInfo() {
		$leaderInfo=false;
		$lastRequest=false;
		$msg=0;
		$exists=false;
		$priority=false;
		if($_POST['leaderEmail']){
			$leaderInfo=$this->RequestsModel->check_email($_POST['leaderEmail']);
			if ( $leaderInfo->num_rows > 0 ){
				$exists=true;
				$leaderInfo=$leaderInfo->fetch_array( MYSQLI_ASSOC );
				$lastRequest = $this->RequestsModel->leaderLastRequest($leaderInfo['id']);
				if ($lastRequest->num_rows>0) {
					$lastRequest=$lastRequest->fetch_array( MYSQLI_ASSOC);
					//check for priority
					$priorityResult=$this->HighPriorityReqModel->getByRequestId($lastRequest['Rid']);
					if(count((array) $priorityResult) !=0){
						$priority= true;
					}
				}
				else{
					$msg= "لا يوجد طلبات حاليًا";
				}
			
			}
			else{
				$msg= "لا تتوفر معلومات حول هذا البريد الالكتروني";
			}
			echo json_encode(array('leaderInfo'=>$leaderInfo, "lastRequest"=> $lastRequest, "msg"=>$msg,'exists'=>$exists,"priority"=>$priority));	
			}
		
	}//getRequestInfo()
}//class
?>
