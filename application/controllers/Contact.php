<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('contact_model');
    }

    public function index()
    {
        $data['title'] = "Contact";

        $this->load->view('contacts/contact', $data);
    }

    public function contactSubmit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        }
        else {
            $contactData = array(
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'phone' => $this->input->post('phone', true),
                'message' => $this->input->post('message', true),
                'created_at' => date('Y-m-d H:i:s')
            );

            $id = $this->contact_model->insert_contact($contactData);

            $response = array(
                'status' => 'success',
                'message' => "<h3>Message send successfully.</h3>"
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
?>