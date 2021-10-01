<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penggunaModel extends CI_Model
{

    public function do_insert()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $status = $this->input->post('status');

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
            'id_pengguna'  => NULL,
            'username'    => $username,
            'password'    => $passwordhash,
            'level'        => $level,
            'status'    => $status
        );
        $this->db->insert('pengguna', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
