<?php 
class User_model extends CI_Model{
	public function register_user($enc_password){
		//User data array
		$data = array(
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'username'=>$this->input->post('username'),
			'password'=>$enc_password
			);
		return $this->db->insert('users',$data);
	}

	public function login_user($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);

		$login = $this->db->get('users');

		if ($login->num_rows()==1) {
			return $login->row(0)->id;
		}else{
			return false;
		}
	}

	
}


 ?>