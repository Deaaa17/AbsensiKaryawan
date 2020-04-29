<?php defined('BASEPATH') or exit('NO DIRECT Scrpt Access Allowed');

require('Users/deama/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Absen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->model("Absensi");
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

        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $data["list_absen"] = $this->Absensi->ListAbsensi($dari, $sampai);

        // -- Load View
        // Header
        $this->load->view('templates/header', $menu);

        // Main Content
        $this->load->view('karyawan/dataabsen', $data);

        // Footer
        $this->load->view('templates/footer');
    }

    public function masuk()
    {
        // Get NIP dari Session
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $nip = $user['nip'];

        // Hitung Absen Masuk pada hari ini untuk NIP yang dimasukkan
        $count_masuk = $this->Absensi->CekAbsensiHariIni($nip, 'MASUK');

        // Cek Hitung Absen Masuk
        if ($count_masuk > 0) {
            // Menampilkan pesan sudah absen karena Hitung Absen Masuk lebih dari 0
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sudah melakukan absen masuk pada hari ini.</div>');
        } else {
            // Insert Data ke table 'data_absen'
            $this->Absensi->Masuk($nip);
            // Menampilkan pesan berhasil absen karena Hitung Absen Masuk sama dengan 0
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil melakukan absen masuk.</div>');
        }

        redirect('profile');
    }

    public function keluar()
    {
        // Get NIP dari Session
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $nip = $user['nip'];

        // Hitung Absen Masuk pada hari ini untuk NIP yang dimasukkan
        $count_masuk = $this->Absensi->CekAbsensiHariIni($nip, 'KELUAR');

        // Cek Hitung Absen Masuk
        if ($count_masuk > 0) {
            // Menampilkan pesan sudah absen karena Hitung Absen Masuk lebih dari 0
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sudah melakukan absen pulang pada hari ini.</div>');
        } else {
            // Insert Data ke table 'data_absen'
            $this->Absensi->Keluar($nip);
            // Menampilkan pesan berhasil absen karena Hitung Absen Masuk sama dengan 0
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil melakukan absen pulang.</div>');
        }

        redirect('profile');
    }

    public function excel()
    {
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $data["list_absen"] = $this->Absensi->ListAbsensi($dari, $sampai);

        // require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        // require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPexcel();

        $object->getProperties()->setCreator("Absensi Karyawan");
        $object->getProperties()->setLastModifiedBy("Absensi Karyawan");
        $object->getProperties()->setTitle("Data Absensi");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NIP');
        $object->getActiveSheet()->setCellValue('B1', 'Nama');
        $object->getActiveSheet()->setCellValue('C1', 'Jabatan');
        $object->getActiveSheet()->setCellValue('D1', 'Email');
        $object->getActiveSheet()->setCellValue('E1', 'Waktu Absen');
        $object->getActiveSheet()->setCellValue('F1', 'Jenis Absen');

        $baris = 2;

        foreach ($data['list_absen'] as $la) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $la->nip);
            $object->getActiveSheet()->setCellValue('B' . $baris, $la->nama);
            $object->getActiveSheet()->setCellValue('C' . $baris, $la->jabatan);
            $object->getActiveSheet()->setCellValue('D' . $baris, $la->email);
            $object->getActiveSheet()->setCellValue('E' . $baris, $la->waktu_absen);
            $object->getActiveSheet()->setCellValue('F' . $baris, $la->jenis_absen);

            $baris++;
        }

        $filename = "Data Absensi" . '.xlsx';

        $object->getActiveSheet()->setTitle("Data Absensi");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=" ' . $filename . ' "');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'Xlsx');
        $writer->save('php://output');

        exit;

        redirect('karyawan/dataabsen');
    }
}
