<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
	var $gallery_path;
    var $gallery_path_url;
	function __construct()	
	{
		parent::__construct();
		$this->gallery_path = realpath(APPPATH . '../assets/scan/');
		$this->gallery_path_url = base_url() . 'assets/scan/';
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
	
	function index() {
		$data=array('title'=>'Halaman Administrator - Pangkalan Data Pendidikan Tinggi',
					'isi'  =>'admin/dashboard/dashboard'
						);
		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	function logout()
	{
		$this->session->sess_destroy();// session_destroy, menghapus session   
		redirect('login');
	}
	
	/* start: Mahasiswa */
	
	//fungsi tampil mahasiswa
	function tampil_mahasiswa() 
	{
		$jumlah= $this->pdpt_model->jumlah_mahasiswa();

		$config['base_url'] = base_url().'index.php/admin_controller/tampil_mahasiswa/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10; 
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next ';
		$config['prev_link'] = 'Previous ';
		
		$dari = $this->uri->segment('3');	
		
		$query = $this->pdpt_model->data_mahasiswa($config['per_page'],$dari);
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa' => $query,
					'isi'  =>'admin/mahasiswa/view_mahasiswa',
					'jumlah_mahasiswa' => $jumlah
						);
		
		$this->pagination->initialize($config);
		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	function print_daftar_mahasiswa()
	{
		$jumlah= $this->pdpt_model->jumlah_mahasiswa();
		$query = $this->pdpt_model->data_mahasiswa($jumlah,0);
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa' => $query,
					'jumlah_mahasiswa' => $jumlah
						);
		
		$this->load->view('print/print_daftar_mahasiswa',$data);
	}
	
	
	function tambah_data() 
	{
		$this->form_validation->set_rules('npm', 'NPM', 'required|numeric|max_length[8]');
		$this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('nomor_ktp', 'No KTP', 'required');
		$this->form_validation->set_rules('alamat_rumah', 'alamat_rumah', 'required');
		$this->form_validation->set_rules('alamat_desa', 'alamat_rumah', 'required');
		$this->form_validation->set_rules('alamat_kelurahan', 'alamat_rumah', 'required');
		$this->form_validation->set_rules('alamat_kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('alamat_kabupaten', 'Kabupaten', 'required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|numeric');
		$this->form_validation->set_rules('telepon_rumah', 'Telepon Rumah', 'required');
		$this->form_validation->set_rules('telepon_genggam', 'HP', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
						'isi'  =>'admin/mahasiswa/tambah_mahasiswa'					
							);
			$this->load->view('admin/layout/wrapper',$data);	
		}
		else
		{
			$npm 	= $this->input->post('npm');
			$email = $this->input->post('email');
			
			$data = array(
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
				);
			
			$data_user = array(
						'username' 	=> $npm,
						'userpassword'	=> md5($this->input->post('password')),
						'useremail'	=> $email
					);
					
			$data_akses = array(
						'username' 	=> $npm,
						'hak_akses'	=> 'user'
					);
					
				
			$this->pdpt_model->add_mahasiswa($data);
			$this->pdpt_model->add_user($data_user);
			$this->pdpt_model->hak_akses($data_akses);
			redirect(base_url().'index.php/admin_controller/tampil_mahasiswa/');
			
		}
	}
	
	function edit_data_mahasiswa($npm) 
	{
		$this->session->set_userdata('npm', $npm);
		redirect(base_url().'index.php/admin_controller/edit_data');
	}
	
	function edit_data() 
	{
		$npm = $this->session->userdata('npm');
		
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
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Edit Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'isi'  =>'admin/mahasiswa/edit_mahasiswa'	
						);
	
			$this->load->view('admin/layout/wrapper',$data);	
		}
		else
		{
			
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
			redirect(base_url().'index.php/admin_controller/tampil_mahasiswa/');
		}
	}
	
	
	function konfirmasi_delete($npm)
	{
		$data=array('title'=>'Konfirmasi Delete Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
							'npm'  =>$npm,
							'isi'  =>'admin/mahasiswa/konfirmasi_delete'								
						);
		
		$this->load->view('admin/layout/wrapper',$data);
		
	}
	
	function delete_data_mahasiswa($npm)
	{
		//Function yang dipanggil ketika ingin melakukan delete mahasiswa dari database
        $this->pdpt_model->delete_data_mahasiswa($npm);
		$this->pdpt_model->delete_data_ayah($npm);
		$this->pdpt_model->delete_data_ibu($npm);
		$this->pdpt_model->delete_data_wali($npm);
		$this->pdpt_model->delete_data_akademik($npm);
		$this->pdpt_model->delete_data_foto($npm);
		$this->pdpt_model->delete_data_kk($npm);
		$this->pdpt_model->delete_data_ktp($npm);
		$this->pdpt_model->delete_data_ktm($npm);
		$this->pdpt_model->delete_data_akses($npm);
		$this->pdpt_model->delete_data_login($npm);
		redirect(base_url().'index.php/admin_controller/tampil_mahasiswa/');
	}
	
	function cari()
	{
		if (isset($_POST['search'])) 
		{
            $data['ringkasan'] = $this->input->post('cari');
            // set session userdata untuk pencarian, untuk paging pencarian
            $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
        }
        else 
		{
            $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
        }
		
			$this->db->like('nama_mahasiswa', $data['ringkasan']);
			$this->db->or_like('npm', $data['ringkasan']);
			$this->db->from('data_mhs');
			
            $pagination['base_url'] = base_url().'index.php/admin_controller/cari/';
            $pagination['total_rows'] = $this->db->count_all_results();
            $pagination['per_page'] = "10";
            $pagination['uri_segment'] = 3;
            $pagination['num_links'] = 5;
			$pagination['first_link'] = 'First';
			$pagination['last_link'] = 'Last';
			$pagination['next_link'] = 'Next ';
			$pagination['prev_link'] = 'Previous ';

            $this->pagination->initialize($pagination);

            $data['hasil_pencarian'] = $this->pdpt_model->cari_data($pagination['per_page'],$this->uri->segment(3,0),$data['ringkasan']);

            $this->load->vars($data);
            $data=array('title'=>'Pencarian Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
						'isi'  =>'admin/mahasiswa/hasil_cari'	
					);
		
			$this->load->view('admin/layout/wrapper',$data);
		        	
	}
	
	function details($npm)
	{
		$this->session->set_userdata('npm', $npm);
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_foto'  =>$this->pdpt_model->get_data_foto($npm),
					'isi'  =>'admin/mahasiswa/detail_mahasiswa'	
						);
	
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	function print_data_mahasiswa()
	{
		$npm = $this->session->userdata('npm');
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
	
		$this->load->view('print/print_detail_mahasiswa',$data);
	}
	
	function print_data($npm)
	{
		$this->session->set_userdata('npm',$npm);
		redirect('admin_controller/print_data_mahasiswa');
	}
	
	function orangtua_mahasiswa()
	{
		$npm = $this->session->userdata('npm');
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_ayah'  =>$this->pdpt_model->get_data_ayah($npm),
					'data_ibu'  =>$this->pdpt_model->get_data_ibu($npm),
					'isi'  =>'admin/mahasiswa/tampil_orangtua'	
						);
	
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	
	function tambah_data_orangtua()
	{
		$npm = $this->session->userdata('npm');
		
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
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
						'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
						'isi'  =>'admin/mahasiswa/tambah_data_orangtua'					
							);
			$this->load->view('admin/layout/wrapper',$data);	
		}
		else
		{
			$data_ayah = array(
					'npm' => $this->session->userdata('npm'),
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
					'npm' => $this->session->userdata('npm'),
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
			redirect(base_url().'index.php/admin_controller/orangtua_mahasiswa');
		}
	}
	
	function tambah_data_ibu()
	{
		$npm = $this->session->userdata('npm');
		
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
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
						'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
						'isi'  =>'admin/mahasiswa/tambah_data_ibu'					
							);
			$this->load->view('admin/layout/wrapper',$data);	
		}
		else
		{
				
		$data_ibu = array(
					'npm' => $npm = $this->session->userdata('npm'),
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
			redirect(base_url().'index.php/admin_controller/details/'.$this->session->userdata('npm'));
		}
	}
	
	function tambah_data_ayah()
	{
		$npm = $this->session->userdata('npm');
		
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
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
						'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
						'isi'  =>'admin/mahasiswa/tambah_data_ayah'					
							);
			$this->load->view('admin/layout/wrapper',$data);	
		}
		else
		{
			$data_ayah = array(
				'npm' => $npm = $this->session->userdata('npm'),
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
			redirect(base_url().'index.php/admin_controller/details/'.$this->session->userdata('npm'));
		}
	}
	
	function edit_data_orangtua()
	{
		$npm = $this->session->userdata('npm');
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_ayah'  =>$this->pdpt_model->get_data_ayah($npm),
					'data_ibu'  =>$this->pdpt_model->get_data_ibu($npm),
					'isi'  =>'admin/mahasiswa/form_data_orangtua'	
						);
		if (($data['data_ayah'] == NULL) AND ($data['data_ibu'] == NULL))
		{
			$this->tambah_data_orangtua();
		}
		else
		{
			$this->load->view('admin/layout/wrapper',$data);
		}
		
	}
	
	function edit_ayah_ibu()
	{
		$npm = $this->session->userdata('npm');
		
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
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_ayah'  =>$this->pdpt_model->get_data_ayah($npm),
					'data_ibu'  =>$this->pdpt_model->get_data_ibu($npm),
					'isi'  =>'admin/mahasiswa/form_data_orangtua'	
						);
	
		$this->load->view('admin/layout/wrapper',$data);
		}
		else
		{
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
						
			$condition['npm'] = $this->input->post('npm');
			$this->pdpt_model->edit_data_ayah($data_ayah, $condition);
			$this->pdpt_model->edit_data_ibu($data_ibu, $condition);
			
			redirect(base_url().'index.php/admin_controller/orangtua_mahasiswa/'.$condition['npm']);
		}
		
	}
	
	function wali_mahasiswa()
	{
		$npm = $this->session->userdata('npm');
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_wali'  =>$this->pdpt_model->get_data_wali($npm),
					'isi'  =>'admin/mahasiswa/tampil_wali'	
						);
	
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	function tambah_data_wali()
	{
		$npm = $this->session->userdata('npm');
		
		$this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required');
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
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
						'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
						'isi'  =>'admin/mahasiswa/tambah_data_wali'					
							);
			$this->load->view('admin/layout/wrapper',$data);	
		}
		else
		{
			$data_wali = array(
					'npm' => $this->session->userdata('npm'),
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
			redirect(base_url().'index.php/admin_controller/details/'.$this->session->userdata('npm'));
		}
	}
	
	function edit_data_wali()
	{
		$npm = $this->session->userdata('npm');
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_wali'  =>$this->pdpt_model->get_data_wali($npm),
					'isi'  =>'admin/mahasiswa/form_data_wali'	
						);
	
		if (($data['data_wali'] == NULL))
		{
			$this->tambah_data_wali();
		}
		else
		{
			$this->load->view('admin/layout/wrapper',$data);
		}
	}
	
	function edit_wali()
	{
		$npm = $this->session->userdata('npm');
		
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
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_wali'  =>$this->pdpt_model->get_data_wali($npm),
					'isi'  =>'admin/mahasiswa/form_data_wali'	
						);
			$this->load->view('admin/layout/wrapper',$data);
		}
		else
		{
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
					
			$condition['npm'] = $npm;
			$this->pdpt_model->edit_data_wali($data_wali, $condition);
			redirect(base_url().'index.php/admin_controller/wali_mahasiswa/'.$condition['npm']);
		}
	}
	
	function tambah_data_akademik()
	{
		$npm = $this->session->userdata('npm');
		
		$this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('tanggal_awal_kuliah', 'Tanggal Awal Kuliah', 'required');
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
						'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
						'isi'  =>'admin/mahasiswa/tambah_data_akademik'					
							);
			$this->load->view('admin/layout/wrapper',$data);	
		}
		else
		{
			$masuk = $this->input->post('tanggal_awal_kuliah');
			$hari						=	0;
			$bulan						=	0;
			$tahun						=	0;
			
			$lulus = $this->input->post('tanggal_sidang_skripsi');
			if($lulus != NULL)
			{
				$akhir					=	explode('-',$lulus);
				$awal					=	explode('-',$masuk);
				$tg							=	$akhir['2'];
				$bl							=	$akhir['1'];
				$th							=	$akhir['0'];
				//
				$tg2						=	$awal['2'];
				$bl2						=	$awal['1'];
				$th2						=	$awal['0'];
				//
				$awal2						=	gregoriantojd($bl,$tg,$th);
				$akhir2						=	gregoriantojd($bl2,$tg2,$th2);
				$hari						=	$awal2-$akhir2;
				$bulan						=	$hari / 30;
				$tahun						=	$hari / 365;
			}
			
			$data_akademik = array(
					'npm' => $npm = $this->session->userdata('npm'),
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
			redirect(base_url().'index.php/admin_controller/details/'.$this->session->userdata('npm'));
		}
	}
	
	function data_akademik()
	{
		$npm = $this->session->userdata('npm');
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_akademik'  =>$this->pdpt_model->get_data_akademik($npm),
					'isi'  =>'admin/mahasiswa/tampil_data_akademik'	
						);
	
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	function edit_data_akademik()
	{
		$npm = $this->session->userdata('npm');
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_akademik'  =>$this->pdpt_model->get_data_akademik($npm),
					'isi'  =>'admin/mahasiswa/edit_data_akademik'	
						);
	
		if ($data['data_akademik'] == NULL)
		{
			$this->tambah_data_akademik();
		}
		else
		{
			$this->load->view('admin/layout/wrapper',$data);
		}
	}
	
	function edit_akademik()
	{
		$this->form_validation->set_rules('program_studi', 'Program Studi', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('tanggal_awal_kuliah', 'Tanggal Awal Kuliah', 'required');
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_akademik'  =>$this->pdpt_model->get_data_akademik($npm),
					'isi'  =>'admin/mahasiswa/edit_data_akademik'	
						);
			$this->load->view('admin/layout/wrapper',$data);
		}
		else
		{
			$masuk = $this->input->post('tanggal_awal_kuliah');
			$lulus = $this->input->post('tanggal_sidang_skripsi');
			if(($lulus == '0000-00-00') OR ($lulus == NULL))
			{
				$hari						=	0;
				$bulan						=	0;
				$tahun						=	0;
			}
			else
			{
				$akhir					=	explode('-',$lulus);
				$awal					=	explode('-',$masuk);
				$tg							=	$akhir['2'];
				$bl							=	$akhir['1'];
				$th							=	$akhir['0'];
				//
				$tg2						=	$awal['2'];
				$bl2						=	$awal['1'];
				$th2						=	$awal['0'];
				//
				$awal2						=	gregoriantojd($bl,$tg,$th);
				$akhir2						=	gregoriantojd($bl2,$tg2,$th2);
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
			
			
			$condition['npm'] = $this->session->userdata('npm');
			$this->pdpt_model->edit_data_akademik($data_akademik, $condition);
			redirect(base_url().'index.php/admin_controller/data_akademik/'.$this->session->userdata('npm'));
		}
	}
	
	function lampiran()
	{
		$npm = $this->session->userdata('npm');
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'data_foto'  =>$this->pdpt_model->get_data_foto($npm),
					'data_kk'  =>$this->pdpt_model->get_data_kk($npm),
					'data_ktp'  =>$this->pdpt_model->get_data_ktp($npm),
					'data_ktm'  =>$this->pdpt_model->get_data_ktm($npm),
					'isi'  =>'admin/mahasiswa/lampiran'	
						);
	
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	function unggah_foto() 
	{
		$npm 	= $this->input->post('npm');
		if($this->input->post('submit')) 
		{
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
			redirect(base_url().'index.php/admin_controller/details/'.$npm);
		}
	}
	
	function unggah_kk() 
	{
		$npm 	= $this->input->post('npm');
		if($this->input->post('submit')) 
		{
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
			redirect(base_url().'index.php/admin_controller/details/'.$npm);
		}
	}
	
	function unggah_ktp() 
	{
		$npm 	= $this->input->post('npm');
		if($this->input->post('submit')) 
		{
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
			redirect(base_url().'index.php/admin_controller/details/'.$npm);
		}
	}
	
	function unggah_ktm() 
	{
		$npm 	= $this->input->post('npm');
		if($this->input->post('submit')) 
		{
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
			redirect(base_url().'index.php/admin_controller/details/'.$npm);
		}
	}
	
	function edit_foto_mahasiswa() 
	{
		$npm 	= $this->input->post('npm');
		if($this->input->post('submit')) 
		{
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
			redirect(base_url().'index.php/admin_controller/details/'.$npm);
		}
	}
	
	function edit_kk() 
	{
		$npm 	= $this->input->post('npm');
		if($this->input->post('submit')) 
		{
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
			redirect(base_url().'index.php/admin_controller/details/'.$npm);
		}
	}
	
	function edit_ktp() 
	{
		$npm 	= $this->input->post('npm');
		if($this->input->post('submit')) 
		{
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
			redirect(base_url().'index.php/admin_controller/details/'.$npm);
		}
	}
	
	function edit_ktm() 
	{
		$npm 	= $this->input->post('npm');
		if($this->input->post('submit')) 
		{
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
			redirect(base_url().'index.php/admin_controller/details/'.$npm);
		}
	}
	
	function tampil_orangtua_wali() 
	{
		$jumlah= $this->pdpt_model->jumlah_mahasiswa();

		$config['base_url'] = base_url().'index.php/admin_controller/tampil_orangtua_wali/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10; 
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next ';
		$config['prev_link'] = 'Previous ';
		
		$dari = $this->uri->segment('3');	
		
		$query = $this->pdpt_model->data_mahasiswa($config['per_page'],$dari);
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa' => $query,
					'isi'  =>'admin/mahasiswa/view_orangtua_wali'
						);
		
		$this->pagination->initialize($config);
		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	function orangtua_wali_tampil($npm)
	{
		$this->session->set_userdata('npm', $npm);
		redirect(base_url().'index.php/admin_controller/orangtua_mahasiswa');
	}
	
	function orangtua_wali_edit($npm)
	{
		$this->session->set_userdata('npm', $npm);
		redirect(base_url().'index.php/admin_controller/edit_data_orangtua');
	}
	
	function konfirmasi_delete2($npm)
	{
		$data=array('title'=>'Konfirmasi Delete Data Ayah Mahasiswa - Pangkalan Data Pendidikan Tinggi',
							'npm'  =>$npm,
							'isi'  =>'admin/mahasiswa/konfirmasi_delete2'								
						);
		
		$this->load->view('admin/layout/wrapper',$data);
		
	}
	
	function delete_data_ayah($npm)
	{
		
		$this->pdpt_model->delete_data_ayah($npm);
		redirect(base_url().'index.php/admin_controller/tampil_orangtua_wali');
	}
	
	function konfirmasi_delete3($npm)
	{
		$data=array('title'=>'Konfirmasi Delete Data Ayah Mahasiswa - Pangkalan Data Pendidikan Tinggi',
							'npm'  =>$npm,
							'isi'  =>'admin/mahasiswa/konfirmasi_delete3'								
						);
		
		$this->load->view('admin/layout/wrapper',$data);
		
	}
	
	function delete_data_ibu($npm)
	{
		
		$this->pdpt_model->delete_data_ibu($npm);
		redirect(base_url().'index.php/admin_controller/tampil_orangtua_wali');
	}
	
	function orangtua_wali_tampil2($npm)
	{
		$this->session->set_userdata('npm', $npm);
		redirect(base_url().'index.php/admin_controller/wali_mahasiswa');
	}
	
	function orangtua_wali_edit2($npm)
	{
		$this->session->set_userdata('npm', $npm);
		redirect(base_url().'index.php/admin_controller/edit_data_wali');
	}
	
	function konfirmasi_delete4($npm)
	{
		$data=array('title'=>'Konfirmasi Delete Data Ayah Mahasiswa - Pangkalan Data Pendidikan Tinggi',
							'npm'  =>$npm,
							'isi'  =>'admin/mahasiswa/konfirmasi_delete4'								
						);
		
		$this->load->view('admin/layout/wrapper',$data);
		
	}
	
	function delete_data_wali($npm)
	{
		
		$this->pdpt_model->delete_data_wali($npm);
		redirect(base_url().'index.php/admin_controller/tampil_orangtua_wali');
	}
	
	function tampil_akademik_lampiran() 
	{
		$jumlah= $this->pdpt_model->jumlah_mahasiswa();

		$config['base_url'] = base_url().'index.php/admin_controller/tampil_akademik_lampiran/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10; 
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next ';
		$config['prev_link'] = 'Previous ';
		
		$dari = $this->uri->segment('3');	
		
		$query = $this->pdpt_model->data_mahasiswa($config['per_page'],$dari);
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa' => $query,
					'isi'  =>'admin/mahasiswa/tampil_akademik_lampiran'
						);
		
		$this->pagination->initialize($config);
		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	function tampil_akademik($npm)
	{
		$this->session->set_userdata('npm', $npm);
		redirect(base_url().'index.php/admin_controller/data_akademik');
	}
	
	function edit_akademik2($npm)
	{
		$this->session->set_userdata('npm', $npm);
		redirect(base_url().'index.php/admin_controller/edit_data_akademik');
	}
	
	function konfirmasi_delete5($npm)
	{
		$data=array('title'=>'Konfirmasi Delete Data Akademik Mahasiswa - Pangkalan Data Pendidikan Tinggi',
							'npm'  =>$npm,
							'isi'  =>'admin/mahasiswa/konfirmasi_delete5'								
						);
		
		$this->load->view('admin/layout/wrapper',$data);
		
	}
	
	function delete_data_akademik($npm)
	{
		$this->pdpt_model->delete_data_akademik($npm);
		redirect(base_url().'index.php/admin_controller/tampil_akademik_lampiran/');
	}
	
	function tampil_lampiran($npm)
	{
		$this->session->set_userdata('npm', $npm);
		redirect(base_url().'index.php/admin_controller/lampiran');
	}
	
	function konfirmasi_delete6($npm)
	{
		$data=array('title'=>'Konfirmasi Delete Data Akademik Mahasiswa - Pangkalan Data Pendidikan Tinggi',
							'npm'  =>$npm,
							'isi'  =>'admin/mahasiswa/konfirmasi_delete6'								
						);
		
		$this->load->view('admin/layout/wrapper',$data);
		
	}
	
	function delete_lampiran($npm)
	{
		$this->pdpt_model->delete_data_kk($npm);
		$this->pdpt_model->delete_data_ktp($npm);
		$this->pdpt_model->delete_data_ktm($npm);
		redirect(base_url().'index.php/admin_controller/tampil_akademik_lampiran/');
	}

	/* end: Mahasiswa */
	
	/* start: Manajemen User */	
	function manajemen_user() 
	{
		$jumlah= $this->pdpt_model->jumlah_mahasiswa();

		$config['base_url'] = base_url().'index.php/admin_controller/manajemen_user/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10; 
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next ';
		$config['prev_link'] = 'Previous ';
		
		$dari = $this->uri->segment('3');	
		
		$query = $this->pdpt_model->data_mahasiswa($config['per_page'],$dari);
		$data=array('title'=>'Manajemen Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa' => $query,
					'isi'  =>'admin/mahasiswa/user'
						);
		
		$this->pagination->initialize($config);
		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	function ubah_pass($npm)
	{
		$this->session->set_userdata('npm',$npm);
		redirect('admin_controller/ubah_password');
	}
	
	function ubah_password() 
	{
		$npm = $this->session->userdata('npm');
		
		$this->form_validation->set_rules('pass_baru', 'Password', 'required');
		$this->form_validation->set_rules('pass_conf', 'Password Confirmation', 'required|matches[pass_baru]');
		
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Edit Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
					'data_mahasiswa'  =>$this->pdpt_model->get_data($npm),
					'isi'  =>'admin/mahasiswa/ubah_password'	
						);
	
			$this->load->view('admin/layout/wrapper',$data);	
		}
		else
		{
			
			$data_user['userpassword'] = md5($this->input->post('pass_baru'));
			
			$kondisi['username'] = $npm;
			$kondisi['useremail'] = $this->input->post('email');
			$this->pdpt_model->edit_user($data_user, $kondisi);
			$this->session->unset_userdata('npm');
			redirect(base_url().'index.php/admin_controller/manajemen_user');
		}
	}
	
	function konfirmasi_delete7($npm)
	{
		$data=array('title'=>'Konfirmasi Delete Data Mahasiswa - Pangkalan Data Pendidikan Tinggi',
							'npm'  =>$npm,
							'isi'  =>'admin/mahasiswa/konfirmasi_delete7'								
						);
		
		$this->load->view('admin/layout/wrapper',$data);
		
	}
	
	function delete_data_user($npm)
	{
        $this->pdpt_model->delete_data_mahasiswa($npm);
		$this->pdpt_model->delete_data_ayah($npm);
		$this->pdpt_model->delete_data_ibu($npm);
		$this->pdpt_model->delete_data_wali($npm);
		$this->pdpt_model->delete_data_akademik($npm);
		$this->pdpt_model->delete_data_foto($npm);
		$this->pdpt_model->delete_data_kk($npm);
		$this->pdpt_model->delete_data_ktp($npm);
		$this->pdpt_model->delete_data_ktm($npm);
		$this->pdpt_model->delete_data_akses($npm);
		$this->pdpt_model->delete_data_login($npm);
		redirect(base_url().'index.php/admin_controller/manajemen_user/');
	}
	/* end: Manajemen User */
	
	/* start: Berita */
	
	//fungsi tampil berita
	function tampil_berita() 
	{
		$jumlah= $this->pdpt_model->jumlah();

		$config['base_url'] = base_url().'index.php/admin_controller/tampil_berita/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next ';
		$config['prev_link'] = 'Previous ';
		$config['attributes'] = array('class' => 'pagination');
		
		$dari = $this->uri->segment('3');	
		
		$query = $this->pdpt_model->data_berita($config['per_page'],$dari);
		$data=array('title'=>'Manajemen Berita - Pangkalan Data Pendidikan Tinggi',
					'berita' => $query,
					'isi'  =>'admin/berita/berita_view'
						);
		
		$this->pagination->initialize($config);
		$this->load->view('admin/layout/wrapper',$data);	
	}
	
	
	// fungsi tambah berita
	function tambah() 
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('nama', 'Nama Penulis', 'required');
		$this->form_validation->set_rules('isi', 'Isi berita', 'required');
		if ($this->form_validation->run() === FALSE) 
		{
			$data=array('title'=>'Menambah Berita - Pangkalan Data Pendidikan Tinggi',
						'isi'  =>'admin/berita/tambah_berita'					
							);
			$this->load->view('admin/layout/wrapper',$data);	
		}
		else
		{
			$slug = url_title($this->input->post('judul'), 'dash', TRUE);
			$data = array(
						'judul' 	=> $this->input->post('judul'),
						'slug'		=> $slug,
						'nama'	=> $this->input->post('nama'),
						'isi' 		=> $this->input->post('isi'),
						'status_berita'	=> $this->input->post('status_berita'),
						'id_user'	=> $this->input->post('id_user')
					);
			$this->pdpt_model->tambah($data);
			redirect(base_url().'index.php/admin_controller/tampil_berita/');
		}
	}
	
	function edit($id) 
	{	
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi berita', 'required');
		$this->form_validation->set_rules('nama', 'Nama Penulis', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$data['berita'] = $this->pdpt_model->detail_berita();
			$data['detail']	= $this->pdpt_model->detail_berita($id);
			$data=array('title'		=> 'Mengubah berita: '.$data['detail']['judul'],
						'berita'	=> $this->pdpt_model->detail_berita(),
						'detail' 	=> $this->pdpt_model->detail_berita($id),
						'isi'  		=>'admin/berita/edit_berita'
							);
			$this->load->view('admin/layout/wrapper',$data);
		}
		else
		{
			$slug = url_title($this->input->post('judul'), 'dash', TRUE);
			$data = array(
					'id_berita'	=> $this->input->post('id_berita'),
					'judul' 	=> $this->input->post('judul'),
					'slug'		=> $slug,
					'nama'	=> $this->input->post('nama'),
					'isi' 		=> $this->input->post('isi'),
					'status_berita'	=> $this->input->post('status_berita'),
					'id_user'	=> $this->input->post('id_user')
				);
			$this->pdpt_model->edit_berita($data);
			redirect(base_url().'index.php/admin_controller/tampil_berita/');
		}
	}
	
	// Menghapus berita
	function delete($id) {
		$this->pdpt_model->delete_berita($id);
		redirect(base_url().'index.php/admin_controller/tampil_berita/');
	}
	
	//fungsi untuk mempublikasi berita
	function publish($id)
	{
		$data['status_berita'] 	= 'Publish';
		$kondisi['id_berita'] = $id;
		
		$this->pdpt_model->publish_berita($data, $kondisi);
		
		redirect(base_url().'index.php/admin_controller/tampil_berita/');
	}
	/* end: Berita */
}