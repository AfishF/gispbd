<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Tabel extends CI_Controller
{
    private $filename = "import_data";
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('m_tabel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["puskesmas"] = $this->m_tabel->getAll();
        $this->load->view('menu/v_tabel', $data);
    }
    public function add()
    {
        $puskesmas = $this->m_tabel;
        $validation = $this->form_validation;
        $validation->set_rules($puskesmas->rules());

        if ($validation->run()) {
            $puskesmas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('menu/v_add');
    }

    public function edit($kode_puskesmas = null)
    {
        if (!isset($kode_puskesmas)) redirect('tabel');
       
        $puskesmas = $this->m_tabel;
        $validation = $this->form_validation;
        $validation->set_rules($puskesmas->rules());

        if ($validation->run()) {
            $puskesmas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["puskesmas"] = $puskesmas->getById($kode_puskesmas);
        if (!$data["puskesmas"]) show_404();
        
        $this->load->view('menu/v_edit', $data);
    }

    public function delete($kode_puskesmas=null)
    {
        if (!isset($kode_puskesmas)) show_404();
        
        if ($this->m_tabel->delete($kode_puskesmas)) {
            redirect(site_url('tabel'));
        }
    }

    public function export()
     {
          $puskesmas = $this->m_tabel->getAll();

          $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Puskesmas')
                      ->setCellValue('C1', 'Alamat')
                      ->setCellValue('D1', 'Luas Wilayah')
                      ->setCellValue('E1', 'Jumlah Desa')
                      ->setCellValue('F1', 'Jumlah Penduduk')
                      ->setCellValue('G1', 'Karakteristik Wilayah')
                      ->setCellValue('H1', 'Jenis Puskesmas');

          $kolom = 2;
          $nomor = 1;
          foreach($puskesmas as $key => $puskesmas) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $puskesmas->nama_puskesmas)
                           ->setCellValue('C' . $kolom, $puskesmas->alamat)
                           ->setCellValue('D' . $kolom, $puskesmas->luas)
                           ->setCellValue('E' . $kolom, $puskesmas->desa)
                           ->setCellValue('F' . $kolom, $puskesmas->penduduk)
                           ->setCellValue('G' . $kolom, $puskesmas->karakteristik_wilayah)
                           ->setCellValue('H' . $kolom, $puskesmas->jenis_puskesmas);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
	        header('Content-Disposition: attachment;filename="Data_Puskesmas.xlsx"');
	        header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }

     public function upload(){
        $data = array(); // Buat variabel $data sebagai array
        
        if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
          // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
          $upload = $this->m_tabel->upload_file($this->filename);
          
          if($upload['result'] == "success"){ // Jika proses upload sukses
            // Load plugin PHPExcel nya
            
            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(true, true, true ,true, true, true, true, true, true, true);
            
            // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
            // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
            $data['sheet'] = $sheet; 
          }else{ // Jika proses upload gagal
            $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
          }
        }
        
        $this->load->view('menu/v_upload', $data);
      }
      
      public function import(){
        // Load plugin PHPExcel nya
        
        $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(true, true, true ,true, true, true, true, true, true, true);
        
        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();
        
        $numrow = 1;
        foreach($sheet as $row){
          // Cek $numrow apakah lebih dari 1
          // Artinya karena baris pertama adalah nama-nama kolom
          // Jadi dilewat saja, tidak usah diimport
          if($numrow > 1){
            // Kita push (add) array data ke variabel data
            array_push($data, array(
              'kode_puskesmas'=>$row['A'], // Insert data nis dari kolom A di excel
              'nama_puskesmas'=>$row['B'], // Insert data nama dari kolom B di excel
              'latitude'=>$row['C'], 
              'longitude'=>$row['D'],
              'alamat'=>$row['E'],
              'luas'=>$row['F'],
              'desa'=>$row['G'],
              'penduduk'=>$row['H'],
              'karakteristik_wilayah'=>$row['I'],
              'jenis_puskesmas'=>$row['J'], 
            ));
          }
          
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->m_tabel->insert_multiple($data);
        redirect("tabel"); 
      }
    
}
