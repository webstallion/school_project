<?php 
class Expanses_model extends CI_Model {
	public function showemployeeID(){
	$usertype=$this->session->userdata('usertype');
	$query=$this->db->select()
					->from('employee_module')
					->where(['created_by'=>$usertype])
					->get();
  		return $query->result();
	}
	public function addexpanses($data){
		$this->db->insert('expanses',$data);
    	return true;
	}
	public function expanselist(){
		$usertype=$this->session->userdata('usertype');
		$show_data=$this->db->select()
						->from('expanses')
						->where(['created_by'=>$usertype])
						->get();
		return $show_data->result();
	}
	public function find_expanses($id){
		$data=$this->db->select()
            ->where('ex_id',$id)
              ->get('expanses');
            return $data->row();

	}
	public function updateExpanse($id,Array $data){
		return $this->db->where('ex_id',$id)
             ->update('expanses',$data);
	}

}
	