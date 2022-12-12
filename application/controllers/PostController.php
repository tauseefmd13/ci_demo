<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller {


  private $perPage = 10;
	
  public function index()
  {
    $this->load->database();
    $count = $this->db->get('posts')->num_rows();


    if(!empty($this->input->get("page"))){


      $start = $this->input->get("page") * $this->perPage;
      $query = $this->db->limit($start, $this->perPage)->get("posts");
      $data['posts'] = $query->result();
      $data['count']=$count;

      $result = $this->load->view('posts/ajax_post', $data);
      echo json_encode($result);

    }else{
      $query = $this->db->limit($this->perPage,0)->get("posts");
      $data['posts'] = $query->result();
      $data['count']=$count;

      $this->load->view('posts/post', $data);
    }
  }


}