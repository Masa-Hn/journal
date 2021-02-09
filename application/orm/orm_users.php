<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Users extends Orm {
    
    /**
    * @var $instances Orm_Users[]
    */
    protected static $instances = array();
    protected static $table_name = 'users';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $username = '';
    protected $email = '';
    protected $password = '';
    protected $regstatus = 0;
    protected $team = '';
    
    /**
    * @return Users_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Users_Model');
    }
    
    /**
    * get instance
    *
    * @param int $id
    * @return Orm_Users
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
    * @return Orm_Users[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Users
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && $result->get_id()) {
            return $result;
        }
        
        return new Orm_Users();
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
        $db_params['username'] = $this->get_username();
        $db_params['email'] = $this->get_email();
        $db_params['password'] = $this->get_password();
        $db_params['regstatus'] = $this->get_regstatus();
        $db_params['team'] = $this->get_team();
        
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
    
    public function set_username($value) {
        $this->add_object_field('username', $value);
        $this->username = $value;
    }
    
    public function get_username() {
        return $this->username;
    }
    
    public function set_email($value) {
        $this->add_object_field('email', $value);
        $this->email = $value;
    }
    
    public function get_email() {
        return $this->email;
    }
    
    public function set_password($value) {
        $this->add_object_field('password', $value);
        $this->password = $value;
    }
    
    public function get_password() {
        return $this->password;
    }
    
    public function set_regstatus($value) {
        $this->add_object_field('regstatus', $value);
        $this->regstatus = $value;
    }
    
    public function get_regstatus() {
        return $this->regstatus;
    }
    
    public function set_team($value) {
        $this->add_object_field('team', $value);
        $this->team = $value;
    }
    
    public function get_team() {
        return $this->team;
    }
    
    
}

