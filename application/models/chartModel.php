<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chartModel extends CI_Model {
    
    public function get_count_peminjaman()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('tgl_pinjam !=', NULL)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
    }

    public function yesterday_get_count_peminjaman()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('WEEK(tgl_pinjam)', $weekNumber-1)
                        ->where('tgl_pinjam !=', NULL)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
    }

    public function get_count_pengembalian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('tgl_kembali !=', NULL)
                        ->from('tb_history')
                        ->count_all_results();
    }

    public function yesterday_get_count_pengembalian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('WEEK(tgl_kembali)', $weekNumber-1)
                        ->where('tgl_kembali !=', NULL)
                        ->from('tb_history')
                        ->count_all_results();
    }

    public function get_count_keterlambatan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('tgl_kembali > tgl_haruskembali')
                        ->from('tb_history')
                        ->count_all_results();
    }

    public function yesterday_get_count_keterlambatan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        return $this->db->where('WEEK(tgl_kembali)', $weekNumber-1)
                        ->where('tgl_kembali > tgl_haruskembali')
                        ->from('tb_history')
                        ->count_all_results();
    }

    public function get_pengguna()
    {
        $sql = "SELECT tb_petugas.id_level, tb_level.nama_level, COUNT(*) as count FROM tb_petugas JOIN tb_level ON tb_level.id_level=tb_petugas.id_level GROUP BY id_level ORDER BY 1 DESC";
        return $query = $this->db->query($sql)->result();
    }

    public function get_ruangan_peminjaman()
    {
        $sql = "SELECT tb_history.id_ruangan, tb_ruangan.nama_ruangan, COUNT(*) as count FROM tb_history JOIN tb_ruangan ON tb_ruangan.id_ruangan=tb_history.id_ruangan WHERE tgl_kembali IS NULL GROUP BY id_ruangan ORDER BY id_ruangan ASC";
        return $query = $this->db->query($sql)->result();
    }

    public function get_ruangan_pengembalian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        $sql = "SELECT tb_history.id_ruangan, tb_ruangan.nama_ruangan, COUNT(*) as count FROM tb_history JOIN tb_ruangan ON tb_ruangan.id_ruangan=tb_history.id_ruangan WHERE tgl_kembali IS NOT NULL GROUP BY id_ruangan ORDER BY id_ruangan ASC";
        return $query = $this->db->query($sql)->result();
    }

    public function get_ruangan_keterlambatan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $weekNumber = date("W");
        $sql = "SELECT tb_history.id_ruangan, tb_ruangan.nama_ruangan, COUNT(*) as count FROM tb_history JOIN tb_ruangan ON tb_ruangan.id_ruangan=tb_history.id_ruangan WHERE tgl_kembali IS NOT NULL AND tgl_kembali > tgl_haruskembali GROUP BY id_ruangan ORDER BY id_ruangan ASC";
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
                        ->get('tb_history')
                        ->result();
    }
}

/* End of file chartModel.php */
/* Location: ./application/models/chartModel.php */