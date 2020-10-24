<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('SignUpModel');    	
    $this->load->model('AmbassadorModel');      
    $this->load->model('RequestsModel');  
    $this->load->model('books');  
      
	}//end construct()


  public function index()
  {
    $recipient="3197321007062062";
 
    $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBABe9vJc3OdVVrFaKT0EOWR5eZAS9ZAjHjvD97M5zuCH2xWfhoaLK7R2qCQOUAsDuc9yKvgMF5HWeTxa5hk9Lc1hQajU45p9ZCZAlkqAgwTw7ijfG0NEEiEmZAsnaJiPGc82ykaTsZC65kVWY59zT4krNdusVZCSfwZDZD';

    /*initialize curl*/
    $ch = curl_init($url);
    
    $allAmbassadors=$this->AmbassadorModel->getByRequestId(3);
        $ambassadors="";
        $i=1;
        foreach ($allAmbassadors as $ambassador) {
          $ambassadors=$ambassadors. "[".$i."] ".$ambassador->name. '\n'.$ambassador->profile_link.'\n';
          $i++;
        }

    // $firstMsg="السلام عليكم ورحمة الله وبركاته ".'\n'." كيف  الحال قيادة؟! 🌸 ".'\n'."تم إرسال أعضاء جدد لفريقك؛ نتمنى منك الاهتمام بهم يرجى منك إضافة جميع السفراء (بغض النظر دخل فريق المتابعة أو لا) إلى موقع العلامات وفي نهاية الأسبوع من لم يقرأ فقط قم بعمل انسحاب له (انسحاب وليس حذف من إشارة ❌) وذلك لتجنب الفوضى في مجموعة السفراء  ".'\n'."شكرا لك😍";

    /*prepare response*/
    $jsonData =  $this->jsonData($recipient,$ambassadors);
    /* curl setting to send a json post data */
    $this->curlSetting($ch,$jsonData);

    // $secMsg="رقم الطلب : ".$request_id;
    // $jsonData =  $this->jsonData($recipient,$secMsg);
    // /* curl setting to send a json post data */
    // $this->curlSetting($ch,$jsonData);

    //  /*Ambassadors*/
    // $jsonData =  $this->jsonData($recipient,$ambassadors);
    // /* curl setting to send a json post data */
    // $this->curlSetting($ch,$jsonData);

    // $lastMsg="⛔ قائدنا الكريم ⛔ ".'\n'." يصل السفير إليك مترددا ولا يعرف النظام الجميل في مشروعنا، قد يكتفي بطلب الانضمام ويتردد فيما يفعل بعدها.  ".'\n'." رجاءً 'ابدأ انت بمراسلته' وعمل منشن له على أي منشور ليتجاوب معك. أنت أهل لذلك. ".'\n'." ابدأ أنت ❤️";
    // /*prepare response*/
    // $jsonData =  $this->jsonData($recipient,$lastMsg);
    // /* curl setting to send a json post data */
    // $this->curlSetting($ch,$jsonData);    

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

    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
    //Execute the request if the message is not empty.
    $result = curl_exec($ch); // user will get the message
  
  }//curlSetting


}//class
?>