<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}
	
	public function index()
	{	
		$data['title'] = "Products";
		$this->load->view('template/header', $data);
		$this->load->view('products/index', $data);
		$this->load->view('template/footer', $data);
	}
	
	public function index_ajax($offset=null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		
		$this->load->library('pagination');
		
		$limit = 5;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('products/index_ajax/');
		$config['total_rows'] = $this->product_model->get_products($limit, $offset, $search, $count=true);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$data['products'] = $this->product_model->get_products($limit, $offset, $search, $count=false);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('products/index_ajax', $data);
	}
}
?>