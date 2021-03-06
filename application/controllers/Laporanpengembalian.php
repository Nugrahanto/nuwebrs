<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notifModel');
        $this->load->model('laporanpengembalianModel');
    }
    public function index()
    {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
            $data['title'] = 'Laporan Pengembalian';
            $data['main_view'] = 'pengguna/laporanpengembalian';
            $data['laporanpengembalian'] = $this->laporanpengembalianModel->get_laporanpengembalian();
            $data['ruangan'] = $this->laporanpengembalianModel->get_ruangan();
            $data['notiftoday'] = $this->notifModel->notiftoday();
            $data['notifyesterday'] = $this->notifModel->notifyesterday();
            $data['get_notiftoday'] = $this->notifModel->get_notiftoday();
            $data['get_notifyesterday'] = $this->notifModel->get_notifyesterday();

            $this->load->view('template', $data);
        } else if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 3) {
            $data['title'] = 'Laporan Pengembalian';
            $data['main_view'] = 'kepalarm/laporanpengembalian';
            $data['laporanpengembalian'] = $this->laporanpengembalianModel->get_laporanpengembalian();

            $this->load->view('template', $data);
        } else {
            redirect('auth', 'refresh');
        } 
    }  
    public function update_laporanpengembalian(){
		if ($this->input->post('submit')) {
			if ($this->laporanpengembalianModel->update_laporanpengembalian() == TRUE)  {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                    Berhasil mengubah data pengembalian</div>');
                redirect('laporanpengembalian', 'refresh');
			} else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                    Gagal mengubah data</div>');
                redirect('laporanpengembalian', 'refresh');
			}
		}
    } 
    public function delete_laporanpengembalian() {
        $id_pengembalian = $this->input->post('id_pengembalian');
        if ($this->laporanpengembalianModel->delete_laporanpengembalian($id_pengembalian)) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                Berhasil menghapus data pengembalian</div>');
            redirect('laporanpengembalian', 'refresh');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                Gagal menghapus data</div>');
            redirect('laporanpengembalian', 'refresh');
        }
	}

    public function cetak() {
        if ($this->session->userdata('level') == 1) {
            $data['title'] = 'Cetak Laporan Pengembalian';
            $data['laporanpengembalian'] = $this->laporanpengembalianModel->get_laporanpengembalian();

            $this->load->view('print/laporanpengembalian', $data);
        } else if ($this->session->userdata('level') == 3) {
            $data['title'] = 'Cetak Laporan Pengembalian';
            $data['laporanpengembalian'] = $this->laporanpengembalianModel->get_laporanpengembalian();

            $this->load->view('print/laporanpengembalian', $data);
        } else {
            redirect('auth', 'refresh');
        }
    }
}