<?php
class Branch extends MY_Controller{ 
	public function __construct(){
 			 parent::__construct();
 		 	$this->load->model('branch_model');
 		}

	 public function index(){
	 	$data['branch_list']=$this->branch_model->branchList();
	 	$this->load->view('Admin/branch',$data);
	 }


	 public function add(){	
		if($_POST){
		    $this->form_validation->set_rules('branch_name', 'Branch Name','trim|required');
		    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");       
	      if($this->form_validation->run()){
	         $user_type=$this->session->userdata('usertype');
	         $branch_name=$this->input->post('branch_name');       
	         $create_date = date('Y-m-d H:i:s');         
	         $flag='1';         
	         $data=array
	                 (
	                   'branch_name' => $branch_name,                                          
	                   'create_date' =>$create_date,
	                   'created_by' =>$user_type, 
	                   'flag' =>$flag                 
	                 );        
	           $this->branch_model->adddata($data);
	           $this->session->set_flashdata('msg','Branch Added Successfully');
	           $this->session->set_flashdata('msg_class','alert-success');  
	           return redirect('Branch');
	      } 
	      else {
	       
	        $this->load->view('Admin/add_branch');
	      } 
	       
	    } 
    	else{
      		$this->load->view('Admin/add_branch');
    	}
		
	 }
	 public function delete(){
	     $id=$this->uri->segment(3);
	     $this->branch_model->deleteData($id);
	     $this->session->set_flashdata('msg','Branch Deleted Successfully');
	     $this->session->set_flashdata('msg_class','alert-success');  
	     return redirect('Branch');
  	 }
}