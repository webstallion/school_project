<?php 
class Branch_model extends CI_Model{
	public function adddata($data){
		$this->db->insert('branch',$data);
    	return true;
	}
	public function branchList(){
		$usertype=$this->session->userdata('usertype');
		$show_data=$this->db->select()
						->from('branch')
						->where(['created_by'=>$usertype])
						->get();
		return $show_data->result();
	}
	public function deleteData($id){
		return $this->db->delete('branch',['branch_id'=>$id]);
	}
}
?>