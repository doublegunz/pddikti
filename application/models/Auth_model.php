<?php

class Auth_model extends CI_Model
{
    public function create_user($user)
    {
        return $this->db->insert('login', $user);
    }

    public function assign_role_access($data)
    {
        return $this->db->insert('hak_akses', $data);
    }
}