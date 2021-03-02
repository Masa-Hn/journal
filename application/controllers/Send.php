<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('SignUpModel');    	
    $this->load->model('AmbassadorModel');      
    $this->load->model('books');  
    $this->load->model('RequestsModel');
    //    $sender=3197321007062062;

	}//end construct()


  public function index(){
        $leader_info=orm_leader_info::get_instance(1);

      //SEND TO MESSENGER
      $recipient=$leader_info->get_messenger_id();
      $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAMnL65BxDAazaJg24ZCdVKWMtjd2TpdBUfI8wwPkScrurtsXKujqb0h1NZBZBvOCIJHg9oc6rHSz5iaa9l1eNHi4g4H1EQMmPHt16OS0ecWDUXI3ZBTTE9C0MDxvQiH0J7QkkqlFghWsOm3q81ZBQ6ZCoylt7faxM3ZAHzehtQZC';

      $ch = curl_init($url);

     $firstMsg="السلام عليكم ورحمة الله وبركاته ".'\n'." أرجو أن تكون بخير 🌸 ".'\n'." . ".'\n'."  لقد قام موقع الإرشاد الإلكتروني بتوزيع بعض المشتركين الجدد لفريقك حسب طلبك.".'\n'." . ".'\n'." . ".'\n'." ⚠️ تذكر، بعض المشتركين الجدد قد يغير رأيه و يمتنع عن الانضمام لفريق المتابعة أو لمشروعنا لأسباب شخصية مختلفة.  لا تقلق أبدًا لأن هدفنا هو الاستمرار بالمحاولة وتغيير نظرة المجتمع والتزامه اتجاه التعلم بالقراءة المنهجية، في حال لم يقم المشترك الجديد بالانضمام لمجموعة المتابعة الخاص بك، فإن بإمكانك طلب عدد جديد وسوف نقوم بتوفيره لك سريعًا ♥️.".'\n'." . ".'\n'." ".'\n'." ✅ حفظًا على جهودكم وجهود فريقكم، في حال ⛔ لم يظهر المشترك الجديد أي ردة فعل أو رغبة في القراءة بإمكانك ضغط على زر (انسحاب⛔) في موقع العلامات بعد نهاية الأسبوع الأول له.".'\n'." ".'\n'." قواكم الله وبارك همتكم قائدنا.";    
      /*prepare response*/
      $jsonData =  $this->jsonData($recipient,$firstMsg);
      print_r($jsonData); echo "</br>";
      /* curl setting to send a json post data */
      print_r($this->curlSetting($ch,$jsonData));

  
}

  public function test()
  {
    $sender="3197321007062062";
    $response="TEST";
                
                $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAIq0ZAi1cbhpvuL0SFoHlQe4SsYfr5ipWUmaSxtArUy0noKdaCWqN0JpZC3hfAeURKZBJkpBZAx3f3hcKQnuOjW0WDcMkOUqifB0Na2kG1FXGjoYVsp43hulareizWWiZAFhZAujcJC73X1ZBhxfRUgkfZARNyiRHQZDZD';

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
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

                
                //Execute the request if the message is not empty.
                    $result = curl_exec($ch); // user will get the message

                    print_r(curl_errno($ch));
                    //echo $result;
                  }//informLeader

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
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
    //Execute the request if the message is not empty.
    $result=curl_exec($ch); // user will get the message
  return $result;
  }//curlSetting


}//class
?>