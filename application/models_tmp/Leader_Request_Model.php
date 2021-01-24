<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Leader_Request_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Leader_Request_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Leader_Request | Orm_Leader_Request[] | array | int
    */
    public function get_all($filters = array(), $page = 0, $per_page = 10, $orders = array(), $fetch_as = Orm::FETCH_OBJECTS) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        $this->db->select('lr.*');
        $this->db->distinct();
        $this->db->from(Orm_Leader_Request::get_table_name() . ' AS lr');
        
        if (isset($filters['Rid'])) {
            $this->db->where('lr.Rid', $filters['Rid']);
        }
        if (isset($filters['not_Rid'])) {
            $this->db->where('lr.Rid !=', $filters['not_Rid']);
        }
        if (!empty($filters['in_Rid'])) {
            $this->db->where_in('lr.Rid', $filters['in_Rid']);
        }
        if (!empty($filters['not_in_Rid'])) {
            $this->db->where_not_in('lr.Rid', $filters['not_in_Rid']);
        }
        if (isset($filters['members_num'])) {
            $this->db->where('lr.members_num', $filters['members_num']);
        }
        if (!empty($filters['gender'])) {
            $this->db->where('lr.gender', $filters['gender']);
        }
        if (isset($filters['date'])) {
            $this->db->where('lr.date', $filters['date']);
        }
        if (isset($filters['leader_id'])) {
            $this->db->where('lr.leader_id', $filters['leader_id']);
        }
        if (isset($filters['is_done'])) {
            $this->db->where('lr.is_done', $filters['is_done']);
        }
        if (isset($filters['send_to_leader'])) {
            $this->db->where('lr.send_to_leader', $filters['send_to_leader']);
        }
        if (isset($filters['current_team_count'])) {
            $this->db->where('lr.current_team_count', $filters['current_team_count']);
        }
        if (isset($filters['counter'])) {
            $this->db->where('lr.counter', $filters['counter']);
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
            return Orm_Leader_Request::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Leader_Request::to_object($row);
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
        $this->db->insert(Orm_Leader_Request::get_table_name(), $params);
        return $this->db->insert_id();
    }
    
    /**
    * update item
    *
    * @param int $Rid
    * @param array $params
    * @return boolean
    */
    public function update($Rid, $params = array()) {
        return $this->db->update(Orm_Leader_Request::get_table_name(), $params, array('Rid' => $Rid));
    }
    
    /**
    * delete item
    *
    * @param int $Rid
    * @return boolean
    */
    public function delete($Rid) {
        $related_count = 0;
        $related_count += $this->db->where('request_id', $Rid)->count_all_results('ambassador');
        if($related_count === 0) {
            return $this->db->delete(Orm_Leader_Request::get_table_name(), array('Rid' => $Rid));
        }
        return false;
    }
    
}

