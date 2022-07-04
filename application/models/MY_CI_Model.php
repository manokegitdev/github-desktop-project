<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_CI_Model extends CI_Model { // คลาส Model_template สืบทอดคุณสมบัติของ CI_Model
	public $tblName;
    public function isFirstChange(&$d,$by = "system") {
        $d['created_at'] = date("Y-m-d H:i:s");
        $d['created_by'] = $by;
        $this->isNoFirstChange($d,$by);
    }

    public function isNoFirstChange(&$d,$by = "system") {
            $d['updated_at'] = date("Y-m-d H:i:s");
            $d['updated_by'] = $by;
    }

    /**
     * get list of members
     */
    public function gets(){
        $query = $this->db->get($this->tblName);
        return $query->result();
    } // End gets

    /**
     * update table
     * @return int
     */
    public function update($data){
        if(!array_key_exists("id",$data)){
            $this->isFirstChange($data);
            $this->db->insert($this->tblName, $data);
        }else{ 
            $this->isNoFirstChange($data);
            $this->db->where("id",$data['id']);
            $this->db->update($this->tblName, $data);
        }

        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    } // .End update
}
