<?php
class M_tabel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function show_tabel()
    {
        $total = $this->db->query("SELECT * FROM pusat_kesehatan_masyarakat");
        return $total;
    }

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
    public $karakteristik_wilayah;
    public $jenis_puskesmas;


    public function rules()
    {
        return [
            ['field' => 'kode_puskesmas',
            'label' => 'kode puskesmas',
            'rules' => 'required'],

            ['field' => 'nama_puskesmas',
            'label' => 'nama puskesmas',
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

            ['field' => 'karakteristik_wilayah',
            'label' => 'karakteristik_wilayah',
            'rules' => 'numeric'],
            
            ['field' => 'jenis_puskesmas',
            'label' => 'jenis_puskesmas',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_view)->result();
    }
    
    public function getById($kode_puskesmas)
    {
        return $this->db->get_where($this->_table, ["kode_puskesmas" => $kode_puskesmas])->row();
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
        $this->desa = $post["desa"];
        $this->penduduk = $post["penduduk"];
        $this->karakteristik_wilayah = $post["karakteristik_wilayah"];
        $this->jenis_puskesmas = $post["jenis_puskesmas"];
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
        $this->desa = $post["desa"];
        $this->penduduk = $post["penduduk"];
        $this->karakteristik_wilayah = $post["karakteristik_wilayah"];
        $this->jenis_puskesmas = $post["jenis_puskesmas"];
        return $this->db->update($this->_table, $this, array('kode_puskesmas' => $post['kode_puskesmas']));
    }

    public function delete($kode_puskesmas)
    {
        return $this->db->delete($this->_table, array("kode_puskesmas" => $kode_puskesmas));
    }

    public function upload_file($filename){
        $this->load->library('upload'); // Load librari upload
        
        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;
      
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        } else{
          // Jika gagal :
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }

      public function insert_multiple($data){
        $this->db->insert_batch('puskesmas', $data);
      }
}
    
      