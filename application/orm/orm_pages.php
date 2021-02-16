<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Pages extends Orm {
    
    /**
    * @var $instances Orm_Pages[]
    */
    protected static $instances = array();
    protected static $table_name = 'pages';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $title = '';
    protected $viewers = 0;
    protected $page_order = 0;
    
    /**
    * @return Pages_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Pages_Model');
    }
    
    /**
    * get instance
    *
    * @param int $id
    * @return Orm_Pages
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
    * @return Orm_Pages[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Pages
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && $result->get_id()) {
            return $result;
        }
        
        return new Orm_Pages();
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
        $db_params['viewers'] = $this->get_viewers();
        $db_params['page_order'] = $this->get_page_order();
        
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
    
    public function set_viewers($value) {
        $this->add_object_field('viewers', $value);
        $this->viewers = $value;
    }
    
    public function get_viewers() {
        return $this->viewers;
    }
    
    public function set_page_order($value) {
        $this->add_object_field('page_order', $value);
        $this->page_order = $value;
    }
    
    public function get_page_order() {
        return $this->page_order;
    }
    
    private $all_statistics = null;
    
    /**
    * @return Orm_Statistics[]
    */
    public function related_all_statistics() {
        if(is_null($this->all_statistics)) {
            $this->all_statistics = Orm_Statistics::get_all(array('page_id' => $this->get_id()));
        }
        return $this->all_statistics;
    }
    
    
}

