<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Leader_Info_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Leader_Info_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Leader_Info | Orm_Leader_Info[] | array | int
    */
    public function get_all($filters = array(), $page = 0, $per_page = 10, $orders = array(), $fetch_as = Orm::FETCH_OBJECTS) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        $this->db->select('li.*');
        $this->db->distinct();
        $this->db->from(Orm_Leader_Info::get_table_name() . ' AS li');
        
        if (isset($filters['id'])) {
            $this->db->where('li.id', $filters['id']);
        }
        if (isset($filters['not_id'])) {
            $this->db->where('li.id !=', $filters['not_id']);
        }
        if (!empty($filters['in_id'])) {
            $this->db->where_in('li.id', $filters['in_id']);
        }
        if (!empty($filters['not_in_id'])) {
            $this->db->where_not_in('li.id', $filters['not_in_id']);
        }
        if (!empty($filters['leader_name'])) {
            $this->db->where('li.leader_name', $filters['leader_name']);
        }
        if (!empty($filters['leader_link'])) {
            $this->db->where('li.leader_link', $filters['leader_link']);
        }
        if (!empty($filters['team_link'])) {
            $this->db->where('li.team_link', $filters['team_link']);
        }
        if (!empty($filters['leader_email'])) {
            $this->db->where('li.leader_email', $filters['leader_email']);
        }
        if (!empty($filters['team_name'])) {
            $this->db->where('li.team_name', $filters['team_name']);
        }
        if (!empty($filters['leader_gender'])) {
            $this->db->where('li.leader_gender', $filters['leader_gender']);
        }
        if (!empty($filters['uniqid'])) {
            $this->db->where('li.uniqid', $filters['uniqid']);
        }
        if (!empty($filters['messenger_id'])) {
            $this->db->where('li.messenger_id', $filters['messenger_id']);
        }
        if (!empty($filters['leaders_team_name'])) {
            $this->db->where('li.leaders_team_name', $filters['leaders_team_name']);
        }
        if (!empty($filters['leader_rank'])) {
            $this->db->where('li.leader_rank', $filters['leader_rank']);
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
            return Orm_Leader_Info::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Leader_Info::to_object($row);
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
        $this->db->insert(Orm_Leader_Info::get_table_name(), $params);
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
        return $this->db->update(Orm_Leader_Info::get_table_name(), $params, array('id' => $id));
    }
    
    /**
    * delete item
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id) {
        $related_count = 0;
        $related_count += $this->db->where('leader_id', $id)->count_all_results('leader_request');
        if($related_count === 0) {
            return $this->db->delete(Orm_Leader_Info::get_table_name(), array('id' => $id));
        }
        return false;
    }
    
}

