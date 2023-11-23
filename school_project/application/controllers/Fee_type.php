<?php
class Fee_type extends MY_Controller{
	public function index(){
		$this->load->model('fee_type_model');
		$fee_values=$this->fee_type_model->feetypelist();
		$newarray =[];
		foreach ($fee_values as $fee_value) {
			$month = $this->fee_type_model->feetypelist_month(array('ftype_id' => $fee_value->ftype_id));
			$moth =[];
			foreach ($month as  $mon) {
				$moth[] = $mon->month_value;
			}
			$moth = implode(' ,', $moth);
			$newarray[] = array('ftype_id' => $fee_value->ftype_id,
							 						'fee_name' => $fee_value->fee_name,
													 'class_id' => $fee_value->class_id,
													 'amount' => $fee_value->amount,
													 'create_date' => $fee_value->create_date,
													 'created_by' => $fee_value->created_by,
													 'flage' => $fee_value->flage,
													 'month' => $moth
												 );
		}
		$newarray=json_decode(json_encode($newarray));
		$data['fee_values'] = $newarray;
		$this->load->view('Admin/fee_type',$data);
	}
	public function uniq_std_fees(){
		$id=$this->uri->segment(3);
		$this->load->model('fee_type_model');
		if ((int)$id) {
			$count=$this->fee_type_model->un_fees($this->input->post('class_id'),$this->input->post('fee_name'));
			if(count($count)>1){
				$this->form_validation->set_message('uniq_std_fees','this field is already exist!');
				return false;
			} else {

				return true;
			}
		} else {
			$count=$this->fee_type_model->un_fees($this->input->post('class_id'),$this->input->post(
				'fee_name'));
			if(count($count)>0){
				$this->form_validation->set_message('uniq_std_fees','this field is already exist!');
				return false;
			} else {

				return true;
			}
		}
	}

	public function accept_terms(){
		if(isset($_POST['value'])){
			return true;
		}
		else{
			$this->form_validation->set_message('accept_terms', 'Please Select atleast one checkbox!');
	    		return false;
		}

	}

	public function add(){
		if($_POST){
			$this->form_validation->set_rules('fee_name', 'Fees Name',
											  'trim|required|alpha|callback_uniq_std_fees');
			$this->form_validation->set_rules('value','','callback_accept_terms');
		    $this->form_validation->set_rules('class_id', 'Class ID','trim|required');
		    $this->form_validation->set_rules('amount', 'Amount','trim|required|numeric');
		    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
		    if($this->form_validation->run()){
		    	$user_type=$this->session->userdata('usertype');
        	 	$fee_name=$this->input->post('fee_name');
        		$amount=$this->input->post('amount');
        		$class_id=$this->input->post('class_id');
        		$create_date = date('Y-m-d H:i:s');
        		$flag='1';
        		$months=$this->input->post('value');
	        	$data=array
	                (
	                  'fee_name' => $fee_name,
	                  'class_id' =>$class_id,
	                  'amount' =>$amount,
	                  'create_date' =>$create_date,
	                  'created_by' =>$user_type,
	                  'flage' =>$flag
	                );

		    			$this->load->model('fee_type_model');
          		$last_id=$this->fee_type_model->addfee_type($data);

   				$arrayfee_type_month = [];
   				foreach ($months as $month) {
   					$arrayfee_type_month[] = array
   												(
   													'month_value' =>$month,
   													'ftype_id' =>$last_id
   												);
   				}

   				$this->fee_type_model->addfee_month($arrayfee_type_month);
          		$this->session->set_flashdata('msg','Fees Added Successfully');
          		$this->session->set_flashdata('msg_class','alert-success');
          		return redirect('fee_type');
		    }
		    else{
		    	$this->load->model('fee_type_model');
				$data['classes']=$this->fee_type_model->showClassId();
				$this->load->view('Admin/add_fee_type',$data);
		    }
		}
		else{
				$this->load->model('fee_type_model');
				$data['classes']=$this->fee_type_model->showClassId();
				$this->load->view('Admin/add_fee_type',$data);
		}
	}
	public function edit(){
		$id=$this->uri->segment(3);
		$this->load->model('fee_type_model');
		$data['classes']=$this->fee_type_model->showClassId();
		if($id){
			if($_POST){
				$this->form_validation->set_rules('fee_name', 'Fees Name',
												  'trim|required|alpha|callback_uniq_std_fees');
				$this->form_validation->set_rules('value','','callback_accept_terms');
			    $this->form_validation->set_rules('class_id', 'Class ID','trim|required');
			    $this->form_validation->set_rules('amount', 'Amount','trim|required|numeric');
			    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
			    if($this->form_validation->run()){
			    $user_type=$this->session->userdata('usertype');
        	 	$fee_name=$this->input->post('fee_name');
        		$amount=$this->input->post('amount');
        		$class_id=$this->input->post('class_id');
        		$months=$this->input->post('value');
        			$data=array
	                (
	                  'fee_name' => $fee_name,
	                  'class_id' =>$class_id,
	                  'amount' =>$amount
	                );
	                $this->load->model('fee_type_model');
	               	$this->fee_type_model->updatefee_type($id,$data);
	                $this->fee_type_model->deletefee_type($id);


   						$arrayfee_type_month = [];
   						foreach ($months as $month) {
   						$arrayfee_type_month[] = array
   												(
   													'month_value' =>$month,
   													'ftype_id' =>$id
   												);
   						}

   					$this->fee_type_model->addfee_month($arrayfee_type_month);
	           		$this->session->set_flashdata('msg','fee_type Updated Successfully');
	  				$this->session->set_flashdata('msg_class','alert-success');
	                return redirect('Fee_type');


				}
				else{
					$this->load->model('fee_type_model');
					$data['fee_type']=$this->fee_type_model->find_fee_type($id);
					$data['months'] = $this->fee_type_model->find_fee_type_month(array('ftype_id' => $id));
					$this->load->view('Admin/edit_fee_type',$data);

				}
			}
			else{
				$this->load->model('fee_type_model');
				$data['fee_type']=$this->fee_type_model->find_fee_type($id);
				$data['months'] = $this->fee_type_model->find_fee_type_month(array('ftype_id' => $id));

				$this->load->view('Admin/edit_fee_type',$data);
			}

		}
		else{
			$this->load->view('Admin/error');
		}
	}
}
