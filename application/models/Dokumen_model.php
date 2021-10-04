<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('dokumen');
    }

    public function paginate($limit, $offset)
    {
        $this->db->order_by('id', 'DESC');
        return $this->get_all()->result_array();
    }

    public function create($document)
    {
        return $this->db->insert('dokumen', $document);
    }
}
