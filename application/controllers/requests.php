<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Requests extends CI_Controller {

	public function __construct() {
		parent::__construct();
    
		$this->load->model( 'RequestsModel' );
		//*$this->load->model( 'GeneralModel' );
		$this->load->library( 'form_validation' );
		$this->load->model('AmbassadorModel');

	} //end construct()

	public function index() {

		$this->load->view( 'leader_request/header' );
		$regBefore = $this->RequestsModel->check_email( $_GET[ 'email' ] );

		if ( $regBefore->num_rows > 0 ) {
			$info = $this->RequestsModel->check_email( $_GET[ 'email' ] )->fetch_array( MYSQLI_ASSOC );

			if ( $info[ 'leader_link' ] == null && $info[ 'leader_gender' ] == null ) {
				$this->load->view( 'leader_request/full_request' );
			} else {
				$this->load->view( 'leader_request/request' );
				$this->load->view( 'leader_request/edit_info' );
			}
		} else {
			//echo "<div class='alert alert-warning' style='text-align:center'>معلوماتك غير مسجلة</div>";
			$this->load->view( 'leader_request/page_messaging' );
		}
	}

	public function check( $id ) {

		$getLastRecord = $this->RequestsModel->leaderLastRequest( $id );

		if ( $getLastRecord->num_rows > 0 ) {
			$result = $getLastRecord->fetch_assoc();
			$date = $result[ 'date' ];
			//check if the date of the last record exceeds 3 days
			if ( ( date( 'Y-m-d' ) > date( 'Y-m-d', strtotime( $date . ' + 2 days' ) ) ) ) {
				return 1;
			} else {
				return 2;
			}
		} else {

			return 3;
		}
	}
	
	public function addFullRequest() {

		$msg = "";

		$this->form_validation->set_rules( 'leaderLink', 'رابط صفحة القائد', 'trim|required' );
		$this->form_validation->set_message( 'required', 'يجب عليك تعبئة حقل %s' );

		if ( $this->form_validation->run() ) {
			$info = $this->RequestsModel->check_email( $_GET[ 'email' ] )->fetch_array( MYSQLI_ASSOC );

			// data of the leader
			$name = str_replace("'", "", $_GET[ 'name' ]); 
			
			$leader[ 'leader_id' ]   = $info[ 'id' ];
			$leader[ 'leader_name' ] = $name;
			$leader[ 'team_name' ]   = $_POST[ 'teamName' ];
			$leader[ 'leader_link' ] = $_POST[ 'leaderLink' ];
			$leader[ 'team_link' ]   = $_POST[ 'teamLink' ];
			$leader[ 'leader_gender' ] = $_POST[ 'leaderGender' ];
            $leader[ 'leaders_team_name' ] = $_POST[ 'leadersTeamName' ];
            $leader[ 'leader_rank' ] = $_POST[ 'leaderRank' ];
			//data of the request
			$request[ 'members_num' ] = $_POST[ 'numOfMembers' ];
			$request[ 'gender' ] = $_POST[ 'gender' ];
			$request[ 'current_team_count' ] = $_POST[ 'currentTeamCount' ];
			$request[ 'leader_id' ] = $info[ 'id' ];
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

				$val = $this->check( $leader[ 'leader_id' ] );
				if ( $val == 1 || $val == 3 ) {

					$this->RequestsModel->updateFullRequest( $leader );

					$requestID = $this->RequestsModel->addRequest( $request );

                    $msg = "<div class='alert alert-success'>
                          تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                          </div>";
                    echo $msg;
                    
					$this->distributeAmbassadors( $requestID );
					
				} else if ( $val == 2 ) {
					$msg = "<div class='alert alert-danger'>
                          لا يمكنك طلب أعضاء قبل مضي يوم على آخر طلب لك, يرجى المحاولة لاحقاً!
                          </div>";
				}
			}
		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}
		//echo $msg;
	}

	public function addRequest() {
		$msg = "";
		//data of the request
		$request[ 'members_num' ] = $_POST[ 'numOfMembers' ];
		$request[ 'gender' ] = $_POST[ 'gender' ];
		$request[ 'current_team_count' ] = $_POST[ 'currentTeamCount' ];

		$qry = $this->RequestsModel->get_data( $_GET[ 'email' ], 'leader_email', 'leader_info', 'id' )->fetch_assoc();
		$request[ 'leader_id' ] = $qry[ 'id' ];

		$val = $this->check( $request[ 'leader_id' ] );
		if ( $val == 1 || $val == 3 ) {
		    
            if ($request[ 'current_team_count' ] >= 30){
				echo "<div class='alert alert-danger'>
				            عدد الفريق مكتمل لديك !
					       </div>";
					//echo "<script> window.location.href = '" . base_url() . "requests'; </script>";
			}elseif($request['current_team_count']+$request['members_num'] > 30){
                
                $request['members_num'] = 30 - $request['current_team_count'];
				$r="لا يمكنك الحصول على أكثر من 30 سفير ! سيتم رفع طلبك ب ".$request['members_num']." عضو فقط ... ";
                
				echo "<div class='alert alert-danger'>
				           $r
					       </div>";
				//echo "<script> window.location.href = '" . base_url() . "requests'; </script>";

                $rid = $this->RequestsModel->addRequest( $request );
				$this->distributeAmbassadors( $rid );
			}else{
    			$rid = $this->RequestsModel->addRequest( $request );
    			
    			$msg = "<div class='alert alert-success'>
    					تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
    					</div>";
    			//echo $msg;
    			
    			$this->distributeAmbassadors( $rid );
			}
			
		} else if ( $val == 2 ) {
			$msg = "<div class='alert alert-danger'>
                      لا يمكنك طلب أعضاء قبل مضي يوم على آخر طلب لك, يرجى المحاولة لاحقاً!
                      </div>";
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
            
            $name = str_replace("'", "", $_POST[ 'leaderName' ]); 
            
			$data[ 'leader_name' ] = $name;
			$data[ 'leader_link' ] = $_POST[ 'leaderLink' ];
			$data[ 'team_link' ] = $_POST[ 'teamLink' ];

			$this->RequestsModel->updateLeaderInfo( $data );

			$msg = "<div class='alert alert-success'>
                تم تعديل بياناتك بنجاح
                </div>";
		} else {
			$msg = "<div class='alert alert-danger'>" . validation_errors() . "</div>";
		}
		echo $msg;
	}

	public function distributeAmbassadors( $requestID ) {

		$request = $this->RequestsModel->getRequest( $requestID )->fetch_array( MYSQLI_ASSOC );
		$leader = $this->RequestsModel->getLeaderInfo( $request[ 'leader_id' ] )->fetch_array( MYSQLI_ASSOC );


		if ($request[ 'gender' ] == 'any') {
	      $ambassador_gender_condition="(gender = 'female' OR gender = 'male' OR gender = 'any')";
	    }
	    else{
	      $ambassador_gender_condition="gender = '". $request[ 'gender' ] ."'";
	    }

	    $leader_gender_condition = "(leader_gender= '".$leader[ 'leader_gender' ] ."' OR leader_gender ='any')";

	    $num_of_members = $request[ 'members_num' ];
		
		$noneDistributedAmbassadors = $this->RequestsModel->getNoneDistributedAmbassadors( $ambassador_gender_condition,$leader_gender_condition,$num_of_members);

		if ( $noneDistributedAmbassadors->num_rows > 0 ) {
			while ( $amb = $noneDistributedAmbassadors->fetch_array( MYSQLI_ASSOC ) ) {
				//update request ID
				$this->RequestsModel->updateAmbassador( $amb[ 'id' ], $requestID );
				if ($amb['messenger_id'] != 0) {
					//text amb			
					$url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAFNjQpRNZCbFQZAcI9eKmpsFhu8ABKzbGiYZCpvPRSYAbMbh4i56o766ZB05oca2105usAsBEcljGWi0oGrKoBEGOcCwQNbYCPaaZAVbb7aMxSixKSc3RlW3ZAkxzBnieg9C7D2q2N939XZAOFdHmwSFpajFTHufAZDZD';
	              
			      	/*initialize curl*/
			      	$ch = curl_init($url);
					$response="مرحبا بك 🌹 ".'\n'." . ".'\n'."فريق القراءة الخاص بك أصبح مستعدًا لاستقبالك." .'\n'." . ".'\n'." تفضل بعمل انضمام هنا 👇🏻 " .'\n'."'".$leader['team_link']."'".'\n'. " سوف تواجه سؤال عن الكود الخاص بالدخول، قم بتزويدهم بهذا الكود 👇🏻 " .'\n'."'".$leader['uniqid'].$leader['id']."'".'\n'. " ننتظرك بيننا" .'\n'." سعداء جدا بك 🌹";
	        					/*prepare response*/
					$jsonData =  $this->jsonData($amb['messenger_id'],$response);
					/* curl setting to send a json post data */
					$this->curlSetting($ch,$jsonData);

				}//check messenger id 
				
			}//while
		}
		//echo $num_of_members;
		$distributedAmbassadors = $this->RequestsModel->getDistributedAmbassadors( $requestID );
		if ( $distributedAmbassadors->num_rows == $request[ 'members_num' ] ) {

			$this->RequestsModel->updateReq( $requestID );
			//inform leader

			$url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAIq0ZAi1cbhpvuL0SFoHlQe4SsYfr5ipWUmaSxtArUy0noKdaCWqN0JpZC3hfAeURKZBJkpBZAx3f3hcKQnuOjW0WDcMkOUqifB0Na2kG1FXGjoYVsp43hulareizWWiZAFhZAujcJC73X1ZBhxfRUgkfZARNyiRHQZDZD';

		    /*initialize curl*/
		    $ch = curl_init($url);
	        $ambassadors="";
	        $i=1;
	        foreach ($distributedAmbassadors as $ambassador) {
	          $ambassadors=$ambassadors. "[".$i."] ".$ambassador['name']. '\n';
	          $i++;
	        }//foreach

			$firstMsg="السلام عليكم ورحمة الله وبركاته ".'\n'." أرجو أن تكون بخير 🌸 ".'\n'." . ".'\n'."  لقد قام موقع الإرشاد الإلكتروني بتوزيع بعض المشتركين الجدد لفريقك حسب طلبك.".'\n'." . ".'\n'." . ".'\n'." ⚠️ تذكر، بعض المشتركين الجدد قد يغير رأيه و يمتنع عن الانضمام لفريق المتابعة أو لمشروعنا لأسباب شخصية مختلفة.  لا تقلق أبدًا لأن هدفنا هو الاستمرار بالمحاولة وتغيير نظرة المجتمع والتزامه اتجاه التعلم بالقراءة المنهجية، في حال لم يقم المشترك الجديد بالانضمام لمجموعة المتابعة الخاص بك، فإن بإمكانك طلب عدد جديد وسوف نقوم بتوفيره لك سريعًا ♥️.".'\n'." . ".'\n'." ".'\n'." ✅ حفظًا على جهودكم وجهود فريقكم، في حال ⛔ لم يظهر المشترك الجديد أي ردة فعل أو رغبة في القراءة بإمكانك ضغط على زر (انسحاب⛔) في موقع العلامات بعد نهاية الأسبوع الأول له.".'\n'." ".'\n'." قواكم الله وبارك همتكم قائدنا.";			
			/*prepare response*/
			$jsonData =  $this->jsonData($leader[ 'messenger_id'],$firstMsg);
			/* curl setting to send a json post data */
			$this->curlSetting($ch,$jsonData);

			/*Ambassadors*/
      		$jsonData =  $this->jsonData($leader[ 'messenger_id'],$ambassadors);
      		/* curl setting to send a json post data */
      		$this->curlSetting($ch,$jsonData);

      		$lastMsg="قائدنا الكريم 💡".'\n'." ".'\n'."بعض المشتركين الجدد يكتفي فقط بعمل انضمام لمجموعة المتابعة الخاص بك وينتظر منك المبادرة بمراسلته والتعرف عليه. إنه ضيفنا داخل المشروع، لنقم بالاهتمام به ونكرمه. 💪🏻".'\n'.".".'\n'."رجاءً❤️  'ابدأ انت بمراسلة المشترك الجديد ' ثم قم بعمل منشن له على أي منشور ليتجاوب معك. أنت أهل لذلك.".'\n'."كن أنت صاحب المبادرة ❤️";
      		/*prepare response*/
     		$jsonData =  $this->jsonData($leader[ 'messenger_id'],$lastMsg);
      		/* curl setting to send a json post data */
      		$this->curlSetting($ch,$jsonData);
		}//if

	}

	public function deleteLeaderRequest() {
		$data[ 'info' ] = array();
		$reqs = $this->GeneralModel->get_data( 0, 'is_done', 'leader_request' )->result();
		for ( $i = 0; $i < count( $reqs ); $i++ ) {

			if ( $this->GeneralModel->get_data( $reqs[ $i ]->Rid, 'request_id', 'ambassador' )->result() == NULL ) {
				array_push( $data[ 'info' ], $reqs[ $i ] );
			}
		}
		$data[ 'title' ] = 'Delete Leader Request';
		$this->load->view( 'management_book/templates/header', $data );
		$this->load->view( 'management_book/templates/navbar' );
		$this->load->view( 'leader_request/DeleteRequest', $data );
		$this->load->view( 'management_book/templates/footer' );
	}

	public function deleteRequest() {
		$id = $this->input->post( 'id' );
		$this->GeneralModel->remove( $id, 'leader_request', 'Rid' );
		redirect( base_url() . 'requests/deleteLeaderRequest' );
	}

 	public function jsonData($id,$msg)
	{
	    $data = '{
	      "recipient":{
	          "id":"' . $id . '"
	          },
	          "message":{
	              "text":"' . $msg . '"
	          },
	          "messaging_type": "MESSAGE_TAG",
	          "tag": "ACCOUNT_UPDATE"
	      }';

	    return $data;
	}//jsonData

	public function curlSetting($ch,$jsonData)
  	{
	    /* curl setting to send a json post data */
	    //Tell cURL that we want to send a POST request.
	    curl_setopt($ch, CURLOPT_POST, 1);

	    //Attach the encoded JSON string to the POST fields.
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    //Set the content type to application/json
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

	    //Execute the request.
	    curl_exec($ch); // user will get the message

  	}//curlSetting
    
    public function display_requests_e() {
		$req = $this->RequestsModel->get_data( 0, 'is_accepted', 'leader_request' );
		$data = array();
		if ( $req->num_rows > 0 ) {
			$data[ 'requests' ] = $req;
		} else {
			$data[ 'empty' ] = '<div class="alert alert-danger" style="text-align:center"> ?? ???? ????? </div>';
		}
		$this->load->view( 'leader_request/header' );

		$this->load->view( 'leader_request/exceptional_requests', $data );

	}


}
?>