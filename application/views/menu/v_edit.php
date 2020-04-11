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
                    <input type="hidden" name="id" value="<?php echo $puskesmas->kode_puskesmas?>"/>

                    <div class="form-group">
                        <label for="kode_puskesmas">Kode Puskesmas</label>
                        <input class="form-control <?php echo form_error('kode_puskesmas') ? 'is-invalid':'' ?>" type="text"
                            name="kode_puskesmas" value="<?php echo $puskesmas->kode_puskesmas?>" readonly />
                        <div class="invalid-feedback">
                            <?php echo form_error('kode_puskesmas') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_puskesmas">Nama Puskesmas</label>
                        <input class="form-control <?php echo form_error('nama_puskesmas') ? 'is-invalid':'' ?>" type="text"
                            name="nama_puskesmas" value="<?php echo $puskesmas->nama_puskesmas?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('nama_puskesmas') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>" type="number"
                            name="latitude" value="<?php echo $puskesmas->latitude?>" step="0.00001" max="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('latitude') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>" type="number"
                            name="longitude" value="<?php echo $puskesmas->longitude?>" step="0.0001" min="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('longitude') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" type="text"
                            name="alamat" value="<?php echo $puskesmas->alamat?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('alamat') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="luas">Luas (dalam meter)</label>
                        <input class="form-control <?php echo form_error('luas') ? 'is-invalid':'' ?>" type="number"
                            name="luas" value="<?php echo $puskesmas->luas?>" step="0.01" min="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('luas') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="desa">Jumlah Desa</label>
                        <input class="form-control <?php echo form_error('desa') ? 'is-invalid':'' ?>" type="number"
                            name="desa" value="<?php echo $puskesmas->desa?>" step="1" min="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('desa') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="penduduk">Jumlah Penduduk</label>
                        <input class="form-control <?php echo form_error('penduduk') ? 'is-invalid':'' ?>" type="number"
                            name="penduduk" value="<?php echo $puskesmas->penduduk?>" step="1" min="0" />
                        <div class="invalid-feedback">
                            <?php echo form_error('penduduk') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputDescription">Karakteristik Wilayah</label>
                        <select class="form-control custom-select <?php echo form_error('karakteristik_wilayah') ? 'is-invalid':'' ?>"
                                name="karakteristik_wilayah" >
                                <?php 
                                $wil = $puskesmas->karakteristik_wilayah;
                                if ($wil == 1): ?>
                                    <option value="1" selected>Perkotaan</option>
                                    <option value="2">Pedesaan</option>
                                <?php else: ?>
                                    <option value="1">Perkotaan</option>
                                    <option value="2" selected>Pedesaan</option>
                                <?php endif; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="inputDescription">Jenis Puskesmas</label>
                        <select class="form-control custom-select <?php echo form_error('jenis_puskesmas') ? 'is-invalid':'' ?>"
                                name="jenis_puskesmas" >
                                <?php 
                                $jenis = $puskesmas->jenis_puskesmas;
                                if ($jenis == 1): ?>
                                    <option value="1" selected>Rawat Inap</option>
                                    <option value="2">Non Rawat Inap</option>
                                <?php else: ?>
                                    <option value="1">Rawat Inap</option>
                                    <option value="2" selected>Non Rawat Inap</option>
                                <?php endif; ?>
                        </select>
                    </div>


                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                </form>
            </div>

            <div class="card-footer small text-muted">
                * required fields
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