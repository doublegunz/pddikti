<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen extends CI_Controller {
	var $gallery_path;
    var $gallery_path_url;
	function __construct()	
	{
		parent::__construct();
		$this->gallery_path = realpath(APPPATH . '../assets/dokumen/');
		$this->gallery_path_url = base_url() . 'assets/dokumen/';
		$this->load->model('pdpt_model');
		$this->cek_session();
	}
	
	function cek_session()
	{
		if($this->session->userdata('username') == NULL)
		{ 
			redirect('login');
		}		
	}
	
	function index() 
	{
		$jumlah= $this->pdpt_model->jumlah_dokumen();

		$config['base_url'] = base_url().'index.php/dokumen/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10; 
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next ';
		$config['prev_link'] = 'Previous ';
		
		$dari = $this->uri->segment('3');	
		
		$query = $this->pdpt_model->data_dokumen($config['per_page'],$dari);
		$data=array('title'=>'Manajemen Data Dokumen - Pangkalan Data Pendidikan Tinggi',
					'data_dokumen' => $query,
					'isi'  =>'admin/dashboard/view_dokumen'
						);
		
		$this->pagination->initialize($config);
		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	function tambah_dokumen() 
	{
		$data=array('title'=>'Halaman Administrator - Pangkalan Data Pendidikan Tinggi',
					'isi'  =>'admin/dashboard/dokumen'
						);
		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	function unggah_dokumen()
	{
		if($this->input->post('submit')) 
		{
			$nama_dokumen = $this->input->post('nama_dokumen');
			$config = array(
							'allowed_types' => 'doc|docx',
							'upload_path' => $this->gallery_path,
							'max_size' => 2000,
							'file_name' => $nama_dokumen
							);

			$this->load->library('upload', $config);
			$this->upload->do_upload('dokumen');
			
					
			$data['nama_dokumen'] = $this->upload->file_name;
					
					
			$this->pdpt_model->add_dokumen($data);
			redirect(base_url().'index.php/dokumen');
		}
	}
}