<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_model {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_category()
	{
		$this->db->order_by('category_name','ASC');
		$query = $this->db->get('category');
		return $query->result();
	}

	public function count_category($category_name)
	{
		$this->db->where('category_name',$category_name);
		$query = $this->db->get('category');
		return $query->num_rows();
	}
}