<?php 
class Admin_model extends CI_Model{
	public function add_admin($data){
		$this->db->insert('login_table',$data);
		return true;
	}
	public function usertypeList(){
		$usertype=$this->session->userdata('usertype');
			$query=$this->db->select()
					->from('login_table')
					->where(['created_by'=>$usertype])
					->get();
  		return $query->result();
  }
  public function find_admin_user($id){
  	$data=$this->db->select()
            ->where('id',$id)
              ->get('login_table');
              return $data->row();
  }
  public function update_admin_user($id,Array $data){
  	 return $this->db->where('id',$id)
             ->update('login_table',$data);
  }
}
?>