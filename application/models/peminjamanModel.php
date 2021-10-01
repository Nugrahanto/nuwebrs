<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peminjamanModel extends CI_Model
{

    public function do_insert()
    {
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
        $jekel = $this->input->post('jekel');
        $ruangan = $this->input->post('ruangan');
        date_default_timezone_set('Asia/Jakarta');
        $getdate = date("Y-m-d");
        $strotime = strtotime($getdate);
        $date = date('Y-m-d', $strotime);

        $data = array(
            'id_peminjaman'  => NULL,
            'no_rm'  => $no_rm,
            'nama_pasien'    => $nama_pasien,
            'tgl_lahir'    => $tgl_lahir,
            'jekel'    => $jekel,
            'ruangan'        => $ruangan,
            'tgl_pinjam' => $date

        );
        $this->db->insert('peminjaman', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function get_detail_data($id)
    {
        return $this->db->where('id_peminjaman', $id)
            ->get('peminjaman')
            ->row();
    }
    public function cetak($no_rm)
    {
        return $this->db->where('no_rm', $no_rm)
            ->get('peminjaman')
            ->row();
    }
}
