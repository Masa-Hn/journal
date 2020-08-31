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
		$this->load->view( 'leader_request/requests' );

	}

	public
	function addRequest() {
		$msg = ""; //to be printed out
		$this->load->library( 'form_validation' );

		$this->form_validation->set_rules( 'leaderLink', 'رابط صفحة القائد', 'trim|required' );
		$this->form_validation->set_message( 'required', 'يجب عليك تعبئة حقل %s' );


		if ( $this->form_validation->run() ) {
			//get data of the user
			$data[ 'leader_email' ] = $_GET['email'];
			$data[ 'leader_name' ] = $_POST['leaderName'];
			$data[ 'team_name' ] = $_POST['teamName'];
			$data[ 'leader_link' ] = $_POST['leaderLink'];
			$data[ 'team_link' ] = $_POST['teamLink'];
			$data[ 'leader_gender' ] = $_POST['leaderGender'];
			$data[ 'num_of_members' ] = $_POST['numOfMembers'];
			$data[ 'gender' ] = $_POST['gender'];
			
			//validate urls
			if ( !filter_var( $data[ 'leader_link' ], FILTER_VALIDATE_URL ) ) {
				$msg = "<div class='alert alert-danger'>
            يرجى التأكد من رابط صفحتك الشخصية!
            </div>";
			} else {
				//get the records related to the leader
				$getLastRecord = $this->GeneralModel-> get_data( $data[ 'leader_email' ],'leader_email', 'requests', 'date');

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
				}
			}

		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}

		echo $msg;

	}
}