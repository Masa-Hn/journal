<?php

defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class NewMembersList extends CI_Controller {

	public
	function __construct() {
		parent::__construct();
		$this->load->model( 'requestsModel' );
	} //end construct()

	public
	function index() {
		$title['title'] = "الأعضاء الجدد";
		$this->load->view( 'leader_request/header' , $title);
		$leader_info = $this->requestsModel->check_email( $_GET[ 'email' ] );
		$arr = null;

		if ( $leader_info->num_rows > 0 ) {
			$res = $leader_info->fetch_array( MYSQLI_ASSOC );
            if($res != null){
                $id = $res[ 'id' ];
                $request = $this->requestsModel->leaderLastRequest( $id, 'leader_id', 'leader_request', '*' );
                if ( $request->num_rows > 0 ) {
                    $request_info = $request->fetch_array( MYSQLI_ASSOC );
                    $Rid = $request_info[ 'Rid' ];
										$arr['Rid'] = $Rid;
                    $arr[ 'leader_id' ] = $id;
                    $arr[ 'uniqid' ] = $res[ 'uniqid' ];
                    $arr[ 'leader_name' ] = $res[ 'leader_name' ];
                    $arr[ 'team_link' ] = $res[ 'team_link' ];
                    $arr[ 'ambassadors' ] = $this->requestsModel->get_data($Rid, 'request_id', 'ambassador', '*', 'AND display = 1');

                    if ( $arr[ 'ambassadors' ]->num_rows == 0 ) {
                        $arr[ 'info' ] = 'لم يتم التوزيع لك بعد!';
                    }
                    $this->load->view( 'leader_request/new_members_list', $arr );
                } else {
                    $arr[ 'info' ] = "لا يوجد لديك طلبات!";
                    $this->load->view( 'leader_request/new_members_list', $arr );
                }
            }
        }
	}


	function joined_ambassador() {
		if ( isset( $_POST[ 'Checked' ] ) ) {
			$id = $_POST[ 'Checked' ];
			$rid = $_POST['Rid'];
			$this->requestsModel->update_data( 1, $id );
		} else if ( isset( $_POST[ 'notChecked' ] ) ) {
			$id = $_POST[ 'notChecked' ];
			$this->requestsModel->update_data( 0, $id );
		}
	}

	function notJoined_ambassador() {
		if ( isset( $_POST[ 'Checked' ] ) ) {
			$id = $_POST[ 'Checked' ];
			$rid = $_POST['rid'];
			$this->requestsModel->update_data( 2, $id );
			$this->requestsModel->counterIncrement( $rid );
		} else if ( isset( $_POST[ 'notChecked' ] ) ) {
			$id = $_POST[ 'notChecked' ];
			$this->requestsModel->update_data( 0, $id );
		}
	}

	function saveProfileLink(){

        $profile = $this->input->post('profile_link');
        $id      = $this->input->post('amb_id');
        $data['profile_link'] = $profile;

        if ($profile!=null){
            $this->requestsModel->updateAmbassadorLink($id,$profile);
            $msg = "<div class='alert alert-success'>
                      تم الحفظ بنجاح
                      </div>";
            echo $msg;
        }else{
            $msg = "<div class='alert alert-danger'>
                      حدث خطأ ما!
                      </div>";
            echo $msg;
        }
        //echo '<script type="text/javascript">
        //	   location.reload();
        //	   </script>';
    }

    function newRequest(){
		$done = "";
        $data['gender'] = $_POST['gender'];
        $data['leader_id'] = $_POST['leader_id'];
        $data['members_num'] = $_POST['num'];
        $data['current_team_count'] = $_POST['teamCount'];

		$request = $this->requestsModel->leaderLastRequest($data['leader_id']);

		if($request->num_rows == 0){
			$done = $this->requestsModel->addRequest($data);
		}else{
			$res = $request->fetch_assoc();
			$date = $res['date'];
			if ( ( date( 'Y-m-d' ) >= date( 'Y-m-d', strtotime( $date . ' + 1 days' ) ) ) ) {
				$done = $this->requestsModel->addRequest($data);
			}else{
				$done = "";
			}
		}
        if(!empty($done)){
            echo "<div class='alert alert-success'> سيتم إرسال ". $data['members_num'] . " أعضاء لك قريباً </div>";
        }else{
			echo "<div class='alert alert-danger'> لقد تم تسجيل طلبك!</div>";
		}
    }
}
?>
