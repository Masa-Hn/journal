<? 
$this->load->model('AmbassadorModel');
$this->load->model('SignUpModel');
if (isset($_GET['hub_verify_token'])) { 
    if ($_GET['hub_verify_token'] === 'SARA') {
        echo $_GET['hub_challenge'];
        return;
    } else {
        echo 'Invalid Verify Token';
        return;
    }
}

/* receive and send messages */
$input = json_decode(file_get_contents('php://input'), true);
if (isset($input['entry'][0]['messaging'][0]['sender']['id'])) {

	if ($input['entry'][0]['id']=='100360891928932') {
		$url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAKzEjIBpjzXZCGEiw8FS7ZAhJhqodPVjl4RuTFHsamYE0WiOF7m1VYpNAfZBnyzIYcTZABfp2ZBEu8Dh9o5mjZB1p80yCrFfJt0X5gweZBpAw3O2lrEsGQIROEbH4RThI20L7EL47j91t3ZAUTULHs1ZAgTaQxGAFx9xZBXqeKHsov';
		
		$sender = $input['entry'][0]['messaging'][0]['sender']['id']; //sender facebook id
	    $message = $input['entry'][0]['messaging'][0]['message']['text']; //text that user sent
/*
		$str=$message;
		$str=str_replace(" ","",$str);
		$start=strpos($str,"(");
		$end=strpos($str,")");
		$length= $end-$start;
		$requestNo=substr($str,$start+1,$length-1);

		$ambassador = new AmbassadorModel();

        $result=$ambassador->getById($requestNo);

        if(count((array)$result) > 0){
        	$ambassador->updateMessengerId($requestNo,$sender);
        	if (! is_null($result->request_id)) {
        		$requestInfo = new SignUpModel();
        		$request=$requestInfo->getRequestInfo($result->request_id);
        		$leader_info=$requestInfo->getLeaderInfo($request->leader_id);
        		
        		$response="مرحبا بك 🌹 ".'\n'." . ".'\n'."فريق القراءة الخاص بك أصبح مستعدًا لاستقبالك." .'\n'." . ".'\n'." تفضل بعمل انضمام هنا 👇🏻 " .'\n'."'".$leader_info->team_link."'".'\n'. " سوف تواجه سؤال عن الكود الخاص بالدخول، قم بتزويدهم بهذا الكود 👇🏻 " .'\n'."'".$leader_info->uniqid.$leader_info->id."'".'\n'. " ننتظرك بيننا" .'\n'." سعداء جدا بك 🌹";
          }
          else{
            $response="شكرا لك 🌸 ".'\n'." . ".'\n'."تم تسجيل طلبك للحصول على فريق متابعة قراءة، سوف تصلك معلومات الفريق خلال أقل من ٢٤ ساعة".'\n'." . ".'\n'." نعمل لأجلكم. ";    
          }
*/
        }//if registered
        else{
          $response="شكرا لرسالتك، هناك خطأ في الإرسال. حيث أن رقم الطلب الذي قمت بإرساله غير موجود. " .'\n'. "لطفا قم بمراسلتنا يدويا هنا".'\n'. "https://www.facebook.com/taheelofosboha";
        }

		/*initialize curl*/
	    $ch = curl_init($url);
	    /*prepare response*/
	    $jsonData = '{
	    "recipient":{
	        "id":"' . $sender . '"
	        },
	        "message":{
	            "text":"'. $response . '"
	        }
	    }';
	    /* curl setting to send a json post data */
	    //Tell cURL that we want to send a POST request.
	    curl_setopt($ch, CURLOPT_POST, 1);

	    //Attach the encoded JSON string to the POST fields.
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

	    //Set the content type to application/json
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	    
	    //Execute the request if the message is not empty.
	    if (!empty($message)) {
	        $result = curl_exec($ch); // user will get the message
	    }


	}//if Ambassador
	else{
		$sender = $input['entry'][0]['messaging'][0]['sender']['id']; //sender facebook id
	    $message = $input['entry'][0]['messaging'][0]['message']['text']; //text that user sent
	    $entryID=$input['entry'][0]['id'];
	    //$url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAQ3QVDPtMoBAFFi0yMQidptQyKTdoOc4ZAqSyj295bkGT9i35bTpdS4UIxCB1UYBSdibNF6QoJIM17H01zJZAog75ucBhyby46tAqhSNAtvAW9WZBXHxCjqiI2bHq0Ph1FXdu5hgBSeMOKxEkMP56RtWp9ZA6dlwJm8FFVIegZDZD';

        $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAKzEjIBpjzXZCGEiw8FS7ZAhJhqodPVjl4RuTFHsamYE0WiOF7m1VYpNAfZBnyzIYcTZABfp2ZBEu8Dh9o5mjZB1p80yCrFfJt0X5gweZBpAw3O2lrEsGQIROEbH4RThI20L7EL47j91t3ZAUTULHs1ZAgTaQxGAFx9xZBXqeKHsov';
        
	    /*initialize curl*/
	    $ch = curl_init($url);
	    /*prepare response*/
	    $jsonData = '{
	    "recipient":{
	        "id":"' . $sender . '"
	        },
	        "message":{
	            "text":"Your id is , ' . $sender . '"
	        }
	    }';
	    /* curl setting to send a json post data */
	    //Tell cURL that we want to send a POST request.
	    curl_setopt($ch, CURLOPT_POST, 1);

	    //Attach the encoded JSON string to the POST fields.
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

	    //Set the content type to application/json
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	    
	    //Execute the request if the message is not empty.
	    if (!empty($message)) {
	        $result = curl_exec($ch); // user will get the message
	    }	
	}// Leader
    
}

?>
