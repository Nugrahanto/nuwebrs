<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpengembalianModel extends CI_Model
{
    public function get_laporanpengembalian()
    {
        return $this->db->order_by('id_history', 'DESC')
                    ->where('tgl_kembali !=', null)
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

    public function update_laporanpengembalian()
    {
        $id_pengembalian = $this->input->post('id_pengembalian');
        $id_pasien = $this->input->post('id_pasien');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
        $jekel = $this->input->post('jekel');
	    $ruangan = $this->input->post('ruangan');   
	    $bayar = $this->input->post('bayar');

        $sql = "update tb_history, tb_pasien
        set tb_history.id_ruangan = $ruangan, tb_history.bayar= '".$bayar."', tb_pasien.nama_pasien = '".$nama_pasien."', tb_pasien.tgl_lahir = '".$tgl_lahir."', tb_pasien.jekel = '".$jekel."'
        where tb_history.id_history = $id_pengembalian and tb_pasien.id_pasien = $id_pasien;";
        $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else{
            return FALSE;
        }
    }
    
    public function delete_laporanpengembalian($id_pengembalian) {
        return $this->db->where('id_history', $id_pengembalian)
                        ->delete('tb_history');
    }
}