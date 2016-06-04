<?php
class Pdpt_model extends CI_Model {
	
	/* start: Mahasiswa Model */
	function jumlah_mahasiswa()
	{
		return $this->db->get('data_mhs')->num_rows();
	}
	
	function data_mahasiswa($sampai,$dari)
	{
		$this->db->order_by('npm','ASC');
		return $this->db->get('data_mhs',$sampai,$dari)->result_array();
		
	}
	
	function add_mahasiswa($data) 
	{
		return $this->db->insert('data_mhs', $data);
	}
	
	function add_kk($data) 
	{
		return $this->db->insert('data_kk', $data);
	}
	
	function add_ktp($data) 
	{
		return $this->db->insert('data_ktp', $data);
	}
	
	function add_ktm($data) 
	{
		return $this->db->insert('data_ktm', $data);
	}
	
	function add_foto($data) 
	{
		return $this->db->insert('data_foto', $data);
	}
	
	function get_data($npm)
	{
		$this->db->where('npm', $npm); 
        $this->db->select("*");
        $this->db->from('data_mhs');
        
        return $this->db->get()->row_array();
	}
	
	public function add_data_ayah($data) 
	{
		return $this->db->insert('data_ayah', $data);
	}
	
	public function add_data_ibu($data) 
	{
		return $this->db->insert('data_ibu', $data);
	}
	
	public function add_data_wali($data) 
	{
		return $this->db->insert('data_wali', $data);
	}
	
	public function add_data_akademik($data) 
	{
		return $this->db->insert('data_akademik', $data);
	}
	
	
	function get_data_foto($npm)
	{
		$this->db->where('npm', $npm); 
        $this->db->select("*");
        $this->db->from('data_foto');
        
        return $this->db->get()->row_array();
	}
	
	function get_data_kk($npm)
	{
		$this->db->where('npm', $npm); 
        $this->db->select("*");
        $this->db->from('data_kk');
        
        return $this->db->get()->row_array();
	}
	
	function get_data_ktp($npm)
	{
		$this->db->where('npm', $npm); 
        $this->db->select("*");
        $this->db->from('data_ktp');
        
        return $this->db->get()->row_array();
	}
	
	function get_data_ktm($npm)
	{
		$this->db->where('npm', $npm); 
        $this->db->select("*");
        $this->db->from('data_ktm');
        
        return $this->db->get()->row_array();
	}
	
	function get_data_ayah($npm)
	{
		$this->db->where('npm', $npm); 
        $this->db->select("*");
        $this->db->from('data_ayah');
        
        return $this->db->get()->row_array();
	}
	
	function get_data_wali($npm)
	{
		$this->db->where('npm', $npm); 
        $this->db->select("*");
        $this->db->from('data_wali');
        
        return $this->db->get()->row_array();
	}
	
	function get_data_ibu($npm)
	{
		$this->db->where('npm', $npm); 
        $this->db->select("*");
        $this->db->from('data_ibu');
        
        return $this->db->get()->row_array();
	}
	
	function get_data_akademik($npm)
	{
		$this->db->where('npm', $npm); 
        $this->db->select("*");
        $this->db->from('data_akademik');
        
        return $this->db->get()->row_array();
	}
	
	function edit_data($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('data_mhs', $data); 
	}
	
	function edit_data_foto($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('data_foto', $data); 
	}
	
	function edit_data_kk($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('data_kk', $data); 
	}
	
	function edit_data_ktp($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('data_ktp', $data); 
	}
	
	function edit_data_ktm($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('data_ktm', $data); 
	}
	
	function edit_data_ayah($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('data_ayah', $data); 
	}
	
	function edit_data_ibu($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('data_ibu', $data); 
	}
	
	function edit_data_wali($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('data_wali', $data); 
	}
	
	function edit_data_akademik($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('data_akademik', $data); 
	}
	
	
	function delete_data_mahasiswa($npm)
	{
		
        $this->db->where('npm', $npm);
        $this->db->delete('data_mhs');
		
	}
	
	function delete_data_ayah($npm)
	{
		
        $this->db->where('npm', $npm);
        $this->db->delete('data_ayah');
		
	}
	
	function delete_data_ibu($npm)
	{
		
        $this->db->where('npm', $npm);
        $this->db->delete('data_ibu');
		
	}
	
	function delete_data_wali($npm)
	{
		
        $this->db->where('npm', $npm);
        $this->db->delete('data_wali');
		
	}
	
