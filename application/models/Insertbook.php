<?php
class Insertbook extends CI_Model {

    public function addbook($name,$writer,$brief,$level,$section,$type,$plink,$dlink,$ilink){

        $data['name']    =$name;
        $data['writer']  =$writer;
        $data['brief']   =$brief;
        $data['level']   =$level;
        $data['section'] =$section;
        $data['type']    =$type;
        $data['post']    =$plink;
        $data['link']    =$dlink;
        $data['pic']     =$ilink;
        $data['date']    =date("Y-m-d H:i:s", time());

        return $this->db->insert('books',$data); 
    }
    
    public function editbook($name,$writer,$brief,$level,$section,$type,$plink,$dlink,$ilink,$id){

        $data['name']    =$name;
        $data['writer']  =$writer;
        $data['brief']   =$brief;
        $data['level']   =$level;
        $data['section'] = $section;
        $data['type']    =$type;
        $data['post']    =$plink;
        $data['link']    =$dlink;
        $data['pic']     =$ilink;
        $data['date']    =date("Y-m-d H:i:s", time());

        $this->db->where('id', $id);
        return $this->db->update('books',$data); 
    }

 }    
?>