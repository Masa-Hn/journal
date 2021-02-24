<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Infographic_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Infographic_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Infographic | Orm_Infographic[] | array | int
    */
    public function get_all($filters = array(), $page = 0, $per_page = 10, $orders = array(), $fetch_as = Orm::FETCH_OBJECTS ,$groupBy =array()) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        $this->db->select('i.*');
        $this->db->distinct();
        $this->db->from(Orm_Infographic::get_table_name() . ' AS i');
        
        if (isset($filters['id'])) {
            $this->db->where('i.id', $filters['id']);
        }
        if (!empty($filters['title'])) {
            $this->db->where('i.title', $filters['title']);
        }
        if (!empty($filters['pic'])) {
            $this->db->where('i.pic', $filters['pic']);
        }
        if (!empty($filters['section'])) {
            $this->db->where('i.section', $filters['section']);
        }
        if (isset($filters['series_id'])) {
            $this->db->where('i.series_id', $filters['series_id']);
        }
        if (isset($filters['date'])) {
            $this->db->where('i.date', $filters['date']);
        }
        if ($groupBy) {
            $this->db->group_by(implode(',', $groupBy));
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
            return Orm_Infographic::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Infographic::to_object($row);
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

        // if ($specialWhere) {
        //     $this->db->where(implode(',', $orders));
        // }
    }
    

        /**
    * Find rows whith select constrains as Objects
    *
    * @param array $constrain
    * @param array $condition
    * @param array $orders
    * @param array $groupBy
    * @param int $fetch_as
    *
    * @return Orm_Infographic | Orm_Infographic[] | array | int
    */
    public function find($constrain = array(), $condition = array() , $orders = array(), $group_by =array(),$fetch_as = Orm::FETCH_OBJECTS) {


        if (!empty($constrain)) {
            $this->db->select(implode(',',$constrain));
            $this->db->distinct();
            $this->db->from(Orm_Infographic::get_table_name());
        }
        else{
            $this->db->select('i.*');
            $this->db->distinct();
            $this->db->from(Orm_Infographic::get_table_name());       
        }
         if (!empty($condition)){
            $this->db->where($condition);
         }
        
        if ($group_by) {
            $this->db->group_by(implode(',', $group_by));
        }

        if ($orders) {
            $this->db->order_by(implode(',', $orders));
        }
        switch($fetch_as) {
            case Orm::FETCH_OBJECT:
            return Orm_Infographic::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Infographic::to_object($row);
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

        // if ($specialWhere) {
        //     $this->db->where(implode(',', $orders));
        // }
    }

    /**
    * insert new row to the table
    *
    * @param array $params
    * @return boolean
    */
    public function insert($params = array()) {
        return $this->db->insert(Orm_Infographic::get_table_name(), $params);
    }
    
    /**
    * update item
    *
    * @param int $
    * @param array $params
    * @return boolean
    */
    public function update($id, $params = array()) {
        return $this->db->update(Orm_Infographic::get_table_name(), $params, array('id' => $id));
    }
    
    /**
    * delete item
    *
    * @param int $
    * @return boolean
    */
    public function delete($id) {
        return $this->db->delete(Orm_Infographic::get_table_name(), array('id' => $id));
    }
    
}

