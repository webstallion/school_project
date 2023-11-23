<?php
class Loginmodel extends CI_Model{
  public function isvalidate($username,$password)
  {
    $q=$this->db->where(['username'=>$username,'password'=>$password])
              ->get('login_table');

        if($q->num_rows()){
         $userdata=$q->row();
         $data = array('id' => $userdata->id, 'usertype' =>$userdata->type);
         $this->session->set_userdata($data);
        // print_r($this->session->userdata());die('fsfs');
         return true;
        }  
        else{
          return False;
        }
  }
 
 }