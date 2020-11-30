<?php
require 'vendor/autoload.php'; 
use Bitly\BitlyClient;

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


  public function index(){
     $this->load->view('sign_up/templates/header');
    $this->load->view('sign_up/templates/navbar' );
    $this->load->view('sign_up/no_leader_found');
    $this->load->view('sign_up/templates/footer');
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
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
    //Execute the request if the message is not empty.
    curl_exec($ch); // user will get the message
  
  }//curlSetting


}//class
?>