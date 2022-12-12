<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiple_form extends CI_Controller 
{

	public function index()
	{
		$data=[];

		$this->load->view('multiple_form_view',$data);
	}

	public function insert()
	{
		if($_POST)
		{
			for($count = 0; $count<count($_POST['hidden_first_name']); $count++)
			{
				$data = array(
					'first_name' => $_POST['hidden_first_name'][$count],
					'last_name' => $_POST['hidden_last_name'][$count]
				);
				$this->db->insert('tbl_sample',$data);
			}
		}
	}
}