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
				
               
				$requestID = $this->requestsModel->addRequest( $request );

				$this->distributeAmbassadors( $requestID );
				 $msg = "<div class='alert alert-success'>
                              تم إرسال طلبك بنجاح, سيتم تزويدك بالأعضاء قريباً
                              </div>";
                echo $msg;  
                
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

				if ($request[ 'current_team_count' ]>=30)
				{
					echo "<script type='text/javascript'>
				    alert('عدد الفريق مكتمل لديك !');
					</script>";
					echo "<script> window.location.href = '" . base_url() . "requests'; </script>";
				}
				else
				if ($request[ 'current_team_count' ]+$request['members_num']>30)
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
						print_r($amb[ 'id' ]);die();
						$this->requestsModel->updateAmbassador( $amb[ 'id' ], $requestID );
						$num_of_members--;
					}
				}
			}
		}
		$distributedAmbassadors = $this->requestsModel->getDistributedAmbassadors( $requestID );
		if ( $distributedAmbassadors->num_rows == $request[ 'members_num' ] ) {
			$this->informLeader($request[ 'leader_id' ],$requestID);
			$this->requestsModel->updateReq( $requestID );
		}
		if ($request[ 'members_num' ] < $distributedAmbassadors->num_rows) {
        //1- update request to DONE
       	$this->requestsModel->updateReq( $requestID );
        $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAEeKZAAP0WHt88FNmvkwD0d6vlbCNPxbRuKa4rLUDRhEZCzecSomSJ08KaJzSQRghUyxorJlwYK6YcziiZAO5LEbQVMfqpkk0KzGK47AqoLfP5NFT5Uja2eeWV4pVpRYL2LcmbGIFUnQaYDehlirsZA4gzhMaQZDZD';

        /*initialize curl*/
        $ch = curl_init($url);
        $recipient="3197321007062062";
        $allocationError=" خطأ من التوزيع بعد الطلب";
         $jsonData =  $this->jsonData($recipient,$allocationError);
        /* curl setting to send a json post data */
        $this->curlSetting($ch,$jsonData);


      }//if
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

	  public function informLeader($leader_id,$request_id)
  {
      //1- update request to DONE
        $this->RequestsModel->updateRequest($request_id);
        //2- get all associated requests
        $allAmbassadors=$this->AmbassadorModel->getByRequestId($request_id);
        $ambassadors="";
        $i=1;
        foreach ($allAmbassadors as $ambassador) {
          $ambassadors=$ambassadors. "[".$i."] ".$ambassador->name. '\n';
          $i++;
        }//foreach
      //3-Inform Leader
        $leader_info=$this->SignUpModel->getLeaderInfo($leader_id);
      //SEND TO MESSENGER
      $recipient=$leader_info->messenger_id;
      $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAEeKZAAP0WHt88FNmvkwD0d6vlbCNPxbRuKa4rLUDRhEZCzecSomSJ08KaJzSQRghUyxorJlwYK6YcziiZAO5LEbQVMfqpkk0KzGK47AqoLfP5NFT5Uja2eeWV4pVpRYL2LcmbGIFUnQaYDehlirsZA4gzhMaQZDZD';

      /*initialize curl*/
      $ch = curl_init($url);

      $firstMsg="السلام عليكم ورحمة الله ".'\n'." كيف الحال قيادة؟! 🌸 ".'\n'." . ".'\n'."  تم إرسال أعضاء جدد لفريقك؛ نتمنى منك الاهتمام بهم.".'\n'." . ".'\n'." . ".'\n'." يرجى منك إضافة جميع السفراء (بغض النظر دخل فريق المتابعة أو لا) إلى موقع العلامات. ".'\n'." . ".'\n'." ".'\n'." وفي نهاية الأسبوع من لم يقرأ فقط قم بعمل انسحاب له ((انسحاب وليس حذف من إشارة ❌)) وذلك لتجنب الفوضى في مجموعة السفراء. ".'\n'." ".'\n'." شكرا لك 😍".'\n'." ".'\n'."اسم السفير الجديد يظهر لك في الرسالة القادمة";
      /*prepare response*/
      $jsonData =  $this->jsonData($recipient,$firstMsg);
      /* curl setting to send a json post data */
      $this->curlSetting($ch,$jsonData);

       /*Ambassadors*/
      $jsonData =  $this->jsonData($recipient,$ambassadors);
      /* curl setting to send a json post data */
      $this->curlSetting($ch,$jsonData);

      $lastMsg="⛔ قائدنا الكريم ⛔".'\n'." ".'\n'."يصل السفير إليك مترددًا ولا يعرف النظام الجميل في مشروعنا، قد يكتفي بطلب الانضمام ويتردد فيما يفعل بعدها. ".'\n'.".".'\n'."رجاءً «ابدأ انت بمراسلته» وعمل منشن له على أي منشور ليتجاوب معك، أنت أهل لذلك. ".'\n'."ابدأ أنت ❤️";
      /*prepare response*/
      $jsonData =  $this->jsonData($recipient,$lastMsg);
      /* curl setting to send a json post data */
      $this->curlSetting($ch,$jsonData);

  }//informLeader

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