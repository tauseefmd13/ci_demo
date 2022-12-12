<?php
class Ajax extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
    }
 
    public function index(){
     $this->load->view('jquery-ui-autocomplete');
    }
 
    public function search(){
 
        $term = $this->input->get('term');
 
        $this->db->like('username', $term);
 
        $data = $this->db->get("user")->result();
 
        echo json_encode( $data);
    }
     
}