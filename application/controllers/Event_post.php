<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_post extends CI_Controller {

	public function index()
	{
		$this->load->view('event_post/index');
	}

	public function uploadImage() { 
   
      	$data = [];
   
      	$count = count($_FILES['attachment']['name']);
    	if($count>0) {
	      	for($i=0;$i<$count;$i++){
	    
		        if(!empty($_FILES['attachment']['name'][$i])){

		        	$_FILES['file']['name'] = $_FILES['attachment']['name'][$i];
					$_FILES['file']['type'] = $_FILES['attachment']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['attachment']['error'][$i];
					$_FILES['file']['size'] = $_FILES['attachment']['size'][$i];

		        	$ext = pathinfo($_FILES['attachment']['name'][$i], PATHINFO_EXTENSION);
			        $ext = strtolower($ext);
			        if(in_array($ext,['jpg','jpeg','png','svg','gif'])) {
			            $type = 'image';
			        } else {
			        	$type = 'video';
			        }

			        if ($type == 'image') {
		    			
						$config['upload_path'] = 'uploads/events/'; 
						$config['allowed_types'] = 'jpg|jpeg|png|svg';
						$config['file_name'] = $_FILES['attachment']['name'][$i];

						$this->load->library('upload',$config); 
			    		$this->upload->initialize($config);
			          	if($this->upload->do_upload('file')) {

				            $upload_data = $this->upload->data();
				            $fileName = $upload_data['file_name'];

							$insertData['event_id'] = 'EV41258';
							$insertData['post_type'] = 'image';
							$insertData['file_path'] = base_url('uploads/events/' . $fileName);
							$insertData['created_at'] = date('Y-m-d H:i:s');
							$insertData['attachment'] = $fileName;
			          	}
		          	} else {
		          		$config['upload_path'] = 'uploads/events/'; 
						$config['allowed_types'] = 'wmv|mp4|avi|mov|3gp|flv';
						$config['file_name'] = $_FILES['attachment']['name'][$i];

						$this->load->library('upload',$config); 
			    		$this->upload->initialize($config);
			          	if($this->upload->do_upload('file')) {

				            $upload_data = $this->upload->data();
				            $fileName = $upload_data['file_name'];

							$insertData['event_id'] = 'EV41258';
							$insertData['post_type'] = 'video';
							$insertData['file_path'] = base_url('uploads/events/' . $fileName);
							$insertData['created_at'] = date('Y-m-d H:i:s');
							$insertData['attachment'] = $fileName;
			          	}
		          	}

		          	$this->event_post_model->insert($insertData);
		        }
	      	}
   		}
  		$this->load->view('event_post/index', $data); 
   	}
}
