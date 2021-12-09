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
        $id_peminjaman = $this->input->post('id_peminjaman');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
        $jekel = $this->input->post('jekel');
	    $ruangan = $this->input->post('ruangan');   

        $data = array(
            'nama_pasien' => $nama_pasien,
            'tgl_lahir' => $tgl_lahir,
            'jekel' => $jekel,
            'ruangan' => $ruangan
            );

        $this->db->where('id_peminjaman', $id_peminjaman)
                 ->update('peminjaman', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    } 
    public function delete_laporanpeminjaman($id_peminjaman) {
        return $this->db->where('id_peminjaman', $id_peminjaman)
                        ->delete('peminjaman');
    }
}