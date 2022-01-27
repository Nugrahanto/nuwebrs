<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notifModel');
        $this->load->model('laporanpenggunaModel');
    }
    public function index()
    {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
            $data['title'] = 'Laporan Pengguna';
            $data['main_view'] = 'pengguna/laporanpengguna';
            $data['laporanpengguna'] = $this->laporanpenggunaModel->get_laporanpengguna();
            $data['level'] = $this->laporanpenggunaModel->get_level();
            $data['notiftoday'] = $this->notifModel->notiftoday();
            $data['notifyesterday'] = $this->notifModel->notifyesterday();
            $data['get_notiftoday'] = $this->notifModel->get_notiftoday();
            $data['get_notifyesterday'] = $this->notifModel->get_notifyesterday();

            $this->load->view('template', $data);
        } else if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 3) {
            $data['title'] = 'Laporan Pengguna';
            $data['main_view'] = 'kepalarm/laporanpengguna';
            $data['laporanpengguna'] = $this->laporanpenggunaModel->get_laporanpengguna();

            $this->load->view('template', $data);
            
        } else {
            redirect('auth', 'refresh');
        }
    }
    public function update_laporanpengguna()
    {
        if ($this->input->post('submit')) {
            if ($this->laporanpenggunaModel->update_laporanpengguna() == TRUE) {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                    Berhasil mengubah data pengguna</div>');
                redirect('laporanpengguna', 'refresh');
            } else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                    Gagal mengubah data</div>');
                redirect('laporanpengguna', 'refresh');
            }
        }
    }
    public function delete_laporanpengguna()
    {
        $id_pengguna = $this->input->post('id_pengguna');
        if ($this->laporanpenggunaModel->delete_laporanpengguna($id_pengguna)) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                Berhasil menghapus data pengguna</div>');
            redirect('laporanpengguna', 'refresh');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                Gagal menghapus data</div>');
            redirect('laporanpengguna', 'refresh');
        }
    }

    public function cetak() {
        if ($this->session->userdata('level') == 1) {
            $data['title'] = 'Cetak Laporan Pengguna';
            $data['laporanpengguna'] = $this->laporanpenggunaModel->get_laporanpengguna();

            $this->load->view('print/laporanpengguna', $data);
        } else if ($this->session->userdata('level') == 3) {
            $data['title'] = 'Cetak Laporan Pengguna';
            $data['laporanpengguna'] = $this->laporanpenggunaModel->get_laporanpengguna();

            $this->load->view('print/laporanpengguna', $data); 
    }else {
            redirect('auth', 'refresh');
        }
    }
}
