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
    $this->load->view('sign_up/reallocate_login');
  }//index

  public function checkReallocateCode(){
    if (! empty($_POST['code'])) {
      $result=$this->ReallocateAmbassadorModel->checkAmbassadorCode($_POST['code']);
      if (count((array)$result) != 0 ){
        $this->load->view('sign_up/leader_gender');
      }
      else{
        $errorMsg = "الكود الذي ادخلته غير صحيح"; 
        $this->load->view('sign_up/reallocate_login',$errorMsg);
      }
    }
  }
  public function checkAmbassador()
  {
    if(!empty($_POST['email'])){
      $result=$this->AmbassadorModel->checkAmbassador($_POST['email']);      
        if (count((array)$result) != 0 ){
          //Found Ambassador

            if(!empty($_POST['leader_gender']) )
            {
              $this->allocateAmbassador($result,$_POST['leader_gender'],$_POST['email']);  
            }//allocateAmbassador
            else{
              $errorMsg = "أدخل الحقول المطلوبة"; 
              $this->load->view('sign_up/leader_gender',$errorMsg);
            }//else for required field
        }//if Found
        else{
          //return to reg page
          $errorMsg = "البريد الالكتروني غير مسجل"; 
          $this->load->view('sign_up/leader_gender',$errorMsg);
        }
      }
      $errorMsg = "أدخل البريد الالكتروني "; 
      $this->load->view('sign_up/leader_gender',$errorMsg);

  }//checkAmbassador

  
  public function allocateAmbassador($ambassador,$leaderGender,$ambassador_email)
  {
    $ambassador_name=$ambassador->name;
    $ambassadorGender=$ambassador->gender;
    $fb_id=$ambassador->fb_id;
    $ambassadorID=$ambassador->id;
    $country='none';
    $date_update=date('Format String', time());
    
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
      // Check for HighPriorety
      $result = $this->ReallocateAmbassadorModel->selectHighPriority($leader_condition,$ambassador_condition);
      if (count((array)$result) == 0 ){
        //Check New Teams
        $result=$this->ReallocateAmbassadorModel->selectTeam($leader_condition,$ambassador_condition);
        if (count((array)$result) == 0 ){
          //Check Teams With Less Than 12 Members
          $result=$this->ReallocateAmbassadorModel->selectTeam($leader_condition,$ambassador_condition,"BETWEEN  1 AND 12");
            if (count((array)$result) == 0 ){
              //Check Teams With More Than 12 Members
              $result=$this->ReallocateAmbassadorModel->selectTeam($leader_condition,$ambassador_condition," > 12");
                if (count((array)$result) == 0 ){
                  // $ambassadorWithoutLeader=$this->ambassadorWithoutLeader($ambassador_name,$ambassadorGender,$leaderGender,$country,$ambassador_email);
                  // // $insert_id=$this->AmbassadorModel->insertAmbassador($ambassadorWithoutLeader);
                  $this->AmbassadorModel->updateAmbassador($fb_id,$leaderGender,null,$date_update);
                  $this->noLeaderFound($ambassadorID);
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
                        $this->AmbassadorModel->updateAmbassador($fb_id,$leaderGender,$result->Rid,$date_update);
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
                        $this->AmbassadorModel->updateAmbassador($fb_id,$leaderGender,$result->Rid,$date_update);
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
                        $this->AmbassadorModel->updateAmbassador($fb_id,$leaderGender,$result->Rid,$date_update);
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
                      $this->AmbassadorModel->updateAmbassador($fb_id,$leaderGender,$result->Rid,$date_update);
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
      //2- compare to the requested number
        //If match, update is_done to 1
      if ($members_num < $numberOfRequests->totalRequests) {
        //1- update request to DONE
        $this->RequestsModel->updateRequest($request_id);
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

  public function noLeaderFound($ambassadorID)
  { 
    $data['ambassadorID']=$ambassadorID;
    $this->load->view('sign_up/templates/header');
    $this->load->view('sign_up/templates/navbar' );
    $this->load->view('sign_up/no_leader_found',$data);
    $this->load->view('sign_up/templates/footer');
  }//noLeaderFound

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

}//class
?>
