<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUpWithFB extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('SignUpModel');
    $this->load->model('AmbassadorModel');
    $this->load->model('RequestsModel');
    $this->load->model('books');
    $this->load->model('StatisticsModel');
    $this->load->library('session');

	}//end construct()

 	public function index()
  {

    if (!empty($_SESSION['question_5'])) {
      session_destroy();
      $this->load->view('sign_up/question_5');
    }
    else{
      $this->load->view( 'sign_up/templates/header');
      $this->load->view( 'sign_up/templates/navbar' );
      //Load Main Page
      $this->load->view('sign_up/index');
      $this->load->view( 'sign_up/templates/footer');

    }

  }//index

  public function trial()
  {
    $this->load->view('sign_up/404');
      // $this->load->view( 'sign_up/templates/header');
      // $this->load->view( 'sign_up/templates/navbar' );
      // //Load Main Page
      // $this->load->view('sign_up/trial');
      // $this->load->view( 'sign_up/templates/footer');
  }//trial

 public function nextPage()
  {
    if(! empty($_POST['next'])){
      $page="sign_up/".$_POST['next'];

      if($_POST['next'] == "question_4"){
        $sections['sections']=$this->books->getSections(1);

          $data = $this->load->view($page,$sections);
          return $data;

      }//if
      else{
        $file=APPPATH.'views/'.$page.'.php';
        if(file_exists($file)){
          $data =$this->load->view($page);
          return $data;
        }//if
        else{
          $data = $this->load->view('sign_up/404');
          return $data;


        }//else

      }//else
    }//if
    else{
      $data = $this->load->view('sign_up/404');
      return $data;

    }

  }//nextPage

  public function checkAmbassador()
  {
    $reallocate=false;
    $result=$this->AmbassadorModel->checkAmbassador($_GET['fb_id']);
    if (count((array)$result) == 0 ){
      //if not exist
      // $this->load->view('sign_up/leader_gender');
      $_SESSION['question_5']='question_5';
      $url=base_url()."SignUp/";
      header('Location: '.$url);
      exit();
    }//if
    else{
      //Inform Ambassador
      if($result->request_id == null){
        // Still No Leader
        $this->noLeaderFound();
      }
      else{
        $request=$this->SignUpModel->getRequestInfo($result->request_id);
        $created_at =DateTime::createFromFormat ( "Y-m-d H:i:s",$result->created_at );
        $created_at=date_create($created_at->format("Y-m-d"));
        $current=date_create(date("Y-m-d",time()));
        $diff=date_diff($created_at,$current);

        if($diff->format("%a") > 2){ 
          $reallocate=true;
        }//if
        $leader_info=$this->SignUpModel->getLeaderInfo($request->leader_id);
        $informLeader=false;
        $ambassador=$this->AmbassadorModel->getByFBId($_GET['fb_id']);
        $this->informambassador($reallocate,$ambassador,$leader_info,$result->request_id,$informLeader,$request->leader_id);
      }

    }
  }//checkAmbassador



  public function allocateAmbassador(){
    if (!empty($_POST['ambassador'])) {
      $ambassador_info=$_POST['ambassador'];
      $ambassadorGender=$ambassador_info['gender'];
      $leaderGender=$_POST['leader_gender'];
      $country=$_POST['country'];

      if ($ambassadorGender == 'any') {
      $ambassador_condition="leader_request.gender = '" .$ambassadorGender . "'";
      }
      else{
        $ambassador_condition="(leader_request.gender = '". $ambassadorGender ."' OR leader_request.gender = 'any')";
      }

      if ($leaderGender == "any") {
        $leader_condition=" (leader_info.leader_gender = 'female' OR leader_info.leader_gender = 'male')";
      }
      else{
        $leader_condition="leader_info.leader_gender = '".$leaderGender."'";
      }

      $exit=false;
      while (! $exit ) {
        //Check New Teams
        $result=$this->SignUpModel->selectTeam($leader_condition,$ambassador_condition);
        if (count((array)$result) == 0 ){
          //Check Teams With Less Than 12 Members
          $result=$this->SignUpModel->selectTeam($leader_condition,$ambassador_condition,"BETWEEN  1 AND 12");
            if (count((array)$result) == 0 ){
              //Check Teams With More Than 12 Members
              $result=$this->SignUpModel->selectTeam($leader_condition,$ambassador_condition," > 12");
                if (count((array)$result) == 0 ){
                  $ambassadorWithoutLeader=$this->ambassadorWithoutLeader($ambassador_info,$ambassadorGender,$leaderGender,$result,$country);
                  $this->AmbassadorModel->insertAmbassador($ambassadorWithoutLeader);
                  $this->noLeaderFound();
                  $exit=true;
                }//if
                else{
                  $ambassador=$this->formatAmbassador($ambassador_info,$ambassadorGender,$leaderGender,$result,$country);
                    // Check Leader Request
                    //1- chekc associated requests
                    $numberOfRequests=$this->AmbassadorModel->countRequests( $result->Rid);
                    //2- compare to the requested number
                      //If available, insert   
                      if ($result->members_num > $numberOfRequests->totalRequests) {
                        $this->AmbassadorModel->insertAmbassador($ambassador);
                        $this->checkout($ambassador, $result->Rid,$result->leader_id,$result->members_num);
                        $exit=true;
                      }//if
                      //Else update request to done
                      else{
                        $this->RequestsModel->updateRequest( $result->Rid);
                        continue;
                      }//else      
                }//else
            }//if
            else{
              $ambassador=$this->formatAmbassador($ambassador_info,$ambassadorGender,$leaderGender,$result,$country);
              // Check Leader Request
                    //1- chekc associated requests
                    $numberOfRequests=$this->AmbassadorModel->countRequests( $result->Rid);
                    //2- compare to the requested number
                      //If available, insert   
                      if ($result->members_num > $numberOfRequests->totalRequests) {
                        $this->AmbassadorModel->insertAmbassador($ambassador);
                        $this->checkout($ambassador, $result->Rid,$result->leader_id,$result->members_num);
                        $exit=true;
                      }//if
                      //Else update request to done
                      else{
                        $this->RequestsModel->updateRequest( $result->Rid);
                        continue;
                      }//else      
            }//else
        }//if
        else{
          $ambassador=$this->formatAmbassador($ambassador_info,$ambassadorGender,$leaderGender,$result,$country);
          // Check Leader Request
                    //1- chekc associated requests
                    $numberOfRequests=$this->AmbassadorModel->countRequests( $result->Rid);
                    //2- compare to the requested number
                      //If available, insert   
                      if ($result->members_num > $numberOfRequests->totalRequests) {
                        $this->AmbassadorModel->insertAmbassador($ambassador);
                        $this->checkout($ambassador, $result->Rid,$result->leader_id,$result->members_num);
                        $exit=true;
                      }//if
                      //Else update request to done
                      else{
                        $this->RequestsModel->updateRequest( $result->Rid);
                        continue;
                      }//else             
          }//else
      }//while

    }//if
    else{
      $this->load->view('sign_up/fb_login');
    }

  }//allocateAmbassador

  public function checkout($ambassador,$request_id,$leader_id,$members_num){
    $informLeader=false;
    // 1- Inform Ambassador
      //1- get leader Information
        $leader_info=$this->SignUpModel->getLeaderInfo($leader_id);

    // 3- Check Leader Requests
      //1- chekc associated requests
      $numberOfRequests=$this->AmbassadorModel->countRequests($request_id);
      //2- compare to the requested number
        //If match, update is_done to 1
      if ($members_num < $numberOfRequests->totalRequests) {
        //1- update request to DONE
        $this->RequestsModel->updateRequest($request_id);
        $url = 'https://graph.facebook.com/v8.0/me/messages?access_token=EAAGBGHhdZAhQBAEeKZAAP0WHt88FNmvkwD0d6vlbCNPxbRuKa4rLUDRhEZCzecSomSJ08KaJzSQRghUyxorJlwYK6YcziiZAO5LEbQVMfqpkk0KzGK47AqoLfP5NFT5Uja2eeWV4pVpRYL2LcmbGIFUnQaYDehlirsZA4gzhMaQZDZD';

        /*initialize curl*/
        $ch = curl_init($url);
        
        $allocationError="Request ID , " . $request_id;

        //MASA
        $recipient="3031661570267952";
         $jsonData =  $this->jsonData($recipient,$allocationError);
        /* curl setting to send a json post data */
        $this->curlSetting($ch,$jsonData);

        //AHMAD
        $recipient="4876332469074757";
         $jsonData =  $this->jsonData($recipient,$allocationError);
        /* curl setting to send a json post data */
        $this->curlSetting($ch,$jsonData);

      }//if
      if ($members_num == $numberOfRequests->totalRequests) {
        $informLeader = true;
      }//if

    //4- load view to inform ambassador [FINAL STEP]
      $ambassadorInfo=$this->AmbassadorModel->getByRequestId($request_id);
      $reallocate=false;
      $this->informambassador($reallocate,$ambassadorInfo,$leader_info,$request_id,$informLeader,$leader_id);
  }//checkout

  public function informambassador($reallocate,$ambassador,$leader_info,$request_id,$informLeader,$leader_id)
  {
  
    $team_info = array(
        'leader_info'  => $leader_info,
        'request_id'     => $request_id,
        'inform_leader' => $informLeader,
        'leader_id' => $leader_id,
        'ambassador' =>$ambassador,
        'reallocate'=> $reallocate
    );

    $_SESSION['team_info']=$team_info;


    $data = $this->load->view('sign_up/step_1');
    return $data;
  }//informambassador

  
  public function formatAmbassador($ambassador_info,$ambassador_gender,$leader_gender,$result,$country)
  {         
    if (is_null($country)) {
      $country='none';
    }
    else{
      $country_t=$country;
    }

    $ambassador = array(
                'name' => $ambassador_info['name'],
                'country'=>$country_t,
                'gender'=>$ambassador_gender,
                'leader_gender'=>$leader_gender,
                'request_id'=>$result->Rid,
                'profile_link'=>"https://www.facebook.com/",
                'fb_id'=>$ambassador_info['fb_id']
                );
    return $ambassador;
  }//formatAmbassador

  public function ambassadorWithoutLeader($ambassador_info,$ambassador_gender,$leader_gender,$country)
  {
          if (is_null($country)) {
            $country_t='none';
          }
          else{
            $country_t=$country;
          }
    $ambassador = array(
                'name' => $ambassador_info['name'],
                'country'=>$country_t,
                'gender'=>$ambassador_gender,
                'leader_gender'=>$leader_gender,
                'profile_link'=>"https://www.facebook.com/",
                'fb_id'=>$ambassador_info['fb_id']
                );
    return $ambassador;
  }//ambassadorWithoutLeader

  public function noLeaderFound()
  {
    $this->load->view('sign_up/templates/header');
    $this->load->view('sign_up/templates/navbar' );
    $this->load->view('sign_up/no_leader_found');
    $this->load->view('sign_up/templates/footer');
  }//noLeaderFound


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


}//class
?>
