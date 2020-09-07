<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Requests extends CI_Controller {

	public

	function __construct() {
		parent::__construct();

		$this->load->model( 'GeneralModel' );

	} //end construct()

	public

	function index() {
		$regBefore = $this->GeneralModel->get_data( $_GET[ 'email' ], 'leader_email', 'leader_info' );

		if ( $regBefore->num_rows() > 0 ) {
			$this->load->view( 'leader_request/request' );
		} else {
			$this->load->view( 'leader_request/full_request' );
		}

	}

	public

	function addFullRequest() {
		$msg = "";
		$this->load->library( 'form_validation' );

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

			//validate urls
			if ( !filter_var( $leader[ 'leader_link' ], FILTER_VALIDATE_URL ) ) {
				$msg = "<div class='alert alert-danger'>
            يرجى التأكد من رابط صفحتك الشخصية!
            </div>";
			} else {
				$id = $this->GeneralModel->insertAndReturn_id( $leader, 'leader_info' );

				$request[ 'leader_id' ] = $id;

				$this->GeneralModel->insert( $request, 'leader_request' );

				$msg = "<div class='alert alert-success'>
                          تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                          </div>";
				//get the records related to the leader
				/*	$getLastRecord = $this->GeneralModel-> get_data( $data[ 'leader_email' ],'leader_email', 'requests', 'date');

				//check if there are records
				if ( $getLastRecord->num_rows() > 0 ) {
					$row = $getLastRecord->last_row();

					$date = $row->date;

					//check if the date of the last record exceeds 3 days
					if ( ( date( 'Y-m-d' ) > date( 'Y-m-d', strtotime( $date . ' + 3 days' ) ) ) ) {
						$this->GeneralModel->insert( $data , 'requests');

						$msg = "<div class='alert alert-success'>
                          تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                          </div>";
					} else {
						$msg = "<div class='alert alert-danger'>
                          لا يمكنك طلب أعضاء قبل مضي ثلاث أيام على آخر طلب لك, يرجى المحاولة لاحقاً!
                          </div>";
					}
				} else {
					$this->GeneralModel->insert( $data , 'requests');

					$msg = "<div class='alert alert-success'>
                تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                </div>";
				}*/
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

		$qry = $this->GeneralModel->get_data( $_GET[ 'email' ], 'leader_email', 'leader_info', 'id' )->row();

		$request[ 'leader_id' ] = $qry->id;

		//get the records related to the leader
		$getLastRecord = $this->GeneralModel->get_data( $request[ 'leader_id' ], 'leader_id', 'leader_request', 'date' );

		//check if there are records
		if ( $getLastRecord->num_rows() > 0 ) {
			$row = $getLastRecord->last_row();

			$date = $row->date;

			//check if the date of the last record exceeds 3 days
			if ( ( date( 'Y-m-d' ) > date( 'Y-m-d', strtotime( $date . ' + 3 days' ) ) ) ) {
				$this->GeneralModel->insert( $request, 'leader_request' );

				$msg = "<div class='alert alert-success'>
                          تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                          </div>";
			} else {
				$msg = "<div class='alert alert-danger'>
                          لا يمكنك طلب أعضاء قبل مضي ثلاث أيام على آخر طلب لك, يرجى المحاولة لاحقاً!
                          </div>";
			}
		} else {
			$this->GeneralModel->insert( $request, 'leader_request' );

			$msg = "<div class='alert alert-success'>
                تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                </div>";
		}

		echo $msg;

	}
}