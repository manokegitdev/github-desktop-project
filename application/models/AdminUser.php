<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUser extends CI_Model { // คลาส Model_template สืบทอดคุณสมบัติของ CI_Model
	   
    private $tableName = "admin_user";

    /**
     * get list of members
     */
    public function getAdminUsers(){
        $query = $this->db->get($this->tableName);
        return $query->result();
    }

    /**
     * get list of members
     */
    public function gets(){
        $query = $this->db->get($this->tableName);
        return $query->result();
    }

    /**
     * update member or new register
     * @return int
     */
    public function updateAdminUser($data){

        if(!array_key_exists("id",$data)){

            $data['created_at'] = date("Y-m-d H:i:s");
            $data['created_by'] = 'service';
            $data['updated_at'] = date("Y-m-d H:i:s");
            $data['updated_by'] = 'service';
    
           $this->db->insert($this->tableName,$data);
           if($this->db->affected_rows()>0){
                return true;
           }
            
        }else{ 
            $data['updated_at'] = date("Y-m-d H:i:s");
            $data['updated_by'] = 'service';
            $this->db->where("id",$data['id']);
            $this->db->update($this->tableName,$data);

            if($this->db->affected_rows()>0){
                return true;
           }
            
        }

        
    } // .End updateAdminUser

    public function update($data){
        if(!array_key_exists("id",$data)){
          $data['created_at'] = date("Y-m-d H:i:s");
          $data['created_by'] = 'service';
          $data['updated_at'] = date("Y-m-d H:i:s");
          $data['updated_by'] = 'service';
          $this->db->insert($this->tableName,$data);
          if($this->db->affected_rows()>0){
              return true;
          }
        }else{ 
          $data['updated_at'] = date("Y-m-d H:i:s");
          $data['updated_by'] = 'service';
          $this->db->where("id",$data['id']);
          $this->db->update($this->tableName,$data);
          if($this->db->affected_rows()>0){
              return true;
          }
        }
    } // .End update

    public function adminUserByUnameAndPword($u,$p){
        $query = $this->db->where('uname',$u)->where('pword',$p)->get($this->tableName);
        return $query->result();
    } // .End findMemberByUnameAndPword

    public function AdminUserById($id){
        $query = $this->db->where('id',$id)->get($this->tableName);
        return $query->result();
    }
    
    
	  /**
     * Get record from  table data by id
     * 
     */
    public function getById($id){
        $query = $this->db->where('id',$id)->get($this->tableName);
        return $query->result();
    } // .End getById
    
    /**
   * Delete record from table data by id
   * 
   */
    public function delById($id){
      $query = $this->db->where('id',$id)->delete($this->tableName);
      return $query;
    } //.End delById

}
?>