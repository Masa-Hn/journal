<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Ambassador_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Ambassador_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Ambassador | Orm_Ambassador[] | array | int
    */
    public function get_all($filters = array(), $page = 0, $per_page = 10, $orders = array(), $fetch_as = Orm::FETCH_OBJECTS) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        $this->db->select('a.*');
        $this->db->distinct();
        $this->db->from(Orm_Ambassador::get_table_name() . ' AS a');
        
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
        if (!empty($filters['name'])) {
            $this->db->where('a.name', $filters['name']);
        }
        if (!empty($filters['country'])) {
            $this->db->where('a.country', $filters['country']);
        }
        if (!empty($filters['gender'])) {
            $this->db->where('a.gender', $filters['gender']);
        }
        if (!empty($filters['leader_gender'])) {
            $this->db->where('a.leader_gender', $filters['leader_gender']);
        }
        if (isset($filters['request_id'])) {
            $this->db->where('a.request_id', $filters['request_id']);
        }
        if (!empty($filters['profile_link'])) {
            $this->db->where('a.profile_link', $filters['profile_link']);
        }
        if (!empty($filters['fb_id'])) {
            $this->db->where('a.fb_id', $filters['fb_id']);
        }
        if (!empty($filters['messenger_id'])) {
            $this->db->where('a.messenger_id', $filters['messenger_id']);
        }
        if (isset($filters['is_joined'])) {
            $this->db->where('a.is_joined', $filters['is_joined']);
        }
        if (isset($filters['join_following_team'])) {
            $this->db->where('a.join_following_team', $filters['join_following_team']);
        }
        if (isset($filters['created_at'])) {
            $this->db->where('a.created_at', $filters['created_at']);
        }
        if (isset($filters['display'])) {
            $this->db->where('a.display', $filters['display']);
        }
        if (isset($filters['code_button'])) {
            $this->db->where('a.code_button', $filters['code_button']);
        }
        if (isset($filters['team_link_button'])) {
            $this->db->where('a.team_link_button', $filters['team_link_button']);
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
            return Orm_Ambassador::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Ambassador::to_object($row);
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
        $this->db->insert(Orm_Ambassador::get_table_name(), $params);
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
        return $this->db->update(Orm_Ambassador::get_table_name(), $params, array('id' => $id));
    }
    
    /**
    * delete item
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id) {
        return $this->db->delete(Orm_Ambassador::get_table_name(), array('id' => $id));
    }
    
}

