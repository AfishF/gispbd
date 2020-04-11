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
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Puskesmas</div>
                    <div class="card-body">
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
                                            <td data-field="karakteristik-wilayah"><?php echo $puskesmas->karakteristik ?></td>
                                            <td data-field="jenis-puskesmas"><?php echo $puskesmas->jenis ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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