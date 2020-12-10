<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Requests extends CI_Controller {

	public

	function __construct() {
		parent::__construct();
		$this->load->model( 'requestsModel' );
		$this->load->model( 'GeneralModel' );
		$this->load->library( 'form_validation' );
		$this->load->model('AmbassadorModel');

	} //end construct()

	public function index() {
		$arr['title'] = 'طلبات القادة';
		$this->load->view( 'leader_request/header', $arr );
		$regBefore = $this->requestsModel->check_email( $_GET[ 'email' ] );

		if ( $regBefore->num_rows > 0 ) {
			$info = $regBefore->fetch_array( MYSQLI_ASSOC );
			if ( $info[ 'leader_rank' ] == 5 ) {
				if ( $info[ 'leader_link' ] == null && $info[ 'leader_gender' ] == null ) {
					$this->load->view( 'leader_request/full_request' );
				} else {
					$this->load->view( 'leader_request/request' );
					$this->load->view( 'leader_request/edit_info' );
				}
			}
		} else {
			$this->load->view( 'leader_request/page_messaging' );
		}
	}

	public

	function check( $id ) {

		$getLastRecord = $this->requestsModel->leaderLastRequest( $id );
		if ( $getLastRecord->num_rows > 0 ) {
			$result = $getLastRecord->fetch_assoc();
			$date = $result[ 'date' ];
			//check if the date of the last record exceeds 3 days
			if ( ( date( 'Y-m-d' ) > date( 'Y-m-d', strtotime( $date . ' + 3 days' ) ) ) ) {
				return 1;
			} else {
				return 2;
			}
		} else {

			return 3;
		}
	}

	public

	function addFullRequest() {

		$msg = "";

		$this->form_validation->set_rules( 'leaderLink', 'رابط الصفحة الشخصية', 'trim|required' );
		$this->form_validation->set_message( 'required', 'الرجاء تعبئة حقل %s' );

		if ( $this->form_validation->run() ) {
			$info = $this->requestsModel->check_email( $_GET[ 'email' ] )->fetch_array( MYSQLI_ASSOC );
			// data of the leader
			$leader[ 'leader_id' ] = $info[ 'id' ];
			$leader[ 'leader_name' ] = $_GET[ 'name' ];
			$leader[ 'team_name' ] = $_POST[ 'teamName' ];
			$leader[ 'leader_link' ] = $_POST[ 'leaderLink' ];
			$leader[ 'team_link' ] = $_POST[ 'teamLink' ];
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
                   الرجاء التأكد من صحة الرابط!
                </div>";
			} else {
				//generate code
				$desired_length = 6;
				$unique = uniqid();
				$uniqid = "Osb180" . substr( $unique, strlen( $unique ) - $desired_length, $desired_length );
				$leader[ 'uniqid' ] = $uniqid;

				$val = $this->check( $leader[ 'leader_id' ] );
				if ( $val == 1 || $val == 3 ) {
					$this->requestsModel->updateFullRequest( $leader );

					$requestID = $this->requestsModel->addRequest( $request );

					$this->distributeAmbassadors( $requestID );

					$msg = "<div class='alert alert-success'>
                          تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                          </div>";
				} else if ( $val == 2 ) {
					$msg = "<div class='alert alert-danger'>
                         لا يمكنك طلب أعضاء قبل مضي ثلاثة أيام على آخر طلب لك!
                          </div>";
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

		$val = $this->check( $request[ 'leader_id' ] );
		if ( $val == 1 || $val == 3 ) {

			$rid = $this->requestsModel->addRequest( $request );
			$this->distributeAmbassadors( $rid );
			$msg = "<div class='alert alert-success'>
					تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
					</div>";
		} else if ( $val == 2 ) {
			$msg = "<div class='alert alert-danger'>
                     لا يمكنك طلب أعضاء قبل مضي ثلاثة أيام على آخر طلب لك!
                     </div>";
		}
		echo $msg;
	}

	public

	function edit() {
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
		$request = $this->requestsModel->getRequest( $requestID )->fetch_array( MYSQLI_ASSOC );
		$leader = $this->requestsModel->getLeaderInfo( $request[ 'leader_id' ] )->fetch_array( MYSQLI_ASSOC );

		$num_of_members = $request[ 'members_num' ];
		if ( $noneDistributedAmbassadors->num_rows > 0 ) {

			while ( $amb = $noneDistributedAmbassadors->fetch_array( MYSQLI_ASSOC ) ) {
				if ( $num_of_members != 0 ) {
					if ( ( $request[ 'gender' ] == $amb[ 'gender' ] || $request[ 'gender' ] == 'any' ) && ( $leader[ 'leader_gender' ] == $amb[ 'leader_gender' ] || $leader[ 'leader_gender' ] == 'any' ) ) {
						$this->requestsModel->updateAmbassador( $amb[ 'id' ], $requestID );
						if ($amb['messenger_id'] != 0) {
							
							$url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAKzEjIBpjzXZCGEiw8FS7ZAhJhqodPVjl4RuTFHsamYE0WiOF7m1VYpNAfZBnyzIYcTZABfp2ZBEu8Dh9o5mjZB1p80yCrFfJt0X5gweZBpAw3O2lrEsGQIROEbH4RThI20L7EL47j91t3ZAUTULHs1ZAgTaQxGAFx9xZBXqeKHsov';
		      				/*initialize curl*/
		      				$ch = curl_init($url);
							$response="مرحبا بك 🌹 ".'\n'." . ".'\n'."فريق القراءة الخاص بك أصبح مستعدًا لاستقبالك." .'\n'." . ".'\n'." تفضل بعمل انضمام هنا 👇🏻 " .'\n'."'".$leader['team_link']."'".'\n'. " سوف تواجه سؤال عن الكود الخاص بالدخول، قم بتزويدهم بهذا الكود 👇🏻 " .'\n'."'".$leader['uniqid'].$leader['id']."'".'\n'. " ننتظرك بيننا" .'\n'." سعداء جدا بك 🌹";
        					/*prepare response*/
					     	$jsonData =  $this->jsonData($amb['messenger_id'],$response);
					      	/* curl setting to send a json post data */
					      	$this->curlSetting($ch,$jsonData);

						}//if 
						$num_of_members--;
					}
				}
			}
		}
		$distributedAmbassadors = $this->requestsModel->getDistributedAmbassadors( $requestID );
		if ( $distributedAmbassadors->num_rows == $request[ 'members_num' ] ) {
			$this->requestsModel->updateReq( $requestID );
			//inform leader

			$url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAMnL65BxDAazaJg24ZCdVKWMtjd2TpdBUfI8wwPkScrurtsXKujqb0h1NZBZBvOCIJHg9oc6rHSz5iaa9l1eNHi4g4H1EQMmPHt16OS0ecWDUXI3ZBTTE9C0MDxvQiH0J7QkkqlFghWsOm3q81ZBQ6ZCoylt7faxM3ZAHzehtQZC';

		    /*initialize curl*/
		    $ch = curl_init($url);

		    $allAmbassadors=$this->AmbassadorModel->getByRequestId($requestID);
	        $ambassadors="";
	        $i=1;
	        foreach ($allAmbassadors as $ambassador) {
	          $ambassadors=$ambassadors. "[".$i."] ".$ambassador->name. '\n';
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

	public

	function deleteLeaderRequest() {
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

	public

	function deleteRequest() {
		$id = $this->input->post( 'id' );
		$this->GeneralModel->remove( $id, 'leader_request', 'Rid' );
		redirect( base_url() . 'requests/deleteLeaderRequest' );
	}

	public
	function display_requests_e() {
		$req = $this->requestsModel->get_data( 0, 'is_accepted', 'leader_request' );
		$data = array();
		if ( $req->num_rows > 0 ) {
			$data[ 'requests' ] = $req;
		} else {
			$data[ 'empty' ] = '<div class="alert alert-danger" style="text-align:center"> ?? ???? ????? </div>';
		}
		$this->load->view( 'leader_request/header' );

		$this->load->view( 'leader_request/exceptional_requests', $data );

	}

	public function jsonData($id,$msg)
	{
	    $data = '{
	      "recipient":{
	          "id":"' . $id . '"
	          },
	          "message":{
	              "text":"' . $msg . '"
	          }
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

}
?>