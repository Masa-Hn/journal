<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Leader_Request extends Orm {
    
    /**
    * @var $instances Orm_Leader_Request[]
    */
    protected static $instances = array();
    protected static $table_name = 'leader_request';
    
    /**
    * class attributes
    */
    protected $Rid = 0;
    protected $members_num = 0;
    protected $gender = '';
    protected $date = "CURRENT_TIMESTAMP";
    protected $leader_id = 0;
    protected $is_done = 0;
    protected $send_to_leader = 0;
    protected $current_team_count = 0;
    protected $counter = 0;
    
    /**
    * @return Leader_Request_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Leader_Request_Model');
    }
    
    /**
    * push instance
    */
    protected function push_instance() {
        if ($this->Rid) {
            self::$instances[$this->Rid] = $this;
        }
    }
    
    /**
    * pull_instance
    *
    * @param array $row
    * @return array
    */
    protected static function pull_instance($row) {
        
        $Rid = intval(isset($row['Rid']) ? $row['Rid'] : 0);
        
        if(isset(self::$instances[$Rid])) {
            return self::$instances[$Rid];
        }
        
        return null;
    }
    
    
    /**
    * get instance
    *
    * @param int $Rid
    * @return Orm_Leader_Request
    */
    public static function get_instance($Rid) {
        
        $Rid = intval($Rid);
        
        if(isset(self::$instances[$Rid])) {
            return self::$instances[$Rid];
        }
        
        return self::get_one(array('Rid' => $Rid));
    }
    
    /**
    * Get all rows as Objects
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    *
    * @return Orm_Leader_Request[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array(), $select = array(), $join_leader_info = false, $join_ambassador = false) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS, $select, $join_leader_info, $join_ambassador);
    }
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Leader_Request
    */
    public static function get_one($filters = array(),$select = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT, $select, false, false);
        
        if ($result && $result->get_Rid()) {
            return $result;
        }
        
        return new Orm_Leader_Request();
    }
    
    /**
    * get count
    *
    * @param array $filters
    * @return int
    */
    public static function get_count($filters = array(), $select = array(), $join_leader_info = false, $join_ambassador = false) {
        return self::get_model()->get_all($filters, 0, 0, array(), Orm::FETCH_COUNT, $select, $join_leader_info, $join_ambassador);
    }
    
    public function to_array() {
        $db_params = array();
        if (Orm::is_integration_mode() && $this->get_id()) {
            $db_params['Rid'] = $this->get_Rid();
        }
        $db_params['members_num'] = $this->get_members_num();
        $db_params['gender'] = $this->get_gender();
        $db_params['date'] = $this->get_date();
        $db_params['leader_id'] = $this->get_leader_id();
        $db_params['is_done'] = $this->get_is_done();
        $db_params['send_to_leader'] = $this->get_send_to_leader();
        $db_params['current_team_count'] = $this->get_current_team_count();
        $db_params['counter'] = $this->get_counter();
        
        return $db_params;
    }
    
    public function save() {
        if ($this->get_object_status() == 'new') {
            $insert_id = self::get_model()->insert($this->to_array());
            $this->set_Rid($insert_id);
        } elseif($this->get_object_fields()) {
            self::get_model()->update($this->get_Rid(), $this->get_object_fields());
        }
        
        $this->set_object_status('saved');
        $this->reset_object_fields();
        return $this->get_Rid();
    }
    
    public function delete() {
        return self::get_model()->delete($this->get_Rid());
    }
    
    public function set_Rid($value) {
        $this->add_object_field('Rid', $value);
        $this->Rid = $value;
        
        $this->push_instance();
    }
    
    public function get_Rid() {
        return $this->Rid;
    }
    
    public function set_members_num($value) {
        $this->add_object_field('members_num', $value);
        $this->members_num = $value;
    }
    
    public function get_members_num() {
        return $this->members_num;
    }
    
    public function set_gender($value) {
        $this->add_object_field('gender', $value);
        $this->gender = $value;
    }
    
    public function get_gender() {
        return $this->gender;
    }
    
    public function set_date($value) {
        $this->add_object_field('date', $value);
        $this->date = $value;
    }
    
    public function get_date() {
        return $this->date;
    }
    
    public function set_leader_id($value) {
        $this->add_object_field('leader_id', $value);
        $this->leader_id = $value;
    }
    
    public function get_leader_id() {
        return $this->leader_id;
    }
    
    public function set_is_done($value) {
        $this->add_object_field('is_done', $value);
        $this->is_done = $value;
    }
    
    public function get_is_done() {
        return $this->is_done;
    }
    
    public function set_send_to_leader($value) {
        $this->add_object_field('send_to_leader', $value);
        $this->send_to_leader = $value;
    }
    
    public function get_send_to_leader() {
        return $this->send_to_leader;
    }
    
    public function set_current_team_count($value) {
        $this->add_object_field('current_team_count', $value);
        $this->current_team_count = $value;
    }
    
    public function get_current_team_count() {
        return $this->current_team_count;
    }
    
    public function set_counter($value) {
        $this->add_object_field('counter', $value);
        $this->counter = $value;
    }
    
    public function get_counter() {
        return $this->counter;
    }
    
    /**
    * @return Orm_Leader_Info
    */
    public function related_leader_info()
    {
        return Orm_Leader_Info::get_instance($this->get_leader_id());
    }
    
    private $all_ambassador = null;
    
    /**
    * @return Orm_Ambassador[]
    */
    public function related_all_ambassador() {
        if(is_null($this->all_ambassador)) {
            $this->all_ambassador = Orm_Ambassador::get_all(array('request_id' => $this->get_Rid()));
        }
        return $this->all_ambassador;
    }
    
    
}

