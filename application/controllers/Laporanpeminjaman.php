<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpeminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notifModel');
        $this->load->model('laporanpeminjamanModel');
    }
    public function index() {
        if ($this->session->userdata('level') == 1) {
            $data['title'] = 'Laporan Peminjaman';
            $data['main_view'] = 'pengguna/laporanpeminjaman';
            $data['laporanpeminjaman'] = $this->laporanpeminjamanModel->get_laporanpeminjaman();
            $data['ruangan'] = $this->laporanpeminjamanModel->get_ruangan();
            $data['notiftoday'] = $this->notifModel->notiftoday();
            $data['notifyesterday'] = $this->notifModel->notifyesterday();
            $data['get_notiftoday'] = $this->notifModel->get_notiftoday();
            $data['get_notifyesterday'] = $this->notifModel->get_notifyesterday();

            $this->load->view('template', $data);
        } else if ($this->session->userdata('level') == 3) {
            $data['title'] = 'Laporan Peminjaman';
            $data['main_view'] = 'kepalarm/laporanpeminjaman';
            $data['laporanpeminjaman'] = $this->laporanpeminjamanModel->get_laporanpeminjaman();

            $this->load->view('template', $data);
        } else {
            redirect('auth', 'refresh');
        } 
    }
    public function update_laporanpeminjaman() {
		if ($this->input->post('submit')) {
			if ($this->laporanpeminjamanModel->update_laporanpeminjaman() == TRUE)  {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                    Berhasil mengubah data peminjaman</div>');
                redirect('laporanpeminjaman', 'refresh');
			} else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                    Gagal mengubah data</div>');
                redirect('laporanpeminjaman', 'refresh');
			}
		}
	} 
    public function delete_laporanpeminjaman() {
        $id_peminjaman = $this->input->post('id_peminjaman');
        if ($this->laporanpeminjamanModel->delete_laporanpeminjaman($id_peminjaman)) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                Berhasil menghapus data peminjaman</div>');
            redirect('laporanpeminjaman', 'refresh');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                Gagal menghapus data</div>');
            redirect('laporanpeminjaman', 'refresh');
        }
	}

    public function cetak() {
        if ($this->session->userdata('level') == 1) {
            $data['title'] = 'Cetak Laporan Peminjaman';
            $data['laporanpeminjaman'] = $this->laporanpeminjamanModel->get_laporanpeminjaman();

            $this->load->view('print/laporanpeminjaman', $data);
        } else if ($this->session->userdata('level') == 3) {
            $data['title'] = 'Cetak Laporan Peminjaman';
            $data['laporanpeminjaman'] = $this->laporanpeminjamanModel->get_laporanpeminjaman();

            $this->load->view('print/laporanpeminjaman', $data);
        } else {
            redirect('auth', 'refresh');
        }
    }
}