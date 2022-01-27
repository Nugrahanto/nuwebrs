<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpeminjamanModel extends CI_Model
{
   
    public function get_laporanpeminjaman()
    {
        return $this->db->order_by('id_history', 'DESC')
                ->where('tgl_pinjam !=', NULL)
                ->where('tgl_kembali', NULL)
                ->join('tb_pasien', 'tb_history.id_pasien = tb_pasien.id_pasien')
                ->join('tb_ruangan', 'tb_history.id_ruangan = tb_ruangan.id_ruangan')
                ->get('tb_history')
                ->result();
    }

    public function get_ruangan()
    {
        return $this->db->get('tb_ruangan')
                    ->result();
    }

    public function update_laporanpeminjaman() {
        $id_peminjaman = $this->input->post('id_peminjaman');
        $id_pasien = $this->input->post('id_pasien');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
        $jekel = $this->input->post('jekel');
	    $ruangan = $this->input->post('ruangan');

        $sql = "update tb_history, tb_pasien
        set tb_history.id_ruangan = $ruangan, tb_pasien.nama_pasien = '".$nama_pasien."', tb_pasien.tgl_lahir = '".$tgl_lahir."', tb_pasien.jekel = '".$jekel."'
        where tb_history.id_history = $id_peminjaman and tb_pasien.id_pasien = $id_pasien;";
        $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else{
            return FALSE;
        }
    } 

    public function delete_laporanpeminjaman($id_peminjaman) {
        return $this->db->where('id_history', $id_peminjaman)
                        ->delete('tb_history');
    }
}