<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    public function insert_contact($contactData)
    {
        $this->db->insert('contacts', $contactData);
        return $this->db->insert_id();
    }
}
?>