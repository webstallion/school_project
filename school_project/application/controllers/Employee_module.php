<?php class Employee_module extends MY_Controller{
	public function __construct(){
 		 parent::__construct();
 		 $this->load->model('employee_model');
 	}
	public function index(){
		$data['employee_list']=$this->employee_model->employeelist();
		$this->load->view('Admin/employee',$data);
	}
	public function add(){
		if($_POST){
			$this->form_validation->set_rules('employee', 'Employee Name','trim|required|alpha');
    		$this->form_validation->set_rules('dgsn', 'Post Name','trim|required');
    		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>"); 
    		if($this->form_validation->run()){
    			$create_date = date('Y-m-d H:i:s');         
        		$flag='1';
        		$created_by=$this->session->userdata('usertype');
    			$data=array(
    						'name' =>$this->input->post('employee'),
    						'post'=>$this->input->post('dgsn'),
    						'create_date'=>$create_date,
    						'created_by'=>$created_by,
    						'flag'=>$flag
    					   );
    			$this->employee_model->addEmployee($data);
    			$this->session->set_flashdata('msg','Employee Added Successfully');
          		$this->session->set_flashdata('msg_class','alert-success'); 
          		return redirect('Employee_module');
    		}
    		else{
    			$this->load->view('Admin/add_employee');
    		}
		}
		else{
			$this->load->view('Admin/add_employee');
		}
	}
	public function edit(){
		$id=$this->uri->segment(3);
		if((int)$id){
			if($_POST){
				$this->form_validation->set_rules('employee', 'Employee Name','trim|required|alpha');
	    		$this->form_validation->set_rules('dgsn', 'Post Name','trim|required');
	    		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>"); 
	    		if($this->form_validation->run()){
	    			$create_date = date('Y-m-d H:i:s');         
	        		$flag='1';
	        		$created_by=$this->session->userdata('usertype');
	    			$data=array(
	    						'name' =>$this->input->post('employee'),
	    						'post'=>$this->input->post('dgsn')
	    					   );
	    			$this->employee_model->updateEmployee($id,$data);
	    			$this->session->set_flashdata('msg','Employee Updated Successfully');
	          		$this->session->set_flashdata('msg_class','alert-success'); 
	          		return redirect('Employee_module');
	    		}
	    		else{
	    			$data['find_employees']=$this->employee_model->find_employee($id);
					$this->load->view('Admin/edit_employee',$data);
	    		}

			}
			else{
				$data['find_employees']=$this->employee_model->find_employee($id);
				$this->load->view('Admin/edit_employee',$data);
			}


		}
		else{
			$this->load->view('Admin/error');
		}

	}
	public function delete(){
		$id=$this->uri->segment(3);
		$this->employee_model->deleteEmployee($id);
		$this->session->set_flashdata('msg','Employee Deleted Successfully');
     	$this->session->set_flashdata('msg_class','alert-success');  
     	return redirect('Employee_module');
	}
}
?>