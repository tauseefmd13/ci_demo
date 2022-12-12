<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends CI_Controller {
 
	function index()
	{
		$this->load->view('autocomplete_view') ;
	}
	
	function fetch()
	{
		$this->load->model('autocomplete_model');
		echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
	}
}
?>