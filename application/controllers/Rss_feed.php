<?php 
class Rss_feed extends CI_Controller{
	public function index(){
		$data['title'] = 'RSS FEED';


		$this->load->view('templates/header');
		$this->load->view('rss_feed/index',$data);
		$this->load->view('templates/footer');
	}


}


	


 ?>