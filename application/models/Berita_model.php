<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function get_all()
    {
        $this->db->where('status_berita', 'Publish');
        return $this->db->get('berita');
    }

    public function get_by_slug($slug)
    {
        $this->db->where('slug', $slug);
        return $this->get_all()->row_array();
    }

    public function get_five_latest()
    {
        $limit = 5;
        $offset = 0;
        return $this->paginate($limit, $offset);
    }

    public function paginate($limit, $offset)
    {

        $this->db->order_by('id_berita', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->get_all()->result_array();
    }
    
}
