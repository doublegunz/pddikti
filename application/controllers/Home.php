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
