<?php

class Course_model extends CI_Model {


  public function store() {
    $data = array(
      'name' => $this->input->post('name'),
      'added_date'=>date('Y-m-d H:i:s')
    );
    return $this->db->insert('tbl_course', $data);
  }

  public function update($course_id) {
    $data = array(
      'name' => $this->input->post('name'),
      'updated_date'=>date('Y-m-d H:i:s')
    );
   
    foreach($this->input->post('school_id') as $key => $value) {
      $query = $this->db->get_where('tbl_school_mapping', array('isDeleted' => '0','type' => '2','school_id'=>$value));
      $count=$query->num_rows();
      if(empty($count))
      {
        $this->db->insert('tbl_school_mapping',['school_id'=>$value,'course_id'=>$course_id,'type'=>2,'added_date'=>date('Y-m-d H:i:s')]);
      }
     
    }
    
    $this->db->where('id',$course_id);
    return $this->db->update('tbl_course',$data);
  }

  public function view_course() {
    $result=false;
   
    $this->db->select('c.*,GROUP_CONCAT(s.name SEPARATOR",") as school');
    $this->db->from('tbl_course c');
    $this->db->join('tbl_school_mapping m', 'm.course_id = c.id AND m.type=2','LEFT');
    $this->db->join('tbl_school s', 's.id = m.school_id','LEFT');
    $this->db->where(array('c.isDeleted'=>0));
    $this->db->group_by('c.id');
    $query = $this->db->get();
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_course_view($course_id) {
    $result=false;
   $this->db->select('c.*,GROUP_CONCAT(s.name SEPARATOR",") as school');
    $this->db->from('tbl_course c');
    $this->db->join('tbl_school_mapping m', 'm.course_id = c.id AND m.type=2','LEFT');
    $this->db->join('tbl_school s', 's.id = m.school_id','LEFT');
    $this->db->where(array('c.isDeleted'=>0,'c.id'=>$course_id));
    $this->db->group_by('c.id');
    $query = $this->db->get();
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_courseby_id($course_id) {
    $result=false;
    $query = $this->db->get_where('tbl_course', array('isDeleted' => '0','id'=>$course_id));
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_mapping_id($course_id) {
    $result=false;
    $query = $this->db->get_where('tbl_school_mapping', array('isDeleted' => '0','type' => '2','course_id'=>$course_id));
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function delete($course_id) {
    $data = array(
      'isDeleted' =>1,
    );
    $this->db->where('id',$course_id);
    return $this->db->update('tbl_course',$data);
  }
}