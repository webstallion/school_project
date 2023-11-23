<?php class Student extends MY_Controller{
	public function __construct(){
 			 parent::__construct();
 		 	$this->load->model('student_model');
			$this->load->model('section_model');
 		}

	public function index(){
	$studentlist=$this->student_model->studentlist();
 	$this->load->view('Admin/student',['st_list'=>$studentlist]);
	}

	public function uniq_roll(){
		$id=$this->uri->segment(3);
		if ((int)$id) {
			$count=$this->student_model->un_roll(array('class_id'=>$this->input->post('class_id'),'section_id'=>$this->input->post('section_id'),
																					 			 'rollno'=>$this->input->post('roll_no'),'id !=' =>$id));
			if(count($count)>0){
				$this->form_validation->set_message('uniq_roll','This field is already exist!');
				return false;
			} else {

				return true;
			}
		} else {
			$count=$this->student_model->un_roll(array('class_id'=>$this->input->post('class_id'),'section_id'=>$this->input->post('section_id'),
																					 				'rollno'=>$this->input->post('roll_no')));
			if(count($count)>0){
				$this->form_validation->set_message('uniq_roll','This field is already exist!');
				return false;
			} else {

				return true;
			}
		}
	}
	public function uniq_admsn_no(){
		$id=$this->uri->segment(3);
		if ((int)$id) {
			$count=$this->student_model->un_admsn(array('admission_no' =>$this->input->post('admission_no'),'id !=' =>$id));
			if(count($count)>0){
				$this->form_validation->set_message('uniq_admsn_no','same admission no');
				return false;

			}
			else{
				return true;
			}
		}
		else {
			$count=$this->student_model->un_admsn(array('admission_no' =>$this->input->post('admission_no')));
			if(count($count)>0){
				$this->form_validation->set_message('uniq_admsn_no','same admission no');
				return false;

			}
			else{
				return true;
			}
		}

	}
 	public function addNewStudent(){
 			$student_name=$this->input->post('student_name');
		  	$section_id=$this->input->post('section_id');
		  	$class_id=$this->input->post('class_id');
		  	$admission_no=$this->input->post('admission_no');
		  	$parents_name=$this->input->post('parents_name');
		  	$acdmc=$this->input->post('acdmc');
		  	$branch_id=$this->input->post('branch_id');
		  	$created_by=$this->session->userdata('usertype');
		  	$create_date = date('Y-m-d H:i:s');
		  	$roll_no=$this->input->post('roll_no');
		  	$flag='1';


 			$this->form_validation->set_rules('student_name', 'Student Name','trim|required');
  		$this->form_validation->set_rules('section_id', 'Section ID','trim|required');
  		$this->form_validation->set_rules('class_id', 'Class ID','trim|required');
  		$this->form_validation->set_rules('branch_id', 'Branch ID','trim|required');
  		$this->form_validation->set_rules('admission_no', 'Admission NO','trim|required|callback_uniq_admsn_no');
  		$this->form_validation->set_rules('parents_name', 'Parents Name','trim|required');
  		$this->form_validation->set_rules('roll_no', 'Roll No','trim|required|callback_uniq_roll');
  		$this->form_validation->set_rules('acdmc', 'Acedmic Year','trim|required');
  		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
  		if($this->form_validation->run()){
		  	$data = array(
		  					'student_name' =>$student_name,
		  					'section_id' =>$section_id,
		  					'class_id' =>$class_id,
		  					'admission_no' =>$admission_no,
		  					'parents_name' => $parents_name,
		  					'rollno' =>$roll_no,
		  					'acedmic_year_id' =>$acdmc,
		  					'branch_id'=>$branch_id,
		  					'create_date' =>$create_date,
		  					'created_by' =>$created_by,
		  					'flag' =>$flag
		  				 );
	  		if($this->student_model->addstudent($data)){
	  			$this->session->set_flashdata('msg','Student Added Successfully');
	  			$this->session->set_flashdata('msg_class','alert-success');
	  		}
	  		else{
	  			$this->session->set_flashdata('msg','Student not Added Please try again!!');
	  			$this->session->set_flashdata('msg_class','alert-danger');
	  		}
	  		return redirect('Student');
	  	}

	  	else{
 			//class
  			$data['classes']=$this->student_model->showClassId();
	  		//Acedmic Year
			$data['acedmicID']=$this->student_model->showAcedmicId();
	  		//Branch name
	  		$data['branchID']=$this->student_model->showBranchId();
	  		$this->load->view('Admin/add_student',$data);
	  	}


 	}
	public function getsectionlist(){
			$class_id=$this->input->post('class_id');
			$this->load->model('section_model');
			$sectiondata=$this->section_model->getsectionlist(array('class_id' => $class_id));
			echo $output='<option value="">Select Section</option>';
			foreach ($sectiondata as $row) {
				echo $output='<option value="'.$row->id.'">'.$row->section_name.'</option>';
			}
	}

 	public function edit(){
 		$id=$this->uri->segment(3);
  		//class
  		$data['class_id']=$this->student_model->showClassId();
  		//Acedmic Year
  		$data['acedmic_id']=$this->student_model->showAcedmicId();
	  	//Branch name
	  	$data['branch_id']=$this->student_model->showBranchId();

 		if((int)$id){
			 			if($_POST){
			 				$student_name=$this->input->post('student_name');
						  	$section_id=$this->input->post('section_id');
						  	$class_id=$this->input->post('class_id');
						  	$admission_no=$this->input->post('admission_no');
						  	$parents_name=$this->input->post('parents_name');
						  	$acdmc=$this->input->post('acdmc');
						  	$branch_id=$this->input->post('branch_id');
						  	$created_by=$this->session->userdata('usertype');
						  	$create_date = date('Y-m-d H:i:s');
						  	$roll_no=$this->input->post('roll_no');
						  	$flag='1';

			 				$this->form_validation->set_rules('student_name', 'Student Name','trim|required');
					  		$this->form_validation->set_rules('section_id', 'Section ID','trim|required');
					  		$this->form_validation->set_rules('class_id', 'Class ID','trim|required');
					  		$this->form_validation->set_rules('admission_no', 'Admission NO','trim|required|callback_uniq_admsn_no');
					  		$this->form_validation->set_rules('parents_name', 'Parents Name','trim|required');
					  		$this->form_validation->set_rules('roll_no', 'Roll No',
					  										  'trim|required|callback_uniq_roll');

					  		$this->form_validation->set_rules('acdmc', 'Acedmic Year','trim|required');
					  		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
					  		if($this->form_validation->run()){
						  		$data = array(
						  					'student_name' =>$student_name,
						  					'class_id' =>$class_id,
											'section_id' =>$section_id,
											'admission_no' =>$admission_no,
											'parents_name' =>$parents_name,
											'rollno' =>$roll_no,
											'acedmic_year_id' =>$acdmc,
											'branch_id' =>$branch_id
											);
						  		$this->student_model->update($id,$data);
						  		$this->session->set_flashdata('msg','Student Updated Successfully');
	  							$this->session->set_flashdata('msg_class','alert-success');
	  							return redirect('Student');
						  	}

							else{
		 						$data['std_list']=$this->student_model->find_student($id);
		 						$this->load->view('Admin/edit_student',$data);
							}
						}

					  	else{
 							$std_list = $data['std_list']=$this->student_model->find_student($id);
							$data['section_id']=$this->student_model->showSectionId(array('class_id' => $std_list->class_id));
 							$this->load->view('Admin/edit_student',$data);
					  	}
 		}
 		else{
 			$this->load->view('Admin/error');
 		}
 	}
 	public function delete(){
 		$id=$this->uri->segment(3);
 		$this->student_model->del_student($id);
 		$this->session->set_flashdata('msg','Student Deleted Successfully');
    	$this->session->set_flashdata('msg_class','alert-success');
    	return redirect('Student');
 	}
}
