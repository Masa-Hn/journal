<?php
//require 'vendor/autoload.php';
//use Bitly\BitlyClient;

defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('SignUpModel');
    $this->load->model('AmbassadorModel');
    $this->load->model('RequestsModel');
    $this->load->model('books');
    $this->load->model('StatisticsModel');
    $this->load->library('session');
    $this->load->library('form_validation');


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
    if(!empty($_POST['email'])){
      $result=$this->AmbassadorModel->checkAmbassador($_POST['email']);
      
      if (count((array)$result) == 0 ){
      //New Ambassador

        if(!empty($_POST['ambassador_name']) && !empty($_POST['ambassador_gender']) && !empty($_POST['leader_gender']) )
        {
          
          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMsg = "أدخل بريدًا صحيحًا"; 
            $this->load->view('sign_up/registration_form',$errorMsg);
          }// if for email validation
          else{
            $this->allocateAmbassador($_POST['ambassador_name'],$_POST['ambassador_gender'],$_POST['leader_gender'],$_POST['email']);  
          }//allocateAmbassador

        }//if for required field
        else{
          $errorMsg = "أدخل الحقول المطلوبة"; 
          $this->load->view('sign_up/registration_form',$errorMsg);

        }//else for required field
      }//if for not exist

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
          $ambassador=$this->AmbassadorModel->getByFBId($_POST['email']);
          $this->informambassador($reallocate,$ambassador,$leader_info,$result->request_id,$informLeader,$request->leader_id);
        }
      }
    }
    else{
      //return to reg page
      $errorMsg = "أدخل معلوماتك"; 

      $this->load->view('sign_up/registration_form');
    }
  }//checkAmbassador



  public function allocateAmbassador($ambassadorName,$ambassadorGender,$leaderGender,$email)
  {
    $ambassador_name=$ambassadorName;
    $ambassador_email=$email;
    $country='none';
    
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
                $ambassadorWithoutLeader=$this->ambassadorWithoutLeader($ambassador_name,$ambassadorGender,$leaderGender,$country,$ambassador_email);
                $this->AmbassadorModel->insertAmbassador($ambassadorWithoutLeader);
                $this->noLeaderFound();
                $exit=true;
              }//if
              else{
                $ambassador=$this->formatAmbassador($ambassador_name,$ambassadorGender,$leaderGender,$result,$country,$ambassador_email);
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
            $ambassador=$this->formatAmbassador($ambassador_name,$ambassadorGender,$leaderGender,$result,$country,$ambassador_email);
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
        $ambassador=$this->formatAmbassador($ambassador_name,$ambassadorGender,$leaderGender,$result,$country,$ambassador_email);
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
 

  }//allocateAmbassador

  public function checkout($ambassador,$request_id,$leader_id,$members_num){
    $informLeader=false;
    // 1- Inform Ambassador
      //1- get leader Information
        $leader_info=$this->SignUpModel->getLeaderInfo($leader_id);

    // 2- Check Leader Requests
      //1- chekc associated requests
      $numberOfRequests=$this->AmbassadorModel->countRequests($request_id);
      //print_r($numberOfRequests); die();
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


    //3- load view to inform ambassador [FINAL STEP]
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

  public function informLeader()
  {
    if (!empty($_POST['leader_id']) && !empty($_POST['request_id']) ) {
      //1- update request to DONE
        $this->RequestsModel->updateRequest($_POST['request_id']);
        //2- get all associated requests
        $allAmbassadors=$this->AmbassadorModel->getByRequestId($_POST['request_id']);
        $ambassadors="";
        $i=1;
        foreach ($allAmbassadors as $ambassador) {
          $ambassadors=$ambassadors. "[".$i."] ".$ambassador->name. '\n';
          $i++;
        }//foreach
      //3-Inform Leader
        $leader_info=$this->SignUpModel->getLeaderInfo($_POST['leader_id']);
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
    }//if
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


  public function formatAmbassador($ambassador_name,$ambassador_gender,$leader_gender,$result,$country,$ambassador_email)
  {         
    $ambassador = array(
                'name' => $ambassador_name,
                'country'=>$country,
                'gender'=>$ambassador_gender,
                'leader_gender'=>$leader_gender,
                'request_id'=>$result->Rid,
                'profile_link'=>'https://www.facebook.com/',
                'fb_id'=>$ambassador_email
                );
    return $ambassador;
  }//formatAmbassador

  public function ambassadorWithoutLeader($ambassador_name,$ambassador_gender,$leader_gender,$country,$ambassador_email)
  {
    $ambassador = array(
                'name' => $ambassador_name,
                'country'=>$country,
                'gender'=>$ambassador_gender,
                'leader_gender'=>$leader_gender,
                'profile_link'=>'https://www.facebook.com/',
                'fb_id'=>$ambassador_email
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

}//class
?>
