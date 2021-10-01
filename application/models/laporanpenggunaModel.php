<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpenggunaModel extends CI_Model
{
    public function get_laporanpengguna()
    {
        return $this->db->get('pengguna')
            ->result();
    } 
    public function update_laporanpengguna() 
    {
        $id_pengguna = $this->input->post('id_pengguna');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $status = $this->input->post('status');

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
            'username' => $username,
            'password' => $passwordhash,
            'level' => $level,
            'status' => $status
            );

        $this->db->where('id_pengguna', $id_pengguna)
                 ->update('pengguna', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }
    public function delete_laporanpengguna($id_pengguna) 
    {
        return $this->db->where('id_pengguna', $id_pengguna)
                        ->delete('pengguna');
    }
}