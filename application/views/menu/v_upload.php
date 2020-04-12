<?php $this->load->view('templates/_partials/header.php') ?>

<!-- memuat sidebar -->
<?php $this->load->view('templates/_partials/sidenav.php'); ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main style="padding-bottom:80px">
        <div class="container-fluid">
            <h1 class="mt-2">Tables</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
        <div class="card mb-3">
            <div class="card-header">
                <a href="<?php echo site_url('tabel') ?>"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <div class="card-body">
                <h3>Upload Data</h3>
                <hr>
                    
                <?php
                    if(!isset($_POST['preview'])){ ?>
                    <form method="post" action="<?php echo base_url("tabel/upload"); ?>" enctype="multipart/form-data">
                    
                        <input type="file" name="file">
                        
                        <input class="btn btn-info" type="submit" name="preview" value="Preview">
                    </form>
                    <?php } ?>
                    <?php
                    if(isset($_POST['preview'])){
                     
                        if(isset($upload_error)){ // Jika proses upload gagal
                        echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                        die; // stop skrip
                        }
                        
                        // Buat sebuah tag form untuk proses import data ke database
                        echo "<form method='post' action='".base_url("tabel/import")."'>";
                        echo "<table border='1' cellpadding='8'>
                        <tr>
                        <th colspan='11'><center>Preview Data</center></th>
                        </tr>
                        <tr>
                        <th>No</th>
                        <th>Kode Puskesmas</th>
                        <th>Puskesmas</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Alamat</th>
                        <th>Luas Wilayah</th>
                        <th>Jumlah Desa</th>
                        <th>Jumlah Penduduk</th>
                        <th>Karakteristik Wilayah</th>
                        <th>Jenis Puskesmas</th>
                        </tr>";
                        
                        $numrow = 1;
                        $kosong = 0;
                        $no = 0;
                        
                        // Lakukan perulangan dari data yang ada di excel
                        // $sheet adalah variabel yang dikirim dari controller
                        foreach($sheet as $row){ 
                        // Ambil data pada excel sesuai Kolom
                        $kode_puskesmas = $row['A']; 
                        $nama_puskesmas = $row['B'];
                        $latitude = $row['C'];
                        $longitude = $row['D']; 
                        $alamat = $row['E']; 
                        $luas = $row['F']; 
                        $desa = $row['G']; 
                        $penduduk = $row['H']; 
                        $karakteristik_wilayah = $row['I']; 
                        $jenis_puskesmas = $row['J'];
                        
                        // Cek jika semua data tidak diisi
                        if($nama_puskesmas == "" or $latitude == "" && $longitude == "" && $alamat == "" && $luas == "" && $desa == "" && $penduduk == "" && $karakteristik_wilayah == "" && $jenis_puskesmas == "" && $kode_puskesmas == "")
                            continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                        
                        // Cek $numrow apakah lebih dari 1
                        // Artinya karena baris pertama adalah nama-nama kolom
                        // Jadi dilewat saja, tidak usah diimport
                        if($numrow > 1){
                            // Validasi apakah semua data telah diisi
                            $nama_td = ( ! empty($nama_puskesmas))? "" : " style='background: #E07171;'";
                            $lat_td = ( ! empty($latitude))? "" : " style='background: #E07171;'";
                            $long_td = ( ! empty($longitude))? "" : " style='background: #E07171;'"; 
                            $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; 
                            $luas_td = ( ! empty($luas))? "" : " style='background: #E07171;'";
                            $desa_td = ( ! empty($desa))? "" : " style='background: #E07171;'";
                            $penduduk_td = ( ! empty($penduduk))? "" : " style='background: #E07171;'";
                            $karakter_td = ( ! empty($karakteristik_wilayah))? "" : " style='background: #E07171;'";
                            $jenis_td = ( ! empty($jenis_puskesmas))? "" : " style='background: #E07171;'";
                            $kode_td = ( ! empty($kode_puskesmas))? "" : " style='background: #E07171;'";
                            
                            // Jika salah satu data ada yang kosong
                            if($nama_puskesmas == "" or $latitude == "" or $longitude == "" or $alamat == "" or $luas == "" or $desa == "" or $penduduk == "" or $karakteristik_wilayah == "" or $jenis_puskesmas == "" or $kode_puskesmas == ""){
                            $kosong++; // Tambah 1 variabel $kosong
                            }
                            
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td".$kode_td.">".$kode_puskesmas."</td>";
                            echo "<td".$nama_td.">".$nama_puskesmas."</td>";
                            echo "<td".$lat_td.">".$latitude."</td>";
                            echo "<td".$long_td.">".$longitude."</td>";
                            echo "<td".$alamat_td.">".$alamat."</td>";
                            echo "<td".$luas_td.">".$luas."</td>";
                            echo "<td".$desa_td.">".$desa."</td>";
                            echo "<td".$penduduk_td.">".$penduduk."</td>";
                            echo "<td".$karakter_td.">".$karakteristik_wilayah."</td>";
                            echo "<td".$jenis_td.">".$jenis_puskesmas."</td>";
                            echo "</tr>";
                        }
                        $no++;
                        $numrow++; // Tambah 1 setiap kali looping
                        }
                        
                        echo "</table>";
                        
                        // Cek apakah variabel kosong lebih dari 0
                        // Jika lebih dari 0, berarti ada data yang masih kosong
                        if($kosong > 0){
                        ?>  
                        <script>
                        $(document).ready(function(){
                            // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                            $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                            
                            $("#kosong").show(); // Munculkan alert validasi kosong
                        });
                        </script>
                        <?php
                        }else{ // Jika semua data sudah diisi
                        echo "<hr>";
                        
                        // Buat sebuah tombol untuk mengimport data ke database
                        echo "<button class='btn btn-success' type='submit' name='import'>Import</button>";
                        echo "<a href='".base_url("tabel")."'> Cancel</a>";
                        }
                        
                        echo "</form>";
                    }
                    ?>

                </div>
            </div>
        </div>
        </main>
    </div>
</div>
<?php $this->load->view('templates/_partials/footer.php'); ?>

<!-- JS untuk tooltip -->
<script type="text/javascript">
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>

</html>