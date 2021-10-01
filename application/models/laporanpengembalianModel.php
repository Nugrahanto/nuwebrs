<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpengembalianModel extends CI_Model
{
    public function get_laporanpengembalian()
    {
        return $this->db->get('pengembalian')
            ->result();
    }
    public function update_laporanpengembalian()
    {
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jekel = $this->input->post('jekel');
	    $ruangan = $this->input->post('ruangan');   
	    $bayar = $this->input->post('bayar');   

        $data = array(
            'nama_pasien' => $nama_pasien,
            'tgl_lahir' => $tgl_lahir,
            'jekel' => $jekel,
            'ruangan' => $ruangan,
            'bayar' => $bayar
            );

        $this->db->where('no_rm', $no_rm)
                 ->update('pengembalian', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }   public function delete_laporanpengembalian($no_rm) {
        return $this->db->where('no_rm', $no_rm)
                        ->delete('pengembalian');
    }
}