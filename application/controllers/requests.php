<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Requests extends CI_Controller {

	public
	function __construct() {
		parent::__construct();
		$this->load->model( 'requestsModel' );

	} //end construct()

	public
	function index() {
		$this->load->view( 'leader_request/requests' );

	}

	public
	function addRequest() {
		$msg = ""; //to be printed out

		$this->load->library( 'form_validation' );

		$this->form_validation->set_rules( 'leaderLink', 'رابط صفحة القائد', 'trim|required' );
		$this->form_validation->set_message( 'required', 'يجب عليك تعبئة حقل %s' );


		if ( $this->form_validation->run() ) {
			//get data entered by user
			$data[ 'leader_name' ] = $this->input->post( 'leaderName' );
			$data[ 'leader_link' ] = $this->input->post( 'leaderLink' );
			$data[ 'team_link' ] = $this->input->post( 'teamLink' );
			$data[ 'num_of_members' ] = $this->input->post( 'numOfMembers' );
			$data[ 'gender' ] = $this->input->post( 'gender' );

			//validate urls
			if ( !filter_var( $data[ 'leader_link' ], FILTER_VALIDATE_URL ) ) {
				$msg = "<div class='alert alert-danger'>
            يرجى التأكد من رابط صفحتك الشخصية!
            </div>";
			} else {
				//get the records related to the leader
				$getLastRecord = $this->requestsModel->getDate( $data[ 'leader_name' ] );

				//check if there are records
				if ( $getLastRecord->num_rows() > 0 ) {
					$row = $getLastRecord->last_row();

					$date = $row->date;

					//check if the date of the last record exceeds 3 days
					if ( ( date( 'Y-m-d' ) > date( 'Y-m-d', strtotime( $date . ' + 3 days' ) ) ) ) {
						$this->requestsModel->addRequest( $data );

						$msg = "<div class='alert alert-success'>
                          تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                          </div>";
					} else {
						$msg = "<div class='alert alert-danger'>
                          لا يمكنك طلب أعضاء قبل مضي ثلاث أيام على آخر طلب لك, يرجى المحاولة لاحقاً!
                          </div>";
					}
				} else {
					$this->requestsModel->addRequest( $data );

					$msg = "<div class='alert alert-success'>
                تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                </div>";
				}
			}

		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}

		echo $msg;

	}
}