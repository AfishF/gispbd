<?php
class M_tabel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // function show_tabel()
    // {
    //     $total = $this->db->query("SELECT * FROM pusat_kesehatan_masyarakat");
    //     return $total;
    // }

    private $_table = "puskesmas";
    private $_view = "pusat_kesehatan_masyarakat";

    public $kode_puskesmas;
    public $nama_puskesmas;
    public $latitude;
    public $longitude;
    public $alamat;
    public $luas;
    public $desa;
    public $penduduk;
    public $wilayah;
    public $jenis;


    public function rules()
    {
        return [
            ['field' => 'kode_puskesmas',
            'label' => 'kode_puskesmas',
            'rules' => 'numeric'],

            ['field' => 'nama_puskesmas',
            'label' => 'nama_puskesmas',
            'rules' => 'required'],
            
            ['field' => 'latitude',
            'label' => 'latitude',
            'rules' => 'numeric'],

            ['field' => 'longitude',
            'label' => 'longitude',
            'rules' => 'numeric'],

            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],
            
            ['field' => 'luas',
            'label' => 'luas',
            'rules' => 'numeric'],
            
            ['field' => 'desa',
            'label' => 'desa',
            'rules' => 'numeric'],

            ['field' => 'penduduk',
            'label' => 'penduduk',
            'rules' => 'numeric'],

            ['field' => 'karakteristik',
            'label' => 'karakteristik',
            'rules' => 'required'],
            
            ['field' => 'jenis',
            'label' => 'jenis',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($kode_puskesmas)
    {
        return $this->db->get_where($this->_view, ["kode_puskesmas" => $kode_puskesmas])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode_puskesmas = $post["kode_puskesmas"];
        $this->nama_puskesmas = $post["nama_puskesmas"];
        $this->latitude = $post["latitude"];
        $this->longitude = $post["longitude"];
        $this->alamat = $post["alamat"];
        $this->luas = $post["luas"];
        $this->luas = $post["desa"];
        $this->luas = $post["penduduk"];
        $this->luas = $post["karakteristik"];
        $this->luas = $post["jenis"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode_puskesmas = $post["kode_puskesmas"];
        $this->nama_puskesmas = $post["nama_puskesmas"];
        $this->latitude = $post["latitude"];
        $this->longitude = $post["longitude"];
        $this->alamat = $post["alamat"];
        $this->luas = $post["luas"];
        $this->luas = $post["desa"];
        $this->luas = $post["penduduk"];
        $this->luas = $post["karakteristik"];
        $this->luas = $post["jenis"];
        return $this->db->update($this->_table, $this, array('kode_puskesmas' => $post['kode_puskesmas']));
    }

    public function delete($kode_puskesmas)
    {
        return $this->db->delete($this->_table, array("kode_puskesmas" => $kode_puskesmas));
    }
}
