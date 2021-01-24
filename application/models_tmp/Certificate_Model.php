<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Certificate_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Certificate_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Certificate | Orm_Certificate[] | array | int
    */
    public function get_all($filters = array(), $page = 0, $per_page = 10, $orders = array(), $fetch_as = Orm::FETCH_OBJECTS) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        $this->db->select('c.*');
        $this->db->distinct();
        $this->db->from(Orm_Certificate::get_table_name() . ' AS c');
        
        if (isset($filters['id'])) {
            $this->db->where('c.id', $filters['id']);
        }
        if (!empty($filters['pic'])) {
            $this->db->where('c.pic', $filters['pic']);
        }
        if (isset($filters['activity_id'])) {
            $this->db->where('c.activity_id', $filters['activity_id']);
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
            return Orm_Certificate::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Certificate::to_object($row);
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
        return $this->db->insert(Orm_Certificate::get_table_name(), $params);
    }
    
    /**
    * update item
    *
    * @param int $
    * @param array $params
    * @return boolean
    */
    public function update($, $params = array()) {
        return $this->db->update(Orm_Certificate::get_table_name(), $params, array());
    }
    
    /**
    * delete item
    *
    * @param int $
    * @return boolean
    */
    public function delete($) {
        return $this->db->delete(Orm_Certificate::get_table_name(), array());
    }
    
}

