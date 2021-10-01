<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Login extends CI_Controller
{
    /* Bismillahirrahmanirrahim.. */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('home/login_view');
    }
    

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->login_model
            ->get_user($username)
            ->row();

        if ($user) {
            if (password_verify($password, $user->userpassword)) {
                $get_hak_akses = $this->login_model->cek_hak_akses($username)->row();
                
                if ($get_hak_akses->hak_akses == 'admin') {
                    $session_data = [
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'email' => $user->useremail,
                        'role' => $get_hak_akses->hak_akses,
                        'is_logged_in' => true
                    ];

                    $this->session->set_userdata($session_data);

                    redirect('admin_controller');
                } elseif ($get_hak_akses->hak_akses == 'user') {
                    $session_data = [
                        'user_id' => $user->id,
                        'user' => $user->username,
                        'email' => $user->useremail,
                        'role' => $get_hak_akses->hak_akses,
                        'is_logged_in' => true
                    ];

                    $this->session->set_userdata($session_data);
                    
                    redirect('user_controller');
                }
            } else {
                $this->index();
                echo "<div class='warning' align='center'>
				<strong>Perhatian!</strong> Username atau Password anda salah. Silakan masukkan Username dan password yang benar!</div>";
            }
        } else {
            $this->index();
            echo "<div class='warning' align='center'>
				<strong>Perhatian!</strong> Username atau Password anda salah. Silakan masukkan Username dan password yang benar!</div>";
        }
    }
    
    public function lupa_password()
    {
        $this->load->view('home/lupa_password');
    }
    
    public function cek_data()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $get_data = $this->login_model
			->cek_email($username, $email)
			->row();
        
        if ($get_data) {

            $session_data = [
				'username' => $get_data->username,
				'email' => $get_data->useremail
			];

            $this->session->set_userdata($session_data);

            redirect('login/reset_password');
        } else {
            $this->lupa_password();
            echo "<div class='warning' align='center'>
				<strong>Perhatian!</strong> Username atau Email anda salah. Silakan Coba Lagi.</div>";
        }
    }
    
    public function reset_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        
        if ($this->form_validation->run() === false) {
            $this->load->view('home/form_reset_password');
        } else {
            $npm = $this->session->userdata('username');
            $email = $this->session->userdata('email');
			$password = $this->input->post('password');

            $data_user = [
				'userpassword' => password_hash($password, PASSWORD_BCRYPT)
			];

			$condition = [
				'username' => $npm,
				'useremail' => $email
			];

            $this->login_model->reset_password($data_user, $condition);
            $this->session->sess_destroy();
            
            $this->load->view('home/berhasil');
        }
    }

    public function forbidden_access()
    {
        $this->load->view('errors/forbidden_access');
    }
}
