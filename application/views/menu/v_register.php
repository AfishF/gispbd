<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>GIS PBD | Register</title>
    <link rel="icon" href="<?= base_url('assets/img/logo_puskesmas.png') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/OcOrato---Login-form-1.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/OcOrato---Login-form.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">

</head>

<body>
    <!-- membuat form -->
    <form id="form" method="POST" action="<?php echo base_url('login') ?>">
        <h1 id="head" style="color: rgb(255,255,255)">Register</h1>
        <br>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih salah satu :</label>
            <select class="form-control" id="formum2">
                <option>Admin</option>
                <option>User</option>
            </select>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="username" id="formum" placeholder="Username">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" id="formum2" placeholder="Password">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" id="formum2" placeholder="Ulangi Password">
        </div>
        <div class="form-group">
            <input class="form-control" type="email" name="email" id="formum2" placeholder="Email">
        </div>
        <button class="btn btn-light" id="butonas" type="submit">Register</button>
    </form>
    <!-- akhir form -->




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>