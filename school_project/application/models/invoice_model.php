<?php 
class Invoice_model extends CI_Model{
	public function studentInvoice($detail,$selsct_field){
		$this->db->select('*');
	 	$this->db->from('class');
	 		$this->db->join('student','class.id=student.class_id');
	 		if ($selsct_field['0'] == 'name') {
	 			$this->db->where("student.student_name like '%$detail%'");
	 		}
	 		if ($selsct_field['0'] == 'roll') {
	 			$this->db->where("student.rollno like '%$detail%'");
	 		}
	 		if ($selsct_field['0'] == 'fname') {
	 			$this->db->where("student.parents_name like '%$detail%'");
	 		}
	 		if ($selsct_field['0'] == 'admsnno') {
	 			$this->db->where("student.admission_no like '%$detail%'");
	 		}
	 		if ($selsct_field['0'] == 'class') {
	 			$this->db->where("class.class_name like '%$detail%'");
	 		}
	 		// $this->db->where("student.student_name like '%$detail%' OR 
	 		// 				  student.parents_name like '%$detail%' OR 
	 		// 				  student.rollno like '%$detail%' OR
	 		// 				  student.admission_no like '%$detail%' OR
	 		// 				  class.class_name like '%$detail%'");
	 		$query=$this->db->get();
	 		return $query->result();
	}
}