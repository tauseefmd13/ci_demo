<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

  function getUsers($postData){

     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("username like '%".$postData['search']."%' ");

       $records = $this->db->get('user')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->id,"label"=>$row->username);
       }

     }

     return $response;
  }

}