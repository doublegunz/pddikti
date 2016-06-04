<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
/* Bismillahirrahmanirrahim.. */	

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('login_model');
	
	}

	function index() 
	{
		$this->load->view('home/login_view');
	}
	

	function cek_login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));		
		$ex['i'] = $this->login_model->cek_data($username,$password);
		$r = $ex['i']->row();
		// PERIKSA Hak Akses //
		if($r == 1)
		{
			$hak_akses = $this->login_model->cek_hak_akses($username)->row();
			if ($hak_akses->hak_akses == 'admin')
			{
				 $adm = array(
							'username'=>$r->username,
							'password'=>$r->userpassword);
				 $this->session->set_userdata($adm);	
				 $data['username'] = $session_data['username'];

			 redirect('admin_controller');	
			}
			else if ($hak_akses->hak_akses == 'user')
			{
				 $user = array(
							'user'=>$r->username,
							'pass'=>$r->userpassword);
				 $this->session->set_userdata($user);	
				 $data['user'] = $session_data['user'];

			 redirect('user_controller');	
			}
			
		}
		else
		{
			$this->index();
			echo "<div class='warning' align='center'>
				<strong>Perhatian!</strong> Username atau Password anda salah. Silakan masukkan Username dan password yang benar!</div>";
		}
	
	}
	
	function lupa_password()
	{
		$this->load->view('home/lupa_password');
	}
	
	function cek_data()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');		
		$ex['i'] = $this->login_model->cek_email($username,$email);
		$r = $ex['i']->row();
		
		if($r == 1)
		{
			$res = array(	'n'=>$r->username,
							'email'=>$r->useremail);
				 $this->session->set_userdata($res);	
			redirect('login/reset_password');
			
		}
		else
		{
			$this->lupa_password();
			echo "<div class='warning' align='center'>
				<strong>Perhatian!</strong> Username atau Email anda salah. Silakan Coba Lagi.</div>";
		}
	
	}
	
	public function reset_password() 
	{
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		
		if ($this->form_validation->run() === FALSE) 
		{
			$this->load->view('home/form_reset_password');
		}
		else
		{	
			$npm = $this->session->userdata('n');
			$email = $this->session->userdata('email');

			$data_user = array(
						'userpassword'	=> md5($this->input->post('password'))
					);
			$kondisi['username'] = $npm;
			$kondisi['useremail'] = $email;
			$this->login_model->reset_password($data_user, $kondisi);	
			$this->session->sess_destroy();
			
			$this->load->view('home/berhasil');
		}
	}
}