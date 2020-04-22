<?php defined('BASEPATH') or exit('NO DIRECT Scrpt Access Allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        // Get User menggunakan SESSION untuk Set Menu
        $role_id = $this->session->userdata('role_id');
        checkLogin($role_id);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // -- Load View
        // Header
        $this->load->view('templates/header', $data);

        // Main Content
        $this->load->view('karyawan/list', $data);

        // Footer
        $this->load->view('templates/footer');
    }
}
