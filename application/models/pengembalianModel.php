<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengembalianModel extends CI_Model
{

    public function search_no_ri($norm)
    {
        $sql = "select peminjaman.* from peminjaman,
        (select no_rm,max(id_peminjaman) as id_peminjaman
             from peminjaman
             group by no_rm) max_rm
          where peminjaman.no_rm=max_rm.no_rm
          and peminjaman.id_peminjaman=max_rm.id_peminjaman
          and peminjaman.no_rm like '".$norm."%'";
        return $query = $this->db->query($sql)->result();
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
        $this->db->where('tgl_kembali', null);
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
