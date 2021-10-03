<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengembalianModel');
        $this->load->model('notifModel');
        $this->load->model('notiflambatModel');
    }

    public function index()
    {
        if ($this->session->userdata('level') == 1) {
            $data['title'] = 'Data Pengembalian';
            $data['main_view'] = 'pengguna/datapengembalian';
            $data['notiftoday'] = $this->notifModel->notiftoday();
            $data['notifyesterday'] = $this->notifModel->notifyesterday();
            $data['get_notiftoday'] = $this->notifModel->get_notiftoday();
            $data['get_notifyesterday'] = $this->notifModel->get_notifyesterday();

            $this->load->view('template', $data);
        } else if ($this->session->userdata('level') == 2) {
            $data['title'] = 'Data Pengembalian';
            $data['main_view'] = 'rawatinap/datapengembalian';
            $data['notifterlambat'] = $this->notiflambatModel->notifterlambat();
            $data['notiftoday'] = $this->notiflambatModel->notiftoday();
            $data['get_notiftoday'] = $this->notiflambatModel->get_notiftoday();
            $data['get_notifterlambat'] = $this->notiflambatModel->get_notifterlambat();

            $this->load->view('template', $data);
        } else {
            redirect('auth', 'refresh');
        } 
    } 
    public function get_auto_fill_ri()
    {
        if (isset($_GET['term'])) {
            $result = $this->pengembalianModel->search_no_ri($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    date_default_timezone_set('Asia/Jakarta');
                    $sekarang = date('Y-m-d');
                    $expdate = date('Y-m-d', strtotime($sekarang . ' + 2 days'));
                    $arr_result[] = array(
                        'label'            => $row->no_rm,
                        'nama_pasien'    => $row->nama_pasien,
                        'tgl_lahir'        => $row->tgl_lahir,
                        'jekel'            => $row->jekel,
                        'ruangan'        => $row->ruangan,
                        'tgl_pulang' => $sekarang,
                        'tgl_haruskembali'    => $expdate,
                    );
                    echo json_encode($arr_result);
                }
            }
        }
    }
    public function tambah_pengembalian()
    {
        if ($this->session->userdata('level') == 2) {
            if ($this->input->post('submit')) {
                if ($this->pengembalianModel->do_insert() == TRUE) {
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-success" role="alert">
                        Berhasil menambahkan pengembalian baru</div>');
                    redirect('pengembalian', 'refresh');
                } else {
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-danger" role="alert">
                        Gagal menambahkan pengembalian baru</div>');
                    redirect('pengembalian', 'refresh');
                }
            }
        } else {
            redirect('login', 'refresh');
        }
    }
    public function get_auto_fill_adm()
    {
        if (isset($_GET['term'])) {
            $result = $this->pengembalianModel->search_no_adm($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $arr_result[] = array(
                        'label'             => $row->no_rm,
                        'id_pengembalian'   => $row->id_pengembalian,
                        'nama_pasien'       => $row->nama_pasien,
                        'tgl_lahir'         => $row->tgl_lahir,
                        'jekel'             => $row->jekel,
                        'ruangan'           => $row->ruangan,
                        'bayar'             => $row->bayar,
                        'tgl_pulang'        => $row->tgl_pulang,
                        'tgl_haruskembali'  => $row->tgl_haruskembali,
                    );
                    echo json_encode($arr_result);
                }
            }
        }
    }
    public function update_pengembalian()
	{
		if ($this->input->post('submit')) {
			if ($this->pengembalianModel->update_pengembalian() == TRUE)  {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                    Berhasil mengubah data tanggal BRM kembali</div>');
                redirect('pengembalian', 'refresh');
			} else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                    Gagal mengubah data</div>');
                redirect('pengembalian', 'refresh');
			}
		}
	}
}
