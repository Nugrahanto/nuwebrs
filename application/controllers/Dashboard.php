<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('notifModel');
        $this->load->model('notiflambatModel');
        $this->load->model('chartModel');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 1) {
            $data['title'] = 'Beranda';
            $data['main_view'] = 'dashboard/main_dashboard';
            $data['notiftoday'] = $this->notifModel->notiftoday();
            $data['notifyesterday'] = $this->notifModel->notifyesterday();
            $data['get_notiftoday'] = $this->notifModel->get_notiftoday();
            $data['get_notifyesterday'] = $this->notifModel->get_notifyesterday();

            $data['penggunaChart'] = $this->chartModel->get_pengguna();
            $data['ruanganpeminjamanChart'] = $this->chartModel->get_ruangan_peminjaman();
            $data['ruanganpengembalianChart'] = $this->chartModel->get_ruangan_pengembalian();
            $data['ruanganketerlambatanChart'] = $this->chartModel->get_ruangan_keterlambatan();

            $data['countPeminjaman'] = $this->chartModel->get_count_peminjaman();
            $data['countPengembalian'] = $this->chartModel->get_count_pengembalian();
            $data['countKeterlambatan'] = $this->chartModel->get_count_keterlambatan();

            $data['countyesterdayPeminjaman'] = $this->chartModel->yesterday_get_count_peminjaman();
            $data['countyesterdayPengembalian'] = $this->chartModel->yesterday_get_count_pengembalian();
            $data['countyesterdayKeterlambatan'] = $this->chartModel->yesterday_get_count_keterlambatan();

            $data['dataWeekly'] = $this->chartModel->get_weekly_linechart();
            // print_r($data);
            // exit();

            $this->load->view('template', $data);
        } else if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 2) {
            $data['title'] = 'Beranda';
            $data['main_view'] = 'dashboard/main_dashboard';
            $data['notifterlambat'] = $this->notiflambatModel->notifterlambat();
            $data['notiftoday'] = $this->notiflambatModel->notiftoday();
            $data['get_notiftoday'] = $this->notiflambatModel->get_notiftoday();
            $data['get_notifterlambat'] = $this->notiflambatModel->get_notifterlambat();

            $data['penggunaChart'] = $this->chartModel->get_pengguna();
            $data['ruanganpeminjamanChart'] = $this->chartModel->get_ruangan_peminjaman();
            $data['ruanganpengembalianChart'] = $this->chartModel->get_ruangan_pengembalian();
            $data['ruanganketerlambatanChart'] = $this->chartModel->get_ruangan_keterlambatan();

            $data['countPeminjaman'] = $this->chartModel->get_count_peminjaman();
            $data['countPengembalian'] = $this->chartModel->get_count_pengembalian();
            $data['countKeterlambatan'] = $this->chartModel->get_count_keterlambatan();

            $data['countyesterdayPeminjaman'] = $this->chartModel->yesterday_get_count_peminjaman();
            $data['countyesterdayPengembalian'] = $this->chartModel->yesterday_get_count_pengembalian();
            $data['countyesterdayKeterlambatan'] = $this->chartModel->yesterday_get_count_keterlambatan();

            $data['dataWeekly'] = $this->chartModel->get_weekly_linechart();

            $this->load->view('template', $data);
        } else {
            $data['title'] = 'Beranda';
            $data['main_view'] = 'dashboard/main_dashboard';

            $data['penggunaChart'] = $this->chartModel->get_pengguna();
            $data['ruanganpeminjamanChart'] = $this->chartModel->get_ruangan_peminjaman();
            $data['ruanganpengembalianChart'] = $this->chartModel->get_ruangan_pengembalian();
            $data['ruanganketerlambatanChart'] = $this->chartModel->get_ruangan_keterlambatan();

            $data['countPeminjaman'] = $this->chartModel->get_count_peminjaman();
            $data['countPengembalian'] = $this->chartModel->get_count_pengembalian();
            $data['countKeterlambatan'] = $this->chartModel->get_count_keterlambatan();

            $data['countyesterdayPeminjaman'] = $this->chartModel->yesterday_get_count_peminjaman();
            $data['countyesterdayPengembalian'] = $this->chartModel->yesterday_get_count_pengembalian();
            $data['countyesterdayKeterlambatan'] = $this->chartModel->yesterday_get_count_keterlambatan();

            $data['dataWeekly'] = $this->chartModel->get_weekly_linechart();
            
            $this->load->view('template', $data);
        }
    }

}
