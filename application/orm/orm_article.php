<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm_Article extends Orm {
    
    /**
    * @var $instances Orm_Article[]
    */
    protected static $instances = array();
    protected static $table_name = 'article';
    
    /**
    * class attributes
    */
    protected $id = 0;
    protected $title = '';
    protected $article = '';
    protected $writer = '';
    protected $date = CURRENT_TIMESTAMP;
    protected $pic = '';
    
    /**
    * @return Article_Model
    */
    public static function get_model() {
        return Orm::get_ci_model('Article_Model');
    }
    
    /**
    * get instance
    *
    * @param int $id
    * @return Orm_Article
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
    * @return Orm_Article[] | int
    */
    public static function get_all($filters = array(), $page = 0, $per_page = 0, $orders = array()) {
        return self::get_model()->get_all($filters, $page, $per_page, $orders, Orm::FETCH_OBJECTS);
    }
    
    /**
    * get one row as Object
    *
    * @param array $filters
    * @param array $orders
    * @return Orm_Article
    */
    public static function get_one($filters = array(), $orders = array()) {
        
        $result = self::get_model()->get_all($filters, 1, 1, $orders, Orm::FETCH_OBJECT);
        
        if ($result && $result->get_id()) {
            return $result;
        }
        
        return new Orm_Article();
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
        $db_params['article'] = $this->get_article();
        $db_params['writer'] = $this->get_writer();
        $db_params['date'] = $this->get_date();
        $db_params['pic'] = $this->get_pic();
        
        return $db_params;
    }
    
    public function save() {
        if ($this->get_object_status() == 'new') {
            self::get_model()->insert($this->to_array());
        } elseif($this->get_object_fields()) {
            self::get_model()->update($this->get_id(), $this->get_object_fields());
        }
        
        $this->set_object_status('saved');
        $this->reset_object_fields();
        return $this;
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
    
    public function set_article($value) {
        $this->add_object_field('article', $value);
        $this->article = $value;
    }
    
    public function get_article() {
        return $this->article;
    }
    
    public function set_writer($value) {
        $this->add_object_field('writer', $value);
        $this->writer = $value;
    }
    
    public function get_writer() {
        return $this->writer;
    }
    
    public function set_date($value) {
        $this->add_object_field('date', $value);
        $this->date = $value;
    }
    
    public function get_date() {
        return $this->date;
    }
    
    public function set_pic($value) {
        $this->add_object_field('pic', $value);
        $this->pic = $value;
    }
    
    public function get_pic() {
        return $this->pic;
    }
    
    
}

