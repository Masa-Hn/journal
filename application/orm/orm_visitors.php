<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Visitors extends Orm {
    
    /**
    * @var $instances Orm_Visitors[]
    */
    protected static $instances = array();
    protected static $table_name = 'visitors';
    
    /**
    * class attributes
    */
    protected $user_IP = '';
    protected $visit_times = 0;
    
    /**
    * @return Visitors_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Visitors_Model');
    }
    
    /**
    * push instance
    */
    protected function push_instance() {
        
    }
    
    /**
    * pull_instance
    *
    * @param array $row
    * @return array
    */
    protected static function pull_instance($row) {
        
        
        
        if(isset(self::$instances[$])) {
            return self::$instances[$];
        }
        
        return null;
    }
    
    
    /**
    * get instance
    *
    * @param int $
    * @return Orm_Visitors
    */
    public static function get_instance($) {
        
        
        
        if(isset(self::$instances[$])) {
            return self::$instances[$];
        }
        
        return self::get_one(array());
    }
    
    /**
    * Get all rows as Objects
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    *
    * @return Orm_Visitors[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Visitors
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && ) {
            return $result;
        }
        
        return new Orm_Visitors();
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
        $db_params['user_IP'] = $this->get_user_IP();
        $db_params['visit_times'] = $this->get_visit_times();
        
        return $db_params;
    }
    
    public function save() {
        if ($this->get_object_status() == 'new') {
            self::get_model()->insert($this->to_array());
        } elseif($this->get_object_fields()) {
            self::get_model()->update(, $this->get_object_fields());
        }
        
        $this->set_object_status('saved');
        $this->reset_object_fields();
        return $this;
    }
    
    public function delete() {
        return self::get_model()->delete();
    }
    
    public function set_user_IP($value) {
        $this->add_object_field('user_IP', $value);
        $this->user_IP = $value;
    }
    
    public function get_user_IP() {
        return $this->user_IP;
    }
    
    public function set_visit_times($value) {
        $this->add_object_field('visit_times', $value);
        $this->visit_times = $value;
    }
    
    public function get_visit_times() {
        return $this->visit_times;
    }
    
    
}

