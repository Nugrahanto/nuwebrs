<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function login($username, $password){
        $query = $this->db->where('username', $username)
						  ->get('pengguna');

        if ($query->num_rows() > 0) {
            if (password_verify($password, $query->row()->password)) {
                $data = array(
                    'username' => $query->row()->username,
                    'level' => $query->row()->level,
                    'status' => $query->row()->status,
                    'logged_in' => TRUE
                    );
                $this->session->set_userdata($data);
                return 1;
            } else {
                return 2;
            }
        } else {
            return 0;
        }
	}

}

/* End of file Cek.php */
/* Location: ./application/models/Cek.php */