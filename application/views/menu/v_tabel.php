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
                <div class="col-sm-6">
                    <a class="btn btn-info" href="<?php echo site_url('tabel/export') ?>"  title="Download"><span class="fa fa-download"></span> Download Report</a>
                    <a class="btn btn-info" href="<?php echo site_url('tabel/upload') ?>"  title="Upload"><span class="fa fa-upload"></span> Upload Data</a>
                    <a class="btn btn-info" href="<?php echo site_url('tabel/add') ?>"  title="Edit"><span class="fa fa-plus"></span> Tambah Data</a>
                    <pre></pre>
                </div>
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

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

<!-- Modal Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
</body>

</html>