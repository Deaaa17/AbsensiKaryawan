<?php defined('BASEPATH') or exit('NO DIRECT Scrpt Access Allowed');

class Admin_model extends CI_Model
{
    private $_table = "user";

    public $id;
    public $nip;
    public $nama;
    public $ttl;
    public $kelamin;
    public $alamat;
    public $email;
    public $jabatan;
    public $telp;
    public $foto = ".jpg";

    // validasi
    public function rules()
    {
        return [
            [
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'required'
            ],

            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'jabatan',
                'label' => 'Jabatan',
                'rules' => 'required'
            ],

            [
                'field' => 'telp',
                'label' => 'Telp',
                'rules' => 'required'
            ],

            [
                'field' => 'foto',
                'label' => 'Foto',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function search($keyword)
    {
        $this->db->like('nip', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('ttl', $keyword);
        $this->db->or_like('kelamin', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('jabatan', $keyword);
        $this->db->or_like('telp', $keyword);
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save($data)
    {
        $this->db->insert('user', $data);
    }

    public function update($data, $kondisi)
    {
        $this->db->update($this->_table, $data, $kondisi);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
