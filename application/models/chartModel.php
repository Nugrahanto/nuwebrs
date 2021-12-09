<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chartModel extends CI_Model {
    
    public function get_count_peminjaman()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->from('peminjaman')
                        ->count_all_results();
    }

    public function yesterday_get_count_peminjaman()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('WEEK(tgl_pinjam)', $weekNumber-1)
                        ->from('peminjaman')
                        ->count_all_results();
    }

    public function get_count_pengembalian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->from('pengembalian')
                        ->count_all_results();
    }

    public function yesterday_get_count_pengembalian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('WEEK(tgl_kembali)', $weekNumber-1)
                        ->from('pengembalian')
                        ->count_all_results();
    }

    public function get_count_keterlambatan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('tgl_kembali > tgl_haruskembali')
                        ->from('pengembalian')
                        ->count_all_results();
    }

    public function yesterday_get_count_keterlambatan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('WEEK(tgl_kembali)', $weekNumber-1)
                        ->where('tgl_kembali > tgl_haruskembali')
                        ->from('pengembalian')
                        ->count_all_results();
    }

    public function get_pengguna()
    {
        $sql = "SELECT level, COUNT(*) as count FROM pengguna GROUP BY level ORDER BY 1 DESC";
        return $query = $this->db->query($sql)->result();
    }

    public function get_ruangan_peminjaman()
    {
        $sql = "SELECT ruangan, COUNT(*) as count FROM peminjaman GROUP BY ruangan ORDER BY ruangan ASC";
        return $query = $this->db->query($sql)->result();
    }

    public function get_ruangan_pengembalian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        $sql = "SELECT ruangan, COUNT(*) as count FROM pengembalian LEFT JOIN peminjaman ON peminjaman.id_peminjaman = pengembalian.id_peminjaman GROUP BY ruangan ORDER BY ruangan ASC";
        return $query = $this->db->query($sql)->result();
    }

    public function get_ruangan_keterlambatan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        $sql = "SELECT ruangan, COUNT(*) as count FROM pengembalian LEFT JOIN peminjaman ON peminjaman.id_peminjaman = pengembalian.id_peminjaman WHERE tgl_kembali > tgl_haruskembali GROUP BY ruangan ORDER BY ruangan ASC";
        return $query = $this->db->query($sql)->result();
    }

    public function get_weekly_linechart()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekStart = date('Y-m-d',strtotime('monday this week'));
        $weekEnd = date('Y-m-d',strtotime('sunday this week'));
        // $sql = "SELECT * FROM peminjaman WHERE tgl_pinjam BETWEEN $weekStart AND $weekEnd";
        // return $query = $this->db->query($sql)->result();
        return $this->db->where('tgl_pinjam >=', $weekStart)
                        ->where('tgl_pinjam <=', $weekEnd)
                        ->get('peminjaman')
                        ->result();
    }
}

/* End of file chartModel.php */
/* Location: ./application/models/chartModel.php */