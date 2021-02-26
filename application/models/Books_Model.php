<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Books_Model
*
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Books_Model extends CI_Model {
    
    /**
    * get table rows according to the assigned filters and page
    *
    * @param array $filters
    * @param int $page
    * @param int $per_page
    * @param array $orders
    * @param int $fetch_as
    *
    * @return Orm_Books | Orm_Books[] | array | int
    */
    public function get_all($constrain=array(), $filters = array(), $page = 0, $per_page = 10, $orders = array(), $group_by =array(), $fetch_as = Orm::FETCH_OBJECTS) {
        
        $page = (int) $page;
        $per_page = (int) $per_page;
        
        if (!empty($constrain)) {
            $this->db->select(implode(',',$constrain));
            $this->db->distinct();
            $this->db->from(Orm_Books::get_table_name(). ' AS b');
        }
        else{
            $this->db->select('b.*');
            $this->db->distinct();
            $this->db->from(Orm_Books::get_table_name(). ' AS b');       
        }
        if (isset($filters['id'])) {
            $this->db->where('b.id', $filters['id']);
        }
        if (!empty($filters['name'])) {
            $this->db->where('b.name', $filters['name']);
        }
        if (!empty($filters['writer'])) {
            $this->db->where('b.writer', $filters['writer']);
        }
        if (!empty($filters['brief'])) {
            $this->db->where('b.brief', $filters['brief']);
        }
        if (!empty($filters['pic'])) {
            $this->db->where('b.pic', $filters['pic']);
        }
        if (!empty($filters['post'])) {
            $this->db->where('b.post', $filters['post']);
        }
        if (!empty($filters['link'])) {
            $this->db->where('b.link', $filters['link']);
        }
        if (isset($filters['resofrate'])) {
            $this->db->where('b.resofrate', $filters['resofrate']);
        }
        if (isset($filters['numofrate'])) {
            $this->db->where('b.numofrate', $filters['numofrate']);
        }
        if (isset($filters['numdownload'])) {
            $this->db->where('b.numdownload', $filters['numdownload']);
        }
        if (isset($filters['level'])) {
            $this->db->where('b.level', $filters['level']);
        }
        if (!empty($filters['section'])) {
            $this->db->where('b.section', $filters['section']);
        }
        if (!empty($filters['type'])) {
            $this->db->where('b.type', $filters['type']);
        }
        if (!empty($filters['uploadname'])) {
            $this->db->where('b.uploadname', $filters['uploadname']);
        }
        if (isset($filters['date'])) {
            $this->db->where('b.date', $filters['date']);
        }
        
        if ($orders) {
            $this->db->order_by(implode(',', $orders));
        }
        
        if ($page) {
            $offset = ($page - 1) * $per_page;
            $this->db->limit($per_page, $offset);
        }
        if ($group_by) {
            $this->db->group_by(implode(',', $group_by));
        }

        switch($fetch_as) {
            case Orm::FETCH_OBJECT:
            return Orm_Books::to_object($this->db->get()->row_array());
            break;
            case Orm::FETCH_OBJECTS:
            $objects = array();
            foreach($this->db->get()->result_array() as $row) {
                $objects[] = Orm_Books::to_object($row);
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
        return $this->db->insert(Orm_Books::get_table_name(), $params);
    }
    
    /**
    * update item
    *
    * @param int $
    * @param array $params
    * @return boolean
    */
    public function update($id, $params = array()) {
        return $this->db->update(Orm_Books::get_table_name(), $params, array('id' => $id));
    }
    
    /**
    * delete item
    *
    * @param int $
    * @return boolean
    */
    public function delete($id) {
        return $this->db->delete(Orm_Books::get_table_name(), array('id' => $id));
    }
    
}

