<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengembalianModel extends CI_Model
{

    public function search_no_ri($norm)
    {
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien=tb_history.id_pasien');
        $this->db->join('tb_ruangan', 'tb_ruangan.id_ruangan=tb_history.id_ruangan');
        $this->db->like('no_rm', $norm, 'both');
        $this->db->where('tgl_pulang', null);
        return $this->db->get('tb_history')->result();
    }

    public function do_insert()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_peminjaman = $this->input->post('id_peminjaman');
        $bayar = $this->input->post('bayar');
        $tgl_pulang = date("Y-m-d", strtotime($this->input->post('tgl_pulang')));
        $tgl_haruskembali = date('Y-m-d', strtotime($tgl_pulang. ' + 2 days'));

        $data = array(
            'bayar'            => $bayar,
            'tgl_pulang'       => $tgl_pulang,
            'tgl_haruskembali' => $tgl_haruskembali

        );
        $this->db->where('id_history', $id_peminjaman)
             ->update('tb_history', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else{
            return FALSE;
        }
    }

    public function search_no_adm($norm)
    {
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien=tb_history.id_pasien');
        $this->db->join('tb_ruangan', 'tb_ruangan.id_ruangan=tb_history.id_ruangan');
        $this->db->like('no_rm', $norm, 'both');
        $this->db->order_by('no_rm', 'ASC');
        $this->db->limit(10);
        $this->db->where('tgl_kembali', null);
        return $this->db->get('tb_history')->result();
    }

    public function update_pengembalian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_pengembalian = $this->input->post('id_pengembalian');
        $tgl_kembali = date("Y-m-d", strtotime($this->input->post('tgl_kembali')));  

        $data = array(
            'tgl_kembali' => $tgl_kembali,
            'modified_by' => $this->session->userdata('id'),
            'modified_on' => date("Y-m-d H:i:s")
            );

        $this->db->where('id_history', $id_pengembalian)
                 ->update('tb_history', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }
    
}
