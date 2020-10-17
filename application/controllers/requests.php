<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Requests extends CI_Controller {
	public

	function __construct() {
		parent::__construct();
		$this->load->model( 'requestsModel' );
		$this->load->model( 'GeneralModel' );
		$this->load->library( 'form_validation' );
	} //end construct()
	public

	function index() {
		$this->load->view( 'leader_request/header' );
		$regBefore = $this->requestsModel->get_data( $_GET[ 'email' ], 'leader_email', 'leader_info' );
		if ( $regBefore->num_rows > 0 ) {
			$this->load->view( 'leader_request/request' );
			$this->load->view( 'leader_request/edit_info' );
		} else {
			$this->load->view( 'leader_request/full_request' );
		}
	}

	public

	function addFullRequest() {
		$msg = "";


		$this->form_validation->set_rules( 'leaderLink', 'رابط صفحة القائد', 'trim|required' );
		$this->form_validation->set_message( 'required', 'يجب عليك تعبئة حقل %s' );

		if ( $this->form_validation->run() ) {
			// data of the leader
			$leader[ 'leader_email' ] = $_GET[ 'email' ];
			$leader[ 'leader_name' ] = $_POST[ 'leaderName' ];
			$leader[ 'team_name' ] = $_POST[ 'teamName' ];
			$leader[ 'leader_link' ] = $_POST[ 'leaderLink' ];
			$leader[ 'team_link' ] = $_POST[ 'teamLink' ];
			$leader[ 'leader_gender' ] = $_POST[ 'leaderGender' ];
			//data of the request
			$request[ 'members_num' ] = $_POST[ 'numOfMembers' ];
			$request[ 'gender' ] = $_POST[ 'gender' ];
			$request[ 'current_team_count' ] = $_POST[ 'currentTeamCount' ];

			//validate urls
			if ( !filter_var( $leader[ 'leader_link' ], FILTER_VALIDATE_URL ) ) {
				$msg = "<div class='alert alert-danger'>
            يرجى التأكد من رابط صفحتك الشخصية!
            </div>";
			} else {
				$check = $this->requestsModel->get_data( $leader[ 'leader_email' ], 'leader_email', 'leader_info' );
				if ( $check->num_rows == 0 ) {
					$id = $this->requestsModel->insertLeaderInfo( $leader );
					$request[ 'leader_id' ] = $id;
					$requestID = $this->requestsModel->addRequest( $request );
					$this->distributeAmbassadors( $requestID );
					$msg = "<div class='alert alert-success'>
                          تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                          </div>";


				} else {
					$msg = "<div class='alert alert-danger'>لقد تم تسجيل الطلب مسبقاً!</div>";
				}
			}
		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}
		echo $msg;
	}
	public

	function addRequest() {
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
			//check if the date of the last record exceeds 3 days
			if ( ( date( 'Y-m-d' ) > date( 'Y-m-d', strtotime( $date . ' + 3 days' ) ) ) ) {
				$rid = $this->requestsModel->addRequest( $request );
				$this->distributeAmbassadors( $rid );
				$msg = "<div class='alert alert-success'>
												تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
												</div>";
			} else {
				$msg = "<div class='alert alert-danger'>
                          لا يمكنك طلب أعضاء قبل مضي ثلاث أيام على آخر طلب لك, يرجى المحاولة لاحقاً!
                          </div>";
			}
		} else {
			$rid = $this->requestsModel->addRequest( $request );
			$this->distributeAmbassadors( $rid );
			$msg = "<div class='alert alert-success'>
											تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
											</div>";

		}
		echo $msg;
	}
	public
	function edit() {
		$msg = "";
		$this->form_validation->set_rules( 'leaderName', 'اسم القائد', 'required' );
		$this->form_validation->set_rules( 'leaderLink', 'رابط صفحة القائد', 'trim|required' );
		$this->form_validation->set_message( 'required', 'يجب عليك تعبئة حقل %s' );
		if ( $this->form_validation->run() ) {
			$data[ 'id' ] = $_POST[ 'id' ];
			$data[ 'leader_name' ] = $_POST[ 'leaderName' ];
			$data[ 'leader_link' ] = $_POST[ 'leaderLink' ];
			$this->requestsModel->updateLeaderInfo( $data );
			$msg = "<div class='alert alert-success'>
                تم تعديل بياناتك بنجاح
                </div>";
		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}
		echo $msg;
	}

	public
	function distributeAmbassadors( $requestID ) {
		$noneDistributedAmbassadors = $this->requestsModel->getNoneDistributedAmbassadors();

		$request = $this->requestsModel->getRequest( $requestID )->row();

		$leader = $this->requestsModel->getLeaderInfo( $request->leader_id )->row();

		$num_of_members = $request->members_num;
		if ( $noneDistributedAmbassadors->num_rows() > 0 ) {

			foreach ( $noneDistributedAmbassadors->result() as $amb ) {

				if ( $num_of_members != 0 ) {

					if ( ( $request->gender == $amb->gender || $request->gender == 'any' ) && ( $leader->leader_gender == $amb->leader_gender ) ) {

						$this->requestsModel->updateAmbassador( $amb->id, $requestID );
						$num_of_members--;
					}
				}

			}
		}
		$distributedAmbassadors = $this->requestsModel->getDistributedAmbassadors( $requestID );

		if ( $distributedAmbassadors->num_rows() == $request->members_num ) {
			$this->requestsModel->updateRequest( $requestID );
		}
	}
}
?>