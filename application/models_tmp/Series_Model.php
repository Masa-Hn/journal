<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Series_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Series_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Series | Orm_Series[] | array | int
    */
    public function get_all($filters = array(), $page = 0, $per_page = 10, $orders = array(), $fetch_as = Orm::FETCH_OBJECTS) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        $this->db->select('s.*');
        $this->db->distinct();
        $this->db->from(Orm_Series::get_table_name() . ' AS s');
        
        if (isset($filters['id'])) {
            $this->db->where('s.id', $filters['id']);
        }
        if (!empty($filters['title'])) {
            $this->db->where('s.title', $filters['title']);
        }
        if (!empty($filters['pic'])) {
            $this->db->where('s.pic', $filters['pic']);
        }
        if (isset($filters['num_of_photos'])) {
            $this->db->where('s.num_of_photos', $filters['num_of_photos']);
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
            return Orm_Series::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Series::to_object($row);
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
        return $this->db->insert(Orm_Series::get_table_name(), $params);
    }
    
    /**
    * update item
    *
    * @param int $
    * @param array $params
    * @return boolean
    */
    public function update($, $params = array()) {
        return $this->db->update(Orm_Series::get_table_name(), $params, array());
    }
    
    /**
    * delete item
    *
    * @param int $
    * @return boolean
    */
    public function delete($) {
        return $this->db->delete(Orm_Series::get_table_name(), array());
    }
    
}

