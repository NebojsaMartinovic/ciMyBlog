<?php 
class Users extends CI_Controller{
	//Register user
	public function register(){
		$data['title'] = 'Sign Up!';

		//Set rules
		$this->form_validation->set_rules('name','Name','trim|required|max_length[20]|min_length[2]|is_unique[users.name]',array('is_unique'=>'This name already exists in our records!'));
		$this->form_validation->set_rules('username','Username','required|trim|min_length[3]|max_length[15]|is_unique[users.username]',array('is_unique'=>'This username already exists in our records!'));
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]',array('is_unique'=>'This email already exists in our records!'));
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('password2','Confirm Password','matches[password]');

		if ($this->form_validation->run()===false) {
			$this->load->view('templates/header');
			$this->load->view('users/register',$data);
			$this->load->view('templates/footer');
		}else{
			//Encrypt password
			$enc_password = md5($this->input->post('password'));

			$this->user_model->register_user($enc_password);

			//Set message
			$this->session->set_flashdata('user_registered','You are now registered and can log in!');

			redirect('users/login');
		}
	}

	//Log in user
	public function login(){
		$data['title'] = 'Log In';

	
		//drugi nacin provere da li postoji isto vec u bazi
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		

		if ($this->form_validation->run() === false) {
			$this->load->view('templates/header');
			$this->load->view('users/login',$data);
			$this->load->view('templates/footer');
		}else{
			//Get username
			$username = $this->input->post('username');
			//Get and encrypt password
			$password = md5($this->input->post('password'));

			//Login user
			$user_id = $this->user_model->login_user($username,$password);

			//Check user id
			if ($user_id) {
				//Create session
				$user_data = array(
					'user_id'=>$user_id,
					'username'=>$username,
					'logged_in'=>true
					);

				$this->session->set_userdata($user_data);

			//Set message
			$this->session->set_flashdata('user_loggedin','You are now loggedin!');

			redirect('posts');
			}else{
			//Set message
			$this->session->set_flashdata('login_failed','Login is invalid!');

			redirect('users/login');
			}

			
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		//Set message
		$this->session->set_flashdata('user_loggedout','You are now logged out!');

		redirect('users/login');
	}
}

 ?>