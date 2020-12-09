<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class ExceptionalExcutiveTeams extends CI_Controller {

	public

	function __construct() {
		parent::__construct();
		$this->load->model( 'ExceptionalExcutiveModel' );
        $this->load->library('form_validation');
	} //end construct()

    public
	function excutive() {
		$exc[ 'title' ] = 'طلبات القادة التنفيذين';
		$this->load->view( 'exceptional_excutive/header', $exc );
        
		$pri = '+1+21'
        $p = explode('+', $pri); 

        if(in_array(21, $p)){
            // طلبات القادة التنفيذين
            $this->load->view('exceptional_excutive/excutive');
        }
	}
    
	public
	function exceptional() {
		$exc[ 'title' ] = 'طلبات القادة الاستثنائيين';
		$this->load->view( 'exceptional_excutive/header', $exc );
		$pri = '+1+23'
        $p = explode('+', $pri); 

        if(in_array(23, $p)){
            // طلبات القادة التنفيذين
            $this->load->view('exceptional_excutive/exceptional');
        }
	}

	public
	function editExc() {
		$msg = "";
		$this->form_validation->set_rules( 'leaderName', 'اسم القائد', 'required' );
		$this->form_validation->set_rules( 'leaderLink', 'رابط الصفحة الشخصية', 'trim|required' );
		$this->form_validation->set_rules( 'teamLink', 'رابط الفريق', 'trim|required' );
		$this->form_validation->set_message( 'required', 'الرجاء تعبئة حقل %s' );

		if ( $this->form_validation->run() ) {
			$data[ 'id' ] = $_POST[ 'id' ];
			$data[ 'leader_name' ] = $_POST[ 'leaderName' ];
			$data[ 'leader_link' ] = $_POST[ 'leaderLink' ];
			$data[ 'team_link' ] = $_POST[ 'teamLink' ];
			$this->ExceptionalExcutiveModel->update_leader_info( $data );
			$msg = "<div class='alert alert-success'>
               تم تعديل بياناتك بنجاح, قم بتحديث الصفحة
                </div>";
		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}
		echo $msg;
	}

	function check( $id, $numOfMem, $count, $max ) {
		$val = $count + $numOfMem;
		if ( $val <= $max ) {
			$getLastRecord = $this->ExceptionalExcutiveModel->last_request_isDone( $id );
			if ( $getLastRecord->num_rows > 0 ) {
				$result = $getLastRecord->fetch_assoc();
				$date = $result[ 'date' ];
				if ( ( date( 'Y-m-d' ) > date( 'Y-m-d', strtotime( $date . ' + 3 days' ) ) ) ) {
					return 1;
				} else {
					return 2;
				}
			} else {

				return 3;
			}
		} else {
			return 4;
		}

	}

	public
	function addExcFull() {
		$msg = "";

		$this->form_validation->set_rules( 'leaderLink', 'رابط الصفحة الشخصية', 'trim|required' );
		$this->form_validation->set_rules( 'teamLink', 'رابط الفريق', 'trim|required' );
		$this->form_validation->set_message( 'required', 'الرجاء تعبئة حقل %s' );

		if ( $this->form_validation->run() ) {
			$max = $_POST[ 'max' ];
			$leader[ 'leader_id' ] = $_POST[ 'id' ];
			$leader[ 'leader_link' ] = $_POST[ 'leaderLink' ];
			$leader[ 'team_link' ] = $_POST[ 'teamLink' ];
			$leader[ 'leader_gender' ] = $_POST[ 'leaderGender' ];

			//data of the request
			$request[ 'members_num' ] = $_POST[ 'numOfMembers' ];
			$request[ 'gender' ] = "any";
			$request[ 'current_team_count' ] = $_POST[ 'currCount' ];
			$request[ 'leader_id' ] = $_POST[ 'id' ];
			//validate urls
			if ( !filter_var( $leader[ 'leader_link' ], FILTER_VALIDATE_URL ) || !filter_var( $leader[ 'team_link' ], FILTER_VALIDATE_URL ) ) {
				$msg = "<div class='alert alert-danger'>
                   الرجاء التأكد من صحة الرابط!
                </div>";
			} else {
				//generate code
				$desired_length = 6;
				$unique = uniqid();
				$uniqid = "Osb180" . substr( $unique, strlen( $unique ) - $desired_length, $desired_length );
				$leader[ 'uniqid' ] = $uniqid;

				$val = $this->check( $leader[ 'leader_id' ], $request[ 'members_num' ], $request[ 'current_team_count' ], $max );
				if ( $val == 1 || $val == 3 ) {
					$this->ExceptionalExcutiveModel->updateFullRequest( $leader );

					$requestID = $this->ExceptionalExcutiveModel->addRequest( $request );

					$msg = "<div class='alert alert-success'>
                          تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً, قم بتحديث الصفحة
                          </div>";
				} else if ( $val == 2 ) {
					$msg = "<div class='alert alert-danger'>
                         لا يمكنك طلب أعضاء قبل مضي ثلاثة أيام على آخر طلب لك!
                          </div>";
				} else if ( $val == 4 ) {
					$msg = "<div class='alert alert-danger'>
                        عدد الأعضاء غير مسموح به نظراً لعدد الفريق (الحد الأقصى: " . $max . ")!
                          </div>";
				}
			}
		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}
		echo $msg;
	}

	public
	function addExc() {
		$msg = "";
		$max = $_POST[ 'max' ];
		$request[ 'members_num' ] = $_POST[ 'numOfMembers' ];
		$request[ 'gender' ] = "any";
		$request[ 'current_team_count' ] = $_POST[ 'currCount' ];
		$request[ 'leader_id' ] = $_POST[ 'id' ];

		$val = $this->check( $request[ 'leader_id' ], $request[ 'members_num' ], $request[ 'current_team_count' ], $max );
		if ( $val == 1 || $val == 3 ) {

			$requestID = $this->ExceptionalExcutiveModel->addRequest( $request );

			$msg = "<div class='alert alert-success'>
                          تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً, قم بتحديث الصفحة
                          </div>";
		} else if ( $val == 2 ) {
			$msg = "<div class='alert alert-danger'>
                         لا يمكنك طلب أعضاء قبل مضي ثلاثة أيام على آخر طلب لك!
                          </div>";
		} else if ( $val == 4 ) {
			$msg = "<div class='alert alert-danger'>
                        عدد الأعضاء غير مسموح به نظراً لعدد الفريق (الحد الأقصى: " . $max . ")!
                          </div>";
		}


		echo $msg;
	}
}
?>