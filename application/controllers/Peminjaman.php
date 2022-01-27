<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peminjamanModel');
        $this->load->model('notifModel');
        $this->load->model('notiflambatModel');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
            $id = $this->uri->segment(2);
            if ($id != NULL) {
                $data['title'] = 'Data Peminjaman';
                $data['main_view'] = 'pengguna/datapeminjamanid';
                $data['dataRM'] = $this->peminjamanModel->get_detail_data($id);
                $data['notiftoday'] = $this->notifModel->notiftoday();
                $data['notifyesterday'] = $this->notifModel->notifyesterday();
                $data['get_notiftoday'] = $this->notifModel->get_notiftoday();
                $data['get_notifyesterday'] = $this->notifModel->get_notifyesterday();

                $this->load->view('template', $data);
            } else {
                $data['title'] = 'Data Peminjaman';
                $data['main_view'] = 'pengguna/datapeminjaman';
                $data['notiftoday'] = $this->notifModel->notiftoday();
                $data['notifyesterday'] = $this->notifModel->notifyesterday();
                $data['get_notiftoday'] = $this->notifModel->get_notiftoday();
                $data['get_notifyesterday'] = $this->notifModel->get_notifyesterday();

                $this->load->view('template', $data);
            }
        } else if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2) {
            $data['title'] = 'Data Peminjaman';
            $data['main_view'] = 'rawatinap/datapeminjaman';
            $data['ruangan'] = $this->peminjamanModel->get_ruangan();
            $data['notifterlambat'] = $this->notiflambatModel->notifterlambat();
            $data['notiftoday'] = $this->notiflambatModel->notiftoday();
            $data['get_notiftoday'] = $this->notiflambatModel->get_notiftoday();
            $data['get_notifterlambat'] = $this->notiflambatModel->get_notifterlambat();

            $this->load->view('template', $data);
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function cetak()
    { 
        $id = $this->uri->segment(3);
        $data['dataRM'] = $this->peminjamanModel->cetak($id);
        $this->load->view('print/tracer', $data);
    }

    public function tambah_peminjaman()
    {
        if ($this->session->userdata('level') == 2) {
            if ($this->input->post('submit')) {
                if ($this->peminjamanModel->do_insert() == 1) {
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-success" role="alert">
                        Berhasil menambahkan peminjaman baru</div>');
                    redirect('peminjaman', 'refresh');
                } else if ($this->peminjamanModel->do_insert() == 0) {
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-danger" role="alert">
                        Gagal menambahkan peminjaman baru</div>');
                    redirect('peminjaman', 'refresh');
                } else if ($this->peminjamanModel->do_insert() == 2) {
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-danger" role="alert">
                        No. RM minimal 6 digit</div>');
                    redirect('peminjaman', 'refresh');
                } else {
                    $this->session->set_flashdata('message', '
                        <div class="alert alert-danger" role="alert">
                        Gagal menambahkan peminjaman baru, Nomor RM masih dalam status dipinjam</div>');
                    redirect('peminjaman', 'refresh');
                }
            }
        } else {
            redirect('login', 'refresh');
        }
    }
    public function get_auto_fill_rm()
    {
        if (isset($_GET['term'])) {
            $result = $this->peminjamanModel->search_no_rm($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $tgl_lahir = date('d-m-Y', strtotime($row->tgl_lahir));
                    $arr_result[] = array(
                        'label'         => $row->no_rm,
                        'id_pasien'   => $row->id_pasien,
                        'nama_pasien'   => $row->nama_pasien,
                        'tgl_lahir'     => $tgl_lahir,
                        'jekel'         => $row->jekel,
                    );
                    echo json_encode($arr_result);
                }
            }
        }
    }
}
