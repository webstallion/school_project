 <?php
class Login extends MY_Controller {
 public function index(){
      if($this->session->userdata('id')) {
            return redirect('dashboard');
      }
  $this->form_validation->set_rules('uname', 'User Name','trim|required|alpha');
  $this->form_validation->set_rules('pass', 'Password','trim|required|max_length[12]');
  $this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
  if($this->form_validation->run()){
    $uname=$this->input->post('uname');
    $pass=$this->input->post('pass');
    $this->load->model('loginmodel');
    $login_id=$this->loginmodel->isvalidate($uname,$pass);
    if($login_id == true){
      //login correct
      //$this->session->set_userdata('type',$login_id);
      $user_type=$this->session->userdata('usertype');
      $id=$this->session->userdata('id');
      if($user_type=='admin'){
      return redirect('dashboard');
      }
      elseif($user_type=='user'){
        return redirect('dashboard/welcome');
      }
      else{
        echo "this data is not in database";
      }
    }
    else{
      //login failed
      $this->session->set_flashdata('login_failed','Invalid Username/Password');
      return redirect('login');
    }
  }
  else{
    $this->load->view('Admin/login');
  }
 }
 public function logout(){
  $this->session->sess_destroy();
  return redirect('login');
 }
}
