<?php
defined('BASEPATH') or exit('No direct script access allowed');

class notifModel extends CI_Model
{
    public function notiftoday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $getdate = date("Y-m-d");
        return $this->db->where('tgl_pinjam', $getdate)
            ->from('peminjaman')
            ->count_all_results();
    }
    public function notifyesterday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $sekarang = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime($sekarang . ' - 1 days'));
        return $this->db->where('tgl_pinjam', $yesterday)
            ->from('peminjaman')
            ->count_all_results();
    }
    public function get_notiftoday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $getdate = date("Y-m-d");
        return $this->db->where('tgl_pinjam', $getdate)
            ->get('peminjaman')
            ->result();
    }
    public function get_notifyesterday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $sekarang = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime($sekarang . ' - 1 days'));
        return $this->db->where('tgl_pinjam', $yesterday)
            ->get('peminjaman')
            ->result();
    }
}
