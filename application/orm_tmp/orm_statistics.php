<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Statistics extends Orm {
    
    /**
    * @var $instances Orm_Statistics[]
    */
    protected static $instances = array();
    protected static $table_name = 'statistics';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $visitors = 0;
    protected $page_id = 0;
    protected $date = '0000-00-00';
    
    /**
    * @return Statistics_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Statistics_Model');
    }
    
    /**
    * get instance
    *
    * @param int $id
    * @return Orm_Statistics
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
    * @return Orm_Statistics[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Statistics
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && $result->get_id()) {
            return $result;
        }
        
        return new Orm_Statistics();
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
        $db_params['visitors'] = $this->get_visitors();
        $db_params['page_id'] = $this->get_page_id();
        $db_params['date'] = $this->get_date();
        
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
    
    public function set_visitors($value) {
        $this->add_object_field('visitors', $value);
        $this->visitors = $value;
    }
    
    public function get_visitors() {
        return $this->visitors;
    }
    
    public function set_page_id($value) {
        $this->add_object_field('page_id', $value);
        $this->page_id = $value;
    }
    
    public function get_page_id() {
        return $this->page_id;
    }
    
    public function set_date($value) {
        $this->add_object_field('date', $value);
        $this->date = $value;
    }
    
    public function get_date() {
        return $this->date;
    }
    
    
}

