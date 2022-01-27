<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanketerlambatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notifModel');
        $this->load->model('laporanketerlambatanModel');
    }
    public function index() {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
            $data['title'] = 'Laporan Keterlambatan';
            $data['main_view'] = 'pengguna/laporanketerlambatan';
            $data['laporanketerlambatan'] = $this->laporanketerlambatanModel->get_laporanketerlambatan();
            $data['laporanketerlambatanfilter'] = $this->laporanketerlambatanModel->get_laporanketerlambatanfilter();

            $data['ruangan'] = $this->laporanketerlambatanModel->get_ruangan();
            $data['notiftoday'] = $this->notifModel->notiftoday();
            $data['notifyesterday'] = $this->notifModel->notifyesterday();
            $data['get_notiftoday'] = $this->notifModel->get_notiftoday();
            $data['get_notifyesterday'] = $this->notifModel->get_notifyesterday();

            $this->load->view('template', $data);
        } else if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 3) {
            $data['title'] = 'Laporan Keterlambatan';
            $data['main_view'] = 'kepalarm/laporanketerlambatan';            
            $data['laporanketerlambatan'] = $this->laporanketerlambatanModel->get_laporanketerlambatan();
            $data['laporanketerlambatanfilter'] = $this->laporanketerlambatanModel->get_laporanketerlambatanfilter();

            $this->load->view('template', $data);
        } else {
            redirect('auth', 'refresh');
        }   
    } 
    public function update_laporanketerlambatan() {
		if ($this->input->post('submit')) {
			if ($this->laporanketerlambatanModel->update_laporanketerlambatan() == TRUE)  {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                    Berhasil mengubah data keterlambatan</div>');
                redirect('laporanketerlambatan', 'refresh');
			} else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                    Gagal mengubah data</div>');
                redirect('laporanketerlambatan', 'refresh');
			}
		}
    } 
    public function delete_laporanketerlambatan() {
        $id_pengembalian = $this->input->post('id_pengembalian');
        if ($this->laporanketerlambatanModel->delete_laporanketerlambatan($id_pengembalian)) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                Berhasil menghapus data keterlambatan</div>');
            redirect('laporanketerlambatan', 'refresh');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                Gagal menghapus data</div>');
            redirect('laporanketerlambatan', 'refresh');
        }
	}

    public function cetak() {
        $uri = base_url(uri_string());
        $filter = "";
        if (!empty($_GET)){
            $filter = $_GET['isfiltering'];
        }

        if ($this->session->userdata('level') == 1) {
            $data['title'] = 'Cetak Laporan Keterlambatan';
            if($filter == ""){
                $data['laporanketerlambatan'] = $this->laporanketerlambatanModel->get_laporanketerlambatan();
            } else {
                $data['laporanketerlambatan'] = $this->laporanketerlambatanModel->get_laporanketerlambatanfilter();
            }

            $this->load->view('print/laporanketerlambatan', $data);
        } else if ($this->session->userdata('level') == 3) {
            $data['title'] = 'Cetak Laporan Keterlambatan';
            if($filter == ""){
                $data['laporanketerlambatan'] = $this->laporanketerlambatanModel->get_laporanketerlambatan();
            } else {
                $data['laporanketerlambatan'] = $this->laporanketerlambatanModel->get_laporanketerlambatanfilter();
            }

            $this->load->view('print/laporanketerlambatan', $data);
        } else {
            redirect('auth', 'refresh');
        }
    }
}