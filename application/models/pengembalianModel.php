<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengembalianModel extends CI_Model
{

    public function search_no_ri($norm)
    {
        $this->db->like('no_rm', $norm, 'both');
        $this->db->order_by('no_rm', 'ASC');
        $this->db->limit(10);
        return $this->db->get('peminjaman')->result();
    }

    public function do_insert()
    {
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jekel = $this->input->post('jekel');
        $ruangan = $this->input->post('ruangan');
        $bayar = $this->input->post('bayar');
        $tgl_pulang = $this->input->post('tgl_pulang');
        $tgl_haruskembali = $this->input->post('tgl_haruskembali');

        $data = array(
            'id_pengembalian'  => NULL,
            'no_rm'            => $no_rm,
            'nama_pasien'      => $nama_pasien,
            'tgl_lahir'        => $tgl_lahir,
            'jekel'            => $jekel,
            'ruangan'          => $ruangan,
            'bayar'            => $bayar,
            'tgl_pulang'       => $tgl_pulang,
            'tgl_haruskembali' => $tgl_haruskembali

        );
        $this->db->insert('pengembalian', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function search_no_adm($norm)
    {
        $this->db->like('no_rm', $norm, 'both');
        $this->db->order_by('no_rm', 'ASC');
        $this->db->limit(10);
        return $this->db->get('pengembalian')->result();
    }

    public function update_pengembalian()
    {
        $id_pengembalian = $this->input->post('id_pengembalian');
        $tgl_kembali = date("Y-m-d", strtotime($this->input->post('tgl_kembali')));  

        $data = array(
            'tgl_kembali' => $tgl_kembali,
            );

        $this->db->where('id_pengembalian', $id_pengembalian)
                 ->update('pengembalian', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }
    
}
