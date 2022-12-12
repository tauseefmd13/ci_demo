<?php
class Chat_model extends CI_Model
{
 function search_user_data($user_id, $query)
 {
  $where = "user_id != '".$user_id."' AND (first_name LIKE '%".$query."%' OR last_name LIKE '%".$query."%')";

  $this->db->where($where);

  return $this->db->get('chat_user');
 }

 function Check_request_status($sender_id, $receiver_id)
 {
  $this->db->where('(sender_id = "'.$sender_id.'" OR sender_id = "'.$receiver_id.'")');
  $this->db->where('(receiver_id = "'.$receiver_id.'" OR receiver_id = "'.$sender_id.'")');
  $this->db->order_by('chat_request_id', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get('chat_request');
  if($query->num_rows() > 0)
  {
   foreach($query->result() as $row)
   {
    return $row->chat_request_status;
   }
  }
 }

 function Insert_chat_request($data)
 {
  $this->db->insert('chat_request', $data);
 }

 function Fetch_notification_data($receiver_id)
 {
  $this->db->where('receiver_id', $receiver_id);
  $this->db->where('chat_request_status', 'Pending');
  return $this->db->get('chat_request');
 }

 function Get_user_data($user_id)
 {
  $this->db->where('user_id', $user_id);
  $data = $this->db->get('chat_user');
  $output = array();
  foreach($data->result() as $row)
  {
   $output['first_name'] = $row->first_name;
   $output['last_name'] = $row->last_name;
   $output['email_address'] = $row->email_address;
   $output['profile_picture'] = $row->profile_picture;
  }
  return $output;
 }

 function Update_chat_request($chat_request_id, $data)
 {
  $this->db->where('chat_request_id', $chat_request_id);
  $this->db->update('chat_request', $data);
 }

 function Fetch_chat_user_data($user_id)
 {
  $this->db->where('chat_request_status', 'Accept');
  $this->db->where('(sender_id = "'.$user_id.'" OR receiver_id = "'.$user_id.'")');
  $this->db->order_by('chat_request_id', 'DESC');
  return $this->db->get('chat_request');
 }

 function Insert_chat_message($data)
 {
  $this->db->insert('chat_messages', $data);
 }

 function Update_chat_message_status($user_id)
 {
  $data = array(
   'chat_messages_status'  => 'yes'
  );
  $this->db->where('receiver_id', $user_id);
  $this->db->where('chat_messages_status', 'no');
  $this->db->update('chat_messages', $data);
 }

 function Fetch_chat_data($sender_id, $receiver_id)
 {
  $this->db->where('(sender_id = "'.$sender_id.'" OR sender_id = "'.$receiver_id.'")');
  $this->db->where('(receiver_id = "'.$receiver_id.'" OR receiver_id = "'.$sender_id.'")');
  $this->db->order_by('chat_messages_id', 'ASC');
  return $this->db->get('chat_messages');
 }

 function Count_chat_notification($sender_id, $receiver_id)
 {
  $this->db->where('sender_id', $sender_id);
  $this->db->where('receiver_id', $receiver_id);
  $this->db->where('chat_messages_status', 'no');
  $query = $this->db->get('chat_messages');
  return $query->num_rows();
 }

 function Update_login_data()
 {
  $data = array(
   'last_activity'  => date('Y-m-d H:i:s'),
   'is_type'   => $this->input->post('is_type'),
   'receiver_user_id' => $this->input->post('receiver_id')
  );
  $this->db->where('login_data_id', $this->session->userdata('login_id'));
  $this->db->update('login_data', $data);
 }

 function User_last_activity($user_id)
 {
  $this->db->where('user_id', $user_id);
  $this->db->order_by('login_data_id', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get('login_data');
  foreach($query->result() as $row)
  {
   return $row->last_activity;
  }
 }

 function Check_type_notification($sender_id, $receiver_id, $current_timestamp)
 {
  $this->db->where('receiver_user_id', $receiver_id);
  $this->db->where('user_id', $sender_id);
  $this->db->where('last_activity >', $current_timestamp);
  $this->db->order_by('login_data_id', 'DESC');
  $this->db->limit(1);
  $query = $this->db->get('login_data');
  foreach($query->result() as $row)
  {
   return $row->is_type;
  }
 }
}
?>