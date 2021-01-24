<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Suggestion_Book extends Orm {
    
    /**
    * @var $instances Orm_Suggestion_Book[]
    */
    protected static $instances = array();
    protected static $table_name = 'suggestion_book';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $book_name = '';
    protected $writer = '';
    protected $brief = '';
    protected $type = '';
    protected $found = 0;
    protected $link = '';
    
    /**
    * @return Suggestion_Book_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Suggestion_Book_Model');
    }
    
    /**
    * get instance
    *
    * @param int $id
    * @return Orm_Suggestion_Book
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
    * @return Orm_Suggestion_Book[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Suggestion_Book
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && $result->get_id()) {
            return $result;
        }
        
        return new Orm_Suggestion_Book();
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
        $db_params['book_name'] = $this->get_book_name();
        $db_params['writer'] = $this->get_writer();
        $db_params['brief'] = $this->get_brief();
        $db_params['type'] = $this->get_type();
        $db_params['found'] = $this->get_found();
        $db_params['link'] = $this->get_link();
        
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
    
    public function set_book_name($value) {
        $this->add_object_field('book_name', $value);
        $this->book_name = $value;
    }
    
    public function get_book_name() {
        return $this->book_name;
    }
    
    public function set_writer($value) {
        $this->add_object_field('writer', $value);
        $this->writer = $value;
    }
    
    public function get_writer() {
        return $this->writer;
    }
    
    public function set_brief($value) {
        $this->add_object_field('brief', $value);
        $this->brief = $value;
    }
    
    public function get_brief() {
        return $this->brief;
    }
    
    public function set_type($value) {
        $this->add_object_field('type', $value);
        $this->type = $value;
    }
    
    public function get_type() {
        return $this->type;
    }
    
    public function set_found($value) {
        $this->add_object_field('found', $value);
        $this->found = $value;
    }
    
    public function get_found() {
        return $this->found;
    }
    
    public function set_link($value) {
        $this->add_object_field('link', $value);
        $this->link = $value;
    }
    
    public function get_link() {
        return $this->link;
    }
    
    
}

