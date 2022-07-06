<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model { // คลาส Model_template สืบทอดคุณสมบัติของ CI_Model
     /**
	  * member
	  */
    private $tableName = "member";

	  /**
	  * Get All record with LIKE condition
    * @params array $a_condition
    * @return array
	  */
    public function gets_WithLikeCondition($a_condition) {
      foreach ($a_condition as $k => $v){
        if($v != "")
          $this->db->like($k,$v);
      } // .End for

      $query = $this->db->get($this->tableName);
      return $query->result();
    } // .End function

    /**
	  * Get All record
    * @return array
	  */
    public function gets() {
      $query = $this->db->get($this->tableName);
      return $query->result();
    } // .End function

    /**
     * Get record from  table data by spec field and value
     *
     */
    public function getByField($f, $v){
      $query = $this->db->where($f,$v)->get($this->tableName);
      return $query->result();
    } // .End getByField

    /**
     * Get top last data.
     * @return array
     */
    public function getTopLast() {
      $query = $this->db->query("select * from {$this->tableName} limit 0,1;");
      return $query->result();
    }

	  /**
	  * Get list id,value select option
    * @return array
	  */
	  public function get_select_options() {
      $query = $this->db->get($this->tableName);
      $rs = $query->result();

      $options = Array();
      foreach($rs as $k => $v){
        $options[$v->id] = $v->name;
      }

      return $options;
	  } // .End get_select_options

      public function update($data){
        if(!array_key_exists("id",$data)){
          $data['created_at'] = date("Y-m-d H:i:s");
          $data['created_by'] = $this->session->userdata('name'); //$_SESSION['uname'];
          $data['updated_at'] = date("Y-m-d H:i:s");
          $data['updated_by'] = $this->session->userdata('name'); //$_SESSION['uname'];
          $this->db->insert($this->tableName,$data);
          if($this->db->affected_rows() > 0){
              return true;
          }
        }else{
          $data['updated_at'] = date("Y-m-d H:i:s");
          $data['updated_by'] = $this->session->userdata('name'); //$_SESSION['uname'];
          $this->db->where("id",$data['id']);
          $this->db->update($this->tableName,$data);
          if($this->db->affected_rows() > 0){
              return true;
          }
        }
      } // .End update

      

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
      
      public function memberByUnameAndPword($u, $p) {

        $query = $this->db->where('username',$u)->where('password',$p)->get($this->tableName);
        return $query->result();
    } // .End findMemberByUnameAndPword
}

?>