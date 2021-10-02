<?php

class Mahasiswa_model extends CI_Model
{
    public function create($mahasiswa)
    {
        return $this->db->insert('data_mhs', $mahasiswa);
    }
}
