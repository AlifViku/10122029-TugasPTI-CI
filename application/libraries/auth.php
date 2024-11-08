<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
    var $CI = NULL;

    function __construct() {
        // Get CI instance
        $this->CI =& get_instance();
    }

    // Function to validate login
    function do_login($username, $password) {
        // Check in database if the user exists
        $this->CI->db->from('user');
        $this->CI->db->where('user_username', $username);
        $this->CI->db->where('user_password=MD5("' . $password . '")', '', false);
        $result = $this->CI->db->get();

        if ($result->num_rows() == 0) {
            // Username and password do not match
            return false;
        } else {
            // User exists, fetch information from database
            $userdata = $result->row();
            $session_data = array(
                'user_id' => $userdata->user_id,
                'nama' => $userdata->user_nama,
                'alamat' => $userdata->user_alamat,
                'kota' => $userdata->user_kota,
                'kodepos' => $userdata->user_kodepos,
                'telepon' => $userdata->user_telepon,
                'email' => $userdata->user_email,
                'username' => $userdata->user_username,
                'role' => $userdata->user_role,
                'level' => $userdata->user_level
            );
            // Create session
            $this->CI->session->set_userdata($session_data);
            return true;
        }
    }

    // Check if the user is logged in
    function is_logged_in()
    {
        if($this->CI->session->userdata('user_id') == '')
        {
        return false;
        }
        return true;
    }

    // Restrict access for unauthenticated users
    function restrict()
    {
        if($this->is_logged_in() == false)
        {
        redirect('home');
        }
    }

    // Check menu permissions
    function cek_menu($idmenu) {
        $this->CI->load->model('usermodel');
        $status_user = $this->CI->session->userdata('level');
        $allowed_level = $this->CI->usermodel->get_array_menu($idmenu);

        if (!in_array($status_user, $allowed_level)) {
            die("Maaf, Anda tidak berhak untuk mengakses halaman ini.");
        }
    }

    // Logout function
    function do_logout() {
        $this->CI->session->sess_destroy();
    }
}
