<?php
defined('BASEPATH') or exit('No direct script access allowed');

class grafikModel extends CI_Model
{
    function Jum_peminjaman()
    {
        $this->db->group_by('ruangan');
        $this->db->select('ruangan');
        $this->db->select("count(*) as total");
        return $this->db->from('peminjaman')
          ->get()
          ->result();
    }
}