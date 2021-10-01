<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_controller extends CI_Controller
{
    public $gallery_path;
    public $gallery_path_url;
    public function __construct()
    {
        parent::__construct();
        $this->gallery_path = realpath(APPPATH . '../assets/scan/');
        $this->gallery_path_url = base_url() . 'assets/scan/';
        $this->load->model('pdpt_model');
        $this->cek_session();
    }
    
    public function cek_session()
    {
        if ($this->session->userdata('is_logged_in') == null) {
            redirect('login');
        }
        
        if ($this->session->userdata('role') != 'user') {
            redirect('login/forbidden_access');
        }
    }
    
    public function index()
    {
        $npm = $this->session->userdata('user');
        $data=array('title'=>'Profil Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                    'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
                    'data_foto'  =>$this->pdpt_model->get_data_foto($npm),
                    'isi'  =>'user/profil_mahasiswa'
                        );
        $this->session->set_userdata('nama', $data['data_mahasiswa']['nama_mahasiswa']);
        $this->load->view('user/layout/wrapper', $data);
    }
    
    public function unggah_foto()
    {
        $npm = $this->session->userdata('user');
        if ($this->input->post('submit')) {
            $config = array(
                 'allowed_types' => 'jpg',
                 'upload_path' => $this->gallery_path,
                 'max_size' => 2000,
                 'file_name' => 'foto_'.$npm
                );

            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            
            $data_foto = array(
                    'npm' 	=> $npm,
                    'scan_foto'	=> $this->upload->file_name
                );
            $this->pdpt_model->add_foto($data_foto);
            redirect(base_url().'index.php/user_controller/index');
        }
    }
    
    public function edit_data_mahasiswa()
    {
        $npm = $this->session->userdata('user');
        
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
        
        if ($this->form_validation->run() === false) {
            $data=array('title'=>'Edit Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                    'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
                    'isi'  =>'user/edit_mahasiswa'
                        );
    
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $data = array(
                        'nama_mahasiswa'	=> $this->input->post('nama_mahasiswa'),
                        'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
                        'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
                        'jenis_kelamin'	=> $this->input->post('jenis_kelamin'),
                        'agama'	=> $this->input->post('agama'),
                        'nomor_ktp'	=> $this->input->post('nomor_ktp'),
                        'alamat_rumah'	=> $this->input->post('alamat_rumah'),
                        'alamat_desa'	=> $this->input->post('alamat_desa'),
                        'alamat_kelurahan'	=> $this->input->post('alamat_kelurahan'),
                        'alamat_kecamatan'	=> $this->input->post('alamat_kecamatan'),
                        'alamat_kabupaten'	=> $this->input->post('alamat_kabupaten'),
                        'kode_pos'	=> $this->input->post('kode_pos'),
                        'telepon_rumah'	=> $this->input->post('telepon_rumah'),
                        'telepon_genggam'	=> $this->input->post('telepon_genggam'),
                        'email'	=> $this->input->post('email'),
                        'nama_penerima_kps'	=> $this->input->post('nama_penerima_kps'),
                        'nomor_penerima_kps'	=> $this->input->post('nomor_penerima_kps'),
                        'tipe_tempat_tinggal'	=> $this->input->post('tipe_tempat_tinggal')
                    );
            $data_user['useremail'] = $this->input->post('email');
            
            $condition['npm'] = $npm;
            $kondisi['username'] = $npm;
            $this->pdpt_model->edit_user($data_user, $kondisi);
            $this->pdpt_model->edit_data($data, $condition);
            redirect(base_url().'index.php/user_controller/index');
        }
    }
    
    public function orangtua_mahasiswa()
    {
        $npm = $this->session->userdata('user');
        $data=array('title'=>'Data Orang Tua Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                    'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
                    'data_ayah'  =>$this->pdpt_model->get_data_ayah($npm),
                    'data_ibu'  =>$this->pdpt_model->get_data_ibu($npm),
                    'isi'  =>'user/tampil_orangtua'
                        );
    
        $this->load->view('user/layout/wrapper', $data);
    }
    
    public function tambah_data_orangtua()
    {
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('penghasilan_per_bulan', 'Penghasilan Per Bulan', 'required');
        $this->form_validation->set_rules('alamat_rumah', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_desa', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kelurahan', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('alamat_kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|numeric');
        $this->form_validation->set_rules('telepon_rumah', 'Telepon Rumah', 'required');
        $this->form_validation->set_rules('telepon_genggam', 'HP', 'required');
        
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('tempat_lahir2', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir2', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pendidikan2', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan2', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('penghasilan_per_bulan2', 'Penghasilan Per Bulan', 'required');
        $this->form_validation->set_rules('alamat_rumah2', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_desa2', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kelurahan2', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kecamatan2', 'Kecamatan', 'required');
        $this->form_validation->set_rules('alamat_kabupaten2', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kode_pos2', 'Kode Pos', 'required|numeric');
        $this->form_validation->set_rules('telepon_rumah2', 'Telepon Rumah', 'required');
        $this->form_validation->set_rules('telepon_genggam2', 'HP', 'required');
        
        if ($this->form_validation->run() === false) {
            $data=array('title'=>'Form Tambah Data Orang Tua - Pangkalan Data Pendidikan Tinggi',
                        'isi'  =>'user/tambah_data_orangtua'
                            );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $data_ayah = array(
                    'npm' => $this->session->userdata('user'),
                    'nama_ayah'	=> $this->input->post('nama_ayah'),
                    'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
                    'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
                    'pendidikan'	=> $this->input->post('pendidikan'),
                    'pekerjaan'	=> $this->input->post('pekerjaan'),
                    'penghasilan_per_bulan'	=> $this->input->post('penghasilan_per_bulan'),
                    'alamat_rumah'	=> $this->input->post('alamat_rumah'),
                    'alamat_desa'	=> $this->input->post('alamat_desa'),
                    'alamat_kelurahan'	=> $this->input->post('alamat_kelurahan'),
                    'alamat_kecamatan'	=> $this->input->post('alamat_kecamatan'),
                    'alamat_kabupaten'	=> $this->input->post('alamat_kabupaten'),
                    'kode_pos'	=> $this->input->post('kode_pos'),
                    'telepon_rumah'	=> $this->input->post('telepon_rumah'),
                    'telepon_genggam'	=> $this->input->post('telepon_genggam')
                );
                
            $data_ibu = array(
                    'npm' => $this->session->userdata('user'),
                    'nama_ibu'	=> $this->input->post('nama_ibu'),
                    'tempat_lahir' 		=> $this->input->post('tempat_lahir2'),
                    'tanggal_lahir'	=> $this->input->post('tanggal_lahir2'),
                    'pendidikan'	=> $this->input->post('pendidikan2'),
                    'pekerjaan'	=> $this->input->post('pekerjaan2'),
                    'penghasilan_per_bulan'	=> $this->input->post('penghasilan_per_bulan2'),
                    'alamat_rumah'	=> $this->input->post('alamat_rumah2'),
                    'alamat_desa'	=> $this->input->post('alamat_desa2'),
                    'alamat_kelurahan'	=> $this->input->post('alamat_kelurahan2'),
                    'alamat_kecamatan'	=> $this->input->post('alamat_kecamatan2'),
                    'alamat_kabupaten'	=> $this->input->post('alamat_kabupaten2'),
                    'kode_pos'	=> $this->input->post('kode_pos2'),
                    'telepon_rumah'	=> $this->input->post('telepon_rumah2'),
                    'telepon_genggam'	=> $this->input->post('telepon_genggam2')
                );
                    
            $this->pdpt_model->add_data_ayah($data_ayah);
            $this->pdpt_model->add_data_ibu($data_ibu);
            redirect(base_url().'index.php/user_controller/orangtua_mahasiswa');
        }
    }
    
    public function edit_data_orangtua()
    {
        $npm = $this->session->userdata('user');
        $data=array('data_ayah'  =>$this->pdpt_model->get_data_ayah($npm),
                    'data_ibu'  =>$this->pdpt_model->get_data_ibu($npm)
                        );
        if (($data['data_ayah'] == null) and ($data['data_ibu'] == null)) {
            redirect(base_url().'index.php/user_controller/tambah_data_orangtua');
        } else {
            //form validasi diperlukan, jika data ayah ada
            if ($data['data_ayah'] != null) {
                $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
                $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
                $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
                $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
                $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
                $this->form_validation->set_rules('penghasilan_per_bulan', 'Penghasilan Per Bulan', 'required');
                $this->form_validation->set_rules('alamat_rumah', 'alamat_rumah', 'required');
                $this->form_validation->set_rules('alamat_desa', 'alamat_rumah', 'required');
                $this->form_validation->set_rules('alamat_kelurahan', 'alamat_rumah', 'required');
                $this->form_validation->set_rules('alamat_kecamatan', 'Kecamatan', 'required');
                $this->form_validation->set_rules('alamat_kabupaten', 'Kabupaten', 'required');
                $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|numeric');
                $this->form_validation->set_rules('telepon_rumah', 'Telepon Rumah', 'required');
                $this->form_validation->set_rules('telepon_genggam', 'HP', 'required');
            }
            
            //form validasi diperlukan, jika data ibu ada
            if ($data['data_ibu'] != null) {
                $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
                $this->form_validation->set_rules('tempat_lahir2', 'Tempat Lahir', 'required');
                $this->form_validation->set_rules('tanggal_lahir2', 'Tanggal Lahir', 'required');
                $this->form_validation->set_rules('pendidikan2', 'Pendidikan', 'required');
                $this->form_validation->set_rules('pekerjaan2', 'Pekerjaan', 'required');
                $this->form_validation->set_rules('penghasilan_per_bulan2', 'Penghasilan Per Bulan', 'required');
                $this->form_validation->set_rules('alamat_rumah2', 'alamat_rumah', 'required');
                $this->form_validation->set_rules('alamat_desa2', 'alamat_rumah', 'required');
                $this->form_validation->set_rules('alamat_kelurahan2', 'alamat_rumah', 'required');
                $this->form_validation->set_rules('alamat_kecamatan2', 'Kecamatan', 'required');
                $this->form_validation->set_rules('alamat_kabupaten2', 'Kabupaten', 'required');
                $this->form_validation->set_rules('kode_pos2', 'Kode Pos', 'required|numeric');
                $this->form_validation->set_rules('telepon_rumah2', 'Telepon Rumah', 'required');
                $this->form_validation->set_rules('telepon_genggam2', 'HP', 'required');
            }
            
            if ($this->form_validation->run() === false) {
                $data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                        'data_ayah'  =>$this->pdpt_model->get_data_ayah($npm),
                        'data_ibu'  =>$this->pdpt_model->get_data_ibu($npm),
                        'isi'  =>'user/form_data_orangtua'
                            );
        
                $this->load->view('user/layout/wrapper', $data);
            } else {
                $data_ayah = array(
                            'nama_ayah'	=> $this->input->post('nama_ayah'),
                            'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
                            'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
                            'pendidikan'	=> $this->input->post('pendidikan'),
                            'pekerjaan'	=> $this->input->post('pekerjaan'),
                            'penghasilan_per_bulan'	=> $this->input->post('penghasilan_per_bulan'),
                            'alamat_rumah'	=> $this->input->post('alamat_rumah'),
                            'alamat_desa'	=> $this->input->post('alamat_desa'),
                            'alamat_kelurahan'	=> $this->input->post('alamat_kelurahan'),
                            'alamat_kecamatan'	=> $this->input->post('alamat_kecamatan'),
                            'alamat_kabupaten'	=> $this->input->post('alamat_kabupaten'),
                            'kode_pos'	=> $this->input->post('kode_pos'),
                            'telepon_rumah'	=> $this->input->post('telepon_rumah'),
                            'telepon_genggam'	=> $this->input->post('telepon_genggam')
                        );
                        
                $data_ibu = array(
                            'nama_ibu'	=> $this->input->post('nama_ibu'),
                            'tempat_lahir' 		=> $this->input->post('tempat_lahir2'),
                            'tanggal_lahir'	=> $this->input->post('tanggal_lahir2'),
                            'pendidikan'	=> $this->input->post('pendidikan2'),
                            'pekerjaan'	=> $this->input->post('pekerjaan2'),
                            'penghasilan_per_bulan'	=> $this->input->post('penghasilan_per_bulan2'),
                            'alamat_rumah'	=> $this->input->post('alamat_rumah2'),
                            'alamat_desa'	=> $this->input->post('alamat_desa2'),
                            'alamat_kelurahan'	=> $this->input->post('alamat_kelurahan2'),
                            'alamat_kecamatan'	=> $this->input->post('alamat_kecamatan2'),
                            'alamat_kabupaten'	=> $this->input->post('alamat_kabupaten2'),
                            'kode_pos'	=> $this->input->post('kode_pos2'),
                            'telepon_rumah'	=> $this->input->post('telepon_rumah2'),
                            'telepon_genggam'	=> $this->input->post('telepon_genggam2')
                        );
                            
                $condition['npm'] = $this->session->userdata('user');
                $this->pdpt_model->edit_data_ayah($data_ayah, $condition);
                $this->pdpt_model->edit_data_ibu($data_ibu, $condition);
                
                redirect(base_url().'index.php/user_controller/orangtua_mahasiswa');
            }
        }
    }
    
    public function tambah_data_ibu()
    {
        $npm = $this->session->userdata('user');
        
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('tempat_lahir2', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir2', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pendidikan2', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan2', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('penghasilan_per_bulan2', 'Penghasilan Per Bulan', 'required');
        $this->form_validation->set_rules('alamat_rumah2', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_desa2', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kelurahan2', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kecamatan2', 'Kecamatan', 'required');
        $this->form_validation->set_rules('alamat_kabupaten2', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kode_pos2', 'Kode Pos', 'required|numeric');
        $this->form_validation->set_rules('telepon_rumah2', 'Telepon Rumah', 'required');
        $this->form_validation->set_rules('telepon_genggam2', 'HP', 'required');
        
        if ($this->form_validation->run() === false) {
            $data=array('title'=>'Form Tambah Data Ibu - Pangkalan Data Pendidikan Tinggi',
                        'isi'  =>'user/tambah_data_ibu'
                            );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $data_ibu = array(
                    'npm' => $npm,
                    'nama_ibu'	=> $this->input->post('nama_ibu'),
                    'tempat_lahir' 		=> $this->input->post('tempat_lahir2'),
                    'tanggal_lahir'	=> $this->input->post('tanggal_lahir2'),
                    'pendidikan'	=> $this->input->post('pendidikan2'),
                    'pekerjaan'	=> $this->input->post('pekerjaan2'),
                    'penghasilan_per_bulan'	=> $this->input->post('penghasilan_per_bulan2'),
                    'alamat_rumah'	=> $this->input->post('alamat_rumah2'),
                    'alamat_desa'	=> $this->input->post('alamat_desa2'),
                    'alamat_kelurahan'	=> $this->input->post('alamat_kelurahan2'),
                    'alamat_kecamatan'	=> $this->input->post('alamat_kecamatan2'),
                    'alamat_kabupaten'	=> $this->input->post('alamat_kabupaten2'),
                    'kode_pos'	=> $this->input->post('kode_pos2'),
                    'telepon_rumah'	=> $this->input->post('telepon_rumah2'),
                    'telepon_genggam'	=> $this->input->post('telepon_genggam2')
                );
                    
            $this->pdpt_model->add_data_ibu($data_ibu);
            redirect(base_url().'index.php/user_controller/orangtua_mahasiswa');
        }
    }
    
    public function tambah_data_ayah()
    {
        $npm = $this->session->userdata('user');
        
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('penghasilan_per_bulan', 'Penghasilan Per Bulan', 'required');
        $this->form_validation->set_rules('alamat_rumah', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_desa', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kelurahan', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('alamat_kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|numeric');
        $this->form_validation->set_rules('telepon_rumah', 'Telepon Rumah', 'required');
        $this->form_validation->set_rules('telepon_genggam', 'HP', 'required');
        
        if ($this->form_validation->run() === false) {
            $data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                        'isi'  =>'user/tambah_data_ayah'
                            );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $data_ayah = array(
                    'npm' => $npm ,
                    'nama_ayah'	=> $this->input->post('nama_ayah'),
                    'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
                    'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
                    'pendidikan'	=> $this->input->post('pendidikan'),
                    'pekerjaan'	=> $this->input->post('pekerjaan'),
                    'penghasilan_per_bulan'	=> $this->input->post('penghasilan_per_bulan'),
                    'alamat_rumah'	=> $this->input->post('alamat_rumah'),
                    'alamat_desa'	=> $this->input->post('alamat_desa'),
                    'alamat_kelurahan'	=> $this->input->post('alamat_kelurahan'),
                    'alamat_kecamatan'	=> $this->input->post('alamat_kecamatan'),
                    'alamat_kabupaten'	=> $this->input->post('alamat_kabupaten'),
                    'kode_pos'	=> $this->input->post('kode_pos'),
                    'telepon_rumah'	=> $this->input->post('telepon_rumah'),
                    'telepon_genggam'	=> $this->input->post('telepon_genggam')
                );
        
            $this->pdpt_model->add_data_ayah($data_ayah);
            redirect(base_url().'index.php/user_controller/orangtua_mahasiswa');
        }
    }
    
    public function wali_mahasiswa()
    {
        $npm = $this->session->userdata('user');
        $data=array('title'=>'Data Wali Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                    'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
                    'data_wali'  =>$this->pdpt_model->get_data_wali($npm),
                    'isi'  =>'user/tampil_wali'
                        );
    
        $this->load->view('user/layout/wrapper', $data);
    }
    
    public function tambah_data_wali()
    {
        $npm = $this->session->userdata('user');
        
        $this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('penghasilan_per_bulan', 'Penghasilan Per Bulan', 'required');
        $this->form_validation->set_rules('alamat_desa', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kelurahan', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_rumah', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('alamat_kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|numeric');
        $this->form_validation->set_rules('telepon_rumah', 'Telepon Rumah', 'required');
        $this->form_validation->set_rules('telepon_genggam', 'HP', 'required');
        
        if ($this->form_validation->run() === false) {
            $npm = $this->session->userdata('user');
            $data=array('title'=>'Tambah Data Wali Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                        'isi'  =>'user/tambah_data_wali'
                            );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $data_wali = array(
                    'npm' => $this->session->userdata('user'),
                    'nama_wali'	=> $this->input->post('nama_wali'),
                    'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
                    'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
                    'pendidikan'	=> $this->input->post('pendidikan'),
                    'pekerjaan'	=> $this->input->post('pekerjaan'),
                    'penghasilan_per_bulan'	=> $this->input->post('penghasilan_per_bulan'),
                    'alamat_rumah'	=> $this->input->post('alamat_rumah'),
                    'alamat_desa'	=> $this->input->post('alamat_desa'),
                    'alamat_kelurahan'	=> $this->input->post('alamat_kelurahan'),
                    'alamat_kecamatan'	=> $this->input->post('alamat_kecamatan'),
                    'alamat_kabupaten'	=> $this->input->post('alamat_kabupaten'),
                    'kode_pos'	=> $this->input->post('kode_pos'),
                    'telepon_rumah'	=> $this->input->post('telepon_rumah'),
                    'telepon_genggam'	=> $this->input->post('telepon_genggam')
                );
                    
            $this->pdpt_model->add_data_wali($data_wali);
            redirect(base_url().'index.php/user_controller/wali_mahasiswa');
        }
    }
    
    public function edit_data_wali()
    {
        $npm = $this->session->userdata('user');
        
        $this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('penghasilan_per_bulan', 'Penghasilan Per Bulan', 'required');
        $this->form_validation->set_rules('alamat_desa', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kelurahan', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_rumah', 'alamat_rumah', 'required');
        $this->form_validation->set_rules('alamat_kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('alamat_kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|numeric');
        $this->form_validation->set_rules('telepon_rumah', 'Telepon Rumah', 'required');
        $this->form_validation->set_rules('telepon_genggam', 'HP', 'required');
        
        if ($this->form_validation->run() === false) {
            $data=array('title'=>'Edit Data Wali Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                        'data_wali'  =>$this->pdpt_model->get_data_wali($npm),
                        'isi'  =>'user/form_data_wali'
                            );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $data_wali = array(
                    'nama_wali'	=> $this->input->post('nama_wali'),
                    'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
                    'tanggal_lahir'	=> $this->input->post('tanggal_lahir'),
                    'pendidikan'	=> $this->input->post('pendidikan'),
                    'pekerjaan'	=> $this->input->post('pekerjaan'),
                    'penghasilan_per_bulan'	=> $this->input->post('penghasilan_per_bulan'),
                    'alamat_rumah'	=> $this->input->post('alamat_rumah'),
                    'alamat_desa'	=> $this->input->post('alamat_desa'),
                    'alamat_kelurahan'	=> $this->input->post('alamat_kelurahan'),
                    'alamat_kecamatan'	=> $this->input->post('alamat_kecamatan'),
                    'alamat_kabupaten'	=> $this->input->post('alamat_kabupaten'),
                    'kode_pos'	=> $this->input->post('kode_pos'),
                    'telepon_rumah'	=> $this->input->post('telepon_rumah'),
                    'telepon_genggam'	=> $this->input->post('telepon_genggam')
                );
                    
            $condition['npm'] = $this->session->userdata('user');
            $this->pdpt_model->edit_data_wali($data_wali, $condition);
            redirect(base_url().'index.php/user_controller/wali_mahasiswa');
        }
    }
    
    public function data_akademik()
    {
        $npm = $this->session->userdata('user');
        $data=array('title'=>'Data Akademik Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                    'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
                    'data_akademik'  =>$this->pdpt_model->get_data_akademik($npm),
                    'isi'  =>'user/tampil_data_akademik'
                        );
    
        $this->load->view('user/layout/wrapper', $data);
    }
    
    public function tambah_data_akademik()
    {
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('tanggal_awal_kuliah', 'Tanggal Awal Kuliah', 'required');
        
        if ($this->form_validation->run() === false) {
            $data=array('title'=>'Isi Data Akademik Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                        'isi'  =>'user/tambah_data_akademik'
                            );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $masuk = $this->input->post('tanggal_awal_kuliah');
            $hari						=	0;
            $bulan						=	0;
            $tahun						=	0;
            
            $lulus = $this->input->post('tanggal_sidang_skripsi');
            if ($lulus != null) {
                $akhir					=	explode('-', $lulus);
                $awal					=	explode('-', $masuk);
                $tg							=	$akhir['2'];
                $bl							=	$akhir['1'];
                $th							=	$akhir['0'];
                //
                $tg2						=	$awal['2'];
                $bl2						=	$awal['1'];
                $th2						=	$awal['0'];
                //
                $awal2						=	gregoriantojd($bl, $tg, $th);
                $akhir2						=	gregoriantojd($bl2, $tg2, $th2);
                $hari						=	$awal2-$akhir2;
                $bulan						=	$hari / 30;
                $tahun						=	$hari / 365;
            }
            
            $data_akademik = array(
                    'npm' => $this->session->userdata('user'),
                    'program_studi'	=> $this->input->post('program_studi'),
                    'kelas' 		=> $this->input->post('kelas'),
                    'dosen_wali'	=> $this->input->post('dosen_wali'),
                    'tanggal_awal_kuliah'	=> $this->input->post('tanggal_awal_kuliah'),
                    'tanggal_sidang_skripsi'	=> $this->input->post('tanggal_sidang_skripsi'),
                    'waktu_tempuh_menyelesaikan_kuliah_dalam_tahun'	=> $tahun,
                    'waktu_tempuh_menyelesaikan_kuliah_dalam_bulan'	=> $bulan,
                    'waktu_tempuh_menyelesaikan_kuliah_dalam_hari'	=> $hari,
                    'prestasi_akademik'	=> $this->input->post('prestasi_akademik'),
                    'prestasi_non_akademik'	=> $this->input->post('prestasi_non_akademik'),
                    'ipk'	=> $this->input->post('ipk1').$this->input->post('ipk2'),
                    'asal_sekolah_sebelum_kuliah'	=> $this->input->post('asal_sekolah_sebelum_kuliah')
                );
                    
            $this->pdpt_model->add_data_akademik($data_akademik);
            redirect(base_url().'index.php/user_controller/data_akademik');
        }
    }
    
    public function edit_data_akademik()
    {
        $this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('tanggal_awal_kuliah', 'Tanggal Awal Kuliah', 'required');
        
        if ($this->form_validation->run() === false) {
            $npm = $this->session->userdata('user');
            $data=array('title'=>'Isi Data Akademik Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                        'data_akademik'  =>$this->pdpt_model->get_data_akademik($npm),
                        'isi'  =>'user/edit_data_akademik'
                            );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $masuk = $this->input->post('tanggal_awal_kuliah');
            $lulus = $this->input->post('tanggal_sidang_skripsi');
            if (($lulus == '0000-00-00') or ($lulus == null)) {
                $hari						=	0;
                $bulan						=	0;
                $tahun						=	0;
            } else {
                $akhir					=	explode('-', $lulus);
                $awal					=	explode('-', $masuk);
                $tg							=	$akhir['2'];
                $bl							=	$akhir['1'];
                $th							=	$akhir['0'];
                //
                $tg2						=	$awal['2'];
                $bl2						=	$awal['1'];
                $th2						=	$awal['0'];
                //
                $awal2						=	gregoriantojd($bl, $tg, $th);
                $akhir2						=	gregoriantojd($bl2, $tg2, $th2);
                $hari						=	$awal2-$akhir2;
                $bulan						=	$hari / 30;
                $tahun						=	$hari / 365;
            }
            
            $data_akademik = array(
                    'program_studi'	=> $this->input->post('program_studi'),
                    'kelas' 		=> $this->input->post('kelas'),
                    'dosen_wali'	=> $this->input->post('dosen_wali'),
                    'tanggal_awal_kuliah'	=> $this->input->post('tanggal_awal_kuliah'),
                    'tanggal_sidang_skripsi'	=> $this->input->post('tanggal_sidang_skripsi'),
                    'waktu_tempuh_menyelesaikan_kuliah_dalam_tahun'	=> $tahun,
                    'waktu_tempuh_menyelesaikan_kuliah_dalam_bulan'	=> $bulan,
                    'waktu_tempuh_menyelesaikan_kuliah_dalam_hari'	=> $hari,
                    'prestasi_akademik'	=> $this->input->post('prestasi_akademik'),
                    'prestasi_non_akademik'	=> $this->input->post('prestasi_non_akademik'),
                    'ipk'	=> $this->input->post('ipk1').$this->input->post('ipk2'),
                    'asal_sekolah_sebelum_kuliah'	=> $this->input->post('asal_sekolah_sebelum_kuliah')
                );
            
            
            $condition['npm'] = $this->session->userdata('user');
            $this->pdpt_model->edit_data_akademik($data_akademik, $condition);
            redirect(base_url().'index.php/user_controller/data_akademik');
        }
    }
    
    public function lampiran()
    {
        $npm = $this->session->userdata('user');
        $data=array('title'=>'Data Lampiran Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                    'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
                    'data_foto'  =>$this->pdpt_model->get_data_foto($npm),
                    'data_kk'  =>$this->pdpt_model->get_data_kk($npm),
                    'data_ktp'  =>$this->pdpt_model->get_data_ktp($npm),
                    'data_ktm'  =>$this->pdpt_model->get_data_ktm($npm),
                    'isi'  =>'user/lampiran'
                        );
    
        $this->load->view('user/layout/wrapper', $data);
    }
    
    public function unggah_kk()
    {
        $npm 	= $this->input->post('npm');
        if ($this->input->post('submit')) {
            $config = array(
                 'allowed_types' => 'jpg',
                 'upload_path' => $this->gallery_path,
                 'max_size' => 2000,
                 'file_name' => 'kk_'.$npm
                );

            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            
            $data_kk = array(
                    'npm' 	=> $npm,
                    'scan_kartu_keluarga'	=> $this->upload->file_name
                );
            $this->pdpt_model->add_kk($data_kk);
            redirect(base_url().'index.php/user_controller/lampiran');
        }
    }
    
    public function unggah_ktp()
    {
        $npm 	= $this->input->post('npm');
        if ($this->input->post('submit')) {
            $config = array(
                 'allowed_types' => 'jpg',
                 'upload_path' => $this->gallery_path,
                 'max_size' => 2000,
                 'file_name' => 'ktp_'.$npm
                );

            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            
            $data_ktp = array(
                    'npm' 	=> $npm,
                    'scan_ktp'	=> $this->upload->file_name
                );
            $this->pdpt_model->add_ktp($data_ktp);
            redirect(base_url().'index.php/user_controller/lampiran');
        }
    }
    
    public function unggah_ktm()
    {
        $npm 	= $this->input->post('npm');
        if ($this->input->post('submit')) {
            $config = array(
                 'allowed_types' => 'jpg',
                 'upload_path' => $this->gallery_path,
                 'max_size' => 2000,
                 'file_name' => 'ktm_'.$npm
                );

            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            
            $data_ktm = array(
                    'npm' 	=> $npm,
                    'scan_ktm'	=> $this->upload->file_name
                );
            $this->pdpt_model->add_ktm($data_ktm);
            redirect(base_url().'index.php/user_controller/lampiran');
        }
    }
    
    public function edit_foto_mahasiswa()
    {
        $npm 	= $this->input->post('npm');
        if ($this->input->post('submit')) {
            $config = array(
                 'allowed_types' => 'jpg',
                 'upload_path' => $this->gallery_path,
                 'max_size' => 2000,
                 'file_name' => 'foto_'.$npm
                );

            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            
            $data_foto = array(
                    'scan_foto'	=> $this->upload->file_name
                );
                
            $kondisi['npm'] = $npm;
            $this->pdpt_model->edit_data_foto($data_foto, $kondisi);
            redirect(base_url().'index.php/user_controller/lampiran');
        }
    }
    
    public function edit_kk()
    {
        $npm 	= $this->input->post('npm');
        if ($this->input->post('submit')) {
            $config = array(
                 'allowed_types' => 'jpg',
                 'upload_path' => $this->gallery_path,
                 'max_size' => 2000,
                 'file_name' => 'foto_'.$npm
                );

            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            
            $data_kk = array(
                    'scan_kartu_keluarga'	=> $this->upload->file_name
                );
                
            $kondisi['npm'] = $npm;
            $this->pdpt_model->edit_data_kk($data_kk, $kondisi);
            redirect(base_url().'index.php/user_controller/lampiran');
        }
    }
    
    public function edit_ktp()
    {
        $npm 	= $this->input->post('npm');
        if ($this->input->post('submit')) {
            $config = array(
                 'allowed_types' => 'jpg',
                 'upload_path' => $this->gallery_path,
                 'max_size' => 2000,
                 'file_name' => 'foto_'.$npm
                );

            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            
            $data_ktp = array(
                    'scan_ktp'	=> $this->upload->file_name
                );
                
            $kondisi['npm'] = $npm;
            $this->pdpt_model->edit_data_ktp($data_ktp, $kondisi);
            redirect(base_url().'index.php/user_controller/lampiran');
        }
    }
    
    public function edit_ktm()
    {
        $npm 	= $this->input->post('npm');
        if ($this->input->post('submit')) {
            $config = array(
                 'allowed_types' => 'jpg',
                 'upload_path' => $this->gallery_path,
                 'max_size' => 2000,
                 'file_name' => 'foto_'.$npm
                );

            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            
            $data_ktm = array(
                    'scan_ktm'	=> $this->upload->file_name
                );
                
            $kondisi['npm'] = $npm;
            $this->pdpt_model->edit_data_ktm($data_ktm, $kondisi);
            redirect(base_url().'index.php/user_controller/lampiran');
        }
    }
    
    public function print_data_mahasiswa()
    {
        $npm = $this->session->userdata('user');
        $data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                    'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
                    'data_foto'  =>$this->pdpt_model->get_data_foto($npm),
                    'data_ayah'  =>$this->pdpt_model->get_data_ayah($npm),
                    'data_ibu'  =>$this->pdpt_model->get_data_ibu($npm),
                    'data_wali'  =>$this->pdpt_model->get_data_wali($npm),
                    'data_akademik'  =>$this->pdpt_model->get_data_akademik($npm),
                    'data_kk'  =>$this->pdpt_model->get_data_kk($npm),
                    'data_ktp'  =>$this->pdpt_model->get_data_ktp($npm),
                    'data_ktm'  =>$this->pdpt_model->get_data_ktm($npm)
                        );
    
        $this->load->view('print/print_detail_mahasiswa', $data);
    }
    
    public function pengaturan()
    {
        $data=array('title'=>'Pengaturan Akun - Pangkalan Data Pendidikan Tinggi',
                    'isi'  =>'user/pengaturan'
                        );
    
        $this->load->view('user/layout/wrapper', $data);
    }
    
    public function ubah_pass()
    {
        $npm = $this->session->userdata('user');
        
        $this->form_validation->set_rules('pass_baru', 'Password', 'required');
        $this->form_validation->set_rules('pass_conf', 'Password Confirmation', 'required|matches[pass_baru]');
        
        if ($this->form_validation->run() === false) {
            $data=array('title'=>'Edit Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                    'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
                    'isi'  =>'user/ubah_password'
                        );
    
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $data_user['userpassword'] = md5($this->input->post('pass_baru'));
            
            $kondisi['username'] = $npm;
            $kondisi['useremail'] = $this->input->post('email');
            $this->pdpt_model->edit_user($data_user, $kondisi);
            redirect(base_url().'index.php/user_controller/pengaturan');
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();// session_destroy, menghapus session
        redirect('home');
    }
}
