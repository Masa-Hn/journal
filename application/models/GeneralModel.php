<?php
class GeneralModel extends CI_Model{
/*
| -------------------------------------------------------------------
|  Insert Data And Return The Inserted (id)
| -------------------------------------------------------------------
|  Take two arguments:
|
|   [data]  = (array) inserted data
|   [table] = table name
|
| Return:
|   inserted id
|
*/    
    public function insertAndReturn_id($data, $table){
        
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    } 
/*
| -------------------------------------------------------------------
|  Insert Data Function
| -------------------------------------------------------------------
|  Take two arguments:
|
|   [data]  = (array) inserted data
|   [table] = table name
|
*/      
    public function insert($data, $table){
        
        return $this->db->insert($table, $data);
    }
/*
| -------------------------------------------------------------------
|  Remove Data Function
| -------------------------------------------------------------------
|  Take three arguments:
|
|   [where] = the condition column [by default is (id) col]
|   [val]   = the condition value
|   [table] = table name
|
*/  
    public function remove($val, $table, $where = 'id'){

        $this->db->where($where, $val);
        return $this->db->delete($table);
    }
/*
| -------------------------------------------------------------------
|  Update Data Function
| -------------------------------------------------------------------
|  Take four arguments:
|
|   [where] = the condition column [by default is (id) col]
|   [val]   = the condition value
|   [data]  = (array) updated data
|   [table] = table name
|
*/
    public function update($data, $val, $table, $where = 'id'){

        $this->db->where($where, $val);
        return $this->db->update($table, $data);
    }
/*
| -------------------------------------------------------------------
|  Get Data Function
| -------------------------------------------------------------------
|  Take four arguments:
|
|   [select] = columns [by default all]
|   [where]  = the condition column 
|   [val]    = the condition value
|   [table]  = table name
|
|  Return:
|   data
|
*/ 
    public function get_data($val, $where, $table, $select = '*'){
        
        $this->db->select($select);    
        $this->db->where($where, $val);
        return $this->db->get($table);
    }

     public function get_data_limit($val, $where, $table , $limit, $start, $select = '*'){

        $this->db->select($select);    
        $this->db->where($where, $val);
                        $this->db->limit($limit, $start);
        return $this->db->get($table);
    }

     
}