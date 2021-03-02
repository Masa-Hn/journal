<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Ambassador extends Orm {
    
    /**
    * @var $instances Orm_Ambassador[]
    */
    protected static $instances = array();
    protected static $table_name = 'ambassador';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $name = '';
    protected $country = '';
    protected $gender = '';
    protected $leader_gender = '';
    protected $request_id = 0;
    protected $profile_link = '';
    protected $fb_id = '';
    protected $messenger_id = '0';
    protected $is_joined = 0;
    protected $join_following_team = 0;
    protected $created_at = 'CURRENT_TIMESTAMP';
    protected $display = 1;
    protected $code_button = 0;
    protected $team_link_button = 0;
    
    /**
    * @return Ambassador_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Ambassador_Model');
    }
    
    /**
    * get instance
    *
    * @param int $id
    * @return Orm_Ambassador
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
    * @return Orm_Ambassador[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    

    /**
    * Find rows whith select constrains as Objects
    *
    * @param array $constrain
    * @param array $condition
    * @param array $orders
    * @param array $groupBy
    *
    * @return Orm_Ambassador
    */

    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Ambassador
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && $result->get_id()) {
            return $result;
        }
        
        return new Orm_Ambassador();
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
        $db_params['name'] = $this->get_name();
        $db_params['country'] = $this->get_country();
        $db_params['gender'] = $this->get_gender();
        $db_params['leader_gender'] = $this->get_leader_gender();
        $db_params['request_id'] = $this->get_request_id();
        $db_params['profile_link'] = $this->get_profile_link();
        $db_params['fb_id'] = $this->get_fb_id();
        $db_params['messenger_id'] = $this->get_messenger_id();
        $db_params['is_joined'] = $this->get_is_joined();
        $db_params['join_following_team'] = $this->get_join_following_team();
        $db_params['created_at'] = $this->get_created_at();
        $db_params['display'] = $this->get_display();
        $db_params['code_button'] = $this->get_code_button();
        $db_params['team_link_button'] = $this->get_team_link_button();
        
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
    
    public function set_name($value) {
        $this->add_object_field('name', $value);
        $this->name = $value;
    }
    
    public function get_name() {
        return $this->name;
    }
    
    public function set_country($value) {
        $this->add_object_field('country', $value);
        $this->country = $value;
    }
    
    public function get_country() {
        return $this->country;
    }
    
    public function set_gender($value) {
        $this->add_object_field('gender', $value);
        $this->gender = $value;
    }
    
    public function get_gender() {
        return $this->gender;
    }
    
    public function set_leader_gender($value) {
        $this->add_object_field('leader_gender', $value);
        $this->leader_gender = $value;
    }
    
    public function get_leader_gender() {
        return $this->leader_gender;
    }
    
    public function set_request_id($value) {
        $this->add_object_field('request_id', $value);
        $this->request_id = $value;
    }
    
    public function get_request_id() {
        return $this->request_id;
    }
    
    public function set_profile_link($value) {
        $this->add_object_field('profile_link', $value);
        $this->profile_link = $value;
    }
    
    public function get_profile_link() {
        return $this->profile_link;
    }
    
    public function set_fb_id($value) {
        $this->add_object_field('fb_id', $value);
        $this->fb_id = $value;
    }
    
    public function get_fb_id() {
        return $this->fb_id;
    }
    
    public function set_messenger_id($value) {
        $this->add_object_field('messenger_id', $value);
        $this->messenger_id = $value;
    }
    
    public function get_messenger_id() {
        return $this->messenger_id;
    }
    
    public function set_is_joined($value) {
        $this->add_object_field('is_joined', $value);
        $this->is_joined = $value;
    }
    
    public function get_is_joined() {
        return $this->is_joined;
    }
    
    public function set_join_following_team($value) {
        $this->add_object_field('join_following_team', $value);
        $this->join_following_team = $value;
    }
    
    public function get_join_following_team() {
        return $this->join_following_team;
    }
    
    public function set_created_at($value) {
        $this->add_object_field('created_at', $value);
        $this->created_at = $value;
    }
    
    public function get_created_at() {
        return $this->created_at;
    }
    
    public function set_display($value) {
        $this->add_object_field('display', $value);
        $this->display = $value;
    }
    
    public function get_display() {
        return $this->display;
    }
    
    public function set_code_button($value) {
        $this->add_object_field('code_button', $value);
        $this->code_button = $value;
    }
    
    public function get_code_button() {
        return $this->code_button;
    }
    
    public function set_team_link_button($value) {
        $this->add_object_field('team_link_button', $value);
        $this->team_link_button = $value;
    }
    
    public function get_team_link_button() {
        return $this->team_link_button;
    }
    
    /**
    * @return Orm_Leader_Request
    */
    public function related_leader_request()
    {
        return Orm_Leader_Request::get_instance($this->get_request_id());
    }
    
    
}

