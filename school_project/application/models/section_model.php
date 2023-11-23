<?php class Section_model extends CI_Model{
	public function showClassId(){
	$query=$this->db->select()
					->from('class')
					->get();
  		return $query->result();
	}

	public function addsection($data){
		$this->db->insert('section',$data);
    	return true;

	}
	public function unsc_name($array){
		$query=$this->db->select()
				->from('section')
				->where($array)
		 		->get();
	return $query->result();
	}
	public function sectionlist(){
						$this->db->select('class.class_name,section.*');
						$this->db->from('section');
						$this->db->join('class','class.id=section.class_id');
						$show_data=	$this->db->get();
		return $show_data->result();
	}
	public function update($id,Array $data){
     return $this->db->where('id',$id)
             ->update('section',$data);
    }
    public function del_section($id){
    return $this->db->delete('section',['id'=>$id]);
    }

	public function find_section($id){
		$data=$this->db->select()
            ->where('id',$id)
              ->get('section');
            return $data->row();
	}
	public function getsectionlist($array){
		$data=$this->db->select()
			->where($array)
			->get('section');
			return $data->result();

	}
}
