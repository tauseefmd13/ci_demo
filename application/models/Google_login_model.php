<?php
class Google_login_model extends CI_Model
{
  function Is_already_register($id)
  {
    $this->db->where('login_oauth_uid', $id);
    $query = $this->db->get('chat_user');
    if($query->num_rows() > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function Update_user_data($data, $id)
  {
    $this->db->where('login_oauth_uid', $id);
    $this->db->update('chat_user', $data);
  }

  function Insert_user_data($data)
  {
    $this->db->insert('chat_user', $data);
  }

  function Get_user_id($id)
  {
    $this->db->select('user_id');
    $this->db->from('chat_user');
    $this->db->where('login_oauth_uid', $id);
    $query = $this->db->get();
    foreach($query->result() as $row)
    {
      return $row->user_id;
    }
  }

  function Insert_login_data($data)
  {
    $this->db->insert('login_data', $data);
    return $this->db->insert_id();
  }
}
?>
