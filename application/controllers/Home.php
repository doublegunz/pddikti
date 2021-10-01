<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pdpt_model');
        $this->load->library('pagination');
        $this->load->helper('download');
    }
    
    public function index()
    {
        $jumlah= $this->pdpt_model->jumlah_berita();

        $config['base_url'] = base_url().'index.php/home/index/';
        $config['total_rows'] = $jumlah;
        $config['per_page'] = 5;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next ';
        $config['prev_link'] = 'Previous ';
        $config['attributes'] = array('class' => 'pagination');
        
        $dari = $this->uri->segment('3');
        
        $data=array('title'		=>'PDPT - Pangkalan Data Pendidikan Tinggi',
                    'berita'	=> $this->pdpt_model->berita_home($config['per_page'], $dari),
                    'isi'  		=>'home/index_home'
                        );
                        
        $this->pagination->initialize($config);
        $this->load->view('layout/wrapper', $data);
    }
    
    // Read berita
    public function read($read)
    {
        $data['berita'] = $this->pdpt_model->read_berita();
        $data['detail']	= $this->pdpt_model->read_berita($read);
        $data=array('title'		=>$data['detail']['judul'],
                    'berita'	=> $this->pdpt_model->read_berita(),
                    'detail' 	=> $this->pdpt_model->read_berita($read),
                    'isi'  		=>'home/read_view'
                        );
        $this->load->view('layout/wrapper', $data);
    }
    
    public function pendaftaran()
    {
        $this->set_registration_validation();
        
        if ($this->form_validation->run() === false) {
            $data = [
                'title' => 'Pendaftaran PDPT - Pangkalan Data Pendidikan Tinggi',
                'isi'  => 'home/form_pendaftaran'
            ];

            $this->load->view('layout/wrapper', $data);
        } else {
            $registration_data = $this->set_registration_data();
                        
            $this->pdpt_model->add_mahasiswa($registration_data['mahasiswa']);
            $this->pdpt_model->add_user($registration_data['user']);
            $this->pdpt_model->hak_akses($registration_data['access']);
            
            $data = [
                'title'		=> 'Pendaftaran Berhasil - Pangkalan Data Pendidikan Tinggi',
                'isi'  		=> 'home/pendaftaran_berhasil'
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
                'npm' 	=> $npm,
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
                'email'	=> $email,
                'nama_penerima_kps'	=> $this->input->post('nama_penerima_kps'),
                'nomor_penerima_kps'	=> $this->input->post('nomor_penerima_kps'),
                'tipe_tempat_tinggal'	=> $this->input->post('tipe_tempat_tinggal')
            ],
            'user' => [
                'username' 	=> $npm,
                'userpassword'	=> password_hash($password, PASSWORD_BCRYPT),
                'useremail'	=> $email
            ],
            'access' => [
                'username' 	=> $npm,
                'hak_akses'	=> 'user'
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

    public function pencarian()
    {
        $data=array('title'		=>'Pencarian Data',
                    'isi'  		=>'home/pencarian'
                        );
        $this->load->view('layout/wrapper', $data);
    }
    
    public function cari()
    {
        if (isset($_POST['search'])) {
            $data['ringkasan'] = $this->input->post('cari');
            // set session userdata untuk pencarian, untuk paging pencarian
            $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
        } else {
            $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
        }
        
        $this->db->like('nama_mahasiswa', $data['ringkasan']);
        $this->db->or_like('npm', $data['ringkasan']);
        $this->db->from('data_mhs');
                
        // pagination limit
        $pagination['base_url'] = base_url().'index.php/home/cari/';
        $pagination['total_rows'] =  $this->db->count_all_results();
        $pagination['per_page'] = "10";
        $pagination['uri_segment'] = 3;
        $pagination['num_links'] = 5;
        $pagination['first_link'] = 'First';
        $pagination['last_link'] = 'Last';
        $pagination['next_link'] = 'Next ';
        $pagination['prev_link'] = 'Previous ';

        $this->pagination->initialize($pagination);

        $data['hasil_pencarian'] = $this->pdpt_model->cari_data($pagination['per_page'], $this->uri->segment(3, 0), $data['ringkasan']);
                
        $this->load->vars($data);
        $data=array('title'=>'Pencarian Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                            'isi'  =>'home/hasil_pencarian',
                            'jumlah_data'  => $pagination['total_rows'],
                            'kata_kunci'  => $data['ringkasan']
                            
                        );
        
        $this->load->view('layout/wrapper', $data);
    }
    
    public function details($npm)
    {
        $data=array('title'=>'Pencarian Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
                    'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
                    'data_foto'  =>$this->pdpt_model->get_data_foto($npm),
                    'isi'  =>'home/detail_mahasiswa'
                        );
    
        $this->load->view('layout/wrapper', $data);
    }
    
    public function download()
    {
        $data=array('title'=>'Download Dokumen PDPT - Pangkalan Data Pendidikan Tinggi',
                    'isi'  =>'home/download_view'
                        );
    
        $this->load->view('layout/wrapper', $data);
    }
    
    public function download_dokumen()
    {
        $name = 'Formulir PDPT.docx';
        $data = file_get_contents('assets/dokumen/formulir_pdpt.docx');
        
        force_download($name, $data);
    }
}
