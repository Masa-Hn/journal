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

    $request=$this->SignUpModel->getRequestInfo(1000);
    $leader_info=$this->SignUpModel->getLeaderInfo(1);
    $email='saraismailse@gmail.com';
    $subject='معلوماتك فريقك';
    $message='
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head>
        <style type="text/css">
        body{
        text-align:center;
        font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; direction: rtl; background-color: #f5f8fa; color: #74787E; height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;
        }
        tr{
        text-align:center
        }
        .button{
        }
        table{
        width:"100%";
        font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; direction: rtl; background-color: #f5f8fa; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;
        }
        @media  only screen and (max-width: 600px) {
        .inner-body {
        width: 100% !important;
        text-align:center
        }
        
        .footer {
        width: 100% !important;
        }
        }
        @media  only screen and (max-width: 500px) {
        .button {
        width: 100% !important;
        }
        }
        </style>
        <body>
            <h1>
              أصبوحة 180
            </h1>
          <h3>
            مرحبا بك 🌹
            </h3>
          <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; direction: rtl; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: center;">
                فريق القراءة الخاص بك أصبح مستعدًا لاستقبالك.
            </p>
            <p>
                تفضل بعمل انضمام هنا 👇🏻
            </p>
            <p>
              كود الانضمام للمجموعة
            </p>
            <p><strong>'.$leader_info->uniqid.$leader_info->id.'</strong></p>
            <a href="'.$leader_info->team_link.'" class="button button-blue" target="_blank" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; direction: rtl; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); color: #FFF; display: inline-block; text-decoration: none; -webkit-text-size-adjust: none; background-color: #278036; border-top: 10px solid #278036; border-right: 18px solid #278036; border-bottom: 10px solid #278036; border-left: 18px solid #278036;">انضم     للمجموعة من هنا
            </a>
            
            <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; direction: rtl; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: center;">
                ننتظرك بيننا
                <br>
                سعداء جدا بك 🌹
            </p>
            <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; direction: rtl; line-height: 1.5em; margin-top: 0; color: darkred; font-size: 12px; text-align: center;">
                تواجهك مشكلة؟!
                <br>
                أرسل (البريد الإلكتروني) برسالة لصفحتنا وسوف نجيبك بمعلومات فريق القراءة الخاص بك.
                <br>
                <a href="https://www.messenger.com/t/100360891928932/" target="_blank"> M.me/newreaders180</a>
            </p>

        </body>
      </html>
    ';

      $config = array(
                    'protocol'  => 'smtp',
                    'smtp_host' => 'smtp.mailtrap.io',
                    'smtp_port' => 2525,
                    'smtp_user' => '', // my email
                    'smtp_pass' => '', // my mail pass
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8', //utf-8
                    'wordwrap'  => TRUE
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('test@gmail.com', 'أصبوحة 180');
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message);
                 $this->email->set_mailtype("html");

                if($this->email->send()){
                  $this->session->set_flashdata('msg','تم إرسال معلومات فريقك إلى بريدك الإلكتروني');
                }
  
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
    curl_exec($ch); // user will get the message
  
  }//curlSetting


}//class
?>