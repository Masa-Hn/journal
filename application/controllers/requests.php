<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Requests extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'requestsModel' );
		$this->load->model( 'GeneralModel' );
		$this->load->library( 'form_validation' );
	} //end construct()

	public function index() {

		$this->load->view( 'leader_request/header' );
		$regBefore = $this->requestsModel->check_email( $_GET[ 'email' ] );

		if ( $regBefore->num_rows > 0 ) {
			$info = $this->requestsModel->check_email($_GET[ 'email' ])->fetch_array( MYSQLI_ASSOC );
			if($info['leader_link'] == null && $info['leader_gender'] == null){
				$this->load->view( 'leader_request/full_request' );
			}else{
				$this->load->view( 'leader_request/request' );
			$this->load->view( 'leader_request/edit_info' );
			}	
		}else{
			//echo "<div class='alert alert-warning' style='text-align:center'>معلوماتك غير مسجلة</div>";
			$this->load->view( 'leader_request/page_messaging' );
		}
	}

	public function addFullRequest() {

		$msg = "";

		$this->form_validation->set_rules( 'leaderLink', 'رابط صفحة القائد', 'trim|required' );
		$this->form_validation->set_message( 'required', 'يجب عليك تعبئة حقل %s' );

		if ( $this->form_validation->run() ) {
			$info = $this->requestsModel->check_email($_GET[ 'email' ])->fetch_array( MYSQLI_ASSOC );
			$leader['leader_id'] = $info['id'];
			// data of the leader

			$leader['leader_name']   = $_GET[ 'name' ];
			$leader['team_name']     = $_POST[ 'teamName' ];
			$leader['leader_link']   = $_POST[ 'leaderLink' ];
			$leader['team_link']     = $_POST[ 'teamLink' ];
			$leader['leader_gender'] = $_POST[ 'leaderGender' ];

			//data of the request
			$request['members_num']        = $_POST['numOfMembers'];
			$request['gender']             = $_POST['gender'];
			$request['current_team_count'] = $_POST['currentTeamCount'];
			$request['leader_id']          = $info['id'];
			//validate urls
			if ( !filter_var( $leader[ 'leader_link' ], FILTER_VALIDATE_URL ) ) {
				$msg = "<div class='alert alert-danger'>
                    يرجى التأكد من رابط صفحتك الشخصية!
                </div>";
			} else {

				//generate code
				$desired_length = 6;
				$unique = uniqid();
				$uniqid = "Osb180" . substr( $unique, strlen( $unique ) - $desired_length, $desired_length );
				$leader[ 'uniqid' ] = $uniqid;

				$this->requestsModel->updateFullRequest( $leader );
				
                $msg = "<div class='alert alert-success'>
                              تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                              </div>";
                echo $msg;  
                
				$requestID = $this->requestsModel->addRequest( $request );

				$this->distributeAmbassadors( $requestID );
			}
		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}
		echo $msg;
	}

	public function addRequest() {
		$msg = "";
		//data of the request
		$request[ 'members_num' ] = $_POST[ 'numOfMembers' ];
		$request[ 'gender' ] = $_POST[ 'gender' ];
		$request[ 'current_team_count' ] = $_POST[ 'currentTeamCount' ];

		$qry = $this->requestsModel->get_data( $_GET[ 'email' ], 'leader_email', 'leader_info', 'id' )->fetch_assoc();
		$request[ 'leader_id' ] = $qry[ 'id' ];
		//get the records related to the leader
		$getLastRecord = $this->requestsModel->leaderLastRequest( $request[ 'leader_id' ] );
		//check if there are records
		if ( $getLastRecord->num_rows > 0 ) {
			$result = $getLastRecord->fetch_assoc();
			$date = $result[ 'date' ];

			 $requests=$this->GeneralModel->get_data($request['leader_id'],'leader_id','leader_info')->result();
		    $mem=0;
			if ($requests!=null)
				foreach ($requests as $r) {
					if ($r->is_done==1)
					{
						$ambs=$r->current_team_count;
						if ($ambs!=null)
						{
							$mem=$mem+$ambs;
						}
					}
				}
				if ($mem+$request['members_num']>30)
				{
					echo "<script type='text/javascript'>
				    alert('لا يمكنك الحصول على أكثر من 30 سفير !');
					</script>";
					echo "<script> window.location.href = '" . base_url() . "requests'; </script>";
				}
				else
				{
			//check if the date of the last record exceeds 3 days
			if ( ( date( 'Y-m-d' ) > date( 'Y-m-d', strtotime( $date . ' + 3 days' ) ) ) ) {
                
                $msg = "<div class='alert alert-success'>
												تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
												</div>";
				echo $msg;
                
				$rid = $this->requestsModel->addRequest( $request );
				$this->distributeAmbassadors( $rid );
			} else {
				$msg = "<div class='alert alert-danger'>
                          لا يمكنك طلب أعضاء قبل مضي ثلاث أيام على آخر طلب لك, يرجى المحاولة لاحقاً!
                          </div>";
			}
		}
		} else {
            $msg = "<div class='alert alert-success'>
					تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
					</div>";
            echo $msg;
			$rid = $this->requestsModel->addRequest( $request );
			$this->distributeAmbassadors( $rid );
			
		}
		echo $msg;
	}

	public function edit() {
		$msg = "";
		$this->form_validation->set_rules( 'leaderName', 'اسم القائد', 'required' );
		$this->form_validation->set_rules( 'leaderLink', 'رابط صفحة القائد', 'trim|required' );
		$this->form_validation->set_rules( 'teamLink', 'رابط فريق المتابعة', 'trim|required' );
		$this->form_validation->set_message( 'required', 'يجب عليك تعبئة حقل %s' );

		if ( $this->form_validation->run() ) {
			$data[ 'id' ] = $_POST[ 'id' ];
			$data[ 'leader_name' ] = $_POST[ 'leaderName' ];
			$data[ 'leader_link' ] = $_POST[ 'leaderLink' ];
			$data[ 'team_link' ] = $_POST[ 'teamLink' ];
			$this->requestsModel->updateLeaderInfo( $data );
			$msg = "<div class='alert alert-success'>
                تم تعديل بياناتك بنجاح
                </div>";
		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}
		echo $msg;
	}

	public function distributeAmbassadors( $requestID ) {

		$noneDistributedAmbassadors = $this->requestsModel->getNoneDistributedAmbassadors();
		$request = $this->requestsModel->getRequest( $requestID )->fetch_array( MYSQLI_ASSOC );
		$leader = $this->requestsModel->getLeaderInfo( $request[ 'leader_id' ] )->fetch_array( MYSQLI_ASSOC );

		$num_of_members = $request[ 'members_num' ];

		if ( $noneDistributedAmbassadors->num_rows > 0 ) {

			while ( $amb = $noneDistributedAmbassadors->fetch_array( MYSQLI_ASSOC ) ) {
				if ( $num_of_members != 0 ) {

					if ( ( $request[ 'gender' ] == $amb[ 'gender' ] || $request[ 'gender' ] == 'any' ) && ( $leader[ 'leader_gender' ] == $amb[ 'leader_gender' ] || $leader[ 'leader_gender' ] == 'any' ) ) {

						$this->requestsModel->updateAmbassador( $amb[ 'id' ], $requestID );
						$num_of_members--;
					}
				}
			}
		}
		$distributedAmbassadors = $this->requestsModel->getDistributedAmbassadors( $requestID );
		if ( $distributedAmbassadors->num_rows == $request[ 'members_num' ] ) {
			$this->requestsModel->updateReq( $requestID );
		}
	}

	public function deleteLeaderRequest()
	{
		$data['info']=array();
		$reqs=$this->GeneralModel->get_data(0,'is_done', 'leader_request')->result();
		for ($i=0; $i <count($reqs) ; $i++) { 
		 	
			if($this->GeneralModel->get_data($reqs[$i]->Rid, 'request_id', 'ambassador')->result()==NULL)
			{
				array_push($data['info'],$reqs[$i]);	
			}
		}	
		$data['title'] = 'Delete Leader Request';
		$this->load->view('management_book/templates/header',$data);
		$this->load->view('management_book/templates/navbar');
		$this->load->view('leader_request/DeleteRequest',$data);
		$this->load->view('management_book/templates/footer');
	}

	public function deleteRequest()
	{
		$id=$this->input->post('id');
		$this->GeneralModel->remove($id,'leader_request','Rid');
		redirect(base_url().'requests/deleteLeaderRequest');
	}
}
?>