<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Staff extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Staff_model', 'staff');
    }    
    public function index() {
        $data['page'] = 'staff-list';
        $data['title'] = 'Datatables Add Edit Delete with CodeIgniter and Ajax';    
        $this->load->view('staff/index', $data);
    }
    public function getStaffListing(){
        $json = array();    
        $list = $this->staff->getStaffList();
        $data = array();
        foreach ($list as $element) {
            $row = array();
            $row[] = $element['id'];
            $row[] = $element['name'];
            $row[] = $element['email'];
            $row[] = $element['mobile'];
            $row[] = $element['address'];
            $row[] = $element['salary'];
            $data[] = $row;
        }
        $json['data'] = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->staff->countAll(),
            "recordsFiltered" => $this->staff->countFiltered(),
            "data" => $data,
        );       
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json['data']);
    }    
    public function save() {
        $json = array();        
        $name = $this->input->post('name');        
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $mobile = $this->input->post('mobile');
        $salary = $this->input->post('salary');  
		
        if(empty(trim($name))){
            $json['error']['name'] = 'Please enter name';
        }      

        if(empty(trim($email))){
            $json['error']['email'] = 'Please enter email address';
        }

        if ($this->staff->validateEmail($email) == FALSE) {
            $json['error']['email'] = 'Please enter valid email address';
        }
        if(empty($address)){
            $json['error']['address'] = 'Please enter address';
        }
        if($this->staff->validateMobile($mobile) == FALSE) {
            $json['error']['mobile'] = 'Please enter valid mobile no';
        }

        if(empty($salary)){
            $json['error']['salary'] = 'Please enter salary';
        }

        if(empty($json['error'])){
            $this->staff->setName($name);            
            $this->staff->setEmail($email);
            $this->staff->setAddress($address);
            $this->staff->setSalary($salary);
            $this->staff->setMobile($mobile);
            try {
                $last_id = $this->staff->createStaff();
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
                
            if (!empty($last_id) && $last_id > 0) {
                $staffID = $last_id;
                $this->staff->setStaffID($staffID);
                $staffInfo = $this->staff->getStaff();                    
                $json['staff_id'] = $staffInfo['id'];
                $json['name'] = $staffInfo['name'];                
                $json['email'] = $staffInfo['email'];
                $json['address'] = $staffInfo['address'];
                $json['mobile'] = $staffInfo['mobile'];
                $json['salary'] = $staffInfo['salary'];
                $json['status'] = 'success';
            }
        }
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json);
    }    
    public function edit() {
        $json = array();
        $staffID = $this->input->post('staff_id');
        $this->staff->setStaffID($staffID);
        $json['staffInfo'] = $this->staff->getStaff();

        $this->output->set_header('Content-Type: application/json');
        $this->load->view('staff/popup/renderEdit', $json);
    }   
    public function update() {
        $json = array();        
        $staff_id = $this->input->post('staff_id');
        $name = $this->input->post('name');        
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $mobile = $this->input->post('mobile');
        $salary = $this->input->post('salary');            
            
        if(empty(trim($name))){
            $json['error']['name'] = 'Please enter name';
        }
        
        if(empty(trim($email))){
            $json['error']['email'] = 'Please enter email address';
        }

        if ($this->staff->validateEmail($email) == FALSE) {
            $json['error']['email'] = 'Please enter valid email address';
        }
        if(empty($address)){
            $json['error']['address'] = 'Please enter address';
        }
        if($this->staff->validateMobile($mobile) == FALSE) {
            $json['error']['mobile'] = 'Please enter valid mobile no';
        }

        if(empty($salary)){
            $json['error']['salary'] = 'Please enter salary';
        }

        if(empty($json['error'])){
            $this->staff->setStaffID($staff_id);
            $this->staff->setName($name);
            $this->staff->setEmail($email);
            $this->staff->setAddress($address);
            $this->staff->setSalary($salary);
            $this->staff->setMobile($mobile);
            try {
                $last_id = $this->staff->updateStaff();;
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
                
            if (!empty($staff_id) && $staff_id > 0) { 
                $this->staff->setStaffID($staff_id);
                $staffInfo = $this->staff->getStaff();                    
                $json['staff_id'] = $staffInfo['id'];
                $json['name'] = $staffInfo['name'];
                $json['email'] = $staffInfo['email'];
                $json['address'] = $staffInfo['address'];
                $json['mobile'] = $staffInfo['mobile'];
                $json['salary'] = $staffInfo['salary'];                   
                $json['status'] = 'success';
            }
        }
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json);
    }    
    public function display() {
        $json = array();
        $staffID = $this->input->post('staff_id');
        $this->staff->setStaffID($staffID);
        $json['staffInfo'] = $this->staff->getStaff();

        $this->output->set_header('Content-Type: application/json');
        $this->load->view('staff/popup/renderDisplay', $json);
    }   
    public function delete() {
        $json = array();
        $staffID = $this->input->post('staff_id');        
        $this->staff->setStaffID($staffID);
        $this->staff->deleteStaff();
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json);        
    }
}