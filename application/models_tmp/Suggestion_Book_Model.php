<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Suggestion_Book_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Suggestion_Book_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Suggestion_Book | Orm_Suggestion_Book[] | array | int
    */
    public function get_all($filters = array(), $page = 0, $per_page = 10, $orders = array(), $fetch_as = Orm::FETCH_OBJECTS) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        $this->db->select('sb.*');
        $this->db->distinct();
        $this->db->from(Orm_Suggestion_Book::get_table_name() . ' AS sb');
        
        if (isset($filters['id'])) {
            $this->db->where('sb.id', $filters['id']);
        }
        if (isset($filters['not_id'])) {
            $this->db->where('sb.id !=', $filters['not_id']);
        }
        if (!empty($filters['in_id'])) {
            $this->db->where_in('sb.id', $filters['in_id']);
        }
        if (!empty($filters['not_in_id'])) {
            $this->db->where_not_in('sb.id', $filters['not_in_id']);
        }
        if (!empty($filters['book_name'])) {
            $this->db->where('sb.book_name', $filters['book_name']);
        }
        if (!empty($filters['writer'])) {
            $this->db->where('sb.writer', $filters['writer']);
        }
        if (!empty($filters['brief'])) {
            $this->db->where('sb.brief', $filters['brief']);
        }
        if (!empty($filters['type'])) {
            $this->db->where('sb.type', $filters['type']);
        }
        if (isset($filters['found'])) {
            $this->db->where('sb.found', $filters['found']);
        }
        if (!empty($filters['link'])) {
            $this->db->where('sb.link', $filters['link']);
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
            return Orm_Suggestion_Book::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Suggestion_Book::to_object($row);
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
    * @return int
    */
    public function insert($params = array()) {
        $this->db->insert(Orm_Suggestion_Book::get_table_name(), $params);
        return $this->db->insert_id();
    }
    
    /**
    * update item
    *
    * @param int $id
    * @param array $params
    * @return boolean
    */
    public function update($id, $params = array()) {
        return $this->db->update(Orm_Suggestion_Book::get_table_name(), $params, array('id' => $id));
    }
    
    /**
    * delete item
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id) {
        return $this->db->delete(Orm_Suggestion_Book::get_table_name(), array('id' => $id));
    }
    
}

