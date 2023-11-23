<?php
class Acedmic_year extends MY_Controller{ 
	public function __construct(){
 			 parent::__construct();
 		 	$this->load->model('acedmic_model');
 		}

	public function index(){
		$data['acedmic_year_list']=$this->acedmic_model->acedmic_year_list();
		$this->load->view('Admin/acedmic_year',$data);
	}
	public function uniq_acdmc_name(){
		$id=$this->uri->segment(3);
		if ((int)$id) {
			$count=$this->acedmic_model->un_acdmc_name(array('name' =>$this->input->post('acdmc_name')));
			if(count($count)>1){
				$this->form_validation->set_message('uniq_acdmc_name','this field is already Exist!');
				return false;

			}
			else{
				return true;
			}
		}	
		else {
			$count=$this->acedmic_model->un_acdmc_name(array('name' =>$this->input->post('acdmc_name')));
			if(count($count)>0){
				$this->form_validation->set_message('uniq_acdmc_name','this field is already Exist!');
				return false;
			}
			else{
				return true;
			}
		}			

	}

	public function add(){	
		if($_POST) {
		    $this->form_validation->set_rules('acdmc_name', 'Acedmic Name',
		    								  'trim|required|callback_uniq_acdmc_name');
		    $this->form_validation->set_rules('date_from', 'Date From','trim|required');
		    $this->form_validation->set_rules('date_to', 'Date To','trim|required');
		    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");       
	      if($this->form_validation->run()){
	         $user_type=$this->session->userdata('usertype');
	         $acdmc_name=$this->input->post('acdmc_name');
	         $date_from=$this->input->post('date_from');
	         $date_to =$this->input->post('date_to');        
	         $create_date = date('Y-m-d H:i:s');         
	         $flag='1';         
	         $data=array
	                 (
	                   'name' => $acdmc_name,                     
	                   'date_from' =>$date_from,
	                   'date_to' =>$date_to,                     
	                   'create_date' =>$create_date,
	                   'created_by' =>$user_type, 
	                   'flag' =>$flag                 
	                 );        
	           $this->acedmic_model->adddata($data);
	           $this->session->set_flashdata('msg','Acedmic Year Added Successfully');
	           $this->session->set_flashdata('msg_class','alert-success');  
	           return redirect('Acedmic_year');
	      } 
	      else {
	       
	        $this->load->view('Admin/add_acedmic_year');
	      } 
	       
	    } 
    	else{
      		$this->load->view('Admin/add_acedmic_year');
    	}
		
	}
	public function edit(){
		$id=$this->uri->segment(3);
		if((int)$id){
			if($_POST){
				$this->form_validation->set_rules('acdmc_name', 'Acedmic Name',
												  'trim|required|callback_uniq_acdmc_name');
			    $this->form_validation->set_rules('date_from', 'Date From','trim|required');
			    $this->form_validation->set_rules('date_to', 'Date To','trim|required');
			    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>"); 

			    	if($this->form_validation->run()){
			         $user_type=$this->session->userdata('usertype');
			         $acdmc_name=$this->input->post('acdmc_name');
			         $date_from=$this->input->post('date_from');
			         $date_to =$this->input->post('date_to');        
			         $create_date = date('Y-m-d H:i:s');         
			         $flag='1';         
			         $data=array
			                 (
			                   'name' => $acdmc_name,                     
			                   'date_from' =>$date_from,
			                   'date_to' =>$date_to                                     
			                 );        
			           $this->acedmic_model->updatedata($id,$data);
			           $this->session->set_flashdata('msg','Acedmic Year Updated Successfully');
			           $this->session->set_flashdata('msg_class','alert-success');  
			           return redirect('Acedmic_year');
		      		} 
		      		else {
		       
		        		$data['acedmic_value']=$this->acedmic_model->find_acedmic_year($id);
						$this->load->view('Admin/edit_acedmic_year',$data);
		      		}
			}
			else{
				$data['acedmic_value']=$this->acedmic_model->find_acedmic_year($id);
				$this->load->view('Admin/edit_acedmic_year',$data);
			}

		}
		else{
			$this->load->view('Admin/error');
		}
	}
	 public function delete(){
     $id=$this->uri->segment(3);
     $this->acedmic_model->deleteData($id);
     $this->session->set_flashdata('msg','Acedmic Year Deleted Successfully');
     $this->session->set_flashdata('msg_class','alert-success');  
     return redirect('Acedmic_year');
  }
}