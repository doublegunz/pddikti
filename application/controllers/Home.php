<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model', 'berita');
        $this->load->library('pagination');
        $this->load->helper('download');
        $this->load->model('pdpt_model');
    }
    
    public function index()
    {
        $berita = $this->get_paginate_berita();
        
        $data = [
            'title' => 'PDPT - Pangkalan Data Pendidikan Tinggi',
            'berita'=> $berita,
            'isi' => 'home/index_home'
        ];
                        
        $this->load->view('layout/wrapper', $data);
    }

    private function get_paginate_berita()
    {
        $total_row = $this->berita->get_all()->num_rows();
        $base_url = site_url('home/index');
        $per_page = 5;

        $config = $this->set_pagination_config($base_url, $total_row, $per_page);
        $berita = $this->berita->paginate($per_page, $this->uri->segment('3'));
        $this->pagination->initialize($config);

        return $berita;
    }

    private function set_pagination_config($base_url, $total_row, $per_page)
    {
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_row;
        $config['per_page'] = $per_page;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next ';
        $config['prev_link'] = 'Previous ';
        $config['attributes'] = array('class' => 'pagination');

        return $config;

    }
    
    // Read berita
    public function read($read)
    {
        $berita_terbaru = $this->berita->get_five_latest();
        $berita	= $this->berita->get_by_slug($read);

        $data = [
            'title' => $berita['judul'],
            'berita_terbaru' => $berita_terbaru,
            'berita' => $berita,
            'isi' => 'home/read_view'
        ];

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
        $pagination['per_page'] = 10;
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
