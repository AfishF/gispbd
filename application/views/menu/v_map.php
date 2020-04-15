<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GIS | PBD</title>
    <link rel="icon" href="<?= base_url('assets/img/logo_puskesmas.png') ?>">

    <link href="<?php echo base_url('assets/bootstrap/dist/css/styles.css') ?> " rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo base_url('assets/leaflet/leaflet.css') ?>">

    <style type="text/css">
        #mapid {
            height: 750px;
        }
    </style>

</head>

<body>

    <?php $this->load->view('templates/_partials/sidenav.php'); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main style="padding-bottom:80px">
                <div class="container-fluid">
                    <h1 class="mt-2">Lokasi Puskesmas</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Lokasi</li>
                    </ol>
                    <div id="mapid"></div>
                </div>
            </main>
        </div>
    </div>
    <?php $this->load->view('templates/_partials/footer.php'); ?>

    <script src="https://kit.fontawesome.com/10e53f85be.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/leaflet/leaflet.js') ?> "></script>


    <script type="text/javascript">
        var map = L.map('mapid').setView([-6.893020, 109.451440], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        $.getJSON("<?= base_url() ?>map/puskesmas_json", function(data) {
            $.each(data, function(i, field) {

                var v_lat = parseFloat(data[i].latitude);
                var v_long = parseFloat(data[i].longitude);

                var markerIcon = L.icon({
                    iconUrl: '<?php echo base_url('assets/img/marker_puskesmas.png') ?>',
                    iconSize: [30, 60]
                });
                L.marker([v_lat, v_long], {
                        icon: markerIcon
                    }).addTo(map)
                    .bindPopup(data[i].nama_puskesmas)
            });
        });

        $.getJSON("<?= base_url() ?>assets/geojson/map.geojson", function(data) {
            geoLayer = L.geoJson(data, {
                style: function(feature) {
                    return;
                },
                onEachFeature: function(feature, layer) {
                    var kecamatan = feature.properties.kecamatan;

                    var info = "Kecamatan " + kecamatan;
                    layer.bindPopup(info, {
                        maxWidth: 260,
                        closeButton: true,
                        offset: L.point(0, -20)
                    });

                    layer.on('click', function() {
                        layer.openPopup();
                    });
                }
            }).addTo(map);
        });
    </script>
</body>

</html>