<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {

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
    $this->load->view( 'sign_up/templates/header');
    $this->load->view( 'sign_up/templates/navbar' );
    //Load Main Page
    $this->load->view('sign_up/index');
    $this->load->view( 'sign_up/templates/footer');

  }//index

  public function nextPage()
  {
    $this->load->view('sign_up/templates/header');
    $this->load->view('sign_up/templates/navbar' );
    if(! empty($_GET['next'])){
      $page="sign_up/".$_GET['next'];

      if($_GET['next'] == "question_4"){
        $sections['sections']=$this->books->getSections(1);
        $this->load->view($page,$sections);

      }//if
      else{
        $file=APPPATH.'views/'.$page.'.php';
        if(file_exists($file)){
          $this->load->view($page);
        }//if
        else{
          $this->load->view('sign_up/404');

        }//else

      }//else
    }//if
    else{
      $this->load->view('sign_up/404');
    }
    $this->load->view('sign_up/templates/footer');

  }//nextPage

  public function checkAmbassador()
  {
    $result=$this->AmbassadorModel->checkAmbassador($_GET['fb_id']);
    if (count((array)$result) == 0 ){
      //if not exist
      $url=base_url()."SignUp/nextPage?next=leader_gender";
      header('Location: '.$url);
      exit();
    }//if
    else{
      //stop and go to last page
      $request=$this->SignUpModel->getRequestInfo($result->request_id);
      $leader_info=$this->SignUpModel->getLeaderInfo($request->leader_id);
      $this->informambassador($leader_info,$result->request_id);
    }
  }//checkAmbassador

  public function allocateAmbassador(){
    if (!empty($_POST['ambassador'])) {
      $ambassador_info=$_POST['ambassador'];
      $Leader_gender=$_POST['leader_gender'];
      
      //Check ambassador gender
        if ($ambassador_info['gender'] != "female" && $ambassador_info['gender']!="male") {
          $ambassador_gender="any"; 

        }
        else{
          $ambassador_gender=$ambassador_info['gender']; 
        }

      //check leader gender
        if ($Leader_gender == "any") {
          //Check New Teams
            $result=$this->SignUpModel->newTeamsAnyLeader($ambassador_gender);
            if (count((array)$result) == 0 ){
              
              //Check Teams With Less Than 12 Members
                $result=$this->SignUpModel->anyLeader($ambassador_gender, "<=");  
                if (count((array)$result) == 0 ){
                  //Check Teams With More Than 12 Members
                    $result=$this->SignUpModel->anyLeader($ambassador_gender, ">");
                    if (count((array)$result) == 0 ){
                      $this->ambassadorWithoutLeader($ambassador_info,$ambassador_gender,$Leader_gender);
                      $this->noLeaderFound();
                    }//if
                    else{
                      $ambassador=$this->formatAmbassador($ambassador_info,$ambassador_gender,$Leader_gender,$result);
                      $this->checkout($ambassador, $result->Rid,$result->leader_id,$result->members_num);
                    }//else

                }//if
                else{
                  $ambassador=$this->formatAmbassador($ambassador_info,$ambassador_gender,$Leader_gender,$result);
                  $this->checkout($ambassador, $result->Rid,$result->leader_id,$result->members_num);
                }//else
            }//if
            else{
              $ambassador=$this->formatAmbassador($ambassador_info,$ambassador_gender,$Leader_gender,$result);
              $this->checkout($ambassador, $result->Rid,$result->leader_id,$result->members_num);
            }//else
        }//if
        else{
          //for specific leader gender
          //Check New Teams
            $result=$this->SignUpModel->getNewTeams($Leader_gender,$ambassador_gender);
            if (count((array)$result) == 0 ){
              
              //Check Teams With Less Than 12 Members
                $result=$this->SignUpModel->getTeams($Leader_gender,$ambassador_gender, "<=");  
                if (count((array)$result) == 0 ){
                  //Check Teams With More Than 12 Members
                    $result=$this->SignUpModel->getTeams($Leader_gender,$ambassador_gender, ">");
                    if (count((array)$result) == 0 ){
                      $this->ambassadorWithoutLeader($ambassador_info,$ambassador_gender,$Leader_gender);
                      $this->noLeaderFound();
                    }//if
                    else{
                      $ambassador=$this->formatAmbassador($ambassador_info,$ambassador_gender,$Leader_gender,$result);
                      $this->checkout($ambassador, $result->Rid,$result->leader_id,$result->members_num);
                    }//else
                }//if
                else{
                  $ambassador=$this->formatAmbassador($ambassador_info,$ambassador_gender,$Leader_gender,$result);
                  $this->checkout($ambassador, $result->Rid,$result->leader_id,$result->members_num);
                }//else
            }//if
            else{
              $ambassador=$this->formatAmbassador($ambassador_info,$ambassador_gender,$Leader_gender,$result);
              $this->checkout($ambassador, $result->Rid,$result->leader_id,$result->members_num);
            }//else
        }//else
        
    }//if

  }//allocateAmbassador

  public function checkout($ambassador,$request_id,$leader_id,$members_num){
    // 1- Insert Ambassador
    $this->AmbassadorModel->insertAmbassador($ambassador);
    
    // 2- Inform Ambassador
      //1- get leader Information
        $leader_info=$this->SignUpModel->getLeaderInfo($leader_id);
        //print_r($leader_info);die();
    
    // 3- Check Leader Requests
      //1- get all associated requests
      $numberOfRequests=$this->AmbassadorModel->countRequests($request_id);
      //2- compare to the requested number
        //If match, update is_done to 1
      if ($members_num == $numberOfRequests->totalRequests) {
        //1- update request to DONE 
        $this->RequestsModel->updateRequest($request_id);
        //2-Inform Leader
        //$this->informLeader($ambassadors);
      }//if

    //4- load view to inform ambassador [FINAL STEP]
      $this->informambassador($leader_info,$request_id);
  }//checkout

  public function informambassador($leader_info,$request_id)
  {
    $team_info['leader_info']=$leader_info;
    $team_info['request_id']=$request_id;
    $data = $this->load->view('sign_up/final_page',$team_info);

    return $data;
    
  }//informambassador

  public function informLeader($ambassadors)
  {
    # code...
  }//informLeader

  public function formatAmbassador($ambassador_info,$ambassador_gender,$Leader_gender,$result)
  {         
    $ambassador = array(
                'name' => $ambassador_info['name'],
                'gender'=>$ambassador_gender,
                'leader_gender'=>$Leader_gender,
                'request_id'=>$result->Rid,
                'profile_link'=>$ambassador_info['profile_link'],
                'fb_id'=>$ambassador_info['fb_id']
                );
    return $ambassador; 
  }//formatAmbassador

  public function ambassadorWithoutLeader($ambassador_info,$ambassador_gender,$Leader_gender)
  {
    $ambassador = array(
                'name' => $ambassador_info['name'],
                'gender'=>$ambassador_gender,
                'leader_gender'=>$Leader_gender,
                'profile_link'=>$ambassador_info['profile_link'],
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

}//class
?>