<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DailyAmbassadorCode extends CI_Controller
{
    
    public function __construct()
	{
		parent::__construct();

	}//end construct()
    
    public function set_code()
    {
        $code = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
        $this->db->set('code', $code);
        $this->db->update('ambassador_code');

    }
}
?>