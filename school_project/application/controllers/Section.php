<?php
class Section extends MY_Controller{
  public function __construct(){
     parent::__construct();
     $this->load->model('section_model');
  }
  public function index(){
		$sectionlist=$this->section_model->sectionlist();
		$this->load->view('Admin/section',['sectionlist'=>$sectionlist]);
  }
  public function unsc_name(){
    $id=$this->uri->segment(3);
    if((int)$id) {
      $count=$this->section_model->unsc_name(array('class_id'=>$this->input->post('class_id'),
                                                   'section_name'=>$this->input->post('section_name'),'id !=' =>$id));
      if(count($count)>0){
        $this->form_validation->set_message('unsc_name','This field is already exist!');
        return false;
      }
      else{
        return true;
      }

    }
    else{
      $count=$this->section_model->unsc_name(array('class_id'=>$this->input->post('section_id'),'section_name'=>$this->input->post('section_name')));
      if(count($count)>0){
        $this->form_validation->set_message('unsc_name','This field is already exist!');
        return false;
      }
      else{
        return true;
      }

    }

  }

  public function addNewSection(){
  	$this->form_validation->set_rules('section_name', 'Section Name','trim|required|callback_unsc_name');
  	$this->form_validation->set_rules('section_id', 'Section ID','trim|required');
  	$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
  	if($this->form_validation->run()){
  		$section_name=$this->input->post('section_name');
	  	$section_id=$this->input->post('section_id');
	  	$created_by=$this->session->userdata('usertype');
	  	$create_date = date('Y-m-d H:i:s');
	  	$flag='1';
	  	$data = array(
	  					'section_name' =>$section_name ,
	  					'class_id'=>$section_id,
	  					'create_date'=>$create_date,
	  					'created_by'=>$created_by,
	  					'flag'=>$flag
	  				  );
	  	if($this->section_model->addsection($data)){
	  		$this->session->set_flashdata('msg','Section Added Successfully');
	  		$this->session->set_flashdata('msg_class','alert-success');

	  	}
	  	else{
	  		$this->session->set_flashdata('msg','Section not Added Please try again!!');
	  		$this->session->set_flashdata('msg_class','alert-danger');
	  	}
	  	return redirect('Section');
	}
	else{
  		$data['classes']=$this->section_model->showClassId();
		$this->load->view('Admin/add_section',$data);
	}

 }
  public function edit(){
  	$id=$this->uri->segment(3);
  	$data['classes']=$this->section_model->showClassId();
  	if((int)$id){
  		if($_POST){
  			$this->form_validation->set_rules('section_name', 'Section Name','trim|required|alpha|callback_unsc_name');
	        $this->form_validation->set_rules('class_id', 'Class ID','trim|required');
	        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
	       	if($this->form_validation->run()){
	            $user_type=$this->session->userdata('usertype');
	            $section_name=$this->input->post('section_name');
	            $class_id=$this->input->post('class_id');
	            $create_date = date('Y-m-d H:i:s');
	            $flag='1';
	            $data=array
	                    (
	                      'section_name' => $section_name,
	                      'class_id' =>$class_id,
	                    );
	              $this->section_model->update($id,$data);
	              $this->session->set_flashdata('msg','Section Update Successfully');
	              $this->session->set_flashdata('msg_class','alert-success');
	              return redirect('Section');
  			}
  			else{
  				$this->session->set_flashdata('msg','Section not Updated Please try again!!');
            	$this->session->set_flashdata('msg_class','alert-danger');
	  			$data["section_list"] = $this->section_model->find_section($id);
	  			$this->load->view('Admin/edit_section',$data);
  			}

  		}
  		else{
	  			$data["section_list"] = $this->section_model->find_section($id);
	  			$this->load->view('Admin/edit_section',$data);
  		}
  	}
  	else{
  		$this->load->view('Admin/error');
  	}
  }

  public function delete(){
  	$id=$this->uri->segment(3);
  	$this->section_model->del_section($id);
  	$this->session->set_flashdata('msg','Section Deleted Successfully');
    $this->session->set_flashdata('msg_class','alert-success');
    return redirect('Section');

  }
}
?>
