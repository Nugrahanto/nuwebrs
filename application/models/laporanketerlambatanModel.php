<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanketerlambatanModel extends CI_Model
{
    public function get_laporanketerlambatan() {
        return $this->db->where('tgl_kembali > tgl_haruskembali')
                        ->join('peminjaman', 'peminjaman.id_peminjaman=pengembalian.id_peminjaman')
                        ->get('pengembalian')
                        ->result();
    }
    public function update_laporanketerlambatan() 
    {
        $id_pengembalian = $this->input->post('id_pengembalian');
        $id_peminjaman = $this->input->post('id_peminjaman');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
        $jekel = $this->input->post('jekel');
	    $ruangan = $this->input->post('ruangan');   
	    $bayar = $this->input->post('bayar');

        $check = $this->db->where('id_pengembalian', $id_pengembalian)
                          ->where('bayar', $bayar)
                          ->get('pengembalian')
                          ->row();

        $data = array(
            'nama_pasien'   => $nama_pasien,
            'tgl_lahir'     => $tgl_lahir,
            'jekel'         => $jekel,
            'ruangan'       => $ruangan
            );

        $this->db->where('id_peminjaman', $id_peminjaman)
                 ->where('ruangan', $ruangan)
                 ->update('peminjaman', $data);

        if ($this->db->affected_rows() > 0) {
            if (is_null($check)){
                $data = array(
                    'bayar' => $bayar
                );
                $this->db->where('id_pengembalian', $id_pengembalian)
                        ->update('pengembalian', $data);
            }

            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            if (is_null($check)){
                $data = array(
                    'bayar' => $bayar
                );
                $this->db->where('id_pengembalian', $id_pengembalian)
                        ->update('pengembalian', $data);
            }

            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
    
    public function delete_laporanketerlambatan($id_pengembalian) {
        return $this->db->where('id_pengembalian', $id_pengembalian)
                        ->delete('pengembalian');
    }
}