	function delete_data_akademik($npm)
	{
		
        $this->db->where('npm', $npm);
        $this->db->delete('data_akademik');
		
	}
	
	function delete_data_foto($npm)
	{
		
        $this->db->where('npm', $npm);
        $this->db->delete('data_foto');
		
	}
	
	function delete_data_kk($npm)
	{
		
        $this->db->where('npm', $npm);
        $this->db->delete('data_kk');
		
	}
	
	function delete_data_ktp($npm)
	{
		
        $this->db->where('npm', $npm);
        $this->db->delete('data_ktp');
		
	}
	
	function delete_data_ktm($npm)
	{
		
        $this->db->where('npm', $npm);
        $this->db->delete('data_ktm');
		
	}
	
	function delete_data_akses($username)
	{
		
        $this->db->where('username', $username);
        $this->db->delete('hak_akses');
		
	}
	
	function delete_data_login($username)
	{
		
        $this->db->where('username', $username);
        $this->db->delete('login');
		
	}
	
	function cek_data_pencarian($ringkasan)
	{
		$this->db->like('nama_mahasiswa', $ringkasan);
		$this->db->or_like('npm', $ringkasan);
		return $this->db->get('data_mhs');
	}
	
	function cari_data($perPage, $uri, $ringkasan) 
	{
		$this->db->select('*');
        $this->db->from('data_mhs');
        if (!empty($ringkasan)) 
		{
            $this->db->like('nama_mahasiswa', $ringkasan);
			$this->db->or_like('npm', $ringkasan);
        }
            $this->db->order_by('id','asc');
            $getData = $this->db->get('', $perPage, $uri);

            if ($getData->num_rows() > 0)
                    return $getData->result_array();
            else
                return null;
    }
	
	/* start: user dan hak akses */
	function add_user($data) 
	{
		return $this->db->insert('login', $data);
	}
	
	function edit_user($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('login', $data); 
	}
	
	function hak_akses($data) 
	{
		return $this->db->insert('hak_akses', $data);
	}
	
	
	/* start: berita */
	//back end
	function jumlah()
	{
		return $this->db->get('berita')->num_rows();
	}
	
	function data_berita($sampai,$dari)
	{
		$this->db->order_by('id_berita','DESC');
		return $this->db->get('berita',$sampai,$dari)->result_array();	
	}
	
	function tambah($data) 
	{
		return $this->db->insert('berita', $data);
	}
	
	function detail_berita($id = FALSE) 
	{
		if ($id === FALSE)	
		{
			$query = $this->db->get('berita');
			return $query->result_array();
		}
		$query = $this->db->get_where('berita', array('id_berita' => $id));
		return $query->row_array();
	}
	
	function edit_berita($data) 
	{
		$this->db->where('id_berita', $data['id_berita']);
		return $this->db->update('berita', $data);
	}
	
	function publish_berita($data, $kondisi)
	{
        $this->db->where($kondisi); 
        $this->db->update('berita', $data); 
	}
	
	function delete_berita($id) 
	{
		$this->db->where('id_berita',$id);
		return $this->db->delete('berita');
	}
	
	//home
	function berita_home($sampai,$dari)
	{
		$this->db->where('status_berita','Publish');
		$this->db->order_by('id_berita','DESC');
		return $this->db->get('berita',$sampai,$dari)->result_array();	
	}
	
	function jumlah_berita()
	{
		$this->db->where('status_berita','Publish');
		return $this->db->get('berita')->num_rows();
	}
	
	function read_berita($slug = FALSE) 
	{
		$this->db->where('status_berita','Publish');
		if ($slug === FALSE)	
		{
			$this->db->limit(5,0);
			$this->db->order_by('id_berita','DESC');
			$query = $this->db->get('berita');
			return $query->result_array();
		}
		$query = $this->db->get_where('berita', array('slug' => $slug));
		return $query->row_array();
	}
	
	/* end: berita */
	
	/* end: dokumen */
	function add_dokumen($data) 
	{
		return $this->db->insert('dokumen', $data);
	}
	
	function jumlah_dokumen()
	{
		return $this->db->get('dokumen')->num_rows();
	}
	
	function data_dokumen($sampai,$dari)
	{
		$this->db->order_by('id','ASC');
		return $this->db->get('dokumen',$sampai,$dari)->result_array();
		
	}	
}