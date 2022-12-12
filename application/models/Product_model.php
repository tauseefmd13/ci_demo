<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_products($limit, $offset, $search, $count)
	{
		$this->db->select('*');
		$this->db->from('products');
		if($search){
			$keyword = $search['keyword'];
			if($keyword){
				$this->db->where("product_name LIKE '%$keyword%'");
			}
		}
		if($count){
			return $this->db->count_all_results();
		}
		else {
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		return array();
	}
}
?>