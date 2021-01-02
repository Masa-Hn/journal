<? 
$this->load->model('requestsModel');
$this->load->model('AmbassadorModel');
if (isset($_GET['hub_verify_token'])) { 
    if ($_GET['hub_verify_token'] === 'OSBOHA180') {
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
        $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAPK8WLuNIlmxZBkc1ogc1QHiM4nauGNrmnWT375PCJ1xEEyspT9wqGhBwzJZCVx2Y4cYXoXjcubDPydobOFzcvPK67W1UNxzLDE43Lp7ZCiAYW3G6Jn5RitCs4hSNQwTABMr2Pdd9NJTmwtmCsx5BdsDlfGQga2uAPZBejJX';
        
        $sender = $input['entry'][0]['messaging'][0]['sender']['id']; //sender facebook id
        $message = $input['entry'][0]['messaging'][0]['message']['text']; //text that user sent
        if (is_numeric($message)) {
            $requestNo=$message;
            $ambassador = new AmbassadorModel();

            $result=$ambassador->getById($requestNo);

            if(count((array)$result) > 0){ 
                
                if ($result->messenger_id  == 0 ) {
                    $ambassador->updateMessengerId($requestNo,$sender);
                }
                if (! is_null($result->request_id)) {
                    $requestInfo = new SignUpModel();
                    $request=$requestInfo->getRequestInfo($result->request_id);
                    $leader_info=$requestInfo->getLeaderInfo($request->leader_id);
                    
                    $response="مرحبا بك 🌹 ".'\n'." . ".'\n'."فريق القراءة الخاص بك أصبح مستعدًا لاستقبالك." .'\n'." . ".'\n'." تفضل بعمل انضمام هنا 👇🏻 " .'\n'."'".$leader_info->team_link."'".'\n'. " سوف تواجه سؤال عن الكود الخاص بالدخول، قم بتزويدهم بهذا الكود 👇🏻 " .'\n'."'".$leader_info->uniqid.$leader_info->id."'".'\n'. " ننتظرك بيننا" .'\n'." سعداء جدا بك 🌹";
                }
                else{
                    $response="شكرا لك 🌸 ".'\n'." . ".'\n'."تم تسجيل طلبك للحصول على فريق متابعة قراءة، سوف تصلك معلومات الفريق خلال أقل من ٢٤ ساعة".'\n'." . ".'\n'." نعمل لأجلكم. ";    
                }

            }//if registered
            else{
              $response="شكرا لرسالتك، هناك خطأ في الإرسال. حيث أن رقم الطلب الذي قمت بإرساله غير موجود. " .'\n'. "لطفا قم بمراسلتنا يدويا هنا".'\n'. "https://www.facebook.com/taheelofosboha";
            }//if nor registered
        }//if numeric
        // else{
        //     $response="شكرا لرسالتك، هناك خطأ في الإرسال. رسالتك لا تحتوي على رقم الطلب. " .'\n'. "لطفًا تأكد من رقم الطلب وأرساله برسالة منفصلة" .'\n'. "أو قم بالتسجيل من هنا".'\n'. "https://www.osboha180.com/rack/SignUp";
        // }
        
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
        $email = test_input($message);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $response = "هذه الصفحة مخصصة لقادة أصبوحة 180، إن كنت قائدًا وتواجه مشكلة أرسل سكرين شوت لمراقبك لنُساعدك في حلها ".'\n'."طبت وطابت أوقاتك";
        }
        else{
            $newLeader = new requestsModel();

            $result=$newLeader->get_data($email, 'leader_email', "leader_info");

            if($result->num_rows == 0){
                $leader[ 'leader_email' ] = $message;
                $leader[ 'messenger_id' ] = $sender;
                $newLeader->insertLeaderInfo($leader);

                $response=" تم تأكيد حسابك." .'\n'." . ".'\n'. "سوف يصلك قارئ جديد قريبًا، نوصيك أن تعتني به فهو خطوةٌ في مستقبلنا جميعا ♥️";
                
                $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAFn0RZCp9IwZAiDqgARdyAHsuTGmaSi0O6IXxXyQ4fqUxIm56e9J5JroaYNDKC7VFjUDCn6YKTR66ZBldkAYopouWAZB1BDsWsZA0LIZBNr40lfa0t0UMjgnQJeXlN6E3Bec85QVMNfSU8CgBg3R9H7Yrgl6n4VAZDZD';

                /*initialize curl*/
                $ch = curl_init($url);
                /*prepare response*/
                $jsonData = '{
                "recipient":{
                    "id":"' . $sender . '"
                    },
                    "message":{
                        "text":"' . $response . '"
                    }
                }';
                /* curl setting to send a json post data */
                //Tell cURL that we want to send a POST request.
                curl_setopt($ch, CURLOPT_POST, 1);

                //Attach the encoded JSON string to the POST fields.
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                //Set the content type to application/json
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                
                //Execute the request if the message is not empty.
                if (!empty($message)) {
                    $result = curl_exec($ch); // user will get the message
                }     
            }
            else{
                $response = "هذه الصفحة مخصصة لقادة أصبوحة 180، إن كنت قائدًا وتواجه مشكلة أرسل سكرين شوت لمراقبك لنُساعدك في حلها ".'\n'."طبت وطابت أوقاتك";

            }

        }//else
    }//if leader

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>