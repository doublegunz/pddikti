<?php
class Login_model extends CI_Model {
/* Bismillahirrahmanirrahim.. */
	
	/* login */
	function cek_data($username,$password)
	{
		$this->db->where('userpassword',$password);
		$this->db->where('username',$username);
		return $this->db->get('login');
		
	}
	
	function cek_hak_akses($username)
	{
		$this->db->where('username',$username);
		return $this->db->get('hak_akses');
		
	}

	function tampil_user()
	{
		$this->db->select('*');
		$this->db->from('login');
		return $this->db->get();
	}
	/* login end */
	
	/* Lupa Password */
	function reset_password($data, $condition)
	{
		
        $this->db->where($condition); 
        $this->db->update('login', $data); 
	}
	
	function cek_email($username,$email)
	{
		$this->db->where('useremail',$email);
		$this->db->where('username',$username);
		return $this->db->get('login');
		
	}

	public function get_user($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('login');
	}
	
}