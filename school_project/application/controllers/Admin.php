<?php
class Admin extends MY_Controller{
	public function __construct(){
 			 parent::__construct();
 		 	$this->load->model('admin_model');
 		}
	public function index(){
		$data['user_list']=$this->admin_model->usertypeList();
		$this->load->view('Admin/admin_page',$data);

	}
	public function add(){
		if($_POST){ 
			 $user_name=$this->input->post('user_name');
		  	 $password=$this->input->post('password');
		  	 $user_type=$this->input->post('user_type');
		  	 $school_code=$this->input->post('school_code');
		  	 $post=$this->input->post('post');
		  	 $created_by=$this->session->userdata('usertype');
		  	 $create_date = date('Y-m-d H:i:s');
		  	 $flag='1';

	 		$this->form_validation->set_rules('user_name', 'User Name','trim|required');
	  		$this->form_validation->set_rules('password', 'Password','trim|required');
	  		$this->form_validation->set_rules('user_type', 'User Type','trim|required');
	  		$this->form_validation->set_rules('school_code', 'School Code','trim|required');
	  		$this->form_validation->set_rules('post', 'Post','trim|required');
	  		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
	  		if($this->form_validation->run()){
	  			$data=array(
	  						'username' =>$user_name,
	  						'password' =>$password,
	  						'type' =>$user_type,
	  						'scode' =>$school_code,
	  						'post' =>$post,
	  						'created_by' =>$created_by,
	  						'create_date' =>$create_date,
	  						'flag' =>$flag
	  					   );
	  			$this->admin_model->add_admin($data);
	  			$this->session->set_flashdata('msg','Successfully Done!!');
	  			$this->session->set_flashdata('msg_class','alert-success');
	  			return redirect('Admin');
	  		}
	  		else{
	  			$this->load->view('Admin/add_admin_page');
	  		}

		}
		else{
			$this->load->view('Admin/add_admin_page');
		}

	}
	public function edit(){
		$id=$this->uri->segment(3);
		if($id){
			if($_POST){
				$this->form_validation->set_rules('user_name', 'User Name','trim|required');
		  		$this->form_validation->set_rules('password', 'Password','trim|required');
		  		$this->form_validation->set_rules('user_type', 'User Type','trim|required');
		  		$this->form_validation->set_rules('school_code', 'School Code','trim|required');
		  		$this->form_validation->set_rules('post', 'Post','trim|required');
		  		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
		  		if($this->form_validation->run()){
		  			$update_array = array(
		  								  'username' => $this->input->post('user_name'), 
		  								  'password' => $this->input->post('password'),
		  								  'type'=> $this->input->post('user_type'),
		  	 							  'scode'=> $this->input->post('school_code'),
		  	 							  'post'=> $this->input->post('post')
		  								 );
		  			$this->admin_model->update_admin_user($id,$update_array);
		  			$this->session->set_flashdata('msg','User Update Successfully');
              		$this->session->set_flashdata('msg_class','alert-success'); 
              		return redirect('Admin');
		  		}
		  		else{
			  		$data['usertype_list']=$this->admin_model->find_admin_user($id);
					$this->load->view('Admin/edit_admin_page',$data);	
				}
			}
			else{
				$data['usertype_list']=$this->admin_model->find_admin_user($id);
				$this->load->view('Admin/edit_admin_page',$data);
			}

		}
		else{
			$this->load->view('Admin/error');
		}
	}
}
?>