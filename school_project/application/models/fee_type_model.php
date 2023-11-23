<?php
class Fee_type_model extends CI_Model{
	public function feetypelist(){
		$usertype=$this->session->userdata('usertype');
		$this->db->select('*');
		$this->db->from('fee_type');
	 	$query = $this->db->get();
	 	return $query->result();

	}
	public function getfeetypelist($array){
		$data=$this->db->select()
			->where($array)
			->get('fee_type');
			return $data->result();
	}
	public function feetypeshow(){
		$usertype=$this->session->userdata('usertype');
		$this->db->select('*');
		$this->db->from('fee_type');
	 	$query = $this->db->get();
	 	return $query->result();

	}
	public function feetypelist_month($array){
		$usertype=$this->session->userdata('usertype');
		$this->db->select('*');
		$this->db->from('ftype_month');
		$this->db->where($array);
	 	$query = $this->db->get();
	 	return $query->result();

	}
	public function showClassId(){
		$query=$this->db->select()
	 				->from('class')
	 				->get();
	 		return $query->result();
	}

	public function addfee_type($data){
		 $this->db->insert('fee_type',$data);
		  $last_id = $this->db->insert_id();
   			 return $last_id;
	}
	public function updatefee_type($id,Array $data){
		 return $this->db->where('ftype_id',$id)
             ->update('fee_type',$data);

	}
	public function deletefee_type($id){
	 	return $this->db->delete('ftype_month',['ftype_id'=>$id]);
	}
	public function addfee_month($arrayfee_type_month){
		$this->db->insert_batch('ftype_month', $arrayfee_type_month);
		return true;
	}
	public function un_fees($ci,$std_fees){
	 	$query=$this->db->select()
	 		->from('fee_type')
	 		->where(['fee_name'=>$std_fees])
	 		->where(['class_id'=>$ci])
	 		->get();
	 		return $query->result();
	 }
	 public function find_fee_type($id){
	 	$this->db->select('*');
		$this->db->from('fee_type');
	 	$this->db->where('ftype_id',$id);
	 	$query = $this->db->get();
	 	return $query->row();
	 }
	  public function find_fee_type_month($array){
	 	$this->db->select('*');
		$this->db->from('ftype_month');
	 	$this->db->where($array);
	 	$query = $this->db->get();
	 	return $query->result();
	 }

}
