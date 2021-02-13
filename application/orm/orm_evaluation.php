<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Evaluation extends Orm {
    
    /**
    * @var $instances Orm_Evaluation[]
    */
    protected static $instances = array();
    protected static $table_name = 'evaluation';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $title = '';
    protected $pic = '';
    
    /**
    * @return Evaluation_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Evaluation_Model');
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
        
        
        
        if(isset(self::$instances[$row])) {
            return self::$instances[$row];
        }
        
        return null;
    }
    
    
    /**
    * get instance
    *
    * @param int $
    * @return Orm_Evaluation
    */
    public static function get_instance($id) {
        
        
        
        if(isset(self::$instances[$id])) {
            return self::$instances[$id];
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
    * @return Orm_Evaluation[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Evaluation
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && ) {
            return $result;
        }
        
        return new Orm_Evaluation();
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
        $db_params['id'] = $this->get_id();
        $db_params['title'] = $this->get_title();
        $db_params['pic'] = $this->get_pic();
        
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
    
    public function set_id($value) {
        $this->add_object_field('id', $value);
        $this->id = $value;
    }
    
    public function get_id() {
        return $this->id;
    }
    
    public function set_title($value) {
        $this->add_object_field('title', $value);
        $this->title = $value;
    }
    
    public function get_title() {
        return $this->title;
    }
    
    public function set_pic($value) {
        $this->add_object_field('pic', $value);
        $this->pic = $value;
    }
    
    public function get_pic() {
        return $this->pic;
    }
    
    
}

