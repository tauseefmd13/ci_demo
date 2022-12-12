<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }
	
	public function index()
	{
		$data = array();
		$data['results'] = $this->category_model->get_all_category();

		$this->load->view('category',$data);
	}

	public function add()
	{
		if(isset($_POST["category_name"]))
		{
			$category_name = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST["category_name"]);

			$data = array(
				'category_name'	=>	$category_name
			);

			$num_rows = $this->category_model->count_category($category_name);
			if($num_rows == 0)
			{
				if($this->db->insert('category',$data))
				{
					echo 'yes';
				}
				else
				{
					echo "no";
				}
			}
		}
	}
}
