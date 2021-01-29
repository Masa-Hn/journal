<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Article_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Article_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Article | Orm_Article[] | array | int
    */
    public function get_all($filters = array(), $page = 0, $per_page = 10, $orders = array(), $fetch_as = Orm::FETCH_OBJECTS) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        $this->db->select('a.*');
        $this->db->distinct();
        $this->db->from(Orm_Article::get_table_name() . ' AS a');
        
        if (isset($filters['id'])) {
            $this->db->where('a.id', $filters['id']);
        }
        if (isset($filters['not_id'])) {
            $this->db->where('a.id !=', $filters['not_id']);
        }
        if (!empty($filters['in_id'])) {
            $this->db->where_in('a.id', $filters['in_id']);
        }
        if (!empty($filters['not_in_id'])) {
            $this->db->where_not_in('a.id', $filters['not_in_id']);
        }
        if (!empty($filters['title'])) {
            $this->db->where('a.title', $filters['title']);
        }
        if (!empty($filters['article'])) {
            $this->db->where('a.article', $filters['article']);
        }
        if (!empty($filters['writer'])) {
            $this->db->where('a.writer', $filters['writer']);
        }
        if (isset($filters['date'])) {
            $this->db->where('a.date', $filters['date']);
        }
        if (!empty($filters['pic'])) {
            $this->db->where('a.pic', $filters['pic']);
        }
        
        if ($orders) {
            $this->db->order_by(implode(',', $orders));
        }
        
        if ($page) {
            $offset = ($page - 1) * $per_page;
            $this->db->limit($per_page, $offset);
        }
        
        switch($fetch_as) {
            case Orm::FETCH_OBJECT:
            return Orm_Article::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Article::to_object($row);
            }
            return $objects;
            break;
            case Orm::FETCH_ARRAY:
            return $this->db->get()->result_array();
            break;
            case Orm::FETCH_COUNT:
            return $this->db->count_all_results();
            break;
        }
    }
    
    /**
    * insert new row to the table
    *
    * @param array $params
    * @return boolean
    */
    public function insert($params = array()) {
        return $this->db->insert(Orm_Article::get_table_name(), $params);
    }
    
    /**
    * update item
    *
    * @param int $id
    * @param array $params
    * @return boolean
    */
    public function update($id, $params = array()) {
        return $this->db->update(Orm_Article::get_table_name(), $params, array('id' => $id));
    }
    
    /**
    * delete item
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id) {
        return $this->db->delete(Orm_Article::get_table_name(), array('id' => $id));
    }
    
}

