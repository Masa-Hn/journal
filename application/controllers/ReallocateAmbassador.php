<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReallocateAmbassador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('SignUpModel');
    $this->load->model('AmbassadorModel');
    $this->load->model('RequestsModel');
    $this->load->model('ReallocateAmbassadorModel');
    $this->load->model('StatisticsModel');

	}//end construct()

 	public function index()
  {
    $this->load->view('sign_up/reallocate_fb_login');
  }//index

  public function getAmbassadorData(){
    if (! empty($_POST['email'])) {
      $result=$this->AmbassadorModel->checkAmbassador($_POST['email']);
      if (count((array)$result) != 0 ){
        echo json_encode($this->AmbassadorModel->getByFBId($_POST['email']));
      }
      else{
        echo "unregistered";
      }
    }
    else{
      $this->load->view('sign_up/reallocate_fb_login');
    }
  }

  public function checkAmbassador()
  {
    $reallocate=false;
    $result=$this->AmbassadorModel->checkAmbassador($_GET['fb_id']);
    if (count((array)$result) == 0 ){
      $url=base_url()."SignUp/";
      header('Location: '.$url);
      exit();

    }//if
    else{
      //check time
      if(is_null($result->request_id)){
        // Still No Leader
        $this->noLeaderFound();
      }//if
      else{
        $request=$this->SignUpModel->getRequestInfo($result->request_id);
        $created_at =DateTime::createFromFormat ( "Y-m-d H:i:s",$result->created_at );
        $created_at=date_create($created_at->format("Y-m-d"));
        $current=date_create(date("Y-m-d",time()));
        $diff=date_diff($created_at,$current);

        if($diff->format("%a") > 2){ 
          $data['leader_id']=$request->leader_id;
          $data['request_id']=$result->request_id;
          $this->load->view('sign_up/leader_gender',$data);
        }//if
        else{
          $leader_info=$this->SignUpModel->getLeaderInfo($request->leader_id);
          $informLeader=false;
          $ambassador=$this->AmbassadorModel->getByFBId($_GET['fb_id']);
          $this->informambassador($reallocate,$ambassador,$leader_info,$result->request_id,$informLeader,$request->leader_id);

        }//else
      }//else
    }//else
  }//checkAmbassador

  public function allocateAmbassador(){

    if (!empty($_POST['ambassador'])) {
      $ambassador_info=$_POST['ambassador'];
      $leader_gender=$_POST['leader_gender'];
      $leader_id=$_POST['leader_id'];
      $request_id=$_POST['request_id'];
      $currentTime=time();
      $date_update=date("Y-m-d",$currentTime);

      
      // //Check ambassador gender
        if ($ambassador_info['gender'] != "female" && $ambassador_info['gender']!="male") {
          $ambassador_gender="any";

        }
        else{
          $ambassador_gender=$ambassador_info['gender'];
        }

      //check leader gender
        if ($leader_gender == "any") {
          //Check New Teams

            $result=$this->ReallocateAmbassadorModel->newTeamsAnyLeader($ambassador_gender,$leader_id);
            if (count((array)$result) == 0 ){

              //Check Teams With Less Than 12 Members
                $result=$this->ReallocateAmbassadorModel->anyLeader($ambassador_gender, "<=",$leader_id);
                if (count((array)$result) == 0 ){
                  //Check Teams With More Than 12 Members
                    $result=$this->ReallocateAmbassadorModel->anyLeader($ambassador_gender, ">",$leader_id);
                    if (count((array)$result) == 0 ){

                      $this->AmbassadorModel->updateAmbassador($ambassador_info['fb_id'],$leader_gender,null,$date_update);

                      $this->noLeaderFound();
                    }//if
                    else{
                      $this->checkout($ambassador_info['fb_id'],$leader_gender, $result->Rid,$result->leader_id,$result->members_num);
                    }//else

                }//if
                else{
                   $this->checkout($ambassador_info['fb_id'],$leader_gender, $result->Rid,$result->leader_id,$result->members_num);
                }//else
            }//if
            else{
              $this->checkout($ambassador_info['fb_id'],$leader_gender, $result->Rid,$result->leader_id,$result->members_num);
            }//else
        }//if
        else{
          //for specific leader gender
          //Check New Teams
            $result=$this->ReallocateAmbassadorModel->getNewTeams($leader_gender,$ambassador_gender,$leader_id);
            if (count((array)$result) == 0 ){

              //Check Teams With Less Than 12 Members

                $result=$this->ReallocateAmbassadorModel->getTeams($leader_gender,$ambassador_gender, "<=",$leader_id);  

                if (count((array)$result) == 0 ){
                  //Check Teams With More Than 12 Members
                    $result=$this->ReallocateAmbassadorModel->getTeams($leader_gender,$ambassador_gender, ">",$leader_id);
                    if (count((array)$result) == 0 ){

                      $this->AmbassadorModel->updateAmbassador($ambassador_info['fb_id'],$leader_gender,null,$date_update);
                      $this->noLeaderFound();
                    }//if
                    else{
                      $this->checkout($ambassador_info['fb_id'],$leader_gender, $result->Rid,$result->leader_id,$result->members_num);
                    }//else
                }//if
                else{
                  $this->checkout($ambassador_info['fb_id'],$leader_gender, $result->Rid,$result->leader_id,$result->members_num);
                }//else
            }//if
            else{
              $this->checkout($ambassador_info['fb_id'],$leader_gender, $result->Rid,$result->leader_id,$result->members_num);
            }//else
        }//else

    }//if
    else{
      $this->load->view('sign_up/reallocate_fb_login');
    }

  }//allocateAmbassador

  public function checkout($fb_id,$leader_gender,$request_id,$leader_id,$members_num){
    $informLeader=false;
    // 1- UPDATE Ambassador
    $currentTime=time();
    $date_update=date("Y-m-d",$currentTime);


    $this->AmbassadorModel->updateAmbassador($fb_id,$leader_gender,$request_id,$date_update);


    // 2- Inform Ambassador
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
        $recipient="3197321007062062";
        $allocationError="خطأ من اعادة التوزيع";
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
    $data = $this->load->view('sign_up/team_info');
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

      $firstMsg="السلام عليكم ورحمة الله وبركاته ".'\n'." كيف  الحال قيادة؟! 🌸 ".'\n'."تم إرسال أعضاء جدد لفريقك؛ نتمنى منك الاهتمام بهم يرجى منك إضافة جميع السفراء (بغض النظر دخل فريق المتابعة أو لا) إلى موقع العلامات وفي نهاية الأسبوع من لم يقرأ فقط قم بعمل انسحاب له (انسحاب وليس حذف من إشارة ❌) وذلك لتجنب الفوضى في مجموعة السفراء  ".'\n'."شكرا لك😍";

      /*prepare response*/
      $jsonData =  $this->jsonData($recipient,$firstMsg);
      /* curl setting to send a json post data */
      $this->curlSetting($ch,$jsonData);

      $secMsg="رقم الطلب : ".$_POST['request_id'];
      $jsonData =  $this->jsonData($recipient,$secMsg);
      /* curl setting to send a json post data */
      $this->curlSetting($ch,$jsonData);

       /*Ambassadors*/
      $jsonData =  $this->jsonData($recipient,$ambassadors);
      /* curl setting to send a json post data */
      $this->curlSetting($ch,$jsonData);

      $lastMsg="⛔ قائدنا الكريم ⛔ ".'\n'." يصل السفير إليك مترددا ولا يعرف النظام الجميل في مشروعنا، قد يكتفي بطلب الانضمام ويتردد فيما يفعل بعدها.  ".'\n'." رجاءً 'ابدأ انت بمراسلته' وعمل منشن له على أي منشور ليتجاوب معك. أنت أهل لذلك. ".'\n'." ابدأ أنت ❤️";
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

  public function noLeaderFound()
  {
    $this->load->view('sign_up/templates/header');
    $this->load->view('sign_up/templates/navbar' );
    $this->load->view('sign_up/no_leader_found');
    $this->load->view('sign_up/templates/footer');
  }//noLeaderFound

}//class
?>
