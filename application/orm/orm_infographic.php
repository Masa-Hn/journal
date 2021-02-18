<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Infographic extends Orm {
    
    /**
    * @var $instances Orm_Infographic[]
    */
    protected static $instances = array();
    protected static $table_name = 'infographic';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $title = '';
    protected $pic = '';
    protected $date = 'CURRENT_TIMESTAMP';
    protected $section = '';
    protected $series_id = 0;
    
    /**
    * @return Infographic_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Infographic_Model');
    }
    
    /**
    * get instance
    *
    * @param int $id
    * @return Orm_Infographic
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
    * @return Orm_Infographic[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Infographic
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && $result->get_id()) {
            return $result;
        }
        
        return new Orm_Infographic();
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
        $db_params['title'] = $this->get_title();
        $db_params['pic'] = $this->get_pic();
        $db_params['date'] = $this->get_date();
        $db_params['section'] = $this->get_section();
        $db_params['series_id'] = $this->get_series_id();
        
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
    
    public function set_date($value) {
        $this->add_object_field('date', $value);
        $this->date = $value;
    }
    
    public function get_date() {
        return $this->date;
    }
    
    public function set_section($value) {
        $this->add_object_field('section', $value);
        $this->section = $value;
    }
    
    public function get_section() {
        return $this->section;
    }
    
    public function set_series_id($value) {
        $this->add_object_field('series_id', $value);
        $this->series_id = $value;
    }
    
    public function get_series_id() {
        return $this->series_id;
    }
    
    
}

