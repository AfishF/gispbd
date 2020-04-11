<?php $this->load->view('templates/_partials/header.php') ?>

<?php $this->load->view('templates/_partials/sidenav.php'); ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main style="padding-bottom: 30px">
            <div class="container-fluid">
                <h1 class="mt-2" style="text-align: right"> Sistem Informasi Geografis</h1>
                <p style="text-align: right; color: #808080 ">Pemetaan Kecamatan dan Lokasi Puskesmas di Kabupaten Pemalang secara Geografis</p>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Home</li>
                </ol>
                <div class="card" style="width: 18rem">
                    <img src="<?= base_url('assets/img/Pemetaan.jpg') ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Peta Kabupaten Pemalang</h5>
                        <p class="card-text">Pemetaan Kecamatan di Kabupaten Pemalang</p>
                        <a href="<?= base_url('map'); ?>" class="btn btn-secondary">Go to Map</a>
                    </div>
                </div>
            </div>

        </main>
        <?php $this->load->view('templates/_partials/footer'); ?>
    </div>
</div>
</body>

</html>