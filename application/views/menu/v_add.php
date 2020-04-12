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
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <div class="card mb-3">
            <div class="card-header">
                <a href="<?php echo site_url('tabel') ?>"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <div class="card-body">

                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" />

                    <div class="form-group">
                        <label for="kode_puskesmas">Kode Puskesmas</label>
                        <input class="form-control <?php echo form_error('kode_puskesmas') ? 'is-invalid':'' ?>" type="text"
                            name="kode_puskesmas" placeholder="Kode Puskesmas" />
                        <div class="invalid-feedback">
                            <?php echo form_error('kode_puskesmas') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_puskesmas">Nama Puskesmas</label>
                        <input class="form-control <?php echo form_error('nama_puskesmas') ? 'is-invalid':'' ?>" type="text"
                            name="nama_puskesmas" placeholder="Nama Puskesmas" />
                        <div class="invalid-feedback">
                            <?php echo form_error('nama_puskesmas') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>" type="number"
                            name="latitude" placeholder="0" step="0.00001" max="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('latitude') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>" type="number"
                            name="longitude" placeholder="0" step="0.0001" min="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('longitude') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" type="text"
                            name="alamat" placeholder="Alamat" />
                        <div class="invalid-feedback">
                            <?php echo form_error('alamat') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="luas">Luas (dalam meter)</label>
                        <input class="form-control <?php echo form_error('luas') ? 'is-invalid':'' ?>" type="number"
                            name="luas" placeholder="0" step="0.01" min="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('luas') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="desa">Jumlah Desa</label>
                        <input class="form-control <?php echo form_error('desa') ? 'is-invalid':'' ?>" type="number"
                            name="desa" placeholder="0" step="1" min="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('desa') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="penduduk">Jumlah Penduduk</label>
                        <input class="form-control <?php echo form_error('penduduk') ? 'is-invalid':'' ?>" type="number"
                            name="penduduk" placeholder="0" step="1" min="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('penduduk') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputDescription">Karakteristik Wilayah</label>
                        <select class="form-control custom-select <?php echo form_error('karakteristik_wilayah') ? 'is-invalid':'' ?>"
                                name="karakteristik_wilayah" >
                            <option selected disabled>Pilih karakteristik Wilayah</option>
                            <option value="1">Perkotaan</option>
                            <option value="2">Pedesaan</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="inputDescription">Jenis Puskesmas</label>
                        <select class="form-control custom-select <?php echo form_error('jenis_puskesmas') ? 'is-invalid':'' ?>"
                                name="jenis_puskesmas" >
                            <option selected disabled>Pilih jenis puskesmas</option>
                            <option value="1">Rawat Inap</option>
                            <option value="2">Non Rawat Inap</option>
                        </select>
                    </div>


                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                </form>
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