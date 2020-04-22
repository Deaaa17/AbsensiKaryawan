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

    public function editprofile()
    {
        $nip = $this->input->post('nip', true);
        $nama = $this->input->post('nama', true);
        $jb = $this->input->post('jabatan', true);
        $ttl = $this->input->post('ttl', true);
        $klmn = $this->input->post('kelamin', true);
        $alm = $this->input->post('alamat', true);
        $email = $this->input->post('email', true);
        $notelp = $this->input->post('notelp', true);
        // $gambar = $_FILES['foto'];
        // if ($gambar == '') {
        // } else {
        //     $config['upload_path'] = './assets/foto';
        //     $config['allowed_types'] = 'jpg|png|jfif|gif|jpeg';

        //     $this->load->library('upload', $config);
        //     if (!$this->upload->do_upload('foto')) {
        //         echo 'Gagal Upload';
        //         die();
        //     } else {
        //         $gambar = $this->upload->data('file_name');
        //     }
        // }

        $data = array(

            'nip'      => $nip,
            'nama'     => $nama,
            'jabatan'  => $jb,
            'ttl'      => $ttl,
            'kelamin'  => $klmn,
            'alamat'   => $alm,
            'ttl'      => $ttl,
            'email'    => $email,
            'telp'     => $notelp,
            // 'foto'       => $gambar
        );
        // $path = './assets/foto/';
        // @unlink($path . $this->input->post('fotolama'));
        // $id = $this->input->post('idkaryawan');

        $kondisi = $this->db->where('id');
        $this->Admin_model->update($data, $kondisi);
        redirect('user/editprofile');
    }
}
