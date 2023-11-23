<?php
class Class_model extends CI_Model{
  public function adddata($data){
    $this->db->insert('class',$data);
    return true;
  }
  public function update($id,Array $data){
     return $this->db->where('id',$id)
             ->update('class',$data);
  }
  public function uncl_name($classname){
    $query=$this->db->select()
        ->from('class')
        ->where($classname)
        ->get();
  return $query->result();
  }
  public function uncl_no($classno){
    $query=$this->db->select()
        ->from('class')
        ->where($classno)
        ->get();
  return $query->result();

  }

  public function classlist(){
	$usertype=$this->session->userdata('usertype');
		$query=$this->db->select()
					->from('class')
					->get();
  		return $query->result();
  }
  public function find_class($value){
     $data=$this->db->select()
            ->where('id',$value)
              ->get('class');
              return $data->row();
  }
  public function del_class($id){
    return $this->db->delete('class',['id'=>$id]);
  }

 }
