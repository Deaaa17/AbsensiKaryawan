<?php defined('BASEPATH') or exit('NO DIRECT Scrpt Access Allowed');

class Karyawan extends CI_Controller
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

        $keyword = $this->input->get('table_search');
        if ($keyword != null) {
            $data["list_karyawan"] = $this->Admin_model->search($keyword);
        } else {
            $data["list_karyawan"] = $this->Admin_model->getAll();
        }

        // -- Load View
        // Header
        $this->load->view('templates/header', $menu);

        // Main Content
        // $this->load->view('karyawan/list', $data);

        // Footer
        $this->load->view('templates/footer');
    }


    // public function add()
    // {
    //     $karyawan = $this->admin_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($karyawan->rules());

    //     if ($validation->run()) {
    //         $karyawan->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $this->load->view("admin/karyawan/new_form");
    // }

    // // GET /karyawan/edit/:id
    // public function edit($id = null)
    // {
    //     if (!isset($id)) redirect('admin/data_karyawan');

    //     $karyawan = $this->admin_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($karyawan->rules());

    //     if ($validation->run()) {
    //         $karyawan->update();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $data["karyawan"] = $karyawan->getById($id);
    //     if (!$data["product"]) show_404();

    //     $this->load->view("admin/karyawan/edit_form", $data);
    // }

    // public function delete($id = null)
    // {
    //     if (!isset($id)) show_404();

    //     if ($this->admin_model->delete($id)) {
    //         redirect(site_url('admin/data_karyawan'));
    //     }
    // }

    public function list()
    {
        $this->load->view("user/menu");
    }

    public function insertdata()
    {
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

        $nip = $this->input->post('nip', true);
        $nama = $this->input->post('nama', true);
        $email = $this->input->post('email', true);
        $telp = $this->input->post('notelp', true);
        $jabatan = $this->input->post('jabatan', true);

        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|png|jfif|gif|jpeg';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $this->upload->data('file_name');
        }

        $this->form_validation->set_rules($this->Admin_model->rules());

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('karyawan/tambah');
        } else {
            $data = array(

                'nip'       => $nip,
                'nama'      => $nama,
                'email'     => $email,
                'jabatan'   => $jabatan,
                'telp'      => $telp,
                'foto'      => $this->upload->data('file_name')

            );

            $this->Admin_model->save($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Karyawan Berhasil Ditambahkan!</div>');
        }

        $this->load->view('templates/header', $menu);
        $this->load->view('karyawan/tambah');
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->Admin_model->delete($id);
        redirect('karyawan/datakaryawan');
    }

    public function ubah($id)
    {
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

        $data['karyawan'] = $this->Admin_model->getById($id);

        $this->load->view('templates/header', $menu);
        $this->load->view('karyawan/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function updatedata()
    {
        $nip = $this->input->post('nip', true);
        $nama = $this->input->post('nama', true);
        $email = $this->input->post('email', true);
        $jb = $this->input->post('jabatan', true);
        $notelp = $this->input->post('notelp', true);
        $gambar = $_FILES['foto'];
        if ($gambar == '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|jfif|gif|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo 'Gagal Upload';
                die();
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(

            'nip'      => $nip,
            'nama'     => $nama,
            'jabatan'  => $jb,
            'telp'     => $notelp,
            'foto'       => $gambar
        );
        $path = './assets/foto/';
        @unlink($path . $this->input->post('fotolama'));
        $id = $this->input->post('idkaryawan');

        $kondisi = $this->db->where('id', $id);
        $this->Admin_model->update($data, $kondisi);
        redirect('karyawan/datakaryawan');
    }

    public function datakaryawan()
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

        $keyword = $this->input->get('table_search');
        if ($keyword != null) {
            $data["list_karyawan"] = $this->Admin_model->search($keyword);
        } else {
            $data["list_karyawan"] = $this->Admin_model->getAll();
        }

        $this->load->view('templates/header', $menu);
        $this->load->view('karyawan/datakaryawan', $data);
        $this->load->view('templates/footer');
    }

    // public function detail($id)
    // {
    //     $this->Admin_model->detail($id);
    //     redirect('karyawan/datakaryawan');
    // }
}
