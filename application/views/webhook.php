<? $this->load->model( 'requestsModel' );
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
    if ($input['entry'][0]['id']='100360891928932') {
        $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAQ3QVDPtMoBAMNQyUiRS7CQlEyMslpg4leReYY8qIzgTPNFQUMpMNu2sezWyMWTlWAy2w50IIDnTof0gcvdMZBxNbEXnER3mehouK8T0oFPO7B630QFZCswKgsrsSJdb8YjqpQGuICuSldBGvfZBY2JNxZAu42BFVUsE8ftEAZDZD';
        
        $sender = $input['entry'][0]['messaging'][0]['sender']['id']; //sender facebook id
        $message = $input['entry'][0]['messaging'][0]['message']['text']; //text that user sent
        $response="مرحبًا، كيف يمكنني مساعدتك؟"
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
            }//if

    }//if
    else{

    $sender = $input['entry'][0]['messaging'][0]['sender']['id']; //sender facebook id
    $message = $input['entry'][0]['messaging'][0]['message']['text']; //text that user sent
    $email = test_input($message);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //$response = "هذه الصفحة مخصصة لقادة أصبوحة 180، إن كنت قائدًا وتواجه مشكلة أرسل سكرين شوت لمراقبك لنُساعدك في حلها ".'\n'."طبت وطابت أوقاتك";
    }
    else{
        $newLeader = new requestsModel();
        $result=$newLeader->get_data($sender, 'messenger_id', "leader_info");

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
            }//if     
        }//if
        // else{
        //     $response = "هذه الصفحة مخصصة لقادة أصبوحة 180، إن كنت قائدًا وتواجه مشكلة أرسل سكرين شوت لمراقبك لنُساعدك في حلها ".'\n'."طبت وطابت أوقاتك";
        // }//else
    }//else
    }

}//if

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>