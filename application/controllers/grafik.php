<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class grafik extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('grafikModel');
    }

	function index()
	{
	  $data['hasil']=$this->grafikModel->Jum_peminjaman();
	  $this->load->view('grafik',$data);
	}
}