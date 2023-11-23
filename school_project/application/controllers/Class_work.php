<?php
class Class_work extends MY_Controller{
 public function __construct(){
     parent::__construct();
     $this->load->model('class_model');
  }
	public function index(){
  $data['classlist']=$this->class_model->classlist();
 	$this->load->view('Admin/class',$data);
 	}

  public function uncl_name(){
    $id=$this->uri->segment(3);
    if((int)$id) {
      $count=$this->class_model->uncl_name(array('class_name'=>$this->input->post('class_name'),'id !=' =>$id));
      if(count($count)>0){
        $this->form_validation->set_message('uncl_name','This field is already exist!');
        return false;
      }
      else{
        return true;
      }

    }
    else{
      $count=$this->class_model->uncl_name(array('class_name'=>$this->input->post('class_name')));
      if(count($count)>0){
        $this->form_validation->set_message('uncl_name','This field is already exist!');
        return false;
      }
      else{
        return true;
      }

    }

  }

  public function uncl_no(){
    $id=$this->uri->segment(3);
    if((int)$id) {
      $count=$this->class_model->uncl_no(array('class_no'=>$this->input->post('class_no'),'id !=' =>$id));
      if(count($count)>0){
        $this->form_validation->set_message('uncl_no','This field is already exist!');
        return false;
      }
      else{
        return true;
      }

    }
    else{
      $count=$this->class_model->uncl_no(array('class_no'=>$this->input->post('class_no')));
      if(count($count)>0){
        $this->form_validation->set_message('uncl_no','This field is already exist!');
        return false;
      }
      else{
        return true;
      }
    }

  }

  public function add(){
  if($_POST) {
    $this->form_validation->set_rules('class_name', 'ClassName','trim|required|alpha|callback_uncl_name');
    $this->form_validation->set_rules('class_no', 'Class No','trim|required|callback_uncl_no');
    $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
      if($this->form_validation->run()){
        $user_type=$this->session->userdata('usertype');
        $class_name=$this->input->post('class_name');
        $class_no=$this->input->post('class_no');
        $create_date = date('Y-m-d H:i:s');
        $flag='1';
        $data=array
                (
                  'class_name' => $class_name,
                  'class_no' =>$class_no,
                  'create_date' =>$create_date,
                  'created_by' =>$user_type,
                  'flag' =>$flag
                );
          $this->class_model->adddata($data);
          $this->session->set_flashdata('msg','Class Added Successfully');
          $this->session->set_flashdata('msg_class','alert-success');
          return redirect('Class_work');
      }
      else {
        $this->session->set_flashdata('msg','Class not Added Please try again!!');
        $this->session->set_flashdata('msg_class','alert-danger');
        $this->load->view('Admin/add_class');
      }

    }
    else{
      $this->load->view('Admin/add_class');
    }
  }

  public function edit(){
    $id=$this->uri->segment(3);
    if((int)$id){
      if($_POST){
        $this->form_validation->set_rules('class_name', 'ClassName','trim|required|alpha|callback_uncl_name');
        $this->form_validation->set_rules('class_no', 'Class No','trim|required|callback_uncl_no');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
          if($this->form_validation->run()){
            $user_type=$this->session->userdata('usertype');
            $class_name=$this->input->post('class_name');
            $class_no=$this->input->post('class_no');
            $create_date = date('Y-m-d H:i:s');
            $flag='1';
            $data=array
                    (
                      'class_name' => $class_name,
                      'class_no' =>$class_no,
                    );
              $this->class_model->update($id,$data);
              $this->session->set_flashdata('msg','Class Update Successfully');
              $this->session->set_flashdata('msg_class','alert-success');
              return redirect('Class_work');
          }
          else {
            $data["classlist"] =$this->class_model->find_class($id);
            $this->load->view('Admin/edit_class',$data);
          }
       }
       else{
          $data["classlist"] =$this->class_model->find_class($id);
          $this->load->view('Admin/edit_class',$data);
          //echo $id;die('fnhfh');
       }


    }
    else{
      $this->load->view('Admin/error');
    }
  }
  public function delete(){
     $id=$this->uri->segment(3);
     $this->class_model->del_class($id);
     $this->session->set_flashdata('msg','Class Deleted Successfully');
     $this->session->set_flashdata('msg_class','alert-success');
     return redirect('Class_work');
  }

}
 ?>
