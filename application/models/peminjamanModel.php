<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peminjamanModel extends CI_Model
{
    public function search_no_rm($norm)
    {
        return $this->db->like('no_rm', $norm)
                    ->get('tb_pasien')
                    ->result();
    }

    public function get_ruangan()
    {
        return $this->db->get('tb_ruangan')
                    ->result();
    }

    public function do_insert()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_pasien = $this->input->post('id_pasien');
        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
        $jekel = $this->input->post('jekel');
        $ruangan = $this->input->post('ruangan');
        $getdate = date("Y-m-d");
        // $strotime = strtotime($getdate);
        // $date = date('Y-m-d', $strotime);
        
        if ($id_pasien == ""){
            $countrm = strlen($no_rm);
            if($countrm == 6){
                $datapasien = array(
                    'id_pasien'     => NULL,
                    'no_rm'         => $no_rm,
                    'nama_pasien'   => $nama_pasien,
                    'tgl_lahir'     => $tgl_lahir,
                    'jekel'         => $jekel
                );

                $this->db->insert('tb_pasien', $datapasien);

                $insert_id = $this->db->insert_id();

                if ($this->db->affected_rows() > 0) {
                    $data = array(
                        'id_history' => NULL,
                        'id_pasien'  => $insert_id,
                        'id_ruangan'  => $ruangan,
                        'tgl_pinjam'    => date("Y-m-d"),
                        'created_on'    => date("Y-m-d H:i:s"),
                        'created_by'    => $this->session->userdata('id')
                    );
                    $this->db->insert('tb_history', $data);

                    if ($this->db->affected_rows() > 0) {
                        return 1;    
                    } else {
                        return 0;    
                    }
                } else {
                    return 2;
                }
            } else {
                return 2;
            }
        } else {
            $countrm = strlen($no_rm);
            if($countrm == 6){
                $check = $this->db->where('id_pasien', $id_pasien)
                            ->where('tgl_kembali', null)
                            ->get('tb_history')
                            ->row();

                if (is_null($check)){
                    $data = array(
                        'id_history' => NULL,
                        'id_pasien'  => $id_pasien,
                        'id_ruangan'  => $ruangan,
                        'tgl_pinjam'    => date("Y-m-d"),
                        'created_on'    => date("Y-m-d H:i:s"),
                        'created_by'    => $this->session->userdata('id')
                    );
                    $this->db->insert('tb_history', $data);
            
                    if ($this->db->affected_rows() > 0) {
                        return 1;
                    } else {
                        return 0;
                    }
                } else {
                    return 3;
                }
            }
        }
    }

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
