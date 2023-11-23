<?php 
class Acedmic_model extends CI_Model{
	public function un_acdmc_name($acedmic_name){
	 	$query=$this->db->select()
	 				->from('acedmic_year')
	 				->where($acedmic_name)
	 				->get();
	 	return $query->result();			
	 }

	public function adddata($data){
		$this->db->insert('acedmic_year',$data);
    	return true;
	}
	public function acedmic_year_list(){
		$usertype=$this->session->userdata('usertype');
		$show_data=$this->db->select()
						->from('acedmic_year')
						->where(['created_by'=>$usertype])
						->get();
		return $show_data->result();
	}
	public function find_acedmic_year($id){
		$data=$this->db->select()
            ->where('acdmc_id',$id)
              ->get('acedmic_year');
            return $data->row();
	}
	public function updatedata($id,Array $data){
		return $this->db->where('acdmc_id',$id)
             ->update('acedmic_year',$data);
	}
	public function deleteData($id){
		return $this->db->delete('acedmic_year',['acdmc_id'=>$id]);
	}
}
?>