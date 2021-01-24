<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Leader_Info extends Orm {
    
    /**
    * @var $instances Orm_Leader_Info[]
    */
    protected static $instances = array();
    protected static $table_name = 'leader_info';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $leader_name = '';
    protected $leader_link = '';
    protected $team_link = '';
    protected $leader_email = '';
    protected $team_name = '';
    protected $leader_gender = '';
    protected $uniqid = '';
    protected $messenger_id = '0';
    protected $leaders_team_name = '';
    protected $leader_rank = '5';
    
    /**
    * @return Leader_Info_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Leader_Info_Model');
    }
    
    /**
    * get instance
    *
    * @param int $id
    * @return Orm_Leader_Info
    */
    public static function get_instance($id) {
        
        $id = intval($id);
        
        if(isset(self::$instances[$id])) {
            return self::$instances[$id];
        }
        
        return self::get_one(array('id' => $id));
    }
    
    /**
    * Get all rows as Objects
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    *
    * @return Orm_Leader_Info[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Leader_Info
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && $result->get_id()) {
            return $result;
        }
        
        return new Orm_Leader_Info();
    }
    
    /**
    * get count
    *
    * @param array $filters
    * @return int
    */
    public static function get_count($filters = array()) {
        return self::get_model()->get_all($filters, 0, 0, array(), Orm::FETCH_COUNT);
    }
    
    public function to_array() {
        $db_params = array();
        if (Orm::is_integration_mode() && $this->get_id()) {
            $db_params['id'] = $this->get_id();
        }
        $db_params['leader_name'] = $this->get_leader_name();
        $db_params['leader_link'] = $this->get_leader_link();
        $db_params['team_link'] = $this->get_team_link();
        $db_params['leader_email'] = $this->get_leader_email();
        $db_params['team_name'] = $this->get_team_name();
        $db_params['leader_gender'] = $this->get_leader_gender();
        $db_params['uniqid'] = $this->get_uniqid();
        $db_params['messenger_id'] = $this->get_messenger_id();
        $db_params['leaders_team_name'] = $this->get_leaders_team_name();
        $db_params['leader_rank'] = $this->get_leader_rank();
        
        return $db_params;
    }
    
    public function save() {
        if ($this->get_object_status() == 'new') {
            $insert_id = self::get_model()->insert($this->to_array());
            $this->set_id($insert_id);
        } elseif($this->get_object_fields()) {
            self::get_model()->update($this->get_id(), $this->get_object_fields());
        }
        
        $this->set_object_status('saved');
        $this->reset_object_fields();
        return $this->get_id();
    }
    
    public function delete() {
        return self::get_model()->delete($this->get_id());
    }
    
    public function set_id($value) {
        $this->add_object_field('id', $value);
        $this->id = $value;
        
        $this->push_instance();
    }
    
    public function get_id() {
        return $this->id;
    }
    
    public function set_leader_name($value) {
        $this->add_object_field('leader_name', $value);
        $this->leader_name = $value;
    }
    
    public function get_leader_name() {
        return $this->leader_name;
    }
    
    public function set_leader_link($value) {
        $this->add_object_field('leader_link', $value);
        $this->leader_link = $value;
    }
    
    public function get_leader_link() {
        return $this->leader_link;
    }
    
    public function set_team_link($value) {
        $this->add_object_field('team_link', $value);
        $this->team_link = $value;
    }
    
    public function get_team_link() {
        return $this->team_link;
    }
    
    public function set_leader_email($value) {
        $this->add_object_field('leader_email', $value);
        $this->leader_email = $value;
    }
    
    public function get_leader_email() {
        return $this->leader_email;
    }
    
    public function set_team_name($value) {
        $this->add_object_field('team_name', $value);
        $this->team_name = $value;
    }
    
    public function get_team_name() {
        return $this->team_name;
    }
    
    public function set_leader_gender($value) {
        $this->add_object_field('leader_gender', $value);
        $this->leader_gender = $value;
    }
    
    public function get_leader_gender() {
        return $this->leader_gender;
    }
    
    public function set_uniqid($value) {
        $this->add_object_field('uniqid', $value);
        $this->uniqid = $value;
    }
    
    public function get_uniqid() {
        return $this->uniqid;
    }
    
    public function set_messenger_id($value) {
        $this->add_object_field('messenger_id', $value);
        $this->messenger_id = $value;
    }
    
    public function get_messenger_id() {
        return $this->messenger_id;
    }
    
    public function set_leaders_team_name($value) {
        $this->add_object_field('leaders_team_name', $value);
        $this->leaders_team_name = $value;
    }
    
    public function get_leaders_team_name() {
        return $this->leaders_team_name;
    }
    
    public function set_leader_rank($value) {
        $this->add_object_field('leader_rank', $value);
        $this->leader_rank = $value;
    }
    
    public function get_leader_rank() {
        return $this->leader_rank;
    }
    
    private $all_leader_request = null;
    
    /**
    * @return Orm_Leader_Request[]
    */
    public function related_all_leader_request() {
        if(is_null($this->all_leader_request)) {
            $this->all_leader_request = Orm_Leader_Request::get_all(array('leader_id' => $this->get_id()));
        }
        return $this->all_leader_request;
    }
    
    
}

