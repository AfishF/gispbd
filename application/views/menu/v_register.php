<!DOCTYPE html>
<html style="filter: brightness(100%);">

<?php $this->load->view('templates/_partials/header.php') ?>

<body class="bg-dark">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="bg-dark flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/pemalang.png&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5" style="height: 590px;">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" style="height: 323px;">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="First Name" name="first_name"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Last Name" name="last_name"></div>
                                </div>
                                <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email"></div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_repeat"></div>
                                </div>
                                <hr><button class="btn btn-primary btn-block text-white btn-user" type="submit">Register Account</button>
                                <hr>
                            </form><a class="small" href="<?= base_url('login'); ?> ">Already have an account? Login!</a>
                            <div class="text-center"></div>
                            <div class="text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('templates/_partials/footer'); ?>
</body>

</html>