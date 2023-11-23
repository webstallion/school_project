<?php
class Expanses extends MY_Controller{
	public function __construct(){
 		 parent::__construct();
 		 $this->load->model('expanses_model');
 	}
	public function index(){
		$data['expanse_list']=$this->expanses_model->expanselist();
		$this->load->view('Admin/expanses',$data);
	}
	public function add(){
		if($_POST){
			$this->form_validation->set_rules('amount', 'Amount Name','trim|required|numeric');
	       	 $this->form_validation->set_rules('payment', 'Payment','trim|required');
	         $this->form_validation->set_rules('employee_id', 'Employee Name','trim|required');
	         //$this->form_validation->set_rules('employee_id', 'Employee Name','trim|required');
	        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>"); 
			if($this->form_validation->run()){
				$user_type=$this->session->userdata('usertype');       
	            $create_date = date('Y-m-d H:i:s');         
	            $flag='1';
	            $data=array(
	            			'amount' => $this->input->post('amount'),
	            			'payment_mode'=>$this->input->post('payment'),
	            			'employee_id'=>$this->input->post('employee_id'),
	            			'notes'=> $this->input->post('note'),
	            			'create_date'=>$create_date,
	            			'created_by'=> $user_type,
	            			'flag'=> $flag 
	            		   );
	            $this->expanses_model->addexpanses($data);
	            $this->session->set_flashdata('msg','Expanses Added Successfully');
	  			$this->session->set_flashdata('msg_class','alert-success');
	  			return redirect('Expanses');
			} 
			else{
				$data['employee_id']=$this->expanses_model->showemployeeID();
				$this->load->view('Admin/add_expanses',$data);
			}

		}
		else{
			$data['employee_id']=$this->expanses_model->showemployeeID();
			$this->load->view('Admin/add_expanses',$data);
		}
	}
	public function edit(){
		$id=$this->uri->segment(3);
		$data['employee_id']=$this->expanses_model->showemployeeID();
		//$this->load->view('Admin/add_expanses',$data);

		if((int)$id){
			if($_POST){
					$this->form_validation->set_rules('amount', 'Amount Name','trim|required|numeric');
		       	 	$this->form_validation->set_rules('payment', 'Payment','trim|required');
		         	$this->form_validation->set_rules('employee_id', 'Employee Name','trim|required');
		         	//$this->form_validation->set_rules('employee_id', 'Employee Name','trim|required');
		        	$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
		        	if($this->form_validation->run()){
			            $data=array(
			            			'amount' => $this->input->post('amount'),
			            			'payment_mode'=>$this->input->post('payment'),
			            			'employee_id'=>$this->input->post('employee_id'),
			            			'notes'=> $this->input->post('note'),
			            		   );
			            $this->expanses_model->updateExpanse($id,$data);
			            $this->session->set_flashdata('msg','Expanse Update Successfully');
	              		$this->session->set_flashdata('msg_class','alert-success');  
	              		return redirect('Expanses');
					} 
				else{
						$data['find_expanse_list']=$this->expanses_model->find_expanses($id);
						$this->load->view('Admin/edit_expanses',$data);
				}
			}
			else{
				$data['find_expanse_list']=$this->expanses_model->find_expanses($id);
				$this->load->view('Admin/edit_expanses',$data);
			}
		}
		else{
			$this->load->view('Admin/error');
		}
	}
}