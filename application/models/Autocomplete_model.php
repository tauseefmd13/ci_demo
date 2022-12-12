<?php
class Autocomplete_model extends CI_Model
{
  function fetch_data($search_query)
  {
    $output = array();
    $this->db->like('student_name', $search_query);
    $query = $this->db->get('tbl_student');
    if($query->num_rows() > 0)
    {
      foreach($query->result_array() as $row)
      {
        $output[] = array(
          'name'  => $row["student_name"],
          'image'  => $row["image"]
        );
      }
      echo json_encode($output);
    }
  }
}

?>