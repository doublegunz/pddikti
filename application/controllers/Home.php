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
        $this->load->model('Mahasiswa_model', 'mahasiswa');
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
        $data = [
            'title' => 'Pencarian Data',
            'isi' => 'home/pencarian'
        ];

        $this->load->view('layout/wrapper', $data);
    }
    
    public function cari()
    {
        $search_result = $this->get_search_result();

        $data = [
            'title' => 'Pencarian Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
            'isi'  => 'home/hasil_pencarian',
            'jumlah_data'  => $search_result['total_row'],
            'kata_kunci'  => $search_result['keyword'],
            'hasil_pencarian' => $search_result['result']
        ];
        
        $this->load->view('layout/wrapper', $data);
    }

    private function get_search_result()
    {
        if (isset($_POST['search'])) {
            $keyword = $this->input->post('cari');
            $this->session->set_userdata('search_keyword', $keyword);
        } else {
            $keyword = $this->session->userdata('search_keyword');
        }

        $total_row = $this->mahasiswa->search($keyword)->num_rows();
        $base_url = site_url('home/cari');
        $per_page = 10;
        $config = $this->set_pagination_config($base_url, $total_row, $per_page);
        $search_result = $this->mahasiswa->search($keyword, $per_page, $this->uri->segment(3))
            ->result_array();

        $this->pagination->initialize($config);

        return [
            'keyword' => $keyword,
            'total_row' => $total_row,
            'result' => $search_result
        ];
    }
    
    public function details($npm)
    {
        $data = [
            'title' => 'Pencarian Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
            'data_mahasiswa'  => $this->mahasiswa->get_by_npm($npm),
            'data_foto'  => $this->mahasiswa->get_foto_by_npm($npm),
            'isi'  => 'home/detail_mahasiswa'
        ];
    
        $this->load->view('layout/wrapper', $data);
    }
    
    public function download()
    {
        $data = [
            'title' => 'Download Dokumen PDPT - Pangkalan Data Pendidikan Tinggi',
            'isi'  => 'home/download_view'
        ];
    
        $this->load->view('layout/wrapper', $data);
    }
    
    public function download_dokumen()
    {
        $name = 'Formulir PDPT.docx';
        $data = file_get_contents('assets/dokumen/formulir_pdpt.docx');
        
        force_download($name, $data);
    }
}
