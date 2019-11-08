<?php

class School_model extends CI_Model {


  public function store() {
    $data = array(
      'name' => $this->input->post('name'),
      'added_date'=>date('Y-m-d H:i:s')
    );
    return $this->db->insert('tbl_school', $data);
  }

  public function update($school_id) {
    $data = array(
      'name' => $this->input->post('name'),
      'updated_date'=>date('Y-m-d H:i:s')
    );
    foreach($this->input->post('course_id') as $key => $value) {
      $query = $this->db->get_where('tbl_school_mapping', array('isDeleted' => '0','type' => '1','course_id'=>$value));
      $count=$query->num_rows();
      if(empty($count))
      {
        $this->db->insert('tbl_school_mapping',['course_id'=>$value,'school_id'=>$school_id,'type'=>1,'added_date'=>date('Y-m-d H:i:s')]);
      }
     
    }
    $this->db->where('id',$school_id);
    return $this->db->update('tbl_school',$data);
  }
 
  public function view_school() {
    $result=false;
    $query = $this->db->get_where('tbl_school',array('isDeleted'=>0));
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_all($limit, $start)
  {
      return $this->get( $limit, $start);
  }
  public function count_data()
  {

    $total=$this->count();
    return count($total);
  }

public function get( $limit = NULL, $start = NULL)
{
    $result=false;
    if($this->input->post('name'))
    {
      $this->db->like('s.name',$this->input->post('name'), 'after');   
    }
   
  $this->db->select('s.*,GROUP_CONCAT(c.name SEPARATOR",") as course');
  $this->db->from('tbl_school s');
  $this->db->join('tbl_school_mapping m', 'm.school_id = s.id AND m.type=1','LEFT');
  $this->db->join('tbl_course c', 'c.id = m.course_id','LEFT');
  $this->db->limit($limit, $start);
  $this->db->where('s.isDeleted',0);
  $this->db->group_by('s.id');

  $query = $this->db->get();
  
    if ($query->num_rows() > 0 ) {

        $result=$query->result();
    }
     return $result;
 
}

public function count()
{
  $result=false;
  if(!empty($this->input->post('name')))
  {
    $array=array('isDeleted' => '0','name like '=>$this->input->post('name').'%');
  }
  else
  {
    $array=array('isDeleted' => '0');
  }
  $query = $this->db->get_where('tbl_school',$array);
  $count=$query->num_rows();
  if($count>0)
  {
    $result=$query->result();
  }
  return $result;
}


  public function view_school_view($school_id) {

  $result=false;

  $this->db->select('s.*,GROUP_CONCAT(c.name SEPARATOR",") as course');
  $this->db->from('tbl_school s');
  $this->db->join('tbl_school_mapping m', 'm.school_id = s.id AND m.type=1','LEFT');
  $this->db->join('tbl_course c', 'c.id = m.course_id','LEFT');
  $this->db->where(array('s.isDeleted'=>0,'s.id'=>$school_id));
  $this->db->group_by('s.id');

  $query = $this->db->get();
   
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_mapping_id($school_id) {
    $result=false;
    $query = $this->db->get_where('tbl_school_mapping', array('isDeleted' => '0','type' => '1','school_id'=>$school_id));
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function view_schoolby_id($school_id) {
    $result=false;
    $query = $this->db->get_where('tbl_school', array('isDeleted' => '0','id'=>$school_id));
    $count=$query->num_rows();
    if($count>0)
    {
      $result=$query->result();
    }
    return $result;
  }

  public function delete($school_id) {
    $data = array(
      'isDeleted' =>1,
    );
    $this->db->where('id',$school_id);
    return $this->db->update('tbl_school',$data);
  }
}