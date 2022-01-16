<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peminjamanModel extends CI_Model
{
    public function search_no_rm($norm)
    {
        $sql = "select tb_history.* from tb_history,
        (select tb_pasien.no_rm, max(id_history) as id_history
        from tb_history join tb_pasien on tb_pasien.id_pasien = tb_history.id_pasien group by no_rm) max_rm
        where no_rm=max_rm.no_rm
        and tb_history.id_history=max_rm.id_history
        and no_rm like '".$norm."%'";
        return $query = $this->db->query($sql)->result();
    }

    // public function do_insert()
    // {
    //     $no_rm = $this->input->post('no_rm');
    //     $nama_pasien = $this->input->post('nama_pasien');
    //     $tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
    //     $jekel = $this->input->post('jekel');
    //     $ruangan = $this->input->post('ruangan');
    //     date_default_timezone_set('Asia/Jakarta');
    //     $getdate = date("Y-m-d");
    //     $strotime = strtotime($getdate);
    //     $date = date('Y-m-d', $strotime);

    //     $countrm = strlen($no_rm);
    //     if($countrm == 6){
    //         $check = $this->db->where('no_rm', $no_rm)
    //                       ->where('tgl_kembali', null)
    //                       ->join('peminjaman', 'peminjaman.id_peminjaman = pengembalian.id_peminjaman')
    //                       ->get('pengembalian')
    //                       ->row();

    //         if (is_null($check)){
    //             $data = array(
    //                 'id_peminjaman' => NULL,
    //                 'no_rm'         => $no_rm,
    //                 'nama_pasien'   => $nama_pasien,
    //                 'tgl_lahir'     => $tgl_lahir,
    //                 'jekel'         => $jekel,
    //                 'ruangan'       => $ruangan,
    //                 'tgl_pinjam'    => $date,
    //                 'created_by'    => $this->session->userdata('id'),
    //                 'created_on'    => date("Y-m-d H:i:s")        
    //             );
    //             $this->db->insert('peminjaman', $data);
        
    //             if ($this->db->affected_rows() > 0) {
    //                 return 1;
    //             } else {
    //                 return 0;
    //             }
    //         } else {
    //             return 2;
    //         }
    //     } else {
    //         return 0;
    //     }
    // }

    public function get_detail_data($id)
    {
        return $this->db->where('id_history', $id)
                ->join('tb_pasien', 'tb_history.id_pasien = tb_pasien.id_pasien')
                ->join('tb_ruangan', 'tb_history.id_ruangan = tb_ruangan.id_ruangan')
                ->get('tb_history')
                ->row();
    }

    public function cetak($id)
    {
        $data = array(
            'is_printed' => 1
            );

        $this->db->where('id_history', $id)
                 ->update('tb_history', $data);

        if ($this->db->affected_rows() > 0) {
			return $this->db->where('id_history', $id)
                            ->join('tb_pasien', 'tb_history.id_pasien = tb_pasien.id_pasien')
                            ->join('tb_ruangan', 'tb_history.id_ruangan = tb_ruangan.id_ruangan')
                            ->get('tb_history')
                            ->row();
		}
    }
}
