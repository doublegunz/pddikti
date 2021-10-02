<?php
defined('BASEPATH') or exit('NO direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $this->load->model('Auth_model', 'auth');
    }

    public function index()
    {
        $this->set_registration_validation();

        if ($this->form_validation->run() === false) {
            $data = [
                'title' => 'Pendaftaran PDPT - Pangkalan Data Pendidikan Tinggi',
                'isi'  => 'register/index'
            ];

            $this->load->view('layout/wrapper', $data);
        } else {
            $registration_data = $this->set_registration_data();

            $this->mahasiswa->create($registration_data['mahasiswa']);
            $this->auth->create_user($registration_data['user']);
            $this->auth->assign_role_access($registration_data['access']);

            $data = [
                'title'        => 'Pendaftaran Berhasil - Pangkalan Data Pendidikan Tinggi',
                'isi'          => 'register/success'
            ];

            $this->load->view('layout/wrapper', $data);
        }
    }

    private function set_registration_data()
    {
        $npm = $this->input->post('npm');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $registration_data = [
            'mahasiswa' => [
                'npm'     => $npm,
                'nama_mahasiswa'    => $this->input->post('nama_mahasiswa'),
                'tempat_lahir'         => $this->input->post('tempat_lahir'),
                'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
                'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
                'agama'    => $this->input->post('agama'),
                'nomor_ktp'    => $this->input->post('nomor_ktp'),
                'alamat_rumah'    => $this->input->post('alamat_rumah'),
                'alamat_desa'    => $this->input->post('alamat_desa'),
                'alamat_kelurahan'    => $this->input->post('alamat_kelurahan'),
                'alamat_kecamatan'    => $this->input->post('alamat_kecamatan'),
                'alamat_kabupaten'    => $this->input->post('alamat_kabupaten'),
                'kode_pos'    => $this->input->post('kode_pos'),
                'telepon_rumah'    => $this->input->post('telepon_rumah'),
                'telepon_genggam'    => $this->input->post('telepon_genggam'),
                'email'    => $email,
                'nama_penerima_kps'    => $this->input->post('nama_penerima_kps'),
                'nomor_penerima_kps'    => $this->input->post('nomor_penerima_kps'),
                'tipe_tempat_tinggal'    => $this->input->post('tipe_tempat_tinggal')
            ],
            'user' => [
                'username'     => $npm,
                'userpassword'    => password_hash($password, PASSWORD_BCRYPT),
                'useremail'    => $email
            ],
            'access' => [
                'username'     => $npm,
                'hak_akses'    => 'user'
            ]
        ];

        return $registration_data;
    }

    private function set_registration_validation()
    {
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric|max_length[8]');
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('nomor_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('alamat_rumah', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('alamat_desa', 'Desa', 'required');
        $this->form_validation->set_rules('alamat_kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('alamat_kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|numeric');
        $this->form_validation->set_rules('telepon_rumah', 'Telepon Rumah', 'required');
        $this->form_validation->set_rules('telepon_genggam', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
    }
}
