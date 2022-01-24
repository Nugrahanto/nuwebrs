<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpenggunaModel extends CI_Model
{
    public function get_laporanpengguna()
    {
        return $this->db->join('tb_level', 'tb_level.id_level = tb_petugas.id_level')
                ->get('tb_petugas')
                ->result();
    }

    public function get_level()
    {
        return $this->db->get('tb_level')
                    ->result();
    }

    public function update_laporanpengguna() 
    {
        $id_pengguna = $this->input->post('id_pengguna');
        $level = $this->input->post('level');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $notelp = $this->input->post('notelp');
        $status = $this->input->post('status');

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
            'id_level' => $level,
            'nama_petugas' => $nama,
            'username' => $username,
            'password' => $passwordhash,
            'telp' => $notelp,
            'status' => $status
            );

        $this->db->where('id_petugas', $id_pengguna)
                 ->update('tb_petugas', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }
    public function delete_laporanpengguna($id_pengguna) 
    {
        return $this->db->where('id_petugas', $id_pengguna)
                        ->delete('tb_petugas');
    }
}