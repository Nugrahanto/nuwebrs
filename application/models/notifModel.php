<?php
defined('BASEPATH') or exit('No direct script access allowed');

class notifModel extends CI_Model
{
    public function notiftoday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $getdate = date("Y-m-d");
        return $this->db->where('tgl_pinjam', $getdate)
                        ->where('is_printed', 0)
                        ->join('tb_pasien', 'tb_history.id_pasien = tb_pasien.id_pasien')
                        ->join('tb_ruangan', 'tb_history.id_ruangan = tb_ruangan.id_ruangan')
                        ->from('tb_history')
                        ->count_all_results();
    }
    public function notifyesterday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $sekarang = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime($sekarang . ' - 1 days'));
        return $this->db->where('tgl_pinjam', $yesterday)
                        ->where('is_printed', 0)
                        ->join('tb_pasien', 'tb_history.id_pasien = tb_pasien.id_pasien')
                        ->join('tb_ruangan', 'tb_history.id_ruangan = tb_ruangan.id_ruangan')
                        ->from('tb_history')
                        ->count_all_results();
    }
    public function get_notiftoday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $getdate = date("Y-m-d");
        return $this->db->where('tgl_pinjam', $getdate)
                        ->where('is_printed', 0)
                        ->join('tb_pasien', 'tb_history.id_pasien = tb_pasien.id_pasien')
                        ->join('tb_ruangan', 'tb_history.id_ruangan = tb_ruangan.id_ruangan')
                        ->get('tb_history')
                        ->result();
    }
    public function get_notifyesterday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $sekarang = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime($sekarang . ' - 1 days'));
        return $this->db->where('tgl_pinjam', $yesterday)
                        ->where('is_printed', 0)
                        ->join('tb_pasien', 'tb_history.id_pasien = tb_pasien.id_pasien')
                        ->join('tb_ruangan', 'tb_history.id_ruangan = tb_ruangan.id_ruangan')
                        ->get('tb_history')
                        ->result();
    }
}
