<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Staff_model extends CI_Model {
    private $_staffID;
    private $_name;   
    private $_email;
    private $_address;
    private $_salary;
    private $_mobile;

    public function setStaffID($staffID) {
        $this->_staffID = $staffID;
    }
    public function setName($name) {
        $this->_name = $name;
    }
    public function setEmail($email) {
        $this->_email = $email;
    }
    public function setAddress($address) {
        $this->_address = $address;
    }
    public function setSalary($salary) {
        $this->_salary = $salary;
    }
    public function setMobile($mobile) {
        $this->_mobile = $mobile;
    }    
    var $table = 'staff';
    var $column_order = array(null, 's.name','s.email','s.mobile','s.address','s.salary');
    var $column_search = array('s.name','s.email','s.mobile','s.address','s.salary');
    var $order = array('id' => 'DESC');

    private function getQuery(){        
        if(!empty($this->input->post('name'))){
            $this->db->like('s.name', $this->input->post('name'), 'both');
        }
        if(!empty($this->input->post('email'))){
            $this->db->like('s.email', $this->input->post('email'), 'both');
        }
        if(!empty($this->input->post('mobile'))){
            $this->db->like('s.mobile', $this->input->post('mobile'), 'both');
        }
        if(!empty($this->input->post('address'))){
            $this->db->like('s.address', $this->input->post('address'), 'both');
        }
        $this->db->select(array('s.id', 's.name','s.email','s.mobile','s.address','s.salary'));
        $this->db->from('staff as s');
        $i = 0;    
        foreach ($this->column_search as $item){
            if(!empty($_POST['search']['value'])){                
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }        
        if(!empty($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if(!empty($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function getStaffList() {
        $this->getQuery();
        if(!empty($_POST['length']) && $_POST['length'] < 1) {
            $_POST['length']= '10';
        } else {
            $_POST['length']= $_POST['length'];
        }        
        if(!empty($_POST['start']) && $_POST['start'] > 1) {
        $_POST['start']= $_POST['start'];
        }
        $this->db->limit($_POST['length'], $_POST['start']);       
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countFiltered(){
        $this->getQuery();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }    
    public function createStaff() { 
        $data = array(
            'name' => $this->_name,
            'email' => $this->_email,
            'address' => $this->_address,
            'mobile' => $this->_mobile,
            'salary' => $this->_salary,
        );
        $this->db->insert('staff', $data);
        return $this->db->insert_id();
    }    
    public function updateStaff() { 
        $data = array(
            'name' => $this->_name,            
            'email' => $this->_email,
            'address' => $this->_address,
            'mobile' => $this->_mobile,
            'salary' => $this->_salary,
        );
        $this->db->where('id', $this->_staffID);
        $this->db->update('staff', $data);
    }   
    public function getStaff() {        
        $this->db->select(array('s.id', 's.name', 's.email', 's.address', 's.mobile', 's.salary'));
        $this->db->from('staff s');  
        $this->db->where('s.id', $this->_staffID);     
        $query = $this->db->get();
       return $query->row_array();
    } 
    public function deleteStaff() {         
        $this->db->where('id', $this->_staffID);
        $this->db->delete('staff');  
    }  
    public function validateEmail($email) {
        return preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $email)?TRUE:FALSE;
    }   
    public function validateMobile($mobile){
        return preg_match('/^[0-9]{10}+$/', $mobile)?TRUE:FALSE;
    }    
}