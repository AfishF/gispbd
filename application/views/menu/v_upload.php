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
                <form action="<?php echo base_url("index.php/Siswa/form"); ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input class="btn btn-success" type="submit" name="preview" value="Preview" />
                </form>
                <?php 
                    if (isset($_POST['preview'])): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Puskesmas</th>
                                    <th>Alamat</th>
                                    <th>Luas Wilayah</th>
                                    <th>Jumlah Desa</th>
                                    <th>Jumlah Penduduk</th>
                                    <th>Karakteristik Wilayah</th>
                                    <th>Jenis Puskesmas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($puskesmas as $key =>$puskesmas) {?>
                                    <tr>
                                        <td data-field="user"><?php echo $no++ ?></td>
                                        <td data-field="nama"><?php echo $puskesmas->nama_puskesmas ?></td>
                                        <td data-field="alamat"><?php echo $puskesmas->alamat ?></td>
                                        <td data-field="luas-wilayah"><?php echo $puskesmas->luas ?></td>
                                        <td data-field="jumlah-desa"><?php echo $puskesmas->desa ?></td>
                                        <td data-field="jumlah-penduduk"><?php echo $puskesmas->penduduk ?></td>
                                        <td data-field="karakteristik-wilayah"><?php echo $puskesmas->karakteristik_wilayah ?></td>
                                        <td data-field="jenis-puskesmas"><?php echo $puskesmas->jenis_puskesmas ?></td>
                                        <td style="text-align:center;">
                                            <pre><a class="btn  btn-warning" href="<?php echo site_url('tabel/edit/' .$puskesmas->kode_puskesmas) ?>"  title="Edit"><span class="far fa-edit"></span> Edit</a></pre>
                                            <a onclick="deleteConfirm('<?php echo site_url('tabel/delete/'.$puskesmas->kode_puskesmas) ?>')" href="#!" class="btn  btn-danger" title="Hapus"><span class="far fa-trash-alt"></span> Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
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