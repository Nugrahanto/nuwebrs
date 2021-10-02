<?php
defined('BASEPATH') or exit('No direct script access allowed');

class notiflambatModel extends CI_Model
{
    public function notiftoday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $getdate = date("Y-m-d");
        return $this->db->where('tgl_haruskembali', $getdate)
                        ->where('tgl_kembali =', null)
                        ->from('pengembalian')
                        ->count_all_results();
    }

    public function notifterlambat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $getdate = date("Y-m-d");
        return $this->db->where('tgl_haruskembali <', $getdate)
                        ->where('tgl_kembali =', null)
                        ->from('pengembalian')
                        ->count_all_results();
    }

    public function get_notiftoday()
    {
        date_default_timezone_set('Asia/Jakarta');
        $getdate = date("Y-m-d");
        return $this->db->where('tgl_haruskembali', $getdate)
                        ->where('tgl_kembali =', null)
                        ->get('pengembalian')
                        ->result();
    }

    public function get_notifterlambat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $getdate = date("Y-m-d");
        return $this->db->where('tgl_haruskembali <', $getdate)
                        ->where('tgl_kembali =', null)
                        ->get('pengembalian')
                        ->result();
    }
    
}
