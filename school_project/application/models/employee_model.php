<?php class Employee_model extends CI_Model{
	public function addEmployee($data){
		$this->db->insert('employee_module',$data);
		return true;
	}
	public function employeelist(){
		$usertype=$this->session->userdata('usertype');
		$show_data=$this->db->select()
						->from('employee_module')
						->where(['created_by'=>$usertype])
						->get();
		return $show_data->result();
	}
	public function find_employee($id){
		$data=$this->db->select()
            ->where('employee_id',$id)
              ->get('employee_module');
            return $data->row();
              

	}
	public function updateEmployee($id,Array $data){
		return $this->db->where('employee_id',$id)
             ->update('employee_module',$data);
	}
	public function deleteEmployee($id){
		return $this->db->delete('employee_module',['employee_id'=>$id]);

	}
}