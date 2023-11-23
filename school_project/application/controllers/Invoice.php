<?php
class Invoice extends MY_Controller{

		public function __construct(){
 			 parent::__construct();
 		 	$this->load->model('invoice_model');
 		 	$this->load->model('fee_type_model');
 		 	$this->load->model('class_model');
 		}
 		public function accept_terms() {
    		if (isset($_POST['selsct_field'])) {
    			return true;
    		}
    		else{	
	    		$this->form_validation->set_message('accept_terms', 'Please Select atleast one checkbox !');
	    		return false;
    		}
		}
		public function index(){
			if($_POST){
				$detail=$this->input->post('detail');
				$selsct_field = $this->input->post('selsct_field');
				$this->form_validation->set_rules('detail', 'Student Details','trim|required');
				$this->form_validation->set_rules('selsct_field', 'Select Field','callback_accept_terms');
				$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
				if($this->form_validation->run()){

					$data['std_details']=$this->invoice_model->studentInvoice($detail,$selsct_field);
					$this->load->view('Admin/invoice',$data);
				}
				else{
					$data['std_details']=[];
					$this->load->view('Admin/invoice',$data);
				}
			}
			else{
				//$detail=$this->input->post('detail');
				$data['std_details']=[];
				$this->load->view('Admin/invoice',$data);
			}

		}
		public function add(){
			$data['class_List']=$this->class_model->classlist();
			if($_POST){

			}
			else{
				$this->load->view('Admin/add_invoice',$data);
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

		public function getstudentlist(){
			$section_id=$this->input->post('section_id');
			$this->load->model('student_model');
			$studentdata=$this->student_model->getstudentlist(array('section_id' => $section_id));


			echo $output='<option value="">Select Student</option>';
			foreach ($studentdata as $row) {
				echo $output='<option value="'.$row->id.'">'.$row->student_name.'</option>';
			}
		}

		public function getfeetypelist(){
			$class_id=$this->input->post('class_id');
			$feetypedata=$this->fee_type_model->getfeetypelist(array('class_id' => $class_id));

			echo $output='<option value="">Select Fees</option>';
			foreach ($feetypedata as $row) {
				echo $output='<option value="'.$row->ftype_id.'">'.$row->fee_name.'</option>';
			}

		}
		public function getamount(){
			$ftype_id=$this->input->post('ftype_id');
			$feetypedata=$this->fee_type_model->getfeetypelist(array('ftype_id' => $ftype_id));
			foreach ($feetypedata as $row){
				$amount=$row->amount;
			}
			echo $amount;

		}
}
?>
