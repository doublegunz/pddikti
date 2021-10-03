<?php

class Mahasiswa_model extends CI_Model
{
    public function create($mahasiswa)
    {
        return $this->db->insert('data_mhs', $mahasiswa);
    }

    public function get_all()
    {
        return $this->db->get('data_mhs');
    }

    public function search($keyword, $limit = null, $offset = null)
    {
        $this->db->like('nama_mahasiswa', $keyword);
        $this->db->or_like('npm', $keyword);

        if ($limit != null) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->get_all();
    }

    public function paginate($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get_all()->result_array();
    }

    public function get_by_npm($npm)
    {
        $this->db->where('npm', $npm);
        return $this->get_all()->row_array();
    }

    public function get_foto_by_npm($npm)
    {
        $this->db->where('npm', $npm);
        return $this->db->get('data_foto')->row_array();
    }
}
