<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	private $upload_path;
	
	public function __construct()	
	{
		parent::__construct();
		$this->upload_path = './public/file/';
		$this->load->model('dokumen_model', 'dokumen');
		$this->cek_session();
	}
	
	public function index() 
	{
		$documents = $this->get_paginate_documents();

		$data = [
			'title' => 'Manajemen Data Dokumen - Pangkalan Data Pendidikan Tinggi',
			'documents' => $documents,
			'isi'  => 'admin/dashboard/view_dokumen'
		];

		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	public function create() 
	{
		$data = [
			'title' => 'Halaman Administrator - Pangkalan Data Pendidikan Tinggi',
			'isi'  => 'admin/dashboard/dokumen'
		];

		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	public function upload()
	{
		if($this->input->post('submit')) 
		{
			$this->set_upload_config();

			if (!$this->upload->do_upload('dokumen')) {
				$error = $this->upload->display_errors();
				echo $error;
				echo anchor('dokumen/create', 'back');
			} else {
				$filename = $this->upload->file_name;

				$document = [
					'nama_dokumen' => $filename,
					'upload_path' => $this->upload_path . $filename
				];

				$this->dokumen->create($document);

				redirect('dokumen');
			}	
		}
	}

	private function set_upload_config()
	{
		$nama_dokumen = $this->input->post('nama_dokumen');
		$config = [
			'allowed_types' => 'doc|docx|pdf|xls|xlsx',
			'upload_path' => $this->upload_path,
			'max_size' => 2000,
			'file_name' => $nama_dokumen
		];

		$this->load->library('upload', $config);
	}

	private function cek_session()
	{
		if ($this->session->userdata('is_logged_in') == null) {
			redirect('login');
		}

		if ($this->session->userdata('role') != 'admin') {
			redirect('login/forbidden_access');
		}
	}

	private function get_paginate_documents()
	{
		$total_row = $this->dokumen->get_all()->num_rows();
		$base_url = site_url('dokumen/index');
		$per_page = 10;

		$config = $this->set_pagination_config($base_url, $total_row, $per_page);
		$dokumen = $this->dokumen->paginate($per_page, $this->uri->segment(3));
		$this->pagination->initialize($config);

		return $dokumen;
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
}