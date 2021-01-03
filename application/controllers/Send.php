<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('SignUpModel');    	
    $this->load->model('AmbassadorModel');      
    $this->load->model('books');  
      
	}//end construct()


  public function index(){
         $ambassador = new AmbassadorModel();
          $requestNo=10835;
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

    echo $response;
  }
  public function OwlyApi(){
    require_once('OwlyApi.php');
    $owly = OwlyApi::factory( array('key' => '{c4pah0tpw68kcwc4sswks4cg03ij385nihn}') );
    $sourceUrl = 'http://invokemedia.com/';
    
    try {
      $shortenedUrl = $owly->shorten($sourceUrl);
    } catch(Exception $e) {
      echo 'Error found in API:' . $e->getMessage() . "<br />/n";
      $shortenedUrl = "";
    }
    echo 'Shortened URL:' . $shortenedUrl . "<br />/n";

}

  public function test()
  {
    $recipient="3197321007062062";
    $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBABe9vJc3OdVVrFaKT0EOWR5eZAS9ZAjHjvD97M5zuCH2xWfhoaLK7R2qCQOUAsDuc9yKvgMF5HWeTxa5hk9Lc1hQajU45p9ZCZAlkqAgwTw7ijfG0NEEiEmZAsnaJiPGc82ykaTsZC65kVWY59zT4krNdusVZCSfwZDZD';

    // /*initialize curl*/
    $ch = curl_init($url);
    
    $allAmbassadors=$this->AmbassadorModel->getByRequestId(5);
        $ambassadors="";
        $bitlyClient = new BitlyClient('d4528ad236dbe8ff010e571c22880d9d1aec93cf');
        $i=1;
        foreach ($allAmbassadors as $ambassador) {
            $options = [
                'longUrl' => $ambassador->profile_link,
                'format' => 'json' // pass json, xml or txt
            ];
            $response = $bitlyClient->shorten($options);
            $shortenLink=$response->data->url;

          $ambassadors=$ambassadors. "[".$i."] ".$ambassador->name. '\n'. $shortenLink.'\n';
          $i++;
        }
    // /*prepare response*/
    $jsonData =  $this->jsonData($recipient,$ambassadors);
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
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
    //Execute the request if the message is not empty.
    curl_exec($ch); // user will get the message
  
  }//curlSetting


}//class
?>