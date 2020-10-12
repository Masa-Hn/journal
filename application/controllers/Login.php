<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function	__construct(){

		parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index(){

		$this->form_validation->set_rules('email','Email Address','required|trim'); // trim To Delete Space
		$this->form_validation->set_rules('password','Password','required');

        $this->form_validation->set_message('required', ' ');
        $this->form_validation->set_message('valid_email', 'الايميل غير متطابق مع معايير الايميلات');

		if($this->form_validation->run() == FALSE){

            $data = array('errors' => validation_errors() );
            $this->session->set_flashdata($data);
        }else{

            $email      = $this->security->xss_clean($_POST['email']);
			$password   = $this->security->xss_clean(($_POST['password']));

            $result = $this->LoginModel->can_login($email, $password);
            if($result == true){

                redirect(base_url("management_book"));
            }else{

                $this->session->set_flashdata('login_failed', 'الايميل او كلمة المرور خطأ');
                redirect(base_url("login"));
            }
        }
        $this->load->view('management_book/login_view');
	}

    public function logout(){
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value){
            $this->session->unset_userdata($row);
        }
		unset($_SESSION);
        session_destroy();
        redirect(base_url("login"));
	}

    public function reg(){

		if (isset($_POST['register'])) {
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('r_email','Email','required');
			$this->form_validation->set_rules('r_password','Password','required');
			$this->form_validation->set_rules('password2','Confirm Password','required|matches[r_password]');

            $this->form_validation->set_message('required', ' ');
            $this->form_validation->set_message('matches', 'كلمتا المرور غير متطابقتين');
            $this->form_validation->set_message('valid_email', 'الايميل غير متطابق مع معايير الايميلات');

			if($this->form_validation->run() == TRUE){

                if($this->LoginModel->is_email_available($_POST['r_email'])){

                    $this->session->set_flashdata("msg", "الايميل مسجل بالفعل");
                    redirect(base_url("login/reg"));

                }else{

                    $data=array(
                        'username'     => $this->security->xss_clean($_POST['username']),
                        'email'        => $this->security->xss_clean($_POST['r_email']),
                        'password'     => $this->security->xss_clean(($_POST['r_password']))
                    );

                    $this->db->insert('users', $data);
                    $this->session->set_flashdata("msg", "<p style='color:#aaa'>تم التسجيل بنجاح.. لطفاً انتظر قبول الإدارة</p>");
                    redirect(base_url("login/reg"));
                }
			}
		}
        $this->load->view('management_book/login_view');
	}
}
?>
