<?php
class Dashboard extends MY_Controller {
 public function __construct(){
  echo parent::__construct();
  if(! $this->session->userdata('id'))
  return redirect('login');
  }
  public function index(){
 	$this->load->view('Admin/dashboard');
  }

}
