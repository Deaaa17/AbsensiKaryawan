<?php defined('BASEPATH') or exit('NO DIRECT Scrpt Access Allowed');

class Absensi extends CI_Model
{
    private $_table = "data_absen";

    public $id;
    public $nip;
    public $wkt_absen;
    public $jns_absen;

    public function CekAbsensiHariIni($nip, $jenis)
    {
        return $this->db->where([
            "nip" => $nip,
            "jns_absen" => $jenis,
            "wkt_absen >=" => date('Y-m-d') . ' 00:00:00',
            "wkt_absen <=" => date('Y-m-d') . ' 23:59:59'
        ])->get($this->_table)->num_rows();
    }

    public function Masuk($nip)
    {
        $data = [
            "nip" => $nip,
            "wkt_absen" => date('Y-m-d H:i:s'),
            "jns_absen" => 'MASUK'
        ];
        $this->db->insert($this->_table, $data);
    }

    public function Keluar($nip)
    {
        $data = [
            "nip" => $nip,
            "wkt_absen" => date('Y-m-d H:i:s'),
            "jns_absen" => 'KELUAR'
        ];
        $this->db->insert($this->_table, $data);
    }

    public function ListAbsensi($dari, $sampai)
    {
        $sql = "SELECT 
            u.nip AS nip, 
            u.nama AS nama, 
            u.jabatan AS jabatan, 
            u.email AS email, 
            a.wkt_absen AS waktu_absen, 
            a.jns_absen AS jenis_absen 
        FROM data_absen a 
        INNER JOIN user u 
        ON a.nip = u.nip ";

        if ($dari != null && $sampai != null) {
            $sql = $sql . "WHERE DATE(a.wkt_absen) >= '$dari' AND DATE(a.wkt_absen) <= '$sampai' ";
        }

        $sql = $sql . "ORDER BY DATE(a.wkt_absen) ASC";
        return $this->db->query($sql)->result();
    }
}
