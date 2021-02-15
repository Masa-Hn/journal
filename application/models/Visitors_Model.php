<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Visitors_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Visitors_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Visitors | Orm_Visitors[] | array | int
    */
    public function get_all($filters = array(), $page = 0, $per_page = 10, $orders = array(), $fetch_as = Orm::FETCH_OBJECTS) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        $this->db->select('v.*');
        $this->db->distinct();
        $this->db->from(Orm_Visitors::get_table_name() . ' AS v');
        
        if (!empty($filters['user_IP'])) {
            $this->db->where('v.user_IP', $filters['user_IP']);
        }
        if (isset($filters['visit_times'])) {
            $this->db->where('v.visit_times', $filters['visit_times']);
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
            return Orm_Visitors::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Visitors::to_object($row);
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
        return $this->db->insert(Orm_Visitors::get_table_name(), $params);
    }
    
    /**
    * update item
    *
    * @param int $
    * @param array $params
    * @return boolean
    */
    public function update($id, $params = array()) {
        return $this->db->update(Orm_Visitors::get_table_name(), $params, array('id' => $id));
    }
    
    /**
    * delete item
    *
    * @param int $
    * @return boolean
    */
    public function delete($id) {
        return $this->db->delete(Orm_Visitors::get_table_name(), array('id' => $id));
    }
    
}

