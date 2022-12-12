<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct(){

    parent::__construct();

    // Load model
    $this->load->model('user_model');

  }

  public function index(){

    // load view
    $this->load->view('user_view');
  }

  public function userList(){
    // POST data
    $postData = $this->input->post();

    // Get data
    $data = $this->user_model->getUsers($postData);

    echo json_encode($data);
  }

}