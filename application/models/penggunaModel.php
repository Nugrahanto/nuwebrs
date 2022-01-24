<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penggunaModel extends CI_Model
{
    public function get_level()
    {
        return $this->db->get('tb_level')
                    ->result();
    }

    public function do_insert()
    {
        $level = $this->input->post('level');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $notelp = $this->input->post('notelp');

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
            'id_petugas' => NULL,
            'id_level' => $level,
            'nama_petugas' => $nama,
            'username' => $username,
            'password' => $passwordhash,
            'telp' => $notelp,
            'status' => 1
        );
        $this->db->insert('tb_petugas', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
