<?php defined('BASEPATH') or exit('NO DIRECT Scrpt Access Allowed');

require FCPATH . 'vendor/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

    public function list()
    {
        $this->load->view("user/menu");
    }

    public function insertdata()
    {
        $role_id = $this->session->userdata('role_id');
        checkLogin($role_id);

        $menu['title'] = 'Tambah Karyawan';
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

        if ($this->form_validation->run()) {
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

    public function search()
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

        $keyword = $this->input->post('keyword');
        $data['list_karyawan'] = $this->Admin_model->search($keyword);

        $this->load->view('templates/header', $menu);
        $this->load->view('karyawan/datakaryawan', $data);
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

        $menu['title'] = 'Edit';
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

    public function excel()
    {
        $data["list_karyawan"] = $this->Admin_model->getAll();

        $object = new Spreadsheet();

        $object->getProperties()->setCreator("Data Karyawan");
        $object->getProperties()->setLastModifiedBy("Data Karyawan");
        $object->getProperties()->setTitle("Data Karyawan");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NIP');
        $object->getActiveSheet()->setCellValue('B1', 'Nama');
        $object->getActiveSheet()->setCellValue('D1', 'Email');
        $object->getActiveSheet()->setCellValue('C1', 'Jabatan');
        $object->getActiveSheet()->setCellValue('F1', 'No. Telp');

        $baris = 2;

        foreach ($data['list_karyawan'] as $lk) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $lk->nip);
            $object->getActiveSheet()->setCellValue('B' . $baris, $lk->nama);
            $object->getActiveSheet()->setCellValue('D' . $baris, $lk->email);
            $object->getActiveSheet()->setCellValue('C' . $baris, $lk->jabatan);
            $object->getActiveSheet()->setCellValue('F' . $baris, $lk->telp);

            $baris++;
        }

        $filename = "Data Karyawan";

        $object->getActiveSheet()->setTitle("Data Karyawan");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=" ' . $filename . ' "');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($object, 'Xlsx');
        $writer->save('php://output');

        exit;

        redirect('karyawan/datakaryawan');
    }

    public function resetsandi($id)
    {
        $passnew = random_string('alnum', 50);
        $this->db->update($id);
        $this->session->set_flashdata('message', 'Silahkan masukkan password baru anda dibawah ini <br>' . $passnew);
        redirect('karyawan/datakaryawan');
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data["list_karyawan"] = $this->Admin_model->getAll();

        $this->load->view('karyawan/pdfkaryawan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Data Absensi", array('Attachment' => 0));

        redirect('karyawan/datakaryawan');
    }

    public function print()
    {
        $data["list_karyawan"] = $this->Admin_model->getAll();

        $this->load->view('karyawan/printdata', $data);
    }
}
