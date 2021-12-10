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
        date_default_timezone_set('Asia/Jakarta');
        $no_rm = $this->input->post('no_rm');
        $ruangan = $this->input->post('ruangan');

        $id_peminjaman = $this->input->post('id_peminjaman');
        $bayar = $this->input->post('bayar');
        $tgl_pulang = date("Y-m-d", strtotime($this->input->post('tgl_pulang')));
        $tgl_haruskembali = date('Y-m-d', strtotime($tgl_pulang. ' + 2 days'));

        $check = $this->db->where('no_rm', $no_rm)
                          ->where('ruangan', $ruangan)
                          ->where('tgl_kembali', NULL, FALSE)
                          ->join('peminjaman', 'peminjaman.id_peminjaman = pengembalian.id_peminjaman')
                          ->get('pengembalian')
                          ->row();

        if (is_null($check)){
            $data = array(
                'id_pengembalian'  => NULL,
                'id_peminjaman'    => $id_peminjaman,
                'bayar'            => $bayar,
                'tgl_pulang'       => $tgl_pulang,
                'tgl_haruskembali' => $tgl_haruskembali,
                'tgl_kembali'      => NULL,
                'created_by'       => $this->session->userdata('id'),
                'created_on'       => date("Y-m-d H:i:s")
    
            );
            $this->db->insert('pengembalian', $data);
    
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function search_no_adm($norm)
    {
        $this->db->join('peminjaman', 'peminjaman.id_peminjaman=pengembalian.id_peminjaman');
        $this->db->like('no_rm', $norm, 'both');
        $this->db->order_by('no_rm', 'ASC');
        $this->db->limit(10);
        $this->db->where('tgl_kembali', null);
        return $this->db->get('pengembalian')->result();
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

        $this->db->where('id_pengembalian', $id_pengembalian)
                 ->update('pengembalian', $data);

        if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else{
			return FALSE;
		}
    }
    
}
