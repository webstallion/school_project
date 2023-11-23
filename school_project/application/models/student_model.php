<?php class Student_model extends CI_Model{
	public function showSectionId($array){
		$query=$this->db->select()
	 				->from('section')
					->where($array)
	 				->get();
  		return $query->result();
	}
	public function showClassId(){
		$query=$this->db->select()
	 				->from('class')
	 				->get();
	 		return $query->result();
	}
	public function showAcedmicId(){
		$query=$this->db->select()
	 				->from('acedmic_year')
	 				->get();
  		return $query->result();
	}
	public function showBranchId(){
		$query=$this->db->select()
	 				->from('branch')
	 				->get();
  		return $query->result();
	}

	public function update($id,Array $data){
     return $this->db->where('id',$id)
             ->update('student',$data);
    }

	 public function addstudent($data){
	 	$this->db->insert('student',$data);
    	return true;

	 }
	 public function un_roll($array){
	 	$query=$this->db->select()
	 		->from('student')
	 		->where($array)
	 		->get();
	 		return $query->result();
	 }
	 public function un_admsn($admsn_no){
	 	$query=$this->db->select()
	 				->from('student')
	 				->where($admsn_no)
	 				->get();
	 	return $query->result();
	 }
	 public function studentlist(){
		$this->db->select('class.class_name,section.section_name,student.*');
		$this->db->from('student');
		$this->db->join('class','class.id=student.class_id','left');
		$this->db->join('section','section.id=student.section_id','left');
		$show_data=	$this->db->get();
		return $show_data->result();
	 }
	 public function find_student($id){
		$data=$this->db->select()
            ->where('id',$id)
              ->get('student');
            return $data->row();
	 }
	 public function del_student($id){
	 	return $this->db->delete('student',['id'=>$id]);
	 }

	public function getstudentlist($array){
		$data=$this->db->select()
			->where($array)
			->get('student');
			return $data->result();

	}

}
