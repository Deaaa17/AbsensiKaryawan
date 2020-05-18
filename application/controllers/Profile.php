<?php defined('BASEPATH') or exit('NO DIRECT Scrpt Access Allowed');

class Profile extends CI_Controller
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

        $menu['title'] = 'My Profile';
        $menu['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $queryMenu = "SELECT user_menu.id, user_menu.menu
                        FROM user_menu JOIN user_access_menu 
                            ON user_menu.id = user_access_menu.menu_id
                        WHERE user_access_menu.role_id = $role_id
                    ORDER BY user_menu.id ASC
        ";
        $menu['menu'] = $this->db->query($queryMenu)->result_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // -- Load View
        // Header
        $this->load->view('templates/header', $menu);

        // Main Content
        $this->load->view('user/profile', $data);

        // Footer
        $this->load->view('templates/footer');
    }

    public function editprofile($id)
    {
        $role_id = $this->session->userdata('role_id');
        checkLogin($role_id);

        $menu['title'] = 'Edit Profile';
        $menu['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $queryMenu = "SELECT user_menu.id, user_menu.menu
                        FROM user_menu JOIN user_access_menu 
                            ON user_menu.id = user_access_menu.menu_id
                        WHERE user_access_menu.role_id = $role_id
                    ORDER BY user_menu.id ASC
        ";
        $menu['menu'] = $this->db->query($queryMenu)->result_array();

        $data['profile'] = $this->Admin_model->getById($id);

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->Admin_model->save($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Telah diubah! Silahkan Masuk.</div>');
            redirect('user/profile');
        }

        $this->load->view('templates/header', $menu);
        $this->load->view('user/editprofile', $data);
        $this->load->view('templates/footer');
    }
}
