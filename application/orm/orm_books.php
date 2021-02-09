<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Books extends Orm {
    
    /**
    * @var $instances Orm_Books[]
    */
    protected static $instances = array();
    protected static $table_name = 'books';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $name = '';
    protected $writer = '';
    protected $brief = '';
    protected $pic = '';
    protected $post = '';
    protected $link = '';
    protected $resofrate = 0;
    protected $numofrate = 0;
    protected $numdownload = 0;
    protected $level = 0;
    protected $section = '';
    protected $type = '';
    protected $uploadname = '';
    protected $date = CURRENT_TIMESTAMP;
    
    /**
    * @return Books_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Books_Model');
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
    * @return Orm_Books
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
    * @return Orm_Books[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Books
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && ) {
            return $result;
        }
        
        return new Orm_Books();
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
        $db_params['name'] = $this->get_name();
        $db_params['writer'] = $this->get_writer();
        $db_params['brief'] = $this->get_brief();
        $db_params['pic'] = $this->get_pic();
        $db_params['post'] = $this->get_post();
        $db_params['link'] = $this->get_link();
        $db_params['resofrate'] = $this->get_resofrate();
        $db_params['numofrate'] = $this->get_numofrate();
        $db_params['numdownload'] = $this->get_numdownload();
        $db_params['level'] = $this->get_level();
        $db_params['section'] = $this->get_section();
        $db_params['type'] = $this->get_type();
        $db_params['uploadname'] = $this->get_uploadname();
        $db_params['date'] = $this->get_date();
        
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
    
    public function set_name($value) {
        $this->add_object_field('name', $value);
        $this->name = $value;
    }
    
    public function get_name() {
        return $this->name;
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
    
    public function set_pic($value) {
        $this->add_object_field('pic', $value);
        $this->pic = $value;
    }
    
    public function get_pic() {
        return $this->pic;
    }
    
    public function set_post($value) {
        $this->add_object_field('post', $value);
        $this->post = $value;
    }
    
    public function get_post() {
        return $this->post;
    }
    
    public function set_link($value) {
        $this->add_object_field('link', $value);
        $this->link = $value;
    }
    
    public function get_link() {
        return $this->link;
    }
    
    public function set_resofrate($value) {
        $this->add_object_field('resofrate', $value);
        $this->resofrate = $value;
    }
    
    public function get_resofrate() {
        return $this->resofrate;
    }
    
    public function set_numofrate($value) {
        $this->add_object_field('numofrate', $value);
        $this->numofrate = $value;
    }
    
    public function get_numofrate() {
        return $this->numofrate;
    }
    
    public function set_numdownload($value) {
        $this->add_object_field('numdownload', $value);
        $this->numdownload = $value;
    }
    
    public function get_numdownload() {
        return $this->numdownload;
    }
    
    public function set_level($value) {
        $this->add_object_field('level', $value);
        $this->level = $value;
    }
    
    public function get_level() {
        return $this->level;
    }
    
    public function set_section($value) {
        $this->add_object_field('section', $value);
        $this->section = $value;
    }
    
    public function get_section() {
        return $this->section;
    }
    
    public function set_type($value) {
        $this->add_object_field('type', $value);
        $this->type = $value;
    }
    
    public function get_type() {
        return $this->type;
    }
    
    public function set_uploadname($value) {
        $this->add_object_field('uploadname', $value);
        $this->uploadname = $value;
    }
    
    public function get_uploadname() {
        return $this->uploadname;
    }
    
    public function set_date($value) {
        $this->add_object_field('date', $value);
        $this->date = $value;
    }
    
    public function get_date() {
        return $this->date;
    }
    
    
}

