<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpeminjamanModel extends CI_Model
{
    public function get_laporanpeminjaman()
    {
        return $this->db->get('peminjaman')
            ->result();
    }
    public function update_laporanpeminjaman() {
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jekel = $this->input->post('jekel');
	    $ruangan = $this->input->post('ruangan');   

        $data = array(
            'nama_pasien' => $nama_pasien,
            'tgl_lahir' => $tgl_lahir,
            'jekel' => $jekel,
            'ruangan' => $ruangan
            );

        $this->db->where('no_rm', $no_rm)
                 ->update('peminjaman', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    } 
    public function delete_laporanpeminjaman($no_rm) {
        return $this->db->where('no_rm', $no_rm)
                        ->delete('peminjaman');
    }
}